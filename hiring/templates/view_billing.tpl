{* Purpose : To view billing.
 Created : Nikitasa
   Date : 03-02-2017 *}
   

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
                                    <a href="billing.php"> Billing</a>
                                </li>
                            
                                <li>
								{ucwords($candidate_name)}
                                </li>
                            </ul>
                        </div>
                    </nav>
							
		<div class="box">
		<div class="row-fluid">
		<div class="span12">
		<div class="mbox">
			<div class="tabbable">
								
			<div class="tab-content" style="overflow:visible">			
			
			<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="">
								<tbody>
									<tr>
										<td width="120" class="tbl_column">Candidate Name </td>
										<td>{ucwords($candidate_name)} </td>
									</tr>
									
									<tr>
										<td width="" class="tbl_column">Position  </td>
										<td>{$position}</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Client Name </td>
										<td>{$client_name}</td>
									</tr>	
									<tr>
										<td width="" class="tbl_column">CTC Offered </td>
										<td>{$ctc_offer}</td>
									</tr>	
								</tbody>
							</table>
				</div>
							
				<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="">
								<tbody>
								<tr>
									<td class="tbl_column">Billing Amount</td>
									<td>{$billing_amount}</td>
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
					</div>
						<div class="form-actions">
								<a href="billing.php" class="jsRedirect"><button class="btn">Back</button></a>
						</div>
               </div>
					
          </div>
       </div>
      </div>
	</div>
</div>
</div>
			
{include file='include/footer.tpl'}