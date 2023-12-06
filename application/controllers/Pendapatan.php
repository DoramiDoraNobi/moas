<?php
class Pendapatan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Load model, helper, dll
        $this->load->model('Pendapatan_model');
    }

    public function index() {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

            $data['pendapatan'] = $this->Pendapatan_model->getPendapatanByBulanTahun($bulan, $tahun);
            $data['pesanan'] = $this->Pendapatan_model->getPesananByBulanTahun($bulan, $tahun);
            $this->load->view('layout/header2');
            $this->load->view('client/pendapatan_view', $data);
            $this->load->view('layout/footer');
        
    }

    public function hitungPendapatan() {
        $id_katering = $this->session->userdata('id_katering');
        $bulan = date('Y-m'); // Bulan saat ini (format: YYYY-MM)

        $pendapatan = $this->Pendapatan_model->hitungPendapatan($id_katering, $bulan);

        // Simpan pendapatan ke tabel pendapatan
        $this->Pendapatan_model->tambahPendapatan($pendapatan, $bulan, $id_katering);

        // Redirect atau tampilkan pesan sukses
    }

    public function lihatPendapatan() {
        $id_katering = $this->session->userdata('id_katering');
        $bulan = $this->input->post('bulan'); // Ambil bulan dari form

        $data['pendapatan'] = $this->Pendapatan_model->getPendapatanByMonth($id_katering, $bulan);

        // Tampilkan data pendapatan di view
    }

    // Controller Anda
    

}

?>