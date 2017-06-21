{* Purpose : To list and search bonus.
   Created : Nikitasa
   Date : 21-02-2017 *}
   

			{include file='include/header.tpl'}
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
							
					<div class="row-fluid footer_div">
						 <div class="span12"> 
							<nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="{$smarty.const.webroot}home"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="bonus.php">Bonus</a>
                                </li>
                            
                                <li>
                                   Search Bonus
                                </li>
                            </ul>
                        </div>
                    </nav>

						<div class="srch_buttons">
								<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>
							<a class="notify" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Downloading Excel... Please wait..."   href="#">
							<input type="button" value="Export Excel" class="btn btn-warning"/></a>
						</div>
						
						<div class="alert alert-success">
								<a class="close" data-dismiss="alert">×</a>
								<strong>Success</strong> Bonus created successfully!
							</div>
	<form action="#" id="formID" class="formID" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>		
							<div class="dn dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">							
							<label style="margin-left:0">Keyword: <input type="text" placeholder="Job Title or Client Name.." name="data[Bonus][keyword]" id = "SearchText" value="" class="input-large" aria-controls="dt_gal"></label>

							
							
							<label>To Date: <input type="text" placeholder="dd/mm/yyyy" name="data[Bonus][to]" value="" class="input-small datepick" aria-controls="dt_gal"></label>
							<label>From Date: <input type="text" placeholder="dd/mm/yyyy" class="input-small datepick" name="data[Bonus][from]" value="" aria-controls="dt_gal"></label>
							<label>Employee: 
						<select name="data[Bonus][emp_id]" class="input-medium" placeholder="" style="clear:left" id="BonusEmpId">
<option value="">Select</option>
<option value="4">Admin</option>
<option value="66">Bhargavi</option>
<option value="74">Karthick Kumar</option>
<option value="75">Karthik</option>
<option value="37">Karthikeyan S</option>
<option value="84">Kishore Kumar</option>
<option value="89">Kumari</option>
<option value="45">Lavanya Venkateshappa</option>
<option value="92">Magimai Tamil Azhagan</option>
<option value="54">Mary Paulina</option>
<option value="86">Mohammed Aslam</option>
<option value="79">Mohan Reddy</option>
<option value="76">Nandhakumar</option>
<option value="29">Praveena</option>
<option value="80">Prerna Khanudi</option>
<option value="58">Priyanka</option>
<option value="33">Rajalakshmi S</option>
<option value="38">Ranjeet Rajpurohit</option>
<option value="69">Reshu</option>
<option value="35">Suganya</option>
<option value="81">Suganya Pillai</option>
<option value="90">Sumir</option>
<option value="93">Sumitha</option>
<option value="73">Vandana</option>
</select> 
</label>
<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
					
<label style="margin-top:18px;"><a class="jsRedirect" href="bonus.php"><input value="Reset" type="button" class="btn"/></a></label>
							
							
							
														</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="bonus/" id="webroot">
						</form>
						

				
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="210"><a href="#">Employee</a></th>										
										<th width="100" style="text-align:center"><a href="#">Quarter</a></th>
										<th width="120"><a href="#">Bonus(%) </a></th>
										<th width="120"><a href="#">Bonus Amount.</a></th>
										<th width="75"><a href="#" class="desc">Created</a></th>
									</tr>
								</thead>

								<tbody>
									{foreach from=$data item=item key=key}	
									<tr>
										<td width=""><a  href="view_bonus.php?id={$item.id}">Reshu</a></td>
										<td width="" style="text-align:center">Apr16-Jun16</td>
										<td  width="">2%</td>
										<td width="">10,000</td>					
										<td width="">15-Dec-2016</td>
									</tr>
									{/foreach}
								</tbody>
							</table>
<div class="row" style="margin-left:0px;">
<div class="span4">					   
<div class="" id="dt_gal_info">
{$page_info}
</div> 
</div>

<div class="span8">
<div class="dataTables_paginate paging_bootstrap pagination">
<ul>
{$page_links}
</ul>
</div>
</div>
</div>
</div>
<input type="hidden" id="page" value="list_bonus_share">
<input type="hidden" id="web_root" value="delete_bonus_share.php">	
              </div>
            </div>
     </div>
		</div>
		</div>	
	</div>	
{include file='include/footer.tpl'}