<div id="container">
		<div id="content">
			<div id="maincontainer" class="clearfix">
			
			<!-- main content -->
            <div id="contentwrapper">
               <div class="main_content" style="min-height:auto;">
            <div class="row-fluid">
				 <div class="span12">
		 		
			
				
<?php echo $this->Form->create('Position', array('id' => '', 'class' => 'formID')); ?>

<div class="box">
	<div class="box-title mb5">
			<h4>View Scheduled / Re-Scheduled Interview</h4>
	</div>
	
	
	
</div>
								<div class="w-box" id="w_sort07">
									<div class="w-box-header">
									</div>
									<div class="w-box-content">
										<div class="tabbable clearfix">
											<ul class="nav nav-tabs" style="float:left;margin-left:15px;">
												<li class="active"><a href="#tab1" data-toggle="tab">Interview Details</a></li>
											</ul>
											<div class="tab-content">
											
												<div class="tab-pane active" id="tab1">
														<table class="table table-bordered dataTable" align="centre">
				<tbody> 
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Candidate Name
					</td>
						<td>
						<?php echo ucwords($interview_data['Resume']['first_name'].' '.$interview_data['Resume']['last_name']);?>
						</td>	
				</tr>
				
				<tr class="" >
					<td width="120" class="tbl_column">Interview Level 
					</td>
						<td>
						<?php echo $interview_level;?>
						</td>	
				</tr>
				
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Interview Stage 
					</td>
						<td>
		<?php echo $this->Form->input('interview_stage_id', array('div'=> false,'type' => 'radio',  'label' => false, 'style' => 'margin:4px 2px', 'class' => 'input-xlarge',  'options' => $stageList, 'separator' => ' ',  'required' => false, 'placeholder' => '', 'legend' => false, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?>
					
			<?php echo $interview_data['InterviewStage']['interview_stage'];?>

											
						
						</td>	
				</tr>
				
				<tr class="" >
					<td width="120" class="tbl_column">Interview Date 
					</td>
						<td>
						<?php echo $this->Functions->format_date($interview_data['ResInterview']['int_date']);?>

						</td>	
				</tr>
				
				<tr class="tbl_row">
					<td width="120" class="tbl_column">Interview Duration 
					</td>
						<td>

						<?php echo $this->Functions->get_int_duration($interview_data['ResInterview']['int_duration']);?>
						
						</td>	
				</tr>
				
				<tr class="">
					<td width="120" class="tbl_column">Venue 
					</td>
						<td>

						<?php echo $interview_data['ResInterview']['venue']?>
						
						</td>	
				</tr>
			
				<tr class="tbl_row">
					<td width="120" class="tbl_column">Contact Details 
					</td>
						<td>

						<?php echo $interview_data['ResInterview']['contact_name']?>, 
						<?php echo $interview_data['ResInterview']['contact_no']?>
						
						</td>	
				</tr>
				
				<tr class="">
					<td width="120" class="tbl_column">Additional Info 
					</td>
						<td>

						<?php echo $interview_data['ResInterview']['additional']?>
						
						</td>	
				</tr>
				
				</tbody>
			</table>
			<div class="form-actions">
					<a class="jsRedirect toggleSearch"  href="javascript:window.close()">
					<input type="button" value="Close" id="cancel" class="btn cancel"/></a>
			</div>
		
												</div>
											
											</div>
										</div>
									</div>
								</div>
							
							
							
	
</form>

  </div>
</div>
</div> 
</div>
</div>
</div>