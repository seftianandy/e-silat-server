<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($_SESSION['status'] !="login"){
			
            redirect('login');
        }
		$this->load->model('NilaiModel');
	}

	public function index()
	{
		view('contents.nilai.index');
	}

	public function tampilData(){
		$data = $this->NilaiModel->getData('nilai');
		echo json_encode($data);
	}

}
