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
 
class BillingController extends AppController {  
	
	public $name = 'Billing';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions', 'Excel');

	public function index(){	
		// set the page title
		$this->set('title_for_layout', 'Billings - CT Hiring - ES');
		// when the form is submitted for search
		if($this->request->is('post')){
			$url_vars = $this->Functions->create_url(array('keyword','from','to','emp_id'),'Billing'); 			
			$this->redirect('/billing/?'.$url_vars);				
		}
		$this->set('empList', $this->Billing->get_employee_details());	
		// set keyword condition
		if($this->params->query['keyword'] != ''){
			$keyCond = array("MATCH (Client.client_name,Resume.first_name,Resume.last_name) AGAINST ('".$this->Functions->format_search_keyword($this->params->query['keyword'])."' IN BOOLEAN MODE)");
		}
		// date condition
		if($this->request->query['from'] != '' || $this->request->query['to'] != ''){
			$start = $this->request->query['from'] ? $this->request->query['from'] : date('d/m/Y', strtotime('-1 year'));
			$end = $this->request->query['to'] ? $this->request->query['to'] : date('d/m/Y');
			$date_cond = array('or' => array("joined_on between ? and ?" => 	array($this->Functions->format_date_save($start), $this->Functions->format_date_save($end))));
		}
		// for employee condition
		if($this->request->query['emp_id'] != ''){ 
			$empCond = array('ReqResumeStatus.created_by' => $this->request->query['emp_id']);
		}else if($this->Session->read('USER.Login.rights') != '5'){			
			$empCond = array('ReqResumeStatus.created_by' => $this->Session->read('USER.Login.id'));
		}
		
		$options = array(			
			array('table' => 'designation',
					'alias' => 'Designation',					
					'type' => 'LEFT',
					'conditions' => array('`Designation`.`id` = `Resume`.`designation_id`')
			),
			array('table' => 'clients',
					'alias' => 'Client',					
					'type' => 'LEFT',
					'conditions' => array('`Client`.`id` = `Position`.`clients_id`')
			),
			array('table' => 'req_resume_status',
					'alias' => 'ReqResumeStatus',					
					'type' => 'INNER',
					'conditions' => array('`ReqResumeStatus`.`req_resume_id` = `Billing`.`id`',
					'ReqResumeStatus.stage_title' => 'Offer')
			),
			array('table' => 'users',
					'alias' => 'Owner',					
					'type' => 'LEFT',
					'conditions' => array('`Owner`.`id` = `ReqResumeStatus`.`created_by`')
			)
		);
		$fields = array('Resume.id','joined_on','Billing.created_date','Owner.first_name','Owner.created_date','ctc_offer','bill_ctc','Resume.first_name','Resume.last_name',
		'Position.job_title','Designation.designation','Client.client_name');		
		// for export
		if($this->request->query['action'] == 'export'){ 
			$data = $this->Billing->find('all', array('fields' => $fields,'conditions' => array($keyCond,$date_cond,
			'joined_on !=' => '0000-00-00',$empCond),'order' => array('Billing.joined_on' => 'desc'), 
			'group' => array('Billing.id'), 'joins' => $options));
			$this->Excel->generate('billing', $data, $data, 'Billing Report', 'Billing Details');
		}
		$this->paginate = array('fields' => $fields,'limit' => '25','conditions' => array($keyCond,$date_cond,'joined_on !=' => '0000-00-00', 'bill_ctc >' => '0', $empCond),
		'order' => array('Billing.joined_on' => 'desc'),	'group' => array('Billing.id'), 'joins' => $options);		
		$data = $this->paginate('Billing');
		$this->set('billing_data', $data);
		if(empty($data)){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Oops! No Billings Found!', 'default', array('class' => 'alert alert-info'));
		}
		
	}
	
	
	/* auto complete search */	
	public function search(){ 
		$this->layout = false;		
		$q = trim(Sanitize::escape($_GET['q']));	
		if(!empty($q)){
			// execute only when the search keywork has value		
			$this->set('keyword', $q);			
			$this->Billing->unBindModel(array('belongsTo' => array('Creator')));
			$options = array(			
				array('table' => 'clients',
					'alias' => 'Client',					
					'type' => 'LEFT',
					'conditions' => array('`Client`.`id` = `Position`.`clients_id`')
				)
			);
			$data = $this->Billing->find('all', array('fields' => array('Client.client_name',"concat(Resume.first_name, ' ', Resume.last_name) as first_name"),
			'group' => array('Client.client_name','first_name'), 'conditions' => 	array("OR" => array ('Client.client_name like' => '%'.$q.'%',
			'first_name like' => '%'.$q.'%'), 'AND' => array('Resume.is_deleted' => 'N','joined_on !=' => '0000-00-00')),'joins' => $options,
			'group' => array('Billing.id')));		
			$this->set('results', $data);
		}
    }
	
	// check the role permissions
	public function beforeFilter(){ 
		$this->check_session();
		$this->check_role_access(35);
		
	}
	
	
}