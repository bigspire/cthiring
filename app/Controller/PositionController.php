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
  
class PositionController extends AppController {  
	
	public $name = 'Position';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions', 'Excel');

	public function index($contact_id){			
		// when the form is submitted for search
		if($this->request->is('post')){
			$url_vars = $this->Functions->create_url(array('keyword','from','to','loc','emp_id','status','unread'),'Position'); 			
			$this->redirect('/position/?srch_status=1&'.$url_vars);				
		}
		
		// set the page title
		$this->set('title_for_layout', 'Positions - CT Hiring');
		$this->set('empList', $this->Position->get_employee_details());	
		$this->set('locList', $this->get_loc_details());
		$this->set('stList', array('10' => 'Planned', '1' => 'In-Process', '2' => 'On-Hold', '3' => 'Closed', '4' => 'Cancelled'));			
		$fields = array('id','job_title','location','no_job','min_exp','max_exp','ctc_from','ctc_to','ReqStatus.title','req_status_id',
		'Client.client_name','team_member', 'Creator.first_name','created_date','modified_date', 'count(distinct ReqResume.id) cv_sent',
		'group_concat(ReqResume.status_title) joined','count(distinct Read.id) read_count', "group_concat(distinct ResOwner.first_name
		SEPARATOR ', ') team_member", 'Position.created_by');
				
		$options = array(			
			array('table' => 'users',
					'alias' => 'ResOwner',					
					'type' => 'LEFT',
					'conditions' => array('`ResOwner.id` = `ReqResume`.`created_by`')
			),
			array('table' => 'req_message_read',
					'alias' => 'Read',					
					'type' => 'LEFT',
					'conditions' => array('`Read.requirements_id` = `Position`.`id`',
					'Read.users_id' => $this->Session->read('USER.Login.id'),
					'Read.status' => 'U')
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
			array('table' => 'req_team',
					'alias' => 'ReqTeam',					
					'type' => 'LEFT',
					'conditions' => array('`ReqTeam`.`requirements_id` = `Position`.`id`')
			)
		);
		
		if($this->request->query['from'] != '' || $this->request->query['to'] != ''){
			$start = $this->request->query['from'] ? $this->request->query['from'] : ''; // date('d/m/Y', strtotime('-15 month'));
			$end = $this->request->query['to'] ? $this->request->query['to'] : date('d/m/Y');
			$end_search = $this->request->query['to'] ? $this->request->query['to'] :  date('d/m/Y', strtotime('+1 day'));
			// set date condition
			$date_cond = array('or' => array("DATE_FORMAT(Position.created_date, '%Y-%m-%d') between ? and ?" => 
						 array($this->Functions->format_date_save($start), $this->Functions->format_date_save($end_search))));
		}
		
		// for director and BH
		if($this->Session->read('USER.Login.roles_id') == '33' || $this->Session->read('USER.Login.roles_id') == '38'){
			$show = 'all';
			$team_cond = false;
		}else{
			$team_cond = true;
		}
		
		// get the team members
		$result = $this->Position->get_team($this->Session->read('USER.Login.id'),$show);
		if(!empty($result)){
			$this->set('approveUser', '1');
			// for drop down listing
			$format_list = $this->Functions->format_dropdown($result, 'u','id','first_name', 'last_name');
			$this->set('empList', $format_list);
			$data[] =  $this->Session->read('USER.Login.id');
			foreach($result as $rec){
				$data[] =  $rec['u']['id'];
			}
			if($team_cond){
				$teamCond = array('OR' => array(
					'ReqResume.created_by' =>  $data,
					'ReqTeam.users_id' => $data,
					'AH.users_id' => $data					
					)
				);
			}
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
		
	
		
		// set keyword condition
		if($this->params->query['keyword'] != ''){
			$keyCond = array("MATCH (Client.client_name,job_title,Creator.first_name) AGAINST ('".$this->Functions->format_search_keyword($this->params->query['keyword'])."' IN BOOLEAN MODE)"); 
		}
		// for client contact condition
		if($contact_id != ''){ 
			$contactCond = array('Position.client_contact_id' => $contact_id);
			$this->set('noHead', '1');
			$date_cond = array('or' => array("DATE_FORMAT(ReqResume.created_date, '%Y-%m-%d') between ? and ?" => 
					array($this->Functions->format_date_save($start), $this->Functions->format_date_save($end_search))));
		
			//unset($date_cond);
			
		}
		// for branch condition
		if($this->request->query['loc'] != ''){ 
			$branchCond = array('Creator.location_id' => $this->request->query['loc']);
		}
		// for employee condition
		if($this->request->query['emp_id'] != ''){ 
			$empCond = array('ReqResume.created_by' => $this->request->query['emp_id']);
		}else if($this->Session->read('USER.Login.rights') != '5'){			
			// $empCond = array('ReqResume.created_by' => $this->Session->read('USER.Login.id'));
		}
		
		// for status condition
		if($this->request->query['status'] != ''){ 
			$st = $this->request->query['status'] == '10' ? '0' : $this->request->query['status'];
			$stCond = array('Position.req_status_id' => $st);
		}
		// for unread status count
		if($this->request->query['unread'] == '1'){
			$stCond = array('Read.users_id' => $this->Session->read('USER.Login.id'), 'Read.status' => 'U');
		}
		
		$this->request->query['keyword'] = str_replace('||', '&', $this->params->query['keyword']);		
		$this->request->query['from'] = $start;
		$this->request->query['to'] = $end;
		// for iframe in report
		if($this->request->query['iframe'] == '1'){
			$this->set('noHead', '1');
			$date_cond = array('or' => array("DATE_FORMAT(ReqResume.created_date, '%Y-%m-%d') between ? and ?" => 
					array($this->Functions->format_date_save($start), $this->Functions->format_date_save($end_search))));
			
		}
		$aprCond = array('Position.is_approve' => 'A', 'Position.status' => 'A');
		// for export
		if($this->request->query['action'] == 'export'){
			$data = $this->Position->find('all', array('fields' => $fields,'conditions' => 
			array($keyCond,$date_cond,$branchCond,$empCond,$stCond,$teamCond,$contactCond), 
			'order' => array('created_date' => 'desc'), 'group' => array('Position.id'), 'joins' => $options));
			$this->Excel->generate('positions', $data, $data, 'Report', 'Position');
		}
		
		$this->paginate = array('fields' => $fields,'limit' => '25','conditions' => array($aprCond,$keyCond,$date_cond,$branchCond,$empCond,$stCond,$contactCond,$teamCond),
		'order' => array('created_date' => 'desc'),	'group' => array('Position.id'), 'joins' => $options);
		$data = $this->paginate('Position');
		$this->set('data', $data);
		if(empty($data)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Oops! No Positions Found!', 'default', array('class' => 'alert alert-info'));
		}
		
	}
	
	/* function to add the position */
	public function add(){ 
		$this->check_role_access(4);
		// set the page title		
		$this->set('title_for_layout', 'Create Position - Positions - CT Hiring');	
		$this->load_static_data();
		// get exp list
		$this->set('expList', $this->Functions->get_experience());
		// assign the ctc type
		$this->set('ctcList', array('T' => 'Thousands', 'L' => 'Lacs'));
		if ($this->request->is('post')){
			// validates the form
			$this->request->data['Position']['created_by'] = $this->Session->read('USER.Login.id');
		    $this->request->data['Position']['created_date'] = $this->Functions->get_current_date();
			$this->Position->set($this->request->data);
			// retain the district
			$this->get_contact_list($this->request->data['Position']['clients_id']);
			// validate the client contacts
			// $coord_validate = $this->validate_coord();
			// validate the form fields
			if ($this->Position->validates(array('fieldList' => array('clients_id','client_contact_id','job_title','location','max_exp',
			'ctc_to_type','skills','no_job','team_member_req','end_date','function_area_id','status','job_desc','education')))){
				// format the dates
				$this->request->data['Position']['start_date'] = $this->Functions->format_date_save($this->request->data['Position']['start_date']);
				$this->request->data['Position']['end_date'] = $this->Functions->format_date_save($this->request->data['Position']['end_date']);
				// save the data
				if($this->Position->save($this->request->data['Position'])){
					// save position coordination
					// $this->save_position_coodination($this->Position->id);
					// save team members list
					$this->save_team_member($this->Position->id);					
					// save the file name
					$this->save_job_desc($this->Position->id);
					$this->Position->saveField('job_desc_file', $this->Position->id.'_'.$this->request->data['Position']['desc_file']['name']);
					// show the msg.
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Position created successfully', 'default', array('class' => 'alert alert-success'));				
					$this->redirect('/position/');
				}else{
					// show the error msg.
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));					
				}
			}else{
				// print_r($this->Position->validationErrors);die;
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Please check the validation errors...', 'default', array('class' => 'alert alert-error'));					
			}			
		}				
	}
	
