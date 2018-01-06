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
  
class NotificationController extends AppController {  
	
	public $name = 'Notification';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions');

	public function index($req_id){			
		// set the page title
		$this->set('title_for_layout', 'Notifications - Manage Hiring');
		
		// for position notifications
		$fields = array('Notification.id','Notification.created_date', 'Client.client_name', 'Notification.created_date','Notification.modified_date','Notification.job_title',
		'ReqStatus.title','job_code');				
		$options = array(			
			/*
			array('table' => 'clients',
					'alias' => 'Client',					
					'type' => 'LEFT',
					'conditions' => array('`Client.id` = `Notification`.`clients_id`')
			)
			*/
		);		
		$last_updated = date('Y-m-d', strtotime('-60 days'));	
		$date_cond = array('OR' => array(
					array('Notification.modified_date <=' =>  $last_updated, 'Notification.modified_date' => NULL),
					array('Notification.modified_date <=' =>  $last_updated)					
				)
			);				
		$this->paginate = array('fields' => $fields,'limit' => '100','conditions' => array($date_cond, 'Notification.created_by' => $this->Session->read('USER.Login.id'),
		'Notification.is_deleted' => 'N', 'Notification.status' => 'A','Notification.req_status_id' => array('0','1')), 'order' => array('Notification.created_date' => 'desc'),	'group' => array('Notification.id'), 'joins' => $options);
		$data = $this->paginate('Notification');
		$this->set('data', $data);
		

		// for resume notifications
		$this->loadModel('Resume');
		$fields = array('Resume.id','Resume.created_date', 'Client.client_name', 'Resume.created_date','Resume.modified_date','Position.job_title',
		'ReqResume.status_title','ReqResume.stage_title','Creator.first_name','Creator.last_name',
		'Resume.first_name','Resume.last_name','ReqResume.modified_date','ReqResume.created_date','ReqResume.id','Resume.code');				
		$options2 = array(			
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
				array('table' => 'client_account_holder',
						'alias' => 'AH',					
						'type' => 'LEFT',
						'conditions' => array('`AH`.`clients_id` = `Client`.`id`')
				)
			
			);	
		$status_list = array('Pending','Validated','CV-Sent','Shortlisted','Scheduled','Re-Scheduled','Offer Pending','Selected',
		'Offer Accepted','Joined','Deferred');
		$last_updated = date('Y-m-d', strtotime('-60 days'));	
		$date_cond = array('OR' => array(
					array('ReqResume.created_date <=' =>  $last_updated, 'ReqResume.modified_date' => NULL),
					array('ReqResume.modified_date <=' =>  $last_updated),
				)
			);	
		
		if(!empty($req_id)){
			$req_cond = array('Position.id' => $req_id);
		}
		
		$this->paginate = array('fields' => $fields,'limit' => '100','conditions' => array($date_cond, 'AH.users_id' => $this->Session->read('USER.Login.id'), 'Resume.is_deleted' => 'N', 'ReqResume.bill_ctc' => NULL, 'ReqResume.status_title' => $status_list, $req_cond), 'order' => array('Resume.created_date' => 'desc'),'group' => array('Resume.id'), 'joins' => $options2);
		$data2 = $this->paginate('Resume');
		
		if(!empty($req_id)){
			return count($data2);
		}
		
		$this->set('data2', $data2);
		
		// show the alert message
		if(!empty($data) || !empty($data2)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Oops! You need to resolve the issues now to view the positions.', 'default', array('class' => 'alert alert-error'));
		}else{
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Great. It Sounds Good! You have no positions or resumes to update the status', 'default', array('class' => 'alert alert-success'));
			$this->Session->write('USER.Login.notification', 'Done');
		}		
	}
	
	
	/* function to update the req. status */
	public function update_status($id,$status){	
		// for billable
		if($status == 'billable'){
			$this->Notification->id = $id;
			// save req resume table
			$data = array('modified_date' => $this->Functions->get_current_date(),'modified_by' => $this->Session->read('USER.Login.id'));
				// save  req resume
				if($this->Notification->save($data, array('validate' => false))){										
					// if successfully update
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Status Updated Successfully', 'default', array('class' => 'alert alert-success'));									
					$this->redirect('/notification/');
				}
		}else if($status == 'not_billable'){
			$this->layout = 'framebox';	
			// check it has not billable resumes
			$count = $this->index($id);
			// process only if no resumes are there				
			if(empty($count)){				
				// get rejection status drop down
				$this->get_reject_drop('Position Not Billable');
				// when the form submitted
				if(!empty($this->request->data)){				
					$this->Notification->set($this->request->data);
					if($this->Notification->validates(array('fieldList' => array('reason_not_billable','remark_not_billable')))){
						$this->Notification->id = $id;
						// save req resume table
						$data = array('modified_date' => $this->Functions->get_current_date(),
						'reason_not_billable' => $this->request->data['Notification']['reason_not_billable'],
						'remark_not_billable' => $this->request->data['Notification']['remark_not_billable'],
						'modified_by' => $this->Session->read('USER.Login.id'), 'req_status_id' => '9');
						// save  req resume
						if($this->Notification->save($data, array('validate' => false))){
							// send mail to recruiters
							$options = array(			
								array('table' => 'reason',
										'alias' => 'Reason2',					
										'type' => 'LEFT',
										'conditions' => array('`Reason2.id` = `Notification`.`reason_not_billable`')
								)
							);
							// get the position details
							$position_data = $this->Notification->find('all', array('conditions' => array('Notification.id' => $id),
							'fields' => array( 'Client.client_name','Notification.job_title','Notification.location','Reason2.reason'),
							'joins' => $options));
							// get the recruiters
							$this->loadModel('ReqTeam');
							$options = array(			
								array('table' => 'users',
										'alias' => 'Creator',					
										'type' => 'LEFT',
										'conditions' => array('`Creator.id` = `ReqTeam`.`users_id`')
								)
							);
							$user_data = $this->ReqTeam->find('all', array('conditions' => array('ReqTeam.requirements_id' => $id,
							'ReqTeam.is_approve' => 'A'),'fields' => array('Creator.first_name','Creator.last_name','Creator.email_id'),
							'joins' => $options));						
							// send mail to account holder and recruiters
							foreach($user_data as $user){						
								$from = ucfirst($user['Creator']['first_name']).' '.ucfirst($user['Creator']['last_name']);									
								$vars = array('to_name' => $from, 'from_name' => ucwords($this->Session->read('USER.Login.first_name').' '.$this->Session->read('USER.Login.last_name')), 
								'position' => $position_data[0]['Notification']['job_title'],'client_name' => $position_data[0]['Client']['client_name'], 
								'location' => $position_data[0]['Notification']['location'], 
								'remarks' => $this->request->data['Notification']['remark_not_billable'],
								'reason' => $position_data[0]['Reason2']['reason']);					
								// notify employee						
								if(!$this->send_email('Manage Hiring - Position status changed to Not Billable by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name')),
								'position_status', 'noreply@managehiring.com', $user['Creator']['email_id'],$vars)){		
									// show the msg.								
									$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail to user...', 'default', array('class' => 'alert alert-error'));				
								}else{
									$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Position '.$approve_msg.' Successfully.', 'default', array('class' => 'alert alert-success'));
								}
							}
							// if successfully update
							$this->set('form_status', 1);
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Status Updated Successfully', 'default', array('class' => 'alert alert-success'));									
						}
					}
				}
			}else{
				$this->set('redirect_popup', 1);
				$this->Session->setFlash('Oops! You need to resolve all the resumes status for the position before updating the position status', 'default', array('class' => 'alert alert-error'));
			}
			
		}
	}
	
	
	/* function to update the resume status */
	public function update_resume_status($req_res_id, $res_id,$status){	
		// for billable
		if($status == 'billable'){
			$this->loadModel('ReqResume');
			// save req resume table			
			$data = array('id' => $req_res_id, 'modified_date' => $this->Functions->get_current_date(),'modified_by' => $this->Session->read('USER.Login.id'));
			// save  req resume
			if($this->ReqResume->save($data, array('validate' => false))){ 									
				// if successfully update
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Status Updated Successfully', 'default', array('class' => 'alert alert-success'));									
				$this->redirect('/notification/');
			}
		}else if($status == 'not_billable'){
			$this->layout = 'framebox';		
			// get rejection status drop down
			$this->get_reject_drop('Resume Not Billable');
			$this->loadModel('Resume');
			// when the form submitted
			if(!empty($this->request->data)){				
				$this->Notification->set($this->request->data);
				if($this->Notification->validates(array('fieldList' => array('reason_not_billable')))){
					// save req resume table
					$data = array('id' => $res_id, 'modified_date' => $this->Functions->get_current_date(),
					'reason_not_billable' => $this->request->data['Notification']['reason_not_billable'],
					'remark_not_billable' => $this->request->data['Notification']['remark_not_billable'],
					'modified_by' => $this->Session->read('USER.Login.id'));
					// save  req resume
					if($this->Resume->save($data, array('validate' => false))){	
						$this->loadModel('ReqResume');
						// save req resume table
						$data = array('id' => $req_res_id, 'modified_date' => $this->Functions->get_current_date(),'modified_by' => $this->Session->read('USER.Login.id'), 'stage_title' => 'In-Active', 'status_title' => 'Not-Billable');
						// save  req resume
						if($this->ReqResume->save($data, array('validate' => false))){
							// save req resume status
							$this->loadModel('ReqResumeStatus');
							$data = array('req_resume_id' => $req_res_id, 'created_date' => $this->Functions->get_current_date(),	'created_by' => $this->Session->read('USER.Login.id'), 'reason_id' => $this->request->data['Notification']['reason_not_billable'], 'stage_title' => 'In-Active', 'status_title' => 'Not Billable', 'note' => $this->request->data['Notification']['remark_not_billable']);
							if($this->ReqResumeStatus->save($data, array('validate' => false))){
								$this->set('form_status', 1);
								// if successfully update
								$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Status Updated Successfully', 'default', array('class' => 'alert alert-success'));	
							}
						}
					}
				}
			}
		}
	}
	
	
	/* function to get the reject reason */
	public function get_reject_drop($action){		
		$this->loadModel('Reason');
		$reason_list = $this->Reason->find('list', array('fields' => array('id','reason'), 
		'order' => array('reason ASC'),'conditions' => array('status' => '1', 'type' => $action)));
		$this->set('rejectList', $reason_list);
	}
	
	// check the role permissions
	public function beforeFilter(){ 
		$this->check_session();
		$this->check_role_access(5);
		
	}
}