<div id="maincontainer" class="clearfix">
<?php echo $this->element('header');?>     

 
   <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">                    
				
					<div class="row-fluid mt15">
					
					
								
						<div class="span12">
						
						<?php echo $this->Session->flash();?>   
						
						<?php if($this->request->query['access'] == 'invalid'):	?>					
						<div class="alert alert-error">
								<a class="close" data-dismiss="alert">×</a>
								Invalid Entry
								 </div>
						<?php endif; ?>
						
						
						
						<?php if($this->Session->read('USER.Login.roles_id') == '30'): ?>
						<?php $margin = ''; ?>
						<?php else: ?>
						<?php // $margin = 'margin-right:50px';?>
						<?php endif; ?>
						
						<div class="btns_state pull-right" style="clear:left;<?php echo $margin;?>">
									
									
									<div  class="btn-group clearfix sepH_a">
									
									<?php if($this->Session->read('USER.Login.roles_id') == '34'): ?>
										<button val="<?php echo $this->webroot;?>home/index/ac_view/" rel="tooltip" title="<?php echo $this->Functions->show_view_detail('ac_view',$ac_dash,$rec_dash,$bd_dash);?>" class="dash_view btn <?php echo $ac_dash;?>">Account Holder</button>
										<button val="<?php echo $this->webroot;?>home/index/rec_view/" rel="tooltip" title="<?php echo $this->Functions->show_view_detail('rec_view', $ac_dash,$rec_dash,$bd_dash);?>" class="dash_view btn <?php echo $rec_dash;?>">Recruiter</button>
									
									<?php // elseif($this->Session->read('USER.Login.roles_id') == '33' || $this->Session->read('USER.Login.roles_id') == '35'  || $this->Session->read('USER.Login.roles_id') == '26'
									 // || $this->Session->read('USER.Login.roles_id') == '39'): ?>
									<!--button val="<?php echo $this->webroot;?>home/index/bd_view/" rel="tooltip" title="<?php echo $this->Functions->show_view_detail('bd_view',$ac_dash,$rec_dash,$bd_dash);?>" class="dash_view btn <?php echo $bd_dash;?>">Biz. Development</button>
									<button val="<?php echo $this->webroot;?>home/index/rec_view/" rel="tooltip" title="<?php echo $this->Functions->show_view_detail('rec_view', $ac_dash,$rec_dash,$bd_dash);?>" class="dash_view btn <?php echo $rec_dash;?>">Recruiter</button>
									<button val="<?php echo $this->webroot;?>home/index/ac_view/" rel="tooltip" title="<?php echo $this->Functions->show_view_detail('ac_view',$ac_dash,$rec_dash,$bd_dash);?>" class="dash_view btn <?php echo $ac_dash;?>">Account Holder</button-->

									
									<?php endif; ?>
										
										
									</div>
									
						</div>
						
						
						<div class="btns_state pull-right" style="margin-right:12px;">
					<?php echo $this->Form->create('Home', array('id' => 'formID','class' => 'formID homForm')); ?>

						<div class="dataTables_filter srchBox" id="dt_gal_filter">			
							
							<label> For the period:	&nbsp;</label>
							 <span id="sandbox-container">
						<span  class="input-daterange" id="datepicker">	
						
							<input type="text" class="input-small datepick" name="data[Home][from]" value="<?php echo $this->request->query['from'];?>" aria-controls="dt_gal">
						
		<?php echo $this->Form->input('to', array('div'=> false,'type' => 'text', 'value' => $this->request->query['to'], 'label' => false,  'style'=> "margin-left:3px;", 'class' => 'input-small datepick',  'required' => false, 'placeholder' => '',
				'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 	
									
												
						</span>	
						</span>							
							
							<input type="submit" style="margin-bottom:8px;margin-left:3px;" value="Submit" class="homSearch btn btn-gebo" />
							
							<a class="jsRedirect"  href="<?php echo $this->webroot;?>home/">
							<input value="Reset" style="margin-bottom:8px;margin-left:3px;" type="button" class="btn"/>
							</a>
							
							
						</div>	
						</form>
						
							</div>		
							<h3 class="heading">Dashboard</h3>
							<div class="row tile_count">
            <div class="span2 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Positions</span>
              <div class="count"><?php echo $POS_TAB_COUNT;?></div>
              <!--span class="count_bottom"><i class="green">4% </i> From last Week</span-->
            </div>
            <div class="span2 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Total CV Sent</span>
              <div class="count"><?php echo $CV_SENT_TAB_COUNT;?></div>
              <!--span class="count_bottom"><i class="green"><i class="green icon-circle-arrow-up"></i> 3% </i> From last Week</span-->
            </div>
            <div class="span2 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Shortlisted</span>
              <div class="count green"><?php echo $CV_SHORTLIST_TAB_COUNT;?></div>
              <!--span class="count_bottom"><i class="green"><i class="icon-circle-arrow-up"></i> 34% </i> From last Week</span-->
            </div>
            <div class="span2 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Interviewed</span>
              <div class="count"><?php echo $INTERVIEW_TAB_COUNT;?></div>
              <!--span class="count_bottom"><i class="red"><i class="fa icon-circle-arrow-down"></i> 12% </i> From last Week</span-->
            </div>
            <div class="span2 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Joined</span>
              <div class="count"><?php echo $JOINED_TAB_COUNT; ?> </div>
              <!--span class="count_bottom"><i class="green"><i class="icon-circle-arrow-up"></i> 34% </i> From last Week</span-->
            </div>
            <div class="span1 tile_stats_count" style="width:160px;border:none;">
              <span class="count_top"><i class="fa fa-user"></i> Total Billing</span>
              <div class="count">₹<?php echo $BILLED_AMT_TAB_COUNT ? (int)$BILLED_AMT_TAB_COUNT  : 0;?></div>
              <!--span class="count_bottom"><i class="green"><i class="icon-circle-arrow-up"></i> 34% </i> From last Week</span-->
            </div>
			
			<ul id="clickme" style="top:180px;right:30px;position:absolute" class="icon_list_a clearfix">
			<li rel="tooltip" id="tipDiv"  title="Show More.."   style="cursor: pointer;margin-top:3px;"><i id="moreID" style="margin-top:1px;" class="splashy-arrow_state_blue_expanded"></i></li>
			</ul>
			
			
			  </div>
			  
			
			
			
		  <div class="row tile_count extraHome dn">
		    <div class="span2 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Awaiting Feedback</span>
              <div class="count"><?php echo $CV_WAITING_TAB_COUNT;?></div>
              <!--span class="count_bottom"><i class="green"><i class="icon-circle-arrow-up"></i> 34% </i> From last Week</span-->
            </div>
		  <div class="span2 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> CV Rejected</span>
              <div class="count"><?php echo $CV_REJECT_TAB_COUNT;?></div>
              <!--span class="count_bottom"><i class="green">4% </i> From last Week</span-->
            </div>
			
            <!--div class="span2 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Interview Dropouts</span>
              <div class="count"><?php echo $INTERVIEW_DROP_TAB_COUNT ? $INTERVIEW_DROP_TAB_COUNT : 0;?></div>
              <span class="count_bottom"><i class="green"><i class="green icon-circle-arrow-up"></i> 3% </i> From last Week</span>
            </div-->
			
            <div class="span2 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Interview Rejected</span>
              <div class="count green"><?php echo $INTERVIEW_REJ_TAB_COUNT ? $INTERVIEW_REJ_TAB_COUNT : 0;?></div>
              <!--span class="count_bottom"><i class="green"><i class="icon-circle-arrow-up"></i> 34% </i> From last Week</span-->
            </div>
			
            <div class="span2 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Offered</span>
              <div class="count"><?php echo $OFFER_TAB_COUNT;?></div>
              <!--span class="count_bottom"><i class="red"><i class="fa icon-circle-arrow-down"></i> 12% </i> From last Week</span-->
            </div>
			
			<div class="span2 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Offer Rejected</span>
              <div class="count"><?php echo $OFFER_REJ_TAB_COUNT;?></div>
              <!--span class="count_bottom"><i class="red"><i class="fa icon-circle-arrow-down"></i> 12% </i> From last Week</span-->
            </div>
			
			
            <div class="span2 tile_stats_count"  style="width:160px;border:none;">
              <span class="count_top"><i class="fa fa-user"></i> Candidates Billed</span>
              <div class="count"><?php echo $BILLED_TAB_COUNT; ?> </div>
              <!--span class="count_bottom"><i class="green"><i class="icon-circle-arrow-up"></i> 34% </i> From last Week</span-->
            </div>
          
			</div>
			
							<!--div class="flexslider2">
							<ul class="slides dshb_icoNav tac  mt15">
								<li><a rel="tooltip"  title="Positions Created" href="<?php echo $this->webroot;?>position/"><span class="label label-info"><?php echo $POS_TAB_COUNT;?></span> <strong>Positions</strong></a></li>
								<li><a rel="tooltip"  title="CV Sent" href="<?php echo $this->webroot;?>resume/"><span class="label label-warning"><?php echo $CV_SENT_TAB_COUNT;?> </span> <strong>CV</strong> Sent</a></li>
								<li><a rel="tooltip"  title="CV Awaiting Feedback" href="<?php echo $this->webroot;?>resume/"><span class="label label"><?php echo $CV_WAITING_TAB_COUNT;?></span> <strong>Awaiting</strong></a></li>
								<li><a rel="tooltip"  title="CV Shortlisted" href="<?php echo $this->webroot;?>resume/"><span class="label label-success"><?php echo $CV_SHORTLIST_TAB_COUNT;?> </span> <strong>Shortlisted</strong></a></li>
								<li><a rel="tooltip"  title="CV Rejected" href="<?php echo $this->webroot;?>resume/"><span class="label label-important"><?php echo $CV_REJECT_TAB_COUNT;?> </span> <strong>CV Rejected</strong></a></li>
								<li><a rel="tooltip"  title="Interview Scheduled" href="<?php echo $this->webroot;?>hiring/interview.php"><span class="label label-warning" ><?php echo $INTERVIEW_TAB_COUNT;?> </span> <strong>Scheduled </strong></a></li>
								<li><a rel="tooltip"  title="Interview Dropouts" href="<?php echo $this->webroot;?>hiring/interview.php"><span class="label label-info"><?php echo $INTERVIEW_DROP_TAB_COUNT ? $INTERVIEW_DROP_TAB_COUNT : 0;?></span><strong>Dropouts</strong></a></li>
								<li><a rel="tooltip"  title="Interview Rejected" href="<?php echo $this->webroot;?>hiring/interview.php"><span class="label label-success"><?php echo $INTERVIEW_REJ_TAB_COUNT ? $INTERVIEW_REJ_TAB_COUNT : 0;?></span><strong>Rejected</strong></a></li>
								<li><a rel="tooltip"  title="Offers Made" href="<?php echo $this->webroot;?>resume/"><span class="label label-danger"><?php echo $OFFER_TAB_COUNT;?></span> <strong>Offered</strong></a></li>
								<li><a rel="tooltip"  title="Offer Dropouts" href="<?php echo $this->webroot;?>resume/"><span class="label label-info"><?php echo $OFFER_REJ_TAB_COUNT;?> </span> <strong>Dropouts</strong></a></li>
								<li><a rel="tooltip"  title="Candidates Joined" href="<?php echo $this->webroot;?>resume/"><span class="label label-success"><?php echo $JOINED_TAB_COUNT; ?> </span><strong> Joined</strong></a></li>
								<li><a rel="tooltip"   title="Candidates Billed" href="<?php echo $this->webroot;?>resume/"><span class="label label-warning"><?php echo $BILLED_TAB_COUNT;?> </span> <strong>Billed</strong></a></li>
								<li><a rel="tooltip"  title="Recruiter Contributions"  href="<?php echo $this->webroot;?>hiring/billing.php"><span class="label label-info">₹<?php echo $BILLED_AMT_TAB_COUNT;?></span> <strong>Contribution</strong> </a></li>
							</ul>
							</div-->
						</div>
					</div>
					
					
					<div class="row-fluid" style="margin-top:10px">
						
										
					   
						<div class="span6">
							<h3 class="heading">Productivity <small>Individual</small>
								
									</h3>

							<table class="table table-striped table-bordered ">
								<thead class="">
									<tr>
									<th  class="optional">Date</th>
										<th class=""  style="text-align:center">CTC</th>
										<th  class="optional"   style="text-align:center">Expected</th>
										<th class="optional"   style="text-align:center">Actual</th> 
										<th   style="text-align:center">No. Positions</th>
									</tr>
								</thead>
								<tbody class="">
								<?php //foreach($client_data as $data):?>
									<!--tr>
										<td><a href="<?php echo $this->webroot;?>client/view/<?php echo $data['Client']['id'];?>"><?php echo $data['Client']['client_name'];?></a></td>
										<td><?php echo $data['ResLocation']['location'];?></td>
										<td><?php echo $data['Creator']['first_name'];?></td>
										<td><?php echo $this->Functions->format_date($data['Client']['created_date']);?></td>
										<td style="text-align:center"><a   href="<?php echo $this->webroot;?>position/?keyword=<?php echo $data['Client']['client_name'];?>"><?php echo $data[0]['req_count'];?></a></td>										
									</tr-->
								<?php //endforeach; ?>	
		
								<tr>
									<td>02/11/2017</td>
									<td style="text-align:center">4.5 L</td>
									<td style="text-align:center" >4</td>
									<td style="text-align:center" >6</td>
									<td style="text-align:center" width="100" style="text-align:center"><a href="#">4</a></td>										
								  </tr>							
								<tr>
									<td >01/11/2017</td>
									<td style="text-align:center" >4.5 L</td>
									<td style="text-align:center" >4</td>
									<td style="text-align:center" >6</td>
									<td style="text-align:center"><a href="#">4</a></td>										
								  </tr>	
								<tr>
									<td>31/10/2017</td>
									<td style="text-align:center" >4.5 L</td>
									<td style="text-align:center" >4</td>
									<td style="text-align:center" >6</td>
									<td style="text-align:center"><a href="#">4</a></td>										
								  </tr>	
								<tr>
									<td>30/10/2017</td>
									<td style="text-align:center" >4.5 L</td>
									<td style="text-align:center" >4</td>
									<td style="text-align:center" >6</td>
									<td  style="text-align:center"><a href="#">4</a></td>										
								  </tr>	
									<tr>
									<td>29/10/2017</td>
									<td style="text-align:center" >4.5 L</td>
									<td style="text-align:center" >4</td>
									<td style="text-align:center" >6</td>
									<td  style="text-align:center"><a href="#">4</a></td>										
								  </tr>		
								<tr>
									<td>28/10/2017</td>
									<td style="text-align:center" >4.5 L</td>
									<td style="text-align:center" >4</td>
									<td style="text-align:center" >6</td>
									<td style="text-align:center"><a href="#">4</a></td>										
								  </tr>	
								<tr>
									<td>27/10/2017</td>
									<td style="text-align:center" >4.5 L</td>
									<td style="text-align:center" >4</td>
									<td style="text-align:center" >6</td>
									<td style="text-align:center"><a href="#">4</a></td>										
								 </tr>									  
								</tbody>
							</table>
						</div>
						
						<div class="span6">
							<h3 class="heading">Business Conversion <small>Individual</small></h3>
							
							<table class="table table-striped table-bordered">
							
							<thead class="">
									<tr>
										<th style="text-align:center" colspan="2">Vacancies Related</th>
										<th  style="text-align:center"  colspan="2">CV Quality & Contribution</th>
									</tr>
								</thead>
								
								
								<tbody class="">
									<tr>
										<td class="optional">Positions Worked</td>
										<td style="text-align:center" class="optional"><a href="#">6</a></td>
										<td  class="essential persist">CVs Submitted</td>
										<td style="text-align:center" class="optional"><a href="#">6</a></td>
									</tr>
									<tr>
										<td class="optional">Vacancies Handled</td>
										<td style="text-align:center" class="optional"><a href="#">10</a></td>
										<td  class="essential persist">Average Lead Time (Days)</td>
										<td style="text-align:center" class="optional"><a href="#">5</a></td>
									</tr>
									<tr>
										<td class="optional">Vacancies Billed</td>
										<td style="text-align:center" class="optional"><a href="#">2</a></td>
										<td  class="essential persist">CVs Billed</td>
										<td style="text-align:center" class="optional"><a href="#">1</a></td>
									</tr>
									<tr>
										<td class="optional">Vacancies Not Billed</td>
										<td style="text-align:center" class="optional"><a href="#">8</a></td>
										<td  class="essential persist">CVs Not Billed</td>
										<td style="text-align:center" class="optional"><a href="#">5</a></td>
									</tr>
									
									<tr>
										<td class="optional">Business Value</td>
										<td style="text-align:center" class="optional"><a href="#">408000</a></td>
										<td  class="essential persist">% of Final Interview Candidates</td>
										<td style="text-align:center" class="optional"><a href="#">50%</a></td>
									</tr>
									<tr>
										<td class="optional">Avg Lead Time for Billing (Days)</td>
										<td style="text-align:center" class="optional"><a href="#">100</a>	</td>
										<td  class="essential persist">Billing Value</td>
										<td style="text-align:center" class="optional"><a href="#">180000</a></td>
									</tr>
									<tr>
										<th class="optional">Business Conversion</th>
										<th style="text-align:center" class="optional">44%</td>
										<th  class="essential persist">Individual Contribution</th>
										<th style="text-align:center" class="optional">120000</th>
									</tr>
								</tbody>
								
							</table>
                        </div>
						
						
					</div>
					
					
					
					<div class="row-fluid">
						<div class="span6">
							<h3 class="heading">Daily Activity <small>Overview</small>
								<div class="" style="float:right;font-size:13px;">
									<ul class="nav nav-pills ">
									<li class="dropdown">
										<a  style="color: #fff !important; background-color: #206484; border-color: #999;" class="dropdown-toggle" data-toggle="dropdown" href="#">
										
										<?php if($this->request->query['type'] == 'req'):
										echo 'Requirement Graph';
										else:
										echo 'As Is Graph ';
										endif;
										?>						
										
										<b class="caret" style="color: #fff !important;"></b></a>
										<ul class="dropdown-menu sort-by">
											<li><a href="<?php echo $this->webroot;?>home/?type=req&from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>" class="sort" data-sort="sl_name2">Requirement Graph</a></li>
											<li><a href="<?php echo $this->webroot;?>home/?from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>" class="sort" data-sort="sl_date2">As Is Graph</a></li>
											<li><a class="iframeBox" val="95_95" href="<?php echo $this->webroot;?>home/?action=view_graph&from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>&type=<?php echo $this->request->query['type'];?>" class="sort" data-sort="sl_date2">Enlarge & Print Graph</a></li>


										</ul>
										
										<input type="hidden" id="graph_pos" value="bottom"/>
										
									</li>
									</ul>
									
									</div>
									</h3>
							<div id="piechart" style="height:468px"></div>

							
						</div>
						<div class="span6">
							<h3 class="heading">Calendar</h3>
		<iframe id="eventFrame" src="<?php echo $this->webroot;?>full_calendar/" width="100%" height="500px" frameborder="0"></iframe> 

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
											
											<li><a href="javascript:void(0)" id="filter-1">AH Pending</a></li>
											<li><a href="javascript:void(0)" id="filter-2">AH Rejected</a></li>
											<li><a href="javascript:void(0)" id="filter-3">AH Validated</a></li>
											<li><a href="javascript:void(0)" id="filter-4">CV Sent</a></li>
											<li><a href="javascript:void(0)" id="filter-5">CV Shortlisted</a></li>
											<li><a href="javascript:void(0)" id="filter-6">CV Rejected</a></li>
											<li><a href="javascript:void(0)" id="filter-7">CV On Hold</a></li>
											
											
										</ul>
									</li>
								</ul>
							</div>
							<ul class="list user_list2">
							
							<?php foreach($resume_data as $data):?>
								<li>
<span class="s_color sl_date2" style="font-size:12px;color:#b2abab;"><?php echo date('d,M', strtotime($data['ReqResume']['modified_date']));?>, </span>
<span class="label label-<?php echo $this->Functions->get_res_status_color($data['ReqResume']['status_title']);?> pull-right sl_status2"><?php echo $this->Functions->get_status_crisp($data['ReqResume']['stage_title'], $data['ReqResume']['status_title']);?></span>
<a  href="<?php echo $this->webroot;?>resume/view/<?php echo $data['Resume']['id'];?>" class="sl_name2"><?php echo $data[0]['full_name'];?></a><br />
<small class="s_color sl_email2"> <?php echo $data['Resume']['email_id'];?> <i class="splashy-bullet_blue_small"></i> <?php echo $data['Resume']['mobile'];?></small>

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
											<li><a href="javascript:void(0)" id="filter-11">Interview Scheduled</a></li>
											<li><a href="javascript:void(0)" id="filter-12">Interview Selected</a></li>
											<li><a href="javascript:void(0)" id="filter-13">Interview Rejected</a></li>
											<li><a href="javascript:void(0)" id="filter-14">Interview Re-Scheduled</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<ul class="list user_list">
								<?php foreach($interview_data as $data):?>
								<li>
<span class="s_color sl_date" style="font-size:12px;color:#b2abab;"><?php echo date('d,M', strtotime($data['ReqResume']['modified_date']));?>, </span>
									<span class="label label-<?php echo $this->Functions->get_int_status_color($data['ReqResume']['status_title']);?> pull-right">
									<span class="sl_status"><?php echo $this->Functions->get_status_crisp($data['ReqResume']['stage_title'], $data['ReqResume']['status_title']);?></span></span>
									<a  href="<?php echo $this->webroot;?>resume/view/<?php echo $data['Resume']['id'];?>" class="sl_name"><?php echo $data[0]['full_name'];?></a><br />
									<small class="s_color sl_email"><?php echo $data['Resume']['email_id'];?> <i class="splashy-bullet_blue_small"></i> <?php echo $data['Resume']['mobile'];?></small>
								</li>
								
								<?php endforeach; ?>
							</ul>
							<div class="pagination"><ul class="paging bottomPaging"></ul></div>
                        </div>
                    
					
					</div>
					
					
                    <div class="row-fluid">
                    
                    
					  <div class="span6">
							<div class="heading clearfix">
								<h3 class="pull-left">Recent Clients</h3>
								<h3 class="pull-right label label-warning"><a href="<?php echo $this->webroot;?>client/"  style="color:#ffffff;">View All</a></h3>
								<!--span class="pull-right label label-important">5 New </span-->
							</div>
							<table class="table table-striped table-bordered  dTableR" id="dt_a">
								<thead class="">
									<tr>
										<th class="">Client</th>
										<th  class="optional">Location</th>
										<th class="optional">Created By</th> 
										<th  class="optional">Created Date</th>
										<th  class="essential" style="text-align:center">No. Positions</th>
									</tr>
								</thead>
								<tbody class="">
								<?php foreach($client_data as $data):?>
									<tr>
										<td ><a   href="<?php echo $this->webroot;?>client/view/<?php echo $data['Client']['id'];?>"><?php echo $data['Client']['client_name'];?></a></td>
										<td ><?php echo $data['ResLocation']['location'];?></td>
										<td><?php echo $data['Creator']['first_name'];?></td>
										<td><?php echo $this->Functions->format_date($data['Client']['created_date']);?></td>
										<td  width="100" style="text-align:center"><a   href="<?php echo $this->webroot;?>position/?client_id=<?php echo $data['Client']['id'];?>&srch_status=1"><?php echo $data[0]['req_count'];?></a></td>										
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
							<table class="table table-striped table-bordered  dTableR" id="dt_z">
								<thead class="">
									<tr>
										<th class="optional">Job Title</th>
										<th  class="essential persist">Client</th>
										<th class="optional">Status</th>
										<th class="optional">Created Date</th>
										<th class="essential" style="text-align:center">CV Posted</th>
										<!--th class="essential">Action</th-->
									</tr>
								</thead>
								<tbody class="">
								<?php foreach($position_data as $data):?>
									<tr>
										<td><a   href="<?php echo $this->webroot;?>position/view/<?php echo $data['Position']['id'];?>"><?php echo $data['Position']['job_title'];?></a></td>
										<td><?php echo $data['Client']['client_name'];?></td>
										<td><span class="label label-<?php echo $this->Functions->get_req_status_color($data['ReqStatus']['title']);?>"><?php echo $data['ReqStatus']['title'];?></span></td>
										<td><?php echo $this->Functions->format_date($data['Position']['created_date']);?></td>
										<td style="text-align:center"><a   href="<?php echo $this->webroot;?>resume/?srch_status=1&spec=<?php echo $data['Position']['id'];?>"><?php echo $data[0]['cv_sent'];?></a></td>
										
									</tr>
									<?php endforeach; ?>	
								</tbody>
							</table>
                        
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
											<li><a href="javascript:void(0)" id="filter-21">Offer Pending</a></li>
											<li><a href="javascript:void(0)" id="filter-22">Offer Accepted</a></li>
											<li><a href="javascript:void(0)" id="filter-23">Offer Rejected</a></li>
											
										</ul>
									</li>
								</ul>
							</div>
							<ul class="list user_list3">
							
								<?php foreach($offer_data as $data):?>
								<li>
								<span class="s_color sl_date3" style="font-size:12px;color:#b2abab;"><?php echo date('d,M', strtotime($data['ReqResume']['modified_date']));?>, </span>
									<span class="label label-<?php echo $this->Functions->get_offer_status_color($data['ReqResume']['status_title']);?> pull-right">
									<span class="sl_status3"><?php echo $this->Functions->get_status_crisp($data['ReqResume']['stage_title'], $data['ReqResume']['status_title']);?></span></span>
									<a   href="<?php echo $this->webroot;?>resume/view/<?php echo $data['Resume']['id'];?>" class="sl_name3"><?php echo $data[0]['full_name'];?></a><br />
									<small class="s_color sl_email3"><?php echo $data['Resume']['email_id'];?> <i class="splashy-bullet_blue_small"></i> <?php echo $data['Resume']['mobile'];?></small>
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
											<li><a href="javascript:void(0)" id="filter-31">Joined</a></li>
											<li><a href="javascript:void(0)" id="filter-32">Not Joined</a></li>
											<li><a href="javascript:void(0)" id="filter-33">Deferred</a></li>

										</ul>
									</li>
								</ul>
							</div>
							<ul class="list user_list4">
								<?php foreach($join_data as $data):?>
								<li>
							<span class="s_color sl_date4" style="font-size:12px;color:#b2abab;"><?php echo date('d,M', strtotime($data['ReqResume']['modified_date']));?>, </span>
									<span class="label label-<?php echo $this->Functions->get_join_status_color($data['ReqResume']['status_title']);?> pull-right">
									 <span class="sl_status4"><?php echo $this->Functions->get_status_crisp($data['ReqResume']['stage_title'], $data['ReqResume']['status_title']);?></span></span>
									<a  href="<?php echo $this->webroot;?>resume/view/<?php echo $data['Resume']['id'];?>" class="sl_name4"><?php echo $data[0]['full_name'];?></a><br />
									<small class="s_color sl_email4"><?php echo $data['Resume']['email_id'];?> <i class="splashy-bullet_blue_small"></i> <?php echo $data['Resume']['mobile'];?></small>
								</li>							
							<?php endforeach; ?>
								
								</ul>
							<div class="pagination"><ul class="paging bottomPaging"></ul></div>
                        </div>
                    
					
					</div>
                        
                        
                </div>
            
			
			
			</div>
            
		
		<?php echo $this->element('graph_api');?>
		
		
		
		
            
			 
			