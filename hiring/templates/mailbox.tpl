{* Purpose : To list and search billing.
   Created : Nikitasa
   Date : 06-03-2017 *}
   

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
                                    <a href="mailbox.php">Mail Box</a>
                                </li>                          
                                <li>
                                    Sent Items
                                </li>
                            </ul>
                        </div>
                    </nav>

						<div class="srch_buttons">
								<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>
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
						
						{if $keyword || $f_date || $t_date || $type}
						  {assign var=hide value=''}
						{else}
							{assign var=hide value=dn}
						{/if}
							<form action="" id="formID" name="searchFrm" class="formID" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
							<div class="{$hide} dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							
								<label style="margin-left:0;">Keyword: <input type="text" placeholder="Candidate Name or Client Name" name="keyword" id="keyword" value="{$keyword}" class="input-large" aria-controls="dt_gal"></label>
								
								<span id="sandbox-container">
						<span  class="input-daterange" id="datepicker">	
						<label>From: <input type="text" class="input-small datepick" name="f_date" placeholder="dd/mm/yyyy" style="width:70px;"  value="{$f_date}" aria-controls="dt_gal"></label>
						<label>Till: <input type="text" name="t_date" placeholder="dd/mm/yyyy" value="{$t_date}" style="width:70px;"  class="input-small datepick" aria-controls="dt_gal"></label>						
						</span></span>
						<label>Type: 
						<select name="type" class="input-xlarge" placeholder="" style="clear:left" id="InterviewEmpId">
							{html_options options=$mail_type selected=$type}
						</option>
						</select> 
						</label>
								<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>					
							<label style="margin-top:18px;"><a href="mailbox.php" class="jsRedirect"><input value="Reset" type="button" class="btn"/></a></label>
							
							</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="#" id="webroot">
						</form>

							
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="100"><a href="mailbox.php?field=to&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&type={$type}" class="{$sort_field_to}">To</a></th>
										<th width="150"><a href="mailbox.php?field=subject&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&type={$type}" class="{$sort_field_subject}">Subject</a></th>
										<th width="300"><a href="mailbox.php?field=message&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&type={$type}" class="{$sort_field_message}">Message</a></th>
										<th width="300"><a href="mailbox.php?field=type&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&type={$type}" class="{$sort_field_type}">Type</a></th>
										<th width="90"><a href="mailbox.php?field=date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&type={$type}" class="{$sort_field_date}">Sent Date</a></th>
										<th width="100"><a href="mailbox.php?field=created_by&order={$order}&page={$smarty.get.page}&keyword={$keyword}&f_date={$f_date}&t_date={$t_date}&type={$type}" class="{$sort_field_created_by}">Sent by</a></th>
									</tr>
								</thead>
								<tbody>	
								{foreach from=$data item=item key=key}
									<tr>
										<td>{if $item.mail_type == 'C'}{$item.company_name}, ({$item.client_name}), ({$item.email}){else}{$item.candidate_name}, ({$item.email_id}){/if}</td>
										<td>{$item.subject}</td>
										<td><a href="view_mailbox.php?id={$item.id}">{$item.message}</a></td>
										<td>{$item.template}</td>
										<td>{$item.created_date}</td>
										<td>{$item.employee}</td>
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
<input type="hidden" id="page" value="mail_box">
              </div>
            </div>
     </div>
		</div>
		</div>	
	</div>	
{include file='include/footer.tpl'}