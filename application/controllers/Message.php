<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Message extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // LOAD MODEL
        $this->load->model('m_message');

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
        $data['title']   = 'Pesan';
        $data['message'] = $this->m_message->read('','','','');
        
        // TEMPLATE
		$view         = "message/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    
    // UPDATE MESSAGE
    public function update() {
        csrfValidate();
        // POST
        $data['message_id']     = $this->input->post('message_id');
        $data['message_reply']  = $this->input->post('message_reply');
        $data['message_status'] = 1;
        $this->m_message->update($data);

        // LOG
        $message    = $this->session->userdata('user_name')." mengubah data message dengan ID : ".$this->input->post('message_id');
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data message dengan ID : ".$this->input->post('message_id');
        getAlert($alertStatus, $alertMessage);

        redirect('message');
    }
    
    // DELETE MESSAGE
    public function delete() {
        csrfValidate();
        // POST
        $this->m_message->delete($this->input->post('message_id'));
        
        // LOG
        $message    = $this->session->userdata('user_name')." menghapus data message dengan ID : ".$this->input->post('message_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data message dengan ID : ".$this->input->post('message_id');
        getAlert($alertStatus, $alertMessage);

        redirect('message');
    }
    
}
?>