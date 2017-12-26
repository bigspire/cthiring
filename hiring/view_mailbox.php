<?php
/* 
   Purpose : View mailboz.
	Created : Nikitasa
	Date : 13-07-2017
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
// mailing class
include('classes/class.mailer.php');
// content class
include('classes/class.content.php');

// role based validation
$module_access = $fun->check_role_access('29',$modules);
$smarty->assign('module',$module_access);

// get record id   
$id = $_GET['id'];

if(($fun->isnumeric($id)) || ($fun->is_empty($id)) || ($id == 0)){
  	header('Location: ../?access=invalid');
}

// select and execute query and fetch the result
$query = "CALL view_mailbox('$id')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing view mail box page');
	}
	// check record exists
	if($result->num_rows){
		// calling mysql fetch_result function
		$obj = $mysql->display_result($result);
		$smarty->assign('created_date', $fun->convert_date_to_display($obj['created_date']));
		$smarty->assign('data', $obj);
	}else{
		header('Location: ../?access=invalid');
	}
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
	// query to fetch admin details. 
	$query = "CALL get_employee_by_id('".$_SESSION['user_id']."')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in getting employee details');
		}
		$row = $mysql->display_result($result);
		$emp_name = $row['first_name'].' '.$row['last_name'];
		$emp_email_id = $row['email_id'];
						
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	
	if($obj['email'] != ''){
		// send mail to client					
		$msg = $content->send_mail_to_client($obj,$emp_name);
		$file = "C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\uploads\\resume\\".$obj['resume'];
		$mailer->send_mail($obj['subject'],$msg,$emp_name,$emp_email_id,$obj['client_name'],$obj['email'],$file);	
		$success = '1';
	}
	if($success == '1'){
		$smarty->assign('EXIST_MSG' , 'Mail Sent Successfully.');
	}
}

// calling mysql close db connection function
$c_c = $mysql->close_connection();

// here assign smarty variables
$smarty->assign('id' , $_GET['id']); 

// assign page title
$smarty->assign('page_title' , 'Mailbox - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('mailbox_active','active');
 
// display smarty file
$smarty->display('view_mailbox.tpl');
?>