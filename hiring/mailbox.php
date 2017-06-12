<?php
/* 
   Purpose : To list,search,view and delete mailbox.
	Created : Nikitasa
	Date : 06-03-2017
*/

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

$keyword = $_POST['keyword'] ? $_POST['keyword'] : $_GET['keyword'];

//post url for paging
if($_POST){
	$post_url .= '&keyword='.$keyword;
}

/*// count the total no. of records
$query = "CALL list_sent_mailbox('".$keyword."','0','0','','')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing list mailbox');
	}

	// fetch result
	$data_num = $mysql->display_result($result);

	// count result
	$count = $data_num['total'];
	if($count == 0){
		$alert_msg = 'This details is not in our database';
	}
	$page = $_GET['page'] ?  $_GET['page'] : 1;
	$limit = 10;

   include('paging_call.php');	
	// free the memory
	$mysql->clear_result($result);
	// execute next query
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}*/

// if no fields are set, set default sort image
if(empty($_GET['field'])){		
	$order = 'desc';			
	$field = 'si.created_date';			
}	

// fetch all records
$query =  "call get_sent_mailbox()";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting send mailbox');
	}
	// calling mysql fetch_result function
	$i = '0';
	while($obj = $mysql->display_result($result))
	{
 		$data[] = $obj;
 		$data[$i]['created_date'] = $fun->convert_date_to_display($obj['created_date']);
 		$i++;
 		/*$pno[]=$paging->print_no();
 		$smarty->assign('pno',$pno);*/
	}

	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

/*// count the total no. of records
$query = "CALL list_delete_mailbox('".$keyword."','0','0','','')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing list delete mailbox');
	}

	// fetch result
	$data_num = $mysql->display_result($result);

	// count result
	$count = $data_num['total'];
	if($count == 0){
		$alert_msg = 'This details is not in our database';
	}
	$page = $_GET['page'] ?  $_GET['page'] : 1;
	$limit = 10;

   include('paging_call.php');	
	// free the memory
	$mysql->clear_result($result);
	// execute next query
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
*/
// if no fields are set, set default sort image
if(empty($_GET['field'])){		
	$order = 'desc';			
	$field = 'si.created_date';			
}	

// fetch all records
$query =  "call get_delete_mailbox()";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting delete mailbox');
	}
	// calling mysql fetch_result function
	$i = '0';
	while($obj = $mysql->display_result($result))
	{
 		$data1[] = $obj;
 		$data1[$i]['created_date'] = $fun->convert_date_to_display($obj['created_date']);
 		$i++;
 		/*$pno[]=$paging->print_no();
 		$smarty->assign('pno',$pno);*/
	}

	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// calling mysql close db connection function
$c_c = $mysql->close_connection();


$smarty->assign('data', $data);
$smarty->assign('data1', $data1);
$smarty->assign('keyword' , $keyword); 	
// assign page title
$smarty->assign('page_title' , 'Mailbox - CT Hiring');  
// assigning active class status to smarty menu.tpl
$smarty->assign('mailbox_active','active');
 
// display smarty file
$smarty->display('mailbox.tpl');
?>