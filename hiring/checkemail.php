<?php 
/* 
Purpose : To get mail.
Created : Nikitasa
Date : 15-03-2018
*/

// starting session
session_start();

include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');

$email_id = $_GET['email'];

// query to check whether it is exist or not. 
$query = "CALL check_email_exist('0', "$email_id")";
// Calling the function that makes the insert
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing to check email exist');
	}
	$obj = $mysql->display_result($result);
	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

if($obj['total'] > 0){
	// query to check whether it is exist or not. 
	$query = "get_exist_email_candidate_details('0', "$email_id")";
	// Calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing to check email exist');
		}
		$email = array();
		while($obj = $mysql->display_result($result)){
			$email[$obj['id']] = $obj['candidate_name'];  	   
		}
		// free the memory
		$mysql->clear_result($result);
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	echo json_encode($email);
}

// closing mysql
$mysql->close_connection();	  
?>