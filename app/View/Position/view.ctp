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
                                   <?php echo ucwords($position_data['Position']['job_title']);?>
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
										<td><?php echo ucwords($position_data['Position']['job_title']);?></td>
											
									</tr>
									<tr>
										
										<td width="120" class="tbl_column">Job Location </td>
										<td><?php echo ucfirst($position_data['Position']['location']);?></td>
											
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
			
<?php  if($position_data['Position']['is_approve'] != 'W'):?>			

		<tr>
										
<td class="tbl_column">Status</td>
	<td>	
										
<span rel="tooltip" title="Requirement Status: <?php echo $position_data['ReqStatus']['title'];?> " class="label label-<?php echo $this->Functions->get_req_status_color($position_data['ReqStatus']['title']);?>"><?php echo $position_data['ReqStatus']['title'];?></span>	
</td>
	</tr>
	<?php endif; ?>								
	
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
										
										<td class="tbl_column" style="width:140px;">Technical Skills</td>
										<td><?php $skill = $position_data['Position']['tech_skill'] ? $position_data['Position']['tech_skill'] :$position_data['Position']['skills'];?>
										<?php echo ucwords(str_replace(',', ', ',$skill));?>
										</td>
											
									</tr>
									
									<tr>
										
										<td class="tbl_column" style="width:140px;">Behavioural Skills</td>
										<td><?php echo ucwords(str_replace(',', ', ',$position_data['Position']['behav_skill']));?></td>
											
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
										
										<td class="tbl_column">Recruiters</td>
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
									
									<?php if($position_data['Position']['modified_date']):?>
										<tr>
										
										<td class="tbl_column">Modified On</td>
										<td><?php echo $this->Functions->format_date($position_data['Position']['modified_date']);?></td>
											
									</tr>
									
									<?php endif; ?>
									
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
									<?php echo nl2br(strip_tags($position_data['Position']['job_desc'], '<br>'));?>	
										

			<br></td>
									</tr>
									<tr>
								<td width="120" class="tbl_column">Attachment </td>
									<td>
										
	<?php if($position_data['Position']['job_desc_file'] != ''):?>
			<a href="<?php echo $this->webroot;?>position/download_doc/<?php echo $position_data['Position']['job_desc_file'];?>"><?php echo $position_data['Position']['job_desc_file'];?></a>
			<br>

			<textarea   class="span12" rows = "10"><?php echo trim($this->Functions->read_document(WWW_ROOT.'/uploads/jd/'.$position_data['Position']['job_desc_file']));?></textarea>
	<?php else: ?>	
	No file attached.
	<?php endif; ?>									
										
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
			<?php if($position_data['Position']['is_approve'] == 'W'):?>

							<div class="form-actions">
