<?php
// Require composer autoload
require_once __DIR__ . '/autoload.php';
/*
$mpdf2 = new \mPDF(['mode' => 'utf-8', 'format' => 'A4-L']);
$mpdf2->SetImportUse();
$pagecount2 = $mpdf2->SetSourceFile('merge.pdf');
*/
$mpdf = new \mPDF(['mode' => 'utf-8', 'format' => 'A4-L']);

$mpdf->SetImportUse();

$pagecount = $mpdf->SetSourceFile($merge_path);
// Import the last page of the source PDF file
$mpdf->SetWatermarkImage($img_path, 0.25, '', array(70,100));

$mpdf->showWatermarkImage = false;
$tplId = $mpdf->ImportPage(1);
$mpdf->UseTemplate($tplId);

$mpdf->addPage();
$mpdf->showWatermarkImage = false;
$tplId = $mpdf->ImportPage(2);
$mpdf->UseTemplate($tplId);

for($i = 3; $i <= $pagecount; $i++){
	$mpdf->addPage();
	$mpdf->showWatermarkImage = true;
	$mpdf->setFooter('{PAGENO}');
	$tplId = $mpdf->ImportPage($i);
	$mpdf->UseTemplate($tplId);
}

$mpdf->Output($output_path);