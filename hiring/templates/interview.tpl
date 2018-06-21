{* Purpose : To list and search interview.
   Created : Nikitasa
   Date : 17-02-2017 *}

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
                                    <a href="interview.php">Interviews</a>
                                </li>
                            
                                <li>
                                   View Interview Schedule
                                </li>
                            </ul>
                        </div>
                    </nav>

								<div class="srch_buttons">
								<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>
							{if !$ALERT_MSG && ($smarty.session.roles_id == '33' || $smarty.session.roles_id == '35')}
							<a href="interview.php?action=export&keyword={$keyword}&employee={$employee}&f_date={$f_date}&t_date={$t_date}&branch={$branch}&current_status={$current_status}" class="jsRedirect">
							<button type="button" val="interview.php?action=export&keyword={$keyword}&employee={$employee}&f_date={$f_date}&t_date={$t_date}&branch={$branch}&current_status={$current_status}" name="export" class="btn btn-warning" >Export</button></a></a>							
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
						
						{if $keyword || $employee || $branch || $current_status || $f_date || $t_date}
						  {assign var=hide value=''}
						{else}
							{assign var=hide value=dn}
						{/if}
							
						<form action="" id="formID" name="searchFrm" class="formID" method="post" accept-charset="utf-8">
						<div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
						<div class="{$hide} dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
						
						<label style="margin-left:0;">Keyword: <input type="text" placeholder="Search Here..." name="keyword" id = "keyword" value="{$keyword}" class="input-medium" aria-controls="dt_gal"></label>
						
						<span id="sandbox-container">
						<span  class="input-daterange" id="datepicker">	
						<label>From Date: <input type="text" class="input-small datepick" name="f_date" placeholder="dd/mm/yyyy" style="width:70px;"  value="{$f_date}" aria-controls="dt_gal"></label>
						<label>To Date: <input type="text" name="t_date" placeholder="dd/mm/yyyy" value="{$t_date}" style="width:70px;"  class="input-small datepick" aria-controls="dt_gal"></label>						
						</span></span>
						
						{if $approveUser}
						<label>Employee: 
						<select name="employee" class="input-medium" placeholder="" style="clear:left" id="InterviewEmpId">
						<option value="">Select</option>
							{html_options options=$emp_name selected=$employee}
						</option>
						</select> 
						</label>
						{/if}
						
					
						
						{if $smarty.session.roles_id eq '33' || $smarty.session.roles_id eq '38'}
						<label>Branch: 
							<select name="branch" class="input-medium" placeholder="" style="clear:left" id="ResumeLoc">
						<option value="">Select</option>
							{html_options options=$branch_name selected=$branch}
							</select> 
						</label>
						{/if}
						
						<label>Current Status: 
						<select name="current_status" class="input-medium" placeholder="" style="clear:left" id="InterviewStatus">
						{html_options options=$status_type selected=$current_status}
						</select> 
						</label>						
						<label style="margin-top:18px;">
							<input type="submit" value="Submit" class="btn btn-gebo" /></label>	
						
						<label style="margin-top:18px;">
							<a class="jsRedirect" href="interview.php"><input value="Reset" type="button" class="btn"/></a>
							</label>
										
					</div>
<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="interview/" id="webroot">
						</form>
						
						<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="120"><a href="interview.php?field=candidate_name&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&employee={$employee}&branch={$branch}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_candidate_name}">Candidate Name</a></th>
										<th width="150"><a href="interview.php?field=position&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&employee={$employee}&branch={$branch}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_position}">Position</a></th>
										<th width="120"><a href="interview.php?field=company&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&employee={$employee}&branch={$branch}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_company}">Company</a></th>
										<th width="80"><a href="interview.php?field=ac_holder&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&employee={$employee}&branch={$branch}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_ac_holder}">CRM</a></th>	
										<th width="90"><a href="interview.php?field=created_by&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&employee={$employee}&branch={$branch}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_created_by}">Recruiter</a></th>										
										<th width="80"><a href="interview.php?field=interview_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&employee={$employee}&branch={$branch}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_interview_date}">Interview Date</a></th>
										<th width="50"><a href="interview.php?field=stage&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&employee={$employee}&branch={$branch}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_stage}">Stage</a></th>
										<th width="50"><a href="interview.php?field=current_status&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&employee={$employee}&branch={$branch}&current_status={$current_status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_current_status}">Status</a></th>
										<th width="50"><a href="interview.php?field=created_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&employee={$employee}&branch={$branch}&status={$status}" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="{$sort_field_created_date}">Created</a></th>
									</tr>
								</thead>
								<tbody>
									{foreach from=$data item=item key=key}		
									<tr>
										<td><a href="view_interview.php?resume_id={$item.resume_id}&req_res_id={$item.req_resume_id}">{$item.candidate_name}</a></td>
										<td>{$item.position}</td>
										<td>{$item.company}</td>
										<td>{$item.ac_holder}</td>
										<td>{$item.created_by}</td>
										<td>{$item.interview_date}</td>
										<td>{$item.stage}</td>
										<td><span class="label label-{$item.status_cls}">{$item.status}</span></td>
										<td>{$item.created_date}</td>
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
<input type="hidden" id="page" value="list_interview">
              </div>
            </div>
     </div>
		</div>
		</div>	
	</div>	
		
{include file='include/footer.tpl'}