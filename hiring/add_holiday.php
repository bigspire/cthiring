<?php
/* 
Purpose : To import holidays.
Created : Nikitasa
Date : 11-11-2017
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
// mailing class
include('classes/class.mailer.php');
// content class
include('classes/class.content.php');

// to download template file
if($_GET['action'] == 'download'){
	$path = 'uploads/import/template/Holidays Template.xls';
	$fun->download_file($path);
}

$attachmentuploadErr = '';
if($_SERVER["REQUEST_METHOD"] == "POST"){

	// validating the required fields
	if(!isset($_POST['event_excel']) && empty($_FILES['event_excel']['name'])){
		$smarty->assign('event_excelErr', 'Please upload the excel');	
		$test = 'error';			
	}
	
	$req_size =  5242880;

	// upload the file if attached
	if(!empty($_FILES['event_excel']['name'])){
		// upload directory
		$uploaddir = 'uploads/import/'; 
		$attachmentsize = $_FILES['event_excel']['size'];
		$attachmenttype = pathinfo($_FILES['event_excel']['name']);
		$extension = $attachmenttype['extension'];	
		// file extensions
		$extensions = array('xls'); 
		
		// checking the file extension is doc,docx
		if($fun->extension_validation($extension,$extensions) == true){		
			$attachmentuploadErr = 'Attachment must be .xls';
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
	
	if(empty($test)){ 
		//update the attached file
		if(!empty($_FILES['event_excel']['name'])){			
			// upload the file
			$prefix = substr(time(), 2,5).rand(1000,10000000).'_';
			$new_file = $prefix.$_FILES['event_excel']['name'];
			$path = $uploaddir.$new_file;
			move_uploaded_file($_FILES['event_excel']['tmp_name'], $path);
						
			
			// fetch the attached data 
			// add excel class
			include('classes/class.excel.php');
			$excelObj = new libExcel();
			$holiday_data = $excelObj->read_data($uploaddir.$new_file);
			// assigning the date
			$created_date =  $fun->current_date();
			
			
			// if($_GET['action'] == 'holidays'){
				
				// iterate the holidays data
				foreach($holiday_data as  $key => $holiday){ 
					if($key > 1 && $holiday['A'] != ''){ 
						$event = $mysql->real_escape_str($holiday['A']);
						$event_date = $fun->convert_date($mysql->real_escape_str($holiday['B']));
						$branch = $mysql->real_escape_str($holiday['C']);
					
						$query = "CALL get_branch_byname('".$branch."')";
							try{
							if(!$result = $mysql->execute_query($query)){
								throw new Exception('Problem in getting branch details');
							}
							$row = $mysql->display_result($result);
							$branch_id = $row['id'];
				
							// call the next result
							$mysql->next_query();
						}catch(Exception $e){
							echo 'Caught exception: ',  $e->getMessage(), "\n";die;
						}
						
						if($branch_id != ''){
						
							// query to check whether it is exist or not. 
							$query = "CALL check_event_date_exist('$event_date','$branch_id')";
							// Calling the function that makes the insert
							try{
								// calling mysql exe_query function
								if(!$result = $mysql->execute_query($query)){
									throw new Exception('Problem in executing to check event exist');
								}
								$check = $mysql->display_result($result);
								// free the memory
								$mysql->clear_result($result);
								// call the next result
								$mysql->next_query();
							}catch(Exception $e){
								echo 'Caught exception: ',  $e->getMessage(), "\n";die;
							}
		
							if($check['id'] == ''){
						
								// query to import the file
								$query = "CALL add_holidays('".$event."','".$event_date."','".$branch_id."','".$created_date."','".$_SESSION['user_id']."')";
								try{
									if(!$result = $mysql->execute_query($query)){
										throw new Exception('Problem in adding holidays');
									}
									$row = $mysql->display_result($result);
									$last_id = $row['inserted_id'];
					
									// call the next result
									$mysql->next_query();
								}catch(Exception $e){
									echo 'Caught exception: ',  $e->getMessage(), "\n";die;
								}
							}else{
								// query to import the file
								$query = "CALL edit_holidays('".$event."','".$event_date."','".$created_date."','".$_SESSION['user_id']."',
								'".$check['id']."')";
								try{
									if(!$result = $mysql->execute_query($query)){
										throw new Exception('Problem in editing holidays');
									}
									$row = $mysql->display_result($result);
									$affected_rows = $row['affected_rows'];
					
									// call the next result
									$mysql->next_query();
								}catch(Exception $e){
									echo 'Caught exception: ',  $e->getMessage(), "\n";die;
								}
							}
						
						}
							
					}
				}
			//}
			
			$smarty->assign('form_sent' , 1);
		}
	}
}

// closing mysql
$mysql->close_connection();
$url = 'holidays.php?status=updated';	
$smarty->assign('page_redirect', $url);  

// assign page title
$smarty->assign('page_title' , 'Import Holidays- Manage Hiring');  
// display smarty file
$smarty->display('add_holiday.tpl');
?>
