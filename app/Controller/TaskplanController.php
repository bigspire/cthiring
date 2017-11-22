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
  
class TaskplanController extends AppController {  
	
	public $name = 'TaskPlan';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions', 'Excel');

	public function index(){			
		// when the form is submitted for search
		if($this->request->is('post')){
			$url_vars = $this->Functions->create_url(array('keyword','from','to'),'TaskPlan'); 					
			$this->redirect('/taskplan/'.$pending.'?srch_status=1&'.$url_vars);				
		}		
		// set the page title
		$this->set('title_for_layout', 'Task Plan - Manage Hiring');
		
		// set the approval status
		$fields = array('id','ctc','session','created_date', 'task_date', 'Client.client_name', 'Creator.first_name','created_date','modified_date','Position.job_title');
				
		$options = array(			
			array('table' => 'clients',
					'alias' => 'Client',					
					'type' => 'LEFT',
					'conditions' => array('`Client.id` = `Position`.`clients_id`')
			)
		);
		// set keyword condition
		if($this->params->query['keyword'] != ''){
			$keyCond = array("MATCH (Client.client_name,Position.job_title) AGAINST ('".$this->Functions->format_search_keyword($this->params->query['keyword'])."' IN BOOLEAN MODE)"); 
		}
		// check date is selected
		if($this->request->query['from'] != '' || $this->request->query['to'] != ''){
			$start = $this->request->query['from'] ? $this->request->query['from'] : ''; 
			$end_search = $this->request->query['to'] ? $this->request->query['to'] :  date('d/m/Y', strtotime('+1 day'));
			
			$date_cond = array('or' => array("TaskPlan.task_date between ? and ?" => 
					array($this->Functions->format_date_save($start), $this->Functions->format_date_save($end_search))));
		}		
		// for export
		if($this->request->query['action'] == 'export'){
			$data = $this->TaskPlan->find('all', array('fields' => $fields,'conditions' => 
			array($keyCond,$date_cond, 'users_id' => $this->Session->read('USER.Login.id'),	'TaskPlan.is_deleted' => 'N'), 
			'order' => array('created_date' => 'desc'), 'group' => array('TaskPlan.id'), 'joins' => $options));
			$this->Excel->generate('tasks', $data, $data, 'Report', 'TaskPlan');
		}
		
		$this->paginate = array('fields' => $fields,'limit' => '25','conditions' => array($keyCond,$date_cond, 'users_id' => $this->Session->read('USER.Login.id'),
		'TaskPlan.is_deleted' => 'N'), 'order' => array('TaskPlan.created_date' => 'desc'),	'group' => array('TaskPlan.id'), 'joins' => $options);
		$data = $this->paginate('TaskPlan');
		$this->set('data', $data);
		if(empty($data) && !empty($this->request->data)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Oops! No Tasks Found!', 'default', array('class' => 'alert alert-info'));
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
		$this->check_role_access(48);

		// set the page title		
		$this->set('title_for_layout', 'Create Task - Task Plan - Manage Hiring');	
		$this->set('session', array('F' => 'Forenoon','A' => 'Afternoon', 'D' => 'Full Day'));
		// get the client list
		$this->get_client_list();
		
		// When the form submitted
		if ($this->request->is('post')){
			// validates the form
			$this->request->data['TaskPlan']['users_id'] = $this->Session->read('USER.Login.id');
		    $this->request->data['TaskPlan']['created_date'] = $this->Functions->get_current_date();
			$this->TaskPlan->set($this->request->data);
			// validate the form fields
			if ($this->TaskPlan->validates(array('fieldList' => array('clients_id','requirements_id','session','task_date')))){
				// format the dates
				$this->request->data['TaskPlan']['ctc'] = $this->get_avg_ctc($this->request->data['TaskPlan']['requirements_id']);
				$this->request->data['TaskPlan']['task_date'] = $this->Functions->format_date_save($this->request->data['TaskPlan']['task_date']);
				// save the data
				if($this->TaskPlan->save($this->request->data['TaskPlan'], array('validate' => false))){
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Task Plan Created Successfully', 'default', array('class' => 'alert alert-success'));					
					$this->redirect('/taskplan/');
				}else{
						// show the error msg.
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));					
					}		
			}else{
				// retain the position
				$this->load_position($this->request->data['TaskPlan']['clients_id']);
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Please check the validation errors...', 'default', array('class' => 'alert alert-error'));					
			}

		}
	}
	
	/* function to get avg ctc of the position */
	public function get_avg_ctc($id){
		$data = $this->TaskPlan->Position->findById($id, array('fields' => 'ctc_from','ctc_to','ctc_from_type','ctc_to_type'));
		$from_ctc = $data['Position']['ctc_from_type'] == 'T' ? round($data['Position']['ctc_from']/100, 1) : $data['Position']['ctc_from'];
		$to_ctc = $data['Position']['ctc_to_type'] == 'T' ? round($data['Position']['ctc_to']/100, 1) :  $data['Position']['ctc_to'];
		return round(($from_ctc+$to_ctc)/2, 1);
	}
	
	/* function to edit the position */
	public function edit($id){
		// set the page title		
		$this->set('title_for_layout', 'Edit Task Plan - Task Plan - Manage Hiring');	
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
					$this->request->data['TaskPlan']['users_id'] = $this->Session->read('USER.Login.id');
					$this->request->data['TaskPlan']['modified_date'] = $this->Functions->get_current_date();
					$this->TaskPlan->set($this->request->data);
					// validate the form fields
					if ($this->TaskPlan->validates(array('fieldList' => array('clients_id','requirements_id','session','task_date')))){
						// format the dates
						$this->request->data['TaskPlan']['task_date'] = $this->Functions->format_date_save($this->request->data['TaskPlan']['task_date']);
						// save the data
						$this->TaskPlan->id = $id;
						if($this->TaskPlan->save($this->request->data['TaskPlan'], array('validate' => false))){
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Task Plan Modified Successfully', 'default', array('class' => 'alert alert-success'));					
							$this->redirect('/taskplan/');
						}else{
								// show the error msg.
								$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));					
							}		
					}else{
						// retain the position 
						
						$this->load_position($this->request->data['TaskPlan']['clients_id']);
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
						$data = $this->TaskPlan->find('all', array('fields' => array('Position.id','task_date','requirements_id','session','Client.id','TaskPlan.id'), 
						'conditions' => array('TaskPlan.id' => $id), 'joins' => $options));
						$this->request->data = $data[0];	
						$this->request->data['TaskPlan']['clients_id'] = 	$data[0]['Client']['id'];					
						// retain the position
						$this->load_position($data[0]['Client']['id']);	
						// check edit option is validate
						$this->check_valid_edit($this->request->data['TaskPlan']['task_date']);						
						$this->request->data['TaskPlan']['task_date'] = $this->Functions->format_date_show($this->request->data['TaskPlan']['task_date']);
						
						
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
				$this->redirect('/taskplan/');	
			}				
	}
	
	/* function to check valid edit */
	public function check_valid_edit($date){
		 if(strtotime(date('Y-m-d')) > strtotime($date)){
				$this->redirect('/taskplan/');
		 }
	}
	
	/* function to auth record */
	public function auth_action($id){ 				
		$data = $this->TaskPlan->find('all', array('fields' => array('TaskPlan.users_id','TaskPlan.is_deleted'),'conditions' => array('TaskPlan.id' => $id)));
		if($data[0]['TaskPlan']['users_id'] == $this->Session->read('USER.Login.id')){
			return 'pass';
		}else if($data[0]['TaskPlan']['is_deleted'] == 'Y'){
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
		$result = $this->TaskPlan->Position->get_team($this->Session->read('USER.Login.id'),'1');
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
		$pos_list = $this->TaskPlan->Position->find('all', array('fields' => array('id','job_title'),
		'order' => array('job_title ASC'),'conditions' => array($teamCond, 'Position.status' => 'A', 'Position.is_deleted' => 'N',
		'Position.clients_id' => $id), 'group' => array('Position.id'), 'joins' => $options));
		// for retaining
		$format_list = $this->Functions->format_dropdown($pos_list, 'Position','id','job_title');
		$this->set('posList', $format_list);
		// call when it called from ajax 
		if(!isset($this->request->data['TaskPlan']['task_date'])){
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
			$data = $this->TaskPlan->Position->find('all', array('fields' => array('Client.client_name','Position.job_title'),
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
					$this->TaskPlan->id = $id;
					$this->TaskPlan->saveField('is_deleted', 'Y'); 
					$this->TaskPlan->saveField('modified_date', $this->Functions->get_current_date()); 
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Task Plan deleted successfully', 'default', array('class' => 'alert alert-success'));					
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
		$this->redirect('/taskplan/');

	}
	
	// check the role permissions
	public function beforeFilter(){ 
		$this->check_session();
		$this->check_role_access(49);
		
	}
}