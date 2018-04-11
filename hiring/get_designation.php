<?php 
/* 
/* Purpose : To get designation.
Created : Nikitasa
Date : 11-04-2018
*/

include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');

$desig = $_GET['desig'];

// smarty dropdown for designation
$query = "CALL get_designation_byid('".$desig."')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing designation details');
	}
    $degree = array();
	while($obj = $mysql->display_result($result)){
		$degree[$obj['id']] = $obj['designation'];  	   
	}
	
	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
echo json_encode($degree);

// closing mysql
$mysql->close_connection();	  
?>