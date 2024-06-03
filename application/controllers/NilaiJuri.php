<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NilaiJuri extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($_SESSION['status'] !="login"){
			
            redirect('login');
        }
		$this->load->model('NilaiJuriModel');
		$this->load->model('VoteModel');
	}

	public function index()
	{
		view('contents.nilai-juri.index');
	}

	public function penjurian(){
		view('contents.nilai-juri.penilaian');
	}

	public function tampilData(){
		$partai_id = $this->input->post('partai_id');
		$ronde_id = $this->input->post('ronde_id');
		$data = $this->NilaiJuriModel->getDataPenjurian($partai_id, $ronde_id);
		echo json_encode($data);
	}

	public function tampilNilaiAtlitJuri(){
		$atlit_id = $this->input->post('atlit_id');
		$ronde_id = $this->input->post('ronde_id');
		$users_id = 3;
		$data = $this->NilaiJuriModel->getNilai($atlit_id, $ronde_id, $users_id);
		echo json_encode($data);
	}

	public function tampilRonde(){
		$partai_id = $this->input->post('partai_id');
		$data = $this->NilaiJuriModel->getRonde($partai_id);
		echo json_encode($data);
	}

	public function tambahNilai(){
		$ronde_id = $this->input->post('ronde_id');
		$atlit_id = $this->input->post('atlit_id');
		$nilai_id = $this->input->post('nilai_id');
		$users_id = $_SESSION['id_user'];
		$time = date("Y-m-d h:i:s");

		$log = array(
			'ronde_id'	=> $ronde_id,
			'atlit_id' 	=> $atlit_id,
			'nilai_id'	=> $nilai_id,
			'users_id' 	=> $users_id,
			'insert_time' 	=> $time,
			'status' => 'insert'
		);

		$temp = array(
			'ronde_id'	=> $ronde_id,
			'atlit_id' 	=> $atlit_id,
			'nilai_id'	=> $nilai_id,
			'users_id' 	=> $users_id,
			'time' 	=> $time,
			'status' => 'new'
		);

		$this->NilaiJuriModel->simpanData('log', $log);
		$this->NilaiJuriModel->simpanData('penilaian_temp', $temp);

		$dataTemp = $this->NilaiJuriModel->getDataTemp();
		$rowsTemp = count($dataTemp);

		if($rowsTemp == 2){
			$firstRow = reset($dataTemp);
			$nilaiMasuk = array(
				'ronde_id' => $firstRow->ronde_id,
				'atlit_id' 	=> $firstRow->atlit_id,
				'nilai_id'	=> $firstRow->nilai_id,
				'users_id' 	=> 3,
				'time' 	=> $time
			);

			$this->NilaiJuriModel->simpanData('penilaian', $nilaiMasuk);

			$udateTemp = array(
				'status' => 'insert'
			);
			$this->NilaiJuriModel->updateData('penilaian_temp', $udateTemp, 'status = "new"');
		}

		$cekTemp = $this->NilaiJuriModel->getData('penilaian_temp');
		$rowsCekTemp = count($cekTemp);

		if($rowsCekTemp == 3){
			$this->NilaiJuriModel->truncate('penilaian_temp');
		}

		sleep(4);
		$this->NilaiJuriModel->truncate('penilaian_temp');
	}

	public function tampilDataVote(){
		$juri = $_SESSION['role'];
		$data = $this->VoteModel->getDataVoteJuri($juri);
		echo json_encode($data);
	}

	public function updateDataVote(){
		$id = $this->input->post('id');
		$val = $this->input->post('val');
		$juri = $_SESSION['role'];

		$data = array(
			$juri	=> $val
		);

		$dataVote = $this->VoteModel->getDataVoteJuri($juri);
		$rowsVote = count($dataVote);

		if($rowsVote > 0){
			// $vote = $dataVote[0]; 
			// $nilai_id = $vote->nilai_id;
			$data = $this->VoteModel->updateDataVoteJuri('vote', $data, 'id = "'.$id.'"');
			echo json_encode($data);
		}
	}

	public function hapusNilai(){
		$atlit_id = $this->input->post('atlit_id');
		$users_id = 3;

		$getNilaiTerakhir = $this->NilaiJuriModel->dataNilaiTerakhir($users_id, $atlit_id);
		$rowsNilaiTerakhir = count($getNilaiTerakhir);

		if($rowsNilaiTerakhir > 0){
			$firstRow = reset($getNilaiTerakhir);
			$nilai_id_t = $firstRow->nilai_id;
			$ronde_id_t = $firstRow->ronde_id;
			$atlit_id_t = $firstRow->atlit_id;
			$users_id_t = $_SESSION['id_user'];
			$time_t = date("Y-m-d h:i:s");
			$data = array(
				'ronde_id'	=> $ronde_id_t,
				'atlit_id' 	=> $atlit_id_t,
				'nilai_id'	=> $nilai_id_t,
				'users_id' 	=> $users_id_t,
				'insert_time' 	=> $time_t,
				'status' => 'delete'
			);
			$tambahNilai = $this->NilaiJuriModel->simpanData('log', $data);
			if ($tambahNilai > 0){
				$hapusNilai = $this->NilaiJuriModel->deleteData($users_id, $atlit_id);
				return $hapusNilai;
			}
		}
	}

}
