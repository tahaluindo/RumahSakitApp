<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pemeriksaan_odontogram extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // LOAD MODEL
        $this->load->model('m_pemeriksaan_odontogram');
        $this->load->model('m_pasien');
        $this->load->model('m_dokter');
        $this->load->model('m_user');
        $this->load->model('m_jns_key');
        $this->load->library('encryption');
        // SESSION
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
        $data['title']         = 'Rekam Medis Pemeriksaan Odontogram';
        $data['pemeriksaan_odontogram']        = $this->m_pemeriksaan_odontogram->read('', '', '', '', '', '', '', '');
        $data['pasien']  = $this->m_pasien->read('', '', '', '', '', '', '');
		$data['jns_key']  = $this->m_jns_key->read('', '', '');
        
        // TEMPLATE
		$view         = "rekam_medis/pemeriksaan_odontogram/index";
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
        $data['jns_key']  = $this->m_jns_key->read('', '', '');
        $data['user']  = $this->m_user->read('', '', '');
        $data['pemeriksaan_odontogram']       = $this->m_pemeriksaan_odontogram->read('', '', '', $this->input->post('pasien_id'), '', '', '', '');

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
        $view         = "rekam_medis/pemeriksaan_odontogram/add";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);

    } else {;

        $alertStatus  = "failed";
        $alertMessage = "Maaf, Kunci yang anda masukan salah 🙂";
        getAlert($alertStatus, $alertMessage);

        redirect('pemeriksaan_odontogram');

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
            $data['pemeriksaan_odontogram']  = $this->m_pemeriksaan_odontogram->get($this->uri->segment(3));
            $data['pasien']  = $this->m_pasien->read('', '', '', '', '', '', $data['pemeriksaan_odontogram'][0]->pasien_id);
            $data['dokter']  = $this->m_dokter->read('', '', '', '');
            $data['jns_key']  = $this->m_jns_key->read('', '', '');
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
            $view         = "rekam_medis/pemeriksaan_odontogram/detail";
            $viewCategory = "all";
            TemplateApp($data, $view, $viewCategory);

        } else {;

            $alertStatus  = "failed";
            $alertMessage = "Maaf, Kunci yang anda masukan salah 🙂";
            getAlert($alertStatus, $alertMessage);
    
            redirect('pemeriksaan_odontogram');
    
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
            $data['pemeriksaan_odontogram']  = $this->m_pemeriksaan_odontogram->get($this->uri->segment(3));
            $data['pasien']  = $this->m_pasien->read('', '', '', '', '', '', $data['pemeriksaan_odontogram'][0]->pasien_id);
            $data['dokter']  = $this->m_dokter->read('', '', '', '');
            $data['jns_key']  = $this->m_jns_key->read('', '', '');
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
            $view         = "rekam_medis/pemeriksaan_odontogram/update";
            $viewCategory = "all";
            TemplateApp($data, $view, $viewCategory);

        } else {;

            $alertStatus  = "failed";
            $alertMessage = "Maaf, Kunci yang anda masukan salah 🙂";
            getAlert($alertStatus, $alertMessage);
    
            redirect('pemeriksaan_odontogram');
    
            }
    }
    

    public function create() {
        csrfValidate();
        // POST
        $data['pemeriksaan_odontogram_id']   = '';
        $data['odontogram_11_51'] = $this->input->post('odontogram_11_51');
        $data['odontogram_12_52'] = $this->input->post('odontogram_12_52');
        $data['odontogram_13_53'] = $this->input->post('odontogram_13_53');
        $data['odontogram_14_54'] = $this->input->post('odontogram_14_54');
        $data['odontogram_15_55'] = $this->input->post('odontogram_15_55');
        $data['odontogram_16'] = $this->input->post('odontogram_16');
        $data['odontogram_17'] = $this->input->post('odontogram_17');
        $data['odontogram_18'] = $this->input->post('odontogram_18');
        $data['odontogram_61_21'] = $this->input->post('odontogram_61_21');
        $data['odontogram_62_22'] = $this->input->post('odontogram_62_22');
        $data['odontogram_63_23'] = $this->input->post('odontogram_63_23');
        $data['odontogram_64_24'] = $this->input->post('odontogram_64_24');
        $data['odontogram_65_25'] = $this->input->post('odontogram_65_25');
        $data['odontogram_26'] = $this->input->post('odontogram_26');
        $data['odontogram_27'] = $this->input->post('odontogram_27');
        $data['odontogram_28'] = $this->input->post('odontogram_28');
        $data['odontogram_48'] = $this->input->post('odontogram_48');
        $data['odontogram_47'] = $this->input->post('odontogram_47');
        $data['odontogram_46'] = $this->input->post('odontogram_46');
        $data['odontogram_45_85'] = $this->input->post('odontogram_45_85');
        $data['odontogram_44_84'] = $this->input->post('odontogram_44_84');
        $data['odontogram_43_83'] = $this->input->post('odontogram_43_83');
        $data['odontogram_42_82'] = $this->input->post('odontogram_42_82');
        $data['odontogram_41_81'] = $this->input->post('odontogram_41_81');
        $data['odontogram_38'] = $this->input->post('odontogram_38');
        $data['odontogram_37'] = $this->input->post('odontogram_37');
        $data['odontogram_36'] = $this->input->post('odontogram_36');
        $data['odontogram_75_35'] = $this->input->post('odontogram_75_35');
        $data['odontogram_74_34'] = $this->input->post('odontogram_74_34');
        $data['odontogram_73_33'] = $this->input->post('odontogram_73_33');
        $data['odontogram_72_32'] = $this->input->post('odontogram_72_32');
        $data['odontogram_71_31'] = $this->input->post('odontogram_71_31');
        $data['keterangan_tambahan'] = $this->input->post('keterangan_tambahan');
        $data['jumlah_photo_diambil'] = $this->input->post('jumlah_photo_diambil');
        $data['jumlah_rongten_photo_diambil'] = $this->input->post('jumlah_rongten_photo_diambil');
        $data['pasien_id'] = $this->input->post('pasien_id');
        $data['dokter_id'] = $this->input->post('dokter_id');
        $data['jns_key_id'] = $this->input->post('jns_key_id');
        $data['user_id'] = $this->input->post('user_id');
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_pemeriksaan_odontogram->create($data);

        // LOG
        $message    = $this->session->userdata('user_fullname')." menambah data rekam medis pemeriksaan odontogram dengan ID pasien : ".$data['pasien_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data rekam medis pemeriksaan odontogram dengan ID pasien : ".$data['pasien_id'];
        getAlert($alertStatus, $alertMessage);

        redirect('pemeriksaan_odontogram');
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['pemeriksaan_odontogram_id']   = $this->input->post('pemeriksaan_odontogram_id');
        $data['odontogram_11_51'] = $this->input->post('odontogram_11_51');
        $data['odontogram_12_52'] = $this->input->post('odontogram_12_52');
        $data['odontogram_13_53'] = $this->input->post('odontogram_13_53');
        $data['odontogram_14_54'] = $this->input->post('odontogram_14_54');
        $data['odontogram_15_55'] = $this->input->post('odontogram_15_55');
        $data['odontogram_16'] = $this->input->post('odontogram_16');
        $data['odontogram_17'] = $this->input->post('odontogram_17');
        $data['odontogram_18'] = $this->input->post('odontogram_18');
        $data['odontogram_61_21'] = $this->input->post('odontogram_61_21');
        $data['odontogram_62_22'] = $this->input->post('odontogram_62_22');
        $data['odontogram_63_23'] = $this->input->post('odontogram_63_23');
        $data['odontogram_64_24'] = $this->input->post('odontogram_64_24');
        $data['odontogram_65_25'] = $this->input->post('odontogram_65_25');
        $data['odontogram_26'] = $this->input->post('odontogram_26');
        $data['odontogram_27'] = $this->input->post('odontogram_27');
        $data['odontogram_28'] = $this->input->post('odontogram_28');
        $data['odontogram_48'] = $this->input->post('odontogram_48');
        $data['odontogram_47'] = $this->input->post('odontogram_47');
        $data['odontogram_46'] = $this->input->post('odontogram_46');
        $data['odontogram_45_85'] = $this->input->post('odontogram_45_85');
        $data['odontogram_44_84'] = $this->input->post('odontogram_44_84');
        $data['odontogram_43_83'] = $this->input->post('odontogram_43_83');
        $data['odontogram_42_82'] = $this->input->post('odontogram_42_82');
        $data['odontogram_41_81'] = $this->input->post('odontogram_41_81');
        $data['odontogram_38'] = $this->input->post('odontogram_38');
        $data['odontogram_37'] = $this->input->post('odontogram_37');
        $data['odontogram_36'] = $this->input->post('odontogram_36');
        $data['odontogram_75_35'] = $this->input->post('odontogram_75_35');
        $data['odontogram_74_34'] = $this->input->post('odontogram_74_34');
        $data['odontogram_73_33'] = $this->input->post('odontogram_73_33');
        $data['odontogram_72_32'] = $this->input->post('odontogram_72_32');
        $data['odontogram_71_31'] = $this->input->post('odontogram_71_31');
        $data['keterangan_tambahan'] = $this->input->post('keterangan_tambahan');
        $data['jumlah_photo_diambil'] = $this->input->post('jumlah_photo_diambil');
        $data['jumlah_rongten_photo_diambil'] = $this->input->post('jumlah_rongten_photo_diambil');
        $data['pasien_id'] = $this->input->post('pasien_id');
        $data['dokter_id'] = $this->input->post('dokter_id');
        $data['user_id'] = $this->input->post('user_id');
        // echo '<pre>';
        // print_r($data);
        // die;
        $this->m_pemeriksaan_odontogram->update($data);

        // LOG
        $message    = $this->session->userdata('user_fullname')." mengubah data rekam medis pemeriksaan odontogram dengan ID RM : ".$data['pemeriksaan_odontogram_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data rekam medis pemeriksaan odontogram dengan ID RM : ".$data['pemeriksaan_odontogram_id'];
        getAlert($alertStatus, $alertMessage);

        redirect('pemeriksaan_odontogram');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_pemeriksaan_odontogram->delete($this->input->post('pemeriksaan_odontogram_id'));
        
        // LOG
        $message    = $this->session->userdata('user_name')." menghapus data rekam medis pemeriksaan odontogram dengan ID RM : ".$this->input->post('pemeriksaan_odontogram_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data rekam medis pemeriksaan odontogram dengan ID RM : ".$this->input->post('pemeriksaan_odontogram_id');
        getAlert($alertStatus, $alertMessage);

        redirect('pemeriksaan_odontogram');
    }
    
    public function print() {

        //initialize
        $settings       = getSetting();

        $jns_key_id =  $this->input->post('jns_key_id');
        // $keys =  $this->input->post('key');
        include "_speck.tv.class.php";

        // $password = $this->verification_key($jns_key_id,    $keys);

        // DATA
        $data['setting']       = getSetting();
        $data['pemeriksaan_odontogram']  = $this->m_pemeriksaan_odontogram->get($this->uri->segment(3));
        $data['pasien']  = $this->m_pasien->read('', '', '', '', '', '', $data['pemeriksaan_odontogram'][0]->pasien_id);
        $data['dokter']  = $this->m_dokter->read('', '', '', '');
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
        $view         = "rekam_medis/pemeriksaan_odontogram/print_page";
        $viewCategory = "single";
        TemplateApp($data, $view, $viewCategory);
    }

}
?>