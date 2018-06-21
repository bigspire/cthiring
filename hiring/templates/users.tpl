{* Purpose : To list users.
 Created : Nikitasa
   Date : 23-02-2017 *}
   
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
                                    <a href="users.php">Users</a>
                                </li>
                            
                                <li>
                                   View User
                                </li>
                            </ul>
                        </div>
                    </nav>

							<div class="srch_buttons">
								<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>
							{if !$ALERT_MSG}
								<a href="users.php?action=export&keyword={$keyword}&status={$status}" class="jsRedirect">
								<button type="button" val="users.php?action=export&keyword={$keyword}&status={$status}" name="export" class="btn btn-warning" >Export Excel</button></a>
							{/if}
							<a class="jsRedirect" data-notify-time = '3000'   href="add_user.php"><input type="button" value="Create Users" class="btn btn-info"/></a>
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
						
						{if $keyword}
						  {assign var=hide value=''}
						{else}
							{assign var=hide value=dn}
						{/if}
						
						<form action="" id="formID" name="searchFrm" class="formID" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
							<div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
							<div class="{$hide} dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							<label style="margin-left:0;">Keyword: <input type="text" placeholder="Search Here..." name="keyword" id="keyword" value="{$keyword}" class="input-large" aria-controls="dt_gal"></label>
							<label>Status: 
							<select name="status" class="input-small" style="clear:left" id="ClientStatus">
								{html_options options=$status_type selected=$status}
							</select> 
							</label>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
							<label style="margin-top:18px;"><a href="users.php" class="jsRedirect"><input value="Reset" type="button" class="btn"/></a></label>
							</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="users/" id="webroot">
						</form>
							
							
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="200"><a href="users.php?field=employee&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_employee}">Full Name</a></th>
										<th width="100"><a href="users.php?field=email_id&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_email_id}">Email</a></th>
										<th width="100"><a href="users.php?field=mobile&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_mobile}">Mobile</a></th>
										<th width="100"><a href="users.php?field=role_name&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_role_name}">Role</a></th>
										<th width="100"><a href="users.php?field=status&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_status}">Status</a></th>
										<th width="75"><a href="users.php?field=created_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_created_date}">Created</a></th>
										<th width="75"><a href="users.php?field=modified_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_modified_date}">Modified</a></th>
										<th width="30" style="text-align:center">Actions</th>
									</tr>
								</thead>
								<tbody>
								{foreach from=$data item=item key=key}	
									<tr>
										<td>{ucwords($item.employee)}</td>
										<td>{$item.email_id}</td>
										<td>{$item.mobile}</td>
										<td>{$item.role_name}</td>
										<td><span class="label label-{$item.status_cls}">{$item.status}</span></td>
										<td>{$item.created_date}</td>
										<td>{$item.modified_date}</td>
										<td class="actionItem" style="text-align:center">
										<a href="edit_user.php?id={$item.id}"  rel="tooltip" rel="tooltip" class="btn  btn-mini"  class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
										<a href="javascript:void(0)" rel="tooltip" id="{$item.id}"  class="btn Confirm btn-mini"   title="Delete"><i class="icon-trash"></i></a>
										
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
<input type="hidden" id="page" value="list_users">
<input type="hidden" id="web_root" value="delete_user.php">	
              </div>
            </div>
     </div>
		</div>
		</div>	
	</div>	
{include file='include/footer.tpl'}