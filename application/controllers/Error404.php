<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends CI_Controller {
	
	public function index()
	{
		view('layouts.404');
    }
}
