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


// ---------- GANTI process_excel() DENGAN INI ----------
public function process_excel()
{
    if (empty($_FILES['file']['name'])) {
        show_error('Tidak ada file yang diupload.');
        return;
    }

    $config['upload_path']   = './uploads/';
    $config['allowed_types'] = 'xls|xlsx';
    $config['max_size']      = 2048;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('file')) {
        show_error($this->upload->display_errors());
        return;
    }

    $file_data  = $this->upload->data();
    $file_path  = './uploads/' . $file_data['file_name'];

    // Simpan nama file excel ke session (tanpa path)
    $this->session->set_userdata('uploaded_excel_name', $file_data['client_name']);

    require_once(APPPATH . '../vendor/autoload.php');

    try {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file_path);
        $sheet       = $spreadsheet->getActiveSheet();
        $rows        = $sheet->toArray();

        $data_import = [];

        foreach ($rows as $index => $row) {
            if ($index == 0) continue; // header

            $jabatan  = isset($row[0]) ? trim($row[0]) : '';
            $instansi = isset($row[1]) ? trim($row[1]) : '';
            $nama     = isset($row[2]) ? trim($row[2]) : '';
            $pangkat  = isset($row[3]) ? trim($row[3]) : '';

            if ($nama != '') {
                // cek di DB apakah nama sudah ada (case-insensitive)
                $cek = $this->db
                    ->where('LOWER(nama)', strtolower($nama))
                    ->get('request_specimen')
                    ->num_rows();

                $data_import[] = [
                    'nama'        => $nama,
                    'jabatan'     => $jabatan,
                    'instansi'    => $instansi,
                    'pangkat'     => $pangkat,
                    'is_duplicate'=> ($cek > 0) ? true : false // FLAG untuk view
                ];
            }
        }

        // simpan seluruh data (dengan flag) ke session supaya preview dan download_all_images bisa baca
        $this->session->set_userdata('data_import', $data_import);

        // kirim view preview (dipanggil via AJAX)
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

// ---------- GANTI download_all_images() DENGAN INI ----------
public function download_all_images()
{
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $data_import = $this->session->userdata('data_import');

    if (empty($data_import)) {
        show_error('Data import tidak ditemukan.');
    }

    $template_path = FCPATH . 'assets/images/template_specimen.jpg';
    $font_path     = FCPATH . 'assets/fonts/calibri.ttf';

    if (!file_exists($template_path)) show_error('Template tidak ditemukan.');
    if (!file_exists($font_path))     show_error('Font tidak ditemukan.');

    $output_dir = realpath(FCPATH) . '/generated_specimen/';
    if (!is_dir($output_dir)) {
        mkdir($output_dir, 0777, true);
    }

    $file_list = [];
    $skipped = []; // nama yg dilewatkan karena duplicate

    foreach ($data_import as $index => $data) {
        $nama = $data['nama'];

        // cek duplicate lagi (jaga-jaga)
        $cek = $this->db->where('LOWER(nama)', strtolower($nama))->get('request_specimen')->num_rows();
        if ($cek > 0) {
            $skipped[] = $nama;
            continue; // skip pembuatan gambar & penyimpanan
        }

        // jika bukan duplicate -> buat gambar dan simpan
        $image = imagecreatefromjpeg($template_path);
        $black = imagecolorallocate($image, 0, 0, 0);

        $jabatan  = $data['jabatan'];
        $instansi = rtrim($data['instansi']);
        if (substr($instansi, -1) !== ',') {
            $instansi .= ',';
        }
        $pangkat  = $data['pangkat'];

        $slug_nama = url_title($nama, '_', true);
        $filename  = 'specimen_' . $slug_nama . '.jpeg';
        $filepath  = $output_dir . $filename;

        // (Sisipkan kode penulisan teks ke image di sini — bisa copy paste dari versi lama)
        // contoh sederhana:
        imagettftext($image, 110, 0, 977, 390, $black, $font_path, $jabatan);
        // auto wrap instansi (pakai fungsi yg sama seperti sebelumnya)
        $lines = []; $max_width = 2300; $current_line = ""; $words = explode(" ", $instansi);
        foreach ($words as $word) {
            $test_line = trim($current_line . " " . $word);
            $box = imagettfbbox(110, 0, $font_path, $test_line);
            $text_width = $box[2] - $box[0];
            if ($text_width > $max_width) {
                $lines[] = trim($current_line);
                $current_line = $word;
            } else {
                $current_line = $test_line;
            }
        }
        if (!empty($current_line)) $lines[] = trim($current_line);
        $y = 540; $line_height = 130;
        foreach ($lines as $line) {
            imagettftext($image, 110, 0, 977, $y, $black, $font_path, $line);
            $y += $line_height;
        }
        imagettftext($image, 110, 0, 977, 970, $black, $font_path, $nama);
        imagettftext($image, 110, 0, 977, 1120, $black, $font_path, $pangkat);

        imagejpeg($image, $filepath, 100);
        imagedestroy($image);

        // simpan ke DB
        $this->db->insert('request_specimen', [
            'nama'     => $nama,
            'jabatan'  => $jabatan,
            'instansi' => $instansi,
            'pangkat'  => $pangkat,
            'file'     => 'generated_specimen/' . $filename
        ]);

        $file_list[] = $filepath;
    }

    // buat ZIP hanya kalau ada file
    if (empty($file_list)) {
        // tidak ada yang dibuat (semua duplicate)
        $this->session->set_flashdata('error', 'Tidak ada file dibuat. Semua entri sudah ada di database.');
        // simpan daftar skipped agar bisa tampil di halaman data_specimen (opsional)
        $this->session->set_userdata('specimen_skipped', $skipped);
        redirect('index.php/specimen/Specimen/data_specimen');
        return;
    }

    $original_filename = $this->session->userdata('uploaded_excel_name') ?? 'specimen_all.xlsx';
    $zip_basename      = pathinfo($original_filename, PATHINFO_FILENAME);
    $zip_name          = $zip_basename . '.zip';
    $zip_path          = $output_dir . $zip_name;

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
        @unlink($file);
    }

    // Set flash message tentang skipped (jika ada)
    if (!empty($skipped)) {
        $this->session->set_flashdata('warning', 'Beberapa nama sudah ada dan dilewatkan: ' . implode(', ', $skipped));
    } else {
        $this->session->set_flashdata('msg', 'Specimen berhasil dibuat dan didownload.');
    }

    // Download ZIP
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . $zip_name . '"');
    header('Content-Length: ' . filesize($zip_path));
    readfile($zip_path);

    // Hapus file zip setelah dikirim
    @unlink($zip_path);

    // Hapus session nama file excel (opsional)
    $this->session->unset_userdata('uploaded_excel_name');
    // Dan kosongkan data_import jika mau
    $this->session->unset_userdata('data_import');
    exit;
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
            redirect('index.php/specimen/Specimen/download_all_images');
        }

        // Ambil data dari DB
        $data = $this->db->get_where('request_specimen', ['id' => $id])->row_array();

        if (!$data) {
            show_error('Data tidak ditemukan.');
        }

        $template_path = FCPATH . 'assets/images/template_specimen.jpg';
        $font_path     = FCPATH . 'assets/fonts/calibri.ttf';

        if (!file_exists($template_path)) show_error('Template tidak ditemukan.');
        if (!file_exists($font_path))     show_error('Font tidak ditemukan.');

        $jabatan  = $data['jabatan'];
            $instansi = rtrim($data['instansi']); 
                if (substr($instansi, -1) !== ',') {
                    $instansi .= ',';  // ➜ otomatis tambah koma
                }

        $nama     = $data['nama'];
        $pangkat  = $data['pangkat'];


        // Buat gambar dari template
        $image = imagecreatefromjpeg($template_path);
        $instansi = $data['instansi'];

