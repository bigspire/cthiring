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
 
class TskeventtypeController extends AppController {  
	
	public $name = 'TskEventType';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions');
	
	public $layout = 'apps';	

	/* function to list the adv. requests */
	public function index(){	
		// set the page title
		$this->set('title_for_layout', 'Event Types - Work Planner - My PDCA');
		// when the form is submitted for search
		if($this->request->is('post')){
			$this->redirect('/tskeventtype/?keyword='.$this->request->data['TskEventType']['SearchText']);			
		}
		if($this->params->query['keyword'] != ''){
			$keyCond = array("MATCH (name) AGAINST ('".$this->params->query['keyword']."' IN BOOLEAN MODE)"); 
		}
		// fetch the advances		
		$this->paginate = array('fields' => array('id','name', 'color','created_date', 'status','is_deleted','modified_date'),'limit' => 10,'conditions' => array($keyCond, 'TskEventType.is_deleted' => 'N'), 'order' => array('created_date' => 'desc'));
		$data = $this->paginate('TskEventType');			
		$this->set('cat_data', $data);
		if(empty($data)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>You havn\'t created any plan types', 'default', array('class' => 'alert alert'));	
		}
		
		
	}
	
	/* function to save the customer */
	public function create_event_type(){ 
		// set the page title		
		$this->set('title_for_layout', 'Create Event Type - Work Planner - My PDCA');	
		$this->set_event_color();
		if ($this->request->is('post')){ 
			// validates the form
			$this->TskEventType->set($this->request->data);
			if ($this->TskEventType->validates(array('fieldList' => array('name', 'color','status')))) {
				$this->request->data['TskEventType']['created_by'] = $this->Session->read('USER.Login.id');				
				$this->request->data['TskEventType']['created_date'] = $this->Functions->get_current_date();						
				// save the data
				if($this->TskEventType->save($this->request->data['TskEventType'])) {					
					// show the msg.
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Event Type created successfully', 'default', array('class' => 'alert alert-success'));
					$this->redirect('/tskeventtype/');
				}else{
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));
				}
			}else{
				//print_r($this->TskEventType->validationErrors);
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in submitting the form. please check errors...', 'default', array('class' => 'alert alert-error'));	
			}
		}
	}
	
	/* function to set event color */
	public function set_event_color(){
		$this->set('colors', array('Blue' => 'Blue', 'Red' => 'Red', 'Pink' => 'Pink', 'Purple' => 'Purple', 'Orange' => 'Orange', 
		'Green' => 'Green', 'Grey' => 'Grey', 'Black' => 'Black', 'Brown' => 'Brown'));
	}
	
		
	
	/* function to delete the adv. request */
	public function delete_event_type($id){
		if(!empty($id) && intval($id)){
			// authorize user before action
			$ret_value = $this->auth_action($id);
			if($ret_value == 'pass'){				
				$this->TskEventType->id = $id;
				$this->TskEventType->saveField('is_deleted', 'Y'); 
				$this->TskEventType->saveField('modified_date', $this->Functions->get_current_date()); 
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Event Type deleted successfully', 'default', array('class' => 'alert alert-success'));	
				
			}else if($ret_value == 'fail'){
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/tskeventtype/');
			}else{
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Record Deleted: '.$ret_value , 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/tskeventtype/');
			}
		}else{
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));			
		}
		$this->redirect('/tskeventtype/');
	}
	
	
	/* function to edit the grade */
	public function edit_event_type($id){	
		// set the page title		
		$this->set('title_for_layout', 'Edit Event Type - Work Planner - My PDCA');	
		$this->set_event_color();
		if (!empty($id) && intval($id)){
			// authorize user before action
			$ret_value = $this->auth_action($id);
			if($ret_value == 'pass'){	
				// when the form submitted
				if (!empty($this->request->data)){ 
					// validates the form
					$this->TskEventType->set($this->request->data);
					if ($this->TskEventType->validates(array('fieldList' => array('name', 'color','status')))) {
						$this->request->data['TskEventType']['modified_by'] = $this->Session->read('USER.Login.id');				
						$this->request->data['TskEventType']['modified_date'] = $this->Functions->get_current_date();					
						// save the data
						if($this->TskEventType->save($this->request->data['TskEventType'])) {					
							// show the msg.
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Event Type modified successfully', 'default', array('class' => 'alert alert-success'));
						}else{
							// show the error msg.
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data...', 'default', array('class' => 'alert alert-error'));					
						}					
					$this->redirect('/tskeventtype/');						
					}	
				}else{
					$this->request->data = $this->TskEventType->findById($id);									
				}
			}else if($ret_value == 'fail'){
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/tskeventtype/');
			}else{
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Record Deleted: '.$ret_value , 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/tskeventtype/');
			}
		}else{
			// show the error msg.
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));
			$this->redirect('/tskeventtype/');		
		}		
		
	}
	
	/* function to auth record */
	public function auth_action($id){
		$data = $this->TskEventType->findById($id, array('fields' => 'id','is_deleted','modified_date'));	
		// check the req belongs to the user
		if($data['TskEventType']['is_deleted'] == 'Y'){
			return $data['TskEventType']['modified_date'];
		}		
		else if(empty($data)){	
			return 'fail';
		}else{
			return 'pass';
		}
	}
	
	/* function to view the adv. request */
	public function view_event_type($id){
		// set the page title		
		$this->set('title_for_layout', 'View Event Type - Work Planner - My PDCA');
		if(!empty($id) && intval($id)){
			// authorize user before action
			$ret_value = $this->auth_action($id);
			if($ret_value == 'pass'){	
				$data = $this->TskEventType->findById($id);
				$this->set('event_type', $data);
			}else if($ret_value == 'fail'){ 
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/tskeventtype/');	
			}else{
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Record Deleted: '.$ret_value , 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/tskeventtype/');	
			}
		}else{
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));		
			$this->redirect('/tskeventtype/');	
		}
		
		
	}
	
	/* clear the cache */
	
	public function beforeFilter() { 
		//$this->disable_cache();
		$this->show_tabs(63);
	}
	
	
		/* auto complete search */	
	public function search(){ 
		$this->layout = false;	 
		$q = trim(Sanitize::escape($_GET['q']));	
		if(!empty($q)){
			// execute only when the search keywork has value		
			$this->set('keyword', $q);
			$data = $this->TskEventType->find('all', array('fields' => array('name'),  'group' => array('title'), 'conditions' => 	$conditions =  array("OR" => array ('title like' => '%'.$q.'%'), 'AND' => array('is_deleted' => 'N'))));		
			$this->set('results', $data);
		}
    }
	
	
	
}