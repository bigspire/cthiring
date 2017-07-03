<?php
/* Smarty version 3.1.29, created on 2017-07-03 05:35:22
  from "F:\xampp\htdocs\ctsvn\cthiring\hiring\templates\add_resume.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59598a428cb3f5_23437565',
  'file_dependency' => 
  array (
    '0c86b014e44c0947e63f54dd6044281fcbe00859' => 
    array (
      0 => 'F:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\templates\\add_resume.tpl',
      1 => 1499040266,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_59598a428cb3f5_23437565 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'F:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\vendor\\smarty-3.1.29\\libs\\plugins\\function.html_options.php';
?>

   

			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			
			<!-- main content -->
            <div id="contentwrapper">
               <div class="main_content">
            <div class="row-fluid">
				 <div class="span12">
				 <nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="<?php echo @constant('webroot');?>
home"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="resume.php">Resumes</a>
                                </li>
                            
                                <li>
                                   Add Resume
                                </li>
                            </ul>
                        </div>
                    </nav>
				
<form action="" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="row-fluid">
		<div class="span12">
								<div class="mbox">
									<div class="tabbable">
										<div class="heading">
										<ul class="nav nav-tabs">
										<li class="personal"><a class="resaddtabChange" rel="personal"  href="#mbox_Personal" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Personal </a></li>
										<li class="education"><a class="resaddtabChange" rel="education"  href="#mbox_Education" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Education </a></li>
										<li class="exp"><a class="resaddtabChange" rel="exp"  href="#mbox_Experience" data-toggle="tab"><i class="splashy-mail_light_down"></i> Experience </a></li>
										<li class="assess"><a class="resaddtabChange" rel="assess"  href="#mbox_Consultant" data-toggle="tab"><i class="splashy-mail_light_down"></i> Consultant Assessment </a></li>
									</ul>
										</div>
<div class="tab-content" style="overflow:visible">
<div class="tab-pane active" id="mbox_Personal">
<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
						<tr class="tbl_row">
										<td width="120" class="tbl_column">Position For <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="3" value="<?php echo $_smarty_tpl->tpl_vars['requirement']->value;?>
" class="span8" disabled>
										</td>
									</tr>	
									
									<tr>
									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Candidate Name <span class="f_req">*</span></td>
										<td>
								        <input type="text" tabindex="1" name="first_name" placeholder="First Name" value="<?php echo $_smarty_tpl->tpl_vars['first_name']->value;?>
" class="span4">
								        <input type="text" tabindex="2" name="last_name" placeholder="Last Name" value="<?php echo $_smarty_tpl->tpl_vars['last_name']->value;?>
" class="inline_text span4">
								
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['first_nameErr']->value;
echo $_smarty_tpl->tpl_vars['last_nameErr']->value;?>
</label>
										</td>	
									</tr>
									<tr>
										<td width="120" class="tbl_column">Email <span class="f_req">*</span></td>
										<td>	
										<input type="text" tabindex="3" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" class="span8">
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['emailErr']->value;?>
</label>																						
										</td>	
									</tr>	
                                    <tr class="tbl_row">
										<td width="120" class="tbl_column"> Mobile <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="4" name="mobile" id="" value="<?php echo $_smarty_tpl->tpl_vars['mobile']->value;?>
" autocomplete="off">							
									<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['mobileErr']->value;?>
 </label>							
										</td>		
									</tr>									
									<tr>
										<td width="120" class="tbl_column">DOB <span class="f_req">*</span></td>
										<td> 
										<input name="dob" tabindex="5" value="<?php echo $_smarty_tpl->tpl_vars['dob']->value;?>
"  class="datepick span8" placeholder="" type="text" id="HrEmployeeDob">										
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['dobErr']->value;?>
</label>																					
										</td>
									</tr>	

										<!--tr class="tbl_row">
										<td width="120" class="tbl_column">Position For <span class="f_req">*</span></td>
										<td> 
										<select tabindex="6" name="position_for" class="span8"  id="position_for">
										<option value="">Select</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['requirement']->value,'selected'=>$_POST['position_for']),$_smarty_tpl);?>
	
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['position_forErr']->value;?>
</label>																					
										</td>
									</tr-->	
									<tr>
										<td width="120" class="tbl_column">Current Designation<span class="f_req">*</span></td>
										<td>										
										<select tabindex="7" name="designation_id" class="span8"  id="designation_id">	
											<option value="">Select</option>
											<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['desig_name']->value,'selected'=>$_POST['designation_id']),$_smarty_tpl);?>
															
										</select>
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['positionErr']->value;?>
</label>									
										</td>	
									</tr>	
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Total Years of Exp<span class="f_req">*</span></td>
										<td>
										<select name="year_of_exp" tabindex="8" class="span4">
										<option value="">Year</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['exp_yr']->value,'selected'=>$_POST['year_of_exp']),$_smarty_tpl);?>
	
										</select>
										<select name="month_of_exp" tabindex="9" class="inline_text span4">
										<option value="">Month</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['exp_month']->value,'selected'=>$_POST['month_of_exp']),$_smarty_tpl);?>
	
										</select>
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['year_of_expErr']->value;
echo $_smarty_tpl->tpl_vars['month_of_expErr']->value;?>
</label>																						
										</td>
							</tr>
								</tbody>
							</table>
						</div>
							
<div class="span6">		
							<table class="table table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
								
									<tr class="tbl_row">
										<td width="120" class="tbl_column">CTC <span class="f_req">*</span></td>
										<td>	
										
										<input type="text" tabindex="10" name="present_ctc" value="<?php echo $_smarty_tpl->tpl_vars['present_ctc']->value;?>
" placeholder="Present"  class="span2"/>										
										<select class="span3"  tabindex="11"  name="present_ctc_type">
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ctc_type']->value,'selected'=>$_POST['present_ctc_type']),$_smarty_tpl);?>

										</select> 
											
										<input type="text" tabindex="12" name="expected_ctc" value="<?php echo $_smarty_tpl->tpl_vars['expected_ctc']->value;?>
" placeholder="Expected"  class="span2"/>	
										<select  class="span3" tabindex="13"  name="expected_ctc_type">
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ctc_type']->value,'selected'=>$_POST['expected_ctc_type']),$_smarty_tpl);?>

										</select>			
										<span class="f_req">*</span>		
										<label for="reg_city" generated="true" class="error">
										<?php echo $_smarty_tpl->tpl_vars['present_ctcErr']->value;?>

										</label>
											<label for="reg_city" generated="true" class="error">
										<?php echo $_smarty_tpl->tpl_vars['present_ctc_typeErr']->value;?>
</label>
											<label for="reg_city" generated="true" class="error">
										<?php echo $_smarty_tpl->tpl_vars['expected_ctcErr']->value;?>
</label>
											<label for="reg_city" generated="true" class="error">
										<?php echo $_smarty_tpl->tpl_vars['expected_ctc_typeErr']->value;?>
</label>
										
										
										</label>	
										</td>
									</tr>
									<tr>
										<td width="125" class="tbl_column">Notice Period <span class="f_req">*</span></td>
										<td> 
										<select name="notice_period" tabindex="14" class="span8">										
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['n_p']->value,'selected'=>$_POST['notice_period']),$_smarty_tpl);?>
							
										</select>
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['notice_periodErr']->value;?>
</label>																		
										</td>
									</tr>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Gender <span class="f_req">*</span></td>
										<td> 
										<input type="radio" tabindex="2" tabindex="15" name="gender"<?php if ($_POST['gender'] == '1') {
echo 'checked';
}?> value="1"> Male
										<input type="radio" tabindex="3" tabindex="16" name="gender"<?php if ($_POST['gender'] == '2') {
echo 'checked';?>
 <?php }?> value="2"> Female
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['genderErr']->value;?>
</label>																				
										</td>
									</tr>	
									 <tr>
										<td width="120" class="tbl_column">Marital Status <span class="f_req"></span></td>
										<td>
										<input type="radio" tabindex="17" name="marital_status"<?php if ($_POST['marital_status'] && $_POST['marital_status'] == 1) {
echo 'checked';
}?> value="1"> Single
										<input type="radio" tabindex="18" name="marital_status"<?php if ($_POST['marital_status'] && $_POST['marital_status'] == 2) {
echo 'checked';?>
 <?php }?> value="2"> Married
										</td>	
									</tr>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Family (Dependents) <span class="f_req"></span></td>										
										<td>
										<textarea name="family" id="family" tabindex="19" cols="10" rows="3" class="span8"><?php echo $_POST['family'];?>
</textarea>									
										</td>			
									</tr>	
									<tr>
										<td width="120" class="tbl_column">Present Location <span class="f_req">*</span> </td>
										<td>
								        <input type="text" tabindex="20" name="present_location" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['present_location']->value;?>
" class="span8">								
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['present_locationErr']->value;?>
</label>
										</td>	
									</tr>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Native Location </td>
										<td>
								        <input type="text" tabindex="21" name="native_location" value="<?php echo $_POST['native_location'];?>
" class="span8">								
										</td>	
									</tr>										
									
								</tbody>
							</table>
						</div>
</div>
	
<!-- sheepIt Form -->
<div  class="tab-pane" id="mbox_Education">
<div id="sheepItForm">
 
  <!-- Form template-->
  <div id="sheepItForm_template" class="" style="clear:left;">
    <div class="span6">
		<table class="table table-bordered dataTable" style="margin-bottom:0;">
			<tbody>
			<tr class="tbl_row">
				<td width="120" class="tbl_column">Qualification <span class="f_req">*</span></td>		
				<td>								
				<select name="qualification_#index#" tabindex="1" class="span8 qualification_id"  id="qualification_#index#">	
					<option value="">Select</option>
					<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['qual']->value),$_smarty_tpl);?>
															
				</select>						
				<label for="reg_city" generated="true" class="error" id="qualification_Err_#index#"></label>
				</td>			
			</tr>
			
			<tr>
				<td width="120" class="tbl_column">Degree <span class="f_req">*</span></td>
				<td> 
					<select name="degree_#index#" tabindex="2" class="span8 degree_id"  id="degree_#index#">
					<option value="">Select</option>
					</select>
					<label for="reg_city" generated="true" class="error" id="degree_Err_#index#"></label>										
				</td>
		    </tr>
			
			<tr>
				<td width="120" class="tbl_column">Specialization <span class="f_req">*</span></td>
				<td> 
					<select name="specialization_#index#" tabindex="3" class="span8"  id="specialization_#index#">	
					<option value="">Select</option>
						<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['spec']->value),$_smarty_tpl);?>
							
					</select>
					<label for="reg_city" generated="true" class="error" id="specialization_Err_#index#"></label>										
				</td>						
			</tr>
			
			<tr class="tbl_row">
				<td width="120" class="tbl_column">College <span class="f_req"></span></td>
				<td> 
					<input type="text" tabindex="4" name="college_#index#" id="college_#index#" class="span8" >										
					<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['collegeErr']->value;?>
</labe>									
				</td>
			</tr>
			
			
			
							
			</tbody>
		</table>			
		</div>
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
					<tbody>
							
							<tr  class="tbl_row">
								<td width="120" class="tbl_column">% of Marks / Grade <span class="f_req"></span></td>
								<td> 
									<input type="text" tabindex="5" name="grade_#index#" id="grade_#index#" value="<?php echo $_smarty_tpl->tpl_vars['grade']->value;?>
" class="span4" >
									<select name="grade_type_#index#" class="inline_text span4"  id="grade_type_#index#">
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['grade_drop']->value),$_smarty_tpl);?>
 
									</select>
								</td>
							</tr>
							<tr class="tbl_row">
							<td width="120" class="tbl_column">Year of Passing <span class="f_req">*</span></td>										
								<td>
									<select name="year_of_pass_#index#" id="year_of_pass_#index#" tabindex="6" class="span8">
									<option value="">Year</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['year_of_pass']->value),$_smarty_tpl);?>
 
									</select>
								<label for="reg_city" generated="true" class="error" id="year_of_pass_Err_#index#"></label>	
							</tr>
							
							<tr>
								<td width="120" class="tbl_column">University <span class="f_req"></span></td>
								<td> 
									<input type="text" tabindex="7" name="university_#index#" id="university_#index#" class="span8" >										
								</td>
							</tr>
							
					</tbody>
		  </table>
		</div>		

<div style="float: left;    clear: left;    margin-top: 5px;    margin-bottom: 5px;">										
<button type="button" id="sheepItForm_remove_current" >
<a><span>Remove</span></a></button>
</div>
</div>
  <!-- /Form template-->
   
  <!-- No forms template -->
  <div id="sheepItForm_noforms_template">No data</div>
  <!-- /No forms template-->
   
  <!-- Controls -->
  <div id="sheepItForm_controls">
    <span id="sheepItForm_add" style="float:right;margin-top:5px;">
    	<button type="button"><a><span>Add Another</span></a></button>
    </span>
  </div>
  <!-- /Controls -->


</div>

</div>
<!-- /sheepIt Form -->

<!-- sheepIt Form -->
<div  class="tab-pane" id="mbox_Experience">
<div id="sheepItForm1">
  <!-- Form template-->
  <div id="sheepItForm1_template" class="" style="clear:left;">
 
				   <div class="span6">
		<table class="table table-bordered dataTable" style="margin-bottom:0;">
			<tbody>
			
							
							<tr class="tbl_row">
										<td width="120" class="tbl_column">Designation <span class="f_req">*</span></td>
										<td> 
										<select name="desig_#index#" class="span8" tabindex="1"  id="desig_#index#">
										<option value="">Select</option>	
											<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['desig_name']->value),$_smarty_tpl);?>
															
										</select>
										<label for="reg_city" generated="true" class="error"id="desig_Err_#index#" ></label>										
										</td>
							</tr>
								<tr>
										<td width="120" class="tbl_column">Employment Period<span class="f_req">*</span></td>
										<td>
										<select name="year_of_exp_#index#" id = "year_of_exp_#index#" tabindex="2" class="span4">
										<option value="">Year</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['exp_yr']->value),$_smarty_tpl);?>
 

										</select>
										<select name="month_of_exp_#index#" id = "month_of_exp_#index#" tabindex="3" class="inline_text span4">
										<option value="">Month</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['exp_month']->value),$_smarty_tpl);?>
 

										</select>
										<label for="reg_city" generated="true" class="error" id="year_of_exp_Err_#index#"></label>																						
										</td>
							</tr>
							
							<tr class="tbl_row">
										<td width="120" class="tbl_column">Area of Specialization/Expertise  <span class="f_req">*</span></td>
											<td> 
										<input type="text" name="area_#index#" id="area_#index#"  tabindex="4" class="span8" />
										<label for="reg_city" generated="true" class="error" id="area_Err_#index#"></label>										
										</td>
							</tr>
							<tr>
										<td width="120" class="tbl_column">Company Name <span class="f_req">*</span></td>
										<td> 
										<input type="text" tabindex="5" name="company_#index#" id="company_#index#"  class="span8" />
										<label for="reg_city" generated="true" class="error" id="company_Err_#index#"></label>										
										</td>
							</tr>						
			</tbody>
		</table>				
		</div>
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
					<tbody>
									
						
							<tr class="tbl_row">
										<td width="120" class="tbl_column">Location <span class="f_req">*</span></td>
										<td> 
										<input type="text"  tabindex="6" name="location_#index#" id="location_#index#"  class="span8" />
										<label for="reg_city" generated="true" class="error" id="location_Err_#index#"></label>										
										</td>
							</tr>			
								<tr>
										<td width="120" class="tbl_column">Other Vital Information (Position Specific)  <span class="f_req"></span></td>
										<td> 
										<textarea name="vital_#index#" tabindex="7" id="vital_#index#" cols="10" rows="3" class="span8"></textarea>
										</td>
							</tr>
					</tbody>
		  </table>
		</div>		
								

<div style="float: left;    clear: left;    margin-top: 5px;    margin-bottom: 5px;">										
<button type="button" id="sheepItForm1_remove_current" >
<a><span>Remove</span></a></button>
</div>
</div>
  <!-- /Form template-->
   
  <!-- No forms template -->
  <div id="sheepItForm1_noforms_template">No data</div>
  <!-- /No forms template-->
   
  <!-- Controls -->
  <div id="sheepItForm1_controls">
    <span id="sheepItForm1_add" style="float:right;margin-top:5px;">
    	<button type="button"><a><span>Add Another</span></a></button>
    </span>
  </div>
  <!-- /Controls -->


</div>

</div>
<div class="tab-pane" id="mbox_Consultant">
<div class="span12">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Consultant Assessment <span class="f_req"></span></td>
										<td>
<textarea placeholder="" name="consultant" tabindex="1" id="consultant" cols="10" rows="3" class="span10"><?php echo $_POST['consultant'];?>
</textarea>
										</td>	
									</tr>	
									<tr class="">
										<td width="120" class="tbl_column">Interview Availability </td>
										<td>
<textarea placeholder="" name="interview_availability" tabindex="2" id="interview_availability" cols="10" rows="3" class="span10"><?php echo $_POST['interview_availability'];?>
</textarea>
										<!--label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['interview_availabilityErr']->value;?>
</label-->
										</td>	
									</tr>													
								</tbody>
							</table>
						</div>
						<input type="hidden" id="edu_count" name="edu_count" value="<?php echo $_smarty_tpl->tpl_vars['eduCount']->value;?>
">
						<input type="hidden" id="exp_count" name="exp_count" value="<?php echo $_smarty_tpl->tpl_vars['expCount']->value;?>
">	
<input type="hidden" id="add_resume" name="add_resume" value="<?php echo $_POST['add_resume'];?>
">	
</div>
</div>
</div>
<input type="hidden" id="tab_open" value="<?php echo $_smarty_tpl->tpl_vars['tab_open']->value;?>
"/>
<div class="form-actions">
	<button class="btn btn-gebo" type="submit">Submit</button>
	<a href="<?php echo @constant('webroot');?>
resume" class="jsRedirect cancelBtn"><input type="button" value="Cancel" class="btn">
	</a>
	
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
	</div>
			
	<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < $_POST['edu_count']) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < $_POST['edu_count']; $_smarty_tpl->tpl_vars['i']->value++) {
?>
		
		<input type="hidden" id="qualificationData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="qualificationData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['qualificationData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="specializationData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="specializationData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value='<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['spec_data']->value[$_smarty_tpl->tpl_vars['i']->value]),$_smarty_tpl);?>
'>
		<input type="hidden" id="collegeData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="collegeData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['collegeData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="degreeData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="degreeData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value='<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['degreeData']->value[$_smarty_tpl->tpl_vars['i']->value]),$_smarty_tpl);?>
'>
		<input type="hidden" id="degreeSelData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="degreeSelData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['degree']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="specializationSelData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="specializationSelData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['spec']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">

		<!--input type="hidden" id="degreeData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="degreeData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_SESSION[$_smarty_tpl->tpl_vars['i']->value]['degreeData'];?>
"-->
		<input type="hidden" id="gradeData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="gradeData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['gradeData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="grade_typeData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="grade_typeData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['grade_typeData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="universityData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="universityData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['universityData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="year_of_passData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="year_of_passData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['year_of_passData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		
		<input type="hidden" id="qualification_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['eduErr']->value[$_smarty_tpl->tpl_vars['i']->value]['qualificationErr'];?>
">
		<input type="hidden" id="degree_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['eduErr']->value[$_smarty_tpl->tpl_vars['i']->value]['degreeErr'];?>
">
		<input type="hidden" id="specialization_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['eduErr']->value[$_smarty_tpl->tpl_vars['i']->value]['specializationErr'];?>
">
		<input type="hidden" id="year_of_pass_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['eduErr']->value[$_smarty_tpl->tpl_vars['i']->value]['year_of_passErr'];?>
">
	<?php }
}
?>

	
	<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < $_POST['exp_count']) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < $_POST['exp_count']; $_smarty_tpl->tpl_vars['i']->value++) {
?>
		<input type="hidden" id="desigData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="desigData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['desigData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="areaData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="areaData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['areaData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="year_of_expData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="year_of_expData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['year_of_expData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="month_of_expData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="month_of_expData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['month_of_expData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<!--<input type="hidden" id="current_locData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="current_locData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['current_locData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">-->
		<input type="hidden" id="companyData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="companyData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['companyData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="locationData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="locationData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['locationData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="vitalData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="vitalData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['vitalData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		
		<input type="hidden" id="desig_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['expErr']->value[$_smarty_tpl->tpl_vars['i']->value]['desigErr'];?>
">
		<input type="hidden" id="year_of_exp_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['expErr']->value[$_smarty_tpl->tpl_vars['i']->value]['year_of_expErr'];?>
">
		<!--<input type="hidden" id="current_loc_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['expErr']->value[$_smarty_tpl->tpl_vars['i']->value]['current_locErr'];?>
">-->
		<input type="hidden" id="area_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['expErr']->value[$_smarty_tpl->tpl_vars['i']->value]['areaErr'];?>
">
		<input type="hidden" id="location_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['expErr']->value[$_smarty_tpl->tpl_vars['i']->value]['locationErr'];?>
">
		<input type="hidden" id="company_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['expErr']->value[$_smarty_tpl->tpl_vars['i']->value]['companyErr'];?>
">
	<?php }
}
?>

	
	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	 
<?php echo '<script'; ?>
 type="text/javascript">	
$(document).ready(function(){
   var sheepAdd = {};
	if($('#sheepItForm').length > 0){ 
	var sheepAdd = $('#sheepItForm').sheepIt({
		   separator: '',
		   allowRemoveLast: true,
		   allowRemoveCurrent: true,
		   allowRemoveAll: true,
		   allowAdd: true,
		   allowAddN: true,
		   maxFormsCount: 10,
		   minFormsCount: 1,
		   iniFormsCount: $('#edu_count').val() ? $('#edu_count').val() : '1',
		   removeLastConfirmation: true,
		   removeCurrentConfirmation: true,
		   removeLastConfirmationMsg: 'Are you sure?',
		   removeCurrentConfirmationMsg: 'Are you sure?',
		   continuousIndex: true,
		   afterAdd: function(source, newForm) {
			 $('#edu_count').attr('value',source.getFormsCount());
			 // fetch the degree
			 $(".qualification_id").change(function (){
				var qualification_name = $(this).val();
				 var qual_id = $(this).attr('id').split('_');	
				
				 $.ajax({
					url : "get_degree.php",
					method : "GET",
					dataType: "json",
					data : {qualification : qualification_name},
					encode  : false
				})
					.done(function (data){
						var div_data = '<option value="">Select</option>';
						$.each(data,function (a,y){ 
							div_data +=  "<option value="+a+">"+y+"</option>";
						});
					$('#degree_'+qual_id[1]).empty();
					$('#specialization_'+qual_id[1]).empty();
					$('#degree_'+qual_id[1]).html(div_data); 
				});
			});	
			// fetch the spec.
			$(".degree_id").change(function (){
				var degree_name = $(this).val();
				var degree_id = $(this).attr('id').split('_');	
				$.ajax({
					url : "get_specialization.php",
					method : "GET",
					dataType: "json",
					data : {degree : degree_name},
					encode  : false
				})
					.done(function (data){
						var div_data = '<option value="">Select</option>';
						$.each(data,function (a,y){ 
							div_data +=  "<option value="+a+">"+y+"</option>";
						});
				  
					$('#specialization_'+degree_id[1]).empty();
					$('#specialization_'+degree_id[1]).html(div_data);  
					 
				});
	});
		   },
		   afterRemoveCurrent: function(source) {		
			 $('#edu_count').attr('value',source.getFormsCount());
		  }
	   });	   
	}
	
	/* function to load education php value into form */
	if($('#sheepItForm').length > 0){
		for(i = 0; i < $('#edu_count').val(); i++){
			if($('#year_of_passData_'+i).length > 0){ 
				$('#year_of_pass_'+i).attr('value', $('#year_of_passData_'+i).val());
			}
			if($('#gradeData_'+i).length > 0){ 
				$('#grade_'+i).attr('value', $('#gradeData_'+i).val());
			}
			if($('#collegeData_'+i).length > 0){ 
				$('#college_'+i).val($('#collegeData_'+i).val());
			}
			if($('#grade_typeData_'+i).length > 0){ 
				$('#grade_type_'+i).val($('#grade_typeData_'+i).val());
			}
			if($('#universityData_'+i).length > 0){ 
				$('#university_'+i).val($('#universityData_'+i).val());
			}
			if($('#qualificationData_'+i).length > 0){ 
				$('#qualification_'+i).val($('#qualificationData_'+i).val());
			}
			if($('#specializationData_'+i).length > 0){ 
				$('#specialization_'+i).html('<option value="">Select</option>'+$('#specializationData_'+i).val());
			}
			// to retain specialization
			if($('#specializationSelData_'+i).length > 0){
				$('#specialization_'+i).val($('#specializationSelData_'+i).val());
			}			
			if($('#degreeData_'+i).length > 0){
				$('#degree_'+i).append( $('#degreeData_'+i).val());
			}
			// condition to retain the degree
			if($('#degreeSelData_'+i).length > 0){
				$('#degree_'+i).val( $('#degreeSelData_'+i).val());
			}
			
			if($('#locationData_'+i).length > 0){ 
				$('#location_'+i).val( $('#locationData_'+i).val());
			}
			
			// for error messages
			if($('#specialization_Err_Data_'+i).length > 0){ 
				$('#specialization_Err_'+i).html($('#specialization_Err_Data_'+i).val());
			}
			if($('#degree_Err_Data_'+i).length > 0){ 
				$('#degree_Err_'+i).html($('#degree_Err_Data_'+i).val());
			}
			if($('#year_of_pass_Err_Data_'+i).length > 0){ 
				$('#year_of_pass_Err_'+i).html($('#year_of_pass_Err_Data_'+i).val());
			}
			if($('#qualification_Err_Data_'+i).length > 0){ 
				$('#qualification_Err_'+i).html($('#qualification_Err_Data_'+i).val());
			}
		}
	}
	
	if($('#sheepItForm1').length > 0){ 
	var sheepAdd = $('#sheepItForm1').sheepIt({
		   separator: '',
		   allowRemoveLast: true,
		   allowRemoveCurrent: true,
		   allowRemoveAll: true,
		   allowAdd: true,
		   allowAddN: true,
		   maxFormsCount: 10,
		   minFormsCount: 1,
		   iniFormsCount: $('#exp_count').val() ? $('#exp_count').val() : '1',
		   removeLastConfirmation: true,
		   removeCurrentConfirmation: true,
		   removeLastConfirmationMsg: 'Are you sure?',
		   removeCurrentConfirmationMsg: 'Are you sure?',
		   continuousIndex: true,
		   afterAdd: function(source, newForm) {
			 $('#exp_count').attr('value',source.getFormsCount());
		   },
		   afterRemoveCurrent: function(source) {		
			 $('#exp_count').attr('value',source.getFormsCount());
		  }
	   });	   
	}
	
	/* function to load experience php value into form */
	if($('#sheepItForm1').length > 0){
		for(i = 0; i < $('#exp_count').val(); i++){
			if($('#desigData_'+i).length > 0){ 
				$('#desig_'+i).attr('value', $('#desigData_'+i).val());
			}
			/*if($('#current_locData_'+i).length > 0){ 
				$('#current_loc_'+i).attr('value', $('#current_locData_'+i).val());
			}*/
			if($('#areaData_'+i).length > 0){ 
				$('#area_'+i).attr('value', $('#areaData_'+i).val());
			}
			if($('#year_of_expData_'+i).length > 0){ 
				$('#year_of_exp_'+i).attr('value', $('#year_of_expData_'+i).val());
			}
			if($('#month_of_expData_'+i).length > 0){ 
				$('#month_of_exp_'+i).val( $('#month_of_expData_'+i).val());
			}
			if($('#companyData_'+i).length > 0){ 
				$('#company_'+i).val( $('#companyData_'+i).val());
			}
			if($('#locationData_'+i).length > 0){ 
				$('#location_'+i).val( $('#locationData_'+i).val());
			}
			if($('#vitalData_'+i).length > 0){ 
				$('#vital_'+i).val( $('#vitalData_'+i).val());
			}
			
			// for error messages
			if($('#desig_Err_Data_'+i).length > 0){ 
				$('#desig_Err_'+i).html($('#desig_Err_Data_'+i).val());
			}
			if($('#year_of_exp_Err_Data_'+i).length > 0){ 
				$('#year_of_exp_Err_'+i).html($('#year_of_exp_Err_Data_'+i).val());
			}
			/*if($('#current_loc_Err_Data_'+i).length > 0){ 
				$('#current_loc_Err_'+i).html($('#current_loc_Err_Data_'+i).val());
			}*/
			if($('#area_Err_Data_'+i).length > 0){ 
				$('#area_Err_'+i).html($('#area_Err_Data_'+i).val());
			}
			if($('#location_Err_Data_'+i).length > 0){ 
				$('#location_Err_'+i).html($('#location_Err_Data_'+i).val());
			}
			if($('#company_Err_Data_'+i).length > 0){ 
				$('#company_Err_'+i).html($('#company_Err_Data_'+i).val());
			}
		}
	}
});
<?php echo '</script'; ?>
>	
<?php }
}
