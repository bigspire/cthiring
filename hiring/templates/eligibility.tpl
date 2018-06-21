{* Purpose : To list and search eligibility.
   Created : Nikitasa
   Date : 29-01-2017 *}
   
	{include file='include/header.tpl'}

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
                                    <a href="eligibility.php">Eligibility</a>
                                </li>    
                                <li>
                                   View Eligibility
                                </li>
                            </ul>
                        </div>
						</nav>

						<div class="srch_buttons">
								<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>
							{if !$ALERT_MSG}
								<a href="eligibility.php?action=export&status={$status}&type={$smarty.post.type}" class="jsRedirect">
								<button type="button" val="eligibility.php?action=export&status={$status}&type={$smarty.post.type}" name="export" class="btn btn-warning" >Export Excel</button></a>
							{/if}
							
							<a class="jsRedirect" data-notify-time = '3000'   href="add_eligibility.php">
							<input type="button" value="Create Eligibility" class="btn btn-info"/></a>						
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
						
						{if $smarty.post.type}
						  {assign var=hide value=''}
						{else}
							{assign var=hide value=dn}
						{/if}
							<form action="" id="formID" name="searchFrm" class="formID" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
							
							<div class="{$hide} dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							<!--label style="margin-left:0">Keyword: <input type="text" placeholder="Search Here..." name="keyword" id="keyword" value="{$keyword}" class="input-large" aria-controls="dt_gal"></label-->
							<label style="margin-left:0">Type: 
							<select name="type" class="input-medium" style="clear:left" id="ClientStatus">
								{html_options options=$eligibility_type selected=$smarty.post.type}
							</select> 
							</label>
							<label>Status: 
							<select name="status" class="input-small" style="clear:left" id="ClientStatus">
								{html_options options=$status_type selected=$status}
							</select> 
							</label>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
							
							<label style="margin-top:18px;"><a href="eligibility.php" class="jsRedirect"><input value="Reset" type="button" class="btn"/></a></label>
							
						</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="eligibility.php" id="webroot">
						</form>
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="100"><a href="eligibility.php?field=ctc_from&order={$order}&page={$smarty.get.page}&type={$type}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_ctc_from}">CTC</a></th>
										<th width="100"><a href="eligibility.php?field=user_type&order={$order}&page={$smarty.get.page}&type={$user_type}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_user_type}">User Type</a></th>
										<th width="100"><a href="eligibility.php?field=period&order={$order}&page={$smarty.get.page}&type={$period}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_period}">Period</a></th>
										<th width="150"><a href="eligibility.php?field=type&order={$order}&page={$smarty.get.page}&type={$type}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_type}">Type</a></th>
										<th width="100"><a href="eligibility.php?field=no_resumes&order={$order}&page={$smarty.get.page}&type={$type}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_no_resumes}">No of Resume</a></th>
										<th width="100"><a href="eligibility.php?field=amount&order={$order}&page={$smarty.get.page}&type={$type}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_amount}">Amount (INR)</a></th>
										<th width="100"><a href="eligibility.php?field=status&order={$order}&page={$smarty.get.page}&type={$type}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_status}">Status</a></th>
										<th width="80"><a href="eligibility.php?field=created&order={$order}&page={$smarty.get.page}&type={$type}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_created}">Created</a></th>
										<th width="80"><a href="eligibility.php?field=modified&order={$order}&page={$smarty.get.page}&type={$type}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_modified}">Modified</a></th>
										<th width="50" style="text-align:center">Actions</th>
									</tr>
								</thead>
								<tbody>	
								{foreach from=$data item=item key=key}	
									
									<tr>
										<td>{$item.target_elig}</td>
										<td>{$item.user_type}</td>
										<td>{$item.period}</td>
										<td>{$item.type}</td>
										<td>{$item.no_resumes}</td>
										<td>{$item.amount}</td>
										<td><span class="label label-{$item.status_cls}">{$item.status}</span></td>
										<td>{$item.created_date}</td>
										<td>{$item.modified_date}</td>
										<td class="actionItem" style="text-align:center">
										<a href="edit_eligibility.php?id={$item.id}" class="btn  btn-mini"  rel="tooltip" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
										<!-- a id="{$item.id}" href="javascript:void(0)" rel="tooltip" class="btn Confirm btn-mini" value="#"  title="Delete"><i class="icon-trash"></i></a-->
										</td>
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
<input type="hidden" id="page" value="list_eligibility">
<input type="hidden" id="web_root" value="delete_eligibility.php">	
              </div>
            </div>
     </div>
		</div>
		</div>	
	</div>	
{include file='include/footer.tpl'}