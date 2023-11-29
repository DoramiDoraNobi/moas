<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class makanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Makanan_model');
        $this->load->model('Pembayaran_model');
    }
    public function index(){
        $user_id = $this->session->userdata('id_katering');
        $data['makanan'] = $this->Makanan_model->getMenusbyUserId($user_id);
        $this->load->view('layout/header2');
        $this->load->view('client/makanan', $data);
        $this->load->view('layout/footer');
    }
    public function do_create() {
        $id_katering = $this->session->userdata('id_katering');
    
        // Periksa status langganan
        $isSubscribed = $this->Pembayaran_model->cekLangganan($id_katering);
    
        // Hitung jumlah menu saat ini
        $jumlahMenu = $this->Makanan_model->hitungJumlahMenu($id_katering);
    
        // Periksa apakah sudah melewati batas berlangganan
        if (($isSubscribed && $jumlahMenu >= 35) || (!$isSubscribed && $jumlahMenu >= 15)) {
            // Jika sudah melewati batas, redirect ke halaman yang sesuai
            redirect('error_page'); // Ubah 'error_page' dengan halaman yang sesuai
        } else {
            // Jika belum melewati batas, lakukan penambahan menu
            $data = array(
                'nama_menu' => $this->input->post('nama_menu'),
                'harga' => $this->input->post('harga'),
                'deskripsi' => $this->input->post('deskripsi'),
                'id_katering' => $id_katering
            );
            $this->Makanan_model->CreateMakanan($data);
            redirect('makanan');
        }
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