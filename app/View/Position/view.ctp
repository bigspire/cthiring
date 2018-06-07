<div id="maincontainer" class="clearfix">
			<?php echo $this->element('header');?>
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
			
					
					<div class="row-fluid printArea">
					
						 <div class="span12">

 <nav>
                        <div id="jCrumbs" class="breadCrumb module no-print">
                            <ul>
                                <li>
                                    <a href="<?php echo $this->webroot;?>home/"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot;?>position/index/<?php echo $this->request->params['pass'][2];?>">Positions</a>
                                </li>
                            
                                <li>
                                   <?php echo ucwords($position_data['Position']['job_title']);?>
                                </li>
                            </ul>
                        </div>
                    </nav>
					
					<div class="srch_buttons no-print">
				<?php if($this->Session->read('USER.Login.id') == $position_data['Position']['created_by'] && in_array($this->Session->read('USER.Login.id'), $ac_member) && $position_data['Position']['status'] == 'A'):?>	
				<a rel="tooltip jsRedirect" href="<?php echo $this->webroot;?>position/edit/<?php echo $this->request->params['pass'][0];?>" title="Edit Position">
				<input rel="tooltip" title="Edit Position" value="Edit" type="button" class="btn btn-info"></a>
				<?php endif; ?>	
		<a href="<?php echo $this->webroot;?>position/index/<?php echo $this->request->params['pass'][2];?>"  title="Back to Positions"  class="jsRedirect"><button class="btn">Back</button></a>
	
					<!--<a href="#"  class="sepV_a" title="Delete Position">
					<input value="Delete" type="button" class="btn btn-danger"/></a>-->
					
					<?php $team = explode(',', $position_data[0]['team_mem_id']);?>
					<?php if($create_resume == '1' && $position_data['Position']['status'] == 'A' && in_array($this->Session->read('USER.Login.id'), $team)):?>
					<?php if($position_data['Position']['req_status_id'] == '0' || $position_data['Position']['req_status_id'] == '1'):?>
					<a rel="tooltip"  title="Upload New Resume" href="<?php echo $this->webroot;?>hiring/upload_resume.php?client_id=<?php echo $position_data['Client']['id'];?>&req_id=<?php echo $this->request->params['pass'][0];?>"
					 val="40_50"  class="iframeBox sepV_a cboxElement">
					<input value="Upload Resume" type="button" class="btn btn-warning"></a>					
						<?php endif; ?>
						<?php endif; ?>
						</div>
							
							
							
							
							
								<div class="row-fluid">
							<div class="span12">
							<div class="mbox">
							<div class="tabbable">
							<div class="heading">
										<ul class="nav nav-tabs">
										<li class="active"><a class="restabChange" rel="position"  href="#mbox_basic" data-toggle="tab"><i class="splashy-document_a4_edit"></i>  Basic </a></li>
										<li class="no-print"><a class="restabChange" rel="interview"  href="#mbox_description" data-toggle="tab"><i class="splashy-document_a4_add"></i>  Job Description </a></li>
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
						
								<input type="hidden" id="client" value="<?php echo $position_data['Client']['client_name'];?>"/>	
									
									</tr>
									<tr>
										
										<td width="120" class="tbl_column">SPOC Details</td>
										<td><?php echo ucwords($position_data['Contact']['first_name'].' '.$position_data['Contact']['last_name']);?>, 
										<?php echo $position_data['Contact']['email'];?>. 
										<?php											
											echo $position_data['Contact']['phone'];?>
										<?php 
											if(str_replace(' ', '', $position_data['Contact']['mobile']) != '' && str_replace(' ', '', $position_data['Contact']['phone']) != ''):
											echo ', ';
											endif;
										?>
										<?php echo $position_data['Contact']['mobile'];?>
					
					<input type="hidden" id="client_mail" value=" <<?php echo $position_data['Contact']['email'];?>>"/>
					<input type="hidden" id="client_person" value=" <<?php echo ucwords($position_data['Contact']['first_name'].' '.$position_data['Contact']['last_name']);?>>"/>					

																		
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
										
										<td class="tbl_column" style="width:140px;">Job Code</td>
										<td><?php echo $position_data['Position']['job_code'];?></td>
											
									</tr>
									
									
									
									<tr>
										
										<td width="120" class="tbl_column">Experience</td>
										<td><?php echo $position_data['Position']['min_exp'].' - '.$position_data['Position']['max_exp'];?> Years</td>
											
									</tr>
										<tr>
										
										<td class="tbl_column">CTC</td>
										<?php 
										$pre_ctc_type = $this->Functions->get_ctc_type($position_data['Position']['ctc_from_type']);
										$exp_ctc_type = $this->Functions->get_ctc_type($position_data['Position']['ctc_to_type']);
										?>
										<td><?php echo $position_data['Position']['ctc_from'].' '.$pre_ctc_type.' - '.$position_data['Position']['ctc_to'].' '.$exp_ctc_type;?></td>
											
									</tr>
									<tr>
										
										<td class="tbl_column">Qualification </td>
										<td><?php echo $position_data['Position']['education'];?></td>
											
									</tr>	
									
										<tr>
										
										<td class="tbl_column">Functional Area</td>
										<td><?php echo $position_data['FunctionArea']['function'];?></td>
											
									</tr>
									
									
										
				<tr>
										
										<td class="tbl_column">Created On</td>
										<td><?php echo $this->Functions->format_date($position_data['Position']['created_date']);?></td>
											
									</tr>
									
									
<tr>
										
										<td class="tbl_column">Created By</td>
										<td><?php echo $position_data['Creator']['first_name'];?></td>
											
									</tr>
<?php if($position_data['Position']['status'] == 'A'):?>			

		<tr>
										
