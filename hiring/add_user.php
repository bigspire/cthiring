<?php
/* 
Purpose : To add user.
Created : Nikitasa
Date : 23-01-2017
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

// role based validation
$module_access = $fun->check_role_access('31',$modules);
$smarty->assign('module',$module_access);

if(!empty($_POST)){
	// Validating the required fields  
	if($fun->is_phonenumber($_POST['mobile']) || $fun->size_of_phonenumber($_POST['mobile'])) {
		$mobileErr = 'Please enter the valid mobile';
    	$smarty->assign('mobileErr',$mobileErr);
    	$test = 'error';
	}
	
	if($fun->email_validation($_POST['email'])) {
		$emailErr = 'Please enter the valid email address';
    	$smarty->assign('emailErr',$emailErr);
    	$test = 'error';
	}
	
	// array for printing correct field name in error message
	$fieldtype = array('0', '0' ,'0','0','1','1','1');
	$actualfield = array('first name','last name', 'email address', 'mobile','role','status');
    $field = array('first_name' => 'first_nameErr','last_name' => 'last_nameErr', 'email' => 'emailErr' ,'mobile' => 'mobileErr',
   'role' => 'roleErr','status' => 'statusErr','location' => 'locationErr');
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
	$query = "CALL check_user_exist('0', '".$_POST['email']."')";
	// Calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing to check email exist');
		}
		$row = $mysql->display_result($result);
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	} 
//	echo $row['total'];die;
//echo $test;die;
	if(empty($test)){
		if($row['total'] == '0'){
			// query to insert user details.
			$query = "CALL add_user('".$mysql->real_escape_str($_POST['email'])."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['first_name']))."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['last_name']))."',
						'".$mysql->real_escape_str($_POST['mobile'])."',
						'".$fun->is_white_space($mysql->real_escape_str($_POST['designation']))."',
						'".$mysql->real_escape_str($_POST['status'])."',
						'".$mysql->real_escape_str($_POST['role'])."','".$mysql->real_escape_str($_SESSION['user_id'])."',
			 			'".$date."','".$mysql->real_escape_str($_POST['location'])."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add user');
				}
				$row = $mysql->display_result($result);
				$last_id = $row['inserted_id'];
					if(!empty($last_id)){
						// redirecting to list users page
						header('Location: users.php?status=created');		
					}
				// free the memory
				$mysql->clear_result($result);
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}else{
			$msg = "Email Address is already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		} 
	}
}

// query to fetch all roles. 
$query = 'CALL get_roles()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing roles');
	}
	
	while($row = $mysql->display_result($result))
	{
 		$roles[$row['id']] = $row['role_name'];
	}
	$smarty->assign('roles',$roles);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
} 

// query to fetch location list. 
$query = 'CALL get_branch()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting location list');
	}
	while($row = $mysql->display_result($result))
	{
 		$locations[$row['id']] = ucwords($row['branch']);
	}
	$smarty->assign('locations',$locations);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// smarty dropdown array for status
$smarty->assign('user_status', array('' => 'Select', '0' => 'Active', '1' => 'Inactive'));
// closing mysql
$mysql->close_connection();

// assign page title
$smarty->assign('page_title' , 'Add User - CT Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('setting_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('add_sharing_criteria')); 	  
// display smarty file
$smarty->display('add_user.tpl');
?>