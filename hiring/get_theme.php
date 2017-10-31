<?php 
/* 
Purpose : To display theme
Created : Nikitasa 
Date : 27-10-2017
*/


// starting session
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

$user_id = $_SESSION['user_id'];


// assigning the date
$date =  $fun->current_date();
	
if($_GET['col'] != ''){
	
	// query to edit theme details.
	$query = "CALL edit_theme('".$user_id."','".$mysql->real_escape_str($_GET['col'])."','".$date."')";
	// Calling the function that makes the update
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing edit theme');
		}		
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
		$_SESSION['theme'] = '';
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

if($_SESSION['theme'] == ''){
	// get database values
	$query = "CALL get_theme_byid('$user_id')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing theme');
		}
		$theme_data = $mysql->display_result($result);
		
		$_SESSION['theme'] = $theme_data['theme'];
		
		// set the cookie for cake pages
		setcookie("CakeCookie[THEME]", $theme_data['theme'],time()+60*60*24*30, '/');


		/*
		$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
		setcookie('THEME', $theme_data['theme'], time()+60*60*24*30, '~/', $domain, false);
		*/
		
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
		$chk = strstr($_SERVER['HTTP_REFERER'], '?');
		$separator = $chk != '' ? '&' : '?';
		header('Location: ' . $_SERVER['HTTP_REFERER'].$separator.'color='.$theme_data['theme']);
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

?>