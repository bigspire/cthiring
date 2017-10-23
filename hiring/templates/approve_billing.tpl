{* Purpose : To list and search approve billing.
 Created : Nikitasa
   Date : 06-02-2017 *}
   

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
                                    <a href="approve_billing.php">Approve Billings</a>
                                </li>
                            
                                <li>
                                   Search Billing
                                </li>
                            </ul>
                        </div>
                    </nav>

						<div class="srch_buttons">
								<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>
							{if !$ALERT_MSG}
								<a href="approve_billing.php?action=export&keyword={$smarty.post.keyword}
								&employee={$smarty.post.employee}&f_date={$f_date}&t_date={$t_date}" class="jsRedirect">
								<button type="button" val="approve_billing.php?action=export&keyword={$smarty.post.keyword}&employee={$smarty.post.employee}&f_date={$f_date}&t_date={$t_date}" name="export" class="btn btn-warning" >Export Excel</button></a>
							{/if}
						</div>
						
						{if $SUCCESS_MSG}
							<div class="alert alert-success">
								<a class="close" data-dismiss="alert">×</a>
								{$SUCCESS_MSG}
							</div>
						{/if}
						
						{if $ALERT_MSG}
							<div class="alert alert-success">
								<a class="close" data-dismiss="alert">×</a>
								{$ALERT_MSG}
							</div>
						{/if}

						{if $keyword || $f_date || $t_date || $employee || $valid_reset == 'yes'}
						  {assign var=hide value=''}
						{else}
							{assign var=hide value=dn}
						{/if}
						<form action="" id="formID" name="searchFrm" class="formID" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
						<div class="{$hide} dataTables_filter srchBox reset_show" style="float:left;" id="dt_gal_filter">
						<label style="margin-left:0;">Keyword: <input type="text" placeholder="Candidate Name or Client Name" name="keyword" id ="keyword" value="{$keyword}" class="input-large" aria-controls="dt_gal"></label>	
						
						<span id="sandbox-container">
						<span  class="input-daterange" id="datepicker">	
						<label>Billing From: <input type="text" class="input-small datepick" name="f_date" placeholder="dd/mm/yyyy" style="width:70px;"  value="{$f_date}" aria-controls="dt_gal"></label>
						<label>Billing Till: <input type="text" name="t_date" placeholder="dd/mm/yyyy" value="{$t_date}" style="width:70px;"  class="input-small datepick" aria-controls="dt_gal"></label>						
						</span></span>
						
						<label>Employee: 
						<select name="employee" class="input-medium" placeholder="" style="clear:left" id="BillingEmpId">
						<option value="">Select</option>
							{html_options options=$emp_name selected=$employee}
						</option>
						</select> 
						</label>
						<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
						<label style="margin-top:18px;"><a href="approve_billing.php" class="jsRedirect">
							<input value="Reset" id="reset" type="button" class="btn"/></a>
						</label>	
						</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="#" id="webroot">
						</form>

							
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="120"><a href="approve_billing.php?field=employee&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" class="{$sort_field_employee}">Employee</a></th>
										<th width="120"><a href="approve_billing.php?field=job_title&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" class="{$sort_field_job_title}">Position</a></th>
										<th width="120"><a href="approve_billing.php?field=client&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" class="{$sort_field_client}">Client Name</a></th>
										<th width="100"><a href="approve_billing.php?field=billing_amount&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" class="{$sort_field_billing_amonut}">Billing Amount</a></th>
										<th width="80"><a href="approve_billing.php?field=billing_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" class="{$sort_field_billing_date}">Billing Date</a></th>
										<th width="120"><a href="approve_billing.php?field=candidate&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" class="{$sort_field_candidate}">Candidate Name</a></th>
										<th width="120"><a href="approve_billing.php?field=created&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&employee={$employee}" class="{$sort_field_created}">Created Date</a></th>
										<th width="80">Status</th>
										<th width="70">Pending</th>
										<th width="70" style="text-align:center">Actions</th>

									</tr>
								</thead>
								<tbody>
								{foreach from=$data item=item key=key}	
									{* if $item.job_title *}
									<tr>
										<td>{ucwords($item.employee)}</td>
										<td>{ucwords($item.job_title)}</td>
										<td>{ucwords($item.client_name)}</td>
										<td>{$item.billing_amount}</td>
										<td>{$item.billing_date}</td>
										<td>{ucwords($item.candidate_name)}</td>
										<td>{$item.created_date}</td>
										<td>{$item.status}</td>
										{if $item.is_approved eq 'N'}
										<td>{$item.pending}</td>
										{else}
										<td></td>
										{/if}
										{if $show_status[$key] eq 'pass'}
										<td class="actionItem" style="text-align:center">
											<a href="view_approve_billing.php?id={$item.id}&emp_id={$item.employee_id}&status_id={$item.status_id}" rel="tooltip" class="btn  btn-mini" title="Verify Billing"><i class="icon-edit"></i></a>
										</td>
										{else}
										<td class="actionItem" style="text-align:center">
											<a href="view_approve_billing.php?id={$item.id}&emp_id={$item.employee_id}&status_id={$item.status_id}" rel="tooltip" class="btn  btn-mini" title="Verified"><i class="icon-check"></i></a>
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
<input type="hidden" id="page" value="list_billing">
              </div>
            </div>
     </div>
		</div>
		</div>	
	</div>	
{include file='include/footer.tpl'}