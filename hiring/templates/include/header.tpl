<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	<title>
		{$page_title}	</title>
	
	   
	    <!-- Bootstrap framework -->
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
			

            <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="css/{$THEME}.css" id="link_theme" />            
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
			 <!-- splashy icons -->
            <link rel="stylesheet" href="img/splashy/splashy.css"  />
			
			<link rel="stylesheet" href="vendor/node_modules/bootstrap-rating/bootstrap-rating.css"  />
			

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
                            
							<a class="brand" href="{$smarty.const.webroot}home">
							 Manage Hiring </a>
							 
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
									
									<li>
							<div class="style_switcher">
								<div class="sepH_c">
									<p>Colors:</p>
									<div class="clearfix colorDiv">							
										<a href="get_theme.php?col=blue" class="style_item jQclr blue_theme"  title="blue">blue</a>
										<a href="get_theme.php?col=dark" class="style_item jQclr dark_theme"  title="dark">dark</a>
										<a href="get_theme.php?col=green" class="style_item jQclr green_theme style_active" title="green">green</a>
										<a href="get_theme.php?col=brown" class="style_item jQclr brown_theme"  title="brown">brown</a>
										<a href="get_theme.php?col=eastern_blue" class="style_item jQclr eastern_blue_theme"  title="eastern_blue">eastern blue</a>
										<a href="get_theme.php?col=tamarillo" class="style_item jQclr tamarillo_theme"  title="tamarillo">tamarillo</a>
									</div>
								</div>
							</div>
									</li>
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
										
										{if $approve_leave_count gt '0'}
											{assign col_count_leave active2}
										 {/if}
										{if $module['create_my_leaves'] eq '1' || $module['approve_my_leaves'] eq '1' || $module['view_my_leaves'] eq '1' ||
										$module['create_todays_plan'] eq '1' || $module['view_todays_plan'] eq '1'}
											<li class="{$col_count_leave} dropdown <?php echo $fun->set_menu_active(array('add_task_plan','add_leave'));?>">
                                          	 <a data-toggle="dropdown" class="dropdown-toggle " href="#"><i class="icon-list-alt icon-white"></i> Today's Plan<b class="caret"></b></a>
                                             <ul class="dropdown-menu">
											 {if $module['create_todays_plan'] eq '1'}
												<li><a href="{webroot}taskplan/add/">Add Task</a></li>
											 {/if}
											 {if $module['view_todays_plan'] eq '1'}
                                                <li><a href="{webroot}taskplan/">Search Task</a></li>
											 {/if}
											 {if $module['create_my_leaves'] eq '1'}
												<li><a href="{webroot}leave/add/">Add Leave</a></li>
											 {/if}
											 {if $module['view_my_leaves'] eq '1'}
											    <li><a href="{webroot}leave/">Search Leave</a></li>
											 {/if}
											 {if $module['approve_my_leaves'] eq '1'}
											    <li><a href="{webroot}leave/index/pending/">Approve Leave
												{if $approve_leave_count}<span class="label-bub label-info white">{$approve_leave_count}</span>{/if}</a></li>{/if}
                                            </ul>
                                        </li>
										{/if}
										
										
										{if $approve_client_count gt '0'}
											{assign col_count_client active2}
										 {/if}
										  <li class="{$col_count_client} dropdown <?php echo $fun->set_menu_active(array('add_client','edit_client','client','view_client','client_contact','add_client_contact','edit_client_contact'));?>">
                                            <a data-toggle="dropdown" class="dropdown-toggle " href="#"><i class="icon-user icon-white"></i> Clients {* if $client_count *}<!--span class="label-bub label-info bubble">{* $client_count *}</span-->{* /if *}<b class="caret"></b></a>
											  <ul class="dropdown-menu">
											  {if $module['create_client'] eq '1'}
                                                <li><a href="{webroot}client/add/">Add Client</a></li>
											  {/if}
                                               {if $module['view_client'] eq '1'}
												<li><a href="{webroot}client/">Search Client {* if $client_count *}<!--span class="label-bub label-info white">{$client_count}</span-->{* /if *}</a></li>
											    {/if}
												{if $module['approve_client'] eq '1'}
												<li><a href="{webroot}client/index/pending/">Approve Client {if $approve_client_count}<span class="label-bub label-info white">{$approve_client_count}</span>{/if}</a></li>
											    {/if}
												<!-- <li><a href="add_client_contact.php">Add Client Contact</a></li>-->
												<!--  <li><a href="client_contact.php">Search Client Contact</a></li>-->
                                            </ul>
                                          </li>
										  
										   {if $approve_position_count neq '0' || $position_count gt '0'}
											{assign col_count_position active2}
										 {/if}
										  <li class="<?php echo $fun->set_menu_active(array('position','view_position','add_position','edit_position'));?>  dropdown {$col_count_position}">
                                            <a  data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Positions {* if $position_count *}<!--span class="label-bub label-info bubble">{* $position_count *}</span-->{* /if *}<b class="caret"></b></a>
                                             <ul class="dropdown-menu">
											 {if $module['create_position'] eq '1'}
                                                <li><a href="{webroot}position/add/">Add Position</a></li>
											 {/if}
											 {if $module['view_position'] eq '1'}
                                                <li><a href="{webroot}position/">Search Position {if $position_count}<span class="label-bub label-info white">{$position_count}</span>{/if}</a></li>
											  {/if}
											  {if $module['approve_position'] eq '1'}
                                                <li><a href="{webroot}position/index/pending/">Approve Position {if $approve_position_count}<span class="label-bub label-info white">{$approve_position_count}</span>{/if}</a></li>
											  {/if}
										   </ul>
                                        </li>
										
                                        <li class="{$resume_active} dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th icon-white"></i> Resumes {* if $resume_count *}<!-- span class="label-bub label-info bubble">{$resume_count}</span-->{* /if *}<b class="caret"></b></a>
											  <ul class="dropdown-menu">
											  {if $module['create_resume'] eq '1'}
                                                <li><a href="upload_resume.php" class="iframeBox unreadLink" val="40_55">Upload Resume</a></li>
											   {/if}
											   {if $module['view_resume'] eq '1'}
												<li><a href="{webroot}resume/">Search Resume {* if $resume_count *}<!-- span class="label-bub label-info white">{$resume_count}</span-->{* /if *}</a></li>
											   {/if}
												<!--<li><a href="upload_resume.php">Upload Resume</a></li>
												<li><a href="upload_resume.php">Upload Psychometric Test</a></li>
												<li><a href="snapshot.php">Search Snapshot</a></li>-->
                                            </ul>
                                         </li>
										
                                         
										 {if $module['view_interview'] eq '1'}
                                         <li class="{$interview_active} dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Interviews <!--span class="label-bub label-info bubble">{$interview_count}</span--><b class="caret"></b></a>
											  <ul class="dropdown-menu">                                              
                                                <li><a href="interview.php">Search Interview <!-- span class="label-bub label-info white">{* $interview_count *}</span--></a></li>
												<!--<li><a href="upload_resume.php">Upload Resume</a></li>
												<li><a href="upload_resume.php">Upload Psychometric Test</a></li>
												<li><a href="snapshot.php">Search Snapshot</a></li>-->
                                            </ul>
                                         </li>
										 {/if}
										 

										
                                      {if $module['view_billing'] eq '1' || $module['view_incentive'] eq '1'}
									  
									  {if $approve_billing_count neq '0' && $module['approve_billing'] eq '1'}
											<li class="{$billings_active} dropdown active2">
											{else}
											<li class="{$billings_active} dropdown">
										 {/if}
                                        
                                            <a data-toggle="dropdown" class="dropdown-toggle " href="#"><i class="icon-file icon-white"></i> Performance Reward {* if $module['approve_billing'] eq '1' and $approve_billing_count *}<!-- span class="label-bub label-info white">{$approve_billing_count}</span>{* /if *}<b class="caret"></b--></a>
                                           <ul class="dropdown-menu">
										   {if $module['view_billing'] eq '1'}
												<li><a href="billing.php">Search Billing</a></li>
										   {/if}
										   
                                                <!--li><a href="bonus.php">Search Bonus</a></li-->
												{* if $module['add_billing'] eq '1' *}
												 <!-- li><a href="add_billing.php">Add Billing</a></li-->
												{* /if *}
												
												 {if $module['approve_billing'] eq '1'}
												 
												 {* if $approve_billing_count *}
												 <li><a href="approve_billing.php">Approve Billing {if $approve_billing_count}
												 <span class="label-bub label-info white">{$approve_billing_count}</span>{/if}</a></li>
												{* /if *} 
												{/if}
												{if $module['view_incentive'] eq '1'}
                                                <li><a href="incentive.php">Search Incentive</a></li>
										   {/if}
                                            </ul>
                                        </li>
										{/if}
										
										{if $module['recruiter_report'] eq '1' || $module['account_holder_report'] eq '1' || $module['location_report'] eq '1'
										|| $module['failure_report'] eq '1' || $module['revenue_report'] eq '1' || $module['tat_report'] eq '1'
										|| $module['collection_report'] eq '1' || $module['client_retention_report'] eq '1' || $module['incentive_report'] eq '1'
										|| $module['daily_report'] eq '1' || $module['weekly_report'] eq '1'}
										<li class="dropdown {$report_menu}">
                                            <a data-toggle="dropdown" class="dropdown-toggle " href="#"><i class="icon-download-alt icon-white"></i> Reports <b class="caret"></b></a>
                                          <ul class="dropdown-menu">
										  
										  
										  <li><a href="openings_handled_1a.php">CTC Wise Monthly Openings Handled</a></li>
										  
										  
										  
											{if $module['recruiter_report'] eq '1'}
                                                <li><a href="recruiter_performance.php">Recruiter Performance</a></li>
											{/if}
										  
											{if $module['account_holder_report'] eq '1'}
                                                <li><a href="ah_performance.php">Account Holder Performance</a></li>
										    {/if}
											
											{if $module['location_report'] eq '1'}
											<li><a href="location_performance.php">Location Performance</a></li>
                                               <!-- <li><a href="#">Clientwise Performance</a></li>-->
											{/if}
											
											{if $module['failure_report'] eq '1'}
											   <li><a href="#">Recruiter Performance(Failure Root Cause Analysis )</a></li>
											{/if}
											
											
											{if $module['revenue_report'] eq '1'}
												<li><a href="#">Revenue</a></li>
											{/if}
											
											{if $module['tat_report'] eq '1'}
												<li><a href="#">TAT Time </a></li>
											{/if}
											
											{if $module['collection_report'] eq '1'}
												<li><a href="collection_table.php">Collection Table </a></li>
											{/if}
											
											{if $module['client_retention_report'] eq '1'}
												<li><a href="client_retention.php">Client Retention Table </a></li>
											{/if}
											
											{if $module['incentive_report'] eq '1'}
												<li><a href="incentive_report.php">Incentive </a></li>
											{/if}
											
											{if $module['daily_report'] eq '1'}
												<li><a href="daily_performance.php">Daily Performance </a></li>
											{/if}
											
											{if $module['weekly_report'] eq '1'}
												<li><a href="weekly_performance.php">Weekly Performance </a></li>
											{/if}
                                            </ul>
										</li>
                                        {/if}

										{if $module['sent_item'] eq '1'}
										<li class="{$mailbox_active} dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th icon-white"></i> Mail Box <b class="caret"></b></a>
											  <ul class="dropdown-menu">                                              
                                                <li><a href="mailbox.php">Sent Items </a></li>
											
                                            </ul>
                                        </li>
										{/if}
										
										{if $module['manage_grade'] eq '1' || $module['manage_users'] eq '1' || $module['manage_role'] eq '1' || $module['manage_mailer_template'] eq '1'|| $module['manage_incentive'] eq '1'}
										
										<li class="{$setting_active}  dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
											<i class="icon-cog icon-white"></i> Settings <b class="caret"></b></a>
                                          <ul class="dropdown-menu">
										  {if $module['manage_qualification'] eq '1'}
                                           <li class="dropdown">
													<a href="#">Qualification <b class="caret-right"></b></a>
													<ul class="dropdown-menu">
														<li><a href="degree.php">Degree</a></li>
														<li><a href="specialization.php">Specialization</a></li>													
													</ul>
												</li>
											{/if}
										  {if $module['manage_contact_branch'] eq '1'}
	
												<li><a href="contact_branch.php">Branch</a></li>
											{/if}
											
											{if $module['manage_designation'] eq '1'}
	
												<li><a href="designation.php">Designation </a></li>
											{/if}
											
											{if $module['manage_functional_area'] eq '1'}
	
												<li><a href="functional_area.php">Functional Area</a></li>
											{/if}
											
											{if $module['api_keys'] eq '1'}
											<li><a href="view_resume_api.php">Resume API</a></li>
											{/if}
											
											{if $module['manage_grade'] eq '1'}
                                                <li><a href="grade.php">Grade {* if $grade_count *}<!-- span class="label-bub label-info white">{$grade_count}</span-->{* /if *}</a></li>
											{/if}
											{if $module['manage_users'] eq '1'}
                                                <li><a href="users.php">Users {* if $users_count *}<!--span class="label-bub label-info white">{$users_count}</span-->{* /if *}</a></li>
											{/if}											
											{if $module['manage_role'] eq '1'}
	
												<li><a href="roles.php">Roles [Access] {* if $roles_count *}<!--pan class="label-bub label-info white">{$roles_count}</span-->{* /if *}</a></li>
											{/if}
											
											{if $module['manage_mailer_template'] eq '1'}
												<li class="dropdown">
													<a href="#">Mailer Templates <b class="caret-right"></b></a>
													<ul class="dropdown-menu">
														<li><a href="mailer_template.php?id=1">Send CV to Client</a></li>
														<li><a href="mailer_template.php?id=2">Interview Confirmation to Client</a></li>
														<li><a href="mailer_template.php?id=3">Schedule Interview to Candidates</a></li>														
													</ul>
												</li>
											{/if}
											
											{if $module['manage_incentive'] eq '1'}
                                           <li class="dropdown">
													<a href="#">Incentive <b class="caret-right"></b></a>
													<ul class="dropdown-menu">
														<!--li><a href="base_target.php">Base Target</a></li-->
														<li><a href="eligibility.php">Eligibility</a></li>
														<li><a href="sharing_criteria.php">Sharing Criteria</a></li>	
														<!--li><a href="holidays.php">Holidays</a></li-->
														<li><a href="salary.php">Salary</a></li>
														<li><a href="holidays.php">Holidays</a></li>
														<!--li><a href="bonus_share.php">Bonus Share</a></li-->														
													</ul>
												</li>
											{/if}
											
											

                                            </ul>
                                        </li>
										{/if}
										
										
                                        <li>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
             </header>            
