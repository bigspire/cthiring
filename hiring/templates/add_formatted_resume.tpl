{* Purpose : To add formatted resume.
 	Created : Nikitasa
   Date : 26-05-2017 *}
   
{include file='include/header.tpl'}
			
			<!-- main content -->
            <div id="contentwrapper">
               <div class="main_content">
            <div class="row-fluid">
				 <div class="span12">
				 	<nav>
                  <div id="jCrumbs" class="breadCrumb module">
                     <ul>
                        <li>
                           <a href="{$smarty.const.webroot}home"><i class="icon-home"></i></a>
                        </li>
                        <li>
                           <a href="{$smarty.const.webroot}resume">Resumes</a>
                        </li>
                        <li>
                           Create Fully Formatted Resume
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
										<input type="text" tabindex="3" name="position" value="{$position}" class="span8" disabled>
										</td>
									</tr>
									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Candidate Name <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="1" name="first_name" placeholder="First Name" value="{$first_name}" class="span4">
								        <input type="text" tabindex="2" name="last_name" placeholder="Last Name" value="{$last_name}" class="inline_text span4">
										<label for="reg_city" generated="true" class="error">{$first_nameErr}{$last_nameErr}</label>
										
										</td>	
									</tr>
									
									<tr>
										<td width="120" class="tbl_column">Email <span class="f_req">*</span></td>
										<td>	
										<input type="text" tabindex="3" id="email" name="email" value="{$email}" class="span8">
										<label for="reg_city" generated="true" class="error">{$emailErr}</label>
										</td>	
									</tr>	
									
                          <tr class="tbl_row">
										<td width="120" class="tbl_column"> Mobile <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="4" name="mobile"  value="{$mobile}" class="span8 ui-autocomplete-input" autocomplete="off">							
									<label for="reg_city" generated="true" class="error">{$mobileErr} </label>	</td>		
									</tr>	
									
									<tr>
										<td width="120" class="tbl_column">Telephone <span class="f_req"></span></td>
										<td>
										<input type="text" tabindex="5" name="telephone" value="{if $telephone}{$telephone}{else}{$smarty.post.telephone}{/if}" class="span8">
										<!--label for="reg_city" generated="true" class="error">{$telephoneErr}</label-->	</td>	
									</tr>								
									<tr class="tbl_row">
										<td width="120" class="tbl_column">DOB <span class="f_req">*</span></td>
										<td> 
										<input name="dob_field" tabindex="6" value="{$dob_field}"  class="datepick span8" type="text">										
											<label for="reg_city" generated="true" class="error">{$dobErr}</label></td>
									</tr>	

									<!--tr>
										<td width="120" class="tbl_column">Position Applied For <span class="f_req">*</span></td>
										<td> 
										<select tabindex="7" name="position_for" class="span8"  id="position_for">
										<option value="">Select</option>
										{html_options options=$requirement selected=$position_for}	
										<label for="reg_city" generated="true" class="error">{$position_forErr}</label>																					
										</td>
									</tr-->
																		
									<tr class="tbl_row">
										<td width="125" class="tbl_column">Current Designation <span class="f_req">*</span></td>
										<td> 
										<select tabindex="8" name="designation_id" class="span8" value="{$designation_id}">	
											<option value="">Select</option>
											{html_options options=$desig_name selected=$designation_id}															
										</select>
										<label for="reg_city" generated="true" class="error">{$positionErr}</label>
										</td>
									</tr>
									
									<tr>
										<td width="120" class="tbl_column">Total Years of Exp. <span class="f_req">*</span></td>										
										<td>
										<select name="year_of_exp" tabindex="9" class="span4">
										<option value="">Year</option>
										{html_options options=$total_exp_yr selected=$year_of_exp}	
										</select>
										<select name="month_of_exp" tabindex="10" class="inline_text span4">
										<option value="">Month</option>
										{html_options options=$total_exp_month selected=$month_of_exp}	
										</select>
										<label for="reg_city" generated="true" class="error">{$year_of_expErr}</label>	
