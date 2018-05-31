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
  
class ReportController extends AppController {  
	
	public $name = 'Report';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions','Excel');

	public function index(){
		// set the page title
		$this->set('title_for_layout', 'Reports - Manage Hiring');	
		// when the form is submitted for search
		if($this->request->is('post')){
			$url_vars = $this->Functions->create_url(array('from','to','loc','emp_id','keyword'),'Report'); 			
			$this->redirect('/report/?'.$url_vars);				
		}
		$this->set('empList', $this->get_employee_details());	
		$this->set('locList', $this->get_loc_details());
		$start = $this->request->query['from'] ? $this->request->query['from'] : date('d/m/Y', strtotime('-1 month'));
		$end = $this->request->query['to'] ? $this->request->query['to'] : date('d/m/Y');
		// set date condition
		$date_cond = array('or' => array("DATE_FORMAT(ReqResume.created_date, '%Y-%m-%d') between ? and ?" => 
					array($this->Functions->format_date_save($start), $this->Functions->format_date_save($end))));		
		$this->request->query['from'] = $start;
		$this->request->query['to'] = $end;
		// for branch condition
		if($this->request->query['loc'] != ''){			
			$branch_cond = array('User.location_id' => $this->request->query['loc']);
		}
		// for employee condition
		if($this->request->query['emp_id'] != ''){ 
			//$req_emp_cond = array('ReqTeam.users_id' => $this->request->query['emp_id']);
			$cv_emp_cond = array('ReqResumeStatus.created_by' => $this->request->query['emp_id']);
			$empSrchCond = array('User.id' => $this->request->query['emp_id']);
		}
		
		
		
		
		// for client condition
		if($this->request->query['keyword'] != ''){			
			$client_cond = array('Client.client_name' => $this->request->query['keyword']);
			$client_options = array(			
				array('table' => 'requirements',
					'alias' => 'Position',					
					'type' => 'LEFT',
					'conditions' => array('`Position`.`id` = `ReqResume`.`requirements_id`')
				),
				array('table' => 'clients',
					'alias' => 'Client',					
					'type' => 'LEFT',
					'conditions' => array('`Client`.`id` = `Position`.`clients_id`')
				)
				
			);
		}
		
			$client_options2 = array(			
					array('table' => 'resume',
						'alias' => 'Resume',					
						'type' => 'LEFT',
						'conditions' => array('`Resume`.`id` = `ReqResume`.`resume_id`')
					)					
				);
		
		// for client condition and sent resume condition
		if($this->request->query['keyword'] != ''){			
			$client_cond = array('Client.client_name' => $this->request->query['keyword']);
			$client_options2 = array(			
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
				array('table' => 'resume',
						'alias' => 'Resume',					
						'type' => 'LEFT',
						'conditions' => array('`Resume`.`id` = `ReqResume`.`resume_id`')
				)
				
			);
		}
		

			
		if($this->Session->read('USER.Login.rights') != '5'){			
			$empCond = array('User.id' => $this->Session->read('USER.Login.id'));
		}
		// get the users
		$emp_data = $this->User->find('all',  array('fields' => array('id','first_name'), 
		'order' => array('first_name ASC'),'conditions' => array('User.status' => 0, 'User.is_deleted' => 'N', $branch_cond,$empCond,$empSrchCond)));
		$emp_list = $this->Functions->format_list($emp_data, 'User', 'id','first_name');
		// iterate the users
		foreach($emp_list as $emp_id => $emp_name){			
			// get the total req. by user
			$rec_count = $this->Report->find('all', array('fields' => array('COUNT(distinct Report.id) as reqCount'), 'conditions' => array('ReqResume.created_by' => $emp_id,
			$date_cond,$req_emp_cond,$client_cond), 'joins' => $client_options));
			// process only requirement count is not empty
			$rec_total = $rec_count[0][0]['reqCount'];
			//if($rec_total > 0){
				$req_count[] = $rec_total;
				// get resume sent by user				
				$this->loadModel('ReqResumeStatus');
				$cv_date_cond = array('or' => array("DATE_FORMAT(ReqResumeStatus.created_date, '%Y-%m-%d') between ? and ?" => 
						array($this->Functions->format_date_save($start), $this->Functions->format_date_save($end))));
				// for sent resumes			
				$cv_sent_count[] = $this->ReqResumeStatus->find('count', array('conditions' => array('Resume.created_by' => $emp_id
				,$cv_date_cond,$client_cond,'ReqResumeStatus.stage_title' => 'Validation - Account Holder','ReqResumeStatus.status_title' => 'Validated'),
				'group' => array('Resume.id'), 'joins' => $client_options2));							
				$cv_shortlist_count[] = $this->ReqResumeStatus->find('count', array('conditions' => array('ReqResumeStatus.created_by' => $emp_id,
				'ReqResumeStatus.status_title' => 'Shortlisted', $cv_date_cond,$cv_emp_cond,$client_cond),
				'group' => array('ReqResumeStatus.req_resume_id'), 'joins' => $client_options));				
				// CV rejected count
				$cv_reject_count[] = $this->ReqResumeStatus->find('count', array('conditions' => array('ReqResumeStatus.created_by' => $emp_id,
				'ReqResumeStatus.status_title' => 'Rejected', 'ReqResumeStatus.stage_title' => 'Shortlist', $cv_date_cond,$cv_emp_cond,
				$client_cond),'group' => array('ReqResumeStatus.req_resume_id'),'joins' => $client_options));
				// get cv feedback awaited						
				$cv_waiting_count[] = $this->ReqResumeStatus->find('count', array('conditions' => array('ReqResumeStatus.created_by' => $emp_id,
				'ReqResumeStatus.status_title' => 'YRF', $cv_date_cond,$cv_emp_cond,$client_cond),
				'group' => array('ReqResumeStatus.req_resume_id'),'joins' => $client_options));
				// short list date condition
				$cv_shortlist_date_cond = array('or' => array("DATE_FORMAT(ReqResumeStatus.created_date, '%Y-%m-%d') between ? and ?" => 
						array($this->Functions->format_date_save($start), $this->Functions->format_date_save($end))));
						
				// get candidates interviewed						
				$options = array(			
								
					array('table' => 'requirements',
							'alias' => 'Position',					
							'type' => 'LEFT',
							'conditions' => array('`Position`.`id` = `ReqResume`.`requirements_id`')
					),
					array('table' => 'clients',
							'alias' => 'Client',					
							'type' => 'LEFT',
							'conditions' => array('`Client`.`id` = `Position`.`clients_id`')
					)
				);
				$candidate_interview_count[] = $this->ReqResumeStatus->find('count', array('conditions' => array('ReqResumeStatus.created_by' => $emp_id,
				'ReqResumeStatus.stage_title like' => '%Interview', $cv_shortlist_date_cond,$cv_emp_cond,$client_cond), 
				'group' => array('ReqResumeStatus.req_resume_id'),	'joins' => $options));
				// get candidates drop outs interview						
				$candidate_int_drop_count[] = $this->ReqResumeStatus->find('count', array('conditions' => array('ReqResumeStatus.created_by' => $emp_id,
				'ReqResumeStatus.stage_title like' => '%Interview', 'ReqResumeStatus.status_title' => 'No Show', $cv_shortlist_date_cond,$cv_emp_cond,$client_cond), 
				'group' => array('ReqResumeStatus.req_resume_id'), 'joins' => $options));
				// get candidates rejected interview						
				$candidate_int_reject_count[] = $this->ReqResumeStatus->find('count', array('conditions' => array('ReqResumeStatus.created_by' => $emp_id,
				'ReqResumeStatus.stage_title like' => '%Interview', 'ReqResumeStatus.status_title' => 'Rejected', $cv_shortlist_date_cond,$cv_emp_cond,$client_cond), 
				'group' => array('ReqResumeStatus.req_resume_id'), 'joins' => $options));
				// get candidates offered 						
				$candidate_offer[] = $this->ReqResumeStatus->find('count', array('conditions' => array('ReqResumeStatus.created_by' => $emp_id,
				'ReqResumeStatus.stage_title' => 'Offer', 'ReqResumeStatus.status_title !=' => array('Offer Pending','Rejected'), $cv_shortlist_date_cond,$cv_emp_cond,$client_cond),
				'group' => array('ReqResumeStatus.req_resume_id'), 'joins' => $client_options));
				// get candidates offered 						
				$candidate_offer_reject[] = $this->ReqResumeStatus->find('count', array('conditions' => array('ReqResumeStatus.created_by' => $emp_id,
				'ReqResumeStatus.stage_title' => 'Offer', 'ReqResumeStatus.status_title' => array('Rejected', 'Not Interested','Quit'), $cv_shortlist_date_cond,$cv_emp_cond,$client_cond),
				'group' => array('ReqResumeStatus.req_resume_id'), 'joins' => $client_options));
				// get candidates joined 						
				$candidate_join[] = $this->ReqResumeStatus->find('count', array('conditions' => array('ReqResumeStatus.created_by' => $emp_id,
				'ReqResumeStatus.stage_title' => 'Joining', 'ReqResumeStatus.status_title' => 'Joined', $cv_shortlist_date_cond,$cv_emp_cond,$client_cond),
				'group' => array('ReqResumeStatus.req_resume_id'), 'joins' => $client_options));
				// get billing amount 						
				$billing_data = $this->ReqResumeStatus->find('all', array('fields' => array('sum(ReqResume.bill_ctc) as bill_ctc'),'conditions' => array('ReqResumeStatus.created_by' => $emp_id,
				'ReqResumeStatus.stage_title' => 'Joining',  'ReqResumeStatus.status_title' => 'Joined', $cv_shortlist_date_cond,$cv_emp_cond,$client_cond),
				'joins' => $client_options));
				//echo '<pre>';print_r($billing_data);
				$billing_amt[] = $billing_data[0][0]['bill_ctc'];
				// get billing report 	
				$billing_report[] = $this->ReqResumeStatus->find('count', array('conditions' => array('ReqResumeStatus.created_by' => $emp_id,
				'ReqResume.bill_ctc >' => '0','ReqResumeStatus.status_title' => 'Joined', $cv_shortlist_date_cond,$client_cond,$cv_emp_cond),
				'group' => array('ReqResumeStatus.req_resume_id'), 'joins' => $client_options));
				// assign the employee
				$empData[] = $emp_name;
				$empId[] = $emp_id;
			//}

		}		
		// for export
		if($this->request->query['action'] == 'export'){			
			$this->Excel->generate_report('performance_report', $empData, $req_count,
			$cv_sent_count,$cv_shortlist_count,$cv_reject_count,$cv_waiting_count,$candidate_interview_count,
			$candidate_int_drop_count,$candidate_int_reject_count,$candidate_offer,$candidate_offer_reject,$candidate_join,
			$billing_amt,$billing_report,'Report', 'Performance');
		}
		// assign all the values
		$this->set('empData', $empData);
		$this->set('empId', $empId);
		$this->set('reqData', $req_count);
		$this->set('cvSentData', $cv_sent_count);
		$this->set('cvShortlistData', $cv_shortlist_count);
		$this->set('cvRejectData', $cv_reject_count);		
		$this->set('cvWaitingData', $cv_waiting_count);
		$this->set('interviewData', $candidate_interview_count);
		$this->set('intDropData', $candidate_int_drop_count);		
		$this->set('intRejectData', $candidate_int_reject_count);
		$this->set('candidateOffer', $candidate_offer);
		$this->set('offerReject', $candidate_offer_reject);		
		$this->set('candidateJoin', $candidate_join);
		$this->set('billingData', $billing_amt);
		$this->set('billingReport', $billing_report);		
		
		if(empty($empData)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Oops! No Reports Found!', 'default', array('class' => 'alert alert-info'));
		}
		
	}
	
