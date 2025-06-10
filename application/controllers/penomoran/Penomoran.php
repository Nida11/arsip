<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penomoran extends CI_Controller {


public function data_slot(){
		
		$d['data_slot'] = $this->db->query("select * from slot");
		$this->load->view('Penomoran/data_slot',$d);
	}

}

?>