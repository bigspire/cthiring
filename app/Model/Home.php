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

class Home extends AppModel {
	
	public $name = 'Home';
	 
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
		'Contact' => array(
            'className'  => 'Contact',
			'foreignKey' => 'client_contact_id'			
        ),
		'ReqStatus' => array(
            'className'  => 'ReqStatus',
			'foreignKey' => 'req_status_id'			
        )		
		
	);
	
	public $validate = array(
		'message' => array(		
            'empty' => array(
                'rule'     => 'notEmpty',
                'required' => true,
                'message'  => 'Please enter the feedback'
            ),
			'length' => array(
                'rule'     => array('minLength', '10'),
                'required' => true,
                'message'  => 'Feedback seems to be too small'
            )
		)
	);
	
	public $hasOne = array(		
		'ReqResume' => array(
            'className'  => 'ReqResume',
			'foreignKey' => 'requirements_id'
			
        )	
		
	);	
	
	/* function to get the employee details */
	public function get_employee_details(){
		return $this->Creator->find('list',  array('fields' => array('id','first_name'), 'order' => array('first_name ASC'),'conditions' => array('status' => 0)));
	}
	
	/* get diff b/w the date */
	public function diff_date($from, $to){ 
		$sql = "SELECT DATEDIFF('$to','$from') AS date_diff";
		$result = $this->query($sql);		
		return $result[0][0]['date_diff'];

	}
}