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
                                    <a href="recruiter_dashboard.php"><i class="icon-home"></i></a>
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
				
<form action="resume.php" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="row-fluid">
		<div class="span12">
								<div class="mbox">
									<div class="tabbable">
										<div class="heading">
										<ul class="nav nav-tabs">
										<li class="active"><a class="restabChange" rel="position"  href="#mbox_Personal" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Personal </a></li>
										<li class=""><a class="restabChange" rel="interview"  href="#mbox_Education" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Education </a></li>
										<li class=""><a class="restabChange" rel="interview"  href="#mbox_Experience" data-toggle="tab"><i class="splashy-mail_light_down"></i> Experience </a></li>
										<li class=""><a class="restabChange" rel="interview"  href="#mbox_Consultant" data-toggle="tab"><i class="splashy-mail_light_down"></i> Consultant Assessment </a></li>
									</ul>
										</div>
<div class="tab-content" style="overflow:visible">
<div class="tab-pane active" id="mbox_Personal">
<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Candidate Name <span class="f_req">*</span></td>
										<td>
								        <input type="text" tabindex="7" name="first_name" placeholder="First Name" value="{$first_name}" class="span4">
								        <input type="text" tabindex="7" name="last_name" placeholder="Last Name" value="{$last_name}" class="inline_text span4">
								
										<label for="reg_city" generated="true" class="error">{$first_nameErr}{$last_nameErr}</label>
										</td>	
									</tr>
									<tr>
										<td width="120" class="tbl_column">Email <span class="f_req">*</span></td>
										<td>	
										<input type="text" tabindex="7" id="email" name="email" value="{$email}" class="span8">
										<label for="reg_city" generated="true" class="error">{$emailErr}</label>																						
										</td>	
									</tr>	
                                    <tr class="tbl_row">
										<td width="120" class="tbl_column"> Mobile <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="7" name="mobile" id="keyword" value="{$mobile}" autocomplete="off">							
									<label for="reg_city" generated="true" class="error">{$mobileErr} </label>							
										</td>		
									</tr>									
									<tr>
										<td width="120" class="tbl_column">DOB <span class="f_req">*</span></td>
										<td> 
										<input name="dob" tabindex="4" value="{$dob}"  class="datepick span8" placeholder="" type="text" id="HrEmployeeDob">										
										<label for="reg_city" generated="true" class="error">{$dobErr}</label>																					
										</td>
									</tr>	

										<tr class="tbl_row">
										<td width="120" class="tbl_column">Position For <span class="f_req">*</span></td>
										<td> 
										<input name="position_for" tabindex="4" value="{$position_for}"  class="span8" placeholder="" type="text" id="HrEmployeeDob">										
										<label for="reg_city" generated="true" class="error">{$position_forErr}</label>																					
										</td>
									</tr>	
									<tr>
										<td width="120" class="tbl_column">Current Designation<span class="f_req">*</span></td>
										<td>										
										<input type="text" tabindex="7" name="position" id="keyword" value="{$position}" class="span8" >
										<label for="reg_city" generated="true" class="error">{$positionErr}</label>									
										</td>	
									</tr>	
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Total Years of Exp<span class="f_req">*</span></td>
										<td><select name="year_of_exp" id = "year_of_exp" tabindex="18" class="span4">
										<option value="">Year</option>
										{html_options options=$exp_yr selected=$smarty.post.year_of_exp}	
										</select>
										<select name="month_of_exp" id = "month_of_exp" tabindex="19" class="inline_text span4">
										<option value="">Month</option>
										{html_options options=$exp_month selected=$smarty.post.month_of_exp}	
										</select>
										<!--label for="reg_city" generated="true" class="error">Please select the created by  </label-->																						
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
										
										<input type="text"  name="ctc1_#index#"  id="ctc1#index#" placeholder="Present"  class="span2"/>										
										<select class="span3"   name="ctc_type_1#index#" id="ctc_type1#index#">
										{html_options options=$ctc_type selected=$smarty.post.ctc1}
										</select> 
											
										<input type="text" name="ctc2_#index#"  id="ctc2#index#" placeholder="Expected"  class="span2"/>	
										<select  class="span3"  name="ctc_type_2#index#" id="ctc_type2#index#">
										{html_options options=$ctc_type selected=$smarty.post.ctc2}
										</select>			<span class="f_req">*</span>		
									<!--	<label for="reg_city" generated="true" class="error">Please enter the current ctc  and expected ctc</label>	-->	
												
										</td>
										</tr>
									<tr>
										<td width="125" class="tbl_column">Notice Period <span class="f_req">*</span></td>
										<td> 
										<select name="notice_period" class="span8"  id="PositionEmpId">	
										<option >Select</option>									
										{html_options options=$n_p selected=$smarty.post.notice_period}							
										</select>
									<!--	<label for="reg_city" generated="true" class="error">Please enter the billing amount </label>	-->																			
										</td>
									</tr>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Gender <span class="f_req">*</span></td>
										<td> 
										<input type="radio" tabindex="2" name="gender"{if $gender && $gender == 'M'}{'checked'}{/if} value="M"> Male
             						<input type="radio" tabindex="3" name="gender"{if $gender && $gender == 'F'}{'checked'} {/if} value="F"> Female
										<!--label for="reg_city" generated="true" class="error">Please enter the gender </label-->																				
										</td>
									</tr>	
									 <tr>
										<td width="120" class="tbl_column">Marital Status <span class="f_req"></span></td>
										<td>
										<input type="radio" tabindex="5" name="marital_status"{if $marital_status && $marital_status == 1}{'checked'}{/if} value="1"> Single
             						<input type="radio" tabindex="6" name="marital_status"{if $marital_status && $marital_status == 2}{'checked'} {/if} value="2"> Married
									<!--	<label for="reg_city" generated="true" class="error">Please select the marital status </label> -->
										</td>	
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Family (Dependents) <span class="f_req"></span></td>										
										<td>
										<textarea name="family" id="family" cols="10" rows="3" class="span8"></textarea>									
										</td>			
									</tr>	
									<tr>
										<td width="120" class="tbl_column">Present Location <span class="f_req">*</span> </td>
										<td>
								        <input type="text" tabindex="7" name="present_location" placeholder="" value="{$present_location}" class="span8">								
										<!--<label for="reg_city" generated="true" class="error">Please enter the candidate name  </label>-->
										</td>	
									</tr>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Native Location </td>
										<td>
								        <input type="text" tabindex="7" name="native_location" placeholder="" value="Solapur" class="span8">								
										<!--<label for="reg_city" generated="true" class="error">Please enter the candidate name  </label>-->
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
			<select name="" class="span8"  id="PositionEmpId">	
										<option >Select</option>									
										<option value="1">ITI</option>
										<option value="2" Selected>UG</option>
										<option value="3">PG</option>
										<option value="4">PHD</option>									
										</select>
										
			<!--label for="reg_city" generated="true" class="error">Please select the qualification </label-->
			</td>			
			</tr>
							<tr>
										<td width="120" class="tbl_column">Specialization <span class="f_req">*</span></td>
										<td> 
										<select name="" class="span8"  id="PositionEmpId">	
										<option >Select</option>								
										<option value="1" Selected>Computer Application</option>
										<option value="2">Business Administration</option>								
										</select>
										<!--label for="reg_city" generated="true" class="error">Please enter the specialization </label-->										
										</td>
							</tr>
							<tr class="tbl_row">
										<td width="120" class="tbl_column">College <span class="f_req"></span></td>
										<td> 
										<input type="text" tabindex="7" name="college" id="keyword" value="Trident Academy Of Technology" class="span8" >										
										<!--label for="reg_city" generated="true" class="error">Please enter the college </label-->										
										</td>
							</tr>
							<tr>
										<td width="120" class="tbl_column">Degree <span class="f_req">*</span></td>
										<td> 
										<select name="" class="span8"  id="PositionEmpId">										
										<option value="1">Select</option>
										<option value="2" Selected>BCA</option>
										<option value="3">BBA</option>
										<option value="4">BTECH</option>									
										</select>
										<!--label for="reg_city" generated="true" class="error">Please enter the degree  </label-->										
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
										<input type="text" tabindex="7" name="grade" id="keyword"  value="71%" class="span4" >
										<select name="" class="inline_text span4"  id="PositionEmpId">
										<option>Select</option>
										<option value="1" Selected>Regular</option>
										<option value="2" >Correspondence</option> 
										</select>
										</td>
							</tr>
	                  <tr>
										<td width="120" class="tbl_column">University <span class="f_req"></span></td>
										<td> 
										<input type="text" tabindex="7" name="university" id="keyword" value="BPUT" class="span8" >										
										</td>
							</tr>
							<tr  class="tbl_row">
							<td width="120" class="tbl_column">Year of Passing <span class="f_req">*</span></td>										
										<td><select name="from_to_year_#index#" id="from_to_year#index#" tabindex="18" class="span8">
										<option value="">Year</option>
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
<option value="2" selected = "selected">2014</option>
<option value="2">2015</option>
<option value="2">2016</option>
<option value="2">2017</option>
<option value="2">2018</option>
<option value="2">2019</option>
<option value="2">2020</option>

										</select>
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
										<input type="text"  name="desig_#index#" value="Software Developer" id="desig#index#"  class="span8" />
										<!--label for="reg_city" generated="true" class="error">Please enter the designation </label-->										
										</td>
							</tr>
								<tr>
										<td width="120" class="tbl_column">Employment Period<span class="f_req">*</span></td>
										<td><select name="year_of_exp" id = "year_of_exp" tabindex="18" class="span4">
										<option value="">Year</option>
										<option value="1" selected="selected">1 Year</option>
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
										<input type="text"  name="loc_#index#" id="loc#index#" value="Bangalore" class="span8" />										
										<!--label for="reg_city" generated="true" class="error">Please enter the current location of work </label-->										
										</td>
										
							</tr>
							<!-- <tr>
										<td width="120" class="tbl_column">Area of Specialization/Expertise  <span class="f_req">*</span></td>
										<td> 
										<input type="text" value="PHP"  name="areaa_#index#" id="areaa#index#"  class="span8" />
										</td>
							       </tr> -->
							<tr>
										<td width="120" class="tbl_column">Area of Specialization/Expertise  <span class="f_req">*</span></td>
											<td> 
										<input type="text" value="PHP, JAVA, .Net, Salesforce, Angular JS, Selenium"  name="area_#index#" id="area#index#"  class="span8" />
										<!--label for="reg_city" generated="true" class="error">Please enter the area of specialization/expertise  </label-->										
										</td>
							</tr>
							
									<!--<tr class="tbl_row">
										<td width="120" class="tbl_column">CTC <span class="f_req">*</span></td>
										<td>	
										
										<input type="text" value="5.6"  name="ctc1_#index#"  id="ctc1#index#" placeholder="Cur. CTC"  class="span2"/>										
										<select class="span2"   name="ctc_type_1#index#" id="ctc_type1#index#">
										<option >Select</option>
										<option value="1">Thousand</option>
										<option value="2" Selected>Lacs</option>
										<option value="3">Crore</option>
										</select> 
											
										<input type="text" name="ctc2_#index#"  id="ctc2#index#" placeholder="exp. CTC" value="8.6" class="span2"/>	
										<select  class="span2"  name="ctc_type_2#index#" id="ctc_type2#index#">
										<option >Select</option>
										<option value="1">Thousand</option>
										<option value="2" Selected>Lacs</option>
										<option value="3">Crore</option>
										</select>			<span class="f_req">*</span>		
										<label for="reg_city" generated="true" class="error">Please enter the current ctc  and expected ctc</label>		
												
										</td>												
									</tr> -->
												
			</tbody>
		</table>				
		</div>
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
					<tbody>
							<tr class="tbl_row">
										<td width="120" class="tbl_column">Company Name <span class="f_req">*</span></td>
										<td> 
										<input type="text"  name="company_#index#" value="Bigspire Software Pvt Ltd" id="company#index#"  class="span8" />
										<!--label for="reg_city" generated="true" class="error">Please enter the company name  </label-->										
										</td>
							</tr>			
							

					     	<!--<tr>
										<td width="125" class="tbl_column">Notice Period <span class="f_req">*</span></td>
										<td> 
										<select name="" class="span8"  id="PositionEmpId">	
										<option >Select</option>									
										<option value="1">Immediate</option>
										<option value="2" Selected>15 days</option>
										<option value="3">30 Days</option>
										<option value="4">45 days</option>		
										<option value="3">2 Months</option>
										<option value="4">3 Months</option>	
										<option value="3">4 Months</option>
										<option value="4">5 Months</option>		
										<option value="4">6 Months</option>								
										</select>
										<label for="reg_city" generated="true" class="error">Please enter the billing amount </label>																				
										</td>
							</tr> -->
							<tr>
										<td width="120" class="tbl_column">Location<span class="f_req">*</span></td>
										<td> 
										<input type="text"  name="company_#index#" value="Bangalore" id="company#index#"  class="span8" />
										<!--label for="reg_city" generated="true" class="error">Please enter the company name  </label-->										
										</td>
							</tr>			
								<tr class="tbl_row">
										<td width="120" class="tbl_column">Other Vital Information (Position Specific)  <span class="f_req"></span></td>
										<td> 
										<textarea   placeholder="" name="vital_#index#" tabindex="8" id="vital#index#" cols="10" rows="3" class="span8"></textarea>
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
<!--<div class="tab-pane active" id="mbox_consultant">
<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Consultant Assessment <span class="f_req">*</span></td>
										<td>
