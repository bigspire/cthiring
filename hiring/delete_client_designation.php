<?php
/* 
Purpose : To Delete client designation.
Created : Nikitasa
Date : 02-06-2018
*/

include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');

if(isset($_GET['id'])){
   // get record id   
	$id = $_GET['id'];
	if(($fun->isnumeric($id)) || ($fun->is_empty($id)) || ($id == 0)){
  		header('Location: ../?access=invalid');
	}

   // delete record details
 	$query = "CALL delete_designation('".$id."')";

  try{
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in deleting');
		} 
		if($_GET['type'] == 'CL'){
			header('Location:client_designation.php?page='.$_GET['page'].'&status=deleted');
		}elseif($_GET['type'] == 'CA'){
			header('Location:candidate_designation.php?page='.$_GET['page'].'&status=deleted');
		}
  			
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}
$c_c = $mysql->close_connection();
?>