<div id="maincontainer" class="clearfix">
			<?php echo $this->element('header');?>
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
			
					
					<div class="row-fluid">
					
						 <div class="span12">

<div class="heading clearfix">
								<h3 class="pull-left">Positions <small>view</small></h3>
			
							</div>
							
						<?php echo $this->Session->flash();?>
							
							<div class="row-fluid">
							<div class="span6">
							<table class="table table-bordered dataTable" style="margin-bottom:0">
								
								<tbody>
								
									<tr>
										
										<td width="120" class="tbl_column">Job title</td>
										<td><?php echo $position_data['Position']['job_title'];?></td>
											
									</tr>
									<tr>
										
										<td width="120" class="tbl_column">Job Code</td>
										<td><?php echo $position_data['Position']['job_code'];?></td>
											
									</tr>
										<tr>
										
										<td class="tbl_column">Job Location</td>
										<td><?php echo $position_data['Position']['location'];?></td>
											
									</tr>
									<tr>
										
										<td class="tbl_column">No. of Vacancies</td>
										<td><?php echo $position_data['Position']['no_job'];?></td>
											
									</tr>
									<tr>
										
										<td class="tbl_column">Experience</td>
										<td><?php echo $position_data['Position']['min_exp'].' - '.$position_data['Position']['max_exp'];?> Years</td>
											
									</tr>
									<tr>
										
										<td class="tbl_column">CTC Range</td>
										<td><?php echo $position_data['Position']['ctc_from'].' - '.$position_data['Position']['ctc_to'];?> Lacs</td>
											
									</tr>
									<tr>
										
										<td class="tbl_column">Team Members</td>
										<td><?php echo $position_data[0]['team_member'];?></td>
											
									</tr>
										<tr>
										
										<td class="tbl_column">Created On</td>
										<td><?php echo $this->Functions->format_date($position_data['Position']['created_date']);?></td>
											
									</tr>
								</tbody>
							</table>
							</div>
							
												
                      
						<div class="span6">
							<table class="table table-bordered dataTable" style="margin-bottom:0">
								
								<tbody>
								<tr>
										
										<td  class="tbl_column"width="120">Qualification</td>
										<td><?php echo $position_data['Position']['education'];?></td>
											
									</tr>
									<tr>
										
										<td  class="tbl_column"width="120">Job Description</td>
										<td><a class="notify" data-notify-time = '7000' data-notify-title="In Progress!" data-notify-message="Downloading JD... Please wait..."   href="<?php echo $this->webroot;?>hc/download/<?php echo $position_data['Position']['id']; ?>/jd/">Download</a></td>
											
									</tr>
									<tr>
										
										<td  class="tbl_column"width="120">Client</td>
										<td><?php echo $position_data['Client']['client_name'];?></td>
											
									</tr>
									<tr>
										
										<td  class="tbl_column"width="120">Contact Person</td>
										<td><?php echo $position_data['Contact']['first_name'];?></td>
											
									</tr>
									<tr>
										
										<td  class="tbl_column"width="120">Contact Email</td>
										<td><?php echo $position_data['Contact']['email'];?></td>
											
									</tr>
									<tr>
										
										<td  class="tbl_column"width="120">Contact No.</td>
										<td><?php											
											echo $position_data['Contact']['phone'];?>
										<?php 
											if(str_replace(' ', '', $position_data['Contact']['mobile']) != '' && str_replace(' ', '', $position_data['Contact']['phone']) != ''):
											echo ', ';
											endif;
										?>
										<?php echo $position_data['Contact']['mobile'];?></td>
											
									</tr>
									
									
									<tr>
										
										<td class="tbl_column">Created By</td>
										<td><?php echo $position_data['Creator']['first_name'];?></td>
											
									</tr>
								
									<tr>
										
										<td class="tbl_column">Modified On</td>
										<td><?php echo $this->Functions->format_date($position_data['Position']['created_date']);?></td>
											
									</tr>
								</tbody>
							</table>
							</div>
                        
					
					</div>
					
					  <div class="row-fluid">
						<div class="span12">
							<div class="mbox">
								<div class="tabbable">
									<div class="heading">
										<ul class="nav nav-tabs">
											<?php $total = $this->Functions->get_req_tab_count($resume_data, 'CV-Sent', 'status');?>
											<li class="active"><a href="#mbox_inbox" class="tabChange" val="<?php echo $total;?>" rel="all"  data-toggle="tab"><i class="splashy-mail_light_down"></i>  CV Sent <?php if($total):?><span class="label label-success"> <?php echo $total;?></span><?php endif; ?></a></li>
											<?php $shortlist = $this->Functions->get_req_tab_count($resume_data, 'Shortlisted', 'status');?>
											<li><a href="#mbox_outbox" class="tabChange" rel="Shortlisted" val="<?php echo $shortlist;?>" data-toggle="tab"> CV Shortlisted <?php if($shortlist):?><span class="label label-warning"><?php echo $shortlist;?></span><?php endif; ?></a></li>
											<?php $cv_reject = $this->Functions->get_req_tab_count($resume_data, '', '','shorlist_reject');?>
											<li><a href="#mbox_outbox" class="tabChange" rel="cv_reject" val="<?php echo $cv_reject;?>" data-toggle="tab"> CV Rejected <?php if($cv_reject):?><span class="label label-important"><?php echo $cv_reject;?></span><?php endif; ?></a></li>
											
											<?php $yrf =  $this->Functions->get_req_tab_count($resume_data, 'YRF', 'status');?>
											<li><a href="#mbox_trash" class="tabChange" rel="YRF" val="<?php echo $yrf;?>" data-toggle="tab">Feedback Awaiting <?php if($yrf):?><span class="label"><?php echo $yrf;?></span><?php endif; ?></a></li>
											<?php $interview =  $this->Functions->get_req_tab_count($resume_data, 'First Interview-Final Interview-Second Interview', 'stage');?>
											<li><a href="#mbox_trash" class="tabChange" rel="Interview"  val="<?php echo $interview;?>" data-toggle="tab"> Interviewed <?php if($interview):?><span class="label label-info"><?php echo $interview;?></span><?php endif; ?></a></li>
											<?php $interview_not_att =  $this->Functions->get_req_tab_count($resume_data, 'First Interview-Final Interview-Second Interview', 'stage', 'interview_not_att');?>
											<li><a href="#mbox_trash" class="tabChange" rel="NoShow" val="<?php echo $interview_not_att;?>" data-toggle="tab"> Interview Dropouts <?php if($interview_not_att):?><span class="label label-inverse"><?php echo $interview_not_att;?></span><?php endif; ?></a></li>
											<?php $interview_reject =  $this->Functions->get_req_tab_count($resume_data, 'First Interview-Final Interview-Second Interview', 'stage', 'interview_reject');?>
											<li><a href="#mbox_trash" class="tabChange" rel="InterviewReject" val="<?php echo $interview_reject;?>" data-toggle="tab"> Interview Rejected <?php if($interview_reject):?><span class="label label-important"><?php echo $interview_reject;?></span><?php endif; ?></a></li>
											<?php $offer =  $this->Functions->get_req_tab_count($resume_data, 'Offer','stage');?>
											<li><a href="#mbox_trash" class="tabChange" rel="Offer" val="<?php echo $offer;?>" data-toggle="tab"> Offered  <?php if($offer):?><span class="label label-success"><?php echo $offer;?></span><?php endif; ?></a></li>
											<?php $offer_rej =  $this->Functions->get_req_tab_count($resume_data, 'OfferReject','','offer_reject');?>
											<li><a href="#mbox_trash" class="tabChange" rel="OfferReject" val="<?php echo $offer_rej;?>" data-toggle="tab">Offer Dropouts <?php if($offer_rej):?><span class="label label-inverse"><?php echo $offer_rej;?></span><?php endif; ?></a></li>
											<?php $joined =  $this->Functions->get_req_tab_count($resume_data, 'Joined','status');?>
											<li><a href="#mbox_trash" class="tabChange" rel="Joined" val="<?php echo $joined;?>" data-toggle="tab">Joined <?php if($joined):?><span class="label label-warning"><?php echo $joined;?></span><?php endif; ?></a></li>
											<?php $billing =  $this->Functions->get_req_tab_count($resume_data, '','','billing');?>
											<li><a href="#mbox_trash" class="tabChange" rel="Billing" val="<?php echo $billing;?>" data-toggle="tab"> Billed <?php if($billing):?><span class="label label-success"><?php echo $billing;?></span><?php endif; ?></a></li>
											
										</ul>
									</div>
									<div class="tab-content" style="overflow:auto;max-height:300px;">
										<div class="tab-pane active" id="mbox_inbox">											
											
											<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR cvTable" id="dt_inbox">
												<thead>
													<tr>
														<th width="120">Candidate Name</th>
														<th  width="100">Mobile</th>
														<th  width="120">Email</th>
														<th  width="100">Present Company</th>
														<th  width="120">Present Designation</th>
														<th  width="100">Present Location</th>
														<th  width="80">Present CTC</th>
														<th  width="80">Expected CTC</th>
														<th  width="80">Current Status</th>
														<th  width="90" class="dn reasonCol">Reason</th>
														<th  width="90"  class="noticePeriod">Notice Period</th>
														<th  width="90" class="">CV Owner</th>
														<th  width="110" class="">CV Sent</th>
														<th  width="90" class="dn joinCol">Offered On</th>
														<th  width="90" class="dn offerCol">Offered On</th>
														<th  width="90" class="dn joinCol">Joined On</th>
														<!--th  width="110" class="">Modified</th-->
														<th  width="40"><i class="icon-adt_atach"></i></th>
													</tr>
												</thead>
												<tbody>
													
													<?php foreach($resume_data as $resume):													
													// avoid duplicates	
													$dup = '';
													if(in_array($resume['Resume']['id'], $resume_id)):
														$dup = 'duplicate';													
													endif;	
													$resume_id[] = $resume['Resume']['id'];													

													
													// for cv reject
													$cv_reject = '';
													if($resume['ReqResumeStatus']['stage_title'] == 'Shortlist' && $resume['ReqResumeStatus']['status_title']  == 'Rejected'){
														$cv_reject = 'cv_reject';
													}
													$dup_interview = '';
													if(!in_array($resume['Resume']['id'], $resume_int_id) && ($resume['ReqResumeStatus']['stage_title'] == 'First Interview' || $resume['ReqResumeStatus']['stage_title'] == 'Second Interview'  || $resume['ReqResumeStatus']['stage_title'] == 'Final Interview')):
													$resume_int_id[] = $resume['Resume']['id'];	
													else:
													$dup_interview = 'duplicateInt';
													endif;
													
													// for job offer
													$dup_offer = '';
													if(!in_array($resume['Resume']['id'], $resume_offer_id) && ($resume['ReqResumeStatus']['stage_title'] == 'Offer')):
													$resume_offer_id[] = $resume['Resume']['id'];	
													else:
													$dup_offer = 'duplicateOffer';
													endif;
													
													// for billing
													$dup_bill = '';
													if(!in_array($resume['Resume']['id'], $resume_bill_id) && ($resume['ReqResume']['bill_ctc'] > 0)):
													$resume_bill_id[] = $resume['Resume']['id'];	
													else:
													$dup_bill = 'duplicateBill';
													endif;
													?>
													<tr class="<?php echo $dup_bill;?>  <?php echo $dup_offer;?> <?php echo $dup_interview;?> <?php echo $cv_reject;?> <?php echo $dup;?>  allRow <?php echo $this->Functions->format_string($resume['ReqResumeStatus']['stage_title']);?>  <?php echo $this->Functions->format_string($resume['ReqResumeStatus']['status_title']);?>
													 <?php echo $this->Functions->get_int_status($resume['ReqResumeStatus']['stage_title'],$resume['ReqResumeStatus']['status_title']);?> <?php echo $this->Functions->get_offer_reject($resume['ReqResumeStatus']['stage_title'],$resume['ReqResumeStatus']['status_title']);?>
													 <?php echo $resume['ReqResume']['bill_ctc'] > '0' ? 'Billing' : '';?>">
														<td>														
														<a href="<?php echo $this->webroot;?>resume/view/<?php echo $resume['Resume']['id'];?>/"><?php echo ucwords($resume['Resume']['first_name'].' '.$resume['Resume']['last_name']);?></a></td>
														<td><span><?php echo $this->Functions->get_format_text($resume['Resume']['mobile']);?></span></td>
														<td><?php echo $this->Functions->get_format_text($resume['Resume']['email_id']);?></td>
														<td><?php echo $resume['Resume']['present_employer'];?></td>
														<td><?php echo $resume['Designation']['designation'];?></td>
														<td><?php echo $resume['ResLoc']['location'];?></td>
														<td><?php if(!empty($resume['Resume']['present_ctc'])): echo $resume['Resume']['present_ctc'].' L'; endif; ?></td>
														<td><?php if(!empty($resume['Resume']['present_ctc'])): echo $resume['Resume']['present_ctc'].' L'; endif; ?></td>
														<td><?php echo $resume['ReqResume']['stage_title'].' / '.$resume['ReqResume']['status_title'];?></td>
														<td  class="dn reasonCol"><?php echo $resume['Reason']['reason'];?></td>
														<td  class="noticePeriod"><?php echo $resume['Resume']['notice_period'];?> Days</td>
														<td><?php echo $resume['Creator']['first_name'];?></td>
														<td><?php echo $this->Functions->format_date($resume['ReqResume']['created_date']);?></td>
														
														<td  class="dn offerCol"><?php echo $this->Functions->format_date($resume['ReqResume']['date_offer']);?></td>

														<td  class="dn joinCol"><?php echo $this->Functions->format_date($resume['ReqResume']['date_offer']);?></td>
														<td  class="dn joinCol"><?php echo $this->Functions->format_date($resume['ReqResume']['joined_on']);?></td>
														
														<!--td><?php echo $this->Functions->format_date($resume['ReqResume']['modified_date']);?></td-->
														<td><a class="notify" data-notify-time = '7000' data-notify-title="In Progress!" data-notify-message="Downloading Resume... Please wait..."   href="<?php echo $this->webroot;?>hc/download/<?php echo $resume['Resume']['id']; ?>">Resume</a></td>
													</tr>
													
												<?php endforeach; ?>
												
												
												</tbody>
											</table>	
											
											<div class="alert alert-login no_record dn">
								<a class="close" data-dismiss="alert">×</a>
								<strong>Oops!</strong> No records found!.
							</div>
							
										</div>
								
									
									
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
					<?php if(!strstr($this->request->referer(),'index')):?>
					<div class="form-actions">
									<a  class="jsRedirect goback" val="<?php echo $this->request->referer();?>"  href="javascript:void(0);"><button class="btn">Back</button></a>
					</div>
					<?php endif; ?>			
								
                    </div>
					
                   
				

				    
                </div>
            </div>
            
		</div>
		
		</div>
