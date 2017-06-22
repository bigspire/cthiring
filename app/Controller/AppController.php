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
			$data = $this->Login->find('first', array('fields' => array('first_name','email_id','id','status','last_login','rights','roles_id'),'conditions' =>array('Login.id' => $this->Functions->decrypt($this->Cookie->read('ESUSER')), 'is_deleted' => 'N', 'status' => '0')));					
			if(empty($data)){
					$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Invalid Attempt', 'default', array('class' => 'alert  alert-login'));				
					$this->redirect('/');
			}
			$this->Session->write('USER', $data);	
			return true;
		}else if($this->Cookie->read('ESUSER') == ''){
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Session got expired', 'default', array('class' => 'alert alert-login'));	
			// echo "<script>location.href=$this->webroot</script>";
			$this->redirect('/');
		}else{
			$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Session got expired', 'default', array('class' => 'alert alert-login'));
			$this->delete_cookie('ESUSER');	
			$this->redirect('/');
		}
	}
	
	/* function to check the role access */
	public function check_role_access($cur_module){
		$this->loadModel('Permission');
		$permissions = $this->Permission->find('all', array('fields' => array('modules_id'), 'conditions' => array('roles_id' => $this->Session->read('USER.Login.roles_id'))));	
		//echo "<pre>"; print_r($module_list);
		$modules = $this->Permission->Module->find('all', array('fields' => array('id'), 'conditions' => array('status' => 'A'), 'order' => array('module_name' => 'asc')));
		//echo '<pre>'; print_r($permissions);
		foreach($permissions as $per){
			$format_per[] = $per['Permission']['modules_id'];
		}
		// if not home controller
		if($this->params['controller'] != 'home'){		
			// check user has permission to module
			if (!in_array($cur_module, $format_per)){
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Invalid Entry', 'default', array('class' => 'alert alert-error'));	
				$this->redirect('/home/');	
			}
		}
		// check the all module exists in the list
		foreach($modules as $key => $module){
			// check the user module exists in the database module list
			if (in_array($module['Module']['id'], $format_per)) { 	
				switch($module['Module']['id']){
					case 1:					
					$this->set('create_client', 1);
					break;					
					case 2:					
					$this->set('view_client', 1);
					break;						
					case 4:					
					$this->set('create_position', 1);
					break;					
					case 5:					
					$this->set('view_position', 1);
					break;
					case 7:					
					$this->set('create_resume', 1);
					break;
					case 8:					
					$this->set('view_resume', 1);
					break;
					case 10:					
					$this->set('view_interview', 1);
					break;					
					case 14:					
					$this->set('view_incentive', 1);
					break;
					case 13:					
					$this->set('create_incentive', 1);
					break;
					case 17:					
					$this->set('recruiter_report', 1);
					break;
					case 18:					
					$this->set('account_holder_report', 1);
					break;
					case 19:					
					$this->set('location_report', 1);
					break;
					case 20:					
					$this->set('failure_report', 1);
					break;				
					case 22:					
					$this->set('revenue_report', 1);
					break;
					case 23:					
					$this->set('tat_report', 1);
					break;
					case 24:					
					$this->set('collection_report', 1);
					break;
					case 25:					
					$this->set('client_retention_report', 1);
					break;
					case 26:					
					$this->set('incentive_report', 1);
					break;
					case 27:					
					$this->set('daily_report', 1);
					break;
					case 28:					
					$this->set('weekly_report', 1);
					break;
					case 29:					
					$this->set('sent_item', 1);
					break;
					case 30:					
					$this->set('manage_grade', 1);
					break;
					case 31:					
					$this->set('manage_users', 1);
					break;
					case 32:					
					$this->set('manage_roles', 1);
					break;
					case 33:					
					$this->set('manage_mailer_template', 1);
					break;
					case 34:					
					$this->set('manage_incentive', 1);
					break;
				}				
			}
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
	
	/* function used to upload the image */
	function  upload_file($src, $dest){	
		if(!empty($src)){			
			// copy the file to the image path			
			if(!copy($src, $dest)){
				echo 'failed to copy the file';
			}else{				
				return 1;
			}
		}
	}
	
	/* function to download the file */
	public function download_file($path){	
		// Must be fresh start
		if( headers_sent() )
		die('Headers Sent');
		// Required for some browsers
		if(ini_get('zlib.output_compression'))
		ini_set('zlib.output_compression', 'Off');
		// File Exists?
		if(file_exists($path)){
			// Parse Info / Get Extension
			$fsize = filesize($path);
			$path_parts = pathinfo($path);
			$ext = strtolower($path_parts["extension"]);
			// Determine Content Type
			switch($ext){			 
			  case "zip": $ctype="application/zip"; break;
			  case "doc": $ctype="application/msword"; break;
			  case "xls": $ctype="application/vnd.ms-excel"; break;		 
			  case "gif": $ctype="image/gif"; break;
			  case "png": $ctype="image/png"; break;
			  case "jpeg":
			  case "jpg": $ctype="image/jpg"; break;
			  default: $ctype="application/force-download";
			}
			header("Pragma: public"); // required
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Cache-Control: private",false); // required for certain browsers
			header("Content-Type: $ctype");
			$file_name =  basename($path);
			header("Content-Disposition: attachment; filename=\"".$file_name."\";" );
			header("Content-Transfer-Encoding: binary");
			header("Content-Length: ".$fsize);
			ob_clean();
			flush();
			readfile( $path );
		}else{
			die('File Not Found');
		}
	} 
}
