<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', '300');
date_default_timezone_set('Asia/Calcutta');

// Connect to MSSQL
//$link = mssql_connect('BIGSPIRE', 'sa', 'spire789');
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

	
$sql = "select RID,FirstName,LastName,EmailID,Mobile,PhoneH,ReleventExp,PassportValidity,ResumeStatus,
TotalExp,DOB,Gender,CONVERT(TEXT,SkillsText) skill,LocationID,CONVERT(TEXT,EducationText) education,PresentCTC,ExpectedCTC,PresentEmployer,
CONVERT(TEXT,FunctionText) functions ,CONVERT(TEXT,IndustryText) industry,CONVERT(TEXT,PerferLocation) location,
NoticePeriod, LastUpdateDate,DocModifiedDate,LastModifiedUserID,
CONVERT(TEXT,Address1) ad1, CONVERT(TEXT,Address2) ad2,AlternateEmailID,DesignationID,CreatedUserID,CreatedDate from HC_RESUME_BANK
ORDER BY RID asc OFFSET 125000 ROWS FETCH NEXT 10000 ROWS ONLY";
$result = mssql_query($sql);
$count = 0;
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
	$last_modified = date('Y-m-d H:i:s', strtotime($row['LastUpdateDate']));
	$doc_modified = date('Y-m-d H:i:s', strtotime($row['DocModifiedDate']));
	$modified_by = $row['LastModifiedUserID'];
	$resume = mysql_real_escape_string($row['resume']);
	$created_by = $row['CreatedUserID'];	
	$created = date('Y-m-d H:i:s', strtotime($row['CreatedDate']));
	
	$save_sql = "insert into resume (id, first_name,last_name, email_id, alt_email,  mobile,mobile2,total_exp,dob,gender,
	skills,education,prefer_location,present_ctc,expected_ctc,present_employer,function,industry,notice_period,address1,address2,
	status,created_date, created_by,relevant_exp,designation_id,res_location_id,modified_by,modified_date,doc_modified)
	values('$id', '$first','$last_name', '$email', '$alt_email',  '$mobile', '$phone', '$total_exp', '$dob', '$gender',
	'$skill','$education','$loc','$p_ctc','$e_ctc','$p_employer','$function','$industry','$notice','$address1','$address2',
	'$status','$created','$created_by','$rel_exp','$desig_id','$loc_id','$modified_by','$last_modified','$doc_modified')";	
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