	/* function to save the JD */
	public function save_job_desc($id){
		// save the attachment
		if(!empty($this->request->data['Position']['desc_file']['tmp_name'])){
			$src = $this->request->data['Position']['desc_file']['tmp_name'];
			$dest = 'uploads/jd/'.$id.'_'.$this->request->data['Position']['desc_file']['name'];
			$this->upload_file($src, $dest);
			// save the file name
			$this->Position->saveField('job_desc_file', $id.'_'.$this->data['Position']['desc_file']['name']);							
		}
	}
	
	
	/* function to edit the position */
	public function edit($id){
		// set the page title		
		$this->set('title_for_layout', 'Edit Position - Positions - CT Hiring');	
		if(!empty($id) && intval($id)){
			// authorize user before action
			$ret_value = $this->auth_action($id);
			if($ret_value == 'pass'){
				$this->load_static_data();
				// get exp list
				$this->set('expList', $this->Functions->get_experience());
				// assign the ctc type
				$this->set('ctcList', array('T' => 'Thousands', 'L' => 'Lacs'));
				if (!empty($this->request->data)){
					// validates the form
					$this->request->data['Position']['modified_by'] = $this->Session->read('USER.Login.id');
					$this->request->data['Position']['modified_date'] = $this->Functions->get_current_date();
					$this->Position->set($this->request->data);
					// retain the district
					$this->get_contact_list($this->request->data['Position']['clients_id']);
					// validate the client contacts
					// $coord_validate = $this->validate_coord();
					// validate the form fields
					if ($this->Position->validates(array('fieldList' => array('clients_id','client_contact_id','job_title','location','max_exp',
					'ctc_from','ctc_to','ctc_from_type','ctc_to_type','skills','no_job','team_member_req','end_date','function_area_id','job_desc','education')))){
						// format the dates
						$this->request->data['Position']['start_date'] = $this->Functions->format_date_save($this->request->data['Position']['start_date']);
						$this->request->data['Position']['end_date'] = $this->Functions->format_date_save($this->request->data['Position']['end_date']);
						// save the data
						if($this->Position->save($this->request->data['Position'])){
							// save the file name
							$this->save_job_desc($this->Position->id);
							// remove position coordination
							// $this->remove_position_coodination($this->Position->id);
							// save position coordination
							// $this->save_position_coodination($this->Position->id);
							// remove team members list
							$this->remove_team_member($this->Position->id);
							// save team members list
							$this->save_team_member($this->Position->id);
							// show the msg.
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Position modified successfully', 'default', array('class' => 'alert alert-success'));				
							$this->redirect('/position/');
						}else{
							// show the error msg.
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));					
						}
					}else{
						// print_r($this->Position->validationErrors);die;
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Please check the validation errors...', 'default', array('class' => 'alert alert-error'));					
					}			
				}else{
					// get the position details
					$data = $this->Position->find('all', array('fields' => array('Position.id','clients_id','client_contact_id','job_title','location','min_exp','max_exp',
					'ctc_from','ctc_to','education','ctc_from_type','ctc_to_type','skills','no_job','start_date','end_date','function_area_id','job_desc','job_desc_file'), 
					'conditions' => array('Position.id' => $id), 'joins' => $options));
					$this->request->data = $data[0];
					$this->request->data['Position']['start_date'] = $this->Functions->format_date_show($this->request->data['Position']['start_date']);
					$this->request->data['Position']['end_date'] = $this->Functions->format_date_show($this->request->data['Position']['end_date']);
					// retain the client contacts
					$this->get_contact_list($this->request->data['Position']['clients_id']);
					// retain the account holder
					$this->get_team_member_list($id);
					// fetch the contacts
					/*
					$this->loadModel('PositionCoord');
					$data = $this->PositionCoord->find('all', array('fields' => array('users_id', 'requirements_id', 'inc_sharing_id','percent'),
					'conditions' => array('PositionCoord.requirements_id ' => $id),
					'order' => array('PositionCoord.id' => 'asc'),'joins' => $options));
					$this->set('count_coord', count($data));
					$this->set('coord_list', $data);
					*/
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
			$this->redirect('/position/');	
		}				
	}
	
