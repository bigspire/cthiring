
		<div id="maincontainer" class="clearfix">
			<?php echo $this->element('header');?>
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
				<!--nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <div style="overflow:hidden; position:relative; width: 1053px;"><div><ul style="width: 5000px;">
                                <li class="first">
                                    <a href="<?php echo $this->webroot;?>home/"><i class="icon-home"></i></a>
                                </li>
                                <li style="background: none;">
                                    <a href="<?php echo $this->webroot;?>home/" style="width: 85px;">Home</a></span>
                                </li>
                               
                                
                            </ul></div></div>
                        </div>
                    </nav-->
					
					<?php echo $this->Session->flash();?>
					
					<div class="row-fluid">
						 <div class="span12">
							
							<h3 class="heading" style="margin-bottom:0;">Daily Activity Graph <small>overview</small>
							<div  style="float:right;margin-right:60px;font-size:14px;">

							<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">
										<?php if($this->request->query['type'] == 'req'):?>
											Requirement Graph											
											<?php else: ?>
											As Is Graph
											<?php endif; ?>
											
										<span class="caret"></span></button>
										<ul class="dropdown-menu">
											<?php if($this->request->query['type'] == 'req'):?>
											<li><a href="<?php echo $this->webroot;?>home/?type=asis">As Is Graph</a></li>											
											<?php elseif($this->request->query['type'] != 'req' && $this->Session->read('USER.Login.rights') == '5'): ?>
											<li><a href="<?php echo $this->webroot;?>home/?type=req">Requirement Graph</a></li>
											<?php endif; ?>
											<li class="divider"></li>
											<li><a href="javascript:void(0)" class="homeSrch">Search</a></li>
											<li><a href="javascript:void(0)" class="">Print</a></li>
										</ul>
									</div>
							</div>
							
							</h3>
							
									
									
								<?php echo $this->Form->create('Home', array('id' => 'formID','class' => 'formID')); ?>
							
							<div class="dataTables_filter homeSrchBox srchBox dn" style="float:left;margin-left:100px;margin-top:15px"  id="dt_gal_filter">
							<label style="margin-top:18px;"><a href="<?php echo $this->webroot;?>home/"><input value="Reset" type="button" class="btn"/></a></label>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
						<?php if($this->Session->read('USER.Login.rights') == '5'):?>	
						<label>Branch: 
							<?php echo $this->Form->input('loc', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 'selected' => $this->params->query['loc'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $locList)); ?> 

							</label>
						
							<label>Employee: 
						<?php echo $this->Form->input('emp_id', array('div'=> false,'type' => 'select', 'label' => false, 'class' => 'input-medium', 'empty' => 'Select', 'selected' => $this->params->query['emp_id'], 'required' => false, 'placeholder' => '', 'style' => "clear:left", 'options' => $empList)); ?> 															
													
							</label>
							<?php endif; ?>
										<label>Client: <input type="text" placeholder="Client Name" name="data[Home][client]" id = "SearchText" value="<?php echo $this->params->query['client'];?>" class="input-large" aria-controls="dt_gal"></label>
				
	<label>To Date: <input type="text" name="data[Home][to]" value="<?php echo $this->request->query['to'];?>" class="input-small datepick" aria-controls="dt_gal"></label>

							<label>From Date: <input type="text" class="input-small datepick" name="data[Home][from]" value="<?php echo $this->request->query['from'];?>" aria-controls="dt_gal"></label>
							
						
														</div>
<?php echo $this->Form->input('srchSubmit', array('value' => $this->request->query['srchSubmit'], 'type' => 'hidden', 'id' => 'srchSubmit'));?>
<input type="hidden" value="<?php echo date('d/m/Y');?>" id="end_date">
<input type="hidden" value="<?php echo date('d/m/Y', strtotime(date('Y-m-d').  '-3 months'));?>" id="start_date">
		<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="<?php echo $this->webroot;?>home/" id="webroot">	
