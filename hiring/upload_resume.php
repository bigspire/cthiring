<?php
/* 
Purpose : To upload resume.
Created : Nikitasa
Date : 07-03-2017
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

if($_GET['client_id'] != ''  and $_GET['req_id'] != ''){
	$_SESSION['client_id'] = $_GET['client_id'];
	$_SESSION['req_id'] = $_GET['req_id'];
	$smarty->assign('client_id',$_SESSION['client_id']);
	$smarty->assign('req_id',$_SESSION['req_id'] );
	
	// query to fetch all clients names. 
	$query = "CALL get_clients_position('".$_SESSION['client_id']."','".$_SESSION['req_id']."')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in getting client and position details');
		}
		$row = $mysql->display_result($result);
		$smarty->assign('client',ucwords($row['client_name']));
		$smarty->assign('position_for',ucwords($row['job_title']));
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}else{

	$clients = array();
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

	$position = array();
	// query to fetch position details. 
	$query = "CALL get_position('".$_POST['client']."')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in getting requirement');
		}
		while($row = $mysql->display_result($result))
		{
			$position[$row['id']] = ucwords($row['job_title']);
		}
		$smarty->assign('position',$position);
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	} 
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

	// validating the required fields
	if(!isset($_POST['resume']) && empty($_FILES['resume']['name'])){
		$smarty->assign('resumeErr', 'Please upload the resume');	
		$test = 'error';			
	}
	
	if($_GET['client_id'] == '' and $_GET['req_id'] == ''){
		if($_POST['client'] == ''){
			$smarty->assign('clientErr', 'Please select the client');	
			$test = 'error';
		}
		if(empty($_POST['position_for'])){
			$smarty->assign('position_forErr', 'Please select the position for');	
			$test = 'error';
		}
	}
	
	$req_size =  5242880;

	// upload the file if attached
	if(!empty($_FILES['resume']['name'])){
		// upload directory
		$uploaddir = 'uploads/resume/'; 
		$attachmentsize = $_FILES['resume']['size'];
		$attachmenttype = pathinfo($_FILES['resume']['name']);
		$extension = $attachmenttype['extension'];	
		// file extensions
		$extensions = array('docx'); 
		
		// checking the file extension is doc,docx
		if($fun->extension_validation($extension,$extensions) == true){		
			$attachmentuploadErr = 'Attachment must be .docx';
			$test = 'error';
		}
		// checking the file size is less than 1 MB		
		else if($fun->size_validation($attachmentsize,$req_size)){
			$attachmentuploadErr = 'Attachment file size must be less than 5 MB';
			$test = 'error';
		}
		// checking the file size is less than 1 MB		
		else if(empty($attachmentsize)){
			$attachmentuploadErr = 'Attachment file size must be less than 5 MB';
			$test = 'error';
		}				
	}	
	$smarty->assign('attachmentuploadErr', $attachmentuploadErr);
	
	// assigning the date
	$date =  $fun->current_date();
	$type = 'D';
	
	if(empty($test)){
		//update the attached file
		if(!empty($_FILES['resume']['name'])){
			$new_file = $_FILES['resume']['name'];
			// upload the file
			$path = $uploaddir.$new_file;
			move_uploaded_file($_FILES['resume']['tmp_name'], $path);
			// query to update the file
			$query = "CALL upload_resume('".$new_file."','".$type."','".$_SESSION['user_id']."','".$date."')";
			try{
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in uploading resume');
				}
				$row = $mysql->display_result($result);
				$last_id = $row['inserted_id'];
				$_SESSION['resume_doc_id'] = $last_id;
				// write the session to server
				$_SESSION['resume_doc'] = $new_file;
				if(empty($_SESSION['client_id']) && empty($_SESSION['req_id'])){
					$_SESSION['client'] = $_POST['client'];
					$_SESSION['position_for'] = $_POST['position_for'];
				}else{
					$_SESSION['client'] = $_SESSION['client_id'];
					$_SESSION['position_for'] = $_SESSION['req_id'];
				}
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}
		if(!empty($last_id)){
			$smarty->assign('form_sent' , 1);	
		} 
	}
}

// closing mysql
$mysql->close_connection();

// assign page title
$smarty->assign('page_title' , 'Upload Resume - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('resume_active','active');
// display smarty file
$smarty->display('upload_resume.tpl');
?>