	/* function to download the file */
	public function download_doc($file){
		 $this->download_file(WWW_ROOT.'/uploads/jd/'.$file);
		 die;
	}
	
	/* function to auth record */
	public function auth_action($id){ 	
		$data = $this->Position->findById($id, array('fields' => 'created_by','is_deleted','modified_date'));	
		// check the req belongs to the user
		if($data['Position']['is_deleted'] == 'Y'){
			return $data['Position']['modified_date'];
		}		
		else if($data['Position']['created_by'] == $this->Session->read('USER.Login.id')){	
			return 'pass';
		}else{
			return 'fail';
		}
	}
	
	/* function to save position coordination */
	public function save_position_coodination($position_id){
		for($i = 0; $i < $this->request->data['Position']['position_count']; $i++){ 
			if($this->request->data['Position']['employee_'.$i] != ''){ 
				$this->loadModel('PositionCoord');
				$data = array('users_id' => $this->request->data['Position']['employee_'.$i],'percent' => $this->request->data['Position']['percent_'.$i],
				'requirements_id' => $position_id,'inc_sharing_id' => $this->request->data['Position']['coordination_'.$i]);
				$this->PositionCoord->create();
				if($this->PositionCoord->save($data, true, $fieldList = array('percent','inc_sharing_id','users_id','requirements_id'))){
						
				}
			}		
		}
		
	}
	
