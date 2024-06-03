<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Peserta extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($_SESSION['status'] !="login"){
			
            redirect('login');
        }
		$this->load->model('PesertaModel');
	}

	public function index()
	{
		view('contents.peserta.index');
	}

	public function tampilData(){
		$data = $this->PesertaModel->getData();
		echo json_encode($data);
	}

	public function tambahPeserta(){
		$fileData = $_FILES['file']['tmp_name'];
	
		// $spreadsheet = IOFactory::load($fileData);
		$spreadsheet = IOFactory::load($fileData);
		$sheet = $spreadsheet->getActiveSheet();
		
		$data = [];

		$startRow = 3; // Mulai dari baris ke-3
        foreach ($sheet->getRowIterator($startRow) as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $rowData = [];
            foreach ($cellIterator as $cell) {
                $cellValue = $cell->getValue();
                if ($cellValue !== null) {
                    $rowData[] = $cellValue;
                }
            }

            if (!empty($rowData)) {
                $data[] = $rowData;
            }

			// Pastikan data dari kolom D hingga H terlebih dahulu - merah
			if (count($rowData) >= 9) {
				$dataToInsert = array(
					'no' => $rowData[0],
					'kelas' => $rowData[3],
					'kategori' => $rowData[4],
					'jk' => $rowData[5],
					'nama' => $rowData[6],
					'kontingen' => $rowData[7],
					'tim_id' => 1,
					'status' => 'ok'
				);

				$this->PesertaModel->simpanData("atlit",$dataToInsert);
				// Lakukan sesuatu dengan $insertId jika diperlukan
			}

			// Kemudian masukkan data dari kolom D, E, F, I, J - biru
			if (count($rowData) >= 9) {
				$dataToInsert = array(
					'no' => $rowData[0],
					'kelas' => $rowData[3],
					'kategori' => $rowData[4],
					'jk' => $rowData[5],
					'nama' => $rowData[8],
					'kontingen' => $rowData[9],
					'tim_id' => 2,
					'status' => 'ok'
				);

				$this->PesertaModel->simpanData("atlit",$dataToInsert);
				// Lakukan sesuatu dengan $insertId jika diperlukan
			}

			// Kemudian masukkan data Arena
			if (count($rowData) >= 9) {
				$dataToInsert = array(
					'arena' => $rowData[1]
				);

				$this->PesertaModel->simpanData("arena",$dataToInsert);
				// Lakukan sesuatu dengan $insertId jika diperlukan
			}

			// Kemudian masukkan data Partai
			if (count($rowData) >= 9) {
				$getTimMerah = $this->PesertaModel->getWhere('atlit', 1, $rowData[0]);
				$getTimBiru = $this->PesertaModel->getWhere('atlit', 2, $rowData[0]);

				$timMerahId = (!empty($getTimMerah)) ? $getTimMerah[0]->id : null;
            	$timBiruId = (!empty($getTimBiru)) ? $getTimBiru[0]->id : null;

				$dataToInsert = array(
					'partai' => $rowData[2],
					'tim_merah_id' => $timMerahId,
                	'tim_biru_id' => $timBiruId,
					'pertandingan' => 'tanding',
					'tgl_pelaksanaan' => date('Y-m-d')
				);

				$this->PesertaModel->simpanData("partai",$dataToInsert);
				// Lakukan sesuatu dengan $insertId jika diperlukan
			}

			// Kemudian masukkan data Ronde
			if (count($rowData) >= 9) {
				$ronde = 1;
				for($i=1; $i<=3; $i++){
					$dataToInsert = array(
						'partai_id' => $rowData[0],
						'arena_id' => $rowData[0],
						'ronde' => $ronde++,
						'status_ronde' => 'aktif',
						'waktu_pertandingan' => 120,
						'sisa_waktu' => 0
					);
					$this->PesertaModel->simpanData("ronde",$dataToInsert);
				}
				// Lakukan sesuatu dengan $insertId jika diperlukan
			}
        }

		// Sekarang $data berisi konten dari file Excel
		// Lakukan sesuatu dengan data ini, seperti menyimpan ke database

		// Setelah pemrosesan, lakukan respons ke client
		echo json_encode($data);
	}

	public function updateLogo()
	{
		$id = $this->input->post('id');
		$logo = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
		$data = array(
			'logo' => $logo
		);

		$data = $this->PesertaModel->updateData('atlit', $data, 'id =' . $id);
		echo json_encode($data);
	}

	public function resetData(){
		$this->PesertaModel->truncate('atlit');
		$this->PesertaModel->truncate('ronde');
		$this->PesertaModel->truncate('rondecon');
		$this->PesertaModel->truncate('partai');
		$this->PesertaModel->truncate('penilaian');
		$this->PesertaModel->truncate('vote');
		$this->PesertaModel->truncate('log');
		$this->PesertaModel->truncate('penilaian_temp');
		$data = $this->PesertaModel->truncate('arena');
		return $data;
	}
}
