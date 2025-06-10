<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

public function index()
{
    $username = $this->input->post("username");
    $password = $this->input->post("password");

    // Ambil data user berdasarkan username
    $user = $this->db->get_where('user', ['username' => $username])->row_array();

    if ($user) {
        // Cek password (jika belum pakai hash, bisa langsung dibandingkan)
        if ($user['password'] === $password) {
            // Simpan session
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['nip'] = $user['nip'];
            $_SESSION['jabatan'] = $user['jabatan'];
            $_SESSION['level'] = $user['level'];

            if ($user['level'] == 1) {
                $this->session->set_flashdata('success', 'Login Admin berhasil!');
                redirect('index.php/Walikelas/Walikelas/index');
            } else {
                $this->session->set_flashdata('success', 'Login Tutor berhasil!');
                redirect('index.php/Dosen/Dosen/index');
            }
        } else {
            // Password salah
            $this->session->set_flashdata('login_error', 'Password salah!');
            redirect('index.php/Guest/login');
        }
    } else {
        // Username tidak ditemukan
        $this->session->set_flashdata('login_error', 'Username tidak ditemukan!');
        redirect('index.php/Guest/login');
    }
}


	
	
	}



								   

