<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	<title>
		{$page_title}	</title>
	
	   
	    <!-- Bootstrap framework -->
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="css/blue.css" id="link_theme" />            
        <!-- main styles -->
            <link rel="stylesheet" href="css/style.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="lib_cthiring/qtip2/jquery.qtip.min.css" />

		   <!-- tag handler -->
            <link rel="stylesheet" href="lib_cthiring/tag_handler/css/jquery.taghandler.css" />

            
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
			<link rel="stylesheet" media="screen" href="css/datepicker/datepicker.css">	
			
			<link type="text/css" media="screen" href="css/jquery.autocomplete.css" rel="stylesheet" />
			<link rel="stylesheet" href="css/gritter/jquery.gritter.css">
			<!-- smoke_js -->
            <link rel="stylesheet" href="css/smoke.css" />
						<!-- colorbox -->
	<link rel="stylesheet" href="css/colorbox/colorbox.css">
	<link rel="stylesheet" href="lib_cthiring/chosen/chosen.css" type="text/css">
		<link rel="stylesheet" href="lib_cthiring/multisel/multi-select.css" type="text/css">
	  <!-- breadcrumbs-->
            <link rel="stylesheet" href="lib_cthiring/jBreadcrumbs/css/BreadCrumb.css" />
	
</head>
<body  class="menu_hover">
	<div id="container">
		<div id="content">
			<div id="maincontainer" class="clearfix">
				