<td class="tbl_column">Status</td>
	<td>	
										
<span rel="tooltip" title="Requirement Status: <?php echo $position_data['ReqStatus']['title'];?> " class="label label-<?php echo $this->Functions->get_req_status_color($position_data['ReqStatus']['title']);?>"><?php echo $position_data['ReqStatus']['title'];?></span>	

<?php if(in_array($this->Session->read('USER.Login.id'), $ac_member)):?>
	<a rel="tooltip" val="40_60"  class="iframeBox" title="<?php echo $status_txt = $position_data['ReqStatus']['id'] == '10' ? 'Reactivate' : 'Change Status';?>" href="<?php echo $this->webroot;?>position/update_position_status/<?php echo $this->request->params['pass'][0];?>/<?php echo $position_data['ReqStatus']['id'];?>/"><i class="splashy-pencil"></i></a>
<?php endif;?>

<?php if($position_data['Reason2']['reason'] && $position_data['ReqStatus']['id'] == '10'):?>
<?php echo '('.$position_data['Reason2']['reason'].')'?>			
<?php endif;?>

</td>
	</tr>
	<?php endif; ?>								
	
								</tbody>
							</table>
							</div>
							
								<div class="span6 no-print">
							<table class="table  table-striped  table-bordered dataTable" style="margin-bottom:0">
								<tbody>									
									<tr>
										
										<td class="tbl_column"><span rel="tooltip"  title="Client Relationship Manager">CRM</span> </td>
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
										
										<td class="tbl_column" style="width:140px;">Total Openings</td>
										<td><?php echo $position_data['Position']['no_job'];?></td>
											
									</tr>
									
									
										<tr>
										
										<td class="tbl_column">Recruiters</td>
										<td>
										
										<div class="noJob"> 
			
			<?php  		$no_req = $position_data['Position']['no_job'];
						$team_member = explode(',', $position_data[0]['team_member2']);
						$team_req = explode(',', $position_data[0]['team_req']);
						$team_mem_id = explode(',', $position_data[0]['team_mem_id']);			
						$mem_apr = explode('|', $position_data[0]['mem_approve']);
						
						$mem_count = count($mem_apr);
						$k = 0;
						while($k <= $mem_count){
							$mem_apr2 = explode(':', $mem_apr[$k]);
							if(!in_array($mem_apr2[0], $mem_data)){
								$mem_data[] = $mem_apr2[0];							
								$mem_data_st[] = $mem_apr2[1];
							}
							$k++;
						}
						
						// print_r($mem_apr);
						foreach($team_member as $key => $member): 
						
						$chk = $this->request->params['pass'][2] == 'pending'  ? 'W' : 'A';
						
					//	print_r($mem_apr);
						//if($mem_apr[$key] == $chk):
						
						$mem_req = $team_req[$key] ? $team_req[$key] : $no_req; ?>
					<?php 
					if($stmemberID == $team_mem_id[$key]):
					$style = 'font-weight:bold;';
					else:
					$style = 'font-weight:normal;';
					endif; ?>
					
						<?php 
					if($mem_data_st[$key] == 'W'):
					$approval_str = '(Awaiting Approval)';
					else:
					$approval_str = '';
					endif; ?>
					
					
					<div style="margin-top:4px;"><span style="<?php echo $style;?>"><?php echo $member;?> : </span>  	 
					<button rel="tooltip" title="<?php echo $mem_req;?> Openings" class="tagDiv tag label btn-info"><?php echo $mem_req;?></button>	
					
					<span style="<?php echo $style;?>"><?php echo $approval_str;?></span>  
					<div>
						
			<?php //endif;?>
				
				<?php endforeach;?>
										
										</div>
			</td>
											
									</tr>
									
										
									<tr>
										
										<td class="tbl_column">Start Date</td>
<?php $start = $position_data['Position']['start_date'] ? $position_data['Position']['start_date'] : $position_data['Position']['created_date'];?>
<td><?php echo $this->Functions->format_date($start);?></td>
											
									</tr>
										<tr>
										
										<td class="tbl_column">Exp. Joining Date</td>
