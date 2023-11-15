<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class makanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Makanan_model');
    }
    public function index(){
        $user_id = $this->session->userdata('id_katering');
        $data['makanan'] = $this->Makanan_model->getMenusbyUserId($user_id);
        $this->load->view('layout/header2');
        $this->load->view('client/makanan', $data);
        $this->load->view('layout/footer');
    }
    public function do_create(){
        $data = array(
            'nama_menu' => $this->input->post('nama_menu'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi'),
            'id_katering' => $this->session->userdata('id_katering')
        );
        $this->Makanan_model->CreateMakanan($data);
        redirect('makanan');
    }
    public function do_update(){
        $data = array(
            'id_menu' => $this->input->post('id_menu'),
            'nama_menu' => $this->input->post('nama_menu'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi'),
            'id_katering' => $this->session->userdata('id_katering')
        );
        $this->Makanan_model->updateMakanan($data);
        redirect('makanan');
    }
    public function do_delete(){
        $id = $this->input->post('id_menu');
        $this->Makanan_model->deleteMakanan($id);
        redirect('makanan');
    }
}

?>