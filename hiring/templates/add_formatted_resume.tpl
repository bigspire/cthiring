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
                           <a href="recruiter_dashboard.php"><i class="icon-home"></i></a>
                        </li>
                        <li>
                           <a href="resume.php">Resumes</a>
                        </li>
                        <li>
                           Create Fully Formatted Resume
                        </li>
                     </ul>
                  </div>
              </nav>
					
<form action="resume.php" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="row-fluid">
		<div class="span12">
		<div class="mbox">
			<div class="tabbable">
								<div class="heading">
										<ul class="nav nav-tabs">
										<li class="active"><a class="restabChange" rel="interview"  href="#mbox_billing" data-toggle="tab"><i class="splashy-mail_light_down"></i>   Personal </a></li>
										<li class=""><a class="restabChange" rel="interview"  href="#box_edu" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Education Details </a></li>
										<li class=""><a class="restabChange" rel="interview"  href="#box_exp" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Experience Details </a></li>
										<li class=""><a class="restabChange" rel="interview"  href="#box_train" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Training & Programmes</a></li>
										<li class=""><a class="restabChange" rel="interview"  href="#mbox_Consultant" data-toggle="tab"><i class="splashy-mail_light_down"></i> Consultant Assessment </a></li>	
									</ul>
								</div>
			<div class="tab-content" style="overflow:visible">			
			<div class="tab-pane active" id="mbox_billing">
			<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Candidate Name <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="7" name="first_name" placeholder="First Name" value="" class="span4">
								        <input type="text" tabindex="7" name="last_name" placeholder="Last Name" value="" class="inline_text span4">
										<label for="reg_city" generated="true" class="error">{$first_nameErr}{$last_nameErr}</label>
										
										</td>	
									</tr>
									
									<tr>
										<td width="120" class="tbl_column">Email <span class="f_req">*</span></td>
										<td>	
										<input type="text" tabindex="7" id="email" name="email" value="" class="span8">
										<label for="reg_city" generated="true" class="error">{$emailErr}</label>
										</td>	
									</tr>	
									
                          <tr class="tbl_row">
										<td width="120" class="tbl_column"> Mobile <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="7" name="mobile"  value="{$mobile}" class="span8 ui-autocomplete-input" autocomplete="off">							
									<label for="reg_city" generated="true" class="error">{$mobileErr} </label>	</td>		
									</tr>	
									
									<tr>
										<td width="120" class="tbl_column">Telephone <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="7" name="telephone" value="{$telephone}" class="span8">
										<label for="reg_city" generated="true" class="error">{$telephoneErr}</label>	</td>	
									</tr>								
									<tr class="tbl_row">
										<td width="120" class="tbl_column">DOB <span class="f_req">*</span></td>
										<td> 
										<input name="dob" tabindex="4" value=""  class="datepick span8" placeholder="" type="text" id="HrEmployeeDob">										
											<label for="reg_city" generated="true" class="error">{$dobErr}</label></td>
									</tr>	

									<tr>
										<td width="120" class="tbl_column">Position Applied For <span class="f_req">*</span></td>
										<td> 
										<input type="text" tabindex="7" name="position_for" id="position_for" value="{$position_for}" class="span8 ui-autocomplete-input" autocomplete="off">
										<label for="reg_city" generated="true" class="error">{$position_forErr}</label>	</td>
									</tr>
																		
									<tr class="tbl_row">
										<td width="125" class="tbl_column">Current Designation <span class="f_req">*</span></td>
										<td> 
										<select tabindex="7" name="designation_id" class="span8"  id="designation_id">	
											<option value="">Select</option>
											{html_options options=$desig_name selected=$smarty.post.designation_id}															
										</select>
										<label for="reg_city" generated="true" class="error">{$positionErr}</label>	</td>
									</tr>
									
									<tr>
										<td width="120" class="tbl_column">Total Years of Exp. <span class="f_req">*</span></td>										
										<td>
										<select name="year_of_exp" tabindex="8" class="span4">
										<option value="">Year</option>
										{html_options options=$exp_yr selected=$smarty.post.year_of_exp}	
										</select>
										<select name="month_of_exp" tabindex="9" class="inline_text span4">
										<option value="">Month</option>
										{html_options options=$exp_month selected=$smarty.post.month_of_exp}	
										</select>
										<label for="reg_city" generated="true" class="error">{$year_of_expErr}{$month_of_expErr}</label>																						
										</td>			
									</tr>	

									<tr class="tbl_row">
										<td width="120" class="tbl_column">Present Location <span class="f_req">*</span></td>
										<td>
								          <input type="text" tabindex="19" name="present_location" placeholder="" value="{$present_location}" class="span8">								
											<label for="reg_city" generated="true" class="error">{$present_locationErr}</label>
										</td>	
									</tr>
									<tr>
										<td width="120" class="tbl_column">Native Location </td>
										<td>
								        <input type="text" tabindex="7" name="native_location" placeholder="" value="" class="span8">								
										</td>	
									</tr>		
									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Family (Dependents) <span class="f_req"></span></td>										
										<td>
										<textarea name="family" id="family" cols="10" rows="3" class="span8"> </textarea>									
										</td>			
									</tr>	
									<tr>
										<td width="120" class="tbl_column"> Nationality   <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="7" name="nationality" id="nationality" value="{$nationality}" class="span8 ui-autocomplete-input" autocomplete="off">							
										<label for="reg_city" generated="true" class="error"> {$nationalityErr} </label>								
										</td>		
									</tr>
									
										<tr class="tbl_row">
										<td width="120" class="tbl_column"> Languages    <span class="f_req">*</span></td>
										<td>
 									<select name="language[]" multiple class="chosen-select" id="language">
									<option value="">Select</option>
									<option value="1" >English</option>
									<option value="2" >Hindi</option>
									<option value="3">Marathi</option>
									</select>                              
									<label for="reg_city" generated="true" class="error">{$languageErr} </label>								
										</td>		
									</tr>					
								</tbody>
							</table>
						</div>
							
						<div class="span6">		
							<table class="table table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
								<tr class="tbl_row">
										<td width="120" class="tbl_column"> Compensation <span class="f_req">*</span></td>
										<td>	
										
										<input type="text" value=""  name="ctc1_#index#"  id="ctc1#index#" placeholder="Present"  class="span2"/>										
										<select class="span3"   name="ctc_type_1#index#" id="ctc_type1#index#">
										<option >Select</option>
										<option value="1">Thousand</option>
										<option value="2">Lacs</option>
										<option value="3">Crore</option>
										</select> 
											
										<input type="text" name="ctc2_#index#"  id="ctc2#index#" placeholder="Expected" value="" class="span2"/>	
										<select  class="span3"  name="ctc_type_2#index#" id="ctc_type2#index#">
										<option >Select</option>
										<option value="1">Thousand</option>
										<option value="2">Lacs</option>
										<option value="3">Crore</option>
										</select>			<span class="f_req">*</span>	
										<label for="reg_city" generated="true" class="error">{$compensationErr} </label>	
										</td>	
									</tr>	
									<tr>
										<td width="125" class="tbl_column">Notice Period <span class="f_req">*</span></td>
										<td> 
