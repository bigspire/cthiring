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
 
class EventController  extends AppController {  
	
	public $name = 'Event';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions');
	
	// public $layout = 'apps';	

	
	/* function to list the adv. requests */
	public function index(){	
		// set the page title
		$this->set('title_for_layout', 'Events - Manage Hiring');
		$this->retain_menu();
		// fetch list of types
		$this->set_event_types();
		// when the form is submitted for search
		if($this->request->is('post')){
			$url_vars = $this->Functions->create_url(array('keyword','from','to'),'Event'); 
			$this->redirect('/taskplan/?srch_status=1&'.$url_vars);				
		}
		if($this->params->query['keyword'] != ''){
			$keyCond = array("MATCH (title,details) AGAINST ('".$this->params->query['keyword']."' IN BOOLEAN MODE)"); 
		}
			
		// for date search
		if($this->params->query['from'] != '' || $this->params->query['to'] != ''){
			$from = $this->Functions->format_date_save($this->params->query['from']);
			$to = $this->Functions->format_date_save($this->params->query['to']);			
			$dateCond = array('or' => array('start between ? and ?' => array($from, $to),'end between ? and ?' => array($from, $to))); 
		}
		
		// fetch the advances		
		$this->paginate = array('fields' => array('id','title','start', 'end', 'status','created','TskEventType.color','TskEventType.name'),'limit' => 10,	'conditions' => array($keyCond,$dateCond,'users_id' => $this->Session->read('USER.Login.id'), 'Event.is_deleted' =>  'N'), 'order' => array('created' => 'desc'));
		$data = $this->paginate('Event');		
		$this->set('event_data', $data);
		if(empty($data)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>You havn\'t created any events', 'default', array('class' => 'alert alert'));	
		}
		
		
	}
	
	public function retain_menu(){
		$this->set($this->request->params['controller'].'_'.$this->request->params['action'], 'active');
	}
	
	/* function to save the customer */
	public function create_event(){ 
		// set the page title		
		$this->set('title_for_layout', 'Create Event - Manage Hiring');	
		$this->retain_menu();		
		// load event types
		$this->set_event_types();
		// load event status
		$this->set_event_status();
		if ($this->request->is('post')){ 
			// validates the form
			$this->Event->set($this->request->data);
			if ($this->Event->validates(array('fieldList' => array('title','status','start','end','event_type_id')))) {
				$this->request->data['Event']['users_id'] = $this->Session->read('USER.Login.id');				
				$this->request->data['Event']['created_date'] = $this->Functions->get_current_date();
				$this->request->data['Event']['start'] = $this->Functions->format_date_time_save($this->request->data['Event']['start']);	
				$this->request->data['Event']['end'] = $this->Functions->format_date_time_save($this->request->data['Event']['end']);		
				// save the data
				if($this->Event->save($this->request->data['Event'], array('validate' => false))) {					
					// show the msg.
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Event created successfully', 'default', array('class' => 'alert alert-success'));
					$this->redirect('/event/');
				}else{
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));
				}
			}else{
				//print_r($this->Event->validationErrors);
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in submitting the form. please check errors...', 'default', array('class' => 'alert alert-error'));	
			}
		}
	}
	
	/* function to get event types */
	public function set_event_types(){
		$event_types = $this->Event->TskEventType->find('list', array('fields' => array('id','name'),
		'order' => array('name ASC'), 'conditions' => array('status' => '1', 'is_deleted' => 'N')));
		$this->set('eventType', $event_types);
	}
	
	/* function to get event status */
	public function set_event_status(){
		$event_status = array('Scheduled' => 'Scheduled', 'Confirmed' => 'Confirmed', 'In Progress' => 'In Progress',
		'Rescheduled' => 'Rescheduled', 'Completed' => 'Completed');
		$this->set('eventStatus', $event_status);
	}
	
	/* function to set the theme */
	public function get_event_theme($theme){
		switch($theme){
			case 'default':
			$theme = '';
			break;
			case 'sky_blue':
			$theme = 'cupertino';
			break;
			case 'light_orange':
			$theme = 'humanity';
			break;
			case 'grey':
			$theme = 'smoothness';
			break;
			case 'blue':
			$theme = 'ui-lightness';
			break;
		}
		
		return $theme;
	}
	
	/* function to set the theme url */
	public function get_url_theme($theme){
		switch($theme){
			case '':
			$url = 'default';
			break;
			case 'cupertino':
			$url = 'sky_blue';
			break;
			case 'humanity':
			$url = 'light_orange';
			break;
			case 'smoothness':
			$url = 'grey';
			break;
			case 'ui-lightness':
			$url = 'blue';
			break;
		}		
		return $url;
	}
	
	
	
	/* function to delete the adv. request */
	public function delete($id){
		if(!empty($id) && intval($id)){
			// authorize user before action
			$ret_value = $this->auth_action($id);
			if($ret_value == 'pass'){				
				$this->Event->id = $id;
				$this->Event->saveField('is_deleted', 'Y'); 
				$this->Event->saveField('modified_date', $this->Functions->get_current_date()); 
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Event Deleted Successfully', 'default', array('class' => 'alert alert-success'));	
				
			}else if($ret_value == 'fail'){
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/event/');
			}else{
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Record Deleted: '.$ret_value , 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/event/');
			}
		}else{
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));			
		}
		$this->redirect('/event/');
	}
	
	
	/* function to edit the grade */
	public function edit($id){	
		// set the page title		
		$this->set('title_for_layout', 'Edit Event - Manage Hiring');
		// load event types
		if (!empty($id) && intval($id)){
			// authorize user before action
			$ret_value = $this->auth_action($id);
			if($ret_value == 'pass'){	
				// when the form submitted
				if (!empty($this->request->data)){ 
					// validates the form
					$this->Event->set($this->request->data);
					if ($this->Event->validates(array('fieldList' => array('title','start')))) {
						$this->request->data['Event']['modified'] = $this->Functions->get_current_date();
						$this->request->data['Event']['start'] = $this->Functions->format_date_time_save($this->request->data['Event']['start']);	
						$this->request->data['Event']['end'] = $this->Functions->format_date_time_save($this->request->data['Event']['end']);	
						// save the data
						if($this->Event->save($this->request->data['Event'], array('validate' => false))) {					
							// show the msg.
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Event Modified Successfully', 'default', array('class' => 'alert alert-success'));
						}else{
							// show the error msg.
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));					
						}					
					$this->redirect('/event/');						
					}	
				}else{
					$this->request->data = $this->Event->findById($id, array('fields' => 'Event.id', 'Event.title','Event.details','Event.start','Event.end','event_type_id','Event.status'));	
					$this->request->data['Event']['start'] = $this->Functions->format_date_time_show($this->request->data['Event']['start']);						
					$this->request->data['Event']['end'] = $this->Functions->format_date_time_show($this->request->data['Event']['end']);	
				}
			}else if($ret_value == 'fail'){
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/event/');
			}else{
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Record Deleted: '.$ret_value , 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/event/');
			}
		}else{
			// show the error msg.
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));
			$this->redirect('/event/');		
		}		
		
	}
	
	/* function to auth record */
	public function auth_action($id){
		$data = $this->Event->findById($id, array('fields' => 'users_id','id','modified'));	
		// check the req belongs to the user
		if($data['Event']['users_id'] == $this->Session->read('USER.Login.id')){
			return true;
		}else if($data['Event']['is_deleted'] == 'Y'){
			return $data['Event']['modified'];
		}		
		else if(empty($data)){	
			return 'fail';
		}
	}
	
	/* function to view the adv. request */
	public function view_event($id){
		// set the page title		
		$this->set('title_for_layout', 'View Event - Manage Hiring');
		$this->retain_menu();	
		if(!empty($id) && intval($id)){
			// authorize user before action
			$ret_value = $this->auth_action($id);
			if($ret_value == 'pass'){	
				$data = $this->Event->findById($id, array('fields' => 'Event.id', 'Event.title','Event.details','Event.start','Event.end','TskEventType.name','Event.status'));
				$this->set('event_data', $data);
			}else if($ret_value == 'fail'){ 
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/event/');	
			}else{
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Record Deleted: '.$ret_value , 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/event/');	
			}
		}else{
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));		
			$this->redirect('/event/');	
		}
		
		
	}
	
	
	
	/* function to update event tips session */
	public function update_event_tips($no){ 
		$this->layout = 'refresh';
		$this->Session->write('evnt_tip_'.$no, 1);
		$this->render(false);
	}
	
	
		/* auto complete search */	
	public function search(){ 
		$this->layout = false;	 
		$q = trim(Sanitize::escape($_GET['q']));	
		if(!empty($q)){
			// execute only when the search keywork has value		
			$this->set('keyword', $q);
			$data = $this->Event->find('all', array('fields' => array('title'),  'group' => array('title'), 
			'conditions' =>  array ('title like' => '%'.$q.'%')));	
			$this->set('results', $data);
		}
    }
	
	// check the role permissions
	public function beforeFilter(){ 
		$this->check_session();
		$this->check_role_access(50);
		
	}
	
	
}