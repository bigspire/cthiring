<?php
/* 
Purpose : To edit resume.
Created : Nikitasa
Date : 11-05-2017
*/

session_start();
use Ilovepdf\Ilovepdf;
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
$smarty->assign('dob_default', date('d/m/Y', strtotime('-18 years')));

// role based validation
$module_access = $fun->check_role_access('7',$modules);
$smarty->assign('module',$module_access);

$getid = $_GET['id'];
$smarty->assign('getid',$getid);
// validate url 
if(($fun->isnumeric($getid)) || ($fun->is_empty($getid)) || ($getid == 0)){
  header('Location:page_error.php');
}

// if id is not in database then redirect to list page
if($getid !=''){
	$query = "CALL check_valid_resume('".$getid."')";
	try{
		// calling mysql execute query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in checking resume details');
		}
		$row = $mysql->display_result($result);
		$total = $row['id'];
		if($total == '' || $row['created_by'] != $_SESSION['user_id']){ 
			// header("Location:resume.php?current_status=msg");
			header('Location: ../resume/?current_status=msg');
		}
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

// get database values
if(empty($_POST)){
	$query = "CALL get_res_personal_byid('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get resume personal');
		}
		$row = $mysql->display_result($result);
		$_SESSION['clients_id'] = $row['clients_id'];
		$_SESSION['position_for'] = $row['position_for'];
		
		$smarty->assign('dob_field', $fun->convert_date_display($row['dob']));
		$total_exp  = $row['total_exp'];
		$total_exp_yrs = explode(".", $total_exp);
		
		if($total_exp == '0'){
			$smarty->assign('year_of_exp',0);
			$smarty->assign('month_of_exp',0);
		}else if(empty($total_exp_yrs[1])){
			$smarty->assign('year_of_exp',$total_exp_yrs[0]);
			$smarty->assign('month_of_exp',0);
		}else{
			$smarty->assign('year_of_exp',$total_exp_yrs[0]);
			$smarty->assign('month_of_exp',$total_exp_yrs[1]);
		}
		$smarty->assign('rows',$row);
		// assign the db values into session
		foreach($row as $key => $record){
			$smarty->assign($key,$record);		
		}   
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}	
	
	$query = "CALL get_res_edu_byid('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get resume education');
		}
		$edu_tot = 0;
		while($row = $mysql->display_result($result)){

			// post of assign asset fields value
			$collegeData[$edu_tot] = $row['college'];
			$qualificationData[$edu_tot] = $row['resume_program_id'];
			$specializationData[$edu_tot] = $row['resume_spec_id'];
			$degreeData[$edu_tot] = $row['resume_degree_id'];
			$gradeData[$edu_tot] = $row['percent_mark'];
			$grade_typeData[$edu_tot] = $row['course_type'];
			$year_of_passData[$edu_tot] = $row['year_passing'];
			$universityData[$edu_tot] = $row['university'];
			$edu_tot++;
		}	
		
		$smarty->assign('collegeData', $collegeData);
		$smarty->assign('universityData', $universityData);
		$smarty->assign('gradeData', $gradeData);
		$smarty->assign('grade_typeData', $grade_typeData);
		$smarty->assign('year_of_passData', $year_of_passData);
		$smarty->assign('qualificationData', $qualificationData);
		$smarty->assign('specializationData', $specializationData);
		$smarty->assign('degreeData', $degreeData);
		$smarty->assign('eduCount', $edu_tot);
		
		$smarty->assign('totCount_edu', $edu_tot);
		
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	
	$query = "CALL get_res_exp_byid('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get resume exp');
		}
		$tot = 0;
		while($row = $mysql->display_result($result)){
			// post of assign asset fields value
			$total_experience = $row['experience'];
			if($total_experience == '0'){
				$year_of_expData[$tot] = '0';
				$month_of_expData[$tot] = '0';
			}else{
				$total_yr_exp = explode(".", $total_experience);
				$year_of_expData[$tot] = $total_yr_exp[0];
				$month_of_expData[$tot] = $total_yr_exp[1];
			}
			
			$desigData[$tot] = $row['designation_id'];
			$areaData[$tot] = $row['skills'];
			$companyData[$tot] = $row['company'];
			$locationData[$tot] = $row['work_location'];
			$vitalData[$tot] = $row['other_info'];			
			$tot++;
		}
			
		$smarty->assign('desigData', $desigData);
		$smarty->assign('areaData', $areaData);
		$smarty->assign('year_of_expData', $year_of_expData);
		$smarty->assign('month_of_expData', $month_of_expData);
		$smarty->assign('companyData', $companyData);
		$smarty->assign('locationData', $locationData);
		$smarty->assign('vitalData', $vitalData);
		$smarty->assign('expCount', $tot);

		$smarty->assign('totCount_exp', $tot);
		
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

