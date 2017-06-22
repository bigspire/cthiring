<?php
/* 
Purpose : To add bonus sharing.
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

if(!empty($_POST)){
	// Validating the required fields
	if(strlen(trim($_POST['bonus'])) != strlen($_POST['bonus'])) {
		$bonusErr = 'Please enter the valid bonus';
    	$smarty->assign('bonusErr',$bonusErr);
    	$test = 'error';
	}	
	// array for printing correct field name in error message
	$fieldtype = array('1', '1','0', '1');
	$actualfield = array('type ','no of times ','bonus ', 'status');
   $field = array('type' => 'typeErr', 'no_of_times' => 'no_of_timesErr','bonus' => 'bonusErr','status' => 'statusErr');
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
	// query to check whether it is exist or not. 
	$query = "CALL check_bonus_share_type_exist('0', '".$_POST['type']."')";
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
	
	if(empty($test)){
		if($row['total'] == '0'){
			// query to insert grade. 
			$query = "CALL add_bonus_share('".$mysql->real_escape_str($_POST['bonus'])."',
			'".$mysql->real_escape_str($_POST['type'])."','".$mysql->real_escape_str($_POST['no_times'])."',
			 '".$date."','".$mysql->real_escape_str($_POST['status'])."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add grade');
				}
				$row = $mysql->display_result($result);
				$last_id = $row['inserted_id'];
				if(!empty($last_id)){
						// redirecting to list grade page
						header('Location: bonus_share.php?status=created');		
				}
				// free the memory
				$mysql->clear_result($result);
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}else{
			$msg = "Bonus Share already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		} 
	}
}
// smarty dropdown array for status
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
$smarty->assign('page_title' , 'Add Bonus Share - CT Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('setting_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('add_bonus_share'));
// display smarty file
$smarty->display('add_bonus_sharing.tpl');
?>