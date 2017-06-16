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
?>
<style type="text/css">
<!--
table
{
    width:  100%;
   
	font:14px arial;
}

th
{
    text-align: center;
    border: dotted 1px #efefef;
    background: #87f970;
	padding:7px;
}

td
{
    text-align: left;
    border: dotted 1px #efefef;
	text-align:center;
	padding:7px;
}

td.col1
{
   /* border: solid 1px red;*/
    text-align: left;
}

end_last_page div
{
    border: solid 1mm red;
    height: 27mm;
    margin: 0;
    padding: 0;
    text-align: center;
    font-weight: bold;
}
-->
</style>
<br>

<span style="font-size: 20px; font-weight: bold">PROFILE SNAPSHOT</span>
<span style="margin-left:300px;margin-top:10px;font-size:32px;font-weight:bold;">CTHiring</span>

<br>
<br>
<br>


<span style="font-size: 14px;">Name of the candidate: </span>
<span  style="font-size: 12px;"><?php echo ucwords($user_data['Resume']['first_name'].' '.$user_data['Resume']['last_name']);?></span>
<br>

<span style="font-size: 14px;">Profile for the position of :  </span>
<span style="font-size: 12px;"><?php echo ucwords($user_data['Position']['job_title']);?></span>

<br>
<br>
<table>

 <thead>
 
 <tr>
            <th style="width: 10%;font-size: 14px;text-align:center;">S. No</th>
			<th style="width: 25%;font-size: 14px;text-align:left;">Parameter</th>
            
			<th  style="width: 65%;font-size: 14px;text-align:left;">
                Details
            </th>
			
			
	</tr>		
			
		</thead>
    
      <tr>
            <td style="width: 10%;font-size: 14px;text-align:center;">1</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Current Designation  (with reporting relations)</td>
            
			<td  style="width: 65%;font-size: 12px;text-align:left;">
                <?php echo $user_data['Resume']['designation'];?>
            </td>
			
			
	</tr>	
 
  <tr>
            <td style="width: 10%;font-size: 14px;text-align:center;">2</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Qualification    
			(with specialization & academic performance)</td>
            
			<td  style="width: 65%;font-size: 12px;text-align:left;">
                 <?php echo $user_data['Resume']['education'];?>
            </td>
			
			
	</tr>	
 
 
   <tr>
            <td style="width: 10%;font-size: 14px;text-align:center;">3</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Total years of experience    
			</td>
            
			<td  style="width: 65%;font-size: 12px;text-align:left;">
                 <?php echo $user_data['Resume']['total_exp'];?>
            </td>
			
			
	</tr>
	
	  <tr>
            <td style="width: 10%;font-size: 14px;text-align:center;">4</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Career Highlights 
			(companies, designation & employment period)   
			</td>
            
			<td  style="width: 65%;font-size: 12px;text-align:left;">
                 <?php echo $user_data['Resume']['present_employer'];?>
            </td>
			
			
	</tr>
	
	  <tr>
            <td style="width: 10%;font-size: 14px;text-align:center;">5</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Areas of Specialization / Expertise   
			</td>
            
			<td  style="width: 65%;font-size: 12px;text-align:left;">
                 <?php echo $user_data['Resume']['exp_skills'];?>
            </td>
			
			
	</tr>
	
	  <tr>
            <td style="width: 10%;font-size: 14px;text-align:center;">6</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Current Location of Work  
			</td>
            
			<td  style="width: 65%;font-size: 12px;text-align:left;">
                 <?php echo $user_data['ResLocation']['location'];?>
            </td>
			
			
	</tr>
	
	
	  <tr>
            <td style="width: 10%;font-size: 14px;text-align:center;">7</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Current CTC  
			</td>
            
			<td  style="width: 65%;font-size: 12px;text-align:left;">
                <?php echo $user_data['Resume']['present_ctc'];?>
            </td>
			
			
	</tr>
	
	
	  <tr>
            <td style="width: 10%;font-size: 14px;text-align:center;">8</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Expected CTC
			</td>
            
			<td  style="width: 65%;font-size: 12px;text-align:left;">
                <?php echo $user_data['Resume']['expected_ctc'];?>
            </td>
			
			
	</tr>
	
	 <tr>
            <td style="width: 10%;font-size: 14px;text-align:center;">9</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Notice Period in the Current Organization
			</td>
            
			<td  style="width: 65%;font-size: 12px;text-align:left;">
                 <?php echo $user_data['Resume']['notice_period'];?>
            </td>
			
			
	</tr>
	
		 <tr>
            <td style="width: 10%;font-size: 14px;text-align:center;">10</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">DOB
			</td>
            
			<td  style="width: 65%;font-size: 12px;text-align:left;">
                 <?php echo date('d-m-Y', strtotime($user_data['Resume']['dob']));?>
            </td>
			
			
	</tr>
	
		 <tr>
            <td style="width: 10%;font-size: 14px;text-align:center;">11</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Gender
			</td>
            
			<td  style="width: 65%;font-size: 12px;text-align:left;">
                 <?php echo check_gender($user_data['Resume']['gender']);?>
            </td>
			
			
	</tr>
	
	 <tr>
            <td style="width: 10%;font-size: 14px;text-align:center;">12</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Family                         (dependents)
			</td>
            
			<td  style="width: 65%;font-size: 12px;text-align:left;">
                 <?php echo $user_data['Resume']['family'];?>
            </td>
			
			
	</tr>
	
		 <tr>
            <td style="width: 10%;font-size: 14px;text-align:center;">13</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Consultant Assessment

			</td>
            
			<td  style="width: 65%;font-size: 12px;text-align:left;">
                 <?php echo $user_data['Resume']['consultant_assess'];?>
            </td>
			
			
	</tr>
	
	
</table>


<br><br>







<div style="text-align:left">This is a computer generated report</div>
<br><br>
<br>
<div style="text-align:left">Confidential Report</div>
<div style="text-align:right"><?php echo date('d-M,Y');?></div>