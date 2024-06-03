<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
        parent::__construct();
        if($_SESSION['status'] !="login"){
			
            redirect('login');
        }
	}
	
	public function index()
	{
		view('contents.dashboard.index');
    }
}
