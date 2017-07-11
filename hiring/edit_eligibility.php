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

// role based validation
$module_access = $fun->check_role_access('34',$modules);
$smarty->assign('module',$module_access);

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
	if(($fun->isnumeric($_POST['amount'])) || ($fun->is_phonenumber($_POST['amount']))){
		$amountErr = 'Please enter the numeric value';
    	$smarty->assign('amountErr',$amountErr);
    	$test = 'error';
	} 
	if(($fun->isnumeric($_POST['no_resumes'])) || ($fun->is_phonenumber($_POST['no_resumes']))){
		$no_resumeErr = 'Please enter the numeric value';
    	$smarty->assign('no_resumeErr',$no_resumeErr);
    	$test = 'error';
	}
	
	// array for printing correct field name in error message
	$fieldtype = array('1', '1','1','0','0','1');
	$actualfield = array('type', 'ctc from', 'ctc to', 'no of resume','amount','status');
    $field = array('type' => 'typesErr','ctc_from' => 'target_from_Err',
	'ctc_to' => 'target_to_Err','no_resumes' => 'no_resumeErr','amount' => 'amountErr', 'status' => 'statusErr');
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
		$query = "CALL check_eligibile('".$getid."', '".$_POST['ctc_from']."','".$_POST['ctc_to']."','".$_POST['type']."')";
		// Calling the function that makes the insert
		try{
			// calling mysql exe_query function
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in executing to check eligibility exist');
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
			$query = "CALL edit_eligibility('".$getid."','".$mysql->real_escape_str($_POST['ctc_from'])."',
			'".$mysql->real_escape_str($_POST['ctc_to'])."',
			'".$mysql->real_escape_str($_POST['type'])."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['no_resumes']))."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['amount']))."',
			'".$date."','".$mysql->real_escape_str($_POST['status'])."')";
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
					header('Location: eligibility.php?cur_status=updated');	
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
// smarty drop down array for type
$smarty->assign('types', array('' => 'Select', 'PS' => 'Profile Sending', 'PI' => 'Profile Shortlisting','PC' => 'Position Closing'));

// smarty dropdown array for no of times
$target = array();
for($l = '1'; $l <= '100'; $l++){
	if($l == '1') {
		$target[$l] = $l.' '.Lac;
	}else{
		$target[$l] = $l.' '.Lacs ;
	}
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