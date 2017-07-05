<?php
/* Smarty version 3.1.29, created on 2017-07-03 17:42:17
  from "F:\xampp\htdocs\ctsvn\cthiring\hiring\templates\daily_performance.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_595a34a1785995_10799579',
  'file_dependency' => 
  array (
    'd040ef55fccbbbb4b4960cce49066975987bbb2b' => 
    array (
      0 => 'F:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\templates\\daily_performance.tpl',
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
function content_595a34a1785995_10799579 ($_smarty_tpl) {
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
                                   <a href="daily_performance.php">Daily Performance</a> 
                                </li>
                                <li>
                                  Reporting 
                                </li>
                            </ul>
                        </div>
                    </nav>
				
							<form>
															
							<div class="dataTables_filter homeSrchBox srchBox" style="float:left;margin-left:-10px;margin-top:15px"  id="dt_gal_filter">
							
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

							
							<label style="margin-top:18px;"><input type="button" value="Submit" class="btn btn-gebo" /></label>
							
							<label style="margin-top:18px;"><a href="daily_performance.php"><input value="Reset" type="button" class="btn"/></a></label>
							<label style="margin-top:18px;"><a href="#"><input value="Export" type="button" class="btn btn-warning"/></a></label>
							
						
														</div>
<input type="hidden" name="data[srchSubmit]" id="srchSubmit"/><input type="hidden" value="23/12/2016" id="end_date">
<input type="hidden" value="23/09/2016" id="start_date">
		<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="home/" id="webroot">	
<input type="hidden" name="data[type]" id="type"/>						
						</form>
						
						
							<table class="table table-striped table-hover table-bordered  stickyTable" style="padding: 0px;">
								<thead class="tableFloatingHeaderOriginal" style="position: static; margin-top: 0px; left: 31px; z-index: 3; width: 1287px; top: 0px;">
									<tr>

										<th width="50">Sl. No </th>
										<th width="100">Name </th>
										<th width="50">Work </th>
										<th width="100">Client </th>
										<th width="180">Position Worked</th>
										<th width="130">Actual Profiles sent</th>
										<th width="50">CTC </th>
										<th width="180">Remarks </th>
										<th width="100">Status </th>
										<th width="180">Date and Time of requirement</th>
										<th width="180">Tomorrow's Requirement</th>
										<th width="180">Mandates yet to serve</th>
										
									</tr>
								</thead>
								
								
								<tbody>
							
								<tr>
										<td>1</td>
										<td>Mary</td>
										<td>FN</td>
										<td>Elgi Ultra</td>
										<td>Head RD</td>
										<td style="text-align:center">0</td>
										<td>50 L</td>
										<td>Spoke to 3 people on Linkedn and shared JD</td>
										<td>1 candidate is shortlisted</td>
										<td>02 sept 16 at 9:30 am</td>
										<td>Elgi Ultra- Product costing</td>
										<td>Delfingen –Sr Finance Manager</td>
								
								</tr>

								<tr>
										<td></td>
										<td>Mary</td>
										<td>AN</td>
										<td>Elgi Ultra</td>
										<td>Head RD</td>
										<td style="text-align:center">1</td>
										<td>50 L</td>
										<td></td>
										<td></td>
										<td></td>
										<td>Delfingen –Sr Finance Manager</td>
										<td></td>
								
								</tr>

								<tr>
										<td>2</td>
										<td>Vandana</td>
										<td>FN</td>
										<td>Valeo </td>
										<td>Management Controller</td>
										<td style="text-align:center">2</td>
										<td>15 L</td>
										<td></td>
										<td>2 15L 14.09.2016 at 10.35 AM</td>
										<td></td>
										<td></td>
										<td></td>
								
								</tr>

								<tr>
										<td></td>
										<td></td>
										<td>AN</td>
										<td>Valeo </td>
										<td> HR Manager</td>
										<td style="text-align:center">0</td>
										<td>15 L</td>
										<td>Looking specifically from R&D Automobile, not finding suitable candidate</td>
										<td>12.09.2016 at 11:00 AM</td>
										<td></td>
										<td>BD Manager &HR Manager - Valeo</td>
										<td></td>
								
								</tr>		

								<tr>
										<td>3</td>
										<td>Reshu</td>
										<td>FN</td>
										<td>GMR DIAL</td>
										<td> CSC</td>
										<td style="text-align:center">4</td>
										<td>4.8 L</td>
										<td></td>
										<td>Fresh</td>
										<td>02-Aug- 3:00 PM</td>
										<td>GMR DIAL</td>
										<td></td>
								
								</tr>			
								<tr>
										<td></td>
										<td></td>
										<td>AN</td>
										<td> GMR DIAL </td>
										<td> CSC & Follow up for GMR Drive</td>
										<td style="text-align:center">2</td>
										<td>4.8 L</td>
										<td></td>
										<td>Fresh</td>
										<td>02-Aug- 3:00 PM</td>
										<td>GMR DIAL</td>
										<td></td>
								
								</tr>			
								<tr>
										<td>4</td>
										<td></td>
										<td>FN</td>
										<td>Konnect Analytics</td>
										<td> Marketing Executive</td>
										<td style="text-align:center">0</td>
										<td>12 L</td>
										<td>Took 2 cvs, got information by 2pm that position is closed and Client have changed the requirement</td>
										<td></td>
										<td></td>
										<td>NTC Group</td>
										<td></td>
								</tr>	
								<tr>
										<td></td>
										<td></td>
										<td>AN</td>
										<td> Indigo</td>
										<td>Inflight Trainee</td>
										<td style="text-align:center">3</td>
										<td>12 L</td>
										<td>adding for drive</td>
										<td>Fresh </td>
										<td></td>
										<td>Dechen</td>
										<td></td>
								</tr>	
								<tr>
										<td>5</td>
										<td>Priyanka</td>
										<td>FN</td>
										<td> GMR DIAL</td>
										<td>CSC</td>
										<td style="text-align:center">3</td>
										<td>4.8 L</td>
										<td></td>
										<td>Fresh </td>
										<td>02-Aug- 3:00 PM</td>
										<td>GMR DIAL</td>
										<td></td>
								</tr>	
								<tr>
										<td></td>
										<td></td>
										<td>AN</td>
										<td> GMR DIAL</td>
										<td>CSC </td>
										<td style="text-align:center">3</td>
										<td>4.8 L</td>
										<td> </td>
										<td>Fresh </td>
										<td>02-Aug- 3:00 PM</td>
										<td></td>
										<td></td>
								</tr>	
								<tr>
										<td>6</td>
										<td>Kishore</td>
										<td>FN</td>
										<td>Care Data</td>
										<td>Software developer </td>
										<td style="text-align:center">2</td>
										<td>6 L</td>
										<td></td>
										<td>Fresh </td>
										<td>08.08.16 at 10.30 AM</td>
										<td>Care Data infomatics</td>
										<td></td>
								</tr>
								<tr>
										<td></td>
										<td></td>
										<td>AN</td>
										<td>Care Data</td>
										<td>Software developer </td>
										<td style="text-align:center">1</td>
										<td>6 L</td>
										<td> </td>
										<td>Fresh </td>
										<td>08.08.16 at 10.30 AM</td>
										<td></td>
										<td></td>
								</tr>
								<tr>
										<td>7</td>
										<td>Aslam</td>
										<td>FN</td>
										<td>Valeo</td>
										<td>CAD Engineer </td>
										<td style="text-align:center">4</td>
										<td>6 L</td>
										<td></td>
										<td>Fresh </td>
										<td>15.09.2016 at 10.30 AM</td>
										<td></td>
										<td></td>
								</tr>
								<tr>
										<td></td>
										<td></td>
										<td>AN</td>
										<td>Care Data</td>
										<td>Software developer </td>
										<td style="text-align:center">1</td>
										<td>6 L</td>
										<td></td>
										<td>Fresh </td>
										<td>08.08.16 at 10.30 AM</td>
										<td></td>
										<td></td>
								</tr>
								</tbody>
							</table>
							<div class="row" style="margin-left:0px;">


<div class="span4">					   
<div class="" id="dt_gal_info">

Page <span>1</span> of <span>14</span> <b>Total:</b> <span>100</span>

</div> 
</div>

<div class="span8">

<div class="dataTables_paginate paging_bootstrap pagination">
					
 <ul>
<li class="disabled"><a>1</a></li> <li><a href="#">2</a></li> <li><a href="#">3</a></li> <li><a href="#">4</a></li> <li><a href="#">5</a></li> <li><a href="#">6</a></li> <li><a href="#">7</a></li> <li><a href="#">8</a></li> <li><a href="#">9</a></li>
<li class="next"><a href="#" rel="next"> Next &gt;</a></li><li><a href="#" rel="last"> Last &gt;&gt;</a></li>

</ul>
</div>
</div>
</div>
</div>
</div>
</div>
 </div>
            
	
		
		</div>
		
	</div>
		
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
