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

class Notification extends AppModel {
	
	public $name = 'Notification';
	 
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
        )	
		
	);
	
	
		public $validate = array(
			'reason_not_billable' => array(		
				'empty' => array(
					'rule'     => 'notEmpty',
					'required' => true,
					'message'  => 'Please select the reason'
				)
			),
			'remark_not_billable' => array(		
				'empty' => array(
					'rule'     => 'notEmpty',
					'required' => true,
					'message'  => 'Please enter the remarks'
				)
			)
		);
	
	
	
	
}