
		<div id="maincontainer" class="clearfix">
			<?php echo $this->element('header');?>
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
					

					
					<div class="row-fluid">
						 <div class="span12">
						 
						  <nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="<?php echo $this->webroot;?>home/"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot;?>client/">Clients</a>
                                </li>
                            
                                <li>
                                   Search Client
                                </li>
                            </ul>
                        </div>
                    </nav>

						<div class="srch_buttons">
							<?php if($this->request->params['pass'][0] != 'pending'):?>
							<a class="jsRedirect toggleSearch"  href="javascript:void(0)"><input type="button" value="Search" class="homeSrch btn btn-success"/></a>
							<?php endif; ?>

														
							<?php if($this->request->params['pass'][0] != 'pending' && ($this->Session->read('USER.Login.roles_id') == '33' 
							|| $this->Session->read('USER.Login.roles_id') == '39')):?>
							<a class="notify jsRedirect" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Downloading Excel... Please wait..." 
							href="<?php echo $this->webroot;?>client/?action=export&<?php echo $this->Functions->get_url_vars($this->request->query);?>"><input type="button" value="Export Excel" class="btn btn-warning"/></a>
							<?php endif; ?>
							
							<?php if($create_client == '1' && $this->request->params['pass'][0] != 'pending'):?>
							<a class="jsRedirect"  href="<?php echo $this->webroot;?>client/add/"><input type="button" value="Create Client" class="btn btn-info"/></a>
							<?php endif; ?>
						</div>
						
			<?php echo $this->Session->flash();?>			


							
								
							<?php echo $this->Form->create('Client', array('id' => 'formID','class' => 'formID')); ?>
	
							<div class="dataTables_filter dn srchBox homeSrchBox homeSrch" id="dt_gal_filter">
							
						<label style="margin-left:0">Keyword: <input type="text" placeholder="Search Keywords Here..." name="data[Client][keyword]" id = "SearchText" value="<?php echo $this->params->query['keyword'];?>" class="input-large" aria-controls="dt_gal"></label>

						

						<span id="sandbox-container">
						<span  class="input-daterange" id="datepicker">	
							<label>From Date: <input placeholder="dd/mm/yyyy" type="text" class="input-small" name="data[Client][from]" value="<?php echo $this->request->query['from'];?>" aria-controls="dt_gal"></label>

							<label>To Date: <input  placeholder="dd/mm/yyyy" type="text" name="data[Client][to]" value="<?php echo $this->request->query['to'];?>" class="input-small" aria-controls="dt_gal"></label>

						</span>	
						</span>							
							

														

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="<?php echo $this->webroot;?>client/" id="webroot">
					<input type="hidden" id="srchSubmit" value="<?php echo $this->params->query['srch_status'];?>">

			

			
	<label>Status: 
							<?php echo $this->Form->input('status', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-small', 'empty' => 'Select', 'selected' => $this->params->query['status'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => array('2' => 'Active','1' => 'Inactive'))); ?> 

							</label>

							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
							
						
												<label style="margin-top:18px;"><a href="<?php echo $this->webroot;?>client/" class="jsRedirect"><input value="Reset" type="button" class="btn"/></a></label>
</div>

<input type="hidden" id="srchSubmit" value="<?php echo $this->params->query['srch_status'];?>">
						</form>
							
							
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="200"><?php echo $this->Paginator->sort('client_name', 'Client Name', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<th width="90"><?php echo $this->Paginator->sort('city', 'City', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<th width="90"><?php echo $this->Paginator->sort('ResLocation.location', 'District', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<th style="text-align:center" width="70"><?php echo $this->Paginator->sort('no_pos', 'Positions', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<th style="text-align:center" width="70"><?php echo $this->Paginator->sort('no_contact', 'Contact', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<th width="130"><?php echo $this->Paginator->sort('account_holder', 'Account Holder', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<th style="text-align:center" width="70"><?php echo $this->Paginator->sort('status', 'Status', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<th width="95"><?php echo $this->Paginator->sort('Creator.first_name', 'Created By', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<th width="75"><?php echo $this->Paginator->sort('created_date', 'Created', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<th width="75"><?php echo $this->Paginator->sort('modified_date', 'Modified', array('escape' => false, 'direction' => 'desc', 'rel' => 'tooltip', 'title' => 'Sort by Ascending or Descending'));?></th>
										<th width="50" style="text-align:center">Actions</th>
									</tr>
								</thead>
								<tbody>
								
									
									
								<?php foreach($data as $client):?>
									<tr>
										
										<td><a rel="tooltip" title="Click to view the details" href="<?php echo $this->webroot;?>client/view/<?php echo $client['Client']['id'];?>/"><?php echo ucwords($client['Client']['client_name']);?></a></td>
										<td><?php echo $client['Client']['city'];?></td>
										<td><?php echo ucfirst($client['ResLocation']['location']);?></td>
										<td style="text-align:center"><a rel="tooltip" title="Click to view the Requirements" target="_blank" href="<?php echo $this->webroot;?>position/index/?keyword=<?php echo $client['Client']['client_name'];?>"><?php echo $client[0]['no_pos'];?></a></td>
										<td style="text-align:center"><a rel="tooltip" title="Click to view the Contacts" target="_blank" href="<?php echo $this->webroot;?>client/view/<?php echo $client['Client']['id'];?>/"><?php echo $client[0]['no_contact'];?></a></td>
										<td><?php echo $client[0]['account_holder'];?></td>
										<td style="text-align:center">
										<?php if($client['Client']['status'] == '1'):?>
										<span title="Inactive Client" rel="tooltip" class="label label">Inactive</span>
										<?php elseif($client['Client']['status'] == '2'):?>
										<span title="Awaiting for Approval" rel="tooltip" class="label label-warning">Awaiting Approval</span>
										<?php else:?>
										<span title="Active Client" rel="tooltip" class="label label-success">Active</span>
										<?php endif; ?>
										</td>
										
										
										<td><?php echo ucfirst($client['Creator']['first_name']);?></td>

										<td><?php echo $this->Functions->format_date($client['Client']['created_date']);?></td>
									<td><?php echo $this->Functions->format_date($client['Client']['modified_date']);?></td>

<td class="actionItem" style="text-align:center">
	<?php if($this->Session->read('USER.Login.id') == $client['Client']['created_by'] && $client['Client']['status'] == '0'):?>
	<a href="<?php echo $this->webroot;?>client/edit/<?php echo $client['Client']['id'];?>/" class="btn  btn-mini"  rel="tooltip" class="sepV_a" title="Edit Company"><i class="icon-pencil"></i></a>
	<?php endif; ?>	
	
	<?php if($client['Client']['is_approve'] == 'W' && $this->Session->read('USER.Login.roles_id') == '39'):?>
	<a rel="tooltip" title="Verify Client" href="<?php echo $this->webroot;?>client/view/<?php echo $client['Client']['id'];?>/" class="btn  btn-mini"><i class="icon-edit"></i></a>
	<?php endif; ?>									
										
										
	</td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
												<?php echo $this->element('paging');?>
					
                        
					
					</div>
                    
					
				

				    
                </div>
            </div>
            
		</div>
		
		</div>
