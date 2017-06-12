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

class TskEvent extends AppModel {
	
	public $name = 'TskEvent';
	 
	public $useTable = 'events';
	  
	public $primaryKey = 'id';
	
	
	public $belongsTo = array(		
		'TskEventType' => array(
            'className'  => 'TskEventType',
			'foreignKey' => 'event_type_id'			
        ),
		'Home' => array(
            'className'  => 'Home',
			'foreignKey' => 'users_id'			
        )
	);
	
	
	public $validate = array(			
        'title' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please enter the event title'
            )
        ),
		'start' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please select the start date and time'
            ),
			'check_exists_same' => array(
				'rule'     => 'check_exists_same',
				'required' => true,
				'message'  => 'Event already created on this date and time'
			)
        )
		,
		'end' => array(            
			'check_exists' => array(
				'rule'     => 'check_exists',
				'required' => true,
				'message'  => 'Event already created b/w these dates'
			),
			'check_valid' => array(
				'rule'     => 'check_valid',
				'required' => true,
				'message'  => 'Invalid End Date and Time'
			)
        )/*
		
		,
		'details' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please enter the event description'
            )
        )
		*/
		,
		'event_type_id' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please select the event type'
            )
        ),
		'status' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please select the status'
            )
		)
		
	);
	
	/* function to check leave exists */
	public function check_exists(){ 
		if(!empty($this->data['TskEvent']['start'])){
			$from = $this->format_date_time_save($this->data['TskEvent']['start']);
			$to = $this->format_date_time_save($this->data['TskEvent']['end']);	
			
			if(!empty($this->data['TskEvent']['start']) && !empty($this->data['TskEvent']['end'])){
				$count =  $this->find('count', array('conditions' => array('or' => array('start between ? and ?' => array($from, $to),
				'end between ? and ?' => array($from, $to)), 'TskEvent.app_users_id' => CakeSession::read('USER.Login.id'), $this->get_edit_cond(), 'TskEvent.is_deleted' => 'N')));				
			}
			if($count > 0){
				return false;
			}else{
				return true;
			}
		}
		return true;
	}
	
	public function get_edit_cond(){
		if($this->data['TskEvent']['page'] == 'edit'){
			return $editCond = array('TskEvent.id != ' => $this->data['TskEvent']['id']);
		}
	}
	
	/* function to check leave exists */
	public function check_exists_same(){ 
		if(!empty($this->data['TskEvent']['start'])){
			$from = $this->format_date_time_save($this->data['TskEvent']['start']);
			$to = $this->format_date_time_save($this->data['TskEvent']['end']);			
			//if(empty($this->data['TskEvent']['end'])){			
				$count =  $this->find('count', array('conditions' => array('start' => $from, 'TskEvent.app_users_id' => CakeSession::read('USER.Login.id'),
				$this->get_edit_cond(), 'TskEvent.is_deleted' => 'N')));
			//}
			if($count > 0){
				return false;
			}else{
				return true;
			}
		}
		return true;
	}
	
	
	/* function to check valid end */
	public function check_valid(){ 
		if(!empty($this->data['TskEvent']['end'])){
			$start = explode(' ', $this->data['TskEvent']['start']);
			$end = explode(' ', $this->data['TskEvent']['end']);
			$from = strtotime($this->format_date_save($start[0]));
			$to =  strtotime($this->format_date_save($end[0]));	
			if($from > $to){
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
	
	/* function to format the date to save */
	public function format_date_time_save($date){ 
		$split_date =  split("[/: ]", $date); 
		return $split_date[2].'-'.$split_date[1].'-'.$split_date[0].' '.$split_date[3].':'.$split_date[4];
	}

	
}