<select name="" class="span8"  id="PositionEmpId">	
										<option >Select</option>									
										<option value="1">Immediate</option>
										<option value="2">15 days</option>
										<option value="3">30 Days</option>
										<option value="4">45 days</option>		
										<option value="3">2 Months</option>
										<option value="4">3 Months</option>	
										<option value="3">4 Months</option>
										<option value="4">5 Months</option>		
										<option value="4">6 Months</option>								
										</select>
										<label for="reg_city" generated="true" class="error">{$npErr}</label>																				
										</td>
									</tr>	
									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Gender <span class="f_req">*</span></td>
										<td> 
										<input type="radio" name="male" value="male"> Male
										<input type="radio" name="male" value="female"> Female
										<label for="reg_city" generated="true" class="error">{$genderErr} </label>																				
										</td>
									</tr>	
									 <tr>
										<td width="120" class="tbl_column">Marital Status <span class="f_req"></span></td>
										<td>
										<input type="radio" name="single" value="single"> Unmarried
                              <input type="radio" name="single" value="married" > Married
										</td>	
									</tr>						
									
									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Technical Expertise and Domain Expertise</td>
										<td> 
									   <textarea name="skills" id="skills" cols="10" rows="3" class="span8"> </textarea>									
										</td>
									</tr>	
									
									<tr>
										<td width="120" class="tbl_column">Skills </td>
										<td>
										<textarea name="skills" id="skills" cols="10" rows="3" class="span8"> </textarea>									
										</td>	
									</tr>									
									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Address <span class="f_req">*</span></td>
										<td>
										 <textarea name="skills" id="skills" cols="10" rows="3" class="span8"> </textarea>									
										<label for="reg_city" generated="true" class="error">{$addressErr}  </label>
										</td>	
									</tr>
									
									<tr>
										<td width="120" class="tbl_column">Hobbies </td>
										<td>
										<textarea name="skills" id="skills" cols="10" rows="3" class="span8"> </textarea>									
										<label for="reg_city" generated="true" class="error">{$hobbiesErr} </label>
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
										<select name="qualification_#index#" class="span8"  id="qualification#index#">	
										<option >Select</option>									
										<option value="1">UG</option>
										<option value="3">PG</option>
										<option value="4">ITI</option>									
										</select>
									<label for="reg_city" generated="true" class="error">{$qualificationErr} </label>
										</td>	
									</tr>
									
									<tr>
										<td width="120" class="tbl_column"> Specialization <span class="f_req">*</span></td>
										<td>
										<select name="specialization_#index#" class="span8"  id="specialization#index#">	
										<option >Select</option>									
										<option value="1">BUSINESS ADMINISTRATOR</option>									
										</select>
									<label for="reg_city" generated="true" class="error">{$specErr} </label>										
										</td>		
									</tr>
						         <tr class="tbl_row">
										<td width="120" class="tbl_column">University <span class="f_req"></span></td>
										<td>
										<input type="text" tabindex="7" name="university_#index#" id="university#index#" value="" class="span8">
									<label for="reg_city" generated="true" class="error">{$universityErr}</label>
										</td>	
									</tr>
	
										<tr>
										<td width="120" class="tbl_column">Location <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="7" name="location_#index#" id="location#index#" value="" class="span8">
									<label for="reg_city" generated="true" class="error">{$locationErr} </label> 
										</td>	
										</tr>	
									</tr>
								</tbody>
							</table>
						</div>
							<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Degree <span class="f_req">*</span></td>
										<td>
										<select name="degree_#index#" class="span8"  id="degree#index#">	
										<option >Select</option>									
										<option value="1">B.com</option>
									   <option value="2">BCA</option>		
									  <option value="3">B.TECH</option>																			
						
										</select>
									<label for="reg_city" generated="true" class="error">{$degreeErr}</label>
										</td>	
									</tr>
									
									<tr>
										<td width="120" class="tbl_column"> College <span class="f_req"></span></td>
										<td>
										<input type="text" tabindex="7" name="college_#index#" id="college#index#" value="" class="span8 ui-autocomplete-input" autocomplete="off">							
									<!--	<label for="reg_city" generated="true" class="error">Please enter the college </label>	-->									
										</td>		
									</tr>
									<tr class="tbl_row">
										<td width="120" class="tbl_column"> % of Marks  <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="7" name="per_ofmarks_#index#" id="per_ofmarks#index#" value="" class="span4 ui-autocomplete-input" autocomplete="off">			
								     <label for="reg_city" generated="true" class="error">{$percErr} </label>	
								      <select name="coursetype_#index#" class="span4"  id="coursetype#index#">	
										<option >Course Type</option>									
										<option value="1">Regular</option>
									   <option value="2">Part Time</option>		
									   <option value="3">Correspondence</option>																			
						
									  </select>
									  <label for="reg_city" generated="true" class="error">{$course_typeErr} </label>										
										</td>		
									</tr>
									
									<tr>
										<td width="120" class="tbl_column">From/To Year <span class="f_req">*</span></td>										
										<td><select name="from_to_year_#index#" id="from_to_year#index#" tabindex="18" class="span4">
										<option value="">From</option>
