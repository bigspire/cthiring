{* Purpose : To add incentive.
 Created : Nikitasa
   Date : 22-01-2017 *}
   

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
                                    <a href="incentive.php">Incentive</a>
                                </li>
                            
                                <li>
                                   Add Incentive
                                </li>
                            </ul>
                        </div>
                    </nav>

<form action="" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="box-title mb5">
			<h4><i class="icon-list"></i> Incentive Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
				<tr class="tbl_row">
							<td width="120" class="tbl_column inline">Incentive Type <span class="f_req">*</span></td>
							<td>																			
								<select name="type" class="span6 input-medium change_incentive_type" placeholder="" style="clear:left" id="month">
								{html_options class="change_incentive_type" options=$types selected=$smarty.post.month}							
								</select>			
								<label for="reg_city" generated="true" class="error">{$typeErr}</label>									
							</td>	
						</tr>
						<tr class="tbl_row pos_Validity">
							<td width="120" class="tbl_column inline">Incentive Date <span class="f_req">*</span></td>
							<td>																			
								<select name="position_month" class="span3 pos_Validity" style="clear:left" id="position_month">
								{html_options class="pos_Validity"  options=$position_months selected=$smarty.post.position_month}							
								</select> 
								<select name="year" class="span3  pos_Validity" style="clear:left;display:inline" id="year">
								<option value="">Year</option>
								{html_options  options=$years selected=$smarty.post.year}							
								</select>																	
								</td>
								</tr>	
								<tr class="tbl_row short_Validity">
							<td width="120" class="tbl_column inline">Incentive Date <span class="f_req">*</span></td>
								<td>
								<select name="ps_month" class="span3 short_Validity" style="clear:left" id="ps_month">
								{html_options class="short_Validity" options=$ps_months selected=$smarty.post.ps_month}							
								</select> 
								<select name="ps_year" class="span3 short_Validity" placeholder="" style="clear:left;display:inline" id="year">
								<option value="">Year</option>
								{html_options options=$years selected=$smarty.post.ps_year}							
								</select>									
								<label for="reg_city" generated="true" class="error">{$dateErr}</label>									
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
					<input type="hidden" name="data[Client][webroot]" value="incentive.php" id="webroot">

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
$(document).ready(function(){
// function to change the incentive type
	$('.change_incentive_type').change(function(){ 
		if($(this).val() == '1' || $(this).val() == ''){
			$('.pos_Validity').show();
			$('.short_Validity').hide();
		}else if($(this).val() == '2'){
			$('.pos_Validity').hide();
			$('.short_Validity').show();
		}
	});
if($('.change_incentive_type').length > 0){
		if($('.change_incentive_type:selected').val() == '1' || $('.change_incentive_type:selected').val() == ''){
			$('.pos_Validity').show();
			$('.short_Validity').hide();
		}else if($('.change_incentive_type:selected').val() == '2'){
			$('.pos_Validity').hide();
			$('.short_Validity').show();
		}
	}
});
</script>	
{/literal}