<div id="container">
		<div id="content">
			<div id="maincontainer" class="clearfix">
			
			<!-- main content -->
            <div id="contentwrapper">
               <div class="main_content" style="min-height:auto;">
            <div class="row-fluid">
				 <div class="span12">
		<?php
		if($cv_update_status == '1'):?>					
		<div id="flashMessage" class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert-success">×</button>Interview Scheduled Successfully</div>
		Redirecting now...
		<?php endif; ?>		 		
			
				
		
		<?php
		if($cv_update_status == ''):?>					
<?php echo $this->Form->create('Position', array('id' => '', 'class' => 'formID')); ?>
<div class="box">
	<div class="box-title mb5">
			<h4>Schedule / Re-Schedule Interview</h4>
	</div>
	
	
	
</div>
								<div class="w-box" id="w_sort07">
									<div class="w-box-header">
									</div>
									<div class="w-box-content">
										<div class="tabbable clearfix">
											<ul class="nav nav-tabs" style="float:left;margin-left:15px;">
												<li class="active"><a href="#tab1" data-toggle="tab" style="font-size:13px;">Interview Details</a></li>
												<li class=""><a href="#tab2" data-toggle="tab" style="font-size:13px;">Interview Confirmation to Candidate</a></li>
												<li><a href="#tab3" data-toggle="tab" style="font-size:13px;">Interview Confirmation to Clients</a></li>
											</ul>
											<div class="tab-content">
											
												<div class="tab-pane active" id="tab1">
														<table class="table table-bordered dataTable" align="centre">
				<tbody> 
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Candidate Name
					</td>
						<td>
						<?php echo $this->Form->input('candidate', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8', 'readonly' => 'readonly', 'value' => $candidate_name,   'required' => false, 'placeholder' => '')); ?> 					
						</td>	
				</tr>
				
					<?php if($reschedule):?>
				
				<tr class="">
					<td width="120" class="">Reason for Re-Schedule <span class="f_req">*</span>
					</td>
						<td>
					<?php echo $this->Form->input('reason_id', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8', 'id' => '', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $rejectList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
							
 					
						</td>	
				</tr>
				
					<?php endif; ?>
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Interview Level <span class="f_req">*</span>
					</td>
						<td>
		<?php echo $this->Form->input('interview_level', array('div'=> false,'type' => 'radio', 'label' => false, 'style' => 'margin:4px 2px', 'class' => 'input-xlarge',  'options' => $int_levels, 'separator' => ' ',  'required' => false, 'placeholder' => '', 'legend' => false, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?>
						</td>	
				</tr>
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Interview Mode <span class="f_req">*</span>
					</td>
						<td>
		<?php echo $this->Form->input('interview_stage_id', array('div'=> false,'type' => 'radio',  'label' => false, 'style' => 'margin:4px 2px', 'class' => 'input-xlarge',  'options' => $stageList, 'separator' => ' ',  'required' => false, 'placeholder' => '', 'legend' => false, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?>
						</td>	
				</tr>
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Interview Date <span class="f_req">*</span>
					</td>
						<td>
						<?php echo $this->Form->input('int_date', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span3 datepick',   'required' => false,'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 					

						<?php echo $this->Form->input('int_time', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span3 datetimepick', 'required' => false, 'style' => 'float:left;margin-right:5px;', 'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	

<?php echo $this->Form->input('int_duration', array('div'=> false,'type' => 'select', 'empty' => 'Duration', 'options' => $int_duration, 'label' => false, 'class' => 'span2',   'required' => false, 'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	

						
						</td>	
				</tr>
				
				<tr class="tbl_row">
					<td width="120" class="tbl_column">Interview Venue <span class="f_req">*</span>
					</td>
						<td>
<?php echo $this->Form->input('venue', array('div'=> false,'type' => 'textarea', 'label' => false, 'class' => 'span8 wysiwyg1', 'required' => false, 'placeholder' => '', 'rows' => '2', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
		
										
						</td>	
				</tr>
			
			
				<tr class="tbl_row">
					<td width="120" class="tbl_column">Contact Details <span class="f_req">*</span>
					
					</td>
					
					
						<td>
<?php echo $this->Form->input('contact_name', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span4 wysiwyg1', 'required' => false, 'placeholder' => 'Contact Person Name', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
							
<?php echo $this->Form->input('contact_no', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span4 inline_text wysiwyg1', 'required' => false, 'placeholder' => 'Contact Mobile No.', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 										
						</td>	
				</tr>
				
					<tr class="tbl_row">
					<td width="120" class="tbl_column">Additional Info 
					</td>
						<td>
<?php echo $this->Form->input('additional', array('div'=> false,'type' => 'textarea', 'label' => false, 'class' => 'span8', 'required' => false, 'placeholder' => '', 'rows' => '3', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
		
										
						</td>	
				</tr>
				
				</tbody>
			</table>
			<div class="form-actions">
			<input name="submit" class="btn btn-gebo theForm" value="Submit"  type="submit"/>
					<a class="jsRedirect toggleSearch"  href="javascript:window.close()">
					<input type="button" value="Cancel" id="cancel" class="btn cancel"/></a>
					
			</div>
		
												</div>
												<div class="tab-pane" id="tab2">
														<table class="table table-bordered dataTable" align="centre">
				<tbody> 
				
				
				
					<tr class="tbl_row" >
					<td width="120" class="tbl_column">Subject <span class="f_req">*</span>
					</td>
						<td> 
						<?php echo $this->Form->input('subject_client', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8', 'value' => $subject_3, 'required' => false, 'placeholder' => '')); ?> 					
						</td>	
				</tr>
				
			
				
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Message <span class="f_req">*</span>
					</td>
						<td>
					<?php echo $this->Form->input('message_client', array('div'=> false,'type' => 'text', 'label' => false, 
					'class' => 'span10 wysiwyg',  'cols' => '6', 'style' => 'height:180px', 
					'required' => false, 'placeholder' => '', 'value' => $body_3, 
					'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 

						</td>	
				</tr>
				</tbody>
			</table>
			<div class="form-actions">
			<input name="submit" class="btn btn-gebo theForm" value="Submit"  type="submit"/>
					<a class="jsRedirect toggleSearch"  href="javascript:window.close()">
					<input type="button" value="Cancel" id="cancel" class="btn cancel"/></a>
			</div>
												</div>
												<div class="tab-pane" id="tab3">
															<table class="table table-bordered dataTable" align="centre">
				<tbody> 
				
				
				
					<tr class="tbl_row" >
					<td width="120" class="tbl_column">Subject <span class="f_req">*</span>
					</td>
						<td>
						<?php echo $this->Form->input('subject', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8', 'value' => $subject_2, 'required' => false, 'placeholder' => '')); ?> 					
						</td>	
				</tr>
				
			
				
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Message <span class="f_req">*</span>
					</td>
						<td>
					<?php echo $this->Form->input('message', array('div'=> false,'type' => 'text', 'label' => false, 
					'class' => 'span10 wysiwyg',  'cols' => '6', 'style' => 'height:180px', 
					'required' => false, 'placeholder' => '', 'value' => $body_2, 
					'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 

					</td>	
				</tr>
				</tbody>
			</table>
			<div class="form-actions">
			
			<input type="hidden" id="start_date" name="start_date" value="<?php echo date('d/m/Y');?>">


			<input name="submit" class="btn btn-gebo theForm" value="Submit"  type="submit"/>
					<a class="jsRedirect toggleSearch"  href="javascript:window.close()">
					<input type="button" value="Cancel" id="cancel" class="btn cancel"/></a>
			</div>
			
			
												</div>
											
											
											</div>
										</div>
									</div>
								</div>
							
							
							
	
</form>
<?php endif; ?>	

<input type="hidden" id="success_page" value="<?php echo $this->webroot;?>position/view/<?php echo $this->request->params['pass'][1]?>/?tab=cv_status"/>
  </div>
</div>
</div> 
</div>
</div>
</div>