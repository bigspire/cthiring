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
// mailing class
include('classes/class.mailer.php');
// content class
include('classes/class.content.php');

// role based validation
$module_access = $fun->check_role_access('34',$modules);
$smarty->assign('module',$module_access);

$getid = $_GET['id'];
$smarty->assign('getid',$getid);

// validate url 
if(($fun->isnumeric($getid)) || ($fun->is_empty($getid)) || ($getid == 0)){
  header('Location: ../?access=invalid');
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
	if($_POST['type'] == 'PS' && $_POST['no_resumes'] == ''){
		$no_resumeErr = 'Please enter the no of resume';
    	$smarty->assign('no_resumeErr',$no_resumeErr);
    	$test = 'error';
	}
	
	if(($_POST['type'] == 'PC' || $_POST['type'] == 'PI') && ($_POST['amount'] == '')){	
		$amountErr = 'Please enter the amount';
    	$smarty->assign('amountErr',$amountErr);
    	$test = 'error';
	}
	
	// array for printing correct field name in error message
	$fieldtype = array('1', '1','1','1','1','1');
	$actualfield = array('user_type','period','type','ctc from','ctc to','status');
    $field = array('user_type' => 'user_typeErr','period' => 'periodErr','type' => 'typesErr','ctc_from' => 'target_from_Err',
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
		/*
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
		if($row['total'] == '0'){ */
			// query to update eligibility es. 
			$query = "CALL edit_eligibility('".$getid."','".$mysql->real_escape_str($_POST['user_type'])."',
			'".$mysql->real_escape_str($_POST['period'])."','".$mysql->real_escape_str($_POST['ctc_from'])."',
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
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
			
			// query to fetch BH/Director details 
			$query = "CALL get_eligibility_details('".$getid."')";
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in getting eligibility details');
				}
				$eligibility = $mysql->display_result($result);
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
				
			// query to fetch admin details. 
			$query = "CALL get_BH_Director_employee_details('A','".$_SESSION['user_id']."')";
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in getting employee details');
				}
				$obj = $mysql->display_result($result);
				$user_name = $obj['user_name'];
				$user_email_id = $obj['email_id'];
						
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
				
			// query to fetch BH/Director details 
			$query = "CALL get_BH_Director_employee_details('D','')";
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in getting approval user details');
				}
				while($account = $mysql->display_result($result)){
					$row_account[] = $account;
				}
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}

			$type = $fun->display_eligibility_type($eligibility['type']);
			$status = $fun->display_status($eligibility['status']);
			$user_type = $fun->user_type_fun($eligibility['user_type']);
			$period = $fun->period_fun($eligibility['period']);
			$modified_date = $fun->convert_date_to_display($eligibility['modified_date']);
			$amount = $eligibility['amount'];
			$no_resumes = $eligibility['no_resumes'];
			if($eligibility['ctc_from'] == '1'){
				$target_elig = $eligibility['ctc_from'].' Lac - '.$eligibility['ctc_to'].' Lacs';
			}else{
				$target_elig = $eligibility['ctc_from'].' Lacs - '.$eligibility['ctc_to'].' Lacs';
			}
			
			// send mail to BH/Director
			foreach($row_account as  $approval_user){ 					
				$sub = "Manage Hiring -  " .$user_name." edited Eligibility!";
				$msg = $content->get_edit_eligibility_details($_POST,$user_name,$approval_user['approval_name'],$type,$status,$user_type,$period,$amount,$modified_date,$target_elig,$no_resumes);
				$mailer->send_mail($sub,$msg,$user_name,$user_email,$approval_user['approval_name'],$approval_user['email_id']);	
			}
			
			if(!empty($affected_rows)){
					// redirecting to list eligibility page
					header('Location: eligibility.php?cur_status=updated');	
			}
		/* }else{
			$msg = "Eligibility is already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		} */
	}
}

// smarty drop down array for status
$smarty->assign('grade_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));
// smarty drop down array for type 
$smarty->assign('types', array('' => 'Select', 'PS' => 'Profile Sending', 'PI' => 'Profile Shortlisting','PC' => 'Position Closing'));
// smarty drop down array for period type
$smarty->assign('period_type', array('' => 'Select', 'D' => 'Daily', 'M' => 'Monthly','H' => 'Half yearly'));
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
$smarty->assign('page_title' , 'Edit Eligibility - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('setting_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('edit_eligibility')); 	 	  
// display smarty file
$smarty->display('edit_eligibility.tpl');
?>