<label for="reg_city" generated="true" class="error">{$month_of_expErr}</label>										
										</td>			
									</tr>	

									<tr class="tbl_row">
										<td width="120" class="tbl_column">Present Location <span class="f_req">*</span></td>
										<td>
								          <input type="text" tabindex="11" name="present_location" value="{$present_location}" class="span8">								
											<label for="reg_city" generated="true" class="error">{$present_locationErr}</label>
										</td>	
									</tr>
									<tr>
										<td width="120" class="tbl_column">Native Location </td>
										<td>
								        <input type="text" tabindex="12" name="native_location" placeholder="" value="{if $native_location}{$native_location}{else}{$smarty.post.native_location}{/if}" class="span8">								
										</td>	
									</tr>		
									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Family (Dependents)<span class="f_req"></span></td>										
										<td>
										<textarea name="family" tabindex="13" cols="10" rows="2" class="span8 wysiwyg1">{if $family}{$family}{else}{$smarty.post.family}{/if}</textarea>									
										</td>			
									</tr>	
																	
										<tr class="tbl_row">
										<td width="120" class="tbl_column"> Nationality   <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="14" name="nationality" id="nationality" value="{$nationality}" class="span8 ui-autocomplete-input" autocomplete="off">							
										<label for="reg_city" generated="true" class="error"> {$nationalityErr} </label>								
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
										{html_options options=$languages selected=$res_language}
									</select>                             
									<label for="reg_city" generated="true" class="error">{$languageErr} </label>	
									</td>
									</tr>
								<tr>
										<td width="120" class="tbl_column"> Compensation <span class="f_req">*</span></td>
										<td>	
										
										<input type="text" value="{$present_ctc}"  tabindex="15" name="present_ctc"  placeholder="Present"  class="span2"/>										
										<select class="span3"   name="present_ctc_type" tabindex="16">
										{html_options options=$ctc_type selected=$present_ctc_type}
										</select>  
											
										<input type="text" name="expected_ctc" tabindex="17"  placeholder="Expected" value="{$expected_ctc}" class="span2"/>	
										<select  class="span3"  name="expected_ctc_type" tabindex="18">
										{html_options options=$ctc_type selected=$expected_ctc_type}
										</select>
										<span class="f_req">*</span>	
										
										<label for="reg_city" generated="true" class="error">
										{$present_ctcErr}
										</label>
											<label for="reg_city" generated="true" class="error">
										{$present_ctc_typeErr}</label>
											<label for="reg_city" generated="true" class="error">
										{$expected_ctcErr}</label>
											<label for="reg_city" generated="true" class="error">
										{$expected_ctc_typeErr}
										</label>	
										
										
										</td>	
									</tr>	
									<tr class="tbl_row">
										<td width="125" class="tbl_column">Notice Period <span class="f_req">*</span></td>
										<td> 
										<select name="notice_period" tabindex="19" class="span8">										
										{html_options options=$n_p selected=$notice_period}							
										</select>
										<label for="reg_city" generated="true" class="error">{$notice_periodErr}</label>																				
										</td>
									</tr>	
									
									<tr >
										<td width="120" class="tbl_column">Gender <span class="f_req">*</span></td>
										<td> 
										<input type="radio" tabindex="20" tabindex="14" name="gender"{if isset($gender) && $gender == '1'}{'checked'}{/if} value="1"> Male
										<input type="radio" tabindex="21" tabindex="15" name="gender"{if isset($gender) && $gender == '2'}{'checked'}{/if} value="2"> Female
										<label for="reg_city" generated="true" class="error">{$genderErr} </label>																				
										</td>
									</tr>	
									 <tr class="tbl_row">
										<td width="120" class="tbl_column">Marital Status <span class="f_req"></span></td>
										<td>
										<input type="radio" tabindex="22" name="marital_status"{if $marital_status && $marital_status == '1' || $smarty.post.marital_status == '1'}{'checked'}{/if} value="1"> Single
										<input type="radio" tabindex="23" name="marital_status"{if $marital_status && $marital_status == '2' || $smarty.post.marital_status == '2'}{'checked'} {/if} value="2"> Married
										<input type="radio" tabindex="23" name="marital_status"{if $marital_status && $marital_status == '3' || $smarty.post.marital_status == '3'}{'checked'} {/if} value="3"> Separated
										</td>	
									</tr>						
									
									
									<tr>
										<td width="120" class="tbl_column">Technical Expertise and Domain Expertise <span class="f_req">*</span></td>
										<td> 
									   <textarea name="tech_expert" tabindex="24" cols="10" rows="3" class="span8 wysiwyg1">{if $tech_expert}{$tech_expert}{else}{$smarty.post.tech_expert}{/if}</textarea>									
										<label for="reg_city" generated="true" class="error">{$tech_expertErr} </label>	
										</td>
									</tr>	
									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Computer Skills </td>
										<td>
										<textarea name="skills" cols="10" tabindex="25" rows="3" class="span8 wysiwyg1">{if $skills}{$skills}{else}{$smarty.post.skills}{/if}</textarea>									
										</td>	
									</tr>									
									
									<tr>
										<td width="120" class="tbl_column">Address <span class="f_req">*</span></td>
										<td>
										 <textarea name="address" cols="10" tabindex="26" rows="3" class="span8 wysiwyg1">{if $address}{$address}{else}{$smarty.post.address}{/if}</textarea>									
										<label for="reg_city" generated="true" class="error">{$addressErr}</label>
										</td>	
									</tr>
									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Hobbies </td>
										<td>
										<textarea name="hobby" tabindex="27" cols="10" rows="3" class="span8 wysiwyg1">{if $hobby}{$hobby}{else}{$smarty.post.hobby}{/if}</textarea>									
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
										<select name="qualification_#index#" tabindex="1" class="span8 qualification_id"  id="qualification_#index#">	
											<option value="">Select</option>
											{html_options options=$qual}															
										</select>						
										<label for="reg_city" generated="true" class="error" id="qualification_Err_#index#"></label></td>	
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
									<tr class="tbl_row">
										<td width="120" class="tbl_column"> Specialization <span class="f_req">*</span></td>
										<td> 
					<select name="specialization_#index#" tabindex="3" class="span8"  id="specialization_#index#">	
					<option value="">Select</option>
						{html_options options=$spec}							
					</select>
					<label for="reg_city" generated="true" class="error" id="specialization_Err_#index#"></label>										
				</td>	
									</tr>
						         <tr>
										<td width="120" class="tbl_column">University <span class="f_req"></span></td>
										<td> 
									<input type="text" tabindex="4" name="university_#index#" id="university_#index#" class="span8" >										
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
										<input type="text" tabindex="5" name="location_#index#" id="location_#index#" value="" class="span8">
									<label for="reg_city" generated="true" class="error" id="locationErr_#index#"> </label> 
										</td>	
										</tr>
									
									<tr>
										<td width="120" class="tbl_column"> College <span class="f_req"></span></td>
										<td> 
					<input type="text" tabindex="6" name="college_#index#" id="college_#index#" class="span8" >										
					<label for="reg_city" generated="true" class="error">{$collegeErr}</labe>									
				</td>		
									</tr>
									<tr class="tbl_row">
										<td width="120" class="tbl_column"> % of Marks  <span class="f_req">*</span></td>
										<td> 
									<input type="text" tabindex="7" name="grade_#index#" id="grade_#index#" value="{$grade}" class="span4" >
									<select name="grade_type_#index#" tabindex="8" class="inline_text span4"  id="grade_type_#index#">
										{html_options options=$grade_drop} 
									</select>
									<label for="reg_city" generated="true" class="error" id="gradeErr_#index#"></label>	
							<label for="reg_city" generated="true" class="error" id="grade_typeErr_#index#"></label>	
							
								</td>		
									</tr>
									
									<tr>
										<td width="120" class="tbl_column">Year of passing <span class="f_req">*</span></td>										
								<td>
									<select name="from_yr_#index#" id="from_yr_#index#" tabindex="9" class="span4">
									<option value="">Select</option>
										{html_options options=$year_of_pass} 
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
										<select tabindex="7" name="desig_#index#" class="span8"  id="desig_#index#">	
											<option value="">Select</option>
											{html_options options=$desig_name}															
										</select>
										<label for="reg_city" generated="true" class="error" id="desigErr_#index#"></label>									
										</td>
							</tr>
								<tr>
										<td width="120" class="tbl_column">Employment Period<span class="f_req"> *</span></td>
										<td>
										<select name="from_month_of_exp_#index#" id = "from_month_of_exp_#index#" tabindex="3" class="span3">
										<option value="">From Month</option>
										{html_options options=$exp_month} 
										</select>
										<select name="from_year_of_exp_#index#" id = "from_year_of_exp_#index#" tabindex="2" class="inline_text span3">
										<option value="">From Year</option>
										{html_options options=$exp_yr} 
										</select>
										
										<select name="to_month_of_exp_#index#" id = "to_month_of_exp_#index#" tabindex="3" class="inline_text span3">
										<option value="">To Month</option>
										{html_options options=$exp_month} 
										</select>
										
										<select name="to_year_of_exp_#index#" id = "to_year_of_exp_#index#" tabindex="2" class="inline_text span3">
										<option value="">To Year</option>
										{html_options options=$exp_yr} 
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
										<input type="text"  tabindex="4" name="workloc_#index#" id="workloc_#index#" value="" class="span8" />										
										<label for="reg_city" generated="true" class="error" id="worklocErr_#index#"></label>										
										</td>
										
							</tr>
							<tr>
										<td width="120" class="tbl_column">Area of Specialization/Expertise  <span class="f_req">*</span></td>
										<td> 
										<input type="text" value=""  name="area_#index#" id="area_#index#"  tabindex="5" class="span8" />
										<label for="reg_city" generated="true" class="error" id="areaErr_#index#"></label>										
										</td>
							</tr>
								<tr class="tbl_row">
										<td width="120" class="tbl_column">Company Name <span class="f_req">*</span></td>
										<td> 
										<input type="text"  tabindex="6" name="company_#index#" value="" id="company_#index#"  class="span8" />
										<label for="reg_city" generated="true" class="error" id="companyErr_#index#"></label>										
										</td>
							</tr>	
							<tr>
								<td width="120" class="tbl_column">Company Profile <span class="f_req">*</span></td>
								<td>
								<textarea name="company_profile_#index#" tabindex="7" id="company_profile_#index#" cols="10" rows="3" class="span8 wysiwyg1"></textarea>									
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
										<textarea   placeholder="" name="vital_#index#" tabindex="8" id="vital_#index#" cols="10" rows="3" class="span8 wysiwyg1"></textarea>
										</td>
							</tr>
							<tr>
										<td width="120" class="tbl_column">Key Responsibility <span class="f_req">*</span></td>
										<td>
										<textarea name="key_responsibility_#index#" tabindex="9" id="key_responsibility_#index#" cols="10" rows="3" class="span8 wysiwyg1"></textarea>									
									<label for="reg_city" generated="true" class="error" id="key_responsibilityErr_#index#"></label>
										</td>	
									</tr>
									
									<tr class="tbl_row">
								<td width="120" class="tbl_column">Notable Achievements  <span class="f_req">*</span></td>
								<td>
								<textarea name="key_achievement_#index#" tabindex="10" id="key_achievement_#index#" cols="10" rows="3" class="span8 wysiwyg1"></textarea>									
								<label for="reg_city" generated="true" class="error" id="key_achievementErr_#index#"></label>
									
								</td>	
							</tr>	
								   <tr>
										<td width="120" class="tbl_column"> Reporting To  <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="11" name="reporting_to_#index#" id="reporting_to_#index#" value="" class="span8" autocomplete="off">							
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
								<select name="train_year_#index#" class="span8" tabindex="1" id="train_year_#index#">	
									<option value="">Year</option>
										{html_options options=$year_of_pass} 
									</select>
									<label for="reg_city" generated="true" class="error" id="train_yearErr_#index#"> </label>
										</td>	
									</tr>
									
									<tr>
										<td width="120" class="tbl_column"> Description  <span class="f_req">*</span></td>
										<td>
										<textarea name="description_#index#" tabindex="2" id="description_#index#" cols="10" rows="3" class="span8 wysiwyg1"></textarea>									
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
		<input type="text" tabindex="3" name="programtitle_#index#" id="programtitle_#index#" value="" class="span8">
									<label for="reg_city" generated="true" class="error" id="programtitleErr_#index#"></label>
										</td>	
									</tr>
									
									<tr>
										<td width="120" class="tbl_column"> Location <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="4" name="train_location_#index#" id="train_location_#index#" value="" class="span8 ui-autocomplete-input" autocomplete="off">							
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
									<tr class="tbl_row">
									<td width="120" class="tbl_column">Candidates Outlook on Company   </td>
									<td> 
										<textarea name="about_company" tabindex="1"  rows="3" class="span12 wysiwyg1">{if $about_company}{$about_company}{else}{$smarty.post.about_company}{/if}</textarea>									
									</td>
									</tr>
			
									<tr class="">
										<td width="120" class="tbl_column">Candidates Personality <span class="f_req">*</span>
										</td>
										<td>
