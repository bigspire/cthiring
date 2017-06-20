<?php 
/* 
Purpose : To get position.
Created : Nikitasa
Date : 20-06-2017
*/

include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');

$client_id = $_GET['client'];

// smarty dropdown for position
$query ="CALL get_position('".$client_id."')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing position');
	}
    $position = array();
	while($obj = $mysql->display_result($result)){
		$position[$obj['id']] = $obj['job_title'];  	   
	}
	
	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
echo json_encode($position);

// closing mysql
$mysql->close_connection();	  
?>