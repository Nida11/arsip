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

        echo "<pre>";
        print_r($d->result());
        echo "</pre>";
    }
}
