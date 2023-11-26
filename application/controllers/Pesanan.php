<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
        $this->load->model('Makanan_model');
        $this->load->model('DetailPesanan_model');
    }

    public function index(){
        $user_id = $this->session->userdata('id_katering');
        $data['pesanan'] = $this->Pesanan_model->getPesananbyUserId($user_id);
        $data['daftar_makanan'] = $this->Makanan_model->getMenusbyUserId($user_id);
        $this->load->view('layout/header2');
        $this->load->view('client/pesanan', $data);
        $this->load->view('layout/footer');
    }

    public function detailpesanan($id){
        $data['pesanan'] = $this->Pesanan_model->getPesananById($id);
        $data['detail_pesanan'] = $this->DetailPesanan_model->getDetailPesananbyPesananId($id);
        $this->load->view('layout/header2');
        $this->load->view('client/detailpesanan', $data);
        $this->load->view('layout/footer');
    }

    public function do_create(){
        $id_katering = $this->session->userdata('id_katering');

        $data = array(
            'nama_pemesan' => $this->input->post('nama_pemesan'),
            'alamat' => $this->input->post('alamat'),
            'nohp_pemesan' => $this->input->post('nohp_pemesan'),
            'status' => $this->input->post('status'),
            'tanggal_pesan' => date('Y-m-d H:i:s'),
            'total' => 0,
            'id_katering' => $id_katering
        );
    
        // Tambahkan pesanan ke dalam database
        $this->Pesanan_model->CreatePesanan($data);
    
        redirect('pesanan');
    }



    public function do_update(){

        $nama_menu = $this->input->post('nama_menu');
        $jumlah = $this->input->post('jumlah');
    
        // Ambil ID katering dari sesi
        $id_katering = $this->session->userdata('id_katering');
    
        // Ambil harga makanan dari database berdasarkan nama menu dan ID katering
        $harga_per_menu = $this->Pesanan_model->get_harga_menu($nama_menu, $id_katering);
    
        // Hitung total harga pesanan
        $total_harga = $jumlah * $harga_per_menu;

        $data = array(
            'id_pesanan' => $this->input->post('id_pesanan'),
            'nama_pemesan' => $this->input->post('nama_pemesan'),
            'total' => $total_harga,
            'alamat' => $this->input->post('alamat'),
            'nohp_pemesan' => $this->input->post('nohp_pemesan'),
            'status' => $this->input->post('status'),
            'id_katering' => $this->session->userdata('id_katering')
        );
        $this->Pesanan_model->updatePesanan($data);
        redirect('pesanan');
    }
    
    public function do_delete($id){
        $this->Pesanan_model->deletePesanan($id);
        redirect('pesanan');
    }

}


?>