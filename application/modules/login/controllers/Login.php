<?php

class Login extends MX_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('mlogin');
    }
    function index(){
        $this->load->view('login');
    }
    function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->mlogin->cek_login("karyawan",$where)->num_rows();
		if($cek > 0){
            
            $dataUser = $this->mlogin->cek_login("karyawan",$where)->result();
            $array = json_decode(json_encode($dataUser), true);
			// $data_session = array(
			// 	'nip' => $array[0]['nip'],
			// 	'username' => $array[0]['username'],
			// 	'status' => "login"
            // );
			$array[0]['isLogin'] = 'login';
			// var_dump($array[0]);
 
			$this->session->set_userdata($array[0]);
 
			redirect(base_url("dashboard"));
 
		}else{
            redirect('login');
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
?>