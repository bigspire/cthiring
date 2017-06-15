<?php
/* 
Purpose : To include smarty.
Created : Nikitasa
Date : 21-01-2017
*/
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

date_default_timezone_set('Asia/Kolkata');
ini_set('display_errors', '0');
// smarty config
include('vendor/smarty-3.1.29/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('templates');
$smarty->setCompileDir('templates_c');
$smarty->setCacheDir('cache');
$smarty->setConfigDir('configs');
define('webroot', '../');
?>
