<?php
/* 
Purpose : To add degree.
Created : Nikitasa
Date : 9-3-2018
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
$module_access = $fun->check_role_access('52',$modules);
$smarty->assign('module',$module_access);

if(!empty($_POST)){	
	// array for printing correct field name in error message
	$fieldtype = array('1','0', '1');
	$actualfield = array('qualification','degree ', 'status');
	$field = array('qualification' => 'qualificationErr','degree' => 'degreeErr', 'status' => 'statusErr');
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
	$query = "CALL check_degree_exist('0', '".$fun->is_white_space($_POST['degree'])."')";
	// Calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing to check degree exist');
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
			// query to insert degree. 
			$query = "CALL add_degree('".$fun->is_white_space($mysql->real_escape_str($_POST['degree']))."',
			'".$date."','".$mysql->real_escape_str($_POST['status'])."','".$mysql->real_escape_str($_POST['qualification'])."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add degree');
				}
				$row = $mysql->display_result($result);
				$last_id = $row['inserted_id'];
					if(!empty($last_id)){
						// redirecting to list contact branch page
						header('Location: degree.php?status=created');		
					}
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}else{
			$msg = "Degree already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		} 
	}
}
// smarty dropdown array for status
$smarty->assign('degree_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));

// query to fetch all program details. 
$query = 'CALL get_qual_program()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting program qualifications');
	}
	while($row = $mysql->display_result($result))
	{
 		$program_name[$row['id']] = ucwords($row['program']);
	}
	$smarty->assign('qual',$program_name);
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
$smarty->assign('page_title' , 'Add Degree - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('setting_active','active');	  
// display smarty file
$smarty->display('add_degree.tpl');
?>