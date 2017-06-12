{* Purpose : To view incentive.
 Created : Nikitasa
   Date : 21-02-2017 *}
   

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
										<td width="" class="tbl_column">Achievement in Amount </td>
										<td>{$incentive_data['achievement_amt']}</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Eligible Incentive % </td>
										<td>{$incentive_data['eligible_incentive_percent']}%</td>
									</tr>	
									
									<tr>
										<td width="" class="tbl_column">Quarter</td>
										<td>{$quarter}</td>
									</tr>
								</tbody>
							</table>
							</div>
							
							<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
								<tr>
									<td class="tbl_column">Target Amount</td>
									<td>{$incentive_data['target_amt']}</td>
								</tr>	
									
								<tr>
									<td class="tbl_column">Achievement in % </td>
									<td>{$incentive_data['achievement_percent']}%</td>
								</tr>	
									
								<tr>
									<td  class="tbl_column"width="120">Eligible Incentive Amt.</td>
									<td>{$incentive_data['eligible_incentive_amt']}</td>
								</tr>
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
													<th class="allCol position">Billing Amount</th>
													<th class="allCol position">Offer CTC</th>
													<th class="allCol position">Billing Date</th>	
													</tr>
												</thead>
												<tbody>
												
												{foreach from=$data item=item key=key}		
												<tr class="allRow position">
												<td class="allCol position">{$item.position}</td>
												<td class="allCol position">{$item.client_name}</td>
												<td class="allCol position">{$item.ctc_offer}</td>																 													
												<td class="allCol position">{$item.billing_amount}</td>																 										
												<td class="allCol position">{$item.billing_date}</td>																 										
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