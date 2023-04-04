<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faq extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // LOAD MODEL
        $this->load->model('m_faq');

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
        $data['title']   = 'F.A.Q';
        $data['faq']   = $this->m_faq->read('','','');
		
        
        // TEMPLATE
		$view         = "faq/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }

    // CREATE FAQ
    public function create() {
        csrfValidate();
        // POST
        $data['faq_id']   = '';
        $data['faq_question'] = $this->input->post('faq_question');
        $data['faq_answer'] = $this->input->post('faq_answer');
        $data['createtime'] = date('Y-m-d H:i:s');
        $this->m_faq->create($data);

        // LOG
        $message    = $this->session->userdata('user_fullname')." menambah data faq dengan pertanyaan : ".$data['faq_question'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data faq dengan pertanyaan : ".$data['faq_question'];
        getAlert($alertStatus, $alertMessage);

        redirect('faq');
    }
    
    // UPDATE FAQ
    public function update() {
        csrfValidate();
        // POST
        $data['faq_id']      = $this->input->post('faq_id');
        $data['faq_question']    = $this->input->post('faq_question');
        $data['faq_answer'] = $this->input->post('faq_answer');
        $this->m_faq->update($data);

        // LOG
        $message    = $this->session->userdata('user_fullname')." mengubah data faq dengan pertanyaan : ".$data['faq_question'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data faq dengan pertanyaan : ".$data['faq_question'];
        getAlert($alertStatus, $alertMessage);

        redirect('faq');
    }
    
    // DELETE FAQ
    public function delete() {
        csrfValidate();
        // POST
        $this->m_faq->delete($this->input->post('faq_id'));
        
        // LOG
        $message    = $this->session->userdata('user_fullname')." menghapus data faq dengan ID : ".$this->input->post('faq_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data faq dengan ID : ".$this->input->post('faq_id');
        getAlert($alertStatus, $alertMessage);

        redirect('faq');
    }
    
}
?>