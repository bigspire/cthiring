<?php
/*
						// get the superiors
						$this->loadModel('Approve');
						// if record approved
						if($status == 'A'){					
							$approval_data = $this->Approve->find('first', array('fields' => array('level2'), 'conditions'=> array('Approve.users_id' => $user_id)));
							// make sure level 2 is not empty
							if(!empty($approval_data['Approve']['level2'])){
								// check level 2 is not empty and its not the same user
								if($approval_data['Approve']['level2'] != $this->Session->read('USER.Login.id')){ 	
									// get superior level 2 details				
									$data = array('clients_id' => $id, 'created_date' => $this->Functions->get_current_date(), 'users_id' => $approval_data['Approve']['level2']);
									// save leve 2 if found
									$this->ClientStatus->id = '';						
									// make sure not duplicate status exists
									$this->check_duplicate_status($id, $approval_data['Approve']['level2'], 0);						
									if($this->ClientStatus->save($data, true, $fieldList = array('clients_id','created_date','users_id'))){	
																	
									}else{
										$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving superior status...', 'default', array('class' => 'alert alert-error'));
									}
								}else{
									// update status if l2 approved
									$this->Client->id = $id;
									$this->Client->saveField('is_approve', 'A');
									$this->Client->saveField('status', 'A');	
								}
							}else{
								// update  status
								$this->Client->id = $id;
								$this->Client->saveField('is_approve', 'A');
								$this->Client->saveField('status', 'A');
							}
							
						}else{
							// update  status
							$this->Client->id = $id;
							$this->Client->saveField('is_approve', 'R');								
							$approval_data = $this->Approve->find('first', array('fields' => array('level1','level2'), 'conditions'=> array('Approve.users_id' => $user_id)));
							if($approval_data['Approve']['level1'] == $this->Session->read('USER.Login.id')){
								$mail_user = $approval_data['Approve']['level2'];
							}else{
								$mail_user = $approval_data['Approve']['level1'];
							}							
							// get superior data
							$superior_data = $this->Client->Creator->find('first', array('conditions' => array('Creator.id' => $mail_user),'fields' => array('email_id','first_name', 'last_name')));
							// make sure superior available
							if(!empty($superior_data)){
								// notify employee		
								$sub = 'Manage Hiring - Client '.$approve_msg.' by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));								
								if(!$this->send_email($sub, 'approve_client', 'noreply@managehiring.com', $position_data[0]['Creator']['email_id'],$vars)){
									// show the msg.								
									$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail for approval...', 'default', array('class' => 'alert alert-error'));				
								}else{
									$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Client '.$approve_msg.' successfully.', 'default', array('class' => 'alert alert-success'));
								}
							}
							
						}			
						
					}else{
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert-error">&times;</button>Problem in updating the status', 'default', array('class' => 'alert alert-error'));		
					}
					$this->set('form_status', '1');
					/*
					if($this->Position->save($data, array('validate' => false))){	
						$sub = 'Manage Hiring - Position '.$approve_msg.' by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
						$from = ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
							$options = array(								
									array('table' => 'req_team',
											'alias' => 'ReqTeam',					
											'type' => 'INNER',
											'conditions' => array('`ReqTeam.requirements_id` = `Position`.`id`', )
									),
									array('table' => 'users',
											'alias' => 'TeamMember',					
											'type' => 'INNER',
											'conditions' => array('`ReqTeam.users_id` = `TeamMember`.`id`', )
									)
								);
						$position_data = $this->Position->find('all', array('conditions' => array('Position.id' => $id),
						'fields' => array('Creator.email_id', 'Creator.first_name','Creator.last_name', 'Client.client_name',
						"group_concat(distinct TeamMember.first_name  SEPARATOR ', ') team_member", 'Position.job_title',
						'Position.no_job','Position.location'), 'joins' => $options));
						$vars = array('from_name' => $from, 'to_name' => ucwords($position_data[0]['Creator']['first_name'].' '.$position_data[0]['Creator']['last_name']), 'position' => $position_data[0]['Position']['job_title'],
						'client_name' => $position_data[0]['Client']['client_name'], 'no_opening' => $position_data[0]['Position']['no_job'], 'team_member' => $position_data[0][0]['team_member'],
						'location' => $position_data[0]['Position']['location'], 'remarks' => $this->request->data['Position']['remarks'], 'approve_msg' => $approve_msg);					
						if(!$this->send_email($sub, 'approve_position', 'noreply@managehiring.com', $position_data[0]['Creator']['email_id'],$vars)){
							// show the msg.								
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail for approval...', 'default', array('class' => 'alert alert-error'));				
						}else{
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Position '.$approve_msg.' successfully.', 'default', array('class' => 'alert alert-warning'));
						}
						$this->set('form_status', '1');
					}
					*/

				}
			}
			
			/*
			
			// when the form submitted
			if ($this->request->is('post') && $st != '') { 
				// set the validation
				$this->Client->set($this->request->data);
				if($is_approve == 'R'){
					$validate = $this->Client->validates(array('fieldList' => array('remarks')));
				}else{
					$validate = true;
				}
				// validates the form if rejected
				if($validate){
					if($this->Client->save($data, array('validate' => false))){
						$sub = 'Manage Hiring - Client '.$approve_msg.' by '.ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
						$from = ucfirst($this->Session->read('USER.Login.first_name')).' '.ucfirst($this->Session->read('USER.Login.last_name'));
						// get the creator data
						$creator_data = $this->Client->find('all', array('conditions' => array('Client.id' => $id), 'fields' => array('Client.client_name', 'Client.city','Creator.first_name','Creator.last_name', 'Creator.email_id')));
						// get account holder name
						$this->loadModel('ClientAccountHolder');
						$ac_holder = $this->ClientAccountHolder->find('all', array('fields' => array("group_concat(User.first_name separator ', ') account_holder"), 'order' => array('User.first_name ASC'), 'conditions' => array('ClientAccountHolder.clients_id' => $id, 'User.is_deleted' => 'N'), 'group' => array('User.id')));
						$vars = array('to_name' =>  ucwords($creator_data[0]['Creator']['first_name'].' '.$creator_data[0]['Creator']['last_name']), 'from_name' => $from, 'client_name' => $creator_data[0]['Client']['client_name'], 'city' => $creator_data[0]['Client']['city'],'account_holder' => $ac_holder[0][0]['account_holder'], 'approve_msg' => $approve_msg, 'remarks' => $this->request->data['Client']['remarks']);
						// notify superiors						
						if(!$this->send_email($sub, 'approve_client', 'noreply@managehiring.com', $creator_data[0]['Creator']['email_id'],$vars)){
							// show the msg.								
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in sending the mail for approval...', 'default', array('class' => 'alert alert-error'));				
						}else{
							$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Client '.$approve_msg.' successfully.', 'default', array('class' => 'alert alert-warning'));
						}
						$this->set('form_status', '1');
					}else{
						$this->Session->setFlash('<button type="button" class="close" data-dismiss="alert">&times;</button>Problem in saving the data.', 'default', array('class' => 'alert alert-error'));	
					}
				}else{
					// print_r($this->Client->validationErrors);
				}
			}
			*/
	?>