<?php
class Pendapatan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Load model, helper, dll
        $this->load->model('Pendapatan_model');
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
public function totalPendapatan() {
    $id_katering = $this->session->userdata('id_katering'); // Mengambil ID katering dari session atau atribut lain yang sesuai
    $tahun = date('Y'); // Ambil tahun saat ini
    $bulan = date('m'); // Ambil bulan saat ini

    $this->load->model('Pesanan_model'); // Memuat model Pesanan_model
    $data['total_pendapatan'] = $this->Pesanan_model->hitungTotalPendapatan($id_katering);
    $data['total_pendapatan_bulan'] = $this->Pesanan_model->hitungTotalPendapatanBulan($id_katering, $tahun, $bulan);

    // Tampilkan view dengan total pendapatan dan total pendapatan bulanan
    $this->load->view('nama_view', $data); // Ganti 'nama_view' dengan nama view Anda
}

}

?>