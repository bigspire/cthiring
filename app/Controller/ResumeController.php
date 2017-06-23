<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
App::uses('Sanitize', 'Utility');
 
class ResumeController extends AppController {  
	
	public $name = 'Resume';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions', 'Excel');

	public function index(){
		// when the form is submitted for search
		if($this->request->is('post')){
			$url_vars = $this->Functions->create_url(array('keyword','from','to','min_exp','max_exp',
			'int_from','int_to','emp_id','loc','status','report_status'),'Resume'); 			
			$this->redirect('/resume/?srch_status=1&'.$url_vars);				
		}
		// set the page title
		$this->set('title_for_layout', 'Resumes - CT Hiring - ES');	
		$this->set('empList', $this->Resume->get_employee_details());	
		$this->set('locList', $this->get_loc_details());
		$this->set('stList', $this->get_status_details());
		
		if($this->request->query['from'] != '' || $this->request->query['to'] != ''){
			$start = $this->request->query['from'] ? $this->request->query['from'] : ''; //date('d/m/Y', strtotime('-15 months'));
			$end = $this->request->query['to'] ? $this->request->query['to'] : date('d/m/Y');
			$end_search = $this->request->query['to'] ? $this->request->query['to'] : date('d/m/Y', strtotime('+1 day'));
			// set date condition
			$date_cond = array('or' => array("DATE_FORMAT(Resume.created_date, '%Y-%m-%d') between ? and ?" => 
					array($this->Functions->format_date_save($start), $this->Functions->format_date_save($end_search))));
		}			
		
		$exp_list = $this->Functions->get_experience();
		$this->set('expList', $exp_list);	
		// set keyword condition
		if($this->params->query['keyword'] != '' && $this->params->query['report_status'] == ''){			
			$keyCond = array("MATCH (ResLocation.location,Resume.first_name,Resume.last_name,Resume.present_employer) AGAINST ('".$this->Functions->format_search_keyword($this->params->query['keyword'])."' IN BOOLEAN MODE)");
		}else if($this->params->query['keyword'] != '' && $this->params->query['report_status'] != ''){
			$keyCond = array('Client.client_name'  => $this->params->query['keyword']);

		}
	
		// min. exp. condition
		if($this->request->query['min_exp'] != ''){
			$minCond = array('total_exp >=' => $this->request->query['min_exp']);
		}
		// max. exp. condition
		if($this->request->query['max_exp'] != ''){
			$maxCond = array('total_exp <=' => $this->request->query['max_exp']);
		}
		// for current status condition
		if($this->request->query['status'] != ''){ 
			$statusCond = $this->get_status_cond($this->request->query['status']);
		}
		// for report status condition
		if($this->request->query['report_status'] != ''){ 
			$repStatusCond = $this->get_report_status_cond($this->request->query['report_status']);
			
			// set date condition
			$date_cond = array('or' => array("DATE_FORMAT(ReqResumeStatus.created_date, '%Y-%m-%d') between ? and ?" => 
					array($this->Functions->format_date_save($start), $this->Functions->format_date_save($end_search))));
			
		}
		
			// check role based access
		if($this->Session->read('USER.Login.roles_id') == '34'){ // account holder
			$empCond = array('AH.users_id' => $this->Session->read('USER.Login.id'));
		}else if($this->Session->read('USER.Login.roles_id') == '30'){ // recruiter
			$empCond = array('OR' => array(
					'ReqResume.created_by' =>  $this->Session->read('USER.Login.id')
					)
			);		
			//$empCond = array('ReqResumeStatus.created_by' => $this->Session->read('USER.Login.id'),
			//'ReqResumeStatus.stage_title' => 'Validation - Account Holder', 'ReqResumeStatus.status_title' => 'Validated');		
		}else if($this->Session->read('USER.Login.roles_id') == '33' || $this->Session->read('USER.Login.roles_id') == '35'){ // director & BD
			$empCond = '';
		}
		
		
		$options = array(			
				array('table' => 'req_resume',
						'alias' => 'ReqResume',					
						'type' => 'LEFT',
						'conditions' => array('`ReqResume`.`resume_id` = `Resume`.`id`')
				),
				
				array('table' => 'requirements',
						'alias' => 'Position',					
						'type' => 'LEFT',
						'conditions' => array('`Position`.`id` = `ReqResume`.`requirements_id`')
				),
				array('table' => 'clients',
						'alias' => 'Client',					
						'type' => 'LEFT',
						'conditions' => array('`Client`.`id` = `Position`.`clients_id`')
				),
				array(
						'table' => 'req_resume_status',
						'alias' => 'ReqResumeStatus',					
						'type' => 'LEFT',
						'conditions' => array('`ReqResumeStatus`.`req_resume_id` = `ReqResume`.`id`')
				),
				array('table' => 'client_account_holder',
						'alias' => 'AH',					
						'type' => 'LEFT',
						'conditions' => array('`AH`.`clients_id` = `Client`.`id`')
				),
		);
		// for employee condition
		
		if($this->request->query['emp_id'] != ''){			
			$empCond = array('Resume.created_by' => $this->request->query['emp_id']);
		}else if($this->Session->read('USER.Login.rights') != '5'){			
			// $empCond = array('Resume.created_by' => $this->Session->read('USER.Login.id'));
		}
		
		// for branch condition
		if($this->request->query['loc'] != ''){ 
			$branchCond = array('Creator.location_id' => $this->request->query['loc']);
		}
		
		// for iframe in report
		if($this->request->query['iframe'] == '1'){
			$this->set('noHead', '1');
			//$empCond = array('ReqResumeStatus.created_by' => $this->request->query['emp_id']);
		}
		// interview condition
		if($this->request->query['int_from'] != '' || $this->request->query['int_to'] != ''){
			$int_start = $this->request->query['int_from'] ? $this->request->query['int_from'] : date('d/m/Y', strtotime('-6 months'));
			$int_end = $this->request->query['int_to'] ? $this->request->query['int_to'] : date('d/m/Y');
			// set date condition
			$int_cond = array('or' => array("DATE_FORMAT(ResInterview.int_date, '%Y-%m-%d') between ? and ?" => 
						array($this->Functions->format_date_save($int_start), $this->Functions->format_date_save($int_end))));
			$options = array(			
				array('table' => 'req_resume',
						'alias' => 'ReqResume',					
						'type' => 'LEFT',
						'conditions' => array('`ReqResume`.`resume_id` = `Resume`.`id`')
				),
				array('table' => 'req_resume_interview',
						'alias' => 'ResInterview',					
						'type' => 'LEFT',
						'conditions' => array('`ReqResume`.`id` = `ResInterview`.`req_resume_id`')
				)
			);
		}
		$fields = array('id',"concat(Resume.first_name,' ',Resume.last_name) full_name",'email_id','mobile','mobile2','total_exp','education','present_employer',
		'ResLocation.location','present_ctc','expected_ctc', 'Creator.first_name','Resume.created_date','Resume.modified_date','ReqResume.stage_title','ReqResume.status_title');	
		// for export
		if($this->request->query['action'] == 'export'){ 
			$data = $this->Resume->find('all', array('fields' => $fields,'conditions' => 
			array($date_cond,$keyCond,$minCond,	$maxCond,$int_cond,$empCond,$branchCond,$statusCond,$repStatusCond), 
			'order' => array('created_date' => 'desc'), 'group' => array('Resume.id'), 'joins' => $options));
			$this->Excel->generate('resumes', $data, $data, 'Report', 'CV Details','',$this->webroot);
		}
		$this->paginate = array('fields' => $fields,'limit' => '25','conditions' => array($date_cond,$keyCond,$minCond,
		$maxCond,$int_cond,$empCond,$branchCond,$statusCond,$repStatusCond),'order' => array('created_date' => 'desc'),'group' => array('Resume.id'), 'joins' => $options);
		$data = $this->paginate('Resume');
		$this->request->query['keyword'] = str_replace('||', '&', $this->params->query['keyword']);		
		$this->request->query['from'] = $start;
		$this->request->query['to'] = $end;
		$this->set('data', $data);
		if(empty($data)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Oops! No Resumes Found!', 'default', array('class' => 'alert alert-info'));
		}
		
		
	}
	
