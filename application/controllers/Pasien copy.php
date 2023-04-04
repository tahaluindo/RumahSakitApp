<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pasien');
        $this->load->model('m_status_pasien');
        $this->load->model('m_kepesertaan_pasien');
        $this->load->model('m_jns_key');
        $this->load->library('encryption');

        if (!$this->session->userdata('id_user') or $this->session->userdata('user_group') != 1) {
            // ALERT
            $alertStatus  = 'failed';
            $alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
            getAlert($alertStatus, $alertMessage);
            redirect('auth');
        }
    }


    public function index()
    {
        $this->session->unset_userdata('sess_search_pasien');

        // PAGINATION
        $baseUrl    = base_url() . "pasien/index/";
        $totalRows  = count((array) $this->m_pasien->read('', '', '', '', '', ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 3;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Pasien';
        $data['pasien']        = $this->m_pasien->read($perPage, $page, '', '', '', '', '', '');

        // TEMPLATE
        $view         = "pasien/index";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory, 'pasien');
    }


    public function search()
    {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_pasien', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_pasien');
        }

        // PAGINATION
        $baseUrl    = base_url() . "pasien/search/" . $data['search'] . "/";
        $totalRows  = count((array)$this->m_pasien->read('', '', $data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Data Pasien';
        $data['pasien']        = $this->m_pasien->read($perPage, $page, $data['search']);

        // TEMPLATE
        $view         = "pasien/index";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function create_page()
    {

        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Tambah Data Pasien';
        $data['status_pasien']  = $this->m_status_pasien->read('', '', '', '', '', '');
        $data['kepesertaan_pasien']  = $this->m_kepesertaan_pasien->read('', '', '', '', '', '');
        $data['jns_key']  = $this->m_jns_key->read('', '', '', '', '', '');
        $data['pasiens']       = $this->m_pasien->read('', '', '', '', '', '');

        // TEMPLATE
        $view         = "pasien/add";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function detail_page()
    {

        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Detail Data Pasien';
        $data['pasien']        = $this->m_pasien->get($this->uri->segment(3));
        $data['status_pasien']  = $this->m_status_pasien->read('', '', '', '', '', '');
        $data['kepesertaan_pasien']  = $this->m_kepesertaan_pasien->read('', '', '', '', '', '');
        $data['jns_key']  = $this->m_jns_key->read('', '', '', '', '', '');
        $data['pasiens']        = $this->m_pasien->read('', '', '', '', '', '');
        // TEMPLATE
        $view         = "pasien/detail";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function update_page()
    {

        //DATA
        $data['setting']       = getSetting();
        $data['title']         = 'Ubah Data Pasien';
        $data['pasien']        = $this->m_pasien->get($this->uri->segment(3));
        $data['status_pasien']  = $this->m_status_pasien->read('', '', '', '', '', '');
        $data['kepesertaan_pasien']  = $this->m_kepesertaan_pasien->read('', '', '', '', '', '');
        $data['jns_key']  = $this->m_jns_key->read('', '', '', '', '', '');
        $data['pasiens']       = $this->m_pasien->read('', '', '', '', '', '');

        // TEMPLATE
        $view         = "pasien/update";
        $viewCategory = "all";
        TemplateApp($data, $view, $viewCategory);
    }

    public function verification_key()
    {
        $settings       = getSetting();
        if ($this->input->post('jns_key_id') == 1) {
            if ($this->input->post('key') ==  $settings[0]->setting_key_aes) {
                // ALERT
                $alertStatus  = "Correct";
                $alertMessage = "Kata Sandi Benar";
                getAlert($alertStatus, $alertMessage);
                echo "<pre>";
                print_r($alertStatus);
                echo "</pre>";
                die;
                redirect('pasien/detail_page');
            } else {
                // ALERT
                $alertStatus  = "Not Correct !!";
                $alertMessage = "Kata Sandi Salah";
                getAlert($alertStatus, $alertMessage);

                redirect('pasien/index');
            }
        } else {
            if ($this->input->post('key') ==  $settings[0]->setting_key_speck) {
                // ALERT
                $alertStatus  = "Correct";
                $alertMessage = "Kata Sandi Benar";
                getAlert($alertStatus, $alertMessage);

                redirect('pasien/detail_page');
            } else {
                // ALERT
                $alertStatus  = "Not Correct !!";
                $alertMessage = "Kata Sandi Salah";
                getAlert($alertStatus, $alertMessage);

                redirect('pasien/index');
            }
        }
    }

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

    public function create()
    {
        csrfValidate();

        $nomor_urut_send = $this->generate_rm();
        $settings       = getSetting();

        //set encryption aes
        if ($this->input->post('jns_key_id') == 1) {
            $key = $settings[0]->setting_key_aes;
            $this->encryption->initialize(
                array(
                    'cipher' => 'aes-128',
                    'mode' => 'cbc',
                    'key' => $key,
                )
            );
            // $plain_text = '085241818939';
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

            // $decrypttext = $this->encryption->decrypt($ciphertext);
        }

        // echo $this->encryption->decrypt($ciphertext);

        // echo "<pre>";
        // print_r($data['no_kk']);
        // echo "</pre>";
        // die;

        // POST
        $data['id_pasien']   = $this->input->post('id_pasien');
        $data['no_rekam_medis']   = $nomor_urut_send;
        $data['nama_pasien'] = $this->input->post('nama_pasien');
        $data['nama_kepala_keluarga'] = $this->input->post('nama_kepala_keluarga');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['tgl_lahir_pasien'] = $this->input->post('tgl_lahir_pasien');
        $data['no_bpjs_pasien'] = $this->input->post('no_bpjs_pasien');
        $data['dw'] = $this->input->post('dw');
        $data['lw'] = $this->input->post('lw');
        $data['status_pasien_id'] = $this->input->post('status_pasien_id');
        $data['kepesertaan_pasien_id'] = $this->input->post('kepesertaan_pasien_id');
        $data['jns_key_id'] = $this->input->post('jns_key_id');
        $data['createtime']  = date('Y-m-d H:i:s');
        $this->m_pasien->create($data);
        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data pasien " . $data['nama_pasien'];
        getAlert($alertStatus, $alertMessage);

        redirect('pasien/index');
    }


    public function update()
    {
        csrfValidate();
        // POST
        $data['id_pasien']   = $this->input->post('id_pasien');
        $data['nik_pasien'] = $this->input->post('nik_pasien');
        $data['nama_pasien'] = $this->input->post('nama_pasien');
        $data['nama_kepala_keluarga'] = $this->input->post('nama_kepala_keluarga');
        $data['no_kk'] = $this->input->post('no_kk');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['tgl_lahir_pasien'] = $this->input->post('tgl_lahir_pasien');
        $data['alamat_pasien'] = $this->input->post('alamat_pasien');
        $data['no_telp_pasien'] = $this->input->post('no_telp_pasien');
        $data['no_bpjs_pasien'] = $this->input->post('no_bpjs_pasien');
        $data['dw'] = $this->input->post('dw');
        $data['lw'] = $this->input->post('lw');
        $data['status_pasien_id'] = $this->input->post('status_pasien_id');
        $data['kepesertaan_pasien_id'] = $this->input->post('kepesertaan_pasien_id');
        $data['jns_key_id'] = $this->input->post('jns_key_id');
        $this->m_pasien->update($data);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data pasien : " . $data['nama_pasien'];
        getAlert($alertStatus, $alertMessage);

        redirect('pasien/index');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_pasien->delete($this->input->post('id_pasien'));

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data pasien : " . $this->input->post('nama_pasien');
        getAlert($alertStatus, $alertMessage);

        redirect('pasien/index');
    }
}
