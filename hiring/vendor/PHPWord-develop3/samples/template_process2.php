<?php
include_once 'Sample_Header.php';

// Template processor instance creation
// echo date('H:i:s'), ' Creating new TemplateProcessor instance...', EOL;


$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template_path);


require_once "HTMLtoOpenXML.php";


// hide the mobile nos with 91 space
foreach($phone_nos as $mobile){
	$templateProcessor->setValue('+91 '.$mobile, '**********',  1,0);
}

// hide the mobile nos with out 91 space
foreach($phone_nos as $mobile){
	$templateProcessor->setValue('+91'.$mobile, '**********',  1,0);
}

// hide the mobile nos with out +91- 
foreach($phone_nos as $mobile){
	$templateProcessor->setValue('+91-'.$mobile, '**********',  1,0);
}

// hide the mobile nos with +91 with out space 
foreach($phone_nos as $mobile){
	$templateProcessor->setValue('(+91)'.$mobile, '**********',  1,0);
}

// hide the mobile nos with (+91) and space 
foreach($phone_nos as $mobile){
	$templateProcessor->setValue('(+91) '.$mobile, '**********',  1,0);
}

// hide the mobile nos with 91-
foreach($phone_nos as $mobile){
	$templateProcessor->setValue('91-'.$mobile, '**********',  1,0);
}

// hide the mobile nos with 91 space
foreach($phone_nos as $mobile){
	$templateProcessor->setValue('91 '.$mobile, '**********',  1,0);
}


// hide the mobile nos with 91
foreach($phone_nos as $mobile){
	$templateProcessor->setValue('91'.$mobile, '**********',  1,0);
}
// hide the mobile nos.
foreach($phone_nos as $mobile){ 
	$templateProcessor->setValue($mobile, '**********',  1,0);
}

// hide the mobile nos with 0 prefix
foreach($phone_nos as $mobile){
	$templateProcessor->setValue('0'.$mobile, '**********',  1,0);
}


// hide the mail ids
foreach($mail_ids as $mail){ 
	$templateProcessor->setValue($mail, '**********',  1,0);
}

// hide the mail ids with anchor tags

/*
foreach($mail_ids as $mail){ 
	echo $html = "<a href='mailto:$mail'>$mail</a>";
	// $xml = HTMLtoOpenXML::getInstance()->fromHTML($html);	
	$templateProcessor->setValue($html, '**********',  1,0);
}

*/



// echo date('H:i:s'), ' Saving the result document...', EOL;
// $templateProcessor->saveAs('results/EWKI - 2.docx');
$templateProcessor->saveAs($resume_path);

echo getEndingNotes(array('Word2007' => 'docx'));
if (!CLI) {
    include_once 'Sample_Footer.php';
}
