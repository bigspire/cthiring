<?php
include_once('classes/class.function.php');
$tot_exp = $_POST['year_of_exp'] == 0 ? '0' : $_POST['year_of_exp'].'.'.$_POST['month_of_exp'];
$expStr = $fun->show_exp_details($tot_exp);
$pre_ctc_type = $fun->get_ctc_type($_POST['present_ctc_type']);
$exp_ctc_type = $fun->get_ctc_type($_POST['expected_ctc_type']);
$notice = $fun->get_notice($_POST['notice_period']);
$gen = $fun->check_gender($_POST['gender']);
$dob = $fun->convert_date_to_display($fun->convert_date($_POST['dob']));
$age = $fun->get_age($fun->convert_date($_POST['dob'])).' Yrs';

// parse the tech skill ratings	
foreach($tech_skills as $key => $skill){
	if(!intval($key) && $key != '0' && $skill > 0){
		$tech_skill_star .=  '<div class="rating rating2">';
		$tech_skill_star .= '<span class="skill_txt">'.ucwords($key).'</span>';
		 if($skill > 0){
			for($i = 1; $i<=5; $i++){
				if($i <= $skill){
					$tech_skill_star .=  '<a href="#" style="color: orange;">★</a>';
				}else{
					// $tech_skill_star .=  '<a href="javascript:void(0)" >★</a>';		
				}
			}
			
		 }
		 $tech_skill_star .=  '</div>';
		 // $tech_skill_star .=  '<br>';
	}
} 

// parse the behav skill ratings
	
foreach($beh_skills as $key => $skill){
	if(!intval($key) && $key != '0'  && $skill > 0){
		$behav_skill_star .=  '<div class="rating rating2">';
		$behav_skill_star .= '<span class="skill_txt">'.ucwords($key).'</span>';
			
		 if($skill > 0){
			for($i = 1; $i<=5; $i++){
				if($i <= $skill){
					$behav_skill_star .=  '<a href="#" style="color: orange;">★</a>';
				}else{
					// $behav_skill_star .=  '<a href="javascript:void(0)" >★</a>';		
				}
			}
			
		 }
		 $behav_skill_star .=  '</div>';
		//  $behav_skill_star .=  '<br>';
	}

} 
	

$str = <<<EOD

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Hiring - Profile Snapshot</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.min.css">
  </head>
  
  <style>
  
body {
    color: #4a4a4a;
    font-size: 1.1rem;
    font-weight: 400;
    line-height: 1.5;
}
		/*  
		 * Rating styles
		 */
		 .skill_txt{font-size:1rem;margin-right:10px;}
		 
		.rating {
			font-size: 1rem;
			overflow:hidden;
		}
.rating input {
  float: right;
  opacity: 0;
  position: absolute;
}
		.rating a,
    .rating label {
			float:right;
			color: #aaa;
			text-decoration: none;
			-webkit-transition: color .4s;
			-moz-transition: color .4s;
			-o-transition: color .4s;
			transition: color .4s;
		}
