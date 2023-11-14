<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model admin_model.php
        $this->load->model('admin_model');
        $this->load->library('session');
    }

    public function index()
    {
        // Memuat view login_admin.php
        $this->load->view('admin/login');
    }

    public function login()
    {
        // Ambil data dari form login
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Memeriksa apakah data admin valid
        $admin = $this->admin_model->get_admin($username, $password);

        if($admin) {
            // Set session jika data admin valid
            $this->session->set_userdata('admin_logged_in', true);
            $this->session->set_userdata('nama_admin', $admin['nama_admin']);
            redirect('admin/dashboard'); // Ganti dengan halaman dashboard admin
        } else {
            // Jika data admin tidak valid, redirect kembali ke halaman login
            redirect('admin');
        }
    }
    public function dashboard()
    {
        // Cek apakah admin sudah login
        if(!$this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }

        // Load view dashboard_admin.php
        $this->load->view('admin/dashboard');
    }

    public function logout()
    {
        // Hapus session dan redirect kembali ke halaman login
        $this->session->unset_userdata('admin_logged_in');
        redirect('admin');
    }
}
