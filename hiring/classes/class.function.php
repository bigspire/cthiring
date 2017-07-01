<?php
/* 
Purpose : To validate form fields.
Created : Nikitasa
Date : 21-01-2017
*/
class fun{

	public $key = '33YhGkf983ilkasjdf4GSD01';

	/* function to decrypt */
	function decrypt($cypher){
		$cypher =str_replace('%20','+',str_replace(' ','+',$cypher));			
		return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->key, base64_decode($cypher), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }
	
	/* function to check the role access */
	public function check_role_access($cur_module,$modules){
		foreach($modules as $per){			
			$format_per[] = $per;
		}
		if (!in_array($cur_module, $format_per)){
			header('Location:../home/?access=invalid');	
		}
		foreach($modules as $key => $module){
			// check the user module exists in the database module list
			if (in_array($module, $format_per)) { 	
				switch($module){
					case 1:		
					$mod['create_client'] = 1;
					break;					
					case 2:					
					$mod['view_client'] = 1;
					break;						
					case 4:					
					$mod['create_position'] = 1;
					break;					
					case 5:					
					$mod['view_position'] = 1;
					break;
					case 7:					
					$mod['create_resume'] = 1;
					break;
					case 8:					
					$mod['view_resume'] = 1;
					break;
					case 10:					
					$mod['view_interview'] = 1;
					break;					
					case 14:					
					$mod['view_incentive'] = 1;
					break;
					case 13:					
					$mod['create_incentive'] = 1;
					break;
					case 17:					
					$mod['recruiter_report'] = 1;
					break;
					case 18:					
					$mod['account_holder_report'] = 1;
					break;
					case 19:					
					$mod['location_report'] = 1;
					break;
					case 20:					
					$mod['failure_report'] = 1;
					break;				
					case 22:					
					$mod['revenue_report'] = 1;
					break;
					case 23:					
					$mod['tat_report'] = 1;
					break;
					case 24:					
					$mod['collection_report'] = 1;
					break;
					case 25:					
					$mod['client_retention_report'] = 1;
					break;
					case 26:					
					$mod['incentive_report'] = 1;
					break;
					case 27:					
					$mod['daily_report'] = 1;
					break;
					case 28:					
					$mod['weekly_report'] = 1;
					break;
					case 29:					
					$mod['sent_item'] = 1;
					break;
					case 30:					
					$mod['manage_grade'] = 1;
					break;
					case 31:					
					$mod['manage_users'] = 1;
					break;
					case 32:			
					$mod['manage_role'] = 1;
					break;
					case 33:					
					$mod['manage_mailer_template'] = 1;
					break;
					case 34:					
					$mod['manage_incentive'] = 1;
					break;
					case 35:					
					$mod['view_billing'] = 1;
					break;
					case 36:					
					$mod['add_billing'] = 1;
					break;
					case 37:					
					$mod['approve_billing'] = 1;
					break;
				}				
			}
		}
		return $mod;
	}
	
	/* function to encrypt */
	 function encrypt($plain){
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->key, $plain, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
    }

	//  checking the file extension is doc,docx
	public function extension_validation($file_ext,$extensions){
		if(in_array($file_ext,$extensions) == false){
			return true;
		}
	}
	
	// checking the file size is less than 1 MB
	public function size_validation($size,$req_size){	
		if($size > $req_size){
			return true;
		}	
	}
	
	// function to validate string
	public function upper_case_string($emp_name){
		$let = ucwords($emp_name);
		return $let;	
	}
	
