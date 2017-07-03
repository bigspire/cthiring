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
                                   <?php echo $position_data['Position']['job_title'];?>
                                </li>
                            </ul>
                        </div>
                    </nav>
					
					<div class="srch_buttons">
							<a rel="tooltip" title="Edit the Position Info." href="<?php echo $this->webroot;?>position/edit/<?php echo $this->request->params['pass'][0];?>" class="sepV_a" title="Edit Position">
					<input value="Edit" type="button" class="btn btn-info"></a>
					<!--<a href="#"  class="sepV_a" title="Delete Position">
					<input value="Delete" type="button" class="btn btn-danger"/></a>-->
					
					<?php if($create_resume == '1'):?>
					<a rel="tooltip"  title="Upload New Resume" href="<?php echo $this->webroot;?>hiring/upload_resume.php" 
					 val="40_50"  class="iframeBox sepV_a cboxElement">
					<input value="Upload Resume" type="button" class="btn btn-warning"></a>					
						<?php endif; ?>

						</div>
							
							
							
						<?php echo $this->Session->flash();?>
							
							
								<div class="row-fluid">
							<div class="span12">
							<div class="mbox">
							<div class="tabbable">
							<div class="heading">
										<ul class="nav nav-tabs">
										<li class="active"><a class="restabChange" rel="position"  href="#mbox_basic" data-toggle="tab"><i class="splashy-document_a4_edit"></i>  Basic </a></li>
										<li class=""><a class="restabChange" rel="interview"  href="#mbox_description" data-toggle="tab"><i class="splashy-document_a4_add"></i>  Job Description </a></li>
										<!--li class=""><a class="restabChange" rel="interview"  href="#mbox_co-ordination" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Co-ordination </a></li-->
									</ul>
										
								</div>
							
							
							<div class="tab-content"  style="overflow:auto;max-height:300px;">
										<div class="tab-pane active" id="mbox_basic">
										<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0">
								<tbody>
									<tr>
										
										<td width="120" class="tbl_column">Client Name</td>
										<td><?php echo $position_data['Client']['client_name'];?></td>
											
									</tr>
									<tr>
										
										<td width="120" class="tbl_column">SPOC Name</td>
										<td><?php echo $position_data['Contact']['first_name'];?>, 
										<?php echo $position_data['Contact']['email'];?>. 
										<?php											
											echo $position_data['Contact']['phone'];?>
										<?php 
											if(str_replace(' ', '', $position_data['Contact']['mobile']) != '' && str_replace(' ', '', $position_data['Contact']['phone']) != ''):
											echo ', ';
											endif;
										?>
										<?php echo $position_data['Contact']['mobile'];?>
										
										</td>
											
									</tr>
									<tr>
										
										<td width="120" class="tbl_column">Job Title</td>
										<td><?php echo $position_data['Position']['job_title'];?></td>
											
									</tr>
									<tr>
										
										<td width="120" class="tbl_column">Job Location </td>
										<td><?php echo $position_data['Position']['location'];?></td>
											
									</tr>
									<tr>
										
										<td width="120" class="tbl_column">Experience</td>
										<td><?php echo $position_data['Position']['min_exp'].' - '.$position_data['Position']['max_exp'];?> Years</td>
											
									</tr>
										<tr>
										
										<td class="tbl_column">CTC</td>
										<td><?php echo $position_data['Position']['ctc_from'].' - '.$position_data['Position']['ctc_to'];?> Lacs</td>
											
									</tr>
									<tr>
										
										<td class="tbl_column">Qualification </td>
										<td><?php echo $position_data['Position']['education'];?></td>
											
									</tr>	
									
									<tr>
										
										<td class="tbl_column">Created On</td>
										<td><?php echo $this->Functions->format_date($position_data['Position']['created_date']);?></td>
											
									</tr>
									
									
