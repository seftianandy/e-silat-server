<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
        parent::__construct();
        if($_SESSION['status'] !="login"){
			
            redirect('login');
        }
        $this->load->model('PesertaModel');
        $this->load->model('KopModel');
	}
	
	public function index()
	{
		view('contents.dashboard.index');
    }

    public function tampilData(){
		$data = $this->KopModel->getData('kop');
		echo json_encode($data);
	}

    public function updateLogo()
	{
		$id = $this->input->post('id');
        $posisi = $this->input->post('posisi');

        if ($posisi == 'kiri'){
            $logo = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
            $data = array(
                'logokiri' => $logo
            );
        } else {
            $logo = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
            $data = array(
                'logokanan' => $logo
            );
        }
		

		$data = $this->PesertaModel->updateData('kop', $data, 'id =' . $id);
		echo json_encode($data);
	}

    public function updateKop()
    {
        $kop = $this->input->post('kop');

        $data = array(
            'kop' => $kop
        );

        $data = $this->KopModel->updateData('kop', $data, 'id = "1"');
		echo json_encode($data);
    }
}
