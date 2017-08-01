<div id="maincontainer" class="clearfix">
			<?php echo $this->element('header');?>
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
			
					
					<div class="row-fluid">
					
						 <div class="span12">

 <nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="<?php echo $this->webroot;?>home/"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot;?>position/">Positions</a>
                                </li>
                            
                                <li>
                                   <?php echo $position_data['Position']['job_title'];?>
                                </li>
                            </ul>
                        </div>
                    </nav>
					
					<div class="srch_buttons">
				<?php if($this->Session->read('USER.Login.id') == $position_data['Position']['created_by'] && $position_data['Position']['is_approve'] == 'A'):?>	
				<a rel="tooltip jsRedirect" title="Edit the Position Info." href="<?php echo $this->webroot;?>position/edit/<?php echo $this->request->params['pass'][0];?>" class="sepV_a" title="Edit Position">
				<input value="Edit" type="button" class="btn btn-info"></a>
				<?php endif; ?>	
					
					<!--<a href="#"  class="sepV_a" title="Delete Position">
					<input value="Delete" type="button" class="btn btn-danger"/></a>-->
					
					<?php if($create_resume == '1' && $position_data['Position']['is_approve'] == 'A'):?>
					<a rel="tooltip"  title="Upload New Resume" href="<?php echo $this->webroot;?>hiring/upload_resume.php?client_id=<?php echo $position_data['Client']['id'];?>&req_id=<?php echo $this->request->params['pass'][0];?>"
					 val="40_50"  class="iframeBox sepV_a cboxElement">
					<input value="Upload Resume" type="button" class="btn btn-warning"></a>					
						<?php endif; ?>

						</div>
							
							
							
							
							
								<div class="row-fluid">
							<div class="span12">
							<div class="mbox">
							<div class="tabbable">
							<div class="heading">
										<ul class="nav nav-tabs">
										<li class="active"><a class="restabChange" rel="position"  href="#mbox_basic" data-toggle="tab"><i class="splashy-document_a4_edit"></i>  Basic </a></li>
										<li class=""><a class="restabChange" rel="interview"  href="#mbox_description" data-toggle="tab"><i class="splashy-document_a4_add"></i>  Job Description </a></li>
										<!--li class=""><a class="restabChange" rel="interview"  href="#mbox_co-ordination" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Co-ordination </a></li-->
									</ul>
										
								</div>
							
							
							<div class="tab-content"  style="overflow:auto;max-height:300px;">
										<div class="tab-pane active" id="mbox_basic">
										<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0">
								<tbody>
									<tr>
										
										<td width="120" class="tbl_column">Client Name</td>
										<td><?php echo $position_data['Client']['client_name'];?></td>
											
									</tr>
									<tr>
										
										<td width="120" class="tbl_column">SPOC Name</td>
										<td><?php echo $position_data['Contact']['first_name'];?>, 
										<?php echo $position_data['Contact']['email'];?>. 
										<?php											
											echo $position_data['Contact']['phone'];?>
										<?php 
											if(str_replace(' ', '', $position_data['Contact']['mobile']) != '' && str_replace(' ', '', $position_data['Contact']['phone']) != ''):
											echo ', ';
											endif;
										?>
										<?php echo $position_data['Contact']['mobile'];?>
										
										</td>
											
									</tr>
									<tr>
										
										<td width="120" class="tbl_column">Job Title</td>
										<td><?php echo $position_data['Position']['job_title'];?></td>
											
									</tr>
									<tr>
										
										<td width="120" class="tbl_column">Job Location </td>
										<td><?php echo $position_data['Position']['location'];?></td>
											
									</tr>
									<tr>
										
										<td width="120" class="tbl_column">Experience</td>
										<td><?php echo $position_data['Position']['min_exp'].' - '.$position_data['Position']['max_exp'];?> Years</td>
											
									</tr>
										<tr>
										
										<td class="tbl_column">CTC</td>
										<td><?php echo $position_data['Position']['ctc_from'].' - '.$position_data['Position']['ctc_to'];?> Lacs</td>
											
									</tr>
									<tr>
										
										<td class="tbl_column">Qualification </td>
										<td><?php echo $position_data['Position']['education'];?></td>
											
									</tr>	
									
									<tr>
										
										<td class="tbl_column">Created On</td>
										<td><?php echo $this->Functions->format_date($position_data['Position']['created_date']);?></td>
											
									</tr>
									
									
