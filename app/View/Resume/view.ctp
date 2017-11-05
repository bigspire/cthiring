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
                                    <a href="<?php echo $this->webroot;?>resume/">Resumes</a>
                                </li>
                            
                                <li>
                                  <?php echo ucwords($resume_data['Resume']['first_name'].' '.$resume_data['Resume']['last_name']);?>
                                </li>
                            </ul>
                        </div>
                    </nav>
					<div class="srch_buttons">
					
					<?php if($this->Session->read('USER.Login.id') == $resume_data['Resume']['created_by']):?>	

							<a href="<?php echo $this->webroot;?>hiring/edit_resume.php?id=<?php echo $this->request->params['pass'][0];?>"  class="sepV_a" title="Edit">
								<input value="Edit" type="button" class="btn btn-info"/>
							</a>
					<?php endif; ?>	
							
							</div>

							
						<?php echo $this->Session->flash();?>
							
							<div class="row-fluid">
							
							<div class="mbox">
							<div class="tabbable">
									<div class="heading">
								<ul class="nav nav-tabs">
										<li class="active"><a class="restabChange" rel="position"  href="#mbox_Personal" data-toggle="tab"><i class="splashy-contact_blue"></i>  Personal </a></li>
										<li class=""><a class="restabChange" rel="interview"  href="#mbox_Education" data-toggle="tab"><i class="splashy-document_letter_add"></i>  Education </a></li>
										<li class=""><a class="restabChange" rel="interview"  href="#mbox_Experience" data-toggle="tab"><i class="splashy-folder_classic_stuffed_add"></i> Experience </a></li>
										<li class=""><a class="restabChange" rel="interview"  href="#mbox_consultant" data-toggle="tab"><i class="splashy-contact_grey_edit"></i> Consultant Assessment </a></li>
								</ul>
									</div>
										
								
									
									
									
									
									<div class="tab-content"  style="overflow:auto;max-height:300px;">
										<div class="tab-pane active" id="mbox_Personal">
																						
							<div class="span4">
							<table class="table table-bordered table-striped dataTable" style="margin-bottom:0">
								<tbody>
								<tr>
										<td class="tbl_column">Position For</td>
										<td><?php echo ucwords($resume_data['Position']['job_title']);?></td>
									</tr>
									<tr class="">
										<td width="130" class="tbl_column">Candidate Name</td>
										<td><?php echo ucwords($resume_data['Resume']['first_name'].' '.$resume_data['Resume']['last_name']);?></td>	
									</tr>
									<tr class="">
										<td width="120" class="tbl_column">Email</td>
										<td><?php echo $this->Functions->get_format_text($resume_data['Resume']['email_id'], ';');?></td>	
									</tr>
									<tr class="">
										<td width="120" class="tbl_column">Mobile</td>
										<td><?php echo $this->Functions->get_format_text($resume_data['Resume']['mobile'], ',');?></td>	
									</tr>
									<tr>										
										<td width="120" class="tbl_column">DOB</td>
										<td><?php echo $this->Functions->format_date($resume_data['Resume']['dob']);?></td>	
									</tr>
									
									
									<tr>
										<td class="tbl_column">Current Designation</td>
										<td><?php echo $resume_data['Designation']['designation'];?></td>	
									</tr>
									<tr>
										<td class="tbl_column">Total Years of Exp</td>
										<td><?php echo $this->Functions->show_exp_details($resume_data['Resume']['total_exp']);?></td>	
									</tr>
									
								
								<tr>
										
										<td class="tbl_column">Created By</td>
										<td><?php echo $resume_data['Creator']['first_name'];?></td>
											
									</tr>
									
										<tr>
										
										<td class="tbl_column">Resume</td>
										<td>
									<?php if($resume_data['ResDoc']['resume'] == ''):?>	
										<a class="notify" data-notify-time = '7000' data-notify-title="In Progress!" data-notify-message="Downloading Resume... Please wait..."  href="<?php echo $this->webroot;?>hc/download/<?php echo $resume_data['Resume']['id']; ?>">Candidate Resume </a></td>
									<?php else: ?>	
									<a class="notify" data-notify-time = '2000' data-notify-title="In Progress!" data-notify-message="Downloading Resume... Please wait..."  href="<?php echo $this->webroot;?>resume/download_doc/<?php echo $resume_data['ResDoc']['resume']; ?>">Candidate Resume </a></td>

									<?php endif; ?>	
	
										
										
									</tr>
									
									<tr>
										
										<td class="tbl_column">Last Modified</td>
										<td><?php echo $this->Functions->format_date($resume_data['Resume']['modified_date']);?></td>
											
									</tr>
									
									
										<tr>
										
										<td  class="tbl_column" width="120"><b>Current Status</b></td>
										<td><?php echo $this->Functions->get_status_crisp($resume_data['ReqResume']['stage_title'],$resume_data['ReqResume']['status_title']);?></td>
											
									</tr>
									
								</tbody>
							</table>
							</div>

							<div class="span8">
							<table class="table table-bordered dataTable table-striped " style="margin-bottom:0">
								<tbody>	
									<tr>
										<td  class="" width="140">CTC</td>
										<td >
										<?php echo $resume_data['Resume']['present_ctc'];?>
										<?php echo $this->Functions->get_ctc_type($resume_data['Resume']['present_ctc_type']);?> - 
										<?php echo $resume_data['Resume']['expected_ctc'];?>
										<?php echo $this->Functions->get_ctc_type($resume_data['Resume']['expected_ctc_type']);?>
										</td>	
									</tr>	
									<tr>
									<td  class="tbl_column" width="">Notice Period</td>
										<td><?php echo $this->Functions->get_notice($resume_data['Resume']['notice_period']);?></td>	
									</tr>										
									<tr>
										<td class="tbl_column">Gender</td>
										<td><?php echo $this->Functions->check_gender($resume_data['Resume']['gender']);?></td>
									</tr>
									<tr>
										<td class="tbl_column">Marital Status</td>
										<td><?php echo $this->Functions->check_marital($resume_data['Resume']['marital_status']);?></td>
									</tr>
									<tr>
										<td class="tbl_column" width="140" style="width:140px">Family (Dependents) </td>
										<td><?php echo $resume_data['Resume']['family'];?></td>
									</tr>
									<tr class="">
										<td width="" class="tbl_column">Present Location</td>
										<td><?php echo $resume_data['Resume']['present_location'];?></td>	
									</tr>
									<tr class="">
										<td width="" class="tbl_column">Native Location</td>
										<td><?php echo $resume_data['Resume']['native_location'];?></td>	
									</tr>
									
									<?php if($resume_data['Resume']['education']):?>
									
										<tr>
										
										<td  class="tbl_column" width="120">Qualification</td>
										<td><?php echo $resume_data['Resume']['education'];?></td>
											
									</tr>
									
									<tr>										
										<td  class="" width="">Skills</td>
										<td><?php echo $resume_data['Resume']['skills'];?></td>
											
									</tr>
									
									<?php  endif; ?>	
									
									<?php if($resume_data['Resume']['present_employer']):?>
									
										<tr>
										
										<td class="tbl_column">Present Company</td>
										<td><?php echo $resume_data['Resume']['present_employer'];?></td>
									<?php endif; ?>	
									</tr>
									
										<tr>
										
										<td class="tbl_column">Snapshot</td>
										<td>
										<?php  $date = $resume_data['Resume']['modified_date'] ? $resume_data['Resume']['modified_date'] : $resume_data['Resume']['created_date']; ?>
