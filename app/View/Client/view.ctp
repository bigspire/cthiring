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
                                    <a href="<?php echo $this->webroot;?>client/index/<?php echo $this->request->params['pass'][3];?>">Clients</a>
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
							
							   <?php if($create_position == '1' && $this->Session->read('USER.Login.roles_id') == '34'):?>
	<a href="<?php echo $this->webroot;?>position/add/<?php echo $this->request->params['pass'][0];?>" class="sepV_a jsRedirect" title="Add Position">
							<input value="Add Position" type="button" class="btn btn-info"></a>		
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
										<td><?php echo $client_data['Creator']['first_name'].' '.$client_data['Creator']['last_name'];?></td>
											
									</tr>	
									
									<tr>
										
										<td class="tbl_column">Created</td>
										<td><?php echo $this->Functions->format_date($client_data['Client']['created_date']);?></td>
											
									</tr>
									
									<?php if($client_data['Client']['remarks'] != ''):?>
									
									<tr>
										
										<th class="tbl_column">Revision Remarks</th>
										<td><?php echo $client_data['Client']['remarks'];?></td>
											
									</tr>
									
									<?php endif; ?>
									
									
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
									
							<?php if($client_data['Modifier']['first_name']):?>
									
									<tr>
										
										<td class="tbl_column">Modified By</td>
										<td><?php echo $client_data['Modifier']['first_name'].' '.$client_data['Modifier']['last_name'];?></td>
											
									</tr>	
									
									<tr>
										
										<td class="tbl_column">Modified</td>
										<td><?php echo $this->Functions->format_date($client_data['Client']['modified_date']);?></td>
											
									</tr>

						<?php endif; ?>
									
								<tr>
										
										<td  class="tbl_column"width="120">Status</td>
										<td>
									<?php if($client_data['Client']['status'] == '1'):?>
										<span title="Inactive Client" rel="tooltip" class="label label">Inactive</span>
										<?php elseif($client_data['ClientStatus']['status'] == 'R'):?>	
										<span title="Rejected" rel="tooltip" class="label label-inverse">Rejected</span>	
										<?php elseif($client_data['Client']['status'] == '2'):?>
										<span title="Awaiting for Approval" rel="tooltip" class="label label-warning">Awaiting Approval</span>
										<?php elseif($client_data['Client']['status'] == '0'):?>
										<span title="Active Client" rel="tooltip" class="label label-success">Active</span>
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
								<li class="active"><a href="#mbox_inbox" data-toggle="tab"><i class="splashy-group_blue"></i>  Client Contacts <span class="label label-success"> <?php echo count($contact_data);?></span></a></li>											
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
														<th width="120">Name</th>
														<th  width="120">Email</th>
														<th  width="80">Mobile</th>
														<th  width="120">Designation</th>
														<th  width="80">Landline</th>
														<th  width="80">Branch</th>
														<th  width="95">Created By</th>
														<th  width="75">Created</th>
													</tr>
												</thead>
												<tbody>
													
												<?php foreach($contact_data as $contact):?>
												<tr>
														<td><?php echo $this->Functions->get_contact_title($contact['Contact']['title']);?> <?php echo $contact['Contact']['first_name'];?> <?php echo $contact['Contact']['last_name'];?></td>
														<td><?php echo $this->Functions->get_format_text($contact['Contact']['email']);?></td>
														<td><?php echo $this->Functions->get_format_text($contact['Contact']['mobile']);?></td>
														<td><?php echo $contact['Designation']['designation'];?></td>
														
														<td><?php echo $this->Functions->get_format_text($contact['Contact']['phone']);?></td>
														<td><?php echo $contact['ContactBranch']['branch'];?></td>

														
														<td><?php echo $contact['Creator']['first_name'];?> <?php echo $contact['Creator']['last_name'];?></td>
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
		<?php if($client_data['Client']['is_approve'] == 'W'  &&  $this->request->params['pass'][3] == 'pending'):?>
<a class="iframeBox unreadLink" rel="tooltip" title="Approve Client" href="<?php echo $this->webroot;?>client/remark/<?php echo $client_data['Client']['id'];?>/<?php echo $this->request->params['pass'][1];?>/<?php echo $client_data['Client']['created_by'];?>/A/" val="40_60"><input type="button" value="Approve" class="btn btn btn-success"/></a>
<?php endif; ?>
<?php if($client_data['Client']['is_approve'] == 'W'  &&  $this->request->params['pass'][3] == 'pending' && $client_data['Client']['modified_date'] == '' ):?>
<a class="iframeBox unreadLink" rel="tooltip" title="Reject Client" href="<?php echo $this->webroot;?>client/remark/<?php echo $client_data['Client']['id'];?>/<?php echo $this->request->params['pass'][1];?>/<?php echo $client_data['Client']['created_by'];?>/R/" val="40_60"><input type="button" value="Reject" class="btn btn btn-danger"/></a>
<a href="<?php echo $this->webroot;?>client/index/pending/" rel="tooltip" title="Cancel and Back to Clients"  class="jsRedirect"><button class="btn">Cancel</button></a>
<?php else: ?>
<a href="<?php echo $this->webroot;?>client/index/<?php echo $this->request->params['pass'][3];?>" rel="tooltip" title="Back to Clients"  class="jsRedirect"><button class="btn">Back</button></a>

	<?php endif; ?>
	
	
	
	
	<?php if($client_data['Client']['is_approve'] == 'A'):?>
	<!--a href="<?php echo $this->webroot;?>client/" rel="tooltip" title="Back to Clients"  class="jsRedirect"><button class="btn">Back</button></a-->
	<?php endif; ?>

						
					</div>
                  
				  </div>
					
				    
                </div>
            </div>
            
		</div>
		
		</div>
