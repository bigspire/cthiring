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


	public function index(){
		if($this->request->is('post')){
			$url_vars = $this->Functions->create_url(array('keyword','from','to','status'),'Client'); 			
			$this->redirect('/client/?srch_status=1&'.$url_vars);				
		}
		// set date condition
		if($this->request->query['from'] != '' || $this->request->query['to'] != ''){
			$start = $this->request->query['from'] ? $this->request->query['from'] :  ''; //date('d/m/Y', strtotime('-3 year'));
			$end = $this->request->query['to'] ? $this->request->query['to'] : date('d/m/Y');
			$date_cond = array('or' => array("DATE_FORMAT(Client.created_date, '%Y-%m-%d') between ? and ?" => 
						array($this->Functions->format_date_save($start), $this->Functions->format_date_save($end))));
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
		}else if($this->Session->read('USER.Login.roles_id') == '33' || $this->Session->read('USER.Login.roles_id') == '35'){ // director & BD
			$empCond = '';
		}
		
			$options = array(			
				array('table' => 'requirements',
						'alias' => 'Position',					
						'type' => 'LEFT',
						'conditions' => array('`Position`.`clients_id` = `Client`.`id`')
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
				)
			);
			
		
		
		
		// set the page title
		$this->set('title_for_layout', 'Clients - CT Hiring - ES');	
		$fields = array('id','client_name','ResLocation.location','created_date',
		'Creator.first_name','status',"group_concat(distinct CAH.first_name separator ', ') account_holder", 'city',
		'count(distinct Position.id) no_pos','count(distinct CON.id) no_contact', 'modified_date', 'Client.created_by');
		// for export
		if($this->request->query['action'] == 'export'){ 
			$data = $this->Client->find('all', array('fields' => $fields,'conditions' => 
			array($keyCond,$date_cond,$stCond,$empCond),'order' => array('created_date' => 'desc'), 
			'group' => array('Client.id'), 'joins' => $options));
			$this->Excel->generate('clients', $data, $data, 'Client Report', 'ClientDetails'.date('ddmmyy'));
		}
		$this->paginate = array('fields' => $fields,'limit' => '25','conditions' => array($keyCond,$date_cond,$stCond,$empCond),
		'order' => array('created_date' => 'desc'),	'group' => array('Client.id'), 'joins' => $options);
		$data = $this->paginate('Client');
		$this->set('data', $data);
		if(empty($data)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Oops! No Clients Found!', 'default', array('class' => 'alert alert-info'));
		}
	}
	
	
	/* function to edit the client */
	public function edit($id){
		// set the page title		
		$this->set('title_for_layout', 'Edit Client - Client - CT Hiring');
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
					'account_holder','status'))) && $contact_validate){					
						// save the data
						if($this->Client->save($this->request->data['Client'])){
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
		$data = $this->Client->findById($id, array('fields' => 'created_by','is_deleted','modified_date'));	
		// check the req belongs to the user
		if($data['Client']['is_deleted'] == 'Y'){
			return $data['Client']['modified_date'];
		}		
		else if($data['Client']['created_by'] == $this->Session->read('USER.Login.id')){	
			return 'pass';
		}else{
			return 'fail';
		}
	}
	
	/* function to add the client */
	public function add(){
		$this->check_role_access(1);
		// set the page title		
		$this->set('title_for_layout', 'Create Client - Clients - CT Hiring');	
		$this->load_static_data();
		$this->set('statusList', array('0' => 'Active', '1' => 'Inactive'));
		$this->set('titleList', array('1' => 'Mr.', '2' => 'Ms.'));
		if ($this->request->is('post')){
			// validates the form
			$this->request->data['Client']['created_by'] = $this->Session->read('USER.Login.id');
		    $this->request->data['Client']['created_date'] = $this->Functions->get_current_date();
			$this->Client->set($this->request->data);
			// retain the district
			$this->get_district_list($this->request->data['Client']['state']);
			// validate the client contacts
			$contact_validate = $this->validate_contact();
			// validate the form fields
			if ($this->Client->validates(array('fieldList' => array('client_name','city','pincode','state','district',
			'account_holder','status'))) && $contact_validate){					
				// save the data
				if($this->Client->save($this->request->data['Client'])){
					// save client contact list
					$this->save_client_contact_list($this->Client->id);
					// save account holder list
					$this->save_account_holder($this->Client->id);
					// show the msg.
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Client created successfully', 'default', array('class' => 'alert alert-success'));				
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
		'order' => array('first_name ASC'),'conditions' => array('status' => '0', 'roles_id' => '34')));
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
		$this->set('title_for_layout', 'View Client - CT Hiring - ES');	
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
		$fields = array('id','client_name','phone','ResLocation.location','address','created_date','Creator.first_name',
		'address','status','door_no','street_name','area_name','city','modified_date','pincode','State.state','Modifier.first_name');
		$data = $this->Client->find('all', array('fields' => $fields,'conditions' => array('Client.id' => $id),
		'joins' => $options));
		$this->set('client_data', $data[0]);
		// get account holder
		$this->loadModel('ClientAccountHolder');
		$ac_holder = $this->ClientAccountHolder->find('all', array('fields' => array("group_concat(User.first_name separator ', ') account_holder"),
		'order' => array('User.first_name ASC'), 'conditions' => array('ClientAccountHolder.clients_id' => $id, 
		'User.is_deleted' => 'N'), 'group' => array('User.id')));
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
			)
		);		
		$contact = $this->ClientContact->find('all', array('fields' => array('Contact.id','Contact.first_name','Contact.last_name','Contact.email',
		'Contact.phone','Contact.mobile','Contact.created_date','Creator.first_name','Designation.designation'), 
		'conditions' => array('clients_id' => $id), 'order' => array('Contact.created_date' => 'desc'),
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
		$this->check_role_access(2);
	}
	

}