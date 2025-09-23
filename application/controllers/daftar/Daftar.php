<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function data_daftar() {
        $this->load->view('Daftar/data_daftar');
    }

    public function do_input_arsip()
{
    // Ambil data dari form
    $data_arsip = [
        'is_arsip'            => $this->input->post('is_arsip'),
        'tgl_isi'             => $this->input->post('tgl_isi'),
        'pencipta_arsip'      => $this->input->post('pencipta_arsip'),
        'asal_arsip'          => $this->input->post('asal_arsip'),
        'kode_arsip_id' => $this->input->post('kode_arsip_id'),
        'nomor_arsip'         => $this->input->post('nomor_arsip'),
        'retensi_arsip'       => $this->input->post('retensi_arsip'),
        'lokasi_simpan'       => $this->input->post('lokasi_simpan'),
        'metode_perlindungan' => $this->input->post('metode_perlindungan')
    ];

    // Insert ke tabel daftar_arsip
    $this->db->insert('daftar_arsip', $data_arsip);
    $arsip_id = $this->db->insert_id();

    if ($arsip_id) {
        // Ambil data detail dari form (bisa array)
        $jenis_arsip_list = $this->input->post('jenis_arsip');

        if (!empty($jenis_arsip_list)) {
            foreach ($jenis_arsip_list as $jenis) {
                $data_detail = [
                    'daftar_arsip_id' => $arsip_id,
                    'jenis_arsip'     => $jenis
                ];
                $this->db->insert('daftar_arsip_detail', $data_detail);
            }
        }

        $this->session->set_flashdata('success', 'Data arsip berhasil disimpan!');
    } else {
        $this->session->set_flashdata('error', 'Gagal menyimpan data arsip.');
    }

    redirect('arsip');
}


}