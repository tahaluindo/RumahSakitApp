<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Group extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // LOAD MODEL
        $this->load->model('m_group');

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
        $data['setting'] = getSetting();
        $data['title']   = 'Group';
        $data['group']   = $this->m_group->read('','','');
		
        
        // TEMPLATE
		$view         = "group/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }

    // CREATE GROUP
    public function create() {
        csrfValidate();
        // POST
        $data['group_id']   = '';
        $data['group_name'] = $this->input->post('group_name');
        $data['createtime'] = date('Y-m-d H:i:s');
        $this->m_group->create($data);

        // LOG
        $message    = $this->session->userdata('user_name')." menambah data group dengan nama : ".$data['group_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data group dengan nama : ".$data['group_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('group');
    }
    
    // UPDATE GROUP
    public function update() {
        csrfValidate();
        // POST
        $data['group_id']      = $this->input->post('group_id');
        $data['group_name']    = $this->input->post('group_name');
        $this->m_group->update($data);

        // LOG
        $message    = $this->session->userdata('user_name')." mengubah data group dengan nama : ".$data['group_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data group dengan nama : ".$data['group_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('group');
    }
    
    // DELETE GROUP
    public function delete() {
        csrfValidate();
        // POST
        $this->m_group->delete($this->input->post('group_id'));
        
        // LOG
        $message    = $this->session->userdata('user_name')." menghapus data group dengan ID : ".$this->input->post('group_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data group dengan ID : ".$this->input->post('group_id');
        getAlert($alertStatus, $alertMessage);

        redirect('group');
    }
    
}
?>