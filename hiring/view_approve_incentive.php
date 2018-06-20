<?php
/* 
   Purpose : View approve incentive.
	Created : Nikitasa
	Date : 31-05-2018
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

// get record id   
$inc_id = $_GET['id'];
$_SESSION['status_id'] = $_GET['status_id'];
$_SESSION['emp_id'] = $_GET['emp_id'];
$_SESSION['inc_id'] = $inc_id;

if(($fun->isnumeric($inc_id)) || ($fun->is_empty($inc_id)) || ($inc_id == 0)){
  	header('Location: ../?access=invalid');
}

// check valid approve billing user  
$query = "CALL check_valid_approve_inc_user('".$inc_id."','".$_SESSION['user_id']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in fetching valid approve user');
	}
	// calling mysql fetch_result function
	$valid_user = $mysql->display_result($result);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// redirecting to error page if users dont have permission to see view page
if(empty($valid_user)){
	header('Location: ../?access=invalid');
}

// fetch approve status 
$query = "CALL get_inc_approval_status_byid('".$_SESSION['user_id']."','".$inc_id."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing incentive approve status');
	}
	// calling mysql fetch_result function
	$appove_status = $mysql->display_result($result);
	// assign approve billing count variables here
	$smarty->assign('approve_status', $appove_status['status']);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// fetch approve status 
$query = "CALL get_incentive_status('".$inc_id."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing incentive status');
	}
	// calling mysql fetch_result function
	$incentive_status = $mysql->display_result($result);
	$smarty->assign('incentive_status', $incentive_status['is_approve']);
	$smarty->assign('incentive_created_by', $incentive_status['created_by']);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

$query = "call get_employee_by_id('".$_GET['emp_id']."')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing get user name');
	}
	$row = $mysql->display_result($result);
	$smarty->assign('employee_name', $row['first_name'].' '.$row['last_name']);
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// select and execute query and fetch the result
$query = "CALL view_incentive_details('".$inc_id."','".$_GET['emp_id']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing view billing page');
	}
	$row = $mysql->display_result($result);
	$_SESSION['incentive_data'] = $row;
	$smarty->assign('incentive_data',$row);
	$smarty->assign('row',$row);
	$created_date = $fun->convert_date_to_display($row['created_date']);
	$smarty->assign('created_date' , $created_date);
	$modified_date = $fun->convert_date_to_display($row['modified_date']);
	$smarty->assign('modified_date' , $modified_date);
	$incentive_type = $fun->check_incentive_type($row['incentive_type']);
	$smarty->assign('incentive_type' , $incentive_type);
	//$period = date('M, Y', strtotime($row['period']));
	//$smarty->assign('period' ,$period);
	
	if($row['incentive_type'] == 'I'){
		$period = date('M, Y', strtotime($row['period']));
	}else{
		$explode_year = explode('-', $row['period']); 
		$display = $explode_year[1] == '10' ? 'Oct - Mar,  '.date('Y', strtotime($row['period'])) : 'Apr - Sep, '.date('Y', strtotime($row['period']));
		$period = $display;
	}
	
	$smarty->assign('period' ,$period);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

if($row['incentive_type'] == 'I'){
	$period1 = date('Y-m',strtotime($row['period']));
}else if($row['incentive_type'] == 'J'){
	$period = explode("-",$fun->convert_period(date('m',$row['period'])));
	$period1 = date('Y',strtotime($row['period'])).'-'.$period[0];
	$period2 = (date('Y',strtotime($row['period']))  + 1).'-'.$period[1];
}


if(!empty($row)){
	// select and execute query and fetch the result
	$query = "CALL view_approved_billing_details('".$emp_id."','".$row['incentive_type']."','".$period1."','".$period2."')";
	try{
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing view billing details');
		}
		// check record exists
		$i = '0';
		// calling mysql fetch_result function
		while($obj = $mysql->display_result($result)){
			$data[] = $obj;
			$data[$i]['int_date'] = $fun->convert_date_to_display($obj['int_date']);
			$data[$i]['billing_date'] = $fun->convert_date_to_display($obj['billing_date']);
			$data[$i]['user_type'] = $obj['user_type'] == 'R' ? 'Recruiter' : 'CRM';
			$i++;
		}
		// free the memory
		$mysql->clear_result($result);
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}else{
	header('Location: ../?access=invalid');
}

// get current date 
$current_date = $fun->display_date();
// call to export the excel data
if($_GET['action'] == 'export'){ 
	include('classes/class.excel.php');
	$excelObj = new libExcel();
	if($row['incentive_type'] == 'I'){
		// function to print the excel header
		$excelObj->printHeader($header = array('Position','Client','Candidate Name','Interview Level','Interview Date','Interview Status') ,$col = array('A','B','C','D','E','F'), 'view_incentive1');  
		// function to print the excel data
		$excelObj->printCell($data, $i,$col = array('A','B','C','D','E','F'), $field = array('position','client_name','candidate_name','stage_title','int_date','status_title'),'Incentive_'.$current_date, 'view_incentive1',$row,$incentive_type,$period,$created_date,$modified_date);
	}else if($row['incentive_type'] == 'J'){
		// function to print the excel header
		$excelObj->printHeader($header = array('Position','Client','Candidate Name','Position CTC','Billing Amount','Offer CTC','Billing Date','Account Type','Individual Contribution (In Rs.)') ,$col = array('A','B','C','D','E','F','G','H','I'), 'view_incentive2');  
		// function to print the excel data
		$excelObj->printCell($data, $i,$col = array('A','B','C','D','E','F','G','H','I'), $field = array('position','client_name','candidate_name','ctc','billing_amount','ctc_offer','billing_date','user_type','amount'),'Incentive_'.$current_date, 'view_incentive2',$row,$incentive_type,$period,$created_date,$modified_date);
	}
}


// here assign smarty variables
$smarty->assign('id' , $_GET['id']); 
$smarty->assign('data', $data);

// assign page title
$smarty->assign('page_title' , 'View Approve Incentive - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('billings_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('view_billing'));
 
// display smarty file
$smarty->display('view_approve_incentive.tpl');
?>