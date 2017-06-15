<div id="maincontainer" class="clearfix">
<?php echo $this->element('header');?>     

 
   <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">                    
				
					<div class="row-fluid mt15">
					
					
								
						<div class="span12">
						
						<?php echo $this->Session->flash();?>   
						
						<div class="btns_state pull-right" style="clear:left;margin-right:50px;">
									<div  class="btn-group clearfix sepH_a">
										<button rel="<?php echo $this->webroot;?>home/index/rec_view/" class="dash_view btn <?php echo $rec_dash;?>">Recruiter View</button>
										<button rel="<?php echo $this->webroot;?>home/index/ac_view/" class="dash_view btn <?php echo $ac_dash;?>">Account Holder View</button>
									</div>
									
									
						</div>
						<div class="btns_state pull-right" style="margin-right:30px;">
					<?php echo $this->Form->create('Home', array('id' => 'formID','class' => 'formID')); ?>

						<div class="dataTables_filter srchBox" id="dt_gal_filter">			
							<label>
							<a class="jsRedirect" href="<?php echo $this->webroot;?>home/">
							<input value="Reset" type="button" class="btn"/></a>
							</label>
							<label style="">
							<input type="submit" class="btn-gebo" />
							</label>	
							 For the period:
							 

							<input type="text" class="input-medium datepick" name="data[Home][from]" value="<?php echo $this->request->query['from'];?>" aria-controls="dt_gal"></label>
						
							<input type="text" name="data[Home][to]" value="<?php echo $this->request->query['to'];?>" class="input-medium datepick" aria-controls="dt_gal"></label>
						
						</div>	
						</form>
						
							</div>		
							<h3 class="heading">Dashboard</h3>
							
							<div class="flexslider2">
							<ul class="slides dshb_icoNav tac  mt15">
								<li><a href="<?php echo $this->webroot;?>position/"><span class="label label-info"><?php echo $POS_TAB_COUNT;?></span> <strong>Positions</strong></a></li>
								<li><a href="<?php echo $this->webroot;?>resume/"><span class="label label-warning"><?php echo $CV_SENT_TAB_COUNT;?> </span> <strong>CV</strong> Sent</a></li>
								<li><a href="<?php echo $this->webroot;?>resume/"><span class="label label-success"><?php echo $CV_SHORTLIST_TAB_COUNT;?> </span> <strong>CV</strong> Shortlisted</a></li>
								<li><a href="<?php echo $this->webroot;?>resume/"><span class="label label-important"><?php echo $CV_REJECT_TAB_COUNT;?> </span> <strong>CV </strong>Rejected</a></li>
								<li><a href="<?php echo $this->webroot;?>resume/"><span class="label label"><?php echo $CV_WAITING_TAB_COUNT;?></span> <strong>CV</strong> Feedback Awaiting</a></li>
								<li><a href="<?php echo $this->webroot;?>hiring/interview.php"><span class="label label-warning" ><?php echo $INTERVIEW_TAB_COUNT;?> </span> <strong>Candidates </strong>Interviewed</a></li>
								<li><a href="<?php echo $this->webroot;?>hiring/interview.php"><span class="label label-info"><?php echo $INTERVIEW_DROP_TAB_COUNT ? $INTERVIEW_DROP_TAB_COUNT : 0;?></span> <strong>Interview </strong>Dropouts</a></li>
								<li><a href="<?php echo $this->webroot;?>hiring/interview.php"><span class="label label-success"><?php echo $INTERVIEW_REJ_TAB_COUNT ? $INTERVIEW_REJ_TAB_COUNT : 0;?></span> <strong>Interview </strong>Rejected</a></li>
								<li><a href="<?php echo $this->webroot;?>resume/"><span class="label label-danger"><?php echo $OFFER_TAB_COUNT;?></span> <strong>Candidates</strong> Offered</a></li>
								<li><a href="<?php echo $this->webroot;?>resume/"><span class="label label-info"><?php echo $OFFER_REJ_TAB_COUNT;?> </span> <strong>Offer</strong> Dropouts</a></li>
								<li><a href="<?php echo $this->webroot;?>resume/"><span class="label label-success"><?php echo $JOINED_TAB_COUNT; ?> </span><strong> Candidates</strong> Joined</a></li>
								<li><a href="<?php echo $this->webroot;?>resume/"><span class="label label-warning"><?php echo $BILLED_TAB_COUNT;?> </span> <strong>Candidates</strong> Billed</a></li>
								<li><a href="<?php echo $this->webroot;?>hiring/billing.php"><span class="label label-info">₹<?php echo $BILLED_AMT_TAB_COUNT;?></span> <strong>Weekly</strong> Contribution</a></li>
							</ul>
							</div>
						</div>
					</div>
					
					
					<div class="row-fluid" style="margin-top:10px">
						
					<div class="row-fluid">
						<div class="span6">
							<h3 class="heading">Daily Activity <small>Overview</small></h3>
							<div id="piechart" style="height:468px"></div>

							
						</div>
						<div class="span6">
							<h3 class="heading">Calendar</h3>
		<iframe id="eventFrame" src="<?php echo $this->webroot;?>full_calendar/" width="100%" height="468px" frameborder="0"></iframe> 

                        </div>
						
						
					</div>
                    <div class="row-fluid">
                    
                    
					  <div class="span6">
							<div class="heading clearfix">
								<h3 class="pull-left">Recent Clients</h3>
								<h3 class="pull-right label label-warning"><a href="<?php echo $this->webroot;?>client/"  style="color:#ffffff;">View All</a></h3>
								<!--span class="pull-right label label-important">5 New </span-->
							</div>
							<table class="tableFix table table-striped table-bordered ">
								<thead class="theadFix">
									<tr>
										<th style="width:192px" class="essential persist">Client</th>
										<th style="width:120px"  class="optional">Location</th>
										<th width=""  style="width:100px"  class="optional">Account Holder</th> 
										<th width=""  style="width:100px"  class="optional">Created Date</th>
										<th width=""  style="width:100px"  class="essential" style="text-align:center">No. Positions</th>
									</tr>
								</thead>
								<tbody class="tbodyFix">
								<?php foreach($client_data as $data):?>
									<tr>
										<td width="180" style="width:192px"><a  href="<?php echo $this->webroot;?>client/view/<?php echo $data['Client']['id'];?>"><?php echo $data['Client']['client_name'];?></a></td>
										<td width="120" style="width:120px"><?php echo $data['ResLocation']['location'];?></td>
										<td width="100" style="width:100px"><?php echo $data['Creator']['first_name'];?></td>
										<td width="100" style="width:100px"><?php echo $this->Functions->format_date($data['Client']['created_date']);?></td>
										<td  width="100" style="width:80px;text-align:center"><a href="<?php echo $this->webroot;?>position/?keyword=<?php echo $data['Client']['client_name'];?>"><?php echo $data[0]['req_count'];?></a></td>										
									</tr>
								<?php endforeach; ?>	
								</tbody>
							</table>
                        </div>
                        
                        
                        <div class="span6">
							<div class="heading clearfix">
								<h3 class="pull-left">Recent Positions</h3>
								<h3 class="pull-right label label-warning"><a href="<?php echo $this->webroot;?>position/"  style="color:#ffffff;">View All</a></h3>
							<!--span class="pull-right label label-important">3 New</span-->
							</div>
							<table class="tableFix table table-striped table-bordered ">
								<thead class="theadFix">
									<tr>
										<th style="width:170px" class="optional">Job Title</th>
										<th style="width:140px"  class="essential persist">Client</th>
										<th style="width:100px" class="optional">Status</th>
										<th style="width:100px" class="optional">Created Date</th>
										<th style="width:100px" class="essential" style="text-align:center">CV Sent</th>
										<!--th class="essential">Action</th-->
									</tr>
								</thead>
								<tbody class="tbodyFix">
								<?php foreach($position_data as $data):?>
									<tr>
										<td style="width:180px"><a  href="<?php echo $this->webroot;?>position/view/<?php echo $data['Position']['id'];?>"><?php echo $data['Position']['job_title'];?></a></td>
										<td style="width:140px"><?php echo $data['Client']['client_name'];?></td>
										<td  style="width:100px"><span class="label label-<?php echo $this->Functions->get_req_status_color($data['ReqStatus']['title']);?>"><?php echo $data['ReqStatus']['title'];?></span></td>
										<td  style="width:100px"><?php echo $this->Functions->format_date($data['Position']['created_date']);?></td>
										<td style="width:100px;text-align:center"><a href="<?php echo $this->webroot;?>resume/?status=1"><?php echo $data[0]['cv_sent'];?></a></td>
										
									</tr>
									<?php endforeach; ?>	
								</tbody>
							</table>
                        
						</div>
                       

                       

				   </div>
                    <div class="row-fluid">
                     <div class="span6" id="user-list2">
                     <div class="heading clearfix">
								<h3 class="pull-left">Resumes <!--small>last 24 hours</small--></h3>
								<h3 class="pull-right label label-warning"><a href="<?php echo $this->webroot;?>resume/"  style="color:#ffffff;">View All</a></h3>
							</div>

							<div class="row-fluid">
								<div class="input-prepend">
									<span class="add-on ad-on-icon"><i class="icon-user"></i></span><input type="text" class="user-list2-search search" placeholder="Search user" />
								</div>
								<ul class="nav nav-pills line_sep">
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">Sort by <b class="caret"></b></a>
										<ul class="dropdown-menu sort-by">
											<li><a href="javascript:void(0)" class="sort" data-sort="sl_name2">Candidate Name</a></li>
											<li><a href="javascript:void(0)" class="sort" data-sort="sl_date2">Created Date</a></li>

										</ul>
										
										
									</li>
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">Show <b class="caret"></b></a>
										<ul class="dropdown-menu filter">
											<li class="active"><a href="javascript:void(0)" id="filter-none2">All</a></li>
											
											<li><a href="javascript:void(0)" id="filter-1">Validation - Recruiter - Pending</a></li>
											<li><a href="javascript:void(0)" id="filter-2">Validation - Account Holder - Pending</a></li>
											<li><a href="javascript:void(0)" id="filter-3">Validation - Account Holder - Rejected</a></li>
											<li><a href="javascript:void(0)" id="filter-4">Shortlist - CV-Sent</a></li>
											<li><a href="javascript:void(0)" id="filter-5">Shortlist - Shortlisted</a></li>
											<li><a href="javascript:void(0)" id="filter-6">Shortlist - YRF</a></li>
											<li><a href="javascript:void(0)" id="filter-7">Shortlist - Rejected</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<ul class="list user_list2">
							
							<?php foreach($resume_data as $data):?>
								<li>