	/* function to remove the position coordination */
	public function remove_position_coodination($id){
		$this->loadModel('PositionCoord');		
		$this->PositionCoord->deleteAll(array('PositionCoord.requirements_id' => $id), false);
	}
	
	/* function to remove the team members */
	public function remove_team_member($id){
		$this->loadModel('ReqTeam');		
		$this->ReqTeam->deleteAll(array('ReqTeam.requirements_id' => $id), false);
	}
	
	/* function to save team member */
	public function save_team_member($id){
		$this->loadModel('ReqTeam');
		foreach($this->request->data['Position']['team_member_req'] as $holder){ 
			$this->ReqTeam->create();
			$data = array('created_by' => $this->Session->read('USER.Login.id'),'requirements_id' => $id, 'users_id' => $holder);
			$this->ReqTeam->save($data, true, $fieldList = array('requirements_id','created_by','users_id'));
		}
	}
	
	
	
	
	
	/* function to validate the position coordination */
	public function validate_coord(){
		$er_flag = true;		
		for($i = 0; $i < $this->request->data['Position']['position_count']; $i++){
			if($this->request->data['Position']['percent_'.$i] == ''){
				$error[$i]['percent'] = 'Please enter the percent of work';
				$er_flag = false;
			}			
			if($this->request->data['Position']['employee_'.$i] == ''){
				$error[$i]['emp'] = 'Please select the employee';
				$er_flag = false;
			}
			if($this->request->data['Position']['coordination_'.$i] == ''){
				$error[$i]['coord'] = 'Please select the coordination';
				$er_flag = false;
			}			
		}
		$this->set('errorData', $error);
		return $er_flag;
	}
	
	/* function to get the team members list */
	public function get_team_member_list($id){
		$this->loadModel('ReqTeam');
		$team_member = $this->ReqTeam->find('all', array('fields' => array('users_id'), 'conditions' => array('requirements_id' => $id)));
		foreach($team_member as $record){
			$users[] = $record['ReqTeam']['users_id'];
		}
		$this->set('usersSel', $users);
	}
	
	/* function to load the contacts */
	public function get_contact_list($id){
		$this->loadModel('Contact');
		$options = array(		
			array('table' => 'client_contact',
					'alias' => 'ClientCont',					
					'type' => 'LEFT',
					'conditions' => array('`ClientCont`.`contact_id` = `Contact`.`id`')
			)
		);
		$con_list = $this->Contact->find('all', array('fields' => array('id',"concat(first_name,' ',last_name) uname"),
		'order' => array('first_name ASC'),'conditions' => array('status' => '1', 'is_deleted' => 'N',
		'ClientCont.clients_id' => $id), 'joins' => $options));
		$format_list = $this->Functions->format_list_key($con_list, 'Contact','id', 'uname');
		$this->set('spocList', $format_list);
	}
	
	/* function to load static data */
	public function load_static_data(){
		// load the clients
		$client_list = $this->Position->Client->find('list', array('fields' => array('id','client_name'), 
		'order' => array('client_name ASC'),'conditions' => array('is_deleted' => 'N', 'status' => '0')));
		$this->set('clientList', $client_list);
		// load the account holders
		$ac_list = $this->Position->Creator->find('list',  array('fields' => array('id','first_name'), 
		'order' => array('first_name ASC'),'conditions' => array('status' => '0', 'roles_id' => '34')));
		$this->set('acList', $ac_list);
		// load the team members
		$user_list = $this->Position->Creator->find('list',  array('fields' => array('id','first_name'), 
		'order' => array('first_name ASC'),'conditions' => array('status' => '0')));
		$this->set('userList', $user_list);
		// load the functional area
		$function_list = $this->Position->FunctionArea->find('list', array('fields' => array('id','function'), 
		'order' => array('function ASC'),'conditions' => array('is_deleted' => 'N', 'status' => '1')));
		$this->set('functionList', $function_list);
		// get the sharing details
		$this->loadModel('Coordination');
		/*
		$coord_list = $this->Coordination->find('list',  array('fields' => array('id','type'), 
		'order' => array('id ASC'),'conditions' => array('is_deleted' => 'N', 'status' => '1')));
		$this->set('coordList', $coord_list);
		*/

	}
	
