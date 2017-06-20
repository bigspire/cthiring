<?php
/* 
   Purpose : To show recruiter performance.
	Created : Nikitasa
	Date : 19-06-2017
*/

//include smarty congig file
include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');
// add menu count
include('menu_count.php');
// include paging class 
include('classes/class.paging.php');
// mailing class
include('classes/class.mailer.php');
// content class
include('classes/class.content.php');

// query to fetch all employee names. 
$query = 'CALL get_employee()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting employee details');
	}
	while($row = $mysql->display_result($result))
	{
 		$emp_id[$row['id']] = ucwords($row['emp_name']);
	}
	$smarty->assign('emp_id',$emp_id);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
// query to fetch all clients names. 
$query = 'CALL get_clients()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting client details');
	}
	while($row = $mysql->display_result($result))
	{
 		$clients[$row['id']] = ucwords($row['client_name']);
	}
	$smarty->assign('clients',$clients);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

$smarty->assign('f_date', date('d-m-Y', strtotime('-30 days')));
$smarty->assign('t_date', $fun->display_date($fun->current_date()));

$f_date = $_POST['f_date'] ? $_POST['f_date'] : $_GET['f_date'];  
$t_date = $_POST['t_date'] ? $_POST['t_date'] : $_GET['t_date']; 
$from_date = $fun->convert_date_db($f_date);
$to_date = $fun->convert_date_db($t_date);

//post url for paging
if($_POST){
	$post_url .= '&f_date='.$f_date;
	$post_url .= '&t_date='.$t_date;
	$post_url .= '&client_name='.$client_name;
	$post_url .= '&emp_name='.$emp_name;
}
 
// count the total no. of records
$query = "CALL recruiter_performance('".$_SESSION['user_id']."','".$from_date."','".$to_date."','".$_GET['client_name']."','".$_GET['emp_name']."','0','0','','','".$_GET['action']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing recruiter performance page');
	}

	// fetch result
	$data_num = $mysql->display_result($result);
	
	// count result
	$count = $data_num['total'];
	if($count == 0){
		$alert_msg = 'This details is not in our database';
	}
	$page = $_GET['page'] ?  $_GET['page'] : 1;
	$limit = 15;

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
$sort_fields = array('1' => 'job_title','client_name','billing_amount','billing_date','candidate_name','created_date');
$org_fields = array('1' => 'job_title','client_name','billing_amount','billing_date','candidate_name','created_date');

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
	$field = 'rr.created_date';			
	$smarty->assign('sort_field_created_date', 'sorting desc');
}	
$smarty->assign('order', $order);
// set the original field for the sql query
if($search_key = array_search($_GET['field'], $sort_fields)){
	$field =  $org_fields[$search_key];
}

// fetch all records
$query =  "CALL recruiter_performance('".$_SESSION['user_id']."','".$from_date."','".$to_date."','".$_GET['client_name']."','".$_GET['emp_name']."','$start','$limit','".$field."','".$order."','".$_GET['action']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing recruiter performance page');
	}
	// calling mysql fetch_result function
	$i = '0';
	while($obj = $mysql->display_result($result))
	{
 		$data[] = $obj;
 		$data[$i]['position_worked'] = $fun->get_performance_cond($obj['position_worked']);
		$data[$i]['profile_submitted'] = $fun->get_performance_cond($obj['profile_submitted']);
		$data[$i]['position_closed'] = $fun->get_performance_cond($obj['position_closed']);
 		$data[$i]['created_date'] = $fun->convert_date_to_display($obj['created_date']);
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
      $excelObj->printHeader($header = array('Position','Client Name','Billing Amount','Billing Date','Candidate Name','Created Date','Status') ,$col = array('A','B','C','D','E','F','G'));  
		// function to print the excel data
		$excelObj->printCell($data, $count,$col = array('A','B','C','D','E','F','G'), $field = array('job_title','client_name','billing_amount','billing_date','candidate_name','created_date','status'),'Billing_'.$current_date);
	}	
	
	// create validation
	if($_GET['status'] == 'created'){
 	 $success_msg = 'Billing ' . $_GET['status'] . ' successfully';
	}

	// validating pagination
	$total_pages = ceil($count / $limit);

	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
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
$smarty->assign('ALERT_MSG', $alert_msg);
$smarty->assign('SUCCESS_MSG', $success_msg);
 

// closing mysql
$mysql->close_connection();

// assign page title
$smarty->assign('page_title' , 'Recruiter Performance - CT Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('report_active','active');
// display smarty file
$smarty->display('recruiter_performance.tpl');
?>