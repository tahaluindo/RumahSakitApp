<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dokter extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // LOAD MODEL AND LIBRARY
        $this->load->model('m_dokter');
        $this->load->library('upload');
        
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
        $data['title']         = 'Data Dokter';
        $data['dokter']        = $this->m_dokter->read('','','','');
		
        // TEMPLATE
		$view         = "dokter/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }

    // CREATE DATA DOKTER
    public function create() {
        csrfValidate();

        // Upload TTD Dokter
        $path = './upload/ttd/';

        $filename_1              = "dokter-".date('YmdHis');
        $config['upload_path']   = $path;
        $config['allowed_types'] = "jpg|jpeg|png|svg";
        $config['overwrite']     = "true";
        $config['max_size']      = "0";
        $config['file_name']     = '' . $filename_1;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('ttd_dokter')) { 
            // ALERT
            $alertStatus  = "failed";
            $alertMessage = $this->upload->display_errors();
            getAlert($alertStatus, $alertMessage);
        } else {
            $dat  = $this->upload->data();

            // POST
            $data['dokter_id']   = '';
            $data['nama_dokter'] = $this->input->post('nama_dokter');
            $data['spesialis'] = $this->input->post('spesialis');
            $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
            $data['ttd_dokter'] = $dat['file_name'];
            $data['createtime']  = date('Y-m-d H:i:s');
            $this->m_dokter->create($data);

            // LOG
            $message    = $this->session->userdata('user_fullname')." menambah data dokter dengan nama : ".$data['nama_dokter'];
            createLog($message);

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Berhasil menambah data dokter dengan nama : ".$data['nama_dokter'];
            getAlert($alertStatus, $alertMessage);

            redirect('dokter');
        }
    }
    
    // UPDATE DATA DOKTER
    public function update() {
        csrfValidate();
        
        // Update TTD Dokter
        if($_FILES['ttd_dokter']['name'] !="") {
            $path = './upload/ttd/';

            $filename_1              = "dokter-".date('YmdHis');
            $config['upload_path']   = $path;
            $config['allowed_types'] = "jpg|jpeg|png|svg";
            $config['overwrite']     = "true";
            $config['max_size']      = "0";
            $config['file_name']     = '' . $filename_1;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('ttd_dokter')) { 
                // ALERT
                $alertStatus  = "failed";
                $alertMessage = $this->upload->display_errors();
                getAlert($alertStatus, $alertMessage);
            } else {
                $dat  = $this->upload->data();
                unlink($path.$this->input->post('ttd_dokter_old'));
                // POST
                $data['dokter_id']   = $this->input->post('dokter_id');
                $data['nama_dokter'] = $this->input->post('nama_dokter');
                $data['spesialis'] = $this->input->post('spesialis');
                $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
                $data['ttd_dokter'] = $dat['file_name'];
                $this->m_dokter->update($data);

                // LOG
                $message    = $this->session->userdata('user_fullname')." mengubah data dokter dengan nama : ".$data['nama_dokter'];
                createLog($message);

                // ALERT
                $alertStatus  = "success";
                $alertMessage = "Berhasil mengubah data dokter dengan nama : ".$data['nama_dokter'];
                getAlert($alertStatus, $alertMessage);


            }

        }else{
        // POST
        $data['dokter_id']   = $this->input->post('dokter_id');
        $data['nama_dokter'] = $this->input->post('nama_dokter');
        $data['spesialis'] = $this->input->post('spesialis');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $this->m_dokter->update($data);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data dokter dengan nama : ".$data['nama_dokter'];
        getAlert($alertStatus, $alertMessage);

        }

        redirect('dokter');
    }
    
    // DLETE DATA DOKTER
    public function delete() {
        csrfValidate();
        // POST
        $this->m_dokter->delete($this->input->post('dokter_id'));
        unlink('./upload/ttd/'.$this->input->post('ttd_dokter'));

        // LOG
        $message    = $this->session->userdata('user_fullname')." menghapus data dokter dengan ID : ".$this->input->post('dokter_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data dokter dengan ID : ".$this->input->post('dokter_id');
        getAlert($alertStatus, $alertMessage);

        redirect('dokter');
    }
    
}

?>