
		<div id="maincontainer" class="clearfix">
			<?php echo $this->element('header');?>
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
			
					<?php echo $this->Session->flash();?>
					
					<div class="row-fluid">
						 <div class="span12">

<div class="heading clearfix">
								<h3 class="pull-left">Users <small>list</small></h3>
		
							</div>
													<?php echo $this->Form->create('User', array('id' => 'formID','class' => 'formID')); ?>
	
							<div class="dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							<label style="margin-top:18px;"><a class="jsRedirect notify" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Downloading Excel... Please wait..."  href="<?php echo $this->webroot;?>user/?action=export&<?php echo $this->Functions->get_url_vars($this->request->query);?>"><input type="button" value="Export Excel" class="btn btn-warning"/></a></label>
							<label style="margin-top:18px;"><a class="jsRedirect" href="<?php echo $this->webroot;?>user/"><input value="Reset" type="button" class="btn"/></a></label>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
							
						
				<label>Status: 
							<?php echo $this->Form->input('status', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-small', 'empty' => 'Select', 'default' => '2', 'selected' => $this->params->query['status'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => array('2' => 'Active','1' => 'Inactive'))); ?> 

							</label>			

			<label style="margin-left:0">Keyword: <input type="text" placeholder="User Name or Location" name="data[User][keyword]" id = "SearchText" value="<?php echo $this->params->query['keyword'];?>" class="input-large" aria-controls="dt_gal"></label>

														</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="<?php echo $this->webroot;?>user/" id="webroot">
						</form>
							
							
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="180"><?php echo $this->Paginator->sort('first_name', 'Employee Name', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="90" class="optional"><?php echo $this->Paginator->sort('mobile', 'Mobile', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="120"class="optional"><?php echo $this->Paginator->sort('email_id', 'Email', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="80"><?php echo $this->Paginator->sort('location', 'Location', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="100"><?php echo $this->Paginator->sort('status', 'Status', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="75"><?php echo $this->Paginator->sort('created_date', 'Created', array('escape' => false, 'direction' => 'desc'));?></th>
									</tr>
								</thead>
								<tbody>
								
									
										
									
								<?php foreach($data as $user):?>
									<tr>
										
										<td><?php echo ucwords($user['User']['first_name'].' '.$user['User']['last_name']);?></td>
										<td><?php echo $user['User']['mobile'];?></td>
										<td><?php echo $user['User']['email_id'];?></td>
										<td><?php echo ucfirst($user['Location']['location']);?></td>
										<td>
										<?php if($user['User']['status'] == '1'):?>
										<span class="label label">Inactive</span>
										<?php else:?>
										<span class="label label-success">Active</span>
										<?php endif; ?>
										</td>

										<td><?php echo $this->Functions->format_date($user['User']['created_date']);?></td>

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
