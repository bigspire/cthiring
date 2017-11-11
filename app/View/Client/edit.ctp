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
                                    <a href="<?php echo $this->webroot;?>client/">Clients</a>
                                </li>                            
                                <li>
                                   Edit Client
                                </li>
                            </ul>
                        </div>
                    </nav>
			
	<?php echo $this->Form->create('Client', array('id' => '', 'class' => 'formID')); ?>
			
							<?php echo $this->Session->flash();?>

			
	<div class="box">
	
		<div class="row-fluid">
		<div class="span12">
		<div class="mbox">
			<div class="tabbable">
				<div class="heading">
					<ul class="nav nav-tabs">
						<li class="active cli_tab"><a class="clitabChange" rel="client"  href="#mbox_client" data-toggle="tab"><i class="splashy-map"></i>  Client </a></li>
						<li class="con_tab"><a class="clitabChange" rel="contact"  href="#mbox_client_contact" data-toggle="tab"><i class="splashy-group_blue"></i>  Client Contact </a></li>
					 </ul>
				</div>
		<div class="tab-content" style="overflow:visible">
		<div class="tab-pane active" id="mbox_client">
			<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Client Name <span class="f_req">*</span></td>
							<td>										
				<?php echo $this->Form->input('client_name', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8',  'required' => false, 'placeholder' => '',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 

							</td>	
						</tr>	
						
						<tr>
							<td width="120" class="tbl_column">Address </td>
							<td>
<?php echo $this->Form->input('door_no', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span4',  'required' => false, 'placeholder' => 'Door No.',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 							
								<?php echo $this->Form->input('street_name', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'inline_text span4',  'required' => false, 'placeholder' => 'Street Name',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
								
<?php echo $this->Form->input('area_name', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8',  'required' => false, 'placeholder' => 'Area',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
							</td>	
						</tr>												
									
						<tr class="tbl_row">
							<td width="120" class="tbl_column">City / Town	 <span class="f_req">*</span></td>
							<td>	
							
		<?php echo $this->Form->input('city', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8',  'required' => false, 'placeholder' => 'City',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
				
	

								<!--label for="reg_city" generated="true" class="error">Please enter the city / town </label-->										
							</td>	
						</tr>
						


				  

																									
				</tbody>
			</table>
		</div>
							
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
					<tr class="tbl_row">
						<td width="120" class="tbl_column">State <span class="f_req">*</span></td>
						<td>

		<?php echo $this->Form->input('state', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8 input-xlarge load_state', 'empty' => 'Select', 'selected' => $this->request->data['State']['id'],  'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $stateList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
																				
						</td>
					</tr>																		
									
					<tr>
						<td width="120" class="tbl_column">District <span class="f_req">*</span></td>
						<td> 
							<?php echo $this->Form->input('res_location_id', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8 input-xlarge load_dist', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $districtList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
						

						
							<!--label for="reg_city" generated="true" class="error">Please select the district </label-->																				
						</td>
					</tr>	
							

								<tr>
						<td width="120" class="tbl_column">Pincode <span class="f_req">*</span></td>
						<td> 
							<?php echo $this->Form->input('pincode', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'inline_text span8',  'required' => false, 'placeholder' => 'Pincode',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 

						
							<!--label for="reg_city" generated="true" class="error">Please select the district </label-->																				
						</td>
					</tr>	

							
							<tr class="tbl_row">
						<td width="120" class="tbl_column">Account Holder <span class="f_req">*</span></td>
						<td>	
						
	<?php echo $this->Form->input('account_holder', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8 chosen-select', 'multiple' => 'multiple',  'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $userList, 'selected' => $acholderList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
					

					
						</td>	

				  </tr>	
			
									
				</tbody>
			</table>
		</div>
		
		
			<div class="span12" style="clear:left;margin-top:10px;margin-left:0px;padding:0">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
								   <tr  class="">
										<td width="120" class="tbl_column">Remarks <span class="f_req">*</span></td>
										<td> 
<?php echo $this->Form->input('remarks', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8 wysiwyg1', 'rows' => '2',
  'required' => false, 'placeholder' => '',	'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
										</td>
									</tr>

			</tbody>
			</table>
	</div>
		
		</div>
		
		<div class="tab-pane" id="mbox_client_contact">
		<div id="sheepItFormContact">
 
  <!-- Form template-->
  <div id="sheepItFormContact_template" class="" style="clear:left;">
  
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Contact Person <span class="f_req">*</span></td>
							<td>
							<?php echo $this->Form->input('title_#index#', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span2', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 'id' => 'title_#index#',
		'style' => "clear:left", 'options' => $titleList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
			
			<?php echo $this->Form->input('id_#index#', array('id' => 'id_#index#', 'type' => 'hidden')); ?> 
									
						
						

		<?php echo $this->Form->input('first_name_#index#', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span4',  'required' => false, 
		'placeholder' => 'First Name', 'id' => 'first_name_#index#','error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 

	<?php echo $this->Form->input('last_name_#index#', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'inline_text span4',  'required' => false, 
		'placeholder' => 'Last Name', 'id' => 'last_name_#index#','error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
		<div id="titleErrData_#index#" class="error"></div>
		<div id="firstErrData_#index#" class="error"></div>
							</td>
						</tr>	
						
						<tr>
							<td width="120" class="tbl_column">Email <span class="f_req">*</span></td>
							<td>	
		<?php echo $this->Form->input('email_#index#', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span8',  'required' => false, 
		'placeholder' => '', 'id' => 'email_#index#','error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 

		<div id="emailErrData_#index#" class="error"></div>
		
		
							</td>	
						</tr>												
									
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Designation	 <span class="f_req">*</span></td>
							<td>	
							
			<?php echo $this->Form->input('designation_#index#', array('div'=> false,'type' => 'select', 'label' => false, 'id' => 'designation_#index#',
		'class' => 'span8', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $desigList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
				<div id="desigErrData_#index#" class="error"></div>
			
							</td>	
						</tr>																					
				</tbody>
			</table>
		</div>
							
		<div class="span6">																
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>					
					<tr class="tbl_row">
						<td width="120" class="tbl_column">Contact Details <span class="f_req">*</span></td>
						<td> 
		<?php echo $this->Form->input('mobile_#index#', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'span4',  'required' => false, 
		'placeholder' => 'Mobile No.', 'id' => 'mobile_#index#', 'maxlength' => '11', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
				
				<?php echo $this->Form->input('phone_#index#', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'inline_text span4',  'required' => false, 
		'placeholder' => 'Landline No.', 'id' => 'phone_#index#','error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
<div id="mobileErrData_#index#" class="error"></div>

						</td>
					</tr>	
									
					<tr>
						<td width="120" class="tbl_column">Branch <span class="f_req"></span></td>
						<td>	
						

	<?php echo $this->Form->input('branch_#index#', array('div'=> false,'type' => 'select', 'label' => false, 'id' => 'branch_#index#',
		'class' => 'span8', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $branchList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
													
						</td>	
					</tr>	
					
					 <tr class="tbl_row">
						<td width="120" class="tbl_column">Status <span class="f_req">*</span></td>
						<td>	
					<?php echo $this->Form->input('status_#index#', array('div'=> false,'type' => 'select', 'label' => false, 
		'class' => 'span8', 'id' => 'status_#index#', 'empty' => 'Select', 'required' => false, 'placeholder' => '', 
		'style' => "clear:left", 'options' => $statusList, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
						
						</td>	
				  </tr>												
				</tbody>
			</table>
		</div>
		
<div style="float: left;    clear: left;    margin-top: 5px;    margin-bottom: 5px;">										
<button type="button" id="sheepItFormContact_remove_current" >
<a><span>Remove</span></a></button>
</div>
</div>
  <!-- /Form template-->
   
  <!-- No forms template -->
  <div id="sheepItFormContact_noforms_template">No data</div>
  <!-- /No forms template-->
   
  <!-- Controls -->
  <div id="sheepItFormContact_controls">
    <span id="sheepItFormContact_add" style="float:right;margin-top:5px;">
    	<button type="button"><a><span>Add Another</span></a></button>
    </span>
  </div>
  <!-- /Controls -->

</div>
		</div>
		</div>
		</div>
		</div>	
</div>
</div>
<div class="form-actions">

<?php 
	if(empty($this->request->data['Contact'])):
		$count = count($contact_list);
	else:
		$count = count($contact_list['Contact']['status']);
	endif; 
	if(empty($this->request->data['Contact'])):
		foreach($contact_list as $i => $contact):?>
		<input type="hidden" id="titleID_<?php echo $i;?>" name="titleID_<?php echo $i;?>" value="<?php echo $contact['Contact']['id'];?>">
		<input type="hidden" id="titleName_<?php echo $i;?>" name="titleName_<?php echo $i;?>" value="<?php echo $contact['Contact']['title'];?>">
		<input type="hidden" id="firstName_<?php echo $i;?>" name="firstName_<?php echo $i;?>" value="<?php echo $contact['Contact']['first_name'];?>">
		<input type="hidden" id="lastName_<?php echo $i;?>" name="lastName_<?php echo $i;?>" value="<?php echo $contact['Contact']['last_name'];?>">
		<input type="hidden" id="emailId_<?php echo $i;?>" name="emailId_<?php echo $i;?>" value="<?php echo $contact['Contact']['email'];?>">
		<input type="hidden" id="desigName_<?php echo $i;?>" name="desigName_<?php echo $i;?>" value="<?php echo $contact['Contact']['designation_id'];?>">
		<input type="hidden" id="mobileNo_<?php echo $i;?>" name="mobileNo_<?php echo $i;?>" value="<?php echo $contact['Contact']['mobile'];?>">
		<input type="hidden" id="landlineNo_<?php echo $i;?>" name="landlineNo_<?php echo $i;?>" value="<?php echo $contact['Contact']['phone'];?>">
		<input type="hidden" id="branchName_<?php echo $i;?>" name="branchName_<?php echo $i;?>" value="<?php echo $contact['Contact']['contact_branch_id'];?>">
		<input type="hidden" id="statusName_<?php echo $i;?>" name="statusName_<?php echo $i;?>" value="<?php echo $contact['Contact']['status'];?>">
		
	<?php endforeach;endif; ?> 
	<?php if(!empty($this->request->data['Contact'])): 
		for($j = 0; $j < $count; $j++):?>
		<input type="hidden" id="titleID_<?php echo $j;?>" name="titleID_<?php echo $i;?>" value="<?php echo $contact_list['Contact']['id'][$j];?>">
		<input type="hidden" id="titleName_<?php echo $j;?>" name="titleName_<?php echo $j;?>" value="<?php echo $contact_list['Contact']['title'][$j];?>">
		<input type="hidden" id="firstName_<?php echo $j;?>" name="firstName_<?php echo $j;?>" value="<?php echo $contact_list['Contact']['first_name'][$j];?>">
		<input type="hidden" id="lastName_<?php echo $j;?>" name="lastName_<?php echo $j;?>" value="<?php echo $contact_list['Contact']['last_name'][$j];?>">
		<input type="hidden" id="emailId_<?php echo $j;?>" name="emailId_<?php echo $j;?>" value="<?php echo $contact_list['Contact']['email'][$j];?>">
		<input type="hidden" id="desigName_<?php echo $j;?>" name="desigName_<?php echo $j;?>" value="<?php echo $contact_list['Contact']['designation'][$j];?>">
		<input type="hidden" id="mobileNo_<?php echo $j;?>" name="mobileNo_<?php echo $j;?>" value="<?php echo $contact_list['Contact']['mobile'][$j];?>">
		<input type="hidden" id="landlineNo_<?php echo $j;?>" name="landlineNo_<?php echo $j;?>" value="<?php echo $contact_list['Contact']['phone'][$j];?>">
		<input type="hidden" id="branchName_<?php echo $j;?>" name="branchName_<?php echo $j;?>" value="<?php echo $contact_list['Contact']['branch'][$j];?>">
		<input type="hidden" id="statusName_<?php echo $j;?>" name="statusName_<?php echo $j;?>" value="<?php echo $contact_list['Contact']['status'][$j];?>">
		
		<!-- error messages -->
		<input type="hidden" id="firstNameErr_<?php echo $j;?>" value="<?php echo $errorData[$j]['fname'];?>">
		<input type="hidden" id="lastNameErr_<?php echo $j;?>" value="<?php echo $errorData[$j]['lname'];?>">
		<input type="hidden" id="emailErr_<?php echo $j;?>" value="<?php echo $errorData[$j]['email'];?>">
		<input type="hidden" id="mobileErr_<?php echo $j;?>" value="<?php echo $errorData[$j]['mobile'];?>">
		<input type="hidden" id="titleErr_<?php echo $j;?>" value="<?php echo $errorData[$j]['title'];?>">
		<input type="hidden" id="desigErr_<?php echo $j;?>" value="<?php echo $errorData[$j]['designation'];?>">
		
		<?php  endfor; endif;?>
		
	
				
<?php

	echo $this->Form->input('contact_count', array('type' => 'hidden', 'value' => $count, 'id' => 'contact_count'));
?>
<?php echo $this->Form->input('add_client', array('type' => 'hidden',  'id' => 'add_client')); ?>

<?php echo $this->Form->input('webroot', array('type' => 'hidden', 'value' => $this->webroot.'client/', 'id' => 'webroot')); ?>

<?php echo $this->Form->input('Client.id', array('type' => 'hidden')); ?>


				
				<input class="btn btn-gebo" type="submit" value="Submit">
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