<a class="iframeBox unreadLink" rel="tooltip" title="Approve Position" href="<?php echo $this->webroot;?>position/remark/<?php echo $position_data['Position']['id'];?>/<?php echo $this->request->params['pass'][1];?>/<?php echo $position_data['Position']['created_by'];?>/A/" val="40_50"><input type="button" value="Approve" class="btn btn btn-success"/></a>
<a class="iframeBox unreadLink" rel="tooltip" title="Reject Position" href="<?php echo $this->webroot;?>position/remark/<?php echo $position_data['Position']['id'];?>/<?php echo $this->request->params['pass'][1];?>/<?php echo $position_data['Position']['created_by'];?>/R/" val="40_50"><input type="button" value="Reject" class="btn btn btn-danger"/></a>
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
<span id="update"></span>
															
															
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
										


							
											<table data-msg_rowlink="a" class="tableID table table_vam mbox_table dTableR cvTable dataTable stickyTable" id="dt_inbox">
												<thead>
													<tr class="upload_row sent_row">
													
													<th   style="text-align:center" width="50" class="upload_row table_checkbox">
													<?php  // if($resume['ReqResume']['stage_title'] == 'Validation - Account Holder' && $resume['ReqResume']['status_title'] == 'Validated'):?>
													<input type="checkbox" name="select_rows" rel="cvSel" class="select_rows">
													<?php  // endif; ?>
													</th>
														<th width="250">Candidate Name</th>
														<th  width="100">Mobile</th>
														<th  width="120">Email</th>
														<th  width="100">Location</th>
														<th  width="85">Present CTC</th>
														<th  width="85">Exp. CTC</th>
														<th  width="80"  class="noticePeriod">Notice</th>
														<th  width="140" class="">CV Owner</th>
														<th  width="90" class="">CV Created</th>
														<th style="text-align:center"  width="75" class="upload_row">Action</th>
														<th style="text-align:center" width="75">Download</th>
													</tr>
													
												
													
													
														<tr class="dn status_row">
										<th   style="text-align:center" width="50" class="table_checkbox"><input type="checkbox" name="select_rows" rel="intSel" class="select_rows"></th>

														<th width="250">Candidate Name</th>
														<th style="text-align:center">Screening Status</th>
														<th style="text-align:center">Interview Status</th>
														<th style="text-align:center">Offer Status</th>
														<th style="text-align:center">Joining Status</th>
														<th style="text-align:center">Billing Status</th>
													
													</tr>
													
												
													
												</thead>
												<tbody>
													
												<?php foreach($resume_data as $resume):	?>
													
	<?php if($resume['ReqResume']['stage_title'] != 'Validation - Recruiter' && $resume['ReqResume']['stage_title'] != 'Validation - Account Holder'):?>
	<?php $row_type = 'sent_row';
	
	endif; ?>
		
													
													<tr class="upload_row <?php echo $row_type;?>">
							<th  class="upload_row" style="text-align:center" width="50">
							<?php if($resume['ReqResume']['stage_title'] == 'Validation - Account Holder' && $resume['ReqResume']['status_title'] == 'Validated'):?>	
							<input type="checkbox" name="cv_row_sel[]" value="<?php echo $resume['Resume']['id']; ?>-<?php echo $this->request->params['pass'][0];?>-<?php echo $resume['ReqResume']['id']; ?>" class="selRow cvSel">
							<?php else:?>
							<input type="checkbox" name="row_sel" disabled class="">
							<?php endif; ?>
								</th>						<td>														
														<a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $resume['Resume']['id'];?>/"><?php echo ucwords($resume['Resume']['first_name'].' '.$resume['Resume']['last_name']);?></a>
															<span style="font-size:9px">(<?php echo $resume['ReqResume']['stage_title'];?> <?php echo $resume['ReqResume']['status_title'];?>)</span>

															</td>
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
														
														
														<td style="text-align:center" class="actionItem upload_row">
			<?php if($resume['ReqResume']['stage_title'] == 'Validation - Account Holder' &&
										$resume['ReqResume']['status_title'] == 'Validated'): $multi_send_cv = '1';?>
															
					<span rel="tooltip" style="cursor:pointer" data-original-title="Send CV"><a href="<?php echo $this->webroot;?>position/send_cv/<?php echo $resume['Resume']['id']; ?>/<?php echo $this->request->params['pass'][0];?>/<?php echo $resume['ReqResume']['id']; ?>/" val="65_90"  class="iframeBox"><i class="splashy-arrow_medium_upper_right"></i></a></span>
																
																
										<?php elseif($resume['ReqResume']['stage_title'] == 'Validation - Account Holder' &&
										$resume['ReqResume']['status_title'] == 'Pending'):?>
													<div class="btn-group">		
												<span rel="tooltip" data-toggle="dropdown"  style="cursor:pointer" data-original-title="Update CV"><i class="splashy-sprocket_light"></i>
																</span>
													
													
												<ul style="margin-left:-35px;" class="dropdown-menu">
															
									<li><a class="notify" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Validating CV.. Pls wait.." href="<?php echo $this->webroot;?>position/verify_cv/<?php echo $resume['Resume']['id']; ?>/<?php echo $this->request->params['pass'][0];?>/approve/"><i class="splashy-check"></i> Approve</a></li>
									<li><a val="40_60"  class="iframeBox sepV_a cboxElement" href="<?php echo $this->webroot;?>position/verify_cv/<?php echo $resume['Resume']['id']; ?>/<?php echo $this->request->params['pass'][0];?>/reject/"><i class="splashy-error_small"></i> Reject</a></li>
															</ul>		
														</div>	
																
											
											<?php elseif($resume['ReqResume']['stage_title'] == 'Validation - Account Holder' &&
										$resume['ReqResume']['status_title'] == 'Rejected'):?>

										<span rel="tooltip" style="cursor:" data-original-title="Account Holder - Rejected"><i class="splashy-thumb_down"></i></span>
										
										<?php else:?>										
										<span rel="tooltip" style="cursor:" data-original-title="Account Holder - Validated"><i class="splashy-thumb_up"></i></span>		

										<?php endif; ?>	
														
													
										</td>
														
														
															<td class="actionItem" style="text-align:center">
															
													
															
															
													
														
														
															<?php if($resume['ResDoc']['resume'] == ''):?>
																
																
																<a rel="tooltip" title="Download" class="notify" data-notify-time = '7000' data-notify-title="In Progress!" data-notify-message="Downloading Resume... Please wait..."   href="<?php echo $this->webroot;?>hc/download/<?php echo $resume['Resume']['id']; ?>"><i  class="splashy-document_letter_download"></i></a>
																<?php else:?>
													<?php $date = $resume['Resume']['modified_date'] ? $resume['Resume']['modified_date']: $resume['Resume']['created_date']?>
																<a rel="tooltip" title="Download"  class="notify" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Downloading Resume... Please wait..."   href="<?php echo $this->webroot;?>resume/profile_snapshot/<?php echo $resume['ResDoc']['resume']; ?>/<?php echo strtotime($date);?>"><i  class="splashy-document_letter_download"></i></a>
																<?php endif; ?>
																
															
																									
														</td>
														
														
														
													</tr>
													
													
													<?php endforeach; ?>
													
													 
													
													
													<?php  foreach($resume_data as $resume):	?>
													
								<?php if($resume['ReqResume']['stage_title'] != 'Validation - Recruiter' && $resume['ReqResume']['stage_title'] != 'Validation - Account Holder'):?>

													<tr class="dn status_row">
													
			<th  style="text-align:center" width="50">
			
		<?php	if((strstr($resume['ReqResume']['stage_title'], 'Interview') && ($resume['ReqResume']['status_title'] != 'Rejected')
	&& ($resume['ReqResume']['status_title'] == 'Selected' && $resume['ReqResume']['stage_title'] != 'Final Interview')
	|| ($resume['ReqResume']['status_title'] == 'Scheduled')) ||
	($resume['ReqResume']['stage_title'] == 'Shortlist' && $resume['ReqResume']['status_title'] == 'Shortlisted')
	|| ($resume['ReqResume']['status_title'] == 'Cancelled' || $resume['ReqResume']['status_title'] == 'No Show')
	&& $action != '1'):  $schedule_interview = 1; ?>
		<input type="checkbox" name="int_row_sel" value="<?php echo $resume['Resume']['id']; ?>-<?php echo $this->request->params['pass'][0];?>-<?php echo $resume['ReqResume']['id']; ?>" class="selRow intSel">
		<?php else:?>
		<input type="checkbox" name="row_sel" disabled>
		<?php $schedule_interview = 0; 
		endif; ?>
			</th>

														<td>														
	<a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $resume['Resume']['id'];?>/">
	<?php echo ucwords($resume['Resume']['first_name'].' '.$resume['Resume']['last_name']);?></a>
	<span style="font-size:9px">(<?php echo $resume['ReqResume']['stage_title'];?> <?php echo $resume['ReqResume']['status_title'];?>)</span>

	
	</td>
														
									
							<td style="text-align:center">	
							
							<?php if($resume['ReqResume']['stage_title'] == 'Shortlist' && ($resume['ReqResume']['status_title'] == 'CV-Sent'
							|| $resume['ReqResume']['status_title'] == 'YRF')):
								$action = '1';?>																		
									
									<div class="btn-group">
									
										<span class="btn-mini alert alert-success alert-action legendView" rel="tooltip" title="CV Feedback Awaiting"  style="">
										FA  
										</span>
										
										<span data-toggle="dropdown" style="padding-top:1px;margin-left:1px;border:1px solid #fbfcbd" class=" dropdown-toggle  alert-action"><span class="caret" style="margin-top:7px;"></span></span>
										
										
										
										
										<ul class="dropdown-menu">
	<li><a  href="<?php echo $this->webroot;?>position/update_cv/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo  $resume['ReqResume']['id'];?>/shortlist/" val="40_60"  class="iframeBox sepV_a cboxElement"><i class="splashy-check"></i> Shortlisted</a></li>
	<li><a  href="<?php echo $this->webroot;?>position/update_cv/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo  $resume['ReqResume']['id'];?>/cv_reject/" val="40_60"  class="iframeBox sepV_a cboxElement"><i class="splashy-error_small"></i> Rejected</a></li>
										</ul>
									</div>	
								
	<?php elseif($resume['ReqResume']['stage_title'] == 'Shortlist' && $resume['ReqResume']['status_title'] == 'Rejected'):
							?>
							
