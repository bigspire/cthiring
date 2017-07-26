<?php 
date_default_timezone_set('Asia/Calcutta');	
 /* function to check gender */
function check_gender($gen){
		if($gen == '1'){
			$txt = 'Male';
		}else if($gen == '2'){
			$txt = 'Female';
		}
		return $txt;
   }
 /* function to find the min and max exp */
 function check_exp($value){ 		
		if($value == '0'){
			$str =  'Fresher';
		}else if($value < 1 && $value != ''){			
			$str = preg_replace('/^0./', '', $value).' Month';
			$value = 2;
		}if($value >= 1){
			$str = $value.' Year';
		}
		
		if($value > 1){
			$suffix = 's';
		}
		
		return $str.$suffix;
   }  
 /* function to get ctc type */
function get_ctc_type($type){
		switch($type){
			case 'K':
			$value = 'Thousands';
			break;
			case 'L':
			$value = 'Lacs';
			break;
			case 'C':
			$value = 'Crore';
			break;
			
		}
		return $value;
   }   
 /* function to get ctc type */
 function get_notice($val){
		switch($val){
			case '0':
			$value = 'Immediate';
			break;
			case '15':
			$value = '15 Days';
			break;
			case '30':
			$value = '30 Days';
			break;
			case '40':
			$value = '45 Days';
			break;
			case '60':
			$value = '2 Months';
			break;
			case '90':
			$value = '3 Months';
			break;
			case '120':
			$value = '4 Months';
			break;
			case '150':
			$value = '5 Months';
			break;
			case '180':
			$value = '6 Months';
			break;
			
		}
		return $value;
   }
?>

<style type="text/css">
<!--
body{font-family: OpenSans, sans-serif;}
td,th,span,p{line-height:27px;font-family: OpenSans, sans-serif;}
.submitBy td{padding:4px;font-family: OpenSans, sans-serif;}
.confiTitle{font-size:22px;font-family: OpenSans, sans-serif;}
.headTitle{font-family: OpenSans, sans-serif;}
.qualTable{margin-top:15px}
.qualTable td{padding:8px;}
.footerTd td{line-height:17px;}
-->
</style>
<page backtop="10mm" backbottom="30mm" backleft="10mm" backright="10mm">


   <page_footer>
   <table cellpadding="0" cellspacing="0" class="footerTd" style="color:#918e8e;">
<tbody>

<tr>

	<td style="width:35%;">CareerTree HR Solutions<br>
	Old No.4, New No.15, 1st & 2nd Floor,<br>
	3rd Cross Street, Shenoy Nagar,<br>
	Chennai – 600030.
	</td>
	<td  style="width:35%">T: +91-44-490049002300<br>
	Email: ranjeet@career-tree.in<br>
	http://career-tree.in
	
	</td>
	
	<td  style="width:35%">
Confidential Report | <?php echo date('M Y');?><br>
	page -  [[page_cu]]/[[page_nb]]

	</td>
	
	
</tr>



</tbody>
</table>


       
</page_footer>





<?php  $img_path ='http://localhost/ctsvn/cthiring/img/career-tree-logo-large.jpg';?>
<span style="margin-left:40px;margin-top:50px;"><img src="<?php echo $img_path;?>"/></span>

<p style="margin-left:250px;margin-top:200px;;" class="confiTitle">CONFIDENTIAL REPORT</p>
<p style="margin-left:250px;margin-top:10px;font-size:33px;font-weight:bold;"><?php echo ucwords($user_data['Resume']['first_name']. ' '.$user_data['Resume']['last_name']);?></p>

  <table cellpadding="0" cellspacing="0" class="submitBy"  style="margin-left:250px;">
<tbody>
<tr>

	<td>
	<span style="font-weight:bold;font-size:24px;">Candidate for:</span>
	</td>
	</tr>
	
	<tr>
	<td><?php echo ucwords($user_data['Position']['job_title']);?></td>
	</tr>
	
	<tr>
	<td><?php echo ucwords($user_data['Client']['client_name']);?></td>
	</tr>
	
	<tr>
	<td><?php echo $user_data['ResLocation2']['location'];?>, <?php echo $user_data['State2']['state'];?></td>
	</tr>
	
