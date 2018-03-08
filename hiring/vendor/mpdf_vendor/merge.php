<?php
// Require composer autoload
require_once __DIR__ . '/autoload.php';
/*
$mpdf2 = new \mPDF(['mode' => 'utf-8', 'format' => 'A4-L']);
$mpdf2->SetImportUse();
$pagecount2 = $mpdf2->SetSourceFile('merge.pdf');
*/

$pdf = new \mPDF(['mode' => 'utf-8', 'format' => 'A4-L']);

$pdf->enableImports = true;

foreach($files as $file){
   $pdf->SetImportUse();
   $pagecount = $pdf->SetSourceFile($file);
   for($i=1; $i<=($pagecount); $i++) {
       $pdf->AddPage();
       $import_page = $pdf->ImportPage($i);
       $pdf->UseTemplate($import_page);
      }
    }

//$pdf_name = date('Y-m-d_His') . '.pdf';
//$pdf_path = $path . $pdf_name;

//Make sure path exists
//if (!file_exists($path)) {
    // mkdir($path, 0777);
//}
$pdf->Output($merge_path, 'F');
unset($pdf);
return $pdf_path;