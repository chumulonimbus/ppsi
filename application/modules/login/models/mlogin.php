<?php
  
class Mlogin extends CI_Model {
   
    function __construct(){
        parent::__construct();
    }
    
    function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
   
}
?>