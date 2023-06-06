<?php

class mregister extends CI_Model{
  
    function __construct(){
        parent::__construct();
    }
    
    function add_account($data){
        $this->load->database();
        $this->db->insert('login',$data);
        $insert_id = $this->db->insert_id();
        
        return  $insert_id;
    }

    function changeActiveState($key){
        $this->load->database();
        $data = array(
            'active' => 1
        );

        $this->db->where('md5(id)', $key);
        $this->db->update('login', $data);
    }
    
   }