<tr>
										
										<td class="tbl_column">Created By</td>
										<td><?php echo $position_data['Creator']['first_name'];?></td>
											
									</tr>
								
																	
								</tbody>
							</table>
							</div>
							
								<div class="span6">
							<table class="table  table-striped  table-bordered dataTable" style="margin-bottom:0">
								<tbody>									
									<tr>
										
										<td class="tbl_column">Account Holder </td>
										<td><?php echo $position_data[0]['ac_holder'];?></td>
											
									</tr>
									
									<tr>
										
										<td class="tbl_column" style="width:140px;">Key Skills</td>
										<td><?php echo $position_data['Position']['skills'];?></td>
											
									</tr>
									<tr>
										
										<td class="tbl_column">No. of Openings</td>
										<td><?php echo $position_data['Position']['no_job'];?></td>
											
									</tr>
									
										<tr>
										
										<td class="tbl_column">Team Members</td>
										<td><?php echo $position_data[0]['team_member2'];?></td>
											
									</tr>
									<tr>
										
										<td class="tbl_column">Start Date</td>
										<td><?php echo $this->Functions->format_date($position_data['Position']['start_date']);?></td>
											
									</tr>
										<tr>
										
										<td class="tbl_column">Closure Date</td>
										<td><?php echo $this->Functions->format_date($position_data['Position']['end_date']);?></td>
											
									</tr>
									<tr>
										
										<td class="tbl_column">Functional Area</td>
										<td><?php echo $position_data['FunctionArea']['function'];?></td>
											
									</tr>
									
										<tr>
										
										<td class="tbl_column">Modified On</td>
										<td><?php echo $this->Functions->format_date($position_data['Position']['created_date']);?></td>
											
									</tr>
									
									
								</tbody>
							</table>
							</div>
							</div>
									
						<div class="tab-pane" id="mbox_description">
										
						<div class="span12">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0">
								<tbody>
									<tr>
										<td  class="tbl_column"width="120">Job Description</td>
										<td>
									<?php echo $position_data['Position']['job_desc'];?>	
										

			<br></td>
									</tr>
									<tr>
								<td width="120" class="tbl_column">Attachment </td>
									<td>
										<a class="notify" data-notify-time = '7000' data-notify-title="In Progress!"
										data-notify-message="Downloading JD... Please wait..."   
										href="<?php echo $this->webroot;?>hc/download/<?php echo $position_data['Position']['id']; ?>/jd/">
										Download</a>
									</td>
								</tr>
								</tbody>
							</table>
							</div>
							</div>
										
                  <!--div class="tab-pane" id="mbox_co-ordination">
										
						<div class="span12">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0">
								
								<tbody>
								   <tr>
										
										<td  class="tbl_column"width="120">Profile Sourcing </td>
										<td>Bhargavi</td>
											
									</tr>
									<tr>
										
										<td  class="tbl_column"width="120">Client Coordination</td>
										<td>Bhargavi</td>
											
									</tr>
									<tr>
										
										<td  class="tbl_column"width="120">Candidate Coordination </td>
										<td>Lavanya Venkateshappa</td>
											
									</tr>
								</tbody>
							</table>
							</div>
							</div-->
                      </div>
					  
					  
                      </div>  
					</div>
					
					
					
					
				
					
					
					
					</div></div>
	
							
							
					
				
							<br>	
							<div class="dn dataTables_filter srchBox"  id="dt_gal_filter">
							
					<label style="">Keyword: <input type="text" placeholder="Candidate / Employer" name="data[Resume][keyword]" id = "SearchText" value="" class="input-medium" aria-controls="dt_gal"></label>

													<label>From Date: <input type="text" class="input-small datepick" name="data[Resume][from]" placeholder="dd/mm/yyyy" style="width:70px;"  value="" aria-controls="dt_gal"></label>

							<label>To Date: <input type="text" name="data[Resume][to]" placeholder="dd/mm/yyyy" value="" style="width:70px;"  class="input-small datepick" aria-controls="dt_gal"></label>

							
							
<label>Current Status: 
						<select name="data[Resume][status]" class="input-small" placeholder="" style="clear:left" id="ResumeStatus">
<option value="">Select</option>
<option value="1">CV Sent</option>
<option value="2">Shortlisted</option>
<option value="3">CV Rejected</option>
<option value="4">Feedback Awaited</option>
<option value="5">Candidates Interviewed</option>
<option value="6">Interview Dropouts</option>
<option value="7">Interview Rejected</option>
<option value="8">Candidates Offered</option>
<option value="9">Offer Dropouts</option>
<option value="10">Candidates Joined</option>
<option value="11">Candidates Billed</option>
</select> 

															
													
							</label>
							
							
							
							<label>Experience:
<select name="data[Resume][min_exp]" class="input-small minDrop minexp" rel="max-exp" id="min-exp" placeholder="" style="clear:left">
<option value="">Min</option>
<option value="1">1 Year</option>
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
			</label>
			<label>Employee: 
						<select name="data[Resume][emp_id]" class="input-small" placeholder="" style="clear:left" id="ResumeEmpId">
<option value="">Select</option>
<option value="4">Admin</option>
<option value="66">Bhargavi</option>
<option value="74">Karthick Kumar</option>
<option value="75">Karthik</option>
<option value="37">Karthikeyan S</option>
<option value="84">Kishore Kumar</option>
<option value="89">Kumari</option>
<option value="45">Lavanya Venkateshappa</option>
<option value="92">Magimai Tamil Azhagan</option>
<option value="54">Mary Paulina</option>
<option value="86">Mohammed Aslam</option>
<option value="79">Mohan Reddy</option>
<option value="76">Nandhakumar</option>
<option value="29">Praveena</option>
<option value="80">Prerna Khanudi</option>
<option value="58">Priyanka</option>
<option value="33">Rajalakshmi S</option>
<option value="38">Ranjeet Rajpurohit</option>
<option value="69">Reshu</option>
<option value="35">Suganya</option>
<option value="81">Suganya Pillai</option>
<option value="90">Sumir</option>
<option value="93">Sumitha</option>
<option value="73">Vandana</option>
</select> 

</label>											
<label>Branch: 
							<select name="data[Resume][loc]" class="input-small" placeholder="" style="clear:left" id="ResumeLoc">
