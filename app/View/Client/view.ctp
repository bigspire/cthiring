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
                                    <a href="<?php echo $this->webroot;?>client/">Clients</a>
                                </li>
                            
                                <li>
                                   <?php echo ucwords($client_data['Client']['client_name']);?>
                                </li>
                            </ul>
                        </div>
                    </nav>

						
					<div class="srch_buttons">
						<div style="text-align:right;">
							<?php if($this->Session->read('USER.Login.id') == $client_data['Client']['created_by'] && $client_data['Client']['status'] == '1'):?>
							<a href="<?php echo $this->webroot;?>client/edit/<?php echo $this->request->params['pass'][0];?>" class="sepV_a jsRedirect" title="Edit Client">
							<input value="Edit" type="button" class="btn btn-info"></a>
							<?php endif; ?>
						</div>
					</div>	
						
							
							<div class="row-fluid">
							<div class="span6">
							<table class="table table-bordered dataTable" style="margin-bottom:0">
								
								<tbody>
								
									<tr>
										
										<td width="120" class="tbl_column">Client Name</td>
										<td><?php echo ucwords($client_data['Client']['client_name']);?></td>
											
									</tr>
									
									<tr>
										
										<td width="120" class="tbl_column">Address</td>
										<td><?php echo $client_data['Client']['door_no'];?>
										<?php echo ucwords($client_data['Client']['street_name']);?>
										<?php echo ucwords($client_data['Client']['area_name']);?>
										
										</td>
											
									</tr>
									
									<tr>
										
										<td width="" class="tbl_column">City / Town</td>
										<td><?php echo $client_data['Client']['city'];?></td>
											
									</tr>
									
										<tr>
										
										<td width="" class="tbl_column">Account Holder</td>
										<td><?php echo $accountList;?></td>
											
									</tr>
									
									
										<tr>
										
										<td class="tbl_column">Created By</td>
										<td><?php echo $client_data['Creator']['first_name'];?></td>
											
									</tr>	
									
									<tr>
										
										<td class="tbl_column">Created</td>
										<td><?php echo $this->Functions->format_date($client_data['Client']['created_date']);?></td>
											
									</tr>
									
									
								</tbody>
							</table>
							</div>
							
												
                      
						<div class="span6">
							<table class="table table-bordered dataTable" style="margin-bottom:0">
								
								<tbody>
								
									<tr>
										
										<td width="" class="tbl_column">State</td>
										<td><?php echo $client_data['State']['state'];?></td>
											
									</tr>
									
										<tr>
										
										<td width="" class="tbl_column">District</td>
										<td><?php echo $client_data['ResLocation']['location'];?></td>
											
									</tr>
										<tr>
										
										<td width="" class="tbl_column">Pincode</td>
										<td><?php echo $client_data['Client']['pincode'];?></td>
											
									</tr>
								<tr>
										
										<td class="tbl_column">Modified By</td>
										<td><?php echo $client_data['Modifier']['first_name'];?></td>
											
									</tr>	
									
									<tr>
										
										<td class="tbl_column">Modified</td>
										<td><?php echo $this->Functions->format_date($client_data['Client']['modified_date']);?></td>
											
									</tr>	
									
								<tr>
										
										<td  class="tbl_column"width="120">Status</td>
										<td>
										<?php if($client_data['Client']['status'] == '1'):?>
										<span class="label label">Inactive</span>
										<?php elseif($client_data['Client']['status'] == '2'):?>
										<span title="Awaiting for Approval" rel="tooltip" class="label label-warning">Awaiting Approval</span>
										<?php else:?>
										<span class="label label-success">Active</span>
										<?php endif; ?>
										</td>
											
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
								<li class="active"><a href="#mbox_inbox" data-toggle="tab"><i class="splashy-group_blue"></i>  Client Contacts <span class="label label-info"> <?php echo count($contact_data);?></span></a></li>											
										<?php if($client_data['Client']['status'] == '1'):?>
											<li class=""><a href="#mbox_inbox2" class="tabChange" data-toggle="tab"><i class="splashy-documents_okay"></i>  Client Requirements <span class="label label-info"><?php echo count($position_data);?> </span></a></li>											
										<?php endif; ?>
										</ul>
									</div>
									<div class="tab-content"  style="overflow:auto;max-height:300px;">
										<div class="tab-pane active" id="mbox_inbox">
											<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_inbox">
												<thead>
													<tr>
														<th width="120">First Name</th>
														<th  width="70">Last Name</th>
														<th  width="120">Designation</th>
														<th  width="120">Email</th>
														<th  width="80">Phone</th>
														<th  width="80">Mobile</th>
														<th  width="95">Created By</th>
														<th  width="75">Created</th>
													</tr>
												</thead>
												<tbody>
													
												<?php foreach($contact_data as $contact):?>
												<tr>
														<td><?php echo $contact['Contact']['first_name'];?></td>
														<td><?php echo $contact['Contact']['last_name'];?></td>
														<td><?php echo $contact['Designation']['designation'];?></td>

														<td><?php echo $this->Functions->get_format_text($contact['Contact']['email']);?></td>
														<td><?php echo $this->Functions->get_format_text($contact['Contact']['phone']);?></td>
														<td><?php echo $this->Functions->get_format_text($contact['Contact']['mobile']);?></td>
														<td><?php echo $contact['Creator']['first_name'];?></td>
														<td><?php echo $this->Functions->format_date($contact['Contact']['created_date']);?></td>
													</tr>
												<?php endforeach; ?>
												</tbody>
											</table>	
										</div>
								
									
									<div class="tab-pane" id="mbox_inbox2">
											<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_inbox">
												<thead>
													<tr>
														<th width="150">Job Title</th>	
														<th width="80">No. of Openings</th>																
														<th width="90" style="text-align:center">CV Sent</th>
														<th width="120" style="text-align:center">Joined</th>
														<th width="120">Status</th>
														<th width="120">Created By</th>
														<th width="120">Created</th>
														<th width="120">Modified</th>
													</tr>
												</thead>
												<tbody>
												
						<?php foreach($position_data as $position):?>

								<tr>
										<td><?php echo $position['Position']['job_title'];?></td>
										<td><?php echo $position['Position']['no_job'];?></td>
										<td  width=""  style="text-align:center"><?php echo $position[0]['cv_sent'];?></td>

						
						<td width=""  style="text-align:center"><?php echo $this->Functions->get_total_joined($position[0]['joined']);?></td>
						<td><span class="label label-<?php echo $this->Functions->get_req_status_color($position['ReqStatus']['title']);?>"><?php echo $position['ReqStatus']['title'];?></span>			
										</td>
						<td><?php echo $position['Creator']['first_name'];?></td>
						<td><?php echo $this->Functions->format_date($position['Position']['created_date']);?></td>
						<td><?php echo $this->Functions->format_date($position['Position']['modified_date']);?></td>
				
						</tr>
						
				<?php endforeach; ?>
			
										</table>	
											</div>
										
								
								
									</div>
									
									
									
									
								</div>
							</div>
							
						</div>
					</div>
					
	<div class="form-actions">
		<?php if($client_data['Client']['is_approve'] == 'W' && $this->Session->read('USER.Login.roles_id') == '39'):?>
<a class="iframeBox unreadLink jsRedirect" rel="tooltip" title="Approve Client" href="<?php echo $this->webroot;?>client/remark/approve/<?php echo $client_data['Client']['id'];?>" val="40_50"><input type="button" value="Approve" class="btn btn btn-success"/></a>
<a class="iframeBox unreadLink jsRedirect" rel="tooltip" title="Reject Client" href="<?php echo $this->webroot;?>client/remark/reject/<?php echo $client_data['Client']['id'];?>" val="40_50"><input type="button" value="Reject" class="btn btn btn-danger"/></a>
<a href="<?php echo $this->webroot;?>client/index/pending/" rel="tooltip" title="Cancel and Back to Clients"  class="jsRedirect"><button class="btn">Cancel</button></a>
	<?php endif; ?>
	
	<?php if($client_data['Client']['is_approve'] == 'A'):?>
	<a href="<?php echo $this->webroot;?>client/" rel="tooltip" title="Back to Clients"  class="jsRedirect"><button class="btn">Back</button></a>
	<?php endif; ?>

						
					</div>
                  
				  </div>
					
				    
                </div>
            </div>
            
		</div>
		
		</div>