<?php $end = $position_data['Position']['end_date'] ? $position_data['Position']['end_date'] : $position_data['Position']['modified_date'];?>

										<td><?php echo $this->Functions->format_date($end);?></td>
											
									</tr>
								
									
									
										<tr class="no-print">
										
										<td class="tbl_column">Resume Type </td>
										<td><?php echo $this->Functions->get_resume_type($position_data['Position']['resume_type']);?></td>
											
									</tr>	
									
									
								
									
										<tr>
										
										<td class="tbl_column">Project Type  </td>
										<td><?php 
										
										if($position_data['Position']['is_rpo'] != ''):
										echo $position_data['Position']['is_rpo'] ? 'RPO' : 'Non-RPO';
										endif; 
										
										?></td>
											
									</tr>

									<tr>
										
										<td class="tbl_column">Hide Resume Contacts  </td>
										<td><?php echo $position_data['Position']['hide_contact'] ? 'Yes' : 'No';?></td>
											
									</tr>	
									
									
									
									
									<?php //if($position_data['Position']['modified_date']):?>
										<tr>
										
										<td class="tbl_column">Modified On</td>
										<td><?php echo $this->Functions->format_date($position_data['Position']['modified_date']);?></td>
											
									</tr>
									
									<?php //endif; ?>
									
								</tbody>
							</table>
							</div>
							</div>
									
						<div class="tab-pane no-print" id="mbox_description">
										
						<div class="span12">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0">
								<tbody>
									<tr>
										<td  class="tbl_column"width="120">Job Description</td>
										<td style="padding:10px;">
									<?php if($position_data['Position']['plain_jd']):?>
									<?php echo nl2br($position_data['Position']['plain_jd']);?>
									<?php else:?>
									<?php echo nl2br(strip_tags($position_data['Position']['job_desc'], '<br>'));?>	
									<?php endif; ?>
										

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
					  
	
				
								<?php 
								
								$revision_data = explode(',', $position_data[0]['revision_history']);
								$revision_remark = explode('|||', $position_data[0]['revision_remark']);
								$k = 0; 
								$i = 1; 
								
								?>
								
			<?php if($position_data[0]['no_revision'] > 0):?>
			<div class="span6" style="clear:left;margin-top:10px;margin-left:0px;padding:0">		
			<table class="table table-bordered  table-striped dataTable" style="margin-bottom:0;">
				<tbody>
				
				<?php
								while($i <= $position_data[0]['no_revision']): ?>

								<tr  class="">
										
								<td width="120" style="text-align:center"> 
									
									<?php 
									if($position_data[0]['no_revision'] == $i):
									$style='font-weight:bold'; 
									else: 
									$style= '';
									endif;
									
									?>
									<span style="<?php echo $style;?>"> Rev.<?php echo $i++;?> : 	


									<?php echo $this->Functions->format_date($revision_data[$k]); ?></span>

										
									</td>
										<td width="500"> 
				<?php  echo $revision_remark[$k]; $k++; ?>
										
									</td>
										
									
								</tr>
									
						<?php endwhile; ?>			
			
			</tbody>
			</table>
	</div>	  
	
	<?php endif; ?>
	
	
                      </div>  
					</div>
					
					
					
					
				
					
					
					
					</div></div>
					
<?php if($position_data['Position']['is_approve'] == 'W' &&  $this->request->params['pass'][2] == 'pending'):?>

							<div class="form-actions">

<a class="iframeBox unreadLink" rel="tooltip" title="Approve Position" href="<?php echo $this->webroot;?>position/remark/<?php echo $position_data['Position']['id'];?>/<?php echo $this->request->params['pass'][1];?>/<?php echo $position_data['Position']['created_by'];?>/A/<?php echo $stmemberID;?>" val="40_55"><input type="button" value="Approve" class="btn btn btn-success"/></a>

<?php if($position_data['Position']['modified_date'] == ''):?>
<a class="iframeBox unreadLink" rel="tooltip" title="Reject Position" href="<?php echo $this->webroot;?>position/remark/<?php echo $position_data['Position']['id'];?>/<?php echo $this->request->params['pass'][1];?>/<?php echo $position_data['Position']['created_by'];?>/R/<?php echo $stmemberID;?>" val="40_55"><input type="button" value="Reject" class="btn btn btn-danger"/></a>
<?php endif; ?>

