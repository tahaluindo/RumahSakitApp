<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News_category extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_news_category');
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
        $data['setting']       = getSetting();
        $data['title']         = 'Kategori Informasi';
        $data['news_category'] = $this->m_news_category->read('', '', '');
		
        
        // TEMPLATE
		$view         = "news/news_category";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
        

    public function create() {
        csrfValidate();
        // POST
        $data['news_category_id']   = '';
        $data['news_category_name'] = $this->input->post('news_category_name');
        $data['createtime']         = date('Y-m-d H:i:s');
        $this->m_news_category->create($data);

        // LOG
        $message    = $this->session->userdata('user_fullname')." menambah data kategori informasi ".$data['news_category_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data kategori informasi ".$data['news_category_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('news_category');
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['news_category_id']   = $this->input->post('news_category_id');
        $data['news_category_name'] = $this->input->post('news_category_name');
        $this->m_news_category->update($data);

        // LOG
        $message    = $this->session->userdata('user_fullname')." mengubah data kategori informasi dengan ID - nama = ".$data['news_category_id']." - ".$data['news_category_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data kategori informasi : ".$data['news_category_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('news_category');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_news_category->delete($this->input->post('news_category_id'));
        
        // LOG
        $message    = $this->session->userdata('user_name')." menghapus data kategori informasi dengan ID : ".$this->input->post('news_category_id')." - ".$this->input->post('news_category_name');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data kategori informasi : ".$this->input->post('news_category_id');
        getAlert($alertStatus, $alertMessage);

        redirect('news_category');
    }
    
}
?>