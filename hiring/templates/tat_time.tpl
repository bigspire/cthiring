{* Purpose : To show tat time report.
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
                                     <a href="tat_time.php">TAT Time</a> 
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
							
							<label style="margin-top:18px;"><a href="tat_time.php"><input value="Reset" type="button" class="btn"/></a></label>
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
										<th width="100">Recruiter Name </th>
										<th width="100">TAT (FTM) </th>
										<th width="100">TAT (FTQ) </th>
										<th width="100">TAT (YTD) </th>
									</tr>
									
								</thead>
								
								
								<tbody>
							
								<tr>
										<td>Lawanya</td>
										<td>50 mins</td>
										<td>2 days</td>
										<td>3 days</td>
								</tr>
	                    	<tr>
										<td>Suganya</td>
										<td>60 mins</td>
										<td>1 day</td>
										<td>2 days</td>
								</tr>
								<tr>
										<td>Reshu</td>
										<td>40 mins</td>
										<td>1 day</td>
										<td>1 day</td>
								</tr>
								<tr>
										<td>Bhargavi</td>
										<td>40 mins</td>
										<td>2 days</td>
										<td>1 day</td>
								</tr>
								<tr>
										<td>Bhargavi</td>
										<td>40 mins</td>
										<td>2 days</td>
										<td>1 day</td>
								</tr>	
								<tr>
										<td>John</td>
										<td>45 mins</td>
										<td>2 days</td>
										<td>2 days</td>
								</tr>		
								<tr>
										<td>Kavita</td>
										<td>50 mins</td>
										<td>1 day</td>
										<td>1 day</td>
								</tr>		
								<tr>
										<td>Vandana</td>
										<td>70 mins</td>
										<td>2 days</td>
										<td>2 days</td>
								</tr>		
								<tr>
										<td>Mary</td>
										<td>40 mins</td>
										<td>1 day</td>
										<td>1 day</td>
								</tr>	
								<tr>
										<td>Priyanka</td>
										<td>55 mins</td>
										<td>2 days</td>
										<td>2 days</td>
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