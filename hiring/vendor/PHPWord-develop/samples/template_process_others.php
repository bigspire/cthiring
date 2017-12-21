<?php
include_once 'Sample_Header.php';

// Template processor instance creation
// echo date('H:i:s'), ' Creating new TemplateProcessor instance...', EOL;


$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template_path);

$templateProcessor->setValue('CANDIDATE_NAME', ucwords($_POST['first_name'].' '.$_POST['last_name']),  1,0);       

require_once "HTMLtoOpenXML.php";
  
$templateProcessor->setValue('CURRENT_DATE', date('d-M-Y'),  1,0);       

// to retain candidate phone number field   
$templateProcessor->setValue('CANDIDATE_PHONE', $_POST['telephone'],  1,0);    
  
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
	$templateProcessor->setValue('HOBBIESDETAIL', ucwords($_POST['hobby']),   1, 0);
// to retain candidate's computer skills field 
	$templateProcessor->setValue('COMPUTERSKILLS', ucwords($_POST['skills']),   1, 0);
// to retain compansation amount field 
	$templateProcessor->setValue('COMPENSATIONAMOUNT', $_POST['present_ctc'].' '.$fun->ctc_type($_POST['present_ctc_type']),   1, 0);
// to retain notice period field 	
    $templateProcessor->setValue('NOTICEPERIOD', $fun->get_notice($_POST['notice_period']),   1, 0);

	
	/*
// to retain key achievements field 	
	$key_achievementData = $_POST['key_achievement_0'];

	$html = explode("\n", $key_achievementData);
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

	*/
	
	

// to retain training field 	
	$templateProcessor->cloneRow('TRAINYR', $_POST['train_count']);
	$train_flag = 1;
	for($i = 0; $i < $_POST['train_count']; $i++){
			$train_yearData = $_POST['train_year_'.$i];
			$descriptionData = ucfirst($_POST['description_'.$i]);
			$programtitleData = ucwords($_POST['programtitle_'.$i]);
			$train_locationData = ucfirst($_POST['train_location_'.$i]);
	
		$templateProcessor->setValue('TRAINYR#'.$train_flag, $train_yearData,   0, 0);
		$templateProcessor->setValue('TRAINTITLE#'.$train_flag, $programtitleData,   0, 0);
		$templateProcessor->setValue('TRAINDESC#'.$train_flag, $descriptionData,   0, 0);
		$templateProcessor->setValue('TRAINCITY#'.$train_flag, $train_locationData,   0, 0);
		$train_flag++;
	}







echo date('H:i:s'), ' Saving the result document...', EOL;
// $templateProcessor->saveAs('results/EWKI - 2.docx');
$templateProcessor->saveAs($resume_path3);

echo getEndingNotes(array('Word2007' => 'docx'));
if (!CLI) {
    include_once 'Sample_Footer.php';
}
