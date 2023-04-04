<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Slider extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // LOAD MODEL & LIBRARY
        $this->load->model('m_slider');
        $this->load->library('upload');
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
        $data['title']   = 'Slider';
        $data['slider']  = $this->m_slider->read('','','');
		
        
        // TEMPLATE
		$view         = "slider/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function create() {
        csrfValidate();

        $path = './upload/slider/';

        $filename_1              = "slider-".date('YmdHis');
        $config['upload_path']   = $path;
        $config['allowed_types'] = "png|jpeg|jpg";
        $config['overwrite']     = "true";
        $config['max_size']      = "0";
        $config['max_width']     = "10000";
        $config['max_height']    = "10000";
        $config['file_name']     = '' . $filename_1;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('slider_image')) { 
            // ALERT
            $alertStatus  = "failed";
            $alertMessage = $this->upload->display_errors();
            getAlert($alertStatus, $alertMessage);
        } else {
            $dat  = $this->upload->data();

            // POST
            $data['slider_id']    = '';
            $data['slider_title'] = $this->input->post('slider_title');
            $data['slider_text']  = $this->input->post('slider_text');
            $data['slider_image'] = $dat['file_name'];
            $data['createtime']   = date('Y-m-d H:i:s');
            $this->m_slider->create($data);

            // LOG
            $message    = $this->session->userdata('user_fullname')." menambah data slider dengan nama : ".$data['slider_title'];
            createLog($message);

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Berhasil menambah data slider dengan nama : ".$data['slider_title'];
            getAlert($alertStatus, $alertMessage);
        }
        

        redirect('slider');
    }
    

    public function update() {
        csrfValidate();

        if($_FILES['slider_image']['name'] !=""){
            $path = './upload/slider/';

            $filename_1              = "slider-".date('YmdHis');
            $config['upload_path']   = $path;
            $config['allowed_types'] = "png|jpeg|jpg";
            $config['overwrite']     = "true";
            $config['max_size']      = "0";
            $config['max_width']     = "10000";
            $config['max_height']    = "10000";
            $config['file_name']     = '' . $filename_1;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('slider_image')) { 
                // ALERT
                $alertStatus  = "failed";
                $alertMessage = $this->upload->display_errors();
                getAlert($alertStatus, $alertMessage);
            } else {
                $dat  = $this->upload->data();
                unlink($path.$this->input->post('slider_image_old'));
                // POST
                $data['slider_id']   = $this->input->post('slider_id');
                $data['slider_title'] = $this->input->post('slider_title');
                $data['slider_text']  = $this->input->post('slider_text');
                $data['slider_image'] = $dat['file_name'];
                $data['createtime']   = date('Y-m-d H:i:s');
                $this->m_slider->update($data);

                // LOG
                $message    = $this->session->userdata('user_fullname')." mengubah data slider dengan ID : ".$data['slider_id'];
                createLog($message);

                // ALERT
                $alertStatus  = "success";
                $alertMessage = "Berhasil mengubah data slider dengan ID - ".$data['slider_id'];
                getAlert($alertStatus, $alertMessage);
            }
        }else{
            // POST
            $data['slider_id']   = $this->input->post('slider_id');
            $data['slider_title'] = $this->input->post('slider_title');
            $data['slider_text']  = $this->input->post('slider_text');
            $data['createtime']   = date('Y-m-d H:i:s');
            $this->m_slider->update($data);

            // LOG
            $message    = $this->session->userdata('user_fullname')." mengubah data slider dengan ID : ".$data['slider_id'];
            createLog($message);

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Berhasil mengubah data slider dengan ID : ".$data['slider_id'];
            getAlert($alertStatus, $alertMessage);
        }



        redirect('slider');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_slider->delete($this->input->post('slider_id'));
        unlink('./upload/slider/'.$this->input->post('slider_image'));
        // LOG
        $message    = $this->session->userdata('user_name')." menghapus data slider dengan ID = ".$this->input->post('slider_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data slider dengan ID : ".$this->input->post('slider_id');
        getAlert($alertStatus, $alertMessage);

        redirect('slider');
    }
    
}
?>