<a href="<?php echo $this->webroot;?>position/index/pending/" rel="tooltip" title="Cancel and Back to Positions"  class="jsRedirect"><button class="btn">Cancel</button></a>
			
			


						
					</div>
						<?php endif; ?>

					
					<?php echo $this->Form->create('Position', array('id' => 'formID','class' => 'formID')); ?>
			
					
				
								
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
			


									
					<?php if($position_data['Position']['status'] == 'A' && $this->request->params['pass'][2] != 'pending'):?>	
				
					  <div class="row-fluid">
						<div class="span12">
						
							<?php if($this->request->query['action'] == 'created'):	?>					
						<div class="alert alert-success">
								<a class="close" data-dismiss="alert">×</a>
								 Resume Created Successfully
								 </div>
						<?php endif; ?>
						
						
						
						<?php if($this->request->query['action'] == 'modified'):	?>					
						<div class="alert alert-success">
								<a class="close" data-dismiss="alert">×</a>
								 Resume Modified Successfully
								 </div>
						<?php endif; ?>
						
							<?php if($this->request->query['action'] == 'auto_created'):	?>					
						<div class="alert alert-success">
								<a class="close" data-dismiss="alert">×</a>
								Fully Formatted Resume Created Successfully
								 </div>
						<?php endif; ?>
						
						
							<?php if($this->request->query['action'] == 'auto_modified'):	?>					
						<div class="alert alert-success">
								<a class="close" data-dismiss="alert">×</a>
								 Fully Formatted Resume Modified Successfully
								 </div>
						<?php endif; ?>
						
					<?php echo $this->Session->flash();?>
					
					
		<span id="update"></span>
										
									
							<div class="mbox" >
							
								<div class="tabbable">
									<div class="heading">
									
									<ul class="nav nav-tabs">
										<?php $sent_count =  $this->Functions->get_req_tab_count_new($resume_data, 'Validation - Account Holder|Validation - Recruiter','cv_sent');?>
										<?php // $cv_sent =  $this->Functions->get_req_tab_count_new($resume_data, 'CV-Sent', 'cv_sent');?>

										<?php $total = count($resume_data);?>
										<li class="active uploadTab"><a href="#mbox_inbox" class="tabChange" val="<?php echo $total;?>" rel="upload_row"  data-toggle="tab"><i class="splashy-box_add"></i>  CV Uploaded <?php if($total):?><span class="label label-warning"> <?php echo $total;?></span><?php endif; ?></a></li>

										<li class="sentTab"><a href="#mbox_inbox" class="tabChange" val="<?php echo $cv_sent;?>" rel="sent_row"  data-toggle="tab"><i class="splashy-box_okay"></i>  CV Sent <?php if($sent_count):?><span class="label label-success"> <?php echo $sent_count;?></span><?php endif; ?></a></li>
									
										<li class="cvStatusTab"><a href="#mbox_inbox" class="tabChange"  rel="status_row"  data-toggle="tab"><i class="splashy-box_share"></i>  CV Status</a></li>

										<li><a href="#mbox_overall" class="tabChange overAllTab"  rel="overall_status_row"  data-toggle="tab"><i class="splashy-box_new"></i>  Overall Status</a></li>
	
	<!--div style="float: right;  margin-right: 100px;  margin-top: 5px;">
								<a class="jsRedirect toggleSearch" href="javascript:void(0)">
								<input type="button" value="Search" class="btn btn-success"></a>
								</div-->
								
										</ul>
								
	
									</div>
									

									<div class="tab-pane active" id="mbox_inbox">											
										

										<?php $ac_member = explode(',', $position_data[0]['ac_holder_id']);	?>			

							
											<table data-msg_rowlink="a" class="tableID table table_vam mbox_table dTableR cvTable dataTable stickyTable" id="dt_inbox">
												<thead>
													<tr class="upload_row sent_row">
													
													<th   style="text-align:center" width="50" class="upload_row table_checkbox">
													<?php  // if($resume['ReqResume']['stage_title'] == 'Validation - Account Holder' && $resume['ReqResume']['status_title'] == 'Validated'):?>
													<input type="checkbox" name="select_rows" rel="cvSel" class="select_rows multi-upload">
													<?php  // endif; ?>
													</th>
														<th width="80">Code</th>
														<th width="180">Candidate Name</th>
														<th  width="100">Mobile</th>
														<th  width="120">Email</th>
														<th  width="100">Location</th>
														<th  width="85">Pre. CTC</th>
														<th  width="85">Exp. CTC</th>
														<th  width="80"  class="noticePeriod">Notice</th>
														<th  width="140" class="">Owner</th>
														<th style="text-align:center" width="75">Download</th>
														<th style="text-align:center"  width="75" class="upload_row">Action</th>
														<th  width="120" class="">Created</th>
														<th  width="120" class="sent_col">Sent</th>
														
														
													</tr>
													
												
													
													
														<tr class="dn status_row">
										<th   style="text-align:center" width="50" class="table_checkbox"><input type="checkbox"  name="select_rows" rel="intSel" class="select_rows multi-inter"></th>

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
	<?php 
	$row_type = 'sent_row';	
	else:
	$row_type = '';
	endif; ?>
		
													
													<tr class="upload_row <?php echo $row_type;?>">
							<th  class="upload_row" style="text-align:center" width="50">
							<?php if($resume['ReqResume']['stage_title'] == 'Validation - Account Holder' && $resume['ReqResume']['status_title'] == 'Validated'):
							$validate_checkbox = 1;?>	
							<input type="checkbox" name="cv_row_sel[]" value="<?php echo $resume['Resume']['id']; ?>-<?php echo $this->request->params['pass'][0];?>-<?php echo $resume['ReqResume']['id']; ?>" class="selRow cvSel">
							<?php else:?>
							<input type="checkbox" name="row_sel" disabled class="">
							<?php endif; ?>
								</th>	
								<td>
								<?php 
										if($resume['Resume']['code']):
										echo $resume['Resume']['code'];
										else:
										echo 'MH'.$resume['Resume']['id'];
										endif; ?>
								</td>
								
								
					<td>														
														<a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $resume['Resume']['id'];?>/"><?php echo ucwords($resume['Resume']['first_name'].' '.$resume['Resume']['last_name']);?></a>
															<!--span style="font-size:9px">(<?php echo $resume['ReqResume']['stage_title'];?> <?php echo $resume['ReqResume']['status_title'];?>)</span-->

															</td>
														<td><span><?php echo $this->Functions->get_format_text($resume['Resume']['mobile']);?></span></td>
														<td><?php echo $this->Functions->get_format_text($resume['Resume']['email_id']);?></td>
													<td>
														<?php if($resume['ResLoc']['location'] != ''):
														echo ucfirst($resume['ResLoc']['location']);
														else:
														echo ucfirst($resume['Resume']['present_location']);
														endif;
														?>
														</td>
														<td>
														
										<?php echo $resume['Resume']['present_ctc'];?>
										<?php echo $this->Functions->get_short_ctc_type($resume['Resume']['present_ctc_type']);?>
										</td>
														<td>
														
										<?php echo $resume['Resume']['expected_ctc'];?>
										<?php echo $this->Functions->get_short_ctc_type($resume['Resume']['expected_ctc_type']);?>
										
														<td  class="noticePeriod"><?php echo $this->Functions->get_notice($resume['Resume']['notice_period']);?></td>
														<td><?php echo $resume['Creator']['first_name'];?></td>
														
														
														<td class="actionItem" style="text-align:center">
															
													
					
