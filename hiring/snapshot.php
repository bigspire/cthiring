<?php
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
      <td>Software Developer</td>
    </tr>
    <tr>
      <th class="has-text-centered">3</th>
      <td>Total Years of Experience</td>
     
      <td>12 Years</td>
    </tr>
    <tr>
      <th class="has-text-centered">4</th>
      <td>Career Highlights
(companies, designation
& employment period)</td>
     
      <td>Infosys Technologies, Dec,2015 to Present<br>
BigSpire Software, Jan,2013 to Dec, 2015<br></td>
    </tr>
    <tr>
      <th  class="has-text-centered">5</th>
      <td>Areas of Specialization /
Expertise</td>
     
      <td>B.Tech, Computer Science, Anna University, 2014 Passed Out, 88.5% overall.
	  <br>C, C++, Java & SAP</td>
    </tr>
    <tr>
      <th  class="has-text-centered">6</th>
      <td>Current Location of Work</td>
     
      <td>Bangalore</td>
    </tr>
    <tr>
      <th  class="has-text-centered">7</th>
      <td>Current CTC</td>
      
      <td>8 Lacs Per Annum</td>
    </tr>
    <tr>
      <th  class="has-text-centered">8</th>
      <td>Expected CTC</td>
     
      <td>10 Lacs Per Annum</td>
    </tr>
    <tr>
      <th class="has-text-centered">10</th>
      <td>Notice Period in the Current Organization</td>
     
      <td>2 Months</td>
    </tr>
 
    <tr>
      <th class="has-text-centered">11</th>
      <td>Date of Birth</td>
      
      <td>13-Nov-1990</td>
    </tr>
    <tr>
      <th class="has-text-centered">12</th>
      <td>Gender</td>
     
      <td>Male</td>
    </tr>
    <tr>
      <th class="has-text-centered">13</th>
      <td>Family (Dependents)
</td>
     
      <td>Father, Mother & two sisters.</td>
    </tr>
    <tr>
      <th class="is-light has-text-centered">14</th>
      <th class="is-light has-text-black">Consultant Assessment</th>
    
      <td class="is-light">Interested to learn new technologies and having good experience in project managements. I highly recommend this candidate for the job.</td>
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

$apikey = '5ea15ca6-ba76-423a-9214-b2194c6c427a';
// $value = 'http://www.bigspireshowcase.com/mh/bulma.html'; // a url starting with http or an HTML string.  see example #5 if you have a long HTML string
$result = file_get_contents("http://api.html2pdfrocket.com/pdf?apikey=" . urlencode($apikey) . "&value=" . urlencode($str).'&page');
file_put_contents('uploads/snapshot/'.$_POST['first_name'].' '.$_POST['last_name'].'.pdf',$result);
?>