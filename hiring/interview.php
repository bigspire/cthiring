<?php
/* 
   Purpose : To list and search interview.
	Created : Nikitasa
	Date : 17-02-2017
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
$module_access = $fun->check_role_access('10',$modules);
$smarty->assign('module',$module_access);

$keyword = $_POST['keyword'] ? $_POST['keyword'] : $_GET['keyword'];
$f_date = $_POST['f_date'] ? $_POST['f_date'] : $_GET['f_date'];  
$t_date = $_POST['t_date'] ? $_POST['t_date'] : $_GET['t_date']; 
$from_date = $fun->convert_date($f_date);
$to_date = $fun->convert_date($t_date);
$employee = $_POST['employee'] ? $_POST['employee'] : $_GET['employee'];
$branch = $_POST['branch'] ? $_POST['branch'] : $_GET['branch'];
$current_status = $_POST['current_status'] ? $_POST['current_status'] : $_GET['current_status'];

//post url for paging
if($_POST){
	$post_url .= '&keyword='.$keyword;
	$post_url .= '&f_date='.$f_date;
	$post_url .= '&t_date='.$t_date;
	$post_url .= '&employee='.$employee;
	$post_url .= '&branch='.$branch;
	$post_url .= '&current_status='.$current_status;
}

		// for director and BH
		if($_SESSION['roles_id'] == '33' || $_SESSION['roles_id'] == '38' || $_SESSION['roles_id'] == '39'){
			$show = 'all';
			$team_cond = false;
		}else{
			$team_cond = true;
		}
		// call the next result
		$mysql->next_query();
		$id = $_SESSION['user_id'];
		// get the team members
		if($show != 'all'){
			$qryCond = "(a.level1 = '$id' or a.level2 = '$id') and ";
		}		
		$sql = "select u.id, u.first_name, u.last_name from users u left join	approval a  on (a.users_id = u.id) where
		$qryCond u.is_deleted = 'N' and u.status = '0' group by u.id order by u.first_name asc";		
		$result = $mysql->execute_query($sql);		
		while($row = $mysql->display_result($result)){
			$emp_name[$row['id']] = ucwords($row['first_name'].' '.$row['last_name']);
			// concatenate the list of team members
			$id_str .=  $row['id'].', ';
		}
	
		// if not director or BH
		if(!empty($emp_name)){
			$smarty->assign('approveUser', '1');	
			if($team_cond){
				$cond .= 'or ( rr.created_by in('.substr($id_str, 0, strlen($id_str)-2).')';
				$cond .= ' or cah2.users_id in('.substr($id_str, 0, strlen($id_str)-2).'))';				
			}
			$smarty->assign('emp_name',$emp_name);
		}

// count the total no. of records
$query = "CALL list_interview('".$_SESSION['user_id']."','".$_SESSION['roles_id']."','".$keyword."','".$employee."','".$branch."','".$fun->get_status_cond($current_status)."','".$from_date."','".$to_date."','0','0','','','".$_GET['action']."','".$cond."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing list interview page');
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
$sort_fields = array('1' => 'candidate_name','position','company','ac_holder','interview_date','stage','current_status','created_by','created_date');
$org_fields = array('1' => 'candidate_name','position','company','ac_holder','interview_date','stage','status','created_by','created_date');

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
$query =  "CALL list_interview('".$_SESSION['user_id']."','".$_SESSION['roles_id']."','".$keyword."','".$employee."','".$branch."','".$fun->get_status_cond($current_status)."','".$from_date."','".$to_date."','$start','$limit','".$field."','".$order."','".$_GET['action']."', '".$cond."')";

try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing list interview page');
	}
	// calling mysql fetch_result function
	$i = '0';
	while($obj = $mysql->display_result($result))
	{
 		$data[] = $obj;
 		$data[$i]['interview_date'] = $fun->convert_date_to_display($obj['interview_date']);
 		$data[$i]['created_date'] = $fun->convert_date_to_display($obj['created_date']);
 		$data[$i]['status_cls'] = $fun->interview_status_cls($obj['status']);
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
      $excelObj->printHeader($header = array('Candidate Name','Position','Company','Account Holder','Interview Date','Stage','Status','Created By','Created') ,$col = array('A','B','C','D','E','F','G','H','I'));  
		// function to print the excel data
		$excelObj->printCell($data, $count,$col = array('A','B','C','D','E','F','G','H','I'), $field = array('candidate_name','position','company','ac_holder','interview_date','stage','status','created_by','created_date'),'Interview_'.$current_date);
	}	

	// approve or reject validation
	if($_GET['status'] == 'Approved' || $_GET['status'] == 'Rejected'){
 		$success_msg = 'Billing ' . ucfirst($_GET['status']) . ' Successfully';
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


// query to fetch all account holder names. 
/*
$query = 'CALL get_accountholder_name()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting account holder details');
	}
	while($row = $mysql->display_result($result))
	{
 		$ac_holder[$row['id']] = ucwords($row['account_holder']);
	}
	$smarty->assign('ac_holder',$ac_holder);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
} 
*/
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

// smarty drop down array for current status
$smarty->assign('status_type', array('' => 'Select', '1' => 'Scheduled', '2' => 'Re-Scheduled',
					'3' => 'OnHold', '4' => 'Qualified', '5' => 'Cancelled', '6' => 'Rejected'));

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
$smarty->assign('page_title' , 'Interview - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('interview_active','active');
 
// display smarty file
$smarty->display('interview.tpl');
?>