<?php
/* 
   Purpose : To show recruiter performance.
	Created : Nikitasa
	Date : 19-06-2017
*/

//include smarty congig file
include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');
// add menu count
include('menu_count.php');
// include paging class 
include('classes/class.paging.php');
// mailing class
include('classes/class.mailer.php');
// content class
include('classes/class.content.php');

// role based validation
$module_access = $fun->check_role_access('18',$modules);
$smarty->assign('module',$module_access);


// assign page title
$smarty->assign('page_title' , 'Account Holder Performance - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('report_menu','active');
// display smarty file
$smarty->display('ah_performance.tpl');
?>