	/* function to get the status details */
	public function get_status_details(){
		$st = array('1' => 'CV Sent', '2' => 'Shortlisted', '3' => 'CV Rejected','4' => 'Feedback Awaited','5' => 'Candidates Interviewed','6' => 'Interview Dropouts',
		'7' => 'Interview Rejected','8' => 'Candidates Offered','9' => 'Offer Dropouts','10' => 'Candidates Joined','11' => 'Candidates Billed');
		return $st;
	}
	
	/* function to get the status condition */
	public function get_status_cond($st){
		switch($st){
			case '1':
			$cond = array('ReqResume.stage_title' => 'Shortlist','ReqResume.status_title' => 'CV-Sent');
			break;
			case '2':
			$cond = array('ReqResume.status_title' => 'Shortlisted');
			break;
			case '3':
			$cond = array('ReqResume.status_title' => 'Rejected','ReqResume.stage_title' => 'Shortlist');
			break;
			case '4':
			$cond = array('ReqResume.status_title' => 'YRF');
			break;
			case '5':
			$cond = array('ReqResume.stage_title like' => '%Interview');
			break;
			case '6':
			$cond = array('ReqResume.stage_title like' => '%Interview','ReqResume.status_title' => 'No Show' );
			break;
			case '7':
			$cond = array('ReqResume.status_title like' => '%Interview','ReqResume.status_title' => 'Rejected');
			break;
			case '8':
			$cond = array('ReqResume.stage_title' => 'Offer', 'ReqResume.status_title !=' => array('Offer Pending','Rejected', 'Not Interested','Quit'));
			break;
			case '9':
			$cond = array('ReqResume.stage_title' => 'Offer','ReqResume.status_title' => array('Rejected', 'Not Interested','Quit'));
			break;
			case '10':
			$cond = array('ReqResume.stage_title' => 'Joining','ReqResume.status_title' => 'Joined');
			break;
			case '11':
			$cond = array('ReqResume.bill_ctc >' => '0',  'ReqResume.status_title' => 'Joined');
			break;
			case '12':
			$cond = array('ReqResume.bill_ctc >' => '0', 'ReqResume.status_title' => 'Joined');
			break;
			
		}
		return $cond;
	}
	
