{* Purpose : To list and search incentive.
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
                                    <a href="incentive.php">Incentive</a>
                                </li>
                            
                                <li>
                                   Search Incentive
                                </li>
                            </ul>
                        </div>
                    </nav>

								<div class="srch_buttons">
								<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>
							{if !$ALERT_MSG}
							<a href="incentive.php?action=export&employee={$employee}&f_date={$f_date}&t_date={$t_date}">
							<button type="button" val="incentive.php?action=export&employee={$employee}&f_date={$f_date}&t_date={$t_date}" name="export" class="jsRedirect btn btn-warning" >Export</button></a></a>							
							{/if}	
							 
							{if $module['create_incentive'] eq '1'}
							<a class="jsRedirect" data-notify-time = '3000'   href="add_incentive.php">
							<input type="button" value="Create Incentive" class="btn btn-info"/></a>
							{/if}
							</div>

				 	{if $ALERT_MSG}
							<div class="alert alert-info">
								<a class="close" data-dismiss="alert">×</a>
								{$ALERT_MSG}
							</div>
						{/if}
						
						{if $SUCCESS_MSG}
							<div class="alert alert-success">
								<a class="close" data-dismiss="alert">×</a>
								{$SUCCESS_MSG}
							</div>
						{/if}
						
						{if $employee || $f_date || $t_date}
						  {assign var=hide value=''}
						{else}
							{assign var=hide value=dn}
						{/if}
					
					<form action="" id="formID" name="searchFrm" class="formID" method="post" accept-charset="utf-8">
						<div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
						<div class="{$hide} dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							
							<span id="sandbox-container">
							<span class="input-daterange" id="datepicker">	
							<label>From Date: <input type="text" placeholder="dd/mm/yyyy" class="input-small datepick" name="f_date" value="{$f_date}" aria-controls="dt_gal"></label>
							<label>To Date: <input type="text" placeholder="dd/mm/yyyy" name="t_date" value="{$t_date}" class="input-small datepick" aria-controls="dt_gal"></label>				
							</span></span>
							
							<label>Employee: 
						<select name="employee" class="input-medium" placeholder="" style="clear:left" id="IncentiveEmpId">
						<option value="">Select</option>
							{html_options options=$emp_name selected=$employee}
						</option>
						</select> </label>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
					<label style="margin-top:18px;"><a class="jsRedirect" href="incentive.php"><input value="Reset" type="button" class="btn"/></a></label>																		
					</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="incentive/" id="webroot">
						</form>
						

				
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="180"><a href="incentive.php?field=employee&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_employee}">Employee</a></th>										
										<th width="150"><a href="incentive.php?field=target_amt&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_target_amt}">Target Amount</a></th>
										<th width="180"><a href="incentive.php?field=achievement_amt&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_achievement_amt}">Achievement in Amt.</a></th>
										<!--th width="160"><a href="incentive.php?field=achievement_percent&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_achievement_percent}">Achievement in % </a></th-->
										<!--th width="150"><a href="incentive.php?field=eligible_incentive_percent&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_eligible_incentive_percent}">Eligible Incentive % </a></th-->
										<th width="180"><a href="incentive.php?field=eligible_incentive_amt&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_eligible_incentive_amt}">Eligible Incentive Amt. </a></th>
										<th width="100"><a href="incentive.php?field=quarter&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_quarter}">Period</a></th>
										<th width="120"><a href="incentive.php?field=created_date&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_created_date}">Created</a></th>
									</tr>
								</thead>

								<tbody>
									{foreach from=$data item=item key=key}	
									<tr>
										<td width=""><a  href="view_incentive.php?id={$item.id}&emp_id={$item.emp_id}">{$item.employee}</a></td>
										<td width="" >{$item.incentive_target_amt}</td>
										<td width="">{$item.achievement_amt}</td>
										<!--td width="">{$item.achievement_percent}%</td-->
										<!--td width="">{$item.eligible_incentive_percent}%</td-->						
										<td width="">{$item.eligible_incentive_amt}</td>
										<td width="">{$item.period}</td>
										<td width="">{$item.created_date}</td>
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
              </div>
            </div>
     </div>
		</div>
		</div>	
	</div>	
		
{include file='include/footer.tpl'}