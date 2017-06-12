<?php
/* 
Purpose : To add base target.
Created : Nikitasa
Date : 28-01-2017
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

// dog gu kha

// query to fetch all grade names. 
$query = 'CALL get_grade()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing grade');
	}
	//$grade_name[''] = 'Select';
	while($row = $mysql->display_result($result))
	{
 		$grade_name[$row['id']] = $row['grade'];
	}
	$smarty->assign('g_name',$grade_name);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
} 
if(!empty($_POST)){
	// Validating the required fields  
	// array for printing correct field name in error message
	$fieldtype = array('1', '0');
	$actualfield = array('grade', 'status', 'type', 'no of times');
    $field = array('grade_name' => 'gradenameErr','status' => 'statusErr', 'type' => 'typeErr', 'no_of_times' => 'no_of_timesErr');
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
		$query = "CALL check_base_target_exist('0', '".$_POST['type']."','".$_POST['grade_name']."')";
		// Calling the function that makes the insert
		try{
			// calling mysql exe_query function
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in executing to check grade and type exist');
			}
			$row = $mysql->display_result($result);
			// free the memory
			$mysql->clear_result($result);
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		if($row['total'] == '0'){
			// query to insert base target. 
			$query = "CALL add_base_target('".$mysql->real_escape_str($_POST['no_of_times'])."',
			'".$mysql->real_escape_str($_POST['type'])."','".$date."','".$mysql->real_escape_str($_POST['status'])."',
			'".$mysql->real_escape_str($_POST['grade_name'])."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add base target');
				}
				$row = $mysql->display_result($result);
				// redirecting to list grade page
				header('Location: base_target.php?status=created');		
				// free the memory
				$mysql->clear_result($result);
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}else{
			$msg = "Base Target is already exists";
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
// closing mysql
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Add Base Target - CT Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('setting_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('add_base_target')); 	  
// display smarty file
$smarty->display('add_base_target.tpl');
?>