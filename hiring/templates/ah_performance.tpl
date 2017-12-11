{* Purpose : To show ah performance report.
   Created : Nikitasa
   Date : 23-06-2017 *}
   

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
                                    <a href="ah_performance.php">Account Holder Performance</a>
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
														<label>Employee: 
						<select name="data[Position][emp_id]" class="input-medium" placeholder="" style="clear:left" id="PositionEmpId">
<option value="">Select</option>
<option value="4">Admin </option>
<option value="97">Anand </option>
<option value="66">Bhargavi M</option>
<option value="98">Chetan S</option>
<option value="96">Eresh Choudhary</option>
<option value="102">Guru Vishnu Test</option>
<option value="94">Jagadeesh </option>
<option value="91">Kamesh K</option>
<option value="74">Karthick Kumar </option>
<option value="37">Karthikeyan S</option>
<option value="95">Kumaresh </option>
<option value="89">Kumari </option>
<option value="45">Lavanya Venkateshappa</option>
<option value="92">Magimai Tamil Azhagan </option>
<option value="54">Mary Paulina </option>
<option value="86">Mohammed Aslam 0</option>
<option value="79">Mohan Reddy </option>
<option value="100">Muthu Kumar</option>
<option value="76">Nandhakumar </option>
<option value="29">Praveena E</option>
<option value="80">Prerna Khanudi </option>
<option value="58">Priyanka </option>
<option value="33">Rajalakshmi S</option>
<option value="38">Ranjeet Rajpurohit</option>
<option value="101">Siva Kumar</option>
<option value="81">Suganya Pillai </option>
<option value="90">Sumir </option>
<option value="93">Sumitha </option>
<option value="103">Vinoth Kumar</option>
<option value="99">Vinoth Kumar</option>
</select> 					
							</label>
												
							
							<label>
							Branch: 
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
				<div class="span12">	
				
<h3 class="heading" style="margin-bottom:0;border:;clear:left;">Business Conversion <small> For the year 2016 - 2017</small></h3>
						
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
										
										
										
									
										
									
						<td width="" style="text-align:center">89						</td>
						
						
					
								</tr>
								
								<tr>
																				<td width="">Openings Billed</td>
										
										<td style="text-align:center">55</td>
										<td style="text-align:center">33</td>
										<td style="text-align:center">12</td>
										<td style="text-align:center">7</td>
										
										<td style="text-align:center">2</td>
										<td style="text-align:center">13</td>
										<td style="text-align:center">76</td>
										<td style="text-align:center">12</td>
										
										
										
									
										
									
						
						<td width="" style="text-align:center">90						</td>
						
					
								</tr>
								
								
								<tr>
																				<td width="">Resumes Submitted</td>
										
										<td style="text-align:center">12</td>
										<td style="text-align:center">33</td>
										<td style="text-align:center">76</td>
										<td style="text-align:center">66</td>
										
										<td style="text-align:center">12</td>
										<td style="text-align:center">31</td>
										<td style="text-align:center">87</td>
										<td style="text-align:center">12</td>
										<td width="" style="text-align:center">60</td>
						
					
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
			
			
			
							<div class="span5" id="client_chart" style="clear:both;padding-right:25px;border-right:1px dotted #efefef;  margin:25px;height:300px">
							</div>
														
							
								<div class="span5 graph"  id="debt_work" style="margin:15px 40px;height:300px">
							</div>

							
						
							
							
							
					</div>
					
                     		<div class="row-fluid">		
				<div class="span8">	
					<h3 class="heading" style="margin-bottom:0;border:;clear:left;">Client wise Billing for the year 2016 - 2017<small> (in Lacs)</small>
							</h3>
							
					<table class="table table-hover table-bordered table-striped" style="margin: 15px 0px">
								<thead >
									
								
									<tr>

										<th width="120" style="min-width: 0px; max-width: none;"><a href="#">Client Name</a></th>										
										
										
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
																				<td width="">Wipro</td>
										
										<td style="text-align:center">2.3</td>
										<td style="text-align:center">3.6</td>
										<td style="text-align:center">5</td>
										<td style="text-align:center">6</td>
										
										<td style="text-align:center">22</td>
										<td style="text-align:center">3</td>
										<td style="text-align:center">14.5</td>
										<td style="text-align:center">12</td>
										
										
										<td style="text-align:center">12</td>
										<td style="text-align:center">3</td>
										<td style="text-align:center">12</td>
										<td style="text-align:center">17.4</td>
									
										
									
						
						<td width="" style="text-align:center">83.4						</td>
						
					
								</tr>
								
								<tr>
																				<td width="">Infosys</td>
										
										<td style="text-align:center">12.5</td>
										<td style="text-align:center">30</td>
										<td style="text-align:center">12.5</td>
										<td style="text-align:center">32</td>
										
										<td style="text-align:center">10</td>
										<td style="text-align:center">3</td>
										<td style="text-align:center">2.5</td>
										<td style="text-align:center">6</td>
										
										
										<td style="text-align:center">12</td>
										<td style="text-align:center">13</td>
										<td style="text-align:center">33</td>
										<td style="text-align:center">12</td>
									
										
									
						
						<td width="" style="text-align:center">93.5</td>
						
					
								</tr>
								
								
								<tr>
																				<td width="">Tech Mahindra</td>
										
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
					<h3 class="heading" style="margin-bottom:0;border:;clear:left;">Bad Debts Performance <small> For the year 2016 - 2017</small>
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
            
		
	{literal}
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
	  google.charts.load('current', {'packages':['corechart','bar']});
      google.charts.setOnLoadCallback(drawChart_4);
      function drawChart_4() {
        var data = google.visualization.arrayToDataTable([
          ['Location', 'No. Clients'],
          ['Chennai', 11],
          ['Bangalore', 2],
          ['Delhi',  2],
          ['Hyderabad', 2],
          ['Bhopal', 7]
        ]);

        var options = {
          title: 'Clients Handled, For the year 2016 - 2017',
		  titleTextStyle: { fontSize: 16,color:'#918f8f',fontName:'Roboto', bold:false},
		  pieSliceText: 'label',
		   
        };

        var chart_pie = new google.visualization.PieChart(document.getElementById('client_chart'));

        chart_pie.draw(data, options);
	}
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
            title: 'Profile Performance',
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
          ['Amount','Profile Sourcing','Candidate Coordination','Client Coordination'],
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
          dataOpacity: 0.7,
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
            subtitle: 'For the year 2016 - 2017',
			
          },
		vAxis: {
          title: 'Numbers'
        },
		  legend: {position: 'none', maxLines:1, textStyle: {color: '', fontSize: 12}},
          dataOpacity: 0.7,
		  isStacked: false,
		  bar: { groupWidth: '45' },
		  chartArea:{width:"75%",height:'60%',top:5},
		  tooltip:{textStyle: {color: '', fontSize: 13}},
		  titleTextStyle:{ fontSize: 15},
        };

        var chart = new google.charts.Bar(document.getElementById('debt_work'));

        chart.draw(data, options);
      }
	  
	  
	  </script>
	{/literal}
		
		</div>
		
	</div>
		
{include file='include/footer.tpl'}