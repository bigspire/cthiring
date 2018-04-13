<?php
/* 
   Purpose : View Interview.
	Created : Nikitasa
	Date : 17-02-2017
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
$module_access = $fun->check_role_access('7',$modules);
$smarty->assign('module',$module_access);


// select and execute query and fetch the result
$query = "CALL view_resume_exists('".$_GET['email']."','".$_GET['mobile']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing view resume exists');
	}
	
	while($row[] = $mysql->display_result($result)){
		
	}
	
	$smarty->assign('resume_data',$row);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// when the form submitted to ignore
if(!empty($_POST['submit'])){
	$smarty->assign('form_sent', '1');
	$_SESSION['IGNORE_CV'] = 1;
}

// calling mysql close db connection function
$c_c = $mysql->close_connection();


// display smarty file
$smarty->display('resume_exist.tpl');
?>