<option value="1">1990</option>
<option value="2">1991</option>
<option value="3">1992</option>
<option value="4">1993</option>
<option value="5">1994</option>
<option value="6">1995</option>
<option value="7">1996</option>
<option value="8">1997</option>
<option value="9">1998</option>
<option value="10">1999</option>
<option value="11">2000</option>
<option value="12">2001</option>
<option value="13">2002</option>
<option value="14">2003</option>
<option value="15">2004</option>
<option value="16">2005</option>
<option value="2">2006</option>
<option value="2">2007</option>
<option value="2">2008</option>
<option value="2">2009</option>
<option value="2">2010</option>
<option value="2">2011</option>
<option value="2">2001</option>
<option value="2">2012</option>
<option value="2">2013</option>
<option value="2">2014</option>
<option value="2">2015</option>
<option value="2">2016</option>
<option value="2">2017</option>
<option value="2">2018</option>
<option value="2">2019</option>
<option value="2">2020</option>

										</select>
										<select name="month_of_exp_#index#" id="month_of_exp#index#" tabindex="19" class="inline_text span4">
										<option value="">To</option>
<option value="2">1990</option>
<option value="3">1991</option>
<option value="2">1992</option>
<option value="3">1993</option>
<option value="2">1994</option>
<option value="3">1995</option>
<option value="2">1996</option>
<option value="3">1997</option>
<option value="2">1998</option>
<option value="3">1999</option>
<option value="2">2000</option>
<option value="2">2001</option>
<option value="2">2002</option>
<option value="2">2003</option>
<option value="2">2004</option>
<option value="2">2005</option>
<option value="2">2006</option>
<option value="2">2007</option>
<option value="2">2008</option>
<option value="2">2009</option>
<option value="2">2010</option>
<option value="2">2011</option>
<option value="2">2001</option>
<option value="2">2012</option>
<option value="2">2013</option>
<option value="2">2014</option>
<option value="2">2015</option>
<option value="2">2016</option>
<option value="2">2017</option>
<option value="2">2018</option>
<option value="2">2019</option>
<option value="2">2020</option>
										</select>
										<label for="reg_city" generated="true" class="error"> {$from_year}{$to_year} </label>																				
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
										<input type="text"  name="desig_#index#" value="" id="desig#index#"  class="span8" />
										<label for="reg_city" generated="true" class="error">{$designationErr}</label>										
										</td>
							</tr>
								<tr>
										<td width="120" class="tbl_column">Employment Period<span class="f_req">*</span></td>
										<td><select name="year_of_exp" id = "year_of_exp" tabindex="18" class="span4">
										<option value="">Year</option>
										<option value="1"="selected">1 Year</option>
