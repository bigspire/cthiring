<div id="maincontainer" class="clearfix">
			<?php echo $this->element('header');?>
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
			
					
					<div class="row-fluid">
					
						 <div class="span12">

<div class="heading clearfix">
								<h3 class="pull-left">Resume <small>view</small></h3>
		
							</div>
							
						<?php echo $this->Session->flash();?>
							
							<div class="row-fluid">
							<div class="span6">
							<table class="table table-bordered dataTable" style="margin-bottom:0">
								
								<tbody>
								
									<tr>
										
										<td width="120" class="tbl_column">Candidate Name</td>
										<td><?php echo ucwords($resume_data['Resume']['first_name'].' '.$resume_data['Resume']['last_name']);?></td>
											
									</tr>
									<tr>
										
										<td width="120" class="tbl_column">Mobile</td>
										<td><?php echo $this->Functions->get_format_text($resume_data['Resume']['mobile'], ',');?></td>
											
									</tr>
										<tr>
										
										<td class="tbl_column">Email</td>
										<td><?php echo $this->Functions->get_format_text($resume_data['Resume']['email_id'], ';');?></td>
											
									</tr>
									<tr>
										
										<td class="tbl_column">Location</td>
										<td><?php echo $resume_data['ResLocation']['location'];?></td>
											
									</tr>
										<tr>
										
										<td class="tbl_column">Created By</td>
										<td><?php echo $resume_data['Creator']['first_name'];?></td>
											
									</tr>
									<tr>
										
										<td class="tbl_column">Created</td>
										<td><?php echo $this->Functions->format_date($resume_data['Resume']['created_date']);?></td>
											
									</tr>
									<tr>
										
										<td class="tbl_column">Modified</td>
										<td><?php echo $this->Functions->format_date($resume_data['Resume']['modified_date']);?></td>
											
									</tr>
									
										<tr>
										
										<td class="tbl_column">Resume</td>
										<td><a class="notify" data-notify-time = '7000' data-notify-title="In Progress!" data-notify-message="Downloading Resume... Please wait..."  href="<?php echo $this->webroot;?>hc/download/<?php echo $resume_data['Resume']['id']; ?>">Candidate Resume </a></td>
											
									</tr>
								</tbody>
							</table>
							</div>
							
												
                      
						<div class="span6">
							<table class="table table-bordered dataTable" style="margin-bottom:0">
								
								<tbody>
								<tr>
										
										<td  class="tbl_column" width="120">Qualification</td>
										<td><?php echo $resume_data['Resume']['education'];?></td>
											
									</tr>
									<tr>
										
										<td  class="tbl_column" width="120">Experience</td>
										<td><?php echo $resume_data['Resume']['total_exp'];?> Yr(s)</td>
											
									</tr>	
									<tr>
										
										<td class="tbl_column">Present Designation</td>
										<td><?php echo $resume_data['Designation']['designation'];?></td>
											
									</tr>
									<tr>
										
										<td class="tbl_column">Present Company</td>
										<td><?php echo $resume_data['Resume']['present_employer'];?></td>
											
									</tr>
									
									<tr>
										
										<td class="tbl_column">Present CTC</td>
										<td><?php if(!empty($resume_data['Resume']['present_ctc'])): echo $resume_data['Resume']['present_ctc'].' L'; endif; ?></td>
											
									</tr>
									<tr>
										
										<td class="tbl_column">Expected CTC</td>
										<td><?php if(!empty($resume_data['Resume']['expected_ctc'])): echo $resume_data['Resume']['expected_ctc'].' L'; endif; ?></td>
											
									</tr>
									<tr>
										
										<td  class="tbl_column" width="120">Notice Period</td>
										<td><?php echo $resume_data['Resume']['notice_period'];?> Days</td>
											
									</tr>	
								<tr>
										
										<td  class="tbl_column" width="120">Status</td>
										<td><?php echo $resume_data['ReqResume']['stage_title'];?> - <?php echo $resume_data['ReqResume']['status_title'];?></td>
											
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
										<li class="active"><a class="restabChange" rel="position"  href="#mbox_inbox" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Position Details </a></li>

											<li class=""><a class="restabChange" rel="interview"  href="#mbox_inbox" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Interview Details </a></li>
											<li><a href="#mbox_outbox" class="restabChange" rel="joined" data-toggle="tab"> Joining Details </a></li>
											<li><a href="#mbox_trash" class="restabChange"  rel="billing"  data-toggle="tab">Billing Details</a></li>
											
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
