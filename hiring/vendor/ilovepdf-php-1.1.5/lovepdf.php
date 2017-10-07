<?php
require_once('init.php');
// Create a new task
$ilovepdf = new Ilovepdf('project_public_id','project_secret_key');
$myTask = $ilovepdf->newTask('compress');
$file1 = $myTask->addFile('file1.pdf');
$myTask->execute();
$myTask->download();

?>