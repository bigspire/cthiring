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
$module_access = $fun->check_role_access('',$modules, 'update_api_key');
$smarty->assign('module',$module_access);

// select and execute query and fetch the result
$query = "CALL get_resume_api()";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing view api details');
	}
	$row = $mysql->display_result($result);
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
}

	
// calling mysql close db connection function
$c_c = $mysql->close_connection();
 
// display smarty file
$smarty->display('view_resume_api.tpl');
?>