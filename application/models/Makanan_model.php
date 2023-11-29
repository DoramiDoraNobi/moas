<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Makanan_model extends CI_Model 
{
    public function getAllMakanan()
    {
        $query = $this->db->get('menu_makanan');
        return $query->result();
    }

    public function getMenusbyUserId($id)
    {
        $this->db->where('id_katering', $id);
        $query = $this->db->get('menu_makanan');
        return $query->result();
    }
    public function CreateMakanan($data)
    {
        $this->db->insert('menu_makanan', $data);
        return $this->db->affected_rows();
    }
    public function getMakananById($id)
    {
        $this->db->where('id_menu', $id);
        $query = $this->db->get('menu_makanan');
        return $query->row();
    }
    public function updateMakanan($data)
    {
        $this->db->where('id_menu', $data['id_menu']);
        $this->db->update('menu_makanan', $data);
        return $this->db->affected_rows();
    }
    public function deleteMakanan($id)
    {
        $this->db->where('id_menu', $id);
        $this->db->delete('menu_makanan');
        return $this->db->affected_rows();
    }
    public function hitungJumlahMenu($id_katering) {
        // Menghitung jumlah menu berdasarkan ID katering
        $this->db->where('id_katering', $id_katering);
        $query = $this->db->get('makanan');
        return $query->num_rows(); // Mengembalikan jumlah menu
    }
}

?>