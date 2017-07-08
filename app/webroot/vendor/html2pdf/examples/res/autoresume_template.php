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
	Email: <span class="ft14">ranjeet@career-tree.in</span><br>
	<span class="ft14">http://career-tree.in</span>
	
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
<p style="margin-left:250px;margin-top:10px;font-size:33px;font-weight:bold;">M.P. MURALIDHARAN</p>

  <table cellpadding="0" cellspacing="0" class="submitBy"  style="margin-left:250px;">
<tbody>
<tr>

	<td>
	<span style="font-weight:bold;font-size:24px;">Candidate for:</span>
	</td>
	</tr>
	
	<tr>
	<td>Global Head of Safety</td>
	</tr>
	
	<tr>
	<td>Vedanta Resources Plc</td>
	</tr>
	
	<tr>
	<td>New Delhi, India</td>
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
	<td>Shivani Hazari</td>
	</tr>
	
	<tr>
	<td>CareerTree HR Solutions</td>
	</tr>
	
	<tr>
	<td>New Delhi, India</td>
	</tr>
	
	<tr>
	<td><?php echo date('M Y');?></td>
	</tr>

	
</tbody>
</table>




<br><br> <br> <br> <br> <br><br><br> <br> <br><br> <br><br>
<span style="font-size:14px;color:#bfbbbb;text-align:justify">The information in this report is strictly private and confidential and is based on
information provided by the candidate. Its use should be restricted tonly those members of the 
company's management group whare directly involved with the selection of a candidate for the
position concerned.
 </span>
 
  <br> <br> <br><br><br> <br>



 <!--page_header>
    <span class="ft2" style="color:#918e8e;">CONFIDENTIAL REPORT</span>
	<span style="margin-left:400px;color:#918e8e;"> <?php echo ucwords($user_data['Resume']['first_name'].' '.$user_data['Resume']['last_name']);?></span>
    </page_header-->
   
<br><br>
<span class="p13 ft17" style="font-size:32px;font-weight:bold;" class="headTitle">Career Brief</span><br><br>
<span style="font-size:22px;">M.P. MURALIDHARAN</span>

<br><br>
<table cellpadding="0" cellspacing="0"  class="qualTable">
<tbody><tr>
	<td  style="width:20%">Address:</td>
	<td>Flat no. 301, Aadi Vista Apartments, 6 – Urmi Society, Akota, Baroda – 20, India</td>
</tr>
<tr>
	<td >Telephone:</td>
	<td>91 491 255 6071</td>
</tr>
<tr>
	<td>Mobile:</td>
	<td>+91 97 2772 9273</td>
</tr>
<tr>
	<td>Email:</td>
	<td><a href="mailto:Mpmurali1@rediffmail.com">Mpmurali1@rediffmail.com</a></td>
</tr>
</tbody>
</table>
<br><br>

<span style="font-size:32px;font-weight:bold;" class="headTitle">Education</span>

<br><br>
<table cellpadding="0" cellspacing="0" class="qualTable">
<tbody>
<tr>
	<td style="width:20%">1994</td>
	<td style="width:80%">Master of Engineering (Industrial Safety)</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>Regional Engineering College, Tiruchirapalli, India (Scored 74% overall)</td>
</tr>
<tr>
	<td>1988</td>
	<td>Bachelor of Technology (Mechanical Engineering)</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>Calicut University, India (Scored 78% with First Class Honours)</td>
</tr>
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
<tr>
	<td>Oct 2009 – Present</td>
	<td>L&T POWER</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>Baroda, India</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>Head of Environment, Health and Safety (EHS) Capability Centre</td>
</tr>

</tbody>
</table>


<br><br>
<span style="font-size:32px;font-weight:bold;" class="headTitle">Career Details</span>


<table cellpadding="0" cellspacing="0"  class="qualTable">
<tbody>


<tr>
	<td  style="width:20%">Oct 2009 – Present</td>
	<td style="width:80%">L&T POWER</td>
</tr>
<tr>
	<td></td>
	<td>Vadodara, India</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>Head of Environment, Health and Safety (EHS) Capability Centre</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td style="width:60%">Larsen & Toubro (L&T) is a technology-driven USD 11.7 billion company that infuses engineering with imagination. We offer a wide range of advanced solutions, services and products.</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>Report directly to the CEO and MD of L&T Power</td>
</tr>

<tr>
	<td>&nbsp;</td>
	<td style=""><u>Key responsibilities:</u></td>
</tr>

<tr>
	<td>&nbsp;</td>
	<td style="width:60%">Leading a team of 30 EHS professional spread across 10 EPC Power projects and head office at Baroda.
