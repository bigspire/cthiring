<?php
/* 
Purpose : To upload resume.
Created : Nikitasa
Date : 07-03-2017
*/

// including smarty config
include 'configs/smartyconfig.php';
// including Database class file
include('classes/class.mysql.php');
$mysql->connect_database();
// Validating fields using class.function.php
include('classes/class.function.php');
// add menu count
include('menu_count.php');

if(!empty($_POST)){

	// validating the required fields
	if(!isset($_POST['resume']) && empty($_FILES['resume']['name'])){
		$smarty->assign('resumeErr', 'Please upload the resume');	
		$test = 'error';		
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
		$extensions = array('doc','docx'); 
		
		// checking the file extension is doc,docx
		if($fun->extension_validation($extension,$extensions) == true){		
			$attachmentuploadErr = 'Attachment must be .doc or .docx';
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
$smarty->assign('page_title' , 'Upload Resume - CT Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('resume_active','active');
// display smarty file
$smarty->display('upload_resume.tpl');
?>
