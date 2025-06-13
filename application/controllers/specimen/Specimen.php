<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\IOFactory;


class  Specimen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load database di sini
    }

    public function data_specimen()
    {

        $d['data_specimen'] = $this->db->query("select * from request_specimen");
        $this->load->view('Specimen/data_specimen', $d);
    }

    public function add_specimen()
    {
        $this->load->view('Specimen/add_specimen');
    }

   


public function process_excel() {
    if (!empty($_FILES['file']['name'])) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xls|xlsx';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $this->session->set_flashdata('msg', 'Gagal upload: ' . $this->upload->display_errors());
            redirect('specimen');
        } else {
            $file_data = $this->upload->data();
            $file_path = './uploads/' . $file_data['file_name'];

            // Load library PhpSpreadsheet
            require_once(APPPATH . '../vendor/autoload.php');

            try {
                $spreadsheet = IOFactory::load($file_path);
                $sheet = $spreadsheet->getActiveSheet();
                $rows = $sheet->toArray();

                // Buat array hasil
                $data_import = [];

                foreach ($rows as $index => $row) {
                    // Lewati header
                    if ($index == 0) continue;

                    $nama     = isset($row[0]) ? trim($row[0]) : '';
                    $jabatan  = isset($row[1]) ? trim($row[1]) : '';
                    $instansi = isset($row[2]) ? trim($row[2]) : '';
                    $pangkat  = isset($row[3]) ? trim($row[3]) : '';

                    if ($nama != '') {
                        $data_import[] = [
                            'nama' => $nama,
                            'jabatan' => $jabatan,
                            'instansi' => $instansi,
                            'pangkat' => $pangkat
                           
                        ];
                    }
                }

                // Simpan hasil ke session sementara untuk proses berikutnya
                $this->session->set_userdata('data_import', $data_import);
                $this->session->set_flashdata('msg', 'Data berhasil dibaca. Siap generate gambar.');

                // Lanjut ke halaman generate
                redirect('index.php/specimen/Specimen/preview');

            } catch (Exception $e) {
                $this->session->set_flashdata('msg', 'Gagal membaca file Excel: ' . $e->getMessage());
                redirect('index.php/specimen/Specimen/add_specimen');
            }
        }
    } else {
        $this->session->set_flashdata('msg', 'Silakan pilih file Excel terlebih dahulu.');
        redirect('index.php/specimen/Specimen/add_specimen');
    }
}

public function preview() {
    $data['data_import'] = $this->session->userdata('data_import') ?? [];
    $this->load->view('specimen/specimen_preview', $data);
}

public function download_image($index = 0)
{
    // Debug: Tampilkan semua error
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $data_import = $this->session->userdata('data_import');

    if (!isset($data_import[$index])) {
        show_error('Data tidak ditemukan di session.');
    }

    $data = $data_import[$index];

    // Path template gambar (pastikan file ini ada)
    $template_path = FCPATH . 'assets/images/template_specimen.png';
    if (!file_exists($template_path)) {
        show_error('Template tidak ditemukan: ' . $template_path);
    }

    // Buat image dari template
    $image = imagecreatefrompng($template_path);
    if (!$image) {
        show_error('Gagal memuat template gambar.');
    }

    // Alokasi warna teks (hitam)
    $black = imagecolorallocate($image, 0, 0, 0);

    // Path font (misal simpan di: assets/fonts/arial.ttf)
    $font_path = FCPATH . 'assets/fonts/arial.ttf';
    if (!file_exists($font_path)) {
        show_error('Font tidak ditemukan: ' . $font_path);
    }

    // Isi data dari excel
    $nama     = $data['nama'];
    $jabatan  = $data['jabatan'];
    $instansi = $data['instansi'];
    $pangkat  = $data['pangkat'];

    // Tulis teks ke gambar (atur posisi dan ukuran sesuai kebutuhan)
    imagettftext($image, 18, 0, 300, 140, $black, $font_path, $jabatan);
    imagettftext($image, 18, 0, 300, 180, $black, $font_path, $instansi);
    imagettftext($image, 20, 0, 410, 445, $font_color, $font, $nama);
    imagettftext($image, 18, 0, 300, 220, $black, $font_path, $pangkat);
    
   

    // Set header agar langsung download
    header('Content-Type: image/png');
    header('Content-Disposition: attachment; filename="specimen_' . $index . '.png"');
    imagepng($image);
    imagedestroy($image);
}




    public function get_nama()
    {
        $data['data_specimen'] = $this->db
            ->select('DISTINCT nama, jabatan, pangkat')
            ->from('request_specimen')
            ->get()
            ->result();

        $this->load->view('data_specimen', $data);
    }

    public function download_blob($id)
    {
        $this->load->database();
        $this->load->helper('download');

        // Ambil data berdasarkan ID
        $this->db->where('id', $id);
        $query = $this->db->get('request_specimen');

        if ($query->num_rows() > 0) {
            $row = $query->row();

            $file_data = $row->file; // BLOB
            $file_name = 'specimen_' . $id . '.jpg'; // Nama default

            // Lakukan validasi sederhana (misalnya data tidak kosong)
            if (!empty($file_data)) {
                force_download($file_name, $file_data);
            } else {
                show_error('File kosong.', 404);
            }
        } else {
            show_error('Data tidak ditemukan.', 404);
        }
    }
}
