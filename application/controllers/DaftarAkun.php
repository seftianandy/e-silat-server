<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarAkun extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($_SESSION['status'] !="login"){
			
            redirect('login');
        }
		$this->load->model('DaftarAkunModel');
	}

	public function index()
	{
		view('contents.daftar-akun.index');
	}

	public function tampilData(){
		$data = $this->DaftarAkunModel->getData('users');
		echo json_encode($data);
	}

}
