<?php

class Register extends MX_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        $this->load->view('register');
    }

    public function submit(){
        $this->load->helper(array('form', 'url'));
        $nama = $this->input->post('fullname');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $config['upload_path']          = APPPATH. '../assets/images/upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file')){
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('register', $error);
        }else{
            $upload_data = $this->upload->data();

            $data = array(
                'nama' => $nama,
                'username' => $username,
                'email' => $email,
                'password' => md5($password),
                'avatar' => $upload_data['file_name'],
                'active' => 0
            );
            $this->load->model('mregister');
            $id = $this->mregister->add_account($data);

            $encrypted_id = md5($id);
        
            $this->load->library('email');
            
            $config = array();
            $config['charset'] = 'utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['protocol']= "smtp";
            $config['mailtype']= "html";
            $config['smtp_host']= "ssl://smtp.googlemail.com";
            $config['smtp_port']= "465";
            $config['smtp_timeout']= "400";
            $config['smtp_user']= "herdhanur@gmail.com"; 
            $config['smtp_pass']= "jjrlekfcgovgbpvd"; 
            $config['crlf']="\r\n"; 
            $config['newline']="\r\n"; 
            $config['wordwrap'] = TRUE;
        
            $this->email->initialize($config);
            
            $this->email->from($config['smtp_user']);
            $this->email->to($email);
            $this->email->subject("Verifikasi Akun");
            $this->email->message(
            "Dear ".$nama."<br><br>".
            "Thank you for your registration in our system. Please verify your email by click the link bellow<br>".
            site_url("register/verification/$encrypted_id").
            "<br><br>Yours sincerely,<br>Herdha"
            );
        
            if($this->email->send())
            {           
                $this->load->view('registered');
            }else
            {
                $this->load->view('failed');
            }
        }
    }

    public function verification($key){
        $this->load->helper('url');
        $this->load->model('mregister');
        $this->mregister->changeActiveState($key);
        $this->load->view('verified');
    }
}
?>