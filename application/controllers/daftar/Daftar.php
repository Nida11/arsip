<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function data_daftar() {
        $this->load->view('Daftar/data_daftar');
    }
}