<tr>
										
										<td class="tbl_column">Created By</td>
										<td><?php echo $position_data['Creator']['first_name'];?></td>
											
									</tr>
								
				<tr>
										
										<td class="tbl_column">Status</td>
										<td>	
										
										<span rel="tooltip" title="Requirement Status: <?php echo $position_data['ReqStatus']['title'];?> " class="label label-<?php echo $this->Functions->get_req_status_color($position_data['ReqStatus']['title']);?>"><?php echo $position_data['ReqStatus']['title'];?></span>	
</td>
											
									</tr>
									
	
								</tbody>
							</table>
							</div>
							
								<div class="span6">
							<table class="table  table-striped  table-bordered dataTable" style="margin-bottom:0">
								<tbody>									
									<tr>
										
										<td class="tbl_column">Account Holder </td>
										<td><?php echo $position_data[0]['ac_holder'];?></td>
											
									</tr>
									
									<tr>
										
										<td class="tbl_column" style="width:140px;">Key Skills</td>
										<td><?php echo $position_data['Position']['skills'];?></td>
											
									</tr>
									
										<tr>
										
										<td class="tbl_column" style="width:140px;">Job Code</td>
										<td><?php echo $position_data['Position']['job_code'];?></td>
											
									</tr>
									
									
									<tr>
										
										<td class="tbl_column">No. of Openings</td>
										<td><?php echo $position_data['Position']['no_job'];?></td>
											
									</tr>
									
										<tr>
										
										<td class="tbl_column">Team Members</td>
										<td><?php echo $position_data[0]['team_member2'];?></td>
											
									</tr>
									<tr>
										
										<td class="tbl_column">Start Date</td>
										<td><?php echo $this->Functions->format_date($position_data['Position']['start_date']);?></td>
											
									</tr>
										<tr>
										
										<td class="tbl_column">Closure Date</td>
										<td><?php echo $this->Functions->format_date($position_data['Position']['end_date']);?></td>
											
									</tr>
									<tr>
										
										<td class="tbl_column">Functional Area</td>
										<td><?php echo $position_data['FunctionArea']['function'];?></td>
											
									</tr>
									
										<tr>
										
										<td class="tbl_column">Modified On</td>
										<td><?php echo $this->Functions->format_date($position_data['Position']['created_date']);?></td>
											
									</tr>
									
									
								</tbody>
							</table>
							</div>
							</div>
									
						<div class="tab-pane" id="mbox_description">
										
						<div class="span12">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0">
								<tbody>
									<tr>
										<td  class="tbl_column"width="120">Job Description</td>
										<td>
									<?php echo $position_data['Position']['job_desc'];?>	
										

			<br></td>
									</tr>
									<tr>
								<td width="120" class="tbl_column">Attachment </td>
									<td>
										<a class="notify" data-notify-time = '7000' data-notify-title="In Progress!"
										data-notify-message="Downloading JD... Please wait..."   
										href="<?php echo $this->webroot;?>hc/download/<?php echo $position_data['Position']['id']; ?>/jd/">
										Download</a>
									</td>
								</tr>
								</tbody>
							</table>
							</div>
							</div>
				
                      </div>
					  
					  
                      </div>  
					</div>
					
					
					
					
				
					
					
					
					</div></div>
			<?php if($position_data['Position']['is_approve'] == 'W'  && $this->Session->read('USER.Login.roles_id') == '39'):?>

							<div class="form-actions">
