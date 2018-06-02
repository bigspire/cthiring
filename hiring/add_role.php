<?php
/* 
Purpose : To add role.
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

$module_access = $fun->check_role_access('32',$modules);
$smarty->assign('module',$module_access);

if(!empty($_POST)){
	// Validating the required fields
	/* if(strlen(trim($_POST['role'])) != strlen($_POST['role'])) {
		$roleErr = 'Please enter the valid role';
    	$smarty->assign('roleErr',$roleErr);
    	$test = 'error';
	}*/
	// array for printing correct field name in error message
	$fieldtype = array('0', '1', '1');
	$actualfield = array('role ', 'status', 'permissions');	
    $field = array('role' => 'roleErr', 'status' => 'statusErr','permission' => 'permissionsErr');
	$j = 0;

	foreach ($field as $field => $er_var){
		if($_POST[$field] == ''){
			$error_msg = $fieldtype[$j] ? ' select the ' : ' enter the ';
			$actual_field =  $actualfield[$j];
			$er[$er_var] = 'Please'. $error_msg .$actual_field;
			$test = 'error';
			$smarty->assign($er_var,$er[$er_var]);
		}else if($field == 'permission' && count($_POST['permission']) == '0'){ // validate the permission
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
	
	$permission_list = array();
	// retain the permission
	if(count($_POST['permission']) > 0){
		foreach($_POST['permission'] as $perm){
			$permission_list[] = $perm;
		}
	}
	$smarty->assign('permissionSel', $permission_list);
	
	// assigning the date
	$date =  $fun->current_date();
	
	// query to check whether it is exist or not. 
	$query = "CALL check_role_exist('0', '".$fun->is_white_space($_POST['role'])."')";
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
			// query to insert role. 
			$query = "CALL add_role('".$fun->is_white_space($mysql->real_escape_str($_POST['role']))."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['description']))."','".$date."',
			 '".$mysql->real_escape_str($_POST['status'])."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add role');
				}
				$row = $mysql->display_result($result);
				$role_id = $row['inserted_id'];
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
			if(!empty($role_id)){
			
				foreach($permission_list as $key => $val){
					// query to insert permission. 
					$query = "CALL add_permission('".$date."','".$mysql->real_escape_str($val)."',
						'".$role_id."')";
					// Calling the function that makes the insert
					try{
						// calling mysql exe_query function
						if(!$result = $mysql->execute_query($query)){
							throw new Exception('Problem in adding permission');
						}
						$row = $mysql->display_result($result);
						// free the memory
						$mysql->clear_result($result);
						// next query execution
						$mysql->next_query();
					}catch(Exception $e){
						echo 'Caught exception: ',  $e->getMessage(), "\n";
					}
				}
				$last_id = $row['inserted_id'];
				if(!empty($last_id)){
					// redirecting to list roles page
					header('Location: roles.php?status=created');		
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
		$data[$row['id']] = $row['type'] == 'C' ? 'Add '.$row['module_name'] : ($row['type'] == 'V' ? 'View '.$row['module_name'] : ($row['type'] == 'D' ? 'Delete '.$row['module_name'] : ($row['type'] == 'V' ? 'View '.$row['module_name'] : $row['type'])));	
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
$smarty->assign('page_title' , 'Add Role - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('setting_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('add_grade'));
// display smarty file
$smarty->display('add_role.tpl');
?>