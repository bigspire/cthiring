<?php
/* 
   Purpose : To list and search mail box.
	Created : Nikitasa
	Date : 06-03-2017
*/

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
$module_access = $fun->check_role_access('29',$modules);
$smarty->assign('module',$module_access);

$keyword = $_POST['keyword'] ? $_POST['keyword'] : $_GET['keyword'];
$f_date = $_POST['f_date'] ? $_POST['f_date'] : $_GET['f_date'];  
$t_date = $_POST['t_date'] ? $_POST['t_date'] : $_GET['t_date']; 
$from_date = $fun->convert_date($f_date);
$to_date = $fun->convert_date($t_date);

//post url for paging
if($_POST){
	$post_url .= '&keyword='.$keyword;
	$post_url .= '&f_date='.$f_date;
	$post_url .= '&t_date='.$t_date;
}

// count the total no. of records
$query = "CALL list_mail_box('".$_SESSION['user_id']."','".$keyword."','".$from_date."','".$to_date."','0','0','','','".$cond."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing mail box page');
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
$sort_fields = array('1' => 'to','to','subject','message','date','created_by');
$org_fields = array('1' => 'candidate_name','client_name','subject','message','created_date','employee');

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
	$field = 'm.created_date';			
	$smarty->assign('sort_field_created_date', 'sorting desc');
}	
$smarty->assign('order', $order);
// set the original field for the sql query
if($search_key = array_search($_GET['field'], $sort_fields)){
	$field =  $org_fields[$search_key];
}


// fetch all records
$query = "CALL list_mail_box('".$_SESSION['user_id']."','".$keyword."','".$from_date."','".$to_date."','$start','$limit','".$field."','".$order."','".$cond."')";

try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing mail box page');
	}
	// calling mysql fetch_result function
	$i = '0';
	while($obj = $mysql->display_result($result))
	{
 		$data[] = $obj;
 		$data[$i]['created_date'] = $fun->convert_date_to_display($obj['created_date']);
		$data[$i]['message'] = $fun->string_truncate($obj['message'],'50');
 		$i++;
 		$pno[]=$paging->print_no();
 		$smarty->assign('pno',$pno);
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
$smarty->assign('keyword' , $keyword); 	
$smarty->assign('f_date', $f_date);
$smarty->assign('t_date', $t_date);
$smarty->assign('employee' , $employee); 
$smarty->assign('branch' , $branch); 
$smarty->assign('current_status' , $current_status); 
$smarty->assign('ALERT_MSG', $alert_msg);
$smarty->assign('SUCCESS_MSG', $success_msg);
// assign page title
$smarty->assign('page_title' , 'Mailbox - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('mailbox_active','active');
 
// display smarty file
$smarty->display('mailbox.tpl');
?>