<span class="btn btn-mini alert alert-danger legendView" rel="tooltip" title="CV Rejected" style="">
                R
            </span>									
									
								
<?php elseif(($resume['ReqResume']['stage_title'] == 'Shortlist' && $resume['ReqResume']['status_title'] == 'Shortlisted')
|| strstr($resume['ReqResume']['stage_title'], 'Interview') || $resume['ReqResume']['stage_title'] == 'Offer'
|| $resume['ReqResume']['stage_title'] == 'Joining'):
?>
								
<span class="btn btn-mini alert alert-success legendView" rel="tooltip" title="CV Shortlisted" style="">
                S
            </span>									
									
								
							<?php endif; ?>
								</td>	
								
								

							<td style="text-align:center">	
												
							<?php 
	/*
	if((strstr($resume['ReqResume']['stage_title'], 'Interview') && ($resume['ReqResume']['status_title'] != 'Rejected')
	&& ($resume['ReqResume']['status_title'] == 'Selected' && $resume['ReqResume']['stage_title'] != 'Final Interview')
	|| ($resume['ReqResume']['status_title'] == 'Scheduled')) ||
	($resume['ReqResume']['stage_title'] == 'Shortlist' && $resume['ReqResume']['status_title'] == 'Shortlisted')
	|| ($resume['ReqResume']['status_title'] == 'Cancelled' || $resume['ReqResume']['status_title'] == 'No Show')
	&& $action != '1'): */
	
	 if($schedule_interview == '1' && $action != '1'):
		$action = '1'; $multi_show_interview = '1';?>						

