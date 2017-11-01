{* Purpose : To add,edit and view mailer template.
   Created : Nikitasa
   Date : 28-02-2017 *}
   
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
                                <!-- li>
                                    <a href="mailer_template.php">Mailer Templates</a>
                                </li-->
                                 <li>
                                  {$template}
                                </li>
                            </ul>
                        </div>
                    </nav>

						{if $SUCCESS_MSG}
							<div class="alert alert-success">
								<a class="close" data-dismiss="alert">×</a>
								{$SUCCESS_MSG}
							</div>
						{/if}
<form action="" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="row-fluid">
		<div class="span12">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									{if $getid <= '3'}
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Template <span class="f_req">*</span></td>
										<td>
										<select name="template_id" id="mailer" class="span8 input-xlarge" placeholder="" style="clear:left">
										{html_options options=$template_type selected=$template_id} 						
										</select> 
										<label for="reg_city" generated="true" class="error">{$templateErr}</label>
										</td>	
									</tr>
									{/if}
									
									{if $getid > '3' || $getid == 'new'}
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Template <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="7" name="template" value="{$template}" class="span8" autocomplete="off">
										<label for="reg_city" generated="true" class="error">{$templateErr}</label>
										</td>	
									</tr>
									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Template Type <span class="f_req">*</span></td>
										<td>
										<span style="margin-right: 5px">
										<input type="radio" id="" class=""  name="parent_id"  value="1" {if $parent_id == '1'}checked="checked"{/if}> Send CV to Client
										</span>
										<span style="margin-right: 5px">
										<input type="radio" id="" class=""  name="parent_id"  value="2" {if $parent_id == '2'}checked="checked"{/if}> Interview Confirmation to Client									
										</span>
										<span>
										<input type="radio" id="" class=""  name="parent_id"  value="3" {if $parent_id == '3'}checked="checked"{/if}> Schedule Interview to Candidates
										</span>
										<label for="reg_city" generated="true" class="error">{$template_typeErr}</label>
										</td>	
									</tr>
									{/if}
									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Subject <span class="f_req">*</span></td>
										<td>										
										<input type="text" tabindex="7" name="subject" value="{$subject}" class="span8" autocomplete="off">
										<label for="reg_city" generated="true" class="error">{$subjectErr} </label>									
										</td>	
									</tr>	
									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Message <span class="f_req">*</span></td>										
										<td><textarea name="message"  tabindex="8" id="message" cols="10" rows="12" class="span10 wysiwyg">{if $smart.post.message}{$smart.post.message|nl2br}{else}{$message|nl2br}{/if}</textarea>
										<br>
										<label for="reg_city" generated="true" class="error">{$messageErr}</label>
										<h3>Tags</h3>
										{foreach from=$data item=item key=key}
										<a href="javascript:void(0)"  rel="{$item.tag}" rel="tooltip"  style="margin-top:8px" class="btn tag_name btn-mini btn-info" title="{$item.tag_desc}">{$item.tag_name}</a>
										{/foreach}
										
										</td>		
										<td>
										
										</td>	
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
	<div>
		</div>
</div>
<div class="form-actions">
									<button class="btn btn-gebo" type="submit">Submit</button>
									
								<input type="button" value="Cancel" class="btn" onclick="window.location='{$smarty.const.webroot}home'">
							</div>

                    </div>
					
					</form>
                </div>
            </div> 
		</div>
		</div>
		</div>
		</div>
	</div>
			
{include file='include/footer.tpl'}