Build a team of EHS resources at Capability center
Build a team of EHS resources at all EPC sites and manufacturing</td>
</tr>

<tr>
	<td>&nbsp;</td>
	<td style=""><u>Key achievements:</u></td>
</tr>

<tr>
	<td>&nbsp;</td>
	<td style="width:60%">Leading a team of 30 EHS professional spread across 10 EPC Power projects and head office at Baroda.
Build a team of EHS resources at Capability center
Build a team of EHS resources at all EPC sites and manufacturing</td>
</tr>


</tbody>
</table>


<br><br>
<span style="font-size:32px;font-weight:bold;" class="headTitle">Training & Programmes</span>


<table cellpadding="0" cellspacing="0"  class="qualTable">
<tbody>


<tr>
	<td  style="width:20%">1995</td>
	<td style="width:80%">Safety Audit Course</td>
</tr>
<tr>
	<td></td>
	<td>National Safety Council, Mumbai, India</td>
</tr>



</tbody>
</table>

<br><br><br><br>

<span style="font-size:32px;font-weight:bold;" class="headTitle">Current Compensation</span>
<br><br>
<span style="font-size:18px;font-weight:;">Rs 62 Lacs approximately per annum (includes ESOP)</span>


<br><br><br><br>

<span style="font-size:32px;font-weight:bold;" class="headTitle">Notice Period</span>
<br><br>
<span style="font-size:18px;font-weight:">3 Months</span>
<br><br>

<br><br><span style="font-size:32px;font-weight:bold;" class="headTitle">Candidate Appraisal</span>
<table cellpadding="0" cellspacing="0"  class="qualTable">
<tbody>
<tr>
	<td   style="width:90%">MP Muralidharan brings with him 23 years of exposure in the Industrial sector covering thermal power, tobacco, paper, hotels, Natural gas distribution, Airport and EPC Power. He has in the past worked with DIAL, BG Group, ITC and NTPC. He is passionate about safety and aims to develop a sustainable and interdependent level of safety culture at the organizational level.</td>
</tr>
</tbody>
</table>


<br><br><span style="font-size:32px;font-weight:bold;" class="headTitle">Technical experience and domain expertise:</span>
<table cellpadding="0" cellspacing="0"  class="qualTable">
<tbody>
<tr>
	<td   style="width:90%">MP Muralidharan brings with him 23 years of exposure in the Industrial sector covering thermal power, tobacco, paper, hotels, Natural gas distribution, Airport and EPC Power. He has in the past worked with DIAL, BG Group, ITC and NTPC. He is passionate about safety and aims to develop a sustainable and interdependent level of safety culture at the organizational level.</td>
</tr>
</tbody>
</table>

<br><br><span style="font-size:32px;font-weight:bold;" class="headTitle">Track record of demonstrated achievements</span>
<br><br><span style="font-size:18px;font-weight:bold;" class="headTitle">Present Achievements with L&T Power</span>

<table cellpadding="0" cellspacing="0"  class="qualTable">
<tbody>
<tr>
	<td   style="width:90%">MP Muralidharan brings with him 23 years of exposure in the Industrial sector covering thermal power, tobacco, paper, hotels, Natural gas distribution, Airport and EPC Power. He has in the past worked with DIAL, BG Group, ITC and NTPC. He is passionate about safety and aims to develop a sustainable and interdependent level of safety culture at the organizational level.</td>
</tr>
</tbody>
</table>

<br><br><span style="font-size:32px;font-weight:bold;" class="headTitle">Personality</span>

<table cellpadding="0" cellspacing="0"  class="qualTable">
<tbody>
<tr>
	<td   style="width:90%">MP Muralidharan brings with him 23 years of exposure in the Industrial sector covering thermal power, tobacco, paper, hotels, Natural gas distribution, Airport and EPC Power. He has in the past worked with DIAL, BG Group, ITC and NTPC. He is passionate about safety and aims to develop a sustainable and interdependent level of safety culture at the organizational level.</td>
</tr>
</tbody>
</table>


<br><br><span style="font-size:32px;font-weight:bold;" class="headTitle">Outlook on Vedanta</span>

<table cellpadding="0" cellspacing="0"  class="qualTable">
<tbody>
<tr>
	<td   style="width:90%">MP Muralidharan brings with him 23 years of exposure in the Industrial sector covering thermal power, tobacco, paper, hotels, Natural gas distribution, Airport and EPC Power. He has in the past worked with DIAL, BG Group, ITC and NTPC. He is passionate about safety and aims to develop a sustainable and interdependent level of safety culture at the organizational level.</td>
</tr>
</tbody>
</table>


</page>