<?php echo $this->element('tsk_menu'); ?>
	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Create Event</h1>
					</div>
					
				</div>
				<div class="breadcrumbs"  style="width:66%">
					<ul>
						<li>
							<a href="<?php echo $this->webroot;?>tskhome/">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="<?php echo $this->webroot;?>tskevent/">My Events</a>
								<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="#">Create Event</a>
						</li>
					</ul>
					
				</div>
				
				<?php echo $this->Session->flash();?>
				
					<div class="row-fluid footer_div">
					
										<?php echo $this->element('event_menu');?>	

										
					<div class="span6">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3><i class="icon-list"></i> Please fill the form to create a new event</h3>
							</div>
							<div class="box-content nopadding">
								
								
								<?php echo $this->Form->create('TskEvent', array('id' => 'formID', 'class' => 'form-horizontal form-column form-bordered')); ?>
								
								
									<div class="span12">
									
								
										
										
										<div class="control-group">
											<label for="textfield" class="control-label">Title <span class="red_star">*</span></label>
											<div class="controls">
										
													<?php echo $this->Form->input('title', array('div'=> false, 'id' => 'field0', 'type' => 'text', 'label' => false, 'class' => 'input-xlarge',  'required' => false, 'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
													<div class="error field0"></div>
											</div>
										</div>
										
										<div class="control-group">
											<label for="textfield" class="control-label"> Description </label>
											<div class="controls">
										
													<?php echo $this->Form->input('details', array('div'=> false,'type' => 'textarea', 'rows' => 2, 'label' => false, 'class' => 'input-xlarge',  'required' => false, 'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
											</div>
										</div>
										
										<div class="control-group">
											<label for="textfield" class="control-label">Start Date and Time <span class="red_star">*</span></label>
											<div class="controls">
										
													<?php echo $this->Form->input('start', array('div'=> false, 'id' => 'field1', 'type' => 'text', 'label' => false, 'class' => 'input-xlarge datetimepicker',  'required' => false, 'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
													<div class="error field1"></div>
											</div>
										</div>
										
										<div class="control-group">
											<label for="textfield" class="control-label">End Date and Time </label>
											<div class="controls">
										
													<?php echo $this->Form->input('end', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'input-xlarge datetimepicker',  'required' => false, 'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
											</div>
										</div>
										
										<div class="control-group">
											<label for="textfield" class="control-label">Type <span class="red_star">*</span></label>
											<div class="controls">
													<?php echo $this->Form->input('event_type_id', array('div'=> false,'type' => 'select', 
													'label' => false, 'id' => 'field2', 'class' => 'input-xlarge', 'empty' => 'Select', 'required' => false,
													'placeholder' => '', 'style' => "clear:left", 'options' => $eventType, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
											<div class="error field2"></div>
											
											</div>
										</div>
										
										<div class="control-group">
											<label for="textfield" class="control-label">Status <span class="red_star">*</span></label>
											<div class="controls">
													<?php echo $this->Form->input('status', array('div'=> false,'type' => 'select', 
													'label' => false,'id' => 'field3',  'class' => 'input-xlarge', 'empty' => 'Select', 'required' => false,
													'placeholder' => '', 'style' => "clear:left", 'options' => $eventStatus, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
											<div class="error field3"></div>
											</div>
										</div>
										
										
										</div>
										
										
									<div class="span12">
										<div class="form-actions">
											<input type="submit" value="Save changes" class="save_event btn btn-primary">
											<a href="<?php echo $this->webroot;?>tskevent/"><button type="button" class="btn">Cancel</button></a>
										</div>
									</div>
									
								
									</div>


									<?php echo $this->Form->input('all_day', array('type' => 'hidden', 'value' => 0));?>	
										
									<input type="hidden" id="start_time" value="<?php echo date('d/m/Y');?>">
								<?php echo $this->Form->end(); ?>
							</div>
						</div>
					</div>
				</div>
					
					
				</div>
		
			
			</div>
		
			
	
