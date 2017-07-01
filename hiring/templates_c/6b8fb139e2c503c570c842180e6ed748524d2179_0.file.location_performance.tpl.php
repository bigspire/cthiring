<?php
/* Smarty version 3.1.29, created on 2017-07-01 15:52:20
  from "F:\xampp\htdocs\ctsvn\cthiring\hiring\templates\location_performance.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_595777dcb9ebe3_99761617',
  'file_dependency' => 
  array (
    '6b8fb139e2c503c570c842180e6ed748524d2179' => 
    array (
      0 => 'F:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\templates\\location_performance.tpl',
      1 => 1498904389,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_595777dcb9ebe3_99761617 ($_smarty_tpl) {
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
							
								<form>
															
							<div class="dataTables_filter homeSrchBox srchBox" style="float:left;margin-left:;margin-top:15px"  id="dt_gal_filter">
							
		
<label>Client: 
<select name="data[Position][emp_id]" class="input-small" placeholder="" style="clear:left" id="PositionEmpId">
										<option value="">Select</option>
										<option value="1">HCL</option>
										<option value="2">TCS</option>
										<option value="3" Selected>Infosys</option>
										<option value="4">Bigspire</option>
										<option value="5">Wipro</option>								
										</select> 
</label>
<label>From Date: <input type="text" class="input-small datepick" name="data[Home][from]" value="01/09/2016" aria-controls="dt_gal"></label>
							
					<label>To Date: <input type="text" name="data[Home][to]" value="30/09/2016" class="input-small datepick" aria-controls="dt_gal"></label>

							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
							
						<label style="margin-top:18px;"><a href="location_performance.php"><input value="Reset" type="button" class="btn"/></a></label>
							
														</div>
<input type="hidden" name="data[srchSubmit]" id="srchSubmit"/><input type="hidden" value="23/12/2016" id="end_date">
<input type="hidden" value="23/09/2016" id="start_date">
		<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="home/" id="webroot">	
<input type="hidden" name="data[type]" id="type"/>						
						</form>
						
						
						
							<div class="span5" id="client_chart" style="clear:both;padding-right:25px; border-right:1px dotted #efefef; margin:25px;height:300px">
							</div>
														
							<div class="span5" id="client_chart2" style="padding-right:25px;  margin:25px;height:300px">
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
	  <?php echo '</script'; ?>
>
	
		
		</div>
		
	</div>
		
				
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
