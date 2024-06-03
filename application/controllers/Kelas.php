<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($_SESSION['status'] !="login"){
			
            redirect('login');
        }
		$this->load->model('KelasModel');
	}

	public function index()
	{
		view('contents.kelas.index');
	}

	public function tampilData(){
		$data = $this->KelasModel->getData('tb_kelas');
		echo json_encode($data);
	}
	
	public function tambahKelas(){
		$nama 		= $this->input->post('kelas');
		$nama_kelas = $this->input->post('nama_kelas');
		
		$data = array(
			'nama' 			=> $nama,
			'nama_kelas' 	=> $nama_kelas
		);

		$tambahKelas = $this->KelasModel->simpanData('tb_kelas', $data);
		return $tambahKelas;
	}

	public function dataEditKelas(){
		$id_kelas = $this->input->post('id');

		$data = $this->KelasModel->getDataEdit('tb_kelas', $id_kelas);
		echo json_encode($data);
	}

	public function simpanEditKelas(){
		$id_kelas 		= $this->input->post('id');
		$kelas 			= $this->input->post('kelas');
		$nama_kelas 	= $this->input->post('nama_kelas');

		$data = array(
			'nama' 			=> $kelas,
			'nama_kelas' 	=> $nama_kelas
		);

		$simpanEditKelas = $this->KelasModel->updateData('tb_kelas', $data, 'id_kelas = "'.$id_kelas.'"');
		return $simpanEditKelas;
	}

	public function deleteKelas(){
		$id_kelas = $this->input->post('id');
		$deleteKelas = $this->KelasModel->deleteData('tb_kelas', 'id_kelas = "'.$id_kelas.'"');
		return $deleteKelas;
	}

}