<a class="notify" data-notify-time = '2000' data-notify-title="In Progress!" data-notify-message="Downloading Snapshot... Please wait..."  href="<?php echo $this->webroot;?>resume/profile_snapshot/<?php echo $resume_data['ResDoc']['resume']; ?>/<?php echo strtotime($date);?>/">Candidate Resume </a></td>

										</td>
											
									</tr>
										
									<tr>
										
										<td class="tbl_column">Created</td>
										<td><?php echo $this->Functions->format_date($resume_data['Resume']['created_date']);?></td>
											
									</tr>
									
									
									
								
								</tbody>
							</table>
							</div>
							</div>
										
							<div class="tab-pane" id="mbox_Education">
						
						<?php foreach($edu_data as $key => $edu): ?>
						<?php $margin = $key != '0' ? 'margin-top:10px' :  '';?>
						<div class="row-fluid" style="<?php echo $margin;?>">
							<div class="span6">
							<table class="table table-bordered table-striped dataTable" style="margin-bottom:0">
								<tbody>
									<tr>
										<td  class="tbl_column" width="120">Degree</td>
										<td><?php echo $edu['ResDegree']['degree']; ?></td>
									</tr>
									<tr>
										<td  class="tbl_column" width="120">Specialization</td>
										<td><?php echo $edu['ResSpec']['spec']; ?></td>	
									</tr>	
									<tr>
										<td class="tbl_column">College</td>
										<td><?php echo $edu['ResEdu']['college']; ?></td>
									</tr>
								
								</tbody>
							</table>
							</div>
                        					
							<div class="span6">
							<table class="table table-bordered  table-striped dataTable" style="margin-bottom:0">
								<tbody>
										<tr>
										<td class="tbl_column">University</td>
										<td><?php echo $edu['ResEdu']['university']; ?></td>
									</tr>
									<tr>
										<td class="tbl_column">% of Marks / Grade </td>
										<td><?php echo $edu['ResEdu']['percent_mark']; ?></td>
									</tr>
									<tr>
										<td  class="tbl_column" width="120">Course Type </td>
										<td><?php echo $this->Functions->get_course_type($edu['ResEdu']['course_type']); ?></td>
									</tr>	
									
									
								
									
								</tbody>
							</table>
							</div>
                    
						</div>
							<?php endforeach; ?>
					
					</div>
								
						<div class="tab-pane" id="mbox_Experience">
						
						<?php foreach($exp_data as $key => $exp): ?>
						<?php $margin = $key != '0' ? 'margin-top:10px' :  '';?>
						<div class="row-fluid" style="<?php echo $margin;?>">
						
							<div class="span6">
							<table class="table table-bordered table-striped dataTable" style="">
								<tbody>
									<tr>
										<td  class="tbl_column" width="120">Designation </td>
										<td><?php echo $exp['Designation']['designation']; ?></td>
									</tr>	
									<tr>
										<td class="tbl_column">Employment Period</td>
										<td><?php echo $this->Functions->check_exp($exp['ResExp']['experience']); ?></td>
									</tr>
									<tr>
										<td class="tbl_column">Area of Specialization/Expertise</td>
										<td><?php echo $exp['ResExp']['skills']; ?></td>
									</tr>
										<tr>
										<td class="tbl_column">Company Name</td>
										<td><?php echo $exp['ResExp']['company']; ?></td>	
									</tr>
								
								   <!--	<tr>
										<td class="tbl_column">CTC</td>
										<td>5.6 - 8.6 Lacs</td>
									</tr> -->
									
								   <!--<tr>
										<td class="tbl_column">Company Name</td>
										<td>Bigspire Software Pvt Ltd</td>	
									</tr> -->
								</tbody>
							</table>
							</div>
                        					
							<div class="span6">
							<table class="table table-bordered  table-striped dataTable" style="">
								<tbody>
										<tr>
										<td class="tbl_column">Current location of work</td>
										<td><?php echo $exp['ResExp']['work_location']; ?></td>
									</tr>
									
								
								<!--	<tr>
										<td class="tbl_column">Area of Specialization/Expertise</td>
										<td>PHP, JAVA, .Net, Salesforce, Angular JS, Selenium</td>
									</tr> -->
							<!--	<tr>
										<td  class="tbl_column" width="120">Notice Period</td>
										<td>3 Months</td>
									</tr>	-->
									<tr>
										<td  class="tbl_column" width="120">Other Vital Information (Position Specific)</td>
										<td><?php echo $exp['ResExp']['other_info']; ?></td>
									</tr>
									
								</tbody>
							</table>
							</div>
						</div>
						<?php endforeach; ?>
					 </div>
		<div class="tab-pane" id="mbox_consultant">
																						
							<div class="span6">
							<table class="table table-bordered  dataTable" style="margin-bottom:0">
								<tbody>
									<tr  class="tbl_row">
										<td width="150" class="tbl_column">Consultant Assessment</td>
										<td><?php echo $edu['Resume']['consultant_assess']; ?></td>	
									</tr>		
											<tr class="">
										<td width="120" class="tbl_column">Rate Technical Skills <span class="f_req"></span></td>
										<td>
