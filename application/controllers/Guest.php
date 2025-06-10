<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

	
	public function index()
	{
$this->session->set_flashdata('login_error', 'Username atau password salah!');
redirect('index.php/Guest/login');

		$this->load->view('index');
	}
	
	public function beranda_admin()
	{
		$this->load->view('dashboard');
	}
	
	public function beranda_user()
	{
		$this->load->view('home_user');
	}
	
	public function beranda_about()
	{
		$this->load->view('home_about');
	}
	
	public function register()
	{
		$this->load->view('register');
	}
	
	public function entry_akun()
	{
		$nim = $_POST['nim'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$repass = $_POST['repass'];
		$nama = $_POST['nama'];
		$level = $_POST['level'];
		
		$data = array('nim'=>$nim,'username' => $username , 'password' => $password,'repass'=>$repass, 'nama' => $nama,'level'=>$level);
		$res = $this->guestmodel->RegistData('user',$data);
		if ($res >= 1){
			echo "<script>
			alert('Registrasi User Berhasil');
			window.location.href='index'</script>";
		} else {
			echo "<script>
			alert('Registrasi User Gagal');
			window.location.href='index'</script>";
		}
	}
	
	public function beranda_intro()
	{
		$this->load->view('intro');
	}
	
	public function login()
	{
		$this->load->view('login2');
	}
}
