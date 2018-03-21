<?php
/* 
Purpose : To edit degree.
Created : Nikitasa
Date : 9-3-2018 
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
$module_access = $fun->check_role_access('52',$modules);
$smarty->assign('module',$module_access);

$getid = $_GET['id'];
$smarty->assign('getid',$getid);
// validate url 
if(($fun->isnumeric($getid)) || ($fun->is_empty($getid)) || ($getid == 0)){
  header('Location: ../?access=invalid');
}

// if id is not in database then redirect to list page
if($getid !=''){
	$query = "CALL check_valid_degree('".$getid."')";
	try{
		// calling mysql execute query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in checking degree details');
		}
		$row = $mysql->display_result($result);
		$total = $row['total'];
		if($total == 0){ 
			header("Location:degree.php?current_status=msg");
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
	$query = "CALL get_degree_byid('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get degree');
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
}

if(!empty($_POST)){
	// Validating the required fields  
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
	$query = "CALL check_degree_exist('".$getid."', '".$fun->is_white_space($_POST['degree'])."')";
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
		    $query = "CALL edit_degree('".$getid."','".$fun->is_white_space($mysql->real_escape_str($_POST['degree']))."',
			'".$date."','".$mysql->real_escape_str($_POST['status'])."','".$mysql->real_escape_str($_POST['qualification'])."')";
			try{
	    		// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing edit degree');
				}
				$row = $mysql->display_result($result);
				$affected_rows = $row['affected_rows'];
				// clear the results	    			
				$mysql->clear_result($result);
				// next query execution
				$mysql->next_query();
				if(!empty($affected_rows)){
					// redirecting to list page
					header('Location: degree.php?status=updated');	
				}	
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
				die;
			}
		}else{
			$msg = "Degree already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		} 
	}
}
// smarty dropdown array for architechture
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
$smarty->assign('page_title' , 'Edit Degree - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('setting_active','active');
// display smarty file
$smarty->display('edit_degree.tpl');
?>