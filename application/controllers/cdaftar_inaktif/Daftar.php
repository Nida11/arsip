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
    GROUP_CONCAT(DISTINCT d.arsip ORDER BY d.id SEPARATOR '||') AS jenis_arsip,
    a.uraian_masalah,
    a.tahun,
    a.jumlah,
    a.nomor_sampul,
    a.nomor_box,
    a.nomor_rak,
    a.keterangan,
    a.tk
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
            a.keterangan,
            a.tk
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
            'Keterangan',
            'Tingkat Perkembangan'
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
            'keterangan' => $this->input->post('keterangan'),
             'tk' => $this->input->post('tk')

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


public function do_input_inaktif1()
{
    // Ambil data utama dari form
    $data_inaktif = [
        'tgl_isi'        => $this->input->post('tgl_isi'),
        'unit_kerja'     => $this->input->post('unit_kerja'),
        'kode_arsip_id'  => $this->input->post('kode_arsip_id'),
        'tahun'          => $this->input->post('tahun'),
        'jumlah'         => $this->input->post('jumlah'),
        'nomor_sampul'   => $this->input->post('nomor_sampul'),
        'nomor_box'      => $this->input->post('nomor_box'),
        'nomor_rak'      => $this->input->post('nomor_rak'),
        'keterangan'     => $this->input->post('keterangan'),
        'tk'             => $this->input->post('tk'),
    ];

    // Simpan ke tabel utama
    $this->db->insert('daftar_arsip_inaktif', $data_inaktif);
    $inaktif_id = $this->db->insert_id();

    if ($inaktif_id) {

        // Simpan detail jenis arsip
        $jenis_list = $this->input->post('arsip');
        if (!empty($jenis_list)) {
            foreach ($jenis_list as $jenis) {
                $this->db->insert('daftar_arsip_inaktif_detail', [
                    'daftar_inaktif_id' => $inaktif_id,
                    'arsip'             => $jenis
                ]);
            }
        }

        // ============================
        // 1. AMBIL DATA UTAMA
        // ============================
        $data_main = $this->db->get_where('daftar_arsip_inaktif', [
            'id' => $inaktif_id
        ])->row();

        // ============================
        // 2. AMBIL LIST JENIS ARSIP
        // ============================
        $jenis = $this->db
            ->select("GROUP_CONCAT(arsip SEPARATOR '\n') AS list")
            ->from('daftar_arsip_inaktif_detail')
            ->where('daftar_inaktif_id', $inaktif_id)
            ->get()->row();

        // ============================
        // 3. SUSUN TEXT QR
        // ============================
        $qr_text =
            "ARSIP ID : $inaktif_id\n" .
            "Tanggal Isi : " . $data_main->tgl_isi . "\n" .
            "Unit Kerja : " . $data_main->unit_kerja . "\n" .
            "Kode Arsip : " . $data_main->kode_arsip_id . "\n" .
            "Tahun : " . $data_main->tahun . "\n" .
            "Jumlah : " . $data_main->jumlah . "\n" .
            "Nomor Sampul : " . $data_main->nomor_sampul . "\n" .
            "Nomor Box : " . $data_main->nomor_box . "\n" .
            "Nomor Rak : " . $data_main->nomor_rak . "\n" .
            "Keterangan : " . $data_main->keterangan . "\n" .
            "TK : " . $data_main->tk . "\n\n" .
            "DAFTAR ARSIP:\n" . $jenis->list;

        // ============================
        // 4. GENERATE QR CODE
        // ============================
        $this->load->library('qr');

        $qr_filename = "qr_" . $inaktif_id . ".png";
        $qr_fullpath = $this->qr->generate($qr_filename, $qr_text);

        // ============================
        // 5. GENERATE PDF LABEL (QR SAJA)
        // ============================
        $pdf_filename = "label_" . $inaktif_id . ".pdf";
        $pdf_path = FCPATH . "uploads/label/" . $pdf_filename;

        if (!is_dir(FCPATH . "uploads/label/")) {
            mkdir(FCPATH . "uploads/label/", 0777, true);
        }

        // generate_pdf_label($qr_image, $output_file)
        $this->qr->generate_pdf_label($qr_fullpath, $pdf_path);

        // ============================
        // 6. UPDATE DB
        // ============================
        $this->db->where('id', $inaktif_id);
        $this->db->update('daftar_arsip_inaktif', [
            'qr_code'  => $qr_filename,
            'pdf_label' => $pdf_filename
        ]);

        $this->session->set_flashdata('success_msg', 'Data arsip inaktif + QR berhasil dibuat!');
        redirect('index.php/cdaftar_inaktif/Daftar/daftar_inaktif');
    }
}



