<?php 
error_reporting(E_ALL ^ E_NOTICE);
App::import('Vendor','PHPExcel',array('file' => 'excel/PHPExcel.php'));
App::import('Vendor','PHPExcelWriter',array('file' => 'excel/PHPExcel/Writer/Excel2007.php'));
App::import('Vendor','PHPExcelReader',array('file' => 'excel/PHPExcel/Reader/Excel2007.php'));
App::uses('Component', 'Controller');
class ExcelComponent extends Component {
    var $xls;
    var $sheet;
    var $data;
    var $data2,$data3,$data4,$data5,$data6,$data7,$data8,$data9,$data10,$data11,$data12,$data13,$data14;
    var $blacklist = array();
	
	/* initialize component to get data */
	public function initialize(Controller $controller) {
		$this->controller = $controller;
	}
    
    function ExcelComponent() {
        $this->xls = new PHPExcel();
        $this->sheet = $this->xls->getActiveSheet();
        $this->sheet->getDefaultStyle()->getFont()->setName('Verdana');
		
    }
	
	/* function used to read the data in the file */
	 function read_data($file) {		
		 $this->loadFile($file);
		 return $this->extract_data($this->sheet);
    }
	
	function extract_data($sheet){
		$array_data = array();
		$rowIterator = $this->sheet->getRowIterator();
		$col_array = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V');
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

	 function generate_report($template, &$data, &$data2, &$data3, &$data4, &$data5, &$data6,
			&$data7, &$data8, &$data9, &$data10, &$data11,&$data12,&$data13,&$data14, $title = 'Report',$file, $save) { 
		
		$this->loadFile($this->webroot.'uploads/export/'.$template.'.xlsx');
        $this->data =& $data;
		$this->data2 =& $data2;
		$this->data3 =& $data3;
		$this->data4 =& $data4;
		$this->data5 =& $data5;
		$this->data6 =& $data6;
		$this->data7 =& $data7;
		$this->data8 =& $data8;
		$this->data9 =& $data9;
		$this->data10 =& $data10;
		$this->data11 =& $data11;
		$this->data12 =& $data12;
		$this->data13 =& $data13;
		$this->data14 =& $data14;
		// $this->hdata =& $hdata;
        // $this->_title($title);
        // $this->_headers();
		 $this->template = $template.'_template';
		 $this->_rows($template, $file);
         $this->_output($file, $save);
         return true;
    }   
	
                 
    function generate($template, &$data, &$data2, $title = 'Report',$file, $save,$webroot) { 
		
		$this->loadFile($this->webroot.'uploads/export/'.$template.'.xlsx');
        $this->data =& $data;
		$this->data2 =& $data2;
		$this->webroot = $webroot;
		
		// $this->hdata =& $hdata;
        // $this->_title($title);
        // $this->_headers();
		 $this->template = $template.'_template';
		 $this->_rows($template, $file);
         $this->_output($file, $save);
         return true;
    }   
	
    
    function _title($title) { 
        $this->sheet->setCellValue('A2', $title);
        $this->sheet->getStyle('A2')->getFont()->setSize(14);
        $this->sheet->getRowDimension('2')->setRowHeight(23);
    }
	
	function loadFile($file) {
        $this->reader = new PHPExcel_Reader_Excel2007();
        $this->xls = $this->reader->load("{$file}");
        $this->xls->setActiveSheetIndex(0);
        $this->sheet = $this->xls->getActiveSheet();
        $this->sheet->getDefaultStyle()->getFont()->setName('Calibri');
		$this->sheet->getStyle()->getNumberFormat()->setFormatCode('@');
	
    } 

    function _headers() {
        $i=0;
        foreach ($this->hdata as $field => $value) {
            if (!in_array($value,$this->blacklist)) {
                $columnName = Inflector::humanize($value);
                $this->sheet->setCellValueByColumnAndRow($i++, 4, $columnName);
            }
        }
        $this->sheet->getStyle('A4')->getFont()->setBold(true);
        $this->sheet->getStyle('A4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $this->sheet->getStyle('A4')->getFill()->getStartColor()->setRGB('969696');
        $this->sheet->duplicateStyle( $this->sheet->getStyle('A4'), 'B4:'.$this->sheet->getHighestColumn().'4');
      
    }
	
	
	function _rows($template, $file) { 

		if($template == 'positions'){
			$i = 2;
			foreach($this->data as $key => $value) {
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['Position']['job_title']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['Client']['client_name']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['Position']['no_job']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value[0]['team_member']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value[0]['cv_sent']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->get_total_joined($value[0]['joined']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['ReqStatus']['title']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['Creator']['first_name']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->format_date($value['Position']['created_date']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->format_date($value['Position']['modified_date']));
					$i++;
					$j= 0;			
				}			
			
		}else if($template == 'performance_report'){
			$i = 2;
			foreach($this->data as $key => $value){
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->print_value($this->data2[$key]));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->print_value($this->data3[$key]));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->print_value($this->data4[$key]));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->print_value($this->data5[$key]));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->print_value($this->data6[$key]));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->print_value($this->data7[$key]));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->print_value($this->data8[$key]));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->print_value($this->data9[$key]));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->print_value($this->data10[$key]));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->print_value($this->data11[$key]));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->print_value($this->data12[$key]));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->print_value($this->data14[$key]));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->print_value($this->data13[$key]));
					$i++;
					$j= 0;			
				}			
			
		}else if($template == 'resumes'){
			$i = 2;
			foreach($this->data as $key => $value) {
					$this->sheet->setCellValueByColumnAndRow($j++,$i,ucwords($value[0]['full_name']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->get_format_text($value['Resume']['mobile']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->get_format_text($value['Resume']['email_id']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->get_download_url($value['Resume']['id']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['Resume']['present_employer']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['Resume']['total_exp']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['ResLocation']['location']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['Resume']['education']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['Resume']['present_ctc'] ? $value['Resume']['present_ctc'].' L' : '');
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['Resume']['expected_ctc'] ? $value['Resume']['expected_ctc'].' L' : '');
					$this->sheet->setCellValueByColumnAndRow($j++,$i,ucwords($value['Creator']['first_name']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->format_date($value['Resume']['created_date']));
					$i++;
					$j= 0;			
				}			
			
		}else if($template == 'clients'){
			$i = 2;
			
			$fields = array('id','client_name','ResLocation.location','created_date',
		'Creator.first_name','status',"group_concat(distinct CAH.first_name separator ', ') account_holder", 'city',
		'count(distinct Position.id) no_pos','count(distinct CON.id) no_contact', 'modified_date');
		
		
			foreach($this->data as $key => $value) {
					$this->sheet->setCellValueByColumnAndRow($j++,$i,ucwords($value['Client']['client_name']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['Client']['city']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,ucfirst($value['ResLocation']['location']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value[0]['no_pos']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value[0]['no_contact']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value[0]['account_holder']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['Client']['status'] ? 'Inactive' : 'Active');					
					$this->sheet->setCellValueByColumnAndRow($j++,$i,ucfirst($value['Creator']['first_name']));				
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->format_date($value['Client']['created_date']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->format_date($value['Client']['modified_date']));
					// client contacts to add
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['Client']['contact_data0']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['Client']['contact_data1']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['Client']['contact_data2']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['Client']['contact_data3']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['Client']['contact_data4']);
					$i++;
					$j= 0;			
				}			
			
		}else if($template == 'users'){
			$i = 2;
			foreach($this->data as $key => $value) {
					$this->sheet->setCellValueByColumnAndRow($j++,$i,ucwords($value['User']['first_name'].' '.$value['User']['last_name']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['User']['mobile']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['User']['email_id']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,ucfirst($value['Location']['location']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['User']['status'] ? 'Inactive' : 'Active');				
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->format_date($value['User']['created_date']));
					$i++;
					$j= 0;			
				}			
			
		}else if($template == 'billing'){
			$i = 2;
			foreach($this->data as $key => $value){
					$this->sheet->setCellValueByColumnAndRow($j++,$i,ucwords($value['Resume']['first_name'].' '.$value['Resume']['last_name']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,ucwords($value['Designation']['designation']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,ucwords($value['Client']['client_name']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,ucwords($value['Position']['job_title']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['Billing']['ctc_offer']);				
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['Billing']['bill_ctc']);
					$this->sheet->setCellValueByColumnAndRow($j++,$i,ucwords($value['Owner']['first_name']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->format_date($value['Billing']['joined_on']));
					$i++;
					$j= 0;			
				}			
			
		}else if($template == 'tasks'){
			$i = 2;
			foreach($this->data as $key => $value){
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->format_date($value['TaskPlan']['task_date']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,ucwords($this->get_session($value['TaskPlan']['session'])));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,ucwords($value['Position']['job_title']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,ucwords($value['Client']['client_name']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$value['TaskPlan']['ctc']);				
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->format_date($value['TaskPlan']['created_date']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->format_date($value['TaskPlan']['modified_date']));
					$i++;
					$j= 0;			
				}			
			
		}else if($template == 'leave'){
			$i = 2;
			foreach($this->data as $key => $value){
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->format_date($value['Leave']['leave_from']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->format_date($value['Leave']['leave_to']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,ucfirst($this->get_session($value['Leave']['session'])));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->get_leave_type($value['Leave']['leave_type']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,ucfirst($value['Leave']['reason_leave']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->get_leave_status($value['Leave']['is_approve']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,$this->format_date($value['Leave']['created_date']));
					$this->sheet->setCellValueByColumnAndRow($j++,$i,ucwords($value['Creator']['first_name'].' '.$value['Creator']['last_name']));
					$i++;
					$j= 0;			
				}			
			
		}	
	}
	
	/* function to get download url of resume */
	public function get_download_url($id){	
		return $url = Configure::read('WEBSITE').$this->webroot.'hc/download/'.$id;
	}
	
	/* function to get total joined */
	public function get_total_joined($join){
		$split_join = explode(',',$join);
		foreach($split_join as $detail){
			if($detail == 'Joined'){
				$count++;
			}
		}
		return $count;
	}
	
	
		/* function to get leave types */
	public function get_leave_status($type){
		switch($type){
			case 'W':
			$value = 'Awaiting Approval';
			break;
			case 'A':
			$value = 'Approved';			
			break;	
			case 'R':
			$value = 'Rejected';			
			break;	
			case 'C':
			$value = 'Cancelled';			
			break;						
		}
		return $value;
	}
	
	
		/* function to get leave types */
	public function get_leave_type($type){
		switch($type){
			case 'NBL':
			$value = 'Need Based Leave';
			break;
			case 'PL':
			$value = 'Privileged Leave';			
			break;	
			case 'ML':
			$value = 'Maternity Leave';			
			break;	
			case 'PA':
			$value = 'Paternity Leave';			
			break;
			case 'LOP':
			$value = 'Loss of Pay';			
			break;	
			case 'OD':
			$value = 'On Duty';			
			break;				
		}
		return $value;
	}
	
	
	/* function to print the value */
	public function print_value($val){
		return $val ? $val : '';
	}
	
	/* function to show formatted email */
	public function get_format_text($data){
		$comma = ', ';
		$new_data = str_replace(array(',',';',', '), array(',',',',','), $data);
		$result = explode(',', $new_data);
		$tot = count($result);
		foreach($result as $key => $val){
			if(--$tot <= $key){
				$comma = '';
			}
			$format_data .= $val.$comma;
		}
		return $format_data;
	}
		
	/* function used to format the date */
	public function format_date($date){ 
		if(!empty($date) && $date!= '0000-00-00' && $date!= '0000-00-00 00:00:00'){
			$date =  split("[-: ]", $date);
			return date('d-M-Y',mktime($date[3],$date[4],$date[5],$date[1],$date[2],$date[0]));
		}
	}
	
	/* function to get the session */
	public function get_session($title){
		switch($title){
			case 'F':
			$value = 'Forenoon';
			break;
			case 'A':
			$value = 'Afternoon';			
			break;	
			case 'D':
			$value = 'Full Day';			
			break;			
		}
		return $value;
	}
	
	
	/* function to format the team members */
	public function format_team_member($data){
		$team = explode(';', $data);
		array_pop($team);
		$tot = count($team);
		if($tot != '1'){
			$comma = ', ';
		}
		foreach($team as $key => $member){
			$mem = explode('(', $member); 
			if($tot-- <= $key){
				$comma = '';
			}
			if(!empty($mem[0])){
				$format_team .= $mem[0].$comma;
			}
		}
		return $format_team;
	}
	
    
	function _rows2($template) { //echo '<pre>'; print_r($this->data);
		$i = 2; $j = 0; 
		// for testing.
	//	for($k = 0; $k < count($this->data); $k++){
			foreach($this->data as $value) { //echo '<pre>'; print_r($value);
				$value = $value['Home']['first'];
				$this->sheet->setCellValueByColumnAndRow($j++,$i, $value);
			}
			//echo 'ravi';
			
			$i++;
			$j = 0;
			
		//}
	}


    function _output($title,$save) {
		$objWriter = new PHPExcel_Writer_Excel2007($this->xls);
		
		if($save){
			$objWriter->save('uploads/tmp/'.$title.'.xls');
			return;
		}
	
       header("Content-type: application/vnd.ms-excel"); 
       header('Content-Disposition: attachment;filename="'.$title.'.xlsx"');
       header('Cache-Control: max-age=0');
	   $this->xls->getActiveSheet()->setTitle($title);

		// Save Excel 2007 file
		//echo date('H:i:s') . " Write to Excel2007 format\n";
		
		//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
        $objWriter->save('php://output');
		/*
        $objWriter = new PHPExcel_Writer_Excel5($this->xls);
        $objWriter->setTempDir('tmp');
        $objWriter->save('php://output');
		*/
		
		
		exit;
	}
	
	
  
   
}
?>