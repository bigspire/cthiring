<?php
class FunctionsHelper extends AppHelper {
	
	public $helpers = array('Session');
	
    public function __construct(View $view, $settings = array()) {
        parent::__construct($view, $settings);
        debug($settings);
    }
	
	/* function used to format the date */
	public function format_date($date){ 
		if(!empty($date) && $date!= '0000-00-00' && $date!= '0000-00-00 00:00:00'){
			return date('d-M-Y',strtotime($date));
		}
	}
	
	/* string truncate*/
	function string_truncate($message,$length){ 	
		$message = strip_tags($message);
		$dots = '..';
	    $len = strlen($message);
		if($len > $length){	
			$position =  strpos($message,' ',$length);	
			if($position){
				return $message = substr($message,0,$position).$dots;		
			}else{
				return $message = substr($message,0,$length).$dots;
			}				
		}
		else{
			return $message;		
		}			
	}
	
	/* function to get total joined */
	public function get_total_joined($join,$req_res_id){
		$split_join = explode(',',$join);
		$split_res = explode(',',$req_res_id);
		foreach($split_join as $key => $detail){
			// remove the duplicates
			if($detail == 'Joined' && !in_array($split_res[$key], $exist)){
				$count++;
				$exist[] = $split_res[$key];
			}
		}
		return $count;
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
	
	/* function to format the string */
	public function format_string($str){
		$format_str = str_replace(' ','',$str);
		// for interviews
		if($format_str == 'FirstInterview' || $format_str == 'SecondInterview' || $format_str == 'FinalInterview'){
			$format_str = 'Interview';
		}
		return $format_str;
	}
	
	/* function to format the string */
	public function get_int_status($stage, $status){
		$format_str = str_replace(' ','',$stage);
		// for interviews
		if(($format_str == 'FirstInterview' || $format_str == 'SecondInterview' || $format_str == 'FinalInterview')
		&& ($status == 'NoShow')){
			return 'InterviewDrop';
		}else if(($format_str == 'FirstInterview' || $format_str == 'SecondInterview' || $format_str == 'FinalInterview')
		&& ($status == 'NotInterested' || $status == 'Rejected')){
			return 'InterviewReject';
		}
		
	}
	
	/* function to format the string */
	public function get_offer_reject($stage, $status){
		// for interviews
		if($stage == 'Offer' && $status == 'Rejected'){
			return 'OfferReject';
		}
		
	}
	
	/* function to get the req. tab counts */
	public function get_req_tab_count_new($data, $str, $field){
		$split_str2 = explode('|', $str);
		foreach($data as $record){			
			if($field == 'cv_sent'){
				if($record['ReqResume']['stage_title'] != $split_str2[0] && $record['ReqResume']['stage_title'] != $split_str2[1]){
					$count++;
					}
				}			
		}
		return $count;
	}
	
	
	
	
	/* function to get the req. tab counts */
	public function get_req_tab_count($data, $str, $type, $field){
		$split_str = explode('-', $str);
		$count = '';
		foreach($data as $record){
			if($field == 'interview_not_att'){
				if(($record['ReqResumeStatus']['stage_title'] == $split_str[0] || $record['ReqResumeStatus']['stage_title'] == $split_str[1] || $record['ReqResumeStatus']['stage_title'] == $split_str[2]) && 
				($record['ReqResumeStatus']['status_title'] == 'No Show')){
					$count++;
				}
			}else if($field == 'interview_reject'){
				if(($record['ReqResumeStatus']['stage_title'] == $split_str[0] || $record['ReqResumeStatus']['stage_title'] == $split_str[1] || $record['ReqResumeStatus']['stage_title'] == $split_str[2]) && 
				($record['ReqResumeStatus']['status_title'] == 'Not Interested' || $record['ReqResumeStatus']['status_title'] == 'Rejected')){
					$count++;
				}
			}else if($field == 'offer_reject'){
				if(($record['ReqResumeStatus']['stage_title'] == 'Offer') &&($record['ReqResumeStatus']['status_title'] == 'Rejected')){
					$count++;
				}
			}else if($field == 'billing'){ 
				if($record['ReqResume']['bill_ctc'] != '' && $record['ReqResume']['bill_ctc'] > '0'){
					// avoid duplicates
					if(!in_array($record['Resume']['id'], $resume_id)){
						$count++;
					}
					$resume_id[] = $record['Resume']['id'];
				}
			}else if($field == 'shorlist_reject'){ 
				if($record['ReqResumeStatus']['stage_title'] == 'Shortlist' && $record['ReqResumeStatus']['status_title']  == 'Rejected'){
					$count++;
				}
			}else if($type == 'stage'){
				if($record['ReqResumeStatus']['stage_title'] == $split_str[0] || $record['ReqResumeStatus']['stage_title'] == $split_str[1] || $record['ReqResumeStatus']['stage_title'] == $split_str[2]){
					// avoid duplicates
					if(!in_array($record['Resume']['id'], $resume_id)){
						$count++;
					}
					$resume_id[] = $record['Resume']['id'];
				}
			}else if($type == 'status'){ 
				if($record['ReqResumeStatus']['status_title'] == 'CV-Sent' && $str == 'CV-Sent'){	
					$count++; 
				}if($record['ReqResumeStatus']['status_title'] == 'Shortlisted' && $str == 'Shortlisted'){				
					$count++;
				}else if($record['ReqResumeStatus']['status_title'] == $split_str[0]){ 				
					$count++;
				}
			}
		}
		return $count;
	}
	
	 /* match the fields in the auto complete search */
	function match_results($keyword, $value){
		//  matching the keyword with the result
		if(strncmp($keyword,strtolower(trim($value)),strlen($keyword)) == 0){
			return trim("$value\n");		
		}		
	}

	 /* function to show position status color */
	 public function get_req_status_color($st){
		switch($st){
			case 'Assigned':
			$color = 'default';
			break;
			case 'In-Process':
			$color = 'warning';
			break;
			case 'On-Hold':
			$color = 'info';
			break;
			case 'Closed':
			$color = 'success';
			break;
			case 'Terminated':
			$color = 'important';
			break;
			case 'Forecast':
			$color = 'info';
			break;
			case 'Being Evaluated':
			$color = 'info';
			break;
			case 'Confirmed':
			$color = 'info';
			break;
			case 'Confirmed – SLA Exempt':
			$color = 'info';
			break;		
			
		}
		return $color;
	 }
	 
	  /* function to show resume status color */
	 public function get_res_status_color($st){ 
		switch($st){
			case 'Pending':
			$color = 'default';
			break;
			case 'Rejected':
			$color = 'important';
			break;
			case 'CV-Sent':
			$color = 'info';
			break;
			case 'Shortlisted':
			$color = 'success';
			break;
			case 'YRF':
			$color = 'warning';
			break;
		}
		return $color;
	}
	
	/* function to show interview status color */
	 public function get_int_status_color($st){
		switch($st){
			case 'Pending':
			$color = 'default';
			break;
			case 'Scheduled':
			$color = 'warning';
			break;
			case 'Re-Scheduled':
			$color = 'warning';
			break;
			case 'Selected':
			$color = 'success';
			break;
			case 'Rejected':
			$color = 'important';
			break;
			case 'YRF':
			$color = 'warning';
			break;
			case 'Cancelled':
			$color = 'info';
			break;
			case 'No Show':
			$color = 'info';
			break;
			case 'OnHold':
			$color = 'warning';
			break;		
			
		}
		return $color;
	 }
	 
	 /* function to show offer status color */
	 public function get_offer_status_color($st){
		switch($st){					
			case 'Offer Made':
			$color = 'warning';
			break;
			case 'Offer Accepted':
			$color = 'success';
			break;
			case 'Not Interested':
			$color = 'important';
			break;
			case 'Quit':
			$color = 'important';
			break;
			case 'Offer Pending':
			$color = 'default';
			break;
			case 'Rejected':
			$color = 'important';
			break;
			case 'Yet to Join':
			$color = 'warning';
			break;		
			
		}
		return $color;
	 }

	 /* function to show resume status color */
	 public function get_join_status_color($st){ 
		switch($st){
			case 'Joined':
			$color = 'success';
			break;
			case 'Quit':
			$color = 'important';
			break;			
		}
		return $color;
	}
		
	 /* function to get chart height */
	 public function get_chart_height($days){ 
		$cal = $days * 52;	
		return $cal.'px';
	 }
	 
	 /* function to get url variables */
	public function get_url_vars($vars){ 
		foreach($vars as $key => $value){
			$str .= $key.'='.$value.'&';
		}
		return $str;
	}
	
	/* function to get ordinal no. */
	function get_ordinal($num) {
		if (!in_array(($num % 100),array(11,12,13))){
		  switch ($num % 10) {
			// Handle 1st, 2nd, 3rd
			case 1:  return 'st';
			case 2:  return 'nd';
			case 3:  return 'rd';
		  }
		}
		return 'th';
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
   
   /* function to show the status in crisp */ 
   public function  get_status_crisp($stage, $status){
		$short_stage = explode(' ', $stage);
		if($stage == 'Validation - Account Holder' && $status == 'Pending'){
			$new_status = 'AH Pending';
		}else if($stage == 'Validation - Account Holder' && $status == 'Rejected'){
			$new_status = 'AH Rejected';
		}else if($stage == 'Validation - Account Holder' && $status == 'Validated'){
			$new_status = 'AH Validated';
		}else if($stage == 'Shortlist' && $status == 'Shortlisted'){
			$new_status = 'CV Shortlisted';
		}else if($stage == 'Shortlist' && $status == 'CV-Sent'){
			$new_status = 'CV Sent';
		}else if($stage == 'Shortlist' && $status == 'Rejected'){
			$new_status = 'CV Rejected';
		}else if($stage == 'Shortlist' && $status == 'OnHold'){
			$new_status = 'CV On Hold';
		}else if($short_stage[1] == 'Interview'){
			$new_status =  'Interview '.$status;
		}else if($short_stage[0] == 'Offer'){
			$new_status =  'Offer '.$status;
		}else if($stage == 'Joining' && $status == 'Joined'){
			$new_status = 'Joined';
		}else if($stage == 'Joining' && $status == 'Not Joined'){
			$new_status = 'Not Joined';
		}else{
			$new_status =  $stage.' - '.$status;
		}
		return $new_status;
   }
   
   /* function to check gender */
   public function check_gender($gen){
		if($gen == '1'){
			$txt = 'Male';
		}else if($gen == '2'){
			$txt = 'Female';
		}
		return $txt;
   }
   
    /* function to check gender */
   public function check_marital($st){
		if($st == '1'){
			$txt = 'Single';
		}else if($st == '2'){
			$txt = 'Married';
		}else if($st == '3'){
			$txt = 'Separated';
		}
		return $txt;
   }
   
   /* function to read the resume */	
	function read_document($filename){
		$file_extension = substr($filename, strlen($filename)-4, 4);
		if($file_extension == 'docx'){
			$doc = $this->read_file_docx($filename);
		}else{
			$doc = $this->read_file_doc($filename);
		}
		$match = array("'",'"',"’","‘",'“','”','–','–','-');
		$replace = array("'",'"',"'","'",'"','"','-','-','');
		$doc = str_replace($match, $replace , $doc);
		$doc = htmlentities($doc);
		return $doc;
	}
	

	
	/* function to read the docx file */
	function read_file_docx($filename){	
		$striped_content = '';
		$content = '';
		if(!$filename || !file_exists($filename)){ return false;}
		$zip = zip_open($filename);
		if (!$zip || is_numeric($zip)) return false;
		while ($zip_entry = zip_read($zip)) {
			if (zip_entry_open($zip, $zip_entry) == FALSE) continue;
			if (zip_entry_name($zip_entry) != "word/document.xml") continue;
			$content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
			zip_entry_close($zip_entry);
		}// end while
		
		zip_close($zip);
		$content = str_replace('</w:r></w:p></w:tc><w:tc>', "  ", $content);
		$content = str_replace('</w:r></w:p>', "\r\n", $content);
		$content = str_replace('</w:p>', "\r\n\n", $content);		
		$content = str_replace(array('.com', '.in'), array(".com \r\n", ".in \r\n"), $content);
		$content = str_replace(array(':'), ": ", $content);
		$striped_content = strip_tags($content);
		return $striped_content;
	}
		
	/* function to read the doc file */
	function read_file_doc($filename){	
		// ini_set('memory_limit', '-1');
		if(file_exists($filename)){
			if(($fh = fopen($filename, 'r')) !== false){
				$headers = fread($fh, 0xA00);
				// 1 = (ord(n)*1) ; Document has from 0 to 255 characters
				$n1 = ( ord($headers[0x21C]) - 1 );
				// 1 = ((ord(n)-8)*256) ; Document has from 256 to 63743 characters
				$n2 = ( ( ord($headers[0x21D]) - 8 ) * 256 );
				// 1 = ((ord(n)*256)*256) ; Document has from 63744 to 16775423 characters
				$n3 = ( ( ord($headers[0x21E]) * 256 ) * 256 );				// 1 = (((ord(n)*256)*256)*256) ; Document has from 16775424 to 4294965504 characters
				$n4 = ( ( ( ord($headers[0x21F]) * 256 ) * 256 ) * 256 );
				// Total length of text in the document
				$textLength = ($n1 + $n2 + $n3 + $n4);
				if($textLength <= 0)
				  return '';
				$extracted_plaintext = fread($fh, filesize($filename));
				
				// simple print character stream without new lines
				//echo $extracted_plaintext;
				// if you want to see your paragraphs in a new line, do this
				return  $extracted_plaintext;
				// need more spacing after each paragraph use another nl2br
			}
		}
	}
	
	 /* function to find the min and max exp */
   public function check_exp($value){ 		
		if($value == '0'){
			$str =  'Fresher';
		}else if($value < 1 && $value != ''){			
			$str = preg_replace('/^0./', '', $value).' Month';
			$value = 2;
		}else if($value >= 1){
			$str = $value.' Year';
		}
		
		if($value > 1){
			$suffix = 's';
		}
		
		return $str.$suffix;
   }
   
   /* function to get ctc type */
   public function get_ctc_type($type){
		switch($type){
			case 'T':
			$value = 'Thousands';
			break;
			case 'L':
			$value = 'Lacs';
			break;
			case 'C':
			$value = 'Crore';
			break;
			
		}
		return $value;
   }
   
    /* function to get ctc type */
   public function get_notice($val){
		switch($val){
			case '0':
			$value = 'Immediate';
			break;
			case '15':
			$value = '15 Days';
			break;
			case '30':
			$value = '30 Days';
			break;
			case '40':
			$value = '45 Days';
			break;
			case '60':
			$value = '2 Months';
			break;
			case '90':
			$value = '3 Months';
			break;
			case '120':
			$value = '4 Months';
			break;
			case '150':
			$value = '5 Months';
			break;
			case '180':
			$value = '6 Months';
			break;
			
		}
		return $value;
   }
   
   /* function to get course type */
   public function get_course_type($type){
		switch($type){
			case 'R':
			$value = 'Regular';
			break;
			case 'C':
			$value = 'Correspondence';
			break;			
		}
		return $value;
   }
   
    /* function to get interview level same */
   public function get_int_level_same($level){		
		switch($level){			
			case 'First':
			$value = '1';
			break;
			case 'Second':
			$value = '2';
			break;	
			case 'Final':
			$value = '3';
			break;			
		}
		return $value;
   }
   
   
   /* function to get interview level */
   public function get_int_level($level){
		if($level == ''){
			return '1';
		}
		switch($level){			
			case 'First':
			$value = '2';
			break;
			case 'Second':
			$value = '3';
			break;	
			case 'Final':
			$value = '3';
			break;				
		}
		return $value;
   }
   
    /* function to get interview level order */
   public function get_int_level_order($level){
		if($level == ''){
			return 'First';
		}
		switch($level){			
			case 'First':
			$value = 'Second';
			break;
			case 'Second':
			$value = 'Final';
			break;							
		}
		return $value;
   }
     
  
    /* function to get interview level text */
   public function get_level_text($level){
		switch($level){
			case '1':
			$value = 'First Interview';
			break;
			case '2':
			$value = 'Second Interview';
			break;	
			case '3':
			$value = 'Final Interview';
			break;				
		}
		return $value;
   }
   
    /* function to get interview duration */
   public function get_int_duration($time){
		switch($time){
			case '00:30:00':
			$value = '30 Mins.';
			break;
			case '00:45:00':
			$value = '45 Mins.';
			break;	
			case '01:00:00':
			$value = '1 Hr';
			break;	
			case '02:00:00':
			$value = '2 Hrs';
			break;	
			case '03:00:00':
			$value = '3 Hrs';
			break;			
		}
		return $value;
   }
   
	/* function to show the title in dash */
	public function show_view_detail($cur_view,$ac_dash,$rec_dash,$bd_dash){ 
		switch($cur_view){
			case 'bd_view':
			$title = ($bd_dash == 'active') ? 'You are in BD Dashboard' : 'Click to BD Dashboard';
			break;
			case 'ac_view':
			$title = ($ac_dash == 'active') ? 'You are in AH Dashboard' : 'Click to AH Dashboard';
			break;
			case 'rec_view':
			$title = ($rec_dash == 'active') ? 'You are in Recruiter Dashboard' : 'Click to Recruiter Dashboard';
			break;			
		}
		return $title;
	}
}
?>