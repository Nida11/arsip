<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guestmodel extends CI_Model {


	
	public function RegistData($tableName, $data)
	{
		$res = $this->db->insert($tableName, $data);
		return $res;
	}
	
	public function UpdateData($tableName, $data,$where)
	{
		$res = $this->db->update($tableName, $data,$where);
		return $res;
	}
	
	public function DeleteData()
	{
		$res = $this->db->delete($tableName,$where);
		return $res;
	}
}
