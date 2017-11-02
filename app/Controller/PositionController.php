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

	public function index($rec_status,$contact_id){			
		// when the form is submitted for search
		if($this->request->is('post')){
			$url_vars = $this->Functions->create_url(array('keyword','from','to','loc','emp_id','status','unread'),'Position'); 			
			$this->redirect('/position/?srch_status=1&'.$url_vars);				
		}
		
		// set the page title
		$this->set('title_for_layout', 'Positions - Manage Hiring');
		$this->set('locList', $this->get_loc_details());
		$this->set('stList', array('10' => 'Assigned', '1' => 'In-Process', '2' => 'On-Hold', '3' => 'Closed', '4' => 'Terminated'));			
		$fields = array('id','job_title','location','no_job','min_exp','max_exp','ctc_from','ctc_to','ReqStatus.title','req_status_id',
		'Client.client_name','team_member', 'Creator.first_name','created_date','modified_date', 'count(distinct ReqResume.id) cv_sent','group_concat(ReqResume.id) req_resume_id', 
		'group_concat(ReqResume.status_title) joined','count(distinct Read.id) read_count', "group_concat(distinct TeamMember.first_name
		SEPARATOR ', ') team_member", 'Position.created_by','Position.is_approve','Position.status', "max(PositionStatus.id) st_id");
				
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
			,
			array('table' => 'users',
					'alias' => 'TeamMember',					
					'type' => 'LEFT',
					'conditions' => array('`ReqTeam`.`users_id` = `TeamMember`.`id`')
			),
			array('table' => 'req_approval_status',
					'alias' => 'PositionStatus',					
					'type' => 'LEFT',
					'conditions' => array('`PositionStatus`.`requirements_id` = `Position`.`id`')
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
		$result = $this->Position->get_team($this->Session->read('USER.Login.id'),$show);
		$data[] =  $this->Session->read('USER.Login.id');

		if(!empty($result)){
			$this->set('approveUser', '1');
			// for drop down listing
			$format_list = $this->Functions->format_dropdown($result, 'u','id','first_name', 'last_name');
			$this->set('empList', $format_list);
			foreach($result as $rec){
				$data[] =  $rec['u']['id'];
			}			
		}
		
		if($team_cond){
				$teamCond = array('OR' => array(
					'ReqResume.created_by' =>  $data,
					'ReqTeam.users_id' => $data,
					'AH.users_id' => $data,
					'Position.created_by' => $data						
				)
			);
		}
		
		/*
		
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
			$team_cond = '';
		}
		
		*/
	
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
		
		// for client condition
		if($this->request->query['client_id'] != ''){
			$clientCond = array('Position.clients_id' => $this->request->query['client_id']);
		}
		
		// for branch condition
		if($this->request->query['loc'] != ''){ 
			$branchCond = array('Creator.location_id' => $this->request->query['loc']);
		}
		// for employee condition
		if($this->request->query['emp_id'] != ''){ 
			$empCond = array('Position.created_by' => $this->request->query['emp_id']);
		}
		
		// for status condition
		if($this->request->query['status'] != ''){ 
			$st = $this->request->query['status'] == '10' ? '0' : $this->request->query['status'];
			$stCond = array('Position.req_status_id' => $st, 'Position.status' => 'A');
		}
		
		// show awaiting approval condition
		if($rec_status =='pending'){
			// $approveCond = array('Position.status' => 'I', 'Position.is_approve' => 'W');
			$approveCond = array('PositionStatus.users_id' => $this->Session->read('USER.Login.id'),'PositionStatus.status' => 'W');
		}else{
			$approveCond = array('Position.status' => 'A', 'Position.is_approve' => 'A');
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
		// for export
		if($this->request->query['action'] == 'export'){
			$data = $this->Position->find('all', array('fields' => $fields,'conditions' => 
			array($keyCond,$date_cond,$branchCond,$empCond,$stCond,$teamCond,$contactCond,$clientCond), 
			'order' => array('created_date' => 'desc'), 'group' => array('Position.id'), 'joins' => $options));
			$this->Excel->generate('positions', $data, $data, 'Report', 'Position');
		}
		
		$this->paginate = array('fields' => $fields,'limit' => '25','conditions' => array($keyCond,$approveCond,$date_cond,$branchCond,$empCond,$stCond,$contactCond,$teamCond,$clientCond),
		'order' => array('created_date' => 'desc'),	'group' => array('Position.id'), 'joins' => $options);
		$data = $this->paginate('Position');
		$this->set('data', $data);
		if(empty($data) && !empty($this->request->data)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Oops! No Positions Found!', 'default', array('class' => 'alert alert-info'));
		}
		
	}
	
	/* function to add the position */
	public function add(){ 
		$this->check_role_access(4);
		// set the page title		
		$this->set('title_for_layout', 'Create Position - Positions - Manage Hiring');	
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
			if ($this->Position->validates(array('fieldList' => array('clients_id','client_contact_id','job_title','location','max_exp','ctc_to_type','skills','team_member_req','end_date','function_area_id','status','job_desc','education','tech_skill','behav_skill')))){
				// format the dates
				$this->request->data['Position']['start_date'] = $this->Functions->format_date_save($this->request->data['Position']['start_date']);
				$this->request->data['Position']['end_date'] = $this->Functions->format_date_save($this->request->data['Position']['end_date']);
				// save the data
				$this->request->data['Position']['status'] = 'I';
				if($this->Position->save($this->request->data['Position'], array('validate' => false))){
					// save position coordination
					// $this->save_position_coodination($this->Position->id);
					// save team members list
					$team_members = $this->save_team_member($this->Position->id);					
					// save the file name
					$this->save_job_desc($this->Position->id);
					// $this->Position->saveField('job_desc_file', $this->Position->id.'_'.$this->request->data['Position']['desc_file']['name']);
					// send mail to approver
					$sub = 'Manage Hiring - Position created by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
					$from = ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
					// get the superiors
					$this->loadModel('Approve');					
					// iterate the team members
					foreach($team_members as $team_id){					
						$approval_data = $this->Approve->find('first', array('fields' => array('level1'), 'conditions'=> array('Approve.users_id' => $team_id)));					
															
						// get leader email address
						$leader_data = $this->Position->Creator->find('all', array('conditions' => array('Creator.id' => $approval_data['Approve']['level1']),
						'fields' => array('Creator.id',	'Creator.first_name','Creator.last_name','Creator.email_id')));
						
						// if leader found
						if(!empty($leader_data)){
							$this->loadModel('PositionStatus');
							// make sure not duplicate status exists
							$this->check_duplicate_status($this->Position->id, $approval_data['Approve']['level1']);			
							// save req. status data
							$data = array('requirements_id' => $this->Position->id, 'created_date' => $this->Functions->get_current_date(), 'users_id' => $approval_data['Approve']['level1'], 'member_id' => $team_id, 'is_approve' => 'W');
							if($this->PositionStatus->save($data, true, $fieldList = array('requirements_id','created_date','users_id', 'member_id'))){						
								/*
								// save adv. users
								$this->loadModel('PositionUser');
								$req_user_data = array('requirements_id' => $this->Position->id, 'users_id' => $approval_data['Approve']['level1']);							
								$this->PositionUser->id = '';
								$this->PositionUser->save($req_user_data, true, $fieldList = array('requirements_id','users_id'));
								*/
								$options = array(								
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
						
								$position_data = $this->Position->find('all', array('conditions' => array('Position.id' => $this->Position->id),'fields' => array( 'Client.client_name',	"group_concat(distinct TeamMember.first_name  SEPARATOR ', ') team_member"),'joins' => $options));

								$vars = array('from_name' => $from, 'to_name' => ucwords($leader_data[0]['Creator']['first_name'].' '.$leader_data[0]['Creator']['last_name']), 'position' => $this->request->data['Position']['job_title'],'client_name' => $position_data[0]['Client']['client_name'], 'no_opening' => $this->request->data['Position']['no_job'], 'team_member' => $position_data[0][0]['team_member'],
								'location' => $this->request->data['Position']['location']);
														
								// notify superiors						
								if(!$this->send_email($sub, 'add_position', 'noreply@managehiring.com', $leader_data[0]['Creator']['email_id'],$vars)){	
									// show the msg.								
									$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail for approval...', 'default', array('class' => 'alert alert-error'));				
								}else{
									$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Position Created Successfully. After approval, it will be visible', 'default', array('class' => 'alert alert-info'));				
								}
							}
						}else{
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Recruiter has no superior to approve your request', 'default', array('class' => 'alert alert-info'));
						}				
					}				
					
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
	

	
	/* function to check for duplicate entry */
	public function check_duplicate_status($req_id, $app_user_id, $exist){
		$count = $this->PositionStatus->find('count',  array('conditions' => array('PositionStatus.requirements_id' => $req_id, 'PositionStatus.users_id' => $app_user_id)));
		$limit = $exist ? $exist : 0;
		if($count > $limit){
			$this->invalid_attempt();
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
		$this->set('title_for_layout', 'Edit Position - Positions - Manage Hiring');	
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
					'ctc_from','ctc_to','ctc_from_type','ctc_to_type','skills','team_member_req','end_date','function_area_id','job_desc','education','tech_skill','behav_skill')))){
						// format the dates
						$this->request->data['Position']['start_date'] = $this->Functions->format_date_save($this->request->data['Position']['start_date']);
						$this->request->data['Position']['end_date'] = $this->Functions->format_date_save($this->request->data['Position']['end_date']);
						// save the data
						if($this->Position->save($this->request->data['Position'], array('validate' => false))){
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
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Position Modified Successfully', 'default', array('class' => 'alert alert-success'));				
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
					'ctc_from','ctc_to','education','ctc_from_type','ctc_to_type','skills','no_job','start_date','end_date','function_area_id','job_desc','job_desc_file','client_contact_id',
					'tech_skill','behav_skill'), 
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
		// parse the req. 
		$req_no = $this->request->data['Position']['team_id'];
		$split_req = explode(',', $req_no);
		foreach($split_req as $req){ 
			$new_split_req = explode('-', $req);
			$this->request->data['Position']['no_job'] += $new_split_req[1];
			if($new_split_req[0] != ''){
				$member_id[] = $new_split_req[0];
				$this->ReqTeam->create();
				$data = array('created_by' => $this->Session->read('USER.Login.id'),'requirements_id' => $id, 'users_id' => $new_split_req[0], 'no_req' => $new_split_req[1], 'is_approve' => 'W');
				$this->ReqTeam->save($data, true, $fieldList = array('requirements_id','created_by','users_id','no_req','is_approve'));
			}
		}
		$this->Position->id = $id;
		$this->Position->saveField('no_job',$this->request->data['Position']['no_job']);
		return $member_id;
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
		$team_member = $this->ReqTeam->find('all', array('fields' => array('users_id','no_req'), 'conditions' => array('requirements_id' => $id)));
		foreach($team_member as $record){
			$users[] = $record['ReqTeam']['users_id'];
			$no_pos[] = $record['ReqTeam']['no_req'];
		}
		$this->set('usersSel', $users);
		$this->set('noPositions', $no_pos);
		// get team member info
		$data = $this->Position->Creator->find('all', array('fields' => array('Creator.first_name','Creator.last_name','Creator.id'),
		'conditions' => array('Creator.id' => $users)));
		$this->set('teamData', $data);
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
		'order' => array('first_name ASC'),'conditions' => array('Contact.status' => 'A', 'Contact.is_deleted' => 'N',
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
		$this->set('title_for_layout', 'View Positions - Manage Hiring');
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
		$fields = array('id','Client.id','job_title','job_code','education','location','no_job','min_exp','max_exp','ctc_from','ctc_to','ReqStatus.title','job_desc',
		'Client.client_name', 'Creator.first_name','created_date','modified_date', 'count(DISTINCT  ReqResume.id) cv_sent','req_status_id',
		'group_concat(ReqResume.status_title) joined', 'start_date', 'end_date', //"group_concat(distinct ResOwner.first_name  SEPARATOR ', ') team_member",
		"group_concat(distinct AH.first_name  SEPARATOR ', ') ac_holder","group_concat(distinct TeamMember.first_name  SEPARATOR ', ') team_member2",
		'skills','Contact.first_name','Contact.email','Contact.mobile','Contact.phone','Contact.id','FunctionArea.function',
		'Position.created_by','Position.is_approve','tech_skill','behav_skill','job_desc_file');
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
		'Resume.last_name','ReqResume.status_title','ReqResume.stage_title','Resume.created_date','Resume.modified_date',
		'ReqResume.created_date','Resume.mobile','Resume.email_id','Resume.present_ctc','Resume.expected_ctc',
		'Resume.notice_period','ResLoc.location','Creator.first_name','ReqResume.modified_date','ReqResume.bill_ctc','ResDoc.resume',
		'Resume.present_location','Resume.present_ctc_type','Resume.expected_ctc_type', 'ReqResume.id'),
		'conditions' => array('requirements_id' => $id),
		'order' => array('Resume.created_date' => 'desc'),'group' => array('ReqResume.id'), 'joins' => $options));		
		$this->set('resume_data', $data);
		// get the req resume status data 			
		$this->loadModel('ReqResumeStatus');
		$options = array(					
			array('table' => 'resume',
					'alias' => 'Resume',					
					'type' => 'LEFT',
					'conditions' => array('`Resume`.`id` = `ReqResume`.`resume_id`')
			)
		);
		$validate_cond = array('ReqResumeStatus.stage_title NOT LIKE' => 'Validation%');
		$data = $this->ReqResumeStatus->find('all', array('fields' => array('ReqResume.id','ReqResumeStatus.status_title',
		'ReqResumeStatus.stage_title', 'Resume.id', 'ReqResumeStatus.created_date','ReqResume.bill_ctc','ReqResume.modified_date'),
		'conditions' => array('ReqResume.requirements_id' => $id, $validate_cond), 'joins' => $options));		
		$this->set('status_data', $data);
		
	}
	
	/* function to approve / reject the position */
	public function remark($req_id, $st_id,$user_id,$status){
		$this->layout = 'framebox';
		if(!empty($this->request->data)){			
			/*
			$status = $st == 'approve' ? 'A' : 'I';
			$is_approve = $st == 'approve' ? 'A' : 'R';
			$data = array('id' => $id, 'status' => $status, 'approve_date' => $this->Functions->get_current_date(),
			'is_approve' => $is_approve, 'remarks' =>  $this->request->data['Position']['remarks']);
			$approve_validation = $is_approve == 'R' ? true: false;	
			$approve_msg = $is_approve == 'R' ? 'rejected': 'approved';	
			*/			
			if($this->request->is('post') && $st_id != ''){
				// set the validation
				$this->Position->set($this->request->data);
				if($status == 'R'){
					$validate = $this->Position->validates(array('fieldList' => array('remarks')));
				}else{
					$validate = true;
				}
				// update the todo
				if($validate){
					$this->loadModel('PositionStatus');
					$data = array('modified_date' => $this->Functions->get_current_date(), 'modified_by' => $this->Session->read('USER.Login.id'), 'remarks' => $this->request->data['Position']['remarks'], 'status' => $status, 'is_approve' => $status);
					$this->PositionStatus->id = $st_id;
					$st_msg = $status == 'A' ? 'approved' : 'rejected';
					// make sure not duplicate status exists
					$this->check_duplicate_status($req_id, $this->Session->read('USER.Login.id'), 1);
					// save the position status
					if($this->PositionStatus->save($data, true, $fieldList = array('modified_by','modified_date','remarks','status','is_approve'))){
						// get user data
						$user_data = $this->Position->Creator->find('all', array('conditions' => array('Creator.id' => $user_id),'fields' => array('Creator.id',	'Creator.first_name','Creator.last_name','Creator.email_id')));
						
						$options = array(								
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
							
						$approve_msg = $status == 'R' ? 'Rejected': 'Approved';	
						
						$position_data = $this->Position->find('all', array('conditions' => array('Position.id' => $req_id),'fields' => array( 'Client.client_name',	"group_concat(distinct TeamMember.first_name  SEPARATOR ', ') team_member"),'joins' => $options));
						
						$from = ucfirst($user_data[0]['Creator']['first_name']).' '.ucfirst($user_data[0]['Creator']['last_name']);
						
						$vars = array('to_name' => $from, 'from_name' => ucwords($this->Session->read('USER.Login.first_name').' '.$this->Session->read('USER.Login.last_name')), 'position' => $this->request->data['Position']['job_title'],'client_name' => $position_data[0]['Client']['client_name'], 'no_opening' => $this->request->data['Position']['no_job'], 'team_member' => $position_data[0][0]['team_member'],'location' => $this->request->data['Position']['location']);					
										
						// notify employee						
						if(!$this->send_email('Manage Hiring - Position '.$st_msg.' by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name')), 'approve_position', 'noreply@managehiring.com', $user_data[0]['Creator']['email_id'],$vars)){		
							// show the msg.								
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail to user...', 'default', array('class' => 'alert alert-error'));				
						}else{
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Position '.$approve_msg.' Successfully.', 'default', array('class' => 'alert alert-success'));
						}
						
						// get the superiors
						$this->loadModel('Approve');
						// if record approved
						if($status == 'A'){
							// get the member id to find the L2
							$member_data = $this->PositionStatus->find('first', array('fields' => array('member_id'), 'conditions'=> array('PositionStatus.id' => $st_id)));
							// get the team member user id							
							$approval_data = $this->Approve->find('first', array('fields' => array('level2'), 'conditions'=> array('Approve.users_id' => $member_data['PositionStatus']['member_id'])));
							// make sure level 2 is not empty
							if(!empty($approval_data['Approve']['level2'])){
								// check level 2 is not empty and its not the same user
								if($approval_data['Approve']['level2'] != $this->Session->read('USER.Login.id')){ 	
									// get superior level 2 details				
									$data = array('requirements_id' => $req_id, 'created_date' => $this->Functions->get_current_date(), 'users_id' => $approval_data['Approve']['level2'], 'is_approve' => 'W');
									// save leve 2 if found
									$this->PositionStatus->id = '';						
									// make sure not duplicate status exists
									$this->check_duplicate_status($req_id, $approval_data['Approve']['level2'], 0);						
									if($this->PositionStatus->save($data, true, $fieldList = array('requirements_id','created_date','users_id','is_approve'))){
										$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Position '.$approve_msg.' Successfully.', 'default', array('class' => 'alert alert-success'));																	
									}else{
										$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving superior status...', 'default', array('class' => 'alert alert-error'));
									}
								}else{
									// update status if l2 approved
									
									$this->Position->id = $req_id;
									$this->Position->saveField('is_approve', 'A');
									$this->Position->saveField('status', 'A');	
									$this->Position->saveField('req_status_id', '0');
									
									// approve the member
									$this->PositionStatus->id = $st_id;
									$this->PositionStatus->saveField('member_approve', 'A');	
									
								}
							}else{
								// update  status
								
								$this->Position->id = $req_id;
								$this->Position->saveField('is_approve', 'A');
								$this->Position->saveField('status', 'A');
								$this->Position->saveField('req_status_id', '0');	
									
								
								// approve the member
								$this->PositionStatus->id = $st_id;
								$this->PositionStatus->saveField('member_approve', 'A');
							}
							
						}else{
							// update  status
							$this->Position->id = $req_id;
							$this->Position->saveField('is_approve', 'R');
							
							$this->PositionStatus->id = $st_id;
							$this->PositionStatus->saveField('member_approve', 'R');
								
							/*
							$approval_data = $this->Approve->find('first', array('fields' => array('level1','level2'), 'conditions'=> array('Approve.users_id' => $user_id)));
							if($approval_data['Approve']['level1'] == $this->Session->read('USER.Login.id')){
								$mail_user = $approval_data['Approve']['level2'];
							}else{
								$mail_user = $approval_data['Approve']['level1'];
							}							
							// get superior data
							$superior_data = $this->Position->Creator->find('first', array('conditions' => array('Creator.id' => $mail_user),'fields' => array('email_id','first_name', 'last_name')));
							// make sure superior available
							if(!empty($superior_data)){
								// notify employee		
								$sub = 'Manage Hiring - Position '.$approve_msg.' by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));								
								if(!$this->send_email($sub, 'approve_position', 'noreply@managehiring.com', $position_data[0]['Creator']['email_id'],$vars)){
									// show the msg.								
									$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail for approval...', 'default', array('class' => 'alert alert-error'));				
								}else{
									$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Position '.ucfirst($approve_msg).' Successfully.', 'default', array('class' => 'alert alert-warning'));
								}
							}
							*/
							
						}			
						
					}else{
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Problem in updating the status', 'default', array('class' => 'alert alert-error'));		
					}
					$this->set('action_status', $approve_msg);
					$this->set('form_status', '1');
					/*
					if($this->Position->save($data, array('validate' => false))){	
						$sub = 'Manage Hiring - Position '.$approve_msg.' by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
						$from = ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
							$options = array(								
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
						$position_data = $this->Position->find('all', array('conditions' => array('Position.id' => $id),
						'fields' => array('Creator.email_id', 'Creator.first_name','Creator.last_name', 'Client.client_name',
						"group_concat(distinct TeamMember.first_name  SEPARATOR ', ') team_member", 'Position.job_title',
						'Position.no_job','Position.location'), 'joins' => $options));
						$vars = array('from_name' => $from, 'to_name' => ucwords($position_data[0]['Creator']['first_name'].' '.$position_data[0]['Creator']['last_name']), 'position' => $position_data[0]['Position']['job_title'],
						'client_name' => $position_data[0]['Client']['client_name'], 'no_opening' => $position_data[0]['Position']['no_job'], 'team_member' => $position_data[0][0]['team_member'],
						'location' => $position_data[0]['Position']['location'], 'remarks' => $this->request->data['Position']['remarks'], 'approve_msg' => $approve_msg);					
						if(!$this->send_email($sub, 'approve_position', 'noreply@managehiring.com', $position_data[0]['Creator']['email_id'],$vars)){
							// show the msg.								
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail for approval...', 'default', array('class' => 'alert alert-error'));				
						}else{
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Position '.$approve_msg.' successfully.', 'default', array('class' => 'alert alert-warning'));
						}
						$this->set('form_status', '1');
					}
					*/

				}
			}
		}
	}
	
	/* function to send CV to client */
	public function send_cv($res_id, $pos_id, $req_res_id){ 
		$this->layout = 'framebox';
		// when the values are not empty
		if(!empty($res_id) && !empty($pos_id)){
			// get the template details
			$this->get_template_details($res_id,$pos_id, '1');
			
		}

		// when the form submitted
		if(!empty($this->request->data)){
			// get the req. resume id
			$this->loadModel('ReqResume');
			//$req_res_id = $this->ReqResume->find('all', array('fields' => array('ReqResume.id'), 
			//'conditions' => array('requirements_id' => $pos_id, 'resume_id' => $res_id)));
			// save req resume table
			$data = array('id' => $req_res_id ,'modified_date' => $this->Functions->get_current_date(),
			'modified_by' => $this->Session->read('USER.Login.id'),	'stage_title' => 'Shortlist', 'status_title' => 'CV-Sent');
			// save  req resume
			if($this->ReqResume->save($data, array('validate' => false))){		
				// save req resume status
				$this->loadModel('ReqResumeStatus');
				$data = array('req_resume_id' => $req_res_id, 'created_date' => $this->Functions->get_current_date(),
				'created_by' => $this->Session->read('USER.Login.id'), 'stage_title' => 'Shortlist', 'status_title' => 'CV-Sent');
				if($this->ReqResumeStatus->save($data, array('validate' => false))){
					// get mail contents
					$message = $this->get_template_details($res_id,$pos_id, '1');		
					$split_msg = explode('|||', $message);
					// get the resume details
					$options = array(								
							array('table' => 'resume_doc',
									'alias' => 'ResDoc',					
									'type' => 'INNER',
									'conditions' => array('`ResDoc.id` = `Resume`.`resume_doc_id`', )
								)
						);
					$resume_data = $this->ReqResume->Resume->find('all', array('conditions' => array('Resume.id' => $res_id),
					'fields' => array('ResDoc.resume','Resume.created_date','Resume.modified_date'), 'joins' => $options));
					// parse the file name			
					/*
					$updated = $resume_data[0]['Resume']['modified_date'] ? $resume_data[0]['Resume']['modified_date'] : $resume_data[0]['Resume']['created_date'];
					$snap_file = substr($resume_data[0]['ResDoc']['resume'], 0, strlen($resume_data[0]['ResDoc']['resume']) - 5);
					$pdf_date = date('d-m-Y', strtotime($updated));				
					$resume_path = '../../hiring/uploads/snapshotmerged/'.$this->Functions->filter_file($snap_file).'_'.$pdf_date.'.pdf';
					*/
					// get contact details		
					$client_data = $this->ReqResume->Position->findById($pos_id, array('fields' => 'client_contact_id','job_title','location'));
					$this->loadModel('Contact');
					$contact_data = $this->Contact->findById($client_data['Position']['client_contact_id'], array('fields' => 'Contact.first_name','Contact.last_name','Contact.email'));
					// $sub = 'Manage Hiring - Resume sent by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
					$from = ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
					$to_name = $contact_data['Contact']['first_name'].' '.$contact_data['Contact']['last_name'];
					// send mail to client 
					$contact_data['Contact']['email'] = 'testing7@bigspire.com'; // for testing
					$vars = array('from_name' => $from, 'to_name' => ucwords($to_name), 'position' => $this->request->data['Position']['job_title'],'msg'=> $split_msg[0], 'location' => $this->request->data['Position']['location']);
					// save the mail box
					$this->save_mail_box($split_msg[1], $split_msg[0], $req_res_id);
					if(!$this->send_email($split_msg[1], 'send_cv', $this->Session->read('USER.Login.email_id'), $contact_data['Contact']['email'],$vars)){	
						// show the msg.								
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail to client...', 'default', array('class' => 'alert alert-error'));				
					}else{						
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>CV Sent Successfully', 'default', array('class' => 'alert alert-success'));			
					}
					// if successfully update
					$this->set('cv_update_status', 1);
					// $this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>CV Sent Successfully', 'default', array('class' => 'alert alert-success'));									
				}
			}
		}
	}
	


	/* function to save the mail box */
	public function save_mail_box($sub, $msg, $req_res_id){
		$this->loadModel('MailBox');
		$data = array('id' => $req_res_id,'created_date' => $this->Functions->get_current_date(),
		'created_by' => $this->Session->read('USER.Login.id'), 'req_resume_id' => $req_res_id, 'subject' => $sub, 'message' => $msg);
		// save  mail box resume
		if($this->MailBox->save($data, array('validate' => false))){
			
		}else{
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving mail box', 'default', array('class' => 'alert alert-success'));									
			die;
		}		
	}
	
	/* function to get the template details */
	public function get_template_details($res_id, $pos_id, $mailtemplete){
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
				,
			array(
				'table' => 'users',
				'alias' => 'Recruiter',					
				'type' => 'LEFT',
				'conditions' => array('`Recruiter`.`id` = `Resume`.`created_by`')
				)
			
			);
			$fields = array('Resume.first_name','Resume.last_name','Resume.email_id','Resume.mobile','Resume.mobile2','Resume.total_exp','Resume.education','Resume.present_employer',
			'ResLocation.location', 'Resume.present_ctc','Resume.expected_ctc', 'Creator.first_name','Resume.created_date','Resume.notice_period',
			'Resume.modified_date','ReqResume.stage_title','ReqResume.status_title','Designation.designation','Resume.present_ctc_type','Resume.expected_ctc_type',
			'Resume.gender','Resume.marital_status','Resume.family','Resume.present_location','Resume.native_location', 'Resume.dob','Resume.consultant_assess',
			'Resume.interview_avail','ResDoc.resume','Position.job_title','Position.location','Position.job_desc','Contact.first_name'
			,'Contact.mobile','Recruiter.first_name','Recruiter.last_name','Client.client_name','Recruiter.signature');
			$cand_data = $this->Position->find('all', array('fields' => $fields,'conditions' => array('Resume.id' => $res_id),
			'joins' => $options));
			// print_r($cand_data);
			$cand_name = ucwords($cand_data[0]['Resume']['first_name'].' '.$cand_data[0]['Resume']['last_name']);
			$rec_name = ucwords($cand_data[0]['Recruiter']['first_name'].' '.$cand_data[0]['Recruiter']['last_name']);
			$signature = $cand_data[0]['Recruiter']['signature'];
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
			$data = $this->MailTemplate->findById($mailtemplete, array('fields' => 'subject','message'));
			$loc = $cand_data[0]['ResLoc']['location'] ? $cand_data[0]['ResLoc']['location'] : $cand_data[0]['Resume']['present_location'];
			$tags = array('[candidate_name]','[mobile]','[email_id]','[position]','[address]','[location]','[designation]','[experience]',	'[client]','[client_contact_name]','[client_contact_no]','[job_location]','[job_desc]','[function]','[today_date]','[recruiter_name]',
			'[signature]');
			$template_data = array($cand_name,$cand_data[0]['Resume']['mobile'],$cand_data[0]['Resume']['email_id'], 
			$cand_data[0]['Position']['job_title'],	$cand_data[0]['Position']['address1']. '<br>'.$cand_data[0]['Position']['address2'],$loc,	$cand_data[0]['Designation']['designation'],$this->Functions->check_exp($cand_data[0]['Position']['total_exp']),	$cand_data[0]['Client']['client_name'],$cand_data[0]['Contact']['first_name'],$cand_data[0]['Contact']['mobile'],	$cand_data[0]['Position']['location'],$cand_data[0]['Position']['job_desc'],$cand_data[0]['FunctionArea']['function'],	date('d-M, Y'),
			$rec_name, $signature);
			$body_text = str_replace($tags, $template_data, $data['MailTemplate']['message']);
			$subject_text = str_replace($tags, $template_data, $data['MailTemplate']['subject']);
			$this->set('subject_'.$mailtemplete, $subject_text);
			$this->set('body_'.$mailtemplete, $body_text);
			return $body_text.'|||'.$subject_text;

	}
	
	/* function to update the CV status */
	public function update_cv($id,$pos_id,$req_res_id,$st){
		$this->layout = 'framebox';
		$status = $st == 'shortlist' ? 'Shortlisted' : 'Rejected';
		$this->set('status', $status);
		$this->set('validation', $st != 'shortlist' ? 0 : 1);
		$head_label = $st == 'shortlist' ? 'Shortlist CV' : 'Reject CV';
		$this->set('headLabel', $head_label);
		// get candidate details
		$this->loadModel('Resume');
		$cand_data = $this->Resume->findById($id, array('fields' => 'first_name','last_name'));
		$cand_name = ucwords($cand_data['Resume']['first_name'].' '.$cand_data['Resume']['last_name']);
		$this->set('candidate_name', $cand_name);
		// get rejection status drop down
		$this->get_reject_drop('Screening');
		if(!empty($this->request->data)){
			// set the validation
			$this->Position->set($this->request->data);
			if($st == 'cv_reject'){
				$validate = $this->Position->validates(array('fieldList' => array('reason_id')));
			}else{
				$validate = true;
			}
			// if validation pass
			if($validate){
				// get the req. resume id
				$this->loadModel('ReqResume');
				//$req_res_id = $this->ReqResume->find('all', array('fields' => array('ReqResume.id'), 
				//'conditions' => array('requirements_id' => $pos_id, 'resume_id' => $id)));
				// save req resume table
				$data = array('id' => $req_res_id,'modified_date' => $this->Functions->get_current_date(),
				'modified_by' => $this->Session->read('USER.Login.id'),	 'status_title' => $status);
				// save  req resume
				if($this->ReqResume->save($data, array('validate' => false))){		
					// save req resume status
					$this->loadModel('ReqResumeStatus');
					$data = array('req_resume_id' => $req_res_id, 'created_date' => $this->Functions->get_current_date(),'created_by' => $this->Session->read('USER.Login.id'),'stage_title' => 'Shortlist',  'status_title' => $status,	'reason_id' => $this->request->data['Position']['reason_id'],'note' => $this->request->data['Position']['note']);
					if($this->ReqResumeStatus->save($data, array('validate' => false))){					
						// if successfully update
						$this->set('cv_update_status', 1);
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>CV '.$status.' Successfully', 'default', array('class' => 'alert alert-success'));									

					}
				}
			}
		}
	}
	
	/* function to get the reject reason */
	public function get_reject_drop($action, $action2){		
		$this->loadModel('Reason');
		$types = array($action,$action2);
		$reason_list = $this->Reason->find('list', array('fields' => array('id','reason'), 
		'order' => array('reason ASC'),'conditions' => array('status' => '1', 'type' => $types)));
		$this->set('rejectList', $reason_list);
	}
	
	/* function to update the CV status */
	public function verify_cv($id,$pos_id,$st){	
		$this->layout = 'framebox';
		$status = $st == 'approve' ? 'Validated' : 'Rejected';
		$head_label = $st == 'approve' ? 'Validated' : 'Rejected';
		$this->set('validation', $st != 'approve' ? 0 : 1);
		// get candidate details
		$this->loadModel('Resume');
		$cand_data = $this->Resume->findById($id, array('fields' => 'first_name','last_name'));
		$cand_name = ucwords($cand_data['Resume']['first_name'].' '.$cand_data['Resume']['last_name']);
		$this->set('candidate_name', $cand_name);
		// get rejection status drop down
		$this->get_reject_drop('Screening');
		// when th form is submitted
		if(!empty($id) && !empty($pos_id)){
			// set the validation
			$this->Position->set($this->request->data);
			if($st != 'approve'){
				$validate = $this->Position->validates(array('fieldList' => array('reason_id')));
			}else{
				$validate = true;
			}
			// if validation pass
			if($validate){
				// get the req. resume id
				$this->loadModel('ReqResume');
				$req_res_id = $this->ReqResume->find('all', array('fields' => array('ReqResume.id'), 
				'conditions' => array('requirements_id' => $pos_id, 'resume_id' => $id)));
				// save req resume table
				$data = array('id' => $req_res_id[0]['ReqResume']['id'],'modified_date' => $this->Functions->get_current_date(),
				'modified_by' => $this->Session->read('USER.Login.id'),	 'status_title' => $status);
				// save  req resume
				if($this->ReqResume->save($data, array('validate' => false))){		
					// save req resume status
					$this->loadModel('ReqResumeStatus');
					$data = array('req_resume_id' => $req_res_id[0]['ReqResume']['id'], 'created_date' => $this->Functions->get_current_date(),
					'created_by' => $this->Session->read('USER.Login.id'), 'stage_title' => 'Validation - Account Holder', 'status_title' => $status, 'reason_id' => $this->request->data['Position']['reason_id'], 'note' => $this->request->data['Position']['note']);
					if($this->ReqResumeStatus->save($data, array('validate' => false))){					
						// if successfully update
						if($st != 'approve'){
							$this->set('cv_update_status', 1);
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>CV '.$status.' Successfully', 'default', array('class' => 'alert alert-success'));	
						}else{						
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>CV '.$status.' Successfully', 'default', array('class' => 'alert alert-success'));						
							$this->redirect('/position/view/'.$pos_id.'#update');	
						}
				
					}
				}
			}
		}
	}
	
	/* function to update offer */
	public function update_offer($id,$pos_id,$req_res_id,$st){
		$this->layout = 'framebox';
		$status = $st == 'offer_accept' ? 'Offer Accepted' : 'Declined';
		$this->set('validation', $st == 'offer_accept' ? 1 : 0);
		$head_label = $st == 'offer_accept' ? 'Offer Accepted' : 'Offer Declined';
		$this->set('headLabel', $head_label);
		// get candidate details
		$this->loadModel('Resume');
		$cand_data = $this->Resume->findById($id, array('fields' => 'first_name','last_name'));
		$cand_name = ucwords($cand_data['Resume']['first_name'].' '.$cand_data['Resume']['last_name']);
		$this->set('candidate_name', $cand_name);
		// get rejection status drop down
		$this->get_reject_drop('Offer Candiate Reject','Offer Client Reject');
		if(!empty($this->request->data)){
			// set the validation
			$this->Position->set($this->request->data);
			if($st != 'offer_accept'){
				$validate = $this->Position->validates(array('fieldList' => array('reason_id')));
			}else{
				$validate = $this->Position->validates(array('fieldList' => array('ctc_offer','date_offer')));
			}
			// if validation pass
			if($validate){
				// get the req. resume id
				$this->loadModel('ReqResume');
				//$req_res_id = $this->ReqResume->find('all', array('fields' => array('ReqResume.id'), 
				//'conditions' => array('requirements_id' => $pos_id, 'resume_id' => $id)));
				// save req resume table
				$data = array('id' => $req_res_id,'modified_date' => $this->Functions->get_current_date(),'ctc_offer' => $this->request->data['Position']['ctc_offer'],'date_offer'=> $this->Functions->format_date_save($this->request->data['Position']['date_offer']),
				'modified_by' => $this->Session->read('USER.Login.id'), 'stage_title' => 'Offer', 'status_title' => $status);
				// save  req resume
				if($this->ReqResume->save($data, array('validate' => false))){		
					// save req resume status
					$this->loadModel('ReqResumeStatus');
					$data = array('req_resume_id' => $req_res_id, 'created_date' => $this->Functions->get_current_date(),	'created_by' => $this->Session->read('USER.Login.id'), 'reason_id' => $this->request->data['Position']['reason_id'], 'stage_title' => 'Offer', 'status_title' => $status, 'note' => $this->request->data['Position']['note']);
					if($this->ReqResumeStatus->save($data, array('validate' => false))){					
						// if successfully update
						$this->set('cv_update_status', 1);
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>'.ucfirst($head_label).' Successfully', 'default', array('class' => 'alert alert-success'));									
					}
				}
			}
		}
	}
	
	
	/* function to update joining */
	public function update_joining($id,$pos_id,$req_res_id,$st){
		$this->layout = 'framebox';
		$status = ($st == 'joined' ? 'Joined' : ($st == 'not_joined' ?  'Not Joined' : 'Deferred'));
		$this->set('validation', $st == 'not_joined' ? 1 : 0);
		$head_label = ($st == 'joined' ? 'Candidate Joined' : ($st == 'not_joined' ?  'Candidate Not Joined' : 'Joining Deferred'));
		$this->set('headLabel', $head_label);
		// set the label
		if($st == 'joined'){
			$this->set('field_label', 'Joined On');
			$this->set('field_name', 'joined_on');				
		}else if($st == 'deferred'){
			$this->set('field_label', 'New Joining Date');
			$this->set('field_name', 'plan_join_date');
			// get rejection status drop down
			$this->get_reject_drop('Joining Deferred');
		}else if($st == 'not_joined'){
			// get rejection status drop down
			$this->get_reject_drop('Candidate Not Joined','Client Not Joined');	
		}
		$this->set('valid_st', $st);

		// get candidate details
		$this->loadModel('Resume');
		$cand_data = $this->Resume->findById($id, array('fields' => 'first_name','last_name'));
		$cand_name = ucwords($cand_data['Resume']['first_name'].' '.$cand_data['Resume']['last_name']);
		$this->set('candidate_name', $cand_name);
		
		if(!empty($this->request->data)){
			// set the validation
			$this->Position->set($this->request->data);
			if($st == 'not_joined'){				
				$validate = $this->Position->validates(array('fieldList' => array('reason_id')));
			}else if($st == 'joined'){
				$validate = $this->Position->validates(array('fieldList' => array('joined_on')));
			}else if($st == 'deferred'){
				$validate = $this->Position->validates(array('fieldList' => array('plan_join_date','reason_id')));
			}
			// if validation pass
			if($validate){
				// get the req. resume id
				$this->loadModel('ReqResume');
				//$req_res_id = $this->ReqResume->find('all', array('fields' => array('ReqResume.id'), 
				//'conditions' => array('requirements_id' => $pos_id, 'resume_id' => $id)));
				// save req resume table
				$data = array('id' => $req_res_id,'modified_date' => $this->Functions->get_current_date(), 'joined_on' => $this->Functions->format_date_save($this->request->data['Position']['joined_on']),
				'plan_join_date' => $this->Functions->format_date_save($this->request->data['Position']['plan_join_date']),
				'modified_by' => $this->Session->read('USER.Login.id'), 'stage_title' => 'Joining', 'status_title' => $status);
				// save  req resume
				if($this->ReqResume->save($data, array('validate' => false))){		
					// save req resume status
					$this->loadModel('ReqResumeStatus');
					$data = array('req_resume_id' => $req_res_id, 'created_date' => $this->Functions->get_current_date(),
					'created_by' => $this->Session->read('USER.Login.id'),'reason_id' => $this->request->data['Position']['reason_id'],  'stage_title' => 'Joining', 'status_title' => $status,
					'note' => $this->request->data['Position']['note']);
					if($this->ReqResumeStatus->save($data, array('validate' => false))){					
						// if successfully update
						$this->set('cv_update_status', 1);
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>'.ucfirst($head_label).' Successfully', 'default', array('class' => 'alert alert-success'));

					}
				}
			}
		}
	}
	
	
	/* function to update the interview interview */		
	public function update_interview($id,$pos_id,$req_res_id,$st,$int_level){
		$this->layout = 'framebox';
		$status = $st == 'shortlist' ? 'Selected' : 'Rejected';
		$this->set('validation', $st == 'shortlist' ? 1 : 0);
		$head_label = $st == 'shortlist' ? 'Interview Selected' : 'Interview Rejected';
		$this->set('headLabel', $head_label);
		// get candidate details
		$this->loadModel('Resume');
		$cand_data = $this->Resume->findById($id, array('fields' => 'first_name','last_name'));
		$cand_name = ucwords($cand_data['Resume']['first_name'].' '.$cand_data['Resume']['last_name']);
		$this->set('candidate_name', $cand_name);
		// get rejection status drop down
		$this->get_reject_drop('Interview Reject');
		// when the form submitted
		if(!empty($this->request->data)){		
			// set the validation
			$this->Position->set($this->request->data);
			if($status == 'Rejected'){
				$validate = $this->Position->validates(array('fieldList' => array('reason_id')));
			}else{
				$validate = true;
			}
			// if validation pass
			if($validate){			
				// get the req. resume id
				$this->loadModel('ReqResume');
				//$req_res_id = $this->ReqResume->find('all', array('fields' => array('ReqResume.id'), 
				//'conditions' => array('requirements_id' => $pos_id, 'resume_id' => $id)));
				// save req resume table
				$data = array('id' => $req_res_id,'modified_date' => $this->Functions->get_current_date(),
				'modified_by' => $this->Session->read('USER.Login.id'),	 'status_title' => $status);
				// save  req resume
				if($this->ReqResume->save($data, array('validate' => false))){		
					// save req resume status
					$this->loadModel('ReqResumeStatus');
					$data = array('req_resume_id' => $req_res_id, 'created_date' => $this->Functions->get_current_date(),	'created_by' => $this->Session->read('USER.Login.id'), 'stage_title' => $this->Functions->get_level_text($int_level),	'status_title' => $status, 'note' => $this->request->data['Position']['note'],'reason_id' => $this->request->data['Position']['reason_id']);
					if($this->ReqResumeStatus->save($data, array('validate' => false))){
						// save interview status
						$this->loadModel('ResInterview');
						$interview_id = $this->ResInterview->find('all', array('conditions' => array('ResInterview.req_resume_id' => $req_res_id,
						'ResInterview.stage_title' => $this->Functions->get_level_text($int_level))));
						$data = array('id' => $interview_id[0]['ResInterview']['id'],'reason_id' => $this->request->data['Position']['reason_id'],  'req_resume_id' => $req_res_id, 'modified_date' => $this->Functions->get_current_date(),
						'modified_by' => $this->Session->read('USER.Login.id'), 'status_title' => $status);
						$this->ResInterview->save($data, array('validate' => false));					
					
						$this->set('cv_update_status', 1);
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Interview Details Updated Successfully', 'default', array('class' => 'alert alert-success'));									

					}
				}
			}
		}
	}
	
	/* function to schedule for interview */
	public function schedule_interview($id, $pos_id, $req_res_id,$interview_level,$schedule_type, $multi_sel){
		$this->layout = 'framebox';
		if(!empty($id) && !empty($pos_id)){
		
			// for multiple interview
			
			// get the template details
			$this->get_template_details($id,$pos_id, '3');
			$this->get_template_details($id,$pos_id, '2');
			// get interview levels
			$int_levels = array('First Interview', 'Second Interview', 'Final Interview');
			$this->set('int_levels', $int_levels);
			// get interview levels
			if($interview_level == '2'){
				$int_levels = array('Second Interview' => 'Second Interview', 'Final Interview' => 'Final Interview');
			}else if($interview_level == '3'){
				$int_levels = array('Final Interview' => 'Final Interview');
			}if($interview_level == '1' || $interview_level == ''){
				$int_levels = array('First Interview' => 'First Interview' , 'Second Interview' => 'Second Interview', 'Final Interview' => 'Final Interview');
			}
			// for reschedule
			if($schedule_type == 'reschedule'){
				// get rejection status drop down
				$this->get_reject_drop('Interview Reschedule');
				$reason_id = 'reason_id';
				$this->set('reschedule', 1);
			}
			
			$this->set('int_levels', $int_levels);
			// get interview duration
			$int_duration = array('00:30:00' => '30 Mins.', '00:45:00' => '45 Mins.', '01:00:00' => '1 Hr', '02:00:00' => '2 Hrs', '03:00:00' => '3 Hrs');
			$this->set('int_duration', $int_duration);
			// load the interview stages
			$this->loadModel('InterviewStage');
			$stage_list = $this->InterviewStage->find('list', array('fields' => array('id','interview_stage'), 
			'order' => array('interview_stage ASC'),'conditions' => array('is_deleted' => 'N', 'status' => '1')));
			$this->set('stageList', $stage_list);
		}
		// when the form submitted
		if(!empty($this->request->data)){
			// validate the form
			$this->Position->set($this->request->data);
			// retain the district
			// validate the form fields
			if ($this->Position->validates(array('fieldList' => array('interview_level','interview_stage_id','int_date','int_time',
				'int_duration','subject','message','subject_client','message_client','contact_name','contact_no','venue', $reason_id)))){	
				// get the req. resume id
				$this->loadModel('ReqResume');
				//$req_res_id = $this->ReqResume->find('all', array('fields' => array('ReqResume.id'), 
				//'conditions' => array('requirements_id' => $pos_id, 'resume_id' => $id)));
				// save req resume table
				$data = array('id' => $req_res_id,'modified_date' => $this->Functions->get_current_date(),
				'modified_by' => $this->Session->read('USER.Login.id'),	 'stage_title' => $this->request->data['Position']['interview_level'],
				 'status_title' => 'Scheduled');
				// save  req resume
				if($this->ReqResume->save($data, array('validate' => false))){		
					// save req resume status
					$this->loadModel('ReqResumeStatus');
					$data = array('req_resume_id' => $req_res_id, 'created_date' => $this->Functions->get_current_date(),
					'created_by' => $this->Session->read('USER.Login.id'), 'stage_title' => $this->request->data['Position']['interview_level'],'status_title' => 'Scheduled', 'note' => $this->request->data['Position']['note']);					
					if($this->ReqResumeStatus->save($data, array('validate' => false))){			
						// save interview status
						$this->loadModel('ResInterview');
						$data = array('req_resume_id' => $req_res_id, 'created_date' => $this->Functions->get_current_date(),
						'created_by' => $this->Session->read('USER.Login.id'), 'stage_title' => $this->request->data['Position']['interview_level'],
						'status_title' => 'Scheduled',	'int_date' => $this->Functions->format_date_save($this->request->data['Position']['int_date']),
						'int_duration' => $this->request->data['Position']['int_duration'], 'int_time' => $this->request->data['Position']['int_time'],
						'interview_stage_id' => $this->request->data['Position']['interview_stage_id'],
						'venue' =>  $this->request->data['Position']['venue'],'reason_id' =>  $this->request->data['Position']['reason_id'],
						'additional' => $this->request->data['Position']['additional'],
						'contact_name' => $this->request->data['Position']['contact_name'],
						'contact_no' => $this->request->data['Position']['contact_no']							
						);
						$this->ResInterview->save($data, array('validate' => false));
						
						// send the interview mail to candidate
						$candidate_msg = $this->get_template_details($id,$pos_id, '3');
						$candidate_msg_split = explode('|||', $candidate_msg);
						// get candidate details
						$resume_data = $this->ReqResume->Resume->findById($id, array('fields' => 'Resume.email_id','Resume.first_name',
						'Resume.last_name'));
						$from = ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
						$to_name = $resume_data['Resume']['first_name'].' '.$resume_data['Resume']['last_name'];
						// send mail to client 
						$resume_data['Resume']['email_id'] = 'testing7@bigspire.com'; // for testing
						$vars = array('from_name' => $from, 'to_name' => ucwords($to_name), 'msg'=> $candidate_msg_split[0]);
						// save the mail box
						$this->save_mail_box($candidate_msg_split[1], $candidate_msg_split[0], $req_res_id);
						// send mail
						if(!$this->send_email($candidate_msg_split[1], 'send_interview', $this->Session->read('USER.Login.email_id'), $resume_data['Resume']['email_id'], $vars)){	
							// show the msg.								
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail to candidate...', 'default', array('class' => 'alert alert-error'));				
						}
						
						// send the interview confirmation mail to client
						$client_msg = $this->get_template_details($id,$pos_id, '2');
						$client_msg_split = explode('|||', $client_msg);
						// get the resume details
						$options = array(								
								array('table' => 'resume_doc',
										'alias' => 'ResDoc',					
										'type' => 'INNER',
										'conditions' => array('`ResDoc.id` = `Resume`.`resume_doc_id`', )
									)
							);
						$resume_data = $this->ReqResume->Resume->find('all', array('conditions' => array('Resume.id' => $id),
						'fields' => array('ResDoc.resume','Resume.created_date','Resume.modified_date'), 'joins' => $options));
						// parse the file name	
						/*						
						$updated = $resume_data[0]['Resume']['modified_date'] ? $resume_data[0]['Resume']['modified_date'] : $resume_data[0]['Resume']['created_date'];
						$snap_file = substr($resume_data[0]['ResDoc']['resume'], 0, strlen($resume_data[0]['ResDoc']['resume']) - 5);
						$pdf_date = date('d-m-Y', strtotime($updated));	
						// check the file exists
						$resume_path = '../../hiring/uploads/snapshotmerged/'.$this->Functions->filter_file($snap_file).'_'.$pdf_date.'.pdf';
						if(!file_exists($resume_path)){
							$resume_path = '';
						}
						*/
						// get contact details		
						$client_data = $this->ReqResume->Position->findById($pos_id, array('fields' => 'client_contact_id','job_title','location'));
						$this->loadModel('Contact');
						$contact_data = $this->Contact->findById($client_data['Position']['client_contact_id'], array('fields' => 'Contact.first_name','Contact.last_name','Contact.email'));
						// $sub = 'Manage Hiring - Resume sent by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
						$from = ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
						$to_name = $contact_data['Contact']['first_name'].' '.$contact_data['Contact']['last_name'];
						// send mail to client 
						$contact_data['Contact']['email'] = 'testing7@bigspire.com'; // for testing
						$vars = array('from_name' => $from, 'to_name' => ucwords($to_name),'msg'=> $client_msg_split[0]);
						// save the mail box
						$this->save_mail_box($client_msg_split[1], $client_msg_split[0], $req_res_id);
						// send mail
						if(!$this->send_email($client_msg_split[1], 'confirm_interview', $this->Session->read('USER.Login.email_id'), $contact_data['Contact']['email'], $vars)){	
							// show the msg.								
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail to candidate...', 'default', array('class' => 'alert alert-error'));				
						}
						
						// if successfully update
						$this->set('cv_update_status', 1);
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Interview Details Updated Successfully', 'default', array('class' => 'alert alert-success'));											
					}
				}
			}else{
				// show the error msg.
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));					
			}
			
		}
	}
	
	/* function to show the view interview */
	public function view_interview_schedule($id, $int_level){
		$this->layout = 'framebox';
		$this->loadModel('ResInterview');
		$int_text = $this->Functions->get_level_text($int_level);
		$options = array(				
			
			array('table' => 'resume',
					'alias' => 'Resume',					
					'type' => 'LEFT',
					'conditions' => array('`Resume.id` = `ReqResume`.`resume_id`')
			),
			/*
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
			)*/
		);
		$this->set('interview_level', $int_text);
		$data = $this->ResInterview->find('all', array('fields' => array('int_date','int_duration','Resume.first_name','Resume.last_name'
		,'InterviewStage.interview_stage','venue','additional','contact_name','contact_no'),
		'conditions' => array('req_resume_id' => $id, 'ResInterview.stage_title' => $int_text), 'joins' => $options));
		$this->set('interview_data', $data[0]);
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
		'order' => array('first_name ASC'),'conditions' => array('Contact.status' => '0', 'Contact.is_deleted' => 'N',
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