<?php
/* 
Purpose : To import emp leaves.
Created : Nikitasa
Date : 13-11-2017
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

// to download template file
if($_GET['action'] == 'download'){
	$path = 'uploads/import/template/Employee Leaves Template.xls';
	$fun->download_file($path);
}

$attachmentuploadErr = '';
if($_SERVER["REQUEST_METHOD"] == "POST"){

	// validating the required fields
	if(!isset($_POST['emp_leave']) && empty($_FILES['emp_leave']['name'])){
		$smarty->assign('emp_leaveErr', 'Please upload the excel');	
		$test = 'error';			
	}
	
	$req_size =  5242880;

	// upload the file if attached
	if(!empty($_FILES['emp_leave']['name'])){
		// upload directory
		$uploaddir = 'uploads/import/'; 
		$attachmentsize = $_FILES['emp_leave']['size'];
		$attachmenttype = pathinfo($_FILES['emp_leave']['name']);
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
		if(!empty($_FILES['emp_leave']['name'])){			
			// upload the file
			$prefix = substr(time(), 2,5).rand(1000,10000000).'_';
			$new_file = $prefix.$_FILES['emp_leave']['name'];
			$path = $uploaddir.$new_file;
			move_uploaded_file($_FILES['emp_leave']['tmp_name'], $path);
						
			
			// fetch the attached data 
			// add excel class
			include('classes/class.excel.php');
			$excelObj = new libExcel();
			$holiday_data = $excelObj->read_data($uploaddir.$new_file);
			// assigning the date
			$created_date =  $fun->current_date();
			
				// iterate the holidays data
				foreach($holiday_data as  $key => $holiday){ 
					if($key > 1 && $holiday['A'] != ''){ 
						$employee = $mysql->real_escape_str($holiday['A']);
						$leave_date = $fun->convert_date($mysql->real_escape_str($holiday['B']));
						$session = $mysql->real_escape_str($fun->convert_emp_leave_session($holiday['C']));
					
						$query = "CALL get_emp_id_byname('".$employee."')";
							try{
							if(!$result = $mysql->execute_query($query)){
								throw new Exception('Problem in getting emp details');
							}
							$row = $mysql->display_result($result);
							$emp_id = $row['id'];
				
							// call the next result
							$mysql->next_query();
						}catch(Exception $e){
							echo 'Caught exception: ',  $e->getMessage(), "\n";die;
						}
						
						if($emp_id != ''){
						
							// query to check whether it is exist or not. 
							$query = "CALL check_leave_date_exist('$emp_id','$leave_date')";
							// Calling the function that makes the insert
							try{
								// calling mysql exe_query function
								if(!$result = $mysql->execute_query($query)){
									throw new Exception('Problem in executing to check emp leaves exist');
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
								$query = "CALL add_emp_leaves('".$emp_id."','".$leave_date."','".$session."','".$created_date."','".$_SESSION['user_id']."')";
								try{
									if(!$result = $mysql->execute_query($query)){
										throw new Exception('Problem in adding emp leaves');
									}
									$row = $mysql->display_result($result);
									$last_id = $row['inserted_id'];
					
									// call the next result
									$mysql->next_query();
								}catch(Exception $e){
									echo 'Caught exception: ',  $e->getMessage(), "\n";die;
								}
							}
						}
							
					}
				}
				$smarty->assign('form_sent' , 1);
		}
	}
}

// closing mysql
$mysql->close_connection();
$url = 'emp_leaves.php?status=updated';	
$smarty->assign('page_redirect', $url);  

// assign page title
$smarty->assign('page_title' , 'Import Employee Leaves - Manage Hiring');  
// display smarty file
$smarty->display('add_emp_leaves.tpl');
?>
