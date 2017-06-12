
		<div id="maincontainer" class="clearfix">
			<?php echo $this->element('header_static');?>
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
				
					
					<?php echo $this->Session->flash();?>
					
					<div class="row-fluid">
						
					  
					  <div class="span12" style="margin:0;">
							<h3 class="heading" style="margin-bottom:0;">Revenue  <small> Performance</small>
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
						
						
						
							
							
							<div class="span5" id="line_chart" style="padding-right:25px;clear:left;  margin:25px;height:300px">
							</div>
							
							
							
							
					</div>
					
                        
					
					</div>
                    
					
				

				    
                </div>
            </div>
            
		

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
	google.charts.load('current', {'packages':['corechart','bar']});

	     google.charts.setOnLoadCallback(drawChart_4);
    function drawChart_4() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Months');
      data.addColumn('number', 'Target');
      data.addColumn('number', 'Invoice Value');
      data.addColumn('number', 'RPO Contribution');
      data.addColumn('number', 'Non-RPO Contribution');

      data.addRows([
          ['Mar,2016',500000,450000,300000,150000],
          ['Apr,2016',600000,550000,400000,150000],
          ['May,2016',700000,800000,600000,200000],
		  ['Jun,2016',800000,1200000,1000000,200000 ]
       
      ]);

      var options = {
	   title: 'Revenue\'s Performance',
        chart: {
          title: 'Revenue\'s Performance',
          subtitle: 'Aug, 2016'
        },
        height: 300,
		colors: ['#6688e9', '#fcea54', '#12de6d','#F34929'],
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
	
