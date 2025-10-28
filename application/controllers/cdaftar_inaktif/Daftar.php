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

    // =======================
    // TAMPIL DATA INAKTIF
    // =======================

    public function daftar_inaktif()
    {
        // 🟢 Hapus flash message lama supaya tidak muncul saat refresh
        $this->session->unset_userdata(['success_msg']);
        // Ambil semua parameter pencarian dari GET
        $search = $this->input->get();

        $where = [];

        if (!empty($search['unit_kerja'])) {
            $where[] = "a.unit_kerja LIKE '%" . $this->db->escape_like_str($search['unit_kerja']) . "%'";
        }
        if (!empty($search['uraian_masalah'])) {
            $where[] = "a.uraian_masalah LIKE '%" . $this->db->escape_like_str($search['uraian_masalah']) . "%'";
        }
        if (!empty($search['tahun'])) {
            $where[] = "a.tahun LIKE '%" . $this->db->escape_like_str($search['tahun']) . "%'";
        }

        $where_sql = !empty($where) ? "WHERE " . implode(" AND ", $where) : "";

        $sql = "
        SELECT 
            a.id,
            a.tgl_isi,
            a.unit_kerja,
            e.kode_surat AS kode_klasifikasi,
            GROUP_CONCAT(d.jenis_arsip SEPARATOR ', ') AS jenis_arsip,
            a.uraian_masalah,
            a.tahun,
            a.jumlah,
            a.nomor_sampul,
            a.nomor_box,
            a.nomor_rak,
            a.keterangan
        FROM daftar_arsip_inaktif a
        LEFT JOIN daftar_arsip_inaktif_detail d ON a.id = d.daftar_inaktif_id
        JOIN kode_klasifikasi e ON e.id = a.kode_arsip_id
        $where_sql
        GROUP BY a.id
        ORDER BY a.tgl_isi DESC
        ";

        $d['data_inaktif'] = $this->db->query($sql)->result_array();

        $this->load->view('Daftar_in/daftar_inaktif', $d);
    }

    public function export_excel_inaktif()
    {
        $search = $this->input->get();
        $where = [];

        if (!empty($search['unit_kerja'])) {
            $where[] = "a.unit_kerja LIKE '%" . $this->db->escape_like_str($search['unit_kerja']) . "%'";
        }
        if (!empty($search['uraian_masalah'])) {
            $where[] = "a.uraian_masalah LIKE '%" . $this->db->escape_like_str($search['uraian_masalah']) . "%'";
        }
        if (!empty($search['tahun'])) {
            $where[] = "a.tahun LIKE '%" . $this->db->escape_like_str($search['tahun']) . "%'";
        }

        $where_sql = !empty($where) ? "WHERE " . implode(" AND ", $where) : "";

        $sql = "
        SELECT 
            a.id,
            a.tgl_isi,
            a.unit_kerja,
            e.kode_surat AS kode_klasifikasi,
            a.uraian_masalah,
            a.tahun,
            a.jumlah,
            a.nomor_sampul,
            a.nomor_box,
            a.nomor_rak,
            a.keterangan
        FROM daftar_arsip_inaktif a
        LEFT JOIN daftar_arsip_inaktif_detail d ON a.id = d.daftar_inaktif_id
        JOIN kode_klasifikasi e ON e.id = a.kode_arsip_id
        $where_sql
        GROUP BY a.id
        ORDER BY a.tgl_isi DESC
        ";

        $data = $this->db->query($sql)->result_array();

        // === Export ke Excel ===
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $headers = [
            'ID',
            'Tanggal Isi',
            'Unit Kerja',
            'Kode Klasifikasi',
            'Uraian Masalah',
            'Tahun',
            'Jumlah',
            'Nomor Sampul',
            'Nomor Box',
            'Nomor Rak',
            'Keterangan'
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
        $filename = 'Daftar_Arsip_Inaktif.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    // =======================
    // 🟢 TAMBAHAN: FORM EDIT (MENAMPILKAN KODE KLASIFIKASI)
    // =======================
    public function edit_arsip($id)
    {
        // Ambil data arsip berdasarkan id
        $data['arsip'] = $this->db->get_where('daftar_arsip_inaktif', ['id' => $id])->row();

        // Ambil semua kode klasifikasi untuk dropdown
        $data['kode'] = $this->db->get('kode_klasifikasi')->result();

        // Load view edit (buat file: application/views/Daftar_in/edit_inaktif.php)
        $this->load->view('Daftar_in/edit_inaktif', $data);
    }
    // =======================


    // =======================
    // SIMPAN DATA EDIT INAKTIF
    // =======================
    public function do_edit_arsip()
    {
        $id = $this->input->post('id');

        // 🟢 Jika kode klasifikasi kosong, ambil dari data lama
        $kode_arsip_id = $this->input->post('kode_arsip_id');
        if (empty($kode_arsip_id)) {
            $lama = $this->db->get_where('daftar_arsip_inaktif', ['id' => $id])->row();
            $kode_arsip_id = $lama->kode_arsip_id;
        }

        $data = [
            'tgl_isi' => $this->input->post('tgl_isi'),
            'unit_kerja' => $this->input->post('unit_kerja'),
            'kode_arsip_id' => $kode_arsip_id, // 🟢 pakai yang baru atau lama
            'uraian_masalah' => $this->input->post('uraian_masalah'),
            'tahun' => $this->input->post('tahun'),
            'jumlah' => $this->input->post('jumlah'),
            'nomor_sampul' => $this->input->post('nomor_sampul'),
            'nomor_box' => $this->input->post('nomor_box'),
            'nomor_rak' => $this->input->post('nomor_rak'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->where('id', $id);
        $this->db->update('daftar_arsip_inaktif', $data);

        $this->session->set_flashdata('success_edit', 'Data arsip berhasil diperbarui!');
        redirect('index.php/cdaftar_inaktif/Daftar/daftar_inaktif');
    }

    public function do_delete_arsip($id)
    {
        $this->db->delete('daftar_arsip_inaktif', ['id' => $id]);
        $this->session->set_flashdata('success_edit', 'Data arsip berhasil dihapus!');
        redirect('index.php/cdaftar_inaktif/Daftar/daftar_inaktif');
    }

    public function do_input_inaktif()
    {
        // Ambil data utama dari form
        $data_inaktif = [
            'tgl_isi'          => $this->input->post('tgl_isi'),
            'unit_kerja'       => $this->input->post('unit_kerja'),
            'kode_arsip_id'    => $this->input->post('kode_arsip_id'),
            'uraian_masalah'   => $this->input->post('uraian_masalah'),
            'tahun'            => $this->input->post('tahun'),
            'jumlah'           => $this->input->post('jumlah'),
            'nomor_sampul'     => $this->input->post('nomor_sampul'),
            'nomor_box'        => $this->input->post('nomor_box'),
            'nomor_rak'        => $this->input->post('nomor_rak'),
            'keterangan'       => $this->input->post('keterangan')
        ];

        // Simpan ke tabel utama
        $this->db->insert('daftar_arsip_inaktif', $data_inaktif);
        $inaktif_id = $this->db->insert_id();

        // Simpan ke tabel detail jika ada jenis arsip
        if ($inaktif_id) {
            $jenis_list = $this->input->post('jenis_arsip');
            if (!empty($jenis_list)) {
                foreach ($jenis_list as $jenis) {
                    $data_detail = [
                        'daftar_inaktif_id' => $inaktif_id,
                        'jenis_arsip'       => $jenis
                    ];
                    $this->db->insert('daftar_arsip_inaktif_detail', $data_detail);
                }
            }

            $this->session->set_flashdata('success_msg', 'Data arsip inaktif berhasil ditambahkan!');
            redirect('index.php/cdaftar_inaktif/Daftar/daftar_inaktif');
        }
    }
}
