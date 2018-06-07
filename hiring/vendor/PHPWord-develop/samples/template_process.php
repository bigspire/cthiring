<?php
include_once 'Sample_Header.php';

// Template processor instance creation
// echo date('H:i:s'), ' Creating new TemplateProcessor instance...', EOL;


$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template_path);

$templateProcessor->setValue('CANDIDATE_NAME', ucwords($_POST['first_name'].' '.$_POST['last_name']),  1,0);       

require_once "HTMLtoOpenXML.php";
// to retain company name field
$templateProcessor->setValue('CAND_CODE', 'MH'.$getid,  1,0);  
// to retain company name field
$templateProcessor->setValue('COMPANY_NAME', ucwords($client_autoresume),  1,0);  
// to retain company location field     
$templateProcessor->setValue('COMP_LOC', ucwords($city_autoresume),  1,0); 
// to retain company state field
$templateProcessor->setValue('COMP_CTRY', ucwords($state_autoresume),  1,0);       
// to retain recruiter name field
// $templateProcessor->setValue('RECRUITER_NAME', ucwords($recruiter),  1,0);
// to retain CRM name field
$templateProcessor->setValue('CLIENT_MANAGER_NAME', ucwords($crm),  1,0);
// to retain current date field      
$templateProcessor->setValue('CURRENT_DATE', date('d-M-Y'),  1,0);       
// to retain designation field 
$templateProcessor->setValue('DESIGNATION', ucwords($position_autoresume),  1,0); 
// to retain candidate address field 
$templateProcessor->setValue('CANDIDATE_ADDRESS', ucwords($_POST['address']),  1,0);  

// for hiding the contacts
if($hide_contact == '1'){
	$telephone_item = '**********';
	$mobile_item = '**********';
	$mail_item = '**********';
}else{
	$telephone_item = $_POST['telephone'];
	$mobile_item = $_POST['mobile'];
	$mail_item = $_POST['email'];
}

// to retain candidate phone number field   
$templateProcessor->setValue('CANDIDATE_PHONE', $telephone_item,  1,0);   
// to retain candidate mobile number field 
$templateProcessor->setValue('CANDIDATE_MOBILE', $mobile_item,  1,0); 
// to retain candidate email id field    
$templateProcessor->setValue('CANDIDATE_EMAIL', $mail_item,  1,0);   


 
// to retain candidate dob field    
	$date_format = $fun->convert_date($_POST['dob_field']);
	// $date_day = explode('-', );
	$templateProcessor->setValue('DATEOFBIRTH', date('d/m/Y',strtotime($date_format)),   1, 0);
	//$templateProcessor->setValue('DOBUPPER', date('S',strtotime($date_format)), 1,0);
	//$templateProcessor->setValue('YEARBIRTH', date('M-Y', strtotime($date_format)),   1, 0);
	
// to retain candidate nation field 
	$templateProcessor->setValue('NATIONALDATA', ucfirst($_POST['nationality']),   1, 0);
// to retain candidate marital status field 
	$templateProcessor->setValue('MARITAL', $fun->marital_status($_POST['marital_status']),   1, 0);
// to retain relevant exposure
$templateProcessor->setValue('RELEVANTEXPOSURE', ucfirst(trim($_POST['relevant_exposure'])),   1, 0);
// to retain CREDENTIALS CONSIDERED field
$templateProcessor->setValue('CREDENTIALSCONSIDERED', ucfirst(trim($_POST['credential_shortlisting'])),  1,0); 
// to retain VITAL INPUTS field
$templateProcessor->setValue('VITALINPUTS', ucfirst(trim($_POST['vital_info_interview'])),  1,0); 
// to retain INTERVIEW AVAILABILITY field
$templateProcessor->setValue('INTERVIEWAVAILABILITY', ucfirst(trim($_POST['interview_availability'])),  1,0); 
// to retain ACHIVEMENTS field
$templateProcessor->setValue('ACHIVEMENTS', ucfirst(trim($_POST['achievement'])),  1,0); 
// to retain CANDIDATE BRIEF field
$templateProcessor->setValue('CANDIDATEBRIEF', ucfirst(trim($_POST['candidate_brief'])),  1,0); 


