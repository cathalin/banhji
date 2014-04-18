<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Excellize extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('excel');
	}
	public function excel($from = null, $to = null) {	
		$this->load->view('frontpage_view');

		// Initiate new excel object
		$objPHPExcel = $this->excel;

		$arrayData = array(
			array("Quarter", 2010, 2011, 2012, 2013),
			array("Q1", 152, 458, 465, 555),
			array("Q2", 412, 542, 452, 523)
		);
 
		//activate worksheet number 1
		$objPHPExcel->setActiveSheetIndex(0);

		//name the worksheet
		$objPHPExcel->getActiveSheet()->setTitle('test worksheet');

		//set cell A1 content with some text
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'This is just some text value');

		//change the font size
		$objPHPExcel->getActiveSheet()->getStyle('C1')
									  ->getFont()
									  ->setSize(20);

		//make the font become bold
		$objPHPExcel->getActiveSheet()->getStyle('C1')
									  ->getFont()
									  ->setBold(true);

		//merge cell A1 until D1
		$objPHPExcel->getActiveSheet()->mergeCells('C1:G1');

		//set aligment to center for that merged cell (A1 to D1)
		$objPHPExcel->getActiveSheet()->getStyle('C1')
									  ->getAlignment()
									  ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		// Give data to cell c3 from array
		$objPHPExcel->getActiveSheet()->fromArray($arrayData, NULL,'C3');
		 
		$filename='just_some_random_name'.$from.'-'.$to.'.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		             
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
		$objPHPExcel->getProperties()->setCreator("Sokdararith Prak")
								     ->setTitle("Sale Report");

		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}
}