<span class="s_color sl_date2" style="font-size:12px;color:#b2abab;"><?php echo date('d,M', strtotime($data['Resume']['created_date']));?>, </span>
<span class="label label-<?php echo $this->Functions->get_res_status_color($data['ReqResume']['status_title']);?> pull-right sl_status2"><?php echo $data['ReqResume']['stage_title'];?> - <?php echo $data['ReqResume']['status_title'];?></span>
<a href="<?php echo $this->webroot;?>resume/view/<?php echo $data['Resume']['id'];?>" class="sl_name2"><?php echo $data[0]['full_name'];?></a><br />
<small class="s_color sl_email2"><?php echo $data['Resume']['email_id'];?></small>

							</li>							
							<?php endforeach; ?>
							
							</ul>
							<div class="pagination"><ul class="paging bottomPaging"></ul></div>
                        </div>
                    
                        <div class="span6" id="user-list">
                         <div class="heading clearfix">
								<h3 class="pull-left">Interviews <!--small>last 24 hours</small--></h3>
								<h3 class="pull-right label label-warning"><a href="<?php echo $this->webroot;?>hiring/interview.php"  style="color:#ffffff;">View All</a></h3>
								</div>
							<div class="row-fluid">
								<div class="input-prepend">
									<span class="add-on ad-on-icon"><i class="icon-user"></i></span><input type="text" class="user-list-search search" placeholder="Search user" />
								</div>
								<ul class="nav nav-pills line_sep">
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">Sort by <b class="caret"></b></a>
										<ul class="dropdown-menu sort-by">
											<li><a href="javascript:void(0)" class="sort" data-sort="sl_name">Candidate Name</a></li>
											<li><a href="javascript:void(0)" class="sort" data-sort="sl_date">Created Date</a></li>
										</ul>
									</li>
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">Show <b class="caret"></b></a>
										<ul class="dropdown-menu filter">
											<li class="active"><a href="javascript:void(0)" id="filter-none">All</a></li>				
											<li><a href="javascript:void(0)" id="filter-8">Pending	</a></li>
											<li><a href="javascript:void(0)" id="filter-9">Scheduled</a></li>
											<li><a href="javascript:void(0)" id="filter-16">Re-Scheduled</a></li>
											<li><a href="javascript:void(0)" id="filter-10">Selected	</a></li>
											<li><a href="javascript:void(0)" id="filter-11">Rejected	</a></li>
											<li><a href="javascript:void(0)" id="filter-12">YRF	</a></li>
											<li><a href="javascript:void(0)" id="filter-13">Cancelled	</a></li>
											<li><a href="javascript:void(0)" id="filter-14">No Show	</a></li>
											<li><a href="javascript:void(0)" id="filter-15">OnHold	</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<ul class="list user_list">
								<?php foreach($interview_data as $data):?>
								<li>
