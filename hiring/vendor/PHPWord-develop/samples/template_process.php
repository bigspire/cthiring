<?php
include_once 'Sample_Header.php';

// Template processor instance creation
echo date('H:i:s'), ' Creating new TemplateProcessor instance...', EOL;
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('resources/EWKI - 2.docx');
$templateProcessor->setValue('CANDIDATE_NAME', 'Vinoth Kumar',  1,0);       
	require_once "HTMLtoOpenXML.php";


$templateProcessor->setValue('COMPANY_NAME', 'Infosys Technologies',  1,0);  
     
$templateProcessor->setValue('COMP_LOC', 'Bangalore',  1,0); 
 
$templateProcessor->setValue('COMP_CTRY', 'India',  1,0);       
 
$templateProcessor->setValue('RECRUITER_NAME', 'Praveena Elangovan',  1,0);
       
$templateProcessor->setValue('CURRENT_DATE', date('d-M-Y'),  1,0);       


$templateProcessor->setValue('DESIGNATION_NAME', 'Senior Safety Manager',  1,0); 

$templateProcessor->setValue('CANDIDATE_ADDRESS', '#23, HRBR Layout',  1,0);    
$templateProcessor->setValue('CANDIDATE_PHONE', '************',  1,0);    
$templateProcessor->setValue('CANDIDATE_MOBILE', '************',  1,0);    
$templateProcessor->setValue('CANDIDATE_EMAIL', '************',  1,0);    
   
	$templateProcessor->setValue('DATEOFBIRTH', '23',   1, 0);
	$templateProcessor->setValue('DOBUPPER', 'rd',   1, 0);
	$templateProcessor->setValue('YEARBIRTH', 'May 1987',   1, 0);
	$templateProcessor->setValue('NATIONALDATA', 'Indian',   1, 0);
	$templateProcessor->setValue('MARITAL', 'Married',   1, 0);
	$templateProcessor->setValue('LANGUAGESKNOWN', 'Tamil, English',   1, 0);
	$templateProcessor->setValue('HOBBIESDETAIL', 'Playing Cricket, Hockey',   1, 0);
	$templateProcessor->setValue('COMPUTERSKILLS', 'MS Office, Ubuntu',   1, 0);

	$templateProcessor->setValue('COMPENSATIONAMOUNT', '80 Lacs per Annum',   1, 0);
	$templateProcessor->setValue('NOTICEPERIOD', '6 Months (Maximum)',   1, 0);
	
	
	$templateProcessor->setValue('CANDIDATEAPPRAISAL', 'Vinoth Kumar brings with him 23 years of exposure in the Industrial sector covering thermal power, tobacco, paper, hotels, Natural gas distribution, Airport and EPC Power. He has in the past worked with DIAL, BG Group, ITC and NTPC. He is passionate about safety and aims to develop a sustainable and interdependent level of safety culture at the organizational level.',   1, 0);

	$templateProcessor->setValue('TECHNICALEXPERTISE', 'He developed SHE manual in line with OHSAS 18001, ISO 14001 and ICAO guidelines was rolled out. While he was with DIAL, IGIA was certified for OHSAS 18001 and ISO 14001 He was instrumental in developing HSSE leaders in each group / department, who “walk the walk” and “talk the talk” from an HSSE standpoint. He developed HSSE objectives, both strategic and tactical and integration of these in to Company’s business plan. He institutionalized the behavior based safety process that was established in the year 2004 and is going very strong at the moment helping the organization improve the behaviors of employees across the organization',   1, 0);

	
	$templateProcessor->setValue('PERSONALITYCANDIDATE', 'He comes across as a people oriented person who can and has influenced others by way of an assertive approach. He is very passionate about safety. He carries strong belief in values such as Team work, Trust, commitment, growth. His detailed orientation and experiments with new ideas has helped to keep employees engaged in safety and he wants to inculcate this as behaviour in the organization that he works with.',   1, 0);

	
	$templateProcessor->setValue('OUTLOOKCOMPANY', 'The role will give him the exposure to drive safety changes at the group level. He is highly recommended by senior professionals in the industry. He is keen to engage with you to discuss this in person and looks forward to your meeting with him..',   1, 0);
	
	
	$templateProcessor->cloneRow('TRACKRECORDS', 5);

	
