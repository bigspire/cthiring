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

class Resume extends AppModel {
	
	public $name = 'Resume';
	 
	public $useTable = 'resume';
	
	
	public $belongsTo = array(		
		'Creator' => array(
            'className'  => 'User',
			'foreignKey' => 'created_by'			
        ),
		'ResLocation' => array(
            'className'  => 'ResLocation',
			'foreignKey' => 'res_location_id'			
        ),
		'Designation' => array(
            'className'  => 'Designation',
			'foreignKey' => 'designation_id'			
        )
	);
	
	
	
	public function get_data(){
		$sql = "SELECT RID, FirstName,LastName,EmailID,PassportNo,Mobile,PhoneH,ReleventExp,
		TotalExp,DOB,Gender,SkillsText,EducationText,PresentCTC,ExpectedCTC,PresentEmployer,
		FunctionText,IndustryText,PerferLocation,NoticePeriod,Address1,Address2 
		from HC_RESUME_BANK ORDER BY RID asc OFFSET 4532 ROWS FETCH FIRST 5000 ROWS ONLY";
		$result = $this->query($sql);
		return $result;
	}
	
	/* function to get the employee details */
	public function get_employee_details(){
		return $this->Creator->find('list',  array('fields' => array('id','first_name'), 'order' => array('first_name ASC'),'conditions' => array('status' => 0)));
	}
	
	/* function to get the team members */
	public function get_team($id, $show){
		return $this->get_team_mem($id, $show);
	}
	
	
}