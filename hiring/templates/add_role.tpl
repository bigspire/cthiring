{* Purpose : To add roles.
   Created : Nikitasa
   Date : 24-02-2017 *}
   

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
                                    <a href="roles.php">Roles</a>
                                </li>
                            
                                <li>
                                   Add Role
                                </li>
                            </ul>
                        </div>
                    </nav>
				{if $EXIST_MSG}
				 <div id="flashMessage" class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>{$EXIST_MSG}</div>					
				{/if}
<form action="" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="box-title mb5">
			<h4><i class="icon-list"></i> Roles Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Role <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="7" name="role" value="{$role}" class="span8 ui-autocomplete-input" autocomplete="off">
								<label for="reg_city" generated="true" class="error">{$roleErr} </label>									
							</td>	
						</tr>			
						
						<tr>
							<td width="120" class="tbl_column">Permissions <span class="f_req">*</span></td>
							<td>										
							<select name="permission[]" multiple="multiple" class="multiSelectOpt"> 
							   {html_options options=$permissionList selected=$permissionSel} 
							</select>
							<label for="reg_city" generated="true" class="error">{$permissionsErr}</label>															
							</td>	
						</tr>			
																												
				</tbody>
			</table>
		</div>
							
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>				    
				  <tr class="tbl_row">
						<td width="120" class="tbl_column">Status <span class="f_req">*</span></td>
						<td>	
							<select name="status" class="span8"  id="PositionEmpId">
							{if isset($status)}
								{html_options options=$status_type selected=$status}	
							{else}
								{html_options options=$status_type selected='1'}	
							{/if}
							</select> 
							<label for="reg_city" generated="true" class="error">{$statusErr}</label>											
						</td>	
				  </tr>
				  <tr>
						<td width="120" class="tbl_column">Description <span class="f_req"></span></td>
						<td> 
							<textarea name="description" tabindex="8" id="description" cols="10" rows="3" class="span8">{$smarty.post.description}</textarea>										
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
				<input type="button" value="Cancel" class="btn" onclick="window.location='roles.php'">
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