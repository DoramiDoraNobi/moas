<?php 
class Barang_model extends CI_Model
{
    function getAllBarang() {
        $query = $this->db->get('data_barang');
        return $query->result();
    }
    function CreateBarang() {
        
        $this->db->insert('data_barang');
        return $this->db->affected_rows();
    }
    public function getBarangById($id) {
        // Query untuk mengambil data katering berdasarkan ID dari database
        $query = $this->db->get_where('data_barang', array('id_barang' => $id));
        return $query->row();
    }

    public function updateBarang($data) {
        // Mengupdate data katering berdasarkan ID di database
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->update('data_barang', $data);
        return $this->db->affected_rows();
    }
    public function deleteBarang($id) {
        $this->db->where('id_barang', $id);
        $this->db->delete('data_barang');
        return $this->db->affected_rows();
    }
}

?>