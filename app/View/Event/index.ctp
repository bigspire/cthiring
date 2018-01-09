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
                                    <a href="<?php echo $this->webroot;?>event/">Events</a>
                                </li>
                            
                                <li>
                                  Search Events
                                </li>
                            </ul>
                        </div>
                    </nav>
					
					
								<div class="srch_buttons">

							<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="homeSrch btn btn-success"/></a>
							
					
							
						
							</div>
						
						
					<?php echo $this->Session->flash();?>
				
	

						
	<?php echo $this->Form->create('Event', array('id' => 'formID','class' => 'formID srchForm')); ?>
		
							<div class="dn dataTables_filter srchBox homeSrchBox" id="dt_gal_filter">
							
							<label style="margin-left:0">Keyword: <input type="text" placeholder="Search Keywords Here.." name="data[Event][keyword]" id = "SearchText" value="<?php echo $this->params->query['keyword'];?>" class="input-large" aria-controls="dt_gal"></label>
							
							<span id="sandbox-container">
						<span  class="input-daterange" id="datepicker">	
							<label>From Date: <input placeholder="dd/mm/yyyy" type="text" class="input-small" name="data[Event][from]" value="<?php echo $this->request->query['from'];?>" aria-controls="dt_gal"></label>

							<label>To Date: <input  placeholder="dd/mm/yyyy" type="text" name="data[Event][to]" value="<?php echo $this->request->query['to'];?>" class="input-small" aria-controls="dt_gal"></label>

						</span>	
						</span>	

								
							<!--label>Unread: 
							<?php // echo $this->Form->input('unread', array('div'=> false,'type' => 'checkbox', 'label' => false, 'class' => 'input-medium', 'title' => 'Check for Unread Positions', 'checked' => $this->params->query['unread'], 'required' => false, 'placeholder' => '')); ?> 

							</label-->
							
							
							
							

							
														<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>

							<label style="margin-top:18px;"><a class="jsRedirect" href="<?php echo $this->webroot;?>event/"><input value="Reset" type="button" class="btn"/></a></label>

							
														</div>
						<input type="hidden" id="srchSubmit" value="<?php echo $this->params->query['srch_status'];?>">


						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="<?php echo $this->webroot;?>event/" id="webroot">
						</form>
					<?php endif; ?>	

<?php if(!empty($noHead)): ?>
<div style="padding:15px;">
							
	<?php echo $this->Session->flash();?>
<div class="heading clearfix">
								<h3 class="pull-left">Events <small>list</small></h3>
					
							</div>
					
							
<?php endif; ?>				
					<table class="table table-hover table-nomargin table-bordered usertable dataTable">
									<thead>
										
										<tr>
											
											<th width="180">
											<?php echo $this->Paginator->sort('title', 'Title', array('escape' => false,'direction' => 'desc'));?>
												</th>
												
											
											
										<th width="130">
											<?php echo $this->Paginator->sort('start', 'Start Date', array('escape' => false,'direction' => 'desc'));?>
												</th>
												
												<th width="130">
											<?php echo $this->Paginator->sort('end', 'End Date', array('escape' => false,'direction' => 'desc'));?>
												</th>
											
												<th width="100">
											<?php echo $this->Paginator->sort('created_date', 'Created', array('escape' => false,'direction' => 'desc'));?>
												</th>
											
										<th width="75" style="text-align:center">Actions</th>
										</tr>
									</thead>
									<tbody>
									
										
									
										<?php  foreach($event_data as $event):?>
										
										<tr>
											
											<td><?php echo $event['Event']['title'];?></td>
											
											<td><?php echo $this->Functions->show_event_date($event['Event']['start']);?></td>
											<td><?php if($event['Event']['end'] == '0000-00-00 00:00:00'):
													echo ' ';
													else:
													echo $this->Functions->show_event_date($event['Event']['end']);
													endif; ?>
													</td>		
										
													
											<td><?php echo $this->Functions->format_date($event['Event']['created']);?></td>
										
										
											
																			
	<td class="actionItem" style="text-align:center">
	
	<a href="<?php echo $this->webroot;?>event/edit/<?php echo $event['Event']['id'];?>/" class="btn  btn-mini"  rel="tooltip" class="sepV_a" title="Edit Event"><i class="icon-pencil"></i></a>
	
	
	<a href="javascript:void(0)" rel="<?php echo $this->webroot;?>event/delete/<?php echo $event['Event']['id'];?>/" class="btn  btn-mini delConfirm" id="<?php echo $event['Event']['id'];?>"  rel="tooltip" class="sepV_a" title="Delete Event"><i class="icon-trash"></i></a>
	
	
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