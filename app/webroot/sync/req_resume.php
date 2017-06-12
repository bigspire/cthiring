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
	$sql = "insert into hc_sync (module,status,sync_time,error_msg) values('2',
	'0','$time','Unable to Connect to HC Server')";
	$result = mysql_query($sql);
	die;
}else{
	$link_con = mssql_select_db('HCLIVE', $link);
}



// get last sync time
$sql = "select sync_time from hc_sync where module = '2'  and status = '1' order by id desc limit 1";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
$sync_time =  date('Y-m-d H:i', strtotime($row['sync_time']) - 19800);
$sql = "select RID, [ReqID],[ResID],[CandidateStage],[CandidateStatus],[StageType],[StageTitle],[StatusTitle],[CreatedUser],
[CreatedDate],[ModifiedUser],[ModifiedDate],[BillingStatus],[BillingDate],[BillingModifiedUserID],[OfferedCTC],
[BillableCTC],[PlannedJoiningDate],[JoinedOn],[StatusDate1],[OfferStatus],[JoinStatus],[ReasonID] from [HC_REQ_RESUME] 
where (CreatedDate >= '$sync_time' or JoinedOn >= '$sync_time' or StatusDate1 >= '$sync_time' or 
ModifiedDate >= '$sync_time') order by RID asc";	

$result = mssql_query($sql);
$row_count = mssql_num_rows($result);
$count = 0;$update = 0;$insert = 0;
while($row = mssql_fetch_assoc($result)){
	$id = $row['RID'];
	$req_id = $row['ReqID'];
	$res_id = $row['ResID'];
	$candidate_stage = $row['CandidateStage'];
	$candidate_status = $row['CandidateStatus'];
	$stage_type = $row['StageType'];
	$stage_title = $row['StageTitle'];
	$status_title = $row['StatusTitle'];
	$created_by = $row['CreatedUser'];
	$modified_by = $row['ModifiedUser'];
	$created = date('Y-m-d H:i:s', strtotime($row['CreatedDate'])  + 19800);
	$modified = date('Y-m-d H:i:s', strtotime($row['ModifiedDate'])  + 19800);
	$billing_status = $row['BillingStatus'];
	$bill_date = date('Y-m-d', strtotime($row['BillingDate']));
	
	$bill_mod_user = $row['BillingModifiedUserID'];
	$offer_ctc = $row['OfferedCTC'];
	$bill_ctc = $row['BillableCTC'];
	if($row['PlannedJoiningDate'] != ''){
		$plan_join = date('Y-m-d', strtotime($row['PlannedJoiningDate']));
	}else{
		$plan_join = '';
	}
	if($row['JoinedOn'] != ''){
		$join_date = date('Y-m-d', strtotime($row['JoinedOn']));
	}else{
		$join_date = '';
	}
	if($row['StatusDate1'] != ''){
		$offer_date = date('Y-m-d', strtotime($row['StatusDate1']));
	}else{
		$offer_date = '';
	}
	$offer_status = $row['OfferStatus'];
	$join_status = $row['JoinStatus'];
	$reason = $row['ReasonID'];
	
	// if exists in mysql database, insert or update
	$sql = "select id from req_resume where id = '$id'";
	$result_id = mysql_query($sql);
	$row_id = mysql_fetch_assoc($result_id);
	
	$update_flag = 0; $insert_flag = 0;
	$row_id = $row_id['id'];
	if($row_id != ''){		
		$save_sql = "update req_resume set id = '$id', requirements_id='$req_id',resume_id='$res_id', candidate_stage='$candidate_stage', 
		candidate_status='$candidate_status', stage_type='$stage_type',stage_title='$stage_title',status_title='$status_title',offer_status='$offer_status',
		join_status='$join_status',ctc_offer='$offer_ctc',bill_ctc='$bill_ctc',billing_date='$bill_date',plan_join_date='$plan_join',
		joined_on='$join_date',created_by='$created_by',modified_by='$modified_by',created_date='$created',modified_date='$modified',
		reason_id='$reason',billing_modified='$bill_mod_user',date_offer='$offer_date' where id = '$row_id'";			
		$save_result = mysql_query($save_sql);
		$update_flag = 1;			
	}else{
		$save_sql = "insert into req_resume (id, requirements_id,resume_id, candidate_stage, candidate_status, stage_type,stage_title,status_title,offer_status,join_status,
		ctc_offer,bill_ctc,billing_date,plan_join_date,joined_on,created_by,modified_by,created_date,modified_date,reason_id,billing_modified,date_offer)
		values('$id', '$req_id','$res_id', '$candidate_stage', '$candidate_status', '$stage_type', '$stage_title', '$status_title', '$offer_status', '$join_status',
		'$offer_ctc','$bill_ctc','$bill_date','$plan_join','$join_date','$created_by','$modified_by','$created','$modified','$reason',
		'$bill_mod_user','$offer_date')";	
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
$sql = "insert into hc_sync (module,status,sync_time,no_update,no_insert,fail_update,fail_insert) values('2',
'$status','$time','$update','$insert','$update_error_id','$insert_error_id')";
$result = mysql_query($sql);




?>