<ul class="ratingList">
<?php $skill_parse = explode(',',$skill_data['Position']['tech_skill']);
$unserialize = unserialize($resume_data['Resume']['tech_skill_rate']);

foreach($skill_parse as $key => $skill):?>

  <li><?php echo ucwords($skill);?>
  <input name="tsr[]" type="hidden" value="<?php echo $unserialize[$skill];?>"  data-readonly   class="rating" data-fractions="2"/>
  <span class="label label-info"><?php echo $unserialize[$skill];?></span></li>
<?php endforeach; ?> 



</ul>
 
    <!-- Custom CSS -->
 
										</td>	
									</tr>								
								</tbody>
							</table>
							</div>
<div class="span6">
							<table class="table table-bordered  dataTable" style="margin-bottom:0">
								<tbody>
								
								<tr class="tbl_row">
										<td width="150" class="tbl_column">Interview Availability</td>
										<td><?php echo $edu['Resume']['interview_avail']; ?></td>	
									</tr>
									
									
									<tr class="">
										<td width="120" class="tbl_column">Rate Behavioural Skills </td>
										<td>
<ul class="ratingList">
 
<?php $skill_parse = explode(',',$skill_data['Position']['behav_skill']);
$unserialize = unserialize($resume_data['Resume']['behav_skill_rate']);
foreach($skill_parse as $key => $skill):?>

  <li><?php echo ucwords($skill);?>
  <input name="tsr[]" type="hidden" value="<?php echo $unserialize[$skill];?>"  data-readonly  class="rating" data-fractions="2"/>
  <span class="label label-info"><?php echo $unserialize[$skill];?></span></li>
