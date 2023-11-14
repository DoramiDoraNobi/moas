<?php
class Katering_model extends CI_Model {
    public function getAllKatering() {
        // Query untuk mengambil semua data katering dari database
        $query = $this->db->get('katering');
        return $query->result();
    }

    public function createKatering($data) {
        // Menyisipkan data katering baru ke dalam database
        $this->db->insert('katering', $data);
        return $this->db->affected_rows();
    }

    public function getKateringById($id) {
        // Query untuk mengambil data katering berdasarkan ID dari database
        $query = $this->db->get_where('katering', array('id_katering' => $id));
        return $query->row();
    }

    public function updateKatering($data) {
        // Mengupdate data katering berdasarkan ID di database
        $this->db->where('id_katering', $data['id_katering']);
        $this->db->update('katering', $data);
        return $this->db->affected_rows();
    }

    public function deleteKatering($id) {
        // Menghapus data katering berdasarkan ID dari database
        $this->db->where('id_katering', $id);
        $this->db->delete('katering');
        return $this->db->affected_rows();
    }
    
    public function check_login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('katering')->row();
    }
}
?>
