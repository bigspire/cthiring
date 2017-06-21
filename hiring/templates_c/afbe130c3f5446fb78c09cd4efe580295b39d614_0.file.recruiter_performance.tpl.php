<?php
/* Smarty version 3.1.29, created on 2017-06-20 20:33:17
  from "F:\xampp\htdocs\ctsvn\cthiring\hiring\templates\recruiter_performance.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59493935332141_54516428',
  'file_dependency' => 
  array (
    'afbe130c3f5446fb78c09cd4efe580295b39d614' => 
    array (
      0 => 'F:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\templates\\recruiter_performance.tpl',
      1 => 1497959907,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_59493935332141_54516428 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'F:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\vendor\\smarty-3.1.29\\libs\\plugins\\function.html_options.php';
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
				
			<form>
															
				<div class="dataTables_filter homeSrchBox srchBox" style="float:left;margin-left:;margin-top:15px"  id="dt_gal_filter">
						<label style="margin-top:18px;"><a href="javascript:void(0)">
						<input value="Toggle Graph" type="button" class="btn hide_graph"/></a></label>
						<label style="margin-top:18px;"><a href="#">
						<input value="Export" type="button" class="btn btn-warning"/></a></label>
						<label style="margin-top:18px;"><a href="recruiter_performance.php">
						<input value="Reset" type="button" class="btn"/></a></label>
						<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" />					
						</label>
							
						<label>Employee: 
							<select name="emp_name" class="input-medium" placeholder="" style="clear:left" id="emp_name">
								<option value="">Select</option>	
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['emp_id']->value,'selected'=>$_GET['emp_name']),$_smarty_tpl);?>
			    			
							</select>
						</label>
						
						<label>Client:
							<select name="client_name" class="input-medium" placeholder="" style="clear:left" id="client_name">
								<option value="">Select</option>	
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['clients']->value,'selected'=>$_GET['client_name']),$_smarty_tpl);?>
			    			
							</select>
						</label>
						<label>To Date: <input type="text" name="t_date" value="<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
" class="input-small datepick" aria-controls="dt_gal"></label>
						<label>From Date: <input type="text" class="input-small datepick" name="f_date" value="<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
" aria-controls="dt_gal"></label>
				</div>
					
<input type="hidden" name="submit" id="submit"/>
<input type="hidden" value="23/12/2016" id="end_date">
<input type="hidden" value="23/09/2016" id="start_date">
		<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="home/" id="webroot">	
<input type="hidden" name="data[type]" id="type"/>						
						</form>
						
						
							<table class="table table-hover table-bordered  stickyTable" style="padding: 0px;">
								<thead class="tableFloatingHeaderOriginal" style="position: static; margin-top: 0px; left: 31px; z-index: 3; width: 1287px; top: 0px;">
									
									<tr>

										<th width="" style="min-width: 0px; max-width: none;"></th>										
										<th width="" style="min-width: 0px; max-width: none;"></th>
										<th width="260" style="text-align:center;min-width: 0px; max-width: none;" colspan="9">CTC wise Positions Worked (In Lacs)</th>
										<th width="260" style="text-align:center;min-width: 0px; max-width: none;"  colspan="9">CTC wise Profiles Submitted (In Lacs)</th>
										<th width="260" style="text-align:center;min-width: 0px; max-width: none;"  colspan="9">CTC wise Positions Closed (In Lacs)</th>
										
									</tr>
								
									<tr>

										<th width="100" style="min-width: 0px; max-width: none;"><a href="#">Recruiter</a></th>										
										<th width="60" style="min-width: 0px; max-width: none;"><a href="#">Month</a></th>
										
										
										<th width="85" style="min-width: 0px; max-width: none;text-align:center"><a href="#">0 - 1</a></a></th>
										<th width="85" style="min-width: 0px; max-width: none;text-align:center" ><a href="#">1 - 2</a></th>
										<th width="85" style="min-width: 0px; max-width: none;text-align:center"><a href="#">2 - 4</a></th>
										<th width="85" style="min-width: 0px; max-width: none;text-align:center"><a href="#">4 - 8</a></th>
										<th width="85" style="min-width: 0px; max-width: none;text-align:center"><a href="#">8 - 12</a></th>
										<th width="120" style="min-width: 0px; max-width: none;text-align:center"><a href="#">12 - 20</a></th>
										<th width="120" style="min-width: 0px; max-width: none;text-align:center"><a href="#">20 - 30</a></th>
										<th width="120" style="min-width: 0px; max-width: none;text-align:center"><a href="#">30 - 40</a></th>
										<th width="55" style="min-width: 0px; max-width: none;text-align:center"><a href="#">> 40</a></th>
										
										<th width="85" style="min-width: 0px; max-width: none;text-align:center"><a href="#">0 - 1</a></th>
										<th width="85" style="min-width: 0px; max-width: none;text-align:center" ><a href="#">1 - 2</a></th>
										<th width="85" style="min-width: 0px; max-width: none;text-align:center"><a href="#">2 - 4</a></th>
										<th width="85" style="min-width: 0px; max-width: none;text-align:center"><a href="#">4 - 8</a></th>
										<th width="85" style="min-width: 0px; max-width: none;text-align:center"><a href="#">8 - 12</a></th>
										<th width="120" style="min-width: 0px; max-width: none;text-align:center"><a href="#">12 - 20</a></th>
										<th width="120" style="min-width: 0px; max-width: none;text-align:center"><a href="#">20 - 30</a></th>
										<th width="120" style="min-width: 0px; max-width: none;text-align:center"><a href="#">30 - 40</a></th>
										<th width="55" style="min-width: 0px; max-width: none;text-align:center"><a href="#">> 40</a></th>
										
										
										<th width="85" style="min-width: 0px; max-width: none;text-align:center"><a href="#">0 - 1</a></th>
										<th width="85" style="min-width: 0px; max-width: none;text-align:center" ><a href="#">1 - 2</a></th>
										<th width="85" style="min-width: 0px; max-width: none;text-align:center"><a href="#">2 - 4</a></th>
										<th width="85" style="min-width: 0px; max-width: none;text-align:center"><a href="#">4 - 8</a></th>
										<th width="85" style="min-width: 0px; max-width: none;text-align:center"><a href="#">8 - 12</a></th>
										<th width="120" style="min-width: 0px; max-width: none;text-align:center"><a href="#">12 - 20</a></th>
										<th width="120" style="min-width: 0px; max-width: none;text-align:center"><a href="#">20 - 30</a></th>
										<th width="120" style="min-width: 0px; max-width: none;text-align:center"><a href="#">30 - 40</a></th>
										<th width="55" style="min-width: 0px; max-width: none;text-align:center"><a href="#">> 40</a></th>
				
									</tr>
							
								</thead>
							
								<tbody>
								<?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$__foreach_item_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>	
								<tr>
										<td width=""><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['recruiter_name'];?>
</a></td>
										<td width="">09/2016</td>
										
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['position_worked'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['position_worked'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['position_worked'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['position_worked'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['position_worked'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['position_worked'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['position_worked'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['position_worked'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['position_worked'];?>
</a></td>
										
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['profile_submitted'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['profile_submitted'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['profile_submitted'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['profile_submitted'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['profile_submitted'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['profile_submitted'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['profile_submitted'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['profile_submitted'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['profile_submitted'];?>
</a></td>
										
										
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['position_closed'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['position_closed'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['position_closed'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['position_closed'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['position_closed'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['position_closed'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['position_closed'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['position_closed'];?>
</a></td>
										<td style="text-align:center"><a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['position_closed'];?>
</a></td>
								</tr>
								<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
if ($__foreach_item_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_item_0_saved_key;
}
?>																									
						</tbody>
							</table>
<!--div class="row" style="margin-left:0px;">
<div class="span12">
	<div class="dataTables_paginate paging_bootstrap pagination">
<ul>

<li class="disabled"><a>1</a></li> <li><a href="#">2</a></li> <li><a href="#">3</a></li> <li><a href="#">4</a></li> <li><a href="#">5</a></li> <li><a href="#">6</a></li> <li><a href="#">7</a></li> <li><a href="#">8</a></li> <li><a href="#">9</a></li>
<li class="next"><a href="#" rel="next"> Next &gt;</a></li><li><a href="#" rel="last"> Last &gt;&gt;</a></li>

</ul>
</div>
</div>
</div-->

<div class="row" style="margin-left:0px;">
<div class="span12">					   
<div class="" id="dt_gal_info">
<?php echo $_smarty_tpl->tpl_vars['page_info']->value;?>

</div> 
</div>

<div class="span8">
<div class="dataTables_paginate paging_bootstrap pagination">
<ul>
<?php echo $_smarty_tpl->tpl_vars['page_links']->value;?>

</ul>
</div>
</div>
</div>

<h3 class="heading" style="margin-bottom:0;">Recruiter Performance <small> Graphical View</small>
							</h3>
							
							<!--div class="span10 graph" id="compare_chart" style="clear:both;border-bottom:1px dotted #efefef;  height:500px">
							</div-->
							
							<div class="span10 graph" id="line_chart" style="clear:both;  margin:25px 0px 0px 25px ;">
							</div>
					
							<!--div class="span10 graph" id="profile_work" style="clear:both;border-bottom:1px dotted #efefef;  margin:25px;height:300px">
							</div-->
							
							<!--div class="span10 graph"  id="coordinate_work" style="margin:25px ;border-bottom:1px dotted #efefef; height:300px">
							</div-->
							
							<div class="span10 graph"  id="debt_work" style="margin:25px 40px; ;height:300px">
							</div>
							
						
							
					</div>
					
                        
					
					</div>
                    
					
				

				    
                </div>
            </div>
            
		
		

		<?php echo '<script'; ?>
 type="text/javascript" src="https://www.google.com/jsapi"><?php echo '</script'; ?>
>
		
	 <?php echo '<script'; ?>
 type="text/javascript" src="https://www.gstatic.com/charts/loader.js"><?php echo '</script'; ?>
> 


	<?php echo '<script'; ?>
>
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
      data.addColumn('number', 'Positions Worked');
      data.addColumn('number', 'Profiles Submitted');
      data.addColumn('number', 'Positions Closed');

      data.addRows([
	      ['0',  0, 0, 0],
          ['< 10 lacs',155,122,15],
          ['10 - 25 lacs',120,78,12],
          ['25 - 40 lacs',44,55,8],
		  ['> 40 lacs',12,33,6 ]
       
      ]);

      var options = {
	   title: 'Suganya\'s Performance (in line chart)',
        chart: {
          title: 'Suganya\'s Performance (in line and bar chart)',
          subtitle: 'Aug, 2016'
        },
        height: 300,
		colors: ['#6688e9', '#fcea54', '#12de6d'],
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
	 
	
	  <?php echo '</script'; ?>
>
	
		
		</div>
		
	</div>
		
		
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
