<?php
/* 
Purpose : To add billing.
Created : Nikitasa
Date : 31-01-2017
*/

session_start();
// including smarty config
include 'configs/smartyconfig.php';
// including Database class file
include('classes/class.mysql.php');
$mysql->connect_database();
// Validating fields using class.function.php
include('classes/class.function.php');
// add menu count
include('menu_count.php');
// mailing class
include('classes/class.mailer.php');
// content class
include('classes/class.content.php');

// role based validation
$module_access = $fun->check_role_access('36',$modules);
$smarty->assign('module',$module_access);


if(!empty($_GET['res_id']) && !empty($_GET['req_res_id'])){
	
	// query to fetch approval user id. 
	$query = "CALL get_billing('".$_GET['res_id']."','".$_GET['req_res_id']."')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in getting requirements details');
		}
		// check record exists
		if($result->num_rows){
			// calling mysql fetch_result function
			while($obj = $mysql->display_result($result)){
				$smarty->assign('resume_id', $obj['resume_id']);
				$smarty->assign('requirement_id', $obj['requirement_id']);
				$smarty->assign('client_id', $obj['client_id']);
				$smarty->assign('candidate_name', $obj['candidate_name']);
				$smarty->assign('position', $obj['position']);
				$smarty->assign('client_name', $obj['client_name']);
				$smarty->assign('ctc_offer', $obj['ctc_offer']);
				$smarty->assign('billing_amount', $obj['billing_amount']);
				$smarty->assign('billing_date' , $fun->convert_date_to_display($obj['billing_date']));
				$smarty->assign('joined_date' , $fun->convert_date_to_display($obj['joined_date']));
			}
		}else{
			header('Location:page_error.php');
		}
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}else{
	header('Location: ../');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){			
	
	if($_POST['ctc_offer'] == ''){
		$smarty->assign('ctc_offerErr','Please enter the ctc offered ');
		$test = 'error';
	}else{
		$smarty->assign('ctc_offer',$_POST['ctc_offer']);
	}
	
	if($_POST['billing_amount'] == ''){
		$smarty->assign('billing_amountErr','Please enter the billing amount');
		$test = 'error';
	}else{
		$smarty->assign('billing_amount',$_POST['billing_amount']);
	}
	
	if($_POST['billing_date'] == ''){
		$smarty->assign('billing_dateErr','Please enter the billing date');
		$test = 'error';
	}else{
		$smarty->assign('billing_date',$_POST['billing_date']);
	}
	
	if(empty($test)){
		
		// assigning the date
		$date =  $fun->current_date();
		$billing_user_id = $_SESSION['user_id'];
	
		// query to fetch approval user id. 
		$query = "CALL get_approval_user_id('".$_SESSION['user_id']."')";
		try{
			// calling mysql exe_query function
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in getting approval user details');
			}
			$row = $mysql->display_result($result);
			$smarty->assign('created_by',$row['created_by_id']);
			// free the memory
			$mysql->clear_result($result);
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}	
			
		// store approve users id in session
		$_SESSION["approval_user_id"] = $row['created_by_id'];
	
		if($row['created_by_id'] != ''){
	
			// query to insert into database. 
			$query = "CALL add_billing('".$mysql->real_escape_str($_POST['resume_id'])."',
			'".$mysql->real_escape_str($_POST['requirement_id'])."','".$mysql->real_escape_str($_POST['client_id'])."',
			'$billing_user_id', '".$date."')";

			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in adding billing details');
				}
				$row = $mysql->display_result($result);
				$billing_id = $row['inserted_id'];				
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}	

			// query to insert into database. 
			$query = "CALL edit_billing_req_resume('".$fun->is_white_space($mysql->real_escape_str($_POST['ctc_offer']))."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['billing_amount']))."',
			'".$fun->is_white_space($mysql->real_escape_str($fun->convert_date($_POST['billing_date'])))."',
			'".$_GET['req_res_id']."')";

			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in adding req billing details');
				}
				$row = $mysql->display_result($result);
				$req_res_id = $row['affected_rows'];				
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
	
			// query to insert into database. 
			$query = "CALL add_billing_status('".$date."','".$last_id."','".$_SESSION["approval_user_id"]."')";
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
			$query = "CALL add_billing_users('".$last_id."', '".$_SESSION["approval_user_id"]."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in adding billing users');
				}
				$row = $mysql->display_result($result);
				$last_inserted_id = $row['inserted_id'];
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
			
			// query to fetch billing employee details. 
			$query = "CALL get_employee_by_id('".$billing_user_id."')";
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in getting employee details');
				}
				$obj = $mysql->display_result($result);
				$_POST['user_name'] = $obj['first_name'].' '.$obj['last_name'];
				$_POST['email_address'] = $obj['email_id'];
 					
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}	
			
			// query to fetch approval employee details. 
			$query = "CALL get_approval_user_by_id('".$_SESSION["approval_user_id"]."')";
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in getting approval employee details');
				}
				$obj = $mysql->display_result($result);
				$_POST['approval_user_name'] = $obj['approval_user'];
				$_POST['approval_user_email'] = $obj['approval_email'];
 					
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		
			// get billing user details
			$user_name = ucwords($_POST['user_name']);
			$user_email = $_POST['email_address'];
			
			// get approval user details
			$approval_user_name = ucwords($_POST['approval_user_name']);
			$approval_user_email = $_POST['approval_user_email'];
		
			// get candidate name
			$keyword = $_POST['keyword'];
			$keyword_explode = explode(",", $keyword);
			$candidate_name = $keyword_explode[0];
			
			// send mail to approval user
			$sub = "CTHiring -  " .$user_name." submitted billing details!";
			$msg = $content->get_create_billing_mail($_POST,$rows,$user_name,$approval_user_name,$candidate_name);
			$mailer->send_mail($sub,$msg,$user_name,$user_email,$approval_user_name,$approval_user_email);
	
			if(!empty($last_inserted_id) && empty($test) && !empty($req_res_id) && !empty($billing_id)){ 
				// redirecting to list page
				header("Location: billing.php?status=created");		
			}
		}else{
			$msg = "Sorry, you have no L1 to approve your request. Please contact your admin.";
			$smarty->assign('EXIST_MSG',$msg); 
		} 
	}
}

// closing mysql
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Add Billing - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('billings_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('add_billing')); 	  
// display smarty file
$smarty->display('add_billing.tpl');
?>