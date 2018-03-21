<?php
/* 
Purpose : To view resume api.
Created : Nikitasa
Date : 22-01-2018
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
// add menu count
include('menu_count.php');

// role based validation
$module_access = $fun->check_role_access('51',$modules);
$smarty->assign('module',$module_access);

// select and execute query and fetch the result
$query = "CALL get_resume_api()";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing view api details');
	}
	$row = $mysql->display_result($result);
	$smarty->assign('created_date', $fun->convert_date_to_display($row['created_date']));
	$smarty->assign('api_data',$row);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// create,update,delete message validation
if($_GET['status'] == 'updated'){
	$success_msg = 'Resume API ' . $_GET['status'] . ' successfully';
	$smarty->assign('success_msg',$success_msg);
}else if($_GET['current_status'] == 'msg'){
	$alert_msg = 'This record is not available in our database';
	$smarty->assign('alert_msg',$alert_msg);
}
	
// calling mysql close db connection function
$c_c = $mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'View Reusme API - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('setting_active','active');
// display smarty file
$smarty->display('view_resume_api.tpl');
?>