<option value="2">2 Years</option>
<option value="3">3 Years</option>
<option value="4">4 Years</option>
<option value="5">5 Years</option>
<option value="6">6 Years</option>
<option value="7">7 Years</option>
<option value="8">8 Years</option>
<option value="9">9 Years</option>
<option value="10">10 Years</option>
<option value="11">11 Years</option>
<option value="12">12 Years</option>
<option value="13">13 Years</option>
<option value="14">14 Years</option>
<option value="15">15 Years</option>
<option value="16">16 Years</option>
<option value="17">17 Years</option>
<option value="18">18 Years</option>
<option value="19">19 Years</option>
<option value="20">20 Years</option>
<option value="21">21 Years</option>
<option value="22">22 Years</option>
<option value="23">23 Years</option>
<option value="24">24 Years</option>
<option value="25">25 Years</option>
<option value="26">26 Years</option>
<option value="27">27 Years</option>
<option value="28">28 Years</option>
<option value="29">29 Years</option>
<option value="30">30 Years</option>
<option value="31">31 Years</option>
<option value="32">32 Years</option>
<option value="33">33 Years</option>
<option value="34">34 Years</option>
<option value="35">35 Years</option>
<option value="36">36 Years</option>
<option value="37">37 Years</option>
<option value="38">38 Years</option>
<option value="39">39 Years</option>
<option value="40">40 Years</option>
<option value="41">41 Years</option>
<option value="42">42 Years</option>
<option value="43">43 Years</option>
<option value="44">44 Years</option>
<option value="45">45 Years</option>
<option value="46">46 Years</option>
<option value="47">47 Years</option>
<option value="48">48 Years</option>
<option value="49">49 Years</option>
<option value="50">50 Years</option>

										</select>
										<select name="month_of_exp" id = "month_of_exp" tabindex="19" class="inline_text span4">
										<option value="">Month</option>
										<option value="1">1 Month</option>
