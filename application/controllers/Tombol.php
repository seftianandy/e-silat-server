<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tombol extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($_SESSION['status'] !="login"){
			
            redirect('login');
        }
		$this->load->model('TombolModel');
	}

	public function updateData(){
        $tombol = $this->input->post('tombol');
		$status = $this->input->post('status');

		$data = array(
			'status' => $status
		);

		$simpanData = $this->TombolModel->updateData('tombol', $data, 'tombol = "'.$tombol.'"');
		return $simpanData;
	}

}
