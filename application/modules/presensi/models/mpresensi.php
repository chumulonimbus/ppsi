<?php
  
class Mpresensi extends CI_Model {
   
    function __construct(){
        parent::__construct();
    }
    
    function getAllData(){
        $this->db->select('id_presensi, nama, tanggal, path_foto, status_presensi, keteranganIjin');
        $this->db->from('karyawan');
        $this->db->join('presensi', 'karyawan.nip = presensi.nip');
		return $this->db->get()->result();
	}

    function createPresensi($data){
        $this->load->database();
        $this->db->insert('presensi',$data);
    }
   
}
?>