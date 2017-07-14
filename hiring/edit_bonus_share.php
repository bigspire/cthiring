<?php
/* 
Purpose : To edit bonus sharing
Created : Nikitasa
Date : 30-01-2017
*/

// starting session
session_start();

// including smarty config
include 'configs/smartyconfig.php';
// including Database class file
include('classes/class.mysql.php');
$mysql->connect_database();
// Validating fields using class.function.php
include('classes/class.function.php');
// add menu count
include('menu_count.php');

$getid = $_GET['id'];
$smarty->assign('getid',$getid);

// validate url 
if(($fun->isnumeric($getid)) || ($fun->is_empty($getid)) || ($getid == 0)){
  header('Location:page_error.php');
}

// if id is not in database then redirect to list page
if($getid !=''){
	$query = "CALL check_valid_bonus_share('".$getid."')";
	try{
		// calling mysql execute query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in checking bonus share details');
		}
		$row = $mysql->display_result($result);
		$total = $row['total'];
		if($total == 0){ 
			header("Location:bonus_share.php?current_status=msg");
		}
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

// get database values
if(empty($_POST)){
	$query = "CALL get_bonus_share('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get bonus share');
		}
		$row = $mysql->display_result($result);
		$smarty->assign('rows',$row);
		// assign the db values into session
		foreach($row as $key => $record){
			$smarty->assign($key,$record);		
		}   
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}	
}

if(!empty($_POST)){
	// Validating the required fields  
	if(strlen(trim($_POST['percent'])) != strlen($_POST['percent'])) {
		$percentErr = 'Please enter the valid bonus';
    	$smarty->assign('percentErr',$percentErr);
    	$test = 'error';
	}	
	// array for printing correct field name in error message
	$fieldtype = array('1', '1','0', '1');
	$actualfield = array('type ','no of times ','bonus ', 'status');
   $field = array('type' => 'typeErr', 'no_times' => 'no_of_timesErr','percent' => 'percentErr','status' => 'statusErr');
	$j = 0;
	foreach ($field as $field => $er_var){ 
		if($_POST[$field] == ''){
			$error_msg = $fieldtype[$j] ? ' select the ' : ' enter the ';
			$actual_field =  $actualfield[$j];
			$er[$er_var] = 'Please'. $error_msg .$actual_field;
			$test = 'error';
			$smarty->assign($er_var,$er[$er_var]);
		}else{
			$smarty->assign($field,$_POST[$field]);
		}
			$j++;
	}
	// assigning the date
	$date =  $fun->current_date();
	if(empty($test)){
		// query to check whether it is exist or not. 
		$query = "CALL check_bonus_share_type_exist('".$getid."','".$_POST['type']."')";
		// Calling the function that makes the insert
		try{
			// calling mysql exe_query function
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in executing to check grade exist');
			}
			$row = $mysql->display_result($result);
			// free the memory
			$mysql->clear_result($result);
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		if($row['total'] == '0'){
			// query to update bonus share . 
			$query = "CALL edit_bonus_share('".$getid."','".$mysql->real_escape_str($_POST['percent'])."',
			'".$mysql->real_escape_str($_POST['type'])."','".$mysql->real_escape_str($_POST['no_times'])."',
			'".$date."','".$mysql->real_escape_str($_POST['status'])."')";	
			// calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing edit bonus share ');
				}
				$row = $mysql->display_result($result);
				$affected_rows = $row['affected_rows'];
				// free the memory
				$mysql->clear_result($result);
				if(!empty($affected_rows)){
					// redirecting to list eligibility page
					header('Location: bonus_share.php?status=updated');	
				}
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}else{
			$msg = "Bonus Share is already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		} 
	}
}
// smarty drop down array for status
$smarty->assign('grade_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));
// smarty dropdown array for type
$smarty->assign('grade_type', array('' => 'Select', 'I' => 'Individual', 'T' => 'Team'));
// smarty dropdown array for no of times
$no_of_times = array();
for($l = '2'; $l <= '10'; $l++){
	$no_of_times[$l] = $l .' '. times;
}
$smarty->assign('no_of_times', $no_of_times);
// closing mysql
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Edit Bonus Share - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('setting_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('edit_bonus_share')); 	 	  
// display smarty file
$smarty->display('edit_bonus_sharing.tpl');
?>