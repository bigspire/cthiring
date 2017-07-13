{* Purpose : To edit roles.
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
                                   Edit Role
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
								<input type="text" tabindex="7" name="role_name" value="{$role_name}" class="span8" autocomplete="off">
								<label for="reg_city" generated="true" class="error">{$roleErr} </label>									
							</td>	
						</tr>			
						
						<tr>
							<td width="120" class="tbl_column">Permissions <span class="f_req">*</span></td>
							<td>										
							<select name="modules_id[]" multiple="multiple" class="multiSelectOpt"> 
							   {html_options options=$permissionList selected=$modules_id} 
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
							{html_options options=$status_type selected=$status}	
							</select> 
							<label for="reg_city" generated="true" class="error">{$statusErr}</label>											
						</td>	
				  </tr>
				  <tr>
						<td width="120" class="tbl_column">Description <span class="f_req"></span></td>
						<td> 
							<textarea name="description" tabindex="8" id="description" cols="10" rows="3" class="span8">{if $smarty.post.description}{$smarty.post.description}{else}{$role_desc}{/if}</textarea>										
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
<input class="btn btn-gebo" type="submit" value="Submit">
	<input type="hidden" name="data[Client][webroot]" value="roles.php" id="webroot">

	<a href="javascript:void(0)" class="jsRedirect cancelBtn cancel_event">
	<input type="button" value="Cancel" class="btn">
	</a>
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