<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
        $d['data_inaktif'] = $this->db->query("
            SELECT 
                a.id,
                a.is_arsip,
                a.tgl_isi,
                a.unit_kerja,
                e.kode_arsip AS kode_klasifikasi,
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
            JOIN kode_arsip e ON e.id = a.kode_arsip_id
            GROUP BY a.id
            ORDER BY a.tgl_isi DESC
        ")->result_array();

        $this->load->view('Daftar_in/daftar_inaktif', $d);
    }

    // =======================
    // SIMPAN DATA INAKTIF
    // =======================
public function do_edit_arsip()
{
    $id = $this->input->post('id');
    $data = [
        'tgl_isi' => $this->input->post('tgl_isi'),
        'unit_kerja' => $this->input->post('unit_kerja'),
        'kode_arsip_id' => $this->input->post('kode_arsip_id'),
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
            'is_arsip'         => $this->input->post('is_arsip'),
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

            $this->session->set_flashdata('success_daftar', 'Data arsip inaktif berhasil ditambahkan!');
            redirect('index.php/cdaftar_inaktif/Daftar/daftar_inaktif');
        }
    }
}
