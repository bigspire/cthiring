<?php
/* 
Purpose : To validate export excel sheet.
Created : Nikitasa
Date : 09-07-2016
*/
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
// error_reporting(E_ALL);
// ob_start();
// ini_set('display_errors', TRUE);
// ini_set('display_startup_errors', TRUE);
// define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
/** Include PHPExcel */
require_once 'vendor/libexcel/Classes/PHPExcel.php';

class libExcel{

	public $objPHPExcel;
	
	/* function used to read the data in the file */
	 function read_data($file) {		
		 $this->loadFile($file);
		 return $this->extract_data($this->objPHPExcel->getActiveSheet());
    }
	
	function extract_data($sheet){
		$array_data = array();
		$rowIterator = $this->objPHPExcel->getActiveSheet()->getRowIterator();
		$col_array = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R');
		foreach($rowIterator as $row){
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
            //if(1 == $row->getRowIndex ()) continue;//skip first row
            $rowIndex = $row->getRowIndex();
			foreach($cellIterator as $cell){
                $count = 1;
                $array_size = sizeof($col_array);
                foreach($col_array as $inner_val){
                    if($inner_val == $cell->getColumn()){
                        if($array_size == $count) {
                            $array_data[$rowIndex][$cell->getColumn()] = PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue());
                        }else{
                             $array_data[$rowIndex][$cell->getColumn()] = $cell->getCalculatedValue();
                        }
                    }
                    $count++;
                }
            }
        }
		return $array_data;		
	}

	
	//  call constructor to create object and initialize
	function libExcel() {
		$this->objPHPExcel = new PHPExcel();
		// Set document properties
		// echo date('H:i:s') , " Set document properties" , EOL;
		$this->objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

	}
	
	// Add some data, we will use printing features
	function printCell($data,$total,$col,$field,$file_name){	
		$j = 1;
		$total =  $total;
		$field_count = count($field);
		$c_count = $field_count-1;
		$k = 0;
		for($i = 2; $i <= $total+1; $i++){
			for($j = 0; $j < $field_count; $j++){ 
				$this->objPHPExcel->getActiveSheet()->setCellValue($col[$j] . $i, strip_tags($data[$k][$field[$j]]));
			}
			$k++;
		}	
		// auto size for columns 
		foreach(range('A',"$col[$c_count]") as $columnID) {
   		$this->objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
		}	
		// set the header
		$this->setHeader($file_name);
	}	
	
	// print header data
	function printHeader($header,$col){    
    	$col_count = count($col); 
    	$i = 1; 
    	// print header cells in the first row
    	for($j = 0; $j < $col_count; $j++){ 
       	$this->objPHPExcel->getActiveSheet()->setCellValue($col[$j] . $i,  $header[$j])->getStyle($col[$j] . $i,  $header[$j])->applyFromArray(array('fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb' => 'b3b3ff')))); 
      	$this->objPHPExcel->getActiveSheet()->getStyle('A1:N1')->getFont()->setBold(true);
	
      } 
    	$i++; 
	}	


	// print the header and set page size
	// Set header and footer. When no different headers for odd/even are used, odd header is assumed.
	function setHeader($file_name){	
		// echo date('H:i:s') , " Set header/footer" , EOL;
		$this->objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HPlease treat this document as confidential!');
		$this->objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $this->objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
		// Set page orientation and size
		$this->objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$this->objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		// Rename worksheet
		// echo date('H:i:s') , " Rename worksheet" , EOL;
		$this->objPHPExcel->getActiveSheet()->setTitle($file_name);
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$this->objPHPExcel->setActiveSheetIndex(0);
		// download the excel file
		$this->output($file_name);
	}
	
	// output the data
	function output($file_name){
		// Save Excel 2007 file
		$objWriter = PHPExcel_IOFactory::createWriter($this->objPHPExcel, 'Excel2007');
		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$file_name.'.xlsx');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		$objWriter->save('php://output');
		die;
	}
}
?>