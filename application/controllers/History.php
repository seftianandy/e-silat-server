<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($_SESSION['status'] !="login"){
			
            redirect('login');
        }
		$this->load->model('HistoryModel');
	}

	public function index()
	{
		view('contents.history.index');
	}

	public function log(){
		view('contents.history.log');
	}

	public function tampilData(){
		$partai_id = $this->input->post('partai_id');
		$data = $this->HistoryModel->getData($partai_id);
		echo json_encode($data);
	}

}
