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

	public function index(){			
		// when the form is submitted for search
		if($this->request->is('post')){
			$url_vars = $this->Functions->create_url(array('keyword','from','to'),'Leave'); 					
			$this->redirect('/leave/'.$pending.'?srch_status=1&'.$url_vars);				
		}		
		// set the page title
		$this->set('title_for_layout', 'Leave - Manage Hiring');
		
		// set the approval status
		$fields = array('id','leave_from','leave_to','created_date', 'leave_type', 'session','reason_leave','is_approve','approve_date',
		'max(LeaveStatus.id) st_id','max(LeaveStatus.users_id) st_user');
				
		
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
		// for export
		if($this->request->query['action'] == 'export'){
			$data = $this->Leave->find('all', array('fields' => $fields,'conditions' => 
			array($keyCond,$dateCond, 'users_id' => $this->Session->read('USER.Login.id'),	'Leave.is_deleted' => 'N'), 
			'order' => array('created_date' => 'desc'), 'group' => array('Leave.id'), 'joins' => $options));
			$this->Excel->generate('tasks', $data, $data, 'Report', 'Leave');
		}
		
		$this->paginate = array('fields' => $fields,'limit' => '25','conditions' => array($keyCond,$dateCond, 'Leave.users_id' => $this->Session->read('USER.Login.id'),
		'Leave.is_deleted' => 'N'), 'order' => array('Leave.created_date' => 'desc'),	'group' => array('Leave.id'), 'joins' => $options);
		$data = $this->paginate('Leave');
		$this->set('data', $data);
		if(empty($data) && !empty($this->request->data)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Oops! No Leaves Found!', 'default', array('class' => 'alert alert-info'));
		}		
	}
	
	/* function to get the clients */
	public function get_client_list(){
		$this->loadModel('Client');		
		$options = array(			
				array('table' => 'requirements',
						'alias' => 'Position',					
						'type' => 'LEFT',
						'conditions' => array('`Position`.`clients_id` = `Client`.`id`',
						'Position.status' => 'A')
				),				
				array('table' => 'req_resume',
						'alias' => 'ReqResume',					
						'type' => 'LEFT',
						'conditions' => array('`ReqResume`.`requirements_id` = `Position`.`id`')
				),				
				array('table' => 'client_account_holder',
						'alias' => 'AH',					
						'type' => 'LEFT',
						'conditions' => array('`AH`.`clients_id` = `Client`.`id`')
				),
				array('table' => 'req_team',
						'alias' => 'ReqTeam',					
						'type' => 'LEFT',
						'conditions' => array('`ReqTeam`.`requirements_id` = `Position`.`id`',
						'ReqTeam.is_approve' => 'A')
				)
			);
		
		$list[] =  $this->Session->read('USER.Login.id');
		$result = $this->Client->get_team($this->Session->read('USER.Login.id'),'1');

		if(!empty($result)){
			foreach($result as $rec){
				$list[] =  $rec['u']['id'];
			}			
		}	
		
		$teamCond = array('OR' => array(
					'ReqResume.created_by' =>  $list,
					'ReqTeam.users_id' => $list,
					'AH.users_id' => $list,
					'Client.created_by' => $list
				)
			);
		
		// set the page title
		$fields = array('id','client_name');
		$data = $this->Client->find('all', array('fields' => $fields,'conditions' => 
		array('Client.is_approve' => 'A', 'Client.status' => '0', 'Client.is_deleted' => 'N',$teamCond ),'order' => array('Client.created_date' => 'desc'), 
		'group' => array('Client.id'), 'joins' => $options));
		$format_list = $this->Functions->format_dropdown($data, 'Client','id','client_name');
		$this->set('clientList', $format_list);
	}
	
	
	/* function to add the task plan */
	public function add(){
		// set the page title		
		$this->check_role_access(45);
		$this->set('title_for_layout', 'Create Leave - Leave - Manage Hiring');	
		$this->set('session', array('F' => 'Forenoon','A' => 'Afternoon', 'D' => 'Full Day'));
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
			$fields = array('id','leave_from','leave_to','created_date','leave_type','reason_leave','session','Creator.first_name','Creator.last_name');
			$data = $this->Leave->find('all', array('fields' => $fields,'conditions' => array('Leave.id' => $id),	'joins' => $options));
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
	
	/* function to get avg ctc of the position */
	public function get_avg_ctc($id){
		$data = $this->Leave->Position->findById($id, array('fields' => 'ctc_from','ctc_to','ctc_from_type','ctc_to_type'));
		$from_ctc = $data['Position']['ctc_from_type'] == 'T' ? round($data['Position']['ctc_from']/100, 1) : $data['Position']['ctc_from'];
		$to_ctc = $data['Position']['ctc_to_type'] == 'T' ? round($data['Position']['ctc_to']/100, 1) :  $data['Position']['ctc_to'];
		return round(($from_ctc+$to_ctc)/2, 1);
	}
	
	/* function to edit the position */
	public function edit($id){
		// set the page title		
		$this->set('title_for_layout', 'Edit Leave - Leave - Manage Hiring');	
		if(!empty($id) && intval($id)){
			// authorize user before action
			$ret_value = $this->auth_action($id);
			if($ret_value == 'pass'){
				$this->set('session', array('F' => 'Forenoon','A' => 'Afternoon', 'D' => 'Full Day'));
				// get the client list
				$this->get_client_list();				
				// When the form submitted
				if (!empty($this->request->data)){
					// validates the form
					$this->request->data['Leave']['users_id'] = $this->Session->read('USER.Login.id');
					$this->request->data['Leave']['modified_date'] = $this->Functions->get_current_date();
					$this->Leave->set($this->request->data);
					// validate the form fields
					if ($this->Leave->validates(array('fieldList' => array('clients_id','requirements_id','session','task_date')))){
						// format the dates
						$this->request->data['Leave']['task_date'] = $this->Functions->format_date_save($this->request->data['Leave']['task_date']);
						// save the data
						$this->Leave->id = $id;
						if($this->Leave->save($this->request->data['Leave'], array('validate' => false))){
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Leave Modified Successfully', 'default', array('class' => 'alert alert-success'));					
							$this->redirect('/leave/');
						}else{
								// show the error msg.
								$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));					
							}		
					}else{
						// retain the position 
						
						$this->load_position($this->request->data['Leave']['clients_id']);
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Please check the validation errors...', 'default', array('class' => 'alert alert-error'));					
					}
				}else{				
						$options = array(		
							array('table' => 'clients',
									'alias' => 'Client',					
									'type' => 'LEFT',
									'conditions' => array('`Client`.`id` = `Position`.`clients_id`')
							)
						);
						// get the position details
						$data = $this->Leave->find('all', array('fields' => array('Position.id','task_date','requirements_id','session','Client.id','Leave.id'), 
						'conditions' => array('Leave.id' => $id), 'joins' => $options));
						$this->request->data = $data[0];	
						$this->request->data['Leave']['clients_id'] = 	$data[0]['Client']['id'];					
						// retain the position
						$this->load_position($data[0]['Client']['id']);	
						// check edit option is validate
						$this->check_valid_edit($this->request->data['Leave']['task_date']);						
						$this->request->data['Leave']['task_date'] = $this->Functions->format_date_show($this->request->data['Leave']['task_date']);
						
						
					}
				}else if($ret_value == 'fail'){ 
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
					$this->redirect('/position/');	
				}else{
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Record Deleted: '.$ret_value , 'default', array('class' => 'alert alert-error'));	
					$this->redirect('/position/');	
				}
			}else{
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));		
				$this->redirect('/leave/');	
			}				
	}
	
	/* function to check valid edit */
	public function check_valid_edit($date){
		 if(strtotime(date('Y-m-d')) > strtotime($date)){
				$this->redirect('/leave/');
		 }
	}
	
	/* function to auth record */
	public function auth_action($id, $st_id){ 				
		$data = $this->Leave->find('all', array('fields' => array('Leave.users_id','Leave.is_deleted'),'conditions' => array('Leave.id' => $id)));
		if($data[0]['Leave']['users_id'] == $this->Session->read('USER.Login.id')){
			return 'pass';
		}else if($data[0]['Leave']['is_deleted'] == 'Y'){
			return 'fail';
		}else{
			return 'fail';
		}
	}
		
		
	/* function to load the districts options */
	public function get_position(){
		$this->layout = 'ajax';
		$this->load_position($this->request->query['id']);
		$this->render(false);
		die;
	}	
	
	/* function to load the positions */
	public function load_position($id){
		// get the team members
		$result = $this->Leave->Position->get_team($this->Session->read('USER.Login.id'),'1');
		$data[] =  $this->Session->read('USER.Login.id');
		
		if(!empty($result)){
			// for drop down listing
			foreach($result as $rec){
				$data[] =  $rec['u']['id'];
			}			
		}
		
		$teamCond = array('OR' => array(
					'ReqResume.created_by' =>  $data,
					'ReqTeam.users_id' => $data,
					'AH.users_id' => $data,
					'Position.created_by' => $data						
				)
		);
				
		$options = array(		
			array('table' => 'req_team',
					'alias' => 'ReqTeam',					
					'type' => 'LEFT',
					'conditions' => array('`ReqTeam`.`requirements_id` = `Position`.`id`', 'ReqTeam.is_approve' => 'A')
			),			
			array('table' => 'client_account_holder',
					'alias' => 'AH',					
					'type' => 'LEFT',					
					'conditions' => array('`AH`.`clients_id` = `Client`.`id`')
			)
		);
		$pos_list = $this->Leave->Position->find('all', array('fields' => array('id','job_title'),
		'order' => array('job_title ASC'),'conditions' => array($teamCond, 'Position.status' => 'A', 'Position.is_deleted' => 'N',
		'Position.clients_id' => $id), 'group' => array('Position.id'), 'joins' => $options));
		// for retaining
		$format_list = $this->Functions->format_dropdown($pos_list, 'Position','id','job_title');
		$this->set('posList', $format_list);
		// call when it called from ajax 
		if(!isset($this->request->data['Leave']['task_date'])){
			$select .= "<option value=''>Choose Position</option>";
			foreach($pos_list as $record){ 
				$select .= "<option value='".$record['Position']['id']."'>".ucwords($record['Position']['job_title'])."</option>";
			}
			echo $select;
		}
	}
	
	
	
	
	/* auto complete search */	
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
	
	// check the role permissions
	public function beforeFilter(){ 
		$this->check_session();
		$this->check_role_access(47);
		
	}
}