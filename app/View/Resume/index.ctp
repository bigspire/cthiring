<?php if(empty($noHead)): ?>
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
                                    <a href="<?php echo $this->webroot;?>resume/">Resumes</a>
                                </li>
                            
                                <li>
                                   Search Resumes
                                </li>
                            </ul>
                        </div>
                    </nav>

						<div class="srch_buttons">
							<a class="jsRedirect toggleSearch"  href="javascript:void(0)"><input type="button" value="Search" class="homeSrch btn btn-success"/></a>
			<?php if($this->Session->read('USER.Login.roles_id') == '33' || $this->Session->read('USER.Login.roles_id') == '39'):?>
										
							<a class="notify jsRedirect" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Downloading Excel... Please wait..."  href="<?php echo $this->webroot;?>resume/?action=export&<?php echo $this->Functions->get_url_vars($this->request->query);?>"><input type="button" value="Export Excel" class="btn btn-warning"/></a>
								<?php endif; ?>
								
								
							<?php // if($create_resume == '1'):?>
<!--a rel="tooltip"  title="Upload New Resume" href="<?php echo $this->webroot;?>hiring/upload_resume.php" 
					 val="40_50"  class="iframeBox sepV_a cboxElement">
					<input value="Upload Resume" type="button" class="btn btn-info"></a-->	
					<?php // endif; ?>
						</div>
						
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

										
							<?php echo $this->Form->create('Resume', array('id' => 'formID','class' => 'formID')); ?>
	
							<div class="dataTables_filter dn srchBox homeSrchBox homeSrch" id="dt_gal_filter">
							
							
							
								<label style="margin-left:0">Keyword: <input type="text" placeholder="Candidate / Employer" name="data[Resume][keyword]" id = "SearchText" value="<?php echo $this->params->query['keyword'];?>" class="input-medium" aria-controls="dt_gal"></label>

					<span id="sandbox-container">
						<span  class="input-daterange" id="datepicker">	
						<label>From Date: <input type="text" placeholder="dd/mm/yyyy" class="input-small datepick" name="data[Resume][from]" style="width:70px;"  value="<?php echo $this->request->query['from'];?>" aria-controls="dt_gal"></label>

							<label>To Date: <input type="text" placeholder="dd/mm/yyyy" name="data[Resume][to]" value="<?php echo $this->request->query['to'];?>" style="width:70px;"  class="input-small datepick" aria-controls="dt_gal"></label>
</span>	
						</span>	
							
									</label>
					<?php if($approveUser):?>
							<label>Employee: 
						<?php echo $this->Form->input('emp_id', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 'selected' => $this->params->query['emp_id'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $empList)); ?> 					
							</label>
					<?php endif; ?>
						
						<?php if($this->Session->read('USER.Login.roles_id') == '33' || $this->Session->read('USER.Login.roles_id') == '39' || $this->Session->read('USER.Login.roles_id') == '35'):?>	
							<label>
							Branch: 
							<?php echo $this->Form->input('loc', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 'selected' => $this->params->query['loc'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $locList)); ?> 
							</label>
						<?php endif; ?>	
					
					
	<span id="sandbox-container">
						<span  class="input-daterange" id="datepicker">	
						
			<label>Interview From: <input type="text" placeholder="dd/mm/yyyy" class="input-small datepick" name="data[Resume][int_from]" style="width:70px;"  value="<?php echo $this->request->query['int_from'];?>" aria-controls="dt_gal"></label>

							
							<label>Interview To: <input type="text" placeholder="dd/mm/yyyy" name="data[Resume][int_to]" value="<?php echo $this->request->query['int_to'];?>" style="width:70px;" class="input-small datepick" aria-controls="dt_gal"></label>
</span>	
						</span>	
								<label>Experience:
<?php echo $this->Form->input('min_exp', array('div'=> false,'type' => 'select', 'label' => false, 'selected' => $this->request->query['min_exp'],'class' => 'input-small minDrop minexp', 'rel' => 'max-exp', 'id' => 'min-exp',  'empty' => 'Min', 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $expList)); ?> 	
							
					</label>
					
							<label>&nbsp; 
												<?php  echo $this->Form->input('max_exp', array('div'=> false,'type' => 'select', 'label' => false,'selected' => $this->request->query['max_exp'], 'class' => 'input-small maxDrop maxexp', 'id' => 'max-exp',  'empty' => 'Max', 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $expList)); ?> 	
							</label>					
							
							<label>Current Status: 
						<?php echo $this->Form->input('status', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-small', 'empty' => 'Select', 'selected' => $this->params->query['status'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $stList)); ?> 
</label>
							
						<label style="margin-top:18px;">	<input type="submit" value="Submit" class="btn btn-gebo" /></label>
							
							
							<label style="margin-top:18px;"><a class="jsRedirect" href="<?php echo $this->webroot;?>resume/">
							<input value="Reset" type="button" class="btn"/></a>
</label>

														</div>
<input type="hidden" value="1" id="SearchKeywords">
					<input type="hidden" id="srchSubmit" value="<?php echo $this->params->query['srch_status'];?>">

						<input type="hidden" value="<?php echo $this->webroot;?>resume/" id="webroot">
						</form>
					<?php endif; ?>			
							
	<?php if(!empty($noHead)): ?>
	
	
<div style="padding:15px;">
		<?php echo $this->Session->flash();?>
						
	
<div class="heading clearfix">
								<h3 class="pull-left">Resumes <small>list</small></h3>
					
							</div>
					
							
<?php endif; ?>	

						<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="100"><?php echo $this->Paginator->sort('first_name', 'Name', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="70"><?php echo $this->Paginator->sort('mobile', 'Mobile', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="80"><?php echo $this->Paginator->sort('email', 'Email Id', array('escape' => false, 'direction' => 'desc'));?></th>
										<!--th width="120"><?php echo $this->Paginator->sort('present_employer', 'Employer', array('escape' => false, 'direction' => 'desc'));?></th-->
										<th width="120"><?php echo $this->Paginator->sort('total_exp', 'Exp.', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="80"><?php echo $this->Paginator->sort('ResLocation.location', 'Location', array('escape' => false, 'direction' => 'desc'));?></th>
										<!--th width="90"><?php echo $this->Paginator->sort('education', 'Qualification', array('escape' => false, 'direction' => 'desc'));?></th-->
										<!--th width="50"><?php echo $this->Paginator->sort('present_ctc', 'Present CTC', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="50"><?php echo $this->Paginator->sort('expected_ctc', 'Expected CTC', array('escape' => false, 'direction' => 'desc'));?></th-->
										<th width="80"><?php echo $this->Paginator->sort('status', 'Current Status', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="75"><?php echo $this->Paginator->sort('Creator.first_name', 'Created By', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="90" style="text-align:center">Actions</th>
										<th width="75"><?php echo $this->Paginator->sort('created_date', 'Created', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="75"><?php echo $this->Paginator->sort('modified_date', 'Modified', array('escape' => false, 'direction' => 'desc'));?></th>
										
									</tr>
								</thead>
								<tbody>
								
									
									
									<?php foreach($data as $res):?>
									<tr>
										<?php // if(!empty($noHead)): $target = "target='_blank'"; endif;?>
										<td><a  href="<?php echo $this->webroot;?>resume/view/<?php echo $res['Resume']['id'];?>/"><?php echo ucwords($res[0]['full_name']);?></a></td>
										<td><?php echo $this->Functions->get_format_text($res['Resume']['mobile']);?></td>
										<td><?php echo $this->Functions->get_format_text($res['Resume']['email_id']);?></td>
										<!--td><?php echo $res['Resume']['present_employer'];?></td-->
										<td><?php echo $this->Functions->show_exp_details($res['Resume']['total_exp']);?></td>
										<td><?php echo $res['ResLocation']['location'] ? $res['ResLocation']['location'] : $res['Resume']['present_location'];?></td>
										<!--td><?php echo $res['Resume']['education'];?></td-->
										<!--td><?php if(!empty($res['Resume']['present_ctc'])): echo $res['Resume']['present_ctc'].' L'; endif; ?></td>
										<td><?php if(!empty($res['Resume']['expected_ctc'])): echo $res['Resume']['expected_ctc'].' L'; endif; ?></td-->
										<td><?php echo $this->Functions->get_status_crisp($res['ReqResume']['stage_title'],$res['ReqResume']['status_title']);?></td>
										<td><?php echo ucfirst($res['Creator']['first_name']);?></td>
										<td class="actionItem">
								
									<div class="btn-group" style="display:inline-block;float:left;margin-left:12px;">
										
									<button data-toggle="dropdown" rel="tooltip" title="Download" class="btn btn-mini dropdown-toggle"><i class="icon-download"></i> <span class="caret"></span>
									</button>
										<ul class="dropdown-menu">
										
													<li><a href="<?php echo $this->webroot;?>resume/download_doc/<?php echo $res['ResDoc']['resume'];?>/">Candidate Resume</a></li>

													
										<?php if($res['Position']['resume_type'] == 'S' || $res['Position']['resume_type'] == ''):?>
											<li><a href="<?php echo $this->webroot;?>resume/profile_snapshot/<?php echo $res['ResDoc']['resume'];?>/<?php echo $res['Resume']['modified_date'] ? strtotime($res['Resume']['modified_date']) : strtotime($res['Resume']['created_date']);?>/">Snapshot</a></li>
											<?php endif; ?>

											
											<?php if($res['Position']['resume_type'] == 'F'):?>
											<li><a href="<?php echo $this->webroot;?>resume/autoresume/<?php echo $res['ResDoc']['resume'];?>/<?php echo $res['Resume']['modified_date'] ? strtotime($res['Resume']['modified_date']) : strtotime($res['Resume']['created_date']);?>">Fully Formatted Resume</a></li>
											<?php endif; ?>
											
								
										<li class="divider"></li>
			
			<?php if($res['Position']['resume_type'] == 'S' || $res['Position']['resume_type'] == ''):?>
			<li><a class="iframeBox" val="70_100" href="<?php echo $this->webroot;?>resume/profile_snapshot/<?php echo $res['ResDoc']['resume'];?>/<?php echo $res['Resume']['modified_date'] ? strtotime($res['Resume']['modified_date']) : strtotime($res['Resume']['created_date']);?>/view/">View Snapshot</a></li>
			<?php endif; ?>
			
			<?php if($res['Position']['resume_type'] == 'F'):?>
			<li><a class="iframeBox" val="70_100"  href="<?php echo $this->webroot;?>resume/autoresume/<?php echo $res['ResDoc']['resume'];?>/<?php echo $res['Resume']['modified_date'] ? strtotime($res['Resume']['modified_date']) : strtotime($res['Resume']['created_date']);?>/view/">View Formatted Resume</a></li>
			<?php endif; ?>
											
										</ul>
									</div>
								
								
								<?php if($res['Resume']['created_by'] == $this->Session->read('USER.Login.id')):?>
								
									<div class="btn-group" style="display:inline-block;float:left;">
										
									<button data-toggle="dropdown" rel="tooltip" title="Edit" class="btn btn-mini dropdown-toggle"><i class="icon-pencil"></i> <span class="caret"></span>
									</button>
										<ul class="dropdown-menu">
											<?php if($res['Position']['resume_type'] == 'S' || $res['Position']['resume_type'] == ''):?>
											<li><a href="<?php echo $this->webroot;?>hiring/edit_resume.php?id=<?php echo $res['Resume']['id'];?>">Resume</a></li>
											<?php else: ?>
											<li><a href="<?php echo $this->webroot;?>hiring/edit_formatted_resume.php?id=<?php echo $res['Resume']['id'];?>&resume=<?php echo $res['Resume']['autoresume_modified'];?>">Fully Formatted Resume</a></li>
											<?php endif; ?>
										</ul>
									</div>	
									
							   <?php endif; ?>

										
</div>										
										</td>
<td><?php echo $this->Functions->format_date($res['Resume']['created_date']);?></td>
										<td><?php echo $this->Functions->format_date($res['Resume']['modified_date']);?></td>
											
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
												<?php echo $this->element('paging');?>
						
												
                      
					<input type="hidden" id="file_download" rel="<?php echo $this->webroot;?>resume/download_snap/" value="<?php echo $file_download;?>"/>
                        
					
					</div>
                    
					
				

				    
            <?php if(empty($noHead)): ?>	
					</div>
                </div>
				
            </div>
            
		</div>
		
		</div>
		<?php else: ?>	
		</div>
		
		
		<?php endif; ?>