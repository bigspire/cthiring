{* Purpose : To add resume.
 Created : Nikitasa
   Date : 07-03-2017 *}
   

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
                                    <a href="resume.php">Resumes</a>
                                </li>
                            
                                <li>
                                   Add Resume
                                </li>
                            </ul>
                        </div>
                    </nav>
				{if $EXIST_MSG}
				 <div id="flashMessage" class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>{$EXIST_MSG}</div>					
				{/if}
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
										<input type="text"  value="{$requirement}"  class="span8" disabled>
										<input type="hidden" value="{$requirement}" name="requirement">
										</td>
									</tr>	
									
									<tr>
									
									<tr class="">
										<td width="120" class="tbl_column">Candidate Name <span class="f_req">*</span></td>
										<td>
								        <input type="text" tabindex="1" name="first_name" placeholder="First Name" value="{$first_name}" class="span4">
								        <input type="text" tabindex="2" name="last_name" placeholder="Last Name" value="{$last_name}" class="inline_text span4">
								
										<label for="reg_city" generated="true" class="error">{$first_nameErr}{$last_nameErr}</label>
										</td>	
									</tr>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Email <span class="f_req">*</span></td>
										<td>	
										<input type="text" tabindex="3" id="email" name="email" value="{$email}" class="span8">
										<label for="reg_city" generated="true" class="error">{$emailErr}</label>																						
										</td>	
									</tr>	
                                    <tr class="">
										<td width="120" class="tbl_column"> Mobile <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="4" name="mobile" class="span8" value="{$mobile}" autocomplete="off">							

							
										
									<label for="reg_city" generated="true" class="error">{$mobileErr} </label>							
										</td>		
									</tr>									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">DOB <span class="f_req">*</span></td>
										<td> 
										<input name="dob" tabindex="5" value="{$dob}"  class="datepick span8" placeholder="" type="text" id="HrEmployeeDob">										
										<label for="reg_city" generated="true" class="error">{$dobErr}</label>																					
										</td>
									</tr>	

										<!--tr class="tbl_row">
										<td width="120" class="tbl_column">Position For <span class="f_req">*</span></td>
										<td> 
										<select tabindex="6" name="position_for" class="span8"  id="position_for">
										<option value="">Select</option>
										{html_options options=$requirement selected=$smarty.post.position_for}	
										<label for="reg_city" generated="true" class="error">{$position_forErr}</label>																					
										</td>
									</tr-->	
									<tr>
										<td width="120" class="tbl_column">Current Designation<span class="f_req">*</span></td>
										<td>										
										<select tabindex="7" name="designation_id" class="span8"  id="designation_id">	
											<option value="">Select</option>
											{html_options options=$desig_name selected=$smarty.post.designation_id}															
										</select>
										<label for="reg_city" generated="true" class="error">{$positionErr}</label>									
										</td>	
									</tr>	
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Total Years of Exp<span class="f_req">*</span></td>
										<td>
										<select name="year_of_exp" tabindex="8" class="span4">
										<option value="">Year</option>
										{html_options options=$tot_exp_yr selected=$smarty.post.year_of_exp}	
										</select>
										<select name="month_of_exp" tabindex="9" class="inline_text span4">
										<option value="">Month</option>
										{html_options options=$tot_exp_month selected=$smarty.post.month_of_exp}	
										</select>
										<label for="reg_city" generated="true" class="error">{$year_of_expErr}</label>	
										<label for="reg_city" generated="true" class="error">{$month_of_expErr}</label>	
									
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
										
										<input type="text" tabindex="10" name="present_ctc" value="{$present_ctc}" placeholder="Present"  class="span2"/>										
										<select class="span2"  tabindex="11"  name="present_ctc_type">
										{html_options options=$ctc_type selected=$smarty.post.present_ctc_type}
										</select> 
											
										<input type="text" tabindex="12" name="expected_ctc" value="{$expected_ctc}" placeholder="Expected"  class="span2"/>	
										<select  class="span2" tabindex="13"  name="expected_ctc_type">
										{html_options options=$ctc_type selected=$smarty.post.expected_ctc_type}
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
										{$expected_ctc_typeErr}</label>
										
										
										</label>	
										</td>
									</tr>
									<tr>
										<td width="125" class="tbl_column">Notice Period <span class="f_req">*</span></td>
										<td> 
										<select name="notice_period" tabindex="14" class="span8">										
										{html_options options=$n_p selected=$smarty.post.notice_period}							
										</select>
										<label for="reg_city" generated="true" class="error">{$notice_periodErr}</label>																		
										</td>
									</tr>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Gender <span class="f_req">*</span></td>
										<td> 
										<input type="radio" tabindex="2" tabindex="15" name="gender"{if $smarty.post.gender == '1'}{'checked'}{/if} value="1"> Male
										<input type="radio" tabindex="3" tabindex="16" name="gender"{if $smarty.post.gender == '2'}{'checked'} {/if} value="2"> Female
										<label for="reg_city" generated="true" class="error">{$genderErr}</label>																				
										</td>
									</tr>	
									 <tr>
										<td width="120" class="tbl_column">Marital Status <span class="f_req"></span></td>
										<td>
										<input type="radio" tabindex="17" name="marital_status"{if $smarty.post.marital_status && $smarty.post.marital_status == 1}{'checked'}{/if} value="1"> Single
										<input type="radio" tabindex="18" name="marital_status"{if $smarty.post.marital_status && $smarty.post.marital_status == 2}{'checked'} {/if} value="2"> Married
										<input type="radio" tabindex="18" name="marital_status"{if $smarty.post.marital_status && $smarty.post.marital_status == 3}{'checked'} {/if} value="3"> Separated
										</td>	
									</tr>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Family (Dependents) <span class="f_req"></span></td>										
										<td>
										<textarea name="family" id="family" tabindex="19" cols="10" rows="3" class="span8 wysiwyg1">{$smarty.post.family}</textarea>									
										</td>			
									</tr>	
									<tr>
										<td width="120" class="tbl_column">Present Location <span class="f_req">*</span> </td>
										<td>
								        <input type="text" tabindex="20" name="present_location" placeholder="" value="{$present_location}" class="span8">								
										<label for="reg_city" generated="true" class="error">{$present_locationErr}</label>
										</td>	
									</tr>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Native Location </td>
										<td>
								        <input type="text" tabindex="21" name="native_location" value="{$smarty.post.native_location}" class="span8">								
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
					{html_options options=$qual}															
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
						{html_options options=$spec}							
					</select>
					<label for="reg_city" generated="true" class="error" id="specialization_Err_#index#"></label>										
				</td>						
			</tr>
			
			<tr class="tbl_row">
				<td width="120" class="tbl_column">College <span class="f_req"></span></td>
				<td> 
					<input type="text" tabindex="4" name="college_#index#" id="college_#index#" class="span8" >										
					<label for="reg_city" generated="true" class="error">{$collegeErr}</labe>									
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
									<input type="text" tabindex="5" name="grade_#index#" id="grade_#index#" value="{$grade}" class="span4" >
									<select name="grade_type_#index#" tabindex="6" class="inline_text span4"  id="grade_type_#index#">
										{html_options options=$grade_drop} 
									</select>
								</td>
							</tr>
							<tr class="tbl_row">
							<td width="120" class="tbl_column">Year of Passing <span class="f_req">*</span></td>										
								<td>
									<select name="year_of_pass_#index#" id="year_of_pass_#index#" tabindex="7" class="span8">
									<option value="">Year</option>
										{html_options options=$year_of_pass} 
									</select>
								<label for="reg_city" generated="true" class="error" id="year_of_pass_Err_#index#"></label>	
							</tr>
							
							<tr>
								<td width="120" class="tbl_column">University <span class="f_req"></span></td>
								<td> 
									<input type="text" tabindex="8" name="university_#index#" id="university_#index#" class="span8" >										
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
											{html_options options=$desig_name}															
										</select>
										<label for="reg_city" generated="true" class="error"id="desig_Err_#index#" ></label>										
										</td>
							</tr>
								<tr>
										<td width="120" class="tbl_column">Employment Period<span class="f_req"> *</span></td>
										<td>
										<select name="from_month_of_exp_#index#" id = "from_month_of_exp_#index#" tabindex="3" class="span2">
										<option value="">From</option>
										{html_options options=$exp_month} 
										</select>
										<select name="from_year_of_exp_#index#" id = "from_year_of_exp_#index#" tabindex="2" class="inline_text span2">
										<option value="">From</option>
										{html_options options=$exp_yr} 
										</select>
										
										<select name="to_month_of_exp_#index#" id = "to_month_of_exp_#index#" tabindex="3" class="inline_text span2">
										<option value="">To</option>
										{html_options options=$exp_month} 
										</select>
										
										<select name="to_year_of_exp_#index#" id = "to_year_of_exp_#index#" tabindex="2" class="inline_text span2">
										<option value="">To</option>
										{html_options options=$exp_yr} 
										</select>
										<label for="reg_city" generated="true" class="error" id="from_month_of_expErr_#index#"></label>																																
										<label for="reg_city" generated="true" class="error" id="from_year_of_expErr_#index#"></label>																						
										<label for="reg_city" generated="true" class="error" id="to_month_of_expErr_#index#"></label>																						
										<label for="reg_city" generated="true" class="error" id="to_year_of_expErr_#index#"></label>																						
										
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
										<textarea name="vital_#index#" tabindex="7" id="vital_#index#" cols="10" rows="3" class="span8 wysiwyg1"></textarea>
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
						<textarea name="certification" tabindex="7" id="certification" cols="10" rows="3" class="span8 wysiwyg1">{if $certification}{$certification}{else}{$smarty.post.certification}{/if}</textarea>
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
{foreach $tsData as $ts_data}
{if $ts_data}
  <li><input class="span8" readonly="readonly" placeholder="" name="ts[]" value="{$ts_data}" type="text">   
  <input name="tsr[]" type="hidden" value="{$tsrData[$ts_data@key]}"  class="rating" data-fractions="2"/> <span class="label label-info dn">{$tsrData[$ts_data@key]}</span></li>
  {/if}
{/foreach} 



