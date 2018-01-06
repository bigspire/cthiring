<?php
/* 
Purpose : To add resume.
Created : Nikitasa
Date : 09-03-2017
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

if(empty($_SESSION['resume_doc_id'])){
	header('Location: ../?access=invalid');
}

// when doc. extraction happen in first time
if($_SESSION['extraction'] == '' || $_POST['RESUME_DATA'] == ''){
	// fetch the resume data
	$uploaddir = 'uploads/resume/'; 
	$resume_data = $fun->read_document($uploaddir.$_SESSION['resume_doc']);
	$smarty->assign('RESUME_DATA', $resume_data);	
	$_SESSION['extraction'] = 'done';
}else{
	$smarty->assign('RESUME_DATA', $_POST['RESUME_DATA']);
	$resume_data = $_POST['RESUME_DATA'];
}
// extract the mobile
$string = preg_replace("#[^\d{12}\s]#",'',$resume_data);
preg_match_all("#(\d{12}|\d{11}|\d{10})#", $string, $found);	
foreach($found as $key => $phone_number) {
	  if(strlen($phone_number[$key]) >= 10){ 
		$mobile = $phone_number[$key];
		break;
	  };
	  // save for hiding contacts
	  $phone_nos = $phone_number;
}
	
// extract the email
$string = preg_split("/[\s,]+/", $resume_data);
foreach($string as $mail){
	if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
		// continue;
	}else{
		$mail_ids[] = $mail;
		// break;
		$email = $mail;
	}
}	
	
	
// extract the candidate name
foreach($string as $name_key => $name){
	$name = trim(strtolower($name));
	if($name != 'name' && $name != 'name:' && $name != 'vitae' && $name != 'curriculam' && $name != 'curriculum' && $name != 'vitae' && $name != 'RESUME' && $name != ''
		&& $name != 'mailing' && $name != 'address' && $name != ':' && $name != '' && !is_numeric($name)){
			break;
	}else{
		continue;
	}
}
	
$smarty->assign('first_name', ucfirst(strtolower($string[$name_key])));
$smarty->assign('last_name', ucfirst(strtolower($string[$name_key+1])));
$smarty->assign('email', $email);
$smarty->assign('mobile', $mobile);


$smarty->assign('dob_default', date('d/m/Y', strtotime('-18 years')));
// role based validation
$module_access = $fun->check_role_access('7',$modules);
$smarty->assign('module',$module_access);

// get the skills for rating
$query ="CALL get_tech_skills('".$_SESSION['position_for']."')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing tech skills');
		}
		while($obj = $mysql->display_result($result)){
			$skilData['ts'] = $obj['tech_skill'];
			$skilData['bs'] = $obj['behav_skill'];  			
		}
		// split the keywords
		$ts_data = explode(',',$skilData['ts']);
		$bs_data = explode(',',$skilData['bs']);
		// assign in smarty
		$smarty->assign('tsData', $ts_data);
		$smarty->assign('bsData', $bs_data);
		
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();		
			
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}


// post of education fields value
for($i = 0; $i < $_POST['edu_count']; $i++){
	$quali[] = $_POST['qualification_'.$i];
	$degree[] = $_POST['degree_'.$i];
	// smarty drop down for degree
	$query ="CALL get_resume_degree_program('".$quali[$i]."')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing degree program');
		}
		while($obj = $mysql->display_result($result)){
			$degreeData[$obj['id']] = $obj['degree'];  	   
		}
	
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
		
		$degree_data[] = $degreeData;
			
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	
	$degree_id = $_POST['degree_'.$i];
	// smarty drop down for Specialization
	$query ="CALL get_resume_spec_degree('".$degree_id."')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing spec.');
		}
		while($obj = $mysql->display_result($result)){ 
			$specializationData[$obj['id']] = $obj['spec'];  	   
		}
		
		$spec_data[] = $specializationData;
		

		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	
	$spec[] = $_POST['specialization_'.$i];
}

$smarty->assign('spec_data', $spec_data);
$smarty->assign('degreeData', $degree_data);
$smarty->assign('degree', $degree);
$smarty->assign('spec', $spec);

// query to fetch client and position details. 
$query = "CALL get_res_client_details('".$_SESSION['client']."','".$_SESSION['position_for']."')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting client and position details');
	}
	while($row = $mysql->display_result($result))
	{
 		$requirement = ucwords($row['job_title']).' ( '.($row['client_name']).' )';
		
		$position = ucwords($row['job_title']).' ( '.($row['client_name']).' )';
		$client_autoresume = $row['client_name'];
		$position_autoresume = $row['job_title'];
		$state_autoresume = $row['state'];
		$city_autoresume = $row['city'];
		$hide_contact = $row['hide_contact'];
	}
	$smarty->assign('requirement',$requirement);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}


if(!empty($_POST)){
	// for retaining skills and rating
	$smarty->assign('tsrData', $_POST['tsr']);
	$smarty->assign('bsrData', $_POST['bsr']);
	// validate tech skills rating
	foreach($_POST['tsr'] as $rate){
		if($rate == ''){
			$test = 'error';
			$smarty->assign('techErr', 'Please rate all the technical skills');
		}
	}
	// validate behavioural skills rating
	foreach($_POST['bsr'] as $rate){
		if($rate == ''){
			$test = 'error';
			$smarty->assign('behavErr', 'Please rate all the behavioural skills');
		}
	}	
	// post of education fields value
	for($i = 0; $i < $_POST['edu_count']; $i++){
				
		$collegeData[] = $_POST['college_'.$i];
		$qualificationData[] = $_POST['qualification_'.$i];
		$degreeData[] = $_POST['degree_'.$i];
		$specializationData[] = $_POST['specialization_'.$i];
		$gradeData[] = $_POST['grade_'.$i];
		$grade_typeData[] = $_POST['grade_type_'.$i];
		$year_of_passData[] = $_POST['year_of_pass_'.$i];
		$universityData[] = $_POST['university_'.$i];
	
		// array for printing correct field name in error message 
		$fieldtype = array('1','1', '1', '1'); 
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
		$from_year_of_expData[] = $_POST['from_year_of_exp_'.$i];
		$from_month_of_expData[] = $_POST['from_month_of_exp_'.$i];
		$to_year_of_expData[] = $_POST['to_year_of_exp_'.$i];
		$to_month_of_expData[] = $_POST['to_month_of_exp_'.$i];
		//$current_locData[] = $_POST['current_loc_'.$i];
		$companyData[] = $_POST['company_'.$i];
		$locationData[] = $_POST['location_'.$i];
		$vitalData[] = $_POST['vital_'.$i];
		
		if($_POST['year_of_exp'] == 0 && $_POST['month_of_exp'] == 0){
			// array for printing correct field name in error message 
			$fieldtype1 = array('1', '1','1','1','1', '0', '0', '0'); 
			$actualfield1 = array('designation','employment from year','employment from month',
				'employment to year','employment to month','area of specialization/expertise',
				'company name','location'); 
			$field_ar1 = array('desig_'.$i => '','from_year_of_exp_'.$i => '',
			'from_month_of_exp_'.$i => '','to_year_of_exp_'.$i => '',
			'to_month_of_exp_'.$i => '','area_'.$i => '', 'company_'.$i => '','location_'.$i => ''); 
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
			$fieldtype1 = array('1', '1','1','1','1', '0', '0', '0'); 
			$actualfield1 = array( 'designation','employment from year','employment from month',
		        'employment to year','employment to month','area of specialization/expertise',
				'company name','location'); 
			$field_ar1 = array('desig_'.$i => 'desigErr','from_year_of_exp_'.$i => 'from_year_of_expErr',
			'from_month_of_exp_'.$i => 'from_month_of_expErr','to_year_of_exp_'.$i => 'to_year_of_expErr',
			'to_month_of_exp_'.$i => 'to_month_of_expErr','area_'.$i => 'areaErr', 'company_'.$i => 'companyErr','location_'.$i => 'locationErr'); 
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
	$smarty->assign('from_year_of_expData', $from_year_of_expData);
	$smarty->assign('from_month_of_expData', $from_month_of_expData);
	$smarty->assign('to_year_of_expData', $to_year_of_expData);
	$smarty->assign('to_month_of_expData', $to_month_of_expData);
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
	
	
	// array for printing correct field name in error message
	$fieldtype = array('0', '0','0','0','0', '0','1','1','0', '0','0','1','1','1','0','0');
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
	
	// array for printing correct field name in error message for consultant
	$fieldtype1 = array('0','0');
	$actualfield1 = array('interview availability', 'consultant assessment');
	$field1 = array('interview_availability' => 'interview_availabilityErr','consultant' => 'consultantErr');
	$j = 0;
	foreach ($field1 as $field1 => $er_var){ 
		if($_POST[$field1] == ''){
			$error_msg1 = $fieldtype1[$j] ? ' select the ' : ' enter the ';
			$actual_field1 =  $actualfield1[$j];
			$er1[$er_var] = 'Please'. $error_msg1 .$actual_field1;
			$test = 'error';
			$tab4 = 'fail';
			$smarty->assign($er_var,$er1[$er_var]);
		}else{
			$smarty->assign($field1,$_POST[$field1]);
		}
			$j++;
	}
	
	// save all the data
	/*if($test != 'error'){
		echo 'save data';
	}else{
		$smarty->assign('tab_open', ($tab1 == 'fail' ? 'tab1' : ($tab2 == 'fail' ? 'tab2' : ($tab3 == 'fail' ? 'tab3' : '' ))));
	}*/
	
	
	// query to check whether it is exist or not. 
	$query = "CALL check_resume_exist('0', '".$fun->is_white_space($mysql->real_escape_str($_POST['email']))."',
	'".$fun->is_white_space($mysql->real_escape_str($_POST['mobile']))."')";
	// Calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing to check resume exist');
		}
		$check = $mysql->display_result($result);
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	
	
	// assigning the date
	$date =  $fun->current_date();
	$created_by = $_SESSION['user_id'];
	$total_exp = $_POST['year_of_exp'].'.'.$_POST['month_of_exp'];
	// save all the data
	if($test != 'error'){
	  if($check['total'] == '0'){
		// for saving purpose of tech skills
		foreach($_POST['ts'] as $key => $ts){ 
			if($ts){
				$ts_data2[$ts] = $_POST['tsr'][$key];
			}
		}

		// for saving purpose of behav skills
		foreach($_POST['bs'] as $key => $bs){
			if($bs){
				$bs_data2[$bs] = $_POST['bsr'][$key];
			}
		}
		$tech_skill = serialize($ts_data2);
		$behav_skill = serialize($bs_data2);
		// query to add personal details
		$query = "CALL add_res_personal('".$fun->is_white_space($mysql->real_escape_str($_POST['first_name']))."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['last_name']))."',
			'".$mysql->real_escape_str($_POST['email'])."','".$mysql->real_escape_str($_POST['mobile'])."',
			'".$fun->is_white_space($mysql->real_escape_str($fun->convert_date($_POST['dob'])))."',
			'".$mysql->real_escape_str($_POST['gender'])."','".$fun->is_white_space($mysql->real_escape_str($_POST['present_ctc']))."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['expected_ctc']))."','".$mysql->real_escape_str($_POST['present_ctc_type'])."',
			'".$mysql->real_escape_str($_POST['expected_ctc_type'])."','".$mysql->real_escape_str($_POST['marital_status'])."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['present_location']))."','".$fun->is_white_space($mysql->real_escape_str($_POST['native_location']))."',
 			'".$mysql->real_escape_str($_POST['notice_period'])."','".$mysql->real_escape_str($_POST['designation_id'])."',
 			'".$fun->is_white_space($mysql->real_escape_str($_POST['family']))."','".$mysql->real_escape_str($total_exp)."',
 			'".$date."','".$created_by."','N','".$mysql->real_escape_str($_SESSION['resume_doc_id'])."',
 			'".$fun->is_white_space($mysql->real_escape_str($_POST['consultant']))."',
 			'".$fun->is_white_space($mysql->real_escape_str($_POST['interview_availability']))."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['certification']))."','".$tech_skill."',
			'".$behav_skill."','".$fun->is_white_space($mysql->real_escape_str($_POST['other_input']))."')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in adding personal details');
			}
			$row = $mysql->display_result($result);
			$resume_id = $row['inserted_id'];
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		// generate resume code
		$code = 'MH'.$resume_id;
		// query to add resume code
		$query = "CALL edit_resume_code('".$resume_id."','".$code."')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in adding resume code');
			}
			$row = $mysql->display_result($result);
			$res_id = $row['affected_rows'];
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}

		// query to add position for details
		$query = "CALL add_req_resume_position('".$created_by."','".$date."',
			'".$mysql->real_escape_str($_SESSION['position_for'])."','".$resume_id."','Validation - Account Holder','Pending')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in adding position details');
			}
			$row = $mysql->display_result($result);
			$position_id = $row['inserted_id'];
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
			$gradeStr = $gradeData > 10 ? $gradeData.'%' : $gradeData;
			// for snapshot printing
			$snap_edu .= $degreeStr.', '.$specStr.', '.$year_of_passData.', '.$gradeStr.'<br>';

			
			// query to add education details
			$query = "CALL add_res_education('".$fun->is_white_space($mysql->real_escape_str($gradeData))."',
				'".$mysql->real_escape_str($year_of_passData)."','".$fun->is_white_space($mysql->real_escape_str($collegeData))."',
				'".$mysql->real_escape_str($grade_typeData)."','".$fun->is_white_space($mysql->real_escape_str($universityData))."',
				'".$date."','N','".$mysql->real_escape_str($degreeData)."',
				'".$mysql->real_escape_str($specializationData)."','".$resume_id."')";
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
		$query = "CALL get_is_recent_edu('".$resume_id."')";
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
		
		for($i = 0; $i < $_POST['exp_count']; $i++){
			$desigData = $_POST['desig_'.$i];
			$from_year_expData = $_POST['from_year_of_exp_'.$i];
			$from_month_expData = $_POST['from_month_of_exp_'.$i];
			$to_year_expData = $_POST['to_year_of_exp_'.$i];
			$to_month_expData = $_POST['to_month_of_exp_'.$i];
			$areaData = $_POST['area_'.$i];
			//$current_locData[] = $_POST['current_loc_'.$i];
			$companyData = $_POST['company_'.$i];
			$locationData = $_POST['location_'.$i];
			$vitalData = $_POST['vital_'.$i];
			
			// for snapshot printing
			// $tot_exp_years = $_POST['year_of_exp_'.$i] == 0 ? '0' : $_POST['year_of_exp_'.$i].'.'.$_POST['month_of_exp_'.$i];

			// $expStr = $fun->show_exp_details($tot_exp_years);
			$expStr = date('M',$from_month_expData).' '.$from_year_expData.' to '.date('M',$to_month_expData).' '.$to_year_expData;
			$locationDataCase = ucwords($locationData);
			// get the designation details
			$query = "call get_designation_id('".$mysql->real_escape_str($desigData)."')";
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in getting desig. name');
			}
			$row = $mysql->display_result($result);
			$desigStr = $row['desig'];
			$mysql->next_query();
			$snap_exp .=  "<div style='margin-bottom:7px;'>".$expStr.'<br>'.ucwords($companyData).', '.ucwords($desigStr).', '.ucfirst($locationData).'</div>';
			$snap_skill .= $areaData.' ';
			$snap_exp = $from_month_expData == '' ? 'Fresher' : $snap_exp;
			
			// query to add experience details
			$query = "CALL add_res_experience('".$mysql->real_escape_str($desigData)."',
			'".$mysql->real_escape_str($from_month_expData)."',
				'".$mysql->real_escape_str($from_year_expData)."',
				'".$mysql->real_escape_str($to_month_expData)."',
				'".$mysql->real_escape_str($to_year_expData)."',
				'".$fun->is_white_space($mysql->real_escape_str($locationData))."',
				'".$fun->is_white_space($mysql->real_escape_str($areaData))."',
				'".$fun->is_white_space($mysql->real_escape_str($companyData))."',
				'".$fun->is_white_space($mysql->real_escape_str($vitalData))."','N','".$resume_id."')";
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
		
		// get and insert is recent exp field
		$query = "CALL get_is_recent_exp('".$resume_id."')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in getting is recent exp details');
			}
			$row = $mysql->display_result($result);
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		// query to insert is recent exp
		$query = "CALL edit_exp_is_recent('".$row['id']."')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in editing is recent exp details');
			}
			$row = $mysql->display_result($result);
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		// query to add req resume details
		$query = "CALL add_req_resume_status('Validation - Account Holder','Pending','".$created_by."','".$date."','".$position_id."')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in adding resume requirement status details');
			}
			$row = $mysql->display_result($result);
			$req_res_id = $row['inserted_id'];
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		// get requirement status details
		$query = "CALL get_requirement_status('".$_SESSION['position_for']."')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in getting requirement status details');
			}
			$row = $mysql->display_result($result);
			// free the memory
			$mysql->clear_result($result);
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		if($row['req_status_id'] == '0'){	
			// query to add req resume details
			$query = "CALL edit_requirement_status('1','".$_SESSION['position_for']."')";
			try{
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in adding requirement status details');
				}
				$row = $mysql->display_result($result);
				$requirement_id = $row['affected_rows'];
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}

		if(!empty($edu_id) && !empty($res_id) && !empty($exp_id) && !empty($resume_id) && !empty($position_id) && !empty($req_res_id)){
			
			echo $query =  "CALL get_personal_skills('$resume_id')";
			if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in getting skills details');
			}
			$per_skills = $mysql->display_result($result);
			$tech_skills = unserialize($per_skills['tech_skill_rate']);
			$beh_skills = unserialize($per_skills['behav_skill_rate']);
			// free the memory
			$mysql->clear_result($result);
			// call the next result
			$mysql->next_query();					
			
			// get recruiter nameget_recruiter_name
			$query =  "CALL get_recruiter_name('".$mysql->real_escape_str($_SESSION['user_id'])."')";
			if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in getting recruiter details');
			}
			$row_user = $mysql->display_result($result);
			$recruiter = $row_user['first_name'].' '.$row_user['last_name'];
			$recruiter_email = $row_user['email_id'];
			$getid = $resume_id;
			// free the memory
			$mysql->clear_result($result);
			// call the next result
			$mysql->next_query();	
			
			
			// query to get account holder details
			$query = "CALL get_accountholder_details('".$_SESSION['client']."')";
			try{
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in getting the AH Details');
				}
				while($account = $mysql->display_result($result)){
					$row_account[] = $account;
				}
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
			
			
			// update the account holders read status
			foreach($row_account as  $username) { 					
				// query to add req read details
				$query = "CALL add_req_read('".$_SESSION['position_for']."','".$username['ah_id']."','".$date."')";
				try{
					if(!$result = $mysql->execute_query($query)){
						throw new Exception('Problem in adding req read');
					}
					$row = $mysql->display_result($result);
					$req_read = $row['inserted_id'];
					// free the memory
					$mysql->clear_result($result);				
					// call the next result
					$mysql->next_query();
					// send mail to account holder
					$sub = "Manage Hiring -  Resume uploaded by " .$recruiter;
					$msg = $content->get_create_resume_mail($_POST,$client_autoresume,$position_autoresume,$recruiter,$recruiter_email,$username['ah_name'],$username['ah_email']);
					$mailer->send_mail($sub,$msg,$recruiter,$recruiter_email,$username['ah_name'],$username['ah_email']);
				}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
					
			}

			//echo 'save data';
			$_SESSION['extraction'] = '';			
			// create snapshot pdf
			include_once('snapshot.php');			
			//  introduction page processing
			$resume_path = dirname(__FILE__).'/uploads/introduction/'.$_SESSION['resume_doc'];
			$template_path = dirname(__FILE__).'/uploads/template/introduction.docx'; 
			include('vendor/PHPWord-develop/samples/template_process3.php');
		
			// for hiding the contacts
			if($hide_contact == '1'){
				// generate auto resume doc file
				$resume_path = dirname(__FILE__).'/uploads/resume/'.$_SESSION['resume_doc'];
				$template_path = dirname(__FILE__).'/uploads/template/'.$_SESSION['resume_doc']; 
				// duplicate the file for template creation
				$fun->upload_file($resume_path,$template_path);			
				include('vendor/PHPWord-develop/samples/template_process2.php');	
				// remove the file
				unlink($template_path);				
			}
			
			
			
			// convert the resume doc. into pdf
			require_once('vendor/ilovepdf-php-1.1.5/init.php');			
			// you can call task class directly
			// to get your key pair, please visit https://developer.ilovepdf.com/user/projects
			$ilovepdf = new Ilovepdf('project_public_5b8a8c940b378f560a9af9b547fda145_DNRT62d35f5d2494212a0dad512be366352cf',
			'secret_key_629c405d975d170c4785d1781f9a0e6c_DccLT641e98f8d020e52866e228464f75321d');
			// Create a new task
			$myTaskConvertOffice = $ilovepdf->newTask('officepdf');
			// Add files to task for upload
			$resume_path = dirname(__FILE__).'/uploads/resume/'.$_SESSION['resume_doc'];
			$file1 = $myTaskConvertOffice->addFile($resume_path);
			$myTaskConvertOffice->setOutputFilename($snap_file_name);
			// Execute the task
			$myTaskConvertOffice->execute();
			// Download the package files
			$myTaskConvertOffice->download('uploads/resumepdf/'); 
			
			// create introduction pdf file			
			$resume_path2 = dirname(__FILE__).'/uploads/introduction/'.$_SESSION['resume_doc'];
			// Create a new task
			$myTaskConvertOffice2 = $ilovepdf->newTask('officepdf');
			// Add files to task for upload
			// $resume_path = dirname(__FILE__).'/uploads/resume/'.$_SESSION['resume_doc'];
			$file1 = $myTaskConvertOffice2->addFile($resume_path2);
			$myTaskConvertOffice2->setOutputFilename($snap_file_name);
			// Execute the task
			$myTaskConvertOffice2->execute();
			// Download the package files
			$myTaskConvertOffice2->download('uploads/introductionpdf/');
			
			// include('vendor/ilovepdf-php-1.1.5/samples/resume.php');
			// merge the snapshot pdf and resume pdf
			// and get the task tool
			$myTask = $ilovepdf->newTask('merge');
			// file var keeps info about server file id, name...
			// it can be used latter to cancel a specific file
			$fileZ = $myTask->addFile(dirname(__FILE__).'/uploads/introductionpdf/'.$snap_file_name.'.pdf');
			$fileA = $myTask->addFile(dirname(__FILE__).'/uploads/snapshot/'.$snap_file_name.'.pdf');
			$fileB = $myTask->addFile(dirname(__FILE__).'/uploads/resumepdf/'.$snap_file_name.'.pdf');
			$myTask->setOutputFilename($snap_file_name.'_{date}');
			// process files
			$myTask->execute();
			// and finally download file. If no path is set, it will be downloaded on current folder
			$myTask->download('uploads/snapshotmerged/');
			// water mark the pdf
			$myTaskWatermark = $ilovepdf->newTask('watermark');
			// Add files to task for upload
			$file1 = $myTaskWatermark->addFile(dirname(__FILE__).'/uploads/snapshotmerged/'.$snap_file_name.'_'.date('d-m-Y').'.pdf');
			// Select watermark parameters
			$myTaskWatermark->setText('CareerTree HR Solutions');
			//$myTaskWatermark->setRotation(45); 
			// $myTaskWatermark->setImage('watermark.jpg');			
			$myTaskWatermark->setPages('3-end');
			// $myTaskWatermark->setOpacity(70);
			$myTaskWatermark->setLayer('below');
			$myTaskWatermark->setVerticalPosition('middle');
			$myTaskWatermark->setHorizontalPosition('center');
			$myTaskWatermark->setFontSize(48);
			$myTaskWatermark->setFontFamily('Arial Unicode MS');
			$myTaskWatermark->setFontColor('#f0d1ff');
			$myTaskWatermark->execute();
			// Download the package files
			$myTaskWatermark->download('uploads/snapshotwatermarked/');
			// set page numbers
			// Create a new task
			$myTaskPageNumbers = $ilovepdf->newTask('pagenumber');
			// Add files to task for upload
			$file1 = $myTaskPageNumbers->addFile(dirname(__FILE__).'/uploads/snapshotwatermarked/'.$snap_file_name.'_'.date('d-m-Y').'.pdf');
			// Set your tool options
			$myTaskPageNumbers->setPages('3-end');
			// $myTaskPageNumbers->setFontFamily('arial');
			$myTaskPageNumbers->setFontSize(13);
			$myTaskPageNumbers->setFontColor('#757070');
			$myTaskPageNumbers->setVerticalPosition('bottom');
			$myTaskPageNumbers->setHorizontalPosition('left');
			// Execute the task
			$myTaskPageNumbers->execute();                               
			// Download the package files
			$myTaskPageNumbers->download('uploads/snapshotwatermarked/');
			$req_id = $_SESSION['position_for'];
			//include('vendor/ilovepdf-php-1.1.5/samples/merge_basic.php');
			// unset the sessions
			unset($_SESSION['position_for']);
			unset($_SESSION['resume_doc']);
			unset($_SESSION['clients_id']);
			
			// if($successfull == '1'){
				// header('Location: ../resume?action=created&download='.$snap_file_name.'_'.date('d-m-Y').'.pdf');
				header('Location: ../position/view/'.$req_id.'?action=created');
			// }
		} 
		}else{
				$msg = "Resume with same email address and mobile no. already exists";
				$smarty->assign('EXIST_MSG',$msg); 
			}
	}else{
		$smarty->assign('tab_open', ($tab1 == 'fail' ? 'tab1' : ($tab2 == 'fail' ? 'tab2' : ($tab3 == 'fail' ? 'tab3' : 'tab4' ))));
	}
}

