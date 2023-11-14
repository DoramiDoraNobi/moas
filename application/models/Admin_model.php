<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function get_admin($username, $password)
    {
        // Pengecekan data admin berdasarkan username dan password
        $query = $this->db->get_where('admin', array('username' => $username, 'password' => $password));
        return $query->row_array();
    }
}
