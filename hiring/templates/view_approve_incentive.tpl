{* Purpose : To view incentive.
 Created : Nikitasa
   Date : 28-11-2017 *}
   

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
                                   {$incentive_data['employee']}
                                </li>
							</ul>
                        </div>
                    </nav>
						
						<div class="srch_buttons">
							<a href="view_incentive.php?id={$smarty.get.id}&emp_id={$smarty.get.emp_id}&action=export">
							<button type="button" val="view_incentive.php?id={$smarty.get.id}&emp_id={$smarty.get.emp_id}&action=export" name="export" class="jsRedirect btn btn-warning" >Export</button></a></a>							
						</div>
						{if $incentive_data['incentive_type'] eq 'I'}	
						<div class="row-fluid">
							<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
									<tr>
										<td width="180" class="tbl_column">Employee</td>
										<td>{$incentive_data['employee']}</td>
									</tr>
									
									<tr>
										<td width="" class="tbl_column">Incentive Type </td>
										<td>{$incentive_type}</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Period </td>
										<td>{$period}</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Productivity % </td>
										<td>{$incentive_data['productivity']}%</td>
									</tr>	

											<tr>
									<td width="" class="tbl_column">Incentive Amount (In Rs.)</td>
									<td>₹{$incentive_data['eligible_incentive_amt']}</td>
								</tr>									
										
								</tbody>
							</table>
							</div>
							
							<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
								<tr>
										<td width="180" class="tbl_column">No. of Candidates Interviewed </td>
										<td>{$incentive_data['interview_candidate']}</td>
									</tr>
							<tr>
										<td width="" class="tbl_column">Individual Contribution - YTD <br>(In Rs.) </td>
										<td>-</td>
									</tr>
								<tr>
									<td width=""  class="tbl_column">Created Date</td>
									<td>{$created_date}</td>
								</tr>	
									
								<tr>
									<td width=""  class="tbl_column">Modified Date </td>
									<td>{$modified_date}</td>
								</tr>	
								</tbody>
							</table>
							</div>
						
                 </div>
				 {/if}
				 
				 {if $incentive_data['incentive_type'] eq 'J'}	
						<div class="row-fluid">
							<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
									<tr>
										<td width="180" class="tbl_column">Employee</td>
										<td>{$incentive_data['employee']|ucwords}</td>
									</tr>
									
									<tr>
										<td width="" class="tbl_column">Incentive Type </td>
										<td>{$incentive_type}</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Period </td>
										<td>{$period}</td>
									</tr>	
									
							
									<tr>
									<td width=""  class="tbl_column">Min. Performance Target (In Rs.)</td>
									<td>₹{$incentive_data['incentive_target_amt']}</td>
								</tr>
								<tr>
									<td  width=""  class="tbl_column">Actual Individual Contribution (In Rs.)</td>
									<td>₹{$incentive_data['achievement_amt']}</td>
								</tr>	
										
									
										<tr>
									<td  width="" class="tbl_column">Incentive Amount (In Rs.) </td>
									<td>₹{$incentive_data['eligible_incentive_amt']}</td>
								</tr>
									
									
								</tbody>
							</table>
							</div>
							
							<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
								
								
									<tr>
									<td width=""  class="tbl_column">No. of Candidates Billed </td>
									<td>{$incentive_data['candidate_billed']}</td>
								</tr>
								

									<tr>
										<td width="180" class="tbl_column">Individual Contribution - YTD <br>(In Rs.) </td>
										<td>-</td>
									</tr>	
								
						<tr>
									<td width=""  class="tbl_column">Created Date</td>
									<td>{$created_date}</td>
								</tr>
									
								<tr>
									<td width=""  class="tbl_column">Modified Date </td>
									<td>{$modified_date}</td>
								</tr>
								</tbody>
							</table>
							</div>
						
                 </div>
				 {/if}
				 
                 <br>
                 <br>
                 
               	<div class="tab-content"  style="overflow:auto;max-height:300px;">
										<div class="tab-pane active" id="mbox_inbox">
																						
											<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_inbox">
												<thead>
													<tr>
													<th class="allCol position">Position</th>
													<th class="allCol position">Client</th>
													<th class="allCol position">Candidate Name</th>
													{if $incentive_data['incentive_type'] eq 'I'}
													<th class="allCol position">Position CTC</th>
													<th class="allCol position">Interview Level</th>
													<th class="allCol position">Interview Date</th>
													<th class="allCol position">Interview Status</th>
													{/if}
													{if $incentive_data['incentive_type'] eq 'J'}
													<th class="allCol position">Position CTC</th>
													<th class="allCol position">Billing Amount</th>
													<th class="allCol position">Offer CTC</th>
													<th class="allCol position">Billing Date</th>
													<th class="allCol position">Account Type</th>
													<th class="allCol position">Individual Contribution (In Rs.)</th>													
													{/if}
													</tr>
												</thead>
												<tbody>
												
												{foreach from=$data item=item key=key}		
												<tr class="allRow position">
												<td class="allCol position">{$item.position}</td>
												<td class="allCol position">{$item.client_name}</td>
												<td class="allCol position">{$item.candidate_name}</td>
												{if $incentive_data['incentive_type'] eq 'I'}
												<td class="allCol position">{if $item.ctc}{$item.ctc} Lacs{/if}</td>	
												<td class="allCol position">{$item.stage_title}</td>
												<td class="allCol position">{$item.int_date}</td>
												<td class="allCol position">{$item.status_title}</td>
												{/if}
												{if $incentive_data['incentive_type'] eq 'J'}
												<td class="allCol position">{if $item.ctc}{$item.ctc} Lacs{/if}</td>	
												<td class="allCol position">{$item.ctc_offer}</td>																 													
												<td class="allCol position">{$item.billing_amount}</td>																 										
												<td class="allCol position">{$item.billing_date}</td>	
												<td class="allCol position">{$item.user_type}</td>																 										
												<td class="allCol position">{$item.amount}</td>
												
												{/if}												
												</tr>
												{/foreach} 
												</tbody>
											</table>	
											</div>
									</div>
           
						<div class="form-actions">
								{if $approve_status eq 'W'}
<a class="iframeBox unreadLink" rel="tooltip" title="Approve Incentive" href="inc_remarks.php?action=approve" val="30_40"><input type="button" value="Approve" class="btn btn btn-success"/></a>
<a class="iframeBox unreadLink" rel="tooltip" title="Reject Incentive" href="inc_remarks.php?action=reject" val="30_40"><input type="button" value="Reject" class="btn btn btn-danger"/></a>
<a href="approve_incentive.php" rel="tooltip" title="Cancel and Back to Incentive"  class="jsRedirect"><button class="btn">Cancel</button></a>
						{else}
<a href="approve_incentive.php" rel="tooltip" title="Back to Incentive"  class="jsRedirect"><button class="btn">Back</button></a>
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