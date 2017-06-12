<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $components = array('Session', 'Cookie','Functions');	
	
	public function beforeRender(){	
		// function to check site maintenance
		if($this->request->params['action'] != 'maintenance'){
			$this->check_site_maintenance();
		}
		if($this->request->params['controller'] != 'login'){ 
			$this->check_session();
			$this->front_active_menus();
			if(!$this->request->is('ajax')){
				// $this->check_sync_time();
				$this->get_unread_count();
			}
		}
	}
	
	/* function to check site maintenance */
	public function check_site_maintenance(){  // && $_SERVER['REMOTE_ADDR'] != '127.0.0.1'
		if(Configure::read('WEBSITE_MAINTENANCE') == 1){			
			echo file_get_contents(Configure::read('WEBSITE').$this->webroot.'maintenance.php');
			die;		
		}		
	}

	/* function to check sync status */
	public function check_sync_time(){
		// get sync details
		$this->loadModel('Sync');
		$data = $this->Sync->find('all', array('fields' => array("group_concat(status) status", 'error_msg'), 
		'order' => array('id' => 'desc'), 'limit' => '12', 'group' => array('id')));
		$sync_flag = 1;
		foreach($data as $sync){
			if($sync[0]['status'] == '0'){	
				$sync_flag = '0';
				$sync_error = $sync['Sync']['error_msg'];
			}
		}
		$this->set('syncError', $sync_error);
		$this->set('syncStatus', $sync_flag);
		// get last successful sync
		$data = $this->Sync->find('all', array('fields' => array('sync_time'), 'conditions' => array('status' => '1'),'limit' => '1',  'order' => array('sync_time' => 'desc')));
		$this->set('sync_success_data', $data);
	}
	
	/* get unread count for the users */
	public function get_unread_count(){
		$this->loadModel('Read');
		$count = $this->Read->find('count', array('conditions' => array('users_id' => $this->Session->read('USER.Login.id'),'Read.status' => 'U'),
		'group' => array('Read.id')));
		$this->set('msg_count', $count);
	}
			
	/* function to check the users session */
	public function check_session(){
		$this->disable_cache(); 
		//$this->Session->destroy();
		if(count($this->Session->read('USER'))){ 	
			return true;
		}else if($this->Cookie->read('ESUSER') != ''){ 
			$this->loadModel('Login');
			$data = $this->Login->find('first', array('fields' => array('first_name','email_id','id','status','last_login','rights'),'conditions' =>array('Login.id' => $this->Functions->decrypt($this->Cookie->read('ESUSER')), 'is_deleted' => 'N', 'status' => '0')));					
			if(empty($data)){
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Invalid Attempt', 'default', array('class' => 'alert  alert-login'));				
					$this->redirect('/');
			}
			$this->Session->write('USER', $data);	
			return true;
		}else if($this->Cookie->read('ESUSER') == ''){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Session got expired', 'default', array('class' => 'alert alert-login'));	
			echo "<script>location.href=$this->webroot</script>";
			$this->redirect('/');
		}else{
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Session got expired', 'default', array('class' => 'alert alert-login'));
			$this->delete_cookie('ESUSER');	
			$this->redirect('/');
		}
	}
	
	/* function to set the menu active */
	public function front_active_menus(){ 
		$this->set($this->request->params['controller'].'_menu', 'active');
		
	}
	
	/* function to delete cookie */
	public function delete_cookie($name){		  
		$this->Cookie->delete($name); 

	}
	
	
	/* function to disable the browser cache */
	public function disable_cache(){
		$this->disableCache();		 
		header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' ); 
		header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' ); 
		header( 'Cache-Control: no-store, no-cache, must-revalidate' ); 
		header( 'Cache-Control: post-check=0, pre-check=0', false ); 
		header( 'Pragma: no-cache'); 
		
	}
	
	/* function to send email */
	function send_email($subject,$template,$from,$to,$vars,$src){
		App::uses('CakeEmail', 'Network/Email');
		$Email = new CakeEmail();
		$Email->viewVars($vars);		
		$Email->template($template, 'default');
		$Email->emailFormat('html');
		$Email->subject($subject);
		$Email->to($to);
		$Email->from($from);
		$Email->config('default');
		//$Email->delivery = 'smtp';
		if(!empty($src)){
			$Email->attachments($src);
		}
		
		try {
			$Email->send();
			return true;
		} catch (Exception $e) {
			//$this->write_log($e->getMessage().$this->Functions->get_current_date());			
			return false;
		} 
				
	}
}
