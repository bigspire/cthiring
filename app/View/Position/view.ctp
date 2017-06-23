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
										<li class="active"><a class="restabChange" rel="position"  href="#mbox_basic" data-toggle="tab"><i class="splashy-smiley_happy"></i>  Basic </a></li>
										<li class=""><a class="restabChange" rel="interview"  href="#mbox_description" data-toggle="tab"><i class="splashy-smiley_amused"></i>  Job Description </a></li>
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
	
							
							
					
						<div style="float:left;" class="mt15">
			
			
				<div class="btn-group">
										<button data-toggle="dropdown" class="btn dropdown-toggle">Change Status <span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="#">Change Status</a></li>
											<li><a href="#" class="confirm_status">Recruiter Validated</a></li>
											<li><a href="#" class="confirm_status">CV Validated</a></li>
											<li><a href="#" class="confirm_status">CV Rejected</a></li>
											<li class="divider"></li>
											<li><a href="#" class="confirm_status">First Interview</a></li>
											<li><a href="#" class="confirm_status">Second Interview</a></li>
											<li><a href="#" class="confirm_status">Final Interview</a></li>
										</ul>
							</div>
							<div class="btn-group" style="float:left;display:inline-block;margin-left:120px;margin-top:-25px;">
										<button data-toggle="dropdown" class="btn dropdown-toggle" >Action <span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="#">Action</a></li>
											<li><a href="<?php echo $this->webroot;?>position/send_message/" class="iframeBox unreadLink" val="50_60">Send CV to Client</a></li>
											<li><a href="<?php echo $this->webroot;?>position/send_message/" class="iframeBox unreadLink" val="50_60">Interview Confirmation to Client</a></li>
											<li><a href="<?php echo $this->webroot;?>position/send_message/" class="iframeBox unreadLink" val="50_60">Schedule Interview to Candidates</a></li>
											<li><a href="<?php echo $this->webroot;?>position/send_message/" class="iframeBox unreadLink" val="50_60">Send Mail</a></li>
											<li><a href="<?php echo $this->webroot;?>position/send_message/" class="iframeBox unreadLink" val="50_60">Send SMS</a></li>
										</ul>
							</div>
							
						  <div class="btn-group" style="float:left;display:inline-block;margin-left:195px;margin-top:-25px;">
								<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>												
							</div>
							<br>	
							<div class="dn dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							<label style="margin-top:18px;">
							<a class="jsRedirect" href="#"><input value="Reset" type="button" class="btn"/></a></label>
							<label style="margin-top:18px;">
							<input type="submit" value="Submit" class="btn btn-gebo" /></label>
				
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
											
<label>Branch: 
							<select name="data[Resume][loc]" class="input-small" placeholder="" style="clear:left" id="ResumeLoc">