<textarea placeholder="" name="personality" tabindex="2"  rows="3" class="span12 wysiwyg1">{if $personality}{$personality}{else}{$smarty.post.personality}{/if}</textarea>
<label for="reg_city" generated="true" class="error">{$personalityErr}</label>	
										</td>	
									</tr>
									<tr class="tbl_row">
									<td width="120" class="tbl_column">Relevant Exposure <span class="f_req">*</span></td>
									<td> 
									<textarea name="relevant_exposure" tabindex="3"  rows="3" class="span12 wysiwyg1">{if $relevant_exposure}{$relevant_exposure}{else}{$smarty.post.relevant_exposure}{/if}</textarea>									
									<label for="reg_city" generated="true" class="error">{$relevant_exposureErr}</label>	
									</td>
									</tr>
									
									<tr class="">
				<td width="120" class="tbl_column">Credentials considered for Shortlisting <span class="f_req">*</span></td>
				<td> 
					<textarea name="credential_shortlisting" tabindex="4" rows="3" class="span12 wysiwyg1">{if $credential_shortlisting}{$credential_shortlisting}{else}{$smarty.post.credential_shortlisting}{/if}</textarea>									
					<label for="reg_city" generated="true" class="error">{$credential_shortlistingErr}</label>	
					</td>
			</tr>
			<tr class="tbl_row">
									<td width="120" class="tbl_column">Any other vital inputs for the interview  </td>
									<td> 
										<textarea name="vital_info_interview" tabindex="5" rows="3" class="span12 wysiwyg1">{if $vital_info_interview}{$vital_info_interview}{else}{$smarty.post.vital_info_interview}{/if}</textarea>									
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
											<textarea placeholder="" name="interview_availability" tabindex="6"  rows="3" class="span12 wysiwyg1">{if $interview_availability}{$interview_availability}{else}{$smarty.post.interview_availability}{/if}</textarea>
											<label for="reg_city" generated="true" class="error">{$interview_availabilityErr}</label>	
										</td>	
									</tr>		
									<tr class="">
										<td width="120" class="tbl_column">Achievements  </td>
										<td> 
									   <textarea name="achievement"  tabindex="7" rows="3" class="span12 wysiwyg1">{if $achievement}{$achievement}{else}{$smarty.post.achievement}{/if}</textarea>									
										</td>
									</tr>	
									
			
				
			<tr class="tbl_row">
				<td width="120" class="tbl_column">Candidate Brief </td>
				<td> 
				   <textarea name="candidate_brief" tabindex="8"  rows="3" class="span12 wysiwyg1">{if $candidate_brief}{$candidate_brief}{else}{$smarty.post.candidate_brief}{/if}</textarea>									
				</td>
			</tr>										
		</tbody>
	</table>
