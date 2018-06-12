
		<div id="maincontainer" class="clearfix">
			<?php echo $this->element('header');?>
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
			<?php echo $this->Session->flash();?>
					
					<div class="row-fluid">
						 <div class="span12">

<div class="heading clearfix">
								<h3 class="pull-left">Billings <small>list</small></h3>
								<!--span class="pull-right label label-warning">
								<?php echo  $this->Paginator->counter('Total: {:count}');
 ?></span-->
							</div>
					<?php echo $this->Form->create('Billing', array('id' => 'formID','class' => 'formID')); ?>
	
							<div class="dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							
							<?php if($this->Session->read('USER.Login.roles_id') == '33' || $this->Session->read('USER.Login.roles_id') == '39' || $this->Session->read('USER.Login.roles_id') == '40'):?>
							<label style="margin-top:18px;">							
							<a class="notify jsRedirect" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Downloading Excel... Please wait..."  href="<?php echo $this->webroot;?>billing/?action=export&<?php echo $this->Functions->get_url_vars($this->request->query);?>"><input type="button" value="Export Excel" class="btn btn-warning"/></a>
							</label>
							<?php endif; ?>
							
							<label style="margin-top:18px;"><a href="<?php echo $this->webroot;?>billing/" class="jsRedirect"><input value="Reset" type="button" class="btn"/></a></label>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
							
						
					<?php if($this->Session->read('USER.Login.rights') == '5'):?>	
						<label>Employee: 
						<?php echo $this->Form->input('emp_id', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 'selected' => $this->params->query['emp_id'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $empList)); ?> 

															
													
							</label>	
							
							<?php endif; ?>

						<label>Joined Till: <input type="text" name="data[Billing][to]" value="<?php echo $this->request->query['to'];?>" class="input-small datepick" aria-controls="dt_gal"></label>

							<label>Joined From: <input type="text" class="input-small datepick" name="data[Billing][from]" value="<?php echo $this->request->query['from'];?>" aria-controls="dt_gal"></label>
								<label style="margin-left:0">Keyword: <input type="text" placeholder="Candidate Name or Client Name" name="data[Billing][keyword]" id = "SearchText" value="<?php echo $this->params->query['keyword'];?>" class="input-large" aria-controls="dt_gal"></label>

														</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="<?php echo $this->webroot;?>billing/" id="webroot">
						</form>

							
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="120"><?php echo $this->Paginator->sort('Resume.first_name', 'Candidate Name', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="120"><?php echo $this->Paginator->sort('Position.job_title', 'Job Title', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="120"><?php echo $this->Paginator->sort('Client.client_name', 'Client Name', array('escape' => false, 'direction' => 'desc'));?></th>

										<th width="80"><?php echo $this->Paginator->sort('Designation.designation', 'Designation', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="80"><?php echo $this->Paginator->sort('ctc_offer', 'CTC Offered', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="80"><?php echo $this->Paginator->sort('bill_ctc', 'Billing Amount', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="70"><?php echo $this->Paginator->sort('Owner.created_date', 'Billing Date', array('escape' => false, 'direction' => 'desc'));?></th>
									<th width="80"><?php echo $this->Paginator->sort('Owner.first_name', 'Created By', array('escape' => false, 'direction' => 'desc'));?></th>

										<th width="70"><?php echo $this->Paginator->sort('joined_on', 'Joined Date', array('escape' => false, 'direction' => 'desc'));?></th>

									</tr>
								</thead>
								<tbody>
								
									
								<?php foreach($billing_data as $billing):?>
									<tr>
										
										<td><a class="iframeBox "href="<?php echo $this->webroot;?>resume/view/<?php echo $billing['Resume']['id'];?>/"><?php echo ucwords($billing['Resume']['first_name'].' '.$billing['Resume']['last_name']);?></a></td>
										<td><?php echo ucwords($billing['Position']['job_title']);?></td>
										<td><?php echo ucwords($billing['Client']['client_name']);?></td>
										<td><?php echo $billing['Designation']['designation'];?></td>
										<td><?php echo $billing['Billing']['ctc_offer'];?></td>
										<td><?php echo $billing['Billing']['bill_ctc'];?></td>
										<td></td>
										<td><?php echo $billing['Owner']['first_name'];?></td>

										<td><?php echo $this->Functions->format_date($billing['Billing']['joined_on']);?></td>

									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
												<?php echo $this->element('paging');?>
						
							
												
                      
					
                        
					
					</div>
                    
					
				

				    
                </div>
            </div>
            
		</div>
		
		</div>
