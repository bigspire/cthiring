
		<div id="maincontainer" class="clearfix">
			<?php echo $this->element('header_static');?>
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
				
					
					<?php echo $this->Session->flash();?>
					
					<div class="row-fluid">
						
					  
					  <div class="span12" style="margin:0;">
							<h3 class="heading" style="margin-bottom:0;">Location  <small> Performance</small>
							</h3>
							
								<form>
								<?php // echo $this->Form->create('Home', array('id' => 'formID','class' => 'formID')); ?>
							
							<div class="dataTables_filter homeSrchBox srchBox" style="float:left;margin-left:;margin-top:15px"  id="dt_gal_filter">
							<label style="margin-top:18px;"><a href="<?php echo $this->webroot;?>home/"><input value="Reset" type="button" class="btn"/></a></label>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
						<?php if($this->Session->read('USER.Login.rights') == '5'):?>	
					
						
						
							<?php endif; ?>
									


					<label>To Date: <input type="text" name="data[Home][to]" value="30/09/2016<?php echo $this->request->query['to'];?>" class="input-small datepick" aria-controls="dt_gal"></label>

							<label>From Date: <input type="text" class="input-small datepick" name="data[Home][from]" value="01/09/2016<?php echo $this->request->query['from'];?>" aria-controls="dt_gal"></label>
							
						
														</div>
<?php echo $this->Form->input('srchSubmit', array('value' => $this->request->query['srchSubmit'], 'type' => 'hidden', 'id' => 'srchSubmit'));?>
<input type="hidden" value="<?php echo date('d/m/Y');?>" id="end_date">
<input type="hidden" value="<?php echo date('d/m/Y', strtotime(date('Y-m-d').  '-3 months'));?>" id="start_date">
		<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="<?php echo $this->webroot;?>home/" id="webroot">	
<?php echo $this->Form->input('type', array('value' => $this->request->query['type'], 'type' => 'hidden', 'id' => 'type'));?>
						
						</form>
						
						
						
							<div class="span5" id="client_chart" style="clear:both;padding-right:25px; border-right:1px dotted #efefef; margin:25px;height:300px">
							</div>
														
							<div class="span5" id="client_chart2" style="padding-right:25px;  margin:25px;height:300px">
							</div>
							
							
							
							
							
					</div>
					
                        
					
					</div>
                    
					
				

				    
                </div>
            </div>
            
		

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
	  google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart_1);
      function drawChart_1() {       
		  var data = google.visualization.arrayToDataTable([
          ['Location','No. Recruiters', 'Positions Worked','Profiles Submitted',
		  'Positions Closed'],
          ['Chennai',155,122,15,23],
          ['Bangalore',120,78,12,89],
          ['Kolkatta',44,55,8,12],
        ]);
	
		  var options = {
          chart: {
            title: 'Profile Performance',
            subtitle: 'Aug, 2016',
			
          }, 
		  vAxis: {
          title: 'Numbers'
        },
		   colors: ['#ab1f57','#6688e9', '#fcea54', '#12de6d'],
		   legend: {position: 'top', maxLines:1, textStyle: {color: '', fontSize: 12}},
          dataOpacity: 0.7,
		  isStacked: false,
		  bar: { groupWidth: '45' },
		  chartArea:{width:"75%"},
		  tooltip:{textStyle: {color: '', fontSize: 13}},
		  titleTextStyle:{ fontSize: 15},
        };

        var chart = new google.charts.Bar(document.getElementById('client_chart'));

        chart.draw(data, options);
      }
	  
	  google.charts.setOnLoadCallback(drawChart_2);
      function drawChart_2() {       
		  var data = google.visualization.arrayToDataTable([
          ['Location','Billings',{role: 'style'}],
          ['Chennai',630890,'#6688e9'],
          ['Bangalore',130890,'#fcea54'],
          ['Kolkatta',30890,'#12de6d'],
        ]);
	
		  var options = {
          chart: {
            title: 'Billing Performance',
            subtitle: 'Aug, 2016',
			
          }, 
		  vAxis: {
          title: 'Numbers'
        },
		   // colors: ['#6688e9', '#fcea54'],
		   legend: {position: 'none', maxLines:1, textStyle: {color: '', fontSize: 12}},
          dataOpacity: 0.7,
		  isStacked: false,
		  bar: { groupWidth: '45' },
		  chartArea:{width:"75%"},
		  tooltip:{textStyle: {color: '', fontSize: 13}},
		  titleTextStyle:{ fontSize: 15},
        };

        var chart = new google.charts.Bar(document.getElementById('client_chart2'));

        chart.draw(data, options);
      }
	  </script>
	
