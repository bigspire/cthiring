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

	public function index(){			
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
		$last_updated = date('Y-m-d', strtotime('-7 days'));	
		$date_cond = array('OR' => array(
					array('Notification.modified_date <=' =>  $last_updated, 'Notification.modified_date' => NULL),
					array('Notification.modified_date <=' =>  $last_updated)					
				)
			);				
		$this->paginate = array('fields' => $fields,'limit' => '100','conditions' => array($date_cond, 'Notification.created_by' => $this->Session->read('USER.Login.id'),
		'Notification.is_deleted' => 'N', 'Notification.status' => 'A'), 'order' => array('Notification.created_date' => 'desc'),	'group' => array('Notification.id'), 'joins' => $options);
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
		$last_updated = date('Y-m-d', strtotime('-7 days'));	
		$date_cond = array('OR' => array(
					array('ReqResume.created_date <=' =>  $last_updated, 'ReqResume.modified_date' => NULL),
					array('ReqResume.modified_date <=' =>  $last_updated),
				)
			);				
		$this->paginate = array('fields' => $fields,'limit' => '100','conditions' => array($date_cond, 'AH.users_id' => $this->Session->read('USER.Login.id'),
		'Resume.is_deleted' => 'N', 'ReqResume.bill_ctc' => NULL), 'order' => array('Resume.created_date' => 'desc'),
		'group' => array('Resume.id'), 'joins' => $options2);
		$data2 = $this->paginate('Resume');
		$this->set('data2', $data2);
		
		// show the alert message
		if(!empty($data) || !empty($data2)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Oops! You need to resolve the issues now.', 'default', array('class' => 'alert alert-error'));
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
						// if successfully update
						// if successfully update
						$this->set('form_status', 1);
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Status Updated Successfully', 'default', array('class' => 'alert alert-success'));									
					}
				}
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
					'reason_not_billable' => $this->request->data['Resume']['reason_not_billable'],
					'remark_not_billable' => $this->request->data['Resume']['remark_not_billable'],
					'modified_by' => $this->Session->read('USER.Login.id'));
					// save  req resume
					if($this->Resume->save($data, array('validate' => false))){	
						$this->loadModel('ReqResume');
						// save req resume table
						$data = array('id' => $req_res_id, 'modified_date' => $this->Functions->get_current_date(),'modified_by' => $this->Session->read('USER.Login.id'));
						// save  req resume
						if($this->ReqResume->save($data, array('validate' => false))){
							$this->set('form_status', 1);
							// if successfully update
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Status Updated Successfully', 'default', array('class' => 'alert alert-success'));									
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