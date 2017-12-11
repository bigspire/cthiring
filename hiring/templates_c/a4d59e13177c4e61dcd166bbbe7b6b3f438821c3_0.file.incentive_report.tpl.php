<?php
/* Smarty version 3.1.29, created on 2017-12-11 17:39:00
  from "C:\xampp\htdocs\ctsvn\cthiring\hiring\templates\incentive_report.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a2e755cd32110_13967845',
  'file_dependency' => 
  array (
    'a4d59e13177c4e61dcd166bbbe7b6b3f438821c3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\templates\\incentive_report.tpl',
      1 => 1512994132,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5a2e755cd32110_13967845 ($_smarty_tpl) {
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
                                     <a href="incentive_report.php">Incentive Report</a> 
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
															
						<div class="dataTables_filter homeSrchBox srchBox"  id="dt_gal_filter">
						<span id="sandbox-container">
						<span class="input-daterange" id="datepicker">	
							<label style="margin-left:0">From Date: <input placeholder="dd/mm/yyyy" type="text" class="input-small" name="data[Position][from]" value="" aria-controls="dt_gal"></label>

							<label>To Date: <input placeholder="dd/mm/yyyy" type="text" name="data[Position][to]" value="" class="input-small" aria-controls="dt_gal"></label>

						</span>	
						</span>	
						<label>Employee: 
						<select name="data[emp_id]" class="input-medium" placeholder="" style="clear:left" id="emp_id">
							<option value="">Select</option>
							<option value="0">Bhargavi</option>
							<option value="1" selected="selected">Suganya</option>
						</select> 															
						</label>
						
						<label>Client: <input type="text" placeholder="Client Name" name="data[Home][client]" id = "SearchText" value="Amrutanjan" class="input-large" aria-controls="dt_gal"></label>
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
										
						
						<label style="margin-top:18px;"><input type="button" value="Submit" class="btn btn-gebo" /></label>
						<label style="margin-top:18px;"><a href="incentive_report.php"><input value="Reset" type="button" class="btn"/></a></label>	
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
										<th width="120">Employee</th>
										<th width="80">Incentive Type</th>
										<th width="60">Period</th>
										<th width="80">Incentive Amount</th>
										<th width="120">Candidate Name </th>
										<th width="100">Offered CTC </th>
										<th width="100">Billed Amount </th>
										<th width="100">Billed Date </th>
									</tr>
									
								</thead>
								
								
								<tbody>
							
								<tr>
										<td>Lawanya</td>
										<td>Profile Shortlisting & Interviewing</td>
										<td>Dec, 2017 </td>
										<td>400 </td>
										<td>Suresh Kumar</td>
										<td>NA</td>
										<td>NA</td>
										<td>NA</td>
										
								</tr>
	                    	<tr>
										<td>Lawanya</td>
										<td>Profile Shortlisting & Interviewing</td>
										<td>Dec, 2017</td>
										<td>800 </td>
										<td>Shankar</td>
										<td>NA</td>
										<td>NA</td>
										<td>NA</td>
								</tr>
								<tr>
										<td>Lawanya</td>
										<td>Position Closure</td>
										<td>Oct - Dec 2017</td>
										<td>12000 </td>
										<td>Balaji</td>
										<td>1200000</td>
										<td>25000</td>
										<td>12-Nov-2017</td>
								</tr>
								<tr>
										<td>Lawanya</td>
										<td>Position Closure</td>
										<td>Oct - Dec 2017 </td>
										<td>8000 </td>
										<td>Krishnan</td>
										<td>600000</td>
										<td>25000</td>
										<td>12-Nov-2017</td>
								</tr>
								<tr>
										<td>Lawanya</td>
										<td>Position Closure</td>
										<td>Oct - Dec 2017 </td>
										<td>3000 </td>
										<td>Ramya</td>
										<td>2500000</td>
										<td>25000</td>
										<td>12-Nov-2017</td>
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