<option value="2">2 Months</option>
<option value="3">3 Months</option>
<option value="4">4 Months</option>
<option value="5">5 Months</option>
<option value="7">6 Months</option>
<option value="8">7 Months</option>
<option value="9">8 Months</option>
<option value="10">9 Months</option>
<option value="11">10 Months</option>
<option value="10">11 Months</option>
<option value="11">12 Months</option>

										</select>
										<!--label for="reg_city" generated="true" class="error">Please select the created by  </label-->																						
										</td>
							</tr>
							<tr class="tbl_row">
										<td width="120" class="tbl_column">Current location of work <span class="f_req">*</span></td>
										<td> 
										<input type="text"  name="loc_#index#" id="loc#index#" value="" class="span8" />										
										<!--label for="reg_city" generated="true" class="error">Please enter the current location of work </label-->										
										</td>
										
							</tr>
							<tr>
										<td width="120" class="tbl_column">Area of Specialization/Expertise  <span class="f_req">*</span></td>
										<td> 
										<input type="text" value=""  name="area_#index#" id="area#index#"  class="span8" />
										<!--label for="reg_city" generated="true" class="error">Please enter the area of specialization/expertise  </label-->										
										</td>
							</tr>
								<tr class="tbl_row">
										<td width="120" class="tbl_column">Company Name <span class="f_req">*</span></td>
										<td> 
										<input type="text"  name="company_#index#" value="" id="company#index#"  class="span8" />
										<!--label for="reg_city" generated="true" class="error">Please enter the company name  </label-->										
										</td>
							</tr>	
							<tr>
								<td width="120" class="tbl_column">Company Profile <span class="f_req">*</span></td>
								<td>
								<textarea name="company_profile_#index#" id="company_profile#index#" cols="10" rows="3" class="span8"> </textarea>									
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
										<textarea   placeholder="" name="vital_#index#" tabindex="8" id="vital#index#" cols="10" rows="3" class="span8"></textarea>
										</td>
							</tr>
							<tr>
										<td width="120" class="tbl_column">Key Responsibility <span class="f_req">*</span></td>
										<td>
										<textarea name="key_responsibility_#index#" id="key_responsibility#index#" cols="10" rows="3" class="span8"> </textarea>									
									<!--	<label for="reg_city" generated="true" class="error">Please enter the key responsibility </label> -->
										</td>	
									</tr>
									
									<tr class="tbl_row">
								<td width="120" class="tbl_column">Key Achievement <span class="f_req">*</span></td>
								<td>
								<textarea name="key_achievement_#index#" id="key_achievement#index#" cols="10" rows="3" class="span8"> </textarea>									
								</td>	
							</tr>	
								   <tr>
										<td width="120" class="tbl_column"> Reporting To  <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="7" name="reporting_to_#index#" id="reporting_to#index#" value="" class="span8 ui-autocomplete-input" autocomplete="off">							
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
<select name="year_#index#" class="span8"  id="year#index#">	
										<option >Year</option>									
										<option value="2">1990</option>
<option value="3">1991</option>
<option value="2">1992</option>
<option value="3">1993</option>
<option value="2">1994</option>
<option value="3">1995</option>
<option value="2">1996</option>
<option value="3">1997</option>
<option value="2">1998</option>
<option value="3">1999</option>
<option value="2">2000</option>
<option value="2">2001</option>
<option value="2">2002</option>
<option value="2">2003</option>
<option value="2">2004</option>
<option value="2">2005</option>
<option value="2">2006</option>
<option value="2">2007</option>
<option value="2">2008</option>
<option value="2">2009</option>
<option value="2">2010</option>
<option value="2">2011</option>
<option value="2">2001</option>
<option value="2">2012</option>
<option value="2">2013</option>
<option value="2">2014</option>
<option value="2">2015</option>
<option value="2">2016</option>
<option value="2">2017</option>
<option value="2">2018</option>
<option value="2">2019</option>
<option value="2">2020</option>																	
						
										</select>
									<!--	<label for="reg_city" generated="true" class="error">Please select the year </label> -->
										</td>	
									</tr>
									
									<tr>
										<td width="120" class="tbl_column"> Description  <span class="f_req">*</span></td>
										<td>
										<textarea name="description_#index#" id="description#index#" cols="10" rows="3" class="span8"> </textarea>									
									<!--	<label for="reg_city" generated="true" class="error">Please enter the description   </label>		-->								
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
										<input type="text" tabindex="7" name="programtitle_#index#" id="programtitle#index#" value="" class="span8">
									<!--	<label for="reg_city" generated="true" class="error">Please enter the program title </label> -->
										</td>	
									</tr>
									
									<tr>
										<td width="120" class="tbl_column"> Location <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="7" name="location_#index#" id="location#index#" value="" class="span8 ui-autocomplete-input" autocomplete="off">							
									<!--	<label for="reg_city" generated="true" class="error">Please enter the location </label>	-->									
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
						
					
					<div class="tab-pane" id="mbox_Consultant">
