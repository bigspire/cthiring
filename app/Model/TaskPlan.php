<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

class TaskPlan extends AppModel {
	
	public $name = 'TaskPlan';
	 
	public $useTable = 'task_plan';	
	  
	
	public $belongsTo = array(		
		'Creator' => array(
            'className'  => 'User',
			'foreignKey' => 'users_id'			
        ),
		'Position' => array(
            'className'  => 'Position',
			'foreignKey' => 'requirements_id'			
        )		
		
	);
	
	
	public $validate = array(
		'clients_id' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please select the client name'
            )
        ),
		'requirements_id' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please select the requirement'
            )
        ),
		'session' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please select the session'
            )
        ),
		'task_date' => array(
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please select the task date'
            ),
			'check_exist' => array(
                'rule'     => 'check_exist',
                'required' => true,
                'message'  => 'Task is duplicate. Same plan already exists for this day and session'
            )
        )
	);
	
	
	/* function to check job code already exists */
	public function check_exist(){
		// when the form submitted
		if(!empty($this->data['TaskPlan']['session'])){
			// for edit page
			if($this->data['TaskPlan']['page'] == 'edit_task'){ 
				$pageCond = array('TaskPlan.id !=' => $this->data['TaskPlan']['id']);
			}			
			// session condition
			$sessCond = array('TaskPlan.session' =>  array($this->data['TaskPlan']['session'], 'D'));				
			$data = $this->find('all', array('fields' => array('TaskPlan.session'),
			'conditions' => array('task_date' => $this->format_date_save($this->data['TaskPlan']['task_date']),
			'TaskPlan.is_deleted' => 'N', 'requirements_id' => $this->data['TaskPlan']['requirements_id'], $pageCond, $sessCond,	'TaskPlan.users_id' => CakeSession::read('USER.Login.id'))));
			if($data[0]['TaskPlan']['session'] == $this->data['TaskPlan']['session']){
				return false;
			}else if($this->data['TaskPlan']['session'] == 'D' && !empty($data[0]['TaskPlan']['session'])){
				return false;
			}else if($data[0]['TaskPlan']['session'] == 'D'){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	/* function to format the date to save */
	public function format_date_save($date){
		if(!empty($date)){
			$exp_date = explode('/', $date); 
			return $exp_date[2].'-'.$exp_date[1].'-'.$exp_date[0];
		}
	}
}