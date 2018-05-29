{* Purpose : To show recruiter performance.
   Created : Nikitasa
   Date : 19-06-2017 *}
   

<?php echo $this->element('header');?>		 

    <div id="contentwrapper">
                <div class="main_content">
                
										
					<div class="row-fluid">
						
					  
					  <div class="span12" style="margin:0;">
					 
				
						<?php echo $this->Form->create('Report', array('id' => 'formID','class' => 'formID')); ?>

															
						<div class="dn dataTables_filter srchBox homeSrchBox" id="dt_gal_filter" style="display: block;">
							
							
							<span id="sandbox-container">
						<span class="input-daterange" id="datepicker">	
							<label style="margin-left:0" >From Date: <input placeholder="dd/mm/yyyy" type="text" class="input-small" name="data[Report][from]" value="" aria-controls="dt_gal"></label>

							<label>To Date: <input placeholder="dd/mm/yyyy" type="text" name="data[Report][to]" value="" class="input-small" aria-controls="dt_gal"></label>

						</span>	
						</span>	
							
							
							<label>
							Client: 
		
	<?php echo $this->Form->input('loc', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 
	'selected' => $this->params->query['loc'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $clientList)); ?> 
	
	
							</label>
							
											
							</label>
							
							<label>
							Role: 
							
							
							<?php echo $this->Form->input('role_id', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 
	'selected' => $this->params->query['role_id'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $roleList)); ?> 

							</label>
							
							
							
							
							
							
												
							
							<label>
							Branch: 
					<?php echo $this->Form->input('branch_id', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 
	'selected' => $this->params->query['branch_id'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $locList)); ?> 
			</label>
							
							
														<label>Employee: 
							<?php echo $this->Form->input('emp_id', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 
	'selected' => $this->params->query['emp_id'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $empList)); ?> 

							</label>
												
					<!--label>
							Type: 
							<select name="data[Position][loc]" class="input-small" placeholder="" style="clear:left" id="PositionLoc">
<option value="">Select</option>
<option value="104" selected="selected">Table</option>
<option value="102">Graph</option>

</select> 
							</label-->
						
							
							
							

				<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo"></label>

							<label style="margin-top:18px;"><a class="jsRedirect" href=""><input value="Reset" type="button" class="btn"></a></label>

					
		
														</div>
					
