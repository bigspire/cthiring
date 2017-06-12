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
 
class HcController extends AppController {  
	
	public $name = 'HC';
	
	
	/* function to download the resume */
	public function download($id, $type){
		$this->layout = false;
		if($type == 'jd'){
			$data = $this->HC->get_jd($id);
		}else{
			$data = $this->HC->get_resume_data($id);
		}
		// if failed to connect
		if($data == 'error_connect'){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Unable to connect to Hirecraft Server.. Please check your server connection.', 'default', array('class' => 'alert alert-error'));			
			$this->redirect($this->referer());
		}else if($data == 'no_data'){ // if no data
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Unable to download the resume.. Please contact admin.', 'default', array('class' => 'alert alert-error'));
			$this->redirect($this->referer());
		}
		$this->render(false);
	}

}