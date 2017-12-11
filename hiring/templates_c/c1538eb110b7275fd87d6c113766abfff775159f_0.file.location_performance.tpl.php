<?php
/* Smarty version 3.1.29, created on 2017-12-11 13:08:39
  from "C:\xampp\htdocs\ctsvn\cthiring\hiring\templates\location_performance.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a2e35ff6c9938_52941821',
  'file_dependency' => 
  array (
    'c1538eb110b7275fd87d6c113766abfff775159f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\templates\\location_performance.tpl',
      1 => 1512977916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5a2e35ff6c9938_52941821 ($_smarty_tpl) {
?>

   

			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	

			<!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
			
					<div class="row-fluid">
						
					  
					  <div class="span12" style="margin:0;">
							  <nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="<?php echo @constant('webroot');?>
home"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="location_performance.php">Location Performance</a>
                                </li>
                            
                                <li>
                                   Reporting
                                </li>
                            </ul>
                        </div>
                    </nav>
						
						<div class="srch_buttons">

							<a class="jsRedirect toggleSearch" href="javascript:void(0)">
							<input type="button" value="Search" class="homeSrch btn btn-success"></a>
														 							
							</div>	

							
							<form>
															
						<div class="dn dataTables_filter srchBox homeSrchBox" id="dt_gal_filter" style="display: block;">
							
							
							<span id="sandbox-container">
						<span class="input-daterange" id="datepicker">	
							<label style="margin-left:0">From Date: <input placeholder="dd/mm/yyyy" type="text" class="input-small" name="data[Position][from]" value="" aria-controls="dt_gal"></label>

							<label>To Date: <input placeholder="dd/mm/yyyy" type="text" name="data[Position][to]" value="" class="input-small" aria-controls="dt_gal"></label>

						</span>	
						</span>	
							
							
								
											
							</label>
														<label>Client: 
						<select name="data[Position][emp_id]" class="input-medium" placeholder="" style="clear:left" id="PositionEmpId">
<option value="">Select</option>
<option value="4">Saint Gobain </option>
<option value="97">Tech Mahindra </option>
<option value="66">Infosys Technologies</option>
</select> 					
							</label>
												
							
							<label>
							Location: 
							<select name="data[Position][loc]" class="input-medium" placeholder="" style="clear:left" id="PositionLoc">
<option value="">Select</option>
<option value="104">Ahmadabad</option>
<option value="102">Bangalore</option>
<option value="103">Chennai</option>
<option value="105">Hyderabad</option>
</select> 
							</label>
												
				
						
							
							
							

				<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo"></label>

							<label style="margin-top:18px;"><a class="jsRedirect" href="/ctsvn/cthiring/position/index/"><input value="Reset" type="button" class="btn"></a></label>

					<label style="margin-top:18px;"><a href="#"><input value="Print" type="button" class="btn btn-success"/></a></label>

							<label style="margin-top:18px;"><a href="#"><input value="Export" type="button" class="btn btn-warning"/></a></label>
		
														</div>
					
<input type="hidden" name="data[srchSubmit]" id="srchSubmit"/>

		<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="home/" id="webroot">	
<input type="hidden" name="data[type]" id="type"/>						
						</form>
						
					<div class="row-fluid">		
				<div class="span6">	
				
<h3 class="heading" style="margin-bottom:0;border:;clear:left;">Billing Performance <small> For the year 2016 - 2017</small></h3>
						
							<table class="table table-hover table-bordered table-striped" style="margin: 15px 0px;">
								<thead>
									
	<tr>

										<th width="" style="min-width: 0px; max-width: none;"></th>										
										<th width="" style="text-align:center;min-width: 0px; max-width: none;" colspan="12">Budget Plan Vs Actual Value (in Lacs) </th>
										<th width="" style="min-width: 0px; max-width: none;text-align:center"></th>
										
									</tr>
								
									<tr>

										<th width="100" style="min-width: 0px; max-width: none;"><a href="#">Location</a></th>										
										
										
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Apr</a></a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center" ><a href="#">May</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Jun</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Jul</a> </th>
										
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Aug</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center" ><a href="#">Sep</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Oct</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Nov</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Dec</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Jan</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Feb</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Mar</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center">Total</th>
										
										
										
										
									</tr>
								
								
								</thead>
								
								
								<tbody>
								
								
										
																		<tr>
																				<td width="">Chennai</td>
										
										<td style="text-align:center">12.5</td>
										<td style="text-align:center">3.5</td>
										<td style="text-align:center">12</td>
										<td style="text-align:center">12.4</td>
										
											<td style="text-align:center">12.5</td>
										<td style="text-align:center">3.5</td>
										<td style="text-align:center">12</td>
										<td style="text-align:center">12.4</td>
										
									
										<td style="text-align:center">12.5</td>
										<td style="text-align:center">3.5</td>
										<td style="text-align:center">12</td>
						
						<td style="text-align:center">3.5</td>
																<td style="text-align:center">80</td>

					
								</tr>
								
								<tr>
																				<td width="">Hyderabad</td>
										
									

	<td style="text-align:center">12.5</td>
										<td style="text-align:center">3.5</td>
										<td style="text-align:center">12</td>
										<td style="text-align:center">12.4</td>
<td style="text-align:center">3.5</td>
										<td style="text-align:center">5.4</td>
										<td style="text-align:center">2.4</td>
										<td style="text-align:center">0.8</td>
										<td style="text-align:center">15</td>
											<td style="text-align:center">3.5</td>
										<td style="text-align:center">12</td>
										<td style="text-align:center">12.4</td>
					<td style="text-align:center">67.8</td>
						
					
								</tr>
								
								
								<tr>
																				<td width="">Bangalore</td>
										
										<td style="text-align:center">25.5</td>
										<td style="text-align:center">34</td>
										
											<td style="text-align:center">12.5</td>
										<td style="text-align:center">3.5</td>
										<td style="text-align:center">12</td>
										<td style="text-align:center">12.4</td>
										<td style="text-align:center">60</td>
										<td style="text-align:center">12</td>
												<td style="text-align:center">3.5</td>
												<td style="text-align:center">2.4</td>
										<td style="text-align:center">0.8</td>
										<td style="text-align:center">15</td>
									
						<td style="text-align:center">120.5</td>
					
								</tr>
								
																
																</tbody>
							</table>
				</div>
				
				
				<div class="span6">
				<h3 class="heading" style="margin-bottom:0;clear:left;">Billing Performance <small> For the year 2016 - 2017</small>
							</h3>
							
							
							<div class="graph" id="line_chart" style="clear:both;  margin:5px 0px 0px 25px ;">
							</div>
					
						
						
				</div>
				
				<div class="span6" id="client_chart" style="clear:both;padding-right:25px;border-right:1px dotted #efefef;  margin:5px;height:300px">
							</div>
							
				</div>
							
						
						
				
							<!--div class="span5" id="client_chart" style="clear:both;padding-right:25px; border-right:1px dotted #efefef; margin:25px;height:300px">
							</div>
														
							<div class="span5" id="client_chart2" style="padding-right:25px;  margin:25px;height:300px">
							</div-->
							
							
							
							
							
					</div>
					
                        
					
					</div>
                    
					
				

				    
                </div>
            </div>
            
		

	<?php echo '<script'; ?>
 type="text/javascript" src="https://www.gstatic.com/charts/loader.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
	 google.charts.load('current', {'packages':['corechart', 'line']});
     //  google.charts.setOnLoadCallback(drawChart_1);
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
	  
	//   google.charts.setOnLoadCallback(drawChart_2);
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
	  
	  
google.charts.setOnLoadCallback(drawChart_4);
    function drawChart_4() {

      var data = new google.visualization.DataTable();
     

	/*
	  data.addColumn('string', 'CTC wise');
      data.addColumn('number', 'Conversion of Openings');

      data.addRows([
	      ['0-1', 4],
          ['1-2',6],
          ['2-4',15],
          ['4-8',3],
		  ['8-12',16 ],
		  ['12-20',4 ],
		  ['20-30',2 ],
		  ['30-40',1 ],
		  ['Above 40',1 ]
       
      ]);
	  */
      data.addColumn('string', 'Amount in Lacs');
      data.addColumn('number', 'Chennai');
	  data.addColumn('number', 'Bangalore');
      data.addColumn('number', 'Hyderabad');
	  

      data.addRows([
	      ['Apr',0, 0, 0],
          ['May',155,120,122],
          ['Jun',120,80,78],
          ['Jul',44,88,55],
		  ['Aug',155,120,122],
		  ['Sep',12,88,33],
		  ['Oct',120,80,78],
		  ['Nov',155,120,122],
		  ['Dec',120,80,78],
		  ['Jan',12,88,33],
		  ['Feb',155,120,122],
		  ['Mar',120,80,78]
       
      ]);
	  
	  

     /*
	 var options = {
	   title: 'Billing Performance',
        chart: {
          title: 'Billing Performance',
          subtitle: 'For the year 2017 to 2017'
        },
        height: 200,
		colors: ['#12de6d', '#fcea54', '#12de6d'],
		curveType: 'function',
		pointSize: 6,
		pointShape: 'circle',
		 chartArea:{left:30},
      };
	  */
	   var options = {
	   title: 'Budget Plan Vs Actual (in Lacs)',
        chart: {
          title: 'Billing Performance',
          subtitle: 'Budget Plan Vs Actual'
        },
		series: {
            0: { color: '#6688e9',lineWidth: 2,lineDashStyle: [0, 0],pointShape:'circle'  },
            1: { color: '#fcea54',lineWidth: 2,lineDashStyle: [0, 0],pointShape:'circle'  },
            2: { color: '#12de6d',lineWidth: 2,lineDashStyle: [0, 0],pointShape:'circle'  },
          },
		 chartArea:{left:30},
         height: 180,
		 vAxis: {textStyle: {fontSize:12},},
		vAxis: {
		 gridlines:{color:'#efefef'},
        },
		legend: {position: 'bottom', textStyle: {color: '#000000', fontSize: 12}},
		// curveType: 'function',
		pointSize: 6,
		pointShape: 'circle',
		// colors: ['#6688e9','#6688e9','#fcea54','#fcea54', '#12de6d','#12de6d'],

      };

      // var chart = new google.charts.Line(document.getElementById('line_chart'));
      var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

      chart.draw(data, options);
    }
	
      google.charts.setOnLoadCallback(drawChart_5);
      function drawChart_5() {
        var data = google.visualization.arrayToDataTable([
          ['Location', 'No. Clients'],
          ['Chennai', 11],
          ['Bangalore', 2],
          ['Delhi',  2],
          ['Hyderabad', 2],
          ['Bhopal', 7]
        ]);

        var options = {
          title: 'Client Base, For the year 2016 - 2017',
		  titleTextStyle: { fontSize: 16,color:'#918f8f',fontName:'Roboto', bold:false},
		  pieSliceText: 'label',
		   
        };

        var chart_pie = new google.visualization.PieChart(document.getElementById('client_chart'));

        chart_pie.draw(data, options);
	}
	
	  <?php echo '</script'; ?>
>
	
		
		</div>
		
	</div>
		
				
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
