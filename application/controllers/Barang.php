<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
    }
    public function index(){
        $data['barang'] = $this->Barang_model->getAllBarang();
        $this->load->view('layout/header_client');
        $this->load->view('client/barang', $data);
        $this->load->view('layout/footer');
    }
    public function do_create(){
        $data['nama_barang'] = $this->input->post('nama_barang');
        $data['harga_barang'] = $this->input->post('harga_barang');
        $data['stok_barang'] = $this->input->post('stok_barang');
        $data['deskripsi_barang'] = $this->input->post('deskripsi_barang');
        $data['gambar_barang'] = $this->input->post('gambar_barang');
        $this->Barang_model->CreateBarang($data);
        redirect('barang');
    }
}