// convert the resume doc. into pdf
// include('vendor/ilovepdf-php-1.1.5/samples/resume.php');
// merge the snapshot pdf and resume pdf
// include('vendor/ilovepdf-php-1.1.5/samples/merge_basic.php');
			
// smarty drop down array for status
$smarty->assign('grade_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));
// smarty drop down array for type
$smarty->assign('grade_type', array('' => 'Select', 'I' => 'Individual', 'T' => 'Team'));

// smarty drop down for exp month and year
$smarty->assign('exp_month', array('1' => 'Jan', '2' => 'Feb', '3' => 'Mar', '4' => 'Apr', '5' => 'May', '6' => 'Jun',
 '7' => 'Jul', '8' => 'Aug', '9' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dec'));
 
$exp_yr = array(); 
for($l = date('Y'); $l >= 1950; $l--){ 
	$exp_yr[$l] = $l; 
}
$smarty->assign('exp_yr', $exp_yr);


// smarty drop down array for experience year 
$tot_exp_yr = array(); 
$tot_exp_yr[0] = '0 Years';
for($l = 1; $l <= 50; $l++){ 
	if($l == '1') {
		$tot_exp_yr[$l] = $l.' '.Year; 
	}else {
		$tot_exp_yr[$l] = $l.' '.Years; 
	}
} 
$smarty->assign('tot_exp_yr', $tot_exp_yr);
// smarty drop down array for experience month 
$tot_exp_month = array(); 
$tot_exp_month[0] = '0 Months';
for($l = 1; $l <= 11; $l++){
	if($l == '1') {
		$tot_exp_month[$l] = $l.' '.Month;
	}else { 
		$tot_exp_month[$l] = $l.' '.Months; 
	} 
}
$smarty->assign('tot_exp_month', $tot_exp_month);

// smarty drop down array for current ctc
// $smarty->assign('ctc_type', array('' => 'Select', 'T' => 'Thousand', 'L' => 'Lacs', 'C' => 'Crore'));
$smarty->assign('ctc_type', array('L' => 'Lacs'));

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




// smarty drop down array for grade type
$smarty->assign('grade_drop', array('' => 'Select', 'R' => 'Regular', 'C' => 'Correspondence'));
 
// smarty drop down array for year of passing 
$year_of_pass = array(); 
for($l = date('Y'); $l >= 1990; $l--){
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
$smarty->assign('page_title' , 'Add Resume - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('resume_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('add_grade'));
// display smarty file
$smarty->display('add_resume.tpl');
?>