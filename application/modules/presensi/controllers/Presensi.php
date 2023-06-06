<?php

class Presensi extends MX_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('mpresensi');
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
        $data['DataPresensi'] = $this->mpresensi->getAllData();
        $this->template->write_view('content', 'presensi', $data, TRUE);
        $this->template->render();
    }

    function addPresensi(){
        $this->load->helper(array('form', 'url'));
        $nip = $this->input->post('nip');
        $tanggal = $this->input->post('tanggal');
        $presensi = $this->input->post('statusPresensi');
        // $foto = $this->input->post('password');
        $keteranganijin = $this->input->post('ketIjin');

        $config['upload_path']          = APPPATH. '../assets/images/upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 3000;
        $this->load->library('upload', $config);
        // if ( ! $this->upload->do_upload('suratdok')){
        //     $error = array('error' => $this->upload->display_errors());
        //     $this->load->view('presensi', $error);
        // }else{
            $this->upload->do_upload('suratdok');
            $upload_data = $this->upload->data();

            $data = array(
                'nip' => $nip,
                'tanggal' => $tanggal,
                'status_presensi' => $presensi,
                'keteranganIjin' => $keteranganijin,
                'path_foto' => $upload_data['file_name']
            );
            $this->mpresensi->createPresensi($data);
            redirect("presensi");
        // }
    }
}
?>