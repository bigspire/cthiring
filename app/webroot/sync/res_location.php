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
$link = mssql_connect('122.165.98.119', 'sa', 'CtHrs@12345');
if (!$link) {
    //die('Something went wrong while connecting to MSSQL');
	// update  sync status
	$time = date('Y-m-d H:i:s');
	$sql = "insert into hc_sync (module,status,sync_time,error_msg) values('6',	'0','$time','Unable to Connect to HC Server')";
	$result = mysql_query($sql);
	die;
}else{
	$link_con = mssql_select_db('HCLIVE', $link);
}



// get last sync time
$sql = "select sync_time from hc_sync where module = '6'  and status = '1' order by id desc limit 1";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
$sync_time =  date('Y-m-d H:i', strtotime($row['sync_time']) - 19800);
$sql = "select  RID, LocationTitle,ModifiedDate,[MCreatedUser],[MCreatedDate],[MModifiedUser],
[StateID] from [HCM_RESUME_LOCATIONS] where (MCreatedDate >= '$sync_time' or ModifiedDate >= '$sync_time')  order by RID asc";


$result = mssql_query($sql);
$row_count = mssql_num_rows($result);
$count = 0;$update = 0;$insert = 0;
while($row = mssql_fetch_assoc($result)){
	$id = $row['RID'];
	$loc = $row['LocationTitle'];	
	$modified = date('Y-m-d H:i:s', strtotime($row['ModifiedDate'])  + 19800);
	$created_by = $row['MCreatedUser'];
	if($row['MCreatedDate'] != ''){
		$created = date('Y-m-d H:i:s', strtotime($row['MCreatedDate'])  + 19800);
	}
	$modified_by = $row['MModifiedUser'];
	$state_id = $row['StateID'];
	
	// if exists in mysql database, insert or update
	$sql = "select id from res_location where id = '$id'";
	$result_id = mysql_query($sql);
	$row_id = mysql_fetch_assoc($result_id);
	
	$update_flag = 0; $insert_flag = 0;
	$row_id = $row_id['id'];
	if($row_id != ''){		
		$save_sql = "update res_location set id='$id', location='$loc',created_date='$created',created_by='$created_by',
		modified_date='$modified',modified_by='$modified_by',state_id='$state_id' where id = '$row_id'";			
		$save_result = mysql_query($save_sql);
		$update_flag = 1;
				
	}else{
		$save_sql = "insert into res_location (id, location,created_date,created_by,modified_date,modified_by,
		state_id)values('$id', '$loc','$created','$created_by','$modified','$modified_by','$state_id')";		
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



if($update_error_id || $insert_error_id){
	$status = 0;
}else{
	$status = 1;
}

// update  sync status
$time = date('Y-m-d H:i:s');
$sql = "insert into hc_sync (module,status,sync_time,no_update,no_insert,fail_update,fail_insert) values('6',
'$status','$time','$update','$insert','$update_error_id','$insert_error_id')";
$result = mysql_query($sql);




?>