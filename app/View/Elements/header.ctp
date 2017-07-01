<header>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            
							<a class="brand" href="<?php echo $this->webroot;?>home/">
							 CT Hiring</a>
                            <ul class="nav user_menu pull-right">
                         
						 <!--li class="divider-vertical hidden-phone hidden-tablet"></li>    
							<li class="hidden-phone hidden-tablet">
                                    <div class="nb_boxes clearfix">
									   <a data-toggle="modal" data-backdrop="static" href="#" class="label" rel="tooltip" data-placement="bottom" title="No New Send messages"> <i class="icon-envelope"></i></a>
                                    </div>
                                </li-->
								<li class="divider-vertical hidden-phone hidden-tablet"></li>
														<!--<li  style="margin-top:5px"><span rel="preview" data-toggle="tooltip" data-content="All is well!" data-placement="bottom" title="Last Sync: 15th Dec, 11:09 am" class="label label-success">Online</span></li>-->
							                                <!--<li class="divider-vertical hidden-phone hidden-tablet"></li>-->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->Session->read('USER.Login.first_name');?> <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
																			<li class="divider"></li>

										<li><a href="<?php echo $this->webroot;?>hiring/view_profile.php">View Profile</a></li>

										<li><a href="<?php echo $this->webroot;?>login/logout/">Log Out</a></li>
                                    </ul>
                                </li>
								
								<li>
								<div class="user" style="border-bottom:1px solid #efefef;">
				<div class="dropdown" style="background:#fff">
					<!--<a href="http://career-tree.in" target="_blank" class="logo"><img style="margin-left:0" height="39" width="150" src="img/career-tree-logo.jpg"></a>
					-->
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
                                       <li class="dropdown <?php echo $home_menu ?>">
                                            <a  href="<?php echo $this->webroot;?>home/"><i class="icon-file icon-white"></i> Dashboard </a>
                                           <!--ul class="dropdown-menu">
                                                <li><a href="">test 1</a></li>
                                                <li><a href="">test 2</a></li>
                                              
											</ul-->
                                        </li>
										  <li class="dropdown <?php echo $client_menu ?>">
                                            <a data-toggle="dropdown" class="dropdown-toggle " href="#"><i class="icon-user icon-white"></i> Clients <!--span class="label-bub label-info bubble">1</span--><b class="caret"></b></a>
											  <ul class="dropdown-menu">
											  <?php if($create_client == '1'):?>
                                                <li><a href="<?php echo $this->webroot;?>client/add/">Add Client</a></li>
											  <?php endif; ?>
											   <?php if($view_client == '1'):?>
                                                <li><a href="<?php echo $this->webroot;?>client/">Search Client <!--span class="label-bub label-info white">1</span--></a></li>
												 <?php endif; ?>
												<!-- <li><a href="add_client_contact.php">Add Client Contact</a></li>-->
												<!--  <li><a href="client_contact.php">Search Client Contact</a></li>-->
                                            </ul>
                                          </li>
										  
										  <li class="dropdown <?php echo $position_menu ?>">
                                            <a  data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Positions <!--span class="label-bub label-info bubble">14</span--><b class="caret"></b></a>
                                             <ul class="dropdown-menu">
                                                 <?php if($create_position == '1'):?>
												 <li><a href="<?php echo $this->webroot;?>position/add/">Add Position</a></li>
												  <?php endif; ?>
												  <?php if($view_position == '1'):?> 
                                                <li><a href="<?php echo $this->webroot;?>position/">Search Position <!--span class="label-bub label-info white">14</span--></a></a></li>
												 <?php endif; ?>
                                            </ul>
                                        </li>
										
                                        <li class="dropdown <?php echo $resume_menu ?>">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th icon-white"></i> Resumes <!--span class="label-bub label-info bubble"></span--><b class="caret"></b></a>
											  <ul class="dropdown-menu">
											   <?php if($create_resume == '1'):?>
                                                <li><a href="<?php echo $this->webroot;?>hiring/upload_resume.php" class="iframeBox unreadLink" val="40_50">Upload Resume</a></li>
												 <?php endif; ?>
												 <?php if($view_resume == '1'):?>
                                                <li><a href="<?php echo $this->webroot;?>resume/">Search Resume <!--span class="label-bub label-info white">13453</span--></a></li>
												 <?php endif; ?>
												<!--<li><a href="upload_resume.php">Upload Resume</a></li>
												<li><a href="upload_resume.php">Upload Psychometric Test</a></li>
												<li><a href="snapshot.php">Search Snapshot</a></li>-->
                                            </ul>
                                         </li>
										 
                                         
										<?php if($view_interview == '1'):?> 
                                         <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Interviews <!--span class="label-bub label-info bubble">14</span--><b class="caret"></b></a>
											  <ul class="dropdown-menu">                                              
                                                <li><a href="<?php echo $this->webroot;?>hiring/interview.php">Search Interview <!--span class="label-bub label-info white">14</span--></a></li>
												<!--<li><a href="upload_resume.php">Upload Resume</a></li>
												<li><a href="upload_resume.php">Upload Psychometric Test</a></li>
												<li><a href="snapshot.php">Search Snapshot</a></li>-->
                                            </ul>
                                         </li>
                                       <?php endif; ?>
									   
									   
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle " href="#"><i class="icon-file icon-white"></i> Incentive <b class="caret"></b></a>
                                           <ul class="dropdown-menu">
										   <?php if($view_billing == '1'):?> 
										   
													
                                                <li><a href="<?php echo $this->webroot;?>hiring/billing.php">Search Billing</a></li>
												
												
											<?php endif; ?>
											
											<?php if($view_incentive == '1'):?> 
												 <li><a href="<?php echo $this->webroot;?>hiring/incentive.php">Search Incentive</a></li>
											<?php endif; ?>
											
												 <!--li><a href="<?php echo $this->webroot;?>hiring/add_billing.php">Add Billing</a></li>
												 <li><a href="<?php echo $this->webroot;?>hiring/billing.php">Search Billing</a></li>
												 <li><a href="<?php echo $this->webroot;?>hiring/approve_billing.php">Approve Billing <!--span class="label-bub label-info white">20</span></a></li-->
                                            </ul>
                                        </li>
	

	 <?php if($recruiter_report == '1' || $account_holder_report == '1' || $location_report == '1' || $failure_report == '1'
|| 	$revenue_report == '1' || $tat_report == '1' || $collection_report == '1' || $client_retention_report == '1' || $incentive_report == '1'
|| $incentive_report == '1' || $daily_report == '1' || $weekly_report == '1'):?> 
										 <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle " href="#"><i class="icon-download-alt icon-white"></i> Reports <b class="caret"></b></a>
                                          <ul class="dropdown-menu">
										    <?php if($recruiter_report == '1'):?> 
                                                <li><a href="recruiter_performance.php">Recruiter Performance</a></li>
											<?php endif; ?>	
											 <?php if($account_holder_report == '1'):?> 
                                                <li><a href="ah_performance.php">Account Holder Performance</a></li>
													<?php endif; ?>	
												 <?php if($location_report == '1'):?> 
												<li><a href="location_performance.php">Location Performance</a></li>
													<?php endif; ?>	
                                               <!-- <li><a href="#">Clientwise Performance</a></li>-->
											    <?php if($failure_report == '1'):?> 
                                                <li><a href="#">Recruiter Performance(Failure Root Cause Analysis )</a></li>
													<?php endif; ?>	
												 <?php if($revenue_report == '1'):?> 
												<li><a href="revenue.php">Revenue </a></li>
													<?php endif; ?>	
												 <?php if($tat_report == '1'):?> 
												<li><a href="tat_time.php">TAT Time </a></li>
													<?php endif; ?>	
												 <?php if($collection_report == '1'):?> 
												<li><a href="collection_table.php">Collection Table </a></li>
													<?php endif; ?>	
												 <?php if($client_retention_report == '1'):?> 
												<li><a href="client_retention.php">Client Retention Table </a></li>
													<?php endif; ?>	
												 <?php if($incentive_report == '1'):?> 
												<li><a href="incentive_report.php">Incentive </a></li>
													<?php endif; ?>	
												 <?php if($daily_report == '1'):?> 
												<li><a href="daily_performance.php">Daily Performance </a></li>
													<?php endif; ?>	
												 <?php if($weekly_report == '1'):?> 
												<li><a href="weekly_performance.php">Weekly Performance </a></li>
													<?php endif; ?>	
												
                                            </ul>

										 
                                        </li>
										
						<?php endif; ?>
                                           <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th icon-white"></i> Mail Box <b class="caret"></b></a>
											  <ul class="dropdown-menu">                                              
                                                <li><a href="<?php echo $this->webroot;?>hiring/mailbox.php">Sent Items</a></li>
											
                                            </ul>
                                         </li>
										
									  <?php if($manage_grade == '1' || $manage_users == '1' || $manage_roles == '1' || $manage_mailer_template == '1'
									  || $manage_incentive == '1'):?> 	
										 <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
											<i class="icon-cog icon-white"></i> Settings <b class="caret"></b></a>
                                          <ul class="dropdown-menu">
										   <?php if($manage_grade == '1'):?> 
                                                <li><a href="<?php echo $this->webroot;?>hiring/grade.php">Grade <!--span class="label-bub label-info white">102</span--></a></li>
												<?php endif; ?>	
                                             <?php if($manage_users == '1'):?>    
											   <li><a href="<?php echo $this->webroot;?>hiring/users.php">Users <!--span class="label-bub label-info white">14</span--></a></li>
											   <?php endif; ?>	
											 <?php if($manage_roles == '1'):?> 	
												<li><a href="<?php echo $this->webroot;?>hiring/roles.php">Roles [Access] <!--span class="label-bub label-info white">3</span--></a></li>
												<?php endif; ?>	
											 <?php if($manage_mailer_template == '1'):?> 	
												<li class="dropdown">
													<a href="#">Mailer Templates <b class="caret-right"></b></a>
													<ul class="dropdown-menu">
														<li><a href="<?php echo $this->webroot;?>hiring/mailer_template.php?id=1">Send CV to Client</a></li>
														<li><a href="<?php echo $this->webroot;?>hiring/mailer_template.php?id=2">Interview Confirmation to Client</a></li>
														<li><a href="<?php echo $this->webroot;?>hiring/mailer_template.php?id=3">Schedule Interview to Candidates</a></li>														
													</ul>
												</li>
												<?php endif; ?>	
											 <?php if($manage_incentive == '1'):?> 	
                                           <li class="dropdown">
													<a href="#">Incentive <b class="caret-right"></b></a>
													<ul class="dropdown-menu">
														<li><a href="<?php echo $this->webroot;?>hiring/base_target.php">Base Target</a></li>
														<li><a href="<?php echo $this->webroot;?>hiring/eligibility.php">Eligibility</a></li>
														<li><a href="<?php echo $this->webroot;?>hiring/sharing_criteria.php">Sharing Criteria</a></li>	
														<li><a href="<?php echo $this->webroot;?>hiring/bonus_share.php">Bonus Share</a></li>														
													</ul>
												</li>
												<?php endif; ?>	
                                            </ul>

										 
                                        </li>
										 <?php endif; ?>
										
                                        <li>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
             </header>            
