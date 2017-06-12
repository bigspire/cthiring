<!-- header -->
            <header>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a class="brand" href="<?php echo $this->webroot;?>home/"> CT Hiring - ES</a>
                            <ul class="nav user_menu pull-right">
                         
						 <li class="divider-vertical hidden-phone hidden-tablet"></li>    
							<li class="hidden-phone hidden-tablet">
                                    <div class="nb_boxes clearfix">
									<?php $msgCount = $msg_count ? $msg_count : 'No';?>
                                        <a data-toggle="modal" data-backdrop="static" href="<?php echo $this->webroot;?>position/?from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>&status=5" class="label" rel="tooltip" data-placement="bottom" title="<?php echo $msgCount;?> New messages"><?php echo $msg_count;?> <i class="icon-envelope"></i></a>
                                    </div>
                                </li>
								<li class="divider-vertical hidden-phone hidden-tablet"></li>
							<?php if($syncStatus):?>
							<li  style="margin-top:10px"><span rel="preview" data-toggle="tooltip" data-content="All is well!" data-placement="bottom" title="Last Sync: <?php echo date('d', strtotime($sync_success_data[0]['Sync']['sync_time'])).$this->Functions->get_ordinal(date('d', strtotime($sync_success_data[0]['Sync']['sync_time']))).' '.date('M', strtotime($sync_success_data[0]['Sync']['sync_time'])).', '.date('h:i a', strtotime($sync_success_data[0]['Sync']['sync_time']));?>" class="label label-success">Online</span></li>
							<?php else:?>
							<li  style="margin-top:10px"><span rel="preview" data-toggle="tooltip" data-content="<?php echo $syncError;?>" data-placement="bottom" title="Last Sync: <?php echo date('d', strtotime($sync_success_data[0]['Sync']['sync_time'])).$this->Functions->get_ordinal(date('d', strtotime($sync_success_data[0]['Sync']['sync_time']))).' '.date('M', strtotime($sync_success_data[0]['Sync']['sync_time'])).', '.date('h:i a', strtotime($sync_success_data[0]['Sync']['sync_time']));?>" class="label label-important">Offline</span></li>
							<?php endif; ?>
                                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo ucwords($this->Session->read('USER.Login.first_name'));?> <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
										<li class="divider"></li>
										<li><a href="<?php echo $this->webroot;?>login/logout/">Log Out</a></li>
                                    </ul>
                                </li>
								
								<li>
								<div class="user" style="border-bottom:1px solid #efefef;">
				<div class="dropdown" style="background:#fff">
					<a href="http://career-tree.in" target="_blank" class="logo"><img style="margin-left:0" height="39" width="150" src="<?php echo $this->webroot;?>img/career-tree-logo.jpg"></a>
					
				</div>
			</div>
								</li>
								
                            </ul>
							
							<a data-target=".nav-collapse" data-toggle="collapse" class="btn_menu">
								<span class="icon-align-justify icon-white"></span>
							</a>
                            <nav>
                                <div class="nav-collapse">
                                    <ul class="nav">
                                       <li class="dropdown">
                                            <a  href="<?php echo $this->webroot;?>home/" class="<?php echo $home_menu;?>"><i class="icon-file icon-white"></i> Dashboard </a>
                                           <!--ul class="dropdown-menu">
                                                <li><a href="">test 1</a></li>
                                                <li><a href="">test 2</a></li>
                                              
											</ul-->
                                        </li>
										<li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle <?php echo $position_menu;?>" href="<?php echo $this->webroot;?>position/"><i class="icon-list-alt icon-white"></i> Positions </a>
                                            
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle <?php echo $resume_menu;?>" href="<?php echo $this->webroot;?>resume/"><i class="icon-th icon-white"></i> Resumes </a>
                                         </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle <?php echo $client_menu;?>" href="<?php echo $this->webroot;?>client/"><i class="icon-user icon-white"></i> Clients </a>
                                          </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle <?php echo $billing_menu;?>" href="<?php echo $this->webroot;?>billing/"><i class="icon-file icon-white"></i> Billings </a>
                                          
                                        </li>
										<?php if($this->Session->read('USER.Login.rights') == '5'):?>
										 <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle <?php echo $user_menu;?>" href="<?php echo $this->webroot;?>user/"><i class="icon-user icon-white"></i> Users </a>
                                          
                                        </li>
										<?php endif; ?>
										 <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle <?php echo $performance_menu;?>" href="#"><i class="icon-file icon-white"></i> Report <b class="caret"></b></a>
                                          <ul class="dropdown-menu">
                                                <li><a href="<?php echo $this->webroot;?>performance/recruiter/">Recruiter Performance</a></li>
                                                <li><a href="<?php echo $this->webroot;?>performance/account_holder/">Account Holder Performance</a></li>
												<li><a href="<?php echo $this->webroot;?>performance/location/">Location Performance</a></li>
                                                <li><a href="<?php echo $this->webroot;?>performance/client/">Clientwise Performance</a></li>
                                                <li><a href="#">Recruiter Performance(Failure Root Cause Analysis )</a></li>
												<li><a href="<?php echo $this->webroot;?>performance/revenue/">Revenue </a></li>
												<li><a href="#">TAT Time </a></li>
												<li><a href="#">Collection Table </a></li>
												<li><a href="#">Client Retention Table </a></li>
												<li><a href="#">Incentive </a></li>
												<li><a href="#">Daily Performance </a></li>
												<li><a href="#">Weekly Performance </a></li>
                                            </ul>

										 
                                        </li>
										
										 <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle <?php echo $dashboard_menu;?>" href="#"><i class="icon-file icon-white"></i> Dashboard <b class="caret"></b></a>
                                          <ul class="dropdown-menu">
                                                <li><a href="<?php echo $this->webroot;?>dashboard/recruiter/">Recruiter</a></li>
                                                <li><a href="#">Account Holder</a></li>
												
                                            </ul>

										 
                                        </li>
										
										
                                        <li>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
             </header>
            