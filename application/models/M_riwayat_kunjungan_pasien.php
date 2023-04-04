<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_riwayat_kunjungan_pasien extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key, $pasien, $dokter, $poliklinik, $status_pasien, $kepesertaan_pasien, $jns_key, $user_id, $rm_id) {
        $this->db->select('a.*, b.*, c.*, d.*, e.*, f.*, g.*, h.*');
        $this->db->from('tbl_rm_riwayat_kunjungan_pasien a');
        $this->db->join('tbl_pasien b','a.pasien_id=b.pasien_id','LEFT');
        $this->db->join('tbl_dokter c','a.dokter_id=c.dokter_id','LEFT');
        $this->db->join('tbl_poliklinik d','a.poliklinik_id=d.poliklinik_id','LEFT');
        $this->db->join('tbl_status_pasien e','b.status_pasien_id=e.status_pasien_id','LEFT');
        $this->db->join('tbl_kepesertaan_pasien f','b.kepesertaan_pasien_id=f.kepesertaan_pasien_id','LEFT');
        $this->db->join('tbl_jns_key g','a.jns_key_id=g.jns_key_id','LEFT');
        $this->db->join('tbl_user h','a.user_id=h.user_id','LEFT');
        
        if($pasien !=""){
            $this->db->where('a.pasien_id', $pasien);
        }

        if($dokter !=""){
            $this->db->where('a.dokter_id', $dokter);
            
        }

        if($poliklinik !=""){
            $this->db->where('a.poliklinik_id', $poliklinik);
            
        }

        if($status_pasien !=""){
            $this->db->where('a.status_pasien_id', $status_pasien);
        }

        if($kepesertaan_pasien !=""){
            $this->db->where('a.kepesertaan_pasien_id', $kepesertaan_pasien);
        }

        if($jns_key !=""){
            $this->db->where('a.jns_key_id', $jns_key);
        }

        if($user_id !=""){
            $this->db->where('a.user_id', $user);
        }

        if($rm_id !=""){
            $this->db->where('a.riwayat_kunjungan_pasien_id', $rm_id);
        }

        if($key!=''){
            $this->db->like("a.subjektif", $key);
            $this->db->or_like("a.objektif", $key);
            $this->db->or_like("a.assesment", $key);
            $this->db->or_like("a.planning", $key);
            $this->db->or_like("b.nama_pasien", $key);
            $this->db->or_like("b.no_rekam_medis", $key);
            $this->db->or_like("b.jenis_kelamin", $key);
            $this->db->or_like("b.tgl_lahir_pasien", $key);
            $this->db->or_like("b.no_bpjs_pasien", $key);
            $this->db->or_like("b.nik_pasien", $key);
            $this->db->or_like("b.dw", $key);
            $this->db->or_like("b.lw", $key);
            $this->db->or_like("c.nama_dokter", $key);
            $this->db->or_like("c.ttd_dokter", $key);
            $this->db->or_like("d.nama_poliklinik", $key);
            $this->db->or_like("e.nama_status_pasien", $key);
            $this->db->or_like("f.nama_kepesertaan_pasien", $key);
            $this->db->or_like("g.nama_jns_key", $key);
            $this->db->or_like("h.user_fullname", $key);
        }

        if($limit !="" OR $start !=""){
            $this->db->limit($limit, $start);
        }

        $this->db->order_by('a.riwayat_kunjungan_pasien_id', 'DESC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return null;
    }

    public function create($data) {
        $this->db->insert('tbl_rm_riwayat_kunjungan_pasien', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_rm_riwayat_kunjungan_pasien', $data, array('riwayat_kunjungan_pasien_id' => $data['riwayat_kunjungan_pasien_id']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_rm_riwayat_kunjungan_pasien', array('riwayat_kunjungan_pasien_id' => $id));
    }
    
    public function get($id) {
        $this->db->where('riwayat_kunjungan_pasien_id', $id);
        $query = $this->db->get('tbl_rm_riwayat_kunjungan_pasien', 1);
        return $query->result();
    }

    public function widget() {
        $query  = $this->db->query(" SELECT
            (SELECT count(riwayat_kunjungan_pasien_id) FROM tbl_rm_riwayat_kunjungan_pasien) as total_rm_riwayat_kunjungan_pasien
        ");
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>