$edu = $_POST['edu_count'] ? $_POST['edu_count'] : $edu_tot;
// post of education fields value
for($i = 0; $i < $edu; $i++){
	$quali[] = $_POST['qualification_'.$i] ? $_POST['qualification_'.$i] : $qualificationData[$i];
	$degree[] = $_POST['degree_'.$i] ? $_POST['degree_'.$i] : $degreeData[$i];
	// smarty drop down for degree
	$degreeD = array();
	$query ="CALL get_resume_degree_program('".$quali[$i]."')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing degree program');
		}
		while($obj = $mysql->display_result($result)){
			$degreeD[$obj['id']] = $obj['degree'];  	   
		}

		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	
		$degree_data[] = $degreeD;
		
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	
	$degree_id = $_POST['degree_'.$i] ? $_POST['degree_'.$i] : $degreeData[$i];
	// smarty drop down for Specialization
	$specializationData2 = array();
	$query ="CALL get_resume_spec_degree('".$degree_id."')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing spec.');
		}
		while($obj = $mysql->display_result($result)){ 
			$specializationData2[$obj['id']] = $obj['spec'];  	   
		}
		
		$spec_data[] = $specializationData2;
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	
	$spec[] = $_POST['specialization_'.$i] ? $_POST['specialization_'.$i] : $specializationData[$i];
}

$smarty->assign('spec_data', $spec_data);
$smarty->assign('degreeData', $degree_data);
$smarty->assign('degree', $degree);
$smarty->assign('spec', $spec);

