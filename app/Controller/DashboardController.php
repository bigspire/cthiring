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
  
class DashboardController extends AppController {  
	
	public $name = 'Dashboard';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions','Excel');

	public $layout = 'dashboard';
	
	public function recruiter(){
		// set the page title
		$this->set('title_for_layout', 'Recruiter Dashboard - CT Hiring');		
    }
	
	public function account_holder(){
		// set the page title
		$this->set('title_for_layout', 'Account Holder Dashboard - CT Hiring');
		
    }
	
}