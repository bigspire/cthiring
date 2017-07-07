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
table
{
    width:  90%;   
	font:14px arial;
	border-collapse: collapse;
	
}

th
{
    text-align: center;
    border: solid 1px #a9aea8;
    background: #e2e6e1;
	padding:4px;
}

td
{
    text-align: left;
    border: solid 1px #a9aea8;
	text-align:center;
	padding:4px;
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
<?php  $img_path ='http://localhost/ctsvn/cthiring/img/career-tree-logo-large.jpg';?>
<span style="font-size: 24px;margin-left:40px; font-weight: bold">PROFILE SNAPSHOT</span>
<span style="margin-left:90px;"><img src="<?php echo $img_path;?>"/></span>



<br>
<br>
<br>


<span style="font-size: 14px;margin-left:40px">Name of the candidate: </span>
<span  style="font-size: 14px"><?php echo ucwords($user_data['Resume']['first_name'].' '.$user_data['Resume']['last_name']);?></span>
<br>

<span style="font-size: 14px;margin-top:10px;margin-left:40px;">Profile for the position of :  </span>
<span style="font-size: 14px;margin-top:10px;"><?php echo ucwords($user_data['Position']['job_title']);?></span>

<br>
<br>
<table align="center" style="margin-top:10px;">

 <thead>
 
 <tr>
            <th style="width: 5%;font-size: 14px;text-align:center;">S. No</th>
			<th style="width: 25%;font-size: 14px;text-align:left;">Parameter</th>
            
			<th  style="width: 70%;font-size: 14px;text-align:left;">
                Details
            </th>
			
			
	</tr>		
			
		</thead>
    
      <tr>
            <td style="width: 5%;font-size: 14px;text-align:center;">1</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Current Designation  (with reporting relations)</td>
            
			<td  style="width: 70%;font-size: 12px;text-align:left;">
                <?php echo $user_data['Designation']['designation'];?>
            </td>
			
			
	</tr>	
 
  <tr>
            <td style="width: 5%;font-size: 14px;text-align:center;">2</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Qualification    
			(with specialization & academic performance)</td>
            
			<td  style="width: 70%;font-size: 12px;text-align:left;">
			<?php foreach($edu_data as $key => $edu): ?>
			<div style="margin-bottom:5px;">
				 <?php echo $edu['ResDegree']['degree']; ?>, <?php echo $edu['ResSpec']['spec']; ?>,
				 <?php echo $edu['ResEdu']['percent_mark']; ?> % of Marks, <?php echo $edu['ResEdu']['year_passing']; ?>
			</div>	
				 <?php endforeach; ?>
            </td>
			
			
	</tr>	
 
 
   <tr>
            <td style="width: 5%;font-size: 14px;text-align:center;">3</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Total years of experience    
			</td>
            
			<td  style="width: 70%;font-size: 12px;text-align:left;">
                 <?php echo check_exp($user_data['Resume']['total_exp']);?>
            </td>
			
			
	</tr>
	
	  <tr>
            <td style="width: 5%;font-size: 14px;text-align:center;">4</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Career Highlights 
			(companies, designation & employment period)   
			</td>
            
			<td  style="width: 70%;font-size: 12px;text-align:left;">
                <?php foreach($exp_data as $key => $exp): ?>
			<div style="margin-bottom:5px;"> 
				 <?php echo ucwords($exp['ResExp']['company']); ?>, <?php echo ucwords($exp['Designation']['designation']); ?>, 
				 <?php echo ucwords($exp['ResExp']['work_location']); ?>,
				<?php echo check_exp($exp['ResExp']['experience']); ?>
				</div> 
				 <?php endforeach; ?>
            </td>
			
			
	</tr>
	
	  <tr>
            <td style="width: 5%;font-size: 14px;text-align:center;">5</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Areas of Specialization / Expertise   
			</td>
            
			<td  style="width: 70%;font-size: 12px;text-align:left;">
                    <?php foreach($exp_data as $key => $exp): ?>
			
				<div style="margin-bottom:5px;"> <?php echo ucwords($exp['ResExp']['skills']); ?></div>
				
				 <?php endforeach; ?>
            </td>
			
			
	</tr>
	
	  <tr>
            <td style="width: 5%;font-size: 14px;text-align:center;">6</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Current Location of Work  
			</td>
            
			<td  style="width: 70%;font-size: 12px;text-align:left;">
                 <?php echo $user_data['ResLocation']['location'] ? $user_data['ResLocation']['location'] : $user_data['Resume']['present_location'];?>
            </td>
			
			
	</tr>
	
	
	  <tr>
            <td style="width: 5%;font-size: 14px;text-align:center;">7</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Current CTC  
			</td>
            
			<td  style="width: 70%;font-size: 12px;text-align:left;">
                <?php echo $user_data['Resume']['present_ctc'];?> 				
				<?php echo get_ctc_type($user_data['Resume']['present_ctc_type']);?> 
				
            </td>
			
			
	</tr>
	
	
	  <tr>
            <td style="width: 5%;font-size: 14px;text-align:center;">8</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Expected CTC
			</td>
            
			<td  style="width: 70%;font-size: 12px;text-align:left;">
                <?php echo $user_data['Resume']['expected_ctc'];?>
			<?php echo get_ctc_type($user_data['Resume']['expected_ctc_type']);?> 

            </td>
			
			
	</tr>
	
	 <tr>
            <td style="width: 5%;font-size: 14px;text-align:center;">9</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Notice Period in the Current Organization
			</td>
            
			<td  style="width: 70%;font-size: 12px;text-align:left;">
                 <?php echo get_notice($user_data['Resume']['notice_period']);?>
            </td>
			
			
	</tr>
	
		 <tr>
            <td style="width: 5%;font-size: 14px;text-align:center;">10</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">DOB
			</td>
            
			<td  style="width: 70%;font-size: 12px;text-align:left;">
                 <?php echo date('d-m-Y', strtotime($user_data['Resume']['dob']));?>
            </td>
			
			
	</tr>
	
		 <tr>
            <td style="width: 5%;font-size: 14px;text-align:center;">11</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Gender
			</td>
            
			<td  style="width: 70%;font-size: 12px;text-align:left;">
                 <?php echo check_gender($user_data['Resume']['gender']);?>
            </td>
			
			
	</tr>
	
	 <tr>
            <td style="width: 5%;font-size: 14px;text-align:center;">12</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Family (dependents)
			</td>
            
			<td  style="width: 70%;font-size: 12px;text-align:left;">
                 <?php echo $user_data['Resume']['family'];?>
            </td>
			
			
	</tr>
	
		 <tr>
            <td style="width: 5%;font-size: 14px;text-align:center;">13</td>
			<td style="width: 25%;font-size: 14px;text-align:left;">Consultant Assessment

			</td>
            
			<td  style="width: 70%;font-size: 12px;text-align:left;">
                 <?php echo $user_data['Resume']['consultant_assess'];?>
            </td>
			
			
	</tr>
	
	
</table>


<br>
<br>
<br>






<div style="text-align:left;margin-left:40px">This is a computer generated report</div>

<div style="text-align:left;margin-left:40px;margin-top:15px;">Confidential Report</div>
<div style="text-align:right;margin-right:40px"><?php echo date('d-M,Y');?></div>