<?php $int_level = explode(' ', $resume['ReqResume']['stage_title']);
	$int_lev = $this->Functions->get_int_level($int_level[0]);
	$int_lev_order = $this->Functions->get_int_level_order($int_level[0]);
	$int_lev_same = $this->Functions->get_int_level_same($int_level[0]);
	
	?>						
									
									<div class="btn-group">
									
										<?php if($resume['ReqResume']['status_title'] == 'Scheduled'  || $resume['ReqResume']['status_title'] == 'Cancelled' || $resume['ReqResume']['status_title'] == 'No Show'):?>
										
										<span class="btn-mini alert alert-success alert-action legendView" rel="tooltip" title="<?php echo $int_level[0];?> Interview Scheduled" style="">
										<?php echo $int_lev_same;?> IS 
										</span>	
		
										<?php else: ?>
										
										
										<span class="btn-mini alert alert-success alert-action legendView" rel="tooltip" title="<?php echo $int_lev_order;?> Interview Schedule Awaited" style="">
										<?php echo $int_lev;?> ISA  
										</span>
									
										<?php endif; ?>
										
										
										<span data-toggle="dropdown" style="padding-top:1px;margin-left:1px;border:1px solid #fbfcbd" class=" dropdown-toggle  alert-action"><span class="caret" style="margin-top:7px;"></span></span>
										
										<ul class="dropdown-menu">
										<?php if($resume['ReqResume']['status_title'] == 'Shortlisted' || $resume['ReqResume']['status_title'] == 'Selected' || $resume['ReqResume']['status_title'] == 'Cancelled' || $resume['ReqResume']['status_title'] == 'No Show'):?>
										<li><a  href="<?php echo $this->webroot;?>position/schedule_interview/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo $resume['ReqResume']['id'];?>/<?php echo $int_lev;?>/" val="65_90"  class="iframeBox sepV_a cboxElement">Schedule Interview</a></li>

										<?php else: ?>
										<li><a  href="<?php echo $this->webroot;?>position/view_interview_schedule/<?php echo  $resume['ReqResume']['id'];?>/<?php echo $int_lev_same;?>/" val="65_90"  class="iframeBox sepV_a cboxElement">View Interview Details</a></li>
										<?php endif; ?>
										
										<?php if($resume['ReqResume']['status_title'] == 'Scheduled'): $reschedule = '1';?>										
										<li><a  href="<?php echo $this->webroot;?>position/schedule_interview/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo $resume['ReqResume']['id'];?>/<?php echo $int_lev_same;?>/reschedule/" val="65_90"  class="iframeBox sepV_a cboxElement">Re-Schedule Interview</a></li>
										
										<li class="divider"></li>
										
											<li><a  href="<?php echo $this->webroot;?>position/update_interview/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo  $resume['ReqResume']['id'];?>/shortlist/<?php echo $int_lev_same;?>/" val="40_60"  class="iframeBox sepV_a cboxElement"><?php  if($int_level[0] > 0): echo $int_level[0]; endif;?> <i class="splashy-check"></i> Interview Selected </a></li>
											<li><a  href="<?php echo $this->webroot;?>position/update_interview/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo  $resume['ReqResume']['id'];?>/reject/<?php echo $int_lev_same;?>/" val="40_60"  class="iframeBox sepV_a cboxElement"><?php  if($int_level[0] > 0): echo $int_level[0]; endif;?> <i class="splashy-error_small"></i> Interview Rejected</a></li>
										<?php endif; ?>
										</ul>
									</div>	
								
