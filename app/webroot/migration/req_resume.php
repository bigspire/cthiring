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

	
$sql = "select RID, [ReqID],[ResID],[CandidateStage],[CandidateStatus],[StageType],[StageTitle],[StatusTitle],[CreatedUser],
[CreatedDate],[ModifiedUser],[ModifiedDate],[BillingStatus],[BillingDate],[BillingModifiedUserID],[OfferedCTC],
[BillableCTC],[PlannedJoiningDate],[JoinedOn],[StatusDate1],[OfferStatus],[JoinStatus],[ReasonID] from [HC_REQ_RESUME] 
order by RID asc OFFSET 75000 ROWS FETCH NEXT 15000 ROWS ONLY";
$result = mssql_query($sql);
$count = 0;
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
	$created = date('Y-m-d H:i:s', strtotime($row['CreatedDate']));
	$modified = date('Y-m-d H:i:s', strtotime($row['ModifiedDate']));
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
	
	
	$save_sql = "insert into req_resume (id, requirements_id,resume_id, candidate_stage, candidate_status, stage_type,stage_title,status_title,offer_status,join_status,
	ctc_offer,bill_ctc,billing_date,plan_join_date,joined_on,created_by,modified_by,created_date,modified_date,reason_id,billing_modified,date_offer)
	values('$id', '$req_id','$res_id', '$candidate_stage', '$candidate_status', '$stage_type', '$stage_title', '$status_title', '$offer_status', '$join_status',
	'$offer_ctc','$bill_ctc','$bill_date','$plan_join','$join_date','$created_by','$modified_by','$created','$modified','$reason',
	'$bill_mod_user','$offer_date')";	
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