if(!empty($_POST)){
	
	// post of education fields value
	for($i = 0; $i < $_POST['edu_count']; $i++){
		
		$collegeData[] = $_POST['college_'.$i];
		$qualificationData[] = $_POST['qualification_'.$i];
		$specializationData[] = $_POST['specialization_'.$i];
		$degreeData[] = $_POST['degree_'.$i];
		$gradeData[] = $_POST['grade_'.$i];
		$grade_typeData[] = $_POST['grade_type_'.$i];
		$year_of_passData[] = $_POST['year_of_pass_'.$i];
		$universityData[] = $_POST['university_'.$i];
			
		// array for printing correct field name in error message 
		$fieldtype = array('1','1','1', '1'); 
		$actualfield = array('qualification', 'degree', 'specialization', 'year of passing'); 
		$field_ar = array('qualification_'.$i => 'qualificationErr', 'degree_'.$i => 'degreeErr',
   		   'specialization_'.$i => 'specializationErr', 'year_of_pass_'.$i => 'year_of_passErr'); 
		$j = 0;
		foreach($field_ar as $field => $er_var){ 
			if($_POST[$field] == ''){
				$error_msg = $fieldtype[$j] ? ' select the ' : ' enter the ';
				$actual_field =  $actualfield[$j];
				$er[$i][$er_var] = 'Please'. $error_msg .$actual_field;
				$test = 'error';
				$tab2 = 'fail';
			}
			$j++;
		} 
	}
	$smarty->assign('collegeData', $collegeData);
	$smarty->assign('universityData', $universityData);
	$smarty->assign('gradeData', $gradeData);
	$smarty->assign('grade_typeData', $grade_typeData);
	$smarty->assign('year_of_passData', $year_of_passData);
	$smarty->assign('qualificationData', $qualificationData);
	$smarty->assign('eduCount', $_POST['edu_count']);
	$smarty->assign('eduErr',$er);

	// post of experience fields value
	for($i = 0; $i < $_POST['exp_count']; $i++){
		
		$desigData[] = $_POST['desig_'.$i];
		$areaData[] = $_POST['area_'.$i];
		$year_of_expData[] = $_POST['year_of_exp_'.$i];
		$month_of_expData[] = $_POST['month_of_exp_'.$i];
		$companyData[] = $_POST['company_'.$i];
		$locationData[] = $_POST['location_'.$i];
		$vitalData[] = $_POST['vital_'.$i];
		
		if($_POST['year_of_exp'] == 0 && $_POST['month_of_exp'] == 0){
			// array for printing correct field name in error message 
			$fieldtype1 = array('0', '1', '0', '0', '0'); 
			$actualfield1 = array( 'designation','employment period','area of specialization/expertise',
				'company name','location'); 
			$field_ar1 = array('desig_'.$i => '', 'year_of_exp_'.$i => '',
				'area_'.$i => '', 'company_'.$i => '','location_'.$i => ''); 
			$j = 0; 
			foreach($field_ar1 as $field1 => $er_var1){ 
				if($_POST[$field1] == ''){
					$error_msg1 = $fieldtype1[$j] ? ' select the ' : ' enter the ';
					$actual_field1 =  $actualfield1[$j];
				}
				$j++;
			}
		}else{
			// array for printing correct field name in error message 
			$fieldtype1 = array('0', '1', '0', '0', '0'); 
			$actualfield1 = array( 'designation','employment period','area of specialization/expertise',
				'company name','location'); 
			$field_ar1 = array('desig_'.$i => 'desigErr', 'year_of_exp_'.$i => 'year_of_expErr',
			'area_'.$i => 'areaErr', 'company_'.$i => 'companyErr','location_'.$i => 'locationErr'); 
			$j = 0; 
			foreach($field_ar1 as $field1 => $er_var1){ 
				if($_POST[$field1] == ''){
					$error_msg1 = $fieldtype1[$j] ? ' select the ' : ' enter the ';
					$actual_field1 =  $actualfield1[$j];
					$er1[$i][$er_var1] = 'Please'. $error_msg1 .$actual_field1;
					$test = 'error';
					$tab3 = 'fail';
				}
				$j++;
			}
		}
	}

	$smarty->assign('desigData', $desigData);
	$smarty->assign('areaData', $areaData);
	$smarty->assign('year_of_expData', $year_of_expData);
	$smarty->assign('month_of_expData', $month_of_expData);
	$smarty->assign('companyData', $companyData);
	$smarty->assign('locationData', $locationData);
	$smarty->assign('vitalData', $vitalData);
	$smarty->assign('expCount', $_POST['exp_count']);
	$smarty->assign('expErr',$er1);
		
	// mobile validation
	if($fun->is_phonenumber($_POST['mobile']) || $fun->size_of_phonenumber($_POST['mobile'])){
		$mobileErr = 'Please enter the valid mobile';
    	$smarty->assign('mobileErr',$mobileErr);
    	$test = 'error';
	}
	
	// email validation
	if($fun->email_validation($_POST['email'])){
		$emailErr = 'Please enter the valid email id';
    	$smarty->assign('emailErr',$emailErr);
    	$test = 'error';
	}
	
	$position = $_POST['position'] ? $_POST['position'] : $row['position'];
	
	// array for printing correct field name in error message
	$fieldtype = array('0', '0','0','0','0', '0','1','1','0', '0','0','1', '1','1','0','0');
	$actualfield = array('first name', 'last name','email', 'mobile','dob',
						'current designation', 'total years of experience','total months of experience',
						'present CTC','expected CTC','present CTC type','expected CTC type',
						'notice period','gender', 'present location');
   $field = array('first_name' => 'first_nameErr', 'last_name' => 'last_nameErr','email' => 'emailErr',
    'mobile' => 'mobileErr','dob' => 'dobErr',
    'designation_id' => 'positionErr','year_of_exp' => 'year_of_expErr', 'month_of_exp' => 'month_of_expErr',
    'present_ctc' => 'present_ctcErr','expected_ctc' => 'expected_ctcErr',
	'present_ctc_type' => 'present_ctc_typeErr','expected_ctc_type' => 'expected_ctc_typeErr',
	'notice_period' => 'notice_periodErr','gender' => 'genderErr',
	'present_location' => 'present_locationErr');
	$j = 0;
	foreach ($field as $field => $er_var){ 
		if($_POST[$field] == ''){
			$error_msg = $fieldtype[$j] ? ' select the ' : ' enter the ';
			$actual_field =  $actualfield[$j];
			$er[$er_var] = 'Please'. $error_msg .$actual_field;
			$test = 'error';
			$tab1 = 'fail';
			$smarty->assign($er_var,$er[$er_var]);
		}else{
			$smarty->assign($field,$_POST[$field]);
		}
			$j++;
	}
	

	// save all the data
	/*if($test != 'error'){
		echo 'save data';
	}else{
		$smarty->assign('tab_open', ($tab1 == 'fail' ? 'tab1' : ($tab2 == 'fail' ? 'tab2' : ($tab3 == 'fail' ? 'tab3' : '' ))));
	}*/
	
	// assigning the date
	$date =  $fun->current_date();
	$modified_by = $_SESSION['user_id'];
	$total_exp = $_POST['year_of_exp'].'.'.$_POST['month_of_exp'];
	
	// save all the data
	if($test != 'error'){
		// query to add personal details
		$query = "CALL edit_res_personal('$getid','".$fun->is_white_space($mysql->real_escape_str($_POST['first_name']))."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['last_name']))."',
			'".$mysql->real_escape_str($_POST['email'])."','".$mysql->real_escape_str($_POST['mobile'])."',
			'".$fun->is_white_space($mysql->real_escape_str($fun->convert_date($_POST['dob'])))."',
			'".$mysql->real_escape_str($_POST['gender'])."','".$fun->is_white_space($mysql->real_escape_str($_POST['present_ctc']))."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['expected_ctc']))."','".$mysql->real_escape_str($_POST['present_ctc_type'])."',
			'".$mysql->real_escape_str($_POST['expected_ctc_type'])."','".$mysql->real_escape_str($_POST['marital_status'])."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['present_location']))."','".$fun->is_white_space($mysql->real_escape_str($_POST['native_location']))."',
 			'".$mysql->real_escape_str($_POST['notice_period'])."','".$mysql->real_escape_str($_POST['designation_id'])."',
 			'".$fun->is_white_space($mysql->real_escape_str($_POST['family']))."','".$mysql->real_escape_str($total_exp)."',
 			'".$date."','".$modified_by."','N',
 			'".$fun->is_white_space($mysql->real_escape_str($_POST['consultant']))."',
 			'".$fun->is_white_space($mysql->real_escape_str($_POST['interview_availability']))."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['certification']))."')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in adding personal details');
			}
			$row = $mysql->display_result($result);
			$resume_id = $row['affected_rows'];
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		/*
		// query to add position for details
		$query = "CALL edit_req_resume_position('".$modified_by."','".$date."',
			'".$mysql->real_escape_str($_POST['position_for'])."','$getid')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in adding position details');
			}
			$row = $mysql->display_result($result);
			$position_id = $row['affected_rows'];
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		*/
		
		// query to delete education details
		$query = "CALL delete_res_edu('$getid')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in deleting education details');
			}
			$row = $mysql->display_result($result);
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		for($i = 0; $i < $_POST['edu_count']; $i++){
			
			$collegeData = $_POST['college_'.$i];
			$specializationData = $_POST['specialization_'.$i];
			$degreeData = $_POST['degree_'.$i];
			$gradeData = $_POST['grade_'.$i];
			$grade_typeData = $_POST['grade_type_'.$i];
			$year_of_passData = $_POST['year_of_pass_'.$i];
			$universityData = $_POST['university_'.$i];
			
			// get degree name
			$query = "call get_degree_id('".$mysql->real_escape_str($degreeData)."')";
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in getting degree name');
			}
			$row = $mysql->display_result($result);
			$degreeStr = $row['degree'];
			$mysql->next_query();
			// get specialization name
			$query = "call get_spec_id('".$mysql->real_escape_str($specializationData)."')";
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in getting spec. name');
			}
			$row = $mysql->display_result($result);
			$specStr = $row['spec'];
			$mysql->next_query();
			$course_type = $fun->get_course_type($grade_typeData);
			$gradeStr = $gradeData > 10 ? $gradeData.'% of marks overall' : $gradeData.' CGPA';
			// for snapshot printing
			$snap_edu .= $degreeStr.', '.$specStr.', '.$year_of_passData.', '.$gradeStr.', '.$course_type.'<br>';
			
			// query to add education details
			$query = "CALL add_res_education('".$fun->is_white_space($mysql->real_escape_str($gradeData))."',
				'".$mysql->real_escape_str($year_of_passData)."','".$fun->is_white_space($mysql->real_escape_str($collegeData))."',
				'".$mysql->real_escape_str($grade_typeData)."','".$fun->is_white_space($mysql->real_escape_str($universityData))."',
				'".$date."','N','".$mysql->real_escape_str($degreeData)."',
				'".$mysql->real_escape_str($specializationData)."','$getid')";
			try{
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in adding education details');
				}
				$row = $mysql->display_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}
		$edu_id = $row['inserted_id'];
		
		// get and insert is recent field
		$query = "CALL get_is_recent_edu('".$getid."')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in getting is recent details');
			}
			$row = $mysql->display_result($result);
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		// query to edit education
		$query = "CALL edit_edu_is_recent('".$row['id']."')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in editing is recent details');
			}
			$row = $mysql->display_result($result);
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		// query to delete experience details
		$query = "CALL delete_res_exp('$getid')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in deleting experience details');
			}
			$row = $mysql->display_result($result);
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		for($i = 0; $i < $_POST['exp_count']; $i++){
			$desigData = $_POST['desig_'.$i];
			$expData = $_POST['year_of_exp_'.$i].'.'.$_POST['month_of_exp_'.$i];
			$areaData = $_POST['area_'.$i];
			$companyData = $_POST['company_'.$i];
			$locationData = $_POST['location_'.$i];
			$vitalData = $_POST['vital_'.$i];
			
			// for snapshot printing
			$tot_exp_years = $_POST['year_of_exp_'.$i] == 0 ? '0' : $_POST['year_of_exp_'.$i].'.'.$_POST['month_of_exp_'.$i];
			$expStr = $fun->show_exp_details($tot_exp_years);
			$locationDataCase = ucwords($locationData);
			// get the designation details
			$query = "call get_designation_id('".$mysql->real_escape_str($desigData)."')";
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in getting desig. name');
			}
			$row = $mysql->display_result($result);
			$desigStr = $row['desig'];
			$mysql->next_query();
			$snap_exp .= ucwords($companyData).', '.ucwords($desigStr).', '.$expStr.'<br>';
			$snap_skill .= $vitalData.' ';
			
			// query to add experience details
			$query = "CALL add_res_experience('".$mysql->real_escape_str($desigData)."','".$mysql->real_escape_str($expData)."',
				'".$fun->is_white_space($mysql->real_escape_str($locationData))."',
				'".$fun->is_white_space($mysql->real_escape_str($areaData))."',
				'".$fun->is_white_space($mysql->real_escape_str($companyData))."',
				'".$fun->is_white_space($mysql->real_escape_str($vitalData))."','N','$getid')";
			try{
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in adding experience details');
				}
				$row = $mysql->display_result($result);
				$exp_id = $row['inserted_id'];
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}
		if(!empty($edu_id) && !empty($exp_id) && !empty($resume_id)){
			// echo 'save data';die;
			// create snapshot pdf
			include_once('snapshot.php');
			// convert the resume doc. into pdf
			require_once('vendor/ilovepdf-php-1.1.5/init.php');			
			ini_set('display_errors', '1');
			// you can call task class directly
			// to get your key pair, please visit https://developer.ilovepdf.com/user/projects
			$ilovepdf = new Ilovepdf('project_public_30e4ef2596c7436ae907615a841f995b_J4pWwe338d0756271411b0769ee277075a664','secret_key_9d6d00d05185d32c499082fc7e008ba1_fovTb7e8e14419dee395103d2b71d6b7e7175');
			// Create a new task
			$myTaskConvertOffice = $ilovepdf->newTask('officepdf');
			// Add files to task for upload
			$resume_path = dirname(__FILE__).'/uploads/resume/'.$_SESSION['resume_doc'];
			$file1 = $myTaskConvertOffice->addFile($resume_path);
			// Execute the task
			$myTaskConvertOffice->execute();
			// Download the package files
			$myTaskConvertOffice->download('uploads/resumepdf/');   
			// include('vendor/ilovepdf-php-1.1.5/samples/resume.php');
			// merge the snapshot pdf and resume pdf
			// and get the task tool
			$myTask = $ilovepdf->newTask('merge');
			// file var keeps info about server file id, name...
			// it can be used latter to cancel a specific file
			$fileA = $myTask->addFile(dirname(__FILE__).'/uploads/snapshot/'.$snap_file_name.'.pdf');
			$fileB = $myTask->addFile(dirname(__FILE__).'/uploads/resumepdf/'.$snap_file_name.'.pdf');
			$myTask->setOutputFilename($snap_file_name.'_{date}');
			// process files
			$myTask->execute();
			// and finally download file. If no path is set, it will be downloaded on current folder
			$myTask->download('uploads/snapshotmerged/');
			header('Location: ../resume/?action=modified');

		} 
	}else{
		$smarty->assign('tab_open', ($tab1 == 'fail' ? 'tab1' : ($tab2 == 'fail' ? 'tab2' : ($tab3 == 'fail' ? 'tab3' : 'tab4' ))));
	}
}

