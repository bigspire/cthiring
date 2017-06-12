
	
	<?php echo $this->element('tsk_menu'); ?>
	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>View Events</h1>
					</div>
					
				</div>
				<div class="breadcrumbs" style="width:66%">
					<ul>
						<li>
							<a href="<?php echo $this->webroot;?>tskhome/">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="<?php echo $this->webroot;?>tskevent/list_event/">Manage Events</a>
								<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="#">View Event</a>
						</li>
					</ul>
					
				</div>
				
					<div class="row-fluid">
					
					<?php echo $this->element('event_menu');?>	
					
					<div class="span6">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3><i class="icon-list"></i> View Event</h3>
							</div>
							<div class="box-content nopadding">
								
								
								<?php echo $this->Form->create('TskEvent', array('id' => 'formID', 'class' => 'form-horizontal form-column form-bordered')); ?>
								
								
									<div class="span12">
										<div class="control-group">
											<label for="textfield" class="control-label">Event Title </label>
											<div class="controls">
													<?php echo $event_data['TskEvent']['title'];?>
													
												
											</div>
										</div>
										<div class="control-group">
											<label for="textfield" class="control-label">Description </label>
											<div class="controls">
													<?php echo $event_data['TskEvent']['details'];?>
													
												
											</div>
										</div>
										
									<div class="control-group">
											<label for="textfield" class="control-label">Start Date and Time </label>
											<div class="controls">
													<?php echo $this->Functions->show_event_date($event_data['TskEvent']['start']);?>
													
												
											</div>
										</div>
										
									<div class="control-group">
											<label for="textfield" class="control-label">End Date and Time </label>
											<div class="controls">
													<?php if($event_data['TskEvent']['end'] == '0000-00-00 00:00:00'):
													echo ' ';
													else:
													echo $this->Functions->show_event_date($event_data['TskEvent']['end']);
													endif; ?>
													
												
											</div>
										</div>
											
								<div class="control-group">
											<label for="textfield" class="control-label">Event Type </label>
											<div class="controls">
									<span class="evtTag evt<?php echo $event_data['TskEventType']['color']; ?>"><?php echo $event_data['TskEventType']['name'];?></span>

													
												
											</div>
										</div>
										
									
									
										
												<div class="control-group">
											<label for="password" class="control-label">Status </label>
											<div class="controls">
												<?php echo $event_data['TskEvent']['status'];?>
												
												
											</div>
										</div>
										
										
									</div>
									<div class="span12">
										<div class="form-actions">
												<a href="<?php echo $this->webroot;?>tskevent/edit_event/<?php echo $this->request->params['pass'][0];?>/">

											<button type="button" class="btn btn-primary"><i class="icon-edit"></i> Edit</button></a>
											<a href="javascript:void(0);" name="<?php echo $event_data['TskEvent']['id'];?>" class="delRec"><button type="button" class="btn btn-red"><i class="icon-remove"></i> Delete</button></a>

											<a href="<?php echo $this->webroot;?>tskevent/"><button type="button" class="btn"><i class="icon-arrow-left"></i> Go Back</button></a>
											
										
										</div>
									</div>
									<input type="hidden" id="del_url" value="<?php echo $this->webroot;?>tskevent/delete_event/"/>

									<input type="hidden" value="<?php echo $this->webroot;?>tskevent/" id="webroot">
								<?php echo $this->Form->end(); ?>
							</div>
						</div>
					</div>
				</div>
					
					
				</div>
		
			
			</div>
		</div>	
			
		
<div id="dialog-confirm" title="Confirmation!" class="dn">
	<p>Are you sure you want to delete?</p>
</div>

