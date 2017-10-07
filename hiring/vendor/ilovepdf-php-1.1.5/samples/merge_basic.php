<?php
//include the autoloader
//require_once('../vendor/autoload.php');
//if manual installation has been used comment line that requires the autoload and uncomment this line:
require_once('../init.php');

use Ilovepdf\Ilovepdf;


// you can call task class directly
// to get your key pair, please visit https://developer.ilovepdf.com/user/projects
$ilovepdf = new Ilovepdf('project_public_30e4ef2596c7436ae907615a841f995b_J4pWwe338d0756271411b0769ee277075a664','secret_key_9d6d00d05185d32c499082fc7e008ba1_fovTb7e8e14419dee395103d2b71d6b7e7175');

// and get the task tool
$myTask = $ilovepdf->newTask('merge');

// file var keeps info about server file id, name...
// it can be used latter to cancel a specific file
$fileA = $myTask->addFile('C:/xampp/htdocs/workouts/ilovepdf-php-1.1.5/ilovepdf-php-1.1.5/samples/files/snapshot.pdf');
$fileB = $myTask->addFile('C:/xampp/htdocs/workouts/ilovepdf-php-1.1.5/ilovepdf-php-1.1.5/samples/files/rahula4.pdf');

// process files
$myTask->execute();

// and finally download file. If no path is set, it will be downloaded on current folder
$myTask->download();