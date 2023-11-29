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

}


?>