<?php

class Dashboard extends MX_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('mdashboard');
        if($this->session->userdata('isLogin') != "login"){
            redirect(base_url("login"));
        }
    }
    function index(){
        $id = $this->session->userdata("nip");
        $where = array(
			'nip' => $id,
        );
        $dataUser['a'] = $this->mdashboard->getData("karyawan",$where);
        // $array = json_decode(json_encode($dataUser), true);
        // print_r($dataUser);
        // $this->load->view('dashboard',$dataUser);
        $this->template->write_view('content', 'dashboard', $dataUser, TRUE);
        $this->template->render();
    }
}
?>