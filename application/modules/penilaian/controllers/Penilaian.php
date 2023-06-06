<?php

class Penilaian extends MX_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('mpenilaian');
        if($this->session->userdata('isLogin') != "login"){
            redirect(base_url("login"));
        }
    }
    function index(){
        // $id = $this->session->userdata("id");
        // $where = array(
		// 	'id' => $id,
        // );
        // $dataUser['a'] = $this->mdashboard->getData("login",$where);
        // $array = json_decode(json_encode($dataUser), true);
        // print_r($dataUser);
        // $this->load->view('dashboard',$dataUser);
        $this->template->write_view('content', 'penilaian', TRUE);
        $this->template->render();
    }
}
?>