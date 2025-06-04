<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absenmodel extends CI_Model {


	public function GetAbsen($where="")
	{
		$data=$this->db->query('select * from absensi'.$where);
		return $data->result_array();
	}
	
		public function GetSum($where="where pertemuan='Pertemuan Ke -1'")
	{
		$data=$this->db->query('select sum(telat) AS total from absensi'.$where);
		return $data->result_array();
	}
	
	public function InsertData($tableName, $data)
	{
		$res = $this->db->insert($tableName, $data);
		return $res;
	}
	
	public function UpdateData($tableName, $data,$where)
	{
		$res = $this->db->update($tableName, $data,$where);
		return $res;
	}
	
public function DeleteData($tableName,$where)
	{
	$res=$this->db->delete($tableName,$where);
		return $res;
	}
public function GetRekap($where="")
	{
		$data=$this->db->query('select * from rekap'.$where);
		return $data->result_array();
	}
	
	public function GetTugas($nim){
		$query=$this->db
			->select('*')
			->from('absensi')
			->where('nim',$nim)
			->get();
		return $query->result_array();
	}
	
	public function download($id){
		$query=$this->db->get_where('absensi',array('id'=>$id));
		return $query->row_array();
	}
	
	public function GetTotal($nim){
		$query=$this->db
			->select_sum('rekap')
			->from('absensi')
			->where('nim',$nim)
			->get();
		return $query->result_array();
	}
}
