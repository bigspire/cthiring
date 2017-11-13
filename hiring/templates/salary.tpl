{* Purpose : To list and search salary.
   Created : Nikitasa
   Date : 10-11-2017  *}
   

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
                                    <a href="salary.php">Salary</a>
                                </li>
                            
                                <li>
                                   Search Salary
                                </li>
                            </ul>
                        </div>
                    </nav>
								
						<div class="srch_buttons">
								<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>
							{if !$ALERT_MSG}
								<a href="salary.php?action=export&keyword={$smarty.post.keyword}&salary_from_date={$salary_from_date}&salary_to_date={$salary_to_date}" class="jsRedirect">
								<button type="button" val="salary.php?action=export&keyword={$smarty.post.keyword}&salary_from_date={$salary_from_date}&salary_to_date={$salary_to_date}" name="export" class="btn btn-warning" >Export Excel</button></a>
							{/if}
						<a class="iframeBox unreadLink" val="40_45" href="add_salary.php"><input type="button" value="Import Salary" class="btn btn-info"/></a>							
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
						
						{if $keyword || $salary_from_date || $salary_to_date}
						  {assign var=hide value=''}
						{else}
							{assign var=hide value=dn}
						{/if}
							<form action="" id="formID" name="searchFrm" class="formID" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
							
							<div class="{$hide} dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							<label style="margin-left:0">Keyword: <input type="text" placeholder="Search Here..." name="keyword" id="keyword" value="{$keyword}" class="input-large" aria-controls="dt_gal"></label>
							<label>Salary From: 
							<input type="text" class="input-small datepick" name="salary_from_date" placeholder="dd/mm/yyyy" style="width:70px;"  value="{$salary_from_date}" aria-controls="dt_gal"></label>
							<label>Salary To: <input type="text" class="input-small datepick" name="salary_to_date" placeholder="dd/mm/yyyy" style="width:70px;"  value="{$salary_to_date}" aria-controls="dt_gal"></label>
						
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
							<label style="margin-top:18px;"><a href="salary.php" class="jsRedirect"><input value="Reset" type="button" class="btn"/></a></label>
							</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="salary.php" id="webroot">
						</form>
							
							
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="200"><a href="salary.php?field=emp&order={$order}&page={$smarty.get.page}&keyword={$keyword}&salary_from_date={$salary_from_date}&salary_to_date={$salary_to_date}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_emp}">Employee</a></th>
										<th width="200"><a href="salary.php?field=sal_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&salary_from_date={$salary_from_date}&salary_to_date={$salary_to_date}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_sal_date}">Salary Month</a></th>
										<th width="200"><a href="salary.php?field=ctc&order={$order}&page={$smarty.get.page}&keyword={$keyword}&salary_from_date={$salary_from_date}&salary_to_date={$salary_to_date}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_ctc}">CTC</a></th>									 	
										<th width="75"><a href="salary.php?field=created&order={$order}&page={$smarty.get.page}&keyword={$keyword}&salary_from_date={$salary_from_date}&salary_to_date={$salary_to_date}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_created}">Created</a></th>
									</tr>
								</thead>
								<tbody>
								{foreach from=$data item=item key=key}	
									{* if $item.employee *}
									<tr>
										<td>{$item.employee}</td>
										<td>{$item.sal_date}</td>
										<td>{$item.ctc}</td>
										<td>{$item.created_date}</td>
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
<input type="hidden" id="page" value="list_salary">
<input type="hidden" id="web_root" value="delete_salary.php">	
              </div>
            </div>
     </div>
		</div>
		</div>	
	</div>	
{include file='include/footer.tpl'}