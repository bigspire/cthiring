<?php echo $this->element('tsk_menu'); ?>
		
	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Manage Events</h1>
						
						
					</div>
				
				</div>
				<div class="breadcrumbs"  style="width:97%">
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
							<a href="#">Manage Event</a>
							
						</li>
						
						
					</ul>
					
				</div>
				
				
				
				<?php echo $this->Session->flash();?>
				
					<div class="row-fluid footer_div">
					
					<?php echo $this->element('event_menu');?>	
									
									
					<div class="span12" style="float:left;width:80%">
						
						
					

					
						<div class="box box-bordered box-color">
						
						<div class="box-title">
								<h3><i class="icon-list"></i> Events</h3>
							</div>
							
						

						<?php echo $this->Form->create('TskEvent', array('name' => '', 'type' => '', 'id' => 'formID', 'class' => '')); ?>
							<div class="box-content">
							
						<div class="dataTables_wrapper">
						
				<div class="" id="DataTables_Table_8_filter"  style="padding:15px">
				
				<span>Search:</span>  
				
				<?php echo $this->Form->input('keyword', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'input-large', 'value' => $this->params->query['keyword'],  'id' => 'SearchText', 'required' => false, 'autocomplete' => 'off', 'placeholder' => 'Search here...', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
				
				  <span>Type:</span>		
			<?php echo $this->Form->input('type', array('div'=> false,'type' => 'select', 'label' => false, 'id' => 'type', 'class' => 'input-large', 'empty' => 'Select', 'selected' => $this->params->query['type'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $eventType, 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 				
				
		
				
				
											
											<input type="submit" value="Search" class="btn btn-primary" style="margin-bottom:9px;margin-left:4px;">
											
													<a href="<?php echo $this->webroot;?>tskevent/list_event/"><button style="margin-bottom:9px;margin-left:4px;" type="button" class="btn btn-primary"><i class="icon-refresh"></i> Reset</button></a>
											
					<a href="<?php echo $this->webroot;?>tskevent/create_event/"><button type="button" class="btn btn-primary" style="float:right"><i class="icon-plus"></i> New Event</button></a>
						
								</div>			
								
								
<div id="dialog-confirm" title="Confirmation!" class="dn">
	<p>Are you sure you want to delete?</p>
</div>

<input type="hidden" id="del_url" value="<?php echo $this->webroot;?>tskevent/delete_event/"/>
							

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
												<th width="120">
											<?php echo $this->Paginator->sort('name', 'Type', array('escape' => false,'direction' => 'desc'));?>
												</th>
												<th width="100">
											<?php echo $this->Paginator->sort('created_date', 'Created', array('escape' => false,'direction' => 'desc'));?>
												</th>
											
											<th width="100">Status</th>
											<th width="100">Options</th>
										</tr>
									</thead>
									<tbody>
									
										
									
										<?php  foreach($event_data as $event):?>
										
										<tr>
											
											<td><?php echo $event['TskEvent']['title'];?></td>
											
											<td><?php echo $this->Functions->show_event_date($event['TskEvent']['start']);?></td>
											<td><?php if($event['TskEvent']['end'] == '0000-00-00 00:00:00'):
													echo ' ';
													else:
													echo $this->Functions->show_event_date($event['TskEvent']['end']);
													endif; ?>
													</td>		
											<td><span class="evtTag evt<?php echo $event['TskEventType']['color']; ?>"><?php echo $event['TskEventType']['name'];?></span></td>
													
											<td><?php echo $this->Functions->format_date($event['TskEvent']['created']);?></td>
											<td><?php echo $event['TskEvent']['status'];?></td>
											<td class='hidden-480'>
												<a href="<?php echo $this->webroot;?>tskevent/view_event/<?php echo $event['TskEvent']['id'];?>/" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
												<a href="<?php echo $this->webroot;?>tskevent/edit_event/<?php echo $event['TskEvent']['id'];?>/" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
												<a href="javascript:void(0);" name="<?php echo $event['TskEvent']['id'];?>" class="btn delRec" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>
											</td>
										</tr>
										
									<?php endforeach; ?>
									</tbody>
								</table>
								

								<?php echo $this->element('paging');?>
								
								




								
							</div>	

							</div>
						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="<?php echo $this->webroot;?>tskevent/" id="webroot">
						
						
						 <?php echo $this->Form->end(); ?>
						</div>
					
					<input type="hidden" value="<?php echo $this->params->query['theme'];?>" id="event_theme">
					</div>
				</div>
					
					
				</div>
		
			
			</div>
			

		</div>	
			
		
		
		
		
				
		