// tambahkan koma otomatis
if (substr(trim($instansi), -1) !== ',') {
    $instansi .= ',';
}

// Hitung panjang teks
$box = imagettfbbox(110, 0, $font_path, $instansi);
$text_width = $box[2] - $box[0];

// Lebar template saat ini
$tpl_width  = imagesx($image);
$tpl_height = imagesy($image);

// Batas minimal margin kanan
$min_margin = 300;

// Jika teks kepanjangan
if ($text_width + $min_margin > $tpl_width) {

    // hitung lebar baru template
    $new_width = $text_width + $min_margin;

    // buat canvas baru yang lebih lebar
    $new_canvas = imagecreatetruecolor($new_width, $tpl_height);

    // isi background putih
    $white = imagecolorallocate($new_canvas, 255, 255, 255);
    imagefilledrectangle($new_canvas, 0, 0, $new_width, $tpl_height, $white);

    // **resize template PNG agar melebar**
    imagecopyresampled(
        $new_canvas,   // canvas baru
        $image,        // template lama
        0, 0,
        0, 0,
        $new_width,    // width baru
        $tpl_height,   // height tetap
        $tpl_width,    // width lama
        $tpl_height    // height lama
    );

    // ganti image ke template baru
    $image = $new_canvas;
}

        $black = imagecolorallocate($image, 0, 0, 0);


        if (stripos($instansi, 'BADAN PENDAPATAN DAERAH PROVINSI JAWA BARAT') === false) {
            imagettftext($image, 110, 0, 977, 390, $black, $font_path, $jabatan);
// -----------------------------
// AUTO WRAP INSTANSI
// -----------------------------

$lines = [];
$max_width = 2300; // batas lebar area teks (sesuaikan jika perlu)
$current_line = "";
$words = explode(" ", $instansi);

foreach ($words as $word) {
    $test_line = trim($current_line . " " . $word);

    // cek lebar line sementara
    $box = imagettfbbox(110, 0, $font_path, $test_line);
    $text_width = $box[2] - $box[0];

    if ($text_width > $max_width) {
        // simpan baris dan mulai baris baru
        $lines[] = trim($current_line);
        $current_line = $word;
    } else {
        $current_line = $test_line;
    }
}

if (!empty($current_line)) {
    $lines[] = trim($current_line);
}

// -----------------------------
// TULIS INSTANSI DENGAN LINE BREAK
// -----------------------------

$y = 540;        // posisi baris pertama
$line_height = 130; // jarak antar baris

foreach ($lines as $line) {
    imagettftext($image, 110, 0, 977, $y, $black, $font_path, $line);
    $y += $line_height;
}

            imagettftext($image, 110, 0, 977, 970, $black, $font_path, $nama);
            imagettftext($image, 110, 0, 977, 1120, $black, $font_path, $pangkat);
            // imagettftext($image, 110, 0, 977, 540, $black, $font_path, 'BADAN PENDAPATAN DAERAH PROVINSI JAWA BARAT');
        } else {
            imagettftext($image, 110, 0, 977, 390, $black, $font_path, $jabatan);
// -----------------------------
// AUTO WRAP INSTANSI
// -----------------------------

$lines = [];
$max_width = 2300; // batas lebar area teks (sesuaikan jika perlu)
$current_line = "";
$words = explode(" ", $instansi);

foreach ($words as $word) {
    $test_line = trim($current_line . " " . $word);

    // cek lebar line sementara
    $box = imagettfbbox(110, 0, $font_path, $test_line);
    $text_width = $box[2] - $box[0];

    if ($text_width > $max_width) {
        // simpan baris dan mulai baris baru
        $lines[] = trim($current_line);
        $current_line = $word;
    } else {
        $current_line = $test_line;
    }
}

if (!empty($current_line)) {
    $lines[] = trim($current_line);
}

// -----------------------------
// TULIS INSTANSI DENGAN LINE BREAK
// -----------------------------

$y = 540;        // posisi baris pertama
$line_height = 130; // jarak antar baris

foreach ($lines as $line) {
    imagettftext($image, 110, 0, 977, $y, $black, $font_path, $line);
    $y += $line_height;
}

            imagettftext($image, 110, 0, 977, 970, $black, $font_path, $nama);
            imagettftext($image, 110, 0, 977, 1120, $black, $font_path, $pangkat);
        }

        // Nama file download
        $slug_nama = url_title($data['nama'], '_', true);
        $nama_file = 'specimen_' . $slug_nama . '.jpeg';

        // Header download
        header('Content-Type: image/jpeg');
        header('Content-Disposition: attachment; filename="' . $nama_file . '"');
        imagejpeg($image); // Output gambar ke browser
        imagedestroy($image);
        exit;
    }


    public function proses_input_manual()
    
    {
        
        $data_manual = [];
        $nama     = $this->input->post('nama');
        $jabatan  = $this->input->post('jabatan');
        $pangkat  = $this->input->post('pangkat');
        $instansi = $this->input->post('instansi');

        for ($i = 0; $i < count($nama); $i++) {
                // 🔴 CEK DUPLIKAT (TAMBAHAN)
    $cek = $this->db->get_where('request_specimen', ['nama' => $nama[$i]])->num_rows();
    if ($cek > 0) {
        $this->session->set_flashdata('error', "Nama {$nama[$i]} sudah ada dan tidak dapat ditambahkan.");
        redirect('index.php/specimen/Specimen/data_specimen');
        return;
    }
            $data_manual[] = [
                'nama'     => $nama[$i],
                'jabatan'  => $jabatan[$i],
                'pangkat'  => $pangkat[$i],
                'instansi' => $instansi[$i]
            ];
        }

        $this->session->set_userdata('data_import', $data_manual);
        $this->session->set_userdata('uploaded_excel_name', 'input_manual.xlsx');
        redirect('index.php/specimen/Specimen/download_all_images');
    }


