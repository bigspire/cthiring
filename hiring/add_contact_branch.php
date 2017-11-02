<?php
/* 
Purpose : To add contact branch.
Created : Nikitasa
Date : 27-10-2017
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

// role based validation
$module_access = $fun->check_role_access('41',$modules);
$smarty->assign('module',$module_access);

if(!empty($_POST)){	
	// array for printing correct field name in error message
	$fieldtype = array('0', '1');
	$actualfield = array('branch ', 'status');
   $field = array('branch' => 'branchErr', 'status' => 'statusErr');
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
	$query = "CALL check_contact_branch_exist('0', '".$fun->is_white_space($_POST['branch'])."')";
	// Calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing to check contact branch exist');
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
			// query to insert contact branch. 
			$query = "CALL add_contact_branch('".$_SESSION['user_id']."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['branch']))."',
			'".$date."','".$mysql->real_escape_str($_POST['status'])."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add contact branch');
				}
				$row = $mysql->display_result($result);
				$last_id = $row['inserted_id'];
					if(!empty($last_id)){
						// redirecting to list contact branch page
						header('Location: contact_branch.php?status=created');		
					}
				// free the memory
				$mysql->clear_result($result);
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}else{
			$msg = "Branch already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		} 
	}
}
// smarty dropdown array for status
$smarty->assign('branch_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));

// closing mysql
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Add Branch - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('setting_active','active');	  
// display smarty file
$smarty->display('add_contact_branch.tpl');
?>