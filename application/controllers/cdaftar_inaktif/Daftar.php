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
    e.id AS kode_arsip_id,
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

   
    
public function do_update_inaktif()
{
    $id = $this->input->post('id');

    if (!$id) {
        show_error("ID tidak ditemukan", 400);
    }

    // ================
    // 1. UPDATE DATA UTAMA
    // ================
    $data_update = [
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

    $this->db->where('id', $id)->update('daftar_arsip_inaktif', $data_update);

    // ================
    // 2. UPDATE DETAIL (hapus + buat baru)
    // ================
    $this->db->delete('daftar_arsip_inaktif_detail', ['daftar_inaktif_id' => $id]);

    $jenis_list = $this->input->post('arsip');
    if (!empty($jenis_list)) {
        foreach ($jenis_list as $arsip) {
            $this->db->insert('daftar_arsip_inaktif_detail', [
                'daftar_inaktif_id' => $id,
                'arsip' => $arsip
            ]);
        }
    }

    // ================
    // 3. AMBIL QR LAMA UNTUK DIHAPUS
    // ================
    $qr_data = $this->db->get_where('daftar_arsip_inaktif', ['id' => $id])->row();

    if ($qr_data) {
        if (!empty($qr_data->qr_code) && file_exists(FCPATH . "uploads/qr/" . $qr_data->qr_code)) {
            unlink(FCPATH . "uploads/qr/" . $qr_data->qr_code);
        }
        if (!empty($qr_data->pdf_label) && file_exists(FCPATH . "uploads/label/" . $qr_data->pdf_label)) {
            unlink(FCPATH . "uploads/label/" . $qr_data->pdf_label);
        }
    }

    // ================
    // 4. GENERATE QR BARU
    // ================
    $qr_text = rtrim(base_url(), '/') . "/index.php/cdaftar_inaktif/Daftar/scan/" . $id;

    $this->load->library('qr');

    $qr_filename = "qr_" . $id . ".png";
    $qr_fullpath = $this->qr->generate($qr_filename, $qr_text);

    // ================
    // 5. GENERATE PDF LABEL BARU
    // ================
    $pdf_filename = "label_" . $id . ".pdf";
    $pdf_path = FCPATH . "uploads/label/" . $pdf_filename;

    if (!is_dir(FCPATH . "uploads/label/")) {
        mkdir(FCPATH . "uploads/label/", 0777, true);
    }

    $this->qr->generate_pdf_label($qr_fullpath, $pdf_path);

    // ================
    // 6. UPDATE DB (QR & PDF barunya)
    // ================
    $this->db->where('id', $id);
    $this->db->update('daftar_arsip_inaktif', [
        'qr_code'  => $qr_filename,
        'pdf_label' => $pdf_filename
    ]);

    $this->session->set_flashdata('success_msg', 'Data arsip berhasil diperbarui dan QR baru telah dibuat!');
    redirect('index.php/cdaftar_inaktif/Daftar/daftar_inaktif');
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

public function delete_inaktif($id)
{
    if (!$id) {
        show_error("ID tidak ditemukan", 400);
    }

    // =====================
    // 1. AMBIL DATA UNTUK HAPUS QR & PDF
    // =====================
    $data = $this->db->get_where('daftar_arsip_inaktif', ['id' => $id])->row();

    if ($data) {
        // Hapus QR jika ada
        if (!empty($data->qr_code) && file_exists(FCPATH . "uploads/qr/" . $data->qr_code)) {
            unlink(FCPATH . "uploads/qr/" . $data->qr_code);
        }

        // Hapus PDF jika ada
        if (!empty($data->pdf_label) && file_exists(FCPATH . "uploads/label/" . $data->pdf_label)) {
            unlink(FCPATH . "uploads/label/" . $data->pdf_label);
        }
    }

    // =====================
    // 2. HAPUS DETAIL
    // =====================
    $this->db->delete('daftar_arsip_inaktif_detail', [
        'daftar_inaktif_id' => $id
    ]);

    // =====================
    // 3. HAPUS DATA UTAMA
    // =====================
    $this->db->delete('daftar_arsip_inaktif', ['id' => $id]);

    // =====================
    // 4. NOTIFIKASI & REDIRECT
    // =====================
    $this->session->set_flashdata('success_msg', 'Data arsip berhasil dihapus!');
    redirect('index.php/cdaftar_inaktif/Daftar/daftar_inaktif');
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

public function get_detail_series()
{
    $id = $this->input->post('id');

    $data = $this->db->get_where('daftar_arsip_inaktif_detail', [
        'daftar_inaktif_id' => $id
    ])->result();

    echo json_encode($data);
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
