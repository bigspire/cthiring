<?php if(empty($noHead)): ?>
		<div id="maincontainer" class="clearfix">
		
			<?php echo $this->element('header');?>
			
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
				
					<div class="row-fluid footer_div">
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
                                   Search Position
                                </li>
                            </ul>
                        </div>
                    </nav>
					
					
								<div class="srch_buttons">
							<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>
							<a class="notify jsRedirect" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Downloading Excel... Please wait..."   href="<?php echo $this->webroot;?>position/?action=export&<?php echo $this->Functions->get_url_vars($this->request->query);?>"><input type="button" value="Export Excel" class="btn btn-warning"/></a>

							<a class="jsRedirect" data-notify-time = '3000'   href="<?php echo $this->webroot;?>position/add/">
							<input type="button" value="Create Position" class="btn btn-info"/></a>						
							</div>
						
						
					<?php echo $this->Session->flash();?>
				
	
<div class="heading clearfix">
								<h3 class="pull-left">Positions <small>list</small></h3>
					
							</div>
						
	<?php echo $this->Form->create('Position', array('id' => 'formID','class' => 'formID')); ?>
		
							<div class="dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							<label style="margin-top:18px;"><a class="jsRedirect" href="<?php echo $this->webroot;?>position/"><input value="Reset" type="button" class="btn"/></a></label>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
							
							<label>Status: 
							<?php echo $this->Form->input('status', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 'selected' => $this->params->query['status'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $stList)); ?> 

							
							</label>
						<?php if($this->Session->read('USER.Login.rights') == '5'):?>	
							<label>Employee: 
						<?php echo $this->Form->input('emp_id', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 'selected' => $this->params->query['emp_id'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $empList)); ?> 

															
													
							</label>
							<label>Branch: 
							<?php echo $this->Form->input('loc', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 'selected' => $this->params->query['loc'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $locList)); ?> 

							</label>
							
							<?php endif; ?>

							<label>To Date: <input type="text" name="data[Position][to]" value="<?php echo $this->request->query['to'];?>" class="input-small datepick" aria-controls="dt_gal"></label>

							<label>From Date: <input type="text" class="input-small datepick" name="data[Position][from]" value="<?php echo $this->request->query['from'];?>" aria-controls="dt_gal"></label>
							<label style="margin-left:0">Keyword: <input type="text" placeholder="Job Title or Client Name.." name="data[Position][keyword]" id = "SearchText" value="<?php echo $this->params->query['keyword'];?>" class="input-large" aria-controls="dt_gal"></label>

														</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="<?php echo $this->webroot;?>position/" id="webroot">
						</form>
					<?php endif; ?>	

<?php if(!empty($noHead)): ?>
<div style="padding:15px;">
							
	<?php echo $this->Session->flash();?>
<div class="heading clearfix">
								<h3 class="pull-left">Positions <small>list</small></h3>
					
							</div>
					
							
<?php endif; ?>				
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>

										<th width="210"><?php echo $this->Paginator->sort('job_title', 'Job Title', array('escape' => false, 'direction' => 'desc'));?></th>										
										<th width="120"><?php echo $this->Paginator->sort('Client.client_name', 'Client', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="80"><?php echo $this->Paginator->sort('no_job', 'Vacancies', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="75"><?php echo $this->Paginator->sort('team_member', 'Team', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="75">CV Sent</th>
										<th width="75">Joined</th>
										<th width="100"><?php echo $this->Paginator->sort('status', 'Status', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="75"><?php echo $this->Paginator->sort('Creator.first_name', 'Created By', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="75"><?php echo $this->Paginator->sort('created_date', 'Created', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="75"><?php echo $this->Paginator->sort('modified_date', 'Modified', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="75">Message</th>
										<th width="50" style="text-align:center">Actions</th>
									</tr>
								</thead>

								<tbody>
								
								
										
									<?php foreach($data as $req):?>
									<tr>
										<?php if(!empty($noHead)): $target = "target='_blank'"; endif;?>
										<td width=""><a <?php echo $target;?> href="<?php echo $this->webroot;?>position/view/<?php echo $req['Position']['id'];?>/"><?php echo ucwords($req['Position']['job_title']);?></a></td>
										<td width="" ><?php echo $req['Client']['client_name'];?></td>
										<td  width=""><?php echo $req['Position']['no_job'];?></td>
										
						
						<td width=""><?php echo $req[0]['team_member'];?></td>
						<td width=""><?php echo $req[0]['cv_sent'];?>
						<td width=""><?php echo $this->Functions->get_total_joined($req[0]['joined']);?></td>
						<td width=""><span class="label label-<?php echo $this->Functions->get_req_status_color($req['ReqStatus']['title']);?>"><?php echo $req['ReqStatus']['title'];?></span>			
										</td>
						<td width=""><?php echo $req['Creator']['first_name'];?></td>
						<td width=""><?php echo $this->Functions->format_date($req['Position']['created_date']);?></td>
						<td width=""><?php echo $this->Functions->format_date($req['Position']['modified_date']);?></td>
									<th>
									<a href="<?php echo $this->webroot;?>position/view_message/<?php echo $req['Position']['id'];?>" class="iframeBox unreadLink" val="70_80" rel="tooltip" title="Messages"><i class="icon-envelope"></i></a> 
									<?php if($req[0]['read_count'] > 0):?>
									<span class="label label-important unreadCount"><?php echo $req[0]['read_count'];?></span>
									<?php endif; ?>
									</th>
									
	<td class="actionItem" style="text-align:center">
	<a href="<?php echo $this->webroot;?>position/edit/<?php echo $req['Position']['id'];?>/" class="btn  btn-mini"  rel="tooltip" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
										</td>
								</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
							
												<?php echo $this->element('paging');?>
						
					</div>
					
				<?php if(empty($noHead)): ?>	
					</div>
                </div>
				
            </div>
            
		</div>
		
		</div>
		<?php else: ?>	
		</div>
		
		
		<?php endif; ?>