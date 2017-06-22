<?php
/* 
Purpose : To edit role.
Created : Nikitasa
Date : 27-02-2017 
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
if($getid != ''){
	$query = "CALL check_valid_role('".$getid."')";
	try{
		// calling mysql execute query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in checking role details');
		}
		$row = $mysql->display_result($result);
		$total = $row['total'];
		if($total == 0){ 
			header("Location:roles.php?current_status=msg");
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
	$query = "CALL get_role_byid('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get role');
		}
		$row = $mysql->display_result($result);
		$smarty->assign('rows',$row);
		// assign the db values into session
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
	
	$query = "CALL get_role_id('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get role id');
		}
		$modules_id = array();
		while($row = $mysql->display_result($result)){
			$modules_id[] = $row['modules_id'];
		}	
		$smarty->assign('modules_id',$modules_id);		
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
	/* if(strlen(trim($_POST['role_name'])) != strlen($_POST['role_name'])) {
		$roleErr = 'Please enter the valid role';
    	$smarty->assign('roleErr',$roleErr);
    	$test = 'error';
	} */
	// array for printing correct field name in error message
	$fieldtype = array('0', '1', '1');
	$actualfield = array('role ', 'status', 'permissions');	
    $field = array('role_name' => 'roleErr', 'status' => 'statusErr','modules_id' => 'permissionsErr');
	$j = 0;

	foreach ($field as $field => $er_var){
		if($_POST[$field] == ''){
			$error_msg = $fieldtype[$j] ? ' select the ' : ' enter the ';
			$actual_field =  $actualfield[$j];
			$er[$er_var] = 'Please'. $error_msg .$actual_field;
			$test = 'error';
			$smarty->assign($er_var,$er[$er_var]);
		}else if($field == 'modules_id' && count($_POST['modules_id']) == '0'){ // validate the permission
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
	// retain the permission
	if(count($_POST['modules_id']) > 0){
		foreach($_POST['modules_id'] as $perm){
			$permission_list[] = $perm;
		}
	}
	$smarty->assign('modules_id', $permission_list);
	
	// assigning the date
	$date =  $fun->current_date();
	
	// query to check whether it is exist or not. 
	$query = "CALL check_role_exist('$getid', '".$fun->is_white_space($_POST['role_name'])."')";
	// Calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing to check role exist');
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
		   $query = "CALL edit_role('".$mysql->real_escape_str($getid)."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['role_name']))."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['description']))."',
			'".$date."','".$mysql->real_escape_str($_POST['status'])."')";
			try{
	    		// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing edit role query');
				}
				$row = $mysql->display_result($result);
				$role_id = $row['affected_rows'];
				// clear the results	    			
				$mysql->clear_result($result);
				// next query execution
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
				die;
			}
			if(!empty($role_id)){				
				$query = "CALL delete_permission('".$getid."')";
				// Calling the function to delete
				try{
					// calling mysql exe_query function
					if(!$result = $mysql->execute_query($query)){
						throw new Exception('Problem in deleting permission');
					}					
				}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
				
				foreach($permission_list as $key => $val){
					// query to insert permission. 
					$query = "CALL add_permission('".$date."','".$mysql->real_escape_str($val)."',
						'".$getid."')";
					// Calling the function that makes the insert
					try{
						// calling mysql exe_query function
						if(!$result = $mysql->execute_query($query)){
							throw new Exception('Problem in adding permission');
						}
						$row = $mysql->display_result($result);
						$last_id = $row['inserted_id'];
						// free the memory
						$mysql->clear_result($result);
						// next query execution
						$mysql->next_query();
					}catch(Exception $e){
						echo 'Caught exception: ',  $e->getMessage(), "\n";
					}
				}
				if(!empty($last_id)){
					// redirecting to list roles page
					header('Location: roles.php?status=updated');		
				}
			}
		}else{
			$msg = "Role already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		} 
	}
}

// get the roles
$query = "CALL get_modules()";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing get permissions');
	}
	while($row = $mysql->display_result($result)){
		$data[$row['id']] = $row['type'] == 'C' ? 'Create '.$row['module_name'] : ($row['type'] == 'V' ? 'View '.$row['module_name'] : ($row['type'] == 'D' ? 'Delete '.$row['module_name'] : ($row['type'] == 'V' ? 'View '.$row['module_name'] : $row['type'])));	
		if($row['is_last'] == '1'){	
			$module_name =  $row['module_name'];
			$arr[$module_name] = $data;
			unset($data);
		}
	}
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

			
// set the permissions
$smarty->assign('permissionList', $arr);
// smarty dropdown array for status
$smarty->assign('status_type', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));

// closing mysql
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Edit Role - CT Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('setting_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('edit_grade'));
 
// display smarty file
$smarty->display('edit_role.tpl');
?>