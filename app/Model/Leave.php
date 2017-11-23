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
            )
        ),
	
		'leave_to' => array(
            'empty' => array(
                'rule'     => 'check_leave',
                'required' => true,
                'message'  => 'Please select the leave dates'
            )
        )
	);
	
	
	/* function to check job code already exists */
	public function check_leave(){
		// when the form submitted
		if(empty($this->data['Leave']['leave_from']) || empty($this->data['Leave']['leave_to'])){
			return false;
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