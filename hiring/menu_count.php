<?php
/* 
Purpose : To count all menus
Created : Nikitasa
Date : 30-01-2017
*/

// starting session
session_start();

//assign user id
$_SESSION['user_id'] = $fun->decrypt($_COOKIE['CakeCookie']['ESUSER']);

if($_SESSION['user_id'] == ''){
	header('Location: ../cthiring/');
}
// get user name
$query = "call get_employee_by_id('".$_SESSION['user_id']."')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing get user name');
	}
	$row = $mysql->display_result($result);
	$smarty->assign('user_name', $row['first_name']);
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// fetch grade menu count
$query = 'CALL count_grade()';
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing grade count page');
	}
	// calling mysql fetch_result function
	$grade = $mysql->display_result($result);
	// assign grade count variables here
	$smarty->assign('grade_count', $grade['count']);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// fetch grade menu count
$query = 'CALL count_users()';
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing users count page');
	}
	// calling mysql fetch_result function
	$users = $mysql->display_result($result);
	// assign grade count variables here
	$smarty->assign('users_count', $users['count']);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}


// fetch interview menu count
$query = "CALL count_interview('".$_SESSION['user_id']."','".$_SESSION['roles_id']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing interview count page');
	}
	// calling mysql fetch_result function
	$interview = $mysql->display_result($result);

	// assign grade count variables here
	$smarty->assign('interview_count', $interview['count']);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// fetch approve billing menu count
$query = "CALL count_approve_billing('".$_SESSION['user_id']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing approve billing count page');
	}
	// calling mysql fetch_result function
	$appove_billing = $mysql->display_result($result);
	// assign approve billing count variables here
	$smarty->assign('approve_billing_count', $appove_billing['count']);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// fetch users roles id 
$query = "CALL get_roles_id('".$_SESSION['user_id']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting roles id');
	}
	// calling mysql fetch_result function
	$roles_id = $mysql->display_result($result);
	$_SESSION['roles_id'] = $roles_id['roles_id'];
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// fetch resume menu count
$query = 'CALL count_resume()';
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing resume count page');
	}
	// calling mysql fetch_result function
	$resume = $mysql->display_result($result);
	// assign resume count variables here
	$smarty->assign('resume_count', $resume['count']);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// fetch position menu count
$query = 'CALL count_position()';
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing position count page');
	}
	// calling mysql fetch_result function
	$position = $mysql->display_result($result);
	// assign position count variables here
	$smarty->assign('position_count', $position['count']);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// fetch roles menu count
$query = 'CALL count_roles()';
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing roles count page');
	}
	// calling mysql fetch_result function
	$roles = $mysql->display_result($result);
	// assign position count variables here
	$smarty->assign('roles_count', $roles['count']);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// fetch client menu count
$query = "CALL count_client()";
// $query = "CALL count_client('".$_SESSION['user_id']."','".$_SESSION['roles_id']."')";
// $query = "CALL count_client_demo('98','30')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing client count page');
	}
	// calling mysql fetch_result function
	$client = $mysql->display_result($result);
	// assign client count variables here
	$smarty->assign('client_count', $client['count']);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

$query = "call get_roles_id('".$_SESSION['user_id']."')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing get user role');
	}
	$row = $mysql->display_result($result);
	$roleid = $row['roles_id']; 
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// get user modules
$query = "call get_user_module('".$roleid."')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing get user modules');
	}
	$modules = array();
	while($row = $mysql->display_result($result)){
		$modules[] = $row['id'];
	}
		$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
/*
// assign smarty for module names
foreach($modules as $key => $record){
	$smarty->assign($record, $record); 
} */
// print_r($_SESSION);
$smarty->assign('user_id', $roleid); 
?>