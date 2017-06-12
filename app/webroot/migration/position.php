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

	
$sql = "select  RID, ClientID,ContactID,JobCode,ReqTitle,PeopleCount,MinExperience,MaxExperience,CTCRangeAmountFrom,
CTCRangeAmountTo,CONVERT(TEXT, LocationText) location,CreatedUserID,CreatedDate, ModiDate,ModiUserID,ReqStatus,
CONVERT(TEXT, EducationText) education,CONVERT(TEXT, TeamMembersText) team,CONVERT(TEXT, PlainJD) jd,CONVERT(TEXT, SkillsText) skill  from HC_REQUISITIONS order by RID asc";
$result = mssql_query($sql);
$count = 0;
while($row = mssql_fetch_assoc($result)){
	$id = $row['RID'];
	$job_code = $row['JobCode'];
	$job_title = mysql_real_escape_string($row['ReqTitle']);
	$no_job = $row['PeopleCount'];
	$min_exp = $row['MinExperience'];
	$max_exp = $row['MaxExperience'];
	$loc = $row['location'];
	$ctc_from = $row['CTCRangeAmountFrom'];
	$ctc_to = $row['CTCRangeAmountTo'];
	$created_by = $row['CreatedUserID'];
	$created = date('Y-m-d H:i:s', strtotime($row['CreatedDate']));
	$mod_by = $row['ModiUserID'];
	$mod_date = date('Y-m-d H:i:s', strtotime($row['ModiDate']));
	$client_id = $row['ClientID'];
	$contact_id = $row['ContactID'];
	$status = $row['ReqStatus'];
	$education = mysql_real_escape_string($row['education']);
	$skill = mysql_real_escape_string($row['skill']);
	$jd = mysql_real_escape_string($row['jd']);
	$team = mysql_real_escape_string($row['team']);
	$desc = mysql_real_escape_string($row['job_desc']);
	
	$save_sql = "insert into requirements (id, job_code,job_title, no_job, min_exp, max_exp,location,ctc_from,ctc_to,req_status_id,
	created_date,created_by,modified_date,modified_by,client_contact_id,clients_id,education,skills,plain_jd,team_member)
	values('$id', '$job_code','$job_title', '$no_job', '$min_exp', '$max_exp', '$loc', '$ctc_from', '$ctc_to', '$status',
	'$created','$created_by','$mod_date','$mod_by','$contact_id','$client_id','$education','$skill','$jd','$team')";	
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