	/* function to get the location details */
	public function get_loc_details(){
		$this->loadModel('Location');
		return $this->Location->find('list',  array('fields' => array('id','location'), 'order' => array('location ASC'),'conditions' => array('status' => 1)));

	}
	
	
	/* function to view the position */
	public function view($id){	
		// set the page title
		$this->set('title_for_layout', 'View Positions - CT Hiring');
		$this->set('stList', $this->get_status_details());
		// get the team members
		$result = $this->Position->get_team($this->Session->read('USER.Login.id'),$show);
		if(!empty($result)){
			$this->set('approveUser', '1');
			// for drop down listing
			$format_list = $this->Functions->format_dropdown($result, 'u','id','first_name', 'last_name');
			$this->set('empList', $format_list);
			$data[] =  $this->Session->read('USER.Login.id');
			foreach($result as $rec){
				$data[] =  $rec['u']['id'];
			}
			if($team_cond){
				$teamCond = array('OR' => array(
					'ReqResume.created_by' =>  $data,
					'ReqTeam.users_id' => $data,
					'AH.users_id' => $data					
					)
				);
			}
		}
		$options = array(			
			/*
			array('table' => 'users',
					'alias' => 'ResOwner',					
					'type' => 'LEFT',
					'conditions' => array('`ResOwner.id` = `ReqResume`.`created_by`')
			),
			*/
			array('table' => 'client_contact',
					'alias' => 'PositionContact',					
					'type' => 'LEFT',
					'conditions' => array('`PositionContact.clients_id` = `Client`.`id`',
					'`Position.client_contact_id` = `PositionContact`.`contact_id`')
			),
			array('table' => 'contact',
					'alias' => 'Contact',					
					'type' => 'LEFT',
					'conditions' => array('`Contact.id` = `PositionContact`.`contact_id`')
			),
			array('table' => 'client_account_holder',
					'alias' => 'CAH',					
					'type' => 'INNER',
					'conditions' => array('`CAH.clients_id` = `Client`.`id`')
			),
			array('table' => 'users',
					'alias' => 'AH',					
					'type' => 'INNER',
					'conditions' => array('`CAH.users_id` = `AH`.`id`', )
			),
			array('table' => 'req_team',
					'alias' => 'ReqTeam',					
					'type' => 'INNER',
					'conditions' => array('`ReqTeam.requirements_id` = `Position`.`id`', )
			),
			array('table' => 'users',
					'alias' => 'TeamMember',					
					'type' => 'INNER',
					'conditions' => array('`ReqTeam.users_id` = `TeamMember`.`id`', )
			)
		);
		$fields = array('id','job_title','job_code','education','location','no_job','min_exp','max_exp','ctc_from','ctc_to','ReqStatus.title',
		'Client.client_name', 'Creator.first_name','created_date','modified_date', 'count(DISTINCT  ReqResume.id) cv_sent','req_status_id',
		'group_concat(ReqResume.status_title) joined', 'start_date', 'end_date', //"group_concat(distinct ResOwner.first_name  SEPARATOR ', ') team_member",
		"group_concat(distinct AH.first_name  SEPARATOR ', ') ac_holder","group_concat(distinct TeamMember.first_name  SEPARATOR ', ') team_member2",
		'skills','Contact.first_name','Contact.email','Contact.mobile','Contact.phone','Contact.id','FunctionArea.function',
		'Position.created_by');
		$data = $this->Position->find('all', array('fields' => $fields,'conditions' => array('Position.id' => $id), 'joins' => $options));
		$this->set('position_data', $data[0]);
		// get the resume details
		$options = array(					
			array('table' => 'res_location',
					'alias' => 'ResLoc',					
					'type' => 'LEFT',
					'conditions' => array('`ResLoc`.`id` = `Resume`.`res_location_id`')
			),
			
			array('table' => 'users',
					'alias' => 'Creator',					
					'type' => 'LEFT',
					'conditions' => array('`Creator`.`id` = `ReqResume`.`created_by`')
			),
			array(
				'table' => 'resume_doc',
				'alias' => 'ResDoc',					
				'type' => 'LEFT',
				'conditions' => array('`ResDoc`.`id` = `Resume`.`resume_doc_id`')
			)
		);		
		$data = $this->Position->ReqResume->find('all', array('fields' => array('Resume.id','Resume.first_name',
		'Resume.last_name','ReqResume.status_title','ReqResume.stage_title',
		'ReqResume.created_date','Resume.mobile','Resume.email_id','Resume.present_ctc','Resume.expected_ctc',
		'Resume.notice_period','ResLoc.location','Creator.first_name','ReqResume.modified_date','ReqResume.bill_ctc','ResDoc.resume',
		'Resume.present_location','Resume.present_ctc_type','Resume.expected_ctc_type'),
		'conditions' => array('requirements_id' => $id),
		'order' => array('Resume.created_date' => 'desc'),'group' => array('ReqResume.id'), 'joins' => $options));		
		$this->set('resume_data', $data);	
		
	}
	
