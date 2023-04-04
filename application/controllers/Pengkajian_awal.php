<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengkajian_awal extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_pengkajian_awal');
        $this->load->model('m_pasien');
        $this->load->model('m_pegawai');
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
        $data['setting']       = getSetting();
        $data['title']         = 'Data Rekam Medis Pengkajian Awal';
        $data['pengkajian_awal']  = $this->m_pengkajian_awal->read('','','','','','','','');
        $data['pasien']  = $this->m_pasien->read('', '', '', '', '', '', '');
		
        
        // TEMPLATE
		$view         = "rekam_medis/pengkajian_awal/index";
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
            $data['pegawai']  = $this->m_pegawai->read('', '', '', '');
            $data['jns_key']  = $this->m_jns_key->read('', '', '');
            $data['user']  = $this->m_user->read('', '', '');
            $data['pengkajian_awal']       = $this->m_pengkajian_awal->read('', '', '', $this->input->post('pasien_id'), '', '', '', '');

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
        $view         = "rekam_medis/pengkajian_awal/add";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);

        } else {;

        $alertStatus  = "failed";
        $alertMessage = "Maaf, Kunci yang anda masukan salah 🙂";
        getAlert($alertStatus, $alertMessage);

        redirect('pengkajian_awal');

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
            $data['pengkajian_awal']  = $this->m_pengkajian_awal->get($this->uri->segment(3));
            $data['pasien']  = $this->m_pasien->read('', '', '', '', '', '', $data['pengkajian_awal'][0]->pasien_id);
            $data['pegawai']  = $this->m_pegawai->read('', '', '', $data['pengkajian_awal'][0]->pegawai_id);
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
            $view         = "rekam_medis/pengkajian_awal/detail";
            $viewCategory = "all";
            TemplateApp($data, $view, $viewCategory);

        } else {;

            $alertStatus  = "failed";
            $alertMessage = "Maaf, Kunci yang anda masukan salah 🙂";
            getAlert($alertStatus, $alertMessage);
    
            redirect('pengkajian_awal');
    
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
            $data['pengkajian_awal']  = $this->m_pengkajian_awal->get($this->uri->segment(3));
            $data['pasien']  = $this->m_pasien->read('', '', '', '', '', '', $data['pengkajian_awal'][0]->pasien_id);
            $data['pegawai']  = $this->m_pegawai->read('', '', '', '');
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
            $view         = "rekam_medis/pengkajian_awal/update";
            $viewCategory = "all";
            TemplateApp($data, $view, $viewCategory);
        } else {;

            $alertStatus  = "failed";
            $alertMessage = "Maaf, Kunci yang anda masukan salah 🙂";
            getAlert($alertStatus, $alertMessage);
    
            redirect('pengkajian_awal');
    
            }
    }

    
    public function create() {
        csrfValidate();
        // POST

        // print_r(implode(', ',$this->input->post('keluhan_sistem_ekskresi[]')));
        // print_r($this->input->post('masalah_fisik[]'));
        // $data['masalah_fisik'] = "";
        // if($this->input->post('masalah_fisik[]'))
        //     $data['masalah_fisik'] = implode(', ',$this->input->post('masalah_fisik[]'));
        // die;
        $data['pengkajian_awal_id']   = '';
        $data['pasien_id'] = $this->input->post('pasien_id');
        $data['pegawai_id'] = $this->input->post('pegawai_id');
        $data['riwayat_penyakit'] = $this->input->post('riwayat_penyakit');
        $data['riwayat_pengobatan'] = $this->input->post('riwayat_pengobatan');
        $data['riwayat_penyakit_keluarga'] = $this->input->post('riwayat_penyakit_keluarga');
        $data['alergi'] = $this->input->post('alergi');
        $data['kesadaran_fisik'] = $this->input->post('kesadaran_fisik');
        $data['tekanan_darah'] = $this->input->post('tekanan_darah');
        $data['frekuensi_nafas'] = $this->input->post('frekuensi_nafas');
        $data['gcs'] = $this->input->post('gcs');
        $data['frekuensi_nadi'] = $this->input->post('frekuensi_nadi');
        $data['suhu_tubuh'] = $this->input->post('suhu_tubuh');
        $data['masalah_fisik'] = "";
        if($this->input->post('masalah_fisik[]'))
            $data['masalah_fisik'] = implode(', ',$this->input->post('masalah_fisik[]'));
        $data['keluhan_pernafasan'] = "";
        if($this->input->post('keluhan_pernafasan[]'))
            $data['keluhan_pernafasan'] = implode(', ',$this->input->post('keluhan_pernafasan[]'));
        $data['irama_nafas'] = $this->input->post('irama_nafas');
        $data['suara_nafas'] = "";
        if($this->input->post('suara_nafas'))
            $data['suara_nafas'] = implode(', ',$this->input->post('suara_nafas'));
        $data['masalah_pernafasan'] = "";
        if($this->input->post('masalah_pernafasan[]'))
            $data['masalah_pernafasan'] = implode(', ',$this->input->post('masalah_pernafasan[]'));
        $data['nyeri_dada'] = $this->input->post('nyeri_dada');
        $data['suara_jantung'] = $this->input->post('suara_jantung');
        $data['crt'] = $this->input->post('crt');
        $data['jvp'] = $this->input->post('jvp');
        $data['masalah_kardiovaskular'] = "";
        if($this->input->post('masalah_kardiovaskular[]'))
            $data['masalah_kardiovaskular'] = implode(', ',$this->input->post('masalah_kardiovaskular[]'));
        $data['keluhan_pusing'] = $this->input->post('keluhan_pusing');
        $data['kesadaran_persyarafan'] = "";
        if($this->input->post('kesadaran_persyarafan[]'))
            $data['kesadaran_persyarafan'] = implode(', ',$this->input->post('kesadaran_persyarafan[]'));
        $data['pupil'] = $this->input->post('pupil');
        $data['sklera'] = "";
        if($this->input->post('sklera[]'))
            $data['sklera'] = implode(', ',$this->input->post('sklera[]'));
        $data['kaku_kuduk'] = $this->input->post('kaku_kuduk');
        $data['kelumpuhan'] = $this->input->post('kelumpuhan');
        $data['gangg_persepsi_sensorik'] = $this->input->post('gangg_persepsi_sensorik');
        $data['masalah_persyarafan'] = "";
        if($this->input->post('masalah_persyarafan[]'))
            $data['masalah_persyarafan'] = implode(', ',$this->input->post('masalah_persyarafan[]'));
        $data['keluhan_sistem_ekskresi'] = "";
        if($this->input->post('keluhan_sistem_ekskresi[]'))
            $data['keluhan_sistem_ekskresi'] = implode(', ',$this->input->post('keluhan_sistem_ekskresi[]'));
        $data['produksi_urin'] = $this->input->post('produksi_urin');
        $data['bak'] = $this->input->post('bak');
        $data['warna_urin'] = $this->input->post('warna_urin');
        $data['bau_urin'] = $this->input->post('bau_urin');
        $data['masalah_ekskresi'] = "";
        if($this->input->post('masalah_ekskresi[]'))
            $data['masalah_ekskresi'] = implode(', ',$this->input->post('masalah_ekskresi[]'));
        $data['mulut'] = "";
        if($this->input->post('mulut[]'))
            $data['mulut'] = implode(', ',$this->input->post('mulut[]'));
        $data['abdomen'] = "";
        if($this->input->post('abdomen[]'))
            $data['abdomen'] = implode(', ',$this->input->post('abdomen[]'));
        $data['abdomen_tambahan'] = $this->input->post('abdomen_tambahan');
        $data['bab'] = $this->input->post('bab');
        $data['konsistensi_bab'] = "";
        if($this->input->post('konsistensi_bab[]'))
            $data['konsistensi_bab'] = implode(', ',$this->input->post('konsistensi_bab[]'));
        $data['diet'] = "";
        if($this->input->post('diet[]'))
            $data['diet'] = implode(', ',$this->input->post('diet[]'));
        $data['frekuensi_diet'] = $this->input->post('frekuensi_diet');
        $data['jml_frekuensi_diet'] = $this->input->post('jml_frekuensi_diet');
        $data['masalah_pencernaan'] = "";
        if($this->input->post('masalah_pencernaan'))
            $data['masalah_pencernaan'] = implode(', ',$this->input->post('masalah_pencernaan'));
        $data['pergerak_sendi'] = $this->input->post('pergerak_sendi');
        $data['akral'] = "";
        if($this->input->post('akral[]'))
            $data['akral'] = implode(', ',$this->input->post('akral[]'));
        $data['patah_tulang'] = $this->input->post('patah_tulang');
        $data['eks_fiksasi'] = "";
        if($this->input->post('eks_fiksasi[]'))
            $data['eks_fiksasi'] = implode(', ',$this->input->post('eks_fiksasi[]'));
        $data['eks_fiksasi_tambahan'] = $this->input->post('eks_fiksasi_tambahan');
        $data['kekuatan_otot'] = $this->input->post('kekuatan_otot');
        $data['turgor'] = $this->input->post('turgor');
        $data['masalah_muskuloskeletal'] = "";
        if($this->input->post('masalah_muskuloskeletal[]'))
            $data['masalah_muskuloskeletal'] = implode(', ',$this->input->post('masalah_muskuloskeletal[]'));
        $data['masalah_muskuloskeletal_tambahan'] = $this->input->post('masalah_muskuloskeletal_tambahan');
        $data['penis'] = $this->input->post('penis');
        $data['scrotum'] = $this->input->post('scrotum');
        $data['testis'] = $this->input->post('testis');
        $data['vagina'] = $this->input->post('vagina');
        $data['pendarahan'] = $this->input->post('pendarahan');
        $data['siklus_haid'] = $this->input->post('siklus_haid');
        $data['payudara'] = $this->input->post('payudara');
        $data['masalah_reproduksi'] = "";
        if($this->input->post('masalah_reproduksi[]'))
            $data['masalah_reproduksi'] = implode(', ',$this->input->post('masalah_reproduksi[]'));
        $data['psikologis'] = "";
        if($this->input->post('psikologis[]'))
            $data['psikologis'] = implode(', ',$this->input->post('psikologis[]'));
        $data['sosiologis'] = "";
        if($this->input->post('sosiologis[]'))
            $data['sosiologis'] = implode(', ',$this->input->post('sosiologis[]'));
        $data['spiritual'] = "";
        if($this->input->post('spiritual[]'))
            $data['spiritual'] = implode(', ',$this->input->post('spiritual[]'));
        $data['masalah_psikologis'] = "";
        if($this->input->post('masalah_psikologis[]'))
            $data['masalah_psikologis'] = implode(', ',$this->input->post('masalah_psikologis[]'));
        $data['hambatan_diri'] = "";
        if($this->input->post('hambatan_diri[]'))
            $data['hambatan_diri'] = implode(', ',$this->input->post('hambatan_diri[]'));
        $data['data_penunjang'] = $this->input->post('data_penunjang');
        $data['jns_key_id'] = $this->input->post('jns_key_id');
        $data['user_id'] = $this->input->post('user_id');
        $data['createtime']  = date('Y-m-d H:i:s');
        
        // echo '<pre>';
        // print_r($data);
        // die;
        
        $this->m_pengkajian_awal->create($data);



        // LOG
        $message    = $this->session->userdata('user_fullname')." menambah data rekam medis pengkajian awal ID Pasien : ".$data['pasien_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data rekam medis pengkajian awal dengan ID Pasien ".$data['pasien_id'];
        getAlert($alertStatus, $alertMessage);

        redirect('pengkajian_awal');
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['pengkajian_awal_id']   = $this->input->post('pengkajian_awal_id');
        $data['pasien_id'] = $this->input->post('pasien_id');
        $data['pegawai_id'] = $this->input->post('pegawai_id');
        $data['riwayat_penyakit'] = $this->input->post('riwayat_penyakit');
        $data['riwayat_pengobatan'] = $this->input->post('riwayat_pengobatan');
        $data['riwayat_penyakit_keluarga'] = $this->input->post('riwayat_penyakit_keluarga');
        $data['alergi'] = $this->input->post('alergi');
        $data['kesadaran_fisik'] = $this->input->post('kesadaran_fisik');
        $data['tekanan_darah'] = $this->input->post('tekanan_darah');
        $data['frekuensi_nafas'] = $this->input->post('frekuensi_nafas');
        $data['gcs'] = $this->input->post('gcs');
        $data['frekuensi_nadi'] = $this->input->post('frekuensi_nadi');
        $data['suhu_tubuh'] = $this->input->post('suhu_tubuh');
        $data['masalah_fisik'] = "";
        if($this->input->post('masalah_fisik[]'))
            $data['masalah_fisik'] = implode(', ',$this->input->post('masalah_fisik[]'));
        $data['keluhan_pernafasan'] = "";
        if($this->input->post('keluhan_pernafasan[]'))
            $data['keluhan_pernafasan'] = implode(', ',$this->input->post('keluhan_pernafasan[]'));
        $data['irama_nafas'] = $this->input->post('irama_nafas');
        $data['suara_nafas'] = "";
        if($this->input->post('suara_nafas'))
            $data['suara_nafas'] = implode(', ',$this->input->post('suara_nafas'));
        $data['masalah_pernafasan'] = "";
        if($this->input->post('masalah_pernafasan[]'))
            $data['masalah_pernafasan'] = implode(', ',$this->input->post('masalah_pernafasan[]'));
        $data['nyeri_dada'] = $this->input->post('nyeri_dada');
        $data['suara_jantung'] = $this->input->post('suara_jantung');
        $data['crt'] = $this->input->post('crt');
        $data['jvp'] = $this->input->post('jvp');
        $data['masalah_kardiovaskular'] = "";
        if($this->input->post('masalah_kardiovaskular[]'))
            $data['masalah_kardiovaskular'] = implode(', ',$this->input->post('masalah_kardiovaskular[]'));
        $data['keluhan_pusing'] = $this->input->post('keluhan_pusing');
        $data['kesadaran_persyarafan'] = "";
        if($this->input->post('kesadaran_persyarafan[]'))
            $data['kesadaran_persyarafan'] = implode(', ',$this->input->post('kesadaran_persyarafan[]'));
        $data['pupil'] = $this->input->post('pupil');
        $data['sklera'] = "";
        if($this->input->post('sklera[]'))
            $data['sklera'] = implode(', ',$this->input->post('sklera[]'));
        $data['kaku_kuduk'] = $this->input->post('kaku_kuduk');
        $data['kelumpuhan'] = $this->input->post('kelumpuhan');
        $data['gangg_persepsi_sensorik'] = $this->input->post('gangg_persepsi_sensorik');
        $data['masalah_persyarafan'] = "";
        if($this->input->post('masalah_persyarafan[]'))
            $data['masalah_persyarafan'] = implode(', ',$this->input->post('masalah_persyarafan[]'));
        $data['keluhan_sistem_ekskresi'] = "";
        if($this->input->post('keluhan_sistem_ekskresi[]'))
            $data['keluhan_sistem_ekskresi'] = implode(', ',$this->input->post('keluhan_sistem_ekskresi[]'));
        $data['produksi_urin'] = $this->input->post('produksi_urin');
        $data['bak'] = $this->input->post('bak');
        $data['warna_urin'] = $this->input->post('warna_urin');
        $data['bau_urin'] = $this->input->post('bau_urin');
        $data['masalah_ekskresi'] = "";
        if($this->input->post('masalah_ekskresi[]'))
            $data['masalah_ekskresi'] = implode(', ',$this->input->post('masalah_ekskresi[]'));
        $data['mulut'] = "";
        if($this->input->post('mulut[]'))
            $data['mulut'] = implode(', ',$this->input->post('mulut[]'));
        $data['abdomen'] = "";
        if($this->input->post('abdomen[]'))
            $data['abdomen'] = implode(', ',$this->input->post('abdomen[]'));
        $data['abdomen_tambahan'] = $this->input->post('abdomen_tambahan');
        $data['bab'] = $this->input->post('bab');
        $data['konsistensi_bab'] = "";
        if($this->input->post('konsistensi_bab[]'))
            $data['konsistensi_bab'] = implode(', ',$this->input->post('konsistensi_bab[]'));
        $data['diet'] = "";
        if($this->input->post('diet[]'))
            $data['diet'] = implode(', ',$this->input->post('diet[]'));
        $data['frekuensi_diet'] = $this->input->post('frekuensi_diet');
        $data['jml_frekuensi_diet'] = $this->input->post('jml_frekuensi_diet');
        $data['masalah_pencernaan'] = "";
        if($this->input->post('masalah_pencernaan'))
            $data['masalah_pencernaan'] = implode(', ',$this->input->post('masalah_pencernaan'));
        $data['pergerak_sendi'] = $this->input->post('pergerak_sendi');
        $data['akral'] = "";
        if($this->input->post('akral[]'))
            $data['akral'] = implode(', ',$this->input->post('akral[]'));
        $data['patah_tulang'] = $this->input->post('patah_tulang');
        $data['eks_fiksasi'] = "";
        if($this->input->post('eks_fiksasi[]'))
            $data['eks_fiksasi'] = implode(', ',$this->input->post('eks_fiksasi[]'));
        $data['eks_fiksasi_tambahan'] = $this->input->post('eks_fiksasi_tambahan');
        $data['kekuatan_otot'] = $this->input->post('kekuatan_otot');
        $data['turgor'] = $this->input->post('turgor');
        $data['masalah_muskuloskeletal'] = "";
        if($this->input->post('masalah_muskuloskeletal[]'))
            $data['masalah_muskuloskeletal'] = implode(', ',$this->input->post('masalah_muskuloskeletal[]'));
        $data['masalah_muskuloskeletal_tambahan'] = $this->input->post('masalah_muskuloskeletal_tambahan');
        $data['penis'] = $this->input->post('penis');
        $data['scrotum'] = $this->input->post('scrotum');
        $data['testis'] = $this->input->post('testis');
        $data['vagina'] = $this->input->post('vagina');
        $data['pendarahan'] = $this->input->post('pendarahan');
        $data['siklus_haid'] = $this->input->post('siklus_haid');
        $data['payudara'] = $this->input->post('payudara');
        $data['masalah_reproduksi'] = "";
        if($this->input->post('masalah_reproduksi[]'))
            $data['masalah_reproduksi'] = implode(', ',$this->input->post('masalah_reproduksi[]'));
        $data['psikologis'] = "";
        if($this->input->post('psikologis[]'))
            $data['psikologis'] = implode(', ',$this->input->post('psikologis[]'));
        $data['sosiologis'] = "";
        if($this->input->post('sosiologis[]'))
            $data['sosiologis'] = implode(', ',$this->input->post('sosiologis[]'));
        $data['spiritual'] = "";
        if($this->input->post('spiritual[]'))
            $data['spiritual'] = implode(', ',$this->input->post('spiritual[]'));
        $data['masalah_psikologis'] = "";
        if($this->input->post('masalah_psikologis[]'))
            $data['masalah_psikologis'] = implode(', ',$this->input->post('masalah_psikologis[]'));
        $data['hambatan_diri'] = "";
        if($this->input->post('hambatan_diri[]'))
            $data['hambatan_diri'] = implode(', ',$this->input->post('hambatan_diri[]'));
        $data['data_penunjang'] = $this->input->post('data_penunjang');
        $data['jns_key_id'] = $this->input->post('jns_key_id');
        $data['user_id'] = $this->input->post('user_id');
        $this->m_pengkajian_awal->update($data);

        // LOG
        $message    = $this->session->userdata('user_fullname')." mengubah data rekam medis pengkajian awal ID Pasien : ".$data['pasien_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data rekam medis pengkajian awal dengan ID Pasien : ".$data['pasien_id'];
        getAlert($alertStatus, $alertMessage);

        redirect('pengkajian_awal');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_pengkajian_awal->delete($this->input->post('pengkajian_awal_id'));

        // LOG
        $message    = $this->session->userdata('user_fullname')." menghapus data rekam medis pengkajian awal dengan ID RM : ".$this->input->post('pengkajian_awal_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data rekam medis pengkajian awal dengan ID RM : ".$this->input->post('pengkajian_awal_id');
        getAlert($alertStatus, $alertMessage);

        redirect('pengkajian_awal');
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
        $data['pengkajian_awal']  = $this->m_pengkajian_awal->get($this->uri->segment(3));
        $data['pasien']  = $this->m_pasien->read('', '', '', '', '', '', '');
        $data['pegawai']  = $this->m_pegawai->read('', '', '', $data['pengkajian_awal'][0]->pegawai_id);
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
        $view         = "rekam_medis/pengkajian_awal/print_page";
        $viewCategory = "single";
        TemplateApp($data, $view, $viewCategory);
    }
    
}
?>