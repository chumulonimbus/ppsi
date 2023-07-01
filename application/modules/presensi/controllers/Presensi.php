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
        if($this->session->userdata('role') == "admin"){
            $data['DataPresensi'] = $this->mpresensi->getAllData();
            $data['DataLaporanPresensi'] = $this->mpresensi->getDataLaporan();
            $this->template->write_view('content', 'presensi', $data, TRUE);
            $this->template->render();
        }else{
            $nip = $this->session->userdata('nip');
            $data['DataPresensi'] = $this->mpresensi->getDataUser($nip);
            $this->template->write_view('content', 'presensi', $data, TRUE);
            $this->template->render();
        }
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

    function addLaporanPresensi(){
        $this->load->helper(array('form', 'url'));
        $laporanName = $this->input->post('nama_laporan');
        $startDate = $this->input->post('tanggalmulai');
        $endDate = $this->input->post('tanggalakhir');
        $totalMasuk = $this->mpresensi->getTotal($startDate,$endDate, 'Hadir');
        $totMasuk = json_decode(json_encode($totalMasuk), true);
        
        $totalIjin = $this->mpresensi->getTotal($startDate,$endDate, 'Ijin');
        $totIjin = json_decode(json_encode($totalIjin), true);
        
        $totalSakit = $this->mpresensi->getTotal($startDate,$endDate, 'Sakit');
        $totSakit = json_decode(json_encode($totalSakit), true);

        $data = array(
            'nama_laporan' => $laporanName,
            'tanggalMulai' => $startDate,
            'tanggalAkhir' => $endDate,
            'total_masuk' => $totMasuk[0]['total'],
            'total_ijin' => $totIjin[0]['total'],
            'total_sakit' => $totSakit[0]['total']
        );
        $this->mpresensi->createLaporanPresensi($data);
        redirect("presensi");
    }
    
    function detailLaporan($idLaporan){
        $detailLaporan = $this->mpresensi->get1report($idLaporan);
        $data['detailLaporan'] = json_decode(json_encode($detailLaporan), true);
        $tglAwal = $data['detailLaporan'][0]['tanggalMulai'];
        $tglAkhir = $data['detailLaporan'][0]['tanggalAkhir'];

        $data['totalbyname'] = $this->mpresensi->getTotalGroupByName($tglAwal, $tglAkhir);
        // var_dump($data['totalbyname']);
        $this->template->write_view('content', 'detailLaporan', $data, TRUE);
        $this->template->render();
    }
}
?>