	/* function to get the report status condition */
	public function get_report_status_cond($st){
		switch($st){
			case '1': 
			$cond = array('ReqResumeStatus.stage_title' => 'Validation - Account Holder','ReqResumeStatus.status_title' => 'Validated');
			break;
			case '2':
			$cond = array('ReqResumeStatus.status_title' => 'Shortlisted');
			break;
			case '3':
			$cond = array('ReqResumeStatus.status_title' => 'Rejected','ReqResumeStatus.stage_title' => 'Shortlist');
			break;
			case '4':
			$cond = array('ReqResumeStatus.status_title' => 'YRF');
			break;
			case '5':
			$cond = array('ReqResumeStatus.stage_title like' => '%Interview');
			break;
			case '6':
			$cond = array('ReqResumeStatus.stage_title like' => '%Interview','ReqResumeStatus.status_title' => 'No Show' );
			break;
			case '7':
			$cond = array('ReqResumeStatus.status_title' => 'Rejected',	'ReqResumeStatus.stage_title like' => '%Interview');
			//$cond = array('ReqResumeStatus.status_title like' => '%Interview','ReqResumeStatus.status_title' => 'Rejected');
			break;
			case '8':
			$cond = array('ReqResumeStatus.stage_title' => 'Offer', 'ReqResumeStatus.status_title !=' => array('Offer Pending','Rejected','Not Interested','Quit'));
			break;
			case '9':
			$cond = array('ReqResumeStatus.stage_title' => 'Offer','ReqResumeStatus.status_title' => array('Rejected', 'Not Interested','Quit'));
			break;
			case '10':
			$cond = array('ReqResumeStatus.stage_title' => 'Joining','ReqResumeStatus.status_title' => 'Joined');
			break;
			case '11':
			$cond = array('ReqResume.bill_ctc >' => '0' , 'ReqResume.status_title' => 'Joined');
			break;
			case '12':
			$cond = array('ReqResume.bill_ctc >' => '0' , 'ReqResume.status_title' => 'Joined');
			break;
			
		}
		return $cond;
	}
	
	
	/* function to view the Resume */
	public function view($id){	
		// set the page title
		$this->set('title_for_layout', 'View Resume - CT Hiring - ES');	
		$options = array(			
			array('table' => 'req_resume',
					'alias' => 'ReqResume',					
					'type' => 'LEFT',
					'conditions' => array('`Resume`.`id` = `ReqResume`.`resume_id`')
			)
		);
		$fields = array('id','ReqResume.id','first_name','last_name','email_id','mobile','mobile2','total_exp','education','present_employer',
		'ResLocation.location', 'present_ctc','expected_ctc', 'Creator.first_name','created_date','notice_period',
		'Resume.modified_date','ReqResume.stage_title','ReqResume.status_title','Designation.designation');
		$data = $this->Resume->find('all', array('fields' => $fields,'conditions' => array('Resume.id' => $id),
		'order' => array('ReqResume.id' => 'desc'),'joins' => $options));
		$this->set('resume_data', $data[0]);		
		// get interview details
		$this->loadModel('ResInterview');		
		$int_data = $this->ResInterview->find('all', array('fields' => array('int_date','stage_title','status_title',
		'ReqResume.billing_date','ReqResume.bill_ctc','ReqResume.ctc_offer','ReqResume.joined_on','outcome','ReqResume.date_offer'),
		'conditions' => array('req_resume_id' => $data[0]['ReqResume']['id']), 'order' => array('int_date' => 'desc')));
		$this->set('int_data', $int_data);
		// get requirement details
		$this->loadModel('ReqResume');
		$options = array(			
			array('table' => 'clients',
					'alias' => 'Client',					
					'type' => 'INNER',
					'conditions' => array('`Client`.`id` = `Position`.`clients_id`')
			),
			array('table' => 'client_contact',
					'alias' => 'ClientContact',					
					'type' => 'INNER',
					'conditions' => array('`ClientContact.clients_id` = `Client`.`id`',
					'`Position.client_contact_id` = `ClientContact`.`contact_id`')
			),
			array('table' => 'contact',
					'alias' => 'Contact',					
					'type' => 'INNER',
					'conditions' => array('`Contact.id` = `ClientContact`.`contact_id`')
			)
		);
		
		$data = $this->ReqResume->find('all', array('fields' => array('Position.job_title','Client.client_name','Contact.first_name',
		'Contact.email','Contact.mobile','Contact.phone','Position.id'), 'conditions' => array('ReqResume.resume_id' => $id),
		'order' => array('ReqResume.created_Date' => 'desc'), 'group' => array('ReqResume.id'),	'joins' => $options));
		$this->set('position_data', $data);
		
	}
	
