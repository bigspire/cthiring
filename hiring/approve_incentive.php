<?php
/* 
   Purpose : To list and search approve incentive.
	Created : Nikitasa
	Date : 28-05-2017
*/

session_start();
//include smarty congig file
include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');
// include paging class 
include('classes/class.paging.php');
// add menu count
include('menu_count.php');

// role based validation
$module_access = $fun->check_role_access('15',$modules);
$smarty->assign('module',$module_access);

$f_date = $_POST['f_date'] ? $_POST['f_date'] : $_GET['f_date'];
$f_date = $_POST['f_date'] ? $_POST['f_date'] : $_GET['f_date'];  
$t_date = $_POST['t_date'] ? $_POST['t_date'] : $_GET['t_date']; 
$from_date = $fun->convert_date($f_date);
$to_date = $fun->convert_date($t_date);
$employee = $_POST['employee'] ? $_POST['employee'] : $_GET['employee'];
$type = $_POST['type'] ? $_POST['type'] : $_GET['type']; 

//post url for paging
if($_POST){
	$post_url .= '&f_date='.$f_date;
	$post_url .= '&t_date='.$t_date;
	$post_url .= '&employee='.$employee;
	$post_url .= '&type='.$type;
}

// for director and BH and admin
if($_SESSION['roles_id'] == '33' || $_SESSION['roles_id'] == '39' || $_SESSION['roles_id'] == '35' || $_SESSION['roles_id'] == '26'){
	$show = 'all';
	$team_cond = false;
}else{
	$team_cond = true;
}
// call the next result
$mysql->next_query();
$id = $_SESSION['user_id'];
// get the team members
if($show != 'all'){
	$qryCond = "(a.level1 = '$id' or a.level2 = '$id') and ";
}		
$sql = "select u.id, u.first_name, u.last_name from users u left join	approval a  on (a.users_id = u.id) where
		$qryCond u.is_deleted = 'N' and u.status = '0' group by u.id order by u.first_name asc";		
$result = $mysql->execute_query($sql);		
while($row = $mysql->display_result($result)){
	$emp_name[$row['id']] = ucwords($row['first_name'].' '.$row['last_name']);
	// concatenate the list of team members
	$id_str .=  $row['id'].', ';
}

/*	
// if not director or BH 
if(!empty($emp_name)){
	$smarty->assign('approveUser', '1');	
	if($team_cond){
		$cond .= ' or inc.users_id in('.substr($id_str, 0, strlen($id_str)-2).')';				
	}
	$smarty->assign('emp_name',$emp_name);
}
*/		

// if branch admmin
if($_SESSION['roles_id'] == '26'){
	$loc = $_SESSION['location_id'];
	$sql = "select u.id from users where u.is_deleted = 'N' and u.status = '0' and u.location_id = '$loc'  group by u.id order by u.first_name asc";		
	$result = $mysql->execute_query($sql);		
	while($row = $mysql->display_result($result)){
		$emp_name[$row['id']] = ucwords($row['first_name'].' '.$row['last_name']);
		// concatenate the list of team members
		$id_str .=  $row['id'].', ';
	}
	$smarty->assign('approveUser', '1');	
	$cond .= 'and ( inc.users_id in('.substr($id_str, 0, strlen($id_str)-2).') )';
	$smarty->assign('emp_name',$emp_name);
}
		
// count the total no. of records
$query = "CALL list_approve_incentive('".$employee."','".$_SESSION['user_id']."','".$type."','".$_SESSION['roles_id']."','".$from_date."','".$to_date."','0','0','','','".$_GET['action']."','".$cond."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing count incentive page');
	}

	// fetch result
	$data_num = $mysql->display_result($result);

	// count result
	$count = $data_num['total'];
	if($count == 0){
		$alert_msg = 'This details are not in our database';
	}
	$page = $_GET['page'] ?  $_GET['page'] : 1;
	$limit = 50;

   include('paging_call.php');	
	// free the memory
	$mysql->clear_result($result);
	// execute next query
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// set the condition to check ascending or descending order		
$order = ($_GET['order'] == 'desc') ? 'asc' :  'desc';	
$sort_fields = array('1' => 'employee','period','eligible_incentive_amt','incentive_type','created_date','target_amt','achieve_amt','candidate_billed','interview_candidate','modified','productivity','ytd');
$org_fields = array('1' => 'employee','period','eligible_incentive_amt','incentive_type','created_date','incentive_target_amt','achievement_amt','candidate_billed','interview_candidate','modified_date','productivity','productivity');

