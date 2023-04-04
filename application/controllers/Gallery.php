<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gallery extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // LOAD MODEL & LIBRARY
        $this->load->model('m_gallery');
        $this->load->library('upload');
        // SESSION
        if (!($this->session->userdata('user_id'))) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('auth');
		}
    }
    

    /**
     * ---------------------------------------------------------------------
     * SECTION GALLERY ALBUM / VIDEO
     * ---------------------------------------------------------------------
     */
    public function data() {
   
        //DATA
        $data['setting'] = getSetting();
        $data['gallery'] = $this->m_gallery->read('', '', '', $this->uri->segment(3));


        if($this->uri->segment(3) == 'photo'){
            $data['title']   = 'Galeri Foto';
            $view            = "gallery/gallery";
        }else{
            $data['title']   = 'Galeri Video';
            $view            = "gallery/video";
        }
        
        
        // TEMPLATE
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function create() {
        csrfValidate();

        if($_FILES['gallery_cover']['name'] !=""){
            if($this->input->post('gallery_type') == 'photo'){
                $filename_1      = "gallery-".date('YmdHis');
                $path            = './upload/gallery/cover/';
                $config['allowed_types'] = "jpeg|jpg|png";
            }else{
                $filename_1      = "video-".date('YmdHis');
                $path            = './upload/gallery/video/';
                $config['allowed_types'] = "mp4|mpeg|mkv|avi";
            }

            $config['upload_path']   = $path;
            $config['overwrite']     = "true";
            $config['max_size']      = "0";
            $config['max_width']     = "10000";
            $config['max_height']    = "10000";
            $config['file_name']     = '' . $filename_1;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gallery_cover')) { 
                // ALERT
                $alertStatus  = "failed";
                $alertMessage = $this->upload->display_errors();
                getAlert($alertStatus, $alertMessage);
            } else {
                $dat  = $this->upload->data();

                // POST
                $data['gallery_id']          = '';
                $data['gallery_name']        = $this->input->post('gallery_name');
                $data['gallery_cover']       = $dat['file_name'];
                $data['gallery_description'] = $this->input->post('gallery_description');
                $data['gallery_date']        = $this->input->post('gallery_date');
                if($this->input->post('gallery_type') == 'video'){
                    $data['gallery_url']        = $this->input->post('gallery_url');
                }
                $data['gallery_type']        = $this->input->post('gallery_type');
                $data['createtime']          = date('Y-m-d H:i:s');
                $this->m_gallery->create($data);

                // LOG
                $message    = $this->session->userdata('user_fullname')." menambah data galeri dengan nama : ".$data['gallery_name'];
                createLog($message);

                // ALERT
                $alertStatus  = "success";
                $alertMessage = "Berhasil menambah data galeri dengan nama : ".$data['gallery_name'];
                getAlert($alertStatus, $alertMessage);
            }
        }else{
            // POST
            $data['gallery_id']          = '';
            $data['gallery_name']        = $this->input->post('gallery_name');
            $data['gallery_description'] = $this->input->post('gallery_description');
            $data['gallery_date']        = $this->input->post('gallery_date');
            if($this->input->post('gallery_type') == 'video'){
                $data['gallery_url']        = $this->input->post('gallery_url');
            }
            $data['gallery_type']        = $this->input->post('gallery_type');
            $data['createtime']          = date('Y-m-d H:i:s');
            $this->m_gallery->create($data);

            // LOG
            $message    = $this->session->userdata('user_fullname')." menambah data galeri dengan nama : ".$data['gallery_name'];
            createLog($message);

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Berhasil menambah data galeri dengan nama : ".$data['gallery_name'];
            getAlert($alertStatus, $alertMessage);
        }

        redirect('gallery/data/'.$data['gallery_type']);
    }
    

    public function update() {
        csrfValidate();

        if($_FILES['gallery_cover']['name'] !=""){
            if($this->input->post('gallery_type') == 'photo'){
                $filename_1      = "gallery-".date('YmdHis');
                $path            = './upload/gallery/cover/';
                $config['allowed_types'] = "jpeg|jpg|png";
            }else{
                $filename_1      = "video-".date('YmdHis');
                $path            = './upload/gallery/video/';
                $config['allowed_types'] = "mp4|mpeg|mkv|avi";
            }

            $config['upload_path']   = $path;
            $config['overwrite']     = "true";
            $config['max_size']      = "0";
            $config['max_width']     = "10000";
            $config['max_height']    = "10000";
            $config['file_name']     = '' . $filename_1;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gallery_cover')) { 
                // ALERT
                $alertStatus  = "failed";
                $alertMessage = $this->upload->display_errors();
                getAlert($alertStatus, $alertMessage);
            } else {
                $dat  = $this->upload->data();
                unlink($path.$this->input->post('gallery_cover_old'));
                
                // POST
                $data['gallery_id']          = $this->input->post('gallery_id');
                $data['gallery_name']        = $this->input->post('gallery_name');
                $data['gallery_description'] = $this->input->post('gallery_description');
                $data['gallery_type']        = $this->input->post('gallery_type');
                if($this->input->post('gallery_type') == 'video'){
                    $data['gallery_url']        = $this->input->post('gallery_url');
                }
                $data['gallery_cover']       = $dat['file_name'];
                $this->m_gallery->update($data);

                // LOG
                $message    = $this->session->userdata('user_fullname')." menambah data galeri dengan ID - nama : ".$data['gallery_id']." - ".$data['gallery_name'];
                createLog($message);

                // ALERT
                $alertStatus  = "success";
                $alertMessage = "Berhasil menambah data galeri dengan nama ".$data['gallery_name'];
                getAlert($alertStatus, $alertMessage);
            }
        }else{
            // POST
            $data['gallery_id']          = $this->input->post('gallery_id');
            $data['gallery_name']        = $this->input->post('gallery_name');
            $data['gallery_description'] = $this->input->post('gallery_description');
            $data['gallery_type']        = $this->input->post('gallery_type');
            if($this->input->post('gallery_type') == 'video'){
                $data['gallery_url']        = $this->input->post('gallery_url');
            }
            $this->m_gallery->update($data);

            // LOG
            $message    = $this->session->userdata('user_fullname')." mengubah data galeri dengan ID - nama : ".$data['gallery_id']." - ".$data['gallery_name'];
            createLog($message);

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Berhasil mengubah data galeri dengan nama : ".$data['gallery_name'];
            getAlert($alertStatus, $alertMessage);
        }


        redirect('gallery/data/'.$data['gallery_type']);
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_gallery->delete($this->input->post('gallery_id'));
        if($this->input->post('gallery_type') == 'photo'){
            unlink('./upload/gallery/cover/'.$this->input->post('gallery_cover'));
            // DELETE RECURSIVE ALL PHOTO BY ID
            $getAllPhoto = $this->m_gallery->read_gallery('','','',$this->input->post('gallery_id'));
            foreach($getAllPhoto as $gAP){
                $this->m_gallery->delete_gallery($gAP->gallery_photo_token);
                unlink('./upload/gallery/photo/'.$gAP->gallery_photo_name);
            }
        }else{
            if($this->input->post('gallery_cover') !=""){
                unlink('./upload/gallery/video/'.$this->input->post('gallery_cover'));
            }
        }

        

        // LOG
        $message    = $this->session->userdata('user_fullname')." menghapus data galeri dengan ID : ".$this->input->post('gallery_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data galeri dengan ID : ".$this->input->post('gallery_id');
        getAlert($alertStatus, $alertMessage);

        redirect('gallery/data/'.$this->uri->segment(3));
    }

    /**
     * ---------------------------------------------------------------------
     * SECTION GALLERY FOTO UPLOAD
     * ---------------------------------------------------------------------
     */

    public function all_photo() {
        
        //DATA
        $data['setting']      = getSetting();
        $data['title']        = 'Galeri Foto : ';
        $data['allphoto']     = $this->m_gallery->read_gallery('', '', '', $this->uri->segment(3));
        $data['gallery_name'] = $this->m_gallery->get($this->uri->segment(3));
		
        
        // TEMPLATE
		$view         = "gallery/allphoto";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }

    public function dropzone_photo() { 
        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Upload Foto Batch';
        $data['gallery_name'] = $this->m_gallery->get($this->uri->segment(3));
		
        // TEMPLATE
		$view         = "gallery/_create";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }

    public function delete_gallery() {
        csrfValidate();
        // POST
        $this->m_gallery->delete_gallery($this->input->post('gallery_photo_token'));
        unlink('./upload/gallery/photo/'.$this->input->post('gallery_photo_name'));
        
        // LOG
        $message    = $this->session->userdata('user_fullname')." menghapus data form dengan ID : ".$this->input->post('gallery_photo_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data form ID : ".$this->input->post('gallery_photo_id');
        getAlert($alertStatus, $alertMessage);

        redirect('gallery/all_photo/'.$this->input->post('gallery_id'));
    }



    // AJAX
   
	public function ajaxupload(){
        $config['upload_path']   = './upload/gallery/photo';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name']     = 'photo-'.$this->uri->segment(3).'-'.date('YmdHis')."-".rand(1000,9999);
        $this->upload->initialize($config);
        if($this->upload->do_upload('userfile')){
        	
        	$data['gallery_photo_name']  = $this->upload->data('file_name');
        	$data['gallery_photo_token'] = $this->input->post('token');
        	$data['gallery_id']          = $this->uri->segment(3);
        	$data['createtime']          = date('Y-m-d H:i:s');
        	$this->m_gallery->create_gallery($data);
        }
	}


    public function ajaxremove(){
		$token = $this->input->post('token');
		$image = $this->db->get_where('tbl_web_gallery_photo', array('gallery_photo_token'=>$token));

		if($image->num_rows()>0){
			$getImage    = $image->row();
			$geImageName = $getImage->gallery_photo_name;
			if(file_exists($file='./upload/gallery/photo/'.$geImageName)){
				unlink($file);
			}
			$this->m_gallery->delete_gallery($token);
		}
		echo "{}";
	}


    
    
}
?>