// smarty drop down array for status
$smarty->assign('grade_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));
// smarty drop down array for type
$smarty->assign('grade_type', array('' => 'Select', 'I' => 'Individual', 'T' => 'Team'));

// smarty drop down array for experience year 
$exp_yr = array(); 
for($l = 1; $l <= 50; $l++){ 
$exp_yr[0] = '0 Years';
	if($l == '1') {
		$exp_yr[$l] = $l.' '.Year; 
	}else {
		$exp_yr[$l] = $l.' '.Years; 
	}
} 
$smarty->assign('exp_yr', $exp_yr);
// smarty drop down array for experience month 
$exp_month = array(); 
$exp_month[0] = '0 Months';

for($l = 1; $l <= 11; $l++){
	if($l == '1') {
		$exp_month[$l] = $l.' '.Month;
	}else { 
		$exp_month[$l] = $l.' '.Months; 
	} 
}
$smarty->assign('exp_month', $exp_month);

// smarty drop down array for current ctc
$smarty->assign('ctc_type', array('' => 'Select', 'T' => 'Thousand', 'L' => 'Lacs', 'C' => 'Crore'));

// smarty drop down array for notice period  
$smarty->assign('n_p' , $notice_period = array('' => 'Select','0' => 'Immediate', '15' => '15 Days', '30' => '30 Days', 
 '45' => '45 Days', '60' => '2 Months', '90' => '3 Months', '120' => '4 Months',
 '150' => '5 Months', '180' => '6 Months'));

// query to fetch all program details. 
$query = 'CALL get_qual_program()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting program qualifications');
	}
	while($row = $mysql->display_result($result))
	{
 		$program_name[$row['id']] = ucwords($row['program']);
	}
	$smarty->assign('qual',$program_name);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

