
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
                                    <a href="<?php echo $this->webroot;?>client/add/">Clients</a>
                                </li>
                            
                                <li>
                                   Search Client
                                </li>
                            </ul>
                        </div>
                    </nav>

						<div class="srch_buttons">
							<a class="jsRedirect toggleSearch"  href="javascript:void(0)"><input type="button" value="Search" class="btn btn-success"/></a>
							<a class="notify" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Downloading Excel... Please wait..."  href="<?php echo $this->webroot;?>client/?action=export&<?php echo $this->Functions->get_url_vars($this->request->query);?>"><input type="button" value="Export Excel" class="btn btn-warning"/></a>
							<a class="jsRedirect"  href="<?php echo $this->webroot;?>client/add/"><input type="button" value="Create Client" class="btn btn-info"/></a>
						</div>
						
			<?php echo $this->Session->flash();?>			

<div class="heading clearfix">
								<h3 class="pull-left">Clients <small>list</small></h3>
				
							</div>
							
								
							<?php echo $this->Form->create('Client', array('id' => 'formID','class' => 'formID')); ?>
	
							<div class="dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							<label style="margin-top:18px;"><a href="<?php echo $this->webroot;?>client/" class="jsRedirect"><input value="Reset" type="button" class="btn"/></a></label>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
							
						
							<label>Status: 
							<?php echo $this->Form->input('status', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-small', 'empty' => 'Select', 'selected' => $this->params->query['status'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => array('2' => 'Active','1' => 'Inactive'))); ?> 

							</label>

							<label>To Date: <input type="text" name="data[Client][to]" value="<?php echo $this->request->query['to'];?>" class="input-small datepick" aria-controls="dt_gal"></label>

							<label>From Date: <input type="text" class="input-small datepick" name="data[Client][from]" value="<?php echo $this->request->query['from'];?>" aria-controls="dt_gal"></label>
							<label style="margin-left:0">Keyword: <input type="text" placeholder="Client Name or Location" name="data[Client][keyword]" id = "SearchText" value="<?php echo $this->params->query['keyword'];?>" class="input-large" aria-controls="dt_gal"></label>

														</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="<?php echo $this->webroot;?>client/" id="webroot">
						</form>
							
							
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="200"><?php echo $this->Paginator->sort('client_name', 'Client Name', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="90"><?php echo $this->Paginator->sort('phone', 'Phone', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="130"><?php echo $this->Paginator->sort('ResLocation.location', 'Location', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="100"><?php echo $this->Paginator->sort('status', 'Status', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="95"><?php echo $this->Paginator->sort('Creator.first_name', 'Created By', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="75"><?php echo $this->Paginator->sort('created_date', 'Created', array('escape' => false, 'direction' => 'desc'));?></th>
										<th width="50" style="text-align:center">Actions</th>
									</tr>
								</thead>
								<tbody>
								
									
									
								<?php foreach($data as $client):?>
									<tr>
										
										<td><a href="<?php echo $this->webroot;?>client/view/<?php echo $client['Client']['id'];?>/"><?php echo ucwords($client['Client']['client_name']);?></a></td>
										<td><?php echo $client['Client']['phone'];?></td>
										<td><?php echo ucfirst($client['ResLocation']['location']);?></td>
										<td>
										<?php if($client['Client']['status'] == '1'):?>
										<span class="label label">Inactive</span>
										<?php else:?>
										<span class="label label-success">Active</span>
										<?php endif; ?>
										</td>
										
										
										<td><?php echo ucfirst($client['Creator']['first_name']);?></td>

										<td><?php echo $this->Functions->format_date($client['Client']['created_date']);?></td>
<td class="actionItem" style="text-align:center">
	<a href="<?php echo $this->webroot;?>client/edit/<?php echo $client['Client']['id'];?>/" class="btn  btn-mini"  rel="tooltip" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
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
