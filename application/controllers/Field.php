<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Field extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // LOAD MODEL
        $this->load->model('m_field');
        // SESSION
        if (!($this->session->userdata('user_id'))) {
            // ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
        }
    }
    

    public function index() {
        
        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Bidang';
        $data['field']   = $this->m_field->read('','','');
		
        
        // TEMPLATE
		$view         = "news/field";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function create() {
        csrfValidate();
        // POST
        $data['field_id']   = '';
        $data['field_name'] = $this->input->post('field_name');
        $data['createtime']         = date('Y-m-d H:i:s');
        $this->m_field->create($data);

        // LOG
        $message    = $this->session->userdata('user_name')." menambah data kategori bidang berita ".$data['field_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data kategori bidang berita ".$data['field_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('field');
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['field_id']   = $this->input->post('field_id');
        $data['field_name'] = $this->input->post('field_name');
        $this->m_field->update($data);

        // LOG
        $message    = $this->session->userdata('user_fullname')." mengubah data kategori bidang berita dengan ID : ".$data['field_id']." - ".$data['field_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data kategori bidang berita : ".$data['field_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('field');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_field->delete($this->input->post('field_id'));
        
        // LOG
        $message    = $this->session->userdata('user_fullname')." menghapus data kategori bidang berita dengan ID : ".$this->input->post('field_id')." - ".$this->input->post('field_name');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data kategori bidang berita ID : ".$this->input->post('field_id');
        getAlert($alertStatus, $alertMessage);

        redirect('field');
    }
    
}
?>