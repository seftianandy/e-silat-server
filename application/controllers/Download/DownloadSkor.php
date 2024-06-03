<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DownloadSkor extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($_SESSION['status'] !="login"){
            redirect('login');
        }
		$this->load->model('PapanskorModel');
        $this->load->model('PertandinganModel');
    }

    public function index()
	{
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $data_pertandingan = $this->PertandinganModel->getData();

		$id_pukulan = 1;
		$id_tendangan = 2;
		$id_jatuhan = 3;
		$id_peringatan = 4;
		$id_teguran = 5;

        foreach ($data_pertandingan as $pertandingan_merah) {
            $data_jatuhan_m = $this->PapanskorModel->getNilaiDewan($pertandingan_merah->tim_merah_id, $ronde_id, $id_jatuhan);
            $data_teguran_m = $this->PapanskorModel->getNilaiDewan($pertandingan_merah->tim_merah_id, $ronde_id, $id_teguran);
            $data_peringatan_m = $this->PapanskorModel->getNilaiDewan($pertandingan_merah->tim_merah_id, $ronde_id, $id_peringatan);

            $data_pukulan = $this->PapanskorModel->getNilaiJuri($atlit_id, $ronde_id, $id_pukulan);
            $data_tendangan = $this->PapanskorModel->getNilaiJuri($atlit_id, $ronde_id, $id_tendangan);
        }

		$total_nilai = $total_nilai_pukulan + $total_nilai_tendangan + $total_nilai_jatuhan - $total_nilai_teguran - $total_nilai_peringatan;

        // $data = $this->UserModel->getData();

        // $numRow = 1;
        // foreach($data as $user){
        //     $sheet->setCellValueExplicit('A'.($numRow), $user->nip, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        //     $sheet->setCellValue('B'.($numRow), $user->nama);
        //     $sheet->setCellValue('C'.($numRow), $user->nama_level);
        //     $sheet->setCellValue('D'.($numRow), $user->username);
        //     $sheet->setCellValue('E'.($numRow), $user->username);
        //     $numRow++;
        // }

        // $sheet->setCellValueExplicit('A'.(1), "satu", \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        $sheet->setCellValue('A' . (1), "satu");
        $sheet->getStyle('A' . (1))->getFont()->setBold(true);
        $sheet->getStyle('A' . (1))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00'); // Latar belakang kuning
        $sheet->getStyle('A' . (1))->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); // Batas tipis
        $sheet->setCellValue('B'.(1), "dua");
        $sheet->setCellValue('C'.(1), "tiga");
        $sheet->setCellValue('D'.(1), "empat");
        $sheet->setCellValue('E'.(1), "lima");
        
        
		$writer = new Xlsx($spreadsheet);
		
		$filename = 'e skore';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