<div class="btn-group">
									
	
		
	<span data-toggle="dropdown" style="padding-top:1px;margin-left:1px;border-radius:0px;border:1px solid #fbfcbd" class=" dropdown-toggle">
	<span class="caret" style="margin-top:7px;"></span></span>
	<ul class="dropdown-menu">										

	<li>
			<?php $date = $resume['Resume']['modified_date'] ? $resume['Resume']['modified_date']: $resume['Resume']['created_date']?>
									
														
	<?php  if($resume['ResDoc']['resume'] == ''):?>																
																
	<a rel="tooltip" title="Download" class="notify" data-notify-time = '7000' data-notify-title="In Progress!" data-notify-message="Downloading Resume... Please wait..."   href="<?php echo $this->webroot;?>hc/download/<?php echo $resume['Resume']['id']; ?>">Download Resume</a>
	
	<?php elseif($position_data['Position']['resume_type'] == 'F'):?>

	<a rel="tooltip" title="Download"  class="notify" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Downloading Fully Formatted Resume... Please wait..."   href="<?php echo $this->webroot;?>resume/autoresume/<?php echo $resume['ResDoc']['resume']; ?>/<?php echo strtotime($date);?>/">Download Resume</a>

	<?php elseif($position_data['Position']['resume_type'] == 'S'):?>

	<a rel="tooltip" title="Download"  class="notify" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Downloading Resume... Please wait..."   href="<?php echo $this->webroot;?>resume/profile_snapshot/<?php echo $resume['ResDoc']['resume']; ?>/<?php echo strtotime($date);?>/">Download Resume</a>
	
	<?php elseif($position_data['Position']['resume_type'] == ''):?>

	<a rel="tooltip" title="Download"  class="notify" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Downloading Resume... Please wait..."   href="<?php echo $this->webroot;?>resume/download_doc/<?php echo $resume['ResDoc']['resume']; ?>/">Download Resume</a>
															
		
	<?php endif; ?>
	
	</li>
	
	<li>
									
	
	<?php if($position_data['Position']['resume_type'] == 'F'):?>
	<a rel="tooltip" title="View"  class="iframeBox" val="70_100"  href="<?php echo $this->webroot;?>resume/autoresume/<?php echo $resume['ResDoc']['resume']; ?>/<?php echo strtotime($date);?>/view">View Resume</a>
	<?php elseif($position_data['Position']['resume_type'] == 'S'):?>
	<a rel="tooltip" title="View"  class="iframeBox" val="70_100"  href="<?php echo $this->webroot;?>resume/profile_snapshot/<?php echo $resume['ResDoc']['resume']; ?>/<?php echo strtotime($date);?>/view">View Resume</a>
	<?php endif; ?>
	
	</li>
	
	</ul>
																				
</div>

					
															
													
				
																
															
																									
														</td>

														
														<td style="text-align:center" class="actionItem upload_row">
			<?php if($resume['ReqResume']['stage_title'] == 'Validation - Account Holder' &&
										$resume['ReqResume']['status_title'] == 'Validated'   && in_array($this->Session->read('USER.Login.id'), $ac_member)):
										$multi_send_cv = '1';?>
					
					<?php if($position_data['Position']['req_status_id'] == '9'):?>
						<span rel="tooltip" style="cursor:" data-original-title="Send CV"><i class="splashy-arrow_medium_upper_right"></i></span>
					<?php else: ?>
						<span rel="tooltip" style="cursor:pointer" data-original-title="Send CV"><a href="<?php echo $this->webroot;?>position/send_cv/<?php echo $resume['Resume']['id']; ?>/<?php echo $this->request->params['pass'][0];?>/<?php echo $resume['ReqResume']['id']; ?>/?client_name=<?php echo $position_data['Client']['client_name'];?> <<?php echo ucwords($position_data['Contact']['first_name'].' '.$position_data['Contact']['last_name']);?>> <<?php echo $position_data['Contact']['email'];?>>" val="65_94"  class="iframeBox"><i class="splashy-arrow_medium_upper_right"></i></a></span>
					<?php endif; ?>
					
				
																
										<?php elseif($resume['ReqResume']['stage_title'] == 'Validation - Account Holder' &&
										$resume['ReqResume']['status_title'] == 'Pending'   && in_array($this->Session->read('USER.Login.id'), $ac_member)):?>
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
										<?php $reject_reason = $resume['Reason']['reason'] ? ', '.$resume['Reason']['reason'] : '';?>
										<span rel="tooltip" style="cursor:" data-original-title="CRM - Rejected, <?php echo $reject_reason;?>"><i class="splashy-thumb_down"></i></span>
										
											<?php elseif($resume['ReqResume']['stage_title'] == 'Validation - Account Holder' &&
										$resume['ReqResume']['status_title'] == 'Pending'):?>
			<span rel="tooltip" style="cursor:" data-original-title="CRM - Pending"><i class="splashy-sprocket_light"></i></span>		

											<?php else:?>										
										<span rel="tooltip" style="cursor:" data-original-title="CRM - Validated"><i class="splashy-thumb_up"></i></span>		

										<?php endif; ?>	
														
													
										</td>
														
													
													
													
