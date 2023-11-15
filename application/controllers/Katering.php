<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katering extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Katering_model');
    }

    public function index() {
        $data['katering'] = $this->Katering_model->getAllKatering();
        $this->load->view('admin/kelola_katering', $data);
    }

    public function create() {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'nama_katering' => $this->input->post('nama_katering'),
            'email' => $this->input->post('email'),
            'nohp_katering' => $this->input->post('nohp_katering')
        );
        $result = $this->Katering_model->createKatering($data);
        redirect('katering');
        
    }

    
    public function get_katering($id) {
        $data['katering'] = $this->Katering_model->getKateringById($id);
        $this->load->view('admin/detail_katering', $data);
    }
    

    public function edit_katering() {
        $data = array(
            'id_katering' => $this->input->post('id_katering'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'nama_katering' => $this->input->post('nama_katering'),
            'email' => $this->input->post('email'),
            'nohp_katering' => $this->input->post('nohp_katering')
        );
        $result = $this->Katering_model->updateKatering($data);
        if ($result) {
            $response['status'] = 'success';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Gagal mengupdate data katering';
        }
        echo json_encode($response);
    }

    public function delete() {
        $id = $this->input->post('id_katering');
        $result = $this->Katering_model->deleteKatering($id);
        if ($result) {
            $response['status'] = 'success';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Gagal menghapus data katering';
        }
        echo json_encode($response);
    }

    
}
?>
