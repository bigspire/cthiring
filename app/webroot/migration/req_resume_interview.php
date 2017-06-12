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

	
$sql = "select RID, [ReqResumeID],[InterviewStageID],[InterviewDate],CONVERT(text,[InterviewDuration]) duration,[CreatedUserID],
[CreatedDate],[ModifiedUserID],[ModifiedDate],[InterviewStageStatus],[StageTitle],[StatusTitle],CONVERT(text,[InterviewPanelMembers]) panel,
 CONVERT(text,[InterviewOutcome]) InterviewOutcome from [HC_REQ_RES_INTERVIEW_STAGES] order by RID asc";
$result = mssql_query($sql);
$count = 0;
while($row = mssql_fetch_assoc($result)){
	$id = $row['RID'];
	$req_res_id = $row['ReqResumeID'];
	$int_stage_id = $row['InterviewStageID'];
	$int_date = date('Y-m-d H:i:s', strtotime($row['InterviewDate']));
	$int_duration = $row['duration'];
	$created_by = $row['CreatedUserID'];
	$modified_by = $row['ModifiedUserID'];
	$int_stage_status = $row['InterviewStageStatus'];
	$status_title = $row['StatusTitle'];
	$stage_title = $row['StageTitle'];
	$created = date('Y-m-d H:i:s', strtotime($row['CreatedDate']));
	$modified = date('Y-m-d H:i:s', strtotime($row['ModifiedDate']));
	$panel_member = $row['panel'];
	$outcome = $row['InterviewOutcome'];
	
	$save_sql = "insert into req_resume_interview (id, int_date,int_duration, int_stage_status, stage_title,status_title,
	created_by,modified_by,created_date,modified_date,req_resume_id,interview_stage_id,int_panel_member,outcome)
	values('$id', '$int_date','$int_duration', '$int_stage_status','$stage_title', '$status_title',
	'$created_by','$modified_by','$created','$modified','$req_res_id','$int_stage_id','$panel_member','$outcome')";	
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