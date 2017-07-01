{* Purpose : To add billing.
 Created : Nikitasa
   Date : 31-01-2017 *}
   

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
                                    <a href="billing.php">Billing</a>
                                </li>
                            
                                <li>
                                   Add Billing
                                </li>
                            </ul>
                        </div>
                    </nav>
				{if $EXIST_MSG}
				 <div id="flashMessage" class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>{$EXIST_MSG}</div>					
				{/if}
<form action="add_billing.php" id="formID"  name="searchFrm" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="row-fluid">
		<div class="span12">
		<div class="mbox">
			<div class="tabbable">
							
			<div class="tab-content" style="overflow:visible">			
			<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Candidate Name <span class="f_req">*</span></td>
													
										<td>
	<input type="text" placeholder="Search Here..." name="keyword" id="keyword" value="{$keyword}" class="span10" aria-controls="dt_gal">
	<input type="hidden" value="{$smarty.post.resume_id}" name="resume_id" id="resume_id">
	<input type="hidden" value="{$smarty.post.requirements_id}" name="requirements_id" id="requirements_id">
	<input type="hidden" value="{$smarty.post.client_id}" name="client_id" id="client_id">
	<input type="hidden" value="{$smarty.post.created_by}" name="created_by">
	<input type="hidden" id="page" value="add_billing_candidate_search">
	<input type="hidden" value="1" id="SearchKeywords">
	<input type="hidden"  id="retainBilling">
	<label for="reg_city" generated="true" class="error">{$keywordErr}</label>
										</td>	
									</tr>
									
									
									<tr>
										<td width="120" class="tbl_column">Position <span class="f_req">*</span></td>
										<td>
										<input type="hidden" name="position" id="position"  value="{$smarty.post.position}">
									<label id="lbl_position"></label>		
													
									</td>
									</tr>	
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Client Name <span class="f_req">*</span></td>
										<td>
										<input type="hidden" name="client" id="client"  value="{$smarty.post.client}">
									<label id="lbl_client"></label>							
									</td>
									</tr>		
									<tr>
									
									<tr>
										<td width="120" class="tbl_column">CTC Offered <span class="f_req">*</span></td>
										<td> 
										<input type="hidden" name="ctc" id="ctc_offered"  value="{$smarty.post.ctc}">
										<label id="lbl_ctc_offered"></label>
										</td>
									</tr>										
								</tbody>
							</table>
						</div>
							
						<div class="span6">		
							<table class="table table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
							
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Billing Amount <span class="f_req">*</span></td>
										<td> 
										<input type="hidden" name="billing" id="billing_amount"  value="{$smarty.post.billing}">
										<label id="lbl_billing_amount"></label>
										</td>
									</tr>
									<tr>
										<td width="120" class="tbl_column">Billing Date <span class="f_req">*</span></td>
										<td> 
										<input type="hidden" name="billing_date" id="billing_date"  value="{$smarty.post.billing_date}">
										<label id="lbl_billing_date"></label>										
										</td>
									</tr>
													
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Joined Date <span class="f_req">*</span></td>
										<td> 
										<input type="hidden" name="joined_date" id="joined_date"  value="{$smarty.post.joined_date}">
										<label id="lbl_joined_date"></label>										
										</td>
									</tr>
								</tbody>
							</table>
						</div>
 
		</div>
		</div>
		</div>
		</div>
</div>
</div>
<input type="hidden" id="billing_count" name="billing_count" value="{$billingCount}">
					 <div class="form-actions">
					 			<input name="submit" class="btn btn-gebo submit" value="Submit" type="submit"/>
									<a href="billing.php">
									<button type="button" val="billing.php" class="btn Cancel">Cancel</button>
									</a>
					<input type="hidden" id="web_root" value="billing.php">
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
	/* retaining billing details*/
	if($('#retainBilling').length > 0){
		$('#lbl_position').html($('#position').val());
		$('#lbl_client').html($('#client').val());
		$('#lbl_ctc_offered').html($('#ctc_offered').val());
		$('#lbl_billing_amount').html($('#billing_amount').val());
		$('#lbl_billing_date').html($('#billing_date').val());
		$('#lbl_joined_date').html($('#joined_date').val());
		$('#client_id').html($('#client_id').val());
		$('#requirements_id').html($('#requirements_id').val());
		$('#resume_id').html($('#resume_id').val());
	}
 });
</script>
{/literal}