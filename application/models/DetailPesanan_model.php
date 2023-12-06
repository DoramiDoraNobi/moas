<?php
class DetailPesanan_model extends CI_Model 
{
    public function getDetailPesananByIdPesanan($id_pesanan)
    {
        $this->db->select('*');
        $this->db->from('detail_pesanan');
        $this->db->where('id_pesanan', $id_pesanan);
        $query = $this->db->get();
        return $query->result();
    }
    public function getDetailPesanan($id_pesanan)
    {
        $this->db->select('*');
        $this->db->from('detail_pesanan');
        $this->db->join('menu', 'menu.id_menu = detail_pesanan.id_menu');
        $this->db->where('id_pesanan', $id_pesanan);
        $query = $this->db->get();
        return $query->result();
    }
    public function getDetailPesananById($id_detail_pesanan)
    {
        $this->db->select('*');
        $this->db->from('detail_pesanan');
        $this->db->where('id_detail_pesanan', $id_detail_pesanan);
        $query = $this->db->get();
        return $query->result();
    }
    public function CreateDetailPesanan($data)
    {
        $this->db->insert('detail_pesanan', $data);
    }

    public function HitungTotalItem($id_detail_pesanan)
    {
        $this->db->select_sum('detail_pesanan.jumlah * menu_makanan.harga', 'total_per_item');
        $this->db->from('detail_pesanan');
        $this->db->join('menu_makanan', 'menu_makanan.id_menu = detail_pesanan.id_menu');
        $this->db->where('detail_pesanan.id_detail_pesanan', $id_detail_pesanan);
        $query = $this->db->get();
        return $query->row();
    }

    public function GetIdPemesan($id_detail_pesanan)
    {
        $this->db->select('id_pesanan');
        $this->db->from('detail_pesanan');
        $this->db->where('id_detail_pesanan', $id_detail_pesanan);
        $query = $this->db->get();
        return $query->row();
    }

    public function UpdateDetailPesanan($data)
    {
        $this->db->where('id_detail_pesanan', $data['id_detail_pesanan']);
        $this->db->update('detail_pesanan', $data);
    }

    public function DeleteDetailPesanan($id_detail_pesanan)
    {
        $this->db->where('id_detail_pesanan', $id_detail_pesanan);
        $this->db->delete('detail_pesanan');
    }

   


}
    

?>