$templateProcessor->setValue('TRACKRECORDS#1', 'Monthly in-house HSSE news electronic bulletins',   0, 0);
$templateProcessor->setValue('TRACKRECORDS#2', 'Hazard and Near miss campaign',   0, 0);
$templateProcessor->setValue('TRACKRECORDS#3', 'BG India Safety Forum for Sharing Information',   0, 0);
$templateProcessor->setValue('TRACKRECORDS#4', 'Safety Award for Industrial Customers',   0, 0);
$templateProcessor->setValue('TRACKRECORDS#5', 'Behaviour Based Safety Process (BBS)',   0, 0);





	
$templateProcessor->cloneRow('TRAINYR', 2);

$templateProcessor->setValue('TRAINYR#1', '2016',   0, 0);
$templateProcessor->setValue('TRAINYR#2', '2013',   0, 0);

$templateProcessor->setValue('TRAINTITLE#1', 'Software Testing - Selenium',   0, 0);
$templateProcessor->setValue('TRAINTITLE#2', 'Training & Development',   0, 0);







$templateProcessor->setValue('TRAININSTI#1', 'BigSpire Software',   0, 0);
$templateProcessor->setValue('TRAININSTI#2', 'Oracle Corporation',   0, 0);


$templateProcessor->setValue('TRAINCITY#1', 'Chennai',   0, 0);
$templateProcessor->setValue('TRAINCITY#2', 'Bangalore',   0, 0);

$templateProcessor->setValue('TRAINCOUNTRY#1', 'India',   0, 0);
$templateProcessor->setValue('TRAINCOUNTRY#2', 'India',   0, 0);

	$html = '<br><p>Understanding the project details</p><p>Worked on real time projects</p>';
	$toOpenXML = HTMLtoOpenXML::getInstance()->fromHTML($html);

$templateProcessor->setValue('TRAINDESC#2', $toOpenXML,   0, 1);

$templateProcessor->setValue('TRAINDESC#1', '',   0, 1);



// On section/content

$templateProcessor->cloneRow('EDUYR', 3);

$templateProcessor->setValue('EDUYR#1', '2016',   0, 0);
$templateProcessor->setValue('EDUYR#2', '2013',   0, 0);
$templateProcessor->setValue('EDUYR#3', '2008',   0, 0);

$templateProcessor->setValue('DEGREE#1', 'PhD in Technology',   0, 0);
$templateProcessor->setValue('DEGREE#2', 'Master of Engineering ',   0, 0);
$templateProcessor->setValue('DEGREE#3', 'Bachelor of Technology ',   0, 0);

$templateProcessor->setValue('SPEC#1', 'Computer Science',   0, 0);
$templateProcessor->setValue('SPEC#2', 'Robotics',   0, 0);
$templateProcessor->setValue('SPEC#3', 'Artificial Intelligence',   0, 0);

$templateProcessor->setValue('COLLEGE#1', 'Regional Engineering College',   0, 0);
$templateProcessor->setValue('COLLEGE#2', 'Calicut University',   0, 0);
$templateProcessor->setValue('COLLEGE#3', 'Tamilnadu Engineering College',   0, 0);

$templateProcessor->setValue('LOCATION#1', 'Tiruchirapalli',   0, 0);
$templateProcessor->setValue('LOCATION#2', 'Chennai',   0, 0);
$templateProcessor->setValue('LOCATION#3', 'Mumbai',   0, 0);

$templateProcessor->setValue('COUNTRY#1', 'India',   0, 0);
$templateProcessor->setValue('COUNTRY#2', 'India',   0, 0);
$templateProcessor->setValue('COUNTRY#3', 'India',   0, 0);

