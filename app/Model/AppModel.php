<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

	/* function used to get the members */	
	public function get_team_mem($id, $show){ 
		if($show == '1'){
			$qryCond = "(a.level1 = '$id' or a.level2 = '$id') and ";
		}		
		
		$sql = "select u.id, u.first_name, u.last_name from users u inner join	approval a  on (a.users_id = u.id) where
		$qryCond u.is_deleted = 'N' and u.status = '0' group by u.id order by u.first_name asc";		
		$result = $this->query($sql);	
		
		return $result;
		
	}
	
}
