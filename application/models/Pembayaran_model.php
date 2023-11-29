<?php
class Pembayaran_model extends CI_Model 
{
    public function getKonfirmasiPembayaran()
    {
        $query = $this->db->get('konfirmasi_pembayaran');
        return $query->result();
    }

    public function InsertKonfirmasiPembayaran($data)
    {
        $this->db->insert('konfirmasi_pembayaran', $data);
    }

    public function set_status_pembayaran($id_konfirmasi) {
        // Ubah status pembayaran menjadi 'Sudah' berdasarkan ID pembayaran
        $this->db->set('status_bayar', 'Sudah');
        $this->db->where('id_konfirmasi', $id_konfirmasi);
        $this->db->update('konfirmasi_pembayaran');
    }
    public function cekLangganan($id_katering) {
        // Mengambil data langganan berdasarkan ID katering
        $this->db->where('id_katering', $id_katering);
        $query = $this->db->get('langganan');
        return $query->num_rows() > 0; // Mengembalikan true jika langganan ditemukan
    }
   

}


?>