/*if(!empty($qualificationData)){
	$qualificationData = array();
		// smarty drop down for degree.
	foreach($qualificationData as $key => $qualification_id){
		$query = "CALL get_resume_degree_program('".$qualification_id."')";
		try{
			// calling mysql exe_query function
			if(!$result = $mysql->execute_query($query)){ 
				throw new Exception('Problem in executing get degree');
			}
			while($degree = $mysql->display_result($result)){
   		 	$degrees[$degree['id']] = ucfirst($degree['degree']);    		 
			}
			$smarty->assign('degrees',$degrees);
			// free the memory
			$mysql->clear_result($result);
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
}else{
	// smarty drop down for hardware inventory.
	$query = "CALL get_resume_degree_program('')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get degree');
		}
		while($degree = $mysql->display_result($result)){
   	 	$degrees[$degree['id']] = ucfirst($degree['degree']);    		 
		}
		$smarty->assign('degrees',$degrees);
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}*/

// query to fetch position details. 
$query = 'CALL get_requirements()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting requirement');
	}
	while($row = $mysql->display_result($result))
	{
 		$requirement[$row['id']] = ucwords($row['job_title']);
	}
	$smarty->assign('requirement',$requirement);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// smarty drop down array for grade type
$smarty->assign('grade_drop', array('' => 'Select', 'R' => 'Regular', 'C' => 'Correspondence'));
 
