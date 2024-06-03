<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Auth_model');
	}
	
	public function index()
	{
		view('layouts.login');
	}
	
	public function login(){
		if($this->Auth_model->logged_id())
        {
        	redirect("content");
        }else{

			//set form validation
			$this->load->library('form_validation'); 
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('role', 'Role', 'required');

			//cek validasi
			if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = $this->input->post('password', TRUE);
				$role = $this->input->post('role', TRUE);

                $pengacak  = 'HJU12938UIJNBZQZ1';
                $passwordmd = md5($pengacak . md5($password) . $pengacak);

                $checking = $this->Auth_model->check_login('users', array('username' => $username), array('password' => $passwordmd), array('role' => $role));

				//jika ditemukan, maka create session
				if ($checking != FALSE) {
					foreach ($checking as $apps) {
						$session_data = array(
							'id_user'   => $apps->id,
							'nama_user' => $apps->nama,
							'username' => $apps->username,
							'role' => $apps->role,
							'status' => 'login'
						);
						//set session userdata
						$this->session->set_userdata($session_data);
						redirect('dashboard');
					}
				}else{
					redirect('login?gagal=noakun');
				}
            }else{
                redirect('login');
			}
		}

	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
