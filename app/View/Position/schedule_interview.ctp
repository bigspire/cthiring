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
			<h4>Schedule Interview</h4>
	</div>
	
	
	
</div>
								<div class="w-box" id="w_sort07">
									<div class="w-box-header">
									</div>
									<div class="w-box-content">
										<div class="tabbable clearfix">
											<ul class="nav nav-tabs" style="float:left;margin-left:15px;">
												<li class="active"><a href="#tab1" data-toggle="tab" style="font-size:12px;">Interview Details</a></li>
												<li><a href="#tab3" data-toggle="tab" style="font-size:12px;">Interview Confirmation to Clients</a></li>
												<li class=""><a href="#tab2" data-toggle="tab" style="font-size:12px;">Interview Confirmation to Candidate</a></li>

											</ul>
											<div class="tab-content">
											
												<div class="tab-pane active" id="tab1">
														<table class="table table-bordered dataTable" align="centre">
				<tbody> 
				
					
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Client  
					</td>
						<td>
						<?php echo $this->Form->input('client_name', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8', 'readonly' => 'readonly', 'value' => $this->request->query['client_name'],   'required' => false, 'placeholder' => '')); ?> 					
						</td>	
				</tr>
				
				
				<tr class="tbl_row" >
					<td width="150" class="tbl_column">Candidate(s)
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
		<?php echo $this->Form->input('interview_level', array('div'=> false,'type' => 'radio', 'value' => $interview_record['ResInterview']['interview_level'], 'label' => false, 'style' => 'margin:4px 2px', 'class' => 'input-xlarge',  'options' => $int_levels, 'separator' => ' ',  'required' => false, 'placeholder' => '', 'legend' => false, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?>
						</td>	
				</tr>
				
				<tr class="" >
					<td width="120" class="tbl_column">Interview Mode <span class="f_req">*</span>
					</td>
						<td>
		<?php echo $this->Form->input('interview_stage_id', array('div'=> false,'type' => 'radio',  'value' => $interview_record['ResInterview']['interview_stage_id'], 'label' => false, 'style' => 'margin:4px 2px', 'class' => 'input-xlarge',  'options' => $stageList, 'separator' => ' ',  'required' => false, 'placeholder' => '', 'legend' => false, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?>
						</td>	
				</tr>
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Interview Date <span class="f_req">*</span>
					</td>
						<td>
						<?php echo $this->Form->input('int_date', array('div'=> false,'type' => 'text', 'label' => false,  'class' => 'span3 datepick',   'required' => false,'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 					

						<?php echo $this->Form->input('int_time', array('div'=> false,'type' => 'text',   'label' => false, 'class' => 'span3 datetimepick', 'required' => false, 'style' => 'float:left;margin-right:5px;', 'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	

<?php echo $this->Form->input('int_duration', array('div'=> false,'type' => 'select',  'value' => $interview_record['ResInterview']['int_duration'],  'empty' => 'Duration', 'options' => $int_duration, 'label' => false, 'class' => 'span2',   'required' => false, 'placeholder' => '', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	

						
						</td>	
				</tr>
				
				<tr class="">
					<td width="120" class="tbl_column">Interview Venue <span class="f_req">*</span>
					</td>
						<td>
<?php echo $this->Form->input('venue', array('div'=> false,'type' => 'textarea', 'value' => $interview_record['ResInterview']['venue'],  'label' => false, 'class' => 'span8 wysiwyg1', 'required' => false, 'placeholder' => '', 'rows' => '2', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
		
										
						</td>	
				</tr>
			
			
				<tr class="tbl_row">
					<td width="120" class="tbl_column">Contact Details <span class="f_req">*</span>
					
					</td>
					
					
						<td>
<?php echo $this->Form->input('contact_name', array('div'=> false, 'value' => $interview_record['ResInterview']['contact_name'],  'type' => 'text', 'label' => false, 'class' => 'span4 wysiwyg1', 'required' => false, 'placeholder' => 'Contact Person Name', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
							
<?php echo $this->Form->input('contact_no', array('div'=> false, 'value' => $interview_record['ResInterview']['contact_no'],  'type' => 'text', 'label' => false, 'class' => 'span4 inline_text wysiwyg1', 'required' => false, 'placeholder' => 'Contact Mobile No.', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 										
						</td>	
				</tr>
				
					<tr class="">
					<td width="120" class="tbl_column">Additional Info 
					</td>
						<td>
<?php echo $this->Form->input('additional', array('div'=> false,'type' => 'textarea', 'label' => false, 'value' => $interview_record['ResInterview']['additional'],  'class' => 'span8', 'required' => false, 'placeholder' => '', 'rows' => '3', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
		
										
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
						<?php echo $this->Form->input('subject_candidate', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8', 'value' => $subject_3, 'required' => false, 'placeholder' => '')); ?> 					
						</td>	
				</tr>
				
			
				
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Message <span class="f_req">*</span>
					</td>
						<td>
					<?php echo $this->Form->input('message_candidate', array('div'=> false,'type' => 'text', 'label' => false, 
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
			
			<input type="hidden" id="tiny_readonly" name="tiny_readonly" value="<?php echo $tiny_readonly;?>">


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

<input type="hidden" id="success_page" value="<?php echo $this->webroot;?>position/view/<?php echo $spec_id;?>/?tab=cv_status"/>
  </div>
</div>
</div> 
</div>
</div>
</div>