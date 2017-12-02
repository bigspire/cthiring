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
  
class LeaveController extends AppController {  
	
	public $name = 'Leave';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions', 'Excel');

	public function index($rec_status){			
		// when the form is submitted for search
		if($this->request->is('post')){
			$url_vars = $this->Functions->create_url(array('keyword','from','to','apr_status'),'Leave'); 
			if($rec_status == 'pending'){
				$pending = 'index/pending/';
			}
			$this->redirect('/leave/'.$pending.'?srch_status=1&'.$url_vars);				
		}		
		// set the page title
		$this->set('title_for_layout', 'Leave - Manage Hiring');
		
		// set the approval status
		$fields = array('id','leave_from','leave_to','created_date', 'leave_type', 'session','reason_leave','is_approve','approve_date',
		'max(LeaveStatus.id) st_id','max(LeaveStatus.users_id) st_user','Creator.first_name','Creator.last_name');
				
		$this->set('approveStatus', array('W' => 'Awaiting Approval', 'R' => 'Rejected', 'C' => 'Cancelled', 'A' => 'Approved'));

		// set keyword condition
		if($this->params->query['keyword'] != ''){
			$keyCond = array("MATCH (reason_leave) AGAINST ('".$this->Functions->format_search_keyword($this->params->query['keyword'])."' IN BOOLEAN MODE)"); 
		}
		// for date search
		if($this->params->query['from'] != '' || $this->params->query['to'] != ''){
			$from = $this->Functions->format_date_save($this->params->query['from']);
			$to = $this->Functions->format_date_save($this->params->query['to']);
			
			$dateCond = array('or' => array('leave_from between ? and ?' => array($from, $to),'leave_to between ? and ?' => array($from, $to))); 
		}	
		
		// for approval status condition
		$apr_status = $this->request->query['apr_status'] != '' ? $this->request->query['apr_status'] : 'W';
		
		if($this->request->query['apr_status'] != ''){
			$approveCond = array('LeaveStatus.status' => $apr_status,
			'LeaveStatus.users_id' => $this->Session->read('USER.Login.id'));
		}
			
		// show awaiting approval condition
		if($this->request->params['pass'][0] =='pending'){
			$userCond = array('LeaveStatus.users_id' => $this->Session->read('USER.Login.id'), 'LeaveStatus.status' => $apr_status);
		}else{
			$userCond = array('Leave.users_id' => $this->Session->read('USER.Login.id'));
		}
		
		// for export
		if($this->request->query['action'] == 'export'){
			$data = $this->Leave->find('all', array('fields' => $fields,'conditions' => 
			array($keyCond,$dateCond,$approveCond, $userCond, 'Leave.is_deleted' => 'N'), 
			'order' => array('Leave.created_date' => 'desc'), 'group' => array('Leave.id'), 'joins' => $options));
			$this->Excel->generate('leave', $data, $data, 'Report', 'Leave');
		}
		
				
		$this->paginate = array('fields' => $fields,'limit' => '25','conditions' => array($keyCond,$dateCond,$userCond, 
		'Leave.is_deleted' => 'N'), 'order' => array('Leave.created_date' => 'desc'),	'group' => array('Leave.id'), 'joins' => $options);
		$data = $this->paginate('Leave');
		$this->set('data', $data);
		if(empty($data) && !empty($this->request->data)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Oops! No Leaves Found!', 'default', array('class' => 'alert alert-info'));
		}		
	}
	
	
	
	
	/* function to add the task plan */
	public function add(){
		// set the page title		
		$this->check_role_access(45);
		$this->set('title_for_layout', 'Create Leave - Leave - Manage Hiring');	
		$this->set('session', array('D' => 'Full Day', 'F' => 'Forenoon','A' => 'Afternoon'));
		// get the client list
		$this->set('typeList', array('NBL' => 'Need Based Leave', 'PL' => 'Privileged Leave','OD' => 'On Duty','LOP' => 'Loss of Pay', 'ML' => 'Maternity Leave',
		'PA' => 'Paternity Leave'));		
		// When the form submitted
		if ($this->request->is('post')){
			// validates the form
			$this->request->data['Leave']['users_id'] = $this->Session->read('USER.Login.id');
		    $this->request->data['Leave']['created_date'] = $this->Functions->get_current_date();
			$this->Leave->set($this->request->data);
			// validate the form fields
			if ($this->Leave->validates(array('fieldList' => array('leave_to','session','leave_type','reason_leave')))){
				// format the dates
				$this->request->data['Leave']['leave_from'] = $this->Functions->format_date_save($this->request->data['Leave']['leave_from']);
				$this->request->data['Leave']['leave_to'] = $this->Functions->format_date_save($this->request->data['Leave']['leave_to']);
				// save the data
				if($this->Leave->save($this->request->data['Leave'], array('validate' => false))){
					// get the superiors
					$this->loadModel('Approve');
					$approval_data = $this->Approve->find('first', array('fields' => array('level1'), 'conditions'=> array('Approve.users_id' => $this->Session->read('USER.Login.id'))));				
					// get leader email address
					$leader_data = $this->Leave->Creator->find('all', array('conditions' => array('Creator.id' => $approval_data['Approve']['level1']),
					'fields' => array('Creator.id',	'Creator.first_name','Creator.last_name','Creator.email_id')));						
						// if leader found
						if(!empty($leader_data)){
							$this->loadModel('LeaveStatus');
							// make sure not duplicate status exists
							$this->check_duplicate_status($this->Leave->id, $approval_data['Approve']['level1']);			
							// save req. status data
							$data = array('user_leave_id' => $this->Leave->id, 'created_date' => $this->Functions->get_current_date(), 'users_id' => $approval_data['Approve']['level1'], 'status' => 'W');
							if($this->LeaveStatus->save($data, true, $fieldList = array('user_leave_id','created_date','users_id','status'))){						
								// send mail to approver
								$sub = 'Manage Hiring - Leave created by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
								$from = ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
								
								$vars = array('from_name' => $from, 'to_name' => ucwords($leader_data[0]['Creator']['first_name'].' '.$leader_data[0]['Creator']['last_name']), 'leave_from' => $this->request->data['Leave']['leave_from'],'leave_to' => $this->request->data['Leave']['leave_to'],  'reason' => $this->request->data['Leave']['reason_leave'],
								'leave_type' => $this->request->data['Leave']['leave_type']);
														
								// notify superiors						
								if(!$this->send_email($sub, 'add_leave', 'noreply@managehiring.com', $leader_data[0]['Creator']['email_id'],$vars)){	
									// show the msg.								
									$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail for approval...', 'default', array('class' => 'alert alert-error'));				
								}else{
									$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Leave Created Successfully. Your request is sent for approval', 'default', array('class' => 'alert alert-info'));				
								}								
								$this->redirect('/leave/');	
							}
						}else{
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>You have no superior to approve your request. Please contact administrator', 'default', array('class' => 'alert alert-info'));
						}				
					}else{
						// show the error msg.
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));					
					}					
				}				
				else{
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Please check the validation errors...', 'default', array('class' => 'alert alert-error'));					
				}
			}
		}
		
	/* function to view the position */
	public function view($id, $st_id){
		// set the page title
		$view_title = $this->Functions->get_view_type($this->request->params['pass'][2]);
		$this->set('title_for_layout', $view_title.' Leave - Manage Hiring');	
		$ret_value = $this->auth_action($id, $st_id);	
		if($ret_value == 'pass'){			
			$fields = array('id','leave_from','leave_to','created_date','leave_type','reason_leave','session','Creator.first_name','Creator.last_name',
			'Leave.is_approve','Leave.users_id', 'LeaveStatus.remarks');
			$data = $this->Leave->find('all', array('fields' => $fields,'conditions' => array('Leave.id' => $id), 'order' => array('LeaveStatus.id' => 'desc'),
			'joins' => $options));
			$this->set('leave_data', $data[0]);
		}else if($ret_value == 'fail'){ 
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
			$this->redirect('/leave/');	
		}
		
	}
	
	
		/* function to check for duplicate entry */
	public function check_duplicate_status($id, $app_user_id,  $exist){
		$count = $this->LeaveStatus->find('count',  array('conditions' => array('LeaveStatus.user_leave_id' => $id,
		'LeaveStatus.users_id' => $app_user_id, 'LeaveStatus.status' => 'W')));
		$limit = $exist ? $exist : 0;
		if($count > $limit){
			$this->invalid_attempt();
		}	
	}
	
	
	
	
	/* function to auth record */
	public function auth_action($id, $st_id){ 				
		$data = $this->Leave->find('all', array('fields' => array('Leave.users_id','Leave.is_deleted', 'max(LeaveStatus.users_id) user_id'),'conditions' => array('Leave.id' => $id)));
		if($data[0]['Leave']['users_id'] == $this->Session->read('USER.Login.id')){
			return 'pass';
		}else if($data[0][0]['user_id'] == $this->Session->read('USER.Login.id')){
			return 'pass';
		}else if($data[0]['Leave']['is_deleted'] == 'Y'){
			return 'fail';
		}else{
			return 'fail';
		}
	}
		
		
	
	
	
	/* auto complete search 
	public function search(){
		$this->layout = false;		
		$q = trim(Sanitize::escape($_GET['q']));	
		if(!empty($q)){
			// execute only when the search keywork has value		
			$this->set('keyword', $q);			
			$data = $this->Leave->Position->find('all', array('fields' => array('Client.client_name','Position.job_title'),
			'group' => array('Client.client_name','Position.job_title'), 'conditions' => 	array("OR" => array ('Client.client_name like' => '%'.$q.'%',
			'job_title like' => '%'.$q.'%'), 'AND' => array('Position.is_deleted' => 'N','Client.is_deleted' => 'N',
			'Client.is_approve' => 'A', 'Position.status' => 'A'))));		
			$this->set('results', $data);
		}
    }
	*/	
	
	
		/* function to delete the plan */
	public function delete($id){
		if(!empty($this->request->data)){
			if(!empty($id) && intval($id)){
				// authorize user before action
				$ret_value = $this->auth_action($id);
				if($ret_value == 'pass'){				
					$this->Leave->id = $id;
					$this->Leave->saveField('is_deleted', 'Y'); 
					$this->Leave->saveField('modified_date', $this->Functions->get_current_date()); 
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Leave deleted successfully', 'default', array('class' => 'alert alert-success'));					
				}else if($ret_value == 'fail'){
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
					$this->redirect('/hrbranch/');
				}else{
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Record Deleted: '.$ret_value , 'default', array('class' => 'alert alert-error'));	
					$this->redirect('/hrbranch/');
				}
			}else{
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));			
			}
		}
		$this->redirect('/leave/');

	}
	
	/* function to approve / reject / cancel leave */
	public function remark($id, $st_id, $user_id, $status){
		$this->layout = 'framebox';		
		if(!empty($this->request->data)){		
		
			$approve_msg = $status == 'R' ? 'Rejected': ($status == 'C' ? 'Cancelled' :  'Approved');	

			if($this->request->is('post') && $st_id != ''){
				// set the validation
				$this->Leave->set($this->request->data);
				if($status == 'R' || $status == 'C'){
					$validate = $this->Leave->validates(array('fieldList' => array('remarks')));
				}else{
					$validate = true;
				}
				// update the todo
				if($validate){
					$this->loadModel('LeaveStatus');
					$data = array('modified_date' => $this->Functions->get_current_date(), 'modified_by' => $this->Session->read('USER.Login.id'), 'remarks' => $this->request->data['Leave']['remarks'], 'status' => $status);
					$this->LeaveStatus->id = $st_id;
					$st_msg = $status == 'A' ? 'approved' : ($status == 'C' ? 'cancelled' : 'rejected');
					// make sure not duplicate status exists
					$this->check_duplicate_status($id, $this->Session->read('USER.Login.id'), 1);
					// save the position status
					if($this->LeaveStatus->save($data, true, $fieldList = array('modified_by','modified_date','remarks','status'))){
						
						$sub = 'Manage Hiring - Leave '.$approve_msg.' by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
						
						$from = ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
						// get the creator data
						$creator_data = $this->Leave->find('all', array('conditions' => array('Leave.id' => $id), 'fields' => array('Leave.leave_from', 'Leave.leave_to',
						'Leave.reason_leave', 'Leave.leave_type','Leave.session','Creator.first_name', 'Creator.last_name', 'Creator.email_id')));
						// get L1 for notification if cancelled
						if($status == 'C'){
							$leader_data = $this->Leave->Creator->find('all', array('conditions' => array('Creator.id' => $user_id), 'fields' => array('Creator.first_name', 'Creator.last_name', 'Creator.email_id')));
							$to_name = $leader_data[0]['Creator']['first_name'].' '.$leader_data[0]['Creator']['last_name'];
							$to_email = $leader_data[0]['Creator']['email_id'];
						}else{
							$to_name = $creator_data[0]['Creator']['first_name'].' '.$creator_data[0]['Creator']['last_name'];
							$to_email = $creator_data[0]['Creator']['email_id'];
						}
						
						$vars = array('to_name' =>  ucwords($to_name), 'from_name' => $from, 
							'leave_from' => $leader_data[0]['Leave']['leave_from'],'leave_to' => $leader_data[0]['Leave']['leave_to'], 
							'reason' => $leader_data[0]['Leave']['reason_leave'],	'leave_type' => $leader_data[0]['Leave']['leave_type'],						
							'approve_msg' => $approve_msg, 'remarks' => $this->request->data['Leave']['remarks']);
						$this->set('action_status', $approve_msg);
						// notify employee						
						if(!$this->send_email('Manage Hiring - Leave '.$st_msg.' by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name')), 'approve_leave', 'noreply@managehiring.com', $to_email,$vars)){		
							// show the msg.								
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail to user...', 'default', array('class' => 'alert alert-error'));				
						}else{
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Leave '.$approve_msg.' Successfully.', 'default', array('class' => 'alert alert-success'));
						}			
						// update the client
						$this->Leave->id = $id;
						$this->Leave->saveField('is_approve', $status);
						
						$this->set('form_status', '1');		
					}else{
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data.', 'default', array('class' => 'alert alert-error'));	
					}
					
				}
			}
		}
	}
	
	
	// check the role permissions
	public function beforeFilter(){
		$mod_id = ($this->request->params['pass'][0] == 'pending' || $this->request->params['pass'][3] == 'pending' 
					|| $this->request->params['pass'][4] == 'pending')	? '46' : '47';
		$this->check_session();
		$this->check_role_access($mod_id);
		
	}
}