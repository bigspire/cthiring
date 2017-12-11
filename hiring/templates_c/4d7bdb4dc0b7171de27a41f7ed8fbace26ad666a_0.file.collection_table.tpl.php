<?php
/* Smarty version 3.1.29, created on 2017-12-11 17:40:24
  from "C:\xampp\htdocs\ctsvn\cthiring\hiring\templates\collection_table.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a2e75b085b862_45107088',
  'file_dependency' => 
  array (
    '4d7bdb4dc0b7171de27a41f7ed8fbace26ad666a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\templates\\collection_table.tpl',
      1 => 1512994192,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5a2e75b085b862_45107088 ($_smarty_tpl) {
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
                                     <a href="collection_table.php">Collection Table</a> 
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
							<label style="margin-left:0" >From Date: <input placeholder="dd/mm/yyyy" type="text" class="input-small" name="data[Position][from]" value="" aria-controls="dt_gal"></label>

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
							<label style="margin-top:18px;"><a href="collection_table.php"><input value="Reset" type="button" class="btn"/></a></label>
							
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
										<th width="200">Client Name </th>
										<th width="200">Location of Client </th>
										<th width="250" style="text-align:center;min-width: 0px; max-width: none;" colspan="3"> Average Collection Days</th>	
									<tr>
											<th> </th>
											<th> </th>
											<th width="100" style="text-align:center">FTQ </th>
											<th width="100" style="text-align:center">YTD </th>
											<th width="100" style="text-align:center">Last Year Average </th>
										</tr>	
																
									</tr>
									
								</thead>
								
								
								<tbody>
								<tr>
										<td>Maruti</td>
										<td>Noida</td>
										<td style="text-align:center">15 days</td>
										<td style="text-align:center">17 days</td>
										<td style="text-align:center">46 days</td>
								</tr>
	                   	<tr>
										<td>Manali Petrochemicals</td>
										<td>Chennai</td>
										<td style="text-align:center">16 days</td>
										<td style="text-align:center">35 days</td>
										<td style="text-align:center">47 days</td>
								</tr>
								<tr>
										<td>FoodBox</td>
										<td>Bangalore</td>
										<td style="text-align:center">15 days</td>
										<td style="text-align:center">32 days</td>
										<td style="text-align:center">54 days</td>
								</tr>
								<tr>
										<td>SPR Construction Pvt Ltd</td>
										<td>Chennai</td>
										<td style="text-align:center">14 days</td>
										<td style="text-align:center">32 days</td>
										<td style="text-align:center">47 days</td>
								</tr>
								<tr>
										<td>Indigo Airlines</td>
										<td>Gurgaon</td>
										<td style="text-align:center">7 days</td>
										<td style="text-align:center">28 days</td>
										<td style="text-align:center">36 days</td>
								</tr>
								<tr>
										<td>Salcomp</td>
										<td>Chennai</td>
										<td style="text-align:center">14 days</td>
										<td style="text-align:center">36 days</td>
										<td style="text-align:center">48 days</td>
								</tr>
								<tr>
										<td>Izaap Technologies Pvt Ltd</td>
										<td>Chennai</td>
										<td style="text-align:center">11 days</td>
										<td style="text-align:center">24 days</td>
										<td style="text-align:center">46 days</td>
								</tr>
								<tr>
										<td>Results Marine Private Limited</td>
										<td>Mumbai</td>
										<td style="text-align:center">15 days</td>
										<td style="text-align:center">23 days</td>
										<td style="text-align:center">39 days</td>
								</tr>
								<tr>
										<td>Lucas - TVS</td>
										<td>Chennai</td>
										<td style="text-align:center">12 days</td>
										<td style="text-align:center">30 days</td>
										<td style="text-align:center">34 days</td>
								</tr>
								<tr>
										<td>NGC Transmission India Pvt Ltd</td>
										<td>Chennai</td>
										<td style="text-align:center">15 days</td>
										<td style="text-align:center">26 days</td>
										<td style="text-align:center">56 days</td>
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
