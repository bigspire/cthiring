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
 
class ClientController extends AppController {  
	
	public $name = 'Client';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions', 'Excel');


	public function index($status){ 
		if($this->request->is('post')){
			$url_vars = $this->Functions->create_url(array('keyword','from','to','status','emp_id'),'Client'); 			
			$this->redirect('/client/?srch_status=1&'.$url_vars);				
		}

		// set date condition
		if($this->request->query['from'] != '' || $this->request->query['to'] != ''){
			$start = $this->request->query['from'] ? $this->request->query['from'] :  ''; //date('d/m/Y', strtotime('-3 year'));
			$end = $this->request->query['to'] ? $this->request->query['to'] : date('d/m/Y');
			$date_cond = array('or' => array("DATE_FORMAT(Client.created_date, '%Y-%m-%d') between ? and ?" => 
						array($this->Functions->format_date_save($start), $this->Functions->format_date_save($end))));
		}
		
		// show awaiting approval condition
		if($status =='pending'){
			$approveCond = array('Client.status' => '2', 'Client.is_approve' => 'W', 'ClientStatus.users_id' => $this->Session->read('USER.Login.id'));
		}else{
			$approveCond = array('Client.status' => '0', 'Client.is_approve' => 'A');
		}		
			
		// set keyword condition
		if($this->params->query['keyword'] != ''){
			$keyCond = array("MATCH (ResLocation.location,client_name,Creator.first_name,CON.first_name,
			CAH.first_name) AGAINST ('".$this->Functions->format_search_keyword($this->params->query['keyword'])."' IN BOOLEAN MODE)"); 
		}
		// for employee condition
		if($this->request->query['status'] != ''){ 
			$status = $this->request->query['status'] == '2' ?  '0' : $this->request->query['status'];
			$stCond = array('Client.status' => $status);
		}
		
		// for director and BH
		
		if($this->Session->read('USER.Login.roles_id') == '33' || $this->Session->read('USER.Login.roles_id') == '38'
		|| $this->Session->read('USER.Login.roles_id') == '39'){
			$show = 'all';
			// $team_cond = false;
		}else{
			$show = '1';
			// $team_cond = true;
		}
		
		$team_cond = true;
		
		// get the team members
		$result = $this->Client->get_team($this->Session->read('USER.Login.id'),$show);
		if(!empty($result)){
			$this->set('approveUser', '1');
			// for drop down listing
			$format_list = $this->Functions->format_dropdown($result, 'u','id','first_name', 'last_name');
			$this->set('empList', $format_list);			
		}
		
		// check role based access
		
		if($this->Session->read('USER.Login.roles_id') == '34'){ // account holder
			$empCond = array('AH.users_id' => $this->Session->read('USER.Login.id'));
		}else if($this->Session->read('USER.Login.roles_id') == '30'){ // recruiter
			$empCond = array('OR' => array(
					'ReqResume.created_by' =>  $this->Session->read('USER.Login.id'),
					'ReqTeam.users_id' => $this->Session->read('USER.Login.id')
					)
			);		
			//$empCond = array('ReqResumeStatus.created_by' => $this->Session->read('USER.Login.id'),
			//'ReqResumeStatus.stage_title' => 'Validation - Account Holder', 'ReqResumeStatus.status_title' => 'Validated');		
		}else if($this->Session->read('USER.Login.roles_id') == '33' || $this->Session->read('USER.Login.roles_id') == '35'
		|| $this->Session->read('USER.Login.roles_id') == '39'){ // director & BD
			$empCond = '';
		}
		
		
		
			// for employee condition
		if($this->request->query['emp_id'] != ''){ 
			$empCond = array('Client.created_by' => $this->request->query['emp_id']);
		}else if($this->Session->read('USER.Login.rights') != '5'){			
			// $empCond = array('ReqResume.created_by' => $this->Session->read('USER.Login.id'));
		}
			$options = array(			
				array('table' => 'requirements',
						'alias' => 'Position',					
						'type' => 'LEFT',
						'conditions' => array('`Position`.`clients_id` = `Client`.`id`',
						'Position.is_approve' => 'A')
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
				array('table' => 'users',
						'alias' => 'CAH',					
						'type' => 'LEFT',
						'conditions' => array('`AH`.`users_id` = `CAH`.`id`')
				),
				array('table' => 'client_contact',
						'alias' => 'CC',					
						'type' => 'LEFT',
						'conditions' => array('`CC`.`clients_id` = `Client`.`id`')
				),
				array('table' => 'contact',
						'alias' => 'CON',					
						'type' => 'LEFT',
						'conditions' => array('`CON`.`id` = `CC`.`contact_id`')
				),
				array('table' => 'req_team',
						'alias' => 'ReqTeam',					
						'type' => 'LEFT',
						'conditions' => array('`ReqTeam`.`requirements_id` = `Position`.`id`')
				),
				array('table' => 'client_status',
						'alias' => 'ClientStatus',					
						'type' => 'LEFT',
						'conditions' => array('`ClientStatus`.`clients_id` = `Client`.`id`')
				),
			);
			
		
	
		
		// set the page title
		$this->set('title_for_layout', 'Clients - Manage Hiring');	
		$fields = array('id','client_name','ResLocation.location','created_date',
		'Creator.first_name','status',"group_concat(distinct CAH.first_name separator ', ') account_holder", 'city',
		'count(distinct Position.id) no_pos','count(distinct CON.id) no_contact', 'modified_date', 'Client.created_by','Client.is_approve',	"max(ClientStatus.id) st_id");
		// for export
		if($this->request->query['action'] == 'export'){ 
			$data = $this->Client->find('all', array('fields' => $fields,'conditions' => 
			array($keyCond,$date_cond,$stCond,$empCond,$approveCond),'order' => array('created_date' => 'desc'), 
			'group' => array('Client.id'), 'joins' => $options));
			// get the client contacts
			$options = array(		
			array('table' => 'client_contact',
				  'alias' => 'ClientCont',					
				  'type' => 'LEFT',
				  'conditions' => array('`ClientCont`.`contact_id` = `Contact`.`id`')
				)
			);
			$this->loadModel('Contact');
			foreach($data as $key => $record){
				$client_contact = $this->Contact->find('all', array('fields' => array('id','title', 'first_name', 'last_name','email','mobile','Designation.designation','ContactBranch.branch'), 'conditions' => array('ClientCont.clients_id ' => $record['Client']['id'], 'Contact.status' => '0', 'Contact.is_deleted' => 'N'),'order' => array('Contact.id' => 'asc'),'joins' => $options));
				// iterate the contact details
				foreach($client_contact as $key2 => $client){
					$data[$key]['Client']['contact_data'.$key2] = ucwords($client['Contact']['first_name'].' '.$client['Contact']['last_name']).'; '.$client['Contact']['email'].'; '.$client['Contact']['mobile'].'; '.$client['Designation']['designation'].'; '.$client['ContactBranch']['branch'];
					// echo '<pre>'; print_r($data);die;
				}
			}			
			$this->Excel->generate('clients', $data, $data, 'Client Report', 'ClientDetails'.date('ddmmyy'));
		}
		$this->paginate = array('fields' => $fields,'limit' => '25','conditions' => array($keyCond,$date_cond,$stCond,
		$empCond,$approveCond),
		'order' => array('created_date' => 'desc'),	'group' => array('Client.id'), 'joins' => $options);
		$data = $this->paginate('Client');
		$this->set('data', $data);
		if(empty($data) && !empty($this->request->data)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Oops! No Clients Found!', 'default', array('class' => 'alert alert-info'));
		}
	}
	
	
	/* function to edit the client */
	public function edit($id){
		// set the page title		
		$this->set('title_for_layout', 'Edit Client - Client - Manage Hiring');
		if(!empty($id) && intval($id)){
			// authorize user before action
			$ret_value = $this->auth_action($id);
			if($ret_value == 'pass'){
			$this->set('statusList', array('0' => 'Active', '1' => 'Inactive'));
			$this->set('titleList', array('1' => 'Mr.', '2' => 'Ms.'));
			$this->load_static_data();
				// load contact
				$this->loadModel('Contact');
				if (!empty($this->request->data)){ 
					// validates the form
					$this->request->data['Client']['modified_by'] = $this->Session->read('USER.Login.id');
					$this->request->data['Client']['modified_date'] = $this->Functions->get_current_date();
					$this->Client->set($this->request->data);
					// retain the district
					$this->get_district_list($this->request->data['Client']['state']);
					// validate the client contacts
					$contact_validate = $this->validate_contact();
					// retain the form posts
					$this->retain_contact_list();
					// validate the form fields
					if ($this->Client->validates(array('fieldList' => array('client_name','city','pincode','state','res_location_id',
					'account_holder'))) && $contact_validate){					
						// save the data
						if($this->Client->save($this->request->data['Client'], array('validate' => false))){
								// remove contact list
							// $this->remove_contact_list($this->Client->id);
							// remove contact list
							$this->remove_client_contact_list($this->Client->id);
							// remove account holder list
							$this->remove_account_holder_list($this->Client->id);							
							// save contact list
							$this->save_client_contact_list($this->Client->id);
							// save account holder
							$this->save_account_holder($this->Client->id);							
							// show the msg.
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Client modified successfully', 'default', array('class' => 'alert alert-success'));				
							$this->redirect('/client/');
						}else{
							// show the error msg.
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));					
						}
					}else{
						// print_r($this->Client->validationErrors);die;
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Please check the validation errors...', 'default', array('class' => 'alert alert-error'));					
					}					
				}else{
					$options = array(			
						array('table' => 'state',
								'alias' => 'State',					
								'type' => 'LEFT',
								'conditions' => array('`State`.`id` = `ResLocation`.`state_id`')
						)
					);
					$data = $this->Client->find('all', array('fields' => array('Client.id','client_name','phone','address','door_no',
					'street_name','area_name','pincode','city','status','res_location_id','State.id'), 
					'conditions' => array('Client.id' => $id), 'joins' => $options));
					$this->request->data = $data[0];
					$this->load_static_data();
					$options = array(		
						array('table' => 'client_contact',
								'alias' => 'ClientCont',					
								'type' => 'LEFT',
								'conditions' => array('`ClientCont`.`contact_id` = `Contact`.`id`')
						)
					);
					// retain the district
					$this->get_district_list($this->request->data['State']['id']);
					// retain the account holder
					$this->get_account_holder_list($id);
					// fetch the contacts
					$data = $this->Contact->find('all', array('fields' => array('id','title', 'first_name', 'last_name','email','mobile',
					'designation_id','status', 'contact_branch_id'), 'conditions' => array('ClientCont.clients_id ' => $id),
					'order' => array('Contact.id' => 'asc'),'joins' => $options));	
					$this->set('contact_list', $data);					
				}
			}else if($ret_value == 'fail'){ 
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/client/');	
			}else{
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Record Deleted: '.$ret_value , 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/client/');	
			}
		}else{
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));		
			$this->redirect('/client/');	
		}
	}
	
	/* function to get the key value */
	public function get_key_val($key){
		$key_val = explode('_', $key);
		if(in_array($key_val[0], array('title','first','last','email','designation','mobile',
		'phone','branch','status'))){
			return ($key_val[0] == 'first' ||  $key_val[0] == 'last') ? $key_val[0].'_name' : $key_val[0];
		}		
		
	}
	
	/* function to retain client contacts */
	public function retain_contact_list(){ 
		$contact_data = array();		
		foreach($this->request->data['Client'] as $key => $data){ 
			// for the form fields
			if($new_key = $this->get_key_val($key)){ 
				$contact_data['Contact'][$new_key][] = $data;
			}			
		}
		$this->request->data['Contact'] = '1';
		$this->set('contact_list', $contact_data);
	}
	
	/* function to remove the contact list */
	public function remove_contact_list($id){	
		$this->loadModel('ClientContact');
		$data = $this->ClientContact->find('all', array('fields' => array('contact_id'), 'conditions' => array('clients_id' => $id)));
		foreach($data as $record){
			$this->ClientContact->deleteAll(array('ClientContact.clients_id' => $record['ClientContact']['contact_id']), false);
		}
	}
	
	/* function to remove the client contact list */
	public function remove_client_contact_list($id){	
		$this->loadModel('ClientContact');
		$this->ClientContact->deleteAll(array('ClientContact.clients_id' => $id), false);
	}	

	
	/* function to remove the account holders */
	public function remove_account_holder_list($id){
		$this->loadModel('ClientAccountHolder');
		$this->ClientAccountHolder->deleteAll(array('ClientAccountHolder.clients_id' => $id), false);
	}
	
	/* function to auth record */
	public function auth_action($id){ 	
		$data = $this->Client->findById($id, array('fields' => 'created_by','is_deleted','modified_date','status'));	
		// check the req belongs to the user
		if($data['Client']['is_deleted'] == 'Y'){
			return $data['Client']['modified_date'];
		}else if($data['Client']['status'] == '2'){
			return 'fail';
		}		
		else if($data['Client']['created_by'] == $this->Session->read('USER.Login.id')){	
			return 'pass';
		}else{
			return 'fail';
		}
	}
	
	
	/* function to check for duplicate entry */
	public function check_duplicate_status($req_id, $app_user_id, $exist){
		$count = $this->ClientStatus->find('count',  array('conditions' => array('ClientStatus.clients_id' => $req_id, 'ClientStatus.users_id' => $app_user_id)));
		$limit = $exist ? $exist : 0;
		if($count > $limit){
			$this->invalid_attempt();
		}		
	}
	
	/* function to add the client */
	public function add(){
		$this->check_role_access(1);
		// set the page title		
		$this->set('title_for_layout', 'Create Client - Clients - Manage Hiring');	
		$this->load_static_data();
		$this->set('statusList', array('0' => 'Active', '1' => 'Inactive'));
		$this->set('titleList', array('1' => 'Mr.', '2' => 'Ms.'));
		if ($this->request->is('post')){
			// validates the form
			$this->request->data['Client']['created_by'] = $this->Session->read('USER.Login.id');
		    $this->request->data['Client']['created_date'] = $this->Functions->get_current_date();
			$this->request->data['Client']['status'] = 2;
			$this->Client->set($this->request->data);
			// retain the district
			$this->get_district_list($this->request->data['Client']['state']);
			// validate the client contacts
			$contact_validate = $this->validate_contact();
			// validate the form fields
			if ($this->Client->validates(array('fieldList' => array('client_name','city','pincode','state','res_location_id',
			'account_holder'))) && $contact_validate){					
				// save the data
				if($this->Client->save($this->request->data['Client'], array('validate' => false))){
					// save client contact list
					$this->save_client_contact_list($this->Client->id);
					// save account holder list
					$this->save_account_holder($this->Client->id);
					
					// send mail to approver
					$sub = 'Manage Hiring - Client created by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
					$from = ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
					// get the superiors
					
					/*
					$this->loadModel('Approve');
					$approval_data = $this->Approve->find('first', array('fields' => array('level1'), 'conditions'=> array('Approve.users_id' => $this->Session->read('USER.Login.id'))));														
					// get leader email address
					$leader_data = $this->Client->Creator->find('all', array('conditions' => array('Creator.id' => $approval_data['Approve']['level1']),'fields' => array('Creator.id',	'Creator.first_name','Creator.last_name','Creator.email_id')));
					*/					
					
					// get the Business Head
					$leader_data = $this->Client->Creator->find('all', array('conditions' => array('roles_id' => '35'), 'fields' => array('Creator.id',	'Creator.first_name','Creator.last_name', 'Creator.email_id')));
					
					// get account holder name				
					
					/*
					$sub = 'Manage Hiring - Client created by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
					$from = ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
					// get the Business Head
					$leader_data = $this->Client->Creator->find('all', array('conditions' => array('roles_id' => '39'), 'fields' => array('Creator.id',	'Creator.first_name','Creator.last_name', 'Creator.email_id')));
					// get account holder name
					$ac_holder = $this->ClientAccountHolder->find('all', array('fields' => array("group_concat(User.first_name separator ', ') account_holder"), 'order' => array('User.first_name ASC'), 'conditions' => array('ClientAccountHolder.clients_id' => $this->Client->id, 	'User.is_deleted' => 'N'), 'group' => array('User.id')));
					*/
					
					// if leader found
					if(!empty($leader_data)){
						$this->loadModel('ClientStatus');
						// make sure not duplicate status exists
						$this->check_duplicate_status($this->Client->id, $leader_data[0]['Creator']['id']);			
						// save req. status data
						$data = array('clients_id' => $this->Client->id, 'created_date' => $this->Functions->get_current_date(), 'users_id' => $leader_data[0]['Creator']['id']);
						// save the client status
						if($this->ClientStatus->save($data, true, $fieldList = array('clients_id','created_date','users_id'))){
						
							$ac_holder = $this->ClientAccountHolder->find('all', array('fields' => array("group_concat(User.first_name separator ', ') account_holder"), 'order' => array('User.first_name ASC'), 'conditions' => array('ClientAccountHolder.clients_id' => $this->Client->id, 'User.is_deleted' => 'N')));
							
							$vars = array('from_name' => $from, 'to_name' => ucwords($leader_data[0]['Creator']['first_name'].' '.$leader_data[0]['Creator']['last_name']), 'client_name' => $this->request->data['Client']['client_name'], 'city' => $this->request->data['Client']['city'],'account_holder' => $ac_holder[0][0]['account_holder']);
													
							// notify superiors						
							if(!$this->send_email($sub, 'add_client', 'noreply@managehiring.com', $leader_data[0]['Creator']['email_id'],$vars)){	
								// show the msg.								
								$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail for approval...', 'default', array('class' => 'alert alert-error'));				
							}else{
								$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Client created successfully. After approval, it will be visible!', 'default', array('class' => 'alert alert-info'));
							}
						}
					}else{
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>You have no superior to approve your request', 'default', array('class' => 'alert alert-info'));
					}								
					// show the msg.
					$this->redirect('/client/');					
				}else{
					// show the error msg.
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));					
				}
			}else{
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Please check the validation errors...', 'default', array('class' => 'alert alert-error'));					
			}			
		}
	}
	
	/* function to validate the client contact */
	public function validate_contact(){
		$er_flag = true;		
		for($i = 0; $i < $this->request->data['Client']['contact_count']; $i++){
			if($this->request->data['Client']['first_name_'.$i] == ''){
				$error[$i]['fname'] = 'Please enter the first name';
				$er_flag = false;
			}
			if($this->request->data['Client']['mobile_'.$i] == ''){
				$error[$i]['mobile'] = 'Please enter the mobile';
				$er_flag = false;
			}
			$mobile = $this->request->data['Client']['mobile_'.$i];
			if(!is_numeric($mobile)){
				$error[$i]['mobile'] = 'Please enter the numeric only';
				$er_flag = false;
			}
			if(strlen($mobile) < 10){
				$error[$i]['mobile'] = 'Mobile no. must be min. 10 digits';
				$er_flag = false;
			}						
			if($this->request->data['Client']['email_'.$i] == ''){
				$error[$i]['email'] = 'Please enter the email address';
				$er_flag = false;
			}
			// validate email
			if($this->Functions->email_validation($this->request->data['Client']['email_'.$i])){
				$error[$i]['email'] = 'Please enter valid email address';
				$er_flag = false;
			}
			if($this->request->data['Client']['title_'.$i] == ''){
				$error[$i]['title'] = 'Please select the title';
				$er_flag = false;
			}
			if($this->request->data['Client']['designation_'.$i] == ''){
				$error[$i]['designation'] = 'Please select the designation';
				$er_flag = false;
			}
		}
		$this->set('errorData', $error);
		return $er_flag;
	}
	
	/* function to load the districts options */
	public function get_district(){
		$this->layout = 'ajax';
		$this->Client->load_district($this->request->query['id']);
		$this->render(false);
		die;
	}
	
	
	
	/* function to save contact lists */
	public function save_client_contact_list($client_id){ 
		for($i = 0; $i < $this->request->data['Client']['contact_count']; $i++){ 
			if($this->request->data['Client']['first_name_'.$i] != ''){ 
				$this->loadModel('Contact');
				$this->Contact->id = $this->request->data['Client']['contactID_'.$i];
				$data = array('title' => $this->request->data['Client']['title_'.$i],'first_name' => $this->request->data['Client']['first_name_'.$i],
				'last_name' => $this->request->data['Client']['last_name_'.$i],'mobile' => $this->request->data['Client']['mobile_'.$i],
				'phone' => $this->request->data['Client']['phone_'.$i],'designation_id' => $this->request->data['Client']['designation_'.$i],
				'status' => $this->request->data['Client']['status_'.$i],'contact_branch_id' => $this->request->data['Client']['branch_'.$i],
				'email' => $this->request->data['Client']['email_'.$i], 'created_by' => $this->Session->read('USER.Login.id'),
				'created_date' => $this->Functions->get_current_date());
				if($this->request->data['Client']['contactID_'.$i] == ''){
					$this->Contact->create();
				}
				if($this->Contact->save($data, true, $fieldList = array('title','first_name','last_name','email',
				'phone','mobile','status','created_date','created_by','designation_id','contact_branch_id'))){
					// save the client contact id
					$this->loadModel('ClientContact');
					$data = array('clients_id' => $client_id, 'contact_id' => $this->Contact->id,
					'modified_date' => $this->Functions->get_current_date());
					$this->ClientContact->create();
					$this->ClientContact->save($data, true, $fieldList = array('clients_id','contact_id','modified_date'));
				}
				
			}
			
		}			
	}
	
	/* function to save account holder */
	public function save_account_holder($id){
		$this->loadModel('ClientAccountHolder');
		foreach($this->request->data['Client']['account_holder'] as $holder){ 
			$this->ClientAccountHolder->create();
			$data = array('created_date' => $this->Functions->get_current_date(),'clients_id' => $id, 'users_id' => $holder);
			$this->ClientAccountHolder->save($data, true, $fieldList = array('clients_id','users_id','created_date'));
		}
	}
	
	/* function to load static data */
	public function load_static_data(){
		// load the states
		$this->loadModel('State');
		$state_list = $this->State->find('list', array('fields' => array('id','state'), 'order' => array('state ASC'),'conditions' => array('is_deleted' => 'N', 'status' => '1')));
		$this->set('stateList', $state_list);
		// load the account holders
		$user_list = $this->Client->Creator->find('list',  array('fields' => array('id','first_name'), 
		'order' => array('first_name ASC'),'conditions' => array('status' => '0','Creator.is_deleted' => 'N')));
		$this->set('userList', $user_list);
		// fetch the contact branch
		$this->loadModel('ContactBranch');
		$branch_list = $this->ContactBranch->find('list', array('fields' => array('id','branch'),
		'order' => array('branch ASC'),'conditions' => array('is_deleted' => 'N', 'status' => '1')));
		$this->set('branchList', $branch_list);
		// fetch the designation
		$this->loadModel('Designation');
		$desig_list = $this->Designation->find('list', array('fields' => array('id','designation'),
		'order' => array('designation ASC'),'conditions' => array('is_deleted' => 'N', 'status' => '1')));
		$this->set('desigList', $desig_list);
		// fetch the projects		
		/*
		if($this->request->params['action'] == 'edit_expense'){
			$comp_cond = array('tsk_company_id' => $this->request->data['Client']['tsk_company_id']);
		}
		$proj_list = $this->Client->TskProject->find('list', array('fields' => array('id','project_name'), 'order' => array('project_name ASC'),'conditions' => array('is_deleted' => 'N', $comp_cond)));
		$this->set('projList', $proj_list);
		// fetch the categories
		$this->loadModel('FinExpCat');
		$cat_list = $this->FinExpCat->find('list', array('fields' => array('id','category'), 'order' => array('category ASC'),'conditions' => array('is_deleted' => 'N', 'status' => '1')));
		$this->set('catList', $cat_list);
		*/		
	}
	
	
	/* function to load the districts */
	public function get_district_list($id){
		$this->set('districtList', $this->Client->load_district_post($id));
	}
	
	/* function to load the account holder */
	public function get_account_holder_list($id){
		$this->loadModel('ClientAccountHolder');
		$ac_holder = $this->ClientAccountHolder->find('all', array('fields' => array('User.id'),
		'order' => array('User.first_name ASC'), 'conditions' => array('ClientAccountHolder.clients_id' => $id, 
		'User.is_deleted' => 'N')));
		foreach($ac_holder as $record){
			$users[] = $record['User']['id'];
		}
		$this->set('acholderList', $users);
	}
	
	
	/* function to view the position */
	public function view($id){	
		// set the page title
		$this->set('title_for_layout', 'View Client - Manage Hiring');	
		$options = array(			
			array('table' => 'state',
				  'alias' => 'State',					
				  'type' => 'LEFT',
				  'conditions' => array('`State`.`id` = `ResLocation`.`state_id`')
			),
			array('table' => 'users',
				  'alias' => 'Modifier',					
				  'type' => 'LEFT',
				  'conditions' => array('`Modifier`.`id` = `Client`.`modified_by`')
			)
		);
		$fields = array('id','client_name','phone','ResLocation.location','address','created_date','Creator.first_name','Creator.last_name',
		'address','status','door_no','street_name','area_name','city','modified_date','pincode','State.state',
		'Modifier.first_name','is_approve','Client.created_by','Modifier.last_name',);
		$data = $this->Client->find('all', array('fields' => $fields,'conditions' => array('Client.id' => $id),
		'joins' => $options));
		$this->set('client_data', $data[0]);
		// get account holder
		$this->loadModel('ClientAccountHolder');
		$ac_holder = $this->ClientAccountHolder->find('all', array('fields' => array("group_concat(User.first_name separator ', ') account_holder"),
		'order' => array('User.first_name ASC'), 'conditions' => array('ClientAccountHolder.clients_id' => $id, 
		'User.is_deleted' => 'N')));
		$this->set('accountList', $ac_holder[0][0]['account_holder']);
		// get the client contacts
		$this->loadModel('ClientContact');
		$options = array(			
			array('table' => 'users',
					'alias' => 'Creator',					
					'type' => 'LEFT',
					'conditions' => array('`Creator`.`id` = `Contact`.`created_by`')
			),
			array('table' => 'designation',
					'alias' => 'Designation',					
					'type' => 'LEFT',
					'conditions' => array('`Designation`.`id` = `Contact`.`designation_id`')
			),
			array('table' => 'contact_branch',
					'alias' => 'ContactBranch',					
					'type' => 'LEFT',
					'conditions' => array('`ContactBranch`.`id` = `Contact`.`contact_branch_id`')
			)
		);		
		$contact = $this->ClientContact->find('all', array('fields' => array('Contact.id','Contact.first_name','Contact.last_name','Contact.email',
		'Contact.phone','Contact.mobile','Contact.created_date','Creator.first_name', 'Creator.last_name','Designation.designation','Contact.title','ContactBranch.branch'), 
		'conditions' => array('clients_id' => $id, 'Contact.status' => '0'), 'order' => array('Contact.created_date' => 'desc'),
		'joins' => $options));
		$this->set('contact_data', $contact);
		// get the clients requirements
		$this->loadModel('Position');
		$fields = array('id','job_title','location','no_job','min_exp','max_exp','ctc_from','ctc_to','ReqStatus.title',
		'Creator.first_name','created_date','modified_date', 'count(ReqResume.id) cv_sent','group_concat(ReqResume.status_title) joined');
		$data = $this->Position->find('all', array('fields' => $fields,'limit' => '25','conditions' => array('clients_id' => $id),
		'order' => array('created_date' => 'desc'),	'group' => array('Position.id')));
		$this->set('position_data', $data);
		
	}
	
	public function remark($id, $st_id, $user_id, $status){
		$this->layout = 'framebox';		
		if(!empty($this->request->data)){		
			/*/
			$status = $st == 'approve' ? '0' : '1';
			$is_approve = $st == 'approve' ? 'A' : 'R';
			$data = array('id' => $id, 'status' => $status, 'approve_date' => $this->Functions->get_current_date(),
			'is_approve' => $is_approve, 'remarks' =>  $this->request->data['Client']['remarks']);	
			$approve_validation = $is_approve == 'R' ? true: false;	
			*/
			
			$approve_msg = $status == 'R' ? 'Rejected': 'Approved';	

			if($this->request->is('post') && $st_id != ''){
				// set the validation
				$this->Client->set($this->request->data);
				if($status == 'R'){
					$validate = $this->Client->validates(array('fieldList' => array('remarks')));
				}else{
					$validate = true;
				}
				// update the todo
				if($validate){
					$this->loadModel('ClientStatus');
					$data = array('modified_date' => $this->Functions->get_current_date(), 'modified_by' => $this->Session->read('USER.Login.id'), 'remarks' => $this->request->data['Client']['remarks'], 'status' => $status);
					$this->ClientStatus->id = $st_id;
					$st_msg = $status == 'A' ? 'approved' : 'rejected';
					// make sure not duplicate status exists
					$this->check_duplicate_status($id, $this->Session->read('USER.Login.id'), 1);
					// save the position status
					if($this->ClientStatus->save($data, true, $fieldList = array('modified_by','modified_date','remarks','status'))){
						
						$sub = 'Manage Hiring - Client '.$approve_msg.' by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
						
						$from = ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
						// get the creator data
						$creator_data = $this->Client->find('all', array('conditions' => array('Client.id' => $id), 'fields' => array('Client.client_name', 'Client.city','Creator.first_name','Creator.last_name', 'Creator.email_id')));
						// get account holder name
						$this->loadModel('ClientAccountHolder');
						$ac_holder = $this->ClientAccountHolder->find('all', array('fields' => array("group_concat(User.first_name separator ', ') account_holder"), 'order' => array('User.first_name ASC'), 'conditions' => array('ClientAccountHolder.clients_id' => $id, 'User.is_deleted' => 'N')));
						$vars = array('to_name' =>  ucwords($creator_data[0]['Creator']['first_name'].' '.$creator_data[0]['Creator']['last_name']), 'from_name' => $from, 'client_name' => $creator_data[0]['Client']['client_name'], 'city' => $creator_data[0]['Client']['city'],'account_holder' => $ac_holder[0][0]['account_holder'], 'approve_msg' => $approve_msg, 'remarks' => $this->request->data['Client']['remarks']);
						$this->set('action_status', $approve_msg);
						// notify employee						
						if(!$this->send_email('Manage Hiring - Client '.$st_msg.' by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name')), 'approve_client', 'noreply@managehiring.com', $creator_data[0]['Creator']['email_id'],$vars)){		
							// show the msg.								
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail to user...', 'default', array('class' => 'alert alert-error'));				
						}else{
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Client '.$approve_msg.' Successfully.', 'default', array('class' => 'alert alert-success'));
						}
						// update the client
						$this->Client->id = $id;
						$this->Client->saveField('is_approve', $status);
						$this->Client->saveField('status', $status == 'A' ? 0 : 2);
						
						$this->set('form_status', '1');		
					}else{
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data.', 'default', array('class' => 'alert alert-error'));	
					}
					
				}
			}
		}
	}
	
	/* auto complete search */	
	public function search(){ 
		$this->layout = false;		
		$q = trim(Sanitize::escape($_GET['q']));	
		if(!empty($q)){
			// execute only when the search keywork has value		
			$this->set('keyword', $q);			
			$this->Client->unBindModel(array('belongsTo' => array('Creator')));
			$data = $this->Client->find('all', array('fields' => array('Client.client_name','ResLocation.location'),
			'group' => array('Client.client_name','ResLocation.location'), 'conditions' => 	array("OR" => array ('Client.client_name like' => '%'.$q.'%',
			'ResLocation.location like' => '%'.$q.'%'), 'AND' => array('Client.is_deleted' => 'N'))));		
			$this->set('results', $data);
		}
    }
	
	// check the role permissions
	public function beforeFilter(){ 
		$this->check_session();
		$this->check_role_access(2);
	}
	

}