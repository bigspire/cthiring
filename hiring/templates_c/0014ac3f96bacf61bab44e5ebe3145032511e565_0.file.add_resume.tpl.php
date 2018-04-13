<?php
/* Smarty version 3.1.29, created on 2018-04-13 15:33:43
  from "C:\xampp\htdocs\2017\ctsvn2\cthiring\hiring\templates\add_resume.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5ad0807fbb8c68_49399438',
  'file_dependency' => 
  array (
    '0014ac3f96bacf61bab44e5ebe3145032511e565' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn2\\cthiring\\hiring\\templates\\add_resume.tpl',
      1 => 1523613820,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5ad0807fbb8c68_49399438 ($_smarty_tpl) {
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
                                    <a href="resume.php">Resumes</a>
                                </li>
                            
                                <li>
                                   Add Resume
                                </li>
                            </ul>
                        </div>
                    </nav>
				<?php if ($_smarty_tpl->tpl_vars['EXIST_MSG']->value) {?>
				 <div id="flashMessage" class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><?php echo $_smarty_tpl->tpl_vars['EXIST_MSG']->value;?>
</div>					
				<?php }?>
					
				<?php if ($_smarty_tpl->tpl_vars['draft_valid']->value) {?>
				 <div id="flashMessage" class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><?php echo $_smarty_tpl->tpl_vars['draft_valid']->value;?>
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
										<li class="personal"><a class="resaddtabChange restabChange" rel="personal"  href="#mbox_Personal" data-toggle="tab"><i class="splashy-contact_blue"></i>  Personal </a></li>
										<li class="education"><a class="resaddtabChange" rel="education"  href="#mbox_Education" data-toggle="tab"><i class="splashy-document_letter_add"></i>  Education </a></li>
										<li class="exp"><a class="resaddtabChange" rel="exp"  href="#mbox_Experience" data-toggle="tab"><i class="splashy-folder_classic_stuffed_add"></i> Experience </a></li>
										<li class="assess"><a class="resaddtabChange" rel="assess"  href="#mbox_Consultant" data-toggle="tab"><i class="splashy-contact_grey_edit"></i> Consultant Assessment </a></li>
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
										<input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['requirement']->value;?>
"  class="span8" disabled>
										<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['requirement']->value;?>
" name="requirement">
										</td>
									</tr>	
									
									<tr>
									
									<tr class="">
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
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Email <span class="f_req">*</span></td>
										<td>	
										<input type="text" tabindex="3" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" class="span8">
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['emailErr']->value;
echo $_smarty_tpl->tpl_vars['email_validErr']->value;?>
</label>																						
										</td>	
									</tr>	
                                    <tr class="">
										<td width="120" class="tbl_column"> Mobile <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="4" name="mobile" class="span8" value="<?php echo $_smarty_tpl->tpl_vars['mobile']->value;?>
" autocomplete="off">							

							
										
									<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['mobileErr']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['mobile_validErr']->value;?>
</label>							
										</td>		
									</tr>									
									<tr class="tbl_row">
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
										<select tabindex="6" name="designation_id" class="span8"  id="designation_id">	
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
										<select name="year_of_exp" tabindex="7" class="span4">
										<option value="">Year</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['tot_exp_yr']->value,'selected'=>$_POST['year_of_exp']),$_smarty_tpl);?>
	
										</select>
										<select name="month_of_exp" tabindex="8" class="inline_text span4">
										<option value="">Month</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['tot_exp_month']->value,'selected'=>$_POST['month_of_exp']),$_smarty_tpl);?>
	
										</select>
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['year_of_expErr']->value;?>
</label>	
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['month_of_expErr']->value;?>
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
										
										<input type="text" tabindex="9" name="present_ctc" value="<?php echo $_smarty_tpl->tpl_vars['present_ctc']->value;?>
" placeholder="Present"  class="span2 digitOnly"/>										
										<select class="span2"  tabindex="10"  name="present_ctc_type">
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ctc_type']->value,'selected'=>$_POST['present_ctc_type']),$_smarty_tpl);?>

										</select> 
											
										<input type="text" tabindex="11" name="expected_ctc" value="<?php echo $_smarty_tpl->tpl_vars['expected_ctc']->value;?>
" placeholder="Expected"  class="span2 digitOnly"/>	
										<select  class="span2" tabindex="12"  name="expected_ctc_type">
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
										<select name="notice_period" tabindex="13" class="span8">										
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['n_p']->value,'selected'=>$_POST['notice_period']),$_smarty_tpl);?>
							
										</select>
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['notice_periodErr']->value;?>
</label>																		
										</td>
									</tr>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Gender <span class="f_req">*</span></td>
										<td> 
										<input type="radio" tabindex="2" tabindex="14" name="gender"<?php if ($_POST['gender'] == '1') {
echo 'checked';
}?> value="1"> Male
										<input type="radio" tabindex="3" tabindex="15" name="gender"<?php if ($_POST['gender'] == '2') {
echo 'checked';?>
 <?php }?> value="2"> Female
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['genderErr']->value;?>
</label>																				
										</td>
									</tr>	
									 <tr>
										<td width="120" class="tbl_column">Marital Status <span class="f_req"></span></td>
										<td>
										<input type="radio" tabindex="16" name="marital_status"<?php if ($_POST['marital_status'] && $_POST['marital_status'] == 1) {
echo 'checked';
}?> value="1"> Single
										<input type="radio" tabindex="17" name="marital_status"<?php if ($_POST['marital_status'] && $_POST['marital_status'] == 2) {
echo 'checked';?>
 <?php }?> value="2"> Married
										<input type="radio" tabindex="18" name="marital_status"<?php if ($_POST['marital_status'] && $_POST['marital_status'] == 3) {
echo 'checked';?>
 <?php }?> value="3"> Separated
										</td>	
									</tr>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Family (Dependents) <span class="f_req"></span></td>										
										<td>
										<textarea name="family" id="family" tabindex="19" cols="10" rows="3" class="span8 wysiwyg1"><?php echo $_POST['family'];?>
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
				<select name="qualification_#index#" tabindex="" class="span8 qualification_id"  id="qualification_#index#">	
					<option value="">Select</option>
					<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['qual']->value),$_smarty_tpl);?>
															
				</select>						
				<label for="reg_city" generated="true" class="error" id="qualification_Err_#index#"></label>
				</td>			
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
			
			<tr>
				<td width="120" class="tbl_column">Specialization <span class="f_req">*</span></td>
				<td> 
					<select name="specialization_#index#" tabindex="" class="span8"  id="specialization_#index#">	
					<option value="">Select</option>
						<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['spec']->value),$_smarty_tpl);?>
							
					</select>
					<label for="reg_city" generated="true" class="error" id="specialization_Err_#index#"></label>										
				</td>						
			</tr>
			
			<tr class="tbl_row">
				<td width="120" class="tbl_column">College <span class="f_req">*</span></td>
				<td> 
					<input type="text" tabindex="" name="college_#index#" id="college_#index#" class="span8" >										
					<label for="reg_city" generated="true" class="error" id="collegeErr_#index#"><?php echo $_smarty_tpl->tpl_vars['collegeErr']->value;?>
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
									<input type="text" tabindex="" name="grade_#index#" id="grade_#index#" value="<?php echo $_smarty_tpl->tpl_vars['grade']->value;?>
" class="span4" >
									<select name="grade_type_#index#" tabindex="6" class="inline_text span4"  id="grade_type_#index#">
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['grade_drop']->value),$_smarty_tpl);?>
 
									</select>
								</td>
							</tr>
							<tr class="tbl_row">
							<td width="120" class="tbl_column">Year of Passing <span class="f_req">*</span></td>										
								<td>
									<select name="year_of_pass_#index#" id="year_of_pass_#index#" tabindex="" class="span8">
									<option value="">Year</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['year_of_pass']->value),$_smarty_tpl);?>
 
									</select>
								<label for="reg_city" generated="true" class="error" id="year_of_pass_Err_#index#"></label>	
							</tr>
							
							<tr>
								<td width="120" class="tbl_column">University <span class="f_req"></span></td>
								<td> 
									<input type="text" tabindex="" name="university_#index#" id="university_#index#" class="span8" >										
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
			
							<tr>
										<td width="120" class="tbl_column">Company Name <span class="f_req">*</span></td>
										<td> 
										<input type="text" tabindex="" name="company_#index#" id="company_#index#"  class="span8" />
										<label for="reg_city" generated="true" class="error" id="company_Err_#index#"></label>										
										</td>
							</tr>	
							<tr class="tbl_row">
										<td width="120" class="tbl_column">Designation <span class="f_req">*</span></td>
										<td> 
										<select name="desig_#index#" class="span8" tabindex=""  id="desig_#index#">
										<option value="">Select</option>	
											<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['desig_name']->value),$_smarty_tpl);?>
															
										</select>
										<a href="add_designation.php?action=dropdown" rel="desig_#index#" class="iframeBox clearDesig" val="40_55">Add New</a>
										<label for="reg_city" generated="true" class="error"id="desig_Err_#index#" ></label>	
										<input type="hidden" name="fr_desig" id="fr_desig" class="test">										
										<section id="similar_rows" class="col-xs-12 col-sm-6 col-md-12">

										</section>	
										</td>
							</tr>
								<tr>
										<td width="120" class="tbl_column">Employment Period<span class="f_req"> *</span></td>
										<td>
										<select name="from_month_of_exp_#index#" id = "from_month_of_exp_#index#" tabindex="" class="span2">
										<option value="">From</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['exp_month']->value),$_smarty_tpl);?>
 
										</select>
										<select name="from_year_of_exp_#index#" id = "from_year_of_exp_#index#" rel="maxDrop_#index#" tabindex="" class="minExpDrop inline_text span2">
										<option value="">From</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['exp_yr']->value),$_smarty_tpl);?>
 
										</select>
										
										<select name="to_month_of_exp_#index#" id = "to_month_of_exp_#index#" tabindex="" class="inline_text span2">
										<option value="">To</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['exp_month']->value),$_smarty_tpl);?>
 
										</select>
										
										<select name="to_year_of_exp_#index#"  id = "maxDrop_#index#"  tabindex="" class="inline_text span2">
										<option value="">To</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['exp_yr']->value),$_smarty_tpl);?>
 
										</select>
										<label for="reg_city" generated="true" class="error" id="from_month_of_expErr_#index#"></label>																																
										<label for="reg_city" generated="true" class="error" id="from_year_of_expErr_#index#"></label>																						
										<label for="reg_city" generated="true" class="error" id="to_month_of_expErr_#index#"></label>																						
										<label for="reg_city" generated="true" class="error" id="to_year_of_expErr_#index#"></label>																						
										
										</td>
							</tr>
							<tr class="tbl_row">
										<td width="120" class="tbl_column">Specialization/Expertise  <span class="f_req">*</span></td>
											<td> 
										<input type="text" name="area_#index#" id="area_#index#"  tabindex="" class="span8" />
										<label for="reg_city" generated="true" class="error" id="area_Err_#index#"></label>										
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
										<input type="text"  tabindex="" name="location_#index#" id="location_#index#"  class="span8" />
										<label for="reg_city" generated="true" class="error" id="location_Err_#index#"></label>										
										</td>
							</tr>			
								<tr>
										<td width="120" class="tbl_column">Other Vital Information (Position Specific)  <span class="f_req"></span></td>
										<td> 
										<textarea name="vital_#index#" tabindex="" id="vital_#index#" cols="10" rows="3" class="span8 wysiwyg1"></textarea>
										</td>
							</tr>
							 <tr>
										<td width="120" class="tbl_column"> Reporting To</td>
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
 <div class="row-fluid" style="clear:left;margin-top:10px;">

<div class="span6">
		  <table class="table table-bordered dataTable" style="margin-bottom:0;">
		  <tbody>
		  <tr>
			<td width="133" class="tbl_column">Project / Certification Details (optional) <span class="f_req"></span></td>
				<td> 
						<textarea name="certification" tabindex="10" id="certification" cols="10" rows="3" class="span8 wysiwyg1"><?php if ($_smarty_tpl->tpl_vars['certification']->value) {
echo $_smarty_tpl->tpl_vars['certification']->value;
} else {
echo $_POST['certification'];
}?></textarea>
				</td>
			</tr>
		  </tbody>
		  </table>
		  </div>
		  </div>
</div>

<div class="tab-pane" id="mbox_Consultant">
<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
						
					<tr class="tbl_row">
										<td width="120" class="tbl_column">Rate Technical Skills <span class="f_req"></span></td>
										<td>
<ul class="ratingList">
<?php
$_from = $_smarty_tpl->tpl_vars['tsData']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_ts_data_0_saved_item = isset($_smarty_tpl->tpl_vars['ts_data']) ? $_smarty_tpl->tpl_vars['ts_data'] : false;
$_smarty_tpl->tpl_vars['ts_data'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['ts_data']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ts_data']->key => $_smarty_tpl->tpl_vars['ts_data']->value) {
$_smarty_tpl->tpl_vars['ts_data']->_loop = true;
$__foreach_ts_data_0_saved_local_item = $_smarty_tpl->tpl_vars['ts_data'];
if ($_smarty_tpl->tpl_vars['ts_data']->value) {?>
  <li><input class="span8" readonly="readonly" placeholder="" name="ts[]" value="<?php echo $_smarty_tpl->tpl_vars['ts_data']->value;?>
" type="text">   
  <input name="tsr[]" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['tsrData']->value[$_smarty_tpl->tpl_vars['ts_data']->key];?>
"  class="rating" data-fractions="1"/> <span class="label label-info dn"><?php echo $_smarty_tpl->tpl_vars['tsrData']->value[$_smarty_tpl->tpl_vars['ts_data']->key];?>
</span></li>
  <?php }
$_smarty_tpl->tpl_vars['ts_data'] = $__foreach_ts_data_0_saved_local_item;
}
if ($__foreach_ts_data_0_saved_item) {
$_smarty_tpl->tpl_vars['ts_data'] = $__foreach_ts_data_0_saved_item;
}
?> 

	<label for="" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['techErr']->value;?>
</label>

</ul>
 
    <!-- Custom CSS -->
 
										</td>	
									</tr>	
									
									
									<tr class="">
										<td width="120" class="tbl_column">Consultant Assessment <span class="f_req">*</span></td>
										<td>
<textarea placeholder="" name="consultant" tabindex="1" id="consultant" cols="10" rows="3" class="span10 wysiwyg1"><?php echo $_POST['consultant'];?>
</textarea>
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['consultantErr']->value;?>
</label>
										</td>	
									</tr>	
									
									
									<tr class="">
										<td width="120" class="tbl_column">Any Other Inputs <span class="f_req"></span></td>
										<td>
<textarea placeholder="" name="other_input" tabindex="1" id="other_input" cols="10" rows="3" class="span10 wysiwyg1"><?php echo $_POST['other_input'];?>
</textarea>
										</td>	
									</tr>
																						
								</tbody>
							</table>
						</div>
						
						<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Rate Behavioural Skills </td>
										<td>
<ul class="ratingList">
 
 <?php
$_from = $_smarty_tpl->tpl_vars['bsData']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_bs_data_1_saved_item = isset($_smarty_tpl->tpl_vars['bs_data']) ? $_smarty_tpl->tpl_vars['bs_data'] : false;
$_smarty_tpl->tpl_vars['bs_data'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['bs_data']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['bs_data']->key => $_smarty_tpl->tpl_vars['bs_data']->value) {
$_smarty_tpl->tpl_vars['bs_data']->_loop = true;
$__foreach_bs_data_1_saved_local_item = $_smarty_tpl->tpl_vars['bs_data'];
if ($_smarty_tpl->tpl_vars['bs_data']->value) {?>
  <li><input class="span8" readonly="readonly" placeholder="" name="bs[]" value="<?php echo $_smarty_tpl->tpl_vars['bs_data']->value;?>
" type="text">   
  <input name="bsr[]" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['bsrData']->value[$_smarty_tpl->tpl_vars['bs_data']->key];?>
"  class="rating" data-fractions="1"/> <span class="label label-info dn"><?php echo $_smarty_tpl->tpl_vars['bsrData']->value[$_smarty_tpl->tpl_vars['bs_data']->key];?>
</span> </li>
  <?php }
$_smarty_tpl->tpl_vars['bs_data'] = $__foreach_bs_data_1_saved_local_item;
}
if ($__foreach_bs_data_1_saved_item) {
$_smarty_tpl->tpl_vars['bs_data'] = $__foreach_bs_data_1_saved_item;
}
?> 

 <label for="" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['behavErr']->value;?>
</label>
 
</ul>
 
										
										</td>	
									</tr>

									
									<tr class="">
										<td width="120" class="tbl_column">Interview Availability <span class="f_req">*</span></td>
										<td>
<textarea placeholder="" name="interview_availability" tabindex="2" id="interview_availability" cols="10" rows="3" class="span10 wysiwyg1"><?php echo $_POST['interview_availability'];?>
</textarea>
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['interview_availabilityErr']->value;?>
</label>
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
<input type="hidden" id="end_date" name="end_date" value="<?php echo $_smarty_tpl->tpl_vars['dob_default']->value;?>
">	

<div class="form-actions">
	<input class="btn btn-gebo" name="submit "type="submit" value="Submit">
	<input type="hidden" name="data[Client][webroot]" value="<?php echo @constant('webroot');?>
resume" id="webroot">

	<a href="javascript:void(0)" class="jsRedirect cancelBtn cancel_event">
	<input type="button" value="Cancel" class="btn">
	</a>

	<input type="hidden" name="hdnSubmit" id="hdnSubmit">
	<input class="btn btn-success" type="submit" id="draftSave" name="draft" value="Draft"/>
</div>

</div>

	</div>
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
		<input type="hidden" id="collegeErr_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['eduErr']->value[$_smarty_tpl->tpl_vars['i']->value]['collegeErr'];?>
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
		<input type="hidden" id="reporting_to_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="reporting_to_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['reporting_toData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
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

	
	
		
						<?php if ($_smarty_tpl->tpl_vars['email_exists']->value || $_smarty_tpl->tpl_vars['mobile_exists']->value) {?>
						<input type="hidden" id="resume_exist_pop" value="1"/>
						<?php }?>
					
					
		
		<input type="hidden" id="email_field" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
"/>
		<input type="hidden" id="mobile_field" value="<?php echo $_smarty_tpl->tpl_vars['mobile']->value;?>
"/>
		<input type="hidden" id="cv_url" value="resume_exist.php"/>

		
<style type="text/css">
#cboxClose{display:none !important;}
</style>

						
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
			if($('#collegeErr_Data_'+i).length > 0){ 
				$('#collegeErr_'+i).html($('#collegeErr_Data_'+i).val());
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
				/* clear the drop down value */
				$('.clearDesig').unbind().click(function(){
					var id = $(this).attr('rel');
					$('#'+id).val('');
				});
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
						if(val <= $(this).val()){ 
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
			/*if($('#current_locData_'+i).length > 0){ 
				$('#current_loc_'+i).attr('value', $('#current_locData_'+i).val());
			}*/
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
			if($('#locationData_'+i).length > 0){ 
				$('#location_'+i).val( $('#locationData_'+i).val());
			}
			if($('#vitalData_'+i).length > 0){ 
				$('#vital_'+i).val( $('#vitalData_'+i).val());
			}
			if($('#reporting_to_Data_'+i).length > 0){ 
				$('#reporting_to_'+i).val( $('#reporting_to_Data_'+i).val());
			}
			
			// for error messages
			if($('#desig_Err_Data_'+i).length > 0){ 
				$('#desig_Err_'+i).html($('#desig_Err_Data_'+i).val());
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
	// load the color box for designation
	$('.iframeBox').click(function(){
			load_colorBox(this, $(this).attr('val'));	
	});

	// mail already exist
	$(document).on("change keyup blur", "#email", function() {
		var emailVal = $('#email').val(); //alert(emailVal);// assuming this is a input text field
		$.post('checkemail.php', {'email' : emailVal}, function(data) {
			if(data=='exist') return false;
			else $('#form1').submit();
		});
	});	
});
<?php echo '</script'; ?>
>	
<?php }
}
