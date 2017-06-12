<?php
/* 
Purpose : To add sharing criteria.
Created : Nikitasa
Date : 29-01-2017
*/

// including smarty config
include 'configs/smartyconfig.php';
// including Database class file
include('classes/class.mysql.php');
$mysql->connect_database();
// Validating fields using class.function.php
include('classes/class.function.php');
// add menu count
include('menu_count.php');

// query to fetch all grade names. 
$query = 'CALL get_sharing()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing grade');
	}
	
	while($row = $mysql->display_result($result))
	{
 		$type_name[$row['id']] = $row['type'];
	}
	$smarty->assign('type_name',$type_name);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
} 

if(!empty($_POST)){
	// Validating the required fields  
	if(strlen(trim($_POST['share'])) != strlen($_POST['share'])) {
		$shareErr = 'Please enter the valid % of share';
    	$smarty->assign('shareErr',$shareErr);
    	$test = 'error';
	}
	// array for printing correct field name in error message
	$fieldtype = array('1', '0' ,'1');
	$actualfield = array('type', '% of share', 'status');
   $field = array('type' => 'typeErr', 'share' => 'shareErr' ,'status' => 'statusErr');
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
	$query = "CALL check_sharing_exist('0', '".$_POST['type']."')";
	// Calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing to check type exist');
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
			// query to insert sharing percent. 
			$query = "CALL add_sharing_percent('".$mysql->real_escape_str($_POST['share'])."',
			 '".$date."','".$mysql->real_escape_str($_POST['status'])."','".$mysql->real_escape_str($_POST['type'])."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add grade');
				}
				$row = $mysql->display_result($result);
				$last_id = $row['inserted_id'];
					if(!empty($last_id)){
						// redirecting to list sharing criteria page
						header('Location: sharing_criteria.php?status=created');		
					}
				// free the memory
				$mysql->clear_result($result);
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}else{
			$msg = "Type is already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		} 
	}
}

// smarty dropdown array for status
$smarty->assign('grade_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));
// closing mysql
$mysql->close_connection();

// assign page title
$smarty->assign('page_title' , 'Add Sharing Criteria - CT Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('setting_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('add_sharing_criteria')); 	  
// display smarty file
$smarty->display('add_sharing_criteria.tpl');
?>