	/* function to get the location details */
	public function get_loc_details(){
		$this->loadModel('Location');
		return $this->Location->find('list',  array('fields' => array('id','location'), 'order' => array('location ASC'),'conditions' => array('status' => 1)));

	}
	
	/* auto complete search */	
	public function search(){ 
		$this->layout = false;		
		$q = trim(Sanitize::escape($_GET['q']));	
		if(!empty($q)){
			// execute only when the search keywork has value		
			$this->set('keyword', $q);
			$start = date('Y-m-d H:i:s', strtotime('-6 month'));
			$end = date('Y-m-d', strtotime('+1 day'));
			// last year condition
			$date_cond = array('or' => array("Resume.created_date between ? and ?" => 
					array($start, $end)));
			$this->Resume->unBindModel(array('belongsTo' => array('Creator')));
			$data = $this->Resume->find('all', array('fields' => array('ResLocation.location',"concat(first_name, ' ', last_name) as first_name",'present_employer'),
			'group' => array('ResLocation.location','first_name','present_employer'), 'conditions' => 	array("OR" => array ('ResLocation.location like' => '%'.$q.'%',
			'first_name like' => '%'.$q.'%', 'present_employer like' => '%'.$q.'%'), 'AND' => array('Resume.is_deleted' => 'N',$date_cond))));		
			$this->set('results', $data);
		}
    }
	
