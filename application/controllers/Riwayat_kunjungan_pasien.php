<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Riwayat_kunjungan_pasien extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // LOAD MODEL
        $this->load->model('m_riwayat_kunjungan_pasien');
        $this->load->model('m_pasien');
        $this->load->model('m_dokter');
        $this->load->model('m_poliklinik');
        $this->load->model('m_status_pasien');
        $this->load->model('m_kepesertaan_pasien');
        $this->load->model('m_jns_key');
        $this->load->model('m_user');
        $this->load->library('encryption');
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
        $data['setting'] = getSetting();
        $data['title'] = 'Data Rekam Medis Riwayat Kunjungan Pasien';
        $data['riwayat_kunjungan_pasien']  = $this->m_riwayat_kunjungan_pasien->read('','','','','','','','','','','');
        $data['pasien'] = $this->m_pasien->read('', '', '', '', '', '', '');
		
        
        // TEMPLATE
		$view         = "rekam_medis/riwayat_kunjungan_pasien/index";
		$viewCategory = "all";
		TemplateApp($data, $view, $viewCategory);
    }
    

    public function verification_key($jns_key_id, $key)
    {
        $settings       = getSetting();
        if ($jns_key_id == 1) {
            if ($key ==  $settings[0]->setting_key_aes) {
                return 1;
            } else {
                return 0;
            }
        } else {
            if ($key ==  $settings[0]->setting_key_speck) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function create_page()
    {
        $execution_time = microtime(true);

        //initialize
        $settings       = getSetting();
        $jns_key_id =  $this->input->post('jns_key_id');
        $keys =  $this->input->post('key');
        include "_speck.tv.class.php";

        $password = $this->verification_key($jns_key_id,    $keys);

        if ($password == 1) {

            //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Tambah Data';
        $data['pasien']  = $this->m_pasien->read('', '', '', '', '', '', $this->input->post('pasien_id'));
        $data['dokter']  = $this->m_dokter->read('', '', '', '');
        $data['poliklinik']  = $this->m_poliklinik->read('', '', '', '');
        $data['status_pasien']  = $this->m_status_pasien->read('', '', '');
        $data['kepesertaan_pasien']  = $this->m_kepesertaan_pasien->read('', '', '');
        $data['jns_key']  = $this->m_jns_key->read('', '', '');
        $data['user']  = $this->m_user->read('', '', '');
        $data['riwayat_kunjungan_pasien']       = $this->m_riwayat_kunjungan_pasien->read('', '', '', $this->input->post('pasien_id'), '', '', '', '', '', '', '');

        if ($jns_key_id == 1) {
            $key = $settings[0]->setting_key_aes;
            $this->encryption->initialize(
                array(
                    'cipher' => 'aes-128',
                    'mode' => 'ecb',
                    'key' => $key,
                )
            );
            //decrypt
            $data['nik_pasien'] =  $this->encryption->decrypt($data['pasien'][0]->nik_pasien);
            $data['no_kk'] =  $this->encryption->decrypt($data['pasien'][0]->no_kk);
            $data['alamat_pasien'] =  $this->encryption->decrypt($data['pasien'][0]->alamat_pasien);
            $data['no_telp_pasien'] =  $this->encryption->decrypt($data['pasien'][0]->no_telp_pasien);
        } else {
            $keys = $settings[0]->setting_key_speck;

            $key_schedule = array(); // declaration of variable Key Expansion
            $key =  $keys; //example of Key (16 characters or 128 bit)
            $speck = new _SPECK(); //instantiation 
            $key_schedule = $speck->expandKey($key, $key_schedule);

            $data['no_telp_pasien'] =  $speck->decrypt($data['pasien'][0]->no_telp_pasien, $key_schedule);
            $data['alamat_pasien'] =  $speck->decrypt($data['pasien'][0]->alamat_pasien, $key_schedule);
            $data['nik_pasien'] =  $speck->decrypt($data['pasien'][0]->nik_pasien, $key_schedule);
            $data['no_kk'] = $speck->decrypt($data['pasien'][0]->no_kk, $key_schedule);
        }

        $encrypttime = microtime(true) - $execution_time;

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Waktu dekripsi data : ". $encrypttime. " milisecond";
        getAlert($alertStatus, $alertMessage);

        // TEMPLATE
        $view         = "rekam_medis/riwayat_kunjungan_pasien/add";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);

        } else {;

            $alertStatus  = "failed";
            $alertMessage = "Maaf, Kunci yang anda masukan salah 🙂";
            getAlert($alertStatus, $alertMessage);

            redirect('riwayat_kunjungan_pasien');

        }
    }

    public function detail_page()
    {
        $execution_time = microtime(true);

        //initialize
        $settings       = getSetting();
        $jns_key_id =  $this->input->post('jns_key_id');
        $keys =  $this->input->post('key');
        include "_speck.tv.class.php";

        $password = $this->verification_key($jns_key_id,    $keys);

        if ($password == 1) {

            //DATA
            $data['setting']       = getSetting();
            $data['title']         = 'Detail Data';
            $data['riwayat_kunjungan_pasien']  = $this->m_riwayat_kunjungan_pasien->get($this->uri->segment(3));
            $data['pasien']  = $this->m_pasien->read('', '', '', '', '', '', $data['riwayat_kunjungan_pasien'][0]->pasien_id);
            $data['dokter']  = $this->m_dokter->read('', '', '', $data['riwayat_kunjungan_pasien'][0]->dokter_id);
            $data['poliklinik']  = $this->m_poliklinik->read('', '', '', $data['riwayat_kunjungan_pasien'][0]->poliklinik_id);
            $data['status_pasien']  = $this->m_status_pasien->read('', '', '');
            $data['kepesertaan_pasien']  = $this->m_kepesertaan_pasien->read('', '', '');

            if ($jns_key_id == 1) {
                $key = $settings[0]->setting_key_aes;
                $this->encryption->initialize(
                    array(
                        'cipher' => 'aes-128',
                        'mode' => 'ecb',
                        'key' => $key,
                    )
                );
                //decrypt
                $data['nik_pasien'] =  $this->encryption->decrypt($data['pasien'][0]->nik_pasien);
                $data['no_kk'] =  $this->encryption->decrypt($data['pasien'][0]->no_kk);
                $data['alamat_pasien'] =  $this->encryption->decrypt($data['pasien'][0]->alamat_pasien);
                $data['no_telp_pasien'] =  $this->encryption->decrypt($data['pasien'][0]->no_telp_pasien);
            } else {
                $keys = $settings[0]->setting_key_speck;

                $key_schedule = array(); // declaration of variable Key Expansion
                $key =  $keys; //example of Key (16 characters or 128 bit)
                $speck = new _SPECK(); //instantiation 
                $key_schedule = $speck->expandKey($key, $key_schedule);

                $data['no_telp_pasien'] =  $speck->decrypt($data['pasien'][0]->no_telp_pasien, $key_schedule);
                $data['alamat_pasien'] =  $speck->decrypt($data['pasien'][0]->alamat_pasien, $key_schedule);
                $data['nik_pasien'] =  $speck->decrypt($data['pasien'][0]->nik_pasien, $key_schedule);
                $data['no_kk'] = $speck->decrypt($data['pasien'][0]->no_kk, $key_schedule);
            }

            $encrypttime = microtime(true) - $execution_time;

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Waktu dekripsi data : ". $encrypttime. " milisecond";
            getAlert($alertStatus, $alertMessage);

            // TEMPLATE
            $view         = "rekam_medis/riwayat_kunjungan_pasien/detail";
            $viewCategory = "all";
            TemplateApp($data, $view, $viewCategory);

        } else {;

            $alertStatus  = "failed";
            $alertMessage = "Maaf, Kunci yang anda masukan salah 🙂";
            getAlert($alertStatus, $alertMessage);
    
            redirect('riwayat_kunjungan_pasien');
        }
    }

    public function update_page()
    {
        $execution_time = microtime(true);

        //initialize
        $settings       = getSetting();
        $jns_key_id =  $this->input->post('jns_key_id');
        $keys =  $this->input->post('key');
        include "_speck.tv.class.php";

        $password = $this->verification_key($jns_key_id,    $keys);

        if ($password == 1) {
            //DATA
            $data['setting']       = getSetting();
            $data['title']         = 'Ubah Data';
            $data['riwayat_kunjungan_pasien']  = $this->m_riwayat_kunjungan_pasien->get($this->uri->segment(3));
            $data['pasien']  = $this->m_pasien->read('', '', '', '', '', '', $data['riwayat_kunjungan_pasien'][0]->pasien_id);
            $data['dokter']  = $this->m_dokter->read('', '', '', '');
            $data['poliklinik']  = $this->m_poliklinik->read('', '', '', '');
            $data['status_pasien']  = $this->m_status_pasien->read('', '', '');
            $data['kepesertaan_pasien']  = $this->m_kepesertaan_pasien->read('', '', '');
            $data['user']  = $this->m_user->read('', '', '');
            

            if ($jns_key_id == 1) {
                $key = $settings[0]->setting_key_aes;
                $this->encryption->initialize(
                    array(
                        'cipher' => 'aes-128',
                        'mode' => 'ecb',
                        'key' => $key,
                    )
                );
                //decrypt
                $data['nik_pasien'] =  $this->encryption->decrypt($data['pasien'][0]->nik_pasien);
                $data['no_kk'] =  $this->encryption->decrypt($data['pasien'][0]->no_kk);
                $data['alamat_pasien'] =  $this->encryption->decrypt($data['pasien'][0]->alamat_pasien);
                $data['no_telp_pasien'] =  $this->encryption->decrypt($data['pasien'][0]->no_telp_pasien);
            } else {
                $keys = $settings[0]->setting_key_speck;

                $key_schedule = array(); // declaration of variable Key Expansion
                $key =  $keys; //example of Key (16 characters or 128 bit)
                $speck = new _SPECK(); //instantiation 
                $key_schedule = $speck->expandKey($key, $key_schedule);

                $data['no_telp_pasien'] =  $speck->decrypt($data['pasien'][0]->no_telp_pasien, $key_schedule);
                $data['alamat_pasien'] =  $speck->decrypt($data['pasien'][0]->alamat_pasien, $key_schedule);
                $data['nik_pasien'] =  $speck->decrypt($data['pasien'][0]->nik_pasien, $key_schedule);
                $data['no_kk'] = $speck->decrypt($data['pasien'][0]->no_kk, $key_schedule);
            }

            $encrypttime = microtime(true) - $execution_time;

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Waktu dekripsi data : ". $encrypttime. " milisecond";
            getAlert($alertStatus, $alertMessage);

            // TEMPLATE
            $view         = "rekam_medis/riwayat_kunjungan_pasien/update";
            $viewCategory = "all";
            TemplateApp($data, $view, $viewCategory);

        } else {;

        $alertStatus  = "failed";
        $alertMessage = "Maaf, Kunci yang anda masukan salah 🙂";
        getAlert($alertStatus, $alertMessage);

        redirect('riwayat_kunjungan_pasien');

        }
    }
    

    public function create() {
        csrfValidate();
        // POST
        $data['riwayat_kunjungan_pasien_id']   = '';
        $data['subjektif'] = $this->input->post('subjektif');
        $data['objektif'] = $this->input->post('objektif');
        $data['assesment'] = $this->input->post('assesment');
        $data['planning'] = $this->input->post('planning');
        $data['pasien_id'] = $this->input->post('pasien_id');
        $data['dokter_id'] = $this->input->post('dokter_id');
        $data['poliklinik_id'] = $this->input->post('poliklinik_id');
        $data['jns_key_id'] = $this->input->post('jns_key_id');
        $data['user_id'] = $this->input->post('user_id');
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_riwayat_kunjungan_pasien->create($data);

        // LOG
        $message    = $this->session->userdata('user_fullname')." menambah data rekam medis riwayat kunjungan pasien dengan ID Pasien : ".$data['pasien_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data rekam medis riwayat kunjungan pasien dengan ID Pasien : ".$data['pasien_id'];
        getAlert($alertStatus, $alertMessage);

        redirect('riwayat_kunjungan_pasien');
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['riwayat_kunjungan_pasien_id']   = $this->input->post('riwayat_kunjungan_pasien_id');
        $data['subjektif'] = $this->input->post('subjektif');
        $data['objektif'] = $this->input->post('objektif');
        $data['assesment'] = $this->input->post('assesment');
        $data['planning'] = $this->input->post('planning');
        $data['pasien_id'] = $this->input->post('pasien_id');
        $data['dokter_id'] = $this->input->post('dokter_id');
        $data['poliklinik_id'] = $this->input->post('poliklinik_id');
        $data['user_id'] = $this->input->post('user_id');
        $this->m_riwayat_kunjungan_pasien->update($data);

        // LOG
        $message    = $this->session->userdata('user_fullname')." mengubah data rekam medis riwayat kunjungan pasien dengan ID RM : ".$data['riwayat_kunjungan_pasien_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data rekam medis riwayat kunjungan pasien dengan ID RM : ".$data['riwayat_kunjungan_pasien_id'];
        getAlert($alertStatus, $alertMessage);

        redirect('riwayat_kunjungan_pasien');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_riwayat_kunjungan_pasien->delete($this->input->post('riwayat_kunjungan_pasien_id'));
        
        // LOG
        $message    = $this->session->userdata('user_fullname')." menghapus data rekam medis riwayat kunjungan pasien dengan ID RM : ".$this->input->post('riwayat_kunjungan_pasien_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data rekam medis riwayat kunjungan pasien dengan ID RM : ".$this->input->post('riwayat_kunjungan_pasien_id');
        getAlert($alertStatus, $alertMessage);

        redirect('riwayat_kunjungan_pasien');
    }

    public function print() {

        //initialize
        $settings       = getSetting();

        // echo "<pre>";
        // print_r($settings[0]->);
        // echo "</pre>";
        // die;

        $jns_key_id =  $this->input->post('jns_key_id');
        // $keys =  $this->input->post('key');
        include "_speck.tv.class.php";

        // $password = $this->verification_key($jns_key_id,    $keys);

        // DATA
        $data['setting']       = getSetting();
        $data['riwayat_kunjungan_pasien']  = $this->m_riwayat_kunjungan_pasien->get($this->uri->segment(3));
        $data['pasien']  = $this->m_pasien->read('', '', '', '', '', '', '');
        $data['dokter']  = $this->m_dokter->read('', '', '', $data['riwayat_kunjungan_pasien'][0]->dokter_id);
        $data['poliklinik']  = $this->m_poliklinik->read('', '', '', $data['riwayat_kunjungan_pasien'][0]->poliklinik_id);
        $data['status_pasien']  = $this->m_status_pasien->read('', '', '');
        $data['kepesertaan_pasien']  = $this->m_kepesertaan_pasien->read('', '', '');
        $data['jns_key']  = $this->m_jns_key->read('', '', '');

        if ($jns_key_id == 1) {
            $key = $settings[0]->setting_key_aes;
            $this->encryption->initialize(
                array(
                    'cipher' => 'aes-128',
                    'mode' => 'ecb',
                    'key' => $key,
                )
            );
            //decrypt
            $data['nik_pasien'] =  $this->encryption->decrypt($data['pasien'][0]->nik_pasien);
            $data['no_kk'] =  $this->encryption->decrypt($data['pasien'][0]->no_kk);
            $data['alamat_pasien'] =  $this->encryption->decrypt($data['pasien'][0]->alamat_pasien);
            $data['no_telp_pasien'] =  $this->encryption->decrypt($data['pasien'][0]->no_telp_pasien);
        } else {
            $keys = $settings[0]->setting_key_speck;

            $key_schedule = array(); // declaration of variable Key Expansion
            $key =  $keys; //example of Key (16 characters or 128 bit)
            $speck = new _SPECK(); //instantiation 
            $key_schedule = $speck->expandKey($key, $key_schedule);

            $data['no_telp_pasien'] =  $speck->decrypt($data['pasien'][0]->no_telp_pasien, $key_schedule);
            $data['alamat_pasien'] =  $speck->decrypt($data['pasien'][0]->alamat_pasien, $key_schedule);
            $data['nik_pasien'] =  $speck->decrypt($data['pasien'][0]->nik_pasien, $key_schedule);
            $data['no_kk'] = $speck->decrypt($data['pasien'][0]->no_kk, $key_schedule);
        }

        // TEMPLATE
        $view         = "rekam_medis/riwayat_kunjungan_pasien/print_page";
        $viewCategory = "single";
        TemplateApp($data, $view, $viewCategory);
    }
    
}
?>