<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body style="margin:0; padding:0; background:#e1e1e1;">

<table width="700" border="0" align="left" cellpadding="0" cellspacing="0" style="border:2px solid #fff; background:#fff; margin-bottom:40px">
  <tr>
    <td width="436" height="40" style="color:#fff;font-family:arial;"><img title="CareerTree HR Solutions" src="http://managehiring.com/img/ct_mail_logo.png"/></td>
    <td width="269" align="right" style="padding-right:20px;"></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="490" valign="top"  >
		<h1 style="font:bold 15px Arial, Helvetica, sans-serif; color:#212428; margin:0 0 10px 0;">Dear <?php echo $to_name?>,</h1>
          <p style="font:13px Arial, Helvetica, sans-serif; color:#212428; margin:0;">The following leave request is <?php echo strtolower($approve_msg);?> by <?php echo $from_name;?>. Please login to manage hiring and check the leave status.</p><br />

          <p style="font:normal 13px Arial, Helvetica, sans-serif; color:#212428; margin:0;">Please check the details below,</p>
          <table width="100%" border="0" cellspacing="2" cellpadding="10" style="border:1px solid #ededed; font:bold 13px Arial, Helvetica, sans-serif; color:#212428; ">
          
          
          
            
			
			
			<tr style="background:#f5f4f4;">
              
			    <td width="130">Leave From</td>
              <td  style="color:#2a2a2a;"><?php echo $this->Functions->format_date($leave_from); ?></td>
			    <td width="130">Leave To</td>
              <td  style="color:#2a2a2a;"><?php echo $this->Functions->format_date($leave_to); ?></td>
            
            </tr>
			
			  <tr style="background:#f5f4f4;">
            
              <td>Leave Type</td>
              <td  style="color:#2a2a2a;"><?php echo $this->Functions->get_leave_type($leave_type); ?></td>
			  
			  <td width="100">Reason</td>
              <td   style="color:#2a2a2a;"><?php echo $reason; ?></td>
            </tr>
            
          
		   <?php if($remarks != ''): ?>
		 <tr style="background:#f5f4f4;">
              <td>Remarks</td>
              <td colspan="3" style="color:#2a2a2a;"><?php echo $remarks; ?></td>
            </tr>
		<?php endif; ?>	
			
			
          </table>
        
</td>
      </tr>
    </table></td>
  </tr>

  
  <tr>
    <td height="40" colspan="2" valign="top"  style="font:normal 12px Arial, Helvetica, sans-serif; color:#212428; padding:0 20px">
    <p >Note: This is system generated mail. Please do not reply to this email ID. if you have a query or need 
any clarification you may email us.  <a href="mailto:hiring@career-tree.in" style="color:#e56712;">hiring@career-tree.in</a> 
</p>
    </td>
  </tr>
</table>
</body>
</html>
