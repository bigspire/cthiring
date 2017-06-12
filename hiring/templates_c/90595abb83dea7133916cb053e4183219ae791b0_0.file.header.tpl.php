<?php
/* Smarty version 3.1.29, created on 2017-05-11 14:27:36
  from "/var/www/html/cthiring/hiring/templates/include/header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59142780016b59_43454609',
  'file_dependency' => 
  array (
    '90595abb83dea7133916cb053e4183219ae791b0' => 
    array (
      0 => '/var/www/html/cthiring/hiring/templates/include/header.tpl',
      1 => 1494489037,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59142780016b59_43454609 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	<title>
		<?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
	</title>
	
	   
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
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo ucfirst($_smarty_tpl->tpl_vars['user_name']->value);?>
 <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
																			<li class="divider"></li>

										<li><a href="edit_profile.php">Edit Profile</a></li>

										<li><a href="<?php echo webroot;?>
login/logout/">Log Out</a></li>
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
                                       <li class="<?php echo '<?php ';?>echo $fun->set_menu_active(array('recruiter_dashboard'));<?php echo '?>';?> dropdown">
                                            <a  href="<?php echo webroot;?>
home/" class=""><i class="icon-file icon-white"></i> Dashboard </a>
                                           <!--ul class="dropdown-menu">
                                                <li><a href="">test 1</a></li>
                                                <li><a href="">test 2</a></li>
                                              
											</ul-->
                                        </li>
										  <li class="dropdown <?php echo '<?php ';?>echo $fun->set_menu_active(array('add_client','edit_client','client','view_client','client_contact','add_client_contact','edit_client_contact'));<?php echo '?>';?>">
                                            <a data-toggle="dropdown" class="dropdown-toggle " href="#"><i class="icon-user icon-white"></i> Clients <?php if ($_smarty_tpl->tpl_vars['client_count']->value) {?><span class="label-bub label-info bubble"><?php echo $_smarty_tpl->tpl_vars['client_count']->value;?>
</span><?php }?><b class="caret"></b></a>
											  <ul class="dropdown-menu">
                                                <li><a href="<?php echo webroot;?>
client/add/">Add Client</a></li>
                                                <li><a href="<?php echo webroot;?>
client/">Search Client <?php if ($_smarty_tpl->tpl_vars['client_count']->value) {?><span class="label-bub label-info white"><?php echo $_smarty_tpl->tpl_vars['client_count']->value;?>
</span><?php }?></a></li>
												<!-- <li><a href="add_client_contact.php">Add Client Contact</a></li>-->
												<!--  <li><a href="client_contact.php">Search Client Contact</a></li>-->
                                            </ul>
                                          </li>
										  
										  <li class="<?php echo '<?php ';?>echo $fun->set_menu_active(array('position','view_position','add_position','edit_position'));<?php echo '?>';?>  dropdown">
                                            <a  data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Positions <?php if ($_smarty_tpl->tpl_vars['position_count']->value) {?><span class="label-bub label-info bubble"><?php echo $_smarty_tpl->tpl_vars['position_count']->value;?>
</span><?php }?><b class="caret"></b></a>
                                             <ul class="dropdown-menu">
                                                <li><a href="<?php echo webroot;?>
position/add/">Add Position</a></li>
                                                <li><a href="<?php echo webroot;?>
/position/">Search Position <?php if ($_smarty_tpl->tpl_vars['position_count']->value) {?><span class="label-bub label-info white"><?php echo $_smarty_tpl->tpl_vars['position_count']->value;?>
</span><?php }?></a></li>
                                            </ul>
                                        </li>
                                        <li class="<?php echo $_smarty_tpl->tpl_vars['resume_active']->value;?>
 dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th icon-white"></i> Resumes <?php if ($_smarty_tpl->tpl_vars['resume_count']->value) {?><span class="label-bub label-info bubble"><?php echo $_smarty_tpl->tpl_vars['resume_count']->value;?>
</span><?php }?><b class="caret"></b></a>
											  <ul class="dropdown-menu">
                                                <li><a href="upload_resume.php" class="iframeBox unreadLink" val="40_50">Upload Resume</a></li>
                                                <li><a href="<?php echo webroot;?>
resume/">Search Resume <?php if ($_smarty_tpl->tpl_vars['resume_count']->value) {?><span class="label-bub label-info white"><?php echo $_smarty_tpl->tpl_vars['resume_count']->value;?>
</span><?php }?></a></li>
												<!--<li><a href="upload_resume.php">Upload Resume</a></li>
												<li><a href="upload_resume.php">Upload Psychometric Test</a></li>
												<li><a href="snapshot.php">Search Snapshot</a></li>-->
                                            </ul>
                                         </li>
										 
                                         
										 
                                         <li class="<?php echo $_smarty_tpl->tpl_vars['interview_active']->value;?>
 dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Interviews <!--span class="label-bub label-info bubble"><?php echo $_smarty_tpl->tpl_vars['interview_count']->value;?>
</span--><b class="caret"></b></a>
											  <ul class="dropdown-menu">                                              
                                                <li><a href="interview.php">Search Interview <!--span class="label-bub label-info white"><?php echo $_smarty_tpl->tpl_vars['interview_count']->value;?>
</span--></a></li>
												<!--<li><a href="upload_resume.php">Upload Resume</a></li>
												<li><a href="upload_resume.php">Upload Psychometric Test</a></li>
												<li><a href="snapshot.php">Search Snapshot</a></li>-->
                                            </ul>
                                         </li>
                                      
                                        <li class="<?php echo $_smarty_tpl->tpl_vars['billings_active']->value;?>
 dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle " href="#"><i class="icon-file icon-white"></i> Billings <?php if ($_smarty_tpl->tpl_vars['approve_billing_count']->value) {?><span class="label-bub label-info white"><?php echo $_smarty_tpl->tpl_vars['approve_billing_count']->value;?>
</span><?php }?><b class="caret"></b></a>
                                           <ul class="dropdown-menu">
                                                <li><a href="incentive.php">Search Incentive</a></li>
                                                <li><a href="bonus.php">Search Bonus</a></li>
												 <li><a href="add_billing.php">Add Billing</a></li>
												 <li><a href="billing.php">Search Billing</a></li>
												 
												 <li><a href="approve_billing.php">Approve Billing <?php if ($_smarty_tpl->tpl_vars['approve_billing_count']->value) {?><span class="label-bub label-info white"><?php echo $_smarty_tpl->tpl_vars['approve_billing_count']->value;?>
</span><?php }?></a></li>
                                           
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
                                           <li class="<?php echo $_smarty_tpl->tpl_vars['mailbox_active']->value;?>
 dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th icon-white"></i> Mail Box <b class="caret"></b></a>
											  <ul class="dropdown-menu">                                              
                                                <li><a href="mailbox.php">Sent Items </a></li>
											
                                            </ul>
                                         </li>
										
										 <li class="<?php echo $_smarty_tpl->tpl_vars['setting_active']->value;?>
  dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
											<i class="icon-cog icon-white"></i> Settings <b class="caret"></b></a>
                                          <ul class="dropdown-menu">
                                                <li><a href="grade.php">Grade <span class="label-bub label-info white"><?php echo $_smarty_tpl->tpl_vars['grade_count']->value;?>
</span></a></li>
                                                <li><a href="users.php">Users <span class="label-bub label-info white"><?php echo $_smarty_tpl->tpl_vars['users_count']->value;?>
</span></a></li>
												<li><a href="roles.php">Roles [Access] <span class="label-bub label-info white">3</span></a></li>
												
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
														<li><a href="bonus_share.php">Bonus Share</a></li>														
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
<?php }
}