	/* function to send CV to client */
	public function send_cv($res_id, $pos_id){ 
		$this->layout = 'framebox';
		// when the values are not empty
		if(!empty($res_id) && !empty($pos_id)){
			$options = array(			
			array('table' => 'resume',
					'alias' => 'Resume',					
					'type' => 'LEFT',
					'conditions' => array('`Resume`.`id` = `ReqResume`.`resume_id`')
			),
			array(
				'table' => 'resume_doc',
				'alias' => 'ResDoc',					
				'type' => 'LEFT',
				'conditions' => array('`ResDoc`.`id` = `Resume`.`resume_doc_id`')
				),
			array(
				'table' => 'res_location',
				'alias' => 'ResLocation',					
				'type' => 'LEFT',
				'conditions' => array('`ResLocation`.`id` = `Resume`.`res_location_id`')
				)
				,
			array(
				'table' => 'designation',
				'alias' => 'Designation',					
				'type' => 'LEFT',
				'conditions' => array('`Designation`.`id` = `Resume`.`designation_id`')
				)	
				,
			array(
				'table' => 'contact',
				'alias' => 'Contact',					
				'type' => 'LEFT',
				'conditions' => array('`Contact`.`id` = `Position`.`client_contact_id`')
				)
			);
			$fields = array('Resume.first_name','Resume.last_name','Resume.email_id','Resume.mobile','Resume.mobile2','Resume.total_exp','Resume.education','Resume.present_employer',
			'ResLocation.location', 'Resume.present_ctc','Resume.expected_ctc', 'Creator.first_name','Resume.created_date','Resume.notice_period',
			'Resume.modified_date','ReqResume.stage_title','ReqResume.status_title','Designation.designation','Resume.present_ctc_type','Resume.expected_ctc_type',
			'Resume.gender','Resume.marital_status','Resume.family','Resume.present_location','Resume.native_location', 'Resume.dob','Resume.consultant_assess',
			'Resume.interview_avail','ResDoc.resume','Position.job_title','Position.location','Position.job_desc','Contact.first_name'
			,'Contact.mobile');
			$cand_data = $this->Position->find('all', array('fields' => $fields,'conditions' => array('Resume.id' => $res_id),
			'joins' => $options));
			// print_r($cand_data);
			$cand_name = ucwords($cand_data[0]['Resume']['first_name'].' '.$cand_data[0]['Resume']['last_name']);
			$this->set('candidate_name', $cand_name);
			// get resume education details
			$this->loadModel('ResEdu');
			$edu_data = $this->ResEdu->find('all', array('conditions' => array('resume_id' => $res_id), 'fields' => array('percent_mark','year_passing','college',
			'course_type','university','location','ResDegree.degree','ResSpec.spec'), 'order' => array('ResEdu.id' => 'desc')));
			// get resume experience details
			$this->loadModel('ResExp');
			$exp_data = $this->ResExp->find('all', array('conditions' => array('resume_id' => $res_id), 'fields' => array('experience','work_location','skills',
			'company','other_info','Designation.designation'), 'order' => array('ResExp.id' => 'desc')));
			// get the mail template details
			$this->loadModel('MailTemplate');
			$data = $this->MailTemplate->findById('1', array('fields' => 'subject','message'));
			$loc = $cand_data[0]['ResLoc']['location'] ? $cand_data[0]['ResLoc']['location'] : $cand_data[0]['Resume']['present_location'];
			$tags = array('[candidate_name]','[mobile]','[email_id]','[position]','[address]','[location]','[designation]','[experience]',
			'[client]','[client_contact_name]','[client_contact_no]','[job_location]','[job_desc]','[function]','[today_date]');
			$template_data = array($cand_name,$cand_data[0]['Resume']['mobile'],$cand_data[0]['Resume']['email_id'], 
			$cand_data[0]['Position']['job_title'],
			$cand_data[0]['Position']['address1']. '<br>'.$cand_data[0]['Position']['address2'],$loc,
			$cand_data[0]['Designation']['designation'],$this->Functions->check_exp($cand_data[0]['Position']['total_exp']),
			$cand_data[0]['Client']['client_name'],$cand_data[0]['Contact']['first_name'],$cand_data[0]['Contact']['mobile'],
			$cand_data[0]['Position']['location'],$cand_data[0]['Position']['job_desc'],$cand_data[0]['FunctionArea']['function'],
			date('d-M, Y'));
			$body_text = str_replace($tags, $template_data, $data['MailTemplate']['message']);
			$subject_text = str_replace($tags, $template_data, $data['MailTemplate']['subject']);
			$this->set('subject', $subject_text);
			$this->set('body', $body_text);

		}
		if(!empty($this->request->data)){
			// get the req. resume id
			$this->loadModel('ReqResume');
			$req_res_id = $this->ReqResume->find('all', array('fields' => array('ReqResume.id'), 
			'conditions' => array('requirements_id' => $pos_id, 'resume_id' => $res_id)));
			// save req resume table
			$data = array('id' => $req_res_id[0]['ReqResume']['id'], 'resume_id' => $res_id, 'requirements_id' => $pos_id, 'created_date' => $this->Functions->get_current_date(),
			'created_by' => $this->Session->read('USER.Login.id'),
			'stage_title' => 'Shortlist', 'status_title' => 'CV-Sent');
			// save  req resume
			if($this->ReqResume->save($data, array('validate' => false))){		
				// save req resume status
				$this->loadModel('ReqResumeStatus');
				$data = array('req_resume_id' => $req_res_id[0]['ReqResume']['id'], 'created_date' => $this->Functions->get_current_date(),
				'created_by' => $this->Session->read('USER.Login.id'), 'stage_title' => 'Shortlist', 'status_title' => 'CV-Sent');
				if($this->ReqResumeStatus->save($data, array('validate' => false))){
					// send mail to client 
					
					// if successfully update
					$this->set('cv_update_status', 1);
				}
			}
		}
	}
	
	
	public function update_cv($id, $st){
		$this->layout = 'framebox';
		if(!empty($this->request->data)){
			$status = $st == 'cv_shortlist' ? 'Shortlisted' : 'Rejected';
			$data = array('status_title' => $status, 
			'created_date' => $this->Functions->get_current_date(),'modified_date' => $this->Functions->get_current_date());		
			if ($this->request->is('post') && $st != '') { 
				// update the todo
				if($this->Client->save($data, array('validate' => false))){		
					$this->set('form_status', '1');
				}
			}
		}
	}
	
