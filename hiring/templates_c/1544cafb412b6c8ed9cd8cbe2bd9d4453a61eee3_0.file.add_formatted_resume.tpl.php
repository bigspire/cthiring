<?php
/* Smarty version 3.1.29, created on 2018-03-13 12:41:20
  from "C:\xampp\htdocs\2017\ctsvn2\cthiring\hiring\templates\add_formatted_resume.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5aa77998953d83_78088230',
  'file_dependency' => 
  array (
    '1544cafb412b6c8ed9cd8cbe2bd9d4453a61eee3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn2\\cthiring\\hiring\\templates\\add_formatted_resume.tpl',
      1 => 1518689730,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5aa77998953d83_78088230 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\2017\\ctsvn2\\cthiring\\hiring\\vendor\\smarty-3.1.29\\libs\\plugins\\function.html_options.php';
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
                           <a href="<?php echo @constant('webroot');?>
resume">Resumes</a>
                        </li>
                        <li>
                           Add Fully Formatted Resume
                        </li>
                     </ul>
                  </div>
              </nav>
				<?php if ($_smarty_tpl->tpl_vars['EXIST_MSG']->value) {?>
				 <div id="flashMessage" class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><?php echo $_smarty_tpl->tpl_vars['EXIST_MSG']->value;?>
</div>					
				<?php }?>	
<form action="" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="row-fluid">
		<div class="span12">
		<div class="mbox">
			<div class="tabbable">
								<div class="heading">
										<ul class="nav nav-tabs">
										<li class="personal"><a class="restabChange" rel="personal"  href="#box_personal" data-toggle="tab"><i class="splashy-contact_blue"></i>   Personal </a></li>
										<li class="education"><a class="restabChange" rel="education"  href="#box_edu" data-toggle="tab"><i class="splashy-document_letter_add"></i>  Education Details </a></li>
										<li class="exp"><a class="restabChange" rel="exp"  href="#box_exp" data-toggle="tab"><i class="splashy-folder_classic_stuffed_add"></i>  Experience Details </a></li>
										<li class="training"><a class="restabChange" rel="training"  href="#box_train" data-toggle="tab"><i class="splashy-shield_star"></i>  Training & Programmes</a></li>
										<li class="assess"><a class="restabChange" rel="assess"  href="#box_Consultant" data-toggle="tab"><i class="splashy-contact_grey_edit"></i> Consultant Assessment </a></li>	
									</ul>
								</div>
			<div class="tab-content" style="overflow:visible">			
			<div class="tab-pane active" id="box_personal">
			<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Position For <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="3" name="position" value="<?php echo $_smarty_tpl->tpl_vars['position']->value;?>
" class="span8" disabled>
										</td>
									</tr>
									
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
										<input type="text" tabindex="4" name="mobile"  value="<?php echo $_smarty_tpl->tpl_vars['mobile']->value;?>
" class="span8 ui-autocomplete-input" autocomplete="off">							
									<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['mobileErr']->value;?>
 </label>	</td>		
									</tr>	
									
									<tr>
										<td width="120" class="tbl_column">Telephone <span class="f_req"></span></td>
										<td>
										<input type="text" tabindex="5" name="telephone" value="<?php if ($_smarty_tpl->tpl_vars['telephone']->value) {
echo $_smarty_tpl->tpl_vars['telephone']->value;
} else {
echo $_POST['telephone'];
}?>" class="span8">
										<!--label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['telephoneErr']->value;?>
</label-->	</td>	
									</tr>								
									<tr class="tbl_row">
										<td width="120" class="tbl_column">DOB <span class="f_req">*</span></td>
										<td> 
										<input name="dob_field" tabindex="6" value="<?php echo $_smarty_tpl->tpl_vars['dob_field']->value;?>
"  class="datepick span8" type="text">										
											<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['dobErr']->value;?>
</label></td>
									</tr>	

									<!--tr>
										<td width="120" class="tbl_column">Position Applied For <span class="f_req">*</span></td>
										<td> 
										<select tabindex="7" name="position_for" class="span8"  id="position_for">
										<option value="">Select</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['requirement']->value,'selected'=>$_smarty_tpl->tpl_vars['position_for']->value),$_smarty_tpl);?>
	
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['position_forErr']->value;?>
</label>																					
										</td>
									</tr-->
																		
									<tr class="tbl_row">
										<td width="125" class="tbl_column">Current Designation <span class="f_req">*</span></td>
										<td> 
										<select tabindex="8" name="designation_id" class="span8" value="<?php echo $_smarty_tpl->tpl_vars['designation_id']->value;?>
">	
											<option value="">Select</option>
											<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['desig_name']->value,'selected'=>$_smarty_tpl->tpl_vars['designation_id']->value),$_smarty_tpl);?>
															
										</select>
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['positionErr']->value;?>
</label>
										</td>
									</tr>
									
									<tr>
										<td width="120" class="tbl_column">Total Years of Exp. <span class="f_req">*</span></td>										
										<td>
										<select name="year_of_exp" tabindex="9" class="span4">
										<option value="">Year</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['total_exp_yr']->value,'selected'=>$_smarty_tpl->tpl_vars['year_of_exp']->value),$_smarty_tpl);?>
	
										</select>
										<select name="month_of_exp" tabindex="10" class="inline_text span4">
										<option value="">Month</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['total_exp_month']->value,'selected'=>$_smarty_tpl->tpl_vars['month_of_exp']->value),$_smarty_tpl);?>
	
										</select>
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['year_of_expErr']->value;?>
</label>	
<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['month_of_expErr']->value;?>
</label>										
										</td>			
									</tr>	

									<tr class="tbl_row">
										<td width="120" class="tbl_column">Present Location <span class="f_req">*</span></td>
										<td>
								          <input type="text" tabindex="11" name="present_location" value="<?php echo $_smarty_tpl->tpl_vars['present_location']->value;?>
" class="span8">								
											<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['present_locationErr']->value;?>
</label>
										</td>	
									</tr>
									<tr>
										<td width="120" class="tbl_column">Native Location </td>
										<td>
								        <input type="text" tabindex="12" name="native_location" placeholder="" value="<?php if ($_smarty_tpl->tpl_vars['native_location']->value) {
echo $_smarty_tpl->tpl_vars['native_location']->value;
} else {
echo $_POST['native_location'];
}?>" class="span8">								
										</td>	
									</tr>		
									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Family (Dependents)<span class="f_req"></span></td>										
										<td>
										<textarea name="family" tabindex="13" cols="10" rows="2" class="span8 wysiwyg1"><?php if ($_smarty_tpl->tpl_vars['family']->value) {
echo $_smarty_tpl->tpl_vars['family']->value;
} else {
echo $_POST['family'];
}?></textarea>									
										</td>			
									</tr>	
																	
										<tr class="tbl_row">
										<td width="120" class="tbl_column"> Nationality   <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="14" name="nationality" id="nationality" value="<?php echo $_smarty_tpl->tpl_vars['nationality']->value;?>
" class="span8 ui-autocomplete-input" autocomplete="off">							
										<label for="reg_city" generated="true" class="error"> <?php echo $_smarty_tpl->tpl_vars['nationalityErr']->value;?>
 </label>								
										</td>										
																		
								</tbody>
							</table>
						</div>
							
						<div class="span6">		
							<table class="table table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
								<tr class="tbl_row">
										<td width="120" class="tbl_column"> Languages    <span class="f_req">*</span></td>
										<td>
 									<select name="res_language[]" multiple class="chosen-select" tabindex="15" id="language">
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['languages']->value,'selected'=>$_smarty_tpl->tpl_vars['res_language']->value),$_smarty_tpl);?>

									</select>                             
									<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['languageErr']->value;?>
 </label>	
									</td>
									</tr>
								<tr>
										<td width="120" class="tbl_column"> Compensation <span class="f_req">*</span></td>
										<td>	
										
										<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['present_ctc']->value;?>
"  tabindex="15" name="present_ctc"  placeholder="Present"  class="span2"/>										
										<select class="span3"   name="present_ctc_type" tabindex="16">
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ctc_type']->value,'selected'=>$_smarty_tpl->tpl_vars['present_ctc_type']->value),$_smarty_tpl);?>

										</select>  
											
										<input type="text" name="expected_ctc" tabindex="17"  placeholder="Expected" value="<?php echo $_smarty_tpl->tpl_vars['expected_ctc']->value;?>
" class="span2"/>	
										<select  class="span3"  name="expected_ctc_type" tabindex="18">
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ctc_type']->value,'selected'=>$_smarty_tpl->tpl_vars['expected_ctc_type']->value),$_smarty_tpl);?>

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
										
										
										</td>	
									</tr>	
									<tr class="tbl_row">
										<td width="125" class="tbl_column">Notice Period <span class="f_req">*</span></td>
										<td> 
										<select name="notice_period" tabindex="19" class="span8">										
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['n_p']->value,'selected'=>$_smarty_tpl->tpl_vars['notice_period']->value),$_smarty_tpl);?>
							
										</select>
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['notice_periodErr']->value;?>
</label>																				
										</td>
									</tr>	
									
									<tr >
										<td width="120" class="tbl_column">Gender <span class="f_req">*</span></td>
										<td> 
										<input type="radio" tabindex="20" tabindex="14" name="gender"<?php if (isset($_smarty_tpl->tpl_vars['gender']->value) && $_smarty_tpl->tpl_vars['gender']->value == '1') {
echo 'checked';
}?> value="1"> Male
										<input type="radio" tabindex="21" tabindex="15" name="gender"<?php if (isset($_smarty_tpl->tpl_vars['gender']->value) && $_smarty_tpl->tpl_vars['gender']->value == '2') {
echo 'checked';
}?> value="2"> Female
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['genderErr']->value;?>
 </label>																				
										</td>
									</tr>	
									 <tr class="tbl_row">
										<td width="120" class="tbl_column">Marital Status <span class="f_req"></span></td>
										<td>
										<input type="radio" tabindex="22" name="marital_status"<?php if ($_smarty_tpl->tpl_vars['marital_status']->value && $_smarty_tpl->tpl_vars['marital_status']->value == '1' || $_POST['marital_status'] == '1') {
echo 'checked';
}?> value="1"> Single
										<input type="radio" tabindex="23" name="marital_status"<?php if ($_smarty_tpl->tpl_vars['marital_status']->value && $_smarty_tpl->tpl_vars['marital_status']->value == '2' || $_POST['marital_status'] == '2') {
echo 'checked';?>
 <?php }?> value="2"> Married
										<input type="radio" tabindex="23" name="marital_status"<?php if ($_smarty_tpl->tpl_vars['marital_status']->value && $_smarty_tpl->tpl_vars['marital_status']->value == '3' || $_POST['marital_status'] == '3') {
echo 'checked';?>
 <?php }?> value="3"> Separated
										</td>	
									</tr>						
									
									
									<tr>
										<td width="120" class="tbl_column">Domain Expertise & Exposure <span class="f_req">*</span></td>
										<td> 
									   <textarea name="tech_expert" tabindex="24" cols="10" rows="3" class="span8 wysiwyg1"><?php if ($_smarty_tpl->tpl_vars['tech_expert']->value) {
echo $_smarty_tpl->tpl_vars['tech_expert']->value;
} else {
echo $_POST['tech_expert'];
}?></textarea>									
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['tech_expertErr']->value;?>
 </label>	
										</td>
									</tr>	
									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Computer Skills </td>
										<td>
										<textarea name="skills" cols="10" tabindex="25" rows="3" class="span8 wysiwyg1"><?php if ($_smarty_tpl->tpl_vars['skills']->value) {
echo $_smarty_tpl->tpl_vars['skills']->value;
} else {
echo $_POST['skills'];
}?></textarea>									
										</td>	
									</tr>									
									
									<tr>
										<td width="120" class="tbl_column">Address <span class="f_req">*</span></td>
										<td>
										 <textarea name="address" cols="10" tabindex="26" rows="3" class="span8 wysiwyg1"><?php if ($_smarty_tpl->tpl_vars['address']->value) {
echo $_smarty_tpl->tpl_vars['address']->value;
} else {
echo $_POST['address'];
}?></textarea>									
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['addressErr']->value;?>
</label>
										</td>	
									</tr>
									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Hobbies </td>
										<td>
										<textarea name="hobby" tabindex="27" cols="10" rows="3" class="span8 wysiwyg1"><?php if ($_smarty_tpl->tpl_vars['hobby']->value) {
echo $_smarty_tpl->tpl_vars['hobby']->value;
} else {
echo $_POST['hobby'];
}?></textarea>									
										</td>	
									</tr>	
								</tbody>
							</table>
						</div>
						
			</div>

					
					<!-- sheepIt Form -->
<div class="tab-pane" id="box_edu">	
<div id="sheepItForm">
 
  <!-- Form template-->
  <div id="sheepItForm_template" class="" style="clear:left;">
			<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Qualification <span class="f_req">*</span></td>
										<td>
										<select name="qualification_#index#" tabindex="" class="span8 qualification_id"  id="qualification_#index#">	
											<option value="">Select</option>
											<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['qual']->value),$_smarty_tpl);?>
															
										</select>						
										<label for="reg_city" generated="true" class="error" id="qualification_Err_#index#"></label></td>	
									</tr>
									<tr>
										<td width="120" class="tbl_column">Degree <span class="f_req">*</span></td>
										<td> 
					<select name="degree_#index#" tabindex="" class="span8 degree_id"  id="degree_#index#">
					<option value="">Select</option>
					</select>
					<label for="reg_city" generated="true" class="error" id="degree_Err_#index#"></label>										
				</td>	
									</tr>
									<tr class="tbl_row">
										<td width="120" class="tbl_column"> Specialization <span class="f_req">*</span></td>
										<td> 
					<select name="specialization_#index#" tabindex="" class="span8"  id="specialization_#index#">	
					<option value="">Select</option>
						<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['spec']->value),$_smarty_tpl);?>
							
					</select>
					<label for="reg_city" generated="true" class="error" id="specialization_Err_#index#"></label>										
				</td>	
									</tr>
						         <tr>
										<td width="120" class="tbl_column">University <span class="f_req"></span></td>
										<td> 
									<input type="text" tabindex="" name="university_#index#" id="university_#index#" class="span8" >										
								</td>	
									</tr>
	
											
									</tr>
								</tbody>
							</table>
						</div>
							<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr  class="tbl_row">
										<td width="120" class="tbl_column">Location <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="" name="location_#index#" id="location_#index#" value="" class="span8">
									<label for="reg_city" generated="true" class="error" id="locationErr_#index#"> </label> 
										</td>	
										</tr>
									
									<tr>
										<td width="120" class="tbl_column"> College <span class="f_req"></span></td>
										<td> 
					<input type="text" tabindex="" name="college_#index#" id="college_#index#" class="span8" >										
					<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['collegeErr']->value;?>
</labe>									
				</td>		
									</tr>
									<tr class="tbl_row">
										<td width="120" class="tbl_column"> % of Marks  <span class="f_req">*</span></td>
										<td> 
									<input type="text" tabindex="" name="grade_#index#" id="grade_#index#" value="<?php echo $_smarty_tpl->tpl_vars['grade']->value;?>
" class="span4" >
									<select name="grade_type_#index#" tabindex="" class="inline_text span4"  id="grade_type_#index#">
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['grade_drop']->value),$_smarty_tpl);?>
 
									</select>
									<label for="reg_city" generated="true" class="error" id="gradeErr_#index#"></label>	
							<label for="reg_city" generated="true" class="error" id="grade_typeErr_#index#"></label>	
							
								</td>		
									</tr>
									
									<tr>
										<td width="120" class="tbl_column">Year of passing <span class="f_req">*</span></td>										
								<td>
									<select name="from_yr_#index#" id="from_yr_#index#" tabindex="" class="span4">
									<option value="">Select</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['year_of_pass']->value),$_smarty_tpl);?>
 
									</select>
								<label for="reg_city" generated="true" class="error" id="from_yrErr_#index#">
								</label>	
							
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

<div class="tab-pane" id="box_exp">	
<div id="sheepItForm1">
  <!-- Form template-->
  <div id="sheepItForm1_template" class="" style="clear:left;">
							<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
			<tbody>
			
					<tr class="tbl_row">
										<td width="120" class="tbl_column">Designation <span class="f_req">*</span></td>
										<td> 
										<select tabindex="" name="desig_#index#" class="span8"  id="desig_#index#">	
											<option value="">Select</option>
											<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['desig_name']->value),$_smarty_tpl);?>
															
										</select>
										<label for="reg_city" generated="true" class="error" id="desigErr_#index#"></label>									
										</td>
							</tr>
								<tr>
										<td width="120" class="tbl_column">Employment Period<span class="f_req"> *</span></td>
										<td>
										<select name="from_month_of_exp_#index#" id = "from_month_of_exp_#index#" tabindex="" class="span2">
										<option value="">From Month</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['exp_month']->value),$_smarty_tpl);?>
 
										</select>
										<select name="from_year_of_exp_#index#" id = "from_year_of_exp_#index#" rel="maxDrop_#index#" tabindex="" class="minExpDrop inline_text span2">
										<option value="">From Year</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['exp_yr']->value),$_smarty_tpl);?>
 
										</select>
										
										<select name="to_month_of_exp_#index#" id = "to_month_of_exp_#index#" tabindex="" class=" inline_text span2">
										<option value="">To Month</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['exp_month']->value),$_smarty_tpl);?>
 
										</select>
										
										<select name="to_year_of_exp_#index#" id = "maxDrop_#index#" tabindex="" class="inline_text span2">
										<option value="">To Year</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['exp_yr']->value),$_smarty_tpl);?>
 
										</select>
										<label for="reg_city" generated="true" class="error" id="from_month_of_expErr_#index#"></label>																																
										<label for="reg_city" generated="true" class="error" id="from_year_of_expErr_#index#"></label>																						
										<label for="reg_city" generated="true" class="error" id="to_month_of_expErr_#index#"></label>																						
										<label for="reg_city" generated="true" class="error" id="to_year_of_expErr_#index#"></label>																						
										
										</td>
							</tr>
							<tr class="tbl_row">
										<td width="120" class="tbl_column">Location of Work <span class="f_req">*</span></td>
										<td> 
										<input type="text"  tabindex="" name="workloc_#index#" id="workloc_#index#" value="" class="span8" />										
										<label for="reg_city" generated="true" class="error" id="worklocErr_#index#"></label>										
										</td>
										
							</tr>
							<tr>
										<td width="120" class="tbl_column">Area of Specialization/Expertise  <span class="f_req">*</span></td>
										<td> 
										<input type="text" value=""  name="area_#index#" id="area_#index#"  tabindex="" class="span8" />
										<label for="reg_city" generated="true" class="error" id="areaErr_#index#"></label>										
										</td>
							</tr>
								<tr class="tbl_row">
										<td width="120" class="tbl_column">Company Name <span class="f_req">*</span></td>
										<td> 
										<input type="text"  tabindex="" name="company_#index#" value="" id="company_#index#"  class="span8" />
										<label for="reg_city" generated="true" class="error" id="companyErr_#index#"></label>										
										</td>
							</tr>	
							<tr>
								<td width="120" class="tbl_column">Company Profile <span class="f_req">*</span></td>
								<td>
								<textarea name="company_profile_#index#" tabindex="" id="company_profile_#index#" cols="10" rows="3" class="span8 wysiwyg1"></textarea>									
								<label for="reg_city" generated="true" class="error" id="company_profileErr_#index#"></label>
								</td>	
							</tr>							
												
			</tbody>
		</table>				
		</div>
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
					<tbody>
									
								<tr class="tbl_row">
										<td width="120" class="tbl_column">Other Vital Information (Position Specific)  <span class="f_req"></span></td>
										<td> 
										<textarea   placeholder="" name="vital_#index#" tabindex="10" id="vital_#index#" cols="10" rows="3" class="span8 wysiwyg1"></textarea>
										</td>
							</tr>
							<tr>
										<td width="120" class="tbl_column">Key Responsibility <span class="f_req">*</span></td>
										<td>
										<textarea name="key_responsibility_#index#" tabindex="11" id="key_responsibility_#index#" cols="10" rows="3" class="span8 wysiwyg1"></textarea>									
									<label for="reg_city" generated="true" class="error" id="key_responsibilityErr_#index#"></label>
										</td>	
									</tr>
									
									<tr class="tbl_row">
								<td width="120" class="tbl_column">Notable Achievements  <span class="f_req">*</span></td>
								<td>
								<textarea name="key_achievement_#index#" tabindex="12" id="key_achievement_#index#" cols="10" rows="3" class="span8 wysiwyg1"></textarea>									
								<label for="reg_city" generated="true" class="error" id="key_achievementErr_#index#"></label>
									
								</td>	
							</tr>	
								   <tr>
										<td width="120" class="tbl_column"> Reporting To  <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="13" name="reporting_to_#index#" id="reporting_to_#index#" value="" class="span8" autocomplete="off">							
										<label for="reg_city" generated="true" class="error" id="reporting_toErr_#index#"></label>
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

<!-- /sheepIt Form -->
	<div class="tab-pane" id="box_train">	
	<div id="sheepItForm3">
 
  <!-- Form template-->
  <div id="sheepItForm3_template" class="" style="clear:left;">
							<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Year <span class="f_req">*</span></td>
										<td>
								<select name="train_year_#index#" class="span8" tabindex="" id="train_year_#index#">	
									<option value="">Year</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['year_of_pass']->value),$_smarty_tpl);?>
 
									</select>
									<label for="reg_city" generated="true" class="error" id="train_yearErr_#index#"> </label>
										</td>	
									</tr>
									
									<tr>
										<td width="120" class="tbl_column"> Description  <span class="f_req">*</span></td>
										<td>
										<textarea name="description_#index#" tabindex="" id="description_#index#" cols="10" rows="3" class="span8 wysiwyg1"></textarea>									
									<label for="reg_city" generated="true" class="error" id="descriptionErr_#index#"></label>							
										</td>		
									</tr>
						
								</tbody>
							</table>
						</div>
						<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Program Title <span class="f_req">*</span></td>
										<td>
		<input type="text" tabindex="" name="programtitle_#index#" id="programtitle_#index#" value="" class="span8">
									<label for="reg_city" generated="true" class="error" id="programtitleErr_#index#"></label>
										</td>	
									</tr>
									
									<tr>
										<td width="120" class="tbl_column"> Location <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="" name="train_location_#index#" id="train_location_#index#" value="" class="span8 ui-autocomplete-input" autocomplete="off">							
									<label for="reg_city" generated="true" class="error" id="train_locationErr_#index#"></label>							
										</td>		
									</tr>
								</tbody>
							</table>
						</div>
	<div style="float: left;    clear: left;    margin-top: 5px;    margin-bottom: 5px;">										
<button type="button" id="sheepItForm3_remove_current" >
<a><span>Remove</span></a></button>
</div>
</div>
  <!-- /Form template-->
   
  <!-- No forms template -->
  <div id="sheepItForm3_noforms_template">No data</div>
  <!-- /No forms template-->
   
  <!-- Controls -->
  <div id="sheepItForm3_controls">
    <span id="sheepItForm3_add" style="float:right;margin-top:5px;">
    	<button type="button"><a><span>Add Another</span></a></button>
    </span>
  </div>
  <!-- /Controls -->
</div>
</div>
						
					
<div class="tab-pane" id="box_Consultant">
<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>		
									<!--tr class="tbl_row">
									<td width="120" class="tbl_column">Candidates Outlook on Company   </td>
									<td> 
										<textarea name="about_company" tabindex="1"  rows="3" class="span12 wysiwyg1"><?php if ($_smarty_tpl->tpl_vars['about_company']->value) {
echo $_smarty_tpl->tpl_vars['about_company']->value;
} else {
echo $_POST['about_company'];
}?></textarea>									
									</td>
									</tr-->
			
									<tr class="">
										<td width="120" class="tbl_column">Candidates Personality <span class="f_req">*</span>
										</td>
										<td>
<textarea placeholder="" name="personality" tabindex="2"  rows="3" class="span12 wysiwyg1"><?php if ($_smarty_tpl->tpl_vars['personality']->value) {
echo $_smarty_tpl->tpl_vars['personality']->value;
} else {
echo $_POST['personality'];
}?></textarea>
<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['personalityErr']->value;?>
</label>	
										</td>	
									</tr>
									<tr class="tbl_row">
									<td width="120" class="tbl_column">Relevant Experience <span class="f_req">*</span></td>
									<td> 
									<textarea name="relevant_exposure" tabindex="3"  rows="3" class="span12 wysiwyg1"><?php if ($_smarty_tpl->tpl_vars['relevant_exposure']->value) {
echo $_smarty_tpl->tpl_vars['relevant_exposure']->value;
} else {
echo $_POST['relevant_exposure'];
}?></textarea>									
									<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['relevant_exposureErr']->value;?>
</label>	
									</td>
									</tr>
									
									<!--tr class="">
				<td width="120" class="tbl_column">Credentials considered for Shortlisting <span class="f_req">*</span></td>
				<td> 
					<textarea name="credential_shortlisting" tabindex="4" rows="3" class="span12 wysiwyg1"><?php if ($_smarty_tpl->tpl_vars['credential_shortlisting']->value) {
echo $_smarty_tpl->tpl_vars['credential_shortlisting']->value;
} else {
echo $_POST['credential_shortlisting'];
}?></textarea>									
					<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['credential_shortlistingErr']->value;?>
</label>	
					</td>
			</tr-->
			<tr class="tbl_row">
									<td width="120" class="tbl_column">Any other vital inputs for the interview  </td>
									<td> 
										<textarea name="vital_info_interview" tabindex="5" rows="3" class="span12 wysiwyg1"><?php if ($_smarty_tpl->tpl_vars['vital_info_interview']->value) {
echo $_smarty_tpl->tpl_vars['vital_info_interview']->value;
} else {
echo $_POST['vital_info_interview'];
}?></textarea>									
									</td>
									</tr>
			
									
									</tbody>
			</table>
</div>
<div class="span6">	
	<table class="table table-bordered dataTable" style="margin-bottom:0;">
		<tbody>	
			
			<tr class="tbl_row">
										<td width="120" class="tbl_column">Interview Availability <span class="f_req">*</span></td>
										<td>
											<textarea placeholder="" name="interview_availability" tabindex="6"  rows="3" class="span12 wysiwyg1"><?php if ($_smarty_tpl->tpl_vars['interview_availability']->value) {
echo $_smarty_tpl->tpl_vars['interview_availability']->value;
} else {
echo $_POST['interview_availability'];
}?></textarea>
											<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['interview_availabilityErr']->value;?>
</label>	
										</td>	
									</tr>		
									<tr class="">
										<td width="120" class="tbl_column">Demonstrated Achievements  </td>
										<td> 
									   <textarea name="achievement"  tabindex="7" rows="3" class="span12 wysiwyg1"><?php if ($_smarty_tpl->tpl_vars['achievement']->value) {
echo $_smarty_tpl->tpl_vars['achievement']->value;
} else {
echo $_POST['achievement'];
}?></textarea>									
										</td>
									</tr>	
									
			
				
			<!--tr class="tbl_row">
				<td width="120" class="tbl_column">Candidate Brief </td>
				<td> 
				   <textarea name="candidate_brief" tabindex="8"  rows="3" class="span12 wysiwyg1"><?php if ($_smarty_tpl->tpl_vars['candidate_brief']->value) {
echo $_smarty_tpl->tpl_vars['candidate_brief']->value;
} else {
echo $_POST['candidate_brief'];
}?></textarea>									
				</td>
			</tr-->										
		</tbody>
	</table>
</div>
</div>
<input type="hidden" id="edu_count" name="edu_count" value="<?php echo $_smarty_tpl->tpl_vars['eduCount']->value;?>
">
<input type="hidden" id="exp_count" name="exp_count" value="<?php echo $_smarty_tpl->tpl_vars['expCount']->value;?>
">	
<input type="hidden" id="train_count" name="train_count" value="<?php echo $_smarty_tpl->tpl_vars['trainCount']->value;?>
">
<input type="hidden" id="totCount_edu" name="totCount_edu" value="<?php echo $_smarty_tpl->tpl_vars['totCount_edu']->value;?>
">	
<input type="hidden" id="totCount_exp" name="totCount_exp" value="<?php echo $_smarty_tpl->tpl_vars['totCount_exp']->value;?>
">	
<input type="hidden" id="add_formatted_resume" name="add_formatted_resume" value="<?php echo $_smarty_tpl->tpl_vars['marty']->value['post']['add_formatted_resume'];?>
">

				
							</div>
							</div>
					</div>
</div>
                    </div>
					</div>
						
					<input type="hidden" id="tab_open_resume" value="<?php echo $_smarty_tpl->tpl_vars['tab_open_resume']->value;?>
"/>
					 <div class="form-actions">
	<input class="btn btn-gebo" type="submit" value="Submit">
	<input type="hidden" name="data[Client][webroot]" value="<?php echo @constant('webroot');?>
resume" id="webroot">
	<a href="javascript:void(0)" class="jsRedirect cancel_event cancelBtn">
	<input type="button" value="Cancel" class="btn">
	</a>
	
	</div>
					</form>
         	
				

	<div class="row-fluid" style="clear:left;float:left;margin-top:15px;">				
			<div class="span12">
			<h3 class="heading">Candidate Resume</h3>
	<table class="table table-bordered dataTable" style="margin-bottom:0;">
	<tbody>
	<tr class="tbl_row">
									
										<td style="margin:10px;text-align:center;">
<textarea  class="span12" style="height:300px" name="RESUME_DATA">
<?php if ($_smarty_tpl->tpl_vars['RESUME_DATA']->value) {
echo $_smarty_tpl->tpl_vars['RESUME_DATA']->value;
} else {
echo $_POST['RESUME_DATA'];
}?>
</textarea>
																						
										</td>
	</tr>									
									
	</tbody>
	</table>
</div>		</div>

                </div>
            </div> 
		</div>
		</div>
		</div>
		</div>
	</div>
	
	<input type="hidden" id="end_date" name="end_date" value="<?php echo $_smarty_tpl->tpl_vars['dob_default']->value;?>
">	

			
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


		
	<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['eduCount']->value) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['eduCount']->value; $_smarty_tpl->tpl_vars['i']->value++) {
?>
		
		<input type="hidden" id="qualificationData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="qualificationData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['qualificationData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="specializationData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="specializationData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value='<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['spec_data']->value[$_smarty_tpl->tpl_vars['i']->value]),$_smarty_tpl);?>
'>
		<input type="hidden" id="locationData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="locationData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['locationData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
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
		<input type="hidden" id="from_yrData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="from_yrData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['from_yrData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
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
		<input type="hidden" id="from_yr_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['eduErr']->value[$_smarty_tpl->tpl_vars['i']->value]['from_yrErr'];?>
">
		<input type="hidden" id="locationErr_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['eduErr']->value[$_smarty_tpl->tpl_vars['i']->value]['locationErr'];?>
">
		<input type="hidden" id="gradeErr_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['eduErr']->value[$_smarty_tpl->tpl_vars['i']->value]['gradeErr'];?>
">
		<input type="hidden" id="grade_typeErr_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['eduErr']->value[$_smarty_tpl->tpl_vars['i']->value]['grade_typeErr'];?>
">
	<?php }
}
?>

	
	<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['expCount']->value) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['expCount']->value; $_smarty_tpl->tpl_vars['i']->value++) {
?>
		<input type="hidden" id="desigData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="desigData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['desigData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="areaData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="areaData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['areaData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="from_year_of_expData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="from_year_of_expData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['from_year_of_expData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="from_month_of_expData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="from_month_of_expData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['from_month_of_expData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="to_year_of_expData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="to_year_of_expData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['to_year_of_expData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="to_month_of_expData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="to_month_of_expData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['to_month_of_expData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="companyData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="companyData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['companyData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="worklocData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="worklocData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['worklocData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="vitalData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="vitalData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['vitalData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="company_profileData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="company_profileData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['company_profileData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="key_responsibilityData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="key_responsibilityData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['key_responsibilityData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="key_achievementData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="key_achievementData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['key_achievementData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="reporting_to_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="reporting_to_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['reporting_toData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		
		<input type="hidden" id="desig_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['expErr']->value[$_smarty_tpl->tpl_vars['i']->value]['desigErr'];?>
">
		<input type="hidden" id="from_year_of_exp_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['expErr']->value[$_smarty_tpl->tpl_vars['i']->value]['from_year_of_expErr'];?>
">
		<input type="hidden" id="from_month_of_exp_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['expErr']->value[$_smarty_tpl->tpl_vars['i']->value]['from_month_of_expErr'];?>
">
		<input type="hidden" id="to_year_of_exp_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['expErr']->value[$_smarty_tpl->tpl_vars['i']->value]['to_year_of_expErr'];?>
">
		<input type="hidden" id="to_month_of_exp_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['expErr']->value[$_smarty_tpl->tpl_vars['i']->value]['to_month_of_expErr'];?>
">
		<input type="hidden" id="workloc_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['expErr']->value[$_smarty_tpl->tpl_vars['i']->value]['worklocErr'];?>
">
		<input type="hidden" id="area_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['expErr']->value[$_smarty_tpl->tpl_vars['i']->value]['areaErr'];?>
">
		<input type="hidden" id="company_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['expErr']->value[$_smarty_tpl->tpl_vars['i']->value]['companyErr'];?>
">
		<input type="hidden" id="company_profile_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['expErr']->value[$_smarty_tpl->tpl_vars['i']->value]['company_profileErr'];?>
">
		<input type="hidden" id="key_responsibility_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['expErr']->value[$_smarty_tpl->tpl_vars['i']->value]['key_responsibilityErr'];?>
">
		<input type="hidden" id="key_achievement_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['expErr']->value[$_smarty_tpl->tpl_vars['i']->value]['key_achievementErr'];?>
">
		<input type="hidden" id="reporting_to_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['expErr']->value[$_smarty_tpl->tpl_vars['i']->value]['reporting_toErr'];?>
">
	<?php }
}
?>

	
	<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['trainCount']->value) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['trainCount']->value; $_smarty_tpl->tpl_vars['i']->value++) {
?>
		<input type="hidden" id="train_yearData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="train_yearData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['train_yearData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="descriptionData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="descriptionData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['descriptionData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="programtitleData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="programtitleData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['programtitleData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="train_locationData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="train_locationData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['train_locationData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		
		<input type="hidden" id="train_year_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['trainErr']->value[$_smarty_tpl->tpl_vars['i']->value]['train_yearErr'];?>
">
		<input type="hidden" id="description_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['trainErr']->value[$_smarty_tpl->tpl_vars['i']->value]['descriptionErr'];?>
">
		<input type="hidden" id="programtitle_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['trainErr']->value[$_smarty_tpl->tpl_vars['i']->value]['programtitleErr'];?>
">
		<input type="hidden" id="train_location_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['trainErr']->value[$_smarty_tpl->tpl_vars['i']->value]['train_locationErr'];?>
">
	<?php }
}
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
			if($('#from_yrData_'+i).length > 0){ 
				$('#from_yr_'+i).attr('value', $('#from_yrData_'+i).val());
			}
			if($('#to_yrData_'+i).length > 0){ 
				$('#to_yr_'+i).attr('value', $('#to_yrData_'+i).val());
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
			if($('#from_yr_Err_Data_'+i).length > 0){ 
				$('#from_yrErr_'+i).html($('#from_yr_Err_Data_'+i).val());
			}
			if($('#to_yr_Err_Data_'+i).length > 0){ 
				$('#to_yrErr_'+i).html($('#to_yr_Err_Data_'+i).val());
			}
			if($('#qualification_Err_Data_'+i).length > 0){ 
				$('#qualification_Err_'+i).html($('#qualification_Err_Data_'+i).val());
			}
			if($('#locationErr_Data_'+i).length > 0){ 
				$('#locationErr_'+i).html($('#locationErr_Data_'+i).val());
			}
			if($('#gradeErr_Data_'+i).length > 0){ 
				$('#gradeErr_'+i).html($('#gradeErr_Data_'+i).val());
			}
			if($('#grade_typeErr_Data_'+i).length > 0){ 
				$('#grade_typeErr_'+i).html($('#grade_typeErr_Data_'+i).val());
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
			  // for auto resize text area
			 autosize(document.querySelectorAll('.wysiwyg1'));
			  /* function to update max drop down */
				$('.minExpDrop').unbind().change(function(){ 
					cur_obj = $(this).attr('id');		
					option_id = $(this).attr('rel');					
					val = parseFloat($(this).val());
					$('#'+option_id).append('<option>Loading...</option>');
					html = "<option value=''>Select</option>";
					$('#'+cur_obj+' option').each(function(){
						// allow only values equals or greater than
						if(val < $(this).val()){ 
							html += '<option value='+$(this).val()+'>'+$(this).text()+'</option>';
						}
					});
					$('#'+option_id).empty();
					$('#'+option_id).append(html);

				});
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
			if($('#worklocData_'+i).length > 0){ 
				$('#workloc_'+i).attr('value', $('#worklocData_'+i).val());
			}
			if($('#areaData_'+i).length > 0){ 
				$('#area_'+i).attr('value', $('#areaData_'+i).val());
			}
			if($('#from_year_of_expData_'+i).length > 0){ 
				$('#from_year_of_exp_'+i).attr('value', $('#from_year_of_expData_'+i).val());
			}
			if($('#from_month_of_expData_'+i).length > 0){ 
				$('#from_month_of_exp_'+i).val( $('#from_month_of_expData_'+i).val());
			}
			if($('#to_year_of_expData_'+i).length > 0){ 
				$('#maxDrop_'+i).attr('value', $('#to_year_of_expData_'+i).val());
			}
			if($('#to_month_of_expData_'+i).length > 0){ 
				$('#to_month_of_exp_'+i).val( $('#to_month_of_expData_'+i).val());
			}
			if($('#companyData_'+i).length > 0){ 
				$('#company_'+i).val( $('#companyData_'+i).val());
			}
			if($('#company_profileData_'+i).length > 0){ 
				$('#company_profile_'+i).val( $('#company_profileData_'+i).val());
			}
			if($('#key_responsibilityData_'+i).length > 0){ 
				$('#key_responsibility_'+i).val( $('#key_responsibilityData_'+i).val());
			}
			if($('#reporting_to_Data_'+i).length > 0){ 
				$('#reporting_to_'+i).val( $('#reporting_to_Data_'+i).val());
			}
			if($('#key_achievementData_'+i).length > 0){ 
				$('#key_achievement_'+i).val( $('#key_achievementData_'+i).val());
			}
			if($('#vitalData_'+i).length > 0){ 
				$('#vital_'+i).val( $('#vitalData_'+i).val());
			}
			
			// for error messages
			if($('#desig_Err_Data_'+i).length > 0){ 
				$('#desigErr_'+i).html($('#desig_Err_Data_'+i).val());
			}
			if($('#from_year_of_exp_Err_Data_'+i).length > 0){ 
				$('#from_year_of_expErr_'+i).html($('#from_year_of_exp_Err_Data_'+i).val());
			}
			if($('#from_month_of_exp_Err_Data_'+i).length > 0){ 
				$('#from_month_of_expErr_'+i).html($('#from_month_of_exp_Err_Data_'+i).val());
			}
			if($('#to_year_of_exp_Err_Data_'+i).length > 0){ 
				$('#to_year_of_expErr_'+i).html($('#to_year_of_exp_Err_Data_'+i).val());
			}
			if($('#to_month_of_exp_Err_Data_'+i).length > 0){ 
				$('#to_month_of_expErr_'+i).html($('#to_month_of_exp_Err_Data_'+i).val());
			}
			if($('#workloc_Err_Data_'+i).length > 0){ 
				$('#worklocErr_'+i).html($('#workloc_Err_Data_'+i).val());
			}
			if($('#area_Err_Data_'+i).length > 0){ 
				$('#areaErr_'+i).html($('#area_Err_Data_'+i).val());
			}
			if($('#company_Err_Data_'+i).length > 0){ 
				$('#companyErr_'+i).html($('#company_Err_Data_'+i).val());
			}
			if($('#company_profile_Err_Data_'+i).length > 0){ 
				$('#company_profileErr_'+i).html( $('#company_profile_Err_Data_'+i).val());
			}
			if($('#key_responsibility_Err_Data_'+i).length > 0){ 
				$('#key_responsibilityErr_'+i).html( $('#key_responsibility_Err_Data_'+i).val());
			}
			if($('#reporting_to_Err_Data_'+i).length > 0){ 
				$('#reporting_toErr_'+i).html( $('#reporting_to_Err_Data_'+i).val());
			}
			if($('#key_achievement_Err_Data_'+i).length > 0){ 
				$('#key_achievementErr_'+i).html( $('#key_achievement_Err_Data_'+i).val());
			}
		}
	}
	
	if($('#sheepItForm3').length > 0){ 
	var sheepAdd = $('#sheepItForm3').sheepIt({
		   separator: '',
		   allowRemoveLast: true,
		   allowRemoveCurrent: true,
		   allowRemoveAll: true,
		   allowAdd: true,
		   allowAddN: true,
		   maxFormsCount: 10,
		   minFormsCount: 1,
		   iniFormsCount: $('#train_count').val() ? $('#train_count').val() : '1',
		   removeLastConfirmation: true,
		   removeCurrentConfirmation: true,
		   removeLastConfirmationMsg: 'Are you sure?',
		   removeCurrentConfirmationMsg: 'Are you sure?',
		   continuousIndex: true,
		   afterAdd: function(source, newForm) {
			 $('#train_count').attr('value',source.getFormsCount());
			 // for auto resize text area
			 autosize(document.querySelectorAll('.wysiwyg1'));
		   },
		   afterRemoveCurrent: function(source) {		
			 $('#train_count').attr('value',source.getFormsCount());
		  }
	   });	   
	}
	/* function to load experience php value into form */
	if($('#sheepItForm3').length > 0){
		for(i = 0; i < $('#train_count').val(); i++){
			if($('#train_yearData_'+i).length > 0){ 
				$('#train_year_'+i).attr('value', $('#train_yearData_'+i).val());
			}
			if($('#descriptionData_'+i).length > 0){ 
				$('#description_'+i).attr('value', $('#descriptionData_'+i).val());
			}
			if($('#programtitleData_'+i).length > 0){ 
				$('#programtitle_'+i).attr('value', $('#programtitleData_'+i).val());
			}
			if($('#train_locationData_'+i).length > 0){ 
				$('#train_location_'+i).val( $('#train_locationData_'+i).val());
			}
			
			// for error messages
			if($('#train_year_Err_Data_'+i).length > 0){ 
				$('#train_yearErr_'+i).html($('#train_year_Err_Data_'+i).val());
			}
			if($('#description_Err_Data_'+i).length > 0){ 
				$('#descriptionErr_'+i).html($('#description_Err_Data_'+i).val());
			}
			if($('#programtitle_Err_Data_'+i).length > 0){ 
				$('#programtitleErr_'+i).html($('#programtitle_Err_Data_'+i).val());
			}
			if($('#train_location_Err_Data_'+i).length > 0){ 
				$('#train_locationErr_'+i).html($('#train_location_Err_Data_'+i).val());
			}
		}
	}
});
<?php echo '</script'; ?>
>	
<?php }
}
