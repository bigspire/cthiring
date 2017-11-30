<?php
include_once 'Sample_Header.php';

// Template processor instance creation
// echo date('H:i:s'), ' Creating new TemplateProcessor instance...', EOL;


$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template_path);


require_once "HTMLtoOpenXML.php";
$templateProcessor->setValue('CAND_CODE', 'MH-'.$getid,  1,0);  
$templateProcessor->setValue('CANDIDATE_NAME', ucwords($_POST['first_name'].' '.$_POST['last_name']),  1,0);       
// to retain company name field
$templateProcessor->setValue('COMPANY_NAME', ucwords($client_autoresume),  1,0);  
// to retain company location field     
$templateProcessor->setValue('COMP_LOC', ucwords($city_autoresume),  1,0); 
// to retain company state field
$templateProcessor->setValue('COMP_CTRY', ucwords($state_autoresume),  1,0);       
// to retain recruiter name field
$templateProcessor->setValue('RECRUITER_NAME', ucwords($recruiter),  1,0);
// to retain current date field      
$templateProcessor->setValue('CURRENT_DATE', date('d-M-Y'),  1,0);       
// to retain designation field 
$templateProcessor->setValue('DESIGNATION', ucwords($position_autoresume),  1,0); 

echo date('H:i:s'), ' Saving the result document...', EOL;
// $templateProcessor->saveAs('results/EWKI - 2.docx');
$templateProcessor->saveAs($resume_path);

echo getEndingNotes(array('Word2007' => 'docx'));
if (!CLI) {
    include_once 'Sample_Footer.php';
}
