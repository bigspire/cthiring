<?php
/* 
Purpose : To Delete grade.
Created : Nikitasa
Date : 23-01-2017
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
  		header('Location:page_error.php');
	}

   // delete record details
 	$query = "CALL delete_grade('".$id."')";

  try{
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in deleting');
		}  
  		header('Location:grade.php?page='.$_GET['page'].'&status=deleted');	
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}
$c_c = $mysql->close_connection();
?>