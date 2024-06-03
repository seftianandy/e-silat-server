<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PapanSkor extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($_SESSION['status'] !="login"){
			
            redirect('login');
        }
		$this->load->model('PapanskorModel'); // Ganti 'DataModel' sesuai dengan nama model Anda
		$this->load->model('VoteModel');
	}

	public function index()
	{
		view('contents.papan-skor.index');
	}

	public function tampilData(){
		$partai_id = $this->input->post('partai_id');
		$ronde_id = $this->input->post('ronde_id');
		$data = $this->PapanskorModel->getDataPenjurian($partai_id, $ronde_id);
		echo json_encode($data);
	}

	public function tampilRonde(){
		$partai_id = $this->input->post('partai_id');
		$data = $this->PapanskorModel->getRonde($partai_id);
		echo json_encode($data);
	}

	public function tampilDataHukuman(){
		$atlit_id = $this->input->post('atlit_id');
		$ronde_id = $this->input->post('ronde_id');
		$nilai_id = $this->input->post('nilai_id');
		$data = $this->PapanskorModel->getCountHukuman($atlit_id, $ronde_id, $nilai_id);
		echo json_encode($data);
	}

	public function tampilDataHukumanPeringatan(){
		$atlit_id = $this->input->post('atlit_id');
		$partai_id = $this->input->post('partai_id');
		$nilai_id = $this->input->post('nilai_id');
		$data = $this->PapanskorModel->getCountHukumanPeringatan($atlit_id, $partai_id, $nilai_id);
		echo json_encode($data);
	}

	public function tampilDataHukumanTeguran(){
		$atlit_id = $this->input->post('atlit_id');
		$ronde_id = $this->input->post('ronde_id');
		$data = $this->PapanskorModel->getCountHukumanTeguran($atlit_id, $ronde_id);
		echo json_encode($data);
	}

	public function tampilDataNilaiSkor(){
		$atlit_id = $this->input->post('atlit_id');
		$ronde_id = $this->input->post('ronde_id');
		$partai_id = $this->input->post('partai_id');
		$id_jatuhan = 3;
		$id_teguran = 5;
		$id_peringatan = 4;
		$id_pukulan = 1;
		$id_tendangan = 2;

		$data_jatuhan = $this->PapanskorModel->getNilaiDewan($atlit_id, $partai_id, $id_jatuhan);
		// $data_teguran = $this->PapanskorModel->getNilaiDewan($atlit_id, $partai_id, $id_teguran);
		$data_teguran = $this->PapanskorModel->getNilaiTeguranDewan($atlit_id, $partai_id);
		$data_peringatan = $this->PapanskorModel->getNilaiPeringatanDewan($atlit_id, $partai_id, $id_peringatan);

		$data_pukulan = $this->PapanskorModel->getNilaiJuri($atlit_id, $partai_id, $id_pukulan);
		$data_tendangan = $this->PapanskorModel->getNilaiJuri($atlit_id, $partai_id, $id_tendangan);

		$total_nilai_jatuhan = 0;
		$total_nilai_teguran = 0;
		$total_nilai_peringatan = 0;
		$total_nilai_pukulan = 0;
		$total_nilai_tendangan = 0;

		foreach ($data_jatuhan as $row) {
			$total_nilai_jatuhan += $row->total_nilai;
		}

		foreach ($data_teguran as $row) {
			$total_nilai_teguran += $row->total_nilai;
		}

		foreach ($data_peringatan as $row) {
			$total_nilai_peringatan += $row->total_nilai;
		}

		foreach ($data_pukulan as $row) {
			$total_nilai_pukulan += $row->total_nilai;
		}

		foreach ($data_tendangan as $row) {
			$total_nilai_tendangan += $row->total_nilai;
		}

		if($total_nilai_peringatan == 10){
			$total_nilai_peringatan = 15;
		}elseif($total_nilai_peringatan == 15){
			$total_nilai_peringatan = 30;
		}

		$total_nilai = $total_nilai_pukulan + $total_nilai_tendangan + $total_nilai_jatuhan - $total_nilai_teguran - $total_nilai_peringatan;

		$data = array(
			'nilai' => $total_nilai
		);

		echo json_encode($data);
	}

	public function tampilTombol(){
		$data = $this->PapanskorModel->getTombolJuri();
		echo json_encode($data);
	}

	public function tampilDataVote(){
		$data = $this->VoteModel->getDataVoteSkor();
		echo json_encode($data);
	}
}
