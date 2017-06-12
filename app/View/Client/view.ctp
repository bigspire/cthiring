<div id="maincontainer" class="clearfix">
			<?php echo $this->element('header');?>
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
			
					
					<div class="row-fluid">
					
						 <div class="span12">

<div class="heading clearfix">
								<h3 class="pull-left">Client <small>view</small></h3>
			
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
										
										<td width="" class="tbl_column">Phone</td>
										<td><?php echo $client_data['Client']['phone'];?></td>
											
									</tr>
									<tr>
										
										<td width="" class="tbl_column">Location</td>
										<td><?php echo $client_data['ResLocation']['location'];?></td>
											
									</tr>	
									
										<tr>
										
										<td width="" class="tbl_column">Address</td>
										<td><?php echo $client_data['Client']['address'];?></td>
											
									</tr>
									
									
								</tbody>
							</table>
							</div>
							
												
                      
						<div class="span6">
							<table class="table table-bordered dataTable" style="margin-bottom:0">
								
								<tbody>
								
								<tr>
										
										<td class="tbl_column">Created By</td>
										<td><?php echo $client_data['Creator']['first_name'];?></td>
											
									</tr>	
									
									<tr>
										
										<td class="tbl_column">Created</td>
										<td><?php echo $this->Functions->format_date($client_data['Client']['created_date']);?></td>
											
									</tr>	
									
								<tr>
										
										<td  class="tbl_column"width="120">Status</td>
										<td>
										<?php if($client_data['Client']['status'] == '1'):?>
										<span class="label label">Inactive</span>
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
											<li class="active"><a href="#mbox_inbox" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Client Contacts <span class="label label-info"> <?php echo count($contact_data);?></span></a></li>
											
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
														<td><a class="iframeBox" val="90_80" href="<?php echo $this->webroot;?>position/index/<?php echo $contact['Contact']['id'];?>/"><?php echo $contact['Contact']['first_name'];?></a></td>
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
								
									
									
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
					<div class="form-actions">
									<a href="<?php echo $this->request->referer();?>" class="jsRedirect"><button class="btn">Back</button></a>
								</div>
                    </div>
					
                   
				

				    
                </div>
            </div>
            
		</div>
		
		</div>