// to retain candidate language field 
		// fetch language by id
		$query = "CALL get_language_details('$getid')";
		try{
			// calling mysql execute query function
			if(!$result = $mysql->execute_query($query)){ 
				throw new Exception('Problem in fetching language details');
			}			
			
			while($row = $mysql->display_result($result)){
				$langu .= $row['language'].', ';				
			}
			$language = substr($langu, 0, strlen($langu) - 2);
			// free the memory
			$mysql->clear_result($result);
			// next query execution
			$mysql->next_query();
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		
	$templateProcessor->setValue('LANGUAGESKNOWN', ucwords($language),   1, 0);
	
	
// to retain candidate hobbies field 	
	$templateProcessor->setValue('HOBBIESDETAIL', ucwords(trim($_POST['hobby'])),   1, 0);
// to retain candidate's computer skills field 
	$templateProcessor->setValue('COMPUTERSKILLS', ucwords($_POST['skills']),   1, 0);
// to retain compansation amount field 
	$templateProcessor->setValue('COMPENSATIONAMOUNT', $_POST['present_ctc'].' '.$fun->ctc_type($_POST['present_ctc_type']),   1, 0);
// to retain notice period field 	
    $templateProcessor->setValue('NOTICEPERIOD', $fun->get_notice($_POST['notice_period']),   1, 0);
// to retain appraisal field 
	$templateProcessor->setValue('CANDIDATEAPPRAISAL', ucfirst(trim($_POST['candidate_brief'])),   1, 0);
// to retain technical expertise field 
	$templateProcessor->setValue('TECHNICALEXPERTISE', ucfirst(trim($_POST['tech_expert'])),   1, 0);
// to retain personality field 
	$templateProcessor->setValue('PERSONALITYCANDIDATE', ucfirst(trim($_POST['personality'])),   1, 0);
// to retain outlook on company field 	
	$templateProcessor->setValue('OUTLOOKCOMPANY',  ucfirst(trim($_POST['about_company'])),   1, 0);
	
	
// to retain key achievements field 	
	$tech_expert_data = trim($_POST['tech_expert']);

	$html = explode("\n", $tech_expert_data);
	$track_tot = count($html);
	$templateProcessor->cloneRow('TRACKRECORDS', $track_tot); // $_POST['exp_count']);
	$train_flags = 1;
	//
	//for($i = 0; $i < $track_tot; $i++){
		// $html = '<br><p>Performs reporting risk assessments and auditing and observes all QHSE related activities and policies within a location.</p><p>Ensures operations are conducted in a safe and efficient manner and in conformance to federal, provincial and company safety regulations by integrating and implementing company and third-party QHSE policies and procedures.</p><p>Performs post-incident investigations and communicates with the QHSE Manager and others until all action items have been closed. Files QHSE documents and participates in job risk analysis and continual improvement. Likely to be either a specialist within a particular focus area for QHSE</p>';
		foreach($html as $track_rec){
			// $html = str_replace('<br>', '<p>', $html);
			// $toOpenXML = HTMLtoOpenXML::getInstance()->fromHTML($html);
			// $templateProcessor->setValue('TRACKRECORDS#'.$train_flag, $toOpenXML, 0, 1);
			$templateProcessor->setValue('TRACKRECORDS#'.$train_flags, ucfirst($track_rec), 0, 0);
			$train_flags++;

		}
		
	// }

// to retain training field 	
	$templateProcessor->cloneRow('TRAINYR', $_POST['train_count']);
	$train_flag = 1;
	for($i = 0; $i < $_POST['train_count']; $i++){
			$train_yearData = $_POST['train_year_'.$i];
			$descriptionData = ucfirst(trim($_POST['description_'.$i]));
			$programtitleData = ucwords($_POST['programtitle_'.$i]);
			$train_locationData = ucfirst($_POST['train_location_'.$i]);
	
		$templateProcessor->setValue('TRAINYR#'.$train_flag, $train_yearData,   0, 0);
		$templateProcessor->setValue('TRAINTITLE#'.$train_flag, $programtitleData,   0, 0);
		$templateProcessor->setValue('TRAINDESC#'.$train_flag, $descriptionData,   0, 0);
		$templateProcessor->setValue('TRAINCITY#'.$train_flag, $train_locationData,   0, 0);
		$train_flag++;
	}



// to retain education details 

$templateProcessor->cloneRow('EDUYR', $_POST['edu_count']);
$train_flag = 1;
$train_flag2 = 1;
for($i = 0; $i < $_POST['edu_count']; $i++){
			$collegeData = ucwords($_POST['college_'.$i]);
			$specializationData = $_POST['specialization_'.$i];
			$degreeData = $_POST['degree_'.$i];
			$gradeData = $_POST['grade_'.$i];
			$year_of_passData = $_POST['from_yr_'.$i];
			$loactionData = ucfirst($_POST['location_'.$i]);
			$universityData = $_POST['university_'.$i];
			if($gradeData > 10){
				$type = '%';
			}else{
				$type = ' CGPA';
			}
			
			$query = "CALL get_degr_spec_details('$getid')";
			try{
				// calling mysql execute query function
				if(!$result = $mysql->execute_query($query)){ 
					throw new Exception('Problem in fetching designation details');
				}			
			
				while($row = $mysql->display_result($result)){
					$deg = $row['degree'];
					$spc = $row['spec'];
					
					$templateProcessor->setValue('DEGREE#'.$train_flag2, $deg,   0, 0);
					$templateProcessor->setValue('SPEC#'.$train_flag2, $spc,   0, 0);
					
					$train_flag2++;
				}
				// free the memory
				$mysql->clear_result($result);
				// next query execution
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}	
			$templateProcessor->setValue('EDUYR#'.$train_flag, $year_of_passData,   0, 0);
			$templateProcessor->setValue('COLLEGE#'.$train_flag, $collegeData,   0, 0);
			$templateProcessor->setValue('LOCATION#'.$train_flag, $loactionData,   0, 0);
			$templateProcessor->setValue('MARKS#'.$train_flag, $gradeData.$type.'',   0, 0);
			$train_flag++;
} 

// to retain experience details 
$templateProcessor->cloneRow('EXPCOMPANYNAME', $_POST['exp_count']);
$train_flag = 1;
for($i = 0; $i < $_POST['exp_count']; $i++){
			$desigData = $_POST['desig_'.$i];
			$from_year_exp = $_POST['from_year_of_exp_'.$i];
			$from_month_exp = $_POST['from_month_of_exp_'.$i];
			$to_year_exp = $_POST['to_year_of_exp_'.$i];
			$to_month_exp = $_POST['to_month_of_exp_'.$i];
			$areaData = $_POST['area_'.$i];
			$companyData = ucwords($_POST['company_'.$i]);
			$vitalData = $_POST['vital_'.$i];
			$company_profileData = trim($_POST['company_profile_'.$i]);
			$worklocData = ucfirst($_POST['workloc_'.$i]);
			$key_responsibilityData = trim($_POST['key_responsibility_'.$i]);
			$key_achievementData = trim($_POST['key_achievement_'.$i]);
			$reporting_toData = trim($_POST['reporting_to_'.$i]);
		
			$query = "CALL get_designation_details('$desigData')";
			try{
				// calling mysql execute query function
				if(!$result = $mysql->execute_query($query)){ 
					throw new Exception('Problem in fetching designation details');
				}			
			
				while($row = $mysql->display_result($result)){
					$design = $row['designation'];				
				}
				// free the memory
				$mysql->clear_result($result);
				// next query execution
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
	
		$templateProcessor->setValue('EXPCOMPANYNAME#'.$train_flag, strtoupper($companyData),   0, 0);	
		$templateProcessor->setValue('ESTART#'.$train_flag, date('M', mktime(0, 0, 0, $from_month_exp, 10)).' '.$from_year_exp,   0, 0);
		$templateProcessor->setValue('EEND#'.$train_flag, date('M', mktime(0, 0, 0, $to_month_exp, 10)).' '.$to_year_exp,   0, 0);
		$templateProcessor->setValue('EXPLOCATION#'.$train_flag, $worklocData,   0, 0);
		$templateProcessor->setValue('EXPDESIG#'.$train_flag, $design,   0, 0);
		$train_flag++;
} 



// to retain career details 
$templateProcessor->cloneRow('CARSTART', $_POST['exp_count']);
$train_flag = 1;
for($i = 0; $i < $_POST['exp_count']; $i++){
			$desigData = $_POST['desig_'.$i];
			$from_year_exp = $_POST['from_year_of_exp_'.$i];
			$from_month_exp = $_POST['from_month_of_exp_'.$i];
			$to_year_exp = $_POST['to_year_of_exp_'.$i];
			$to_month_exp = $_POST['to_month_of_exp_'.$i];
			$areaData = $_POST['area_'.$i];
			$companyData = $_POST['company_'.$i];
			$company_profileData = ucfirst(trim($_POST['company_profile_'.$i]));
			$worklocData = ucfirst($_POST['workloc_'.$i]);
			$key_responsibilityData = trim($_POST['key_responsibility_'.$i]);
			$key_achievementData = trim($_POST['key_achievement_'.$i]);
			$reporting_toData = ucfirst(trim($_POST['reporting_to_'.$i]));
			
			$query = "CALL get_designation_details('$desigData')";
			try{
				// calling mysql execute query function
				if(!$result = $mysql->execute_query($query)){ 
					throw new Exception('Problem in fetching designation details');
				}			
			
				while($row = $mysql->display_result($result)){
					$design = $row['designation'];				
				}
				// free the memory
				$mysql->clear_result($result);
				// next query execution
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
			
		$templateProcessor->setValue('CARSTART#'.$train_flag, date('M', mktime(0, 0, 0, $from_month_exp, 10)).' '.$from_year_exp,   0, 0);
		$templateProcessor->setValue('CAREND#'.$train_flag, date('M', mktime(0, 0, 0, $to_month_exp, 10)).' '.$to_year_exp,   0, 0);
		$templateProcessor->setValue('CARCOMPANYNAME#'.$train_flag, strtoupper($companyData),   0, 0);
		$templateProcessor->setValue('CARLOCATION#'.$train_flag, $worklocData,   0, 0);
		$templateProcessor->setValue('CARDESIG#'.$train_flag, $design,   0, 0);
		$templateProcessor->setValue('CARCOMPANYPROFILE#'.$train_flag, $company_profileData,   0, 0);
		$templateProcessor->setValue('CARREPORTING#'.$train_flag, $reporting_toData,   0, 0);
		
		$responsibilityData = explode("\n", $key_responsibilityData);	
		$key_res_data = '';
		foreach($responsibilityData as $key_resp){
			if(trim($key_resp) != ''){
				$key_res_data .= '<w:p><w:pPr><w:numPr><w:ilvl w:val="0"/><w:numId w:val="1"/></w:numPr></w:pPr><w:rPr><w:rFonts w:ascii="Gadugi"/><w:sz w:val="30"/></w:rPr><w:r><w:t>'.ucfirst($key_resp).'</w:t></w:r></w:p>';
			}
		}
		$key_responsibilityData_xml = HTMLtoOpenXML::getInstance()->fromHTML($key_res_data);
		$templateProcessor->setValue('CARKEYRESP#'.$train_flag,  $key_responsibilityData_xml,   0, 1);
		
		$achievementData = explode("\n", $key_achievementData);		
		$key_achi_data = '';
		foreach($achievementData as $key_achieve){
			if(trim($key_achieve) != ''){
				$key_achi_data .= '<w:p><w:pPr><w:numPr><w:ilvl w:val="0"/><w:numId w:val="1"/></w:numPr></w:pPr><w:rPr><w:rFonts w:ascii="Gadugi"/><w:sz w:val="30"/></w:rPr><w:r><w:t>'.ucfirst($key_achieve).'</w:t></w:r></w:p>';
			}
		}
		
		$key_achieveData_xml = HTMLtoOpenXML::getInstance()->fromHTML($key_achi_data);		
		$templateProcessor->setValue('CARKEYACHIEVE#'.$train_flag, $key_achieveData_xml,   0, 1);
		
		$train_flag++;
} 





// echo date('H:i:s'), ' Saving the result document...', EOL;
// $templateProcessor->saveAs('results/EWKI - 2.docx');
$templateProcessor->saveAs($resume_path);

echo getEndingNotes(array('Word2007' => 'docx'));
if (!CLI) {
    include_once 'Sample_Footer.php';
}