public function simpan_dari_excel()
{
    $data_import = $this->session->userdata('data_import');

    if (!empty($data_import)) {
        $skipped = [];
        $saved = 0;
        foreach ($data_import as $data) {
            if (!empty($data['is_duplicate'])) {
                $skipped[] = $data['nama'];
                continue;
            }
            // double-check DB just in case
            $cek = $this->db->where('LOWER(nama)', strtolower($data['nama']))->get('request_specimen')->num_rows();
            if ($cek > 0) {
                $skipped[] = $data['nama'];
                continue;
            }
            $this->db->insert('request_specimen', [
                'nama'     => $data['nama'],
                'jabatan'  => $data['jabatan'],
                'pangkat'  => $data['pangkat'],
                'instansi' => $data['instansi'] ?? '',
            ]);
            $saved++;
        }

        $msg = "$saved data berhasil disimpan.";
        if (!empty($skipped)) $msg .= " Terlewat karena sudah ada: " . implode(', ', $skipped);
        $this->session->set_flashdata('msg', $msg);
    } else {
        $this->session->set_flashdata('msg', 'Tidak ada data yang disimpan.');
    }

    redirect('index.php/specimen/Specimen/data_specimen');
}


    public function do_edit_specimen()
    {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan'),
            'pangkat' => $this->input->post('pangkat'),
            'instansi' => $this->input->post('instansi')
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

