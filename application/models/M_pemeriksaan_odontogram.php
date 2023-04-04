<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_pemeriksaan_odontogram extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function read($limit, $start, $key, $pasien, $dokter, $jns_key, $user, $rm_id) {
        $this->db->select('a.*, b.*, c.*, d.*, e.*');
        $this->db->from('tbl_rm_pemeriksaan_odontogram a');
        $this->db->join('tbl_pasien b','a.pasien_id=b.pasien_id','LEFT');
        $this->db->join('tbl_dokter c','a.dokter_id=c.dokter_id','LEFT');
        $this->db->join('tbl_jns_key d','a.jns_key_id=d.jns_key_id','LEFT');
        $this->db->join('tbl_user e','a.user_id=e.user_id','LEFT');
        
        if($rm_id !=""){
            $this->db->where('a.pemeriksaan_odontogram_id', $rm_id);
        }

        if($pasien !=""){
            $this->db->where('a.pasien_id', $pasien);
        }

        if($dokter !=""){
            $this->db->where('a.dokter_id', $dokter);
            
        }

        if($jns_key !=""){
            $this->db->where('a.jns_key_id', $jns_key);
        }

        if($user !=""){
            $this->db->where('a.user_id', $user);
        }

        if($key!=''){
            $this->db->like("a.odontogram_11_51", $key);
            $this->db->or_like("a.odontogram_12_52", $key);
            $this->db->or_like("a.odontogram_13_53", $key);
            $this->db->or_like("a.odontogram_14_54", $key);
            $this->db->or_like("a.odontogram_15_55", $key);
            $this->db->or_like("a.odontogram_16", $key);
            $this->db->or_like("a.odontogram_17", $key);
            $this->db->or_like("a.odontogram_18", $key);
            $this->db->or_like("a.odontogram_61_21", $key);
            $this->db->or_like("a.odontogram_62_22", $key);
            $this->db->or_like("a.odontogram_63_23", $key);
            $this->db->or_like("a.odontogram_64_24", $key);
            $this->db->or_like("a.odontogram_65_25", $key);
            $this->db->or_like("a.odontogram_26", $key);
            $this->db->or_like("a.odontogram_27", $key);
            $this->db->or_like("a.odontogram_28", $key);
            $this->db->or_like("a.odontogram_48", $key);
            $this->db->or_like("a.odontogram_47", $key);
            $this->db->or_like("a.odontogram_46", $key);
            $this->db->or_like("a.odontogram_45_85", $key);
            $this->db->or_like("a.odontogram_44_84", $key);
            $this->db->or_like("a.odontogram_43_83", $key);
            $this->db->or_like("a.odontogram_42_82", $key);
            $this->db->or_like("a.odontogram_41_81", $key);
            $this->db->or_like("a.odontogram_38", $key);
            $this->db->or_like("a.odontogram_37", $key);
            $this->db->or_like("a.odontogram_36", $key);
            $this->db->or_like("a.odontogram_75_35", $key);
            $this->db->or_like("a.odontogram_74_34", $key);
            $this->db->or_like("a.odontogram_73_33", $key);
            $this->db->or_like("a.odontogram_72_32", $key);
            $this->db->or_like("a.odontogram_71_31", $key);
            $this->db->or_like("a.keterangan_tambahan", $key);
            $this->db->or_like("a.jumlah_photo_diambil", $key);
            $this->db->or_like("a.jumlah_rongten_photo_diambil", $key);
            $this->db->or_like("b.nama_pasien", $key);
            $this->db->or_like("b.no_rekam_medis", $key);
            $this->db->or_like("b.jenis_kelamin", $key);
            $this->db->or_like("b.tempat_lahir", $key);
            $this->db->or_like("b.tgl_lahir_pasien", $key);
            $this->db->or_like("b.nik_pasien", $key);
            $this->db->or_like("c.nama_dokter", $key);
            $this->db->or_like("c.ttd_dokter", $key);
            $this->db->or_like("d.nama_jns_key", $key);
            $this->db->or_like("e.user_fullname", $key);
        }

        if($limit !="" OR $start !=""){
            $this->db->limit($limit, $start);
        }

        $this->db->order_by('a.pemeriksaan_odontogram_id', 'DESC');

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
        $this->db->insert('tbl_rm_pemeriksaan_odontogram', $data);
    }
    
    public function update($data) {
        $this->db->update('tbl_rm_pemeriksaan_odontogram', $data, array('pemeriksaan_odontogram_id' => $data['pemeriksaan_odontogram_id']));
    }
    
    public function delete($id) {
        $this->db->delete('tbl_rm_pemeriksaan_odontogram', array('pemeriksaan_odontogram_id' => $id));
    }
    
    public function get($id) {
        $this->db->where('pemeriksaan_odontogram_id', $id);
        $query = $this->db->get('tbl_rm_pemeriksaan_odontogram', 1);
        return $query->result();
    }

    public function widget() {
        $query  = $this->db->query(" SELECT
            (SELECT count(pemeriksaan_odontogram_id) FROM tbl_rm_pemeriksaan_odontogram) as total_rm_pemeriksaan_odontogram
        ");
        return $query->result();
    }

    function __destruct() {
        $this->db->close();
    }
    
}
?>
