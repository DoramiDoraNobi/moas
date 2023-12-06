<?php

class Auth_model extends CI_Model 
{
    public function createClient($data) {
        // Menyisipkan data katering baru ke dalam database
        $this->db->insert('katering', $data);
        return $this->db->affected_rows();
    }
    public function check_login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('katering')->row();
    }

    
    
}

?>