<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timer extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($_SESSION['status'] !="login"){
			
            redirect('login');
        }
		$this->load->model('PapanskorModel'); // Ganti 'DataModel' sesuai dengan nama model Anda
	}

	public function index()
	{
		view('contents.papan-skor.tombol');
	}	

	public function getTimerA(){
		$this->load->view('contents/papan-skor/page_a_timer');
	}

	public function getTimerB(){
		return $this->load->view('contents/papan-skor/page_b_timer');
	}
}
