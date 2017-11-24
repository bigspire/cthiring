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
                                   <?php echo $this->Functions->show_list_page($this->request->params['pass'][0]);?> Position
                                </li>
                            </ul>
                        </div>
                    </nav>
					
					
								<div class="srch_buttons">

							<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="homeSrch btn btn-success"/></a>
							<?php if($this->request->params['pass'][0] != 'pending' && ($this->Session->read('USER.Login.roles_id') == '33' 
							|| $this->Session->read('USER.Login.roles_id') == '39')):?>
							<a class="notify jsRedirect" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Downloading Excel... Please wait..."   href="<?php echo $this->webroot;?>position/?action=export&<?php echo $this->Functions->get_url_vars($this->request->query);?>"><input type="button" value="Export Excel" class="btn btn-warning"/></a>
							<?php endif; ?>
							 <?php if($create_position == '1' && $this->Session->read('USER.Login.roles_id') == '34'):?>
							<a class="jsRedirect" data-notify-time = '3000'   href="<?php echo $this->webroot;?>position/add/">
							<input type="button" value="Create Position" class="btn btn-info"/></a>		
							<?php endif; ?>
							
							</div>
						
						
					<?php echo $this->Session->flash();?>
				
	

						
	<?php echo $this->Form->create('Position', array('id' => 'formID','class' => 'formID')); ?>
		
							<div class="dn dataTables_filter srchBox homeSrchBox" id="dt_gal_filter">
							
							<label style="margin-left:0">Keyword: <input type="text" placeholder="Search Keywords Here.." name="data[Position][keyword]" id = "SearchText" value="<?php echo $this->params->query['keyword'];?>" class="input-large" aria-controls="dt_gal"></label>
							
							<span id="sandbox-container">
						<span  class="input-daterange" id="datepicker">	
							<label>From Date: <input placeholder="dd/mm/yyyy" type="text" class="input-small" name="data[Position][from]" value="<?php echo $this->request->query['from'];?>" aria-controls="dt_gal"></label>

							<label>To Date: <input  placeholder="dd/mm/yyyy" type="text" name="data[Position][to]" value="<?php echo $this->request->query['to'];?>" class="input-small" aria-controls="dt_gal"></label>

						</span>	
						</span>	
							
							
							<?php if($this->request->params['pass'][0] != 'pending'):?>	
							<label>Status: 
							<?php echo $this->Form->input('status', array('div'=> false,'type' => 'select', 
							'label' => false, 'class' => 'input-medium', 'empty' => 'Select',
							'selected' => $this->params->query['status'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $stList)); ?> 
							<?php endif; ?>
							
							</label>
							<?php if($approveUser):?>
							<label>Employee: 
						<?php echo $this->Form->input('emp_id', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 'selected' => $this->params->query['emp_id'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $empList)); ?> 					
							</label>
						<?php endif; ?>
						
						<?php if($this->Session->read('USER.Login.roles_id') == '33' || $this->Session->read('USER.Login.roles_id') == '35' || $this->Session->read('USER.Login.roles_id') == '39'):?>	
							<label>
							Branch: 
							<?php echo $this->Form->input('loc', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 'selected' => $this->params->query['loc'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $locList)); ?> 
							</label>
						<?php endif; ?>
					<?php if($this->request->params['pass'][0] != 'pending'):?>	
					<label>Approval Status: 
						<?php echo $this->Form->input('apr_status', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 'selected' => $this->params->query['apr_status'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $approveStatus)); ?> 					
					</label>
					<?php endif; ?>		
							<!--label>Unread: 
							<?php // echo $this->Form->input('unread', array('div'=> false,'type' => 'checkbox', 'label' => false, 'class' => 'input-medium', 'title' => 'Check for Unread Positions', 'checked' => $this->params->query['unread'], 'required' => false, 'placeholder' => '')); ?> 

							</label-->
							
							
							
							

							
														<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>

							<label style="margin-top:18px;"><a class="jsRedirect" href="<?php echo $this->webroot;?>position/"><input value="Reset" type="button" class="btn"/></a></label>

							
														</div>
						<input type="hidden" id="srchSubmit" value="<?php echo $this->params->query['srch_status'];?>">


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

										<th width="210"><?php echo $this->Paginator->sort('job_title', 'Job Title', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>										
										<th width="200"><?php echo $this->Paginator->sort('Client.client_name', 'Client', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<th width="120"  style="text-align:center"><?php echo $this->Paginator->sort('no_job', 'Total Openings', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<th width="150"><?php echo $this->Paginator->sort('team_member', 'Recruiters', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										
										<?php if($this->request->params['pass'][0] != 'pending'):?>	
										<th width="65"  style="text-align:center">CVs</th>
										<th width="65"  style="text-align:center">Joined</th>
										<?php endif; ?>
										<th width="100"  style="text-align:center"><?php echo $this->Paginator->sort('status', 'Status', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<th width="95"><?php echo $this->Paginator->sort('Creator.first_name', 'Created By', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<th width="75"><?php echo $this->Paginator->sort('created_date', 'Created', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<th width="75"><?php echo $this->Paginator->sort('modified_date', 'Modified', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<!--th width="60" style="text-align:center">Message</th-->
										<th width="50" style="text-align:center">Actions</th>
									</tr>
								</thead>

								<tbody>
								
								
										
									<?php foreach($data as $req):?>
									<tr>
										<?php if(!empty($noHead)): $target = "target='_blank'"; endif;?>
										<td width=""><a <?php echo $target;?> href="<?php echo $this->webroot;?>position/view/<?php echo $req['Position']['id'];?>/<?php echo $req[0]['st_id'];?>/<?php echo $this->request->params['pass'][0];?><?php echo $req['ReqRead']['id'];?>/<?php echo $req['ReqRead']['status'];?>/"><?php echo ucwords($req['Position']['job_title']);?></a>
										<?php if($req['ReqRead']['id'] != '' && $req['ReqRead']['status'] == 'U'):?>
										<span rel="tooltip" title="New Position" class="label label-warning">New</span>			
										<?php endif; ?>
										</td>
										
										
										<td width="" ><?php echo $req['Client']['client_name'];?>
										
										</td>
										<td   style="text-align:center" width=""><?php echo $req['Position']['no_job'];?></td>
										
						
						<td width=""><?php echo $req[0]['team_member'];?></td>
						
						<?php if($this->request->params['pass'][0] != 'pending'):?>	
						<td width=""  style="text-align:center"><a  title="View CV Submitted"  href="<?php echo $this->webroot;?>resume/?spec=<?php echo $req['Position']['id'];?>" rel="tooltip"><?php echo $req[0]['cv_sent'];?></a>
						<td width=""  style="text-align:center"><a title="View Joined Resumes"  href="<?php echo $this->webroot;?>resume/?status=10&spec=<?php echo $req['Position']['id'];?>"  rel="tooltip"><?php echo $this->Functions->get_total_joined($req[0]['joined'],$req[0]['req_resume_id']);?></a></td>
						<?php endif; ?>
						
						<td width=""  style="text-align:center">
						<?php if($req['Position']['is_approve'] == 'W' && $req['Position']['req_status_id'] == ''):?>
						<span title="Awaiting for Approval" rel="tooltip" class="label label-warning">Awaiting Approval</span>
						<?php elseif($req['Position']['is_approve'] == 'W' && $this->request->params['pass']['0'] == 'pending'):?>
						<span title="Awaiting for Approval" rel="tooltip" class="label label-warning">Awaiting Approval</span>							
						<?php elseif($req['Position']['status'] == 'A'):?>
						<span rel="tooltip" title="Requirement Status: <?php echo $req['ReqStatus']['title'];?> " class="label label-<?php echo $this->Functions->get_req_status_color($req['ReqStatus']['title']);?>"><?php echo $req['ReqStatus']['title'];?></span>			
						<?php elseif($req['PositionStatus']['member_approve'] == 'R'):?>	
						<span title="Rejected" rel="tooltip" class="label label-danger">Rejected</span>	
						<?php endif; ?>
						
						</td>
						<td width=""><?php echo $req['Creator']['first_name'];?></td>
						<td width=""><?php echo $this->Functions->format_date($req['Position']['created_date']);?></td>
						<td width=""><?php echo $this->Functions->format_date($req['Position']['modified_date']);?></td>
						
						<!--th  style="text-align:center">
					<a href="<?php echo $this->webroot;?>position/view_message/<?php echo $req['Position']['id'];?>/" class="btn  btn-mini iframeBox unreadLink" val="70_80" title="Messages" rel="tooltip" class="sepV_a"><i class="icon-envelope"></i></a>

									<?php if($req[0]['read_count'] > 0):?>
									<span class="label label-important unreadCount"><?php echo $req[0]['read_count'];?></span>
									<?php endif; ?>
						</th-->
									
	<td class="actionItem" style="text-align:center">
	<?php if($req['Position']['status'] == 'A'  &&  $this->Session->read('USER.Login.id') == $req['Position']['created_by']):?>
	<a href="<?php echo $this->webroot;?>position/edit/<?php echo $req['Position']['id'];?>/" class="btn  btn-mini"  rel="tooltip" class="sepV_a" title="Edit Position"><i class="icon-pencil"></i></a>
	<?php endif; ?>	
	
	<?php if($req['Position']['is_approve'] == 'W' && $req[0]['st_user_id'] == $this->Session->read('USER.Login.id') && $this->request->params['pass'][0] == 'pending'):?>
	<a rel="tooltip"  title="Verify" href="<?php echo $this->webroot;?>position/view/<?php echo $req['Position']['id'];?>/<?php echo $req[0]['st_id'];?>/<?php echo $this->request->params['pass'][0];?>" class="btn  btn-mini"><i class="icon-edit"></i></a>
	<?php endif; ?>		
	
	
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