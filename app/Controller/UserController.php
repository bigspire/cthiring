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
  
class UserController extends AppController {  
	
	public $name = 'User';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions', 'Excel');

	public function index(){ 
		if($this->request->is('post')){
			$url_vars = $this->Functions->create_url(array('keyword','status'),'User'); 			
			$this->redirect('/user/?'.$url_vars);				
		}
		// set keyword condition
		if($this->params->query['keyword'] != ''){
			$keyCond = array("MATCH (first_name,email_id,Location.location) AGAINST ('".$this->Functions->format_search_keyword($this->params->query['keyword'])."' IN BOOLEAN MODE)"); 
		}
		// for employee condition
		if($this->request->query['status'] != ''){ 
			$status = $this->request->query['status'] == '2' ?  '0' : $this->request->query['status'];
			$stCond = array('User.status' => $status);
		}else{
			$stCond = array('User.status' => '0');
		}
		// set the page title
		$this->set('title_for_layout', 'Users - CT Hiring - ES');	
		$fields = array('id','first_name','email_id','last_name','mobile','status','created_date','position','Location.location');
		// for export
		if($this->request->query['action'] == 'export'){ 
			$data = $this->User->find('all', array('fields' => $fields,'conditions' => 
			array($keyCond,$stCond),'order' => array('created_date' => 'desc'), 'group' => array('User.id')));
			$this->Excel->generate('users', $data, $data, 'Report', 'User Details');
		}
		$this->paginate = array('fields' => $fields,'limit' => '25','conditions' => array($keyCond,$stCond),
		'order' => array('created_date' => 'desc'),	'group' => array('User.id'));
		$data = $this->paginate('User');
		$this->set('data', $data);
		if(empty($data)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Oops! No Users Found!', 'default', array('class' => 'alert alert-info'));
		}
	}
	
	/* auto complete search */	
	public function search(){ 
		$this->layout = false;		
		$q = trim(Sanitize::escape($_GET['q']));	
		if(!empty($q)){
			// execute only when the search keywork has value		
			$this->set('keyword', $q);			
			$data = $this->User->find('all', array('fields' => array('first_name','email_id','Location.location'),
			'group' => array('first_name','email_id','Location.location'), 'conditions' => 	array("OR" => array ('first_name like' => '%'.$q.'%',
			'email_id like' => '%'.$q.'%', 'Location.location like' => '%'.$q.'%'), 'AND' => array('User.is_deleted' => 'N'))));		
			$this->set('results', $data);
		}
    }
	
	

}