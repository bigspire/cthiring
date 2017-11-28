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
						
						<div class="row-fluid">
							<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
									<tr>
										<td width="120" class="tbl_column">Employee</td>
										<td>{$incentive_data['employee']}</td>
									</tr>
									
									<tr>
										<td width="" class="tbl_column">Incentive Type </td>
										<td>{$incentive_type}</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Period </td>
										<td>{$incentive_data['period']}%</td>
									</tr>	
									
									<tr>
										<td width="" class="tbl_column">Amount</td>
										<td>{$incentive_data['eligible_incentive_amt']}</td>
									</tr>
								</tbody>
							</table>
							</div>
							
							<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
								<tr>
									<td class="tbl_column">Created Date</td>
									<td>{$created_date}</td>
								</tr>	
									
								<tr>
									<td class="tbl_column">Modified Date </td>
									<td>{$modified_date}</td>
								</tr>

								{if $incentive_data['incentive_type'] neq 'I'}
								<tr>
									<td class="tbl_column">Billing Amount</td>
									<td>{$incentive_data['achievement_amt']}</td>
								</tr>	
									
								<tr>
									<td class="tbl_column">Target Amount </td>
									<td>{$incentive_data['incentive_target_amt']}%</td>
								</tr>
								<tr>
									<td class="tbl_column">Eligibility Amount </td>
									<td>{$incentive_data['eligible_incentive_amt']}%</td>
								</tr>
								
								{/if}	
								</tbody>
							</table>
							</div>
						
                 </div>
				 
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
													<th class="allCol position">Interview Level</th>
													<th class="allCol position">Interview Date</th>
													<th class="allCol position">Interview Status</th>
													{if $incentive_data['incentive_type'] neq 'I'}
													<th class="allCol position">Billing Amount</th>
													<th class="allCol position">Offer CTC</th>
													<th class="allCol position">Billing Date</th>	
													{/if}
													</tr>
												</thead>
												<tbody>
												
												{foreach from=$data item=item key=key}		
												<tr class="allRow position">
												<td class="allCol position">{$item.position}</td>
												<td class="allCol position">{$item.client_name}</td>
												<td class="allCol position">{$item.candidate_name}</td>
												<td class="allCol position">{$item.stage_title}</td>
												<td class="allCol position">{$item.int_date}</td>
												<td class="allCol position">{$item.status_title}</td>
												{if $incentive_data['incentive_type'] neq 'I'}
												<td class="allCol position">{$item.ctc_offer}</td>																 													
												<td class="allCol position">{$item.billing_amount}</td>																 										
												<td class="allCol position">{$item.billing_date}</td>	
												{/if}												
												</tr>
												{/foreach} 
												</tbody>
											</table>	
											</div>
									</div>
           
						<div class="form-actions">
								<a href="incentive.php" class="jsRedirect"><button class="btn">Back</button></a>
						</div>
               </div>
					
          </div>
       </div>
      </div>
	</div>
</div>
</div>
{include file='include/footer.tpl'}