</tbody>
</table>
<br> <br>

	<table cellpadding="0" cellspacing="0" class="submitBy"  style="margin-left:250px;">
<tbody>


	<tr>
	
	<td><span style="font-weight:bold;font-size:24px;">Submitted by:</span></td>
	</tr>
	
	<tr>
	<td><?php echo ucwords($user_data['Creator']['first_name']. ' '.$user_data['Creator']['last_name']);?></td>
	</tr>
	
	<tr>
	<td>CareerTree HR Solutions</td>
	</tr>
	
	<tr>
	<td><?php echo $user_data['ResLocation3']['location'];?>, India</td>
	</tr>
	
	<tr>
	<td><?php echo date('M Y');?></td>
	</tr>

	
</tbody>
</table>




<br><br> <br> <br> <br> <br><br><br> <br> <br><br> <br><br>
<span style="font-size:14px;color:#bfbbbb;text-align:justify">The information in this report is strictly private and confidential and is based on information provided by the candidate. Its use should be restricted tonly those members of the 
company's management group whare directly involved with the selection of a candidate for the position concerned.
 </span>
 
  <br> <br> <br><br><br> <br>



 <!--page_header>
    <span class="ft2" style="color:#918e8e;">CONFIDENTIAL REPORT</span>
	<span style="margin-left:400px;color:#918e8e;"> <?php echo ucwords($user_data['Resume']['first_name'].' '.$user_data['Resume']['last_name']);?></span>
    </page_header-->
   
<br><br>
<span class="p13 ft17" style="font-size:32px;font-weight:bold;" class="headTitle">Career Brief</span><br><br>
<span style="font-size:22px;"><?php echo ucwords($user_data['Resume']['first_name']. ' '.$user_data['Resume']['first_name']);?></span>

<br><br>
<table cellpadding="0" cellspacing="0"  class="qualTable">
<tbody><tr>
	<td  style="width:20%">Address:</td>
	<td><?php echo $user_data['Resume']['address1'];?><br>
	<?php echo $user_data['Resume']['address2'];?><br>
	</td>
</tr>
<tr>
	<td >Telephone:</td>
	<td><?php echo $user_data['Resume']['mobile2'];?></td>
</tr>
<tr>
	<td>Mobile:</td>
	<td>	<?php echo $user_data['Resume']['mobile'];?></td>
</tr>
<tr>
	<td>Email:</td>
	<td><a href="mailto:<?php echo $user_data['Resume']['email_id'];?>"><?php echo $user_data['Resume']['email_id'];?></a></td>
</tr>
</tbody>
</table>
<br><br>

<span style="font-size:32px;font-weight:bold;" class="headTitle">Education</span>

<br><br>
<table cellpadding="0" cellspacing="0" class="qualTable">
<tbody>

<?php foreach($edu_data as $key => $edu): ?>

<tr>
	<td style="width:20%"><?php echo $edu['ResEdu']['year_passing']; ?></td>
	<td style="width:80%"><?php echo $edu['ResDegree']['degree']; ?>, <?php echo $edu['ResSpec']['spec']; ?></td>
</tr>

 <?php endforeach; ?>


</tbody>
</table>
<br><br>
<span style="font-size:32px;font-weight:bold;" class="headTitle">Experience</span>


<table cellpadding="0" cellspacing="0"  class="qualTable">
<tbody>


<tr>
	<td  style="width:20%">&nbsp;</td>
	<td style="width:80%">&nbsp;</td>
</tr>

   <?php foreach($exp_data as $key => $exp): ?>
   
<tr>
	<td>Oct 2009 – Present</td>
	<td><?php echo ucwords($exp['ResExp']['company']); ?></td>
</tr>

 <?php endforeach; ?>
 


</tbody>
</table>


<br><br>
<span style="font-size:32px;font-weight:bold;" class="headTitle">Career Details</span>

   <?php foreach($exp_data as $key => $exp): ?>

<table cellpadding="0" cellspacing="0"  class="qualTable">
<tbody>