<option value="">Select</option>
<option value="104">Ahmadabad</option>
<option value="102">Bangalore</option>
<option value="103">Chennai</option>
<option value="105">Hyderabad</option>
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
					
				

						
							<label>To Date: <input type="text" name="data[Resume][to]" placeholder="dd/mm/yyyy" value="" style="width:70px;"  class="input-small datepick" aria-controls="dt_gal"></label>

							<label>From Date: <input type="text" class="input-small datepick" name="data[Resume][from]" placeholder="dd/mm/yyyy" style="width:70px;"  value="" aria-controls="dt_gal"></label>
							<label style="">Keyword: <input type="text" placeholder="Candidate / Employer" name="data[Resume][keyword]" id = "SearchText" value="" class="input-medium" aria-controls="dt_gal"></label>

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
											<?php $total = $this->Functions->get_req_tab_count($resume_data, 'CV-Sent', 'status');?>
											<li class="active"><a href="#mbox_inbox" class="tabChange" val="<?php echo $total;?>" rel="all"  data-toggle="tab"><i class="splashy-mail_light_down"></i>  CV Sent <?php if($total):?><span class="label label-success"> <?php echo $total;?></span><?php endif; ?></a></li>
											<?php $shortlist = $this->Functions->get_req_tab_count($resume_data, 'Shortlisted', 'status');?>
											<li><a href="#mbox_outbox" class="tabChange" rel="Shortlisted" val="<?php echo $shortlist;?>" data-toggle="tab"> CV Shortlisted <?php if($shortlist):?><span class="label label-warning"><?php echo $shortlist;?></span><?php endif; ?></a></li>
											<?php $cv_reject = $this->Functions->get_req_tab_count($resume_data, '', '','shorlist_reject');?>
											<li><a href="#mbox_outbox" class="tabChange" rel="cv_reject" val="<?php echo $cv_reject;?>" data-toggle="tab"> CV Rejected <?php if($cv_reject):?><span class="label label-important"><?php echo $cv_reject;?></span><?php endif; ?></a></li>
											
											<?php $yrf =  $this->Functions->get_req_tab_count($resume_data, 'YRF', 'status');?>
											<li><a href="#mbox_trash" class="tabChange" rel="YRF" val="<?php echo $yrf;?>" data-toggle="tab">Feedback Awaiting <?php if($yrf):?><span class="label"><?php echo $yrf;?></span><?php endif; ?></a></li>
											<?php $interview =  $this->Functions->get_req_tab_count($resume_data, 'First Interview-Final Interview-Second Interview', 'stage');?>
											<li><a href="#mbox_trash" class="tabChange" rel="Interview"  val="<?php echo $interview;?>" data-toggle="tab"> Interviewed <?php if($interview):?><span class="label label-info"><?php echo $interview;?></span><?php endif; ?></a></li>
											<?php $interview_not_att =  $this->Functions->get_req_tab_count($resume_data, 'First Interview-Final Interview-Second Interview', 'stage', 'interview_not_att');?>
											<li><a href="#mbox_trash" class="tabChange" rel="NoShow" val="<?php echo $interview_not_att;?>" data-toggle="tab"> Interview Dropouts <?php if($interview_not_att):?><span class="label label-inverse"><?php echo $interview_not_att;?></span><?php endif; ?></a></li>
											<?php $interview_reject =  $this->Functions->get_req_tab_count($resume_data, 'First Interview-Final Interview-Second Interview', 'stage', 'interview_reject');?>
											<li><a href="#mbox_trash" class="tabChange" rel="InterviewReject" val="<?php echo $interview_reject;?>" data-toggle="tab"> Interview Rejected <?php if($interview_reject):?><span class="label label-important"><?php echo $interview_reject;?></span><?php endif; ?></a></li>
											<?php $offer =  $this->Functions->get_req_tab_count($resume_data, 'Offer','stage');?>
											<li><a href="#mbox_trash" class="tabChange" rel="Offer" val="<?php echo $offer;?>" data-toggle="tab"> Offered  <?php if($offer):?><span class="label label-success"><?php echo $offer;?></span><?php endif; ?></a></li>
											<?php $offer_rej =  $this->Functions->get_req_tab_count($resume_data, 'OfferReject','','offer_reject');?>
											<li><a href="#mbox_trash" class="tabChange" rel="OfferReject" val="<?php echo $offer_rej;?>" data-toggle="tab">Offer Dropouts <?php if($offer_rej):?><span class="label label-inverse"><?php echo $offer_rej;?></span><?php endif; ?></a></li>
											<?php $joined =  $this->Functions->get_req_tab_count($resume_data, 'Joined','status');?>
											<li><a href="#mbox_trash" class="tabChange" rel="Joined" val="<?php echo $joined;?>" data-toggle="tab">Joined <?php if($joined):?><span class="label label-warning"><?php echo $joined;?></span><?php endif; ?></a></li>
											<?php $billing =  $this->Functions->get_req_tab_count($resume_data, '','','billing');?>
											<li><a href="#mbox_trash" class="tabChange" rel="Billing" val="<?php echo $billing;?>" data-toggle="tab"> Billed <?php if($billing):?><span class="label label-success"><?php echo $billing;?></span><?php endif; ?></a></li>
											
										</ul>
									</div>
									<div class="tab-content" style="overflow:auto;max-height:300px;">
										<div class="tab-pane active" id="mbox_inbox">											
											
											<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR cvTable" id="dt_inbox">
												<thead>
													<tr>
														<th width="30" style="text-align:center">
														<input name="chkMul" id="chkMul" type="checkbox">
													</th>
														<th width="120">Candidate Name</th>
														<th  width="100">Mobile</th>
														<th  width="120">Email</th>
														<th  width="100">Present Company</th>
														<th  width="120">Present Designation</th>
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
												</thead>
												<tbody>
													
													<?php foreach($resume_data as $resume):													
													// avoid duplicates	
													$dup = '';
													if(in_array($resume['Resume']['id'], $resume_id)):
														$dup = 'duplicate';													
													endif;	
													$resume_id[] = $resume['Resume']['id'];													

													
													// for cv reject
													$cv_reject = '';
													if($resume['ReqResumeStatus']['stage_title'] == 'Shortlist' && $resume['ReqResumeStatus']['status_title']  == 'Rejected'){
														$cv_reject = 'cv_reject';
													}
													$dup_interview = '';
													if(!in_array($resume['Resume']['id'], $resume_int_id) && ($resume['ReqResumeStatus']['stage_title'] == 'First Interview' || $resume['ReqResumeStatus']['stage_title'] == 'Second Interview'  || $resume['ReqResumeStatus']['stage_title'] == 'Final Interview')):
													$resume_int_id[] = $resume['Resume']['id'];	
													else:
													$dup_interview = 'duplicateInt';
													endif;
													
													// for job offer
													$dup_offer = '';
													if(!in_array($resume['Resume']['id'], $resume_offer_id) && ($resume['ReqResumeStatus']['stage_title'] == 'Offer')):
													$resume_offer_id[] = $resume['Resume']['id'];	
													else:
													$dup_offer = 'duplicateOffer';
													endif;
													
													// for billing
													$dup_bill = '';
													if(!in_array($resume['Resume']['id'], $resume_bill_id) && ($resume['ReqResume']['bill_ctc'] > 0)):
													$resume_bill_id[] = $resume['Resume']['id'];	
													else:
													$dup_bill = 'duplicateBill';
													endif;
													?>
													<tr class="<?php echo $dup_bill;?>  <?php echo $dup_offer;?> <?php echo $dup_interview;?> <?php echo $cv_reject;?> <?php echo $dup;?>  allRow <?php echo $this->Functions->format_string($resume['ReqResumeStatus']['stage_title']);?>  <?php echo $this->Functions->format_string($resume['ReqResumeStatus']['status_title']);?>
													 <?php echo $this->Functions->get_int_status($resume['ReqResumeStatus']['stage_title'],$resume['ReqResumeStatus']['status_title']);?> <?php echo $this->Functions->get_offer_reject($resume['ReqResumeStatus']['stage_title'],$resume['ReqResumeStatus']['status_title']);?>
													 <?php echo $resume['ReqResume']['bill_ctc'] > '0' ? 'Billing' : '';?>">
														<td  style="text-align:center"> 
															<input type="checkbox" name="chk[]" value="120"> 
														</td>
														<td>														
														<a href="<?php echo $this->webroot;?>resume/view/<?php echo $resume['Resume']['id'];?>/"><?php echo ucwords($resume['Resume']['first_name'].' '.$resume['Resume']['last_name']);?></a></td>
														<td><span><?php echo $this->Functions->get_format_text($resume['Resume']['mobile']);?></span></td>
														<td><?php echo $this->Functions->get_format_text($resume['Resume']['email_id']);?></td>
														<td><?php echo $resume['Resume']['present_employer'];?></td>
														<td><?php echo $resume['Designation']['designation'];?></td>
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