<span class="s_color sl_date" style="font-size:12px;color:#b2abab;"><?php echo date('d,M', strtotime($data['ReqResume']['created_date']));?>, </span>
									<span class="label label-<?php echo $this->Functions->get_int_status_color($data['ReqResume']['status_title']);?> pull-right">
									<?php echo $data['ReqResume']['stage_title'];?> - <span class="sl_status"><?php echo $data['ReqResume']['status_title'];?></span></span>
									<a href="<?php echo $this->webroot;?>resume/view/<?php echo $data['Resume']['id'];?>" class="sl_name"><?php echo $data[0]['full_name'];?></a><br />
									<small class="s_color sl_email"><?php echo $data['Resume']['email_id'];?></small>
								</li>
								
								<?php endforeach; ?>
							</ul>
							<div class="pagination"><ul class="paging bottomPaging"></ul></div>
                        </div>
                    
					
					</div>
					
					<div class="row-fluid">
                     <div class="span6" id="user-list3">
                      <div class="heading clearfix">
								<h3 class="pull-left">Offers <!--small>last 24 hours</small--></h3>
								<h3 class="pull-right label label-warning"><a href="<?php echo $this->webroot;?>resume/"  style="color:#ffffff;">View All</a></h3>
								</div>
							<div class="row-fluid">
								<div class="input-prepend">
									<span class="add-on ad-on-icon"><i class="icon-user"></i></span><input type="text" class="user-list3-search search" placeholder="Search user" />
								</div>
								<ul class="nav nav-pills line_sep">
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">Sort by <b class="caret"></b></a>
										<ul class="dropdown-menu sort-by">
											<li><a href="javascript:void(0)" class="sort" data-sort="sl_name3">Candidate Name</a></li>
											<li><a href="javascript:void(0)" class="sort" data-sort="sl_date3">Created Date</a></li>
										</ul>
									</li>
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">Show <b class="caret"></b></a>
										<ul class="dropdown-menu filter">									
										
											<li class="active"><a href="javascript:void(0)" id="filter-none3">All</a></li>
											<li><a href="javascript:void(0)" id="filter-17">Not Interested</a></li>
											<li><a href="javascript:void(0)" id="filter-18">Offer Accepted</a></li>
											<li><a href="javascript:void(0)" id="filter-19">Offer Made</a></li>
											<li><a href="javascript:void(0)" id="filter-20">Offer Pending</a></li>
											<li><a href="javascript:void(0)" id="filter-21">Quit</a></li>
											<li><a href="javascript:void(0)" id="filter-22">Rejected</a></li>
											<li><a href="javascript:void(0)" id="filter-23">Yet to Join</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<ul class="list user_list3">
							
								<?php foreach($offer_data as $data):?>
								<li>
								<span class="s_color sl_date3" style="font-size:12px;color:#b2abab;"><?php echo date('d,M', strtotime($data['ReqResume']['created_date']));?>, </span>
									<span class="label label-<?php echo $this->Functions->get_offer_status_color($data['ReqResume']['status_title']);?> pull-right">
									<?php echo $data['ReqResume']['stage_title'];?> - <span class="sl_status3"><?php echo $data['ReqResume']['status_title'];?></span></span>
									<a href="<?php echo $this->webroot;?>resume/view/<?php echo $data['Resume']['id'];?>" class="sl_name3"><?php echo $data[0]['full_name'];?></a><br />
									<small class="s_color sl_email3"><?php echo $data['Resume']['email_id'];?></small>
								</li>							
							<?php endforeach; ?>
							
							</ul>
							<div class="pagination"><ul class="paging bottomPaging"></ul></div>
                        </div>
                    
                        <div class="span6" id="user-list4">
                         <div class="heading clearfix">
								<h3 class="pull-left">Joinees <!--small>last 24 hours</small--></h3>
								<h3 class="pull-right label label-warning"><a href="<?php echo $this->webroot;?>resume/"  style="color:#ffffff;">View All</a></h3>
								</div>
							<div class="row-fluid">
								<div class="input-prepend">
									<span class="add-on ad-on-icon"><i class="icon-user"></i></span><input type="text" class="user-list4-search search" placeholder="Search user" />
								</div>
								<ul class="nav nav-pills line_sep">
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">Sort by <b class="caret"></b></a>
										<ul class="dropdown-menu sort-by">
											<li><a href="javascript:void(0)" class="sort" data-sort="sl_name4">Candidate Name</a></li>
											<li><a href="javascript:void(0)" class="sort" data-sort="sl_date4">Created Date</a></li>
										</ul>
									</li>
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">Show <b class="caret"></b></a>
										<ul class="dropdown-menu filter">
											<li class="active"><a href="javascript:void(0)" id="filter-none4">All</a></li>
											<li><a href="javascript:void(0)" id="filter-24">Joined	</a></li>
											<li><a href="javascript:void(0)" id="filter-25">Quit	</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<ul class="list user_list4">
								<?php foreach($join_data as $data):?>
								<li>
							<span class="s_color sl_date4" style="font-size:12px;color:#b2abab;"><?php echo date('d,M', strtotime($data['ReqResume']['created_date']));?>, </span>
									<span class="label label-<?php echo $this->Functions->get_join_status_color($data['ReqResume']['status_title']);?> pull-right">
									<?php echo $data['ReqResume']['stage_title'];?> - <span class="sl_status4"><?php echo $data['ReqResume']['status_title'];?></span></span>
									<a href="<?php echo $this->webroot;?>resume/view/<?php echo $data['Resume']['id'];?>" class="sl_name4"><?php echo $data[0]['full_name'];?></a><br />
									<small class="s_color sl_email4"><?php echo $data['Resume']['email_id'];?></small>
								</li>							
							<?php endforeach; ?>
								
								</ul>
							<div class="pagination"><ul class="paging bottomPaging"></ul></div>
                        </div>
                    
					
					</div>
                        
                        
                </div>
            
			
			
			</div>
            
		
		
		
		
		
            
			 
			 
			 <input type="hidden" class="piechart1"/>
		<div class="popover2 tbl_cv_join_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client Name</th>
											
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_JOIN_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_join_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		
			<div class="popover2 tbl_cv_bill_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client Name</th>
											
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_BILL_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_bill_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		
			<div class="popover2 tbl_cv_interview_drop_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client</th>
											<th>Stage/Status</th>
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_INT_DROP_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_interview_drop_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
											<td> 
												<?php echo $graph_data['ReqResumeStatus']['stage_title'];?> / <?php echo $graph_data['ReqResumeStatus']['status_title'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		<div class="popover2 tbl_cv_interview_reject_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client</th>
											<th>Stage/Status</th>
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_INT_REJECT_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_interview_reject_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
											<td> 
												<?php echo $graph_data['ReqResumeStatus']['stage_title'];?> / <?php echo $graph_data['ReqResumeStatus']['status_title'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		<div class="popover2 tbl_cv_offer_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client</th>
											<th>Stage/Status</th>
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_OFFER_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_offer_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
											<td> 
												<?php echo $graph_data['ReqResumeStatus']['stage_title'];?> / <?php echo $graph_data['ReqResumeStatus']['status_title'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		
		<div class="popover2 tbl_cv_offer_reject_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client</th>
											<th>Stage/Status</th>
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_OFFER_REJECT_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_offer_reject_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
											<td> 
												<?php echo $graph_data['ReqResumeStatus']['stage_title'];?> / <?php echo $graph_data['ReqResumeStatus']['status_title'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		<div class="popover2 tbl_cv_interview_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client</th>
											<th>Stage/Status</th>
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_INTERVIEW_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_interview_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
											<td> 
												<?php echo $graph_data['ResInterview']['stage_title'];?> / <?php echo $graph_data['ResInterview']['status_title'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		
		<div class="popover2 tbl_cv_waiting_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client Name</th>
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_WAITING_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_waiting_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		
		<div class="popover2 tbl_cv_shortlist_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client Name</th>
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_SHORTLIST_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_shortlist_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		<div class="popover2 tbl_cv_reject_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client Name</th>
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_REJECT_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_reject_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		<div class="popover2 tbl_cv_sent_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client Name</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									//echo '<pre>'; print_r($CV_SENT_DATA);die;
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_SENT_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_sent_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>

		<div class="popover2 tbl_req_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="180">Job Title</th>
											<th>Client Name</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									//echo '<pre>'; print_r($REQ_DATA[1]);die;
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($REQ_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow req_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>position/view/<?php echo $graph_data['Home']['id'];?>/"><?php echo $graph_data['Home']['job_title'];?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
</div>
			 

			
		 

	
	<!-- datatable -->
		 


			 
			 	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);	  	
		var mouse = {x: null, y: null};
		document.onmousemove = function (e) {
			mouse.x = e.pageX;
			mouse.y = e.pageY;
		}
      function drawChart() {
	  
	 
	   var data = new google.visualization.DataTable();
	   
	   data.addColumn('string', 'Date');
       data.addColumn('number', 'Positions');
       data.addColumn('number', 'CV Sent');
       data.addColumn('number', 'CV Shortlisted');
	   data.addColumn('number', 'CV Rejected');
       data.addColumn('number', 'CV Feedback Awaiting');
	   data.addColumn('number', 'Candidates Interviewed');
	   data.addColumn('number', 'Interview Dropouts');
	   data.addColumn('number', 'Interview Rejected');
	   data.addColumn('number', 'Candidates Offered');
	   data.addColumn('number', 'Offer Dropouts');
	   data.addColumn('number', 'Candidates Joined');
	   data.addColumn('number', 'Candidates Billed');

       data.addRows([
           <?php foreach($DATE_COUNT as $key => $date):?>		  
              ['<?php echo $date?>', <?php echo $REQ_COUNT[$key] ? $REQ_COUNT[$key] : '';?>, <?php echo $CV_SENT[$key] ? $CV_SENT[$key] : '';?>, <?php echo $CV_SHORTLIST[$key] ? $CV_SHORTLIST[$key]:'';?>,<?php echo $CV_REJECT[$key]?$CV_REJECT[$key]:'';?>, <?php echo $CV_WAITING[$key]?$CV_WAITING[$key]:'';?>, <?php echo $CV_INTERVIEW[$key]?$CV_INTERVIEW[$key]:'';?>,<?php echo $CV_INT_DROP[$key]?$CV_INT_DROP[$key]:'';?>, <?php echo $CV_INT_REJECT[$key]?$CV_INT_REJECT[$key]:'';?>, <?php echo $CV_OFFER[$key]? $CV_OFFER[$key]:'';?>, <?php echo $CV_OFFER_REJECT[$key]?$CV_OFFER_REJECT[$key]:'';?>, <?php echo $CV_JOIN[$key]?$CV_JOIN[$key]:'';?>, <?php echo $CV_BILL[$key] ? $CV_BILL[$key] : '';?>,],
		   <?php endforeach;?>
       
			  
        ]);
		
	function getValueAt(column, dataTable, row) {
		return dataTable.getFormattedValue(row, column);
	}
		
	var view = new google.visualization.DataView(data);
      view.setColumns([0, 
	  1,{ calc: getValueAt.bind(undefined, 1),  sourceColumn: 1,     type: "string",   role: "annotation" },
	  2,{ calc: "stringify",  sourceColumn: 2,     type: "string",   role: "annotation" },
	  3,{ calc: "stringify",  sourceColumn: 3,     type: "string",   role: "annotation" },
	  4,{ calc: "stringify",  sourceColumn: 4,     type: "string",   role: "annotation" },
	  5,{ calc: "stringify",  sourceColumn: 5,     type: "string",   role: "annotation" },
	  6,{ calc: "stringify",  sourceColumn: 6,     type: "string",   role: "annotation" },
	  7,{ calc: "stringify",  sourceColumn: 7,     type: "string",   role: "annotation" },
	  8,{ calc: "stringify",  sourceColumn: 8,     type: "string",   role: "annotation" },
	  9,{ calc: "stringify",  sourceColumn: 9,     type: "string",   role: "annotation" },
	  10,{ calc: "stringify",  sourceColumn: 10,     type: "string",   role: "annotation" },
	  11,{ calc: "stringify",  sourceColumn: 11,     type: "string",   role: "annotation" },
	  12,{ calc: "stringify",  sourceColumn: 12,     type: "string",   role: "annotation" },
	  ]);
					   
		

	  
     
	   var options = {
	   annotations: { textStyle: {
      fontName: 'arial',
      fontSize: 13,
      bold: false,
      italic: false,
      // The color of the text.
      color: '#871b47',
      // The color of the text outline.
      auraColor: '#d799ae',
      // The transparency of the text.
      opacity: 0.7
    }},
	   title: 'Performance Graph, <?php echo $START_DATE;?> - <?php echo $END_DATE;?>',
		 /*chart: {
          title: 'Performance Graph',
          subtitle: '21-Aug - 04-Sep'
        },*/
		 vAxis: {
          title: 'Date',
		  textStyle: {color: '', fontSize: 12}
        },
        hAxis: {
          title: 'Numbers',
		  gridlines:{color:'#fff'},
		  textStyle: {color: '', fontSize: 12},
		  textPosition : 'none'
		  
        },
		axes: {
          x: {
            0: {side: 'top'}
          }
        },
		  colors: ['#6688e9', '#fcea54', '#12de6d', '#ff0000', '#c8c3c3', '#23E5FF', '#ab1f57',  '#811905','#09418d', '#fabec2', '#0dac01','#d7f477'],
		  legend: {position: 'bottom', maxLines:1, textStyle: {color: '', fontSize: 12}},
          dataOpacity: 0.7,
		  isStacked: true,
		  bar: { groupWidth: '65%' },
		  chartArea:{width:"85%",height:'70%',top:5},
		  tooltip:{textStyle: {color: '', fontSize: 13}},
		  titleTextStyle:{ fontSize: 15},
        };
		
		function mouserOverHandler(){
			call_mouse_over('piechart');
		}
		
		function mouserOutHandler(){
			call_mouse_out('piechart');
		}
		
		function myClickHandler(){
		  var selection = chart.getSelection();
		  var message = '';		 
		  for (var i = 0; i < selection.length; i++) {
			var item = selection[i];
			if (item.row != null && item.column != null) {
			  message += 'row:' + item.row + ',column:' + item.column + '';
			} /*
			else if (item.row != null) {
			  message += 'row:' + item.row + '}';
			} else if (item.column != null) {
			  message += 'column:' + item.column + '';
			}
			*/
		  }
		  
		   if (message == '') {
			message = 'nothing';
		  }else{
			val = message.split(',');
			row_val = val[0].split(':');
			row_sel = row_val[1];
			col_val = val[1].split(':');
			col_sel = col_val[1];
		  }
		  
			var selectedItem = chart.getSelection()[0];		   
			if (selectedItem && selectedItem.row != null) {
				$('.piechart1').val(1); 
				var topping = data.getValue(selectedItem.row, 0);			
			}else{
				return;
			}
			
		  
		 
		 call_overlay(mouse.x,mouse.y,topping,row_sel,col_sel, 'piechart1', 'piechart');
		// alert(row_sel);alert(col_sel);
		  //alert('You selected ' + message);
		}


		var chart = new google.visualization.BarChart(document.getElementById('piechart'));
		google.visualization.events.addListener(chart, 'select', myClickHandler); 
		google.visualization.events.addListener(chart, 'onmouseover', mouserOverHandler);
         google.visualization.events.addListener(chart, 'onmouseout', mouserOutHandler);
        chart.draw(view, options);
      }
	    function call_overlay(x,y,topping,row,col,graphCls,graphDiv){ 
			if($('.'+graphCls).val() == '1'){ 
				show_div = get_module_row(col);
				if(show_div != '' && topping != undefined){
					var offset = $('#'+graphDiv).offset();
					var left = x;
					var top = y;
					$('.graphRow').hide();
					$('.tbl_req_row').hide();
					$('.tbl_cv_sent_row').hide();
					$('.tbl_cv_waiting_row').hide();
					$('.tbl_cv_shortlist_row').hide();
					//$('.tbl_cv_hold_row').hide();
					$('.tbl_cv_interview_row').hide();
					$('.tbl_cv_offer_row').hide();
					$('.tbl_cv_offer_reject_row').hide();
					$('.tbl_cv_join_row').hide();
					$('.tbl_cv_interview_reject_row').hide();
					$('.tbl_cv_interview_drop_row').hide();
					$('.tbl_cv_reject_row').hide();
					$('.tbl_cv_bill_row').hide();
					var theHeight = $('.popover2').height();
					//topping = topping.replace(/\s+/g, '_');
					$('.popover2 .tbl_'+show_div).show();
					$('.graphTable').show();
					$('.tbl_'+show_div).show();
					$('.'+show_div+'_'+topping).show();
					$('.popover2').css('left', (left+10) + 'px');
					$('.popover2').css('top', (top-(theHeight/2)-10) + 'px');
				}else{
					$('.graphRow').hide();
					$('.tbl_req_row').hide();
					$('.tbl_cv_sent_row').hide();
					$('.tbl_cv_shortlist_row').hide();
					$('.tbl_cv_waiting_row').hide();
					//$('.tbl_cv_hold_row').hide();
					$('.tbl_cv_interview_row').hide();
					$('.tbl_cv_offer_row').hide();
					$('.tbl_cv_interview_reject_row').hide();
					$('.tbl_cv_join_row').hide();
					$('.tbl_cv_offer_reject_row').hide();
					$('.tbl_cv_interview_drop_row').hide();
					$('.tbl_cv_reject_row').hide();
					$('.tbl_cv_bill_row').hide();
					}
				
				}
		}
	 
	 function call_mouse_over(div) {
		$('#'+div).css('cursor','pointer')
	 }  
	 
     function call_mouse_out(div) {
		$('#'+div).css('cursor','default')
	  }
	  
	  function get_module_row(col){ 
		var div = '';
		if(col == '1' || col == '2'){
			div = 'req_row';
		}else if(col == '3' || col == '4'){
			div = 'cv_sent_row';
		}else if(col == '5' || col == '6'){
			div = 'cv_shortlist_row';
		}else if(col == '7' || col == '8'){
			div = 'cv_reject_row';
		}else if(col == '9' || col == '10'){
			div = 'cv_waiting_row';
		}else if(col == '11' || col == '12'){
			div = 'cv_interview_row';
		}else if(col == '13' || col == '14'){
			div = 'cv_interview_drop_row';
		}else if(col == '15' || col == '16'){
			div = 'cv_interview_reject_row';
		}else if(col == '17' || col == '18'){
			div = 'cv_offer_row';
		}else if(col == '19' || col == '20'){
			div = 'cv_offer_reject_row';
		}else if(col == '21' || col == '22'){
			div = 'cv_join_row';
		}else if(col == '21' || col == '22'){
			div = 'cv_join_row';
		}else if(col == '23' || col == '24'){
			div = 'cv_bill_row';
		}		
		return div;
	  }
	  
	</script>
	