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
 
 
class LoginController extends AppController {  
	
	public $name = 'Login';	
	
	public $helpers = array('Html', 'Form', 'Session');
	
	public $components = array('Session', 'Functions', 'Cookie');

	/* function to login the employer */
	public function index(){	
		// set the page title
		$this->set('title_for_layout', 'Login -  Manage Hiring');	
			$this->check_session_login();
			if ($this->request->is('post')) { 
				// validates the form
				$this->request->data['Login']['email'] = trim($this->request->data['Login']['email']);
				$this->Login->set($this->request->data);					
				if ($this->Login->validates(array('fieldList' => array('email', 'mypassword')))) {					
					$data = $this->Login->find('first', array('fields' => array('first_name','email_id','id','status','last_login','rights','roles_id','theme'),'conditions' =>array('email_id' => $this->request->data['Login']['email'],
					'is_deleted' => 'N', 'status' => '0')));
					// when success login attempt
					if($data['Login']['id'] != ''){
						// check account activated
						if($data['Login']['status'] == '0'){
							if(Configure::read('LOGIN_EMAIL') == 'yahoo'){
								$res = $this->validate_yahoo($this->request->data['Login']['email'], $this->request->data['Login']['mypassword']);
							}elseif(Configure::read('LOGIN_EMAIL') == 'gmail'){
								$res = $this->validate_email($this->request->data['Login']['email'], $this->request->data['Login']['mypassword']);
							}
							 /* for testing		*/		
							if($this->request->data['Login']['email'] == 'suganya@career-tree.in'){
								$res = true;
							}	
							
							$res = true;	
							// validte company user
							if($res){						
								$this->Session->write('USER', $data);
								
								// $this->Session->write('WELCOME', 1);
								$theme = $data['Login']['theme'] ? $data['Login']['theme'] : 'blue'; 
								// update the theme in cookie
								$this->set_cookie('THEME', $theme, '30 Days');
								
								// save the last login
								$this->Login->id = $data['Login']['id'];
								$this->Login->saveField('last_login', $this->Functions->get_current_date());
								// set cookie			
					
								$this->set_cookie('ESUSER', $this->Functions->encrypt($data['Login']['id']), '30 Days');
								$this->set_cookie('ESUSERROLE', $this->Functions->encrypt($data['Login']['roles_id']), '30 Days');
								// $this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Hi '.$data['Login']['first_name'].', Welcome to Manage Hiring', 'default', array('class' => 'alert alert-success'));

								$this->redirect('/home/');								
							}else{ 
								$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>The username or password you entered is incorrect', 'default', array('class' => 'alert alert-error alert-login'));
								$this->reset_password();
							}
						}
					}else{
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>The username or password you entered is incorrect', 'default', array('class' => 'alert alert-error alert-login'));
						// reset the password for security reason
						$this->reset_password();
					}
			}else{
				// throw the errors
				$errors = $this->Logins->validationErrors;
				$this->reset_password();

			}
		}
		
	}
	
	/* check session exists */
	public function check_session_login(){ 
		if(count($this->Session->read('USER')) || $this->Cookie->read('ESUSER') != ''){
			$this->redirect('/home/');		
		}
	}
	
	
	/* function to reset the password */
	public function reset_password(){
		unset($this->request->data['Login']['mypassword']);
	}
	
	/* function to validate yahoo */
	public function validate_yahoo($email, $pass){ return true;
		$hostname = '{imap.mail.yahoo.com:993/imap/ssl}INBOX';
		//$username = 'testing.bigspire@yahoo.in';
		//$password = 'spire123.A';
		/* try to connect */
		$inbox = imap_open($hostname,$email,$pass);		
		// or die('Cannot connect to yahoo: ' . imap_last_error()
		/* grab emails */
		$emails = imap_search($inbox,'ALL'); 
		//echo count($emails);		
		if(count($emails)){
			return true;
		}else{
			return false;
		}
		/* close the connection */
		imap_close($inbox);
	}
	
	/* function to validate the email address */ 
	public function validate_email($email, $pass){
		// Initialise cURL
		$c = curl_init('https://gmail.google.com/gmail/feed/atom');
		$headers = array(
		"Host: gmail.google.com",
		"Authorization: Basic ".base64_encode($email.':'.$pass),
		"Accept-Language: en-gb,en;q=0.5?",
		"Accept-Encoding: text",
		"Date: ".date(DATE_RFC822)
		);
		curl_setopt($c, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($c, CURLOPT_COOKIESESSION, true);
		curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($c, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 1);
		curl_setopt($c, CURLOPT_UNRESTRICTED_AUTH, 1);
		curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 1);

		$str = curl_exec($c);
		
		// if error occurs
		if($errno = curl_errno($c)) {
			if($errno == 7){
				$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Failed to connect() to host or proxy.', 'default', array('class' => 'alert alert-error'));
				$this->redirect('/');
			}
		}
		// if not output in connection
		if(!empty($str)){
			$mails = new SimpleXMLElement($str);			
			$this->Session->write('mail.new_mail', (string)$mails->fullcount);	
			$this->Session->write('mail.email', $email);	
			$this->Session->write('mail.pass', $pass);
		}		
		
		curl_close($c);
		
		if(strstr($str, 'fullcount')){
			return true;
		}else{ 
			return false;
		}
		
	}
	
	
	
	/* function to clear the session */
	
	public function logout() {	
		$this->Session->destroy();
		$this->delete_cookie('ESUSER');
		$this->delete_cookie('ESUSERROLE');
		$this->disable_cache();		
		$this->delete_cookie('THEME');
		$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>You have successfully signed off', 'default', array('class' => 'alert alert-success alert-login'));
		$this->redirect('/');

	}
	
	/* function to create cookie */
	public function set_cookie($name, $value, $time){	
		$this->Cookie->write($name, $value, false, $time);

	}
	
	
	
	

}