<?php 
/* 
Purpose : To get degree.
Created : Nikitasa
Date : 02-08-2016
*/

include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');

$qualification_id = $_GET['qualification'];

// smarty dropdown for degree
$query ="CALL get_resume_degree_program('".$qualification_id."')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing degree program');
	}
    $degree = array();
	while($obj = $mysql->display_result($result)){
		$degree[$obj['id']] = $obj['degree'];  	   
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