public function do_input_inaktif()
{
    // Ambil data utama dari form
    $data_inaktif = [
        'tgl_isi'        => $this->input->post('tgl_isi'),
        'unit_kerja'     => $this->input->post('unit_kerja'),
        'kode_arsip_id'  => $this->input->post('kode_arsip_id'),
        'tahun'          => $this->input->post('tahun'),
        'jumlah'         => $this->input->post('jumlah'),
        'nomor_sampul'   => $this->input->post('nomor_sampul'),
        'nomor_box'      => $this->input->post('nomor_box'),
        'nomor_rak'      => $this->input->post('nomor_rak'),
        'keterangan'     => $this->input->post('keterangan'),
        'tk'             => $this->input->post('tk'),
    ];

    // Simpan ke tabel utama
    $this->db->insert('daftar_arsip_inaktif', $data_inaktif);
    $inaktif_id = $this->db->insert_id();

    if ($inaktif_id) {

        // Simpan detail jenis arsip
        $jenis_list = $this->input->post('arsip');
        if (!empty($jenis_list)) {
            foreach ($jenis_list as $jenis) {
                $this->db->insert('daftar_arsip_inaktif_detail', [
                    'daftar_inaktif_id' => $inaktif_id,
                    'arsip'             => $jenis
                ]);
            }
        }

        // ============================
        // 1. AMBIL DATA UTAMA
        // ============================
        $data_main = $this->db->get_where('daftar_arsip_inaktif', [
            'id' => $inaktif_id
        ])->row();

        // ============================
        // 2. AMBIL LIST JENIS ARSIP
        // ============================
        $jenis = $this->db
            ->select("GROUP_CONCAT(arsip SEPARATOR '\n') AS list")
            ->from('daftar_arsip_inaktif_detail')
            ->where('daftar_inaktif_id', $inaktif_id)
            ->get()->row();

        // ============================
        // 3. SUSUN TEXT QR
        // ============================
$qr_text = rtrim(base_url(), '/') . "/index.php/cdaftar_inaktif/Daftar/scan/" . $inaktif_id;

        // ============================
        // 4. GENERATE QR CODE
        // ============================
        $this->load->library('qr');

        $qr_filename = "qr_" . $inaktif_id . ".png";
        $qr_fullpath = $this->qr->generate($qr_filename, $qr_text);

        // ============================
        // 5. GENERATE PDF LABEL (QR SAJA)
        // ============================
        $pdf_filename = "label_" . $inaktif_id . ".pdf";
        $pdf_path = FCPATH . "uploads/label/" . $pdf_filename;

        if (!is_dir(FCPATH . "uploads/label/")) {
            mkdir(FCPATH . "uploads/label/", 0777, true);
        }

        // generate_pdf_label($qr_image, $output_file)
        $this->qr->generate_pdf_label($qr_fullpath, $pdf_path);

        // ============================
        // 6. UPDATE DB
        // ============================
        $this->db->where('id', $inaktif_id);
        $this->db->update('daftar_arsip_inaktif', [
            'qr_code'  => $qr_filename,
            'pdf_label' => $pdf_filename
        ]);

        $this->session->set_flashdata('success_msg', 'Data arsip inaktif + QR berhasil dibuat!');
        redirect('index.php/cdaftar_inaktif/Daftar/daftar_inaktif');
    }
}

public function scan($id)
{
    // Ambil data utama
    $d['main'] = $this->db->get_where('daftar_arsip_inaktif', [
        'id' => $id
    ])->row();

    if (!$d['main']) {
        show_404();
    }

    // Ambil list arsip detail
    $d['detail'] = $this->db
        ->get_where('daftar_arsip_inaktif_detail', [
            'daftar_inaktif_id' => $id
        ])->result();

    // Load view
    $this->load->view('Daftar_in/scan', $d);
}



public function download_label($id)
{
    // Ambil data dari DB
    $data = $this->db->get_where('daftar_arsip_inaktif', ['id' => $id])->row();

    if (!$data || !$data->pdf_label) {
        show_404();
    }

    $file_path = FCPATH . "uploads/label/" . $data->pdf_label;

    if (!file_exists($file_path)) {
        show_404();
    }

    // Force Download
    $this->load->helper('download');
    force_download($file_path, NULL);
}


public function test_tcpdf()
{
    require_once APPPATH.'third_party/tcpdf/tcpdf.php';

    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Write(0, 'TCPDF berhasil dipasang!');
    $pdf->Output('test.pdf', 'I');
}

public function testqr()
{
    $this->load->library('qr');
    $this->qr->generate("test.png", "TEST QR");
    echo "QR OK";
}


}
