<?php
include_once 'Sample_Header.php';

// Template processor instance creation
// echo date('H:i:s'), ' Creating new TemplateProcessor instance...', EOL;


$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template_path);

$templateProcessor->setValue('CANDIDATE_NAME', ucwords($_POST['first_name'].' '.$_POST['last_name']),  1,0);       

require_once "HTMLtoOpenXML.php";

$templateProcessor->setValue('COMPANY_NAME', ucwords($client_autoresume),  1,0);  

// to retain current date field      
$templateProcessor->setValue('CURRENT_DATE', date('d-M-Y'),  1,0);       

// to retain relevant exposure
$templateProcessor->setValue('RELEVANTEXPOSURE', ucfirst($_POST['relevant_exposure']),   1, 0);
// to retain CREDENTIALS CONSIDERED field
$templateProcessor->setValue('CREDENTIALSCONSIDERED', ucfirst($_POST['credential_shortlisting']),  1,0); 
// to retain VITAL INPUTS field
$templateProcessor->setValue('VITALINPUTS', ucfirst($_POST['vital_info_interview']),  1,0); 
// to retain INTERVIEW AVAILABILITY field
$templateProcessor->setValue('INTERVIEWAVAILABILITY', ucfirst($_POST['interview_availability']),  1,0); 
// to retain ACHIVEMENTS field
$templateProcessor->setValue('ACHIVEMENTS', ucfirst($_POST['achievement']),  1,0); 
// to retain CANDIDATE BRIEF field
$templateProcessor->setValue('CANDIDATEBRIEF', ucfirst($_POST['candidate_brief']),  1,0); 




// to retain appraisal field 
	$templateProcessor->setValue('CANDIDATEAPPRAISAL', ucfirst($_POST['candidate_brief']),   1, 0);
// to retain technical expertise field 
	$templateProcessor->setValue('TECHNICALEXPERTISE', ucfirst($_POST['tech_expert']),   1, 0);
// to retain personality field 
	$templateProcessor->setValue('PERSONALITYCANDIDATE', ucfirst($_POST['personality']),   1, 0);
// to retain outlook on company field 	
	$templateProcessor->setValue('OUTLOOKCOMPANY',  ucfirst($_POST['about_company']),   1, 0);
	
	
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
		


echo date('H:i:s'), ' Saving the result document...', EOL;
// $templateProcessor->saveAs('results/EWKI - 2.docx');
$templateProcessor->saveAs($resume_path4);

echo getEndingNotes(array('Word2007' => 'docx'));
if (!CLI) {
    include_once 'Sample_Footer.php';
}
