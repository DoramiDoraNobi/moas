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


    public function detailPesanan($id_pesanan) {
        $id_katering = $this->session->userdata('id_katering');
        // Panggil model atau fungsi yang dapat mengambil detail pesanan berdasarkan $id_pesanan
        $data['detail_pesanan'] = $this->DetailPesanan_model->getDetailPesananByIdPesanan($id_pesanan);
        $data['daftar_makanan'] = $this->Makanan_model->getMenusbyUserId($id_katering);

        // Kirim data detail pesanan ke view
        $this->load->view('layout/header2');
        $this->load->view('client/detailpesanan', $data);
        $this->load->view('layout/footer');

    }


    public function do_create() {
        $id_katering = $this->session->userdata('id_katering');
        $this->load->model('Pesanan_model');
        $this->load->model('Pembayaran_model');

        $maxLimit = 50; // Jumlah maksimal data pesanan jika tidak berlangganan
        if ($this->Pembayaran_model->cekLangganan($id_katering)) {
            // Jika berlangganan, batasan maksimal menjadi 100
            $maxLimit = 100;
        }

        // Periksa jumlah pesanan saat ini
        $jumlahPesanan = $this->Pesanan_model->hitungJumlahPesanan($id_katering);

        if ($jumlahPesanan < $maxLimit) {
            $data = array(
                'nama_pemesan' => $this->input->post('nama_pemesan'),
                'alamat' => $this->input->post('alamat'),
                'nohp_pemesan' => $this->input->post('nohp_pemesan'),
                'status' => 'Proses',
                'tanggal_pesanan' => $this->input->post('tanggal_pesanan'),
                'total' => '0',
                'id_katering' => $id_katering
            );
        
            // Tambahkan pesanan ke dalam database
            $this->Pesanan_model->CreatePesanan($data);
        } else {
            // Jika sudah mencapai batas, tampilkan pesan kesalahan
            echo "Anda telah mencapai batas maksimal pesanan.";
        }

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

public function do_createDetail(){
    $id_katering = $this->session->userdata('id_katering');
    $id_menu = $this->input->post('nama_menu');
    $jumlah = $this->input->post('jumlah');
    $id_pesanan = $this->input->post('id_pesanan');

    $harga_per_menu = $this->Pesanan_model->get_harga_menu($id_menu, $id_katering);
    $total_per_item = $jumlah * $harga_per_menu;
    $data = array(
        'id_pesanan' => $id_pesanan,
        'id_menu' => $id_menu,
        'jumlah' => $jumlah,
        'total_per_item' => $total_per_item
    );

    $this->DetailPesanan_model->CreateDetailPesanan($data);
    redirect('pesanan/detailPesanan/'.$id_pesanan);


}

public function do_updateDetail(){
    $id_katering = $this->session->userdata('id_katering');
    $id_menu = $this->input->post('nama_menu');
    $jumlah = $this->input->post('jumlah');
    $id_pesanan = $this->input->post('id_pesanan');
    $id_detail_pesanan = $this->input->post('id_detail_pesanan');

    $harga_per_menu = $this->Pesanan_model->get_harga_menu($id_menu, $id_katering);
    $total_per_item = $jumlah * $harga_per_menu;
    $data = array(
        'id_detail_pesanan' => $id_detail_pesanan,
        'id_pesanan' => $id_pesanan,
        'id_menu' => $id_menu,
        'jumlah' => $jumlah,
        'total_per_item' => $total_per_item
    );

    $this->DetailPesanan_model->UpdateDetailPesanan($data);
    redirect('pesanan/detailPesanan/'.$id_pesanan);

}

public function do_deleteDetail($id_detail_pesanan){
    $id_pesanan = $this->DetailPesanan_model->GetIdPemesan($id_detail_pesanan)->id_pesanan;
    $this->DetailPesanan_model->DeleteDetailPesanan($id_detail_pesanan);
    redirect('pesanan/detailPesanan/'.$id_pesanan);
}

}