<tr>
	<td  style="width:20%">Oct 2009 – Present</td>
	<td style="width:80%"><?php echo ucwords($exp['ResExp']['company']); ?></td>
</tr>
<tr>
	<td></td>
	<td><?php echo ucfirst($exp['ResExp']['work_location']); ?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td><?php echo $exp['Designation']['designation']; ?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td style="width:60%"><?php echo ucfirst($exp['ResExp']['company_profile']); ?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td><?php echo $exp['Designation']['reporting']; ?></td>
</tr>

<tr>
	<td>&nbsp;</td>
	<td style=""><u>Key responsibilities:</u></td>
</tr>

<tr>
	<td>&nbsp;</td>
	<td style="width:60%"><?php echo $exp['ResExp']['key_resp']; ?></td>
</tr>

<tr>
	<td>&nbsp;</td>
	<td style=""><u>Key achievements:</u></td>
</tr>

<tr>
	<td>&nbsp;</td>
	<td style="width:60%"><?php echo $exp['ResExp']['key_achieve']; ?></td>
</tr>


</tbody>
</table>
 <?php endforeach; ?>

<br><br>
<span style="font-size:32px;font-weight:bold;" class="headTitle">Training & Programmes</span>


<table cellpadding="0" cellspacing="0"  class="qualTable">
<tbody>

 <?php foreach($training_data as $key => $train): ?>
<tr>
	<td  style="width:20%"><?php echo $train['ResTraining']['train_year'];?></td>
	<td style="width:80%"><?php echo $train['ResTraining']['prog_title'];?></td>
</tr>
<tr>
	<td></td>
	<td><?php echo $train['ResTraining']['train_desc'];?></td>
</tr>

 <?php endforeach; ?>


</tbody>
</table>

<br><br><br><br>

<span style="font-size:32px;font-weight:bold;" class="headTitle">Current Compensation</span>
<br><br>

<span style="font-size:18px;font-weight:;">Rs  <?php echo $user_data['Resume']['present_ctc'];?> 				
				<?php echo get_ctc_type($user_data['Resume']['present_ctc_type']);?>  approximately per annum </span>


<br><br><br><br>

<span style="font-size:32px;font-weight:bold;" class="headTitle">Notice Period</span>
<br><br>
<span style="font-size:18px;font-weight:">
 <?php echo get_notice($user_data['Resume']['notice_period']);?>
</span>
<br><br>

<br><br><span style="font-size:32px;font-weight:bold;" class="headTitle">Candidate Appraisal</span>
<table cellpadding="0" cellspacing="0"  class="qualTable">
<tbody>
<tr>
	<td   style="width:90%">
	
	<?php echo $exp['Resume']['candidate_brief']; ?>
	
	</td>
</tr>
</tbody>
</table>


<br><br><span style="font-size:32px;font-weight:bold;" class="headTitle">Technical experience and domain expertise:</span>
<table cellpadding="0" cellspacing="0"  class="qualTable">
<tbody>
<tr>


	<td   style="width:90%"><?php echo $exp['Resume']['tech_expert']; ?></td>
</tr>
</tbody>
</table>

<br><br><span style="font-size:32px;font-weight:bold;" class="headTitle">Track record of demonstrated achievements</span>

<table cellpadding="0" cellspacing="0"  class="qualTable">
<tbody>
<tr>
	<td   style="width:90%">
	<?php echo $exp['Resume']['achievement']; ?>
	</td>
</tr>
</tbody>
</table>

<br><br><span style="font-size:32px;font-weight:bold;" class="headTitle">Personality</span>

<table cellpadding="0" cellspacing="0"  class="qualTable">
<tbody>
<tr>


	<td   style="width:90%"><?php echo $exp['Resume']['personality']; ?></td>
</tr>
</tbody>
</table>


<br><br><span style="font-size:32px;font-weight:bold;" class="headTitle">Outlook on Vedanta</span>

<table cellpadding="0" cellspacing="0"  class="qualTable">
<tbody>
<tr>



	<td   style="width:90%"><?php echo $exp['Resume']['about_company']; ?>
	</td>
</tr>
</tbody>
</table>


</page>