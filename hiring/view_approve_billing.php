<?php
/* 
   Purpose : View approve billing.
	Created : Nikitasa
	Date : 07-02-2017
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
$module_access = $fun->check_role_access('37',$modules);
$smarty->assign('module',$module_access);

// get record id   
$id = $_GET['id'];
$_SESSION['status_id'] = $_GET['status_id'];
$_SESSION['emp_id'] = $_GET['emp_id'];
$_SESSION['billing_id'] = $_GET['id'];

if(($fun->isnumeric($id)) || ($fun->is_empty($id)) || ($id == 0)){
  	header('Location: ../?access=invalid');
}

// check valid approve billing user  
$query = "CALL check_valid_approve_users('".$_SESSION['user_id']."','".$_SESSION['emp_id']."')";
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
if(($valid_user['level1'] != $_SESSION['user_id']) and ($valid_user['level2'] != $_SESSION['user_id'])){
	header('Location: ../?access=invalid');
}

// fetch approve status 
$query = "CALL get_approval_status_by_id('".$_SESSION['user_id']."','".$id."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing approve status');
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
$query = "CALL view_billing_details('$id')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing view approve billing page');
	}
	// check record exists
	if($result->num_rows){
		// calling mysql fetch_result function
		while($obj = $mysql->display_result($result)){
			$_SESSION['requirement_id'] = $obj['requirement_id'];
			$smarty->assign('candidate_name', $obj['candidate_name']);
			$smarty->assign('position', $obj['position']);
			$smarty->assign('recruiter', $obj['recruiter']);
			$smarty->assign('bill_percent', $obj['bill_percent']);
			$smarty->assign('client_name', $obj['client_name']);
			$smarty->assign('ctc_offer', $obj['ctc_offer']);
			$smarty->assign('billing_amount', $obj['billing_amount']);
			$smarty->assign('billing_date' , $fun->convert_date_to_display($obj['billing_date']));
			$smarty->assign('joined_date' , $fun->convert_date_to_display($obj['joined_date']));
			$data[] = $obj;
		}
	}else{
		header('Location: ../?access=invalid');
	}
	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// calling mysql close db connection function
$c_c = $mysql->close_connection();

// here assign smarty variables
$smarty->assign('id' , $_GET['id']); 
$smarty->assign('data', $data);

// assign page title
$smarty->assign('page_title' , 'View Approve Billing - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('billings_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('view_billing'));
 
// display smarty file
$smarty->display('view_approve_billing.tpl');
?>