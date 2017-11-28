<?php
/* 
   Purpose : View incentive.
	Created : Nikitasa
	Date : 28-11-2017
*/

// starting session
session_start();

//include smarty congig file
include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');
// include paging class 
include('classes/class.paging.php');
// add menu count
include('menu_count.php');

// role based validation
$module_access = $fun->check_role_access('14',$modules);
$smarty->assign('module',$module_access);  

// get record id   
$id = $_GET['id'];
$emp_id = $_GET['emp_id'];

if(($fun->isnumeric($id)) || ($fun->is_empty($id)) || ($id == 0)){
  	header('Location: ../?access=invalid');
}

// select and execute query and fetch the result
$query = "CALL view_incentive_details('".$id."','".$emp_id."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing view billing page');
	}
	$row = $mysql->display_result($result);
	$smarty->assign('incentive_data',$row);
	$smarty->assign('created_date' , $fun->convert_date_to_display($row['created_date']));
	$smarty->assign('modified_date' , $fun->convert_date_to_display($row['modified_date']));
	$smarty->assign('incentive_type' , $fun->check_incentive_type($row['incentive_type']));
	$smarty->assign('period' ,$fun->convert_date_to_display($row['period']));
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

if(!empty($row)){
	// select and execute query and fetch the result
	$query = "CALL view_approved_billing_details('".$emp_id."','".$row['incentive_type']."','".$row['period']."')";
	try{
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing view interview page');
		}
		// check record exists
		$i = '0';
		// calling mysql fetch_result function
		while($obj = $mysql->display_result($result)){
			$data[] = $obj;
			$data[$i]['int_date'] = $fun->convert_date_to_display($obj['int_date']);
			$data[$i]['billing_date'] = $fun->convert_date_to_display($obj['billing_date']);
			$i++;
		}
		// free the memory
		$mysql->clear_result($result);
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}else{
	header('Location: ../?access=invalid');
}

// calling mysql close db connection function
$c_c = $mysql->close_connection();

// here assign smarty variables
$smarty->assign('id' , $_GET['id']); 
$smarty->assign('data', $data);

// assign page title
$smarty->assign('page_title' , 'View Incentive - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('billings_active','active'); 
// display smarty file
$smarty->display('view_incentive.tpl');
?>