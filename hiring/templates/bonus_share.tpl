{* Purpose : To list and search bonus sharing.
   Created : Nikitasa
   Date : 30-01-2017 *}
   

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
                                    <a href="bonus_share.php">Bonus Share</a>
                                </li>
                            
                                <li>
                                   Search Bonus Share
                                </li>
                            </ul>
                        </div>
                    </nav>

							<div class="srch_buttons">
								<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>
							{if !$ALERT_MSG}
								<a href="bonus_share.php?action=export&keyword={$smarty.post.keyword}" class="jsRedirect">
								<button type="button" val="bonus_share.php?action=export&keyword={$smarty.post.keyword}" name="export" class="btn btn-warning" >Export Excel</button></a>
							{/if}
						<a class="jsRedirect" data-notify-time = '3000'   href="add_bonus_share.php"><input type="button" value="Create Bonus Share" class="btn btn-info"/></a>							
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
						
						{if $keyword}
						  {assign var=hide value=''}
						{else}
							{assign var=hide value=dn}
						{/if}
						<form action="" id="formID" name="searchFrm" class="formID" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
						<div class="{$hide} dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							<label style="margin-left:0">Keyword: <input type="text" placeholder="Search Here..." name="keyword" id="keyword" value="{$keyword}" class="input-large" aria-controls="dt_gal"></label>

							<label>Status: 
							<select name="status" class="input-small" style="clear:left" id="ClientStatus">
								{html_options options=$status_type selected=$status}
							</select> 
							</label>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
							<label style="margin-top:18px;"><a href="bonus_share.php" class="jsRedirect"><input value="Reset" type="button" class="btn"/></a></label>
							</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="bonus_share.php" id="webroot">
						</form>
							
							
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="200"><a href="bonus_share.php?field=type&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_type}">Type</a></th>
										<th width="150"><a href="bonus_share.php?field=percent&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_percent}">Bonus %</a></th>	
										<th width="200"><a href="bonus_share.php?field=no_times&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_no_times}">No. of times</a></th>																	 	
										<th width="80"><a href="bonus_share.php?field=status&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_status}">Status</a></th>
										<th width="80"><a href="bonus_share.php?field=created&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_created}">Created</a></th>
										<th width="80"><a href="bonus_share.php?field=modified&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_modified}">Modified</a></th>
										<th width="30" style="text-align:center">Actions</th>
									</tr>
								</thead>
								<tbody>
								{foreach from=$data item=item key=key}	
									{if $item.type}
									<tr>
										<td>{$item.type}</td>
										<td>{$item.percent} %</td>
										<td>{$item.no_times} Times</td>
										<td><span class="label label-{$item.status_cls}">{$item.status}</span></td>
										<td>{$item.created_date}</td>
										<td>{$item.modified_date}</td>
										<td class="actionItem" style="text-align:center">
										<a href="edit_bonus_share.php?id={$item.id}"  rel="tooltip"  class="btn  btn-mini" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
										<a id="{$item.id}" href="javascript:void(0)" rel="tooltip" class="btn Confirm btn-mini" value="#"  title="Delete"><i class="icon-trash"></i></a>
										</td>
									</tr>
								   {/if}
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