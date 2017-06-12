<?php echo $this->element('tsk_menu'); ?>
		
	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Event Types</h1>
						
						
					</div>
				
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="<?php echo $this->webroot;?>tskhome/">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						
						
						
						<li>
							<a href="<?php echo $this->webroot;?>tskeventtype/">Event Types</a>
							
						</li>
						
						
					</ul>
					
				</div>
				
				
				
				<?php echo $this->Session->flash();?>
				
					<div class="row-fluid footer_div" >
					<div class="span12">
						<div class="box box-bordered box-color">
						
						<div class="box-title">
								<h3><i class="icon-list"></i> Event Types</h3>
							</div>
							
						

						<?php echo $this->Form->create('TskEventType', array('name' => '', 'type' => '', 'id' => 'formID', 'class' => '')); ?>
							<div class="box-content">
							
						<div class="dataTables_wrapper">
						
				<div class="" id="DataTables_Table_8_filter"  style="padding:15px">
				
				<span>Search:</span>  
				
				<?php echo $this->Form->input('SearchText', array('div'=> false,'type' => 'text', 'label' => false, 'class' => 'input-large', 'value' => $this->params->query['keyword'],  'id' => 'SearchText', 'required' => false, 'autocomplete' => 'off', 'placeholder' => 'Search here...', 'error' =>  array('attributes' => array('wrap' => 'div', 'class' => 'error')))); ?> 
												
		
				
				
											
											<input type="submit" value="Search" class="btn btn-primary" style="margin-bottom:9px;margin-left:4px;">
											
													<a href="<?php echo $this->webroot;?>tskeventtype/"><button style="margin-bottom:9px;margin-left:4px;" type="button" class="btn btn-primary"><i class="icon-refresh"></i> Reset</button></a>
											
					<a href="<?php echo $this->webroot;?>tskeventtype/create_event_type/"><button type="button" class="btn btn-primary" style="float:right"><i class="icon-plus"></i> Add Event Type</button></a>
						
								</div>			
								
								
<div id="dialog-confirm" title="Confirmation!" class="dn">
	<p>Are you sure you want to delete?</p>
</div>

<input type="hidden" id="del_url" value="<?php echo $this->webroot;?>tskeventtype/delete_event_type/"/>
								<table class="table table-hover table-nomargin table-bordered usertable dataTable">
									<thead>
										
										<tr>
											
											<th>
											<?php echo $this->Paginator->sort('name', 'Event Type', array('escape' => false,'direction' => 'desc'));?>
												</th>
												
												
				<th>
											<?php echo $this->Paginator->sort('color', 'Color', array('escape' => false,'direction' => 'desc'));?>
												</th>							
										
												
												<th>
											<?php echo $this->Paginator->sort('created_date', 'Created', array('escape' => false,'direction' => 'desc'));?>
												</th>
										
											
											<th>
											<?php echo $this->Paginator->sort('modified_date', 'Modified', array('escape' => false,'direction' => 'desc'));?>
												</th>
												
											<th>Status</th>
											<th>Options</th>
										</tr>
									</thead>
									<tbody>
									
										
									
										<?php  foreach($cat_data as $cat):?>
										
										<tr>
											
											<td><?php echo $cat['TskEventType']['name'];?></td>
											<td><?php echo $cat['TskEventType']['color'];?></td>
											
											<td><?php echo $this->Functions->format_date($cat['TskEventType']['created_date']);?></td>
												<td><?php echo $this->Functions->format_date($cat['TskEventType']['modified_date']);?></td>
											<td><?php echo $this->Functions->show_status($cat['TskEventType']['status']);?></td>
											<td class='hidden-480'>
												<a href="<?php echo $this->webroot;?>tskeventtype/view_event_type/<?php echo $cat['TskEventType']['id'];?>/" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
												<a href="<?php echo $this->webroot;?>tskeventtype/edit_event_type/<?php echo $cat['TskEventType']['id'];?>/" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
												<a href="javascript:void(0);" name="<?php echo $cat['TskEventType']['id'];?>" class="btn delRec" rel="tooltip" title="Delete"><i class="icon-remove"></i></a>
											</td>
										</tr>
										
									<?php endforeach; ?>
									</tbody>
								</table>
								

								<?php echo $this->element('paging');?>
								
								




								
							</div>	

							</div>
						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="<?php echo $this->webroot;?>tskeventtype/" id="webroot">
						 <?php echo $this->Form->end(); ?>
						</div>
					</div>
				</div>
					
					
				</div>
		
			
			</div>
			

		</div>	
			
		
		
		
		
				
		


