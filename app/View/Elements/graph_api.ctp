 
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
											<td><a  href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
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
											<td><a  href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
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
											<td><a  href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
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
											<td><a href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
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
											<td><a  href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
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
											<td><a  href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
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
											<td><a  href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
											
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
											<td><a  href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
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
											<td><a  href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
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
											<td><a  href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
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
											<td><a  href="<?php echo $this->webroot;?>resume/view/<?php echo $graph_data['Resume']['id'];?>/"><?php echo ucwords($graph_data['Resume']['first_name'].' '.$graph_data['Resume']['last_name']);?></a></td>
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
											<td><a  href="<?php echo $this->webroot;?>position/view/<?php echo $graph_data['Home']['id'];?>/"><?php echo $graph_data['Home']['job_title'];?></a></td>
											<td> 
												<?php echo $graph_data['Client']['client_name'];?>
											</td>
											
										</tr>
										<?php endforeach;endforeach; ?>
										
									</tbody>
								</table>
</div>
</div>
			 

			
		 

	
	<!-- datatable -->
		 


			 
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
              ['<?php echo $date?>', <?php echo $REQ_COUNT[$key] ? $REQ_COUNT[$key] : '';?>, <?php echo $CV_SENT[$key] ? $CV_SENT[$key] : '';?>, <?php echo $CV_SHORTLIST[$key] ? $CV_SHORTLIST[$key]:'';?>,<?php echo $CV_REJECT[$key]?$CV_REJECT[$key]:'';?>, <?php echo $CV_WAITING[$key]?$CV_WAITING[$key]:'';?>, <?php echo $CV_INTERVIEW[$key]?$CV_INTERVIEW[$key]:'';?>,<?php echo $CV_INT_DROP[$key]?$CV_INT_DROP[$key]:'';?>, <?php echo $CV_INT_REJECT[$key]?$CV_INT_REJECT[$key]:'';?>, <?php echo $CV_OFFER[$key]? $CV_OFFER[$key]:'';?>, <?php echo $CV_OFFER_REJECT[$key]?$CV_OFFER_REJECT[$key]:'';?>, <?php echo $CV_JOIN[$key]?$CV_JOIN[$key]:'';?>, <?php echo $CV_BILL[$key] ? $CV_BILL[$key] : '';?>,],
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
	   title: 'Performance Graph, <?php echo $START_CHART_DATE;?> - <?php echo $END_CHART_DATE;?>',
		 /*chart: {
          title: 'Performance Graph',
          subtitle: '21-Aug - 04-Sep'
        },*/
		 vAxis: {
          title: 'Date',
		  textStyle: {color: '', fontSize: 12}
        },
        hAxis: {
          title: '',
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
		  legend: {position: $('#graph_pos').val(), maxLines:4, textStyle: {color: '', fontSize: 11}},
          dataOpacity: 0.7,
		  isStacked: true,
		  bar: {groupWidth: '65%'},
		  chartArea:{width:"75%",height:'70%',top:70},
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
	