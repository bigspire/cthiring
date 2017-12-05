{* Purpose : To add eligibility.
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
                                   Add Eligibility
                                </li>
                            </ul>
                        </div>
                    </nav>
				{if $EXIST_MSG}
				 <div id="flashMessage" class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>{$EXIST_MSG}</div>					
				{/if}
<form action="add_eligibility.php" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="box-title mb5">
			<h4><i class="icon-list"></i> Eligibility Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column change_amount_type">Period Type <span class="f_req">*</span></td>
							<td>										
							<select name="period_type"  tabindex="3" class="span8 change_amount_type">
							{html_options options=$period selected=$smarty.post.period_type}			    			
							</select>
								<label for="reg_city" generated="true" class="error">{$period_typeErr}</label>									
							</td>	
						</tr>
						<tr>
							<td width="120" class="tbl_column">CTC  <span class="f_req">*</span></td>
							<td>										
							<select name="ctc_from" tabindex="1" rel="maxDrop" class="span4 minDrop" id="minDrop">
							<option value="">Min.</option>	
							{html_options options=$target selected=$smarty.post.ctc_from}			    			
							</select>	
						
							<select name="ctc_to"  tabindex="2" id="maxDrop" class="inline_text span4 maxDrop">
							<option value="">Select</option>	
							{html_options options=$target selected=$smarty.post.ctc_to}			    			
							</select>
								<label for="reg_city" generated="true" class="error">{$target_from_Err} </label>									
							<label for="reg_city" generated="true" class="error">{$target_to_Err}</label>									
							
							</td>	
						</tr>	
						<tr class="tbl_row">
							<td width="120" class="tbl_column">No of Resume  <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="4" name="no_resume" value="{$smarty.post.no_resume}" class="span8">
								<label for="reg_city" generated="true" class="error">{$no_resumeErr} </label>									
							</td>	
						</tr>
						<tr>
							<td width="120" class="tbl_column amount_Validity">Amount (INR) <span class="f_req">*</span></td>
							<td class = "amount_Validity">										
								<input type="text" tabindex="4" name="amount" value="{$smarty.post.amount}" class="span8 amount_Validity">
								<label for="reg_city" generated="true" class="error amount_Validity">{$amountErr} </label>									
							</td>	
						</tr>						
				</tbody>
			</table>
		</div>
							
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>	 
					<tr class="tbl_row">
							<td width="120" class="tbl_column">User Type <span class="f_req">*</span></td>
							<td>										
							<select name="user_type" tabindex="3" class="span8">
							{html_options options=$user selected=$smarty.post.user_type}			    			
							</select>
								<label for="reg_city" generated="true" class="error">{$user_typeErr}</label>									
							</td>	
						</tr>
					<tr>
							<td width="120" class="tbl_column">Type <span class="f_req">*</span></td>
							<td>										
							<select name="types" id="types" tabindex="3" class="span8 change_amount_type">
							{html_options options=$type selected=$smarty.post.types}			    			
							</select>
								<label for="reg_city" generated="true" class="error">{$typesErr}</label>									
							</td>	
						</tr>	
						 
				  <tr class="tbl_row">
						<td width="120" class="tbl_column">Status <span class="f_req">*</span></td>
						<td>	
						<select name=status id="status" tabindex="5" class="span8">
							{if isset($status)}
								{html_options  options=$grade_status selected=$smarty.post.status}	
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

{literal}
<script type="text/javascript">
/*
$(document).ready(function(){
	// function to change the amount
	$('.change_amount_type').change(function(){ 
		if($(this).val() == 'PS'){
			$('.amount_Validity').hide();
		}else if($(this).val()  == 'M' && $(this).val() == 'PS'){
			$('.amount_Validity').hide();
		}else if($(this).val()  == 'H' && $(this).val() == 'PS'){
			$('.amount_Validity').hide();
		}else if($(this).val()  == 'M'){
			$('.amount_Validity').hide();
		}else if($(this).val()  == 'H'){
			$('.amount_Validity').hide();
		}else{
			$('.amount_Validity').show();
		}
	});
	
	if($('.change_amount_type').length > 0){
		if($('.change_amount_type:selected').val() == 'PS'){
			$('.amount_Validity').hide();
		}else if($('.change_amount_type:selected').val() == 'M'){
			$('.amount_Validity').hide();
		}else if($('.change_amount_type:selected').val() == 'H'){
			$('.amount_Validity').hide();
		}else{
			$('.amount_Validity').show();
		}
	}

	
	// function to change the amount
	$('.change_periodType_amount_type').change(function(){ 
		if($(this).val() == 'M'){
			$('.amount_Validity').hide();
		}else if($(this).val() == 'H'){
			$('.amount_Validity').hide();
		}else{
			$('.amount_Validity').show();
		}
	});
	
	if($('.change_periodType_amount_type').length > 0){
		if($('.change_periodType_amount_type:selected').val() == 'M'){
			$('.amount_Validity').hide();
		}else if($('.change_periodType_amount_type:selected').val() == 'H'){
			$('.amount_Validity').hide();
		}else{
			$('.amount_Validity').show();
		}
	}

});
*/
</script>	
{/literal}