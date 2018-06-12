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
			$url_vars = $this->Functions->create_url(array('keyword','from','to','loc','emp_id','status','unread','apr_status'),'Position'); 			
			if($rec_status == 'pending'){
				$pending = 'index/pending/';
			}
			$this->redirect('/position/'.$pending.'?srch_status=1&'.$url_vars);				
		}
		
		// set the page title
		$view_title = $this->Functions->get_view_type($this->request->params['pass'][0]);
		$this->set('title_for_layout', $view_title.' Position - Manage Hiring');	
		
		$this->set('locList', $this->get_loc_details());
		// set the approval status
		$this->set('approveStatus', array('W' => 'Awaiting Approval', 'R' => 'Rejected'));
		$this->set('stList', array('10' => 'Assigned', '1' => 'In-Process', '2' => 'On-Hold', '3' => 'Billed', '4' => 'Terminated','9' => 'In-Active'));			
		$fields = array('id','job_title','location','no_job','min_exp','max_exp','ctc_from','ctc_to','ReqStatus.title','req_status_id',
		'Client.client_name','team_member', 'Creator.first_name','created_date','modified_date', 'count(distinct ReqResume.id) cv_sent','group_concat(ReqResume.id) req_resume_id', 
		'group_concat(ReqResume.status_title) joined','count(distinct Read.id) read_count', "group_concat(distinct TeamMember.first_name
		SEPARATOR ', ') team_member", "group_concat(distinct CAH.first_name	SEPARATOR ', ') ac_holder",'Position.created_by','Position.is_approve','Position.status', "max(PositionStatus.id) st_id",
		"max(PositionStatus.users_id) st_user_id",'PositionStatus.member_approve', 'ReqRead.status','Position.req_status_id',
		'sum(ReqTeam.no_req) no_job', 'group_concat(distinct ReqRead.id) req_read_id');
				
		$options = array(			
			array('table' => 'users',
					'alias' => 'ResOwner',					
					'type' => 'LEFT',
					'conditions' => array('`ResOwner.id` = `ReqResume`.`created_by`')
			),
			array('table' => 'resume',
					'alias' => 'Resume',					
					'type' => 'LEFT',
					'conditions' => array('`Resume.id` = `ReqResume`.`resume_id`')
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
					'conditions' => array('`ReqTeam`.`requirements_id` = `Position`.`id`'),
					'ReqTeam.is_approve !=' => array('S','R')
			)
			,
			array('table' => 'users',
					'alias' => 'TeamMember',					
					'type' => 'LEFT',
					'conditions' => array('`ReqTeam`.`users_id` = `TeamMember`.`id`'
					)
			),
			array('table' => 'req_approval_status',
					'alias' => 'PositionStatus',					
					'type' => 'LEFT',
					'conditions' => array('`PositionStatus`.`requirements_id` = `Position`.`id`')
			),
			array('table' => 'req_read',
					'alias' => 'ReqRead',					
					'type' => 'LEFT',
					'conditions' => array('`ReqRead`.`requirements_id` = `Position`.`id`',
					'ReqRead.users_id' => $this->Session->read('USER.Login.id'),
					'ReqRead.status' => 'U')
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
		if($this->Session->read('USER.Login.roles_id') == '33'  || $this->Session->read('USER.Login.roles_id') == '35'){
			$show = 'all';
			$team_cond = false;
		}else{
			$show = '1';
			$team_cond = true;
		}
		
		
		
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
		
		if($this->Session->read('USER.Login.roles_id') == '38'){ // branch admin
			// get the branch users
			$user_data = $this->Position->Creator->find('all', array('conditions' => array('Creator.location_id' => $this->Session->read('USER.Login.location_id'),
			'Creator.is_deleted' => 'N'),
			'fields' => array('Creator.id')));
			foreach($user_data as $rec){
				$branch_user[] =  $rec['Creator']['id'];
			}
			$teamCond = array('OR' => array(
					'ReqResume.created_by' =>  $branch_user,
					'ReqTeam.users_id' => $branch_user,
					'AH.users_id' => $branch_user,
					'Position.created_by' => $branch_user						
				)
			);
		}
		
		// check role based access
		if($this->Session->read('USER.Login.roles_id') == '30'){ // recruiter
			$roleCond = array('PositionStatus.member_approve' => 'A',
			'PositionStatus.member_id' => $this->Session->read('USER.Login.id'));
		}
		
		
		/*
		
		// check role based access
		if($this->Session->read('USER.Login.roles_id') == '34'   && !$team_cond){ // account holder
			$empCond = array('AH.users_id' => $this->Session->read('USER.Login.id'));
		}else if($this->Session->read('USER.Login.roles_id') == '30'   && !$team_cond){ // recruiter
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
		
		if($this->Session->read('USER.Login.roles_id') == '33' || $this->Session->read('USER.Login.roles_id') == '35'  || $this->Session->read('USER.Login.roles_id') == '39'){ // director & BDH
			$empCond = '';
			$team_cond = '';
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
			$empCond = array('ReqTeam.users_id' => $this->request->query['emp_id']);
		}
		
		// for status condition
		if($this->request->query['status'] != ''){ 
			$st = $this->request->query['status'] == '10' ? '0' : $this->request->query['status'];
			$stCond = array('Position.req_status_id' => $st, 'Position.status' => 'A');
		}
		
		
		// for approval status condition
		if($this->request->query['apr_status'] != ''){ 
			$req_team_cond = array('ReqTeam.is_approve' => 'W');
			$approveCond = array('PositionStatus.status' => $this->request->query['apr_status'],
			'Position.created_by' => $this->Session->read('USER.Login.id'));
		}else if($rec_status =='pending'){
			// $approveCond = array('Position.status' => 'I', 'Position.is_approve' => 'W');
			// $req_team_cond = array('ReqTeam.is_approve' => 'W');
			$approveCond = array('PositionStatus.users_id' => $this->Session->read('USER.Login.id'),'PositionStatus.status' => 'W');
		}else{ 
			$req_team_cond = array('ReqTeam.is_approve' => 'A');
			$approveCond = array('Position.status' => 'A');			
		}
		
		
		// for unread status count
		if($this->request->query['unread'] == '1'){
			$stCond = array('ReqRead.users_id' => $this->Session->read('USER.Login.id'), 'ReqRead.status' => 'U');
		}
		
		$this->request->query['keyword'] = str_replace('||', '&', $this->params->query['keyword']);		
		$this->request->query['from'] = $start;
		$this->request->query['to'] = $end;
		// for iframe in report
		if($this->request->query['iframe'] == '1'){
			$clientCond = array('Position.clients_id' => $this->request->params['pass'][1]);
			$teamCond = '';
			$roleCond = '';
			$date_cond = '';
			$branchCond = '';
			$empCond = '';
			$req_team_cond = '';
			$contactCond = '';
			$approveCond = '';			
			$keyCond = '';
			$stCond = '';
			
			
			$this->set('noHead', '1');
			//$date_cond = array('or' => array("DATE_FORMAT(ReqResume.created_date, '%Y-%m-%d') between ? and ?" => 
				//	array($this->Functions->format_date_save($start), $this->Functions->format_date_save($end_search))));
			
			// condition for the resume or position status from reportings
			switch($this->request->params['pass'][0]){
				case 'ow':
				break;
				
			}
			
			$this->set('sticky', '');
		}else{	
			$this->set('sticky', 'stickyTable');
		}
		
		
		// for export
		if($this->request->query['action'] == 'export'){
			$data = $this->Position->find('all', array('fields' => $fields,'conditions' => 
			array('Position.is_deleted' => 'N',	'Resume.is_deleted' => 'N',$keyCond,$date_cond,$branchCond,$empCond,$stCond,$teamCond, $clientCond,$roleCond,$approveCond,$req_team_cond,$contactCond), 
			'order' => array('created_date' => 'desc'), 'group' => array('Position.id'), 'joins' => $options));
			$this->Excel->generate('positions', $data, $data, 'Report', 'PositionDetails'.date('dmy'));
		}
		
		$this->paginate = array('fields' => $fields,'limit' => '25','conditions' => array('Position.is_deleted' => 'N',
		$keyCond,$approveCond,$date_cond,$branchCond,$empCond,$stCond,
		$teamCond,$clientCond,$roleCond,$req_team_cond,$contactCond),
		'order' => array('created_date' => 'desc'),	'group' => array('Position.id'), 'joins' => $options);
		$data = $this->paginate('Position');
		$this->set('data', $data);
		if(empty($data) && empty($this->request->data)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Oops! No Positions Found!', 'default', array('class' => 'alert alert-info'));
		}
		
	}
	
	/* function to add the position */
	public function add($client_id){
		$this->check_role_access(4);
		// set the page title		
		$this->set('title_for_layout', 'Create Position - Positions - Manage Hiring');	
		$this->load_static_data();
		// get exp list
		$this->set('expList', $this->Functions->get_experience());
		$this->set('openingList', $this->Functions->get_no_opening());
		
		// assign the ctc type
		$this->set('ctcList', array('L' => 'Lacs'));
		// resume hide and resume types
		$this->set('hide_contacts', array('1' => 'Yes', '0' => 'No'));
		$this->set('resume_types', array('S' => 'Snapshot', 'F' => 'Fully Formatted Resume'));
		$this->set('project_types', array('1' => 'RPO', '0' => 'Non - RPO'));
		
		// get total job for job code
		if(empty($this->request->data)){
			$tot = $this->Position->find('count', array('conditions' => array('Position.created_date like' => date('Y').'%')));
			$this->set('jobCode', 'CT/'.++$tot.'/'.date('Y'));	
		}		
		// when client id is passed from view client
		if($client_id){
			$this->get_contact_list($client_id);
		}
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
			'ctc_to_type','skills','team_member_req','end_date','function_area_id','status','job_desc','education','tech_skill','behav_skill',
			'hide_contact','resume_type','job_code','is_rpo','total_opening')))){
				// format the dates
				// $this->request->data['Position']['start_date'] = $this->Functions->format_date_save($this->request->data['Position']['start_date']);
				$this->request->data['Position']['start_date'] = date('Y-m-d');
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
							$this->check_duplicate_status($this->Position->id, $approval_data['Approve']['level1'],$team_id);			
							// save req. status data
							$this->PositionStatus->id = '';
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
				$this->get_team_member_list_submit($this->request->data['Position']['team_id']);
				// print_r($this->Position->validationErrors);die;
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Please check the validation errors...', 'default', array('class' => 'alert alert-error'));					
			}

		}
	}
	

	
	/* function to check for duplicate entry */
	public function check_duplicate_status($req_id, $app_user_id, $member_id, $exist){
		$count = $this->PositionStatus->find('count',  array('conditions' => array('PositionStatus.requirements_id' => $req_id,
		'PositionStatus.users_id' => $app_user_id, 'PositionStatus.status' => 'W', 	'PositionStatus.member_id' => $member_id)));
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
				$this->set('openingList', $this->Functions->get_no_opening());
				// assign the ctc type
				$this->set('ctcList', array('L' => 'Lacs'));
				// resume hide and resume types
				$this->set('hide_contacts', array('1' => 'Yes', '0' => 'No'));
				$this->set('resume_types', array('S' => 'Snapshot', 'F' => 'Fully Formatted Resume'));
				$this->set('project_types', array('1' => 'RPO', '0' => 'Non - RPO'));

				// retain the account holder
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
					if($this->Position->validates(array('fieldList' => array('clients_id','client_contact_id','job_title','location','max_exp',
					'ctc_from','ctc_to','ctc_from_type','ctc_to_type','skills','team_member_req','end_date','function_area_id','job_desc',
					'education','tech_skill','behav_skill',	'hide_contact','resume_type','job_code','rev_remarks','is_rpo','total_opening')))){
						// format the dates
						$this->request->data['Position']['start_date'] = $this->Functions->format_date_save($this->request->data['Position']['start_date']);
						$this->request->data['Position']['end_date'] = $this->Functions->format_date_save($this->request->data['Position']['end_date']);
						
						$this->request->data['Position']['is_approve'] = 'W';
						$this->request->data['Position']['status'] = 'I';
						$this->request->data['Position']['req_status_id'] =  NULL;
						// save the data
						if($this->Position->save($this->request->data['Position'], array('validate' => false))){
							// save the file name
							$this->save_job_desc($this->Position->id);
							// remove position coordination
							// $this->remove_position_coodination($this->Position->id);
							// save position coordination
							// $this->save_position_coodination($this->Position->id);
							// remove team members list
							$this->update_team_member($this->Position->id);
							// save team members list
							$team_members = $this->save_team_member($this->Position->id);
							// save req. revision
							$this->save_req_revision($this->Position->id);
							// update req approval status table
							$this->save_req_approval($this->Position->id);
							// make all the reads to read mode
							$this->update_req_read_status($this->Position->id);
							
							// send mail to approver
							$sub = 'Manage Hiring - Position revised by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
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
									$this->check_duplicate_status($this->Position->id, $approval_data['Approve']['level1'],$team_id);			
									// save req. status data
									$this->PositionStatus->id = '';
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
													'conditions' => array('`ReqTeam.requirements_id` = `Position`.`id`',													
													'ReqTeam.is_approve !=' => 'S')
											),
											array('table' => 'users',
													'alias' => 'TeamMember',					
													'type' => 'INNER',
													'conditions' => array('`ReqTeam.users_id` = `TeamMember`.`id`')
											)
										);								
										$position_data = $this->Position->find('all', array('conditions' => array('Position.id' => $this->Position->id),'fields' => array( 'Client.client_name',	"group_concat(distinct TeamMember.first_name  SEPARATOR ', ') team_member"),'joins' => $options));

										$vars = array('from_name' => $from, 'to_name' => ucwords($leader_data[0]['Creator']['first_name'].' '.$leader_data[0]['Creator']['last_name']), 'position' => $this->request->data['Position']['job_title'],'client_name' => $position_data[0]['Client']['client_name'], 'no_opening' => $this->request->data['Position']['no_job'], 'team_member' => $position_data[0][0]['team_member'],
										'location' => $this->request->data['Position']['location'], 'remarks' =>  $this->request->data['Position']['rev_remarks']);																
										
										// notify superiors						
										if(!$this->send_email($sub, 'add_position', 'noreply@managehiring.com', $leader_data[0]['Creator']['email_id'],$vars)){	
											// show the msg.								
											$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail for approval...', 'default', array('class' => 'alert alert-error'));				
										}else{
											$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Position Revised Successfully. After approval, it will be visible', 'default', array('class' => 'alert alert-info'));				
										}
									}
								}else{
									$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Recruiter has no superior to approve your request', 'default', array('class' => 'alert alert-info'));
								}				
							}						
							
							// show the msg.
							$this->redirect('/position/');
						}else{
							// show the error msg.
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));					
						}
					}else{
						$this->get_team_member_list_submit($this->request->data['Position']['team_id']);
						// print_r($this->Position->validationErrors);die;
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Please check the validation errors...', 'default', array('class' => 'alert alert-error'));					
					}			
				}else{
				
					// get the position details
					$data = $this->Position->find('all', array('fields' => array('Position.id','clients_id','client_contact_id','job_title','location','min_exp','max_exp',
					'ctc_from','ctc_to','education','ctc_from_type','ctc_to_type','skills','no_job','start_date','end_date','function_area_id', 'is_rpo',
					'job_desc','job_desc_file','client_contact_id',	'tech_skill','behav_skill','hide_contact','resume_type','plain_jd','job_code','created_date','modified_date'), 
					'conditions' => array('Position.id' => $id), 'joins' => $options));
					$this->request->data = $data[0];					
					// format the dates
					$created = explode(' ', $this->request->data['Position']['created_date']);
					$modified = explode(' ', $this->request->data['Position']['modified_date']);
					$start = $this->request->data['Position']['start_date'] ? $this->request->data['Position']['start_date'] : $created[0];
					$end = $this->request->data['Position']['end_date'] ? $this->request->data['Position']['end_date'] : $modified[0];				
					if($start){
						$this->request->data['Position']['start_date'] = $this->Functions->format_date_show($start);
					}
					if($end){
						$this->request->data['Position']['end_date'] = $this->Functions->format_date_show($end);
					}
					// for job description
					$this->request->data['Position']['job_desc'] = $this->request->data['Position']['job_desc'] ? $this->request->data['Position']['job_desc'] : nl2br($this->request->data['Position']['plain_jd']);
					$this->request->data['Position']['tech_skill'] = $this->request->data['Position']['tech_skill'] ? $this->request->data['Position']['tech_skill'] : nl2br($this->request->data['Position']['skills']);

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
	
	/* function to save the req. revision */
	public function save_req_revision($id){
		$this->loadModel('ReqRevision');
		$data = array('requirements_id' => $id, 'remarks' => $this->request->data['Position']['rev_remarks'], 'created_date' => $this->Functions->get_current_date());
		$this->ReqRevision->save($data, true, $fieldList = array('created_date','requirements_id','remarks'));
	}
	
	/* function to save the req. approval */
	public function save_req_approval($id){
		$this->loadModel('PositionStatus');
		$this->PositionStatus->updateAll(array('status' => "'S'"), 	array('requirements_id' => $id));
	}
	
	
	/* function to download the file */
	public function download_doc($file){
		 $this->download_file(WWW_ROOT.'/uploads/jd/'.$file);
		 die;
	}
	
	/* function to auth record */
	public function auth_action($id, $st_id){ 	
		if($this->request->params['pass'][2] != 'pending'){	
			$options = array(								
				array('table' => 'req_approval_status',
						'alias' => 'PositionStatus',					
						'type' => 'LEFT',
						'conditions' => array('`PositionStatus.requirements_id` = `Position`.`id`',
							'member_id' => $this->Session->read('USER.Login.id'), 'member_approve' => 'A')
					)								
			);
			$data = $this->Position->find('all', array('fields' => array('PositionStatus.member_id','Position.clients_id',
			'PositionStatus.users_id','Position.created_by','Position.is_deleted','Position.modified_date'),
			'group' => array('Position.id'), 'conditions' => array('Position.id' => $id), 'joins' => $options));
		
			// for not account holders but the leaders for the recruiters
			$options = array(								
					array('table' => 'req_approval_status',
							'alias' => 'PositionStatus',					
							'type' => 'LEFT',
							'conditions' => array('`PositionStatus.requirements_id` = `Position`.`id`',
								'users_id' => $this->Session->read('USER.Login.id'))
						)								
				);
			$data2 = $this->Position->find('all', array('fields' => array('PositionStatus.users_id'),
			'group' => array('Position.id'), 'conditions' => array('Position.id' => $id), 'joins' => $options));
			
			// for account holders		
			$this->loadModel('ClientAccountHolder');
			$data3 = $this->ClientAccountHolder->find('count', array('conditions' => array('ClientAccountHolder.clients_id' => $data[0]['Position']['clients_id'],
			'ClientAccountHolder.users_id' => $this->Session->read('USER.Login.id'))));
			
			// check the req belongs to the user
			if($data[0]['Position']['is_deleted'] == 'Y'){
				return $data['Position']['modified_date'];
			}else if($data[0]['Position']['created_by'] == $this->Session->read('USER.Login.id')){	
				return 'pass';
			}else if($data[0]['PositionStatus']['member_id'] == $this->Session->read('USER.Login.id')){	
				return 'pass';
			}else if($data2[0]['PositionStatus']['users_id'] == $this->Session->read('USER.Login.id')){	
				return 'pass';
			}else if($this->Session->read('USER.Login.roles_id') == '33' || $this->Session->read('USER.Login.roles_id') == '35'){	
				return 'pass';
			}else if($data3){	
				return 'pass';
			}else{
				return 'fail';
			}
		}else if($this->request->params['pass'][2] == 'pending'){	
			$data = $this->PositionStatus->find('all', array('fields' => array('PositionStatus.users_id','PositionStatus.member_id'),
			'conditions' => array('PositionStatus.id' => $st_id, 'member_approve' => 'W')));
			if($data[0]['PositionStatus']['users_id'] == $this->Session->read('USER.Login.id')){
				$this->set('stmemberID', $data[0]['PositionStatus']['member_id']);
				return 'pass';
			}else{
				return 'fail';
			}
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
	
	/* function to update the team members */
	public function update_team_member($id){
		$this->loadModel('ReqTeam');		
		$this->ReqTeam->updateAll(array('is_approve' => "'S'"), array('requirements_id' => $id));
	}
	
	/* function to save team member */
	public function save_team_member($id){
		$this->loadModel('ReqTeam');
		// parse the req. 
		$req_no = $this->request->data['Position']['team_id'];
		$split_req = explode(',', $req_no);
		foreach($split_req as $req){ 
			$new_split_req = explode('-', $req);
			$no_job += $new_split_req[1];
			if($new_split_req[0] != ''){
				$member_id[] = $new_split_req[0];
				$this->ReqTeam->create();
				$data = array('created_by' => $this->Session->read('USER.Login.id'),'requirements_id' => $id, 'users_id' => $new_split_req[0], 'no_req' => $new_split_req[1], 'is_approve' => 'W');
				$this->ReqTeam->save($data, true, $fieldList = array('requirements_id','created_by','users_id','no_req','is_approve'));
			}
		}
		$this->Position->id = $id;
		$this->request->data['Position']['no_job'] = $no_job;
		$this->Position->saveField('no_job',$no_job);
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
		$team_member = $this->ReqTeam->find('all', array('fields' => array('users_id','no_req'), 'conditions' => array('requirements_id' => $id,
		'ReqTeam.is_approve' => array('W','A'))));
		foreach($team_member as $record){
			$users[] = $record['ReqTeam']['users_id'];
			$no_pos[] = $record['ReqTeam']['no_req'];
		}
		$this->set('posData', $no_pos);
		// get team member info
		$data = $this->Position->Creator->find('all', array('fields' => array('Creator.first_name','Creator.last_name','Creator.id'),
		'conditions' => array('Creator.id' => $users)));
		$this->set('teamData', $data);
	}
	
	/* function to get the team members list after form submitted */
	public function get_team_member_list_submit($id){	
		$users = explode(',', $id);
		foreach($users as $key => $record){
			$no_req = explode('-', $record);
			if(trim($no_req[0]) != ''){
				$users_list = $no_req[0];
				// get team member info
				$data[] = $this->Position->Creator->findById($users_list, array('fields' => 'Creator.first_name','Creator.last_name','Creator.id'));
				$no_pos[] = $no_req[1];
			}
		}
		
		$this->set('teamData', $data);
		$this->set('posData', $no_pos);
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
		$con_list = $this->Contact->find('all', array('fields' => array('Contact.id',"concat(first_name,' ',last_name) uname"),
		'order' => array('first_name ASC'),'conditions' => array('Contact.status' => 'A', 'Contact.is_deleted' => 'N',
		'ClientCont.clients_id' => $id), 'joins' => $options));
		$format_list = $this->Functions->format_list_key($con_list, 'Contact','id', 'uname');
		$this->set('spocList', $format_list);
	}
	
	/* function to load static data */
	public function load_static_data(){
		// load the clients
		$options = array(							
			array('table' => 'client_account_holder',
					'alias' => 'AH',					
					'type' => 'INNER',
					'conditions' => array('`AH`.`clients_id` = `Client`.`id`',
					'AH.users_id' => $this->Session->read('USER.Login.id'))
			)
		);
		$client_list = $this->Position->Client->find('all', array('fields' => array('id','client_name'), 
		'order' => array('client_name ASC'),'conditions' => array('Client.is_deleted' => 'N', 'Client.status' => '0', 'Client.is_approve' => 'A',
		'Client.client_name !=' => ''),	'group' => array('Client.id'),	'joins' => $options));
		$client_data = $this->Functions->format_list($client_list, 'Client', 'id', 'client_name');
		$this->set('clientList', $client_data);
		// load the account holders
		$ac_list = $this->Position->Creator->find('list',  array('fields' => array('id','first_name'), 
		'order' => array('first_name ASC'),'conditions' => array('status' => '0', 'roles_id' => array('37', '40'))));
		$this->set('acList', $ac_list);
		// load the team members
		$this->Position->Creator->virtualFields['full_name'] = 'CONCAT(Creator.first_name, " ", Creator.last_name)';
		$user_list = $this->Position->Creator->find('list',  array('fields' => array('id','full_name'), 
		'order' => array('first_name ASC'),'conditions' => array('status' => '0', 'roles_id' => array('30','37', '40'))));
		$this->set('userList', $user_list);
		// load the functional area
		$function_list = $this->Position->FunctionArea->find('list', array('fields' => array('id','function'), 
		'order' => array('function ASC'),'conditions' => array('is_deleted' => 'N', 'status' => '1')));
		$this->set('functionList', $function_list);
		
		// get the sharing details
		// $this->loadModel('Coordination');
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
	public function view($id, $st_id){
		// set the page title
		$view_title = $this->Functions->get_view_type($this->request->params['pass'][4]);
		$this->set('title_for_layout', $view_title.' Position - Manage Hiring');	
		$this->set('stList', $this->get_status_details());
		// authorize user before action
		$this->loadModel('PositionStatus');
		$ret_value = $this->auth_action($id, $st_id);
		// update the read req.
		if($this->request->params['pass'][2] != '' && $this->request->params['pass'][3] == 'U'){
			$req_id = explode(',', $this->request->params['pass'][2]);
			// update all the resumes update
			foreach($req_id as $req_read_id){
				$this->loadModel('ReqRead');
				$this->ReqRead->id = $req_read_id;
				$this->ReqRead->saveField('modified_date', $this->Functions->get_current_date());
				$this->ReqRead->saveField('status', 'R');
			}
		}
		if($ret_value == 'pass'){
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
						'conditions' => array('`PositionContact.clients_id` = `Client`.`id`')
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
						'conditions' => array('`ReqTeam.requirements_id` = `Position`.`id`',
						'ReqTeam.is_approve !=' => array('S','R')
						)
				),
				array('table' => 'users',
						'alias' => 'TeamMember',					
						'type' => 'INNER',
						'conditions' => array('`ReqTeam.users_id` = `TeamMember`.`id`'
						)
						
				),
				array('table' => 'req_revision',
						'alias' => 'ReqRevision',					
						'type' => 'LEFT',
						'conditions' => array('`ReqRevision.requirements_id` = `Position`.`id`')
				),
				array('table' => 'reason',
						'alias' => 'Reason2',					
						'type' => 'LEFT',
						'conditions' => array('`Reason2.id` = `Position`.`reason_not_billable`')
					)
			);
			
			$this->Position->unBindModel(array('hasOne' => array('ReqResume')));

			$fields = array('id','Client.id','job_title','job_code','education','location','no_job','min_exp','max_exp','ctc_from','ctc_to','ReqStatus.title','job_desc',
			'Client.client_name', 'Creator.first_name','created_date','modified_date','Contact.last_name','req_status_id',
			//'count(DISTINCT  ReqResume.id) cv_sent','req_status_id',
			//'group_concat(ReqResume.status_title) joined',
			'start_date', 'end_date', //"group_concat(distinct ResOwner.first_name  SEPARATOR ', ') team_member",
			"group_concat(distinct AH.first_name  SEPARATOR ', ') ac_holder","group_concat(distinct concat(TeamMember.first_name,' ',TeamMember.last_name)) team_member2",
			'skills','Contact.first_name','Contact.email','Contact.mobile','Contact.phone','Contact.id','FunctionArea.function',
			'Position.created_by','Position.is_approve','tech_skill','behav_skill','job_desc_file','hide_contact','resume_type',
			'ReqStatus.id','Position.plain_jd','group_concat(ReqTeam.no_req) team_req','group_concat(distinct ReqTeam.users_id) team_mem_id',
			'group_concat(distinct CAH.users_id) ac_holder_id','ctc_from_type','ctc_to_type',
			"group_concat(CONCAT(ReqTeam.users_id, ':', ReqTeam.is_approve) SEPARATOR '|' ) mem_approve",
			'Position.status','count(distinct ReqRevision.id) as no_revision', 'Position.remarks', 'group_concat(ReqRevision.created_date) revision_history','is_rpo',
			 "group_concat(ReqRevision.remarks separator '|||') revision_remark",'Reason2.reason');

			$data = $this->Position->find('all', array('fields' => $fields,'conditions' => array('Position.id' => $id),	'joins' => $options));
			
		
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
			$data = $this->Position->ReqResume->find('all', array('fields' => array('Resume.code','Resume.id','Resume.first_name',
			'Resume.last_name','ReqResume.status_title','ReqResume.stage_title','Resume.created_date','Resume.modified_date',
			'ReqResume.created_date','Resume.mobile','Resume.email_id','Resume.present_ctc','Resume.expected_ctc',
			'Resume.notice_period','ResLoc.location','Creator.first_name','ReqResume.modified_date','ReqResume.bill_ctc','ResDoc.resume',
			'Resume.present_location','Resume.present_ctc_type','Resume.expected_ctc_type', 'ReqResume.id', 'ReqResume.cv_sent_date',
			'ReqResume.cv_shortlist_date','Reason.reason'),
			'conditions' => array('requirements_id' => $id,'Position.is_deleted' => 'N','Resume.is_deleted' => 'N', 'ReqResume.status_title !=' => 'Draft'),
			'order' => array('Resume.created_date' => 'desc'),'group' => array('ReqResume.id'), 'joins' => $options));		
			$this->set('resume_data', $data);
			/*
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
			*/
		}else if($ret_value == 'fail'){ 
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
			$this->redirect('/position/');	
		}
		
	}
	
	/* function to approve / reject the position */
	public function remark($req_id, $st_id,$user_id,$status,$team_id){
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
					$data = array('modified_date' => $this->Functions->get_current_date(), 'modified_by' => $this->Session->read('USER.Login.id'),
					'remarks' => $this->request->data['Position']['remarks'], 'status' => $status, 'is_approve' => $status);
					$this->PositionStatus->id = $st_id;
					$st_msg = $status == 'A' ? 'approved' : 'rejected';
					// make sure not duplicate status exists
					$this->check_duplicate_status($req_id, $this->Session->read('USER.Login.id'), $team_id, 1);
					// save the position status
					if($this->PositionStatus->save($data, true, $fieldList = array('modified_by','modified_date','remarks','status','is_approve'))){
						// get the member id to find the L2
						$member_data = $this->PositionStatus->find('first', array('fields' => array('member_id'), 'conditions'=> array('PositionStatus.id' => $st_id)));							
						// update team member
						$this->loadModel('ReqTeam');
						$req_data_id = $this->ReqTeam->find('all', array('fields' => array('ReqTeam.id'), 'conditions' => array('ReqTeam.requirements_id' => $req_id,
						'ReqTeam.users_id' => $member_data['PositionStatus']['member_id']),	'order' => array('ReqTeam.id' => 'desc')));
						$this->ReqTeam->id = $req_data_id[0]['ReqTeam']['id'];
						$this->ReqTeam->saveField('is_approve', 'A');

						//$this->ReqTeam->updateAll(array('is_approve' => "'A'"), array('requirements_id' => $req_id, 'users_id' => $member_data['PositionStatus']['member_id',
						//'ReqTeam.id' => ));
						
						// get user data
						$user_data = $this->Position->Creator->find('all', array('conditions' => array('Creator.id' => array($user_id,$member_data['PositionStatus']['member_id'])),
						'fields' => array('Creator.id',	'Creator.first_name','Creator.last_name','Creator.email_id')));
						
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
						
						$position_data = $this->Position->find('all', array('conditions' => array('Position.id' => $req_id),'fields' => array( 'Client.client_name',
						"group_concat(distinct TeamMember.first_name  SEPARATOR ', ') team_member", 'Position.no_job','Position.job_title','Position.location'),'joins' => $options));
						
						
						
						// send mail to account holder and recruiters
						foreach($user_data as $user){						
							$from = ucfirst($user['Creator']['first_name']).' '.ucfirst($user['Creator']['last_name']);									
							$vars = array('to_name' => $from, 'from_name' => ucwords($this->Session->read('USER.Login.first_name').' '.$this->Session->read('USER.Login.last_name')), 
							'position' => $position_data[0]['Position']['job_title'],'client_name' => $position_data[0]['Client']['client_name'], 
							'no_opening' => $position_data[0]['Position']['no_job'], 'team_member' => $position_data[0][0]['team_member'],
							'location' => $position_data[0]['Position']['location'], 'approve_msg' => $approve_msg, 'remarks' => $this->request->data['Position']['remarks']);					
							// notify employee						
							if(!$this->send_email('Manage Hiring - Position '.$st_msg.' by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name')),
							'approve_position', 'noreply@managehiring.com', $user['Creator']['email_id'],$vars)){		
								// show the msg.								
								$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail to user...', 'default', array('class' => 'alert alert-error'));				
							}else{
								$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Position '.$approve_msg.' Successfully.', 'default', array('class' => 'alert alert-success'));
							}
						}
						
						// get the superiors
						$this->loadModel('Approve');
						// if record approved
						if($status == 'A'){
							// get the team member user id							
							// $approval_data = $this->Approve->find('first', array('fields' => array('level2'), 'conditions'=> array('Approve.users_id' => $member_data['PositionStatus']['member_id'])));
							
							/*
							// make sure level 2 is not empty
							if(!empty($approval_data['Approve']['level2'])){
								// check level 2 is not empty and its not the same user
								if($approval_data['Approve']['level2'] != $this->Session->read('USER.Login.id')){ 	
									// get superior level 2 details				
									$data = array('requirements_id' => $req_id, 'created_date' => $this->Functions->get_current_date(), 
									'users_id' => $approval_data['Approve']['level2'], 'is_approve' => 'W', 'member_id' => $member_data['PositionStatus']['member_id']);
									// save leve 2 if found
									$this->PositionStatus->id = '';						
									// make sure not duplicate status exists
									$this->check_duplicate_status($req_id, $approval_data['Approve']['level2'], $member_data['PositionStatus']['member_id'],  0);						
									if($this->PositionStatus->save($data, true, $fieldList = array('requirements_id','created_date','users_id','is_approve', 'member_id'))){
										$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Position '.$approve_msg.' Successfully.', 'default', array('class' => 'alert alert-success'));																	
									}else{
										$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving superior status...', 'default', array('class' => 'alert alert-error'));
									}
								}else{
									// update status if l2 approved
									
									$this->Position->id = $req_id;
									//$this->Position->saveField('is_approve', 'A');
									$this->Position->saveField('status', 'A');	
									$this->Position->saveField('req_status_id', '0');
									
									// approve the member
									$this->PositionStatus->id = $st_id;
									$this->PositionStatus->saveField('member_approve', 'A');
									
									// save the read status
									$this->save_read_status($req_id,$member_data['PositionStatus']['member_id']);
									
									// update only if all team members are approved or rejected
									$app_count = $this->ReqTeam->find('count', array('conditions' => array('ReqTeam.requirements_id' => $req_id,
									'ReqTeam.is_approve' => 'W')));
									if(!$app_count){
										$this->Position->saveField('is_approve', 'A');
									}
									
									
								}
							}else{
							
							*/
								// update  status
								
								$this->Position->id = $req_id;
								//$this->Position->saveField('is_approve', 'A');
								$this->Position->saveField('status', 'A');
								$this->Position->saveField('req_status_id', '0');	
									
								
								// approve the member
								$this->PositionStatus->id = $st_id;
								$this->PositionStatus->saveField('member_approve', 'A');
								
								// save the read status
								$this->save_read_status($req_id,$member_data['PositionStatus']['member_id']);
								
								// update only if all team members are approved or rejected
								$app_count = $this->ReqTeam->find('count', array('conditions' => array('ReqTeam.requirements_id' => $req_id,
								'ReqTeam.is_approve' => 'W')));
								if(!$app_count){
									$this->Position->saveField('is_approve', 'A');
								}
							}
							
						}else{
							// update  status
							$this->Position->id = $req_id;
							// $this->Position->saveField('is_approve', 'R');
							$this->PositionStatus->id = $st_id;
							$this->PositionStatus->saveField('member_approve', 'R');
							// update the req team
							$this->loadModel('ReqTeam');
							$req_team_data = $this->ReqTeam->find('all', array('conditions' => array('ReqTeam.requirements_id' => $req_id,
							'users_id' => $member_data['PositionStatus']['member_id']), 'fields' => array('ReqTeam.id'), 'order' => array('ReqTeam.id' => 'desc')));
							$this->ReqTeam->id = $req_team_data[0]['ReqTeam']['id']; 
							$this->ReqTeam->saveField('is_approve', 'R');
							
							// update only if all team members are approved or rejected
							$app_count = $this->ReqTeam->find('count', array('conditions' => array('ReqTeam.requirements_id' => $req_id,
							'ReqTeam.is_approve' => 'W')));
							if(!$app_count){
								$this->Position->saveField('is_approve', 'A');
							}
								
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
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Problem in submitting the form. Pls check the errors', 'default', array('class' => 'alert alert-error'));		
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
	
	/* function to save the req read status for recruiter */
	public function save_read_status($id, $user_id){
		$this->loadModel('ReqRead');
		$data = array('requirements_id' => $id, 'created_date' => $this->Functions->get_current_date(),
		'users_id' => $user_id);
		$this->ReqRead->save($data, array('validate' => false));
	}
	
	/* function to update the req read status */
	public function update_req_read_status($id){
		$this->loadModel('ReqRead');
		$this->ReqRead->updateAll(array('status' => "'R'",  'modified_date' => '"'.$this->Functions->get_current_date().'"'), array('requirements_id' => $id));

	}
	
	/* function to send CV to client */
	public function send_cv($res_id, $pos_id, $req_res_id){ 
		$this->layout = 'framebox';
		// when the values are not empty
		if(!empty($res_id) && !empty($pos_id)){
			// if multi option is selected
			if($res_id == 'multi_select'){	
				$this->set('tiny_readonly', '1');
				$multi_chk = 1;
				$resume_check = explode(',', $pos_id);
				// iterate the candidates
				foreach($resume_check as $check){
					if(trim($check) != ''){
						$check_ids = explode('-', $check);
						// $chk_resume_id[] = $check_ids[0];	
						$chk_pos_id[] = $check_ids[1];
						$req_res_ids[] = $check_ids[2];
						// save resume ids in array
						$chk_resume_id_ar[] = $check_ids[0];
					}
				}
				// get the candidate names
				$options = array(			
					array('table' => 'resume',
							'alias' => 'Resume',					
							'type' => 'LEFT',
							'conditions' => array('`Resume`.`id` = `ReqResume`.`resume_id`')
					)						
				);
					
				$fields = array('Resume.first_name','Resume.last_name');
				$cand_data = $this->Position->find('all', array('fields' => $fields,'conditions' => array('Resume.id' => $chk_resume_id_ar),
				'group' => array('Resume.id'),'joins' => $options));
				foreach($cand_data as $cand){
					$can_name .= ucwords($cand['Resume']['first_name'].' '.$cand['Resume']['last_name']).', ';	
				}				
				$pos_id = $chk_pos_id[0];
				$res_id = $chk_resume_id_ar[0];
				$cand_name = substr($can_name, 0, strlen($can_name)-3);
			}else{
				$req_res_ids[] = $req_res_id;
				
			}
			// for success page redirect
			$this->set('spec_id', $pos_id);

			// get the template details
			$this->get_template_details($res_id,$pos_id, '1','',$cand_name,$chk_resume_id_ar);
			
		}
		// get the req. resume id
		$this->loadModel('ReqResume');
		// get contact details		
		$client_data = $this->ReqResume->Position->findById($pos_id, array('fields' => 'client_contact_id','job_title','location','resume_type'));
			
		// when the form submitted
		if(!empty($this->request->data)){
			// set the validation
			$this->Position->set($this->request->data);
			$validate = $this->Position->validates(array('fieldList' => array('subject','message')));
			// if validation pass
			if($validate){
				// iterate for multiple send CVs
				foreach($req_res_ids as $key => $req_res_id){
					if($req_res_id != ''){
						// save req resume table
						$data = array('id' => $req_res_id ,'modified_date' => $this->Functions->get_current_date(),
						'modified_by' => $this->Session->read('USER.Login.id'),	'stage_title' => 'Shortlist', 'status_title' => 'CV-Sent',
						'cv_sent_date' => $this->Functions->get_current_date());
						// save  req resume
						if($this->ReqResume->save($data, array('validate' => false))){		
							// save req resume status
							$this->loadModel('ReqResumeStatus');
							$data = array('req_resume_id' => $req_res_id, 'created_date' => $this->Functions->get_current_date(),
							'created_by' => $this->Session->read('USER.Login.id'), 'stage_title' => 'Shortlist', 'status_title' => 'CV-Sent');
							$this->ReqResumeStatus->id = '';
							if($this->ReqResumeStatus->save($data, array('validate' => false))){
								// get mail contents
								// for multi selection only
								/*
								if($multi_chk  == '1'){ 
									$message = $this->get_template_details($chk_resume_id_ar[$key],$pos_id, '1','',$cand_name,$chk_resume_id_ar);
									$candidate_msg_split = explode('|||', $message);
									$message = $candidate_msg_split[0];
									$subject = $candidate_msg_split[1];							
								}else{
									$message = $this->request->data['Position']['message'];
								}	
								*/
								
								$message = $this->request->data['Position']['message'];
								$subject = $this->request->data['Position']['subject'];
			
								// get the resume details
								$options = array(								
										array('table' => 'resume_doc',
												'alias' => 'ResDoc',					
												'type' => 'INNER',
												'conditions' => array('`ResDoc.id` = `Resume`.`resume_doc_id`', )
											)
									);
								$resume_data = $this->ReqResume->Resume->find('all', array('conditions' => array('Resume.id' => $chk_resume_id_ar ? $chk_resume_id_ar : $res_id),
								'fields' => array('ResDoc.resume','Resume.first_name', 'Resume.last_name', 'Resume.created_date','Resume.modified_date'), 'joins' => $options));
								// parse the file name			
								foreach($resume_data as $resume_file){
									$updated = $resume_file['Resume']['modified_date'] ? $resume_file['Resume']['modified_date'] : $resume_file['Resume']['created_date'];
									$snap_file = substr($resume_file['ResDoc']['resume'], 0, strlen($resume_file['ResDoc']['resume']) - 5);
									$pdf_date = date('d-m-Y', strtotime($updated));		
									$resume_folder = $client_data['Position']['resume_type'] == 'F' ? 'autoresumepdf/' : 'snapshotwatermarked/';
									if(file_exists('../../hiring/uploads/'.$resume_folder.$this->Functions->filter_file($snap_file).'_'.$pdf_date.'.pdf')){
										$resume_path[$resume_file['Resume']['first_name'].' '.$resume_file['Resume']['last_name'].'.pdf'] = '../../hiring/uploads/'.$resume_folder.$this->Functions->filter_file($snap_file).'_'.$pdf_date.'.pdf';
									}
									
								}						
								// $this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>CV Sent Successfully', 'default', array('class' => 'alert alert-success'));									
							}
						}				
					}
				}
				$this->loadModel('Contact');
				$contact_data = $this->Contact->findById($client_data['Position']['client_contact_id'], array('fields' => 'Contact.first_name','Contact.last_name','Contact.email'));
			
				// $sub = 'Manage Hiring - Resume sent by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
				$from = ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
				$to_name = $contact_data['Contact']['first_name'].' '.$contact_data['Contact']['last_name'];
				// send mail to client 
				// $contact_data['Contact']['email'] = 'testing7@bigspire.com'; // for testing
				$vars = array('from_name' => $from, 'to_name' => ucwords($to_name), 'position' => $this->request->data['Position']['job_title'],'msg'=> $message, 'location' => $this->request->data['Position']['location']);
				// save the mail box
				$this->save_mail_box($subject, $message, $req_res_id, 'C',1);
				// send cc mails
				if($this->request->data['Position']['client_cc'] != ''){
					$cc = explode(',', $this->request->data['Position']['client_cc']);	
					$cc_new = array_map('trim',$cc);					
				}
				
				if($this->request->data['Position']['client_attach']['tmp_name'] != ''){
					$attach_file = date('ymdhis').'_'.$this->request->data['Position']['client_attach']['name'];
					$resume_path[] = $this->upload_attachment($this->request->data['Position']['client_attach'], $attach_file);
				}
					
				if(!$this->send_email($subject, 'send_cv', $this->Session->read('USER.Login.email_id'), $contact_data['Contact']['email'],$vars,$resume_path,$cc_new)){	
					// show the msg.								
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail to client...', 'default', array('class' => 'alert alert-error'));				
				}else{						
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>CV Sent Successfully', 'default', array('class' => 'alert alert-success'));			
					// if successfully update
					$this->set('cv_update_status', 1);
				}
				
			}
		
		}
	}
	


	/* function to save the mail box */
	public function save_mail_box($sub, $msg, $req_res_id,$type,$mailtype){
		$this->loadModel('MailBox');
		$this->MailBox->id = '';
		$data = array('created_date' => $this->Functions->get_current_date(),
		'created_by' => $this->Session->read('USER.Login.id'), 'req_resume_id' => $req_res_id, 'subject' => $sub, 
		'message' => $msg, 'mail_type' => $type, 'mail_templates_id' => $mailtype);
		// save  mail box resume
		if($this->MailBox->save($data, array('validate' => false))){
			
		}else{
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving mail box', 'default', array('class' => 'alert alert-success'));									
			die;
		}		
	}
	
	/* function to get the template details */
	public function get_template_details($res_id, $pos_id, $mailtemplete,$int_candidates, $multi_candidates,$candidate_arr){
		// when the form is not submitted
		if(empty($this->request->data)){
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
						
				array('table' => 'client_account_holder',
						'alias' => 'AH',					
						'type' => 'LEFT',
						'conditions' => array('`AH`.`clients_id` = `Client`.`id`')
				),
				array('table' => 'users',
						'alias' => 'Recruiter',					
						'type' => 'LEFT',
						'conditions' => array('`AH`.`users_id` = `Recruiter`.`id`', 'Recruiter.id' => $this->Session->read('USER.Login.id'))
				)
				
				);
				
				$resume_cond = ($res_id == 'multi_select') ? '' : array('Resume.id' => $res_id);
				
				$fields = array('Resume.first_name','Resume.last_name','Resume.email_id','Resume.mobile','Resume.mobile2','Resume.total_exp','Resume.education','Resume.present_employer',
				'ResLocation.location', 'Resume.present_ctc','Resume.expected_ctc', 'Creator.first_name','Resume.created_date','Resume.notice_period',
				'Resume.modified_date','ReqResume.stage_title','ReqResume.status_title','Designation.designation','Resume.present_ctc_type','Resume.expected_ctc_type',
				'Resume.gender','Resume.marital_status','Resume.family','Resume.present_location','Resume.native_location', 'Resume.dob','Resume.consultant_assess',
				'Resume.interview_avail','ResDoc.resume','Position.job_title','Position.location','Position.job_desc','Contact.first_name','Contact.last_name'
				,'Contact.mobile','Recruiter.first_name','Recruiter.last_name','Client.client_name','Recruiter.signature','Contact.title',
				'Position.created_date', 'Position.modified_date');
				$cand_data = $this->Position->find('all', array('fields' => $fields,'conditions' => array('Position.id' => $pos_id,	$resume_cond),	'joins' => $options));
				// print_r($cand_data);
				$cand_name = ucwords($cand_data[0]['Resume']['first_name'].' '.$cand_data[0]['Resume']['last_name']);
				$rec_name = ucwords($cand_data[0]['Recruiter']['first_name'].' '.$cand_data[0]['Recruiter']['last_name']);
				$signature = $cand_data[0]['Recruiter']['signature'];
				$contact_title = $cand_data[0]['Contact']['title']  == '1' ? 'Mr.' : ($cand_data[0]['Contact']['title']  == '2' ?  'Ms' : '');
				$position_date = $cand_data[0]['Position']['modified_date'] != '' ? $cand_data[0]['Position']['modified_date'] : $cand_data[0]['Position']['created_date'];
				$job_title = $cand_data[0]['Position']['job_title'] ? $cand_data[0]['Position']['job_title'] : '[POSITION]';
				
				// for no data for multiple option
				$cand_name = trim($cand_name) ? $cand_name : '[CANDIDATE_NAME]';
				$client_name = $cand_data[0]['Client']['client_name'];	
				$client_contact_name = $cand_data[0]['Contact']['first_name'].' '.$cand_data[0]['Contact']['last_name'];

				//$rec_name = trim($rec_name) ? $rec_name : '[RECRUITER_NAME]';
				//$signature = $signature ? $signature : '[SIGNATURE]';
				//$position_date = $position_date ? $position_date : '[POSITION_DATE]';
				//$contact_title = $contact_title ? $contact_title : '[CLIENT_CONTACT_TITLE]';
				//$client_name = $cand_data[0]['Client']['client_name'] ? $cand_data[0]['Client']['client_name'] : '[CLIENT]';	
				//$client_contact_name = trim($client_contact_name) ? $client_contact_name : '[CLIENT_CONTACT_NAME]';
				if($res_id == 'multi_select'){
					$multi_candidates = '[CANDIDATE_NAME]';
				}
				
				
				
				$this->set('candidate_name', $multi_candidates ? $multi_candidates : $cand_name);
				$this->set('candidate_to', $multi_candidates ? $multi_candidates : $cand_name.' <'.$cand_data[0]['Resume']['email_id'].'>');
				
				// for multiple option send confirmation to candidates
				if($mailtemplete == '3' && $res_id == 'multi_select'){
					$cand_name = '[CANDIDATE_NAME]';
				}
				
				// get resume education details
				$this->loadModel('ResEdu');
				$edu_data = $this->ResEdu->find('all', array('conditions' => array('resume_id' => $res_id), 'fields' => array('percent_mark','year_passing','college',
				'course_type','university','location','ResDegree.degree','ResSpec.spec'), 'order' => array('ResEdu.id' => 'desc')));
				// get resume experience details
				$options = array(			
					array('table' => 'resume',
							'alias' => 'Resume',					
							'type' => 'LEFT',
							'conditions' => array('`Resume`.`id` = `ResExp`.`resume_id`',
							'ResExp.is_recent' => '1')
					)
				);
				$this->loadModel('ResExp');
				$exp_data = $this->ResExp->find('all', array('conditions' => array('Resume.id' => $candidate_arr ? $candidate_arr : $res_id), 'fields' => array('experience','work_location','skills',
				'company','other_info','Designation.designation','Resume.first_name','Resume.last_name'),  'joins' => $options));
				// iterate the experience details
				$exp_table .= "<table  width='90%' border='0' cellspacing='2' cellpadding='5' style='border:1px solid #ededed; font:bold 13px Arial'>";
				$exp_table .= "<tr><td>S. No.</td><td>Candidate Name</td><td>Present Designation</td><td>Present Company</td></tr>";
				foreach($exp_data as $key => $exp){
					$exp_table .= "<tr  style='font-weight:normal'>";
					$exp_table .= "<td width='50'>";
					$exp_table .= ++$key;
					$exp_table .= "</td>";
					$exp_table .= "<td  width='120'>";
					$exp_table .= ucwords($exp['Resume']['first_name'].' '.$exp['Resume']['last_name']);
					$exp_table .= "</td>";
					$exp_table .= "<td  width='140'>";
					$exp_table .= $exp['Designation']['designation'];
					$exp_table .= "</td>";
					$exp_table .= "<td  width='140'>";
					$exp_table .= $exp['ResExp']['company'];
					$exp_table .= "</td>";
					$exp_table .= "</tr>";

				}
				$exp_table .= "</table>";
				// get resume experience details of previous candidates
				$options = array(
					array('table' => 'resume',
							'alias' => 'Resume',					
							'type' => 'LEFT',
							'conditions' => array('`Resume`.`id` = `ReqResume`.`resume_id`')
					),
					array('table' => 'res_employer',
							'alias' => 'ResExp',					
							'type' => 'LEFT',
							'conditions' => array('`ReqResume`.`resume_id` = `ResExp`.`resume_id`',
							'ResExp.is_recent' => '1')
					),
					array('table' => 'requirements',
							'alias' => 'Position',					
							'type' => 'LEFT',
							'conditions' => array('`Position`.`id` = `ReqResume`.`requirements_id`')
					),
					array('table' => 'designation',
							'alias' => 'Designation',					
							'type' => 'LEFT',
							'conditions' => array('`Designation`.`id` = `ResExp`.`designation_id`')
					)
				);
				$this->loadModel('ReqResumeStatus');
				$prev_exp_data = $this->ReqResumeStatus->find('all', array('conditions' => array('ReqResumeStatus.status_title' => 'CV-Sent',
				'Position.id' => $pos_id), 'fields' => array('ResExp.experience','ResExp.work_location','ResExp.skills',
				'ResExp.company','ResExp.other_info','Designation.designation','Resume.first_name','Resume.last_name','ReqResumeStatus.created_date',
				'ReqResume.stage_title','ReqResume.status_title'),
				'group' => array('Resume.id'), 'joins' => $options));
				// iterate the experience details
				// send only if any candidates sent earlier
				if(count($prev_exp_data) > 0){
					$prev_exp_table .= '<br><p>For your reference, I am also sharing the details of CVs shared earlier for this position and its current status.</p><br><br>';
					$prev_exp_table .= "<table  width='90%' border='0' cellspacing='2' cellpadding='5' style='border:1px solid #ededed; font:bold 13px Arial'>";
					$prev_exp_table .= "<tr><td>S. No.</td><td>Candidate Name</td><td>CV Submission Date</td><td>Current Status</td></tr>";
					foreach($prev_exp_data as $key => $exp){
						$prev_exp_table .= "<tr  style='font-weight:normal'>";
						$prev_exp_table .= "<td width='50'>";
						$prev_exp_table .= ++$key;
						$prev_exp_table .= "</td>";
						$prev_exp_table .= "<td  width='120'>";
						$prev_exp_table .= ucwords($exp['Resume']['first_name'].' '.$exp['Resume']['last_name']);
						$prev_exp_table .= "</td>";
						$prev_exp_table .= "<td  width='140'>";
						$prev_exp_table .= $this->Functions->format_date($exp['ReqResumeStatus']['created_date']);
						$prev_exp_table .= "</td>";
						$prev_exp_table .= "<td  width='140'>";
						$prev_exp_table .= $this->Functions->get_status_crisp($exp['ReqResume']['stage_title'], $exp['ReqResume']['status_title']);
						$prev_exp_table .= "</td>";
						$prev_exp_table .= "</tr>";

					}
					$prev_exp_table .= "</table>";
				}
				
				
				
				// get the mail template details
				$this->loadModel('MailTemplate');
				$data = $this->MailTemplate->findById($mailtemplete, array('fields' => 'subject','message'));
				
				$loc = $cand_data[0]['ResLoc']['location'] ? $cand_data[0]['ResLoc']['location'] : $cand_data[0]['Resume']['present_location'];
				
				
				$int_level = $this->request->data['Position']['interview_level'] ? $this->request->data['Position']['interview_level'] : '[INTERVIEW_LEVEL]';
				$int_date_time = explode(' ', $this->request->data['Position']['int_date']);
				$int_date = $int_date_time[0] ? trim($int_date_time[0]) : '[INTERVIEW_DATE]';
				$int_time = $int_date_time[1] ? trim($int_date_time[1]) : '[INTERVIEW_TIME]';
				$int_duration = $this->request->data['Position']['int_duration'] ? $this->request->data['Position']['int_duration'] : '[INTERVIEW_DURATION]';
				$venue = $this->request->data['Position']['venue'] ? nl2br($this->request->data['Position']['venue']) : '[INTERVIEW_VENUE]';
				$contact_name = $this->request->data['Position']['contact_name'] ? $this->request->data['Position']['contact_name'] : '[INTERVIEW_CONTACT_PERSON]';
				$contact_no = $this->request->data['Position']['contact_no'] ? $this->request->data['Position']['contact_no'] : '[INTERVIEW_CONTACT_NO]';
				$additional = $this->request->data['Position']['additional'] ? nl2br($this->request->data['Position']['additional']) : '[INTERVIEW_ADDITIONAL]';
				$interview_stage = $this->get_interview_mode($this->request->data['Position']['interview_stage_id']);
				$interview_stage = $interview_stage ? $interview_stage : '[INTERVIEW_MODE]';
				
				// get the interview mode
				//$this->loadModel('InterviewStage');
				//$stage_data = $this->InterviewStage->findById($this->request->data['Position']['interview_stage_id'], array('fields' => 'interview_stage'));
				
				// form the tags
				$tags = array('[candidate_name]','[mobile]','[email_id]','[position]','[address]','[location]','[designation]','[experience]',	'[client]',
				'[client_contact_name]','[client_contact_no]','[job_location]','[job_desc]','[function]','[today_date]','[recruiter_name]',
				'[signature]','[client_contact_title]','[crm]','[position_date]','[sent_candidates]','[previous_sent_candidates]',
				'[interview_candidates]','[interview_date]','[interview_time]','[interview_duration]','[interview_mode]','[interview_venue]',
				'[interview_contact_person]','[interview_contact_no]','[interview_additional]','[website]','[interview_level]');
				
				// form the templates data
				$template_data = array($cand_name,$cand_data[0]['Resume']['mobile'],$cand_data[0]['Resume']['email_id'], 
				ucwords($job_title),	$cand_data[0]['Position']['address1']. '<br>'.$cand_data[0]['Position']['address2'],
				$loc,	$cand_data[0]['Designation']['designation'],$this->Functions->check_exp($cand_data[0]['Position']['total_exp']),	
				ucwords($client_name),ucwords($client_contact_name),$cand_data[0]['Contact']['mobile'],	
				ucfirst($cand_data[0]['Position']['location']),$cand_data[0]['Position']['job_desc'],$cand_data[0]['FunctionArea']['function'],	
				date('d-M, Y'),	$rec_name, $signature,$contact_title,$rec_name, $this->Functions->format_date($position_date),
				$exp_table,$prev_exp_table,$int_candidates,$int_date,$int_time,$int_duration,$interview_stage,$venue,
				ucwords($contact_name),$contact_no,$additional,	'www.career-tree.in',$int_level);
				
				
				$body_text = str_replace($tags, $template_data, $data['MailTemplate']['message']);
				$subject_text = str_replace($tags, $template_data, $data['MailTemplate']['subject']);
				$this->set('subject_'.$mailtemplete, $subject_text);
				$this->set('body_'.$mailtemplete, $body_text);
				return $body_text.'|||'.$subject_text;
			}
	}
	
	/* function to get interview level */
	public function get_interview_mode($mode){
		$this->loadModel('InterviewStage');
		$stage_data = $this->InterviewStage->findById($mode, array('fields' => 'interview_stage'));
		return $stage_data['InterviewStage']['interview_stage'];
	}
	
	/* function to parse the html data to send interview to candidates */
	public function parse_interview_mail($message,$candidate,$pos_id, $int_key){
		// get the position details
		$fields = array('Position.job_title','Contact.first_name','Contact.last_name'
		,'Contact.mobile','Recruiter.first_name','Recruiter.last_name','Client.client_name','Recruiter.signature','Contact.title');
		$options = array(			
				array(
					'table' => 'contact',
					'alias' => 'Contact',					
					'type' => 'LEFT',
					'conditions' => array('`Contact`.`id` = `Position`.`client_contact_id`')
					),
					
				array('table' => 'client_account_holder',
						'alias' => 'AH',					
						'type' => 'LEFT',
						'conditions' => array('`AH`.`clients_id` = `Client`.`id`')
				),
				array('table' => 'users',
						'alias' => 'Recruiter',					
						'type' => 'LEFT',
						'conditions' => array('`AH`.`users_id` = `Recruiter`.`id`', 'Recruiter.id' => $this->Session->read('USER.Login.id'))
				)
				
				);
				
		$cand_data = $this->Position->find('all', array('fields' => $fields,'conditions' => array('Position.id' => $pos_id),'joins' => $options));
		
		// for multi candidates
		$stage_id = $this->request->data['Position']['interview_stage_id'] ? $this->request->data['Position']['interview_stage_id'] : $this->request->data['Position']['candidate_stage_'.$int_key];
		
		$int_date_time = explode(' ', $this->request->data['Position']['int_date']);
		$int_date_time2 = explode(' ', $this->request->data['Position']['candidate_int_date_'.$int_key]);
		
		$int_date = $int_date_time[0] ? $int_date_time[0] :  $int_date_time2[0];
		
		$int_time = $int_date_time[1] ? $int_date_time[1] :  $int_date_time2[1];

		//$int_time = $this->request->data['Position']['int_time'] ? $this->request->data['Position']['int_time'] : $this->request->data['Position']['candidate_int_time_'.$int_key];
		
		$venue = $this->request->data['Position']['venue'] ? $this->request->data['Position']['venue'] : $this->request->data['Position']['candidate_venue_'.$int_key];
		
		
		$duration = $this->request->data['Position']['int_duration'] ? $this->request->data['Position']['int_duration'] : $this->request->data['Position']['candidate_duration_'.$int_key];
		$contact_name = $this->request->data['Position']['contact_name'] ? $this->request->data['Position']['contact_name'] : $this->request->data['Position']['candidate_person_'.$int_key];
		$contact_no = $this->request->data['Position']['contact_no'] ? $this->request->data['Position']['contact_no'] : $this->request->data['Position']['candidate_mobile_'.$int_key];
		$additional = $this->request->data['Position']['additional'] ? $this->request->data['Position']['additional'] : $this->request->data['Position']['candidate_addi_'.$int_key];
		$level =  $this->request->data['Position']['interview_level'] ? $this->request->data['Position']['interview_level'] : $this->request->data['Position']['candidate_level_'.$int_key];
		
		$interview_mode = $this->get_interview_mode($stage_id);

		
		$rec_name = ucwords($cand_data[0]['Recruiter']['first_name'].' '.$cand_data[0]['Recruiter']['last_name']);
		$signature = $cand_data[0]['Recruiter']['signature'];
		$contact_title = $cand_data[0]['Contact']['title']  == '1' ? 'Mr.' : ($cand_data[0]['Contact']['title']  == '2' ?  'Ms' : '');
		$job_title = $cand_data[0]['Position']['job_title']; 
		$client = ucwords($cand_data[0]['Client']['client_name']);				
		$client_contact_name = ucwords($cand_data[0]['Contact']['first_name'].' '.$cand_data[0]['Contact']['last_name']);
				
		$tags = array('[INTERVIEW_DATE]','[INTERVIEW_DURATION]','[INTERVIEW_MODE]','[INTERVIEW_VENUE]',
		'[INTERVIEW_CONTACT_PERSON]','[INTERVIEW_CONTACT_NO]','[INTERVIEW_ADDITIONAL]','[INTERVIEW_LEVEL]',
		'[INTERVIEW_TIME]','[CLIENT]',	'[POSITION]','[RECRUITER_NAME]','[CANDIDATE_NAME]','[SIGNATURE]',
		'[CLIENT_CONTACT_TITLE]','[CLIENT_CONTACT_NAME]');
		// form the templates data
		$template_data = array($int_date,$duration,$interview_mode,$venue,ucwords($contact_name),$contact_no,$additional,$level,
		$int_time,$client,$job_title,$rec_name,$candidate,$signature,$contact_title,$client_contact_name);
		return $body_text = str_replace($tags, $template_data, $message);
	}
	
		/* function to update the CV status */
	public function update_position_status($id,$st_id){
		$this->layout = 'framebox';	
		// load the functional area
		if($st_id == '10'){
			$st_cond = array('ReqStatus.id' =>  array(1,2));
		}else{
			$st_cond = array('ReqStatus.id !=' =>  array(1,$st_id, 10));
		}
		$status_list = $this->Position->ReqStatus->find('list', array('fields' => array('status','title'), 
		'order' => array('id ASC'),'conditions' => array('ReqStatus.is_deleted' => 'N', $st_cond)));
		$this->set('stList', $status_list);
		// when the form submitted
		if(!empty($this->request->data)){
			$this->Position->set($this->request->data);
			$validation_ar = $st_id == '10' ? array('req_status_id','status_remark') : array('req_status_id');
			if($this->Position->validates(array('fieldList' => $validation_ar))){
				$this->Position->id = $id;
				// save req resume table
				$data = array('modified_date' => $this->Functions->get_current_date(),
				'modified_by' => $this->Session->read('USER.Login.id'),
				'req_status_id' => $this->request->data['Position']['req_status_id'],
				'status_remark' => $this->request->data['Position']['status_remark']);
				// save  req resume
				if($this->Position->save($data, array('validate' => false))){
					// when reactivating the position send mail to business head
					if($st_id == '10'){
						// Send mail to all BDs (Biz. heads)
						$bd_user = $this->Position->Creator->find('all', array('conditions' => array('Creator.roles_id' => '39'),
						'fields' => array('Creator.first_name','Creator.last_name', 'Creator.email_id')));
						// get position
						$position_data = $this->Position->findById($id, array('fields' => 'Position.job_title','Position.location','Client.client_name'));
						foreach($bd_user as $user){
							$from = ucwords($this->Session->read('USER.Login.first_name').' '.$this->Session->read('USER.Login.last_name'));
							$vars = array('to_name' =>  ucwords($user['Creator']['first_name'].' '.$user['Creator']['last_name']), 'from_name' => $from, 'position' => $position_data['Position']['job_title'], 
							'location' => $position_data['Position']['location'],'client_name' => $position_data['Client']['client_name'],
							'reason' => $this->request->data['Position']['status_remark']);
							// send mail 						
							if(!$this->send_email('Manage Hiring - Position is reactivated by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name')), 'position_activate', 'noreply@managehiring.com', $user['Creator']['email_id'],$vars)){		
								// show the msg.								
								$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail to bd user...', 'default', array('class' => 'alert alert-error'));				
							}else{
								// $this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Client '.$approve_msg.' Successfully.', 'default', array('class' => 'alert alert-success'));
							}
						}
					}
					// if successfully update
					$this->set('form_status', 1);
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Position Status Changed Successfully', 'default', array('class' => 'alert alert-success'));									
				}
			}
		}
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
				'modified_by' => $this->Session->read('USER.Login.id'),	 'status_title' => $status,
				'cv_shortlist_date' => $this->Functions->get_current_date());
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
		return $reason_list;
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
		$this->get_reject_drop('Validation');
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
				'modified_by' => $this->Session->read('USER.Login.id'),	 'status_title' => $status,
				'cv_validation_date' => $this->Functions->get_current_date(),'reason_id' => $this->request->data['Position']['reason_id']);
				// save  req resume
				if($this->ReqResume->save($data, array('validate' => false))){		
					// save req resume status
					$this->loadModel('ReqResumeStatus');
					$data = array('req_resume_id' => $req_res_id[0]['ReqResume']['id'], 'created_date' => $this->Functions->get_current_date(),
					'created_by' => $this->Session->read('USER.Login.id'), 'stage_title' => 'Validation - Account Holder', 'status_title' => $status,
					'reason_id' => $this->request->data['Position']['reason_id'], 'note' => $this->request->data['Position']['note']);
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
		$this->get_reject_drop('Offer Candidate Reject','Offer Client Reject');
		// get the offer end date
		$this->loadModel('ResInterview');
		$interview_data = $this->ResInterview->find('all', array('conditions' => array('ResInterview.req_resume_id' => $req_res_id,
		'ResInterview.status_title' => 'Selected'), 'fields' => array('ResInterview.int_date')));
		$this->set('int_select_date', $interview_data[0]['ResInterview']['int_date']);
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
				'modified_by' => $this->Session->read('USER.Login.id'), 'stage_title' => 'Offer', 'status_title' => $status,
				'offer_shortlist_date' => $this->Functions->get_current_date());
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
		// get the joining end date
		$this->loadModel('ReqResume');
		$offer_data = $this->ReqResume->find('all', array('conditions' => array('ReqResume.id' => $req_res_id), 
		'fields' => array('ReqResume.date_offer')));
		$this->set('offer_select_date', $offer_data[0]['ReqResume']['date_offer']);
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
			$validate_interview_date = 1;
			// get the interview date
			$this->loadModel('ResInterview');
			$int_data =  $this->ResInterview->find('all', array('fields' => array('ResInterview.int_date'),
			'conditions' => array('ResInterview.req_resume_id' => $req_res_id),
			'order' => array('ResInterview.id' => 'desc')));
			$interview_date = $int_data[0]['ResInterview']['int_date']; 
			if(strtotime(date('Y-m-d')) < strtotime($interview_date)){
				$validate_interview_date = 0;
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>You cannot update the interview status before the interview date', 'default', array('class' => 'alert alert-error'));
			}
			// process after the interview date
			if($validate_interview_date == '1'){
				// validate the form
				if($status == 'Rejected'){
					$validate = $this->Position->validates(array('fieldList' => array('reason_id')));
				}else if($int_level != '5'){
					$validate = $this->Position->validates(array('fieldList' => array('next_interview')));
				}else{
					$validate = 1;
				}
				// if validation pass
				if($validate){			
					// get the req. resume id
					//$req_res_id = $this->ReqResume->find('all', array('fields' => array('ReqResume.id'), 
					//'conditions' => array('requirements_id' => $pos_id, 'resume_id' => $id)));
					// save req resume table
					$this->loadModel('ReqResume');
					$data = array('id' => $req_res_id,'modified_date' => $this->Functions->get_current_date(),
					'modified_by' => $this->Session->read('USER.Login.id'),	 'status_title' => $status);
					// save  req resume
					if($this->ReqResume->save($data, array('validate' => false))){		
						// save req resume status
						$this->loadModel('ReqResumeStatus');
						$data = array('req_resume_id' => $req_res_id, 'created_date' => $this->Functions->get_current_date(),	
						'created_by' => $this->Session->read('USER.Login.id'), 'stage_title' => $this->Functions->get_level_text($int_level),	
						'status_title' => $status, 'note' => $this->request->data['Position']['note'],
						'reason_id' => $this->request->data['Position']['reason_id']);
						if($this->ReqResumeStatus->save($data, array('validate' => false))){
							// save interview status
							$this->loadModel('ResInterview');
							$interview_id = $this->ResInterview->find('all', array('conditions' => array('ResInterview.req_resume_id' => $req_res_id,
							'ResInterview.stage_title' => $this->Functions->get_level_text($int_level)), 'fields' => array('ResInterview.id')));
							$data = array('id' => $interview_id[0]['ResInterview']['id'],'reason_id' => $this->request->data['Position']['reason_id'],  'req_resume_id' => $req_res_id, 'modified_date' => $this->Functions->get_current_date(),
							'modified_by' => $this->Session->read('USER.Login.id'), 'status_title' => $status);
							$this->ResInterview->save($data, array('validate' => false));					
							// if next interview not applicable proceed to Offer Status
							if($this->request->data['Position']['next_interview'] == 'N' && $st == 'shortlist'){
								// Change Offer status pending
								$data = array('id' => $req_res_id,'modified_date' => $this->Functions->get_current_date(),
								'modified_by' => $this->Session->read('USER.Login.id'),	'stage_title' => 'Offer', 'status_title' => 'Offer Pending');
								// save  req resume
								if($this->ReqResume->save($data, array('validate' => false))){		
									// save req resume status
									$this->ReqResumeStatus->id = '';
									$this->loadModel('ReqResumeStatus');
									$data = array('req_resume_id' => $req_res_id, 'created_date' => $this->Functions->get_current_date(),	
									'created_by' => $this->Session->read('USER.Login.id'), 'stage_title' => 'Offer',	'status_title' => 'Offer Pending', 
									'note' => $this->request->data['Position']['note'],'reason_id' => $this->request->data['Position']['reason_id']);
									if($this->ReqResumeStatus->save($data, array('validate' => false))){
										
									}							
								}
							}
							$this->set('cv_update_status', 1);
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Interview Details Updated Successfully', 'default', array('class' => 'alert alert-success'));									

						}
					}
				}
			}
		}
	}
	
	/* function to schedule for interview */
	public function schedule_interview($id, $pos_id, $req_res_id,$interview_level,$schedule_type, $multi_sel){
		$this->layout = 'framebox';
		// validate the fields
		if(!empty($id) && !empty($pos_id)){
			// get interview levels
			$int_levels = array('First Interview', 'Second Interview', 'Third Interview', 'Forth Interview', 'Final Interview');
			$this->set('int_levels', $int_levels);
			// get interview levels
			if($interview_level == '2'){
				$int_levels = array('Second Interview' => 'Second Interview', 'Third Interview', 'Forth Interview','Final Interview' => 'Final Interview');
			}else if($interview_level == '3'){
				$int_levels = array('Third Interview' => 'Third Interview', 'Forth Interview' => 'Forth Interview','Final Interview' => 'Final Interview');
			}else if($interview_level == '4'){
				$int_levels = array('Forth Interview' => 'Forth Interview','Final Interview' => 'Final Interview');
			}else if($interview_level == '5'){
				$int_levels = array('Final Interview' => 'Final Interview');
			}if($interview_level == '1' || $interview_level == ''){
				$int_levels = array('First Interview' => 'First Interview' , 'Second Interview' => 'Second Interview','Third Interview' => 'Third Interview', 'Forth Interview' => 'Forth Interview', 'Final Interview' => 'Final Interview');
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
		
		$req_res_ids[] = $req_res_id;
		$chk_resume_id_ar[] = $id;
			
		// for multiple interview
		if($id == 'multi_select'){
			$multi_chk = 1;
			$this->set('tiny_readonly', '1');			
			$resume_check = explode(',', $pos_id);
			// iterate the candidates
			foreach($resume_check as $check){
				if(trim($check) != ''){
					$check_ids = explode('-', $check);
					// $chk_resume_id = $check_ids[0];	
					$chk_pos_id = $check_ids[1];
					$req_res_ids[] = $check_ids[2];
					// save resume ids in array
					$chk_resume_id_ar[] = $check_ids[0];
				}
			}
		}
		
		// for reschedule
			if($schedule_type == 'reschedule' || $this->request->query['int_type'] == 'reschedule'){ 
				// get rejection status drop down
				$reject_reason_data = $this->get_reject_drop('Interview Reschedule');
				$reason_id = 'reason_id';
				$this->set('reschedule', 1);
				// get the interview details to retain in the form
				$this->loadModel('ResInterview');
				// $int_text = $this->Functions->get_level_text($int_level);
				$options = array(				
					array('table' => 'resume',
							'alias' => 'Resume',					
							'type' => 'LEFT',
							'conditions' => array('`Resume.id` = `ReqResume`.`resume_id`')
					)					
				);
				
				
				// when the form is not submitted
				if(!$this->request->is('post')){
					// $groupCond = $multi_chk == '1' ? array('ResInterview.req_resume_id') : '';
					foreach($req_res_ids as $reqid){
						if($reqid != ''){
							$data[] = $this->ResInterview->find('all', array('fields' => array('int_date','int_duration','Resume.first_name','Resume.last_name','InterviewStage.interview_stage','venue','additional','contact_name','contact_no','stage_title','interview_stage_id'),'conditions' => array('req_resume_id' => $reqid), 'limit' => '1', 'order' => array('ResInterview.created_date' => 'desc'),  'joins' => $options));
						}
					}
					
					if($multi_chk == '1'){
						$inter_data = $data;
					}else{
						$this->set('interview_record', $data[0]);
					}
				}
				
			
			}
			// get the candidate names
			$options = array(			
				array('table' => 'resume',
						'alias' => 'Resume',					
						'type' => 'LEFT',
						'conditions' => array('`Resume`.`id` = `ReqResume`.`resume_id`')
				)						
			);
			
			$fields = array('Resume.first_name','Resume.last_name', 'Resume.mobile');
			
			
			$cand_data = $this->Position->find('all', array('fields' => $fields,'conditions' => array('Resume.id' => $chk_resume_id_ar),
			'group' => array('Resume.id'),'joins' => $options));	
			
			
			// iterate the candidate interview table
			$int_table .= "<table  width='90%' border='0' cellspacing='2' cellpadding='5' style='border:1px solid #ededed; font:bold 13px Arial'>";
			$int_table .= "<tr><td>S. No.</td><td>Candidate Name</td><td>Contact No.</td><td>Interview Level</td><td>Interview Mode</td><td>Interview Date</td><td>Interview Time</td></tr>";
			foreach($cand_data as $key => $exp){
				$int_table .= "<tr  style='font-weight:normal'>";
				$int_table .= "<td width='50'>";
				$int_table .= ++$key;
				$int_table .= "</td>";
				$int_table .= "<td  width='120'>";
			 	// $contact_name = $multi_chk == 1 ? '[CANDIDATE_NAME]' : ucwords($exp['Resume']['first_name'].' '.$exp['Resume']['last_name']);
				$contact_name = ucwords($exp['Resume']['first_name'].' '.$exp['Resume']['last_name']);
				$int_table .= $contact_name;
				$int_table .= "</td>";
				$int_table .= "<td  width='140'>";
				$mobile =  $exp['Resume']['mobile'];
				$int_table .= $mobile;
				$int_table .= "</td>";
				$int_table .= "<td  width='140'>";
				$int_table .= '[interview_level]';
				$int_table .= "</td>";
				$int_table .= "<td  width='140'>";
				$int_table .= '[interview_mode]';
				$int_table .= "</td>";
				$int_table .= "<td  width='140'>";
				$int_table .= '[interview_date]';
				$int_table .= "</td>";
				
				$int_table .= "<td  width='140'>";
				$int_table .= '[interview_time]';
				$int_table .= "</td>";	
							
				
				$int_table .= "</tr>";		
				$can_name .= ucwords($exp['Resume']['first_name'].' '.$exp['Resume']['last_name']).', ';
			}
			$int_table .= "</table>";
			
			$int_table .= '<p><br><br>Interview Venue & Contact Details shared to the candidate(s) are as follows:</p>';
			
			// iterate the candidate venue table
			
			$int_table .= "<table  width='90%' border='0' cellspacing='2' cellpadding='5' style='border:1px solid #ededed; font:bold 13px Arial'>";
			$int_table .= "<tr><td>S. No.</td><td>Candidate Name</td><td>Venue</td><td>Contact Person</td><td>Contact No.</td></tr>";
			foreach($cand_data as $key => $exp){
				$int_table .= "<tr  style='font-weight:normal'>";
				$int_table .= "<td width='50'>";
				$int_table .= ++$key;
				$int_table .= "</td>";
				$int_table .= "<td  width='120'>";
			 	// $contact_name = $multi_chk == 1 ? '[CANDIDATE_NAME]' : ucwords($exp['Resume']['first_name'].' '.$exp['Resume']['last_name']);
				$contact_name = ucwords($exp['Resume']['first_name'].' '.$exp['Resume']['last_name']);
				$int_table .= $contact_name;
				$int_table .= "</td>";
				$int_table .= "<td  width='200'>";
				$int_table .= '[interview_venue]';
				$int_table .= "</td>";
				$int_table .= "<td  width='140'>";
				$int_table .= '[interview_contact_person]';
				$int_table .= "</td>";
				$int_table .= "<td  width='140'>";
				$int_table .= '[interview_contact_no]';
				$int_table .= "</td>";				
				$int_table .= "</tr>";		
			}
			$int_table .= "</table>";
			
			
			/* logics created for multiple selection of candidates for interview schedule / reschedule */
			
		
			foreach($cand_data as $key => $exp){ 
				// for auto filling from first form
				if($key == '0'){
					// $level_cls = 'firstLevel';
				}
				
				$int_table_form .= "<table  width='100%' border='0' cellspacing='2' cellpadding='5' style='padding:10px; font:bold 13px Arial'>";
				
				if($this->request->query['int_type'] == 'reschedule'){
					$int_table_form .= "<tr><td>Reason for Re-Schedule  <span class='f_req'>*</span></td></tr>";
					$int_table_form .= "<tr  style='font-weight:normal'><td>";
					$int_table_form .= "<select class='required $level_cls' style='width:130px;' name='data[Position][candidate_reason_$key]' id='candidate_level_$key'><option value=''>Select</option>";
					foreach($reject_reason_data as $reason_key => $reason_val){					
						$int_table_form .= "<option value='$reason_key'>$reason_val</option>";
					}
					$int_table_form .= "</select></td></tr>";
				}
				
				$int_table_form .= "<tr><td>Interview Level <span class='f_req'>*</span> </td><td>Interview Mode <span class='f_req'>*</span></td><td>Interview Date & Time <span class='f_req'>*</span></td></tr>";
				$int_table_form .= "<tr  style='font-weight:normal'>";
				//$int_table_form .= "<td width='50'>";
				//$int_table_form .= ++$key;
				//$int_table_form .= "</td>";
				//$int_table_form .= "<td  width='120'>";
				//$int_table_form .= "<input type='text' name='candidate_name_$key' id='candidate_$key' value='$contact_name'/>";
			 	// $contact_name = $multi_chk == 1 ? '[CANDIDATE_NAME]' : ucwords($exp['Resume']['first_name'].' '.$exp['Resume']['last_name']);
				//$contact_name = ucwords($exp['Resume']['first_name'].' '.$exp['Resume']['last_name']);
				// $int_table_form .= $contact_name;
				//$int_table_form .= "</td>";
				$int_table_form .= "<td  width='140'>";
				$int_table_form .= "<select class='input-small required $level_cls' style='width:130px;' name='data[Position][candidate_level_$key]' id='candidate_level_$key'><option value=''>Select</option>";				
				foreach($int_levels as $int_key => $int_lev){ 
					// for retaining
					
					if($inter_data[$key][0]['ResInterview']['stage_title'] == $int_key){
						$level_select = 'selected';
					}else{
						$level_select = '';
					}
					

					$int_table_form .= "<option $level_select value='$int_key'>$int_lev</option>";
				}
				$int_table_form .= "</select>";
				// $int_table_form .= '[interview_level]';
				$int_table_form .= "</td>";
				$int_table_form .= "<td  width='140'>";
				$int_table_form .= "<select class='input-small required' style='width:130px;' name='data[Position][candidate_stage_$key]' id='candidate_stage_$key'><option value=''>Select</option>";
				
				foreach($stage_list as $stage_key => $stage){
					if($inter_data[$key][0]['ResInterview']['interview_stage_id'] == $stage_key){
						$stage_select = 'selected';
					}else{
						$stage_select = '';
					}
					$int_table_form .= "<option $stage_select value='$stage_key'>$stage</option>";
				}
				$int_table_form .= "</select></td>";				
				// $int_table_form .= '[interview_mode]';
				
				$int_table_form .= "<td  width='180'>";				
				$int_table_form .= "<input type='text' class='required datetimepick input-medium' name='data[Position][candidate_int_date_$key]' id='candidate_int_date_$key'/>";
				//$int_table_form .= "<input type='text' style='margin-left:15px;' class='required datetimepick input-small' name='data[Position][candidate_int_time_$key]' id='candidate_int_time_$key'/>";
				//$int_table_form .= '[interview_date]'. ', [interview_time]';
				$int_table_form .= "</td>";
				
				
				$int_table_form .= "</tr>";
				
				$int_table_form .= "<tr><td>Interview Duration </td><td>Interview Venue <span class='f_req'>*</span> </td><td>Contact Person <span class='f_req'>*</span> </td></tr><tr>";
				
								
				$int_table_form .= "<td  width='140'>";
				
				$int_table_form .= "<select class='input-small' style='width:130px;' name='data[Position][candidate_duration_$key]' id='candidate_duration_$key'><option value=''>Select</option>";
				foreach($int_duration as $dur_key => $duration){
					
					$int_table_form .= "<option value='$dur_key'>$duration</option>";
				}
				$int_table_form .= "</select>";	
				
				// $int_table_form .= '[interview_duration]';
				$int_table_form .= "</td>";
				
				$int_contact_name = $inter_data[$key][0]['ResInterview']['contact_name'];
				$int_contact_no = $inter_data[$key][0]['ResInterview']['contact_no'];
				$int_addi = $inter_data[$key][0]['ResInterview']['additional'];
				$int_venue = $inter_data[$key][0]['ResInterview']['venue'];

				$int_table_form .= "<td><textarea   class='required input-medium wysiwyg1'  name='data[Position][candidate_venue_$key]'  id='candidate_venue_$key'>$int_venue</textarea></td>";

				$int_table_form .= "<td><input type='text' class='required input-medium'  value='$int_contact_name' name='data[Position][candidate_person_$key]'  id='candidate_person_$key'/></td></tr>";


				$int_table_form .= "<tr><td>Contact No. <span class='f_req'>*</span> </td><td>Additional Info </td></tr><tr>";					

			
				$int_table_form .= "<td  width='140'>";
				// $mobile = $multi_chk == 1 ? '[MOBILE]' : $exp['Resume']['mobile'];
				// $mobile =  $exp['Resume']['mobile'];
				$int_table_form .= "<input type='text' class='required input-medium' value='$int_contact_no'  name='data[Position][candidate_mobile_$key]' value='$mobile' id='candidate_mobile_$key'/>";
				// $int_table_form .= $mobile;
				$int_table_form .= "</td>";
				
				$int_table_form .= "<td><textarea   class='input-medium wysiwyg1'   name='data[Position][candidate_addi_$key]'  id='candidate_addi_$key'>$int_addi</textarea></td>";

								
				$int_table_form .= "</tr>";		
				//$can_name_form .= ucwords($exp['Resume']['first_name'].' '.$exp['Resume']['last_name']).', ';
				$can_name_form .= $inter_data[$key][0]['Resume']['first_name'].' '.$inter_data[$key][0]['Resume']['last_name'].', ';
				$int_table_form .= "</table><splitter>";
				}
			
			
			$this->set('multi_check', $multi_chk);
			$this->set('multi_int_form', $int_table_form);
			$this->set('multi_candidate', explode(',',$can_name_form));
			$this->set('multi_int_form_data', explode('<splitter>',$int_table_form));
			
			$pos_id = $chk_pos_id ? $chk_pos_id  : $pos_id;
			$id = $chk_resume_id_ar[0];
			
		// }
		
		// for success page redirect
		$cand_name = substr($can_name, 0, strlen($can_name)-3);
		// get the template details
		$this->get_template_details($id,$pos_id, '3');
		$this->get_template_details($id,$pos_id, '2', $int_table,$cand_name);
		$this->set('spec_id', $pos_id);
		
		// when the form submitted
		if(!empty($this->request->data)){
			// validate the form
			$this->Position->set($this->request->data);
			$interview_status = $schedule_type == 'reschedule' ? 'Re-Scheduled' : 'Scheduled';
			// retain the district
			// validate the form fields	
			if($multi_chk == '' && $schedule_type == 'reschedule'){
				$valid = array('subject','message','subject_candidate','message_candidate',
				'interview_level','interview_stage_id', 'int_date','contact_name','venue','contact_no','reason_id');			
			}else if($multi_chk == ''){
				$valid = array('subject','message','subject_candidate','message_candidate','interview_level','interview_stage_id', 'int_date','contact_name','venue','contact_no');				
			}else{
				$valid = array('subject','message','subject_candidate','message_candidate');
			}		
			
			
			if ($this->Position->validates(array('fieldList' => $valid))){	
				// get the req. resume id
				$this->loadModel('ReqResume');
				//$req_res_id = $this->ReqResume->find('all', array('fields' => array('ReqResume.id'), 
				//'conditions' => array('requirements_id' => $pos_id, 'resume_id' => $id)));
				// send the interview mail to candidate
				// iterate for multiple send CVs
				
				
				$int_key = 0;
				foreach($req_res_ids as $key => $req_res_id){
					if($req_res_id != ''){
						// save req resume table
						if($multi_chk == '1'){
							$data = array('id' => $req_res_id,'modified_date' => $this->Functions->get_current_date(),
							'modified_by' => $this->Session->read('USER.Login.id'),	 'stage_title' => $this->request->data['Position']['candidate_level_'.$int_key],
							'status_title' => $interview_status);
						}else{
							$data = array('id' => $req_res_id,'modified_date' => $this->Functions->get_current_date(),
							'modified_by' => $this->Session->read('USER.Login.id'),	 'stage_title' => $this->request->data['Position']['interview_level'],
							'status_title' => $interview_status);
						 }
						// save  req resume
						if($this->ReqResume->save($data, array('validate' => false))){
							// save req resume status
							$this->loadModel('ReqResumeStatus');
							if($multi_chk == '1'){
								$data = array('req_resume_id' => $req_res_id, 'created_date' => $this->Functions->get_current_date(),
								'created_by' => $this->Session->read('USER.Login.id'), 'stage_title' => $this->request->data['Position']['candidate_level_'.$int_key],
								'status_title' => $interview_status);
							}else{
								$data = array('req_resume_id' => $req_res_id, 'created_date' => $this->Functions->get_current_date(),
								'created_by' => $this->Session->read('USER.Login.id'), 'stage_title' => $this->request->data['Position']['interview_level'],
								'status_title' => $interview_status);
							}			
							
							$this->ReqResumeStatus->id = '';
							if($this->ReqResumeStatus->save($data, array('validate' => false))){			
								// save interview status
								$this->loadModel('ResInterview');
								$this->ResInterview->id = '';
								if($multi_chk == '1'){
									$int_date_time = explode(' ', $this->request->data['Position']['candidate_int_date_'.$int_key]);
									$data = array('req_resume_id' => $req_res_id, 'created_date' => $this->Functions->get_current_date(),
									'created_by' => $this->Session->read('USER.Login.id'), 'stage_title' => $this->request->data['Position']['candidate_level_'.$int_key],
									'status_title' => $interview_status,	'int_date' => $this->Functions->format_date_save(trim($int_date_time[0])).' '.trim($int_date_time[1]),	'int_duration' => $this->request->data['Position']['candidate_duration_'.$int_key], 'int_time' => $int_date_time[1],	'interview_stage_id' => $this->request->data['Position']['candidate_stage_'.$int_key],
									'venue' =>  $this->request->data['Position']['candidate_venue_'.$int_key],'reason_id' =>  $this->request->data['Position']['candidate_reason_'.$int_key],'additional' => $this->request->data['Position']['candidate_addi_'.$int_key],	'contact_name' => $this->request->data['Position']['candidate_addi_'.$int_key], 'contact_no' => $this->request->data['Position']['candidate_mobile_'.$int_key]);
								}else{
									$int_date_time = explode(' ', $this->request->data['Position']['int_date']);
									$data = array('req_resume_id' => $req_res_id, 'created_date' => $this->Functions->get_current_date(),
									'created_by' => $this->Session->read('USER.Login.id'), 'stage_title' => $this->request->data['Position']['interview_level'],
									'status_title' => $interview_status,	'int_date' => $this->Functions->format_date_save(trim($int_date_time[0])).' '.trim($int_date_time[1]),
									'int_duration' => $this->request->data['Position']['int_duration'], 'int_time' => $int_date_time[1],
									'interview_stage_id' => $this->request->data['Position']['interview_stage_id'],
									'venue' =>  $this->request->data['Position']['venue'],'reason_id' =>  $this->request->data['Position']['reason_id'],
									'additional' => $this->request->data['Position']['additional'],
									'contact_name' => $this->request->data['Position']['contact_name'],
									'contact_no' => $this->request->data['Position']['contact_no']);
								}
								
								// echo '<pre>'; print_r($data);die;
								 
								$this->ResInterview->save($data, array('validate' => false));
								
								
								
								// for multi selection only
								/*
								if($multi_chk  == '1'){
									$candidate_msg = $this->get_template_details($chk_resume_id_ar[$key],$pos_id, '3');
									$candidate_msg_split = explode('|||', $candidate_msg);
									$message = $candidate_msg_split[0];
									$subject = $candidate_msg_split[1];
								}else{
									$message = $this->parse_interview_mail($this->request->data['Position']['message_candidate']);
									$subject = $this->request->data['Position']['subject_candidate'];
								}
								*/
								
								// get candidate details
								$resume_data = $this->ReqResume->Resume->findById($chk_resume_id_ar[$key], array('fields' => 'Resume.email_id','Resume.first_name',
								'Resume.last_name'));
								$to_name = $resume_data['Resume']['first_name'].' '.$resume_data['Resume']['last_name'];

																
								$message = $this->parse_interview_mail($this->request->data['Position']['message_candidate'],$to_name,$pos_id, $int_key);
								
								$subject = $this->request->data['Position']['subject_candidate'];
								
								
								$from = ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
								// send mail to client 
								// $resume_data['Resume']['email_id'] = 'testing7@bigspire.com'; // for testing
								$vars = array('from_name' => $from, 'to_name' => ucwords($to_name), 'msg'=> $message);
								// save the mail box
								$this->save_mail_box($subject, $message, $req_res_id, 'R',3);
								// send mail
								if(!$this->send_email($subject, 'send_interview', $this->Session->read('USER.Login.email_id'), $resume_data['Resume']['email_id'], $vars)){	
									// show the msg.								
									$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail to candidate...', 'default', array('class' => 'alert alert-error'));				
									}
							
								}						
							}else{
								// show the error msg.
								$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));					
							}	
						}
					}
			
					// send the interview confirmation mail to client
					// for multi selection only 					
					
					/*
					if($multi_chk  == '1'){
						$client_msg = $this->get_template_details($id,$pos_id, '2', $int_table,$cand_name);
						$client_msg_split = explode('|||', $client_msg);
						$message = $client_msg_split[0];
						$subject = $client_msg_split[1];
					}else{
						$message = $this->parse_interview_mail($this->request->data['Position']['message']);
						$subject = $this->request->data['Position']['subject'];
					}	
					*/
					
					
					echo $message = $this->parse_interview_mail($this->request->data['Position']['message'],'',$pos_id, $int_key);
					die;
					
					$subject = $this->request->data['Position']['subject'];
					
					$int_key++;
								
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
					// $contact_data['Contact']['email'] = 'testing7@bigspire.com'; // for testing
					$vars = array('from_name' => $from, 'to_name' => ucwords($to_name),'msg'=> $message);
					// save the mail box
					$this->save_mail_box($subject, $message, $req_res_id, 'C',2);
					// send cc to client
					if($this->request->data['Position']['client_cc'] != ''){
						$cc = explode(',', $this->request->data['Position']['client_cc']);
						$cc_new = array_map('trim',$cc);							
					}
					
					/*
					if($this->request->data['Position']['client_attach']['tmp_name'] != ''){
						$attach_file = date('ymdhis').'_'.$this->request->data['Position']['client_attach']['name'];
						$attach = $this->upload_attachment($this->request->data['Position']['client_attach'], $attach_file);
					}
					*/					
					// send mail
					if(!$this->send_email($subject, 'confirm_interview', $this->Session->read('USER.Login.email_id'), $contact_data['Contact']['email'], $vars, '', $cc_new)){
						// show the msg.								
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail to candidate...', 'default', array('class' => 'alert alert-error'));				
					}						
					// if successfully update
				$this->set('cv_update_status', 1);
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Interview Details Updated Successfully', 'default', array('class' => 'alert alert-success'));											
			}else{
				// print_r($this->Position->validationErrors);
				// $this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in submitting the form. Pls check all fields filled...', 'default', array('class' => 'alert alert-error'));
				$this->set('validation_error', 1);
			}
		}
			
	}
	
	/* function to upload the photo */
	public function upload_attachment($data, $file){			
		if(!empty($data['tmp_name'])){
			$attach_path = '../../hiring/uploads/attachment/'.$file;
			if($this->upload_file($data['tmp_name'], $attach_path)){
				return $attach_path;
			}			
		}			
	}
	
	/* function to show the view interview */
	public function view_interview_schedule($id, $int_level){
		$this->layout = 'framebox';
		$this->loadModel('ResInterview');
		// $int_text = $this->Functions->get_level_text($int_level);
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
		$data = $this->ResInterview->find('all', array('fields' => array('int_date','int_duration','Resume.first_name','Resume.last_name'
		,'InterviewStage.interview_stage','venue','additional','contact_name','contact_no','stage_title'),
		'conditions' => array('req_resume_id' => $id), 'order' => array('ResInterview.id' => 'desc'), 'limit' => '1', 'joins' => $options));
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
		// exception for the positions where we updated resume status
		if($this->request->params['controller'] == 'position' && $this->request->params['action'] == 'index'){
			$this->get_notification_count();
		}
		
	}
}