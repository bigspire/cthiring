<?php
/* 
   Purpose : To list and search holidays.
	Created : Nikitasa
	Date : 10-11-2017
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
$module_access = $fun->check_role_access('34',$modules);
$smarty->assign('module',$module_access);

// to display the event and event date 
$keyword = $_POST['keyword'] ? $_POST['keyword'] : $_GET['keyword'];
$event_from_date = $_POST['event_from_date'] ? $_POST['event_from_date'] : $_GET['event_from_date'];
$event_to_date = $_POST['event_to_date'] ? $_POST['event_to_date'] : $_GET['event_to_date'];
$branch = $_POST['branch'] ? $_POST['branch'] : $_GET['branch'];

$event_from_dt = $fun->convert_date($event_from_date);
$event_to_dt = $fun->convert_date($event_to_date);

//post url for paging
if($_POST){
	$post_url .= '&keyword='.$keyword;
	$post_url .= '&event_from_date='.$event_from_date;
	$post_url .= '&event_to_date='.$event_to_date;
	$post_url .= '&branch='.$branch;
}

// for export
if($_GET['action'] == 'export'){
	$status = $_GET['status']; 
}

// query to fetch all branch list. 
$query = 'CALL get_branch()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting branch list');
	}
	while($row = $mysql->display_result($result))
	{
 		$branch_name[$row['id']] = ucwords($row['branch']);
	}
	$smarty->assign('branch_name',$branch_name);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
} 

// count the total no. of records
$query = "CALL list_holidays('".$keyword."','".$branch."','".$event_from_dt."','".$event_to_dt."','0','0','','','".$_GET['action']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing list holidays page');
	}

	// fetch result
	$data_num = $mysql->display_result($result);

	// count result
	$count = $data_num['total'];
	if($count == 0){
		$alert_msg = 'This details is not in our database';
	}
	$page = $_GET['page'] ?  $_GET['page'] : 1;
	$limit = 20;

   include('paging_call.php');	
	// free the memory
	$mysql->clear_result($result);
	// execute next query
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// set the condition to check ascending or descending order		
$order = ($_GET['order'] == 'desc') ? 'asc' :  'desc';	
$sort_fields = array('1' => 'event','event_date','created','branch');
$org_fields = array('1' => 'event','event_date','created_date','branch');

// to set the sorting image
foreach($sort_fields as $key => $b_field){
	if($b_field != $_GET['field']){ 
		$smarty->assign('sort_field_'.$b_field,'sorting');
	}else{	
		$order_img = ($_GET['order'] == 'asc') ? 'sorting desc' :  'sorting asc';
		$smarty->assign('sort_field_'.$b_field,$order_img);
	}			
}
// if no fields are set, set default sort image
if(empty($_GET['field'])){		
	$order = 'desc';			
	$field = 'h.created_date';			
	$smarty->assign('sort_field_created', 'sorting desc');
}	
$smarty->assign('order', $order);
// set the original field for the sql query
if($search_key = array_search($_GET['field'], $sort_fields)){
	$field =  $org_fields[$search_key];
}

// fetch all records
$query =  "CALL list_holidays('".$keyword."','".$branch."','".$event_from_dt."','".$event_to_dt."','$start','$limit','".$field."','".$order."','".$_GET['action']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing list holidays page');
	}
	// calling mysql fetch_result function
	$i = '0';
	while($obj = $mysql->display_result($result))
	{
 		$data[] = $obj;
 		$data[$i]['created_date'] = $fun->convert_date_to_display($obj['created_date']);
		$data[$i]['event_date'] = $fun->convert_date_to_display($obj['event_date']);
 		$i++;
 		$pno[]=$paging->print_no();
 		$smarty->assign('pno',$pno);
	}
	
	// get current date 
	$current_date = $fun->display_date();
	// call to export the excel data
	if($_GET['action'] == 'export'){ 
		include('classes/class.excel.php');
		$excelObj = new libExcel();
		// function to print the excel header
      $excelObj->printHeader($header = array('Event Title','Event Date','Branch','Created') ,$col = array('A','B','C','D'));  
		// function to print the excel data
		$excelObj->printCell($data, $count,$col = array('A','B','C','D'), $field = array('event','event_date','created_date','branch'),'Holidays_'.$current_date);
	}	
	
	// create,update,delete message validation
	if($_GET['status'] == 'deleted' || $_GET['status'] == 'created' || $_GET['status'] == 'updated'){
 	 $success_msg = 'Holidays ' . ucfirst($_GET['status']) . ' Successfully';
	}else if($_GET['current_status'] == 'msg'){
		$success_msg = 'This record is not available in our database';
	}

	// validating pagination
	$total_pages = ceil($count / $limit);

	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}


// calling mysql close db connection function
$c_c = $mysql->close_connection();
$paging->posturl($post_url);

// assign smarty variables here
$smarty->assign('page_links',$paging->print_link_frontend());
$smarty->assign('data', $data);
$smarty->assign('page' , $page); 
$smarty->assign('total_pages' , $total_pages); 	
$smarty->assign('keyword' , $keyword); 
$smarty->assign('event_from_date' , $event_from_date); 
$smarty->assign('event_to_date' , $event_to_date); 
$smarty->assign('ALERT_MSG', $alert_msg);
$smarty->assign('SUCCESS_MSG', $success_msg);
// assign page title
$smarty->assign('page_title' , 'Holidays - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('setting_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('base_target'));
 
// display smarty file
$smarty->display('holidays.tpl');
?>