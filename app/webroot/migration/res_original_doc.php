<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', '300');
date_default_timezone_set('Asia/Calcutta');

// Connect to MSSQL
//$link = mssql_connect('122.165.98.119', 'sa', 'CtHrs@12345');
$link = mssql_connect('BIGSPIRE', 'sa', 'spire789');
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

	
$sql = "select RID, [ResumeID],[ResumeFileExtension], [ResumeData] from [HC_RESUME_ORIGINAL_DOC] order by RID asc 
OFFSET 35000 ROWS FETCH NEXT 10000 ROWS ONLY";
$result = mssql_query($sql);
$count = 0;
while($row = mssql_fetch_assoc($result)){ 
	$id = $row['RID'];
	$file = mysql_real_escape_string($row['ResumeFileExtension']);
	$res_id = $row['ResumeID'];
	$data = mysql_real_escape_string($row['ResumeData']);
	
	$save_sql = "insert into res_original_doc (id, resume_id,file_name,resume_data) values('$id', '$res_id','".$file."','".$data."')";	
	$save_result = mysql_query($save_sql);
	if(!$save_result){
		echo 'problem in saving id: '.$id;
		echo mysql_error();
		die;
	}else{
		$count++;
	}
	
}
echo $count.' records inserted!<br><br>';	

mssql_free_result($result);

?>