<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>						
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Personality <span class="f_req">*</span></td>
										<td>
<textarea placeholder="" name="consultant_#index#" tabindex="8" id="consultant#index#" cols="10" rows="3" class="span8"></textarea>
										<label for="reg_city" generated="true" class="error">Please enter the personality   </label>
										</td>	
									</tr>	
									<tr class="">
										<td width="120" class="tbl_column">Interview Availability <span class="f_req">*</span></td>
										<td>
<textarea placeholder="" name="interview_availability_#index#" tabindex="8" id="interview_availability#index#" cols="10" rows="3" class="span8"></textarea>
										</td>	
									</tr>		
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Achievements  </td>
										<td> 
									   <textarea name="skills" id="skills" cols="10" rows="3" class="span8"> </textarea>									
										<!--label for="reg_city" generated="true" class="error">Please enter the ctc offered </label-->																				
										</td>
									</tr>	
									</tbody>
							</table>
						</div>
									<div class="span6">	
									<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>	
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Know-How about Company  </td>
										<td> 
									   <textarea name="skills" id="skills" cols="10" rows="3" class="span8"> </textarea>									
										<!--label for="reg_city" generated="true" class="error">Please enter the designation </label-->																				
										</td>
									</tr>		
									<tr>
										<td width="120" class="tbl_column">Candidate Brief </td>
										<td> 
									   <textarea name="skills" id="skills" cols="10" rows="3" class="span8"> </textarea>									
										<!--label for="reg_city" generated="true" class="error">Please enter the designation </label-->																				
										</td>
									</tr>										
									</tbody>
							</table>
						</div>

</div>
				
							</div>
							</div>
					</div>
</div>
                    </div>
					</div>
					 <div class="form-actions">
									<button class="btn btn-gebo" type="submit">Submit</button>
								<a href="resume.php"><button type="button" class="btn">Cancel</button></a>
							</div>
					</form>
         	
				

                </div>
            </div> 
		</div>
		</div>
		</div>
		</div>
	</div>
			
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
		   iniFormsCount: 1,
		   removeLastConfirmation: true,
		   removeCurrentConfirmation: true,
		   removeLastConfirmationMsg: 'Are you sure?',
		   removeCurrentConfirmationMsg: 'Are you sure?',
		   continuousIndex: true
	   });	   
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
		   iniFormsCount: 1,
		   removeLastConfirmation: true,
		   removeCurrentConfirmation: true,
		   removeLastConfirmationMsg: 'Are you sure?',
		   removeCurrentConfirmationMsg: 'Are you sure?',
		   continuousIndex: true
	   });	   
	}
	if($('#sheepItForm2').length > 0){ 
	var sheepAdd = $('#sheepItForm2').sheepIt({
		   separator: '',
		   allowRemoveLast: true,
		   allowRemoveCurrent: true,
		   allowRemoveAll: true,
		   allowAdd: true,
		   allowAddN: true,
		   maxFormsCount: 10,
		   minFormsCount: 1,
		   iniFormsCount: 1,
		   removeLastConfirmation: true,
		   removeCurrentConfirmation: true,
		   removeLastConfirmationMsg: 'Are you sure?',
		   removeCurrentConfirmationMsg: 'Are you sure?',
		   continuousIndex: true
	   });	   
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
		   iniFormsCount: 1,
		   removeLastConfirmation: true,
		   removeCurrentConfirmation: true,
		   removeLastConfirmationMsg: 'Are you sure?',
		   removeCurrentConfirmationMsg: 'Are you sure?',
		   continuousIndex: true
	   });	   
	}
});
</script>	
{/literal}	