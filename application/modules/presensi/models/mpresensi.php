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

    function getDataUser($nip){
        $this->db->select('id_presensi, nama, tanggal, path_foto, status_presensi, keteranganIjin');
        $this->db->from('karyawan');
        $this->db->join('presensi', 'karyawan.nip = presensi.nip');
        $this->db->where('karyawan.nip',$nip);
        return $this->db->get()->result();
    }

    function createPresensi($data){
        $this->load->database();
        $this->db->insert('presensi',$data);
    }
    
    function getDataLaporan(){        
        $this->db->select('*');
        $this->db->from('laporanpresensi');
		return $this->db->get()->result();
    }
    
    function createLaporanPresensi($data){
        $this->load->database();
        $this->db->insert('laporanpresensi',$data);
    }

    function getTotal($tglAwal, $tglAkhir, $statusPresensi){
        $this->db->select('count(nip) as total');
        $this->db->from('presensi');
        $this->db->where('tanggal >=',$tglAwal);
        $this->db->where('tanggal <=', $tglAkhir);
        $this->db->where('status_presensi', $statusPresensi);
        return $this->db->get()->result();
    }

    function get1report($idReport){
        $this->db->select('*');
        $this->db->from('laporanpresensi');
        $this->db->where('idreport', $idReport);
        return $this->db->get()->result();
    }

    function getTotalGroupByName($tglAwal, $tglAkhir){
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