<?php
/* 
   Purpose : To show weekly performance report page.
	Created : Nikitasa
	Date : 23-06-2017
*/

//unset session
session_unset();
// starting end destroying session
session_start();

//include smarty congig file
include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');
// include paging class 
include('classes/class.paging.php');
// add menu count
include('menu_count.php');

// role based validation
$module_access = $fun->check_role_access('17',$modules);
$smarty->assign('module',$module_access);

// assign page title
$smarty->assign('page_title' , 'Client Retention - Manage Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('report_active','active');
// $smarty->assign('setting_active', $fun->set_menu_active('billing'));
// display smarty file
$smarty->display('location_performance.tpl');
?>