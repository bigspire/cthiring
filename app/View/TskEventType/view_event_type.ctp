<?php echo $this->element('tsk_menu'); ?>
	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>View Event Types</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="<?php echo $this->webroot;?>tskhome/">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="<?php echo $this->webroot;?>tskeventtype/">View Event Type</a>
								<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="#">View Event Types</a>
						</li>
					</ul>
					
				</div>
				
					<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3><i class="icon-list"></i> View Event Type</h3>
							</div>
							<div class="box-content nopadding">
								
								
								<?php echo $this->Form->create('TskEventType', array('id' => '', 'class' => 'form-horizontal form-column form-bordered')); ?>
								
								
									<div class="span6">
										<div class="control-group">
											<label for="textfield" class="control-label">Event Type </label>
											<div class="controls">
													<?php echo $event_type['TskEventType']['name'];?>
													
												
											</div>
										</div>
										
									<div class="control-group">
											<label for="textfield" class="control-label">Color </label>
											<div class="controls">
													<?php echo $event_type['TskEventType']['color'];?>
													
												
											</div>
										</div>
										
										
									
									
									
										
												<div class="control-group">
											<label for="password" class="control-label">Status </label>
											<div class="controls">
												<?php echo $this->Functions->show_status($event_type['TskEventType']['status']);?>
												
												
											</div>
										</div>
										
										
									</div>
									<div class="span12">
										<div class="form-actions">
												<a href="<?php echo $this->webroot;?>tskeventtype/edit_event_type/<?php echo $this->request->params['pass'][0];?>/">
											<button type="button" class="btn btn-primary"><i class="icon-edit"></i> Edit</button></a>
											<a href="<?php echo $this->webroot;?>tskeventtype/"><button type="button" class="btn"><i class="icon-arrow-left"></i> Go Back</button></a>
											
											
										
										</div>
									</div>
								<?php echo $this->Form->end(); ?>
							</div>
						</div>
					</div>
				</div>
					
					
				</div>
		
			
			</div>
		</div>	
			
		
	

