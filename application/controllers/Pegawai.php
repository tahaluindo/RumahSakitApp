<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pegawai extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // LOAD MODEL
        $this->load->model('m_pegawai');

        // SESSION
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
        $data['title']         = 'Data Pegawai';
        $data['pegawai']        = $this->m_pegawai->read('','','','');
		
        
        // TEMPLATE
		$view         = "pegawai/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }

    // CREATE DATA PEGAWAI
    public function create() {
        csrfValidate();
        // POST
        $data['pegawai_id']   = '';
        $data['nama_pegawai'] = $this->input->post('nama_pegawai');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['keterangan'] = $this->input->post('keterangan');
        $data['status_pegawai'] = $this->input->post('status_pegawai');
        $data['bidang_pegawai'] = $this->input->post('bidang_pegawai');;
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_pegawai->create($data);

        // LOG
        $message    = $this->session->userdata('user_fullname')." menambah data pegawai dengan nama : ".$data['nama_pegawai'];
        createLog($message); 

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data pegawai dengan nama : ".$data['nama_pegawai'];
        getAlert($alertStatus, $alertMessage);

        redirect('pegawai');
    }
    
    // UPDATE DATA PEGAWAI
    public function update() {
        csrfValidate();
        // POST
        $data['pegawai_id']   = $this->input->post('pegawai_id');
        $data['nama_pegawai'] = $this->input->post('nama_pegawai');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['keterangan'] = $this->input->post('keterangan');
        $data['status_pegawai'] = $this->input->post('status_pegawai');
        $data['bidang_pegawai'] = $this->input->post('bidang_pegawai');
        $this->m_pegawai->update($data);

        // LOG
        $message    = $this->session->userdata('user_fullname')." mengubah data pegawai dengan nama : ".$data['nama_pegawai'];
        createLog($message); 

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data pegawai dengan nama : ".$data['nama_pegawai'];
        getAlert($alertStatus, $alertMessage);

        redirect('pegawai');
    }
    
    // DELETE DATA PEGAWAI
    public function delete() {
        csrfValidate();
        // POST
        $this->m_pegawai->delete($this->input->post('pegawai_id'));

        // LOG
        $message    = $this->session->userdata('user_fullname')." menghapus data pegawai dengan ID : ".$this->input->post('pegawai_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data pegawai dengan ID : ".$this->input->post('pegawai_id');
        getAlert($alertStatus, $alertMessage);

        redirect('pegawai');
    }
    
}
?>