.rating label:hover ~ label,
.rating input:focus ~ label,
.rating label:hover,
		.rating a:hover,
		.rating a:hover ~ a,
		.rating a:focus,
		.rating a:focus ~ a		{
			color: orange;
			cursor: pointer;
		}
		
		.rating2{
			float:left;
			width:40%
		}
		.rating2 a {
			float:none;
			width:50%
			
		}
  </style>
  <body>
  
 
  <section class="section">
    <div class="container">
	
	<div class="has-text-right"><img  class="" src="http://bigspire.in/ct/career-tree-logo-CMYK_resiz.png"></div>
	<div class="" style="margin-bottom:0.3rem;">
	 <div class=" title has-text-centered"  style="color:#826386 !important;">PROFILE SNAPSHOT 
	 
	 </div>
	</div>
	<table class="table content" style="clear:left;">
  <thead >
    <tr  class="is-selected" style="background: #826386">
      <th class=" has-text-centered"width="5%">S.No</th>
      <th class="" width="24%">Criteria</th>
     
      <th class="" width="71%">Candidate Credentials</th>
    </tr>
  </thead>

  <tbody>
  <tr>
	 <td class="has-text-centered">1</td>
      <td>Profile for the Position of</td>
      <td>$_POST[requirement]</td>
    </tr>
	
    <tr>
      <td class="has-text-centered">2</td>
      <td>Name of the Candidate
      </td>
     
      <td>$_POST[first_name] $_POST[last_name]</td>
    </tr>
    
	<tr>
      <td class="has-text-centered">3</td>
      <td>Gender</td>
      <td>$gen</td>
    </tr>
	
	<tr>
      <td class="has-text-centered">4</td>
      <td>Qualification</td>
     
      <td>$snap_edu</td>
    </tr>
	
	<tr>
      <td class="has-text-centered">5</td>
      <td>Career Graph</td>
     
      <td>$snap_exp</td>
    </tr>
	
	 <tr>
      <td  class="has-text-centered">6</td>
      <td>Areas of Expertise</td>
     
      <td>$snap_skill</td>
    </tr>
	
    <tr>
      <td class="has-text-centered">7</td>
      <td>Total Years of Experience</td>
     
      <td>$expStr</td>
    </tr>
    
	
  
    <tr>
      <td  class="has-text-centered">8</td>
      <td>Current Location of Work</td>
      <td>$locationDataCase</td>
    </tr>
	
    <tr>
      <td  class="has-text-centered">9</td>
      <td>Current CTC</td>
      <td>$_POST[present_ctc] $pre_ctc_type Per Annum</td>
    </tr>
	
    <tr>
      <td  class="has-text-centered">10</td>
      <td>Expected CTC</td>
      <td>$_POST[expected_ctc] $exp_ctc_type Per Annum</td>
    </tr>
	
    <tr>
      <td class="has-text-centered">11</td>
      <td>Notice Period</td>
      <td>$notice</td>
    </tr>
 
    <tr>
      <td class="has-text-centered">12</td>
      <td>Date of Birth / Age</td>
      <td>$dob / $age</td>
    </tr>
	
	<tr>
      <td class="has-text-centered">13</td>
      <td>Family (Dependents)
	</td>
      <td>$_POST[family]</td>
    </tr>
	
     <tr>
      <td class="has-text-centered">14</td>
      <th class="">Technical Skills</th>
    
      <td>
	  
	 $tech_skill_star
	  
	  
	  </td>
    </tr>
	
	 <tr>
      <td class="has-text-centered">15</td>
      <th class="">Behavioral Skills</th>
    
      <td>
	  
	  $behav_skill_star
	  
	  
	  </td>
    </tr>
	
    <tr>
      <td class="has-text-centered">16</td>
      <td class="">Consultant Assessment</td>
    
      <td>
	  
	  $_POST[consultant]
	  
	  </td>
    </tr>
	
	 
    <tr>
      <td class="has-text-centered">17</td>
      <td class="">Interview Availability</td>
    
      <td>
	  
	  $_POST[interview_availability]
	  
	  </td>
    </tr>
	
	
	
	
    
  </tbody>
</table>

<footer class="is-paddingless level" style="margin-top:25px;height:50px;">
  <div class="container">
    <div class="level-item content has-text-centered"  style="margin-top:15px;">
      <p>
        Created by <a class="" href="http://career-tree.in" style="color:#826386 !important;"><strong>CareerTree HR Solutions</strong></a>. 
      </p>     
    </div>
  </div>
</footer>

</div>
</section>
	

</body>
</html>
	  
	  

EOD;



// echo $str;die;

$snap_file_name = substr($_SESSION['resume_doc'], 0, strlen($_SESSION['resume_doc'])-5);
$snap_file_name = $fun->filter_file($snap_file_name);
$apikey = '5ea15ca6-ba76-423a-9214-b2194c6c427a';
// $value = 'http://www.bigspireshowcase.com/mh/bulma.html'; // a url starting with http or an HTML string.  see example #5 if you have a long HTML string
$result = file_get_contents("http://api.html2pdfrocket.com/pdf?apikey=" . urlencode($apikey) . "&value=" . urlencode($str).'&page');
try{
	if(!$result){
		throw new Exception('Time out! Unable to create resume pdf');
	}			
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}	
file_put_contents('uploads/snapshot/'.$snap_file_name.'.pdf',$result);
?>