<?php echo $this->Form->input('type', array('value' => $this->request->query['type'], 'type' => 'hidden', 'id' => 'type'));?>
						
						</form>
						

							<div class="span10">
							<div id="piechart" style="height:<?php echo $this->Functions->get_chart_height($noDays);?>"></div>
							</div>
							
							
							
							
							
							
							
							
                        </div>
                      
					  
					  <div class="span12" style="margin:0;">
							<h3 class="heading" style="margin-bottom:0;">Individual Recruiter <small>Monthly Performance</small>
							</h3>
							
							
							
							
					</div>
					
                        
					
					</div>
                    
					
				

				    
                </div>
            </div>
            
		
		<input type="hidden" class="piechart1"/>
		<div class="popover2 tbl_cv_join_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client Name</th>
											
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_JOIN_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_join_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		
		<div class="popover2 tbl_cv_bill_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client Name</th>
											
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_BILL_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_bill_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		
			<div class="popover2 tbl_cv_interview_drop_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client</th>
											<th>Stage/Status</th>
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_INT_DROP_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_interview_drop_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
											<td> 
												<?php echo $graph_data['ReqResumeStatus']['stage_title'];?> / <?php echo $graph_data['ReqResumeStatus']['status_title'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		<div class="popover2 tbl_cv_interview_reject_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client</th>
											<th>Stage/Status</th>
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_INT_REJECT_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_interview_reject_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
											<td> 
												<?php echo $graph_data['ReqResumeStatus']['stage_title'];?> / <?php echo $graph_data['ReqResumeStatus']['status_title'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		<div class="popover2 tbl_cv_offer_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client</th>
											<th>Stage/Status</th>
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_OFFER_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_offer_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
											<td> 
												<?php echo $graph_data['ReqResumeStatus']['stage_title'];?> / <?php echo $graph_data['ReqResumeStatus']['status_title'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		
		<div class="popover2 tbl_cv_offer_reject_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client</th>
											<th>Stage/Status</th>
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_OFFER_REJECT_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_offer_reject_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
											<td> 
												<?php echo $graph_data['ReqResumeStatus']['stage_title'];?> / <?php echo $graph_data['ReqResumeStatus']['status_title'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		<div class="popover2 tbl_cv_interview_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client</th>
											<th>Stage/Status</th>
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_INTERVIEW_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_interview_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
											<td> 
												<?php echo $graph_data['ResInterview']['stage_title'];?> / <?php echo $graph_data['ResInterview']['status_title'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		
		<div class="popover2 tbl_cv_waiting_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client Name</th>
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_WAITING_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_waiting_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		
		<div class="popover2 tbl_cv_shortlist_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client Name</th>
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_SHORTLIST_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_shortlist_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		<div class="popover2 tbl_cv_reject_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client Name</th>
										</tr>
									</thead>
									<tbody>
									<?php 									
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_REJECT_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_reject_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>
		
		<div class="popover2 tbl_cv_sent_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="140">Candidate Name</th>
											<th>Client Name</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									//echo '<pre>'; print_r($CV_SENT_DATA);die;
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($CV_SENT_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow cv_sent_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
		</div>

		<div class="popover2 tbl_req_row">
		<div class="scrollable  dn graphTable" data-start ="top" data-height="205" data-visible="true" >
    <table class="table table-hover table-nomargin table-condensed" >
									<thead class="persist-area2">
										<tr>
											<th width="180">Job Title</th>
											<th>Client Name</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									//echo '<pre>'; print_r($REQ_DATA[1]);die;
									foreach($DATE_COUNT as $req_key =>  $date): 
									foreach($REQ_DATA[$req_key] as $graph_data):?>
										<tr class="graphRow req_row_<?php echo $date;?>">
											<td><a target="_blank" href="<?php echo $this->webroot;?>position/view/<?php echo $graph_data['Home']['id'];?>/"><?php echo $graph_data['Home']['job_title'];?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
</div>
		
		
		
		

		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);	  	
		var mouse = {x: null, y: null};
		document.onmousemove = function (e) {
			mouse.x = e.pageX;
			mouse.y = e.pageY;
		}
      function drawChart() {
	  
	 
	   var data = new google.visualization.DataTable();
	   
	   data.addColumn('string', 'Date');
       data.addColumn('number', 'Positions');
       data.addColumn('number', 'CV Sent');
       data.addColumn('number', 'CV Shortlisted');
	   data.addColumn('number', 'CV Rejected');
       data.addColumn('number', 'CV Feedback Awaiting');
	   data.addColumn('number', 'Candidates Interviewed');
	   data.addColumn('number', 'Interview Dropouts');
	   data.addColumn('number', 'Interview Rejected');
	   data.addColumn('number', 'Candidates Offered');
	   data.addColumn('number', 'Offer Dropouts');
	   data.addColumn('number', 'Candidates Joined');
	   data.addColumn('number', 'Candidates Billed');

       data.addRows([
           <?php foreach($DATE_COUNT as $key => $date):?>		  
              ['<?php echo $date?>', <?php echo $REQ_COUNT[$key] ? $REQ_COUNT[$key] : '';?>, <?php echo $CV_SENT[$key] ? $CV_SENT[$key] : '';?>, <?php echo $CV_SHORTLIST[$key] ? $CV_SHORTLIST[$key]:'';?>,<?php echo $CV_REJECT[$key]?$CV_REJECT[$key]:'';?>, <?php echo $CV_WAITING[$key]?$CV_WAITING[$key]:'';?>, <?php echo $CV_INTERVIEW[$key]?$CV_INTERVIEW[$key]:'';?>,<?php echo $CV_INT_DROP[$key]?$CV_INT_DROP[$key]:'';?>, <?php echo $CV_INT_REJECT[$key]?$CV_INT_REJECT[$key]:'';?>, <?php echo $CV_OFFER[$key]? $CV_OFFER[$key]:'';?>, <?php echo $CV_OFFER_REJECT[$key]?$CV_OFFER_REJECT[$key]:'';?>, <?php echo $CV_JOIN[$key]?$CV_JOIN[$key]:'';?>, <?php echo $CV_BILL[$key];?>],
		   <?php endforeach;?>
       
			  
        ]);
		
	function getValueAt(column, dataTable, row) {
		return dataTable.getFormattedValue(row, column);
	}
		
	var view = new google.visualization.DataView(data);
      view.setColumns([0, 
	  1,{ calc: getValueAt.bind(undefined, 1),  sourceColumn: 1,     type: "string",   role: "annotation" },
	  2,{ calc: "stringify",  sourceColumn: 2,     type: "string",   role: "annotation" },
	  3,{ calc: "stringify",  sourceColumn: 3,     type: "string",   role: "annotation" },
	  4,{ calc: "stringify",  sourceColumn: 4,     type: "string",   role: "annotation" },
	  5,{ calc: "stringify",  sourceColumn: 5,     type: "string",   role: "annotation" },
	  6,{ calc: "stringify",  sourceColumn: 6,     type: "string",   role: "annotation" },
	  7,{ calc: "stringify",  sourceColumn: 7,     type: "string",   role: "annotation" },
	  8,{ calc: "stringify",  sourceColumn: 8,     type: "string",   role: "annotation" },
	  9,{ calc: "stringify",  sourceColumn: 9,     type: "string",   role: "annotation" },
	  10,{ calc: "stringify",  sourceColumn: 10,     type: "string",   role: "annotation" },
	  11,{ calc: "stringify",  sourceColumn: 11,     type: "string",   role: "annotation" },
	  12,{ calc: "stringify",  sourceColumn: 12,     type: "string",   role: "annotation" },
	  ]);
					   
		

	  
     
	   var options = {
	   annotations: { textStyle: {
      fontName: 'arial',
      fontSize: 13,
      bold: false,
      italic: false,
      // The color of the text.
      color: '#871b47',
      // The color of the text outline.
      auraColor: '#d799ae',
      // The transparency of the text.
      opacity: 0.7
    }},
	   title: 'Performance Graph, <?php echo $START_DATE;?> - <?php echo $END_DATE;?>',
		 /*chart: {
          title: 'Performance Graph',
          subtitle: '21-Aug - 04-Sep'
        },*/
		 vAxis: {
          title: 'Date',
		  textStyle: {color: '', fontSize: 12}
        },
        hAxis: {
          title: 'Numbers',
		  gridlines:{color:'#fff'},
		  textStyle: {color: '', fontSize: 12},
		  textPosition : 'none'
        },
		axes: {
          x: {
            0: {side: 'top'}
          }
        },
		  colors: ['#6688e9', '#fcea54', '#12de6d', '#ff0000', '#c8c3c3', '#23E5FF', '#ab1f57',  '#811905','#09418d', '#fabec2', '#0dac01','#d7f477'],
		  legend: {position: 'bottom', maxLines:1, textStyle: {color: '', fontSize: 12}},
          dataOpacity: 0.7,
		  isStacked: true,
		  bar: { groupWidth: '65%' },
		  chartArea:{width:"85%",height:'70%',top:5},
		  tooltip:{textStyle: {color: '', fontSize: 13}},
		  titleTextStyle:{ fontSize: 15},
        };
		
		function mouserOverHandler(){
			call_mouse_over('piechart');
		}
		
		function mouserOutHandler(){
			call_mouse_out('piechart');
		}
		
		function myClickHandler(){
		  var selection = chart.getSelection();
		  var message = '';		 
		  for (var i = 0; i < selection.length; i++) {
			var item = selection[i];
			if (item.row != null && item.column != null) {
			  message += 'row:' + item.row + ',column:' + item.column + '';
			} /*
			else if (item.row != null) {
			  message += 'row:' + item.row + '}';
			} else if (item.column != null) {
			  message += 'column:' + item.column + '';
			}
			*/
		  }
		  
		   if (message == '') {
			message = 'nothing';
		  }else{
			val = message.split(',');
			row_val = val[0].split(':');
			row_sel = row_val[1];
			col_val = val[1].split(':');
			col_sel = col_val[1];
		  }
		  
			var selectedItem = chart.getSelection()[0];		   
			if (selectedItem && selectedItem.row != null) {
				$('.piechart1').val(1); 
				var topping = data.getValue(selectedItem.row, 0);			
			}else{
				return;
			}
			
		  
		 
		 call_overlay(mouse.x,mouse.y,topping,row_sel,col_sel, 'piechart1', 'piechart');
		// alert(row_sel);alert(col_sel);
		  //alert('You selected ' + message);
		}


		var chart = new google.visualization.BarChart(document.getElementById('piechart'));
		google.visualization.events.addListener(chart, 'select', myClickHandler); 
		google.visualization.events.addListener(chart, 'onmouseover', mouserOverHandler);
         google.visualization.events.addListener(chart, 'onmouseout', mouserOutHandler);
        chart.draw(view, options);
      }
	    function call_overlay(x,y,topping,row,col,graphCls,graphDiv){ 
			if($('.'+graphCls).val() == '1'){ 
				show_div = get_module_row(col);
				if(show_div != '' && topping != undefined){
					var offset = $('#'+graphDiv).offset();
					var left = x;
					var top = y;
					$('.graphRow').hide();
					$('.tbl_req_row').hide();
					$('.tbl_cv_sent_row').hide();
					$('.tbl_cv_waiting_row').hide();
					$('.tbl_cv_shortlist_row').hide();
					//$('.tbl_cv_hold_row').hide();
					$('.tbl_cv_interview_row').hide();
					$('.tbl_cv_offer_row').hide();
					$('.tbl_cv_offer_reject_row').hide();
					$('.tbl_cv_join_row').hide();
					$('.tbl_cv_interview_reject_row').hide();
					$('.tbl_cv_interview_drop_row').hide();
					$('.tbl_cv_reject_row').hide();
					$('.tbl_cv_bill_row').hide();
					var theHeight = $('.popover2').height();
					//topping = topping.replace(/\s+/g, '_');
					$('.popover2 .tbl_'+show_div).show();
					$('.graphTable').show();
					$('.tbl_'+show_div).show();
					$('.'+show_div+'_'+topping).show();
					$('.popover2').css('left', (left+10) + 'px');
					$('.popover2').css('top', (top-(theHeight/2)-10) + 'px');
				}else{
					$('.graphRow').hide();
					$('.tbl_req_row').hide();
					$('.tbl_cv_sent_row').hide();
					$('.tbl_cv_shortlist_row').hide();
					$('.tbl_cv_waiting_row').hide();
					//$('.tbl_cv_hold_row').hide();
					$('.tbl_cv_interview_row').hide();
					$('.tbl_cv_offer_row').hide();
					$('.tbl_cv_interview_reject_row').hide();
					$('.tbl_cv_join_row').hide();
					$('.tbl_cv_offer_reject_row').hide();
					$('.tbl_cv_interview_drop_row').hide();
					$('.tbl_cv_reject_row').hide();
					$('.tbl_cv_bill_row').hide();
					}
				
				}
		}
	 
	 function call_mouse_over(div) {
		$('#'+div).css('cursor','pointer')
	 }  
	 
     function call_mouse_out(div) {
		$('#'+div).css('cursor','default')
	  }
	  
	  function get_module_row(col){ 
		var div = '';
		if(col == '1' || col == '2'){
			div = 'req_row';
		}else if(col == '3' || col == '4'){
			div = 'cv_sent_row';
		}else if(col == '5' || col == '6'){
			div = 'cv_shortlist_row';
		}else if(col == '7' || col == '8'){
			div = 'cv_reject_row';
		}else if(col == '9' || col == '10'){
			div = 'cv_waiting_row';
		}else if(col == '11' || col == '12'){
			div = 'cv_interview_row';
		}else if(col == '13' || col == '14'){
			div = 'cv_interview_drop_row';
		}else if(col == '15' || col == '16'){
			div = 'cv_interview_reject_row';
		}else if(col == '17' || col == '18'){
			div = 'cv_offer_row';
		}else if(col == '19' || col == '20'){
			div = 'cv_offer_reject_row';
		}else if(col == '21' || col == '22'){
			div = 'cv_join_row';
		}else if(col == '21' || col == '22'){
			div = 'cv_join_row';
		}else if(col == '23' || col == '24'){
			div = 'cv_bill_row';
		}		
		return div;
	  }
	  
	</script>
	
	