<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NilaiDewan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($_SESSION['status'] !="login"){
			
            redirect('login');
        }
		$this->load->model('NilaiDewanModel');
		$this->load->model('VoteModel');
	}

	public function index()
	{
		view('contents.nilai-dewan.index');
	}

	public function penjurian(){
		view('contents.nilai-dewan.penilaian');
	}

	public function tampilData(){
		$partai_id = $this->input->post('partai_id');
		$ronde_id = $this->input->post('ronde_id');
		$data = $this->NilaiDewanModel->getDataPenjurian($partai_id, $ronde_id);
		echo json_encode($data);
	}

	 public function updateStatusPertandingan() {
        $id = $this->input->post('id');
        $this->load->model('NilaiDewanModel');
        $result = $this->NilaiDewanModel->getDataPertandinganSelesai($id);

	    if ($result) {
	        // Jika pembaruan berhasil
	        echo json_encode(['status' => 'success']);
	    } else {
	        // Jika pembaruan gagal
	        echo json_encode(['status' => 'error']);
	    }
    }

	public function tampilRonde(){
		$partai_id = $this->input->post('partai_id');
		$data = $this->NilaiDewanModel->getRonde($partai_id);
		echo json_encode($data);
	}

	public function tampilNilaiAtlitDewan(){
		$atlit_id = $this->input->post('atlit_id');
		$ronde_id = $this->input->post('ronde_id');
		$users_id = $_SESSION['id_user'];
		$nilai_id = $this->input->post('nilai_id');
		$data = $this->NilaiDewanModel->getNilai($atlit_id, $ronde_id, $users_id, $nilai_id);
		echo json_encode($data);
	}

	public function tampilNilaiHukuman(){
		$atlit_id = $this->input->post('atlit_id');
		$ronde_id = $this->input->post('ronde_id');
		$users_id = $_SESSION['id_user'];
		$nilai_t_id = $this->input->post('nilai_t_id');
		$nilai_t2_id = $this->input->post('nilai_t2_id');
		$nilai_p_id = $this->input->post('nilai_p_id');
		$data_t = $this->NilaiDewanModel->getNilai($atlit_id, $ronde_id, $users_id, $nilai_t_id);
		$data_t2 = $this->NilaiDewanModel->getNilai($atlit_id, $ronde_id, $users_id, $nilai_t2_id);
		$data_p = $this->NilaiDewanModel->getNilai($atlit_id, $ronde_id, $users_id, $nilai_p_id);
		$nilai_t = isset($data_t[0]->nilai) ? $data_t[0]->nilai : null;
		$nilai_t2 = isset($data_t2[0]->nilai) ? $data_t2[0]->nilai : null;
		$nilai_p = isset($data_p[0]->nilai) ? $data_p[0]->nilai : null;
		$hukuman = $nilai_t + $nilai_t2 + $nilai_p;

		$data = array(
			'nilai' => $hukuman
		);
		echo json_encode($data);
	}

	public function tampilNilaiPeringatan(){
		$atlit_id = $this->input->post('atlit_id');
		$ronde_id = $this->input->post('ronde_id');
		$users_id = $_SESSION['id_user'];
		$nilai_id = $this->input->post('nilai_id');
		$data = $this->NilaiDewanModel->getPeringatan($atlit_id, $ronde_id, $users_id, $nilai_id);
		echo json_encode($data);
	}

	public function tampilNilaiJatuhan(){
		$atlit_id = $this->input->post('atlit_id');
		$ronde_id = $this->input->post('ronde_id');
		$users_id = $_SESSION['id_user'];
		$nilai_id = $this->input->post('nilai_id');
		$data = $this->NilaiDewanModel->getJatuhan($atlit_id, $ronde_id, $users_id, $nilai_id);
		echo json_encode($data);
	}

	public function tampilNilaiTeguran(){
		$atlit_id = $this->input->post('atlit_id');
		$ronde_id = $this->input->post('ronde_id');
		$users_id = $_SESSION['id_user'];
		$nilai_id = $this->input->post('nilai_id');
		$nilai2_id = $this->input->post('nilai2_id');
		$data = $this->NilaiDewanModel->getTeguran($atlit_id, $ronde_id, $users_id, $nilai_id, $nilai2_id);
		echo json_encode($data);
	}

	public function tambahNilai(){
		$ronde_id = $this->input->post('ronde_id');
		$atlit_id = $this->input->post('atlit_id');
		$nilai_id = $this->input->post('nilai_id');
		$users_id = $_SESSION['id_user'];
		$time = date("Y-m-d h:i:s");
		$data = array(
			'ronde_id'	=> $ronde_id,
			'atlit_id' 	=> $atlit_id,
			'nilai_id'	=> $nilai_id,
			'users_id' 	=> $users_id,
			'time' 	=> $time,
		);

		$dataLog = array(
			'ronde_id'	=> $ronde_id,
			'atlit_id' 	=> $atlit_id,
			'nilai_id'	=> $nilai_id,
			'users_id' 	=> $users_id,
			'insert_time' => $time,
			'status' => 'insert'
		);

		$this->NilaiDewanModel->simpanData('log', $dataLog);
		$tambahNilai = $this->NilaiDewanModel->simpanData('penilaian', $data);
		return $tambahNilai;
	}

	public function tambahRondecon(){
		$ronde_id = $this->input->post('ronde_id');
		$partai_id = $this->input->post('partai_id');
		$data = array(
			'ronde_id'	=> $ronde_id,
			'partai_id'	=> $partai_id
		);
		$tambahRondecon = $this->NilaiDewanModel->simpanData('rondecon', $data);
		return $tambahRondecon;
	}

	public function tambahVote(){
		$nilai_id = $this->input->post('nilai_id');
		$sudut = $this->input->post('sudut');
		$time = date("Y-m-d h:i:s");
		$data = array(
			'nilai_id'	=> $nilai_id,
			'time' 	=> $time,
			'sudut' => $sudut,
			'status' => 'open'
		);
		$tambahVote = $this->NilaiDewanModel->simpanData('vote', $data);
		return $tambahVote;
	}

	public function tampilDataVote(){
		$data = $this->VoteModel->getDataVoteDewan();
		echo json_encode($data);
	}

	public function hasilVote(){
		$data = $this->VoteModel->getDataVoteDewan();
		$numRows = count($data); // Menghitung jumlah baris
		if ($numRows > 0) {
			$row = $data[0]; // Mengambil baris pertama dari hasil kueri
			$id_vote = $row->id;
		} else {
			$id_vote = 0;
		}

		$status = array(
			'status'	=> 'close'
		);
		
		$dataVote = $this->VoteModel->getData($id_vote);
		$rowsVote = count($dataVote);
		if($rowsVote > 0){
			$vote = $dataVote[0]; 
			$nilai_id = $vote->nilai_id;
			$ronde_id = $this->input->post('ronde_id');
			$atlit_id = $this->input->post('atlit_id');
			$users_id = $_SESSION['id_user'];
			$time = date("Y-m-d h:i:s");
			$data = array(
				'ronde_id'	=> $ronde_id,
				'atlit_id' 	=> $atlit_id,
				'nilai_id'	=> $nilai_id,
				'users_id' 	=> $users_id,
				'time' 	=> $time,
			);

			if($nilai_id == 3){
				$tambahNilai = $this->NilaiDewanModel->simpanData('penilaian', $data);
				$updateStatus = $this->VoteModel->updateDataVoteJuri('vote', $status, 'id = "'.$id_vote.'"');
				return $updateStatus;
			} else {
				$updateStatus = $this->VoteModel->updateDataVoteJuri('vote', $status, 'id = "'.$id_vote.'"');
				return $updateStatus;
			}
		} else {
			$updateStatus = $this->VoteModel->updateDataVoteJuri('vote', $status, 'id = "'.$id_vote.'"');
			return $updateStatus;
		}

		echo json_encode($data);
	}

	public function hapusNilai(){
		$atlit_id = $this->input->post('atlit_id');
		$users_id = $_SESSION['id_user'];

		$getNilaiTerakhir = $this->NilaiDewanModel->dataNilaiTerakhir($users_id, $atlit_id);
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
			$tambahNilai = $this->NilaiDewanModel->simpanData('log', $data);
			if ($tambahNilai > 0){
				$hapusNilai = $this->NilaiDewanModel->deleteData($users_id, $atlit_id);
				return $hapusNilai;
			}
		}
	}

}
