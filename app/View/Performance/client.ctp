
		<div id="maincontainer" class="clearfix">
			<?php echo $this->element('header_static');?>
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
				
					
					<?php echo $this->Session->flash();?>
					
					<div class="row-fluid">
						
					  
					  <div class="span12" style="margin:0;">
							<h3 class="heading" style="margin-bottom:0;">Client  <small> Performance</small>
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
								<label>Client: <input type="text" placeholder="Client Name" name="data[Home][client]" id = "SearchText" value="Amrutanjan<?php echo $this->params->query['client'];?>" class="input-large" aria-controls="dt_gal"></label>
						
														</div>
<?php echo $this->Form->input('srchSubmit', array('value' => $this->request->query['srchSubmit'], 'type' => 'hidden', 'id' => 'srchSubmit'));?>
<input type="hidden" value="<?php echo date('d/m/Y');?>" id="end_date">
<input type="hidden" value="<?php echo date('d/m/Y', strtotime(date('Y-m-d').  '-3 months'));?>" id="start_date">
		<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="<?php echo $this->webroot;?>home/" id="webroot">	
<?php echo $this->Form->input('type', array('value' => $this->request->query['type'], 'type' => 'hidden', 'id' => 'type'));?>
						
						</form>
						
						
						
							<div class="span5" id="line_chart" style="clear:both;padding-right:25px; border-right:1px dotted #efefef; margin:25px;height:300px">
							</div>
														
							<div class="span5" id="client_chart2" style="padding-right:25px;  margin:25px;height:300px">
							</div>
							
							<div class="span5" id="profile_work" style="padding-right:25px;  margin:25px;height:300px">
							</div>
							
							
							
							
					</div>
					
                        
					
					</div>
                    
					
				

				    
                </div>
            </div>
            
		

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
	google.charts.load('current', {'packages':['corechart','bar']});

	   google.charts.setOnLoadCallback(drawChart_1);
      function drawChart_1() {       
		  var data = google.visualization.arrayToDataTable([
          ['Amount','Positions Worked', 'Profiles Submitted','Positions Closed'],
          ['< 10 lacs',155,122,15],
          ['10 - 25 lacs',120,78,12],
          ['25 - 40 lacs',44,55,8],
		  ['> 40 lacs',12,33,6]
        ]);
	
		  var options = {
          chart: {
            title: 'Individual Client Performance',
            subtitle: 'Aug, 2016',
			
          }, 
		  vAxis: {
          title: 'Numbers'
        },
		   colors: ['#6688e9', '#fcea54', '#12de6d'],
		   legend: {position: 'top', maxLines:1, textStyle: {color: '', fontSize: 12}},
          dataOpacity: 0.7,
		  isStacked: false,
		  bar: { groupWidth: '45' },
		  chartArea:{width:"75%"},
		  tooltip:{textStyle: {color: '', fontSize: 13}},
		  titleTextStyle:{ fontSize: 15},
        };

        var chart = new google.charts.Bar(document.getElementById('profile_work'));

        chart.draw(data, options);
      }
	  
	  google.charts.setOnLoadCallback(drawChart_2);
      function drawChart_2() {       
		  var data = google.visualization.arrayToDataTable([
          ['Location','Billings',{role: 'style'}],
          ['Invoice Value',630890,'#6688e9'],
          ['Pending Collection',130890,'#fcea54'],
          ['Bad Debts',30890,'#12de6d'],
        ]);
	
		  var options = {
          chart: {
            title: 'Individual Client Billing Performance',
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
	  google.charts.setOnLoadCallback(drawChart_4);
    function drawChart_4() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Months');
      data.addColumn('number', 'Amrutanjan');
      data.addColumn('number', 'HP');
      data.addColumn('number', 'Infosys');

      data.addRows([
          ['Mar,2016',677655,767655,232323],
          ['Apr,2016',676777,454554,766766],
          ['May,2016',456666,343333,124454],
		  ['Jun,2016',12000,300000,356666 ]
       
      ]);

      var options = {
	   title: 'Clients\'s Performance',
        chart: {
          title: 'Clients\'s Performance',
          subtitle: 'Aug, 2016'
        },
        height: 300,
		colors: ['#6688e9', '#fcea54', '#12de6d'],
		curveType: 'function',
		pointSize: 6,
		pointShape: 'circle',
		 chartArea:{left:60},
      };

      // var chart = new google.charts.Line(document.getElementById('line_chart'));
      var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

      chart.draw(data, options);
    }
	
	  </script>
	
