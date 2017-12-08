{* Purpose : To show recruiter performance.
   Created : Nikitasa
   Date : 19-06-2017 *}
   

			{include file='include/header.tpl'}
		     <div id="contentwrapper">
                <div class="main_content">
                
				
					
										
					<div class="row-fluid">
						
					  
					  <div class="span12" style="margin:0;">
					  <nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="recruiter_dashboard.php"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="recruiter_performance.php">Recruiter Performance</a>
                                </li>
                            
                                <li>
                                   Reporting
                                </li>
                            </ul>
                        </div>
                    </nav>
				<div class="srch_buttons">

							<a class="jsRedirect" href="javascript:void(0)">
							<input type="button" value="Search" class="homeSrch btn btn-success"></a>
														 							
							</div>
							<form>
															
							<div class="dn dataTables_filter srchBox homeSrchBox" style="float:left;margin-left:;margin-top:15px"  id="dt_gal_filter">
							<label style="margin-top:18px;"><a href="#"><input value="Print" type="button" class="btn btn-success"/></a></label>

							<label style="margin-top:18px;"><a href="#"><input value="Export" type="button" class="btn btn-warning"/></a></label>

							<label style="margin-top:18px;"><a href="recruiter_performance.php"><input value="Reset" type="button" class="btn"/></a></label>
							<label style="margin-top:18px;"><input type="button" value="Submit" class="btn btn-gebo" /></label>
							
					
						
							<label>Employee: 
						<select name="data[emp_id]" class="input-medium" placeholder="" style="clear:left" id="emp_id">
<option value="">Select</option>
<option value="0">Bhargavi</option>
<option value="1" selected="selected">Suganya</option>
</select> 															
													
							</label>
																	<label>Client: <input type="text" placeholder="Client Name" name="data[Home][client]" id = "SearchText" value="Amrutanjan" class="input-large" aria-controls="dt_gal"></label>
				


<label>To Date: <input type="text" name="data[Home][to]" value="30/09/2016" class="input-small datepick" aria-controls="dt_gal"></label>

							<label>From Date: <input type="text" class="input-small datepick" name="data[Home][from]" value="01/09/2016" aria-controls="dt_gal"></label>
							
						
														</div>
<input type="hidden" name="data[srchSubmit]" id="srchSubmit"/><input type="hidden" value="23/12/2016" id="end_date">
<input type="hidden" value="23/09/2016" id="start_date">
		<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="home/" id="webroot">	
<input type="hidden" name="data[type]" id="type"/>						
						</form>
						
						<div class="row-fluid">		
				<div class="span12">	
				
						<h3 class="heading" style="margin-bottom:0;border:;clear:left;">Business Conversion <small> List View</small>
							</h3>
						
							<table class="table table-hover table-bordered table-striped" style="margin: 15px 0px;">
								<thead>
									
									<tr>

										<th width="" style="min-width: 0px; max-width: none;"></th>										
										<th width="" style="text-align:center;min-width: 0px; max-width: none;" colspan="8">CTC value of the position (in Lacs) </th>
										<th width="" style="min-width: 0px; max-width: none;text-align:center">Total</th>
										
									</tr>
								
									<tr>

										<th width="100" style="min-width: 0px; max-width: none;"><a href="#">Performance Factors</a></th>										
										
										
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">0-1</a></a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center" ><a href="#">1 - 2</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">2 - 4</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">4 - 8</a> </th>
										
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">8 - 12</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center" ><a href="#">12 - 20</a></th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">20 - 30</a> </th>
										<th width="50" style="min-width: 0px; max-width: none;text-align:center"><a href="#">30 - 40</a> </th>
										
											<th width="50" style="min-width: 0px; max-width: none;text-align:center"></th>
										
										
										
										
									</tr>
								
								
								</thead>
								
								
								<tbody>
								
								
										
																		<tr>
																				<td width="">Openings Worked</td>
										
										<td style="text-align:center">33</td>
										<td style="text-align:center">3</td>
										<td style="text-align:center">76</td>
										<td style="text-align:center">23</td>
										
										<td style="text-align:center">33</td>
										<td style="text-align:center">3</td>
										<td style="text-align:center">76</td>
										<td style="text-align:center">23</td>
										
										
										
									
										
									
						
						<td width="" style="text-align:center">12999						</td>
						
					
								</tr>
								
								<tr>
																				<td width="">Openings Billed</td>
										
										<td style="text-align:center">33</td>
										<td style="text-align:center">3</td>
										<td style="text-align:center">76</td>
										<td style="text-align:center">23</td>
										
										<td style="text-align:center">33</td>
										<td style="text-align:center">3</td>
										<td style="text-align:center">76</td>
										<td style="text-align:center">23</td>
										
										
										
									
										
									
						
						<td width="" style="text-align:center">12999						</td>
						
					
								</tr>
								
								
								<tr>
																				<td width="">Resumes Submitted</td>
										
										<td style="text-align:center">33</td>
										<td style="text-align:center">3</td>
										<td style="text-align:center">76</td>
										<td style="text-align:center">23</td>
										
										<td style="text-align:center">33</td>
										<td style="text-align:center">3</td>
										<td style="text-align:center">76</td>
										<td style="text-align:center">23</td>
										<td width="" style="text-align:center">12999</td>
						
					
								</tr>
								
																
																</tbody>
							</table>
				</div></div>
				
				
	<div class="row-fluid">		
