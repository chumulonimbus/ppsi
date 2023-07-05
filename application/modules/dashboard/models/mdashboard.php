<?php
  
class Mdashboard extends CI_Model {
   
    function __construct(){
        parent::__construct();
    }
    
    function getData($table,$where){		
		return $this->db->get_where($table,$where)->result();
	}
    function getAllData(){	
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->where('role != ', 'admin');
		return $this->db->get()->result();
	}

    function getTotalGroupByName(){
        $this->db->select('nama, COUNT(CASE WHEN status_presensi="Hadir" THEN 1 END) AS totalhadir, COUNT(CASE WHEN status_presensi="Ijin" THEN 1 END) AS totalijin,
        COUNT(CASE WHEN status_presensi="Sakit" THEN 1 END) AS totalsakit');
        $this->db->from('karyawan');
        $this->db->join('presensi', 'karyawan.nip = presensi.nip');
        $this->db->where('presensi.tanggal >=', $tglAwal);
        $this->db->where('presensi.tanggal <=', $tglAkhir);
        $this->db->group_by('nama');
        return $this->db->get()->result();
    }
   
}
?>