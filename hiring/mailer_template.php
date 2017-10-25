<?php
/* 
Purpose : To add,edit and view mailer template.
Created : Nikitasa
Date : 28-02-2017 
*/

// starting session
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

// role based validation
$module_access = $fun->check_role_access('33',$modules);
$smarty->assign('module',$module_access);

$getid = $_GET['id'];
$smarty->assign('getid',$getid);
// validate url 
/*if(($fun->isnumeric($getid)) || ($fun->is_empty($getid)) || ($getid == 0)){
  header('Location:page_error.php');
}*/

// get database values
if(empty($_POST)){
	$query = "CALL get_template_byid('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get template');
		}
		$row = $mysql->display_result($result);
		$smarty->assign('rows',$row);
		if(!empty($row)){
			// assign the db values into session
			foreach($row as $key => $record){
				$smarty->assign($key,$record);		
			} 
		}  
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}	
}

if(!empty($_POST)){
	if($getid <= '3'){
		// Validating the required fields
		if(strlen(trim($_POST['subject'])) != strlen($_POST['subject'])) {
			$subjectErr = 'Please enter the valid subject';
    		$smarty->assign('subjectErr',$subjectErr);
    		$test = 'error';
		}
		// array for printing correct field name in error message
		$fieldtype = array('0', '1', '1');
		$actualfield = array('template ', 'subject', 'message');	
   	$field = array('template_id' => 'templateErr', 'subject' => 'subjectErr','message' => 'messageErr');
		$j = 0;

		foreach ($field as $field => $er_var){ 
			if($_POST[$field] == ''){
				$error_msg = $fieldtype[$j] ? ' select the ' : ' enter the ';
				$actual_field =  $actualfield[$j];
				$er[$er_var] = 'Please'. $error_msg .$actual_field;
				$test = 'error';
				$smarty->assign($er_var,$er[$er_var]);
			}else{
				$smarty->assign($field,$_POST[$field]);
			}
			$j++;
		}
	}elseif($getid > '4' || $getid == 'new'){
		// Validating the required fields
		if(strlen(trim($_POST['subject'])) != strlen($_POST['subject'])) {
			$subjectErr = 'Please enter the valid subject';
    		$smarty->assign('subjectErr',$subjectErr);
    		$test = 'error';
		}
		// array for printing correct field name in error message
		$fieldtype = array('0', '1', '0','0');
		$actualfield = array('template','template type','subject','message');	
   	$field = array('template' => 'templateErr', 'parent_id' => 'template_typeErr',
   	'subject' => 'subjectErr','message' => 'messageErr');
		$j = 0;

		foreach ($field as $field => $er_var){ 
			if($_POST[$field] == ''){
				$error_msg = $fieldtype[$j] ? ' select the ' : ' enter the ';
				$actual_field =  $actualfield[$j];
				$er[$er_var] = 'Please'. $error_msg .$actual_field;
				$test = 'error';
				$smarty->assign($er_var,$er[$er_var]);
			}else{
				$smarty->assign($field,$_POST[$field]);
			}
			$j++;
		}	
	}
	
	// assigning the date
	$date =  $fun->current_date();
	if(empty($test) && $getid != 'new'){
		// query to update template. 
		$query = "CALL edit_template('".$getid."','".$mysql->real_escape_str($_POST['subject'])."',
		'".$mysql->real_escape_str($_POST['message'])."','".$date."','".$_SESSION['user_id']."',
		'".$mysql->real_escape_str($_POST['parent_id'])."')";
		try{
	    	// calling mysql exe_query function
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in executing edit template query');
			}
			$row = $mysql->display_result($result);
			$affected_rows = $row['affected_rows'];
			// clear the results	    			
			$mysql->clear_result($result);
			// next query execution
			$mysql->next_query();	
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			die;
		}
	}elseif(empty($test) && $getid == 'new'){ 

		// query to add template. 
		$query = "CALL add_template('".$getid."','".$mysql->real_escape_str($_POST['subject'])."',
		'".$mysql->real_escape_str($_POST['message'])."','".$date."','".$_SESSION['user_id']."',
		'".$mysql->real_escape_str($_POST['parent_id'])."')";
		try{
	    	// calling mysql exe_query function
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in executing add template query');
			}
			$row = $mysql->display_result($result);
			$inserted_id = $row['inserted_id'];
			// clear the results	    			
			$mysql->clear_result($result);
			// next query execution
			$mysql->next_query();	
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			die;
		}
   
   }
   if(!empty($affected_rows) || !empty($inserted_id)){
		$success_msg = 'Template Modified successfully! ';
		$smarty->assign('SUCCESS_MSG', $success_msg);		
	}
}

// query to fetch all mail template tags. 
$query = 'CALL get_mail_template_tags()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting tags details');
	}
	while($obj = $mysql->display_result($result))
	{
 		$data[] = $obj; 		
	}
	$smarty->assign('data', $data);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// query to fetch all templates. 
$query = 'CALL get_templates()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting template details');
	}
	while($row = $mysql->display_result($result)){
 		$templates[$row['id']] = ucwords($row['template']);		
	}
	$templates['new'] = 'New Template';

	$smarty->assign('template_type',$templates);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// smarty drop down array for template
// $smarty->assign('template_type', array('1' => 'Send CV to Client', '2' => 'Interview Confirmation to Client','3' => 'Schedule Interview to Candidates'));

// closing mysql
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'View Template - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('setting_active','active');
// display smarty file
$smarty->display('mailer_template.tpl');
?>