$templateProcessor->setValue('MARKS#1', '74% overall',   0, 0);
$templateProcessor->setValue('MARKS#2', '84% overall',   0, 0);
$templateProcessor->setValue('MARKS#3', '90% overall',   0, 0);

$templateProcessor->cloneRow('EXPCOMPANYNAME', 3);

$templateProcessor->setValue('EXPCOMPANYNAME#1', strtoupper('Accenture'),   0, 0);
$templateProcessor->setValue('ESTART#1', 'Jan 2015',   0, 0);
$templateProcessor->setValue('EEND#1', 'Aug 2017',   0, 0);
$templateProcessor->setValue('EXPLOCATION#1', 'Mumbai',   0, 0);
$templateProcessor->setValue('EXPCOUNTRY#1', 'India',   0, 0);
$templateProcessor->setValue('EXPDESIG#1', 'Project Manager - Safety',   0, 0);

$templateProcessor->setValue('ESTART#2', 'Jan 2013',   0, 0);
$templateProcessor->setValue('EEND#2', 'Dec 2014',   0, 0);
$templateProcessor->setValue('EXPCOMPANYNAME#2', strtoupper('Wipro Technologies'),   0, 0);
$templateProcessor->setValue('EXPLOCATION#2', 'Kolkotta',   0, 0);
$templateProcessor->setValue('EXPCOUNTRY#2', 'India',   0, 0);
$templateProcessor->setValue('EXPDESIG#2', 'Assistant Manager - Quality',   0, 0);

$templateProcessor->setValue('ESTART#3', 'Jan 2011',   0, 0);
$templateProcessor->setValue('EEND#3', 'Dec 2012',   0, 0);
$templateProcessor->setValue('EXPCOMPANYNAME#3', strtoupper('Intercom India'),   0, 0);
$templateProcessor->setValue('EXPLOCATION#3', 'Rajastan',   0, 0);
$templateProcessor->setValue('EXPCOUNTRY#3', 'India',   0, 0);
$templateProcessor->setValue('EXPDESIG#3', 'Manager - Safety & Quality',   0, 0);

$templateProcessor->cloneRow('CARCOMPANYNAME', 3);
// $templateProcessor->cloneBlock('CARKEYACHIEVE', 3);


$templateProcessor->setValue('CARSTART#1', 'Jan 2015',   0, 0);
$templateProcessor->setValue('CAREND#1', 'Aug 2017',   0, 0);
$templateProcessor->setValue('CARSTART#2', 'Jan 2013',   0, 0);
$templateProcessor->setValue('CAREND#2', 'Dec 2014',   0, 0);
$templateProcessor->setValue('CARSTART#3', 'Jan 2011',   0, 0);
$templateProcessor->setValue('CAREND#3', 'Dec 2012',   0, 0);
$templateProcessor->setValue('CARCOMPANYNAME#3', strtoupper('Intercom India'),   0, 0);
$templateProcessor->setValue('CARCOMPANYNAME#2', strtoupper('Wipro Technologies'),   0, 0);
$templateProcessor->setValue('CARCOMPANYNAME#1', strtoupper('Accenture'),   0, 0);

$templateProcessor->setValue('CARLOCATION#2', 'Kolkotta',   0, 0);
$templateProcessor->setValue('CARCOUNTRY#2', 'India',   0, 0);
$templateProcessor->setValue('CARLOCATION#1', 'Mumbai',   0, 0);
$templateProcessor->setValue('CARCOUNTRY#1', 'India',   0, 0);
$templateProcessor->setValue('CARLOCATION#3', 'Rajastan',   0, 0);
$templateProcessor->setValue('CARCOUNTRY#3', 'India',   0, 0);

$templateProcessor->setValue('CARDESIG#1', 'Project Manager - Safety',   0, 0);
$templateProcessor->setValue('CARDESIG#2', 'Assistant Manager - Quality',   0, 0);
$templateProcessor->setValue('CARDESIG#3', 'Manager - Safety & Quality',   0, 0);

