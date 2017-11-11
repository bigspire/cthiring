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
		$extensions = array('xls','xlsx'); 
		
		// checking the file extension is doc,docx
		if($fun->extension_validation($extension,$extensions) == true){		
			$attachmentuploadErr = 'Attachment must be .xls or .xlsx';
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
			
			
			if($_GET['action'] == 'holidays'){
				
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
							echo 'Caught exception: ',  $e->getMessage(), "\n";
						}
						
						// query to check whether it is exist or not. 
						$query = "CALL check_event_date_exist('$event_date')";
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
							echo 'Caught exception: ',  $e->getMessage(), "\n";
						}
	
						if($row['check'] == '0'){
					
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
								echo 'Caught exception: ',  $e->getMessage(), "\n";
							}
						}else{
							// query to import the file
							$query = "CALL edit_holidays('".$event."','".$event_date."','".$branch_id."','".$created_date."','".$_SESSION['user_id']."')";
							try{
								if(!$result = $mysql->execute_query($query)){
									throw new Exception('Problem in editing holidays');
								}
								$row = $mysql->display_result($result);
								$affected_rows = $row['affected_rows'];
				
								// call the next result
								$mysql->next_query();
							}catch(Exception $e){
								echo 'Caught exception: ',  $e->getMessage(), "\n";
							}
						}	
					}
				}
			}else if($_GET['action'] == 'salary'){
				// iterate the salary data
				foreach($salary_data as  $key => $salary){ 
					if($key > 1 && $salary['A'] != ''){ 
						$employee = $mysql->real_escape_str($salary['A']);
						$salary_date = $mysql->real_escape_str($salary['B']);
						$ctc = $fun->convert_date($mysql->real_escape_str($salary['C']));
						
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
							echo 'Caught exception: ',  $e->getMessage(), "\n";
						}
						
						// query to check whether it is exist or not. 
						$query = "CALL check_emp_exist('$emp_id')";
						// Calling the function that makes the insert
						try{
							// calling mysql exe_query function
							if(!$result = $mysql->execute_query($query)){
								throw new Exception('Problem in executing to check emp salary exist');
							}
							$check = $mysql->display_result($result);
							// free the memory
							$mysql->clear_result($result);
							// call the next result
							$mysql->next_query();
						}catch(Exception $e){
							echo 'Caught exception: ',  $e->getMessage(), "\n";
						}
	
						if($row['check'] == '0'){
					
							// query to import the file
							$query = "CALL add_salary('".$emp_id."','".$salary_month."','".$ctc."','".$created_date."','".$_SESSION['user_id']."')";
							try{
								if(!$result = $mysql->execute_query($query)){
									throw new Exception('Problem in adding salary');
								}
								$row = $mysql->display_result($result);
								$last_id = $row['inserted_id'];
				
								// call the next result
								$mysql->next_query();
							}catch(Exception $e){
								echo 'Caught exception: ',  $e->getMessage(), "\n";
							}
						}else{
							// query to import the file
							$query = "CALL edit_salary('".$emp_id."','".$salary_month."','".$ctc."','".$created_date."','".$_SESSION['user_id']."')";
							try{
								if(!$result = $mysql->execute_query($query)){
									throw new Exception('Problem in editing salary');
								}
								$row = $mysql->display_result($result);
								$affected_rows = $row['affected_rows'];
				
								// call the next result
								$mysql->next_query();
							}catch(Exception $e){
								echo 'Caught exception: ',  $e->getMessage(), "\n";
							}
						}	
					}
				}
			}else if($_GET['action'] == 'emp_leaves'){
				// iterate the holidays data
				foreach($emp_leaves_data as  $key => $emp_leaves){ 
					if($key > 1 && $emp_leaves['A'] != ''){ 
						$employee = $mysql->real_escape_str($emp_leaves['A']);
						$leave_date = $fun->convert_date($mysql->real_escape_str($emp_leaves['B']));
						$session = $mysql->real_escape_str($emp_leaves['C']);
					
						$query = "CALL get_leaves_empid_byname('".$employee."')";
							try{
							if(!$result = $mysql->execute_query($query)){
								throw new Exception('Problem in getting emp details');
							}
							$row = $mysql->display_result($result);
							$emp_id = $row['id'];
				
							// call the next result
							$mysql->next_query();
						}catch(Exception $e){
							echo 'Caught exception: ',  $e->getMessage(), "\n";
						}
						
						// query to check whether it is exist or not. 
						$query = "CALL check_leave_date_exist('$leave_date')";
						// Calling the function that makes the insert
						try{
							// calling mysql exe_query function
							if(!$result = $mysql->execute_query($query)){
								throw new Exception('Problem in executing to check leave date exist');
							}
							$check = $mysql->display_result($result);
							// free the memory
							$mysql->clear_result($result);
							// call the next result
							$mysql->next_query();
						}catch(Exception $e){
							echo 'Caught exception: ',  $e->getMessage(), "\n";
						}
	
						if($row['check'] == '0'){
					
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
								echo 'Caught exception: ',  $e->getMessage(), "\n";
							}
						}else{
							// query to import the file
							$query = "CALL edit_emp_leaves('".$emp_id."','".$leave_date."','".$session."','".$created_date."','".$_SESSION['user_id']."')";
							try{
								if(!$result = $mysql->execute_query($query)){
									throw new Exception('Problem in editing emp leaves');
								}
								$row = $mysql->display_result($result);
								$affected_rows = $row['affected_rows'];
				
								// call the next result
								$mysql->next_query();
							}catch(Exception $e){
								echo 'Caught exception: ',  $e->getMessage(), "\n";
							}
						}	
					}
				}
			}
			
			$status = empty($last_id) ? 'updated' : 'created';
			if($_GET['action'] == 'holidays' && (!empty($last_id) || !empty($affected_rows))){
				$url = 'holidays.php?status='.$status;	
			}else if($_GET['action'] == 'salary' && (!empty($last_id) || !empty($affected_rows))){
				$url = 'salary.php?status='.$status;
			}else if($_GET['action'] == 'emp_leaves' && (!empty($last_id) || !empty($affected_rows))){
				$url = 'emp_leaves.php?status='.$status;
			}
			$smarty->assign('redirect_url',$url);
			$smarty->assign('form_sent' , 1);
		}
	}
}

// closing mysql
$mysql->close_connection();

// assign page title
$smarty->assign('page_title' , 'Import Holidays- Manage Hiring');  
// display smarty file
$smarty->display('import_excel.tpl');
?>
