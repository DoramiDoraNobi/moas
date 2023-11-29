<?php
class Pembayaran extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Pembayaran_model');
    }
    public function index() {
        $this->load->model('Pembayaran_model');

        // Ambil semua konfirmasi pembayaran
        $data['konfirmasi'] = $this->Pembayaran_model->getKonfirmasiPembayaran();

        // Load view kelola konfirmasi dan kirim data konfirmasi
        $this->load->view('admin/kelola_konfirmasi', $data);
    }
    public function setuju($id_konfirmasi) {
        $this->load->model('Pembayaran_model');

        // Ubah status pembayaran menjadi 'Sudah' berdasarkan ID pembayaran
        $this->Pembayaran_model->set_status_pembayaran($id_konfirmasi);

        // Redirect kembali ke halaman kelola konfirmasi setelah mengubah status pembayaran
        redirect('pembayaran');
    }
}

?>