<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', '300');
date_default_timezone_set('Asia/Calcutta');

// Connect to MSSQL
$link = mssql_connect('122.165.98.119', 'sa', 'CtHrs@12345');
if (!$link) {
    die('Something went wrong while connecting to MSSQL');
}
$link_con = mssql_select_db('HCLIVE', $link);


// Connect to MSSQL
$link2 = mysql_connect('localhost', 'root', '');
if (!$link2) {
    die('Something went wrong while connecting to MYSQL');
}
$link_con2 = mysql_select_db('hirecraft_db', $link2);
$sql = "select  RID, UserName,FirstName,JobTitle,EmailID,Mobile,CreatedDate,ModifiedDate,CreatedUserID,ModifiedUserID,
LocationID,Status from HC_USERS order by RID asc";
$result = mssql_query($sql);

while($row = mssql_fetch_assoc($result)){
	$id = $row['RID'];
	$user_name = $row['UserName'];
	$first_name = $row['FirstName'];
	$last_name = $row['LastName'];
	$job_title = $row['JobTitle'];
	$mobile = $row['Mobile'];
	$email = $row['EmailID'];
	$created = date('Y-m-d H:i:s', strtotime($row['CreatedDate']));
	$modified = date('Y-m-d H:i:s', strtotime($row['ModifiedDate']));
	$created_by = $row['CreatedUserID'];
	$modified_by = $row['ModifiedUserID'];
	$status = $row['Status'];
	$loc = $row['LocationID'];
	
	
	$save_sql = "insert into users (id, email_id,username,first_name, last_name, mobile,position, created_date,created_by,
	modified_date,modified_by,status,location_id)
	values('$id', '$email','$user_name','$first_name', '$last_name', '$mobile', '$job_title', '$created','$created_by',
	'$modified','$modified_by',	'$status','$loc')";	
	$save_result = mysql_query($save_sql);
	if(!$save_result){
		echo 'problem in saving id: '.$id;
		echo mysql_error();
		die;
	}
	
}
mssql_free_result($result);

?>