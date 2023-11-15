<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index() {
        $this->load->view('client/login');
    }

    public function register() {
        $this->load->view('client/register');
    }
    public function dashboard() {
        $this->load->view('client/dashboard');
    }

    public function do_login() {
        // Validasi form login
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, tampilkan kembali form login
            $this->load->view('client/login');
        } else {
            // Jika validasi berhasil, cek login user
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->Auth_model->check_login($username, $password);

            if ($user) {
               // Jika login berhasil, set session
                $this->session->set_userdata('user_logged_in', true);
                $this->session->set_userdata('nama_katering', $user->nama_katering);
                $this->session->set_userdata('id_katering', $user->id_katering);
                redirect('auth/dashboard');
            } else {
                // Jika login gagal, tampilkan pesan error atau kembali ke halaman login
                // Contoh:
                $data['error_message'] = 'Username atau password salah';
                $this->load->view('client/login', $data);
            }
        }
    }
    public function do_register() {
        // Validasi form register
        $this->form_validation->set_rules('nama_katering', 'Nama Katering', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nohp_katering', 'No HP', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[katering.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, tampilkan kembali form register
            $this->load->view('register');
        } else {
            // Jika validasi berhasil, tambahkan katering ke database
            $data = array(
                'nama_katering' => $this->input->post('nama_katering'),
                'email' => $this->input->post('email'),
                'nohp_katering' => $this->input->post('nohp_katering'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );

            $this->Auth_model->createClient($data);
            redirect('auth');
        }
    }

    public function logout() {
        // Hapus session dan redirect ke halaman login
        $this->session->unset_userdata('user_logged_in');
        redirect('auth');
    }
}

?>