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
                                    <a href="<?php echo $this->webroot;?>taskplan/">Task Plan</a>
                                </li>
                            
                                <li>
                                   Search Task Plan
                                </li>
                            </ul>
                        </div>
                    </nav>
					
					
								<div class="srch_buttons">

							<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="homeSrch btn btn-success"/></a>
							
							<a class="notify jsRedirect" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Downloading Excel... Please wait..."   href="<?php echo $this->webroot;?>taskplan/?action=export&<?php echo $this->Functions->get_url_vars($this->request->query);?>"><input type="button" value="Export Excel" class="btn btn-warning"/></a>
							
							<a class="jsRedirect" data-notify-time = '3000'   href="<?php echo $this->webroot;?>taskplan/add/">
							<input type="button" value="Create Task Plan" class="btn btn-info"/></a>		
							
							</div>
						
						
					<?php echo $this->Session->flash();?>
				
	

						
	<?php echo $this->Form->create('TaskPlan', array('id' => 'formID','class' => 'formID srchForm')); ?>
		
							<div class="dn dataTables_filter srchBox homeSrchBox" id="dt_gal_filter">
							
							<label style="margin-left:0">Keyword: <input type="text" placeholder="Search Keywords Here.." name="data[TaskPlan][keyword]" id = "SearchText" value="<?php echo $this->params->query['keyword'];?>" class="input-large" aria-controls="dt_gal"></label>
							
							<span id="sandbox-container">
						<span  class="input-daterange" id="datepicker">	
							<label>From Date: <input placeholder="dd/mm/yyyy" type="text" class="input-small" name="data[TaskPlan][from]" value="<?php echo $this->request->query['from'];?>" aria-controls="dt_gal"></label>

							<label>To Date: <input  placeholder="dd/mm/yyyy" type="text" name="data[TaskPlan][to]" value="<?php echo $this->request->query['to'];?>" class="input-small" aria-controls="dt_gal"></label>

						</span>	
						</span>	
							
								
							<!--label>Unread: 
							<?php // echo $this->Form->input('unread', array('div'=> false,'type' => 'checkbox', 'label' => false, 'class' => 'input-medium', 'title' => 'Check for Unread Positions', 'checked' => $this->params->query['unread'], 'required' => false, 'placeholder' => '')); ?> 

							</label-->
							
							
							
							

							
														<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>

							<label style="margin-top:18px;"><a class="jsRedirect" href="<?php echo $this->webroot;?>taskplan/"><input value="Reset" type="button" class="btn"/></a></label>

							
														</div>
						<input type="hidden" id="srchSubmit" value="<?php echo $this->params->query['srch_status'];?>">


						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="<?php echo $this->webroot;?>taskplan/" id="webroot">
						</form>
					<?php endif; ?>	

<?php if(!empty($noHead)): ?>
<div style="padding:15px;">
							
	<?php echo $this->Session->flash();?>
<div class="heading clearfix">
								<h3 class="pull-left">Task Plan <small>list</small></h3>
					
							</div>
					
							
<?php endif; ?>				
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="100"><?php echo $this->Paginator->sort('task_date', 'Task Date', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<th width="100"  style="text-align:"><?php echo $this->Paginator->sort('session', 'Session', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>

										<th width="210"><?php echo $this->Paginator->sort('Position.job_title', 'Job Title', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>										
										
										<th width="200"><?php echo $this->Paginator->sort('Client.client_name', 'Client', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										
										<th width="100"><?php echo $this->Paginator->sort('Position.ctc', 'CTC (In Lacs)', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>										

																				
										
										
										<th width="75"><?php echo $this->Paginator->sort('created_date', 'Created', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<th width="75"><?php echo $this->Paginator->sort('modified_date', 'Modified', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<th width="75" style="text-align:center">Actions</th>
									</tr>
								</thead>

								<tbody>
								
								
										
	<?php foreach($data as $req):?>
			
			<tr>
			
			<td><?php echo $this->Functions->format_date($req['TaskPlan']['task_date']);?></td>
										
			<td width=""><?php echo $this->Functions->get_session($req['TaskPlan']['session']);?></td>

			<td width=""><?php echo $req['Position']['job_title'];?></td>
										
			<td width=""><?php echo $req['Client']['client_name'];?></td>
										
			<td width=""><?php echo $req['TaskPlan']['ctc'];?></td>
						
			
			<td width=""><?php echo $this->Functions->format_date($req['TaskPlan']['created_date']);?></td>
			
			<td width=""><?php echo $this->Functions->format_date($req['TaskPlan']['modified_date']);?></td>
						
					
									
	<td class="actionItem" style="text-align:center">
	
	<?php if(strtotime(date('Y-m-d')) <= strtotime($req['TaskPlan']['task_date'])):?>
	<a href="<?php echo $this->webroot;?>taskplan/edit/<?php echo $req['TaskPlan']['id'];?>/" class="btn  btn-mini"  rel="tooltip" class="sepV_a" title="Edit Task Plan"><i class="icon-pencil"></i></a>
	
	
	<a href="javascript:void(0)" rel="<?php echo $this->webroot;?>taskplan/delete/<?php echo $req['TaskPlan']['id'];?>/" class="btn  btn-mini delConfirm" id="<?php echo $req['TaskPlan']['id'];?>"  rel="tooltip" class="sepV_a" title="Delete Task Plan"><i class="icon-trash"></i></a>
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