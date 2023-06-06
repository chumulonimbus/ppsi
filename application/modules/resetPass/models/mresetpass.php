<?php
  
class Mresetpass extends CI_Model {
   
    function __construct(){
        parent::__construct();
    }
    
    function cek_email($table,$where){		
		return $this->db->get_where($table,$where);
	}
    
    function changePass($key,$data){
        $this->load->database();
        $this->db->where('md5(id)', $key);
        $this->db->update('login', $data);
    }
   
}
?>