<a class="iframeBox unreadLink" rel="tooltip" title="Approve Position" href="<?php echo $this->webroot;?>position/remark/approve/<?php echo $position_data['Position']['id'];?>" val="40_50"><input type="button" value="Approve" class="btn btn btn-success"/></a>
<a class="iframeBox unreadLink" rel="tooltip" title="Reject Position" href="<?php echo $this->webroot;?>position/remark/reject/<?php echo $position_data['Position']['id'];?>" val="40_50"><input type="button" value="Reject" class="btn btn btn-danger"/></a>
<a href="<?php echo $this->webroot;?>position/index/pending/" rel="tooltip" title="Cancel and Back to Positions"  class="jsRedirect"><button class="btn">Cancel</button></a>


						
					</div>
						<?php endif; ?>

					
					<?php echo $this->Form->create('Position', array('id' => 'formID','class' => 'formID')); ?>
			
					
				
							<br>	
							<div class="dn dataTables_filter srchBox"  id="dt_gal_filter">
							
					<label style="margin-left:0">Keyword: <input type="text" placeholder="Search Keywords Here.." name="data[Position][keyword]" id = "SearchText" value="<?php echo $this->params->query['keyword'];?>" class="input-large" aria-controls="dt_gal"></label>
							
							<span id="sandbox-container">
						<span  class="input-daterange" id="datepicker">	
							<label>From Date: <input placeholder="dd/mm/yyyy" type="text" class="input-small" name="data[Position][from]" value="<?php echo $this->request->query['from'];?>" aria-controls="dt_gal"></label>

							<label>To Date: <input  placeholder="dd/mm/yyyy" type="text" name="data[Position][to]" value="<?php echo $this->request->query['to'];?>" class="input-small" aria-controls="dt_gal"></label>

						</span>	
						</span>	
							
		<label>Current Status: 
						<?php echo $this->Form->input('status', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-small', 'empty' => 'Select', 'selected' => $this->params->query['status'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $stList)); ?> 
</label>
							
							
						
			
			<?php if($approveUser):?>
							<label>Employee: 
						<?php echo $this->Form->input('emp_id', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 'selected' => $this->params->query['emp_id'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $empList)); ?> 					
							</label>
						<?php endif; ?>
						
						<?php if($this->Session->read('USER.Login.roles_id') == '33' || $this->Session->read('USER.Login.roles_id') == '38'):?>	
							<label>
							Branch: 
							<?php echo $this->Form->input('loc', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 'selected' => $this->params->query['loc'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $locList)); ?> 
							</label>
						<?php endif; ?>
							</label>						
						
															
													
				<label style="margin-top:18px;">
							<input type="submit" value="Submit" class="btn btn-gebo" /></label>
					
						</div>
			
		</form>

		</div>
			


									
					<?php if($position_data['Position']['is_approve'] == 'A'):?>	
				
					  <div class="row-fluid">
						<div class="span12">
						
															<?php echo $this->Session->flash();?>

															
															
							<div class="mbox">
							
								<div class="tabbable">
									<div class="heading">
									
									<ul class="nav nav-tabs">
										<?php $sent_count =  $this->Functions->get_req_tab_count_new($resume_data, 'Validation - Account Holder|Validation - Recruiter','cv_sent');?>
										<?php // $cv_sent =  $this->Functions->get_req_tab_count_new($resume_data, 'CV-Sent', 'cv_sent');?>

										<?php $total = count($resume_data);?>
										<li class="active uploadTab"><a href="#mbox_inbox" class="tabChange" val="<?php echo $total;?>" rel="upload_row"  data-toggle="tab"><i class="splashy-box_add"></i>  CV Uploaded <?php if($total):?><span class="label label-info"> <?php echo $total;?></span><?php endif; ?></a></li>

										<li class="sentTab"><a href="#mbox_inbox" class="tabChange" val="<?php echo $cv_sent;?>" rel="sent_row"  data-toggle="tab"><i class="splashy-box_okay"></i>  CV Sent <?php if($sent_count):?><span class="label label-info"> <?php echo $sent_count;?></span><?php endif; ?></a></li>
									
										<li class="cvStatusTab"><a href="#mbox_inbox" class="tabChange"  rel="status_row"  data-toggle="tab"><i class="splashy-box_share"></i>  CV Status</a></li>

										<li><a href="#mbox_overall" class="tabChange overAllTab"  rel="overall_status_row"  data-toggle="tab"><i class="splashy-box_new"></i>  Overall Status</a></li>
	
	<!--div style="float: right;  margin-right: 100px;  margin-top: 5px;">
								<a class="jsRedirect toggleSearch" href="javascript:void(0)">
								<input type="button" value="Search" class="btn btn-success"></a>
								</div-->
								
										</ul>
								
	
									</div>
									

									<div class="tab-pane active" id="mbox_inbox">											
											
											<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR cvTable dataTable stickyTable" id="dt_inbox">
												<thead>
													<tr class="upload_row sent_row">
														<th width="120">Candidate Name</th>
														<th  width="100">Mobile</th>
														<th  width="120">Email</th>
														<th  width="100">Present Location</th>
														<th  width="75">Present CTC</th>
														<th  width="75">Expected CTC</th>
														<th  width="80"  class="noticePeriod">Notice Period</th>
														<th  width="140" class="">CV Owner</th>
														<th  width="90" class="">CV Created</th>

														<th width="150">Action</th>
													</tr>
													
												
													
													
														<tr class="dn status_row">
														<th>Candidate Name</th>
														<th>Screening Status</th>
														<th>Interview Status</th>
														<th>Offer Status</th>
														<th>Joining Status</th>
														<th>Billing Status</th>
													
													</tr>
													
												
													
												</thead>
												<tbody>
													
												<?php foreach($resume_data as $resume):	?>
													
	<?php if($resume['ReqResume']['stage_title'] != 'Validation - Recruiter' && $resume['ReqResume']['stage_title'] != 'Validation - Account Holder'):?>
	<?php $row_type = 'sent_row';
	else:
	$row_type = 'upload_row';
	endif; ?>
		
													
													<tr class="<?php echo $row_type;?>">
														<td>														
														<a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $resume['Resume']['id'];?>/"><?php echo ucwords($resume['Resume']['first_name'].' '.$resume['Resume']['last_name']);?></a></td>
														<td><span><?php echo $this->Functions->get_format_text($resume['Resume']['mobile']);?></span></td>
														<td><?php echo $this->Functions->get_format_text($resume['Resume']['email_id']);?></td>
													<td>
														<?php if($resume['ResLoc']['location'] != ''):
														echo $resume['ResLoc']['location'];
														else:
														echo $resume['Resume']['present_location'];
														endif;
														?>
														</td>
														<td>
														
										<?php echo $resume['Resume']['present_ctc'];?>
										<?php echo $this->Functions->get_ctc_type($resume['Resume']['present_ctc_type']);?>
										</td>
														<td>
														
										<?php echo $resume['Resume']['expected_ctc'];?>
										<?php echo $this->Functions->get_ctc_type($resume['Resume']['expected_ctc_type']);?>
										
														<td  class="noticePeriod"><?php echo $this->Functions->get_notice($resume['Resume']['notice_period']);?></td>
														<td><?php echo $resume['Creator']['first_name'];?></td>
														<td><?php echo $this->Functions->format_date($resume['ReqResume']['created_date']);?></td>
														
														
														
															<td class="actionItem">
														<div class="btn-group" style="margin-left:5px;display:inline-block;">
															<!--a href="edit_resume.php" style="margin-left:5px;margin-right:5px" rel="tooltip" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a-->
															<!-- <a href="#"  style="margin-right:5px"  id="smoke_confirm" rel="tooltip" class="confirm"   title="Delete"><i class="icon-trash"></i></a> -->
															<!--a href="add_formatted_resume.php" style="margin-right:5px"  rel="tooltip"  title="Create Fully Formatted Resume">
															<img src="<?php echo $this->webroot;?>img/gCons/add-item.png" width="18" height="18" style="padding-bottom: 5px;">
															</a-->
															<button data-toggle="dropdown"><i class="icon-refresh"></i> <span class=""></span></button>
															<ul style="margin-left:-35px;" class="dropdown-menu">
																<?php if($row_type == 'upload_row'):?>
																<li><a href="<?php echo $this->webroot;?>position/send_cv/<?php echo $resume['Resume']['id']; ?>/<?php echo $this->request->params['pass'][0];?>/" val="60_90"  class="iframeBox">Send CV</a></li>
																<?php endif; ?>
																<?php if($resume['ResDoc']['resume'] == ''):?>
																<li><a class="notify" data-notify-time = '7000' data-notify-title="In Progress!" data-notify-message="Downloading Resume... Please wait..."   href="<?php echo $this->webroot;?>hc/download/<?php echo $resume['Resume']['id']; ?>">Candidate Resume</a></li>
																<?php else:?>
																<li><a class="notify" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Downloading Resume... Please wait..."   href="<?php echo $this->webroot;?>resume/download_doc/<?php echo $resume['ResDoc']['resume']; ?>">Candidate Resume</a></li>
																<?php endif; ?>
																<li><a href="<?php echo $this->webroot;?>resume/profile_snapshot/<?php echo $resume['Resume']['id']; ?>">Snapshot</a></li>
																
															</ul>
														</div>											
														</td>
														
														
														
													</tr>
													
													
													<?php endforeach; ?>
													
													 
													
													
													<?php  foreach($resume_data as $resume):	?>
													
								<?php if($resume['ReqResume']['stage_title'] != 'Validation - Recruiter' && $resume['ReqResume']['stage_title'] != 'Validation - Account Holder'):?>

													<tr class="dn status_row">
														<td>														
	<a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $resume['Resume']['id'];?>/">
	<?php echo ucwords($resume['Resume']['first_name'].' '.$resume['Resume']['last_name']);?></a>
	<span style="font-size:9px">(<?php echo $resume['ReqResume']['stage_title'];?> <?php echo $resume['ReqResume']['status_title'];?>)</span>

	
	</td>
														
									
							<td>	
							
							<?php if($resume['ReqResume']['stage_title'] == 'Shortlist' && ($resume['ReqResume']['status_title'] == 'CV-Sent'
							|| $resume['ReqResume']['status_title'] == 'YRF')):
								$action = '1';?>																		
									<div class="span1"  style="width:110px;">
					
									<div class="btn-group">
										<button class="btn btn-info btn-mini"  rel="tooltip" title="CV Feedback Awaiting">FA </button>
										<button data-toggle="dropdown" class="btn btn-mini btn-info  dropdown-toggle"><span class="caret"></span></button>
										<ul class="dropdown-menu">
	<li><a  href="<?php echo $this->webroot;?>position/update_cv/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/shortlist/" val="40_60"  class="iframeBox sepV_a cboxElement">Shortlisted</a></li>
	<li><a  href="<?php echo $this->webroot;?>position/update_cv/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo $this->request->params['pass'][0];?>/cv_reject/" val="40_60"  class="iframeBox sepV_a cboxElement">Rejected</a></li>
										</ul>
									</div>	
								</div>
	<?php elseif($resume['ReqResume']['stage_title'] == 'Shortlist' && $resume['ReqResume']['status_title'] == 'Rejected'):
							?>
							
								<div class="span1" style="width:110px;">
<div class="btn btn-mini alert alert-danger" rel="tooltip" title="CV Rejected" style="background-image:none;cursor:default;margin-bottom:0px;padding:4px 7px 4px 9px;text-align:center;">
                Rejected
            </div>									
									
								</div>
<?php elseif(($resume['ReqResume']['stage_title'] == 'Shortlist' && $resume['ReqResume']['status_title'] == 'Shortlisted')
|| strstr($resume['ReqResume']['stage_title'], 'Interview') || $resume['ReqResume']['stage_title'] == 'Offer'
|| $resume['ReqResume']['stage_title'] == 'Joining'):
?>
								
								<div class="span1" style="width:110px;">
<div class="btn btn-mini alert alert-success" rel="tooltip" title="CV Shortlisted" style="background-image:none;cursor:default;margin-bottom:0px;padding:4px 7px 4px 9px;text-align:center;">
                Shortlisted
            </div>									
									
								</div>
							<?php endif; ?>
								</td>	
								
								

							<td>	
												
							<?php 
	if((strstr($resume['ReqResume']['stage_title'], 'Interview') && ($resume['ReqResume']['status_title'] != 'Rejected')
	&& ($resume['ReqResume']['status_title'] == 'Selected' && $resume['ReqResume']['stage_title'] != 'Final Interview')
	|| ($resume['ReqResume']['status_title'] == 'Scheduled')) ||
	($resume['ReqResume']['stage_title'] == 'Shortlist' && $resume['ReqResume']['status_title'] == 'Shortlisted')
	|| ($resume['ReqResume']['status_title'] == 'Cancelled' || $resume['ReqResume']['status_title'] == 'No Show')
	&& $action != '1'): 
		$action = '1';?>						

<?php $int_level = explode(' ', $resume['ReqResume']['stage_title']);
	$int_lev = $this->Functions->get_int_level($int_level[0]);
	$int_lev_order = $this->Functions->get_int_level_order($int_level[0]);
	$int_lev_same = $this->Functions->get_int_level_same($int_level[0]);
	
	?>						
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
									
										<?php if($resume['ReqResume']['status_title'] == 'Scheduled'  || $resume['ReqResume']['status_title'] == 'Cancelled' || $resume['ReqResume']['status_title'] == 'No Show'):?>
										<button class="btn  btn-mini btn-info" rel="tooltip" title="<?php echo $int_level[0];?> Interview Scheduled"><?php echo $int_lev_same;?> IS </button>
										<?php else: ?>
										<button class="btn  btn-mini btn-info" rel="tooltip" title="<?php echo $int_lev_order;?> Interview Awaiting"><?php echo $int_lev;?> IA </button>
										<?php endif; ?>
										
										<button data-toggle="dropdown" class="btn btn-info btn-mini dropdown-toggle"><span class="caret"></span></button>
										<ul class="dropdown-menu">
										<?php if($resume['ReqResume']['status_title'] == 'Shortlisted' || $resume['ReqResume']['status_title'] == 'Selected' || $resume['ReqResume']['status_title'] == 'Cancelled' || $resume['ReqResume']['status_title'] == 'No Show'):?>
										<li><a  href="<?php echo $this->webroot;?>position/schedule_interview/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo $int_lev;?>/" val="60_90"  class="iframeBox sepV_a cboxElement">Interview Schedule / Reschedule</a></li>
										<?php else: ?>
										<li><a  href="<?php echo $this->webroot;?>position/view_interview_schedule/<?php echo  $resume['ReqResume']['id'];?>/<?php echo $int_lev_same;?>/" val="60_90"  class="iframeBox sepV_a cboxElement">View Interview Schedule</a></li>
										<?php endif; ?>
										
										<?php if($resume['ReqResume']['status_title'] == 'Scheduled'):?>
											<li><a  href="<?php echo $this->webroot;?>position/update_interview/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/shortlist/<?php echo $int_lev_same;?>/" val="40_60"  class="iframeBox sepV_a cboxElement"><?php  if($int_level[0] > 0): echo $int_level[0]; endif;?> Interview Selected </a></li>
											<li><a  href="<?php echo $this->webroot;?>position/update_interview/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/reject/<?php echo $int_lev_same;?>/" val="40_60"  class="iframeBox sepV_a cboxElement"><?php  if($int_level[0] > 0): echo $int_level[0]; endif;?> Interview Rejected</a></li>
										<?php endif; ?>
										</ul>
									</div>	
								</div>
<?php elseif((strstr($resume['ReqResume']['stage_title'], 'Interview') && $resume['ReqResume']['status_title'] == 'Selected')
|| (strstr($resume['ReqResume']['stage_title'], 'Interview') && $resume['ReqResume']['status_title'] == 'Qualified')
|| ($resume['ReqResume']['stage_title'] == 'Offer' || $resume['ReqResume']['stage_title'] == 'Joining') && $action != '1'):?>
							<div class="span1" style="width:110px;">
										<div class="span1" style="width:110px;">
<div class="btn btn-mini alert alert-success" rel="tooltip" title="Interview Selected" style="background-image:none;cursor:default;margin-bottom:0px;padding:4px 7px 4px 9px;text-align:center;">
               Selected
            </div>									
									
								</div>
								</div>
<?php elseif(strstr($resume['ReqResume']['stage_title'], 'Interview') && $resume['ReqResume']['status_title'] == 'Rejected'	 && $action != '1'):
							$action = 1;?>
							
								<div class="span1" style="width:110px;">
<div class="btn btn-mini alert alert-danger" rel="tooltip" title="Interview Rejected" style="background-image:none;cursor:default;margin-bottom:0px;padding:4px 7px 4px 9px;text-align:center;">
               Rejected
            </div>									
									
								</div>
			
							<?php endif; ?>
								</td>	
								
								<td>	
												
		<?php if($resume['ReqResume']['stage_title'] == 'Offer'  && $resume['ReqResume']['status_title'] == 'Offer Pending'
		|| $resume['ReqResume']['stage_title'] == 'Offer'  && $resume['ReqResume']['status_title'] == 'Yet to Join'
		|| $resume['ReqResume']['stage_title'] == 'Final Interview' && $resume['ReqResume']['status_title'] == 'Selected') :
							$action = '1';?>																		
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn  btn-mini btn-info" title="Offer Pending" rel="tooltip">OP </button>
										<button data-toggle="dropdown" class="btn btn-info btn-mini dropdown-toggle"><span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a  href="<?php echo $this->webroot;?>position/update_offer/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/offer_accept/" val="40_60"  class="iframeBox sepV_a cboxElement">Accepted</a></li>
											<li><a  href="<?php echo $this->webroot;?>position/update_offer/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/offer_decline/" val="40_60"  class="iframeBox sepV_a cboxElement">Declined</a></li>
										</ul>
									</div>	
								</div>
								
	<?php elseif($resume['ReqResume']['stage_title'] == 'Offer' && ($resume['ReqResume']['status_title'] == 'Declined'
	|| $resume['ReqResume']['status_title'] == 'Not Interested')):
							?>
							
								<div class="span1" style="width:110px;">
<div class="btn btn-mini alert alert-danger" rel="tooltip" title="Offer Declined" style="background-image:none;cursor:default;margin-bottom:0px;padding:4px 7px 4px 9px;text-align:center;">
                 <?php echo ucfirst($resume['ReqResume']['status_title']);?>	
				
            </div>									
									
								</div>
<?php elseif(($resume['ReqResume']['stage_title'] == 'Offer' && $resume['ReqResume']['status_title'] == 'Offer Accepted') || $resume['ReqResume']['stage_title'] == 'Joining'):
$action = 1;?>
								
								<div class="span1" style="width:110px;">
<div class="btn btn-mini alert alert-success" rel="tooltip" title="Offer Accepted" style="background-image:none;cursor:default;margin-bottom:0px;padding:4px 7px 4px 9px;text-align:center;">
                Offer Accepted
            </div>									
									
								</div>	
								
							<?php endif; ?>
								</td>
								
								<td>	
												
	<?php if($resume['ReqResume']['stage_title'] == 'Offer' && $resume['ReqResume']['status_title'] == 'Offer Accepted'
	|| ($resume['ReqResume']['status_title'] == 'Deferred')):
							$action = '1';?>																		
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn  btn-mini btn-info" title="Joining Awaiting" rel="tooltip">JA </button>
										<button data-toggle="dropdown" class="btn btn-info btn-mini dropdown-toggle"><span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a  href="<?php echo $this->webroot;?>position/update_joining/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/joined/" val="40_60"  class="iframeBox sepV_a cboxElement">Joined</a></li>
											<li><a  href="<?php echo $this->webroot;?>position/update_joining/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/not_joined/" val="40_60"  class="iframeBox sepV_a cboxElement">Not Joined</a></li>
											<li><a  href="<?php echo $this->webroot;?>position/update_joining/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/deferred/" val="40_60"  class="iframeBox sepV_a cboxElement">Deferred</a></li>
										</ul>
									</div>	
								</div>
<?php elseif($resume['ReqResume']['stage_title'] == 'Joining' && $resume['ReqResume']['status_title'] == 'Not Joined'):
							?>
							
								<div class="span1" style="width:110px;">
<div class="btn btn-mini alert alert-danger" rel="tooltip" title="Candidate Not Joined" style="background-image:none;cursor:default;margin-bottom:0px;padding:4px 7px 4px 9px;text-align:center;">
               Not Joined
            </div>									
									
								</div>
<?php elseif($resume['ReqResume']['stage_title'] == 'Joining' && $resume['ReqResume']['status_title'] == 'Joined'):?>
								
								<div class="span1" style="width:110px;">
<div class="btn btn-mini alert alert-success" rel="tooltip" title="Candidate Joined" style="background-image:none;cursor:default;margin-bottom:0px;padding:4px 7px 4px 9px;text-align:center;">
               Joined
            </div>									
									
								</div>	
								
							<?php endif; ?>
								</td>
												
									<td>	
												
	<?php if($resume['ReqResume']['status_title'] ==  'Joined' && ($resume['ReqResume']['bill_ctc'] == '0.00' || $resume['ReqResume']['bill_ctc'] == '')):
							$action = '1';?>																		
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn  btn-mini btn-info">BA </button>
										<button data-toggle="dropdown" class="btn btn-info btn-mini dropdown-toggle"><span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="<?php echo $this->webroot;?>hiring/add_billing.php?res_id=<?php echo $resume['Resume']['id'];?>&req_res_id=<?php echo $resume['ReqResume']['id'];?>">Add Billing</a></li>
										</ul>
									</div>	
								</div>
	
<?php elseif($resume['ReqResume']['status_title'] == 'Joined'  && $resume['ReqResume']['bill_ctc'] != '0.00'):?>
								
								<div class="span1" style="width:110px;">
<div class="btn btn-mini alert alert-success" rel="tooltip" title="Candidate Billed (₹<?php echo $resume['ReqResume']['bill_ctc'];?>)" style="background-image:none;cursor:default;margin-bottom:0px;padding:4px 7px 4px 9px;text-align:center;">
                Billed
            </div>									
									
								</div>	
								
							<?php endif; ?>
								</td>
											
	
												<?php $action = '';?>						
														
													</tr>
						<?php endif; ?>
											
													<?php  endforeach; ?>
												
												
												</tbody>
											</table>	
											
											<div class="alert alert-login no_record dn">
								<a class="close" data-dismiss="alert">×</a>
								<strong>Oops!</strong> No records found!.
							</div>
							
										</div>
								
									
									
									<div class="tab-pane overall_status_row dn" id="mbox_overall">											
									

<?php
$sent = $this->Functions->get_req_tab_count($status_data, 'CV-Sent', 'status');
$shortlist = $this->Functions->get_req_tab_count($status_data, 'Shortlisted', 'status');
$cv_reject = $this->Functions->get_req_tab_count($status_data, '', '','shorlist_reject');
$interview =  $this->Functions->get_req_tab_count($status_data, 'First Interview-Final Interview-Second Interview', 'stage');
$interview_not_att =  $this->Functions->get_req_tab_count($status_data, 'First Interview-Final Interview-Second Interview', 'stage', 'interview_not_att');
$interview_reject =  $this->Functions->get_req_tab_count($status_data, 'First Interview-Final Interview-Second Interview', 'stage', 'interview_reject');
$offer =  $this->Functions->get_req_tab_count($status_data, 'Offer','stage');
$offer_rej =  $this->Functions->get_req_tab_count($status_data, 'OfferReject','','offer_reject');
$joined =  $this->Functions->get_req_tab_count($status_data, 'Joined','status');
$billing =  $this->Functions->get_req_tab_count($status_data, '','','billing');
$yrf =  $sent - ($shortlist  + $cv_reject)

?>									
										<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR cvTable dataTable stickyTable" id="dt_inbox">
												<thead>
												<tr class="">
														<th width="250">Status</th>
														<th>No. of Candidates</th>
													
													</tr>
											<tbody>
														<tr class="">
														<td>CV Sent</td>
														<th><?php echo $sent;?></th>
														</tr>
													<tr class="">
														<td>CV Shortlisted </td>
														<th><?php echo $shortlist;?></th>
														</tr>
														<tr class="">
														<td>CV Rejected</td>
														<th><?php echo $cv_reject;?></th>
														</tr>
														<tr class="">
														<td>Feedback Awaiting</td>
														<th><?php echo $yrf;?></th>
														</tr>
														<tr class="">
														<td>Interviewed</td>
														<th><?php echo $interview;?></td>
														</tr>
														
														<tr class="">
														<td>Interview Dropouts </td>
														<th><?php echo $interview_not_att;?></td>
														</tr>
														
														<tr class="">
														<td>Interview Rejected </td>
														<th><?php echo $interview_reject;?></td>
														</tr>
														
														<tr class="">
														<td>Offered </td>
														<th><?php echo $offer;?></td>
														</tr>
														
														<tr class="">
														<td>Offer Dropouts  </td>
														<th><?php echo $offer_rej;?></td>
														</tr>
														
														<tr class="">
														<td>Joined  </td>
														<th><?php echo $joined;?></td>
														</tr>
														
														<tr class="">
														<td>Billed </td>
														<th><?php echo $billing;?></td>
														</tr>
											</tbody>
										</table>
								</div>
								
								
									
									
									
								</div>
							</div>
							
							
							
						</div>
					</div>
					
					<div class="form-actions">
	<a href="<?php echo $this->webroot;?>position/" rel="tooltip" title="Back to Positions"  class="jsRedirect"><button class="btn">Back</button></a>
					</div>
								
                    </div>
					
              <?php endif; ?>
				

				    
                </div>
            </div>
            
		</div>
		
		</div>
