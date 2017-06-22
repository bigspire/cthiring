{* Purpose : To list and search billing.
   Created : Nikitasa
   Date : 31-01-2017 *}
   

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
                                    <a href="billing.php">Billings</a>
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
								<a href="billing.php?action=export&keyword={$smarty.post.keyword}
								&f_date={$f_date}&t_date={$t_date}">
								<button type="button" val="billing.php?action=export&keyword={$smarty.post.keyword}&f_date={$f_date}&t_date={$t_date}" name="export" class="jsRedirect btn btn-warning" >Export Excel</button></a>
							{/if}
							<a class="jsRedirect" data-notify-time = '3000'   href="add_billing.php">
							<input type="button" value="Create Billing" class="btn btn-info"/></a>	
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
						
						{if $keyword || $f_date || $t_date}
						  {assign var=hide value=''}
						{else}
							{assign var=hide value=dn}
						{/if}
							<form action="" id="formID" name="searchFrm" class="formID" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
							<div class="{$hide} dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							<label style="margin-left:0;">Keyword: <input type="text" placeholder="Candidate Name or Client Name" name="keyword" id="keyword" value="{$keyword}" class="input-large" aria-controls="dt_gal"></label>
							
							 
							<span id="sandbox-container">
							<span  class="input-daterange" id="datepicker">
							<label>Billing From: 
							<input type="text" class="input-small datepick" name="f_date" placeholder="dd/mm/yyyy" value="{$f_date}" aria-controls="dt_gal"></label>
							<label>Billing Till:
							<input type="text" name="t_date" value="{$t_date}" placeholder="dd/mm/yyyy" class="input-small datepick" aria-controls="dt_gal"></label>
							</span></span>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>					
							<label style="margin-top:18px;"><a href="billing.php" class="jsRedirect"><input value="Reset" type="button" class="btn"/></a></label>	
							</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="#" id="webroot">
						</form>

							
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="180"><a href="billing.php?field=job_title&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_job_title}">Position</a></th>
										<th width="150"><a href="billing.php?field=client_name&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_client_name}">Client Name</a></th>
										<th width="90"><a href="billing.php?field=billing_amount&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_billing_amount}">Billing Amount</a></th>
										<th width="80"><a href="billing.php?field=billing_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_billing_date}">Billing Date</a></th>
										<th width="120"><a href="billing.php?field=candidate_name&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_candidate_name}">Candidate Name</a></th>
										<th width="80"><a href="billing.php?field=created_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_created_date}">Created Date</a></th>
										<th width="80">Status</a></th>
									</tr>
								</thead>
								<tbody>	
								{foreach from=$data item=item key=key}	
									{* if $item.job_title *}
									<tr>
										<td><a  href="view_billing.php?id={$item.id}">{$item.job_title}</a></td>
										<td>{$item.client_name}</td>
										<td>{$item.billing_amount}</td>
										<td>{$item.billing_date}</td>
										<td>{$item.candidate_name}</td>
										<td>{$item.created_date}</td>
										<td>{$item.status}</td>	
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