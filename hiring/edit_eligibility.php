<?php
/* 
Purpose : To edit eligibility.
Created : Nikitasa
Date : 29-01-2017
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
	$query = "CALL check_valid_eligibility('".$getid."')";
	try{
		// calling mysql execute query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in checking eligibility details');
		}
		$row = $mysql->display_result($result);
		$total = $row['total'];
		if($total == 0){ 
			header("Location:eligibility.php?current_status=msg");
		}
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

// query to fetch all grade names. 
$query = 'CALL get_grade()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing grade');
	}

	while($row = $mysql->display_result($result))
	{
 		$grade_name[$row['id']] = $row['grade'];
	}
	$smarty->assign('g_name',$grade_name);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
} 

// get database values
if(empty($_POST)){
	$query = "CALL get_eligibility('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get eligibility');
		}
		$row = $mysql->display_result($result);
		$smarty->assign('rows',$row);
		// assign the db values
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
	/* if(strlen(trim($_POST['eligible'])) != strlen($_POST['eligible'])) {
		$eligibilityErr = 'Please enter the valid eligibility incentive(%)';
    	$smarty->assign('eligibilityErr',$eligibilityErr);
    	$test = 'error';
	} */
	// array for printing correct field name in error message
	$fieldtype = array('1', '1','1','0','1');
	$actualfield = array('grade', 'target from', 'target to', 'eligibility incentive(%)','status');
    $field = array('grade' => 'gradenameErr','target_from' => 'target_from_Err',
	'target_to' => 'target_to_Err','eligible' => 'eligibilityErr', 'status' => 'statusErr');
	$j = 0;
	foreach($field as $field => $er_var){
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
		$query = "CALL check_grade_exist('0', '".$_POST['grade']."')";
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
			// query to update eligibility es. 
			$query = "CALL edit_eligibility('".$getid."','".$mysql->real_escape_str($_POST['target_from'])."','".$mysql->real_escape_str($_POST['target_to'])."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['eligible']))."','".$date."','".$mysql->real_escape_str($_POST['status'])."',
			'".$mysql->real_escape_str($_POST['grade'])."')";
			// calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing edit eligibility');
				}
				$row = $mysql->display_result($result);
				$affected_rows = $row['affected_rows'];
				// free the memory
				$mysql->clear_result($result);
				if(!empty($affected_rows)){
					// redirecting to list eligibility page
					header('Location: eligibility.php?status=updated');	
				}
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}else{
			$msg = "Eligibility is already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		} 
	}
}
// smarty drop down array for status
$smarty->assign('grade_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));
// smarty dropdown array for no of times
$target = array();
for($l = '100'; $l >= '1'; $l--){
	$target[$l] = $l ;
}
$smarty->assign('target', $target);
// closing mysql
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Edit Eligibility - CT Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('setting_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('edit_eligibility')); 	 	  
// display smarty file
$smarty->display('edit_eligibility.tpl');
?>