<style>
table.dataTable thead th, table.dataTable thead td {padding:5px 8px}
</style>
		<div id="maincontainer" class="clearfix">
			<?php echo $this->element('header');?>
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
			<?php echo $this->Session->flash();?>
					
					<div class="row-fluid">
						 <div class="span12">

<div class="heading clearfix">
								<h3 class="pull-left">Reports <small>list</small></h3>
					</div>
							
							<?php echo $this->Form->create('Report', array('id' => 'formID','class' => 'formID')); ?>
							
							<div class="dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
						<label style="margin-top:18px;"><a class="jsRedirect notify" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Downloading Excel... Please wait..."  href="<?php echo $this->webroot;?>report/?action=export&<?php echo $this->Functions->get_url_vars($this->request->query);?>"><input type="button" value="Export Excel" class="btn btn-warning"/></a></label>
							<label style="margin-top:18px;"><a class="jsRedirect" href="<?php echo $this->webroot;?>report/"><input value="Reset" type="button" class="btn"/></a></label>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
							<?php if($this->Session->read('USER.Login.rights') == '5'):?>
	
							<label>Branch: 
							<?php echo $this->Form->input('loc', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 'selected' => $this->params->query['loc'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $locList)); ?> 

							</label>
							<label>Employee: 
						<?php echo $this->Form->input('emp_id', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 'selected' => $this->params->query['emp_id'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $empList)); ?> 

															
													
							</label>
							<?php endif; ?>
							
							
														<label>Client: <input type="text" placeholder="Client Name" name="data[Report][keyword]" id = "SearchText" value="<?php echo $this->params->query['keyword'];?>" class="input-large" aria-controls="dt_gal"></label>
		
	<label>To Date: <input type="text" name="data[Report][to]" value="<?php echo $this->request->query['to'];?>" class="input-small datepick" aria-controls="dt_gal"></label>

							<label>From Date: <input type="text" class="input-small datepick" name="data[Report][from]" value="<?php echo $this->request->query['from'];?>" aria-controls="dt_gal"></label>
							
						
														</div>
	<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="<?php echo $this->webroot;?>report/" id="webroot">
						</form>
							
							<table class="table table-striped table-bordered dataTable display"  id="myDataTable">
								<thead>
									<tr>
										<th width="120" class="essential persist">Employee</th>
										<th class="optional">Live Positions</th>
										<th class="optional">CV Sent</th>
										<th width="" class="essential persist">CV Shortlisted</th>
										<th width="" class="essential persist">CV Rejected</th>
										<th width="" class="essential persist">Feedback Awaited</th>
										<th width="" class="essential persist">Candidates Interviewed</th>
										<th width="" class="essential persist">Interview Dropouts</th>
										<th width="" class="essential persist">Interview Rejected</th>
										<th width="" class="essential persist">Candidates Offered</th>
										<th width="" class="essential persist">Offer Dropouts</th>
										<th width="" class="essential persist">Candidates Joined</th>
										<th width="" class="essential persist">Candidates Billed</th>
										<th width="" class="essential persist">Billing Amount</th>
									</tr>
								</thead>
								<tbody>
								
									<?php foreach($empData as $key => $data):?>
										<tr>
										
										<td><?php echo $data;?></td>
										<td><a class="iframeBox" val="90_80"  href="<?php echo $this->webroot;?>position/index/?from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>&emp_id=<?php echo $empId[$key];?>&keyword=<?php echo $this->request->query['keyword'];?>&loc=<?php echo $this->request->query['loc'];?>&iframe=1"><?php echo $reqData[$key];?></a></td>
										<td><a class="iframeBox" val="90_80"  href="<?php echo $this->webroot;?>resume/index/?from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>&emp_id=<?php echo $empId[$key];?>&keyword=<?php echo $this->request->query['keyword'];?>&loc=<?php echo $this->request->query['loc'];?>&report_status=1&iframe=1"><?php echo $cvSentData[$key];?></a></td>
										<td><a class="iframeBox" val="90_80"  href="<?php echo $this->webroot;?>resume/index/?from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>&emp_id=<?php echo $empId[$key];?>&keyword=<?php echo $this->request->query['keyword'];?>&loc=<?php echo $this->request->query['loc'];?>&report_status=2&iframe=1"><?php echo $cvShortlistData[$key];?></a></td>
										<td><a class="iframeBox" val="90_80"  href="<?php echo $this->webroot;?>resume/index/?from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>&emp_id=<?php echo $empId[$key];?>&keyword=<?php echo $this->request->query['keyword'];?>&loc=<?php echo $this->request->query['loc'];?>&report_status=3&iframe=1"><?php echo $cvRejectData[$key];?></a></td>
										<td><a class="iframeBox" val="90_80"  href="<?php echo $this->webroot;?>resume/index/?from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>&emp_id=<?php echo $empId[$key];?>&keyword=<?php echo $this->request->query['keyword'];?>&loc=<?php echo $this->request->query['loc'];?>&report_status=4&iframe=1"><?php echo $cvWaitingData[$key];?></a></td>
										<td><a class="iframeBox" val="90_80"  href="<?php echo $this->webroot;?>resume/index/?from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>&emp_id=<?php echo $empId[$key];?>&keyword=<?php echo $this->request->query['keyword'];?>&loc=<?php echo $this->request->query['loc'];?>&report_status=5&iframe=1"><?php echo $interviewData[$key];?></a></td>
										<td><a class="iframeBox" val="90_80"  href="<?php echo $this->webroot;?>resume/index/?from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>&emp_id=<?php echo $empId[$key];?>&keyword=<?php echo $this->request->query['keyword'];?>&loc=<?php echo $this->request->query['loc'];?>&report_status=6&iframe=1"><?php echo $intDropData[$key];?></a></td>
										<td><a class="iframeBox" val="90_80"  href="<?php echo $this->webroot;?>resume/index/?from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>&emp_id=<?php echo $empId[$key];?>&keyword=<?php echo $this->request->query['keyword'];?>&loc=<?php echo $this->request->query['loc'];?>&report_status=7&iframe=1"><?php echo $intRejectData[$key];?></a></td>
										<td><a class="iframeBox" val="90_80"  href="<?php echo $this->webroot;?>resume/index/?from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>&emp_id=<?php echo $empId[$key];?>&keyword=<?php echo $this->request->query['keyword'];?>&loc=<?php echo $this->request->query['loc'];?>&report_status=8&iframe=1"><?php echo $candidateOffer[$key];?></a></td>
										<td><a class="iframeBox" val="90_80"  href="<?php echo $this->webroot;?>resume/index/?from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>&emp_id=<?php echo $empId[$key];?>&keyword=<?php echo $this->request->query['keyword'];?>&loc=<?php echo $this->request->query['loc'];?>&report_status=9&iframe=1"><?php echo $offerReject[$key];?></a></td>
										<td><a class="iframeBox" val="90_80"  href="<?php echo $this->webroot;?>resume/index/?from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>&emp_id=<?php echo $empId[$key];?>&keyword=<?php echo $this->request->query['keyword'];?>&loc=<?php echo $this->request->query['loc'];?>&report_status=10&iframe=1"><?php echo $candidateJoin[$key];?></a></td>
										
										<td><a class="iframeBox" val="90_80"  href="<?php echo $this->webroot;?>resume/index/?from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>&emp_id=<?php echo $empId[$key];?>&keyword=<?php echo $this->request->query['keyword'];?>&loc=<?php echo $this->request->query['loc'];?>&report_status=11&iframe=1"><?php echo $billingReport[$key];?></a></td>
										<td><a class="iframeBox" val="90_80"  href="<?php echo $this->webroot;?>resume/index/?from=<?php echo $this->request->query['from'];?>&to=<?php echo $this->request->query['to'];?>&emp_id=<?php echo $empId[$key];?>&keyword=<?php echo $this->request->query['keyword'];?>&loc=<?php echo $this->request->query['loc'];?>&report_status=12&iframe=1"><?php echo $billingData[$key];?></a></td>
									</tr>
											
								<?php endforeach;?>
								</tbody>
							</table>
												
					
					
                
					
					</div>
                    
					
				

				    
                </div>
            </div>
            
		</div>
		
		</div>