// smarty drop down array for year of passing 
$year_of_pass = array(); 
for($l = 2020; $l >= 1990; $l--){
	$year_of_pass[$l] = $l;
}
$smarty->assign('year_of_pass', $year_of_pass);
 
// query to fetch all employee names. 
$query = 'CALL get_employee()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting employee details');
	}
	while($row = $mysql->display_result($result))
	{
 		$emp_name[$row['id']] = ucwords($row['emp_name']);
	}
	$smarty->assign('emp_name',$emp_name);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// query to fetch client and position details. 
$query = "CALL get_res_client_details('".$_SESSION['clients_id']."','".$_SESSION['position_for']."')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting client and position details');
	}
	while($row = $mysql->display_result($result))
	{
 		$position = ucwords($row['job_title']).' ( '.($row['client_name']).' )';
	}
	$smarty->assign('position',$position);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// query to fetch all designation. 
$query = 'CALL get_designation()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting designation details');
	}
	while($row = $mysql->display_result($result))
	{
 		$desig_name[$row['id']] = ucwords($row['desig']);
	}
	$smarty->assign('desig_name',$desig_name);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// query to fetch all sharing type. 
$query = 'CALL get_sharing()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting type');
	}
	
	while($row = $mysql->display_result($result))
	{
 		$type_name[$row['id'].'-'.$row['percent']] = $row['type'];
	}
	$smarty->assign('type_name',$type_name);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
} 

// closing mysql
$mysql->close_connection();

// assign page title
$smarty->assign('page_title' , 'Edit Resume - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('resume_active','active');
// display smarty file
$smarty->display('edit_resume.tpl');
?>