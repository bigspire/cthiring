<?php 
$leave[0]['st_status'] = 'W,A';
$leave[0]['st_created'] = '2017-02-09 12:21:12,2017-02-05 12:21:43';
$leave[0]['st_user'] = 'Ravi,Niki';
$leave[0]['st_modified'] = '2017-02-09 12:21:12,2017-02-05 12:21:43';

echo format_status($leave[0]['st_status'],$leave[0]['st_created'],$leave[0]['st_user'],$leave[0]['st_modified']);

/* parse the status of the request */
function format_status($st,$st_created,$st_user, $st_modified){
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
			$st_color = ($status == 'A' ? 'label-satgreen' : ($status == 'R' ? 'label-lightred' : ''));
			if(!empty($exp_created[$key])){$comma = ', ';}else{$comma = '';}
			$status = $status == 'W' ? 'P': $status;
			$show_detail = ($status == 'P' ? ' (Pending)' : ($status == 'A' ? " (Approved)<br> ". format_date($exp_modified[$key]) : " (Rejected)<br> ". format_date($exp_modified[$key])));
			$st_label .= "<span class='label $st_color'><a href='#' rel='tooltip' data-original-title = '".$exp_user[$key].$comma.$show_detail."'>L".++$key.' - '.$status.'</a></span>';
		}
	}
	return $st_label;
}


function format_date($date){
	if(!empty($date) && $date!= '0000-00-00' && $date != '0000-00-00 00:00:00'){
		$date =  split("[-: ]", $date);
		return date('d-M-Y',mktime($date[3],$date[4],$date[5],$date[1],$date[2],$date[0]));
	}
}
?>

<br><br>
-----------------------------------------------------------------------------------------------
<br><br>

<span class='label label-satgreen'>
<a href='#' rel='tooltip' data-original-title = 'Niki,  (Approved)<br> 05-Feb-2017'>L1 - A</a>
</span>
<span class='label'>
<a href='#' rel='tooltip' data-original-title = 'Ravi,  (Pending)'>L2 - P</a>
</span>



											