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
                                    <a href="<?php echo $this->webroot;?>leave/">Leave</a>
                                </li>
                            
                                <li>
                                   Add Leave
                                </li>
                            </ul>
                        </div>
                    </nav>
			
	<?php echo $this->Form->create('Leave', array('id' => '', 'class' => 'formID')); ?>
			
	<?php echo $this->Session->flash();?>

			
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
										<td width="120" class="tbl_column">Leave Date <span class="f_req">*</span></td>
										<td> 
			<span id="sandbox-container">
						<span  class="input-daterange" id="datepicker">	
	<?php echo $this->Form->input('leave_from', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span4 datepick',  'required' => false, 'placeholder' => 'Leave From',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
					
<?php echo $this->Form->input('leave_to', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span4 inline_text datepick',  'required' => false, 'placeholder' => 'Leave To',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
				
		<input type="hidden" id="start_date" name="start_date" value="<?php echo date('d/m/Y');?>">

						</span>	
						</span>	
			
									

		</td>
									</tr>

							 <tr class="">
							<td width="120" class="tbl_column">Reason <span class="f_req">*</span></td>
							<td>										
				<?php echo $this->Form->input('reason_leave', array('div'=> false,'type' => 'textarea', 'rows' => '2', 'label' => false, 
		'class' => 'span8 input-xlarge','required' => false, 'placeholder' => '', 
		 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
																				
				
							</td>	
						</tr>	
							

						
																	
					
						
				    
																										
				</tbody>
			</table>
		</div>
							
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
					
					
					<tr class="tbl_row">
							<td width="135" class="tbl_column">Leave Type <span class="f_req">*</span></td>
							<td>										
				<?php echo $this->Form->input('leave_type', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8 input-xlarge', 'id' => 'client_id', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $typeList,'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
																				
				
							</td>	
						</tr>	
						
						
						<tr class="">
										<td width="120" class="tbl_column">Session <span class="f_req">*</span></td>
										<td>	
										
		<?php echo $this->Form->input('session', array('div'=> false,'type' => 'radio', 'label' => false,  'style' => 'margin:4px 2px', 'class' => 'input-xlarge', 
	'options' => $session, 'separator' => ' ', 'default' => 'D', 'id' => '',  'required' => false, 'placeholder' => '', 
	'legend' => false, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?>
					
	
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

<?php echo $this->Form->input('webroot', array('type' => 'hidden', 'value' => $this->webroot.'leave/', 'id' => 'webroot')); ?>



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