<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Poliklinik extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_poliklinik');
        if (!$this->session->userdata('user_id') OR $this->session->userdata('user_group')!=1) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
		}
    }
    
    public function index() {
        
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Poliklinik';
        $data['poliklinik']    = $this->m_poliklinik->read('','','','');
		        
        // TEMPLATE
		$view         = "poliklinik/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }

    // CREATE POLIKLINIK
    public function create() {
        csrfValidate();
        // POST
        $data['poliklinik_id']   = '';
        $data['nama_poliklinik'] = $this->input->post('nama_poliklinik');
        $data['gedung'] = $this->input->post('gedung');
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_poliklinik->create($data);

        // LOG
        $message    = $this->session->userdata('user_fullname')." menambah data poliklinik dengan nama : ".$data['nama_poliklinik'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data poliklinik dengan nama : ".$data['nama_poliklinik'];
        getAlert($alertStatus, $alertMessage);

        redirect('poliklinik');
    }
    
    // UPDATE POLIKLINIK
    public function update() {
        csrfValidate();
        // POST
        $data['poliklinik_id']   = $this->input->post('poliklinik_id');
        $data['nama_poliklinik'] = $this->input->post('nama_poliklinik');
        $data['gedung'] = $this->input->post('gedung');
        $this->m_poliklinik->update($data);

        // LOG
        $message    = $this->session->userdata('user_fullname')." mengubah data poliklinik dengan nama : ".$data['nama_poliklinik'];
        createLog($message); 

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data poliklinik dengan nama : ".$data['nama_poliklinik'];
        getAlert($alertStatus, $alertMessage);

        redirect('poliklinik');
    }
    
    // DELETE POLIKLINIK
    public function delete() {
        csrfValidate();
        // POST
        $this->m_poliklinik->delete($this->input->post('poliklinik_id'));

        // LOG
        $message    = $this->session->userdata('user_fullname')." menghapus data poliklinik dengan ID : ".$this->input->post('poliklinik_id');
        createLog($message);
        
        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data poliklinik dengan ID : ".$this->input->post('poliklinik_id');
        getAlert($alertStatus, $alertMessage);

        redirect('poliklinik');
    }
    
}
?>