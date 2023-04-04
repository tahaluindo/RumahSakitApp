<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // LOAD MODEL
        $this->load->model('m_user');
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
        $data['title']   = 'Data User';
        $data['user']    = $this->m_user->read('','','');
        $data['group']   = $this->m_group->read('','','');
		
        
        // TEMPLATE
		$view         = "user/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    
    // CREATE USER
    public function create() {
        csrfValidate();
        // POST
        $data['user_id']        = '';
        $data['user_name']      = $this->input->post('user_name');
        $data['user_password']  = password_hash($this->input->post('user_password'), PASSWORD_BCRYPT);
        $data['user_fullname']  = $this->input->post('user_fullname');
        $data['user_email']     = $this->input->post('user_email');
        $data['user_lastlogin'] = '';
        $data['user_photo']     = '';
        $data['group_id']       = $this->input->post('group_id');
        $data['createtime']     = date('Y-m-d H:i:s');
        $this->m_user->create($data);

        // LOG
        $message    = $this->session->userdata('user_fullname')." menambah data user dengan nama : ".$data['user_name'];
        createLog($message); 

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data user dengan nama : ".$data['user_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('user');
    }
    
    // UPDATE USER
    public function update() {
        csrfValidate();
        // POST
        $data['user_id']       = $this->input->post('user_id');
        $data['user_name']     = $this->input->post('user_name');
        
        if($this->input->post('user_password')!=""){
            $data['user_password'] = password_hash($this->input->post('user_password'), PASSWORD_BCRYPT);
        }

        $data['user_fullname'] = $this->input->post('user_fullname');
        $data['user_email']    = $this->input->post('user_email');
        $data['group_id']      = $this->input->post('group_id');
        $this->m_user->update($data);

        // LOG
        $message    = $this->session->userdata('user_fullname')." mengubah data user dengan nama : ".$data['user_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data user dengan nama : ".$data['user_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('user');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_user->delete($this->input->post('user_id'));

        // LOG
        $message    = $this->session->userdata('user_fullname')." menghapus data user dengan ID : ".$this->input->post('user_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data user dengan ID : ".$this->input->post('user_id');
        getAlert($alertStatus, $alertMessage);

        redirect('user');
    }
    
}
?>