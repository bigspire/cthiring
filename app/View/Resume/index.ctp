<?php if(empty($noHead)): ?>
		<div id="maincontainer" class="clearfix">
			<?php echo $this->element('header');?>
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
						<?php echo $this->Session->flash();?>

					
					<div class="row-fluid footer_div">
						 <div class="span12">

<div class="heading clearfix">
								<h3 class="pull-left">Resumes <small>list</small></h3>
			
							</div>
							
							<?php echo $this->Form->create('Resume', array('id' => 'formID','class' => 'formID')); ?>
	
							<div class="dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							<label style="margin-top:18px;"><a class="jsRedirect notify" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Downloading Excel... Please wait..."  href="<?php echo $this->webroot;?>resume/?action=export&<?php echo $this->Functions->get_url_vars($this->request->query);?>"><input type="button" value="Export" class="btn btn-warning"/></a></label>
							<label style="margin-top:18px;"><a class="jsRedirect" href="<?php echo $this->webroot;?>resume/"><input value="Reset" type="button" class="btn"/></a></label>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
				
<label>Current Status: 
						<?php echo $this->Form->input('status', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-small', 'empty' => 'Select', 'selected' => $this->params->query['status'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $stList)); ?> 

															
													
							</label>
<?php if($this->Session->read('USER.Login.rights') == '5'):?>											
<label>Branch: 
							<?php echo $this->Form->input('loc', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-small', 'empty' => 'Select', 'selected' => $this->params->query['loc'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $locList)); ?> 

							</label>						
						<label>Employee: 
						<?php echo $this->Form->input('emp_id', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-small', 'empty' => 'Select', 'selected' => $this->params->query['emp_id'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $empList)); ?> 

															
													
							</label>
							
					<?php endif; ?>		
							
							<label>Interview To: <input type="text" name="data[Resume][int_to]" value="<?php echo $this->request->query['int_to'];?>" style="width:70px;" class="input-small datepick" aria-controls="dt_gal"></label>

							<label>Interview From: <input type="text" class="input-small datepick" name="data[Resume][int_from]" style="width:70px;"  value="<?php echo $this->request->query['int_from'];?>" aria-controls="dt_gal"></label>
							<label>&nbsp; 
												<?php  echo $this->Form->input('max_exp', array('div'=> false,'type' => 'select', 'label' => false,'selected' => $this->request->query['max_exp'], 'class' => 'input-small maxDrop maxexp', 'id' => 'max-exp',  'empty' => 'Max', 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $expList)); ?> 	
							</label>
							<label>Experience:
<?php echo $this->Form->input('min_exp', array('div'=> false,'type' => 'select', 'label' => false, 'selected' => $this->request->query['min_exp'],'class' => 'input-small minDrop minexp', 'rel' => 'max-exp', 'id' => 'min-exp',  'empty' => 'Min', 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $expList)); ?> 	
							
					</label>
					
				

						
							<label>To Date: <input type="text" name="data[Resume][to]" value="<?php echo $this->request->query['to'];?>" style="width:70px;"  class="input-small datepick" aria-controls="dt_gal"></label>

							<label>From Date: <input type="text" class="input-small datepick" name="data[Resume][from]" style="width:70px;"  value="<?php echo $this->request->query['from'];?>" aria-controls="dt_gal"></label>
							<label style="margin-left:0">Keyword: <input type="text" placeholder="Candidate / Employer" name="data[Resume][keyword]" id = "SearchText" value="<?php echo $this->params->query['keyword'];?>" class="input-medium" aria-controls="dt_gal"></label>

														</div>
<input type="hidden" value="1" id="SearchKeywords">
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

						<table class="table table-hover table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="100"><?php echo $this->Paginator->sort('first_name', 'Name', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="70"><?php echo $this->Paginator->sort('mobile', 'Mobile', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="70"><?php echo $this->Paginator->sort('email', 'Email Id', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="120"><?php echo $this->Paginator->sort('present_employer', 'Employer', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="60"><?php echo $this->Paginator->sort('total_exp', 'Exp.', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="80"><?php echo $this->Paginator->sort('ResLocation.location', 'Location', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="90"><?php echo $this->Paginator->sort('education', 'Qualification', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="50"><?php echo $this->Paginator->sort('present_ctc', 'Present CTC', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="50"><?php echo $this->Paginator->sort('expected_ctc', 'Expected CTC', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="80"><?php echo $this->Paginator->sort('status', 'Current Status', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="75"><?php echo $this->Paginator->sort('Creator.first_name', 'Created By', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="75"><?php echo $this->Paginator->sort('created_date', 'Created', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="75"><?php echo $this->Paginator->sort('modified_date', 'Modified', array('escape' => false, 'direction' => 'desc'));?></th>

									</tr>
								</thead>
								<tbody>
								
									
									
									<?php foreach($data as $res):?>
									<tr>
										<?php if(!empty($noHead)): $target = "target='_blank'"; endif;?>
										<td><a <?php echo $target;?>  href="<?php echo $this->webroot;?>resume/view/<?php echo $res['Resume']['id'];?>/"><?php echo ucwords($res[0]['full_name']);?></a></td>
										<td><?php echo $this->Functions->get_format_text($res['Resume']['mobile']);?></td>
										<td><?php echo $this->Functions->get_format_text($res['Resume']['email_id']);?></td>
										<td><?php echo $res['Resume']['present_employer'];?></td>
										<td><?php echo $res['Resume']['total_exp'];?></td>
										<td><?php echo $res['ResLocation']['location'];?></td>
										<td><?php echo $res['Resume']['education'];?></td>
										<td><?php if(!empty($res['Resume']['present_ctc'])): echo $res['Resume']['present_ctc'].' L'; endif; ?></td>
										<td><?php if(!empty($res['Resume']['expected_ctc'])): echo $res['Resume']['expected_ctc'].' L'; endif; ?></td>
										<td><?php echo $res['ReqResume']['stage_title'];?> - <?php echo $res['ReqResume']['status_title'];?></td>
										<td><?php echo ucfirst($res['Creator']['first_name']);?></td>
										<td><?php echo $this->Functions->format_date($res['Resume']['created_date']);?></td>
										<td><?php echo $this->Functions->format_date($res['Resume']['modified_date']);?></td>

									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
												<?php echo $this->element('paging');?>
						
												
                      
					
                        
					
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