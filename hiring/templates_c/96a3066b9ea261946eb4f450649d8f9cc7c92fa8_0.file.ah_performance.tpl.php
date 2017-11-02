<?php
/* Smarty version 3.1.29, created on 2017-11-01 12:43:52
  from "/var/www/html/mh/hiring/templates/ah_performance.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59f97430513855_64010424',
  'file_dependency' => 
  array (
    '96a3066b9ea261946eb4f450649d8f9cc7c92fa8' => 
    array (
      0 => '/var/www/html/mh/hiring/templates/ah_performance.tpl',
      1 => 1507896053,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_59f97430513855_64010424 ($_smarty_tpl) {
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
                                    <a href="ah_performance.php">Account Holder Performance</a>
                                </li>
                            
                                <li>
                                   Reporting
                                </li>
                            </ul>
                        </div>
                    </nav>

							
					<form>
															
						<div class="dataTables_filter homeSrchBox srchBox" style="float:left;margin-left:;margin-top:15px"  id="dt_gal_filter">
						<label>Employee: 
						<select name="data[emp_id]" class="input-medium" placeholder="" style="clear:left" id="emp_id">
							<option value="">Select</option>
							<option value="0">Bhargavi</option>
							<option value="1" selected="selected">Suganya</option>
						</select> 															
													
						</label>
						<label>Client: <input type="text" placeholder="Client Name" name="data[Home][client]" id = "SearchText" value="Amrutanjan" class="input-large" aria-controls="dt_gal"></label>
						<label>From Date: <input type="text" class="input-small datepick" name="data[Home][from]" value="01/09/2016" aria-controls="dt_gal"></label>
						
						<label>To Date: <input type="text" name="data[Home][to]" value="30/09/2016" class="input-small datepick" aria-controls="dt_gal"></label>

						<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
						<label style="margin-top:18px;"><a href="ah_performance.php"><input value="Reset" type="button" class="btn"/></a></label>

						</div>
<input type="hidden" name="data[srchSubmit]" id="srchSubmit"/><input type="hidden" value="23/12/2016" id="end_date">
<input type="hidden" value="23/09/2016" id="start_date">
		<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="home/" id="webroot">	
<input type="hidden" name="data[type]" id="type"/>						
						</form>
						
						
							<div class="span5" id="client_chart" style="clear:both;padding-right:25px;border-right:1px dotted #efefef;  margin:25px;height:300px">
							</div>
														
							<div class="span5" id="profile_work" style="margin:25px;height:300px">
							</div>
							
							<div class="span5"  id="coordinate_work" style="padding-right:25px;border-right:1px dotted #efefef; margin:25px;height:300px">
							</div>
							
							<div class="span5"  id="debt_work" style="margin:25px;height:300px">
							</div>		
							
					</div>
					
					</div>
				    
                </div>
            </div>
            
		
	
	<?php echo '<script'; ?>
 type="text/javascript" src="https://www.gstatic.com/charts/loader.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
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
          title: 'Clients Handled, Aug \'16',
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
            subtitle: 'Aug, 2016',
			
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
	  
	  
	  <?php echo '</script'; ?>
>
	
		
		</div>
		
	</div>
		
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