	public function update_interview($st, $id){
		$this->layout = 'framebox';
		if(!empty($this->request->data)){
			$status = $st == 'approve' ? '0' : '1';
			$data = array('id' => $id, 'status' => $status, 'approve_date' => $this->Functions->get_current_date(),
			'is_approve' => 'A');		
			if ($this->request->is('post') && $st != '') { 
				// update the todo
				if($this->Client->save($data, array('validate' => false))){		
					$this->set('form_status', '1');
				}
			}
		}
	}
	
	public function interview_schedule($st, $id){
		$this->layout = 'framebox';
		if(!empty($this->request->data)){
			$status = $st == 'approve' ? '0' : '1';
			$data = array('id' => $id, 'status' => $status, 'approve_date' => $this->Functions->get_current_date(),
			'is_approve' => 'A');		
			if ($this->request->is('post') && $st != '') { 
				// update the todo
				if($this->Client->save($data, array('validate' => false))){		
					$this->set('form_status', '1');
				}
			}
		}
	}
	
	public function update_joining($st, $id){
		$this->layout = 'framebox';
		if(!empty($this->request->data)){
			$status = $st == 'approve' ? '0' : '1';
			$data = array('id' => $id, 'status' => $status, 'approve_date' => $this->Functions->get_current_date(),
			'is_approve' => 'A');		
			if ($this->request->is('post') && $st != '') { 
				// update the todo
				if($this->Client->save($data, array('validate' => false))){		
					$this->set('form_status', '1');
				}
			}
		}
	}
	
	
	
	/* function to load the districts options */
	public function get_contact(){
		$this->layout = 'ajax';
		$this->load_contact($this->request->query['id']);
		$this->render(false);
		die;
	}
	
	/* function to load the districts options */
	public function get_account_holder(){
		$this->layout = 'ajax';
		$this->load_ach($this->request->query['id']);
		$this->render(false);
		die;
	}
	
	
	/* function to load the account holder */
	public function load_ach($id){ 
		$this->loadModel('ClientAccountHolder');		
		$ac_list = $this->ClientAccountHolder->find('all', array('fields' => array("group_concat(User.first_name separator ', ') ach"),
		'order' => array('first_name ASC'),'conditions' => array('ClientAccountHolder.clients_id' => $id)));	
		echo $ac_list[0][0]['ach'];
	}
	
	
	/* function to load the districts options */
	public function load_contact($id){
		$this->loadModel('Contact');
		$options = array(		
			array('table' => 'client_contact',
					'alias' => 'ClientCont',					
					'type' => 'LEFT',
					'conditions' => array('`ClientCont`.`contact_id` = `Contact`.`id`')
			)
		);
		$loc_list = $this->Contact->find('all', array('fields' => array('id','first_name','last_name'),
		'order' => array('first_name ASC'),'conditions' => array('status' => '1', 'is_deleted' => 'N',
		'ClientCont.clients_id' => $id), 'joins' => $options));
		$select .= "<option value=''>Choose SPOC</option>";
		foreach($loc_list as $record){ 
			$select .= "<option value='".$record['Contact']['id']."'>".ucwords($record['Contact']['first_name'].' '.$record['Contact']['last_name'])."</option>";
		}
		echo $select;
	}
	
	
	/* auto complete search */	
	public function search(){ 
		$this->layout = false;		
		$q = trim(Sanitize::escape($_GET['q']));	
		if(!empty($q)){
			// execute only when the search keywork has value		
			$this->set('keyword', $q);
			$start = date('Y-m-d H:i:s', strtotime('-6 months'));
			$end = date('Y-m-d', strtotime('+1 day'));
			// last year condition
			$date_cond = array('or' => array("Position.created_date between ? and ?" => 
					array($start, $end)));
			$this->Position->unBindModel(array('belongsTo' => array('Contact','Creator'), 'hasOne' => array('ReqResume')));
			$data = $this->Position->find('all', array('fields' => array('Client.client_name','job_title'),
			'group' => array('Client.client_name','job_title'), 'conditions' => 	array("OR" => array ('Client.client_name like' => '%'.$q.'%',
			'job_title like' => '%'.$q.'%'), 'AND' => array('Position.is_deleted' => 'N',$date_cond))));		
			$this->set('results', $data);
		}
    }
	
