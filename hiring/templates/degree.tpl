{* Purpose : To list and search degree.
   Created : Nikitasa
   Date : 8-3-2018 *}
   
   

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
                                    <a href="degree.php">Degree</a>
                                </li>
                            
                                <li>
                                   Search Degree
                                </li>
                            </ul>
                        </div>
                    </nav>

						<div class="srch_buttons">
								<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>
							{if !$ALERT_MSG}
								<a href="degree.php?action=export&keyword={$smarty.post.keyword}&status={$status}" class="jsRedirect"><button type="button" val="degree.php?action=export&keyword={$smarty.post.keyword}&status={$status}" name="export" class="btn btn-warning" >Export Excel</button></a>
							{/if}
							<a class="jsRedirect" data-notify-time = '3000'   href="add_degree.php">
							<input type="button" value="Create Degree" class="btn btn-info"/></a>	
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
							<div class="{$hide} dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							
								<label style="margin-left:0;">Keyword: <input type="text" placeholder="Degree Name" name="keyword" id="keyword" value="{$keyword}" class="input-large" aria-controls="dt_gal"></label>
								<label>Status: 
							<select name="status" class="input-small" style="clear:left" id="ClientStatus">
								{html_options options=$status_type selected=$status}
							</select> 
							</label>
						
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>					
							<label style="margin-top:18px;"><a href="degree.php" class="jsRedirect"><input value="Reset" type="button" class="btn"/></a></label>
							
							</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="#" id="webroot">
						</form>

							
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
									<th width="180"><a href="degree.php?field=qual&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}" class="{$sort_field_qual}">Qualification</a></th>
										<th width="180"><a href="degree.php?field=degree&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}" class="{$sort_field_degree}">Degree</a></th>
										<th width="180"><a href="degree.php?field=no_of_spec&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}" class="{$sort_field_no_of_spec}">No. of Specialization</a></th>
										<th width="80">Status</a></th>
										<th width="80"><a href="degree.php?field=created_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}" class="{$sort_field_created_date}">Created Date</a></th>
										<th width="80"><a href="degree.php?field=modified_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}" class="{$sort_field_modified_date}">Modified Date</a></th>									
										<th width="10" style="text-align:center">Actions</th>
									</tr>
								</thead>
								<tbody>	
								{foreach from=$data item=item key=key}	
									<tr>
										<td>{$item.qual}</td>
										<td>{$item.degree}</td>
										<td><a href="specialization.php?keyword={$item.degree}">{$item.no_of_spec}</a></td>
										<td><span class='label label-{$item.status_cls}'>{$item.status}</span></td>
										<td>{$item.created_date}</td>
										<td>{$item.modified_date}</td>
										<td class="actionItem" style="text-align:center">
										<a href="edit_degree.php?id={$item.id}" rel="tooltip" class="btn  btn-mini" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
										<a id="{$item.id}" href="javascript:void(0)" rel="tooltip" class="btn Confirm btn-mini" value="#"  title="Delete"><i class="icon-trash"></i></a>
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
<input type="hidden" id="page" value="list_degree">
<input type="hidden" id="web_root" value="delete_degree.php">	
              </div>
            </div>
     </div>
		</div>
		</div>	
	</div>	
{include file='include/footer.tpl'}