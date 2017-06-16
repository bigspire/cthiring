<style type="text/css">
<!--
table
{
    width:  100%;
    border: solid 1px #efefef;
	font:14px arial;
}

th
{
    text-align: center;
    border: solid 1px #efefef;
    background: #EEFFEE;
}

td
{
    text-align: left;
    border: solid 1px #efefef;
	text-align:center;
	padding:5px;
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

<span style="font-size: 20px; font-weight: bold">ASSESSMENT REPORT</span>
<span style="margin-left:300px;margin-top:10px;"><img src="http://assesskey.com/img/ak_logo.png"/>
</span>

<br>
<br>
<br>

<table>
    
        <tr>
            <th style="width: 25%;font-size: 14px;text-align:left;">Name</th>
			<td style="width: 25%;text-align:left;"><?php echo ucwords($data[0]['Home']['first_name'].' '.$data[0]['Home']['last_name']);?></td>
            
			<th  style="width: 25%;font-size: 14px;text-align:left;">
                Mobile
            </th>
			<td style="width: 25%;text-align:left;">
			<?php echo $data[0]['Home']['mobile'];?>
			</td>
			
			
			
		</tr>
		
		 <tr>
            <th style="width: 25%;font-size: 14px;text-align:left;">Emp. Id</th>
			<td style="width: 25%;text-align:left;"><?php echo $data[0]['Home']['emp_code'];?></td>
            
			<th  style="width: 25%;font-size: 14px;text-align:left;">
                No. of Tests
            </th>
			<td style="width: 25%;text-align:left;">
			2
			</td>
			
			
			
		</tr>
			
			
		<tr>
			 
			<th style="width: 25%;font-size: 14px;text-align:left;">
			Date of Assessment
			</th>
			<td style="width: 25%;text-align:left;">
			<?php echo date('d-M,Y', strtotime($data[0]['Home']['created_date']));?>
			</td>
			
			 <th  style="width: 25%;font-size: 14px;text-align:left;">
               
            </th>
			<td style="width: 25%;text-align:left;">
			
			</td>
        </tr>
       
 

</table>


<br><br>
<table align="center">
    
    <thead>
        <tr>
            <th rowspan="2" style="width: 25%">Competencies</th>
            <th colspan="2" style="width: 25%;font-size: 14px;">
                Personality Profiling
            </th>
			
			  <th colspan="2" style="width: 25%;font-size: 14px;">
                Situational Response
            </th>
			<th rowspan="2" style="width: 20%">
			 Average Score	
			</th>
        </tr>
        <tr>
		 
            <th>Max.</th>
            <th>Actual</th>
			
			<th>Max.</th>
            <th>Actual</th>
        </tr>
    </thead>
<?php 
	$i = 0;
	foreach($chapter_unique as $key => $chapter): ?>
    <tr>
        <td style="text-align:left;"><?php echo $chapter;?></td>
        <td style="width: 12.5%;">60</td>
		 <td style="width: 12.5%;">
		 <?php echo $p_score = $score[$i] ? $score[$i] : 0;?></td>
		 <td style="width: 12.5%;">90</td>
		 <td style="width: 12.5%;">
		 <?php echo $s_score = $score2[$i] ? $score2[$i] : 0;?></td>
		 <td><?php echo $total = number_format((($p_score+$s_score)/150)*100, 2);
		 $avg_total += $total;?></td>
    </tr>
<?php $i++; endforeach;?>
    <tr>
        <th colspan="5">OVERALL AVERAGE</th>
		 <td><?php echo number_format($avg_total/9, 2);?></td>
    </tr>
</table>




<p style="text-align:center;border:1px solid #efefef;padding:10px;">
<!--span style="font-size: 16px; font-weight: bold;text-decoration:underline">Competency Wise Scores Table</span>
<br-->
<img src="<?php echo $this->request->data['Home']['hdnData'];?>"/>
</p>



<?php  $this->request->data['Home']['hdnData'] = ''; ?>


<div style="text-align:left">This is a computer generated report</div>
<br><br>
<br>
<div style="text-align:left">Confidential Report</div>
<div style="text-align:right"><?php echo date('d-M,Y');?></div>