<option value="">Select</option>
<option value="104">Ahmadabad</option>
<option value="102">Bangalore</option>
<option value="103">Chennai</option>
<option value="105">Hyderabad</option>
</select> 

							</label>						
						
															
													
				
					
				<label style="margin-top:18px;">
							<a class="jsRedirect" href="#"><input value="Reset" type="button" class="btn"/></a></label>
							<label style="margin-top:18px;">
							<input type="submit" value="Submit" class="btn btn-gebo" /></label>
						

														</div>
			
			<!--a href="#"  class="sepV_a" title="Call For Interview">
			<input value="Call For Interview" type="button" class="btn btn-gebo"/></a-->
		

		</div>
					
					
					
					  <div class="row-fluid">
						<div class="span12">
							<div class="mbox">
								<div class="tabbable">
									<div class="heading">
										<ul class="nav nav-tabs">
										<?php $total = count($resume_data);?>
											<li class="active"><a href="#mbox_inbox" class="tabChange" val="<?php echo $total;?>" rel="all"  data-toggle="tab"><i class="splashy-mail_light_down"></i>  CV Sent <?php if($total):?><span class="label label-success"> <?php echo $total;?></span><?php endif; ?></a></li>
									
											<li class=""><a href="#mbox_inbox" class="tabChange"  rel="other_cv"  data-toggle="tab"><i class="splashy-mail_light_down"></i>  CV Status</a></li>

										
										</ul>
									</div>
									<div class="">
										<div class="tab-pane active" id="mbox_inbox">											
											
											<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR cvTable" id="dt_inbox">
												<thead>
													<tr class="cv_row">
														<th width="120">Candidate Name</th>
														<th  width="100">Mobile</th>
														<th  width="120">Email</th>
														<!--th  width="100">Present Company</th>
														<th  width="120">Present Designation</th-->
														<th  width="100">Present Location</th>
														<th  width="80">Present CTC</th>
														<th  width="80">Expected CTC</th>
														<th  width="80">Current Status</th>
														<th  width="90" class="dn reasonCol">Reason</th>
														<th  width="90"  class="noticePeriod">Notice Period</th>
														<th  width="90" class="">CV Owner</th>
														<th  width="110" class="">CV Sent</th>
														<th  width="90" class="dn joinCol">Offered On</th>
														<th  width="90" class="dn offerCol">Offered On</th>
														<th  width="90" class="dn joinCol">Joined On</th>
														<!--th  width="110" class="">Modified</th-->
														<th width="150">Action</th>
													</tr>
													
														<tr class="dn status_row">
														<th >Candidate Name</th>
														<th >&nbsp;</th>
														<th>&nbsp;</th>
														<th >&nbsp;</th>
														<th >&nbsp;</th>
														<th>&nbsp;</th>
														<th >&nbsp;</th>
														<th>&nbsp;</th>
														<th >&nbsp;</th>
													
													</tr>
													
												</thead>
												<tbody>
													
												
													 
													<?php foreach($resume_data as $resume):	?>
													<tr class="cv_row">
														<td>														
														<a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $resume['Resume']['id'];?>/"><?php echo ucwords($resume['Resume']['first_name'].' '.$resume['Resume']['last_name']);?></a></td>
														<td><span><?php echo $this->Functions->get_format_text($resume['Resume']['mobile']);?></span></td>
														<td><?php echo $this->Functions->get_format_text($resume['Resume']['email_id']);?></td>
														<!--td><?php echo $resume['Resume']['present_employer'];?></td>
														<td><?php echo $resume['Designation']['designation'];?></td-->
														<td><?php echo $resume['ResLoc']['location'];?></td>
														<td><?php if(!empty($resume['Resume']['present_ctc'])): echo $resume['Resume']['present_ctc'].' L'; endif; ?></td>
														<td><?php if(!empty($resume['Resume']['present_ctc'])): echo $resume['Resume']['present_ctc'].' L'; endif; ?></td>
														<td><?php echo $resume['ReqResume']['stage_title'].' / '.$resume['ReqResume']['status_title'];?></td>
														<td  class="dn reasonCol"><?php echo $resume['Reason']['reason'];?></td>
														<td  class="noticePeriod"><?php echo $resume['Resume']['notice_period'];?> Days</td>
														<td><?php echo $resume['Creator']['first_name'];?></td>
														<td><?php echo $this->Functions->format_date($resume['ReqResume']['created_date']);?></td>
														
														<td  class="dn offerCol"><?php echo $this->Functions->format_date($resume['ReqResume']['date_offer']);?></td>

														<td  class="dn joinCol"><?php echo $this->Functions->format_date($resume['ReqResume']['date_offer']);?></td>
														<td  class="dn joinCol"><?php echo $this->Functions->format_date($resume['ReqResume']['joined_on']);?></td>
														
														<!--td><?php echo $this->Functions->format_date($resume['ReqResume']['modified_date']);?></td-->
														
															<td class="actionItem">
														<div class="btn-group" style="margin-left:5px;display:inline-block;">
															<!--a href="edit_resume.php" style="margin-left:5px;margin-right:5px" rel="tooltip" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a-->
															<!-- <a href="#"  style="margin-right:5px"  id="smoke_confirm" rel="tooltip" class="confirm"   title="Delete"><i class="icon-trash"></i></a> -->
															<!--a href="add_formatted_resume.php" style="margin-right:5px"  rel="tooltip"  title="Create Fully Formatted Resume">
															<img src="<?php echo $this->webroot;?>img/gCons/add-item.png" width="18" height="18" style="padding-bottom: 5px;">
															</a-->
															<button data-toggle="dropdown" rel="tooltip"  title="Download" dropdown-toggle"><i class="icon-download"></i> <span class=""></span></button>
															<ul style="margin-left:-35px;" class="dropdown-menu">
																<li><a href="#">Snapshot</a></li>
																<li><a class="notify" data-notify-time = '7000' data-notify-title="In Progress!" data-notify-message="Downloading Resume... Please wait..."   href="<?php echo $this->webroot;?>hc/download/<?php echo $resume['Resume']['id']; ?>">Candidate Resume</a></li>
																<li class="divider"></li>
																<li><a href="#">Fully Formatted Resume</a></li>
															</ul>
														</div>											
														</td>
														
														
														
													</tr>
													<?php endforeach; ?>
													
													<?php // foreach($resume_data as $resume):	?>
													<tr class="dn status_row">
														<td>														
														<a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $resume['Resume']['id'];?>/"><?php echo ucwords($resume['Resume']['first_name'].' '.$resume['Resume']['last_name']);?></a></td>
														
													<td>	
														
														<div class="span1" style="width:110px;">
									<div class="btn-group">
										<button class="btn btn btn-mini">Feedback Awaiting</button>
										
										
									</div>	
								</div>
												</td>	


