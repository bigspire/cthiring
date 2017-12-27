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

class ApproveBilling extends AppModel {
	
	public $name = 'ApproveBilling';
	 
	public $useTable = 'inc_billing';
	
	public $belongsTo = array(		
		'Position' => array(
            'className'  => 'Position',
			'foreignKey' => 'requirements_id'			
        ),
		'Resume' => array(
            'className'  => 'Resume',
			'foreignKey' => 'resume_id'			
        )		
	);
	
	  
		
	/* function to get the employee details */
	public function get_employee_details(){
		return $this->Creator->find('list',  array('fields' => array('id','first_name'), 'order' => array('first_name ASC'),'conditions' => array('status' => 0)));
	}
	
	

	
}