<?php elseif((strstr($resume['ReqResume']['stage_title'], 'Interview') && $resume['ReqResume']['status_title'] == 'Selected')
|| (strstr($resume['ReqResume']['stage_title'], 'Interview') && $resume['ReqResume']['status_title'] == 'Qualified')
|| ($resume['ReqResume']['stage_title'] == 'Offer' || $resume['ReqResume']['stage_title'] == 'Joining') && $action != '1'):?>
<span class="btn btn-mini alert alert-success legendView" rel="tooltip" title="Interview Selected" style="">
               S
            </span>									
									
								
								
<?php elseif(strstr($resume['ReqResume']['stage_title'], 'Interview') && $resume['ReqResume']['status_title'] == 'Rejected'	 && $action != '1'):
							$action = 1;?>
							
<span class="btn btn-mini alert alert-danger legendView" rel="tooltip" title="Interview Rejected" style="">
               R
            </span>									
									
			
							<?php endif; ?>
								</td>	
								
								<td style="text-align:center">	
								
							
												
		<?php if($resume['ReqResume']['stage_title'] == 'Offer'  && $resume['ReqResume']['status_title'] == 'Offer Pending'
		|| $resume['ReqResume']['stage_title'] == 'Offer'  && $resume['ReqResume']['status_title'] == 'Yet to Join'
		|| $resume['ReqResume']['stage_title'] == 'Final Interview' && $resume['ReqResume']['status_title'] == 'Selected') :
							$action = '1';?>																		
									
									<div class="btn-group">	
									<span class="btn-mini alert alert-success alert-action legendView" rel="tooltip" title="Offer Pending"  style="">
										OP  
										</span>
										
										<span data-toggle="dropdown" style="padding-top:1px;margin-left:1px;border:1px solid #fbfcbd" class=" dropdown-toggle  alert-action"><span class="caret" style="margin-top:7px;"></span></span>
										
										<ul class="dropdown-menu">
											<li><a  href="<?php echo $this->webroot;?>position/update_offer/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo  $resume['ReqResume']['id'];?>/offer_accept/" val="40_70"  class="iframeBox sepV_a cboxElement"><i class="splashy-check"></i> Accepted</a></li>
											<li><a  href="<?php echo $this->webroot;?>position/update_offer/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo  $resume['ReqResume']['id'];?>/offer_decline/" val="40_60"  class="iframeBox sepV_a cboxElement"><i class="splashy-error_small"></i> Declined</a></li>
										</ul>
									</div>	
										
									<!--div class="btn-group">
										<button class="btn  btn-mini btn-info" title="Offer Pending" rel="tooltip">OP </button>
										<button data-toggle="dropdown" class="btn btn-info btn-mini dropdown-toggle"><span class="caret"></span></button>
									
									</div-->	
								
								
	<?php elseif($resume['ReqResume']['stage_title'] == 'Offer' && ($resume['ReqResume']['status_title'] == 'Declined'
	|| $resume['ReqResume']['status_title'] == 'Not Interested')):
							?>
							
								
