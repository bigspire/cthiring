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
                                  Basavaraj
                                </li>
                            </ul>
                        </div>
                    </nav>
                    
							
						<div class="row-fluid">
							<div class="span12">
		<div class="mbox">
						<div class="tabbable">
								<div class="heading">
										<ul class="nav nav-tabs">
										<li class="active"><a class="restabChange" rel="interview"  href="#mbox_billing" data-toggle="tab"><i class="splashy-mail_light_down"></i>   Billing Details </a></li>
										<li class=""><a class="restabChange" rel="interview"  href="#mbox_co-ordination" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Co-ordination </a></li>
									</ul>
								</div>
			<div class="tab-content" style="overflow:visible">			
			<div class="tab-pane active" id="mbox_billing">
				<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="">
								<tbody>
									<tr>
										<td width="120" class="tbl_column">Employee Name </td>
										<td>{ucwords($employee_name)} </td>
									</tr>
									<tr>
										<td width="120" class="tbl_column">Candidate Name </td>
										<td>{ucwords($candidate_name)} </td>
									</tr>
									
									<tr>
										<td width="" class="tbl_column">Position  </td>
										<td>{ucwords($position)}</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Client Name </td>
										<td>{ucwords($client_name)}</td>
									</tr>	
								</tbody>
							</table>
				</div>
							
				<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="">
								<tbody>
								<tr>
									<td width="" class="tbl_column">CTC Offered </td>
									<td>{$ctc_offer}</td>
								</tr>	
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
                 <div class="tab-pane" id="mbox_co-ordination">	
							{foreach from=$data item=item key=key}
              <div class="span12" style="margin-top:5px;margin-left:0px;"> 
					<div class="span6">      
							<table class="table table-striped table-bordered dataTable" style="">
							<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Employee <span class="f_req"></span></td>
										<td>{ucwords($item.employee)}</td>	
									</tr>	
									
									<tr>
									<td width="120" class="tbl_column">Value (% of work)<span class="f_req"></span></td>
									<td> {$item.percent}</td>	
									</tr>		
																	
								</tbody>
							</table>
					</div> 
					<div class="span6">      
							<table class="table table-striped table-bordered dataTable" style="">
							<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Co-ordination Type <span class="f_req"></span></td>
										<td>{$item.type}</td>	
									</tr>									
								</tbody>
							</table>
					</div>
					</div>
					{/foreach} 
							</div>     
                 </div>         
                 </div>         
                 </div>         
                 </div>         
                 </div>         
						<div class="form-actions">
						{if $approve_status eq 'W'}
<a class="iframeBox unreadLink" rel="tooltip" title="Approve Billing" href="remarks.php?action=approve" val="40_50"><input type="button" value="Approve" class="btn btn btn-success"/></a>
<a class="iframeBox unreadLink" rel="tooltip" title="Reject Billing" href="remarks.php?action=reject" val="40_50"><input type="button" value="Reject" class="btn btn btn-danger"/></a>
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