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
$sql = "select  RID, [JobTitle],ModifiedDate from [HCM_JOBTITLE] order by RID asc";
$result = mssql_query($sql);

while($row = mssql_fetch_assoc($result)){
	$id = $row['RID'];
	$desig = $row['JobTitle'];	
	$modified = date('Y-m-d H:i:s', strtotime($row['ModifiedDate']));	
	
	$save_sql = "insert into designation(id, designation, created_date)values('$id', '$desig','$modified')";	
	$save_result = mysql_query($save_sql);
	if(!$save_result){
		echo 'problem in saving id: '.$id;
		echo mysql_error();
		die;
	}
	
}
mssql_free_result($result);

?>