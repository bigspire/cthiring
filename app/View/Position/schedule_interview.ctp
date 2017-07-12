<div id="container">
		<div id="content">
			<div id="maincontainer" class="clearfix">
			
			<!-- main content -->
            <div id="contentwrapper">
               <div class="main_content" style="min-height:auto;">
            <div class="row-fluid">
				 <div class="span12">
		<?php
		if($this->request->query['cv_update_status'] == '1'):?>					
		<div id="flashMessage" class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert-success">×</button>CV Sent Successfully</div>
		Redirecting now...
		<?php endif; ?>		 		
			
				
		<?php
		if($this->request->query['cv_update_status'] != '1'):?>					
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
												<li class="active"><a href="#tab1" data-toggle="tab">Interview Confirmation to Candidate</a></li>
												<li class=""><a href="#tab2" data-toggle="tab">Interview Confirmation to Clients</a></li>
												<li><a href="#tab3" data-toggle="tab">Confirmation</a></li>
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
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Interview Level <span class="f_req">*</span>
					</td>
						<td>
		<?php echo $this->Form->input('interview_level', array('div'=> false,'type' => 'radio', 'label' => false, 'style' => 'margin:4px 2px', 'class' => 'input-xlarge',  'options' => $int_levels, 'separator' => ' ',  'required' => false, 'placeholder' => '', 'legend' => false, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?>
						</td>	
				</tr>
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Interview Stage <span class="f_req">*</span>
					</td>
						<td>
		<?php echo $this->Form->input('interview_stage_id', array('div'=> false,'type' => 'radio',  'label' => false, 'style' => 'margin:4px 2px', 'class' => 'input-xlarge',  'options' => $int_stages, 'separator' => ' ',  'required' => false, 'placeholder' => '', 'legend' => false, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?>
						</td>	
				</tr>
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Interview Date <span class="f_req">*</span>
					</td>
						<td>
						<?php echo $this->Form->input('int_date', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span5 datepick',   'required' => false, 'placeholder' => '')); ?> 					

						<?php echo $this->Form->input('int_time', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span3 datetimepick',   'required' => false, 'placeholder' => '')); ?> 					
						</td>	
				</tr>
				
				<tr class="tbl_row">
					<td width="120" class="tbl_column">Interview Duration <span class="f_req">*</span>
					</td>
						<td>

						<?php echo $this->Form->input('int_duration', array('div'=> false,'type' => 'select', 'empty' => 'Select', 'options' => $int_duration, 'label' => false, 'class' => 'span5',   'required' => false, 'placeholder' => '')); ?> 					
						</td>	
				</tr>
			
				
					<tr class="tbl_row" >
					<td width="120" class="tbl_column">Subject <span class="f_req">*</span>
					</td>
						<td>
						<?php echo $this->Form->input('subject', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8', 'value' => $subject, 'required' => false, 'placeholder' => '')); ?> 					
						</td>	
				</tr>
				
			
				
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Message <span class="f_req">*</span>
					</td>
						<td>
					<?php echo $this->Form->input('message', array('div'=> false,'type' => 'text', 'label' => false, 
					'class' => 'span10 wysiwyg',  'cols' => '6', 'style' => 'height:120px', 
					'required' => false, 'placeholder' => '', 'value' => $body, 
					'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 

						</td>	
				</tr>
				</tbody>
			</table>
			<div class="form-actions">
			<input name="submit" class="btn btn-gebo theForm" value="Submit"  type="submit"/>
					<a class="jsRedirect toggleSearch"  href="javascript:window.close()">
					<input type="button" value="Cancel" id="cancel" class="btn cancel"/></a>
					<input type="hidden" id="success_page" value="<?php echo $this->webroot;?>position/view/<?php echo $this->request->params['pass'][1]?>/"/>
			</div>
		
												</div>
												<div class="tab-pane" id="tab2">
													<p>
														Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et tellus felis, sit amet interdum tellus. Suspendisse sit amet scelerisque dui. Vivamus faucibus magna quis augue venenatis ullamcorper. Proin eget mauris eget orci lobortis luctus ac a sem. Curabitur feugiat, eros consectetur egestas iaculis,
													</p>
												</div>
												<div class="tab-pane" id="tab3">
													<p>
														Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et tellus felis, sit amet interdum tellus. Suspendisse sit amet scelerisque dui. Vivamus faucibus magna quis augue venenatis ullamcorper. Proin eget mauris eget orci lobortis luctus ac a sem. Curabitur feugiat, eros consectetur egestas iaculis,
														Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et tellus felis, sit amet interdum tellus. Suspendisse sit amet scelerisque dui. Vivamus faucibus magna quis augue venenatis ullamcorper. Proin eget mauris eget orci lobortis luctus ac a sem. Curabitur feugiat, eros consectetur egestas iaculis,
													</p>
												</div>
											
											
											</div>
										</div>
									</div>
								</div>
							
							
							
	
</form>
<?php endif; ?>	

  </div>
</div>
</div> 
</div>
</div>
</div>