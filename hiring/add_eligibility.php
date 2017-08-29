<?php
/* 
Purpose : To add eligibility.
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
 
if(!empty($_POST)){
	// Validating the required fields  
	if($fun->is_phonenumber($_POST['amount'])){
		$amountErr = 'Please enter the numeric value';
    	$smarty->assign('amountErr',$amountErr);
    	$test = 'error';
	} 
	if($fun->is_phonenumber($_POST['no_resume'])){
		$no_resumeErr = 'Please enter the numeric value';
    	$smarty->assign('no_resumeErr',$no_resumeErr);
    	$test = 'error';
	}
	
	// if(($_POST['types'] != '') && ($_POST['types'] != 'PC') && ($_POST['types'] != 'PI') && ($_POST['no_resume'] == '')){
	if($_POST['types'] == 'PS' && $_POST['no_resume'] == ''){
		$no_resumeErr = 'Please enter the no of resume';
    	$smarty->assign('no_resumeErr',$no_resumeErr);
    	$test = 'error';
	}
	
	// if(($_POST['types'] != '') && ($_POST['types'] != 'PS') && ($_POST['amount'] == '')){
	if(($_POST['types'] == 'PC' || $_POST['types'] == 'PI') && ($_POST['amount'] == '')){	
		$amountErr = 'Please enter the amount';
    	$smarty->assign('amountErr',$amountErr);
    	$test = 'error';
	}
	
	// array for printing correct field name in error message
	$fieldtype = array('1', '1','1','1','1','1');
	$actualfield = array('user_type','period','type','ctc from','ctc to','status');
    $field = array('user_type' => 'user_typeErr','period_type' => 'period_typeErr','types' => 'typesErr','ctc_from' => 'target_from_Err',
	'ctc_to' => 'target_to_Err', 'status' => 'statusErr');
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
		$query = "CALL check_eligibile('0', '".$_POST['ctc_from']."','".$_POST['ctc_to']."','".$_POST['types']."')";
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
			// query to insert base target. 
			$query = "CALL add_eligibility('".$mysql->real_escape_str($_POST['user_type'])."','".$mysql->real_escape_str($_POST['period_type'])."',
			'".$mysql->real_escape_str($_POST['ctc_from'])."',
			'".$mysql->real_escape_str($_POST['ctc_to'])."',
			'".$mysql->real_escape_str($_POST['types'])."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['no_resume']))."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['amount']))."',
			'".$date."','".$mysql->real_escape_str($_POST['status'])."')";

			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add eligibility');
				}
				$row = $mysql->display_result($result);
				// redirecting to list eligible page
				header('Location: eligibility.php?cur_status=created');		
				// free the memory
				$mysql->clear_result($result);
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
$smarty->assign('type', array('' => 'Select', 'PS' => 'Profile Sending', 'PI' => 'Profile Shortlisting','PC' => 'Position Closing'));
// smarty drop down array for period type
$smarty->assign('period', array('' => 'Select', 'D' => 'Daily', 'M' => 'Monthly','H' => 'Half yearly'));
// smarty drop down array for user type
$smarty->assign('user', array('' => 'Select', 'R' => 'Recruiter', 'AH' => 'Account Holder'));
// smarty dropdown array for no of times
$target = array();
for($l = '0'; $l <= '100'; $l++){
	if($l == '1' || $l == '0') {
		$target[$l] = $l.' '.Lac;
	}else{
		$target[$l] = $l.' '.Lacs ;
	}
}
$smarty->assign('target', $target);
// closing mysql
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Add Eligibility - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('setting_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('add_eligibility')); 	 	  
// display smarty file
$smarty->display('add_eligibility.tpl');
?>