<input type="hidden" name="data[srchSubmit]" id="srchSubmit"/>
<input type="hidden" value="1" id="SearchKeywords">
<input type="hidden" value="home/" id="webroot">	
<input type="hidden" name="data[type]" id="type"/>	
					
						</form>
						
						<div class="row-fluid {$format_type_chart}">		
				<div class="span12">	
				
						<h3 class="heading" style="margin-bottom:0;border:;clear:left;">CTC Wise Client Openings Handled <small> For the year 2018 - 2019</small>
						<div class="pull-right">Table View: 
						
						<a href="javascript:void(0)" rel="printAreaTable" class="printBtn"><input value="Print" type="button" class="btn btn-success"/></a>

						<a href="openings_handled_1a.php?export=1"><input value="Export" type="button" class="btn btn-warning"/></a>
							
						</div>
						
							</h3>
						
							<table class="table table-hover table-bordered table-striped printAreaTable" style="margin: 15px 0px;">
								<thead>
									
									<tr>

										<th width="" style="min-width: 0px; max-width: none;"></th>										
										<th width="" style="text-align:center;min-width: 0px; max-width: none;" colspan="11">
										CTC Wise Client Openings Handled (Recruiter: Lavanya)										

										</th>
										
									</tr>
								
									<tr>

										<th width="100" style="min-width: 0px; max-width: none;"><a href="#">Client</a></th>										
										
										
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">0-1</a></a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center" ><a href="#">1 - 2</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">2 - 4</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">4 - 8</a> </th>
										
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">8 - 12</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center" ><a href="#">12 - 20</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">20 - 30</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">30 - 40</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center" ><a href="#">Above 40</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Total</a> </th>
										
										
									</tr>
								
								
								</thead>
								


								<tbody>
								
								
										
																		<tr>
																				<td width="">Maruti</td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">54</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">2</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">13</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">36</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">54</a></td>
										
										
									
										
									
						
						<th width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">88</th>
						
					
								</tr>
								
								<tr>
																				<td width="">Hero Honda</td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">2</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">12</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">16</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">13</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">10</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">12</a></td>
											<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
									
										
									
										
									
						
						<th width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">90</a>						</th>
						
					
								</tr>
								
								
								<tr>
																				<td width="">Sony</td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<th width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></th>
						
					
								</tr>
								
								<tr>
																				<td width="">Daimler</td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<th width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></th>
						
					
								</tr>
								
									<tr>
																				<td width="">Infosys</td>
										
											<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<th width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></th>
						
					
								</tr>

								<tr>
																				<td width="">Wipro</td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<th width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></th>
						
					
								</tr>
								
								
								<tr>
																				<td width="">TCS</td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<th width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></th>
					
								</tr>
								
								<tr>
																				<td width="">Tata Motors</td>
										
											<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<th width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></th>
						
					
								</tr>
								
								<tr>
																				<td width="">Oracle</td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<th width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></th>
						
					
								</tr>
								
								<tr>
																				<td width="">Mind Tree</td>
										
											<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<th width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></th>
					
								</tr>
								
								<tr>
																				<td width="">Mahindra</td>
										
											<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<th width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></th>
						
					
								</tr>
								
								<tr>
																				<td width="">Renault</td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></td>
										<td style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></td>
										<th width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></th>
						
					
								</tr>
								
								
									<tr>
																				<th width="">Total Openings Handled</th>
										
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></th>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></th>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></th>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></th>
										
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">33</a></th>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></th>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">76</a></th>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">23</a></th>
										<th style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">3</a></th>
										<th width="" style="text-align:center"><a class="iframeBox" href="../position/index/approved/3/" val="90_80">56</a></th>
						
					
								</tr>
								
								
																</tbody>
							</table>
				</div></div>
				
				

				
				<div class="row-fluid {$format_type_table}">						


		<div class="span12">
						<h3 class="heading" style="margin-bottom:0;border:;clear:left;">CTC Wise Client Openings Handled <small> For the year 2018 - 2019</small>
							
								<div class="pull-right">Graph View: 
								
									<a href="javascript:void(0)" rel="printAreaGraph" class="printBtn"><input value="Print" type="button" class="btn btn-success"/></a>

							
							
								</div>
								
								</h3>
							
							
							<div class="graph printAreaGraph"  id="ctc_wise" style="height:600px">
							</div>

							
				
						
						
				</div>	

				
				
					</div>
					
			
				
              </div>	          
					
					</div>
                    
					
				

				    
                </div>
            </div>
            
	
		
		<?php echo $this->element('sidebar');?>		 

	
		
		 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Client', '0-8', '8-20', '20-30', '30-40','Above 40' ],
        ['Maruti', 26, 3, 5, 3, 0],
        ['Hero Honda', 33, 5, 5, 1, 1],
        ['Sony', 12, 6, 4, 0, 1],
		['Daimler', 28, 7, 3, 0, 1],
		['Infosys', 25, 12, 0, 1, 0],
		['Wipro', 16, 14, 0, 0, 2],
		['TCS', 26, 7, 2, 1, 5],
		['Tat Motors', 35, 12, 8, 2, 0],
		['Oracle', 22, 19, 6, 2, 0],
		['Mind Tree', 22, 11, 0, 1, 0],
		['Mahindra', 28, 12, 3, 2, 1],
		['Renault', 17, 9, 1, 2, 1]
      ]);
	  
	  

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,{ calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
						 2,
						 { calc: "stringify",
                         sourceColumn: 2,
                         type: "string",
                         role: "annotation" },
						 3,{ calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" },
						 4,
						 5
                      
                      ]);

      var options = {
        title: "",
		// CTC Wise Monthly Openings Handled (Recruiter: Lavanya)
      
		  vAxis: {
          title: 'Clients',
        },
		 hAxis: {
          title: 'No. of Openings',
		//   gridlines:{color:'#fff'},
		 //  textPosition : 'none',
        },
		
        bar: {groupWidth: "90%"},
       //  legend: { position: "none" },
		isStacked:true,
		
		// '#453d7e', '#2f97d3', '#bdcd40', '#ffcc2b', '#f58634'
		
				 colors: ['#ea3639','#f58634', '#ffcc2b', '#bdcd40', '#2f97d3'],

		//  colors: ['#6688e9', '#09418d', '#12de6d', '#811905', '#ab1f57', '#23E5FF', '#ab1f57',  '#811905','#09418d', '#fabec2', '#0dac01','#d7f477'],
		  legend: {position: 'top', maxLines:1, textStyle: {color: '#000000', fontSize: 14}},
          dataOpacity: 0.8,
		  isStacked: true,
		  bar: { groupWidth: '70%' },
		  chartArea:{width:"98%",left:100},
		  tooltip:{textStyle: {color: '#000000', fontSize: 15}},
		  titleTextStyle:{ fontSize: 15},
      };
      var chart = new google.visualization.BarChart(document.getElementById("ctc_wise"));
      chart.draw(view, options);
  }
  </script>

		
	
		
		</div>
		
	</div>
		
		
