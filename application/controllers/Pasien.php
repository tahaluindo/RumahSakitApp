<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // LOAD MODEL
        $this->load->model('m_pasien');
        $this->load->model('m_status_pasien');
        $this->load->model('m_kepesertaan_pasien');
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


    public function index()
    {
        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Pasien';
        $data['pasien']        = $this->m_pasien->read('', '', '', '', '', '', '');
        $data['pasien_new']    = $this->m_pasien->last();
        $data['encrypt']       =  $data['pasien_new'][0]->nik_pasien;
        $data['strArray']      = count_chars($data['encrypt'], 1);
        $data['total_string']  = strlen($data['encrypt']);
        $data['encrypt2']       =  $data['pasien_new'][0]->no_kk;
        $data['strArray2']      = count_chars($data['encrypt2'], 1);
        $data['total_string2']  = strlen($data['encrypt2']);
        $data['encrypt3']       =  $data['pasien_new'][0]->no_telp_pasien;
        $data['strArray3']      = count_chars($data['encrypt3'], 1);
        $data['total_string3']  = strlen($data['encrypt3']);
        $data['encrypt4']       =  $data['pasien_new'][0]->alamat_pasien;
        $data['strArray4']      = count_chars($data['encrypt4'], 1);
        $data['total_string4']  = strlen($data['encrypt4']);

        // TEMPLATE
        $view         = "pasien/index";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory, 'pasien');
    }

    // AVALENCHE EFFECT
    public function avalen()
    {
        csrfValidate();
        // POST
        $x = $this->input->post('value_perubahan_bit');
        $y = $this->input->post('jumlah_keseluruhan_bit');
        $output = ($x  * 100) / $y;

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Nilai avalanche effect =  " . $output . "%";
        getAlert($alertStatus, $alertMessage);

        redirect('pasien');
    }


    public function create_page()
    {

        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Tambah Data';
        $data['status_pasien']  = $this->m_status_pasien->read('', '', '');
        $data['kepesertaan_pasien']  = $this->m_kepesertaan_pasien->read('', '', '');
        $data['jns_key']  = $this->m_jns_key->read('', '', '');
        $data['pasiens']       = $this->m_pasien->read('', '', '', '', '', '', '');

        // TEMPLATE
        $view         = "pasien/add";
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

    public function detail_page()
    {
        // ENCRYPT TIME START
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
            $data['pasien']        = $this->m_pasien->get($this->uri->segment(3));
            $data['status_pasien']  = $this->m_status_pasien->read('', '', '');
            $data['kepesertaan_pasien']  = $this->m_kepesertaan_pasien->read('', '', '');
            $data['jns_key']  = $this->m_jns_key->read('', '', '');
            $data['pasiens']        = $this->m_pasien->read('', '', '', '', '', '', '');

            if ($jns_key_id == 1) {
                // AES-128 
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
                // CAMELLIA-128 
                $key = $settings[0]->setting_key_camellia;
                $this->encryption->initialize(
                    array(
                        'driver' => 'openssl',
                        'cipher' => 'camellia-128',
                        'mode' => 'ecb',
                        'key' => $key,
                    )
                );

                //decrypt
                $data['nik_pasien'] =  $this->encryption->decrypt($data['pasien'][0]->nik_pasien);
                $data['no_kk'] =  $this->encryption->decrypt($data['pasien'][0]->no_kk);
                $data['alamat_pasien'] =  $this->encryption->decrypt($data['pasien'][0]->alamat_pasien);
                $data['no_telp_pasien'] =  $this->encryption->decrypt($data['pasien'][0]->no_telp_pasien);
            }

            // ENCRYPT TIME END
            $encrypttime = microtime(true) - $execution_time;

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Waktu dekripsi data : " . $encrypttime . " milisecond";
            getAlert($alertStatus, $alertMessage);

            // TEMPLATE
            $view         = "pasien/detail";
            $viewCategory = "all";
            TemplateApp($data, $view, $viewCategory);
        } else {;

            // ALERT
            $alertStatus  = "failed";
            $alertMessage = "Maaf, Kunci yang anda masukan salah 🙂";
            getAlert($alertStatus, $alertMessage);

            redirect('pasien');
        }
    }

    public function update_page()
    {
        // ENCRYPT TIME START
        $execution_time = microtime(true);

        //initialize
        $settings       = getSetting();
        $jns_key_id =  $this->input->post('jns_key_id');
        $keys =  $this->input->post('key');
        $password = $this->verification_key($jns_key_id,    $keys);

        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Ubah Data';
        $data['pasien']        = $this->m_pasien->get($this->uri->segment(3));
        $data['status_pasien']  = $this->m_status_pasien->read('', '', '');
        $data['kepesertaan_pasien']  = $this->m_kepesertaan_pasien->read('', '', '');
        $data['jns_key']  = $this->m_jns_key->read('', '', '');
        $data['pasiens']       = $this->m_pasien->read('', '', '', '', '', '', '');

        if ($password == 1) {

            if ($jns_key_id == 1) {

                $key = $settings[0]->setting_key_aes;
                $this->encryption->initialize(
                    array(
                        'driver' => 'openssl',
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

                $key = $settings[0]->setting_key_camellia;
                $this->encryption->initialize(
                    array(
                        'driver' => 'openssl',
                        'cipher' => 'camellia-128',
                        'mode' => 'ecb',
                        'key' => $key,
                    )
                );

                //decrypt
                $data['nik_pasien'] =  $this->encryption->decrypt($data['pasien'][0]->nik_pasien);
                $data['no_kk'] =  $this->encryption->decrypt($data['pasien'][0]->no_kk);
                $data['alamat_pasien'] =  $this->encryption->decrypt($data['pasien'][0]->alamat_pasien);
                $data['no_telp_pasien'] =  $this->encryption->decrypt($data['pasien'][0]->no_telp_pasien);
            }


            // ENCRYPT TIME END
            $encrypttime = microtime(true) - $execution_time;

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Waktu dekripsi data : " . $encrypttime . " milisecond";
            getAlert($alertStatus, $alertMessage);

            // TEMPLATE
            $view         = "pasien/update";
            $viewCategory = "all";
            TemplateApp($data, $view, $viewCategory);
        } else {

            // ALERT
            $alertStatus  = "failed";
            $alertMessage = "Maaf, Kunci yang anda masukan salah 🙂";
            getAlert($alertStatus, $alertMessage);

            redirect('pasien');
        }
    }

    // MEDICAL RECORD NUMBER FUNCTION
    public function generate_rm()
    {
        // 00001
        $char = '0000';
        $char1 = '000';
        $char2 = '00';
        $char3 = '0';
        $char4 = '';
        $lastKode = $this->m_pasien->last();
        foreach ($lastKode  as $p) {
            $p2 = (int) $p->no_rekam_medis;
            $p3 = $p2 + 1;
            $p4 = (string) $p2 + 1;
        }
        if ($p3 >= 10) {
            $nomor_urut = $char1 .  $p4;
        }
        if ($p3 >= 100) {
            $nomor_urut = $char2 .  $p4;
        }
        if ($p3 >= 1000) {
            $nomor_urut = $char3 .  $p4;
        }
        if ($p3 >= 10000) {
            $nomor_urut = $char4 .  $p4;
        }
        if ($p3 < 10) {
            $nomor_urut = $char .  $p4;
        }

        return $nomor_urut;
    }

    // CREATE DATA PASIEN
    public function create()
    {
        // ENCRYPT TIME START
        $execution_time = microtime(true);
        csrfValidate();
        include "_speck.tv.class.php";

        $nomor_urut_send = $this->generate_rm();

        $settings       = getSetting();
        //set encryption aes
        if ($this->input->post('jns_key_id') == 1) {
            $key = $settings[0]->setting_key_aes;
            $this->encryption->initialize(
                array(
                    'driver' => 'openssl',
                    'cipher' => 'aes-128',
                    'mode' => 'ecb',
                    'key' => $key,
                )
            );

            //POST
            $no_telp_pasien = $this->input->post('no_telp_pasien');
            $alamat_pasien = $this->input->post('alamat_pasien');
            $nik_pasien = $this->input->post('nik_pasien');
            $no_kk = $this->input->post('no_kk');
            //encpryt_aes
            $data['no_telp_pasien'] = $this->encryption->encrypt($no_telp_pasien);
            $data['alamat_pasien'] = $this->encryption->encrypt($alamat_pasien);
            $data['nik_pasien'] = $this->encryption->encrypt($nik_pasien);
            $data['no_kk'] = $this->encryption->encrypt($no_kk);
        }
        //set encryption speck
        else {
            $keys = $settings[0]->setting_key_camellia;

            $this->encryption->initialize(
                array(
                    'driver' => 'openssl',
                    'cipher' => 'camellia-128',
                    'mode' => 'ecb',
                    'key' => $keys,
                )
            );

            //POST
            $no_telp_pasien = $this->input->post('no_telp_pasien');
            $alamat_pasien = $this->input->post('alamat_pasien');
            $nik_pasien = $this->input->post('nik_pasien');
            $no_kk = $this->input->post('no_kk');

            //encpryt_camelia
            $data['no_telp_pasien'] = $this->encryption->encrypt($no_telp_pasien);
            $data['alamat_pasien'] = $this->encryption->encrypt($alamat_pasien);
            $data['nik_pasien'] = $this->encryption->encrypt($nik_pasien);
            $data['no_kk'] = $this->encryption->encrypt($no_kk);

            echo "<pre>";
            print_r($data['no_kk']);
            echo "</pre>";
            die;
        }



        // POST
        $data['pasien_id']   = $this->input->post('pasien_id');
        $data['no_rekam_medis']   = $nomor_urut_send;
        $data['nama_pasien'] = $this->input->post('nama_pasien');
        $data['nama_kepala_keluarga'] = $this->input->post('nama_kepala_keluarga');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['tempat_lahir'] = $this->input->post('tempat_lahir');
        $data['tgl_lahir_pasien'] = $this->input->post('tgl_lahir_pasien');
        $data['no_bpjs_pasien'] = $this->input->post('no_bpjs_pasien');
        $data['dw'] = $this->input->post('dw');
        $data['lw'] = $this->input->post('lw');
        $data['status_pasien_id'] = $this->input->post('status_pasien_id');
        $data['kepesertaan_pasien_id'] = $this->input->post('kepesertaan_pasien_id');
        $data['jns_key_id'] = $this->input->post('jns_key_id');
        $data['tgl_daftar'] = date('Y-m-d');
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_pasien->create($data);

        // ENCRYPT TIME END
        $encrypttime = microtime(true) - $execution_time;

        // Count chars encrypt
        $data['strArray'] = count_chars($data['nik_pasien'], 1);
        $data['strArray2'] = count_chars($data['no_kk'], 1);
        $data['strArray3'] = count_chars($data['no_telp_pasien'], 1);
        $data['strArray4'] = count_chars($data['alamat_pasien'], 1);

        // LOG
        $message    = $this->session->userdata('user_fullname') . " menambah data pasien dengan ID - nama : " . $data['pasien_id'] . " - " . $data['nama_pasien'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data pasien dengan nama : " . $data['nama_pasien'] . " | Waktu enkripsi data : " . $encrypttime . " milisecond";
        getAlert($alertStatus, $alertMessage);

        redirect('pasien');
    }

    // UPDATE DATA PASIEN
    public function update()
    {
        // ENCRYPT TIME START
        $execution_time = microtime(true);

        csrfValidate();
        include "_speck.tv.class.php";
        $settings       = getSetting();

        //set encryption aes
        if ($this->input->post('jns_key_id') == 1) {
            $key = $settings[0]->setting_key_aes;
            $this->encryption->initialize(
                array(
                    'cipher' => 'aes-128',
                    'mode' => 'ecb',
                    'key' => $key,
                )
            );

            //POST
            $no_telp_pasien = $this->input->post('no_telp_pasien');
            $alamat_pasien = $this->input->post('alamat_pasien');
            $nik_pasien = $this->input->post('nik_pasien');
            $no_kk = $this->input->post('no_kk');

            //encpryt_aes
            $data['no_telp_pasien'] = $this->encryption->encrypt($no_telp_pasien);
            $data['alamat_pasien'] = $this->encryption->encrypt($alamat_pasien);
            $data['nik_pasien'] = $this->encryption->encrypt($nik_pasien);
            $data['no_kk'] = $this->encryption->encrypt($no_kk);
        }
        //set encryption speck
        else {
            $keys = $settings[0]->setting_key_speck;

            $key_schedule = array(); // declaration of variable Key Expansion
            $key = $keys; //example of Key (16 characters or 128 bit)
            $speck = new _SPECK(); //instantiation 
            $key_schedule = $speck->expandKey($key, $key_schedule); //Create Key Expansion

            //POST
            $no_telp_pasien = $this->input->post('no_telp_pasien');
            $alamat_pasien = $this->input->post('alamat_pasien');
            $nik_pasien = $this->input->post('nik_pasien');
            $no_kk = $this->input->post('no_kk');

            //encpryt_speck
            $data['no_telp_pasien'] =  $speck->encrypt($no_telp_pasien, $key_schedule);
            $data['alamat_pasien'] =  $speck->encrypt($alamat_pasien, $key_schedule);
            $data['nik_pasien'] =  $speck->encrypt($nik_pasien, $key_schedule);
            $data['no_kk'] = $speck->encrypt($no_kk, $key_schedule);
        }

        // POST
        $data['pasien_id']   = $this->input->post('pasien_id');
        $data['nama_pasien'] = $this->input->post('nama_pasien');
        $data['nama_kepala_keluarga'] = $this->input->post('nama_kepala_keluarga');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['tempat_lahir'] = $this->input->post('tempat_lahir');
        $data['tgl_lahir_pasien'] = $this->input->post('tgl_lahir_pasien');
        $data['no_bpjs_pasien'] = $this->input->post('no_bpjs_pasien');
        $data['dw'] = $this->input->post('dw');
        $data['lw'] = $this->input->post('lw');
        $data['status_pasien_id'] = $this->input->post('status_pasien_id');
        $data['kepesertaan_pasien_id'] = $this->input->post('kepesertaan_pasien_id');
        $data['jns_key_id'] = $this->input->post('jns_key_id');
        $this->m_pasien->update($data);

        // ENCRYPT TIME END
        $encrypttime = microtime(true) - $execution_time;

        // LOG
        $message    = $this->session->userdata('user_fullname') . " mengubah data pasien : " . $data['pasien_id'] . " - " . $data['nama_pasien'];

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data pasien dengan nama : " . $data['nama_pasien'] . " | Waktu enkripsi data : " . $encrypttime . " milisecond";
        getAlert($alertStatus, $alertMessage);

        redirect('pasien');
    }

    // DELETE DATA PASIEN
    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_pasien->delete($this->input->post('pasien_id'));

        // LOG
        $message    = $this->session->userdata('user_fullname') . " menghapus data pasien dengan ID : " . $this->input->post('pasien_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data pasien dengan ID : " . $this->input->post('pasien_id');
        getAlert($alertStatus, $alertMessage);

        redirect('pasien');
    }
}
