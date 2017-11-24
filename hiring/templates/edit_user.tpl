{* Purpose : To view billing.
 Created : Nikitasa
   Date : 03-02-2017 *}
   

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
                                   Edit User
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
			<h4><i class="icon-list"></i> Users Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Full Name <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="7" name="first_name" placeholder="First Name" value="{$first_name}" class="span4" autocomplete="off">
								<input type="text" tabindex="7" name="last_name" placeholder="Last Name" value="{$last_name}" class="inline_text span4" autocomplete="off">
								<label for="reg_city" generated="true" class="error">{$first_nameErr}</label>		
								<label for="reg_city" generated="true" class="error">{$last_nameErr}</label>	</td>	
						</tr>			
						
						<tr>
							<td width="120" class="tbl_column">Email Address <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="7" name="email_id" id="" value="{$email_id}" class="span8" autocomplete="off">
								<label for="reg_city" generated="true" class="error">{$emailErr}</label>									
							</td>	
						</tr>			
						
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Mobile <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="7" name="mobile" id="" value="{$mobile}" class="span8" autocomplete="off">
								<label for="reg_city" generated="true" class="error">{$mobileErr}</label>									
							</td>	
						</tr>
						
				  <tr>
						<td width="120" class="tbl_column">Location <span class="f_req">*</span></td>
						<td>	
							<select name="location_id" class="span8"  id="PositionEmpId">
								<option value="">Select</option>
								{html_options options=$locations selected=$location_id}	
							</select> 
							<label for="reg_city" generated="true" class="error">{$locationErr}</label>											
						</td>	
				  </tr>	

 
				  
				  <tr class="tbl_row">
						<td width="120" class="tbl_column">Designation <span class="f_req"></span></td>
						<td>	
							<input type="text" tabindex="7" name="position" value="{if $position}{$position}{else}{$smarty.post.designation}{/if}" class="span8" autocomplete="off">									
						</td>	
				  </tr>
				  
				</tbody>
			</table>
		</div>
							
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>	
				
				    
					  <tr class="tbl_row">
						<td width="120" class="tbl_column">L1 </td>
						<td>	
							<select name="level1" class="span8"  id="PositionEmpId">
							<option  value="">Select</option>
						{html_options options=$users selected='0' selected=$level1}	

							</select> 
						</td>	
				  </tr>


				   <tr>
						<td width="120" class="tbl_column">L2 </td>
						<td>	
							<select name="level2" class="span8"  id="PositionEmpId">
							<option  value="">Select</option>
								{html_options options=$users selected='0' selected=$level2}	
							</select> 
						</td>	
				  </tr>	
				   <tr class="tbl_row">
						<td width="120" class="tbl_column">Email Signature <span class="f_req">*</span></td>
						<td>
						<textarea name="signature" class="span8 wysiwyg1">{$signature}</textarea>	
						<label for="reg_city" generated="true" class="error">{$signatureErr}</label>
						</td>
				  </tr>
				  
				  
				   <tr>
						<td width="120" class="tbl_column">Role <span class="f_req">*</span></td>
						<td>	
							<select name="roles_id" class="span8">
								<option value="">Select</option>
								{html_options options=$roles selected=$roles_id}	
							</select> 
							<label for="reg_city" generated="true" class="error">{$roleErr}</label>											
						</td>	
				  </tr class="tbl_row">
							 <tr>
						<td width="120" class="tbl_column">Status <span class="f_req">*</span></td>
						<td>	
							<select name="status" class="span8"  id="PositionEmpId">
								{html_options options=$user_status selected=$status}
							</select> 
							<label for="reg_city" generated="true" class="error">{$statusErr}</label>	
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
				<input type="hidden" name="data[Client][webroot]" value="users.php" id="webroot">

	<a href="javascript:void(0)" class="jsRedirect cancelBtn cancel_event">
	<input type="button" value="Cancel" class="btn">
	</a></div>
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