<div class="span12">	
<div class="span8">&nbsp;</div>
<div class="span4">
										<div><h3>Average Conversion of Openings: 44%</h3> </div>
										<div><h3>Average Resumes Per Opening: 70%</h3>  
										</div>
										
									</div>
</div></div>
				
				<div class="row-fluid">						
<div class="span6">
				<h3 class="heading" style="margin-bottom:0;clear:left;">Recruiter Performance <small> Graphical View</small>
							</h3>
							
							
							<div class="span12 graph" id="line_chart" style="clear:both;  margin:25px 0px 0px 25px ;">
							</div>
					
						
						
				</div>	

		<div class="span6">
				<h3 class="heading" style="margin-bottom:0;clear:left;">Bad Debts Performance <small> List View</small>
							</h3>
							
							
							<div class="span10 graph"  id="debt_work" style="margin:15px 40px;height:180px">
							</div>

							
				
						
						
				</div>	

				
					</div>
					
				<div class="row-fluid">		
				<div class="span8">	
					<h3 class="heading" style="margin-bottom:0;border:;clear:left;">Business Opportunity Conversion <small> List View</small>
							</h3>
							
					<table class="table table-hover table-bordered table-striped" style="margin: 15px 0px">
								<thead >
									
								
									<tr>

										<th width="180" style="min-width: 0px; max-width: none;"><a href="#">Performance Factors</a></th>										
										
										
										<th width="40" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Apr</a></a></th>
										<th width="40" style="min-width: 0px; max-width: none;text-align:center" ><a href="#">May</a></th>
										<th width="40" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Jun</a> </th>
										<th width="40" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Jul</a> </th>
										
										<th width="40" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Aug</a></th>
										<th width="40" style="min-width: 0px; max-width: none;text-align:center" ><a href="#">Sep</a></th>
										<th width="40" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Oct</a> </th>
										<th width="40" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Nov</a> </th>
										<th width="40" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Dec</a> </th>
										<th width="40" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Jan</a> </th>
										<th width="40" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Feb</a> </th>
										<th width="40" style="min-width: 0px; max-width: none;text-align:center"><a href="#">Mar</a> </th>
										
										
										
											<th width="50" style="min-width: 0px; max-width: none;text-align:center">Total</th>
										
										
										
										
									</tr>
								
								
								</thead>
								
								
								<tbody>
								
								
										
																		<tr>
																				<td width="">Candidates Attended Interview</td>
										
										<td style="text-align:center">33</td>
										<td style="text-align:center">3</td>
										<td style="text-align:center">76</td>
										<td style="text-align:center">23</td>
										
										<td style="text-align:center">33</td>
										<td style="text-align:center">3</td>
										<td style="text-align:center">76</td>
										<td style="text-align:center">23</td>
										
										
										<td style="text-align:center">33</td>
										<td style="text-align:center">3</td>
										<td style="text-align:center">76</td>
										<td style="text-align:center">23</td>
									
										
									
						
						<td width="" style="text-align:center">12999						</td>
						
					
								</tr>
								
								<tr>
																				<td width="">No. of Offers Accepted</td>
										
										<td style="text-align:center">33</td>
										<td style="text-align:center">3</td>
										<td style="text-align:center">76</td>
										<td style="text-align:center">23</td>
										
										<td style="text-align:center">33</td>
										<td style="text-align:center">3</td>
										<td style="text-align:center">76</td>
										<td style="text-align:center">23</td>
										
										
										<td style="text-align:center">33</td>
										<td style="text-align:center">3</td>
										<td style="text-align:center">76</td>
										<td style="text-align:center">23</td>
									
										
									
						
						<td width="" style="text-align:center">12999						</td>
						
					
								</tr>
								
								
								<tr>
																				<td width="">VAlue of Offers Accepted</td>
										
										<td style="text-align:center">33</td>
										<td style="text-align:center">3</td>
										<td style="text-align:center">76</td>
										<td style="text-align:center">23</td>
										
										<td style="text-align:center">33</td>
										<td style="text-align:center">3</td>
										<td style="text-align:center">76</td>
										<td style="text-align:center">23</td>
										
										<td style="text-align:center">33</td>
										<td style="text-align:center">3</td>
										<td style="text-align:center">76</td>
										<td style="text-align:center">23</td>
								
						<td width="" style="text-align:center">12999						</td>
								</tr>
								
																
																</tbody>
							</table>
							
							
				</div>	
				
				<div class="span4">
					<h3 class="heading" style="margin-bottom:0;border:;clear:left;">Bad Debts Performance <small> List View</small>
							</h3>		
					<table class="table table-striped table-bordered table-condensed" style="margin:15px 0px;">
										<thead>
											<tr>
												<th>Loss Period</th>
												<th>Loss Value (Total)</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Q1</td>
												<td>44</td>
											</tr>
											<tr>
												<td>Q2</td>
												<td>14</td>
											</tr>
											<tr>
												<td>Q3</td>
												<td>34</td>
											</tr>
											<tr>
												<td>Q4</td>
												<td>67</td>
											</tr>
										</tbody>
									</table>
				</div>
				</div>
				
              </div>	          
					
					</div>
                    
					
				

				    
                </div>
            </div>
            
		
		{literal}

		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		
	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 


	<script>
	  google.charts.load('current', {'packages':['corechart', 'bar','line']});
      google.charts.setOnLoadCallback(drawChart_1);
      
	function drawChart_1() {       
		 
		var data = new google.visualization.DataTable();
		
		data.addColumn('string', 'CTC wise');
		data.addColumn('number', 'Positions Worked');
		data.addColumn('number', 'Profiles Submitted');
		data.addColumn('number', 'Positions Closed');
		
		data.addRows([
		  ['< 10 lacs',155,122,15],
          ['10 - 25 lacs',120,78,12],
          ['25 - 40 lacs',44,55,8],
		  ['> 40 lacs',12,33,6 ]
		 ]);
		 
		 /*
		 var data = google.visualization.arrayToDataTable([
          ['Amount','Positions Worked', 'Profiles Submitted','Positions Closed'],
          ['< 10 lacs',155,122,15],
          ['10 - 25 lacs',120,78,12],
          ['25 - 40 lacs',44,55,8],
		  ['> 40 lacs',12,33,6 ]
        ]);
		*/
		
	function getValueAt(column, dataTable, row) {
			return dataTable.getFormattedValue(row, column);
	}
	
	var view = new google.visualization.DataView(data);
      view.setColumns([0, 
	  1,{ calc: getValueAt.bind(undefined, 1),  sourceColumn: 1,     type: "string",   role: "annotation" },
	  2, { calc: "stringify", sourceColumn: 2, type: "string", role: "annotation" }, 
	  3, { calc: "stringify", sourceColumn: 3, type: "string", role: "annotation" }]
	  );
					   
		  var options = {
		  title: 'Suganya\'s Performance (in bar chart)',

          chart: {
            title: 'Profile Performance',
            subtitle: 'Aug, 2016',
			
          }, 
		  vAxis: {
          title: 'CTC wise',
        },
		 hAxis: {
          title: 'Numbers',
		  gridlines:{color:'#fff'},
		  textPosition : 'none',
        },
		
			colors: ['#6688e9', '#fcea54', '#12de6d'],
		   legend: {position: 'right', maxLines:1, textStyle: {color: '', fontSize: 12}},
          dataOpacity: 0.8,
		  isStacked: true,
		  bar: { groupWidth: '55%' },
		  chartArea:{width:"67%",left:110},
		  tooltip:{textStyle: {color: '', fontSize: 13}},
		  titleTextStyle:{ fontSize: 15},
        };
		var chart = new google.visualization.BarChart(document.getElementById('profile_work'));
       // var chart = new google.charts.Bar(document.getElementById('profile_work'));
		chart.draw(view, options);
        // chart.draw(data, options);
      }
	  
	  google.charts.setOnLoadCallback(drawChart_2);
      
	function drawChart_2() {       
		 
		var data = new google.visualization.DataTable();
		
		data.addColumn('string', 'CTC wise');
		data.addColumn('number', 'Profile Sourcing');
		data.addColumn('number', 'Candidate Coordination');
		data.addColumn('number', 'Client Coordination');
			  
				  
		data.addRows([
		  ['< 10 lacs',24,67,44],
          ['10 - 25 lacs',34,78,12],
          ['25 - 40 lacs',12,55,34],
		  ['> 40 lacs',12,44,46]
		 ]);
		 
		 /*
		 var data = google.visualization.arrayToDataTable([
          ['Amount','Positions Worked', 'Profiles Submitted','Positions Closed'],
          ['< 10 lacs',155,122,15],
          ['10 - 25 lacs',120,78,12],
          ['25 - 40 lacs',44,55,8],
		  ['> 40 lacs',12,33,6 ]
        ]);
		*/
		
	function getValueAt(column, dataTable, row) {
			return dataTable.getFormattedValue(row, column);
	}
	
	var view = new google.visualization.DataView(data);
      view.setColumns([0, 
	  1,{ calc: getValueAt.bind(undefined, 1),  sourceColumn: 1,     type: "string",   role: "annotation" },
	  2, { calc: "stringify", sourceColumn: 2, type: "string", role: "annotation" }, 
	  3, { calc: "stringify", sourceColumn: 3, type: "string", role: "annotation" }]
	  );
					   
		  var options = {
		   title: 'Coordination Performance',
          chart: {
            title: 'Coordination Performance',
            subtitle: 'Aug, 2016',
			
          }, 
		  vAxis: {
          title: 'CTC wise',
        },
		 hAxis: {
		  textPosition : 'none',
          title: 'Numbers',
		  gridlines:{color:'#fff'},

        },
		
		 colors: ['#23E5FF','#d7f477', '#fabec2',],
		   legend: {position: 'right', maxLines:1, textStyle: {color: '', fontSize: 12}},
          dataOpacity: 0.8,
		  isStacked: true,
		  bar: { groupWidth: '55%' },
		  chartArea:{width:"75%"},
		  tooltip:{textStyle: {color: '', fontSize: 13}},
		  titleTextStyle:{ fontSize: 15},
        };
		var chart = new google.visualization.BarChart(document.getElementById('coordinate_work'));
       // var chart = new google.charts.Bar(document.getElementById('profile_work'));
		chart.draw(view, options);
        // chart.draw(data, options);
      }
	  
	  google.charts.setOnLoadCallback(drawChart_3);
      
	function drawChart_3() {       
		 
		var data = new google.visualization.DataTable();
		
		data.addColumn('string', 'CTC wise');
		data.addColumn('number', 'Bad Debts');
			  
		data.addRows([
		  ['Candidate Exit',12000],
          ['Verification',34555],
          ['Inability to Pay',23000],
		  ['Duplication',89900],
		  ['Lack of Agreement',1200]
		 ]);
		 
		 /*
		 var data = google.visualization.arrayToDataTable([
          ['Amount','Positions Worked', 'Profiles Submitted','Positions Closed'],
          ['< 10 lacs',155,122,15],
          ['10 - 25 lacs',120,78,12],
          ['25 - 40 lacs',44,55,8],
		  ['> 40 lacs',12,33,6 ]
        ]);
		*/
		
	function getValueAt(column, dataTable, row) {
			return dataTable.getFormattedValue(row, column);
	}
	
	var view = new google.visualization.DataView(data);
      view.setColumns([0, 
	  1,{ calc: getValueAt.bind(undefined, 1),  sourceColumn: 1,     type: "string",   role: "annotation" }]
	  );
					   
		  var options = {
		   title: 'Bad Debts Performance',
          chart: {
            title: 'Bad Debts Performance',
            subtitle: 'Aug, 2016',
			
          }, 
		  vAxis: {
          title: 'Money lost due to',
        },
		 hAxis: {
          title: 'Numbers',
		  gridlines:{color:'#fff'},

        },

		   legend: {position: 'right', maxLines:1, textStyle: {color: '', fontSize: 12}},
          dataOpacity: 0.8,
		  isStacked: true,
		  bar: { groupWidth: '55%' },
		  chartArea:{width:"75%"},
		  tooltip:{textStyle: {color: '', fontSize: 13}},
		  titleTextStyle:{ fontSize: 15},
        };
		var chart = new google.visualization.BarChart(document.getElementById('debt_work'));
       // var chart = new google.charts.Bar(document.getElementById('profile_work'));
		chart.draw(view, options);
        // chart.draw(data, options);
      }
	  
     google.charts.setOnLoadCallback(drawChart_4);
    function drawChart_4() {

      var data = new google.visualization.DataTable();
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

      var options = {
	   title: 'Suganya\'s Performance',
        chart: {
          title: 'Suganya\'s Performance',
          subtitle: 'Aug, 2016'
        },
        height: 130,
		colors: ['#12de6d', '#fcea54', '#12de6d'],
		curveType: 'function',
		pointSize: 6,
		pointShape: 'circle',
		 chartArea:{left:30},
      };

      // var chart = new google.charts.Line(document.getElementById('line_chart'));
      var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

      chart.draw(data, options);
    }
	
	
	
	google.charts.setOnLoadCallback(drawChart_5);
    function drawChart_5() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'CTC wise');
      data.addColumn('number', 'Positions Worked (Aug, 2016)');
	  data.addColumn('number', 'Positions Worked (Sep, 2016)');
      data.addColumn('number', 'Profiles Submitted (Aug, 2016)');
	  data.addColumn('number', 'Profiles Submitted (Sep, 2016)');
      data.addColumn('number', 'Positions Closed (Aug, 2016)');
      data.addColumn('number', 'Positions Closed (Sep, 2016)');

      data.addRows([
	      ['0',0, 0, 0,0, 0, 0],
          ['< 10 lacs',155,120,122,104,15,5],
          ['10 - 25 lacs',120,80,78,40,12,5],
          ['25 - 40 lacs',44,88,55,76,8,37],
		  ['> 40 lacs',12,88,33,76,6,24]
       
      ]);

      var options = {
	   title: 'Suganya\'s Monthly Comparison (Aug, 2016 VS Sep, 2016)',
        chart: {
          title: 'Suganya\'s Monthly Comparison',
          subtitle: 'Aug, 2016 VS Sep, 2016'
        },
		series: {
            0: { color: '#6688e9',lineWidth: 2,lineDashStyle: [2, 2],pointShape:'circle'  },
            1: { color: '#6688e9',lineWidth: 1 ,pointShape:'circle'},
            2: { color: '#fcea54',lineWidth: 2,lineDashStyle: [2, 2],pointShape:'circle'  },
            3: { color: '#fcea54', lineWidth: 1,pointShape:'circle'},
            4: { color: '#12de6d',lineWidth: 2,lineDashStyle: [2, 2],pointShape:'circle'  },
            5: { color: '#12de6d', lineWidth: 1,pointShape:'circle'},
          },
		 chartArea:{left:30},
         height: 500,
		 vAxis: {textStyle: {fontSize:12},},
		vAxis: {
		 gridlines:{color:'#efefef'},
        },
		legend: {position: 'right', textStyle: {color: '', fontSize: 12}},
		// curveType: 'function',
		pointSize: 6,
		pointShape: 'circle',
		// colors: ['#6688e9','#6688e9','#fcea54','#fcea54', '#12de6d','#12de6d'],

      };

     // var chart = new google.charts.Line(document.getElementById('compare_chart'));
      var chart = new google.visualization.LineChart(document.getElementById('compare_chart'));

      chart.draw(data, options);
    }

     /*
	 google.charts.setOnLoadCallback(drawChart_2);
      function drawChart_2() {       
		  var data = google.visualization.arrayToDataTable([
          ['CTC wise','Profile Sourcing','Candidate Coordination','Client Coordination'],
          ['< 10 lacs',24,67,44],
          ['10 - 25 lacs',34,78,12],
          ['25 - 40 lacs',12,55,34],
		  ['> 40 lacs',12,44,46]
        ]);
	
		  var options = {
          chart: {
            title: 'Coordination Performance',
            subtitle: 'Aug, 2016',
			
          },
		vAxis: {
          title: 'Percentage'
        },
		 colors: ['#23E5FF','#d7f477', '#fabec2',],
		   legend: {position: 'top', maxLines:1, textStyle: {color: '', fontSize: 12}},
          dataOpacity: 0.8,
		  isStacked: false,
		  bar: { groupWidth: '45' },
		  chartArea:{width:"75%",height:'60%',top:5},
		  tooltip:{textStyle: {color: '', fontSize: 13}},
		  titleTextStyle:{ fontSize: 15},
        };

        var chart = new google.charts.Bar(document.getElementById('coordinate_work'));

        chart.draw(data, options);
      }
     
      google.charts.setOnLoadCallback(drawChart_3);
      function drawChart_3() {       
		  var data = google.visualization.arrayToDataTable([
		  ['Activity','Nos.', { role: 'style' }],
          ['Candidate Exit',3,'#fabec2'],
          ['Verification',4,'#c8c3c3'],
          ['Inability to Pay',1,'#d7f477'],
		  ['Duplication',1,'#09418d'],
		  ['Lack of Agreement',6,'#ab1f57']
        ]);
	
		  var options = {
          chart: {
            title: 'Bad Debts Performance',
            subtitle: 'Aug, 2016',
			
          },
		vAxis: {
          title: 'Numbers'
        },
		  legend: {position: 'none', maxLines:1, textStyle: {color: '', fontSize: 12}},
          dataOpacity: 0.8,
		  isStacked: false,
		  bar: { groupWidth: '45' },
		  tooltip:{textStyle: {color: '', fontSize: 13}},
		  titleTextStyle:{ fontSize: 15},
        };

        var chart = new google.charts.Bar(document.getElementById('debt_work'));

        chart.draw(data, options);
      }
	  
*/
	 
	
	  </script>
	{/literal}
		
		</div>
		
	</div>
		
		
{include file='include/footer.tpl'}