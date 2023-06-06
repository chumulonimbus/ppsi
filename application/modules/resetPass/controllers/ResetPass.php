<?php

class ResetPass extends MX_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('mresetpass');
    }
    function index(){
        $this->load->view('reqresetpass');
    }
    function requestReset(){
        $this->load->helper(array('form', 'url'));
        $email = $this->input->post('email');
        $where = array(
          'email' => $email,
        );
        $cek = $this->mresetpass->cek_email("login",$where)->num_rows();
        if($cek > 0){
            
          $dataUser = $this->mresetpass->cek_email("login",$where)->result();
          $array = json_decode(json_encode($dataUser), true);

          $id = $array[0]['id'];

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
          $this->email->subject("Reset Password");
          $this->email->message(
            "Dear ".$array[0]['nama']."<br><br>".
            "I have received reset password request. Click link bellow to reset your password. Just leave this email if don't request reset password<br>".
            site_url("resetPass/verifyReset/$encrypted_id").
            "<br><br>Yours sincerely,<br>Herdha"
          );
        
          if($this->email->send())
          {           
              $this->load->view('requestsent');
          }else
          {
              $this->load->view('requestfail');
          }

        }else{
              redirect('resetPass');
        }
    }
    public function verifyReset($key){
        $this->load->helper('url');
        $this->load->view('resetpass');
    }

    public function changePaswd($key){
        $this->load->helper(array('form', 'url'));
        $newpassword = $this->input->post('newpassword');
        $data = array(
          'password' => md5($newpassword),
        );
        $this->load->model('mresetpass');
        $this->mresetpass->changePass($key,$data);
        redirect('login');
    }
}
?>