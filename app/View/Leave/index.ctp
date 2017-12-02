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
                                    <a href="<?php echo $this->webroot;?>leave/">Leave</a>
                                </li>
                            
                                <li>
                                   <?php echo $this->Functions->show_list_page($this->request->params['pass'][0]);?> Leave
                                </li>
                            </ul>
                        </div>
                    </nav>
					
					
								<div class="srch_buttons">

							<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="homeSrch btn btn-success"/></a>
							
							<a class="notify jsRedirect" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Downloading Excel... Please wait..."   href="<?php echo $this->webroot;?>leave/index/<?php echo $this->request->params['pass'][0];?>?action=export&<?php echo $this->Functions->get_url_vars($this->request->query);?>"><input type="button" value="Export Excel" class="btn btn-warning"/></a>
					<?php if($this->request->params['pass'][0] != 'pending'):?>			
							<a class="jsRedirect" data-notify-time = '3000'   href="<?php echo $this->webroot;?>leave/add/">
							<input type="button" value="Create Leave" class="btn btn-info"/></a>
					<?php endif; ?>
							
							</div>
						
						
					<?php echo $this->Session->flash();?>
				
	

						
	<?php echo $this->Form->create('Leave', array('id' => 'formID','class' => 'formID srchForm')); ?>
		
							<div class="dn dataTables_filter srchBox homeSrchBox" id="dt_gal_filter">
							
							<label style="margin-left:0">Keyword: <input type="text" placeholder="Search Keywords Here.." name="data[Leave][keyword]" id = "SearchText" value="<?php echo $this->params->query['keyword'];?>" class="input-large" aria-controls="dt_gal"></label>
							
							<span id="sandbox-container">
						<span  class="input-daterange" id="datepicker">	
							<label>From Date: <input placeholder="dd/mm/yyyy" type="text" class="input-small" name="data[Leave][from]" value="<?php echo $this->request->query['from'];?>" aria-controls="dt_gal"></label>

							<label>To Date: <input  placeholder="dd/mm/yyyy" type="text" name="data[Leave][to]" value="<?php echo $this->request->query['to'];?>" class="input-small" aria-controls="dt_gal"></label>

						</span>	
						</span>	
							
								
							<!--label>Unread: 
							<?php // echo $this->Form->input('unread', array('div'=> false,'type' => 'checkbox', 'label' => false, 'class' => 'input-medium', 'title' => 'Check for Unread Positions', 'checked' => $this->params->query['unread'], 'required' => false, 'placeholder' => '')); ?> 

							</label-->
							
							
						<?php if($this->request->params['pass'][0] == 'pending'):?>	
					<label>Approval Status: 
						<?php echo $this->Form->input('apr_status', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 'selected' => $this->params->query['apr_status'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $approveStatus)); ?> 					
					</label>
					<?php endif; ?>			
							

							
														<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>

							<label style="margin-top:18px;"><a class="jsRedirect" href="<?php echo $this->webroot;?>leave/index/<?php echo $this->request->params['pass'][0];?>"><input value="Reset" type="button" class="btn"/></a></label>

							
														</div>
						<input type="hidden" id="srchSubmit" value="<?php echo $this->params->query['srch_status'];?>">


						<input type="hidden" value="<?php echo $this->webroot;?>leave/" id="webroot">
						</form>
					<?php endif; ?>	

<?php if(!empty($noHead)): ?>
<div style="padding:15px;">
							
	<?php echo $this->Session->flash();?>
<div class="heading clearfix">
								<h3 class="pull-left">Leave <small>list</small></h3>
					
							</div>
					
							
<?php endif; ?>				
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="100"><?php echo $this->Paginator->sort('leave_from', 'Leave From', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										
										<th width="100"><?php echo $this->Paginator->sort('leave_to', 'Leave To', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
	
		<th width="300"  style="text-align:"><?php echo $this->Paginator->sort('leave_reason', 'Reason', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>

																				
										<th width="100"  style="text-align:"><?php echo $this->Paginator->sort('session', 'Session', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>

										<th width="210"><?php echo $this->Paginator->sort('leave_type', 'Leave Type', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>										
			
		
										
										<th width="100"><?php echo $this->Paginator->sort('LeaveStatus.status', 'Status', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>										

										<?php if($this->request->params['pass'][0] == 'pending'): ?>
			<th width="150"><?php echo $this->Paginator->sort('Creator.first_name', 'Created By', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>										
			<?php endif; ?>

			<th width="75"><?php echo $this->Paginator->sort('created_date', 'Created', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										
										<th width="75" style="text-align:center">Actions</th>
									</tr>
								</thead>

								<tbody>
								
								
										
	<?php foreach($data as $req):?>
			
			<tr>
			
			<td><?php echo $this->Functions->format_date($req['Leave']['leave_from']);?></td>
			
			<td><?php echo $this->Functions->format_date($req['Leave']['leave_to']);?></td>
			
			<td width=""><?php echo $this->Functions->string_truncate($req['Leave']['reason_leave'], 60);?></td>
										
			<td width=""><?php echo $this->Functions->get_session($req['Leave']['session']);?></td>

			<td width=""><?php echo $this->Functions->get_leave_type($req['Leave']['leave_type']);?></td>
				


			
			<td width="">
				
	<?php if($req['Leave']['is_approve'] == 'W'):
		?>
		<span title="Awaiting for Approval" rel="tooltip" class="label label-warning">Awaiting Approval</span>							
		<?php elseif($req['Leave']['is_approve'] == 'A'):?>
		<span rel="tooltip" title="Approved" class="label label-success">Approved</span>
	<?php elseif($req['Leave']['is_approve'] == 'C'):?>	
		<span title="Cancelled" rel="tooltip" class="label label-yellow">Cancelled</span>			
		<?php elseif($req['Leave']['is_approve'] == 'R'):?>	
		<span title="Rejected" rel="tooltip" class="label label-important">Rejected</span>	
	<?php endif; ?>
					
			</td>
										
						
		
<?php if($this->request->params['pass'][0] == 'pending'): ?>
			<td><?php echo ucwords($req['Creator']['first_name'].' '.$req['Creator']['last_name']);?></th>										
			<?php endif; ?>
			
			<td><?php echo $this->Functions->format_date($req['Leave']['created_date']);?></td>
			
						
					
									
	<td class="actionItem" style="text-align:center">
	
		<?php if($req['Leave']['is_approve'] == 'W' && $req[0]['st_user'] == $this->Session->read('USER.Login.id')):
		$action_status = 'Verify';
		else:
		$action_status = 'View';
		endif;
		?>
						
	
	
	<a rel="tooltip" title="<?php echo $action_status;?> Leave" href="<?php echo $this->webroot;?>leave/view/<?php echo $req['Leave']['id'];?>/<?php echo $req[0]['st_id'];?>/<?php echo $req[0]['st_user'];?>/<?php echo $this->request->params['pass'][0];?>"  class="btn  btn-mini" id="<?php echo $req['Leave']['id'];?>"  rel="tooltip" class="sepV_a" title="<?php echo $action_status;?> Leave"><i class="icon-edit"></i></a>
	
	
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