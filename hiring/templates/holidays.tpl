{* Purpose : To list and search holidays.
   Created : Nikitasa
   Date : 10-11-2017 *}
   

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
                                    <a href="holidays.php">Holidays</a>
                                </li>
                            
                                <li>
                                   View Holidays
                                </li>
                            </ul>
                        </div>
                    </nav>
								
						<div class="srch_buttons">
								<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>
							{if !$ALERT_MSG}
								<a href="holidays.php?action=export&keyword={$smarty.post.keyword}&event_from_date={$event_from_date}&event_to_date={$event_to_date}" class="jsRedirect">
								<button type="button" val="holidays.php?action=export&keyword={$smarty.post.keyword}&event_from_date={$event_from_date}&event_to_date={$event_to_date}" name="export" class="btn btn-warning" >Export Excel</button></a>
							{/if}	
<a href="add_holiday.php" class="iframeBox unreadLink" val="40_45"><input type="button" value="Import Holidays" class="btn btn-info"/></a>							
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
						
						{if $keyword || $event_from_date || $event_to_date}
						  {assign var=hide value=''}
						{else}
							{assign var=hide value=dn}
						{/if}
							<form action="" id="formID" name="searchFrm" class="formID" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
							
							<div class="{$hide} dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							<label style="margin-left:0">Keyword: <input type="text" placeholder="Search Here..." name="keyword" id="keyword" value="{$keyword}" class="input-large" aria-controls="dt_gal"></label>
							<label>Holidays From: 
							<input type="text" class="input-small datepick" name="event_from_date" placeholder="dd/mm/yyyy" style="width:70px;"  value="{$event_from_date}" aria-controls="dt_gal"></label>
							<label>Holidays To: <input type="text" class="input-small datepick" name="event_to_date" placeholder="dd/mm/yyyy" style="width:70px;"  value="{$event_to_date}" aria-controls="dt_gal"></label>
							
							<label>Branch: 
							<select name="branch" class="input-medium" placeholder="" style="clear:left" id="ResumeLoc">
						<option value="">Select</option>
							{html_options options=$branch_name selected=$branch}
							</select> 
						</label>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
							<label style="margin-top:18px;"><a href="holidays.php" class="jsRedirect"><input value="Reset" type="button" class="btn"/></a></label>
							</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="holidays.php" id="webroot">
						</form>
							
							
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="200"><a href="holidays.php?field=event&order={$order}&page={$smarty.get.page}&keyword={$keyword}&event_from_date={$event_from_date}&event_to_date={$event_to_date}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_event}">Event Title</a></th>
										<th width="200"><a href="holidays.php?field=event_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&event_from_date={$event_from_date}&event_to_date={$event_to_date}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_event_date}">Event Date</a></th>
										<th width="200"><a href="holidays.php?field=branch&order={$order}&page={$smarty.get.page}&keyword={$keyword}&event_from_date={$event_from_date}&event_to_date={$event_to_date}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_branch}">Branch</a></th>
										<th width="75"><a href="holidays.php?field=created&order={$order}&page={$smarty.get.page}&keyword={$keyword}&event_from_date={$event_from_date}&event_to_date={$event_to_date}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_created}">Created</a></th>
										<!-- th width="50" style="text-align:center">Actions</th-->
									</tr>
								</thead>
								<tbody>
								{foreach from=$data item=item key=key}	
									{* if $item.event *}
									<tr>
										<td>{$item.event}</td>
										<td>{$item.event_date}</td>
										<td>{$item.branch}</td>
										<td>{$item.created_date}</td>
										<!-- td class="actionItem" style="text-align:center">
										<a href="edit_holidays.php?id={$item.id}" class="btn  btn-mini"  rel="tooltip" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
										<!-- a id="{$item.id}" href="javascript:void(0)" rel="tooltip" class="btn Confirm btn-mini" value="#"  title="Delete"><i class="icon-trash"></i></a-->
										</td-->
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
<input type="hidden" id="page" value="list_holidays">
<input type="hidden" id="web_root" value="delete_holidays.php">	
              </div>
            </div>
     </div>
		</div>
		</div>	
	</div>	
{include file='include/footer.tpl'}