<td>	
														
															<div class="span1" style="width:110px;">
									<div class="btn-group">
										<button class="btn btn btn-mini btn-danger">CV Rejected</button>
										
										
									</div>	
								</div>
												</td>
												
												<td>&nbsp; </td>
<td>&nbsp; </td><td>&nbsp; </td><td>&nbsp; </td><td>&nbsp; </td><td>&nbsp; </td><td>&nbsp; </td>
	
																		
														
													</tr>
													
													<tr class="dn status_row">
														<td>														
														<a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $resume['Resume']['id'];?>/"><?php echo ucwords($resume['Resume']['first_name'].' '.$resume['Resume']['last_name']);?></a></td>
														
													<td>	
														
														<div class="span1" style="width:110px;">
									<div class="btn-group">
										<button class="btn btn btn-mini">Feedback Awaiting</button>
										
										
									</div>	
								</div>
												</td>	

<td>	
														
															<div class="span1" style="width:110px;">
									<div class="btn-group">
										<button class="btn btn btn-mini">CV Shortlisted</button>
										
										
									</div>	
								</div>
												</td>



<td>	
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn  btn-mini btn-success">First Interview </button>
										<button data-toggle="dropdown" class="btn btn-success btn-mini dropdown-toggle"><span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="#">Second Interview</a></li>
											<li><a href="#">Final Interview</a></li>
											<li class="divider"></li>
											<li><a href="#">Interview Reject</a></li>
										</ul>
									</div>	
								</div>
												</td>
<td>&nbsp; </td><td>&nbsp; </td><td>&nbsp; </td><td>&nbsp; </td><td>&nbsp; </td><td>&nbsp; </td>
													
													</tr>
													
												<tr class="dn status_row">
														<td>														
														<a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $resume['Resume']['id'];?>/"><?php echo ucwords($resume['Resume']['first_name'].' '.$resume['Resume']['last_name']);?></a></td>
														
													<td>	
														
														<div class="span1" style="width:110px;">
									<div class="btn-group">
										<button class="btn btn btn-mini">Feedback Awaiting</button>
										
										
									</div>	
								</div>
												</td>	

<td>	
														
															<div class="span1" style="width:110px;">
									<div class="btn-group">
										<button class="btn btn btn-mini">CV Shortlisted</button>
										
										
									</div>	
								</div>
												</td>



<td>	
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn  btn-mini">First Interview </button>
										
									</div>	
								</div>
												</td>

<td>	
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn  btn-mini">Second Interview </button>
										
									</div>	
								</div>
												</td>

<td>	
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn  btn-mini btn-danger">Interview Rejected </button>
										
									</div>	
								</div>
												</td>

<td>&nbsp; </td>											
												<td>&nbsp; </td><td>&nbsp; </td><td>&nbsp; </td><td>&nbsp; </td>		
													</tr>
													
												<tr class="dn status_row">
														<td>														
														<a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $resume['Resume']['id'];?>/"><?php echo ucwords($resume['Resume']['first_name'].' '.$resume['Resume']['last_name']);?></a></td>
														
													<td>	
														
														<div class="span1" style="width:110px;">
									<div class="btn-group">
										<button class="btn btn btn-mini">Feedback Awaiting</button>
										
										
									</div>	
								</div>
												</td>	

<td>	
														
															<div class="span1" style="width:110px;">
									<div class="btn-group">
										<button class="btn btn btn-mini">CV Shortlisted</button>
										
										
									</div>	
								</div>
												</td>



<td>	
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn  btn-mini">First Interview </button>
										
									</div>	
								</div>
												</td>

<td>	
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn  btn-mini">Second Interview </button>
										
									</div>	
								</div>
												</td>

