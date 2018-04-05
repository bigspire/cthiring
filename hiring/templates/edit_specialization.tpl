{* Purpose : To edit specialization.
 Created : Nikitasa
   Date : 9-3-2018 *}
   

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
                                    <a href="specialization.php">Specialization</a>
                                </li>
                            
                                <li>
                                   Edit Specialization
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
			<h4><i class="icon-list"></i> Specialization Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Degree <span class="f_req">*</span></td>
							<td>										
									<select name="degree" tabindex="2" class="span8"  id="PositionEmpId">
									<option value="">Select</option>
									{html_options options=$degree_id selected=$degree}	
									</select> 			
									<label for="reg_city" generated="true" class="error">{$degreeErr}</label>										
							</td>		
						</tr>
						
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Specialization <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="1" name="spec" value="{$spec}" class="span8 ui-autocomplete-input" autocomplete="off">
								<label for="reg_city" generated="true" class="error">{$specializationErr}</label>									
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
							<select name="status" class="span8"  tabindex="2" id="PositionEmpId">
								{html_options  id="specialization_status" options=$specialization_status selected=$status}	
							</select> 
							<label for="reg_city" generated="true" class="error">{$statusErr} </label>											
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
				<input type="hidden" name="data[Client][webroot]" value="specialization.php" id="webroot">

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