</div>
</div>
<input type="hidden" id="edu_count" name="edu_count" value="{$eduCount}">
<input type="hidden" id="exp_count" name="exp_count" value="{$expCount}">	
<input type="hidden" id="train_count" name="train_count" value="{$trainCount}">
<input type="hidden" id="totCount_edu" name="totCount_edu" value="{$totCount_edu}">	
<input type="hidden" id="totCount_exp" name="totCount_exp" value="{$totCount_exp}">	
<input type="hidden" id="add_formatted_resume" name="add_formatted_resume" value="{$marty.post.add_formatted_resume}">

				
							</div>
							</div>
					</div>
</div>
                    </div>
					</div>
						
					<input type="hidden" id="tab_open_resume" value="{$tab_open_resume}"/>
					 <div class="form-actions">
	<input class="btn btn-gebo" type="submit" value="Submit">
	<input type="hidden" name="data[Client][webroot]" value="{$smarty.const.webroot}resume" id="webroot">
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
{if $RESUME_DATA}{$RESUME_DATA}{else}{$smarty.post.RESUME_DATA}{/if}
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
			
{include file='include/footer.tpl'}

		
	{for $i=0; $i < $eduCount; $i++}
		
		<input type="hidden" id="qualificationData_{$i}" name="qualificationData_{$i}" value="{$qualificationData[$i]}">
		<input type="hidden" id="specializationData_{$i}" name="specializationData_{$i}" value='{html_options options=$spec_data[$i]}'>
		<input type="hidden" id="locationData_{$i}" name="locationData_{$i}" value="{$locationData[$i]}">
		<input type="hidden" id="collegeData_{$i}" name="collegeData_{$i}" value="{$collegeData[$i]}">
		<input type="hidden" id="degreeData_{$i}" name="degreeData_{$i}" value='{html_options options=$degreeData[$i]}'>
		<input type="hidden" id="degreeSelData_{$i}" name="degreeSelData_{$i}" value="{$degree[$i]}">
		<input type="hidden" id="specializationSelData_{$i}" name="specializationSelData_{$i}" value="{$spec[$i]}">

		<input type="hidden" id="gradeData_{$i}" name="gradeData_{$i}" value="{$gradeData[$i]}">
		<input type="hidden" id="grade_typeData_{$i}" name="grade_typeData_{$i}" value="{$grade_typeData[$i]}">
		<input type="hidden" id="universityData_{$i}" name="universityData_{$i}" value="{$universityData[$i]}">
		<input type="hidden" id="from_yrData_{$i}" name="from_yrData_{$i}" value="{$from_yrData[$i]}">
		
		<input type="hidden" id="qualification_Err_Data_{$i}"  value="{$eduErr[$i]['qualificationErr']}">
		<input type="hidden" id="degree_Err_Data_{$i}"  value="{$eduErr[$i]['degreeErr']}">
		<input type="hidden" id="specialization_Err_Data_{$i}"  value="{$eduErr[$i]['specializationErr']}">
		<input type="hidden" id="from_yr_Err_Data_{$i}"  value="{$eduErr[$i]['from_yrErr']}">
		<input type="hidden" id="locationErr_Data_{$i}"  value="{$eduErr[$i]['locationErr']}">
		<input type="hidden" id="gradeErr_Data_{$i}"  value="{$eduErr[$i]['gradeErr']}">
		<input type="hidden" id="grade_typeErr_Data_{$i}"  value="{$eduErr[$i]['grade_typeErr']}">
	{/for}
	
	{for $i=0; $i < $expCount; $i++}
		<input type="hidden" id="desigData_{$i}" name="desigData_{$i}" value="{$desigData[$i]}">
		<input type="hidden" id="areaData_{$i}" name="areaData_{$i}" value="{$areaData[$i]}">
		<input type="hidden" id="from_year_of_expData_{$i}" name="from_year_of_expData_{$i}" value="{$from_year_of_expData[$i]}">
		<input type="hidden" id="from_month_of_expData_{$i}" name="from_month_of_expData_{$i}" value="{$from_month_of_expData[$i]}">
		<input type="hidden" id="to_year_of_expData_{$i}" name="to_year_of_expData_{$i}" value="{$to_year_of_expData[$i]}">
		<input type="hidden" id="to_month_of_expData_{$i}" name="to_month_of_expData_{$i}" value="{$to_month_of_expData[$i]}">
		<input type="hidden" id="companyData_{$i}" name="companyData_{$i}" value="{$companyData[$i]}">
		<input type="hidden" id="worklocData_{$i}" name="worklocData_{$i}" value="{$worklocData[$i]}">
		<input type="hidden" id="vitalData_{$i}" name="vitalData_{$i}" value="{$vitalData[$i]}">
		<input type="hidden" id="company_profileData_{$i}" name="company_profileData_{$i}" value="{$company_profileData[$i]}">
		<input type="hidden" id="key_responsibilityData_{$i}" name="key_responsibilityData_{$i}" value="{$key_responsibilityData[$i]}">
		<input type="hidden" id="key_achievementData_{$i}" name="key_achievementData_{$i}" value="{$key_achievementData[$i]}">
		<input type="hidden" id="reporting_to_Data_{$i}" name="reporting_to_Data_{$i}" value="{$reporting_toData[$i]}">
		
		<input type="hidden" id="desig_Err_Data_{$i}"  value="{$expErr[$i]['desigErr']}">
		<input type="hidden" id="from_year_of_exp_Err_Data_{$i}"  value="{$expErr[$i]['from_year_of_expErr']}">
		<input type="hidden" id="from_month_of_exp_Err_Data_{$i}"  value="{$expErr[$i]['from_month_of_expErr']}">
		<input type="hidden" id="to_year_of_exp_Err_Data_{$i}"  value="{$expErr[$i]['to_year_of_expErr']}">
		<input type="hidden" id="to_month_of_exp_Err_Data_{$i}"  value="{$expErr[$i]['to_month_of_expErr']}">
		<input type="hidden" id="workloc_Err_Data_{$i}"  value="{$expErr[$i]['worklocErr']}">
		<input type="hidden" id="area_Err_Data_{$i}"  value="{$expErr[$i]['areaErr']}">
		<input type="hidden" id="company_Err_Data_{$i}"  value="{$expErr[$i]['companyErr']}">
		<input type="hidden" id="company_profile_Err_Data_{$i}"  value="{$expErr[$i]['company_profileErr']}">
		<input type="hidden" id="key_responsibility_Err_Data_{$i}"  value="{$expErr[$i]['key_responsibilityErr']}">
		<input type="hidden" id="key_achievement_Err_Data_{$i}"  value="{$expErr[$i]['key_achievementErr']}">
		<input type="hidden" id="reporting_to_Err_Data_{$i}"  value="{$expErr[$i]['reporting_toErr']}">
	{/for}
	
	{for $i=0; $i < $trainCount; $i++}
		<input type="hidden" id="train_yearData_{$i}" name="train_yearData_{$i}" value="{$train_yearData[$i]}">
		<input type="hidden" id="descriptionData_{$i}" name="descriptionData_{$i}" value="{$descriptionData[$i]}">
		<input type="hidden" id="programtitleData_{$i}" name="programtitleData_{$i}" value="{$programtitleData[$i]}">
		<input type="hidden" id="train_locationData_{$i}" name="train_locationData_{$i}" value="{$train_locationData[$i]}">
		
		<input type="hidden" id="train_year_Err_Data_{$i}"  value="{$trainErr[$i]['train_yearErr']}">
		<input type="hidden" id="description_Err_Data_{$i}"  value="{$trainErr[$i]['descriptionErr']}">
		<input type="hidden" id="programtitle_Err_Data_{$i}"  value="{$trainErr[$i]['programtitleErr']}">
		<input type="hidden" id="train_location_Err_Data_{$i}"  value="{$trainErr[$i]['train_locationErr']}">
	{/for}
	

{literal}	 
<script type="text/javascript">	
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
				$('#to_year_of_exp_'+i).attr('value', $('#to_year_of_expData_'+i).val());
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
</script>	
{/literal}