<?php
//include the autoloader
//require_once('../vendor/autoload.php');
//if manual installation has been used comment line that requires the autoload and uncomment this line:
require_once('../init.php');

use Ilovepdf\Ilovepdf;


// you can call task class directly
// to get your key pair, please visit https://developer.ilovepdf.com/user/projects
$ilovepdf = new Ilovepdf('project_public_30e4ef2596c7436ae907615a841f995b_J4pWwe338d0756271411b0769ee277075a664','secret_key_9d6d00d05185d32c499082fc7e008ba1_fovTb7e8e14419dee395103d2b71d6b7e7175');

// Create a new task
$myTaskConvertOffice = $ilovepdf->newTask('officepdf');
// Add files to task for upload
$file1 = $myTaskConvertOffice->addFile('C:\xampp\htdocs\workouts\ilovepdf-php-1.1.5\ilovepdf-php-1.1.5\samples\files\rahula4.docx');
 //$file2 = $myTaskConvertOffice->addFile('C:\xampp2\htdocs\workouts\ilovepdf-php-1.1.5\ilovepdf-php-1.1.5\samples\files\rahul.docx');
// Execute the task
$myTaskConvertOffice->execute();
// Download the package files
$myTaskConvertOffice->download();
                               
?>