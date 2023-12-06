<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model 
{
    public function getPesananbyUserId($id)
    {
        $this->db->where('id_katering', $id);
        $query = $this->db->get('pesanan');
        return $query->result();
    }
    public function CreatePesanan($data)
    {
        $this->db->insert('pesanan', $data);
        return $this->db->affected_rows();
    }
    public function getPesananById($id)
    {
        $this->db->where('id_pesanan', $id);
        $query = $this->db->get('pesanan');
        return $query->row();
    }
    public function updatePesanan($data)
    {
        $this->db->where('id_pesanan', $data['id_pesanan']);
        $this->db->update('pesanan', $data);
        return $this->db->affected_rows();
    }
    public function deletePesanan($id)
    {
        $this->db->where('id_pesanan', $id);
        $this->db->delete('pesanan');
        return $this->db->affected_rows();
    }
    public function hitung_total($id_pesanan) {
        $this->db->select_sum('jumlah * harga', 'total');
        $this->db->from('pesanan');
        $this->db->join('menu_makanan', 'pesanan.id_menu = menu_makanan.id_menu');
        $this->db->where('pesanan', $id_pesanan);
        return $this->db->get()->row()->total;
    }

    public function get_harga_menu($nama_menu, $id_katering) {
        $this->db->select('harga');
        $this->db->where('id_menu', $nama_menu);
        $this->db->where('id_katering', $id_katering);
        $result = $this->db->get('menu_makanan')->row();
        
        return ($result) ? $result->harga : 0; // Return harga jika ditemukan, jika tidak, kembalikan 0 atau nilai default lainnya.
    }
    public function get_nama_menu_by_id($id_menu) {
        $this->db->select('nama_menu');
        $this->db->where('id_menu', $id_menu);
        $result = $this->db->get('menu_makanan')->row();
    
        return ($result) ? $result->nama_menu : '';
    }
    public function get_nama_pemesanbyId($id_pesanan) {
        $this->db->select('nama_pemesan');
        $this->db->where('id_pesanan', $id_pesanan);
        $result = $this->db->get('pesanan')->row();
    
        return ($result) ? $result->nama_pemesan : '';
    }
    public function hitungJumlahPesanan($id_katering) {
        $this->db->where('id_katering', $id_katering);
        $query = $this->db->get('pesanan');

        return $query->num_rows();
    }

    

    
    
    
}

?>