<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DownloadUser extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($_SESSION['status'] !="login"){			
            redirect('login');
        }
		$this->load->model('UserModel');
    }
    
    public function index()
	{
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $data = $this->UserModel->getData();
        $numRow = 1;
        foreach($data as $user){
            $sheet->setCellValueExplicit('A'.($numRow), $user->nip, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            $sheet->setCellValue('B'.($numRow), $user->nama);
            $sheet->setCellValue('C'.($numRow), $user->nama_level);
            $sheet->setCellValue('D'.($numRow), $user->username);
            $sheet->setCellValue('E'.($numRow), $user->username);
            $numRow++;
        }
        
		$writer = new Xlsx($spreadsheet);
		
		$filename = 'user';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
