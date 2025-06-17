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




	public function dashboard() {
    // Total slot
    $totalSlot = $this->db->count_all('slot_number');

    // Tahun ini dan tahun lalu
    $currentYear = date('Y');
    $lastYear = $currentYear - 1;

    // Slot tahun ini
    $this->db->where('YEAR(tanggal)', $currentYear);
    $thisYearCount = $this->db->count_all_results('slot_number');

    // Slot tahun lalu
    $this->db->where('YEAR(tanggal)', $lastYear);
    $lastYearCount = $this->db->count_all_results('slot_number');

    // Hitung pertumbuhan
    $growth = 0;
    if ($lastYearCount > 0) {
        $growth = (($thisYearCount - $lastYearCount) / $lastYearCount) * 100;
    } elseif ($thisYearCount > 0) {
        $growth = 100;
    }

    $data = [
        'totalSlot' => $totalSlot,
        'growthSlot' => $growth,
    ];

    $this->load->view('dashboard_guest', $data); // Sesuaikan dengan nama view kamu
}





}