$templateProcessor->setValue('CARCOMPANYPROFILE#1', 'Accenture Group is one of the fastest growing infrastructure organisations in the country with interests in Airports, Energy, Highways and Urban Infrastructure (including SEZ). Employing the Public Private Partnership model',   0, 0);
$templateProcessor->setValue('CARCOMPANYPROFILE#2', 'Wipro Technologies is one of the fastest growing infrastructure organisations in the country with interests in Airports, Energy, Highways and Urban Infrastructure (including SEZ). Employing the Public Private Partnership model',   0, 0);
$templateProcessor->setValue('CARCOMPANYPROFILE#3', 'Intercom India is one of the fastest growing infrastructure organisations in the country with interests in Airports, Energy, Highways and Urban Infrastructure (including SEZ). Employing the Public Private Partnership model',   0, 0);

$templateProcessor->setValue('CARREPORTING#1', 'Report directly to Manager of Safety ',   0, 0);
$templateProcessor->setValue('CARREPORTING#2', 'Report directly to CTO',   0, 0);
$templateProcessor->setValue('CARREPORTING#3', 'Report directly to Chief Executive Officer',   0, 0);
	
	
	$html = '<br><p>Performs reporting risk assessments and auditing and observes all QHSE related activities and policies within a location.</p><p>Ensures operations are conducted in a safe and efficient manner and in conformance to federal, provincial and company safety regulations by integrating and implementing company and third-party QHSE policies and procedures.</p><p>Performs post-incident investigations and communicates with the QHSE Manager and others until all action items have been closed. Files QHSE documents and participates in job risk analysis and continual improvement. Likely to be either a specialist within a particular focus area for QHSE</p>';
	$toOpenXML = HTMLtoOpenXML::getInstance()->fromHTML($html);

		
		
$templateProcessor->setValue('CARKEYRESP#1', $toOpenXML,   0, 1);

	$html = '<br><p>Typically intermediate level positions perform more complex duties requiring some skills and judgment. Some decision making may be made independently</p><p>may work under supervision. This level is developing knowledge and problem-solving skills. Possesses 3-6 years of experience.</p>';
	$toOpenXML = HTMLtoOpenXML::getInstance()->fromHTML($html);
	
$templateProcessor->setValue('CARKEYRESP#2', utf8_encode($toOpenXML),   0, 1);

$html = '<br><p>Analyzing Information Reporting Research Results.</p><p>Documentation Skills</p><p>Promoting Process Improvement</p><p>Safety Management,</p><p>Managing Processes</p><p>Manufacturing Methods and Procedures</p><p>Supports Innovation, CAD</p><p>Quality Engineering</p><p>Operations Research</p>';
	$toOpenXML = HTMLtoOpenXML::getInstance()->fromHTML($html);

$templateProcessor->setValue('CARKEYRESP#3', utf8_encode($toOpenXML) ,   0, 1);
$html = '<br><p>A process-oriented and results-driven Quality Control Inspector who has a passion for excellence.</p><p>Maxine has experience of working on the production of a wide variety of manufactured goods and possesses a successful track of determining whether products meet expected standards.</p>';
	$toOpenXML = HTMLtoOpenXML::getInstance()->fromHTML($html);

$templateProcessor->setValue('CARKEYACHIEVE#1', utf8_encode($toOpenXML),   0, 1);

$html = '<br><p>She has a technical mind that excels when being challenged and possesses an entrepreneurial spirit along with a successful track record of ensuring the timeliness, quality and accuracy of a production process.</p><p>As a highly motivated individual she can effectively execute the essential duties and responsibilities of this post.</p><p>Her key strengths include conducting quality control activities and ensuring compliance with legal specifications.</p><p>In addition to this she has experience of using the latest electronic inspection equipment and tools including torque wrenches, rulers, calipers and gauges.</p><p>Right now she is looking for a challenging work position with a company that encourages new ideas and solutions from its staff</p>';
	$toOpenXML = HTMLtoOpenXML::getInstance()->fromHTML($html);