// to set the sorting image
foreach($sort_fields as $key => $b_field){
	if($b_field != $_GET['field']){ 
		$smarty->assign('sort_field_'.$b_field,'sorting');
	}else{	
		$order_img = ($_GET['order'] == 'asc') ? 'sorting desc' :  'sorting asc';
		$smarty->assign('sort_field_'.$b_field,$order_img);
	}			
}
// if no fields are set, set default sort image
if(empty($_GET['field'])){		
	$order = 'desc';			
	$field = 'inc.modified_date';			
	$smarty->assign('sort_field_modified', 'sorting desc');
}	
$smarty->assign('order', $order);
// set the original field for the sql query
if($search_key = array_search($_GET['field'], $sort_fields)){
	$field =  $org_fields[$search_key];
}

// fetch all records
$query =  "CALL list_approve_incentive('".$employee."','".$_SESSION['user_id']."','".$type."','".$_SESSION['roles_id']."','".$from_date."','".$to_date."','$start','$limit','".$field."','".$order."','".$_GET['action']."','".$cond."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing list incentive page');
	}
	// calling mysql fetch_result function
	$i = '0';
	while($obj = $mysql->display_result($result))
	{
 		$data[] = $obj;
 		// $data[$i]['period'] = $fun->display_quater($fun->convert_quater_month($obj['period'])).', '.$fun->convert_quater_year($obj['period']);
 		$data[$i]['period'] = '01'.'-'.$fun->convert_quater_month($obj['period']).'-'.$fun->convert_quater_year($obj['period']);
		$data[$i]['created_date'] = $fun->convert_date_to_display($obj['created_date']);
		$data[$i]['modified_date'] = $fun->convert_date_to_display($obj['modified_date']);
 		$data[$i]['pending'] = $fun->time_diff($obj['created_date'], $ago_str=0, 0);
		$data[$i]['pending_status'] = $fun->billing_status($obj['st_status']);
		$data[$i]['status'] = $fun->format_status($obj['st_status'],$obj['st_created'],$obj['st_user'],$obj['st_modified']);
		$data[$i]['incentive_type'] = $obj['incentive_type'] == 'I' ? 'PS & I' : 'PC'; //$fun->check_incentive_type($obj['incentive_type']);
		$data[$i]['incent_type'] = $obj['incentive_type'];
		if($data[$i]['incent_type'] == 'J' && $data[$i]['incent_type'] != 'I'){
			$data[$i]['productivity'] = 'N/A';
			$data[$i]['interview_candidate'] = 'N/A';
		}else{
			$data[$i]['productivity'] = $obj['productivity'].'%';
			$data[$i]['interview_candidate'] = $obj['interview_candidate'];
		}
		if($data[$i]['incent_type'] != 'J' && $data[$i]['incent_type'] == 'I'){
			$data[$i]['incentive_target_amt'] = 'N/A';
			$data[$i]['achievement_amt'] = 'N/A';
			$data[$i]['candidate_billed'] = 'N/A';
		}else{
			$data[$i]['incentive_target_amt'] = '₹'.$obj['incentive_target_amt'];
			$data[$i]['achievement_amt'] = '₹'.$obj['achievement_amt'];
			$data[$i]['candidate_billed'] = intval($obj['candidate_billed']);
		}
		// $data[$i]['incent_period_display'] = date('M, Y', strtotime($obj['period']));
		
		// for incentive display		
		if($obj['incentive_type'] == 'I'){
			$data[$i]['incent_period_display'] = date('M, Y', strtotime($obj['period']));
		}else{
			$explode_year = explode('-', $obj['period']); 
			$display = $explode_year[1] == '10' ? 'Oct - Mar, '.date('Y', strtotime($obj['period'])) : 'Apr - Sep, '.date('Y', strtotime($obj['period']));
			$data[$i]['incent_period_display'] = $display;
		}
				
		// $data[$i]['inc_type'] = $obj['incentive_type'];
 		$i++;
 		$pno[]=$paging->print_no();
 		$smarty->assign('pno',$pno);
	}
	
	// get current date 
	$current_date = $fun->display_date();
	// call to export the excel data
	if($_GET['action'] == 'export'){ 
		include('classes/class.excel.php');
		$excelObj = new libExcel();
		
		$excelObj->printHeader($header = array('Employee','Type','Period','Productivity %','No. of Candidates Interviewed','Min. Performance Target (In Rs.)',
		'Actual Individual Contribution (In Rs.)','No. of Candidates Billed','Incentive Amt. (In Rs.)','Individual Contribution - YTD (In Rs.)',
		'Created','Status','Pending') ,$col = array('A','B','C','D','E','F','G','H','I','J','K','L','M'));  
		// function to print the excel data
		$excelObj->printCell($data, $count,$col = array('A','B','C','D','E','F','G','H','I','J','K','L','M'), $field = array('employee','incentive_type',
		'incent_period_display','productivity','interview_candidate','incentive_target_amt','achievement_amt',
		'candidate_billed','eligible_incentive_amt','','created_date','pending_status','pending'),'Approve Incentive_'.$current_date);
	
	}
	
	// check the status of the billing for approval
	if(!empty($data)){
		foreach($data as $record){ 
			$mysql->next_query();
			$show_st = $mysql->auth_incentive_action($record['id'], $record['status_id']);
			$status_id[] = $show_st;				
		}
	}
	$smarty->assign('show_status', $status_id);
	
	// approve or reject validation
	if($_GET['status'] == 'created'){
 		$success_msg = 'Incentive  ' . ucfirst($_GET['status']) . ' Successfully';
	}else if($_GET['status'] == 'updated'){
		$success_msg = 'Incentive  ' . ucfirst($_GET['status']) . ' Successfully';
	}

	// validating pagination
	$total_pages = ceil($count / $limit);

	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
