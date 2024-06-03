<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertandingan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($_SESSION['status'] !="login"){
			
            redirect('login');
        }
		$this->load->model('PertandinganModel');
	}

	public function index()
	{
		view('contents.pertandingan.index');
	}

	public function tampilDataPertandingan(){
		$data = $this->PertandinganModel->getData();
		echo json_encode($data);
	}

	public function tampilDataRonde($partai_id){
		$data = $this->PertandinganModel->getData('ronde', $partai_id);
		echo json_encode($data);
	}

}
