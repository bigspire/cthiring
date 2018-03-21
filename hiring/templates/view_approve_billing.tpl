{* Purpose : To view approve billing.
 Created : Nikitasa
   Date : 07-02-2017 *}
   

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
                                    <a href="approve_billing.php">Approve Billing</a>
                                </li>
                            
                                <li>
                                  {ucwords($employee_name)}
                                </li>
                            </ul>
                        </div>
                    </nav>
                    
							
						<div class="row-fluid">
							<div class="span12">
		<div class="mbox">
						<div class="tabbable">
			<div class="tab-content" style="overflow:visible">			
			
				<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="">
								<tbody>
									<tr>
										<td width="" class="tbl_column">Client Name </td>
										<td>{ucwords($client_name)}</td>
									</tr>	
									
									
									<tr>
										<td width="" class="tbl_column">Position  </td>
										<td>{ucwords($position)}</td>
									</tr>
									<tr>
										<td width="120" class="tbl_column">Recruiter(s) </td>
										<td>{$recruiter}</td>
									</tr>
									<tr>
										<td width="120" class="tbl_column">Account Holder </td>
										<td>{ucwords($employee_name)} </td>
									</tr>
									<tr>
									<td class="tbl_column">Billing Amount</td>
									<td>{$billing_amount}</td>
								</tr>	
								<tr>
									<td class="tbl_column">Proof of Offer</td>
									<td>
									<a href = "view_approve_billing.php?id={$smarty.get.id}&emp_id={$smarty.get.emp_id}&status_id={$smarty.get.status_id}&action=download&file={$proof_attach}">
									{$proof_attach}
									</a>
									</td>
								</tr>
									
								
								</tbody>
							</table>
				</div>
							
				<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="">
								<tbody>
									
								<tr>
										<td width="120" class="tbl_column">Candidate Name </td>
										<td>{ucwords($candidate_name)} </td>
									</tr>
									<tr>
										<td width="120" class="tbl_column">Billing % </td>
										<td>{if $bill_percent gt '0'}{$bill_percent}{/if}</td>
									</tr>
									<tr>
									<td width="" class="tbl_column">CTC Offered </td>
									<td>{$ctc_offer}</td>
								</tr>
								<tr>
									<td class="tbl_column">Billing Date </td>
									<td>{$billing_date}</td>
								</tr>	
									
								<tr>
										<td width="120" class="tbl_column">Joined Date </td>
										<td>{$joined_date}</td>
									</tr>
								</tbody>
							</table>
					</div>
               
                  
                 </div>         
                 </div>         
                 </div>         
                 </div>         
                 </div>         
						<div class="form-actions">
						{if $approve_status eq 'W'}
<a class="iframeBox unreadLink" rel="tooltip" title="Approve Billing" href="remarks.php?action=approve" val="30_40"><input type="button" value="Approve" class="btn btn btn-success"/></a>
<a class="iframeBox unreadLink" rel="tooltip" title="Reject Billing" href="remarks.php?action=reject" val="30_40"><input type="button" value="Reject" class="btn btn btn-danger"/></a>
<a href="approve_billing.php" rel="tooltip" title="Cancel and Back to Billing"  class="jsRedirect"><button class="btn">Cancel</button></a>
						{else}
<a href="approve_billing.php" rel="tooltip" title="Back to Billing"  class="jsRedirect"><button class="btn">Back</button></a>
						{/if}
						</div>
               </div>
					
          </div>
       </div>
      </div>
	</div>
</div>
</div>
{include file='include/footer.tpl'}