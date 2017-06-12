<?php
/* 
Purpose : To add billing.
Created : Nikitasa
Date : 31-01-2017
*/

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

if(!empty($_POST)){
	
	 // candidate Field Validation
    if($fun->not_empty($_POST['keyword'])){
		$smarty->assign('keyword' , $_POST['keyword']);
    }else{
		$test = 'error';
		$smarty->assign('keywordErr' , 'Please select the candidate name');
    }

	// post of billing fields value
	for($i = 0; $i < $_POST['billing_count']; $i++){
		
		$empnameData[$i] = $_POST['empname_'.$i];
		$percentData[$i] = $_POST['percent_'.$i];
		$typeData[$i] = $_POST['type_'.$i];	
		// Validating the required fields  
		// array for printing correct field name in error message	
		$fieldtype = array('1', '1', '0');
		$actualfield = array('employee', 'co-ordination type', 'value (% of work)');
		$field_ar = array('empname_'.$i => 'empnameErr', 'type_'.$i => 'typeErr','percent_'.$i => 'percentErr');
		$j = 0;
		foreach($field_ar as $field => $er_var){ 
			if($_POST[$field] == ''){
				$error_msg = $fieldtype[$j] ? ' select the ' : ' enter the ';
				$actual_field =  $actualfield[$j];
				$er[$i][$er_var] = 'Please'. $error_msg .$actual_field;
			}
			$j++;
		}
	}
	$smarty->assign('empnameData', $empnameData);
	$smarty->assign('typeData', $typeData);
	$smarty->assign('percentData', $percentData);
	$smarty->assign('billingCount', $_POST['billing_count']);
	$smarty->assign('billingErr',$er);

	
	// assigning the date
	$date =  $fun->current_date();
	$billing_user_id = $_SESSION['user_id'];
	
	if(empty($er) && empty($test)){
		// query to fetch approval user id. 
		$query = "CALL get_approval_user_id('".$_SESSION['user_id']."')";
		try{
			// calling mysql exe_query function
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in getting approval user details');
			}
			$row = $mysql->display_result($result);
			$smarty->assign('created_by',$row['created_by_id']);
			// free the memory
			$mysql->clear_result($result);
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}	
			
		// store approve users id in session
		$_SESSION["approval_user_id"] = $row['created_by_id'];
		
		if($row['created_by_id'] != ''){
		
			// query to insert into database. 
			$query = "CALL add_billing('".$mysql->real_escape_str($_POST['resume_id'])."',
			'".$mysql->real_escape_str($_POST['requirements_id'])."','".$mysql->real_escape_str($_POST['client_id'])."',
	   	'$billing_user_id', '".$date."')";

			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in adding billing details');
				}
				$row = $mysql->display_result($result);
				$last_id = $row['inserted_id'];				
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
			}		
		
		
		
			// iterate the for to insert all the coordination details
			for($i = 0; $i < $_POST['billing_count']; $i++){
				$empname = $_POST['empname_'.$i];
				$percent = $_POST['percent_'.$i];	
				$type_value = $_POST['type_'.$i];
				$type_explode = explode("-", $type_value);
				$type = $type_explode[0];
					
				// query to insert into database. 
				$query = "CALL add_billing_coordination('".$mysql->real_escape_str($empname)."','".$type."',
					'".$mysql->real_escape_str($percent)."', '".$last_id."')";
				// Calling the function that makes the insert
				try{
					// calling mysql exe_query function
					if(!$result = $mysql->execute_query($query)){
						throw new Exception('Problem in adding coordination details');
					}
					$row = $mysql->display_result($result);				
					// free the memory
					$mysql->clear_result($result);
					// call the next result
					$mysql->next_query();
				}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
			}
			
				// query to insert into database. 
				$query = "CALL add_billing_status('".$date."','".$last_id."','".$_SESSION["approval_user_id"]."')";

				// Calling the function that makes the insert
				try{
					// calling mysql exe_query function
					if(!$result = $mysql->execute_query($query)){
						throw new Exception('Problem in adding billing status');
					}
					$row = $mysql->display_result($result);			
					// free the memory
					$mysql->clear_result($result);
					// call the next result
					$mysql->next_query();
				}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
		
				// query to insert into database. 
				$query = "CALL add_billing_users('".$last_id."', '".$_SESSION["approval_user_id"]."')";

				// Calling the function that makes the insert
				try{
					// calling mysql exe_query function
					if(!$result = $mysql->execute_query($query)){
						throw new Exception('Problem in adding billing users');
					}
					$row = $mysql->display_result($result);
					$last_inserted_id = $row['inserted_id'];
	
					// free the memory
					$mysql->clear_result($result);
					// call the next result
					$mysql->next_query();
				}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
			
				// query to fetch billing employee details. 
				$query = "CALL get_employee_by_id('".$billing_user_id."')";
				try{
					// calling mysql exe_query function
					if(!$result = $mysql->execute_query($query)){
						throw new Exception('Problem in getting employee details');
					}
					$obj = $mysql->display_result($result);
 					$_POST['user_name'] = $obj['first_name'].' '.$obj['last_name'];
 					$_POST['email_address'] = $obj['email_id'];
 					
					// free the memory
					$mysql->clear_result($result);
					// call the next result
					$mysql->next_query();
				}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				}	
			
				// query to fetch approval employee details. 
				$query = "CALL get_approval_user_by_id('".$_SESSION["approval_user_id"]."')";
				try{
					// calling mysql exe_query function
					if(!$result = $mysql->execute_query($query)){
						throw new Exception('Problem in getting approval employee details');
					}
					$obj = $mysql->display_result($result);
 					$_POST['approval_user_name'] = $obj['approval_user'];
 					$_POST['approval_user_email'] = $obj['approval_email'];
 					
					// free the memory
					$mysql->clear_result($result);
					// call the next result
					$mysql->next_query();
				}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
			// get billing user details
			$user_name = ucwords($_POST['user_name']);
			$user_email = $_POST['email_address'];
				
			// get approval user details
			$approval_user_name = ucwords($_POST['approval_user_name']);
			$approval_user_email = $_POST['approval_user_email'];
		
			// get candidate name
			$keyword = $_POST['keyword'];
			$keyword_explode = explode(",", $keyword);
			$candidate_name = $keyword_explode[0];
				
			// send mail to approval user
			$sub = "CTHiring -  " .$user_name." submitted billing details!";
			$msg = $content->get_create_billing_mail($_POST,$rows,$user_name,$approval_user_name,$candidate_name);
			$mailer->send_mail($sub,$msg,$user_name,$user_email,$approval_user_name,$approval_user_email);
		
			if(!empty($last_inserted_id) && empty($error)){ 
				// redirecting to list page
				header("Location: billing.php?status=created");		
			}
		}else{
			$msg = "Sorry, you have no L1 to approve your request. Please contact your admin.";
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

// query to fetch all employee names. 
$query = 'CALL get_employee()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting employee details');
	}
	while($row = $mysql->display_result($result))
	{
 		$emp_name[$row['id']] = ucwords($row['emp_name']);
	}
	$smarty->assign('emp_name',$emp_name);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// query to fetch all sharing type. 
$query = 'CALL get_sharing()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting type');
	}
	
	while($row = $mysql->display_result($result))
	{
 		$type_name[$row['id'].'-'.$row['percent']] = $row['type'];
	}
	$smarty->assign('type_name',$type_name);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
} 

// closing mysql
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Add Billing - CT Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('billings_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('add_billing')); 	  
// display smarty file
$smarty->display('add_billing.tpl');
?>