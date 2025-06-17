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


    public function process_excel()
    {
        if (empty($_FILES['file']['name'])) {
            show_error('Tidak ada file yang diupload.');
            return;
        }
    
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xls|xlsx';
        $config['max_size'] = 2048;
    
        $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('file')) {
            show_error($this->upload->display_errors());
            return;
        }
    
        $file_data = $this->upload->data();
        $file_path = './uploads/' . $file_data['file_name'];
    
        require_once(APPPATH . '../vendor/autoload.php');
    
        try {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file_path);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();
    
            $data_import = [];
    
            foreach ($rows as $index => $row) {
                if ($index == 0) continue;
    
                $jabatan  = isset($row[0]) ? trim($row[0]) : '';
                $instansi = isset($row[1]) ? trim($row[1]) : '';
                $nama     = isset($row[2]) ? trim($row[2]) : '';
                $pangkat  = isset($row[3]) ? trim($row[3]) : '';
    
                if ($nama != '') {
                    $data_import[] = [
                        'nama'     => $nama,
                        'jabatan'  => $jabatan,
                        'instansi' => $instansi,
                        'pangkat'  => $pangkat
                    ];
                }
            }
    
            $this->session->set_userdata('data_import', $data_import);
            $data['data_import'] = $data_import;
    
            echo $this->load->view('specimen/specimen_preview', $data, true);
    
        } catch (Exception $e) {
            show_error('Gagal membaca file Excel: ' . $e->getMessage());
        }
    }
    


    public function preview()
    {
        $data['data_import'] = $this->session->userdata('data_import') ?? [];
        $this->load->view('specimen/specimen_preview', $data);
    }

    public function download_all_images()
{
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $data_import = $this->session->userdata('data_import');

    if (empty($data_import)) {
        show_error('Data import tidak ditemukan.');
    }

    $template_path = FCPATH . 'assets/images/template_specimen.jpg';
    $font_path     = FCPATH . 'assets/fonts/arial.ttf';

    if (!file_exists($template_path)) show_error('Template tidak ditemukan.');
    if (!file_exists($font_path))     show_error('Font tidak ditemukan.');

    $output_dir = realpath(FCPATH) . '/generated_specimen/';
    if (!is_dir($output_dir)) {
        mkdir($output_dir, 0777, true);
    }

    $file_list = [];

    foreach ($data_import as $index => $data) {
        $image = imagecreatefromjpeg($template_path);
        $black = imagecolorallocate($image, 0, 0, 0);

        $jabatan  = $data['jabatan'];
        $instansi = $data['instansi'];
        $nama     = $data['nama'];
        $pangkat  = $data['pangkat'];

        // Buat nama file yang aman
        $slug_nama = url_title($nama, '_', true); // CI3 helper
        $filename = 'specimen_' . $slug_nama . '.jpeg';
        $filepath = $output_dir . $filename;

        // Tulis teks ke gambar
        imagettftext($image, 75, 0, 990, 340, $black, $font_path, $jabatan);
        imagettftext($image, 75, 0, 990, 440, $black, $font_path, $instansi);
        imagettftext($image, 75, 0, 990, 970, $black, $font_path, $nama);
        imagettftext($image, 75, 0, 990, 1070, $black, $font_path, $pangkat);

        imagejpeg($image, $filepath, 100);
        imagedestroy($image);

        // Simpan ke DB
        $this->db->insert('request_specimen', [
            'nama'     => $nama,
            'jabatan'  => $jabatan,
            'instansi' => $instansi,
            'pangkat'  => $pangkat,
            'file'     => 'generated_specimen/' . $filename  // <= path public
        ]);

        $file_list[] = $filepath;
    }

    // Buat ZIP
    $zip_path = $output_dir . 'specimen_all.zip';
    $zip = new ZipArchive();

    if ($zip->open($zip_path, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
        foreach ($file_list as $file) {
            $zip->addFile($file, basename($file));
        }
        $zip->close();
    } else {
        show_error('Gagal membuat ZIP file.');
    }

    // Hapus file gambar satuan
    foreach ($file_list as $file) {
        unlink($file);
    }

    // Download file zip
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="specimen_all.zip"');
    header('Content-Length: ' . filesize($zip_path));
    readfile($zip_path);

    // Hapus file zip setelah dikirim
    unlink($zip_path);
}

    
        //import excel ke database
        public function import_excel()
    {
        $this->load->library('excel'); // pastikan PHPExcel atau PhpSpreadsheet sudah ada

        $file = $_FILES['file']['tmp_name'];

        $obj = PHPExcel_IOFactory::load($file);
        $sheet = $obj->getActiveSheet()->toArray(null, true, true, true);

        $data_import = [];

        foreach ($sheet as $index => $row) {
            if ($index == 1) continue; // skip header

            $data_import[] = [
                'nama'     => trim($row['A']),
                'jabatan'  => trim($row['B']),
                'instansi' => trim($row['C']),
                'pangkat'  => trim($row['D']),
            ];
        }

        // Simpan ke tabel specimen
        if (!empty($data_import)) {
            $this->db->insert_batch('request_specimen', $data_import);
        }

        // Redirect atau response
        redirect('data_specimen'); // asumsi nama route halaman
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

    public function download_by_id($id)
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $input_method = $this->input->post('input_method');

    if ($input_method === 'manual') {
        // Ambil semua inputan
        $nama     = $this->input->post('nama');
        $jabatan  = $this->input->post('jabatan');
        $pangkat  = $this->input->post('pangkat');
        $instansi = $this->input->post('instansi');

        $data_import = [];
        for ($i = 0; $i < count($nama); $i++) {
            if (!empty($nama[$i])) {
                $data_import[] = [
                    'nama'     => $nama[$i],
                    'jabatan'  => $jabatan[$i],
                    'pangkat'  => $pangkat[$i],
                    'instansi' => $instansi[$i],
                ];
            }
        }

        // Simpan ke session
        $this->session->set_userdata('data_import', $data_import);

        // Redirect langsung ke proses download
        redirect('index.php/specimen/Specimen/download_all_images'); // GANTI sesuai URL kamu
    }
    
        // Ambil data dari DB
        $data = $this->db->get_where('request_specimen', ['id' => $id])->row_array();
    
        if (!$data) {
            show_error('Data tidak ditemukan.');
        }
    
        $template_path = FCPATH . 'assets/images/template_specimen.jpg';
        $font_path     = FCPATH . 'assets/fonts/arial.ttf';
    
        if (!file_exists($template_path)) show_error('Template tidak ditemukan.');
        if (!file_exists($font_path))     show_error('Font tidak ditemukan.');
    
        // Buat gambar dari template
        $image = imagecreatefromjpeg($template_path);
        $black = imagecolorallocate($image, 0, 0, 0);
    
        // Tulis teks ke gambar (atur posisi sesuai kebutuhan)
        imagettftext($image, 75, 0, 990, 340, $black, $font_path, $data['jabatan']);
        imagettftext($image, 75, 0, 990, 440, $black, $font_path, $data['instansi']);
        imagettftext($image, 75, 0, 990, 970, $black, $font_path, $data['nama']);
        imagettftext($image, 75, 0, 990, 1070, $black, $font_path, $data['pangkat']);
    
        // Nama file download
        $slug_nama = url_title($data['nama'], '_', true);
        $nama_file = 'specimen_' . $slug_nama . '.jpeg';
    
        // Header download
        header('Content-Type: image/jpeg');
        header('Content-Disposition: attachment; filename="' . $nama_file . '"');
        imagejpeg($image); // Output gambar ke browser
        imagedestroy($image);
    }
    

    public function simpan_dari_excel()
{
    $data_import = $this->session->userdata('data_import');

    if (!empty($data_import)) {
        foreach ($data_import as $data) {
            // Pastikan semua field tersedia
            $this->db->insert('request_specimen', [
                'nama'     => $data['nama'],
                'jabatan'  => $data['jabatan'],
                'pangkat'  => $data['pangkat'],
                'instansi' => $data['instansi'] ?? '', // pastikan kolom ini sudah ada di DB
            ]);
        }

        $this->session->set_flashdata('msg', 'Data berhasil disimpan ke database.');
    } else {
        $this->session->set_flashdata('msg', 'Tidak ada data yang disimpan.');
    }

    // Redirect ke halaman tabel data specimen
    redirect('index.php/specimen/Specimen/data_specimen');
}

public function do_edit_specimen()
    {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan'),
            'pangkat' => $this->input->post('pangkat')
        ];

        $this->db->where('id', $id);
        $this->db->update('request_specimen', $data);

        // Redirect ke halaman data_specimen setelah update
        $this->session->set_flashdata('success', 'Data berhasil diubah!');
        redirect('index.php/specimen/Specimen/data_specimen');
    }


public function delete_specimen($id)
{
    $this->db->where('id', $id);
    $this->db->delete('request_specimen');

    $this->session->set_flashdata('success', 'Data specimen berhasil dihapus.');
    redirect('index.php/specimen/Specimen/data_specimen');
}


}
