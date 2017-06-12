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

	
$sql = "select RID, [ReqResumeID], [StatusDate],[UserID],[StageTitle],[StatusTitle],convert(text,StatusUpdateNote) StatusUpdateNote from [HC_REQ_RESUME_STATUS]
order by RID asc OFFSET 200000 ROWS FETCH NEXT 25000 ROWS ONLY";
$result = mssql_query($sql);
$count = 0;
while($row = mssql_fetch_assoc($result)){
	$id = $row['RID'];
	$res_id = $row['ReqResumeID'];
	$candidate_stage = $row['CandidateStage'];
	$note = mysql_real_escape_string($row['StatusUpdateNote']);
	$stage_title = $row['StageTitle'];
	$status_title = $row['StatusTitle'];
	$created_by = $row['UserID'];
	$created = date('Y-m-d H:i:s', strtotime($row['StatusDate']));

	$save_sql = "insert into req_resume_status (id, stage_title,status_title, note, created_by, created_date,req_resume_id)
	values('$id', '$stage_title','$status_title', '$note', '$created_by', '$created', '$res_id')";	
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