<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Log extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // LOAD MODEL
        $this->load->model('m_log');

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
        $data['title']   = 'Aktivitas Log';
        $data['log']     = $this->m_log->read('','','');
		
        
        // TEMPLATE
		$view         = "log/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    
}
?>