/*
// query to fetch all employee names. 
$query = 'CALL get_employee()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting employee details');
	}
	while($row = $mysql->display_result($result))
	{
 		$emp_name[$row['id']] = ucwords($row['emp_name']);
	}
	$smarty->assign('emp_name',$emp_name);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
} */

// smarty drop down array for current status
$smarty->assign('status_type', array('' => 'Select', '1' => 'Scheduled', '2' => 'Re-Scheduled',
					'3' => 'OnHold', '4' => 'Qualified', '5' => 'Cancelled', '6' => 'Rejected'));
// smarty drop down array for incentive type
$smarty->assign('inc_type', array('' => 'Select', 'I' => 'Profile Short-listing & Interviewing', 'J' => 'Position Closure'));
// calling mysql close db connection function
$c_c = $mysql->close_connection();
$paging->posturl($post_url);

// assign smarty variables here
$smarty->assign('page_links',$paging->print_link_frontend());

$smarty->assign('data', $data);
$smarty->assign('page' , $page); 
$smarty->assign('total_pages' , $total_pages); 	
$smarty->assign('keyword' , $keyword); 	
$smarty->assign('f_date', $f_date);
$smarty->assign('t_date', $t_date);
$smarty->assign('type', $type);
$smarty->assign('roles_id', $_SESSION['roles_id']);
$smarty->assign('employee' , $employee); 
$smarty->assign('branch' , $branch); 
$smarty->assign('current_status' , $current_status); 
$smarty->assign('ALERT_MSG', $alert_msg);
$smarty->assign('SUCCESS_MSG', $success_msg);
// assign page title
$smarty->assign('page_title' , 'Approve Incentive - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('billings_active','active');
 
// display smarty file
$smarty->display('approve_incentive.tpl');
?>