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
							<td width="135" class="tbl_column">Client Name <span class="f_req">*</span></td>
							<td>										
				<?php echo $this->Form->input('clients_id', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8 input-xlarge load_client', 'id' => 'client_id', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $clientList, 'default' => $this->params->pass[0], 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
																				
				
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
							<td width="120" class="tbl_column">Job Code	 <span class="f_req">*</span></td>
							<td>	
							
		<?php echo $this->Form->input('job_code', array('div'=> false,'type' => 'text', 'value' => $jobCode, 'label' => false, 'class' => 'span8',  'required' => false, 'placeholder' => '',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
				

							</td>	
						</tr>			
								
								
								
							<tr class="">
										
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
									
									 <tr class="tbl_row">
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
								
								   <tr  class="">
										<td width="120" class="tbl_column">Qualification <span class="f_req">*</span></td>
										<td> 
<?php echo $this->Form->input('education', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8 wysiwyg1', 'cols' => '10', 'rows' => '3',
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
						<td width="135" class="tbl_column"><span rel="tooltip"  title="Client Relationship Manager">CRM</span> <span class="f_req">*</span></td>
						<td>	
						
	<?php echo $this->Form->input('account_holder', array('div'=> false,'type' => 'text', 'label' => false, 
		'class' => 'load_ach span8', 'readonly' => 'readonly', 'value' => '',  'required' => false, 'placeholder' => '', 
		'style' => "clear:left",  'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
					

					
						</td>	

				  </tr>	
				  
				<tr  class="">
										<td width="120" class="tbl_column">Technical Skills <span class="f_req">*</span></td>
										<td> 
<?php echo $this->Form->input('tech_skill', array('div'=> false, 'data-role' => 'tagsinput', 'type' => 'text', 'multiple' => 'multiple', 'label' => false, 'class' => 'span8 tagInput', 'required' => false, 'placeholder' => 'Enter skills separated by comma',	'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
										</td>
				</tr>
					
				<tr  class="tbl_row">
										<td width="120" class="tbl_column">Behavioural Skills <span class="f_req">*</span></td>
										<td> 
<?php echo $this->Form->input('behav_skill', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8 tagInput', 'required' => false, 'placeholder' => 'Enter skills separated by comma', 'data-role' => 'tagsinput',	'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
										</td>
				</tr>
									
																		
									
					

			

				<!-- Small modal -->

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="margin:25px;">
     No. of Openings:  <select name="data[Position][req]" style="margin-left:100px" class="selPosReq span4" placeholder="" style="clear:left">
<option value="">Min.</option>
<option value="1">1 </option>
<option value="2">2 </option>
<option value="3">3 </option>
<option value="4">4 </option>
<option value="5">5 </option>
<option value="6">6 </option>
<option value="7">7 </option>
<option value="8">8 </option>
<option value="9">9 </option>
<option value="10">10 </option>
<option value="11">11 </option>
<option value="12">12 </option>
<option value="13">13 </option>
<option value="14">14 </option>
<option value="15">15 </option>
<option value="16">16 </option>
<option value="17">17 </option>
<option value="18">18 </option>
<option value="19">19 </option>
<option value="20">20 </option>
<option value="21">21 </option>
<option value="22">22 </option>
<option value="23">23 </option>
<option value="24">24 </option>
<option value="25">25 </option>
<option value="26">26 </option>
<option value="27">27 </option>
<option value="28">28 </option>
<option value="29">29 </option>
<option value="30">30 </option>
<option value="31">31 </option>
<option value="32">32 </option>
<option value="33">33 </option>
<option value="34">34 </option>
<option value="35">35 </option>
<option value="36">36 </option>
<option value="37">37 </option>
<option value="38">38 </option>
<option value="39">39 </option>
<option value="40">40 </option>
<option value="41">41 </option>
<option value="42">42 </option>
<option value="43">43 </option>
<option value="44">44 </option>
<option value="45">45 </option>
<option value="46">46 </option>
<option value="47">47 </option>
<option value="48">48 </option>
<option value="49">49 </option>
<option value="50">50 </option>
</select>
    </div>
  </div>
</div>			
						
																	
				
				  <tr class="">
						<td width="120" class="tbl_column">Recruiters <span class="f_req">*</span></td>
						<td>	
				


				
	<?php echo $this->Form->input('team_member_req', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8 chosen-select chooseReqTeam', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $userList,
		'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
	
		<div  class="noJob">
		<?php
		foreach($teamData as $key => $team):
		$mem_req = $posData[$key] ? $posData[$key] : $this->request->data['Position']['no_job'];?>
		
		<span id="" style="margin-top:2px;font-size:13px;font-weight:normal" class="tagDiv tag label label-warning"><?php echo $team['Creator']['first_name'].' '.$team['Creator']['last_name'];?> - <?php echo $mem_req;?> 
		<i class="icon-adt_trash  removeTag" val="" rel="tooltip" data="<?php echo $team['Creator']['id'];?>" title="remove" style="margin-top:2px;cursor:pointer"></i></span>
		<?php $pos_str .= $team['Creator']['id'].'-'.$mem_req.',';?>
		<?php endforeach;?>
	
		</div>
	
	
	<?php 
	echo $this->Form->input('team_id', array('div'=> false,'type' => 'hidden', 'id' => 'team_id'));
	echo $this->Form->input('temp_team_id', array('div'=> false,'type' => 'hidden', 'id' => 'temp_team_id'));
	echo $this->Form->input('cur_team', array('div'=> false,'type' => 'hidden', 'id' => 'cur_team'));	
	?>
	

					
						</td>	

				  </tr>
				  
				  	<!--tr class="">
						<td width="120" class="tbl_column">No. of Openings <span class="f_req">*</span></td>
						<td>

		<?php /*
		echo $this->Form->input('no_job', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8 input-xlarge', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => array_combine(range(1,50,1),range(1,50,1)), 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); */ ?> 
		
		
		
		<?php  //echo $this->Form->input('no_job', array('div'=> false, 'type' => 'textarea', 'label' => false, 'class' => 'noJob span8', 'maxlength' => '500', 'rows' => '3', 'cols' => '10', 'required' => false, 'placeholder' => '',    'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
		
						</td>
					</tr-->
					
					
				  	<tr class="tbl_row">
										<td width="120" class="tbl_column">Requirement Date <span class="f_req">*</span></td>
										<td> 
										
						<span id="sandbox-container">
						<span  class="input-daterange" id="datepicker">	
	<?php echo $this->Form->input('start_date', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span4 datepick',  'required' => false, 'placeholder' => 'Start Date',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
					
<?php echo $this->Form->input('end_date', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span4 inline_text datepick',  'required' => false, 'placeholder' => 'Closure Date',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
				
		<input type="hidden" id="start_date" name="start_date" value="<?php echo date('d/m/Y');?>">

						</span>	
						</span>	
									

		</td>
									</tr>		
								
								   <tr class="">
										<td width="120" class="tbl_column">Functional Area <span class="f_req">*</span></td>
										<td>	
										
		<?php echo $this->Form->input('function_area_id', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8 input-xlarge', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $functionList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
					
	
										</td>	
									</tr>
				  
				     <tr class="tbl_row">
										<td width="120">Hide Resume Contacts <span class="f_req">*</span></td>
										<td>	
	<?php echo $this->Form->input('hide_contact', array('div'=> false,'type' => 'radio', 'label' => false,  'style' => 'margin:4px 2px', 'class' => 'input-xlarge', 
	'options' => $hide_contacts, 'separator' => ' ', 'id' => '',  'required' => false, 'placeholder' => '', 
	'legend' => false, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?>
									

										</td>	
									</tr>
									
							   <tr class="">
										<td width="120" class="tbl_column">Resume Type <span class="f_req">*</span></td>
										<td>	
										
			<?php echo $this->Form->input('resume_type', array('div'=> false,'type' => 'radio', 'label' => false,  'style' => 'margin:4px 2px', 'class' => 'input-xlarge', 
	'options' => $resume_types, 'separator' => ' ', 'id' => '',  'required' => false, 'placeholder' => '', 
	'legend' => false, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?>
		
		
		
	
										</td>	
									</tr>				
						
	   <tr class="tbl_row">
										<td width="120" class="tbl_column">Project Type <span class="f_req">*</span></td>
										<td>	
										
			<?php echo $this->Form->input('is_rpo', array('div'=> false,'type' => 'radio', 'label' => false,  'style' => 'margin:4px 2px', 'class' => 'input-xlarge', 
	'options' => $project_types, 'separator' => ' ', 'id' => '',  'required' => false, 'placeholder' => '', 
	'legend' => false, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?>
		
		
		
	
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
<?php echo $this->Form->input('job_desc', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span10 wysiwyg', 'cols' => '10', 'style' => "height:250px;", 'rows' => '3',
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