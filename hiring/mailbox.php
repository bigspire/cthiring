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

		// for director and BH
		if($_SESSION['roles_id'] == '33' || $_SESSION['roles_id'] == '38' || $_SESSION['roles_id'] == '39'){
			$show = 'all';
		}else{
			$show = '1';			
		}
		$team_cond = true;
		// call the next result
		$mysql->next_query();
		$id = $_SESSION['user_id'];
		// get the team members
		if($show == '1'){
			$qryCond = "(a.level1 = '$id' or a.level2 = '$id') and ";
		}		
		$sql = "select u.id, u.first_name, u.last_name from users u left join	approval a  on (a.users_id = u.id) where
		$qryCond u.is_deleted = 'N' and u.status = '0' group by u.id order by u.first_name asc";		
		$result = $mysql->execute_query($sql);		
		while($row = $mysql->display_result($result)){
			$emp_name[$row['id']] = ucwords($row['first_name'].' '.$row['last_name']);
			$data_ar[] = $row['id'];
		}
		
		// if not director or BH
		if(!empty($emp_name)){
			$smarty->assign('approveUser', '1');		
			foreach($data_ar as $rec){
				// concatenate the list of team members
				$id_str .=  $rec.' , ';
			}
			$id_str .= $_SESSION['user_id'];
			if($team_cond){
				$cond .= ' or ( rr.created_by in('.$id_str.')';
				$cond .= ' or cah2.users_id in('.$id_str.')
				)';
				
			}
			$smarty->assign('emp_name',$emp_name);
		}

// count the total no. of records
$query = "CALL list_mail_box('".$_SESSION['user_id']."','".$_SESSION['roles_id']."','".$keyword."','".$from_date."','".$to_date."','0','0','','','".$cond."')";
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
	$field = 'con.created_date';			
	$smarty->assign('sort_field_created_date', 'sorting desc');
}	
$smarty->assign('order', $order);
// set the original field for the sql query
if($search_key = array_search($_GET['field'], $sort_fields)){
	$field =  $org_fields[$search_key];
}


// fetch all records
$query = "CALL list_mail_box('".$_SESSION['user_id']."','".$_SESSION['roles_id']."','".$keyword."','".$from_date."','".$to_date."','$start','$limit','".$field."','".$order."','".$cond."')";

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