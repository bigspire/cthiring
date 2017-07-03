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
                                    <a href="<?php echo $this->webroot;?>position/">Positions</a>
                                </li>
                            
                                <li>
                                   Add Position
                                </li>
                            </ul>
                        </div>
                    </nav>
			
	<?php echo $this->Form->create('Position', array('id' => '', 'class' => 'formID', 'enctype' => 'multipart/form-data')); ?>
			
							<?php echo $this->Session->flash();?>

			
	<div class="box">
	
		<div class="row-fluid">
		<div class="span12">
		<div class="mbox">
			<div class="tabbable">
				<div class="heading">
					<ul class="nav nav-tabs">
						<li class="active basic"><a class="postabChange" rel="basic"  href="#basic" data-toggle="tab"><i class="splashy-document_a4_edit"></i> Basic Details </a></li>
						<li class="job_desc"><a class="postabChange" rel="job_desc"  href="#job_desc" data-toggle="tab"><i class="splashy-document_a4_add"></i>  Job Description </a></li>
						<!--li class="coordination"><a class="postabChange" rel="coordination"  href="#coordination" data-toggle="tab"><i class="splashy-smiley_surprised"></i> Coordination </a></li-->

											</ul>
				</div>
		<div class="tab-content" style="overflow:visible">
		<div class="tab-pane active" id="basic">
			<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Client Name <span class="f_req">*</span></td>
							<td>										
				<?php echo $this->Form->input('clients_id', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8 input-xlarge load_client', 'id' => 'client_id', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $clientList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
																				
				
							</td>	
						</tr>	
						
						<tr class="">
							<td width="120" class="tbl_column">SPOC Name <span class="f_req">*</span></td>
							<td>										
				<?php echo $this->Form->input('client_contact_id', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8 input-xlarge load_contact', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $spocList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
																				
				
							</td>	
						</tr>	
						
						
																	
									
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Job Title	 <span class="f_req">*</span></td>
							<td>	
							
		<?php echo $this->Form->input('job_title', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8',  'required' => false, 'placeholder' => '',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
				

							</td>	
						</tr>
						
						<tr class="">
							<td width="120" class="tbl_column">Job Location	 <span class="f_req">*</span></td>
							<td>	
							
		<?php echo $this->Form->input('location', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8',  'required' => false, 'placeholder' => '',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
				

							</td>	
						</tr>
							<tr class="tbl_row">
										
										<td class="tbl_column">Experience <span class="f_req">*</span></td>
										<td>
										
		<?php echo $this->Form->input('min_exp', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'minDrop span4', 'empty' => 'Min.',  'id' => 'minDrop', 'rel' => 'maxDrop','required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $expList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
		
		<?php echo $this->Form->input('max_exp', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'maxDrop span4 inline_text','id' => 'maxDrop','empty' => 'Max.', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $expList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
									
									
										
										</td>
											
									 </tr>	
									
									 <tr>
										<td width="120" class="tbl_column">CTC <span class="f_req">*</span></td>
										<td>	
<?php echo $this->Form->input('ctc_from', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span2',  'required' => false, 'placeholder' => 'Min. CTC',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 		
										
		<?php echo $this->Form->input('ctc_from_type', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span2', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $ctcList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
				

				
									

<?php echo $this->Form->input('ctc_to', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span2',  'required' => false, 'placeholder' => 'Max. CTC',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 				
										
				<?php echo $this->Form->input('ctc_to_type', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span2', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $ctcList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
												
										</td>												
									</tr>	
								
								   <tr  class="tbl_row">
										<td width="120" class="tbl_column">Qualification <span class="f_req">*</span></td>
										<td> 
<?php echo $this->Form->input('education', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8', 'cols' => '10', 'rows' => '3',
  'required' => false, 'placeholder' => '',	'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
										</td>
									</tr>
									
						
																										
				</tbody>
			</table>
		</div>
							
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
					<tr class="tbl_row">
						<td width="120" class="tbl_column">Account Holder <span class="f_req">*</span></td>
						<td>	
						
	<?php echo $this->Form->input('account_holder', array('div'=> false,'type' => 'text', 'label' => false, 
		'class' => 'load_ach span8', 'readonly' => 'readonly', 'value' => '',  'required' => false, 'placeholder' => '', 
		'style' => "clear:left",  'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
					

					
						</td>	

				  </tr>	
				  
				  <tr  class="tbl_row">
										<td width="120" class="tbl_column">Key Skills <span class="f_req">*</span></td>
										<td> 
<?php echo $this->Form->input('skills', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8', 'cols' => '10', 'rows' => '3',
  'required' => false, 'placeholder' => '',	'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
										</td>
									</tr>
									
									
					<tr class="">
						<td width="120" class="tbl_column">No. of Openings <span class="f_req">*</span></td>
						<td>

		<?php echo $this->Form->input('no_job', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8 input-xlarge', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => array_combine(range(1,50,1),range(1,50,1)), 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
																				
						</td>
					</tr>																		
									
					

			

							
						
																	
				
				  <tr class="">
						<td width="120" class="tbl_column">Team Members <span class="f_req">*</span></td>
						<td>	
						
	<?php echo $this->Form->input('team_member_req', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8 chosen-select', 'multiple' => 'multiple',  'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $userList,
		'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
					

					
						</td>	

				  </tr>
				  	<tr class="tbl_row">
										<td width="120" class="tbl_column">Requirement Date <span class="f_req">*</span></td>
										<td> 
										
										<span id="sandbox-container">
						<span  class="input-daterange" id="datepicker">	
	<?php echo $this->Form->input('start_date', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span4 datepick',  'required' => false, 'placeholder' => 'Start Date',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
					
<?php echo $this->Form->input('end_date', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span4 inline_text datepick',  'required' => false, 'placeholder' => 'Closure Date',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
						</span>	
						</span>	
									

		</td>
									</tr>		
								
								   <tr>
										<td width="120" class="tbl_column">Functional Area <span class="f_req">*</span></td>
										<td>	
										
		<?php echo $this->Form->input('function_area_id', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8 input-xlarge', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $functionList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
					
	
										</td>	
									</tr>
				  
				    
									
				</tbody>
			</table>
		</div>
		</div>
		
		<div class="tab-pane" id="job_desc">
		
		<div class="span12">
							<table class="table table-bordered dataTable" style="margin-bottom:0;">
							<tbody>
								<tr class="tbl_row">
									<td width="120" class="tbl_column">Job Description <span class="f_req">*</span></td>										
									<td>
<?php echo $this->Form->input('job_desc', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span10 wysiwyg', 'cols' => '10', 'style' => 'height:250px' , 'rows' => '3',
  'required' => false, 'placeholder' => 'Enter job description here',	'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 

									<br>
									<!--label for="reg_city" generated="true" class="error">Please enter the description </label-->
									</td>													
								</tr>
								<tr>
								<td width="120" class="tbl_column">Attachment </td>
									<td>
<?php echo $this->Form->input('desc_file', array('div'=> false,'type' => 'file', 'label' => false, 'class' => '',  'required' => false, 'placeholder' => '',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 

									</td>
								</tr>
							</tbody>
							</table>	
						</div>
		</div>
		
		<!--div class="tab-pane" id="coordination">
		<div id="sheepItFormPosition">
 
  <!-- Form template-->
  <!--div id="sheepItFormPosition_template" class="" style="clear:left;">
  
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Employee <span class="f_req">*</span></td>
							<td>
							<?php echo $this->Form->input('employee_#index#', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 'id' => 'employee_#index#',
		'style' => "clear:left", 'options' => $userList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 						
		<div id="empNameErrData_#index#" class="error"></div>

	
							</td>
						</tr>	
						
						<tr class="">
							<td width="120" class="tbl_column">Value (% of work) <span class="f_req">*</span></td>
							<td>
							<?php echo $this->Form->input('percent_#index#', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8',  'required' => false, 
		'placeholder' => '', 'id' => 'percent_#index#','error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
	
			<div id="perErrData_#index#" class="error"></div>
							</td>
						</tr>													
									
				
						
				</tbody>
			</table>
		</div>
							
		<div class="span6">																
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>					
					<tr  class="tbl_row">
							<td width="120" class="tbl_column">Co-ordination Type <span class="f_req">*</span></td>
							<td>	
			<?php echo $this->Form->input('coordination_#index#', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 'id' => 'coordination_#index#',
		'style' => "clear:left", 'options' => $coordList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
						
			<div id="coordErrData_#index#" class="error"></div>

		
							</td>	
						</tr>	
									
																
				</tbody>
			</table>
		</div>
		
<div style="float: left;    clear: left;    margin-top: 5px;    margin-bottom: 5px;">										
<button type="button" id="sheepItFormPosition_remove_current" >
<a><span>Remove</span></a></button>
</div>
</div-->
  <!-- /Form template-->
   
  <!-- No forms template -->
  <!-- /No forms template-->
   
  <!-- Controls -->
  <!--div id="sheepItFormPosition_controls">
    <span id="sheepItFormPosition_add" style="float:right;margin-top:5px;">
    	<button type="button"><a><span>Add Another</span></a></button>
    </span>
  </div-->
  <!-- /Controls -->

<!--/div>
		</div-->
		
		</div>
		</div>
		</div>	
</div>
</div>
<div class="form-actions">

<?php // echo $this->Form->input('position_count', array('type' => 'hidden', 'id' => 'position_count')); ?>

<?php // for($i = 0; $i < $this->request->data['Position']['position_count']; $i++):?>
		<!--input type="hidden" id="employeeName_<?php echo $i;?>" name="employeeName_<?php echo $i;?>" value="<?php echo $this->request->data['Position']['employee_'.$i];?>">
		<input type="hidden" id="coordName_<?php echo $i;?>" name="coordName_<?php echo $i;?>" value="<?php echo $this->request->data['Position']['coordination_'.$i];?>">
		<input type="hidden" id="percentName_<?php echo $i;?>" name="percentName_<?php echo $i;?>" value="<?php echo $this->request->data['Position']['percent_'.$i];?>">
		<!-- error messages -->
		<!--input type="hidden" id="empNameErr_<?php echo $i;?>" value="<?php echo $errorData[$i]['emp'];?>">
		<input type="hidden" id="perErr_<?php echo $i;?>" value="<?php echo $errorData[$i]['percent'];?>">
		<input type="hidden" id="coordErr_<?php echo $i;?>" value="<?php echo $errorData[$i]['coord'];?>"-->				
<?php // endfor;?>

<?php echo $this->Form->input('add_position', array('type' => 'hidden',  'id' => 'add_position')); ?>

<?php echo $this->Form->input('webroot', array('type' => 'hidden', 'value' => $this->webroot.'position/', 'id' => 'webroot')); ?>



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