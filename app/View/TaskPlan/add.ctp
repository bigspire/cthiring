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
                                    <a href="<?php echo $this->webroot;?>taskplan/">Task Plan</a>
                                </li>
                            
                                <li>
                                   Add Task Plan
                                </li>
                            </ul>
                        </div>
                    </nav>
			
	<?php echo $this->Form->create('TaskPlan', array('id' => '', 'class' => 'formID')); ?>
			
	<?php echo $this->Session->flash();?>

		<?php if($this->request->query['st'] == 'no_task'):	?>					
						<div class="alert alert-info">
								<a class="close" data-dismiss="alert">×</a>
								 Please add your task for the day to upload resume for the position
								 </div>	
						<?php endif; ?>
						
	
	
	
	
			
	<div class="box">
	
		<div class="row-fluid">
		<div class="span12">
		<div class="mbox">
			<div class="tabbable">
				
		<div class="tab-content" style="overflow:visible">
		<div class="tab-pane active" id="basic">
			<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
					  	<tr class="tbl_row">
										<td width="120" class="tbl_column">Task Date <span class="f_req">*</span></td>
										<td> 
										
	<?php echo $this->Form->input('task_date', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8 datepick',  'required' => false, 'placeholder' => '',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
					

				
		<input type="hidden" id="start_date" name="start_date" value="<?php echo date('d/m/Y');?>">

			
									

		</td>
									</tr>

							   <tr class="">
										<td width="120" class="tbl_column">Session <span class="f_req">*</span></td>
										<td>	
										
		<?php echo $this->Form->input('session', array('div'=> false,'type' => 'radio', 'label' => false,  'style' => 'margin:4px 2px', 'class' => 'input-xlarge', 
	'options' => $session, 'separator' => ' ', 'id' => '',  'required' => false, 'placeholder' => '', 
	'legend' => false, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?>
					
	
										</td>	
									</tr>	
						
																	
					
						
				    
																										
				</tbody>
			</table>
		</div>
							
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
					
					
					<tr class="tbl_row">
							<td width="135" class="tbl_column">Client Name <span class="f_req">*</span></td>
							<td>										
				<?php echo $this->Form->input('clients_id', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8 input-xlarge load_client_position', 'id' => 'client_id', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $clientList,'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
																				
				
							</td>	
						</tr>	
						
						<tr class="">
							<td width="120" class="tbl_column">Position <span class="f_req">*</span></td>
							<td>										
				<?php echo $this->Form->input('requirements_id', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8 input-xlarge load_position', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $posList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
																				
				
							</td>	
						</tr>	
							
								
							
				  
									
				</tbody>
			</table>
		</div>
		
		
		</div>

		
		</div>
		</div>
		</div>	
</div>
</div>
<div class="form-actions">

<?php echo $this->Form->input('page', array('type' => 'hidden',  'id' => 'add_task')); ?>

<?php echo $this->Form->input('webroot', array('type' => 'hidden', 'value' => $this->webroot.'taskplan/', 'id' => 'webroot')); ?>



				<input type="submit" class="btn btn-gebo" type="submit" value="Submit">
				
				<a href="javascript:void(0)" class="cancelBtn cancel_event jsRedirect">
				<input type="button" value="Cancel" class="btn"></a>

</div>
                    </div>
                    
				</form>
         </div>
       </div> 
	</div>
</div>
</div>