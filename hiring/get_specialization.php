<?php 
/* 
Purpose : To get specialization.
Created : Nikitasa
Date : 02-08-2016
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

$degree_id = $_GET['degree'];

// smarty drop down for Specialization
$query ="CALL get_resume_spec_degree('".$degree_id."')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing spec.');
	}
   $specialization = array();
	while($obj = $mysql->display_result($result)){
   	$specialization[$obj['id']] = $obj['spec'];  	   
	}
	
	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
echo json_encode($specialization);

// closing mysql
$mysql->close_connection();	  
?>