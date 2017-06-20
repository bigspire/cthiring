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

class Position extends AppModel {
	
	public $name = 'Position';
	 
	public $useTable = 'requirements';	
	  
	
	public $belongsTo = array(		
		'Creator' => array(
            'className'  => 'User',
			'foreignKey' => 'created_by'			
        ),
		'Client' => array(
            'className'  => 'Client',
			'foreignKey' => 'clients_id'			
        ),
		'ReqStatus' => array(
            'className'  => 'ReqStatus',
			'foreignKey' => 'req_status_id'			
        ),
		'FunctionArea' => array(
            'className'  => 'FunctionArea',
			'foreignKey' => 'function_area_id'			
        )		
		
	);
	
	public $hasOne = array(		
		'ReqResume' => array(
            'className'  => 'ReqResume',
			'foreignKey' => 'requirements_id',
			'conditions' => array('stage_title not like' => 'Validation%')

        ),
		/*
		'ReqTeam' => array(
            'className'  => 'ReqTeam',
			'foreignKey' => 'requirements_id'			
        )
		*/

	);
	
	public $validate = array(
		'clients_id' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please select the client name'
            )
        ),
		'client_contact_id' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please select the SPOC'
            )
        ),
		'job_title' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please enter the job title'
            )
        ),
		'location' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please enter the location'
            )
        ),
		'max_exp' => array(		
            'empty' => array(
                'rule'     => 'validate_exp',
                'required' => true,
                'message'  => 'Please select the min exp. and max exp.'
            )
        ),
		'ctc_to_type' => array(		
            'empty' => array(
                'rule'     => 'validate_ctc',
                'required' => true,
                'message'  => 'Please select all values'
            )
        ),
		'skills' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please enter the key skills'
            )
        ),	
		'no_job' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please select no. of openings'
            )
        ),
		'team_member_req' => array(		
            'empty' => array(
                'rule'     => 'validate_team',
                'required' => true,
                'message'  => 'Please select the team members'
            )
        ),
		'end_date' => array(		
            'empty' => array(
                'rule'     => 'validate_req_date',
                'required' => true,
                'message'  => 'Please select the start and closure date'
            )
        ),			
		'function_area_id' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please select the functional area'
            )
        ),		
			
		'job_desc' => array(		
            'empty' => array(
                'rule'     => 'validate_jobDesc',
                'required' => true,
                'message'  => 'Please type job description here or attach job description file below'
            ),
			 'minlength' => array(
                'rule'     => 'check_length',
                'required' => true,
                'message'  => 'Job description must be min. of 500 chars.'
            )
        ),
		'desc_file' => array(		
            'empty' => array(
                'rule'     => 'validate_file',
                'required' => true,
                'message'  => 'Please upload only doc or docx formats only'
            )
        )
			
	);
	
	/* function to validate the team members */
	public function validate_team(){ 
		if($this->data['Position']['team_member_req'][0] != ''){
			return true;
		}else{
			return false;
		}
	}
	
	/* function to validate the job desc length */
	public function check_length(){
		if($this->data['Position']['job_desc'] != ''){
			if(strlen($this->data['Position']['job_desc']) < 500){				
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	/* function to validate the file type */
	public function validate_file(){ 
		if($this->data['Position']['desc_file']['name'] != ''){
			if($this->data['Position']['desc_file']['type'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
			|| $this->data['Position']['desc_file']['type'] == 'application/msword'){			
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}
	
	
	/* function to validate the experience */
	public function validate_exp(){
		if($this->data['Position']['min_exp'] == '' || $this->data['Position']['max_exp'] == ''){
			return false;
		}else{
			return true;
		}
	}
	
	/* function to validate the job desc */
	public function validate_jobDesc(){
		if($this->data['Position']['job_desc'] == '' && $this->data['Position']['desc_file']['name'] == ''){
			return false;
		}else{
			return true;
		}
	}
	
	
	/* function to validate the req. date */
	public function validate_req_date(){
		if($this->data['Position']['start_date'] == '' || $this->data['Position']['end_date'] == ''){
			return false;
		}else{
			return true;
		}
	}
	
	/* function to validate the ctc */
	public function validate_ctc(){
		if($this->data['Position']['ctc_from'] == '' || $this->data['Position']['ctc_to'] == ''
		 || $this->data['Position']['ctc_from_type'] == ''  || $this->data['Position']['ctc_to_type'] == ''){
			return false;
		}else{
			return true;
		}
	}
	
	/* function to get the employee details */
	public function get_employee_details(){
		return $this->Creator->find('list',  array('fields' => array('id','first_name'), 'order' => array('first_name ASC'),'conditions' => array('status' => 0)));
	}
	
	
	
}