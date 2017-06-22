<?php
/* 
   Purpose : To edit profile.
	Created : Nikitasa
	Date : 22-06-2017
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

// select and execute query and fetch the result
$query = "CALL view_profile('".$_SESSION['user_id']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing view profile page');
	}
	$row = $mysql->display_result($result);
	$smarty->assign('profile_data',$row);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// calling mysql close db connection function
$c_c = $mysql->close_connection();

// here assign smarty variables
$smarty->assign('data', $data);
 
// display smarty file
$smarty->display('view_profile.tpl');
?>