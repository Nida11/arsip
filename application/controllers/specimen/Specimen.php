<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
