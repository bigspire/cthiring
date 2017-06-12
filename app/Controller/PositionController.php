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
			$url_vars = $this->Functions->create_url(array('keyword','from','to','loc','emp_id','status'),'Position'); 			
			$this->redirect('/position/?'.$url_vars);				
		}
		
		// set the page title
		$this->set('title_for_layout', 'Positions - CT Hiring - ES');
		$this->set('empList', $this->Position->get_employee_details());	
		$this->set('locList', $this->get_loc_details());
		$this->set('stList', array('10' => 'Planned', '1' => 'In-Process', '2' => 'On-Hold', '3' => 'Closed', '4' => 'Cancelled', '5' => 'Unread'));			
		$fields = array('id','job_title','location','no_job','min_exp','max_exp','ctc_from','ctc_to','ReqStatus.title','req_status_id',
		'Client.client_name','team_member', 'Creator.first_name','created_date','modified_date', 'count(ReqResume.id) cv_sent',
		'group_concat(ReqResume.status_title) joined','count(distinct Read.id) read_count', "group_concat(distinct ResOwner.first_name  SEPARATOR ', ') team_member");
				
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
			)
		);
		
		$start = $this->request->query['from'] ? $this->request->query['from'] : date('d/m/Y', strtotime('-15 month'));
		$end = $this->request->query['to'] ? $this->request->query['to'] : date('d/m/Y');
		$end_search = $this->request->query['to'] ? $this->request->query['to'] : date('d/m/Y', strtotime('+1 day'));
		// set date condition
		$date_cond = array('or' => array("DATE_FORMAT(Position.created_date, '%Y-%m-%d') between ? and ?" => 
					array($this->Functions->format_date_save($start), $this->Functions->format_date_save($end_search))));
			
		// set keyword condition
		if($this->params->query['keyword'] != ''){
			$keyCond = array("MATCH (Position.client_name,job_title) AGAINST ('".$this->Functions->format_search_keyword($this->params->query['keyword'])."' IN BOOLEAN MODE)"); 
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
		if($this->request->query['status'] != '' && $this->request->query['status'] != '5'){ 
			$st = $this->request->query['status'] == '10' ? '0' : $this->request->query['status'];
			$stCond = array('Position.req_status_id' => $st);
		}else if($this->request->query['status'] == '5'){
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
		// for export
		if($this->request->query['action'] == 'export'){
			$data = $this->Position->find('all', array('fields' => $fields,'conditions' => 
			array($keyCond,$date_cond,$branchCond,$empCond,$stCond), 
			'order' => array('created_date' => 'desc'), 'group' => array('Position.id'), 'joins' => $options));
			$this->Excel->generate('positions', $data, $data, 'Report', 'Position');
		}
		
		$this->paginate = array('fields' => $fields,'limit' => '25','conditions' => array($keyCond,$date_cond,$branchCond,$empCond,$stCond,$contactCond),
		'order' => array('created_date' => 'desc'),	'group' => array('Position.id'), 'joins' => $options);
		$data = $this->paginate('Position');
		$this->set('data', $data);
		if(empty($data)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Oops! No Positions Found!', 'default', array('class' => 'alert alert-info'));
		}
		
	}
	
	/* function to add the position */
	public function add(){ 
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
			$coord_validate = $this->validate_coord();
			// validate the form fields
			if ($this->Position->validates(array('fieldList' => array('clients_id','client_contact_id','job_title','location','max_exp',
			'ctc_to_type','skills','no_job','team_member_req','end_date','function_area_id','status','job_desc'))) && $coord_validate){
				// format the dates
				$this->request->data['Position']['start_date'] = $this->Functions->format_date_save($this->request->data['Position']['start_date']);
				$this->request->data['Position']['end_date'] = $this->Functions->format_date_save($this->request->data['Position']['end_date']);
				// save the data
				if($this->Position->save($this->request->data['Position'])){
					// save position coordination
					$this->save_position_coodination($this->Position->id);
					// save team members list
					$this->save_team_member($this->Position->id);
					// save the file name
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
					$this->request->data['Position']['created_by'] = $this->Session->read('USER.Login.id');
					$this->request->data['Position']['created_date'] = $this->Functions->get_current_date();
					$this->Position->set($this->request->data);
					// retain the district
					$this->get_contact_list($this->request->data['Position']['clients_id']);
					// validate the client contacts
					$coord_validate = $this->validate_coord();
					// validate the form fields
					if ($this->Position->validates(array('fieldList' => array('clients_id','client_contact_id','job_title','location','max_exp',
					'ctc_from','ctc_to','ctc_from_type','ctc_to_type','skills','no_job','team_member_req','end_date','function_area_id','job_desc'))) && $coord_validate){
						// format the dates
						$this->request->data['Position']['start_date'] = $this->Functions->format_date_save($this->request->data['Position']['start_date']);
						$this->request->data['Position']['end_date'] = $this->Functions->format_date_save($this->request->data['Position']['end_date']);
						// save the data
						if($this->Position->save($this->request->data['Position'])){
							// remove position coordination
							$this->remove_position_coodination($this->Position->id);
							// save position coordination
							$this->save_position_coodination($this->Position->id);
							// remove team members list
							$this->remove_team_member($this->Position->id);
							// save team members list
							$this->save_team_member($this->Position->id);
							// save the file name
							$this->Position->saveField('job_desc_file', $this->Position->id.'_'.$this->data['Position']['desc_file']['name']);
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
					'ctc_from','ctc_to','education','ctc_from_type','ctc_to_type','skills','no_job','start_date','end_date','function_area_id','job_desc'), 
					'conditions' => array('Position.id' => $id), 'joins' => $options));
					$this->request->data = $data[0];
					$this->request->data['Position']['start_date'] = $this->Functions->format_date_show($this->request->data['Position']['start_date']);
					$this->request->data['Position']['end_date'] = $this->Functions->format_date_show($this->request->data['Position']['end_date']);
					// retain the client contacts
					$this->get_contact_list($this->request->data['Position']['clients_id']);
					// retain the account holder
					$this->get_team_member_list($id);
					// fetch the contacts
					$this->loadModel('PositionCoord');
					$data = $this->PositionCoord->find('all', array('fields' => array('users_id', 'requirements_id', 'inc_sharing_id','percent'),
					'conditions' => array('PositionCoord.requirements_id ' => $id),
					'order' => array('PositionCoord.id' => 'asc'),'joins' => $options));
					$this->set('count_coord', count($data));
					$this->set('coord_list', $data);					
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
		'order' => array('client_name ASC'),'conditions' => array('is_deleted' => 'N', 'status' => '1')));
		$this->set('clientList', $client_list);
		// load the account holders
		$user_list = $this->Position->Creator->find('list',  array('fields' => array('id','first_name'), 
		'order' => array('first_name ASC'),'conditions' => array('status' => '0')));
		$this->set('userList', $user_list);
		// load the functional area
		$function_list = $this->Position->FunctionArea->find('list', array('fields' => array('id','function'), 
		'order' => array('function ASC'),'conditions' => array('is_deleted' => 'N', 'status' => '1')));
		$this->set('functionList', $function_list);
		// get the sharing details
		$this->loadModel('Coordination');
		$coord_list = $this->Coordination->find('list',  array('fields' => array('id','type'), 
		'order' => array('id ASC'),'conditions' => array('is_deleted' => 'N', 'status' => '1')));
		$this->set('coordList', $coord_list);

	}
	
	/* function to get the location details */
	public function get_loc_details(){
		$this->loadModel('Location');
		return $this->Location->find('list',  array('fields' => array('id','location'), 'order' => array('location ASC'),'conditions' => array('status' => 1)));

	}
	
	/* function to view the position */
	public function view($id){	
		// set the page title
		$this->set('title_for_layout', 'View Positions - CT Hiring - ES');
		$options = array(			
			array('table' => 'users',
					'alias' => 'ResOwner',					
					'type' => 'LEFT',
					'conditions' => array('`ResOwner.id` = `ReqResume`.`created_by`')
			),
			
			array('table' => 'client_contact',
					'alias' => 'PositionContact',					
					'type' => 'LEFT',
					'conditions' => array('`PositionContact.clients_id` = `Position`.`id`',
					'`Position.client_contact_id` = `PositionContact`.`contact_id`')
			),
			array('table' => 'contact',
					'alias' => 'Contact',					
					'type' => 'LEFT',
					'conditions' => array('`Contact.id` = `PositionContact`.`contact_id`')
			)
		);		
		$fields = array('id','job_title','job_code','education','location','no_job','min_exp','max_exp','ctc_from','ctc_to','ReqStatus.title',
		'Client.client_name', 'Creator.first_name','created_date','modified_date', 'count(ReqResume.id) cv_sent','req_status_id',
		'group_concat(ReqResume.status_title) joined', "group_concat(distinct ResOwner.first_name  SEPARATOR ', ') team_member",
		'Contact.first_name','Contact.email','Contact.mobile','Contact.phone','Contact.id');
		$data = $this->Position->find('all', array('fields' => $fields,'conditions' => array('Position.id' => $id), 'joins' => $options));
		$this->set('position_data', $data[0]);
		// get the resume details
		$this->loadModel('ReqResumeStatus');
		$options = array(			
			array('table' => 'resume',
					'alias' => 'Resume',					
					'type' => 'LEFT',
					'conditions' => array('`Resume`.`id` = `ReqResume`.`resume_id`')
			),
			array('table' => 'res_location',
					'alias' => 'ResLoc',					
					'type' => 'LEFT',
					'conditions' => array('`ResLoc`.`id` = `Resume`.`res_location_id`')
			),
			array('table' => 'designation',
					'alias' => 'Designation',					
					'type' => 'LEFT',
					'conditions' => array('`Designation`.`id` = `Resume`.`designation_id`')
			),
			array('table' => 'users',
					'alias' => 'Creator',					
					'type' => 'LEFT',
					'conditions' => array('`Creator`.`id` = `ReqResume`.`created_by`')
			),
			array('table' => 'reason',
					'alias' => 'Reason',					
					'type' => 'LEFT',
					'conditions' => array('`Reason`.`id` = `ReqResume`.`reason_id`')
			)
		);		
		$validate_cond = array('ReqResumeStatus.stage_title NOT LIKE' => 'Validation%');
		$data = $this->ReqResumeStatus->find('all', array('fields' => array('Resume.id','Resume.first_name','Resume.last_name','ReqResumeStatus.status_title','ReqResumeStatus.stage_title',
		'ReqResumeStatus.created_date',	'Resume.mobile','Resume.email_id','Resume.present_ctc','ReqResume.created_date',
		'Resume.expected_ctc','Resume.present_employer','Resume.notice_period','ResLoc.location','ReqResume.status_title','ReqResume.stage_title',
		'ReqResume.bill_ctc','Reason.reason','Designation.designation','Creator.first_name','ReqResume.modified_date', 'ReqResume.date_offer','ReqResume.joined_on'),
		'conditions' => array('requirements_id' => $id,$validate_cond),
		'order' => array('Resume.created_date' => 'desc'), 'joins' => $options));		
		$this->set('resume_data', $data);	
		
	}
	
	
	/* function to load the districts options */
	public function get_contact(){
		$this->layout = 'ajax';
		$this->load_contact($this->request->query['id']);
		$this->render(false);
		die;
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
			$data = $this->Position->find('all', array('fields' => array('Position.client_name','job_title'),
			'group' => array('Position.client_name','job_title'), 'conditions' => 	array("OR" => array ('Position.client_name like' => '%'.$q.'%',
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
}