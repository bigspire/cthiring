<?php
/* 
   Purpose : View Billing.
	Created : Nikitasa
	Date : 03-02-2017
*/

// starting session
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
$module_access = $fun->check_role_access('35',$modules);
$smarty->assign('module',$module_access);

// get record id   
$id = $_GET['id'];

if(($fun->isnumeric($id)) || ($fun->is_empty($id)) || ($id == 0)){
  		header('Location:page_error.php');
}

// check valid approve billing user  
$query = "CALL check_valid_billing_users('".$id."','".$_SESSION['user_id']."')";
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
if($valid_user['total'] == '0'){
	header('Location:page_error.php');
}

// select and execute query and fetch the result
$query = "CALL view_billing_details('$id')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing view billing page');
	}
	// check record exists
	if($result->num_rows){
		// calling mysql fetch_result function
		while($obj = $mysql->display_result($result)){
			$smarty->assign('candidate_name', $obj['candidate_name']);
			$smarty->assign('position', $obj['position']);
			$smarty->assign('client_name', $obj['client_name']);
			$smarty->assign('ctc_offer', $obj['ctc_offer']);
			$smarty->assign('billing_amount', $obj['billing_amount']);
			$smarty->assign('billing_date' , $fun->convert_date_to_display($obj['billing_date']));
			$smarty->assign('joined_date' , $fun->convert_date_to_display($obj['joined_date']));
			$data[] = $obj;
		}
	}else{
		header('Location:page_error.php');
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
$smarty->assign('page_title' , 'View Billing - CT Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('billings_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('view_billing'));
 
// display smarty file
$smarty->display('view_billing.tpl');
?>