<textarea placeholder="" name="consultant_#index#" tabindex="8" id="consultant#index#" cols="10" rows="3" class="span10"></textarea>
										<label for="reg_city" generated="true" class="error">Please enter the consultant assessment   </label>
										</td>	
									</tr>																					
								</tbody>
							</table>
						</div>	
						<div class="span6"></div>					
</div>-->
<div class="tab-pane" id="mbox_Consultant">
<div class="span12">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Consultant Assessment <span class="f_req"></span></td>
										<td>
<textarea placeholder="" name="consultant_#index#" tabindex="8" id="consultant#index#" cols="10" rows="3" class="span10"></textarea>
										<label for="reg_city" generated="true" class="error">Please enter the consultant assessment   </label>
										</td>	
									</tr>	
									<tr class="">
										<td width="120" class="tbl_column">Interview Availability <span class="f_req">*</span></td>
										<td>
<textarea placeholder="" name="interview_availability_#index#" tabindex="8" id="interview_availability#index#" cols="10" rows="3" class="span10"></textarea>
										</td>	
									</tr>													
								</tbody>
							</table>
						</div>

</div>
</div>
</div>
<div class="form-actions">
									<button class="btn btn-gebo" type="submit">Submit</button>
								<!-- <a href="resume.php"><button type="button" class="btn">Cancel</button></a> -->
								 <input type="button" value="Cancel" class="btn" onclick="window.location='resume.php'">
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
});
</script>	
{/literal}	