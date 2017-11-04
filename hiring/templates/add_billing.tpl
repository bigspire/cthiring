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
<form action="add_billing.php?res_id={$smarty.get.res_id}&req_res_id={$smarty.get.req_res_id}" id="formID"  name="searchFrm" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="row-fluid">
		<div class="span12">
		<div class="mbox">
			<div class="tabbable">
							
			<div class="tab-content" style="overflow:visible">			
			<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
						<input type="hidden" value="{if $resume_id}{$resume_id}{else}{$smarty.post.resume_id}{/if}" name="resume_id">
	<input type="hidden" value="{if $requirement_id}{$requirement_id}{else}{$smarty.post.requirement_id}{/if}" name="requirement_id">
	<input type="hidden" value="{if $client_id}{$client_id}{else}{$smarty.post.client_id}{/if}" name="client_id">
	
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Candidate Name <span class="f_req">*</span></td>
													
										<td>
											<input type="text" name="candidate_name" disabled value="{if $candidate_name}{$candidate_name}{else}{$smarty.post.candidate_name}{/if}" class="span8" aria-controls="dt_gal">
										<input type="hidden" name="candidate_name" value="{if $candidate_name}{$candidate_name}{else}{$smarty.post.candidate_name}{/if}" class="span10" aria-controls="dt_gal">
										
										</td>	
									</tr>
									
									
									<tr>
										<td width="120" class="tbl_column">Position <span class="f_req">*</span></td>
										<td>
										<input type="text" class="span8"  name="position" disabled value="{if $position}{$position}{else}{$smarty.post.position}{/if}">															
									<input type="hidden" name="position"  value="{if $position}{$position}{else}{$smarty.post.position}{/if}">															
									
									</td>
									</tr>	
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Client Name <span class="f_req">*</span></td>
										<td>
										<input type="text" class="span8"  name="client_name" disabled value="{if $client_name}{$client_name}{else}{$smarty.post.client_name}{/if}">						
									<input type="hidden" name="client_name"  value="{if $client_name}{$client_name}{else}{$smarty.post.client_name}{/if}">						
									
									</td>
									</tr>		
									<tr>
									<tr>
										<td width="120" class="tbl_column">Joined Date <span class="f_req">*</span></td>
										<td> 
										<input type="text" class="span8"  name="joined_date" disabled value="{if $joined_date}{$joined_date}{else}{$smarty.post.joined_date}{/if}">										
										<input type="hidden" name="joined_date"  value="{if $joined_date}{$joined_date}{else}{$smarty.post.joined_date}{/if}">										
										
										</td>
									</tr>
																			
								</tbody>
							</table>
						</div>
							
						<div class="span6">		
							<table class="table table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">CTC Offered <span class="f_req">*</span></td>
										<td> 
										<input type="text" class="span8"  name="ctc_offer"  value="{$ctc_offer}">
										<label for="reg_city" generated="true" class="error">{$ctc_offerErr}</label>									
						
										</td>
									</tr>
									<tr>
										<td width="120" class="tbl_column">Billing Amount <span class="f_req">*</span></td>
										<td> 
										<input type="text" class="span8"  name="billing_amount"  value="{$billing_amount}">
										<label for="reg_city" generated="true" class="error">{$billing_amountErr}</label>									
						
										</td>
									</tr>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Billing Date <span class="f_req">*</span></td>
										<td> 
										<input type="text" class="span8"  name="billing_date"  value="{$billing_date}" class="datepick">									
										<label for="reg_city" generated="true" class="error">{$billing_dateErr}</label>									
						
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
													
								<input type="hidden" name="bill_can" value="billing.php" id="webroot">
	<a href="javascript:void(0)" class="jsRedirect cancel_event">
	<input type="button" value="Cancel" class="btn">
	</a>
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