	/* function to export the profile snap shot */
	public function profile_snapshot($id){
			// create the pdf
			if(!empty($id)){
											
				// convert to PDF
				require_once(WWW_ROOT.'/vendor/html2pdf/vendor/autoload.php');												
				try{
					$options = array(			
				array('table' => 'req_resume',
						'alias' => 'ReqResume',					
						'type' => 'LEFT',
						'conditions' => array('`ReqResume`.`resume_id` = `Resume`.`id`')
				),
				
				array('table' => 'requirements',
						'alias' => 'Position',					
						'type' => 'LEFT',
						'conditions' => array('`Position`.`id` = `ReqResume`.`requirements_id`')
				),
				array('table' => 'clients',
						'alias' => 'Client',					
						'type' => 'LEFT',
						'conditions' => array('`Client`.`id` = `Position`.`clients_id`')
				),
				array(
						'table' => 'req_resume_status',
						'alias' => 'ReqResumeStatus',					
						'type' => 'LEFT',
						'conditions' => array('`ReqResumeStatus`.`req_resume_id` = `ReqResume`.`id`')
						)
		);
					// get candidate details
					$user_data2 = $this->Resume->find('all', array('fields' => array('first_name', 'last_name','Designation.Designation','education',
					'total_exp','present_employer','exp_skills','ResLocation.location','present_ctc','expected_ctc','notice_period','dob','gender',
					'family','consultant_assess','Position.job_title'), 'conditions' => array('Resume.id' => $id), 'joins' => $options));
					$user_data = $user_data2[0];
					// get the HTML
					ob_start();
					include(WWW_ROOT.'/vendor/html2pdf/examples/res/snapshot_template.php');
					$content = ob_get_clean();
					$html2pdf = new HTML2PDF('P', 'A4', 'fr');
					$html2pdf->pdf->SetDisplayMode('fullpage');
					$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
					$html2pdf->Output(ucfirst(strtolower($user_data['Resume']['first_name'])).' '.ucfirst(strtolower($user_data['Resume']['last_name'])).'_snapshot.pdf', 'D');
					// $root = WWW_ROOT.'home';
					// echo "<script>location.href=$root></script>";								
				}catch(HTML2PDF_exception $e){
					echo $e;
					exit;
				}
			}
	}
	
	/* function to download the file */
	public function download_doc($file){
		 $this->download_file(WWW_ROOT.'/uploads/resume/'.$file);
		 die;
	}
	
	/* function to export the profile snap shot */
	public function autoresume($id){
			// create the pdf
			if(!empty($id)){
											
				// convert to PDF
				require_once(WWW_ROOT.'/vendor/html2pdf/vendor/autoload.php');												
				try{
					$options = array(			
				array('table' => 'req_resume',
						'alias' => 'ReqResume',					
						'type' => 'LEFT',
						'conditions' => array('`ReqResume`.`resume_id` = `Resume`.`id`')
				),
				
				array('table' => 'requirements',
						'alias' => 'Position',					
						'type' => 'LEFT',
						'conditions' => array('`Position`.`id` = `ReqResume`.`requirements_id`')
				),
				array('table' => 'clients',
						'alias' => 'Client',					
						'type' => 'LEFT',
						'conditions' => array('`Client`.`id` = `Position`.`clients_id`')
				),
				array(
						'table' => 'req_resume_status',
						'alias' => 'ReqResumeStatus',					
						'type' => 'LEFT',
						'conditions' => array('`ReqResumeStatus`.`req_resume_id` = `ReqResume`.`id`')
						)
		);
					// get candidate details
					$user_data2 = $this->Resume->find('all', array('fields' => array('first_name', 'last_name','Designation.Designation','education',
					'total_exp','present_employer','exp_skills','ResLocation.location','present_ctc','expected_ctc','notice_period','dob','gender',
					'family','consultant_assess','Position.job_title'), 'conditions' => array('Resume.id' => $id), 'joins' => $options));
					$user_data = $user_data2[0];
					// get the HTML
					ob_start();
					include(WWW_ROOT.'/vendor/html2pdf/examples/res/autoresume_template.php');
					$content = ob_get_clean();
					$html2pdf = new HTML2PDF('P', 'A4', 'fr');
					$html2pdf->pdf->SetDisplayMode('fullpage');
					$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
					$html2pdf->Output(ucfirst(strtolower($user_data['Resume']['first_name'])).' '.ucfirst(strtolower($user_data['Resume']['last_name'])).'_snapshot.pdf', 'D');
					// $root = WWW_ROOT.'home';
					// echo "<script>location.href=$root></script>";								
				}catch(HTML2PDF_exception $e){
					echo $e;
					exit;
				}
			}
	}
	
	// check the role permissions
	public function beforeFilter(){ 
		$this->check_role_access(8);
	}

}