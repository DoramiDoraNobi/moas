<?php
class DetailPesanan_model extends CI_Model 
{
    public function getDetailPesananbyPesananId($id)
    {
        $this->db->where('id_pesanan', $id);
        $query = $this->db->get('detail_pesanan');
        return $query->result();
    }
    public function CreateDetailPesanan($data)
    {
        $this->db->insert('detail_pesanan', $data);
        return $this->db->affected_rows();
    }

}

?>