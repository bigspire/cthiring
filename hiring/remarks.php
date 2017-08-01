<?php
/* 
   Purpose : add remarks.
	Created : Nikitasa
	Date : 09-02-2017
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
// add menu count
include('menu_count.php');
// mailing class
include('classes/class.mailer.php');
// content class
include('classes/class.content.php');

$error = '1';
// when the form is submitted
if(!empty($_POST)){
// validate for reject option
if(!empty($_POST) && $_GET['action'] == 'reject'){
	// remarks Field Validation
   if(!$fun->not_empty($_POST['remarks'])){     
      $smarty->assign('remarksErr' , 'Please enter the remarks');  
      $error = '0';  
   }
}

// get user id
$user_id = $_SESSION['user_id'];
  	   		
// details created date and time 
$created_date = $fun->current_date($date);   

// approve/reject status validation
if($_GET['action'] == 'reject'){	
	$status = 'R';
	$mail_status = 'Rejected by';
}elseif($_GET['action'] == 'approve'){
	$status = 'A';
	$mail_status = 'Approved by';
}

if($error){ 

      // query to insert into database. 
		$query = "CALL edit_billing_status('".$_SESSION['status_id']."','".$created_date."','".$status."',
		'".$mysql->real_escape_str($_POST['remarks'])."')";
		// Calling the function that makes the insert
		try{
			// calling mysql exe_query function
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in adding billing details');
			}
			$row = $mysql->display_result($result);
			$affected_rows = $row['affected_rows'];				
			// free the memory
			$mysql->clear_result($result);
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
		}		
				
		// get the employee details
		$query = "CALL get_employee_by_id('".$_SESSION['emp_id']."')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in getting employee details');
			}
			// calling mysql fetch_result function
			$obj = $mysql->display_result($result);
			$_SESSION['user_name'] = $obj['first_name'].' '.$obj['last_name'];
			$user_email = $obj['email_id'];						
			$user_name = ucwords($_SESSION['user_name']);
			// free the memory
			$mysql->clear_result($result);
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
				
		// get the current user details
		$query = "CALL get_approval_user_by_id('".$_SESSION['user_id']."')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in getting approval user details');
			}
			// calling mysql fetch_result function
			$obj = $mysql->display_result($result);
			$approval_user_email = $obj['approval_email'];						
			$approval_user_name = ucwords($obj['approval_user']);
			// free the memory
			$mysql->clear_result($result);
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		// get the billing details
		$query = "CALL mail_billing_details('".$_SESSION['billing_id']."')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in getting billing details');
			}
			// calling mysql fetch_result function
			$rows = $mysql->display_result($result);
			// free the memory
			$mysql->clear_result($result);
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		// send mail to employee
		$sub = "CTHiring - Billing " .$mail_status.' '.ucwords($approval_user_name)."!";
		$msg = $content->get_level1_billing_mail($_POST,$rows,$user_name,$approval_user_name,$mail_status);
		$mailer->send_mail($sub,$msg,$approval_user_name,$approval_user_email,$user_name,$user_email);
		
			
		// get Level2 details
		$query = "CALL get_approval_user_id('".$_SESSION['emp_id']."')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in getting approval user details');
			}
			// calling mysql fetch_result function
			$obj = $mysql->display_result($result);
			$level2 = $obj['level2'];
			$level2_name = $obj['l2_name'];
			$level2_email = $obj['email_id'];
			// free the memory
			$mysql->clear_result($result);
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		if(($level2 != '') && ($level2 != '0') && ($level2 != $_SESSION['user_id']) && $_GET['action'] == 'approve'){
			// query to insert into database. 
			$query = "CALL add_billing_status('".$created_date."','".$_SESSION['billing_id']."','".$level2."')";

			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in adding billing status');
				}
				$row = $mysql->display_result($result);			
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		
			// query to insert into database. 
			$query = "CALL add_billing_users('".$_SESSION['billing_id']."', '".$level2."')";

			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in adding billing users');
				}
				$row = $mysql->display_result($result);
				// $last_inserted_id = $row['inserted_id'];
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
				
			// send mail to level2
			$sub = "CTHiring -  " .$user_name." submitted billing details!";
			$msg = $content->get_create_billing_mail($_POST,$rows,$user_name,$level2_name,$candidate_name);
			$mailer->send_mail($sub,$msg,$user_name,$user_email,$level2_name,$level2_email);
				
		}
		
		// is approved condition - when L1 or L2 rejects
		if($status == 'R'){
			$is_approved = 'Y';
		}
		// is approved condition - after L2 approves or L1 only exists and approves
		elseif(($status == 'A' && $level2 == $_SESSION['user_id']) || ($status == 'A' && $level2 == '0')){
			$is_approved = 'Y';
		}
		
		if($is_approved == 'Y'){
			// query to insert is_approve details into billing table. 
			$query = "CALL edit_billing('".$is_approved."', '".$_SESSION['billing_id']."')";

			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in edit billing');
				}
				$row = $mysql->display_result($result);
				$affected_rows = $row['affected_rows'];
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}		
		}
			
		if(!empty($affected_rows)){ 
			// $alert_msg = 'Billing request approved and sent to user successfully. ';	
			$smarty->assign('form_sent' , 1);	
		}		
}							
$smarty->assign('alert_msg',$alert_msg);
// closing mysql
$mysql->close_connection();
}
// display smarty file
$smarty->display('remarks.tpl');
?>