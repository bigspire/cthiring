<?php
/* 
   Purpose : To list and search sharing criteria.
   Created : Nikitasa
   Date : 29-01-2017 
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

$keyword = $_POST['keyword'] ? $_POST['keyword'] : $_GET['keyword'];

// to display the data using status filter
if(isset($_POST['status'])){
	$status = $_POST['status'];
}else if(isset($_GET['status'])){
	$status = $_GET['status'];
}else{
	$status = '1';
}
//post url for paging
if($_POST){
	$post_url .= '&keyword='.$keyword;
	$post_url .= '&status='.$status;
}

// for export
if($_GET['action'] == 'export'){
	$status = $_GET['status']; 
}

// count the total no. of records
$query = "CALL list_sharing('".$keyword."','".$status."','0','0','','','".$_GET['action']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing list sharing criteria page');
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
$sort_fields = array('1' => 'type','percent','status','created','modified');
$org_fields = array('1' => 'type','percent','status','created_date','modified_date');

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
	$field = 'created_date';			
	$smarty->assign('sort_field_created', 'sorting desc');
}	
$smarty->assign('order', $order);
// set the original field for the sql query
if($search_key = array_search($_GET['field'], $sort_fields)){
	$field =  $org_fields[$search_key];
}


// fetch all records
$query =  "CALL list_sharing('".$keyword."','".$status."','$start','$limit','".$field."','".$order."','".$_GET['action']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing list sharing criteria page');
	}
	// calling mysql fetch_result function
	$i = '0';
	while($obj = $mysql->display_result($result))
	{
 		$data[] = $obj;
 		$data[$i]['status'] = $fun->display_status($obj['status']);
 		$data[$i]['status_cls'] = $fun->status_cls($obj['status']);
 		$data[$i]['created_date'] = $fun->convert_date_to_display($obj['created_date']);
 		$data[$i]['modified_date'] = $fun->convert_date_to_display($obj['modified_date']);
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
      $excelObj->printHeader($header = array('Type','% of Share','Status','Created','Modified') ,$col = array('A','B','C','D','E'));  
		// function to print the excel data
		$excelObj->printCell($data, $count,$col = array('A','B','C','D','E'), $field = array('type','percent','status','created_date','modified_date'),'Sharing Criteria_'.$current_date);
	}	
	
	// create,update,delete message validation
	if($_GET['status'] == 'created' || $_GET['status'] == 'updated'){
 	 	$success_msg = 'Sharing Criteria ' . $_GET['status'] . ' successfully';
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

// smarty drop down array for status
$smarty->assign('status_type', array('' => 'All Status', '1' => 'Active', '2' => 'Inactive'));

// assign smarty variables here
$smarty->assign('page_links',$paging->print_link_frontend());
$smarty->assign('data', $data);
$smarty->assign('page' , $page); 
$smarty->assign('total_pages' , $total_pages); 	
$smarty->assign('keyword' , $keyword); 
$smarty->assign('status', $status);	
$smarty->assign('ALERT_MSG', $alert_msg);
$smarty->assign('SUCCESS_MSG', $success_msg);
// assign page title
$smarty->assign('page_title' , 'Sharing Criteria - CT Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('setting_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('sharing_criteria'));	  
// display smarty file
$smarty->display('sharing_criteria.tpl');
?>