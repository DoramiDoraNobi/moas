<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katering extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Katering_model');
    }

    public function index() {
        $data['katering'] = $this->Katering_model->getAllKatering();
        $this->load->view('admin/kelola_katering', $data);
    }

    public function create() {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'nama_katering' => $this->input->post('nama_katering'),
            'email' => $this->input->post('email'),
            'nohp_katering' => $this->input->post('nohp_katering')
        );
        $result = $this->Katering_model->createKatering($data);
        redirect('katering');
        
    }

    
    public function get_katering($id) {
        $data['katering'] = $this->Katering_model->getKateringById($id);
        $this->load->view('admin/detail_katering', $data);
    }
    

    public function edit_katering() {
        $data = array(
            'id_katering' => $this->input->post('id_katering'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'nama_katering' => $this->input->post('nama_katering'),
            'email' => $this->input->post('email'),
            'nohp_katering' => $this->input->post('nohp_katering')
        );
        $result = $this->Katering_model->updateKatering($data);
        if ($result) {
            $response['status'] = 'success';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Gagal mengupdate data katering';
        }
        echo json_encode($response);
    }

    public function delete() {
        $id = $this->input->post('id_katering');
        $result = $this->Katering_model->deleteKatering($id);
        if ($result) {
            $response['status'] = 'success';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Gagal menghapus data katering';
        }
        echo json_encode($response);
    }

    public function register() {
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

            $this->Katering_model->register_katering($data);
            redirect('katering/login');
        }
    }

    public function login() {
        // Validasi form login
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, tampilkan kembali form login
            $this->load->view('login');
        } else {
            // Jika validasi berhasil, cek login user
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->Katering_model->check_login($username, $password);

            if ($user) {
                // Jika login berhasil, redirect ke halaman dashboard atau halaman sesuai kebutuhan
                // Contoh:
                redirect('dashboard');
            } else {
                // Jika login gagal, tampilkan pesan error atau kembali ke halaman login
                // Contoh:
                $data['error_message'] = 'Username atau password salah';
                $this->load->view('login', $data);
            }
        }
    }
}
?>
