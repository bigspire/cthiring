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
	$sql = "insert into hc_sync (module,status,sync_time,error_msg) values('3',	'0','$time','Unable to Connect to HC Server')";
	$result = mysql_query($sql);
	die;
}else{
	$link_con = mssql_select_db('HCLIVE', $link);
}



// get last sync time
$sql = "select sync_time from hc_sync where module = '3'  and status = '1' order by id desc limit 1";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
$sync_time =  date('Y-m-d H:i', strtotime($row['sync_time']) - 19800);
$sql = "select RID,FirstName,LastName,EmailID,Mobile,PhoneH,ReleventExp,PassportValidity,ResumeStatus,
TotalExp,DOB,Gender,CONVERT(TEXT,SkillsText) skill,LocationID,CONVERT(TEXT,EducationText) education,PresentCTC,ExpectedCTC,PresentEmployer,
CONVERT(TEXT,FunctionText) functions ,CONVERT(TEXT,IndustryText) industry,CONVERT(TEXT,PerferLocation) location,
NoticePeriod, LastUpdateDate,DocModifiedDate,LastModifiedUserID,
CONVERT(TEXT,Address1) ad1, CONVERT(TEXT,Address2) ad2,AlternateEmailID,DesignationID,CreatedUserID,CreatedDate
 from HC_RESUME_BANK where (CreatedDate >= '$sync_time' or LastUpdateDate >= '$sync_time' or DocModifiedDate >= '$sync_time' 
 ) ORDER BY RID asc";

$result = mssql_query($sql);
$row_count = mssql_num_rows($result);
$count = 0;$update = 0;$insert = 0;
while($row = mssql_fetch_assoc($result)){
	$id = $row['RID'];
	$first = $row['FirstName'];
	$last_name = $row['LastName'];
	$email = mysql_real_escape_string($row['EmailID']);
	$alt_email = $row['AlternateEmailID'];
	$mobile = mysql_real_escape_string($row['Mobile']);
	$phone = mysql_real_escape_string($row['PhoneH']);
	$rel_exp = $row['ReleventExp'];
	$total_exp = $row['TotalExp'];
	$dob = date('Y-m-d', strtotime($row['DOB']));
	$desig_id = $row['DesignationID'];
	$gender = $row['Gender'];
	$skill = mysql_real_escape_string($row['skill']);
	$education = mysql_real_escape_string($row['education']);
	$p_ctc = $row['PresentCTC'];
	$e_ctc = $row['ExpectedCTC'];
	$status = $row['ResumeStatus'];
	$loc = $row['location'];
	$loc_id = $row['LocationID'];
	$p_employer = mysql_real_escape_string($row['PresentEmployer']);
	$function = mysql_real_escape_string($row['functions']);
	$industry = mysql_real_escape_string($row['industry']);
	$notice = $row['NoticePeriod'];
	$address1 = mysql_real_escape_string($row['ad1']);
	$address2 = mysql_real_escape_string($row['ad2']);
	$last_modified = date('Y-m-d H:i:s', strtotime($row['LastUpdateDate'])  + 19800);
	$doc_modified = date('Y-m-d H:i:s', strtotime($row['DocModifiedDate'])  + 19800);
	$modified_by = $row['LastModifiedUserID'];
	$resume = mysql_real_escape_string($row['resume']);
	$created_by = $row['CreatedUserID'];	
	$created = date('Y-m-d H:i:s', strtotime($row['CreatedDate'])  + 19800);
	
	// if exists in mysql database, insert or update
	$sql = "select id from resume where id = '$id'";
	$result_id = mysql_query($sql);
	$row_id = mysql_fetch_assoc($result_id);
	
	$update_flag = 0; $insert_flag = 0;
	$row_id = $row_id['id'];
	if($row_id != ''){		
		$save_sql = "update resume set id = '$id', first_name='$first',last_name='$last_name', email_id='$email', alt_email='$alt_email',  mobile='$mobile',
		mobile2='$phone',total_exp='$total_exp',dob='$dob',gender='$gender',skills='$skill',education='$education',prefer_location='$loc',
		present_ctc='$p_ctc',expected_ctc='$e_ctc',present_employer='$p_employer',function='$function',industry='$industry',
		notice_period='$notice',address1='$address1',address2='$address2',status='$status',created_date='$created', 
		created_by='$created_by',relevant_exp='$rel_exp',designation_id='$desig_id',res_location_id='$loc_id',
		modified_by='$modified_by',modified_date='$last_modified',doc_modified='$doc_modified' where id = '$row_id'";			
		$save_result = mysql_query($save_sql);
		$update_flag = 1;
				
	}else{
		$save_sql = "insert into resume (id, first_name,last_name, email_id, alt_email,  mobile,mobile2,total_exp,dob,gender,
		skills,education,prefer_location,present_ctc,expected_ctc,present_employer,function,industry,notice_period,address1,address2,
		status,created_date, created_by,relevant_exp,designation_id,res_location_id,modified_by,modified_date,doc_modified)
		values('$id', '$first','$last_name', '$email', '$alt_email',  '$mobile', '$phone', '$total_exp', '$dob', '$gender',
		'$skill','$education','$loc','$p_ctc','$e_ctc','$p_employer','$function','$industry','$notice','$address1','$address2',
		'$status','$created','$created_by','$rel_exp','$desig_id','$loc_id','$modified_by','$last_modified','$doc_modified')";		
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
$sql = "insert into hc_sync (module,status,sync_time,no_update,no_insert,fail_update,fail_insert) values('3',
'$status','$time','$update','$insert','$update_error_id','$insert_error_id')";
$result = mysql_query($sql);




?>