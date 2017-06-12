{* Purpose : To add the menu to all files.
   Created : Nikitasa
   Date : 16-07-2016 *}

<div id="navigation">
		<div class="container-fluid">
			<ul class='main-nav'>
			
			<li class="dropdown" >
					<a href="/hrhome/" style="font-size:20px" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Incentive</span>					
						
					</a>
					<ul class="dropdown-menu" style="left:0">
						<li>
							<a href="#">Home</a>
						</li>
						<li>
							<a href="#" class="">Finance</a>
							
						</li>
						<li>
							<a href="#" class="">Work Planner</a>
						</li>
						<li>
							<a href="#" class="">Biz Tour</a>
						</li>
												<li>
							<a href="#" class="">BD</a>
						</li>
											</ul>
				</li>
				
				
				<li class="">
					<a href="dashboard.php">
						<span>Dashboard</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>ES Billing</span>
							<span class="caret"></span> 
							
					</a>
					<ul class="dropdown-menu">
					
					<li>
					<a href="list_es_billing.php">List Billing</a>
					</li>			
					<li>
					<a href="add_es_billing.php">Add Billing</a>
					</li>
					
					</ul>
				</li>
				
				<li class="dropdown">
			
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>FLR Billing</span>
						<span class="caret"></span>
							
							
					</a>
					<ul class="dropdown-menu">
					<li>
					<a href="list_flr_billing.php">List Billing</a>
					</li>
					<li>
					<a href="add_flr_billing.php">Add Billing</a>
						</li>
					
					</ul>
				</li>
			   
			   <li class="dropdown">
						<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Approve Billing</span>
						<span class="caret"></span>
						<span class="label label-lightred bubble">2</span>		
							
					</a>
					<ul class="dropdown-menu">
					<li>
					<a href="approve_es_billing.php">Approve ES Billing <span class="label label-lightred bubble">2</span></a>
					</li>
					<li>
					<a href="approve_flr_billing.php">Approve FLR Billing <span class="label label-lightred bubble">2</span></a>
					</li>
					</ul>
				</li>
			   			
				<li class="dropdown">
					<a href="list_ticket.php" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Payment</span>
						<span class="caret"></span>
						
							
					</a>
					<ul class="dropdown-menu">
					<li>
					<a href="list_es_payment.php">ES Payment </a>
					</li>
					<li>
					<a href="list_flr_payment.php">FLR Payment </a>
					</li>
					
					
					</ul>
				</li>
					
				<li class="dropdown">
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Incentive</span>
						<span class="caret"></span>
							
					</a>
					<ul class="dropdown-menu">
					<li>
					<a href="list_incentive_es.php">ES</a>
					</li>
					<li>
					<a href="list_incentive_flr.php">FLR</a>
					</li>
					
					</ul>
					
				</li>
				<li class="dropdown">
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Bonus</span>
						<span class="caret"></span>
							
							
					</a>
					<ul class="dropdown-menu">
					<li>
					<a href="bonus.php">Bonus</a>
					</li>
					
					
					
					</ul>
				</li>
				
			<li class="active dropdown">
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Settings</span>
						<span class="caret"></span>
							
							
					</a>
					<ul class="dropdown-menu">
					<li>
					<a href="list_grade.php">Grade</a>
					</li>
					<li>
					<a href="list_base_target_es.php">Base Target - ES</a>
					</li>
					<li>
					<a href="list_eligibility_es.php">Eligibility - ES</a>
					</li>
					<li>
					<a href="list_sharing_criteria_es.php">Sharing Criteria - ES</a>
					</li>
					<li>
					<a href="list_base_target_flr.php">Base Target - FLR</a>
					</li>
					<li>
					<a href="list_eligibility_flr.php">Eligibility - FLR</a>
					</li>
						<li>
					<a href="list_sharing_criteria_flr.php">Sharing Criteria - FLR</a>
					</li>
						<li>
					<a href="list_bonus_share.php">Bonus - Share</a>
					</li>
					</ul>
				</li>
			
			</ul>
			
			<div class="user" style="">
				<ul class="icon-nav">
					
				
			<li class="dropdown language-select">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-reply"></i><span>Switch Module 
						<span class="switchLoad"></span>
						<span class="label label-lightred bubble switchPre switchTot" id="total_count" style="top:14px; right:12px "></span></span>
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="#"><i class="icon-home"></i><span>Home</span></a>
							</li>
							
							<li>
								<a href="#" class=""><i class="icon-money"></i><span>Finance
								<span class="switchLoad-sub"></span></span>
							<span class="label label-lightred bubble switchFin switchPre"  id="fin_count"></span>
							</a>
							</li>
							<li>
								<a href="#" class=""><i class="icon-check"></i><span>Work Planner
								<span class="switchLoad-sub"></span></span>
								<span class="label label-lightred bubble switchWork switchPre"  id="tsk_count"></span></a>
							</li>
						
						<li>
								<a href="#" class=""><i class="icon-plane"></i><span>Biz Tour
								<span class="switchLoad-sub"></span></span>
								<span class="label label-lightred bubble switchTour switchPre"  id="tour_count"></span>
								</a>
							</li>
												<li>
								<a href="#" class=""><i class="icon-lightbulb"></i><span>BD
								<span class=""></span></span>
								<span class="label label-lightred bubble switchTour switchPre"  id="bd_menu_count"></span></a>
							</li>
													</ul>
					</li>
			
				
				<li class='dropdown language-select'>
						<a href="#" class='dropdown-toggle' data-toggle="dropdown"><span><i class="icon-signin"></i>  Ravichandran 
						</span></a>
							<ul class="dropdown-menu pull-right">
						<!--li>
							<a href="#">Edit profile</a>
						</li>
						<li>
							<a href="#">Account settings</a>
						</li-->
						<li>
							<a href="#"> Sign out</a>
						</li>
					</ul>
					</li>
					</ul>	
			</div>
		</div>
	</div>