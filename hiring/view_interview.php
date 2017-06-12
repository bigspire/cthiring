<?php
/* 
   Purpose : View Interview.
	Created : Nikitasa
	Date : 17-02-2017
*/

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

// get record id   
$req_res_id = $_GET['req_res_id'];
$resume_id = $_GET['resume_id'];

if(($fun->isnumeric($req_res_id)) || ($fun->is_empty($req_res_id)) || ($req_res_id == 0)){
  		header('Location:page_error.php');
}

// select and execute query and fetch the result
$query = "CALL view_interview('".$req_res_id."','".$resume_id."','".$_SESSION['user_id']."','".$_SESSION['roles_id']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing view interview page');
	}
	$row = $mysql->display_result($result);
	$smarty->assign('interview_data',$row);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

if(!empty($row)){
	// select and execute query and fetch the result
	$query = "CALL view_interview_details('".$req_res_id."')";
	try{
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing view interview page');
		}
		// check record exists
		$i = '0';
		// calling mysql fetch_result function
		while($obj = $mysql->display_result($result)){
			$data[] = $obj;
			$data[$i]['interview_date'] = $fun->convert_date_to_display($obj['interview_date']);
			$i++;
		}
		// free the memory
		$mysql->clear_result($result);
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}else{
	header('Location:page_error.php');
}

// calling mysql close db connection function
$c_c = $mysql->close_connection();

// here assign smarty variables
$smarty->assign('req_res_id' , $_GET['req_res_id']); 
$smarty->assign('data', $data);
$smarty->assign('created_date' , $fun->convert_date_to_display($row['created_date'])); 
$smarty->assign('int_date' , $fun->convert_date_to_display($row['interview_date']));

// assign page title
$smarty->assign('page_title' , 'View Interview - CT Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('interview_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('view_billing'));
 
// display smarty file
$smarty->display('view_interview.tpl');
?>