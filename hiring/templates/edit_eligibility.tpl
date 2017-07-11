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
							<td width="120" class="tbl_column">CTC  <span class="f_req">*</span></td>
							<td>										
							<select name="ctc_from" tabindex="1" rel="maxDrop" class="span4 minDrop" id="minDrop">
							<option value="">Min.</option>	
							{html_options options=$target selected=$ctc_from}			    			
							</select>	
						
							<select name="ctc_to"  tabindex="2" id="maxDrop" class="inline_text span4 maxDrop">
							<option value="">Select</option>	
							{html_options options=$target selected=$ctc_to}			    			
							</select>
							<label for="reg_city" generated="true" class="error">{$target_from_Err} </label>									
							<label for="reg_city" generated="true" class="error">{$target_to_Err}</label>									
							</td>	
						</tr>	
						<tr>
							<td width="120" class="tbl_column">No of Resume  <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="4" name="no_resumes" value="{$no_resumes}" class="span8">
								<label for="reg_city" generated="true" class="error">{$no_resumeErr} </label>									
							</td>	
						</tr>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Amount (INR) <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="4" name="amount" value="{$amount}" class="span8">
								<label for="reg_city" generated="true" class="error">{$amountErr} </label>									
							</td>	
						</tr>						
				</tbody>
			</table>
		</div>
							
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>	 
					<tr class="tbl_row">
							<td width="120" class="tbl_column">Type <span class="f_req">*</span></td>
							<td>										
							<select name="type" id="type" tabindex="3" class="span8">
							{html_options options=$types selected=$type}			    			
							</select>
								<label for="reg_city" generated="true" class="error">{$typesErr}</label>									
							</td>	
						</tr>	
						 
				  <tr>
						<td width="120" class="tbl_column">Status <span class="f_req">*</span></td>
						<td>	
						<select name=status id="status" tabindex="5" class="span8">
							
								{html_options  options=$grade_status selected=$status}		
							
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
				<input type="hidden" name="data[Client][webroot]" value="eligibility.php" id="webroot">

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