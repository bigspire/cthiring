<?php
include_once('classes/class.function.php');
$tot_exp = $_POST['year_of_exp'] == 0 ? '0' : $_POST['year_of_exp'].'.'.$_POST['month_of_exp'];
$expStr = $fun->show_exp_details($tot_exp);
$pre_ctc_type = $fun->get_ctc_type($_POST['present_ctc_type']);
$exp_ctc_type = $fun->get_ctc_type($_POST['expected_ctc_type']);
$notice = $fun->get_notice($_POST['notice_period']);
$gen = $fun->check_gender($_POST['gender']);
$dob = $fun->convert_date_to_display($fun->convert_date($_POST['dob']));


$str = <<<EOD

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.min.css">
  </head>
  <body>
  
 
  <section class="section">
    <div class="container">
	
	<div class="columns">
	 <div class="column is-three-quarters title has-text-primary" style="float:left">PROFILE SNAPSHOT </div>
	 <div class="column" style="float:right"><img src="http://jobsfactory.in/images/for_pdf.png"></div>
	</div>
	<table class="table content box is-radius" style="clear:left;">
  <thead >
    <tr  class="is-selected">
      <th class=" has-text-centered"width="10%">S. No</th>
      <th class="" width="30%">Parameter</th>
     
      <th class="" width="60%">Details</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th></th>
      <th></th>
     
      <th></th>
    </tr>
  </tfoot>
  <tbody>
    <tr >
      <th class="has-text-centered">1</th>
      <td>Name of the Candidate
      </td>
     
      <td>$_POST[first_name] $_POST[last_name]</td>
    </tr>
    <tr>
	 <th class="has-text-centered">2</th>
      <td>Profile for the Position of</td>
      <td>$_POST[requirement]</td>
    </tr>
    <tr>
      <th class="has-text-centered">3</th>
      <td>Total Years of Experience</td>
     
      <td>$expStr</td>
    </tr>
    <tr>
      <th class="has-text-centered">4</th>
      <td>Career Highlights (companies, designation & employment period)</td>
     
      <td>$snap_exp</td>
    </tr>
    <tr>
      <th  class="has-text-centered">5</th>
      <td>Areas of Specialization / Expertise</td>
     
      <td>$snap_edu  <br> $snap_skill</td>
    </tr>
    <tr>
      <th  class="has-text-centered">6</th>
      <td>Current Location of Work</td>
     

      <td>$locationDataCase</td>
    </tr>
    <tr>
      <th  class="has-text-centered">7</th>
      <td>Current CTC</td>
      
      <td>$_POST[present_ctc] $pre_ctc_type Per Annum</td>
    </tr>
    <tr>
      <th  class="has-text-centered">8</th>
      <td>Expected CTC</td>
     

      <td>$_POST[expected_ctc] $exp_ctc_type Per Annum</td>
    </tr>
    <tr>
      <th class="has-text-centered">9</th>
      <td>Notice Period in the Current Organization</td>
     
      <td>$notice</td>
    </tr>
 
    <tr>
      <th class="has-text-centered">10</th>
      <td>Date of Birth</td>
      
      <td>$dob</td>
    </tr>
    <tr>
      <th class="has-text-centered">11</th>
      <td>Gender</td>
     
      <td>$gen</td>
    </tr>
    <tr>
      <th class="has-text-centered">12</th>
      <td>Family (Dependents)
</td>
     
      <td>$_POST[family]</td>
    </tr>
    <tr>
      <th class="has-text-centered">13</th>
      <th class="">Consultant Assessment</th>
    
      <td>$_POST[consultant]</td>
    </tr>
    
  </tbody>
</table>

<footer class="footer is-paddingless level" style="height:50px;">
  <div class="container is-light">
    <div class="level-item content has-text-centered">
      <p>
        <strong>Powered</strong> by <a class="is-danger" href="http://career-tree.in">CareerTree HR Solutions Private Limited</a>. 
      </p>     
    </div>
  </div>
</footer>

</div>
</section>
	

</body>
</html>
EOD;

$snap_file_name = substr($_SESSION['resume_doc'], 0, strlen($_SESSION['resume_doc'])-5);
$snap_file_name = $fun->filter_file($snap_file_name);
$apikey = '5ea15ca6-ba76-423a-9214-b2194c6c427a';
// $value = 'http://www.bigspireshowcase.com/mh/bulma.html'; // a url starting with http or an HTML string.  see example #5 if you have a long HTML string
$result = file_get_contents("http://api.html2pdfrocket.com/pdf?apikey=" . urlencode($apikey) . "&value=" . urlencode($str).'&page');
file_put_contents('uploads/snapshot/'.$snap_file_name.'.pdf',$result);
?>