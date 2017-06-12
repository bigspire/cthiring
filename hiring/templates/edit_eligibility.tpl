{* Purpose : To edit eligibility.
   Created : Nikitasa
   Date : 29-01-2017 *}
   

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
                                    <a href="eligibility.php">Eligibility</a>
                                </li>
                            
                                <li>
                                   Edit Eligibility
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
			<h4><i class="icon-list"></i> Eligibility Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Target Actualization(%)  <span class="f_req">*</span></td>
							<td>										
							<select name="target_from" id="target_from" tabindex="1" class="span4">
							<option value="">Select</option>	
								{html_options options=$target selected=$target_from}			    			
							</select>	
							
							<select name="target_to" id="target_to" tabindex="2" class="inline_text span4">
							<option value="">Select</option>	
								{html_options options=$target selected=$target_to}			    			
							</select>
							<label for="reg_city" generated="true" class="error">{$target_from_Err} {$target_to_Err} </label>									
							</td>	
						</tr>	
						<tr>
							<td width="120" class="tbl_column">Eligibility Incentive(%)  <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="4" name="eligible" value="{$eligible}" class="span8">
								<label for="reg_city" generated="true" class="error"></label>							
							</td>	
						</tr>																											
				</tbody>
			</table>
		</div>
							
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>	 
					<tr class="tbl_row">
							<td width="120" class="tbl_column">Grade <span class="f_req">*</span></td>
							<td>										
								<select name="grade" tabindex="3"  class="span8" id="grade">
								<option value="">Select</option>	
								{html_options options=$g_name selected=$grade_id}			    			
								</select>
								<label for="reg_city" generated="true" class="error">{$gradenameErr}<label>									
							</td>	
						</tr>	
						 
				  <tr>
						<td width="120" class="tbl_column">Status <span class="f_req">*</span></td>
						<td>	
						<select name=status id="status" tabindex="5" class="span8" id="status" >
							{if isset($status)}
								{html_options  options=$grade_status selected=$status}	
							{else}
								{html_options  options=$grade_status selected='1'}	
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
				<input type="button" value="Cancel" class="btn" onclick="window.location='eligibility.php'">
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