{* Purpose : To show collection table report.
   Created : Nikitasa
   Date : 23-06-2017 *}
   

			{include file='include/header.tpl'}	
		<!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
 			
					<div class="row-fluid">
						
					  
					  <div class="span12" style="margin:0;">
					  <nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="{$smarty.const.webroot}home"><i class="icon-home"></i></a>
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
		
{include file='include/footer.tpl'}