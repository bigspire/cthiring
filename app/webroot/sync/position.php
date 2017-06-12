<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', '300');
date_default_timezone_set('Asia/Calcutta');

// Connect to MySQL
$link2 = mysql_connect('localhost', 'root', '');
//$link2 = mysql_connect('hirecraftdb.coa2hvsxllkw.ap-northeast-1.rds.amazonaws.com', 'hirecraft98', 'hiRE9310');
if (!$link2){
    die('Something went wrong while connecting to MYSQL');
}else{
	$link_con2 = mysql_select_db('hirecraft_db', $link2);
}

// Connect to MSSQL
//$link = mssql_connect('BIGSPIRE', 'sa', 'spire789');
$link = mssql_connect('122.165.98.119', 'sa', 'CtHrs@12345');
if (!$link) {
    //die('Something went wrong while connecting to MSSQL');
	// update  sync status
	$time = date('Y-m-d H:i:s');
	$sql = "insert into hc_sync (module,status,sync_time,error_msg) values('1',
	'0','$time','Unable to Connect to HC Server')";
	$result = mysql_query($sql);
	die;
}else{
	$link_con = mssql_select_db('HCLIVE', $link);
}



// get last sync time
$sql = "select sync_time from hc_sync where module = '1'  and status = '1' order by id desc limit 1";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
$sync_time =  date('Y-m-d H:i', strtotime($row['sync_time']) - 19800);





	
$sql = "select RID, ClientID,ContactID,JobCode,ReqTitle,PeopleCount,MinExperience,MaxExperience,CTCRangeAmountFrom,
CTCRangeAmountTo,CONVERT(TEXT, LocationText) location,CreatedUserID,CreatedDate, ModiDate,ModiUserID,ReqStatus,
CONVERT(TEXT, EducationText) education,CONVERT(TEXT, TeamMembersText) team,CONVERT(TEXT, PlainJD) jd,CONVERT(TEXT, SkillsText) skill
from HC_REQUISITIONS where (CreatedDate >= '$sync_time' or ModiDate >= '$sync_time') order by RID asc";
$result = mssql_query($sql);
$row_count = mssql_num_rows($result);
$count = 0;$update = 0;$insert = 0;
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
	$created = date('Y-m-d H:i:s', strtotime($row['CreatedDate'])  + 19800);
	$mod_by = $row['ModiUserID'];
	$mod_date = date('Y-m-d H:i:s', strtotime($row['ModiDate'])  + 19800);
	$client_id = $row['ClientID'];
	$contact_id = $row['ContactID'];
	$status = $row['ReqStatus'];
	$education = mysql_real_escape_string($row['education']);
	$skill = mysql_real_escape_string($row['skill']);
	$jd = mysql_real_escape_string($row['jd']);
	$team = mysql_real_escape_string($row['team']);
	$desc = mysql_real_escape_string($row['job_desc']);
	
	// if exists in mysql database, insert or update
	$sql = "select id from requirements where id = '$id'";
	$result_id = mysql_query($sql);
	$row_id = mysql_fetch_assoc($result_id);
	
	$update_flag = 0; $insert_flag = 0;
	$row_id = $row_id['id'];
	if($row_id != ''){		
		$save_sql = "update requirements set id = '$id', job_code = '$job_code' ,job_title = '$job_title', no_job = '$no_job',
		min_exp = '$min_exp', max_exp = '$max_exp',location='$loc',ctc_from='$ctc_from',ctc_to='$ctc_to',req_status_id='$status',
		created_date='$created',created_by='$created_by',modified_date='$mod_date',modified_by='$mod_by',
		client_contact_id='$contact_id',clients_id='$client_id',education='$education',skills='$skill',plain_jd='$jd',
		team_member='$team' where id = '$row_id'";			
		$save_result = mysql_query($save_sql);
		$update_flag = 1;		
	}else{
		$save_sql = "insert into requirements (id, job_code,job_title, no_job, min_exp, max_exp,location,ctc_from,ctc_to,req_status_id,
		created_date,created_by,modified_date,modified_by,client_contact_id,clients_id,education,skills,plain_jd,team_member)
		values('$id', '$job_code','$job_title', '$no_job', '$min_exp', '$max_exp', '$loc', '$ctc_from', '$ctc_to', '$status',
		'$created','$created_by','$mod_date','$mod_by','$contact_id','$client_id','$education','$skill','$jd','$team')";	
		$save_result = mysql_query($save_sql);
		$insert_flag = 1;
	}
	if(!$save_result){
		if($insert_flag == '1'){
			$insert_error_id .= $row_id.',';
		}else{
			$update_error_id .= $row_id.',';
		}		
	}else if($save_result && $update_flag){
		$update++;
	}else if($save_result && $insert_flag){
		$insert++;
	}
	
}

mssql_free_result($result);

// update positions string
$sql_string = 'SET SQL_SAFE_UPDATES = 0;';
$result_string = mysql_query($sql_string);
$sql_string = "update requirements set job_title = replace(job_title, ' – ', ' - ') where created_date >= '$sync_time';";
$result_string = mysql_query($sql_string);
$sql_string = 'SET SQL_SAFE_UPDATES = 1;';
$result_string = mysql_query($sql_string);


if($update_error_id || $insert_error_id){
	$status = 0;
}else{
	$status = 1;
}

// update  sync status
$time = date('Y-m-d H:i:s');
$sql = "insert into hc_sync (module,status,sync_time,no_update,no_insert,fail_update,fail_insert) values('1',
'$status','$time','$update','$insert','$update_error_id','$insert_error_id')";
$result = mysql_query($sql);




?>