	/* function to get the employee details */
	public function get_employee_details(){
		$this->loadModel('User');
		return $this->User->find('list',  array('fields' => array('id','first_name'), 'order' => array('first_name ASC'),'conditions' => array('status' => 0)));
	}
	
	/* function to get the location details */
	public function get_loc_details(){
		$this->loadModel('Location');
		return $this->Location->find('list',  array('fields' => array('id','location'), 'order' => array('location ASC'),'conditions' => array('status' => 1)));

	}
	
	/* function to get the ctc wise client opening */
	public function ctc_wise_client_opening(){
		
	}
	
	
	/* function to get the client wise CV status */
	public function client_wise_cv_status(){
		// set the page title
		$this->set('title_for_layout', 'Client Wise CV Status - Manage Hiring');	
		$this->set('empList', $this->get_employee_details());	
		$this->set('locList', $this->get_loc_details());
		$this->get_client_details();
		$this->get_role_details();
	}
	
	
	/* function to load the clients */
	public function get_client_details(){
		$this->loadModel('Client');
		$client_list = $this->Client->find('list', array('fields' => array('id','client_name'), 
		'order' => array('client_name ASC'),'conditions' => array('Client.is_deleted' => 'N', 'Client.status' => '0', 'Client.is_approve' => 'A',
		'Client.client_name !=' => '', 'Client.is_inactive' => 'N', ),	'group' => array('Client.id')));
		$this->set('clientList', $client_list);
	}
	
	
	/* function to load the clients */
	public function get_role_details(){
		$this->loadModel('Role');
		$role_data = $this->Role->find('list',  array('fields' => array('id','role_name'), 'order' => array('role_name ASC'),'conditions' => array('status' => '1')));
		$this->set('roleList', $role_data);
	}
	
	
	/* auto complete search */	
	public function search(){ 
		$this->layout = false;		
		$q = trim(Sanitize::escape($_GET['q']));
		$this->loadModel('Client');
		if(!empty($q)){
			// execute only when the search keywork has value		
			$this->set('keyword', $q);			
			$this->Client->unBindModel(array('belongsTo' => array('User','ResLocation')));
			$data = $this->Client->find('all', array('fields' => array('Client.client_name'),
			'group' => array('Client.client_name'), 'conditions' => 	array("OR" => array ('Client.client_name like' => '%'.$q.'%'), 
			'AND' => array('Client.is_deleted' => 'N'))));		
			$this->set('results', $data);
		}
    }
	
		// check the role permissions
	public function beforeFilter(){ 
		$this->check_session();
		$this->check_role_access(17);
	}
}