	/* function to view the messages */
	public function view_message($id){
		$this->set('noHead', '1');
		$this->loadModel('Message');
		$this->get_message($id);
		// update read status
		$this->loadModel('Read');
		$this->Read->updateAll(array('status' => "'R'",  'modified_date' => '"'.$this->Functions->get_current_date().'"'), array('requirements_id' => $id, 'users_id' => $this->Session->read('USER.Login.id')));

	}
	
	/* function to save the bd reply */
	public function save_reply(){ 
		$this->layout = false;		
		if ($this->request->is('post') && $this->request->data['reply'] != '') { 
			$data = array('requirements_id' => $this->request->query['id'], 'message' => trim($this->request->data['reply']), 'created_date' => $this->Functions->get_current_date(), 'users_id' => $this->Session->read('USER.Login.id'));		
			$this->loadModel('Message');			
			// update the todo
			if($this->Message->save($data, true, $fieldList = array('requirements_id', 'message','created_date','users_id'))){			
				$this->get_message($this->request->query['id']);
				// update unread status
				$this->update_read_status($this->request->query['id']);
				
			}
		}
		$this->render('/Elements/reply_msg/');	
	}
	
	/* get the reply of tasks */
	public function get_message($id){
		$data = $this->Message->find('all', array('conditions' => array('requirements_id' => $id), 'fields' => array('message','created_date', 
		'Creator.first_name','Creator.last_name'), 'order' => array('created_date' => 'desc')));
		$this->set('reply_data', $data);
	}
	
	/* function to update the update read status */
	public function update_read_status($id){
		$this->loadModel('Read');
		if($this->Session->read('USER.Login.rights') == '5'){			
			// get cv owners
			$user_data = $this->Position->ReqResume->find('all', array('fields' => array('ReqResume.created_by'),
			'conditions' => array('ReqResume.requirements_id' => $id), 'group' => array('ReqResume.created_by')));
			// iterate the user data
			foreach($user_data as $user){
				// check exists
				if(!$this->check_read_exists($id, $user['ReqResume']['created_by'])){
					$data = array('requirements_id' => $id, 'created_date' => $this->Functions->get_current_date(),
					'status' => 'U', 'users_id' => $user['ReqResume']['created_by']);
					$this->Read->save($data);
					$this->Read->create();
				}else{
					$this->Read->updateAll(array('status' => "'U'",  'modified_date' => '"'.$this->Functions->get_current_date().'"'), array('requirements_id' => $id, 'users_id' => $user['ReqResume']['created_by']));
				}
			}
		}else{
			// get other users			
			$user_data = $this->Position->Creator->find('all', array('fields' => array('Creator.id'),
			'conditions' => array('Creator.rights' => '5', 'Creator.status' => '0'), 'group' => array('Creator.id')));
			foreach($user_data as $user){
				// check exists
				if(!$this->check_read_exists($id, $user['Creator']['id'])){
					$data = array('requirements_id' => $id, 'created_date' => $this->Functions->get_current_date(),
					'status' => 'U', 'users_id' => $user['Creator']['id']);
					$this->Read->save($data);
					$this->Read->create();
				}else{
					$this->Read->updateAll(array('status' => "'U'",  'modified_date' => '"'.$this->Functions->get_current_date().'"'), array('requirements_id' => $id, 'users_id' => $user['Creator']['id']));
				}
			}
		}
	}
	
	/* function to check read exists */
	public function check_read_exists($id, $user){
		return $this->Read->find('count', array('conditions' => array('requirements_id' => $id, 'users_id' => $user)));
	}
	
	/* function to send the message */
	public function send_message(){
		
	}
	
	// check the role permissions
	public function beforeFilter(){ 
		$this->check_session();
		$this->check_role_access(5);
		
	}
}