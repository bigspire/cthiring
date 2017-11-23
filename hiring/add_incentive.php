<?php
/* 
Purpose : To add incentive.
Created : Nikitasa
Date : 22-01-2017
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

// role based validation
$module_access = $fun->check_role_access('13',$modules);
$smarty->assign('module',$module_access);

if(!empty($_POST)){	
	// error message validation
	if(!empty($_POST['type'])){
		if(empty($_POST['position_month'])){
			$smarty->assign($position_monthErr,'Please select the incentive month');
			$test = 'error';
		}else if(empty($_POST['year'])){
			$smarty->assign($yearErr,'Please select the incentive year');
			$test = 'error';
		}else if(empty($_POST['ps_month'])){
			$smarty->assign($ps_monthErr,'Please select the incentive month');
			$test = 'error';
		}else if(empty($_POST['ps_year'])){
			$smarty->assign($ps_yearErr,'Please select the incentive year');
			$test = 'error';
		}
	}else{
		$smarty->assign($typeErr,'Please select the incentive type');
		$test = 'error';
	}
	
	/*
	// array for printing correct field name in error message
	$fieldtype = array('1', '1','1', '1','1');
	$actualfield = array('incentive type ', 'incentive month','incentive year','incentive month','incentive year');
	$field = array('type' => 'typeErr', 'position_month' => 'position_monthErr','year' => 'yearErr','ps_month' => 'ps_monthErr', 'ps_year' => 'ps_yearErr');
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
	*/
	// assigning the date
	$date =  $fun->current_date(); 

	$incentive_month = $_POST['position_month'] ? $_POST['position_month'] : $_POST['ps_month'];
	$incentive_year = $_POST['year'] ? $_POST['year'] : $_POST['ps_year'];
	
	// function to validate incentive date
	/*
	if($incentive_month == '6'){
		$start_month = '04';
		$end_month = '06';
	}else if($inc_date == '9'){	
	 	$start_month = '07';
		$end_month = '09';
	}else if($inc_date == '12'){	
	 	$start_month = '10';
		$end_month = '12';
	}else if($inc_date == '3'){	
	 	$start_month = '01';
		$end_month = '03';
	}
	
	*/
	
	$test = '';
	
	if(empty($test)){
		
		// query to fetch employee for incentive. 
		// echo $query = "CALL get_incentive_emp('".$mysql->real_escape_str($incentive_year.'-'.$start_month)."',
		// '".$mysql->real_escape_str($incentive_year.'-'.$end_month)."')";
		
		$query = "CALL get_employee()";
		
		// Calling the function that makes the fetch
		try{
			// calling mysql exe_query function
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in getting employee details');
			}
			while($row[] = $mysql->display_result($result)){
					
			}				
			// free the memory
			$mysql->clear_result($result);
			// next query execution
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		$no_days = date('t', strtotime($incentive_year.'-'.$incentive_month.'-01'));
		$count_emp = count($row);
		// iterate the employees
		foreach($row as $record){ 
			$emp_id = $record['id'];
			$emp_name = $record['emp_name'];
			// get the user leaves
			$query = "CALL get_user_leaves('".$emp_id."')";
			// Calling the function that makes the fetch
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in getting user leave details');
				}
				$while($leave_row[] = $mysql->display_result($result)){
						
				}
				// free the memory
				$mysql->clear_result($result);
				// next query execution
				$mysql->next_query();								
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
			// for testing
			//if($emp_id == '98'){
				// iterate the days
				for($i = 1; $i <= $no_days; $i++){			
					$j = $i < 10 ? '0'.$i : $i;
					$date = date('Y-m-d', strtotime($incentive_year.'-'.$incentive_month.'-'.$j));				
					// query to fetch employee position details. 
					$query = "CALL get_inc_emp_position_ctc('".$emp_id."', '".$date."')";
					//echo '<br>';
					try{
						// calling mysql exe_query function
						if(!$result = $mysql->execute_query($query)){
							throw new Exception('Problem in getting employee position details');
						}
						$row = $mysql->display_result($result);
						$ctc = $row['candidate_ctc'];
						// free the memory
						$mysql->clear_result($result);
						// next query execution
						$mysql->next_query();						
						// get the no. of requirements to send for that position ctc
						$query = "CALL get_resume_send('".$ctc."')";
						//echo '<br>';
						// Calling the function that makes the insert
						try{
							// calling mysql exe_query function
							if(!$result = $mysql->execute_query($query)){
								throw new Exception('Problem in getting CTC for the Positions');
							}
							$row = $mysql->display_result($result);	
							$expected_cv = $row['no_resumes'];
							// free the memory
							$mysql->clear_result($result);
							// next query execution
							$mysql->next_query();
							// get the actual sent CVs
							$query = "CALL get_resume_actual_send('".$emp_id."','".$date."')";
							// Calling the function that makes the fetch
							try{
								// calling mysql exe_query function
								if(!$result = $mysql->execute_query($query)){
									throw new Exception('Problem in getting actual sent cvs details');
								}
								$row = $mysql->display_result($result);
								$actual_cv = $row['total_sent'];
								$work_percent = ($actual_cv/$expected_cv)*100;
								$work_percent = round($work_percent, 1);
								$work_percent_day[$emp_name][][$date] = $work_percent;
								
								$work_avg += $work_percent;
								// $work_percent_day[$emp_id][$date] = $work_percent;
								// free the memory
								$mysql->clear_result($result);
								// next query execution
								$mysql->next_query();
								
							}catch(Exception $e){
								echo 'Caught exception: ',  $e->getMessage(), "\n";
							}
					
							
						}catch(Exception $e){
							echo 'Caught exception: ',  $e->getMessage(), "\n";
						}
						
					}catch(Exception $e){
						echo 'Caught exception: ',  $e->getMessage(), "\n";
					}
									
				}
				$work_days = $no_days;
				$avg[$emp_id][] = round(($work_days/$no_days)*$work_avg, 1); 
				$work_avg = '';					
			//}
					
		
		}		
	
		echo '<pre>'; print_r($avg);die;
	}
	
	
}

/*
				// query to fetch leave details. 
				echo $query = "CALL get_inc_emp_leaves('".$row['emp_id']."')";
				// Calling the function that makes the fetch
				try{
					// calling mysql exe_query function
					if(!$result = $mysql->execute_query($query)){
						throw new Exception('Problem in getting leave details');
					}
					$row = $mysql->display_result($result);
					// free the memory
					$mysql->clear_result($result);
					// next query execution
					$mysql->next_query();
				}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
				*/
				
// smarty drop down array for incentive type
$smarty->assign('types', array('' => 'Select', '1' => 'Profile Short-listing & Interviewing', '2' => 'Position Closure'));

// smarty drop down array for status
$smarty->assign('position_months', array('' => 'Month', '06' => 'Apr - Jun', '09' => 'Jul - Sep', '12' => 'Oct - Dec', '03' => 'Jan - Mar'));

// smarty drop down array for status
$smarty->assign('ps_months', array('' => 'Month', '01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' => 'Apr', '05' => 'May', '06' => 'Jun', '07' => 'Jul'
, '08' => 'Aug', '09' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dec'));

// smarty drop down array for no of times
$years = array();
for($i = date('Y'); $i <= 2017; $i++){
	$years[$i] = $i;
}
$smarty->assign('years', $years);

// closing mysql
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Add Incentive - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('billings_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('add_billing')); 	  
// display smarty file
$smarty->display('add_incentive.tpl');
?>