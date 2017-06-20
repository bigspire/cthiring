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
                                   Add User
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
								<input type="text" tabindex="7" name="first_name" placeholder="First Name" id="" value="{$first_name}" class="span4 " autocomplete="off">
								<input type="text" tabindex="7" name="last_name" placeholder="Last Name" id="" value="{$last_name}" class="inline_text span4" autocomplete="off">
								<label for="reg_city" generated="true" class="error">{$first_nameErr} {$last_nameErr}</label>									
							</td>	
						</tr>			
						
						<tr>
							<td width="120" class="tbl_column">Email Address <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="7" name="email" id="" value="{$email}" class="span8" autocomplete="off">
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
							<select name="location" class="span8"  id="PositionEmpId">
								<option value="">Select</option>
								{html_options options=$locations selected=$smarty.post.location}	
							</select> 
							<label for="reg_city" generated="true" class="error">{$roleErr}</label>											
						</td>	
				  </tr>																							
				</tbody>
			</table>
		</div>
							
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>	
				 <tr class="tbl_row">
						<td width="120" class="tbl_column">Role <span class="f_req">*</span></td>
						<td>	
							<select name="role" class="span8"  id="PositionEmpId">
								<option value="">Select</option>
								{html_options options=$roles selected=$smarty.post.role}	
							</select> 
							<label for="reg_city" generated="true" class="error">{$roleErr}</label>											
						</td>	
				  </tr>
				  
				   <tr>
						<td width="120" class="tbl_column">Designation <span class="f_req"></span></td>
						<td>	
							<input type="text" tabindex="7" name="designation" value="{$smarty.post.designation}" class="span8" autocomplete="off">									
						</td>	
				  </tr>
				    
				  <tr class="tbl_row">
						<td width="120" class="tbl_column">Status <span class="f_req">*</span></td>
						<td>	
							<select name="status" class="span8"  id="PositionEmpId">
							{if isset($status)}
								{html_options options=$user_status selected=$status}	
							{else}
								{html_options options=$user_status selected='0'}	
							{/if}
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
				<input name="submit" class="btn btn-gebo" value="Submit" type="submit"/>
				<input type="button" value="Cancel" class="btn" onclick="window.location='users.php'">
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