	// check if phone number only contains numbers   
	public function is_phonenumber($contact_no){		
		if (!empty($contact_no) && !ctype_digit($contact_no)){
			return true;
		}
   }
	// check if phone number only contains numbers   
	public function size_of_phonenumber($contact_no){	
		if (!empty($contact_no) && ctype_digit($contact_no)){			
			if (strlen($contact_no) < 10){
				return true;
			}else if(strlen($contact_no) > 12){
				return true;
			}
 	   }
   }
   // email validation
	public function email_validation($email){		
		if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
		}
   }
   
	// function to validate database target type field 
	public function target_type($type){
		if($type == 'I'){
			$sub = 'Individual';
		}else{	
	 		$sub = 'Team';
		}
		return $sub;
	}


	// white space validation
	public function is_white_space($text_field){
		if(strlen(trim($text_field)) != strlen($text_field)){        
			$text = trim($text_field);
		}else{
			$text = $text_field;		
		}
		return $text;
	}

	
	// check if amount only contains numbers
	public function isnumeric($amount){
		if(!empty($amount) && !is_numeric($amount)){           
			return true;
		}
	}
	
	// function to validate date field for export
	public function display_date(){
		$display = date('d-m-Y');
		return $display;
	}
	
	// function for create current date and time
    public function current_date(){
		$date = date('Y-m-d H:i:s');
		return $date;
	}
	
	// function to validate incentive quarter field 
	public function convert_quater_month($created_date){
		if(($created_date != '') && ($created_date != '0000-00-00')){
			$c_d = date('M', strtotime($created_date));
			return $c_d;
		}
	}
	
	// function to validate incentive quarter field 
	public function convert_quater_year($created_date){
		if(($created_date != '') && ($created_date != '0000-00-00')){
			$c_d = date('Y', strtotime($created_date));
			return $c_d;
		}
	}
	
	public function display_quater($quater){
		if($quater == 'Mar'){
			$quater_st = 'Jan - Mar';
		}elseif($quater == 'Jun'){	
	 		$quater_st = 'Apr - Jun';
		}elseif($quater == 'Sep'){	
	 		$quater_st = 'Jul - Sep';
		}elseif($quater == 'Dec'){	
	 		$quater_st = 'Oct - Dec';
		}
		return $quater_st;
	}
	
	
	// function to validate database created_date field 
	public function convert_date_to_display($created_date){
		if(($created_date != '') && ($created_date != '0000-00-00')){
			$c_d = date('d-M-Y', strtotime($created_date));
			return $c_d;
		}
	}
	
	// function to validate database created_date field 
	public function convert_date_db($created_date){
		if(($created_date != '') && ($created_date != '0000-00-00')){
			$c_d = date('Y-m-d', strtotime($created_date));
			return $c_d;
		}
	}

  // function to validate database status field 
	public function display_status($status){
		if($status == '1'){
			$st = 'Active';
		}else{	
	 		$st = 'Inactive';
		}
		return $st;
	}
	

	// function to validate database in user page, status field 
	public function display_user_status($status){
		if($status == '0'){
			$st = 'Active';
		}elseif($status == '1'){	
	 		$st = 'Inactive';
		}
		return $st;
	}	
	
	// status color field validation for user page
	public function user_status_cls($status){
		if($status == '0'){
		 $stat = 'success';
		}elseif($status == '1'){
		 $stat = 'important';	
		}
		return $stat;
	} 

	// status color field validation
	public function status_cls($status){
		if($status == '1'){
		 $stat = 'success';
		}else{	
		 $stat = 'important';	
		}
		return $stat;
	} 
	
	// function to validate approve billing status field 
	public function approval_status($status){
		if($status == 'W' || $status == 'R'){
			$st = 'Pending';
		}elseif($status == 'A'){	
	 		$st = 'Approved';
		}
		return $st;
	}
	
	// interview status colour field validation
	public function interview_status_cls($status){
		if($status == 'Scheduled' || $status == 'Re-Scheduled'){
			 $stat = 'info';
		}elseif($status == 'OnHold'){	
	  		 $stat = 'warning';	
		}elseif($status == 'Rejected'){
			$stat = 'important';	
		}elseif($status == 'Qualified'){
			$stat = 'success';	
		}elseif($status == 'Cancelled'){
			$stat = '';	
		}
		return $stat;
	}
	
	/* function to get the interview current status condition */
	public function get_status_cond($st){
		switch($st){
			case '1':
			$cond = "Scheduled";
			break;
			case '2':
			$cond = "Re-Scheduled";
			break;
			case '3':
			$cond = "OnHold";
			break;
			case '4':
			$cond = "Qualified";
			break;
			case '5':
			$cond = "Cancelled";
			break;
			case '6':
			$cond = "Rejected";
			break;			
		}
		return $cond;
	}
	
	/* function to get the recruiter performance condition */
	public function get_performance_cond($st){
		switch($st){
			case '0 || 1':
			$cond = "0 - 1";
			break;
			case '1 || 2':
			$cond = "1 - 2";
			break;
			case '2 || 3 || 4':
			$cond = "2 - 4";
			break;
			case '4 || 5 || 6 || 7 || 8':
			$cond = "4 - 8";
			break;
			case '8 || 9 || 10 || 11 || 12':
			$cond = "8 - 12";
			break;
			case '12 || 13 || 14 || 15 || 16 || 17 || 18 || 19 || 20':
			$cond = "12 - 20";
			break;	
			case '20 || 21 || 22 || 23 || 24 || 25 || 26 || 27 || 28 || 29 || 30':
			$cond = "20 - 30";
			break;
			case '30 || 31 || 32 || 33 || 34 || 35 || 36 || 37 || 38 || 39 || 40':
			$cond = "30 - 40";
			break;
			case '40 || >40':
			$cond = "> 40";
			break;
		}
		return $cond;
	}
	
	// function to validate database billing status field 
	public function display_billing_status($status){
		if($status == 'W' || $status == 'R'){
			$st = 'L1 - P';
		}elseif($status == 'A'){	
	 		$st = 'L1 - A';
		}
		return $st;
	}
	
	// billing status color field validation
	public function billing_status_cls($status){
		if($status == 'W' || $status == 'R'){
		 $stat = '';
		}elseif($status == 'A'){	
		 $stat = 'success';	
		}
		return $stat;
	}

	/* function to find the time of event */
	public function time_diff($date, $ago_str=1, $show_date){ 		
		$s = time() - strtotime($date);
		if($s >= 1) {
		$td = "$s sec";
		}   
		if($s > 59){ 
			$m = (int)($s/60); 
			$s = $s-($m*60); // sec left over 
			$td = "$m min";  if($s>1) $td .= "s"; 
		} 
		if($m > 59){ 
			$hr = (int)($m/60); 
			$m = $m-($hr*60); // min left over 
			$td = "$hr hr"; if($hr>1) $td .= "s"; 
			
		} 
		if($hr>23){		
			$d = (int)($hr/24); 
			$hr = $hr-($d*24); // hr left over 
			$td = "$d day"; if($d>1) $td .= "s"; 
			
		} 
		
		if($d > 30){		
			$m = (int)($d/30);
			$td = "$m month"; if($m>1) $td .= "s"; 
			
		} 
		if($ago_str == 1){
			$td .= ($td=="now")? "":" ago"; // in this example "ago" 
		}
		// show the date
		if($d > 1 && $show_date == '1'){
			return date('jS M, Y', strtotime($date));
		}
		if(trim($td) == 'ago')	return '1 sec ago';
		
		return $td;		
   }
   
   // check if field only contains zero
	public function is_zero($number){
		if(($number == 0)){           
			return true;
		}
   }

   // date format conversion
	public function convert_date($date){
		if($date != ''){
			$dateformat = explode('/',$date);
			$date_format = $dateformat[2].'-'.$dateformat[1].'-'.$dateformat[0];
			return $date_format;
		}
   }
   
   // date format conversion
	public function convert_date_display($date){
		if($date != ''){
			$dateformat = explode('-',$date);
			$date_format = $dateformat[2].'/'.$dateformat[1].'/'.$dateformat[0];
			return $date_format;
		}
	}
   
   // check the  file is empty
   public function is_empty($filename){
		if(empty($filename)){
			return true;
		}
	}
	// check the  file is not empty
   public function not_empty($filename){
		if(!empty($filename)){
			return true;
		}
	}
	
	/* match the fields in the auto complete search */
	public function match_results($keyword, $value){
		//  matching the keyword with the result
		if(strncmp($keyword,strtolower(trim($value)),strlen($keyword)) == 0){
			if(trim($value)){
				return trim("$value\n");
			}			
		}		
	}
	
	/* function to download the file */
	public function download_file($path){	
		// Must be fresh start
		if( headers_sent() )
		die('Headers Sent');
		// Required for some browsers
		if(ini_get('zlib.output_compression'))
		ini_set('zlib.output_compression', 'Off');
		// File Exists?
		if(file_exists($path)){
			// Parse Info / Get Extension
			$fsize = filesize($path);
			$path_parts = pathinfo($path);
			$ext = strtolower($path_parts["extension"]);
			// Determine Content Type
			switch($ext){			 
			  case "zip": $ctype="application/zip"; break;
			  case "doc": $ctype="application/msword"; break;
			  case "xls": $ctype="application/vnd.ms-excel"; break;		 
			  case "gif": $ctype="image/gif"; break;
			  case "png": $ctype="image/png"; break;
			  case "jpeg":
			  case "jpg": $ctype="image/jpg"; break;
			  default: $ctype="application/force-download";
			}
			header("Pragma: public"); // required
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Cache-Control: private",false); // required for certain browsers
			header("Content-Type: $ctype");
			$file_name =  basename($path);
			header("Content-Disposition: attachment; filename=\"".$file_name."\";" );
			header("Content-Transfer-Encoding: binary");
			header("Content-Length: ".$fsize);
			ob_clean();
			flush();
			readfile( $path );
		}else{
			die('File Not Found');
		}
	}
	
	/* function to enable main menu */
	/*function set_menu_active($page){ 
		$file_name = explode('?', basename($_SERVER['REQUEST_URI']));
		if($file_name[0] == $page.'.php'){	
			return 'active';
		}else{
			// return '';
		}
	}*/

	/* parse the status of the request */
	public function format_status($st,$st_created,$st_user, $st_modified){
		$exp_status = explode(',', $st);
		$exp_created = explode(',', $st_created);
		$exp_modified = explode(',', $st_modified);
		$exp_user = explode(',', $st_user);
		$time1 = strtotime($exp_created[0]); 
		$time2 = strtotime($exp_created[1]);
		// reverse the array if value comes wrong in group concat
		if(!empty($time1) && !empty($time2)){
			if($time1 > $time2){ 
				$exp_status = array_reverse($exp_status);
				$exp_created = array_reverse($exp_created);
				$exp_user = array_reverse($exp_user);
				$exp_modified = array_reverse($exp_modified);
			
			}
		}
		foreach($exp_status as $key => $status){
			// if status is not empty
			if(!empty($status)){
				$st_color = ($status == 'A' ? 'label-success' : ($status == 'R' ? 'label-important' : ''));
				if(!empty($exp_created[$key])){$comma = ', ';}else{$comma = '';}
				$status = $status == 'W' ? 'P': $status;
				$show_detail = ($status == 'P' ? ' (Pending)' : ($status == 'A' ? " (".  $this->format_date($exp_modified[$key]) . ", Approved)<br> ": " ( ".  $this->format_date($exp_modified[$key]). ", Rejected)<br>"));
				$st_label .= "<span class='label $st_color' style='margin-left: 5px;' rel='tooltip' data-original-title = '".ucfirst($exp_user[$key]).$show_detail."'>L".++$key.' - '.$status."</span>";
			}
		}
		return $st_label;
	}

	function format_date($date){
		if(!empty($date) || $date!= '0000-00-00' || $date != '0000-00-00 00:00:00'){
			return date('d-M-Y h:i a',strtotime($date));
		}
	}
}

$fun = new fun();
?>
