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

class Leave extends AppModel {
	
	public $name = 'Leave';
	 
	public $useTable = 'user_leave';	
	  
	
	public $belongsTo = array(		
		'Creator' => array(
            'className'  => 'User',
			'foreignKey' => 'users_id'			
        )
	);
	
		
	public $hasOne =  array(		
		'LeaveStatus' => array(
            'className'  => 'LeaveStatus',
			'foreignKey' => 'user_leave_id'			
        )	
		
	);
	
	
	
	public $validate = array(
		'leave_type' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please select the leave type'
            )
        ),
		'reason_leave' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please enter the reason'
            )
        ),
		'session' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please select the session'
            ),
			 'session_validate' => array(
                'rule'     => 'session_validate',
                'required' => true,
                'message'  => 'Invalid session'
            )
        ),
	
		'leave_to' => array(
            'empty' => array(
                'rule'     => 'check_leave',
                'required' => true,
                'message'  => 'Please select the leave dates'
            ),
			 'check_exists' => array(
                'rule'     => 'check_exists',
                'required' => true,
                'message'  => 'Leaves already created b/w these dates'
            )
        ),
		
		'remarks' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please enter the reason to cancel'
            )
        )
	);
	
	
	/* public function validate session */
	public function session_validate(){
		if(!empty($this->data['Leave']['leave_from']) && !empty($this->data['Leave']['leave_to'])){
			$leave_from = $this->format_date_save($this->data['Leave']['leave_from']);
			$leave_to = $this->format_date_save($this->data['Leave']['leave_to']);
			$diff = $this->diff_date($leave_from, $leave_to);			
			if($diff > 0 && $this->data['Leave']['session'] != 'D'){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	/* function to check job code already exists */
	public function check_leave(){
		// when the form submitted
		if(empty($this->data['Leave']['leave_from']) || empty($this->data['Leave']['leave_to'])){
			return false;
		}else{
			return true;
		}
	}
	
	/* function to check leave exists */
	public function check_exists(){
		if(!empty($this->data['Leave']['leave_from']) && !empty($this->data['Leave']['leave_to'])){
			$from = $this->format_date_save($this->data['Leave']['leave_from']);
			$to = $this->format_date_save($this->data['Leave']['leave_to']);
			$count =  $this->find('count', array('conditions' => array('or' => array('leave_from between ? and ?' => array($from, $to),
			'leave_to between ? and ?' => array($from, $to)), 'Leave.users_id' => CakeSession::read('USER.Login.id'), 
			'Leave.is_deleted'=> 'N', 'Leave.is_approve !=' =>  'R')));
			if($count > 0){
				return false;
			}else{
				return true;
			}
		}
		return true;
	}
	
	/* function to format the date to save */
	public function format_date_save($date){
		if(!empty($date)){
			$exp_date = explode('/', $date); 
			return $exp_date[2].'-'.$exp_date[1].'-'.$exp_date[0];
		}
	}
	
	/* get diff b/w the date */
	public function diff_date($from, $to){ 
		$sql = "SELECT DATEDIFF('$to','$from') AS date_diff";
		$result = $this->query($sql);		
		return $result[0][0]['date_diff'];
	}
	
	
}