<span class="btn btn-mini alert alert-danger legendView" rel="tooltip" title="Offer Declined" style="">
                D <?php // echo ucfirst($resume['ReqResume']['status_title']);?>	
				
            </span>									
									
								
<?php elseif(($resume['ReqResume']['stage_title'] == 'Offer' && $resume['ReqResume']['status_title'] == 'Offer Accepted') || $resume['ReqResume']['stage_title'] == 'Joining'):
$action = 1;?>
								
								
<span class="btn btn-mini alert alert-success legendView" rel="tooltip" title="Offer Accepted" style="">
               OA
            </span>									
									
								
								
							<?php endif; ?>
								</td>
								
								<td style="text-align:center">	
												
	<?php if($resume['ReqResume']['stage_title'] == 'Offer' && $resume['ReqResume']['status_title'] == 'Offer Accepted'
	|| ($resume['ReqResume']['status_title'] == 'Deferred')):
							$action = '1';?>																		
									
									<div class="btn-group">
									<?php $st_title = $resume['ReqResume']['status_title'] == 'Deferred' ? 'Deferred' : 'Awaiting';?>
										<span class="btn-mini alert alert-success alert-action" rel="tooltip" title="Joining <?php echo $st_title;?>"   style="background-image:none;cursor:default;margin-bottom:0px;">
										JA  
										</span>
										
										<span data-toggle="dropdown" style="padding-top:1px;margin-left:1px;border:1px solid #fbfcbd" class=" dropdown-toggle  alert-action"><span class="caret" style="margin-top:7px;"></span></span>
										
									
										<ul class="dropdown-menu">
											<li><a  href="<?php echo $this->webroot;?>position/update_joining/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo  $resume['ReqResume']['id'];?>/joined/" val="40_60"  class="iframeBox sepV_a cboxElement">Joined</a></li>
											<li><a  href="<?php echo $this->webroot;?>position/update_joining/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo  $resume['ReqResume']['id'];?>/not_joined/" val="40_70"  class="iframeBox sepV_a cboxElement">Not Joined</a></li>
											<li><a  href="<?php echo $this->webroot;?>position/update_joining/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo  $resume['ReqResume']['id'];?>/deferred/" val="40_70"  class="iframeBox sepV_a cboxElement">Deferred</a></li>
										</ul>
									</div>	
								
<?php elseif($resume['ReqResume']['stage_title'] == 'Joining' && $resume['ReqResume']['status_title'] == 'Not Joined'):
							?>
							
								
<span class="btn btn-mini alert alert-danger legendView" rel="tooltip" title="Candidate Not Joined" style="">
               NJ
            </span>									
									
								
<?php elseif($resume['ReqResume']['stage_title'] == 'Joining' && $resume['ReqResume']['status_title'] == 'Joined'):?>
								
								
<span class="btn btn-mini alert alert-success legendView" rel="tooltip" title="Candidate Joined" style="">
               J
            </span>									
									
									
								
							<?php endif; ?>
								</td>
												
									<td style="text-align:center">	
												
	<?php if($resume['ReqResume']['status_title'] ==  'Joined' && ($resume['ReqResume']['bill_ctc'] == '0.00' || $resume['ReqResume']['bill_ctc'] == '')):
							$action = '1';?>																		
									
									<div class="btn-group">
										
										<span class="btn-mini alert alert-success alert-action legendView" rel="tooltip" title="Billing Awaiting"   style="">
										BA  
										</span>
										
										<span data-toggle="dropdown" style="padding-top:1px;margin-left:1px;border:1px solid #fbfcbd" class=" dropdown-toggle  alert-action"><span class="caret" style="margin-top:7px;"></span></span>
										
										
										
										<ul class="dropdown-menu">
											<li><a href="<?php echo $this->webroot;?>hiring/add_billing.php?res_id=<?php echo $resume['Resume']['id'];?>&req_res_id=<?php echo $resume['ReqResume']['id'];?>">Add Billing</a></li>
										</ul>
									
								</div>
	
