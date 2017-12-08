<?php
/* 
Purpose : To validate mail contents.
Created : Nikitasa
Date : 03-02-2017
*/

class mailContent extends fun{
	
/* function to print the uploded resume info html */

	function get_create_resume_mail($form_data,$client_autoresume,$position_autoresume,$recruiter,$recruiter_email,$ah_name,$ah_email){ 
	  $approval_user_name = ucwords($approval_user_name);
	  $user_name = ucwords($user_name);
	  $content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body style="margin:0; padding:0; background:#e1e1e1;">

<table width="700" border="0" align="left" cellpadding="0" cellspacing="0" style="border:2px solid #fff; background:#fff; margin-bottom:40px">
	
  <tr style="background:rgb(67,142,185) none repeat scroll 0% 0%">
    <td style="padding-left:20px;color:rgb(255,255,255);font-family:arial" width="436" height="80"><h1>MANAGE HIRING</h1></td>
    <td style="padding-right:20px" width="269" align="right"></td>
  </tr>
 
  
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="490" valign="top"  style="padding:0 20px;"><br><h1 style="font:bold 15px Arial, Helvetica, sans-serif; color:#676767; margin:0 0 10px 0;">Dear {$ah_name},</h1>
          <p style="font:13px Arial, Helvetica, sans-serif; color:#676767; margin:0;">
		  The following resume is uploaded by {$recruiter} . Please login to Manage Hiring and start sending the resume to this client.</p><br />
		  
          <p style="font:bold 13px Arial, Helvetica, sans-serif; color:#676767; margin:0;">Please check the details below,</p>
          <table width="100%" border="0" cellspacing="2" cellpadding="10" style="border:1px solid #ededed; font:bold 13px Arial, Helvetica, sans-serif; color:#6f6e6e; margin:10px 0 20px 0;">
		   <tr style="background:#f5f4f4;">
             	<td width="130">Candidate Name</td>
              	<td style="color:#2a2a2a;">{$form_data['first_name']} {$form_data['last_name']}</td>
              	<td width="130">Position</td>
              	<td style="color:#2a2a2a;">{$position_autoresume}</td>	
             </tr>
             <tr style="background:#f5f4f4;">
              	<td width="100">Client Name</td>
              	<td style="color:#2a2a2a;">{$client_autoresume}</td>
			  		<td width="100">Uploaded By</td>
              	<td style="color:#2a2a2a;">{$recruiter}</td>
             </tr>
          </table>
        
</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
 <tr>
    <td height="80" colspan="2" valign="top" bgcolor="#ededed" style="font:normal 12px Arial, Helvetica, sans-serif; color:#6f6e6e; padding:0 20px">
    <p >Note: This is system generated mail. Please do not reply to this email ID. if you have a query or need 
any clarification you may
email us.  <a href="mailto:es@career-tree.in" style="color:#e56712;">es@career-tree.in</a> 
</p>
    </td>
  </tr>
</table>
</body>
</html>

EOD;
	return $content;

	}		
	
/* function to print the create billing info html */
	function get_create_billing_mail($form_data,$rows,$user_name,$approval_user_name,$candidate_name){ 
	  $approval_user_name = ucwords($approval_user_name);
	  $user_name = ucwords($user_name);
	  $content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body style="margin:0; padding:0; background:#e1e1e1;">

<table width="700" border="0" align="left" cellpadding="0" cellspacing="0" style="border:2px solid #fff; background:#fff; margin-bottom:40px">
  
   <tr style="background:rgb(67,142,185) none repeat scroll 0% 0%">
    <td style="padding-left:20px;color:rgb(255,255,255);font-family:arial" width="436" height="80"><h1>MANAGE HIRING</h1></td>
    <td style="padding-right:20px" width="269" align="right"></td>
  </tr>
 
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="490" valign="top"  style="padding:0 20px;"><br><h1 style="font:bold 15px Arial, Helvetica, sans-serif; color:#676767; margin:0 0 10px 0;">Dear {$approval_user_name},</h1>
          <p style="font:13px Arial, Helvetica, sans-serif; color:#676767; margin:0;">
		  You have received a billing request from {$user_name}. Please login to Manage Hiring and update the status of the request.</p><br />
		  
          <p style="font:bold 13px Arial, Helvetica, sans-serif; color:#676767; margin:0;">Below are the billing request details,</p>
          <table width="100%" border="0" cellspacing="2" cellpadding="10" style="border:1px solid #ededed; font:bold 13px Arial, Helvetica, sans-serif; color:#6f6e6e; margin:10px 0 20px 0;">
		   <tr style="background:#f5f4f4;">
             	<td width="100">Candidate Name</td>
              	<td style="color:#2a2a2a;">{$rows['candidate_name']}{$form_data['candidate_name']}</td>
              	<td width="100">Position</td>
              	<td style="color:#2a2a2a;">{$rows['position']}{$form_data['position']}</td>	
             </tr>
             <tr style="background:#f5f4f4;">
              	<td width="100">Client Name</td>
              	<td style="color:#2a2a2a;">{$rows['client_name']}{$form_data['client_name']}</td>
			  		<td width="100">Billing Amount</td>
              	<td style="color:#2a2a2a;">{$rows['billing_amount']}{$form_data['billing_amount']}</td>
             </tr>
          </table>
        
</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
 <tr>
    <td height="80" colspan="2" valign="top" bgcolor="#ededed" style="font:normal 12px Arial, Helvetica, sans-serif; color:#6f6e6e; padding:0 20px">
    <p >Note: This is system generated mail. Please do not reply to this email ID. if you have a query or need 
any clarification you may
email us.  <a href="mailto:es@career-tree.in" style="color:#e56712;">es@career-tree.in</a> 
</p>
    </td>
  </tr>
</table>
</body>
</html>

EOD;
	return $content;

	}		
	
/* function to print the approve/reject billing info html */
	function get_level1_billing_mail($form_data,$rows,$user_name,$approval_user_name,$mail_status){ 
	  $approval_user_name = ucwords($approval_user_name);
	  $mail_status = $mail_status;
	  $user_name = ucwords($user_name);
	  $content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body style="margin:0; padding:0; background:#e1e1e1;">

<table width="700" border="0" align="left" cellpadding="0" cellspacing="0" style="border:2px solid #fff; background:#fff; margin-bottom:40px">

  
   <tr style="background:rgb(67,142,185) none repeat scroll 0% 0%">
    <td style="padding-left:20px;color:rgb(255,255,255);font-family:arial" width="436" height="80"><h1>MANAGE HIRING</h1></td>
    <td style="padding-right:20px" width="269" align="right"></td>
  </tr>

  <tr>
  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="490" valign="top"  style="padding:0 20px;"><br><h1 style="font:bold 15px Arial, Helvetica, sans-serif; color:#676767; margin:0 0 10px 0;">Dear {$user_name},</h1>
          <p style="font:13px Arial, Helvetica, sans-serif; color:#676767; margin:0;">
          Your billing request has been
		  {$mail_status}  {$approval_user_name}. Please login to Manage Hiring and check the details.</p><br />
		  
          <p style="font:bold 13px Arial, Helvetica, sans-serif; color:#676767; margin:0;">Below are the billing request details,</p>
          <table width="100%" border="0" cellspacing="2" cellpadding="10" style="border:1px solid #ededed; font:bold 13px Arial, Helvetica, sans-serif; color:#6f6e6e; margin:10px 0 20px 0;">
          
             <tr style="background:#f5f4f4;">
             	<td width="100">Candidate Name</td>
              	<td style="color:#2a2a2a;">{$rows['candidate_name']} {$form_data['candidate_name']}</td>
              	<td width="100">Position</td>
              	<td style="color:#2a2a2a;">{$rows['position']} {$form_data['position']}</td>	
             </tr>
             <tr style="background:#f5f4f4;">
              	<td width="100">Client Name</td>
              	<td style="color:#2a2a2a;">{$rows['client_name']} {$form_data['client_name']}</td>
			  		<td width="100">Billing Amount</td>
              	<td style="color:#2a2a2a;">{$rows['billing_amount']} {$form_data['billing_amount']}</td>
             </tr>
          </table>
        
</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
 <tr>
    <td height="80" colspan="2" valign="top" bgcolor="#ededed" style="font:normal 12px Arial, Helvetica, sans-serif; color:#6f6e6e; padding:0 20px">
    <p >Note: This is system generated mail. Please do not reply to this email ID. if you have a query or need 
any clarification you may
email us.  <a href="mailto:es@career-tree.in" style="color:#e56712;">es@career-tree.in</a> 
</p>
    </td>
  </tr>
</table>
</body>
</html>

EOD;
	return $content;

	}
}
$content = new mailContent();