<?php endforeach; ?> 

 
 
</ul>
 
										<!--label for="reg_city" generated="true" class="error">{$interview_availabilityErr}</label-->
										</td>	
									</tr>
																	
								</tbody>
							</table>
							</div>
							</div>
								</div>	
								</div>
							</div>
						
							
					
					
					</div>
					
					  <div class="row-fluid">
						<div class="span12">
							<div class="mbox">
								<div class="tabbable">
									<div class="heading">
										<ul class="nav nav-tabs">
										<li class="active"><a class="restabChange" rel="position"  href="#mbox_inbox" data-toggle="tab"><i class="splashy-application_windows_edit"></i>  Position Details </a></li>

											<li class=""><a class="restabChange" rel="interview"  href="#mbox_inbox" data-toggle="tab"><i class="splashy-calendar_day_event"></i>  Interview Details </a></li>
											<li><a href="#mbox_outbox" class="restabChange" rel="joined" data-toggle="tab"> <i class="splashy-group_blue_add"></i> Joining Details </a></li>
											<li><a href="#mbox_trash" class="restabChange"  rel="billing"  data-toggle="tab"><i class="splashy-ticket"></i> Billing Details</a></li>
											
										</ul>
									</div>
									<div class="tab-content"  style="overflow:auto;max-height:300px;">
										<div class="tab-pane active" id="mbox_inbox">
											<?php if(count($int_data) > 0 && count($position_data) > 0):?>
											
											<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_inbox">
												<thead>
													<tr>
													<th class="allCol position">Job Title</th>
													<th class="allCol position">Client</th>
													<th class="allCol position">Contact Person</th>
													<th class="allCol position">Contact Email</th>
													<th class="allCol position">Contact No.</th>
														<th class="allCol interview dn">Interview Date</th>
														<th class="allCol dn billing dn">Billing Date</th>	
														<th class="allCol interview dn">Stage</th>
														<th class="allCol interview dn">Status</th>	
														<th class="allCol joined dn">Offered Date</th>
														<th class="allCol joined dn">Joined Date</th>
														<th class="allCol dn billing">Offer CTC</th>	
														<th class="allCol dn billing">Billing Amount</th>
																											
														
													</tr>
												</thead>
												<tbody>
												
												<?php foreach($position_data as $position):?>	
												<tr class="allRow position">
												<td class="allCol position"><a href="<?php echo $this->webroot;?>position/view/<?php echo $position['Position']['id'];?>"><?php echo $position['Position']['job_title'];?></a></td>
													<td class="allCol position"><?php echo $position['Client']['client_name'];?></td>
													<td class="allCol position"><?php echo $position['Contact']['first_name'];?></td>
													<td class="allCol position"><?php echo $position['Contact']['email'];?></td>
													<td class="allCol position">
													<?php											
											echo $position['Contact']['phone'];?>
										<?php 
											if(str_replace(' ', '', $position['Contact']['mobile']) != '' && str_replace(' ', '', $position['Contact']['phone']) != ''):
											echo ', ';
											endif;
										?>
										<?php echo $position['Contact']['mobile'];?>
										</td>
												</tr>
												<?php endforeach;?>	
													
												<?php foreach($int_data as $key => $interview):?>	
												<tr class="allRow <?php echo $key == 0 ? 'joinedRow billingRow' : ''?>">
													
													
													
													<td class="allCol dn billing dn"></td>

														<td class="allCol interview dn"><?php if(!strstr($interview['ResInterview']['int_date'], '1970-01-01')): echo $this->Functions->format_date($interview['ResInterview']['int_date']); endif;?></td>
														<td class="allCol interview dn"><?php echo $interview['ResInterview']['stage_title'];?></td>
														<td class="allCol interview dn"><?php echo $interview['ResInterview']['status_title'];?></td>
														<td class="allCol dn joined"><?php echo $this->Functions->format_date($interview['ReqResume']['date_offer']);?></td>
														<td class="allCol dn joined"><?php echo $this->Functions->format_date($interview['ReqResume']['joined_on']);?></td>
														<td class="allCol dn billing"><?php echo $interview['ReqResume']['ctc_offer'] > 0 ? $interview['ReqResume']['ctc_offer'] : '';?></td>
														<td class="allCol dn billing"><?php echo $interview['ReqResume']['bill_ctc'] > 0 ? $interview['ReqResume']['bill_ctc'] : '';?></td>
													</tr>
												<?php endforeach;?>	
												</tbody>
											</table>	
											<?php else: ?>
														<div class="alert">
								<a class="close" data-dismiss="alert">×</a>
								<strong>Oops!</strong> No records found!.
							</div>
							
											<?php endif; ?>
										</div>
								
									
									
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
					<div class="form-actions">
									<a class="jsRedirect goback" val="<?php echo $this->request->referer();?>" href="javascript:void(0);"><button class="btn">Back</button></a>
								</div>
                    </div>
					
                   
				

				    
                </div>
            </div>
            
		</div>
		
		</div>