<?php elseif($resume['ReqResume']['status_title'] == 'Joined'  && $resume['ReqResume']['bill_ctc'] != '0.00'):?>
								
								
<span class="btn btn-mini alert alert-success legendView" rel="tooltip" title="Candidate Billed (₹<?php echo $resume['ReqResume']['bill_ctc'];?>)" style="">
                B
            </span>									
									
									
								
							<?php endif; ?>
								</td>
											
	
												<?php $action = '';?>						
														
													</tr>
												
									

							
						<?php endif; ?>
											
													<?php  endforeach; ?>
												
												
												</tbody>
											</table>	
							
						<input type="hidden" id="int_url" value="<?php echo $this->webroot;?>position/schedule_interview/">
						<input type="hidden" id="cv_url" value="<?php echo $this->webroot;?>position/send_cv/">

												
					<?php if($multi_send_cv == '1'):?>	
						<div class="btn-group upload_row sepH_b">
								<button data-toggle="dropdown" class="btn btn-info dropdown-toggle">Action <span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="javascript:void(0)" class="multi_send_cv">Send CV</a></li>
								</ul>
							</div>
						<?php endif; ?> 
						
						
				
					<?php if($multi_show_interview == '1'):?>		
					<div class="btn-group status_row sepH_b dn">
								<button data-toggle="dropdown" class="btn btn-info  dropdown-toggle">Action <span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="javascript:void(0)" class="multi_interview">Schedule Interview</a></li>
									<?php if($reschedule == '1'): ?>
									<li><a href="javascript:void(0)"  class="multi_interview">Re-Schedule Interview</a></li>
									<?php endif; ?>
								</ul>
							</div>
							
						<?php endif; ?> 

						

							
							
											<div class="alert alert-login no_record dn">
								<a class="close" data-dismiss="alert">×</a>
								<strong>Oops!</strong> No records found!.
							</div>
							
										</div>
								
									
									
									<div align="center" class="span6 tab-pane overall_status_row dn" id="mbox_overall">											
									

<?php
$sent = $this->Functions->get_req_tab_count($resume_data, 'CV-Sent', 'status');
$shortlist = $this->Functions->get_req_tab_count($resume_data, 'Shortlisted', 'status');
$cv_reject = $this->Functions->get_req_tab_count($resume_data, '', '','shorlist_reject');
$interview =  $this->Functions->get_req_tab_count($resume_data, 'First Interview-Final Interview-Second Interview', 'stage');
$interview_not_att =  $this->Functions->get_req_tab_count($resume_data, 'First Interview-Final Interview-Second Interview', 'stage', 'interview_not_att');
$interview_reject =  $this->Functions->get_req_tab_count($resume_data, 'First Interview-Final Interview-Second Interview', 'stage', 'interview_reject');
$offer =  $this->Functions->get_req_tab_count($resume_data, 'Offer','stage');
$offer_rej =  $this->Functions->get_req_tab_count($resume_data, 'OfferReject','','offer_reject');
$joined =  $this->Functions->get_req_tab_count($resume_data, 'Joined','status');
$billing =  $this->Functions->get_req_tab_count($resume_data, '','','billing');
$yrf =  $sent - ($shortlist  + $cv_reject)

?>									
										<table data-msg_rowlink="a"  class="overall_status_row dn table table_vam mbox_table dTableR cvTable dataTable stickyTable" id="dt_inbox">
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
														<th><?php echo $yrf > 0 ? $yrf : '';?></th>
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