$templateProcessor->setValue('CARKEYACHIEVE#2', utf8_encode($toOpenXML),   0, 1);
	
	// echo 'ravi';
	$html = '<br><p>Identifying problems and suggesting solutions.</p><p>Ability to work effectively and efficiently in a team environment.</p><p>Using data to substantiate decision-making.</p><p>Carrying out functional testing on components and subcomponents.</p><p>Knowledge of audit standards</p>';
	$toOpenXML = HTMLtoOpenXML::getInstance()->fromHTML($html);

	
	$templateProcessor->setValue('CARKEYACHIEVE#3', utf8_encode($toOpenXML),   0, 1);

	

	/*
	

  $html = '<ULISTE><LISTE><B>Identifying problems and suggesting solutions.</B><BREAKE><BREAKE></LISTE>
<LISTE>Ability to work effectively and efficiently in a team environment. </LISTE>
<LISTE>Using data to substantiate decision-making. </LISTE>
<LISTE>Carrying out functional testing on components and subcomponents. </LISTE>
<LISTE>Knowledge of audit standards</LISTE></ULISTE>';
*/
  




/*

// Variables on different parts of document
$templateProcessor->setValue('weekday', date('l'));            // On section/content
$templateProcessor->setValue('time', date('H:i'));             // On footer
$templateProcessor->setValue('serverName', realpath(__DIR__)); // On header

// Simple table
$templateProcessor->cloneRow('rowValue', 10);

$templateProcessor->setValue('rowValue#1', 'Sun');
$templateProcessor->setValue('rowValue#2', 'Mercury');
$templateProcessor->setValue('rowValue#3', 'Venus');
$templateProcessor->setValue('rowValue#4', 'Earth');
$templateProcessor->setValue('rowValue#5', 'Mars');
$templateProcessor->setValue('rowValue#6', 'Jupiter');
$templateProcessor->setValue('rowValue#7', 'Saturn');
$templateProcessor->setValue('rowValue#8', 'Uranus');
$templateProcessor->setValue('rowValue#9', 'Neptun');
$templateProcessor->setValue('rowValue#10', 'Pluto');

$templateProcessor->setValue('rowNumber#1', '1');
$templateProcessor->setValue('rowNumber#2', '2');
$templateProcessor->setValue('rowNumber#3', '3');
$templateProcessor->setValue('rowNumber#4', '4');
$templateProcessor->setValue('rowNumber#5', '5');
$templateProcessor->setValue('rowNumber#6', '6');
$templateProcessor->setValue('rowNumber#7', '7');
$templateProcessor->setValue('rowNumber#8', '8');
$templateProcessor->setValue('rowNumber#9', '9');
$templateProcessor->setValue('rowNumber#10', '10');

// Table with a spanned cell
$templateProcessor->cloneRow('userId', 3);

$templateProcessor->setValue('userId#1', '1');
$templateProcessor->setValue('userFirstName#1', 'James');
$templateProcessor->setValue('userName#1', 'Taylor');
$templateProcessor->setValue('userPhone#1', '+1 428 889 773');

$templateProcessor->setValue('userId#2', '2');
$templateProcessor->setValue('userFirstName#2', 'Robert');
$templateProcessor->setValue('userName#2', 'Bell');
$templateProcessor->setValue('userPhone#2', '+1 428 889 774');

$templateProcessor->setValue('userId#3', '3');
$templateProcessor->setValue('userFirstName#3', 'Michael');
$templateProcessor->setValue('userName#3', 'Ray');
$templateProcessor->setValue('userPhone#3', '+1 428 889 775');
*/
echo date('H:i:s'), ' Saving the result document...', EOL;
$templateProcessor->saveAs('results/EWKI - 2.docx');

echo getEndingNotes(array('Word2007' => 'docx'));
if (!CLI) {
    include_once 'Sample_Footer.php';
}