</ul>
 
    <!-- Custom CSS -->
 
										</td>	
									</tr>	
									
									
									<tr class="">
										<td width="120" class="tbl_column">Consultant Assessment <span class="f_req">*</span></td>
										<td>
<textarea placeholder="" name="consultant" tabindex="1" id="consultant" cols="10" rows="3" class="span10 wysiwyg1">{$smarty.post.consultant}</textarea>
										<label for="reg_city" generated="true" class="error">{$consultantErr}</label>
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
 
 {foreach $bsData as $bs_data}
{if $bs_data}
  <li><input class="span8" readonly="readonly" placeholder="" name="bs[]" value="{$bs_data}" type="text">   
  <input name="bsr[]" type="hidden" value="{$bsrData[$bs_data@key]}"  class="rating" data-fractions="2"/> <span class="label label-info dn">{$bsrData[$bs_data@key]}</span> </li>
  {/if}
{/foreach} 

 
 
</ul>
 
										
										</td>	
									</tr>

									
									<tr class="">
										<td width="120" class="tbl_column">Interview Availability <span class="f_req">*</span></td>
										<td>
<textarea placeholder="" name="interview_availability" tabindex="2" id="interview_availability" cols="10" rows="3" class="span10 wysiwyg1">{$smarty.post.interview_availability}</textarea>
										<label for="reg_city" generated="true" class="error">{$interview_availabilityErr}</label>
										</td>	
									</tr>													
								</tbody>
							</table>
						</div>
						
						
						<input type="hidden" id="edu_count" name="edu_count" value="{$eduCount}">
						<input type="hidden" id="exp_count" name="exp_count" value="{$expCount}">	
