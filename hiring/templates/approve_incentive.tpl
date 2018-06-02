{* Purpose : To list and search approve incentive.
 Created : Nikitasa
   Date : 28-05-2017 *}
   

			{include file='include/header.tpl'}
            <!-- main content -->
            <div id="contentwrapper">
			
			
			        <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
								
					<div class="row-fluid">
						 <div class="span12">
							<nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="{$smarty.const.webroot}home"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="approve_incentive.php">Approve Incentive</a>
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
								<a href="approve_incentive.php?action=export&keyword={$smarty.post.keyword}
								&employee={$smarty.post.employee}&f_date={$f_date}&t_date={$t_date}" class="jsRedirect">
								<button type="button" val="approve_incentive.php?action=export&keyword={$smarty.post.keyword}&employee={$smarty.post.employee}&f_date={$f_date}&t_date={$t_date}" name="export" class="btn btn-warning" >Export Excel</button></a>
							{/if}
						</div>
						
						{if $SUCCESS_MSG}
							<div class="alert alert-success">
								<a class="close" data-dismiss="alert">×</a>
								{$SUCCESS_MSG}
							</div>
						{/if}
						
						{if $ALERT_MSG}
							<div class="alert alert-info">
								<a class="close" data-dismiss="alert">×</a>
								{$ALERT_MSG}
							</div>
						{/if}

						{if $employee || $f_date || $t_date || $type}
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
						
						<label>Type: 
						<select name="type" class="input-large" placeholder="" style="clear:left" id="InterviewEmpId">
							{html_options options=$inc_type selected=$type}
						</option>
						</select> 
						</label>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
					<label style="margin-top:18px;"><a class="jsRedirect" href="approve_incentive.php"><input value="Reset" type="button" class="btn"/></a></label>																		
					</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="incentive/" id="webroot">
						</form>

							
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="180"><a href="approve_incentive.php?field=employee&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_employee}">Employee</a></th>	
										<th width="80"><a href="approve_incentive.php?field=incentive_type&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_incentive_type}">Type </a></th>
										<th width="120"><a href="approve_incentive.php?field=period&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_period}">Period</a></th>
										<th width="100"><a href="approve_incentive.php?field=productivity&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_productivity}">Productivity %</a></th>
										<th width="100"><a href="approve_incentive.php?field=interview_candidate&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_interview_candidate}">No. of Candidates Interviewed</a></th>
										<th width="100"><a href="approve_incentive.php?field=target_amt&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_target_amt}">Min. Performance Target (In Rs.)</a></th>
										<th width="100"><a href="approve_incentive.php?field=achieve_amt&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_achieve_amt}">Actual Individual Contribution (In Rs.)</a></th>
										<th width="100"><a href="approve_incentive.php?field=candidate_billed&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_candidate_billed}">No. of Candidates Billed</a></th>
										<th width="180"><a href="approve_incentive.php?field=eligible_incentive_amt&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_eligible_incentive_amt}">Incentive Amount (In Rs.) </a></th>
										<th width="100"><a href="approve_incentive.php?field=ytd&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_contribution}">Individual Contribution - YTD (In Rs.)</a></th>
										<th width="120"><a href="approve_incentive.php?field=created_date&order={$order}&page={$smarty.get.page}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_created_date}">Created</a></th>
										<th width="50">Status</th>
										<th width="70">Pending</th>
										<th width="70" style="text-align:center">Actions</th>
									</tr>

								</thead>
								<tbody>
								{foreach from=$data item=item key=key}	
									{* if $item.job_title *}
									<tr>
										<td width="">{$item.employee|ucwords}</td>
										<td width="">{$item.incentive_type}</td>
										<td width="">{$item.incent_period_display}</td>
										<td width="">{$item.productivity}</td>
										<td width="">{$item.interview_candidate}</td>
										<td width="">{$item.incentive_target_amt}</td>	
										<td width="">{$item.achievement_amt}</td>
										<td width="">{$item.candidate_billed|intval}</td>		
										<td width="">₹{$item.eligible_incentive_amt}</td>
										
										<td width="">-</td>									
										<td width="">{$item.created_date}</td>
										<td>{$item.status}</td>
										{if $item.is_approve eq 'N'}
										<td>{$item.pending}</td>
										{else}
										<td></td>
										{/if}
										{if $show_status[$key] eq 'pass'}
										<td class="actionItem" style="text-align:center">
											<a href="view_approve_incentive.php?id={$item.id}&emp_id={$item.emp_id}&status_id={$item.status_id}" rel="tooltip" class="btn  btn-mini" title="Verify Incentive"><i class="icon-edit"></i></a>
										</td>
										{else}
										<td class="actionItem" style="text-align:center">
											<a href="view_approve_incentive.php?id={$item.id}&emp_id={$item.emp_id}&status_id={$item.status_id}" rel="tooltip" class="btn  btn-mini" title="Verified"><i class="icon-check"></i></a>
										</td>
										{/if}
									</tr>
									{* /if *}
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
<input type="hidden" id="page" value="list_incentive">
              </div>
            </div>
     </div>
		</div>
		</div>	
	</div>	
{include file='include/footer.tpl'}