<td>	
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn  btn-mini">Final Interview </button>
										
									</div>	
								</div></td>

<td>	
														
														<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn btn-success btn-mini">Offer</button>
										<button data-toggle="dropdown" class="btn btn-success btn-mini dropdown-toggle"><span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="#">Accept</a></li>
											<li><a href="#">On Hold</a></li>
											<li class="divider"></li>
											<li><a href="#">Rejected</a></li>
										</ul>
									</div>	
								</div>
												</td><td>&nbsp; </td><td>&nbsp; </td><td>&nbsp; </td>

													
													</tr>
												
	<tr class="dn status_row">
														<td>														
														<a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $resume['Resume']['id'];?>/"><?php echo ucwords($resume['Resume']['first_name'].' '.$resume['Resume']['last_name']);?></a></td>
														
													<td>	
														
														<div class="span1" style="width:110px;">
									<div class="btn-group">
										<button class="btn btn btn-mini">Feedback Awaiting</button>
										
										
									</div>	
								</div>
												</td>	

<td>	
														
															<div class="span1" style="width:110px;">
									<div class="btn-group">
										<button class="btn btn btn-mini">CV Shortlisted</button>
										
										
									</div>	
								</div>
												</td>



<td>	
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn  btn-mini">First Interview </button>
										
									</div>	
								</div>
												</td>

<td>	
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn  btn-mini">Second Interview </button>
										
									</div>	
								</div>
												</td>

<td>	
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn  btn-mini">Final Interview </button>
										
									</div>	
								</div></td>

<td>	
														
														<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn btn-mini">Offered</button>
										
									</div>	
								</div>
												</td>

<td>	
														
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn btn-success btn-mini">Joining</button>
										<button data-toggle="dropdown" class="btn btn-success btn-mini dropdown-toggle"><span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="#">Joined</a></li>
											<li class="divider"></li>
											<li><a href="#">Not Joined</a></li>
										</ul>
									</div>	
								</div>
												</td>

<td>&nbsp; </td><td>&nbsp; </td>	<td>&nbsp; </td>

												
														
													</tr>
		<tr class="dn status_row">
														<td>														
														<a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $resume['Resume']['id'];?>/"><?php echo ucwords($resume['Resume']['first_name'].' '.$resume['Resume']['last_name']);?></a></td>
														
													<td>	
														
														<div class="span1" style="width:110px;">
									<div class="btn-group">
										<button class="btn btn btn-mini">Feedback Awaiting</button>
										
										
									</div>	
								</div>
												</td>	

<td>	
														
															<div class="span1" style="width:110px;">
									<div class="btn-group">
										<button class="btn btn btn-mini">CV Shortlisted</button>
										
										
									</div>	
								</div>
												</td>



<td>	
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn  btn-mini">First Interview </button>
										
									</div>	
								</div>
												</td>

<td>	
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn  btn-mini">Second Interview </button>
										
									</div>	
								</div>
												</td>

<td>	
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn  btn-mini">Final Interview </button>
										
									</div>	
								</div></td>

<td>	
														
														<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn btn-mini">Offered</button>
										
									</div>	
								</div>
												</td>

<td>	
														
									<div class="span1"  style="width:110px;">
									<div class="btn-group">
										<button class="btn btn-warning btn-mini">Joined</button>
										
									</div>	
								</div>
												</td>
<td>&nbsp; </td><td>&nbsp; </td>
													
													</tr>
																								
													<?php // endforeach; ?>
												
												
												</tbody>
											</table>	
											
											<div class="alert alert-login no_record dn">
								<a class="close" data-dismiss="alert">×</a>
								<strong>Oops!</strong> No records found!.
							</div>
							
										</div>
								
									
									
									</div>
								</div>
							</div>
							
							
							
						</div>
					</div>
					
					<?php if(!strstr($this->request->referer(),'index')):?>
					<div class="form-actions">
									<a  class="jsRedirect goback" val="<?php echo $this->request->referer();?>"  href="javascript:void(0);"><button class="btn">Back</button></a>
					</div>
					<?php endif; ?>			
								
                    </div>
					
                   
				

				    
                </div>
            </div>
            
		</div>
		
		</div>