<input type="hidden" id="add_resume" name="add_resume" value="{$smarty.post.add_resume}">	
</div>
</div>
</div>
<input type="hidden" id="tab_open" value="{$tab_open}"/>
<input type="hidden" id="end_date" name="end_date" value="{$dob_default}">	

<div class="form-actions">
	<input class="btn btn-gebo" type="submit" value="Submit">
	<input type="hidden" name="data[Client][webroot]" value="{$smarty.const.webroot}resume" id="webroot">

	<a href="javascript:void(0)" class="jsRedirect cancelBtn cancel_event">
	<input type="button" value="Cancel" class="btn">
	</a>
	
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
			
	{for $i=0; $i < $smarty.post.edu_count; $i++}
		
		<input type="hidden" id="qualificationData_{$i}" name="qualificationData_{$i}" value="{$qualificationData[$i]}">
		<input type="hidden" id="specializationData_{$i}" name="specializationData_{$i}" value='{html_options options=$spec_data[$i]}'>
		<input type="hidden" id="collegeData_{$i}" name="collegeData_{$i}" value="{$collegeData[$i]}">
		<input type="hidden" id="degreeData_{$i}" name="degreeData_{$i}" value='{html_options options=$degreeData[$i]}'>
		<input type="hidden" id="degreeSelData_{$i}" name="degreeSelData_{$i}" value="{$degree[$i]}">
		<input type="hidden" id="specializationSelData_{$i}" name="specializationSelData_{$i}" value="{$spec[$i]}">

		<!--input type="hidden" id="degreeData_{$i}" name="degreeData_{$i}" value="{$smarty.session[$i].degreeData}"-->
		<input type="hidden" id="gradeData_{$i}" name="gradeData_{$i}" value="{$gradeData[$i]}">
		<input type="hidden" id="grade_typeData_{$i}" name="grade_typeData_{$i}" value="{$grade_typeData[$i]}">
		<input type="hidden" id="universityData_{$i}" name="universityData_{$i}" value="{$universityData[$i]}">
		<input type="hidden" id="year_of_passData_{$i}" name="year_of_passData_{$i}" value="{$year_of_passData[$i]}">
		
		<input type="hidden" id="qualification_Err_Data_{$i}"  value="{$eduErr[$i]['qualificationErr']}">
		<input type="hidden" id="degree_Err_Data_{$i}"  value="{$eduErr[$i]['degreeErr']}">
		<input type="hidden" id="specialization_Err_Data_{$i}"  value="{$eduErr[$i]['specializationErr']}">
		<input type="hidden" id="year_of_pass_Err_Data_{$i}"  value="{$eduErr[$i]['year_of_passErr']}">
	{/for}
	
	{for $i=0; $i < $smarty.post.exp_count; $i++}
		<input type="hidden" id="desigData_{$i}" name="desigData_{$i}" value="{$desigData[$i]}">
		<input type="hidden" id="areaData_{$i}" name="areaData_{$i}" value="{$areaData[$i]}">
		<input type="hidden" id="from_year_of_expData_{$i}" name="from_year_of_expData_{$i}" value="{$from_year_of_expData[$i]}">
		<input type="hidden" id="from_month_of_expData_{$i}" name="from_month_of_expData_{$i}" value="{$from_month_of_expData[$i]}">
		<input type="hidden" id="to_year_of_expData_{$i}" name="to_year_of_expData_{$i}" value="{$to_year_of_expData[$i]}">
		<input type="hidden" id="to_month_of_expData_{$i}" name="to_month_of_expData_{$i}" value="{$to_month_of_expData[$i]}">
		
		<!--<input type="hidden" id="current_locData_{$i}" name="current_locData_{$i}" value="{$current_locData[$i]}">-->
		<input type="hidden" id="companyData_{$i}" name="companyData_{$i}" value="{$companyData[$i]}">
		<input type="hidden" id="locationData_{$i}" name="locationData_{$i}" value="{$locationData[$i]}">
		<input type="hidden" id="vitalData_{$i}" name="vitalData_{$i}" value="{$vitalData[$i]}">
		
		<input type="hidden" id="desig_Err_Data_{$i}"  value="{$expErr[$i]['desigErr']}">
		<input type="hidden" id="from_year_of_exp_Err_Data_{$i}"  value="{$expErr[$i]['from_year_of_expErr']}">
		<input type="hidden" id="from_month_of_exp_Err_Data_{$i}"  value="{$expErr[$i]['from_month_of_expErr']}">
		<input type="hidden" id="to_year_of_exp_Err_Data_{$i}"  value="{$expErr[$i]['to_year_of_expErr']}">
		<input type="hidden" id="to_month_of_exp_Err_Data_{$i}"  value="{$expErr[$i]['to_month_of_expErr']}">
		
		<input type="hidden" id="area_Err_Data_{$i}"  value="{$expErr[$i]['areaErr']}">
		<input type="hidden" id="location_Err_Data_{$i}"  value="{$expErr[$i]['locationErr']}">
		<input type="hidden" id="company_Err_Data_{$i}"  value="{$expErr[$i]['companyErr']}">
	{/for}
	
	{include file='include/footer.tpl'}

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
				$('#to_year_of_exp_'+i).attr('value', $('#to_year_of_expData_'+i).val());
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
});
</script>	
{/literal}