<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Daftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function data_daftar()
    {

        // 🟢 Hapus flash message lama supaya tidak muncul saat refresh
        $this->session->unset_userdata(['success_msg']);
        // Ambil semua parameter pencarian dari GET
        $search = $this->input->get();

        $where = [];

        if (!empty($search['pencipta_arsip'])) {
            $where[] = "a.pencipta_arsip LIKE '%" . $this->db->escape_like_str($search['pencipta_arsip']) . "%'";
        }
        if (!empty($search['asal_arsip'])) {
            $where[] = "a.asal_arsip LIKE '%" . $this->db->escape_like_str($search['asal_arsip']) . "%'";
        }
        if (!empty($search['nomor_arsip'])) {
            $where[] = "a.nomor_arsip LIKE '%" . $this->db->escape_like_str($search['nomor_arsip']) . "%'";
        }
        if (!empty($search['retensi_arsip'])) {
            $where[] = "a.retensi_arsip LIKE '%" . $this->db->escape_like_str($search['retensi_arsip']) . "%'";
        }

        $where_sql = !empty($where) ? "WHERE " . implode(" AND ", $where) : "";


        // Data arsip utama
        $sql = "
        SELECT 
        a.id, 
        a.tgl_isi, 
        a.pencipta_arsip, 
        a.asal_arsip, 
        e.kode_surat, 
        e.ket, 
        a.nomor_arsip, 
        a.retensi_arsip, 
        a.lokasi_simpan, 
        a.metode_perlindungan
        FROM daftar_arsip a
        LEFT JOIN kode_klasifikasi e ON e.id = a.kode_arsip_id
         $where_sql
        ORDER BY a.tgl_isi DESC";


        $d['data_arsip'] = $this->db->query($sql)->result_array();

        // Ambil semua detail (jenis + file)
        $details = $this->db->get('daftar_arsip_detail')->result_array();

        // Kelompokkan detail per arsip_id
        $detail_map = [];
        foreach ($details as $drow) {
            $detail_map[$drow['daftar_arsip_id']][] = $drow;
        }

        $d['detail_map'] = $detail_map;

        $this->load->view('Daftar/data_daftar', $d);
    }

    public function export_excel_vital()
    {
        $search = $this->input->get();
        $where = [];

        if (!empty($search['pencipta_arsip'])) {
            $where[] = "a.pencipta_arsip LIKE '%" . $this->db->escape_like_str($search['pencipta_arsip']) . "%'";
        }
        if (!empty($search['asal_arsip'])) {
            $where[] = "a.asal_arsip LIKE '%" . $this->db->escape_like_str($search['asal_arsip']) . "%'";
        }
        if (!empty($search['nomor_arsip'])) {
            $where[] = "a.nomor_arsip LIKE '%" . $this->db->escape_like_str($search['nomor_arsip']) . "%'";
        }
        if (!empty($search['retensi_arsip'])) {
            $where[] = "a.retensi_arsip LIKE '%" . $this->db->escape_like_str($search['retensi_arsip']) . "%'";
        }
        $where_sql = !empty($where) ? "WHERE " . implode(" AND ", $where) : "";

        $sql = "
        SELECT 
        a.id, 
        a.tgl_isi, 
        a.pencipta_arsip, 
        a.asal_arsip, 
        e.kode_surat, 
        e.ket, 
        a.nomor_arsip, 
        a.retensi_arsip, 
        a.lokasi_simpan, 
        a.metode_perlindungan
        FROM daftar_arsip a
        LEFT JOIN kode_klasifikasi e ON e.id = a.kode_arsip_id
         $where_sql
        ORDER BY a.tgl_isi DESC";
        $data = $this->db->query($sql)->result_array();

        // === Export ke Excel ===
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $headers = [
            'ID',
            'Tanggal Isi',
            'Pencipta Arsip',
            'Asal Arsip',
            'Kode Klasifikasi',
            'Keterangan',
            'Nomor Arsip',
            'Retensi Arsip',
            'Lokasi Simpan',
            'Metode Perlindungan'
        ];

        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // Isi data
        $rowNum = 2;
        foreach ($data as $row) {
            $col = 'A';
            foreach ($row as $cell) {
                $sheet->setCellValue($col . $rowNum, $cell);
                $col++;
            }
            $rowNum++;
        }

        // Output Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'Daftar_Arsip_Vital.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }


    public function do_input_arsip()
    {
        // Ambil data dari form utama
        $data_arsip = [
            'tgl_isi'             => $this->input->post('tgl_isi'),
            'pencipta_arsip'      => $this->input->post('pencipta_arsip'),
            'asal_arsip'          => $this->input->post('asal_arsip'),
            'kode_arsip_id'       => $this->input->post('kode_arsip_id'),
            'nomor_arsip'         => $this->input->post('nomor_arsip'),
            'retensi_arsip'       => $this->input->post('retensi_arsip'),
            'lokasi_simpan'       => $this->input->post('lokasi_simpan'),
            'metode_perlindungan' => $this->input->post('metode_perlindungan'),
        ];

        // Insert ke tabel daftar_arsip
        $this->db->insert('daftar_arsip', $data_arsip);
        $arsip_id = $this->db->insert_id();

        if ($arsip_id) {
            // Ambil data detail dari form
            $jenis_arsip_list = $this->input->post('jenis_arsip');

            // pastikan folder upload ada
            $upload_path = './uploads/arsip/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true);
            }

            // Loop setiap jenis arsip dan file
            if (!empty($jenis_arsip_list)) {
                $count = count($jenis_arsip_list);

                // Load library upload sekali saja
                $this->load->library('upload');

                for ($i = 0; $i < $count; $i++) {
                    $uploaded_file_name = null;

                    // cek apakah ada file di index ini
                    if (!empty($_FILES['file_arsip']['name'][$i])) {
                        $_FILES['file_temp']['name']     = $_FILES['file_arsip']['name'][$i];
                        $_FILES['file_temp']['type']     = $_FILES['file_arsip']['type'][$i];
                        $_FILES['file_temp']['tmp_name'] = $_FILES['file_arsip']['tmp_name'][$i];
                        $_FILES['file_temp']['error']    = $_FILES['file_arsip']['error'][$i];
                        $_FILES['file_temp']['size']     = $_FILES['file_arsip']['size'][$i];

                        $config['upload_path']   = $upload_path;
                        $config['allowed_types'] = 'pdf|jpg|jpeg|png|doc|docx';
                        $config['max_size']      = 5120; // 5MB
                        $config['file_name']     = time() . '_' . $i . '_' . $_FILES['file_temp']['name'];

                        $this->upload->initialize($config); // reinit setiap iterasi

                        if ($this->upload->do_upload('file_temp')) {
                            $uploaded_data = $this->upload->data();
                            $uploaded_file_name = $uploaded_data['file_name'];
                        }
                    }

                    // Simpan ke tabel detail
                    $data_detail = [
                        'daftar_arsip_id' => $arsip_id,
                        'jenis_arsip'     => $jenis_arsip_list[$i],
                        'file_arsip'      => $uploaded_file_name // kolom baru
                    ];

                    $this->db->insert('daftar_arsip_detail', $data_detail);
                }
            }

            $this->session->set_flashdata('success_message', 'Daftar arsip berhasil ditambahkan!');
            redirect('index.php/daftar/Daftar/data_daftar');
        } else {
            $this->session->set_flashdata('error_message', 'Gagal menambahkan daftar arsip.');
            redirect('index.php/daftar/Daftar/data_daftar');
        }
    }


    public function delete_arsip($id)
    {
        // Hapus data utama
        $this->db->where('id', $id);
        $this->db->delete('daftar_arsip');

        // Tambahkan pesan berhasil hapus
        $this->session->set_flashdata('success_message', 'Data arsip berhasil dihapus!');

        // Redirect kembali ke halaman daftar
        redirect('index.php/daftar/Daftar/data_daftar');
    }
    public function index()
    {
        // Ambil data dari tabel kode_klasifikasi
        $data['kode_klasifikasi'] = $this->db->get('kode_klasifikasi')->result_array();

        // Tampilkan ke view
        $this->load->view('daftar_arsip', $data);
    }

    public function update_arsip()
    {
        $id = $this->input->post('id');

        $data = [
            'tgl_isi'             => $this->input->post('tgl'),
            'pencipta_arsip'      => $this->input->post('pencipta'),
            'asal_arsip'          => $this->input->post('asal'),
            'kode_arsip_id'       => $this->input->post('kode'),
            'nomor_arsip'         => $this->input->post('nomor'),
            'retensi_arsip'       => $this->input->post('retensi'),
            'lokasi_simpan'       => $this->input->post('lokasi'),
            'metode_perlindungan' => $this->input->post('metode'),
        ];

        $this->db->where('id', $id);
        $this->db->update('data_arsip', $data);

        $this->session->set_flashdata('success_message', 'Data arsip berhasil diperbarui');
        redirect('Daftar/data_daftar');
    }
}
