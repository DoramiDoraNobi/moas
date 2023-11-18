<?php
class Pendapatan_model extends CI_Model {
    public function hitungPendapatan($id_katering, $bulan) {
        $this->db->select_sum('total');
        $this->db->where('id_katering', $id_katering);
        $this->db->where('status', 'Selesai');
        $this->db->like('tanggal_pesanan', $bulan, 'after');
        $result = $this->db->get('data_pesanan')->row();

        return ($result) ? $result->total : 0;
    }

    public function tambahPendapatan($pendapatan, $bulan, $id_katering) {
        $data = array(
            'pendapatan' => $pendapatan,
            'bulan' => $bulan,
            'tanggal' => date('Y-m-d'),
            'id_katering' => $id_katering
        );
        $this->db->insert('pendapatan', $data);
    }

    public function getPendapatanByMonth($id_katering, $bulan) {
        $this->db->where('id_katering', $id_katering);
        $this->db->like('tanggal', $bulan, 'after');
        return $this->db->get('pendapatan')->result();
    }
}

?>