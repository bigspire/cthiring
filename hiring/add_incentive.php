<?php
/* 
Purpose : To add incentive.
Created : Nikitasa
Date : 22-01-2017
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
$module_access = $fun->check_role_access('13',$modules);
$smarty->assign('module',$module_access);

if(!empty($_POST)){	
	// array for printing correct field name in error message
	$fieldtype = array('1', '1');
	$actualfield = array('quarter (Month & Year)', 'quarter (Month & Year)');
   $field = array('month' => 'quarterErr', 'year' => 'quarterErr');
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
	
	if(empty($test)){
		// query to insert grade. 
		$query = "CALL add_incentive('".$mysql->real_escape_str($_POST['grade_name'])."', '".$date."','".$mysql->real_escape_str($_POST['status'])."')";
		// Calling the function that makes the insert
		try{
			// calling mysql exe_query function
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in executing add grade');
			}
			$row = $mysql->display_result($result);
			$last_id = $row['inserted_id'];
			if(!empty($last_id)){
				// redirecting to list grade page
				header('Location: incentive.php?status=created');		
			}
			// free the memory
			$mysql->clear_result($result);
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
}

// smarty drop down array for status
$smarty->assign('months', array('' => 'Month', '03' => 'Jan - Mar', '06' => 'Apr - Jun', '09' => 'Jul - Sep', '12' => 'Oct - Dec'));

// smarty drop down array for no of times
$years = array();
for($i = 2017; $i <= 2050; $i++){
	$years[$i] = $i;
}
$smarty->assign('years', $years);

// closing mysql
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Add Incentive - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('billings_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('add_billing')); 	  
// display smarty file
$smarty->display('add_incentive.tpl');
?>