<!-- header -->
            <header>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            
							<a class="brand" href="recruiter_dashboard.php">
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
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{ucfirst($user_name)} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
																			<li class="divider"></li>

										<li><a href="view_profile.php">View Profile</a></li>

										<li><a href="{webroot}login/logout/">Log Out</a></li>
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
                                       <li class="<?php echo $fun->set_menu_active(array('recruiter_dashboard'));?> dropdown">
                                            <a  href="{webroot}home/" class=""><i class="icon-file icon-white"></i> Dashboard </a>
                                           <!--ul class="dropdown-menu">
                                                <li><a href="">test 1</a></li>
                                                <li><a href="">test 2</a></li>
                                              
											</ul-->
                                        </li>
										  <li class="dropdown <?php echo $fun->set_menu_active(array('add_client','edit_client','client','view_client','client_contact','add_client_contact','edit_client_contact'));?>">
                                            <a data-toggle="dropdown" class="dropdown-toggle " href="#"><i class="icon-user icon-white"></i> Clients {* if $client_count *}<!--span class="label-bub label-info bubble">{* $client_count *}</span-->{* /if *}<b class="caret"></b></a>
											  <ul class="dropdown-menu">
                                                <li><a href="{webroot}client/add/">Add Client</a></li>
                                                <li><a href="{webroot}client/">Search Client {* if $client_count *}<!-- span class="label-bub label-info white">{* $client_count *}</span-->{* /if *}</a></li>
												<!-- <li><a href="add_client_contact.php">Add Client Contact</a></li>-->
												<!--  <li><a href="client_contact.php">Search Client Contact</a></li>-->
                                            </ul>
                                          </li>
										  
										  <li class="<?php echo $fun->set_menu_active(array('position','view_position','add_position','edit_position'));?>  dropdown">
                                            <a  data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Positions {* if $position_count *}<!--span class="label-bub label-info bubble">{* $position_count *}</span-->{* /if *}<b class="caret"></b></a>
                                             <ul class="dropdown-menu">
                                                <li><a href="{webroot}position/add/">Add Position</a></li>
                                                <li><a href="{webroot}/position/">Search Position {* if $position_count *}<!-- span class="label-bub label-info white">{* $position_count *}</span-->{* /if *}</a></li>
                                            </ul>
                                        </li>
                                        <li class="{$resume_active} dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th icon-white"></i> Resumes {* if $resume_count *}<!-- span class="label-bub label-info bubble">{$resume_count}</span-->{* /if *}<b class="caret"></b></a>
											  <ul class="dropdown-menu">
                                                <li><a href="upload_resume.php" class="iframeBox unreadLink" val="40_55">Upload Resume</a></li>
                                                <li><a href="{webroot}resume/">Search Resume {* if $resume_count *}<!-- span class="label-bub label-info white">{$resume_count}</span-->{* /if *}</a></li>
												<!--<li><a href="upload_resume.php">Upload Resume</a></li>
												<li><a href="upload_resume.php">Upload Psychometric Test</a></li>
												<li><a href="snapshot.php">Search Snapshot</a></li>-->
                                            </ul>
                                         </li>
										 
                                         
										 
                                         <li class="{$interview_active} dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Interviews <!--span class="label-bub label-info bubble">{$interview_count}</span--><b class="caret"></b></a>
											  <ul class="dropdown-menu">                                              
                                                <li><a href="interview.php">Search Interview <!-- span class="label-bub label-info white">{* $interview_count *}</span--></a></li>
												<!--<li><a href="upload_resume.php">Upload Resume</a></li>
												<li><a href="upload_resume.php">Upload Psychometric Test</a></li>
												<li><a href="snapshot.php">Search Snapshot</a></li>-->
                                            </ul>
                                         </li>
                                      
                                        <li class="{$billings_active} dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle " href="#"><i class="icon-file icon-white"></i> Incentive <!--span class="label-bub label-info white"></span--><b class="caret"></b></a>
                                           <ul class="dropdown-menu">
												<li><a href="billing.php">Search Billing</a></li>
                                                <li><a href="incentive.php">Generate Incentive</a></li>
                                                <!--li><a href="bonus.php">Search Bonus</a></li-->
												 <!--li><a href="add_billing.php">Add Billing</a></li -->
												 
												 {* if $approve_billing_count *}
												 <!--li><a href="approve_billing.php">Approve Billing {if $approve_billing_count}
												 <span class="label-bub label-info white">{$approve_billing_count}</span>{/if}</a></li-->
                                      {* /if *}     
                                            </ul>
                                        </li>
										
										 <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle " href="#"><i class="icon-download-alt icon-white"></i> Reports <b class="caret"></b></a>
                                          <ul class="dropdown-menu">
                                                <li><a href="recruiter_performance.php">Recruiter Performance</a></li>
                                                <li><a href="ah_performance.php">Account Holder Performance</a></li>
												<li><a href="location_performance.php">Location Performance</a></li>
                                               <!-- <li><a href="#">Clientwise Performance</a></li>-->
                                                <li><a href="#">Recruiter Performance(Failure Root Cause Analysis )</a></li>
												<li><a href="revenue.php">Revenue </a></li>
												<li><a href="tat_time.php">TAT Time </a></li>
												<li><a href="collection_table.php">Collection Table </a></li>
												<li><a href="client_retention.php">Client Retention Table </a></li>
												<li><a href="incentive_report.php">Incentive </a></li>
												<li><a href="daily_performance.php">Daily Performance </a></li>
												<li><a href="weekly_performance.php">Weekly Performance </a></li>
                                            </ul>

										 
                                        </li>
                                           <li class="{$mailbox_active} dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th icon-white"></i> Mail Box <b class="caret"></b></a>
											  <ul class="dropdown-menu">                                              
                                                <li><a href="mailbox.php">Sent Items </a></li>
											
                                            </ul>
                                         </li>
										
										 <li class="{$setting_active}  dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
											<i class="icon-cog icon-white"></i> Settings <b class="caret"></b></a>
                                          <ul class="dropdown-menu">
											{if $module['manage_grade'] eq '1'}
                                                <li><a href="grade.php">Grade {if $grade_count}<span class="label-bub label-info white">{$grade_count}</span>{/if}</a></li>
											{/if}
                                                <li><a href="users.php">Users {if $users_count}<span class="label-bub label-info white">{$users_count}</span>{/if}</a></li>
																						
											{if $module['manage_role'] eq '1'}
	
												<li><a href="roles.php">Roles [Access] {if $roles_count}<span class="label-bub label-info white">{$roles_count}</span>{/if}</a></li>
											{/if}
												<li class="dropdown">
													<a href="#">Mailer Templates <b class="caret-right"></b></a>
													<ul class="dropdown-menu">
														<li><a href="mailer_template.php?id=1">Send CV to Client</a></li>
														<li><a href="mailer_template.php?id=2">Interview Confirmation to Client</a></li>
														<li><a href="mailer_template.php?id=3">Schedule Interview to Candidates</a></li>														
													</ul>
												</li>
                                           <li class="dropdown">
													<a href="#">Incentive <b class="caret-right"></b></a>
													<ul class="dropdown-menu">
														<li><a href="base_target.php">Base Target</a></li>
														<li><a href="eligibility.php">Eligibility</a></li>
														<li><a href="sharing_criteria.php">Sharing Criteria</a></li>	
														<!--li><a href="bonus_share.php">Bonus Share</a></li-->														
													</ul>
												</li>
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
