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

$sql = "select  RID, FirstName,MobileNo,PhoneNo,EmailID,CreatedDate,ModifiedDate,CreatedUserID,ModifiedUserID,
LastName,DesignationID,Status from HC_CLIENT_CONTACTS order by RID asc";
$result = mssql_query($sql);
$count = 0;
while($row = mssql_fetch_assoc($result)){
	$id = $row['RID'];
	$first_name = $row['FirstName'];
	$last_name = $row['LastName'];
	$mobile = $row['MobileNo'];
	$phone = $row['PhoneNo'];
	$email = $row['EmailID'];
	$created = date('Y-m-d H:i:s', strtotime($row['CreatedDate']));
	$modified = date('Y-m-d H:i:s', strtotime($row['ModifiedDate']));
	$created_by = $row['CreatedUserID'];
	$modified_by = $row['ModifiedUserID'];
	$desig_id = $row['DesignationID'];
	$status = $row['Status'];
	
	
	$save_sql = "insert into contact (id, first_name,last_name,email, phone, mobile, created_date,created_by,
	modified_date,modified_by,status,designation_id)
	values('$id', '$first_name','$last_name','$email', '$phone', '$mobile', '$created','$created_by','$modified','$modified_by',
	'$status','$desig_id')";	
	$save_result = mysql_query($save_sql);
	if(!$save_result){
		//echo 'problem in saving id: '.$id;
		//echo mysql_error();
		//die;
	}else{
		$count++;
	}
	
}
echo $count.' records inserted!<br><br>';

mssql_free_result($result);

?>