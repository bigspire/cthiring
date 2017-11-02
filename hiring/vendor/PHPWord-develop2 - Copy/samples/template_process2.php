<?php
include_once 'Sample_Header.php';

// Template processor instance creation
// echo date('H:i:s'), ' Creating new TemplateProcessor instance...', EOL;


$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template_path);


require_once "HTMLtoOpenXML.php";

// Hide email and mobile
$templateProcessor->setValue($email, '********************',  1,0);  
$templateProcessor->setValue('mailto:'.$email, '********************',  1,0);  


$templateProcessor->setValue($mobile1, '********************',  1,0);
$templateProcessor->setValue($mobile2, '********************',  1,0);
$templateProcessor->setValue($mobile3, '********************',  1,0);
$templateProcessor->setValue($mobile4, '********************',  1,0);
$templateProcessor->setValue($mobile5, '********************',  1,0);
$templateProcessor->setValue($mobile6, '********************',  1,0);
$templateProcessor->setValue($mobile7, '********************',  1,0);

echo date('H:i:s'), ' Saving the result document...', EOL;
// $templateProcessor->saveAs('results/EWKI - 2.docx');
$templateProcessor->saveAs($resume_path);

echo getEndingNotes(array('Word2007' => 'docx'));
if (!CLI) {
    include_once 'Sample_Footer.php';
}