<td><?php echo $this->Functions->format_date($resume['ReqResume']['created_date']);?></td>
														
	<td class="sent_col"><?php echo $this->Functions->format_date($resume['ReqResume']['cv_sent_date']);?></td>
										

	
															
														
														
														
													</tr>
													
													
													<?php endforeach; ?>
													
													 
													
													
													<?php  foreach($resume_data as $resume):	?>
													
								<?php if($resume['ReqResume']['stage_title'] != 'Validation - Recruiter' && $resume['ReqResume']['stage_title'] != 'Validation - Account Holder'):?>

													<tr class="dn status_row">
													
			<th  style="text-align:center" width="50">
			
		<?php	if((strstr($resume['ReqResume']['stage_title'], 'Interview') && ($resume['ReqResume']['status_title'] != 'Rejected')
	&& ($resume['ReqResume']['status_title'] == 'Selected' && $resume['ReqResume']['stage_title'] != 'Final Interview')
	|| ($resume['ReqResume']['status_title'] == 'Scheduled') || ($resume['ReqResume']['status_title'] == 'Re-Scheduled')) ||
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
	<!--span style="font-size:9px">(<?php echo $resume['ReqResume']['stage_title'];?> <?php echo $resume['ReqResume']['status_title'];?>)</span-->

	
	</td>
														
									
							<td style="text-align:center">	
							
							<?php if($resume['ReqResume']['stage_title'] == 'Shortlist' && ($resume['ReqResume']['status_title'] == 'CV-Sent'
							|| $resume['ReqResume']['status_title'] == 'YRF')):
								$action = '1';?>																		
									
									<div class="btn-group">
									
										<span class="btn-mini alert alert-success alert-action legendView" rel="tooltip" title="CV Feedback Awaiting"  style="">
										FA  
										</span>
									
						<?php if(in_array($this->Session->read('USER.Login.id'), $ac_member)):?>
									
										<span data-toggle="dropdown" style="padding-top:1px;margin-left:1px;border:1px solid #fbfcbd" class=" dropdown-toggle  alert-action"><span class="caret" style="margin-top:7px;"></span></span>
									
										<ul class="dropdown-menu">
	<li><a  href="<?php echo $this->webroot;?>position/update_cv/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo  $resume['ReqResume']['id'];?>/shortlist/" val="40_60"  class="iframeBox sepV_a cboxElement"><i class="splashy-check"></i> Shortlisted</a></li>
	<li><a  href="<?php echo $this->webroot;?>position/update_cv/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo  $resume['ReqResume']['id'];?>/cv_reject/" val="40_60"  class="iframeBox sepV_a cboxElement"><i class="splashy-error_small"></i> Rejected</a></li>
										</ul>
										
								<?php endif; ?>
								
									</div>	
								
	<?php elseif($resume['ReqResume']['stage_title'] == 'Shortlist' && $resume['ReqResume']['status_title'] == 'Rejected'):
							?>
							
<span class="btn btn-mini alert alert-danger legendView" rel="tooltip" title="CV Rejected <?php echo $this->Functions->format_date($resume['ReqResume']['cv_shortlist_date']);?>" style="">
                R
            </span>									
									
								
<?php elseif(($resume['ReqResume']['stage_title'] == 'Shortlist' && $resume['ReqResume']['status_title'] == 'Shortlisted')
|| strstr($resume['ReqResume']['stage_title'], 'Interview') || $resume['ReqResume']['stage_title'] == 'Offer'
|| $resume['ReqResume']['stage_title'] == 'Joining'):
?>
								
<span class="btn btn-mini alert alert-success legendView" rel="tooltip" title="CV Shortlisted
 <?php echo $this->Functions->format_date($resume['ReqResume']['cv_shortlist_date']);?>" style="">
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
									
										<?php if($resume['ReqResume']['status_title'] == 'Scheduled' || $resume['ReqResume']['status_title'] == 'Re-Scheduled'):?>
										
										<span class="btn-mini alert alert-success alert-action legendView" rel="tooltip" title="<?php echo $int_level[0];?> Interview Scheduled" style="">
										<?php echo $int_lev_same == 'Final' ? 'F' : $int_lev_same;?> IS 
										</span>	
		
										<?php else: ?>
										
										
										<span class="btn-mini alert alert-success alert-action legendView" rel="tooltip" title="<?php echo $int_lev_order;?> Interview Schedule Awaited" style="">
										<?php echo $int_lev == '5' ? 'F' : $int_lev;?> ISA  
										</span>
									
										<?php endif; ?>
										
										
									<?php if(in_array($this->Session->read('USER.Login.id'), $ac_member)):?>


										<span data-toggle="dropdown" style="padding-top:1px;margin-left:1px;border:1px solid #fbfcbd" class=" dropdown-toggle  alert-action"><span class="caret" style="margin-top:7px;"></span></span>
										
										<ul class="dropdown-menu">
										<?php if($resume['ReqResume']['status_title'] == 'Shortlisted' || $resume['ReqResume']['status_title'] == 'Selected' || $resume['ReqResume']['status_title'] == 'Cancelled' || $resume['ReqResume']['status_title'] == 'No Show'
										):?>
										<li><a  href="<?php echo $this->webroot;?>position/schedule_interview/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo $resume['ReqResume']['id'];?>/<?php echo $int_lev;?>/?client_name=<?php echo $position_data['Client']['client_name'];?> <<?php echo ucwords($position_data['Contact']['first_name'].' '.$position_data['Contact']['last_name']);?>> <<?php echo $position_data['Contact']['email'];?>>" val="65_94"  class="iframeBox sepV_a cboxElement">Schedule Interview</a></li>

										<?php elseif($int_lev_same > 0 || $int_level_same == 'F'): ?>
										<li><a  href="<?php echo $this->webroot;?>position/view_interview_schedule/<?php echo  $resume['ReqResume']['id'];?>/<?php echo $int_lev_same;?>/" val="65_90"  class="iframeBox sepV_a cboxElement">View Interview Details</a></li>
										<?php endif; ?>
										
										<?php if($resume['ReqResume']['status_title'] == 'Scheduled'
										|| $resume['ReqResume']['status_title'] == 'Re-Scheduled'): $reschedule = '1';?>										
										<li><a  href="<?php echo $this->webroot;?>position/schedule_interview/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo $resume['ReqResume']['id'];?>/<?php echo $int_lev_same == 'Final' ? '5' : $int_lev_same;?>/reschedule/?client_name=<?php echo $position_data['Client']['client_name'];?> <<?php echo ucwords($position_data['Contact']['first_name'].' '.$position_data['Contact']['last_name']);?>> <<?php echo $position_data['Contact']['email'];?>>" val="65_94"  class="iframeBox sepV_a cboxElement">Re-Schedule Interview</a></li>
										
										<li class="divider"></li>
										
											<li><a  href="<?php echo $this->webroot;?>position/update_interview/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo  $resume['ReqResume']['id'];?>/shortlist/<?php echo $int_lev_same == 'Final' ? '5' : $int_lev_same;?>/" val="40_60"  class="iframeBox sepV_a cboxElement"><?php  if($int_level[0] > 0): echo $int_level[0]; endif;?> <i class="splashy-check"></i> Interview Selected </a></li>
											<li><a  href="<?php echo $this->webroot;?>position/update_interview/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo  $resume['ReqResume']['id'];?>/reject/<?php echo $int_lev_same == 'Final' ? '5' : $int_lev_same;;?>/" val="40_60"  class="iframeBox sepV_a cboxElement"><?php  if($int_level[0] > 0): echo $int_level[0]; endif;?> <i class="splashy-error_small"></i> Interview Rejected</a></li>
										<?php endif; ?>
										</ul>
										<?php elseif($int_lev_same > 0): ?>									
										<span data-toggle="dropdown" style="padding-top:1px;margin-left:1px;border:1px solid #fbfcbd" class=" dropdown-toggle  alert-action"><span class="caret" style="margin-top:7px;"></span></span>
										
										<ul class="dropdown-menu">										
										<li><a  href="<?php echo $this->webroot;?>position/view_interview_schedule/<?php echo  $resume['ReqResume']['id'];?>/<?php echo $int_lev_same;?>/" val="65_90"  class="iframeBox sepV_a cboxElement">View Interview Details</a></li>
										
										</ul>
										<?php endif; ?>
										
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
										
															<?php if(in_array($this->Session->read('USER.Login.id'), $ac_member)):?>
	
										<span data-toggle="dropdown" style="padding-top:1px;margin-left:1px;border:1px solid #fbfcbd" class=" dropdown-toggle  alert-action"><span class="caret" style="margin-top:7px;"></span></span>
										
										<ul class="dropdown-menu">
											<li><a  href="<?php echo $this->webroot;?>position/update_offer/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo  $resume['ReqResume']['id'];?>/offer_accept/" val="40_70"  class="iframeBox sepV_a cboxElement"><i class="splashy-check"></i> Accepted</a></li>
											<li><a  href="<?php echo $this->webroot;?>position/update_offer/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo  $resume['ReqResume']['id'];?>/offer_decline/" val="40_60"  class="iframeBox sepV_a cboxElement"><i class="splashy-error_small"></i> Declined</a></li>
										</ul>
										<?php endif; ?>
										
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
									<?php $st_title = $resume['ReqResume']['status_title'] == 'Deferred' ? 'Deferred' : 'Awaiting';
									 $st_code = $resume['ReqResume']['status_title'] == 'Deferred' ? 'JD' : 'JA';
									
									?>
									
									
										<span class="btn-mini alert alert-success alert-action" rel="tooltip" title="Joining <?php echo $st_title;?>"   style="background-image:none;cursor:default;margin-bottom:0px;">
										<?php echo  $st_code;?>  
										</span>
									
														<?php if(in_array($this->Session->read('USER.Login.id'), $ac_member)):?>
										
										<span data-toggle="dropdown" style="padding-top:1px;margin-left:1px;border:1px solid #fbfcbd" class=" dropdown-toggle  alert-action"><span class="caret" style="margin-top:7px;"></span></span>
										
									
										<ul class="dropdown-menu">
											<li><a  href="<?php echo $this->webroot;?>position/update_joining/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo  $resume['ReqResume']['id'];?>/joined/" val="40_70"  class="iframeBox sepV_a cboxElement">Joined</a></li>
											<li><a  href="<?php echo $this->webroot;?>position/update_joining/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo  $resume['ReqResume']['id'];?>/not_joined/" val="40_70"  class="iframeBox sepV_a cboxElement">Not Joined</a></li>
											<li><a  href="<?php echo $this->webroot;?>position/update_joining/<?php echo  $resume['Resume']['id'];?>/<?php echo $this->request->params['pass'][0];?>/<?php echo  $resume['ReqResume']['id'];?>/deferred/" val="40_70"  class="iframeBox sepV_a cboxElement">Deferred</a></li>
										</ul>
									<?php endif; ?>
									
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
										
										<span class="btn-mini alert alert-success alert-action legendView" rel="tooltip" title="Billing Pending"   style="">
										BP  
										</span>
															<?php if(in_array($this->Session->read('USER.Login.id'), $ac_member)):?>
		
										<span data-toggle="dropdown" style="padding-top:1px;margin-left:1px;border:1px solid #fbfcbd" class=" dropdown-toggle  alert-action"><span class="caret" style="margin-top:7px;"></span></span>
										
										
										
										<ul class="dropdown-menu">
											<li><a href="<?php echo $this->webroot;?>hiring/add_billing.php?res_id=<?php echo $resume['Resume']['id'];?>&req_res_id=<?php echo $resume['ReqResume']['id'];?>">Add Billing</a></li>
										</ul>
									<?php endif; ?>
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

												
					<?php if($multi_send_cv == '1' && in_array($this->Session->read('USER.Login.id'), $ac_member)):?>	
						<div class="btn-group upload_row sepH_b  no-print">
								<button data-toggle="dropdown" class="btn btn-info dropdown-toggle">Action <span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="javascript:void(0)" class="multi_send_cv">Send CV</a></li>
								</ul>
							</div>
						<?php endif; ?> 
						
						
				
					<?php if($multi_show_interview == '1' && in_array($this->Session->read('USER.Login.id'), $ac_member)):?>		
					<div class="btn-group status_row sepH_b dn">
								<button data-toggle="dropdown" class="btn btn-info  dropdown-toggle  no-print">Action <span class="caret"></span></button>
								<ul class="dropdown-menu  no-print">
									<li><a href="javascript:void(0)" class="multi_interview" rel="new">Schedule Interview</a></li>
									<?php if($reschedule == '1'): ?>
									<li><a href="javascript:void(0)"  class="multi_interview" rel="reschedule">Re-Schedule Interview</a></li>
									<?php endif; ?>
								</ul>
	
							</div>
							
						<?php endif; ?> 

		<hr class="status_row dn">										
<ul class="status_row dn statusLegend" style="margin-left:10px;">	
<li><span class="btn-mini legendBg" style="padding:0px 10px !important"> S </span> &nbsp; Shortlisted</li>
<li><span class="btn-mini legendBg" style="padding:0px 10px !important"> R </span> &nbsp; Rejected	</li>
<li><span class="btn-mini legendBg"> ISA  </span> &nbsp; Interview Schedule Awaited	</li>
<li><span class="btn-mini legendBg"> IS </span> &nbsp; Interview Scheduled / Re-Scheduled</li>
<li><span class="btn-mini legendBg"> FIS </span> &nbsp; Final Interview Scheduled</li>
<li><span class="btn-mini legendBg" style="padding:0px 7px !important"> OP  </span> &nbsp; Offer Pending</li>
<li><span class="btn-mini legendBg" style="padding:0px 7px !important"> OA </span> &nbsp; Offer Accepted</li>
<li><span class="btn-mini legendBg" style="padding:0px 7px !important"> OR </span> &nbsp; Offer Rejected</li>
<li><span class="btn-mini legendBg" style="padding:0px 7px !important"> JA  </span> &nbsp; Joining Awaited	</li>
<li><span class="btn-mini legendBg" style="padding:0px 10px !important"> J </span> &nbsp; Joined</li>
<li><span class="btn-mini legendBg" style="padding:0px 10px !important"> NJ </span> &nbsp; Not Joined</li>

<li><span class="btn-mini legendBg" style="padding:0px 7px !important"> JD </span> &nbsp; Joining Deferred</li>
<li><span class="btn-mini legendBg" style="padding:0px 7px !important"> BP </span> &nbsp; Billing Pending</li>
<li><span class="btn-mini legendBg" style="padding:0px 10px !important"> B </span> &nbsp; Billed </li>
</ul>
											<div class="alert alert-login no_record dn">
								<a class="close" data-dismiss="alert">×</a>
								<strong>Oops!</strong> No records found!.
							</div>
							
										</div>
								

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
$yrf =  $sent - ($shortlist  + $cv_reject);
$pending =  $this->Functions->get_req_tab_count($resume_data, 'pending','','validation');
$validate =  $this->Functions->get_req_tab_count($resume_data, 'validated','','validation');
$ac_reject =  $this->Functions->get_req_tab_count($resume_data, 'rejected','','validation');
?>									
									
									<div style="margin-left:0px" align="center" class="span6 tab-pane overall_status_row dn" id="mbox_overall">											
									

								
										<table data-msg_rowlink="a"  class="overall_status_row dn table table-striped table-bordered table-condensed" id="dt_inbox">
												<thead>
												<tr class="">
														<th width="250">Status</th>
														<th style="text-align:center">No. of Candidates</th>
													
													</tr>
											<tbody>
												<tr class="">
														<td>CRM Validation Pending</td>
														<th  style="text-align:center"><?php echo $pending;?></th>
														</tr>
														<tr class="">
														<td>CRM Validated</td>
														<th  style="text-align:center"><?php echo $validate;?></th>
														</tr>
															<tr class="">
														<td>CRM Rejected</td>
														<th  style="text-align:center"><?php echo $ac_reject;?></th>
														</tr>
																												
														<tr class="">
														<td>CV Sent</td>
														<th  style="text-align:center"><?php echo $sent;?></th>
														</tr>
													<tr class="">
														<td>CV Shortlisted </td>
														<th  style="text-align:center"><?php echo $shortlist;?></th>
														</tr>
														<tr class="">
														<td>CV Rejected</td>
														<th  style="text-align:center"><?php echo $cv_reject;?></th>
														</tr>
														<tr class="">
														<td>Feedback Awaiting</td>
														<th  style="text-align:center"><?php echo $yrf > 0 ? $yrf : '';?></th>
														</tr>
														<tr class="">
														<td>Candidates Interviewed</td>
														<th  style="text-align:center"><?php echo $interview;?></td>
														</tr>
														
														<tr class="">
														<td>Interview Dropouts </td>
														<th  style="text-align:center"><?php echo $interview_not_att;?></td>
														</tr>
														
														<tr class="">
														<td>Interview Rejected </td>
														<th  style="text-align:center"><?php echo $interview_reject;?></td>
														</tr>
														
														<tr class="">
														<td>Candidates Offered </td>
														<th  style="text-align:center"><?php echo $offer;?></td>
														</tr>
														
														<tr class="">
														<td>Offer Dropouts  </td>
														<th  style="text-align:center"><?php echo $offer_rej;?></td>
														</tr>
														
														<tr class="">
														<td>Candidates Joined  </td>
														<th  style="text-align:center"><?php echo $joined;?></td>
														</tr>
														
														<tr class="">
														<td>Candidates Billed </td>
														<th  style="text-align:center"><?php echo $billing;?></td>
														</tr>
											</tbody>
										</table>
								</div>
								
								
									
									
									
								</div>
							</div>
							
							<input type="hidden" value="<?php echo $schedule_interview?>" id="multi-inter">
							<input type="hidden" value="<?php echo $validate_checkbox?>" id="multi-validate">
							
						</div>
					</div>
					
					<div class="form-actions no-print">
	<a href="<?php echo $this->webroot;?>position/" rel="tooltip" title="Back to Positions"  class="jsRedirect"><button class="btn">Back</button></a>
				
	<a class="" href="javascript:void(0);" rel="tooltip" title="Print"  id="printId"><button class="btn btn-warning">Print</button></a>
			
					</div>
								
                    </div>
					
              <?php endif; ?>
				

				    
                </div>
            </div>
            
		</div>
		
		</div>
