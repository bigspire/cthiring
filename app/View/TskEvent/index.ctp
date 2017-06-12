<?php echo $this->element('tsk_menu'); ?>
		
	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Event Calendar</h1>
						
						
					</div>
					
					<div class="pull-right">
						
								<ul class="nav nav-pills" style="margin:20px 180px 0 0;">
											
												<li class='dropdown active'>
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">Calendar Themes <span class="caret"></span></a>
													<ul class="dropdown-menu">
														<li><a href="<?php echo $this->webroot;?>tskevent/?theme=default">Default</a></li>
														<li><a href="<?php echo $this->webroot;?>tskevent/?theme=sky_blue">Blue</a></li>
														<li><a href="<?php echo $this->webroot;?>tskevent/?theme=light_orange">Orange</a></li>
														<li><a href="<?php echo $this->webroot;?>tskevent/?theme=grey">Grey</a></li>

													</ul>
												</li>
											</ul>
					</div>
				
				</div>
				<div class="breadcrumbs"  style="width:86%">
					<ul>
						<li>
							<a href="<?php echo $this->webroot;?>tskhome/">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						
						
						
						<li>
							<a href="<?php echo $this->webroot;?>tskevent/">My Events</a>
							<i class="icon-angle-right"></i>
						</li>
						
						<li>
							<a href="#">Event Calendar</a>
							
						</li>
						
						
					</ul>
					
				</div>
				
				
				
				<?php echo $this->Session->flash();?>
				
					<div class="row-fluid" style="padding-bottom:10px;">
					
					<?php echo $this->element('event_menu');?>	
					
					
					

					
					<div class="span12" style="float:left;width:70%">
						
						
					<iframe id="eventFrame" src="<?php echo $this->webroot;?>full_calendar/?theme=<?php echo $user_theme;?>" width="100%" height="580px" frameborder="0"></iframe> 

					
						
					
					<input type="hidden" value="<?php echo $this->Functions->get_event_theme($this->request->query['theme']);?>" id="event_theme">
					</div>
				</div>
					
					
				</div>
		
			
			</div>
			

		</div>	
			
		
		
		
		
				
		


