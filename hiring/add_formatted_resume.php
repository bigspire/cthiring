<?php
/* 
Purpose : To create formatted resume.
Created : Nikitasa
Date : 26-05-2017
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
		if($total == ''){ 
			header("Location:resume.php?current_status=msg");
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
	$query = "CALL get_full_res_personal_byid('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get resume personal');
		}
		$row = $mysql->display_result($result);
		$smarty->assign('dob_field', $fun->convert_date_display($row['dob']));
		$total_exp  = $row['total_exp'];
		$total_exp_yrs = explode(".", $total_exp);
		$smarty->assign('year_of_exp',$total_exp_yrs[0]);
		$smarty->assign('month_of_exp',$total_exp_yrs[1]);
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

	// fetch language by id
	$query = "CALL get_res_language('$getid')";
	try{
		// calling mysql execute query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in fetching language details');
		}
		while($obj = $mysql->display_result($result)){
			$res_language[$obj['id']] = $obj['language_id'];  	   
		}
		$smarty->assign('res_language',$res_language);
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	
	$query = "CALL get_full_res_edu_byid('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get resume education');
		}
		$tot = 0;
		while($row = $mysql->display_result($result)){
			// print_r($row);
			// post of assign asset fields value
			$collegeData[$tot] = $row['college'];
			$qualificationData[$tot] = $row['resume_program_id'];
			$degreeData[$tot] = $row['resume_degree_id'];
			$specializationData[$tot] = $row['resume_spec_id'];
			$gradeData[$tot] = $row['percent_mark'];
			$grade_typeData[$tot] = $row['course_type'];
			$from_yrData[$tot] = $row['year_passing'];
			$universityData[$tot] = $row['university'];
			$locationData[$tot] = $row['location'];
			$tot++;
		}	
		
		$smarty->assign('collegeData', $collegeData);
		$smarty->assign('universityData', $universityData);
		$smarty->assign('gradeData', $gradeData);
		$smarty->assign('grade_typeData', $grade_typeData);
		$smarty->assign('from_yrData',$from_yrData);
		$smarty->assign('locationData',$locationData);
		$smarty->assign('qualificationData', $qualificationData);
		$smarty->assign('degreeData', $degreeData);
		$smarty->assign('specializationData', $specializationData);
		$smarty->assign('eduCount', $tot);
		
		$smarty->assign('totCount_edu', $tot);
	
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	
	
	$query = "CALL get_full_res_exp_byid('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get resume exp');
		}
		$tot = 0;
		while($row = $mysql->display_result($result)){
			// post of assign asset fields value
			$total_experience = $row['experience'];
			$total_yr_exp = explode(".", $total_experience);
			
			$desigData[$tot] = $row['designation_id'];
			$areaData[$tot] = $row['skills'];
			$year_of_expData[$tot] = $total_yr_exp[0];
			$month_of_expData[$tot] = $total_yr_exp[1];
			$companyData[$tot] = $row['company'];
			$company_profileData[$tot] = $row['company_profile'];
			$worklocData[$tot] = $row['work_location'];
			$key_responsibilityData[$tot] = $row['key_resp'];	
			$reporting_toData[$tot] = $row['reporting'];	
			$key_achievementData[$tot] = $row['key_achieve'];	
			$vitalData[$tot] = $row['other_info'];	
			$tot++;
		}
			
		$smarty->assign('desigData', $desigData);
		$smarty->assign('areaData', $areaData);
		$smarty->assign('year_of_expData', $year_of_expData);
		$smarty->assign('month_of_expData', $month_of_expData);
		$smarty->assign('companyData', $companyData);
		$smarty->assign('company_profileData', $company_profileData);
		$smarty->assign('worklocData', $worklocData);
		$smarty->assign('vitalData', $vitalData);
		$smarty->assign('key_responsibilityData', $key_responsibilityData);
		$smarty->assign('key_achievementData', $key_achievementData);
		$smarty->assign('reporting_toData', $reporting_toData);
		$smarty->assign('expCount', $tot);

		$smarty->assign('totCount_exp', $tot);
		
		
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	
	$query = "CALL get_full_res_training_byid('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get resume training');
		}
		$tot = 0;
		while($row = $mysql->display_result($result)){
			// post of assign asset fields value			
			$train_yearData[$tot] = $row['train_year'];
			$descriptionData[$tot] = $row['train_desc'];
			$programtitleData[$tot] = $row['prog_title'];
			$train_locationData[$tot] = $row['location'];		
			$tot++;
		}
			
		$smarty->assign('train_yearData', $train_yearData);
		$smarty->assign('descriptionData', $descriptionData);
		$smarty->assign('programtitleData', $programtitleData);
		$smarty->assign('train_locationData', $train_locationData);
		$smarty->assign('trainCount', $tot);

		$smarty->assign('totCount_train', $tot);
		
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

$edu = $_POST['edu_count'] ? $_POST['edu_count'] : $tot;
	// post of education fields value
	for($i = 0; $i < $edu; $i++){
		$quali[] = $_POST['qualification_'.$i] ? $_POST['qualification_'.$i] : $qualificationData[$i];
		$degree[] = $_POST['degree_'.$i] ? $_POST['degree_'.$i] : $degreeData[$i];
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
	
		$degree_id = $_POST['degree_'.$i] ? $_POST['degree_'.$i] : $degree[$i];
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
	
		$spec[] = $_POST['specialization_'.$i] ? $_POST['specialization_'.$i] : $specializationData[$i];
	}

	$smarty->assign('spec_data', $spec_data);
	$smarty->assign('degreeData', $degree_data);
	$smarty->assign('degree', $degree);
	$smarty->assign('spec', $spec);

// fetch languages
$query = "CALL get_language()";
try{
	// calling mysql execute query function
	if(!$result = $mysql->execute_query($query)){ 
		throw new Exception('Problem in fetching language details');
	}
	while($obj = $mysql->display_result($result)){
		$languages[$obj['id']] = $obj['language'];  	   
	}
	$smarty->assign('languages',$languages);
	// free the memory
	$mysql->clear_result($result);
	// next query execution
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

if(!empty($_POST)){
	
	// post of education fields value
	for($i = 0; $i < $_POST['edu_count']; $i++){
				
		$collegeData[] = $_POST['college_'.$i];
		$qualificationData[] = $_POST['qualification_'.$i];
		$degreeData[] = $_POST['degree_'.$i];
		$specializationData[] = $_POST['specialization_'.$i];
		$gradeData[] = $_POST['grade_'.$i];
		$grade_typeData[] = $_POST['grade_type_'.$i];
		$from_yrData[] = $_POST['from_yr_'.$i];
		$universityData[] = $_POST['university_'.$i];
		$locationData[] = $_POST['location_'.$i];
			
		// array for printing correct field name in error message 
		$fieldtype = array('1','1', '1', '1','0','0','1'); 
		$actualfield = array('qualification', 'degree', 'specialization', 'from year', 'location', '% of Marks', 'type'); 
		$field_ar = array('qualification_'.$i => 'qualificationErr', 'degree_'.$i => 'degreeErr',
   		   'specialization_'.$i => 'specializationErr', 'from_yr_'.$i => 'from_yrErr',
		   'location_'.$i => 'locationErr', 'grade_'.$i => 'gradeErr', 'grade_type_'.$i => 'grade_typeErr'); 
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
	$smarty->assign('locationData', $locationData);
	$smarty->assign('from_yrData', $from_yrData);
	$smarty->assign('qualificationData', $qualificationData);
	$smarty->assign('eduCount', $_POST['edu_count']);
	$smarty->assign('eduErr',$er);

	// post of experience fields value
	for($i = 0; $i < $_POST['exp_count']; $i++){
		
		$desigData[] = $_POST['desig_'.$i];
		$areaData[] = $_POST['area_'.$i];
		$year_of_expData[] = $_POST['year_of_exp_'.$i];
		$month_of_expData[] = $_POST['month_of_exp_'.$i];
		$worklocData[] = $_POST['workloc_'.$i];
		$companyData[] = $_POST['company_'.$i];	
		$company_profileData[] = $_POST['company_profile_'.$i];
		$vitalData[] = $_POST['vital_'.$i];
		$key_responsibilityData[] = $_POST['key_responsibility_'.$i];
		$key_achievementData[] = $_POST['key_achievement_'.$i];
		$reporting_toData[] = $_POST['reporting_to_'.$i];
		
		// array for printing correct field name in error message 
		$fieldtype1 = array('1','1','1','0','0','0','0','0','0','0'); 
		$actualfield1 = array('designation','employment year','employment month','location of work',
		'area of specialization/expertise','company name','company profile','key responsibility',
		'key achievement','reporting to'); 
		$field_ar1 = array('desig_'.$i => 'desigErr', 'year_of_exp_'.$i => 'year_of_expErr',
			'month_of_exp_'.$i => 'month_of_expErr','workloc_'.$i => 'worklocErr','area_'.$i => 'areaErr',
			'company_'.$i => 'companyErr','company_profile_'.$i => 'company_profileErr',
			'key_responsibility_'.$i => 'key_responsibilityErr','key_achievement_'.$i => 'key_achievementErr',
			'reporting_to_'.$i => 'reporting_toErr'); 
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
	$smarty->assign('desigData', $desigData);
	$smarty->assign('areaData', $areaData);
	$smarty->assign('year_of_expData', $year_of_expData);
	$smarty->assign('month_of_expData', $month_of_expData);
	$smarty->assign('companyData', $companyData);
	$smarty->assign('worklocData', $worklocData);
	$smarty->assign('vitalData', $vitalData);
	$smarty->assign('company_profileData', $company_profileData);
	$smarty->assign('key_responsibilityData', $key_responsibilityData);
	$smarty->assign('key_achievementData', $key_achievementData);
	$smarty->assign('reporting_toData', $reporting_toData);
	$smarty->assign('expCount', $_POST['exp_count']);
	$smarty->assign('expErr',$er1);
	
	
	// post of training fields values
	for($i = 0; $i < $_POST['train_count']; $i++){
		
		$train_yearData[] = $_POST['train_year_'.$i];
		$descriptionData[] = $_POST['description_'.$i];
		$programtitleData[] = $_POST['programtitle_'.$i];
		$train_locationData[] = $_POST['train_location_'.$i];
		
		// array for printing correct field name in error message 
		$fieldtype2 = array('1', '0', '0', '0'); 
		$actualfield2 = array( 'year','description','program title','location'); 
		$field_ar2 = array('train_year_'.$i => 'train_yearErr', 'description_'.$i => 'descriptionErr',
   		 'programtitle_'.$i => 'programtitleErr', 'train_location_'.$i => 'train_locationErr'); 
		$j = 0; 
		foreach($field_ar2 as $field2 => $er_var2){ 
			if($_POST[$field2] == ''){
				$error_msg2 = $fieldtype2[$j] ? ' select the ' : ' enter the ';
				$actual_field2 =  $actualfield2[$j];
				$er2[$i][$er_var2] = 'Please'. $error_msg2 .$actual_field2;
				$test = 'error';
				$tab3 = 'fail';
			}
			$j++;
		}
	}
	$smarty->assign('train_yearData', $train_yearData);
	$smarty->assign('descriptionData', $descriptionData);
	$smarty->assign('programtitleData', $programtitleData);
	$smarty->assign('train_locationData', $train_locationData);
	$smarty->assign('trainCount', $_POST['train_count']);
	$smarty->assign('trainErr',$er2);
		
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
	$fieldtype = array('0', '0','0','0','0','0', '0','1','1','0', '0','0','1','1', '1','1','0','0','0','0','0','0','0');
	$actualfield = array('first name', 'last name','email', 'mobile', 'telephone', 'dob', 'position for',
						'current designation', 'total years of experience','total months of experience',
						'present CTC','expected CTC','present CTC type','expected CTC type',
						'notice period','gender', 'present location','nationality', 'language','address',
						'personality','interview availability');
   $field = array('first_name' => 'first_nameErr', 'last_name' => 'last_nameErr','email' => 'emailErr',
    'mobile' => 'mobileErr','telephone' => 'telephoneErr','dob_field' => 'dobErr', 'position_for' => 'position_forErr',
    'designation_id' => 'positionErr','year_of_exp' => 'year_of_expErr', 'month_of_exp' => 'month_of_expErr',
    'present_ctc' => 'present_ctcErr','expected_ctc' => 'expected_ctcErr',
	'present_ctc_type' => 'present_ctc_typeErr','expected_ctc_type' => 'expected_ctc_typeErr',
	'notice_period' => 'notice_periodErr','gender' => 'genderErr',
	'present_location' => 'present_locationErr','nationality' => 'nationalityErr','res_language' => 'languageErr',
	'address' => 'addressErr','personality' => 'personalityErr','interview_availability' => 'interview_availabilityErr');
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
	
	/*
	// save all the data
	if($test != 'error'){
		echo 'save data';
	}else{
		$smarty->assign('tab_open_resume', ($tab1 == 'fail' ? 'tab1' : ($tab2 == 'fail' ? 'tab2' : ($tab3 == 'fail' ? 'tab3' : '' ))));
		// $smarty->assign('tab_open_resume', 'tab2');
	} */
	
	// assigning the date
	$date =  $fun->current_date();
	$modified_by = $_SESSION['user_id'] ? $_SESSION['user_id'] : '1';
	$total_exp = $_POST['year_of_exp'].'.'.$_POST['month_of_exp'];
	
	// save all the data
	if($test != 'error'){
		// query to update personal details
		$query = "CALL edit_full_res_personal('$getid','".$fun->is_white_space($mysql->real_escape_str($_POST['first_name']))."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['last_name']))."',
			'".$mysql->real_escape_str($_POST['email'])."','".$mysql->real_escape_str($_POST['mobile'])."',
			'".$mysql->real_escape_str($_POST['telephone'])."',
			'".$fun->is_white_space($mysql->real_escape_str($fun->convert_date($_POST['dob_field'])))."',
			'".$mysql->real_escape_str($_POST['gender'])."',
			'".$fun->is_white_space($mysql->real_escape_str($fun->is_white_space($_POST['nationality'])))."',
			'".$fun->is_white_space($mysql->real_escape_str($fun->is_white_space($_POST['skills'])))."',
			'".$fun->is_white_space($mysql->real_escape_str($fun->is_white_space($_POST['address'])))."',
			'".$fun->is_white_space($mysql->real_escape_str($fun->is_white_space($_POST['tech_expert'])))."',
			'".$fun->is_white_space($mysql->real_escape_str($fun->is_white_space($_POST['hobby'])))."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['present_ctc']))."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['expected_ctc']))."','".$mysql->real_escape_str($_POST['present_ctc_type'])."',
			'".$mysql->real_escape_str($_POST['expected_ctc_type'])."','".$mysql->real_escape_str($_POST['marital_status'])."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['present_location']))."','".$fun->is_white_space($mysql->real_escape_str($_POST['native_location']))."',
 			'".$mysql->real_escape_str($_POST['notice_period'])."','".$mysql->real_escape_str($_POST['designation_id'])."',
 			'".$fun->is_white_space($mysql->real_escape_str($_POST['family']))."','".$mysql->real_escape_str($total_exp)."',
 			'".$date."','".$modified_by."','N','".$mysql->real_escape_str($_SESSION['resume_doc_id'])."',
 			'".$fun->is_white_space($mysql->real_escape_str($_POST['personality']))."',
 			'".$fun->is_white_space($mysql->real_escape_str($_POST['interview_availability']))."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['achievement']))."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['about_company']))."',
			'".$fun->is_white_space($mysql->real_escape_str($_POST['candidate_brief']))."')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in updating personal details');
			}
			$row = $mysql->display_result($result);
			$resume_id = $row['affected_rows'];
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		if(!empty($resume_id)){
			// query to delete language details
			$query = "CALL delete_res_language('$getid')";
			try{
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in deleting language details');
				}
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		
			$language_list = array();
			if(count($_POST['res_language']) > 0){
				foreach($_POST['res_language'] as $perm){
					$language_list[] = $perm;
				}
			}
		
			foreach($language_list as $key => $val){
		
				// query to add language details
				$query = "CALL add_full_res_language('$getid','".$mysql->real_escape_str($val)."')";
				try{
					if(!$result = $mysql->execute_query($query)){
						throw new Exception('Problem in adding language details');
					}
					$row = $mysql->display_result($result);
					// call the next result
					$mysql->next_query();
				}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
			}
			$language_id = $row['last_inserted_id'];
		}
		
		// query to add position for details
		$query = "CALL edit_req_resume_position('".$modified_by."','".$date."',
			'".$mysql->real_escape_str($_POST['position_for'])."','$getid')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in updating position details');
			}
			$row = $mysql->display_result($result);
			$position_id = $row['affected_rows'];
			// call the next result
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		// query to delete education details
		$query = "CALL delete_res_edu('$getid')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in deleting education details');
			}
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		for($i = 0; $i < $_POST['edu_count']; $i++){
			
			$collegeData = $_POST['college_'.$i];
			$specializationData = $_POST['specialization_'.$i];
			$degreeData = $_POST['degree_'.$i];
			$gradeData = $_POST['grade_'.$i];
			$grade_typeData = $_POST['grade_type_'.$i];
			$year_of_passData = $_POST['from_yr_'.$i];
			$loactionData = $_POST['location_'.$i];
			$universityData = $_POST['university_'.$i];
		
			// query to update education details
			$query = "CALL add_full_res_education('$getid','".$fun->is_white_space($mysql->real_escape_str($gradeData))."',
				'".$mysql->real_escape_str($year_of_passData)."','".$fun->is_white_space($mysql->real_escape_str($collegeData))."',
				'".$mysql->real_escape_str($grade_typeData)."','".$fun->is_white_space($mysql->real_escape_str($universityData))."',
				'".$fun->is_white_space($mysql->real_escape_str($loactionData))."','".$date."','N',
				'".$mysql->real_escape_str($degreeData)."','".$mysql->real_escape_str($specializationData)."')";
			try{
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in update education details');
				}
				$row = $mysql->display_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}
		$edu_id = $row['last_inserted_id'];
		
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
			// free the memory
			$mysql->clear_result($result);
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
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		for($i = 0; $i < $_POST['exp_count']; $i++){
			$desigData = $_POST['desig_'.$i];
			$expData = $_POST['year_of_exp_'.$i].'.'.$_POST['month_of_exp_'.$i];
			$areaData = $_POST['area_'.$i];
			$companyData = $_POST['company_'.$i];
			$vitalData = $_POST['vital_'.$i];
			$company_profileData = $_POST['company_profile_'.$i];
			$worklocData = $_POST['workloc_'.$i];
			$key_responsibilityData = $_POST['key_responsibility_'.$i];
			$key_achievementData = $_POST['key_achievement_'.$i];
			$reporting_toData = $_POST['reporting_to_'.$i];
			
			// query to add experience details
			$query = "CALL add_full_res_experience('$getid','".$mysql->real_escape_str($desigData)."',
				'".$mysql->real_escape_str($expData)."',
				'".$fun->is_white_space($mysql->real_escape_str($worklocData))."',
				'".$fun->is_white_space($mysql->real_escape_str($areaData))."',
				'".$fun->is_white_space($mysql->real_escape_str($companyData))."',
				'".$fun->is_white_space($mysql->real_escape_str($vitalData))."','N',
				'".$fun->is_white_space($mysql->real_escape_str($company_profileData))."',
				'".$fun->is_white_space($mysql->real_escape_str($key_responsibilityData))."',
				'".$fun->is_white_space($mysql->real_escape_str($key_achievementData))."',
				'".$fun->is_white_space($mysql->real_escape_str($reporting_toData))."')";
			try{
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in updating experience details');
				}
				$row = $mysql->display_result($result);
				$exp_id = $row['last_inserted_id'];
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}
		
		// query to delete training details
		$query = "CALL delete_res_training('$getid')";
		try{
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in deleting training details');
			}
			$row = $mysql->display_result($result);
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
		
		for($i = 0; $i < $_POST['train_count']; $i++){
			$train_yearData = $_POST['train_year_'.$i];
			$descriptionData = $_POST['description_'.$i];
			$programtitleData = $_POST['programtitle_'.$i];
			$train_locationData = $_POST['train_location_'.$i];
			
			// query to add experience details
			$query = "CALL add_full_res_training('$getid','".$mysql->real_escape_str($train_yearData)."',
				'".$fun->is_white_space($mysql->real_escape_str($descriptionData))."',
				'".$fun->is_white_space($mysql->real_escape_str($programtitleData))."',
				'".$fun->is_white_space($mysql->real_escape_str($train_locationData))."','N')";
			try{
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in updating training details');
				}
				$row = $mysql->display_result($result);
				$train_id = $row['last_inserted_id'];
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}
		if(!empty($edu_id) && !empty($exp_id) && !empty($train_id) && !empty($language_id) && !empty($resume_id) && !empty($position_id)){
			echo 'save data';die;
		} 
	}else{
		$smarty->assign('tab_open_resume', ($tab1 == 'fail' ? 'tab1' : ($tab2 == 'fail' ? 'tab2' : ($tab3 == 'fail' ? 'tab3' : '' ))));
		// $smarty->assign('tab_open_resume', 'tab2');
	}
}

// smarty drop down array for status
$smarty->assign('grade_status', array('' => 'Select', '1' => 'Active', '2' => 'Inactive'));
// smarty drop down array for type
$smarty->assign('grade_type', array('' => 'Select', 'I' => 'Individual', 'T' => 'Team'));

// smarty drop down array for experience year 
$exp_yr = array(); 
for($l = 1; $l <= 50; $l++){ 
	if($l == '1') {
		$exp_yr[$l] = $l.' '.Year; 
	}else {
		$exp_yr[$l] = $l.' '.Years; 
	}
} 
$smarty->assign('exp_yr', $exp_yr);
// smarty drop down array for experience month 
$exp_month = array(); 
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
for($l = 1990; $l <= 2020; $l++){
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
$smarty->assign('page_title' , 'Add Fully Formatted Resume - CT Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('resume_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('add_grade'));
// display smarty file
$smarty->display('add_formatted_resume.tpl');
?>