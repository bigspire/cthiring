<?php
/* 
Purpose : To edit sharing criteria.
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

$getid = $_GET['id'];
$smarty->assign('getid',$getid);
// validate url 
if(($fun->isnumeric($getid)) || ($fun->is_empty($getid)) || ($getid == 0)){
  header('Location:page_error.php');
}

// if id is not in database then redirect to list page
if($getid !=''){
	$query = "CALL check_valid_sharing_criteria('".$getid."')";
	try{
		// calling mysql execute query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in checking sharing criteria details');
		}
		$row = $mysql->display_result($result);
		$total = $row['total'];
		if($total == 0){ 
			header("Location:sharing_criteria.php?current_status=msg");
		}
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

// query to fetch all type names. 
$query = 'CALL get_sharing()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing type');
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

// get database values
if(empty($_POST)){
	$query = "CALL get_sharing_byid('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get sharing');
		}
		$row = $mysql->display_result($result);
		$smarty->assign('rows',$row);
		// assign the db values into session
		foreach($row as $key => $record){
			$smarty->assign($key,$record);		
		}   
		// free the memory
		$mysql->clear_result($result);
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}	
}

if(!empty($_POST)){
	// Validating the required fields 
	if(strlen(trim($_POST['percent'])) != strlen($_POST['percent'])) {
		$grade_nameErr = 'Please enter the valid % of share';
    	$smarty->assign('percentErr',$percentErr);
    	$test = 'error';
	}
	// array for printing correct field name in error message
	$fieldtype = array('1', '0' ,'1');
	$actualfield = array('type', '% of share', 'status');
   $field = array('inc_sharing_id' => 'typeErr', 'percent' => 'shareErr' ,'status' => 'statusErr');
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
	$query = "CALL check_sharing_exist('".$getid."', '".$_POST['inc_sharing_id']."')";
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
			$query = "CALL edit_sharing_percent('".$getid."','".$mysql->real_escape_str($_POST['percent'])."','".$date."',
			'".$mysql->real_escape_str($_POST['status'])."','".$mysql->real_escape_str($_POST['inc_sharing_id'])."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing edit sharing criteria');
				}
				$row = $mysql->display_result($result);
				// free the memory
				$mysql->clear_result($result);
				$affected_rows = $row['affected_rows'];
				if(!empty($affected_rows)){
					// redirecting to list sharing criteria page
					header('Location: sharing_criteria.php?status=updated');		
				}
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}else{
			$msg = "Type is already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		} 
	}
}

// smarty dropdown array for architechture
$smarty->assign('grade_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));
// closing mysql
$mysql->close_connection();

// assign page title
$smarty->assign('page_title' , 'Edit Sharing Criteria - CT Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('setting_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('edit_sharing_criteria'));	  
// display smarty file
$smarty->display('edit_sharing_criteria.tpl');
?>