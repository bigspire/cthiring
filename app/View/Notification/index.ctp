
		<div id="maincontainer" class="clearfix">
		
			<?php echo $this->element('header');?>
			
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
				
					<div class="row-fluid footer_div">
						 <div class="span12">
						 
						 	<nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="<?php echo $this->webroot;?>home/"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot;?>notifications/">Alerts</a>
                                </li>
                            
                                <li>
                                    Notifications
                                </li>
                            </ul>
                        </div>
                    </nav>
					
					
						
						
					<?php echo $this->Session->flash();?>
				
	

						
	<?php echo $this->Form->create('Notification', array('id' => 'formID','class' => 'formID srchForm')); ?>
		


				<div class="row-fluid">	

			<div class="span7">			
<h3 class="heading">Resumes</h3>
						
					<table class="table table-striped table-bordered dataTable stickyTable"   id="dt_j">
								<thead>
									<tr>
								<th width="60"> Code</th>		
										<th width="90">Candidate </th>										
										<th width="80" style="text-align:center">Actions</th>
										<th width="90">Client</th>
										

										<th width="90">Job Title</th>
										
										<th width="90">Status</th>

										<th width="85">Created</th>
										
										<th width="85"> Updated</th>
										
										
									</tr>
								</thead>

								<tbody>
								
								
										
	<?php foreach($data2 as $req):?>
			
			<tr>
			
			<td>
										<?php 
										if($req['Resume']['code']):
										echo $req['Resume']['code'];
										else:										
										echo 'MH-'.$req['Resume']['id'];
										endif; ?>
										</td>

			<td width=""><?php echo ucwords($req['Resume']['first_name'].' '.$req['Resume']['last_name']);?></td>
									<td class="actionItem" style="text-align:center">
	
	<div class="btn-group">		
												<span rel="tooltip" data-toggle="dropdown"  style="cursor:pointer" data-original-title="Update Status"><i class="splashy-sprocket_light"></i>
																</span>
													
													
												<ul  class="dropdown-menu">
															
<li><a href="<?php echo $this->webroot;?>notification/update_resume_status/<?php echo $req['ReqResume']['id']; ?>/<?php echo $req['Resume']['id']; ?>/billable/"><i class="splashy-check"></i> Still Active</a></li>
<li><a val="40_60"  class="iframeBox sepV_a cboxElement" href="<?php echo $this->webroot;?>notification/update_resume_status/<?php echo $req['ReqResume']['id']; ?>/<?php echo $req['Resume']['id']; ?>/not_billable/?candidate_name=<?php echo ucwords($req['Resume']['first_name'].' '.$req['Resume']['last_name']);?>"><i class="splashy-error_small"></i> Not Billable</a></li>
															</ul>		
														</div>
														
														
	
	
	
	
		</td>
					
			<td width=""><?php echo $req['Client']['client_name'];?></td>
			<td width=""><?php echo $req['Position']['job_title'];?></td>
										
			
		<td><?php echo $this->Functions->get_status_crisp($req['ReqResume']['stage_title'],$req['ReqResume']['status_title']);?></td>
						
			
			<td width="">
			
			
			<?php echo $this->Functions->format_date($req['ReqResume']['created_date']);?></td>
			
			<td width="">
			
			<?php if($req['ReqResume']['modified_date'] == ''):?>
			<?php echo $this->Functions->format_date($req['ReqResume']['created_date']);?>
			<?php else:?>
			<?php echo $this->Functions->format_date($req['ReqResume']['modified_date']);?>
			<?php endif; ?>
			</td>
						
					
									
					</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>	
	
			<div class="span5">
			
			<h3 class="heading">Positions</h3>
			
			
							<table class="table table-striped table-bordered dataTable stickyTable"  id="dt_i">
								<thead>
									<tr>
<th width="100">Job Code</th>	
										<th width="120">Job Title</th>										
										
										<th width="80" style="text-align:center">Actions</th>
										
										<th width="170">Client</th>
										

										<th width="100">Status</th>
										
										
										<th width="85">Created</th>
										
										<th width="85"> Updated</th>
										
										
									</tr>
								</thead>

								<tbody>
								
								
										
	<?php foreach($data as $req):?>
			
			<tr>
			
			<td width="">
			<?php echo $req['Notification']['job_code'];?></td>

			<td width=""><?php echo $req['Notification']['job_title'];?></td>
				
<td class="actionItem" style="text-align:center">
	
	<div class="btn-group">		
												<span rel="tooltip" data-toggle="dropdown"  style="cursor:pointer" data-original-title="Update Status"><i class="splashy-sprocket_light"></i>
																</span>
													
													
												<ul  class="dropdown-menu">
															
<li><a href="<?php echo $this->webroot;?>notification/update_status/<?php echo $req['Notification']['id']; ?>/billable/"><i class="splashy-check"></i> Still Active</a></li>
<li><a val="40_60"  class="iframeBox sepV_a cboxElement" href="<?php echo $this->webroot;?>notification/update_status/<?php echo $req['Notification']['id']; ?>/not_billable/?title=<?php echo $req['Notification']['job_title'];?>"><i class="splashy-error_small"></i> Not Billable</a></li>
															</ul>		
														</div>
														
														
	
	
	
	
		</td>
		
			<td width=""><?php echo $req['Client']['client_name'];?></td>
										
			<td width="">
<?php echo $req['ReqStatus']['title'];?>		
	</td>
						
			
			<td width=""><?php echo $this->Functions->format_date($req['Notification']['created_date']);?></td>
			
			<td width="">
			<?php if($req['Notification']['modified_date'] != ''):?>
			<?php echo $this->Functions->format_date($req['Notification']['modified_date']);?>
			<?php else:?>
			<?php echo $this->Functions->format_date($req['Notification']['created_date']);?>
			<?php endif; ?>
			</td>
						
					
									
	
								</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						
						
			
					
					
			</div>		
					</div>
			
		</div>
		
		
