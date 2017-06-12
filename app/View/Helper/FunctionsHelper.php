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
			$date =  split("[-: ]", $date);
			return date('d-M-Y',mktime($date[3],$date[4],$date[5],$date[1],$date[2],$date[0]));
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
	public function get_total_joined($join){
		$split_join = explode(',',$join);
		foreach($split_join as $detail){
			if($detail == 'Joined'){
				$count++;
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
	public function get_req_tab_count($data, $str, $type, $field){
		$split_str = explode('-', $str);
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
			case 'Planned':
			$color = '';
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
			case 'Cancelled':
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
}
?>