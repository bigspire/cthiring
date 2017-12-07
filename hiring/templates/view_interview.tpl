{* Purpose : view interview.
   Created : Nikitasa
   Date : 17-02-2017 *}

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
                                    <a href="interview.php">Interviews</a>
                                </li>
                            
                                <li>
                                   {$interview_data['candidate_name']}
                                </li>
                            </ul>
                        </div>
                    </nav>
							
						<div class="row-fluid">
							<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0">
								<tbody>
									<tr>
										<td width="120" class="tbl_column">Candidate Name</td>
										<td>{$interview_data['candidate_name']}</td>
									</tr>
									
									<tr>
										<td width="" class="tbl_column">Position </td>
										<td>{$interview_data['position']}</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Company </td>
										<td>{$interview_data['company']}</td>
									</tr>	
									<tr>
									<td class="tbl_column">Interview Date </td>
									<td>{$int_date}</td>
								</tr>	
								</tbody>
							</table>
							</div>
							
							<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0">
								<tbody>							
								<tr>
									<td class="tbl_column">Current Stage  </td>
									<td>{$interview_data['current_stage']}</td>
								</tr>	
								<tr>
									<td class="tbl_column">Current Status  </td>
									<td>{$interview_data['current_status']}</td>
								</tr>	
								<tr>
									<td class="tbl_column">Recruiter  </td>
									<td>{$interview_data['created_by']}</td>
								</tr>	
								<tr>
									<td class="tbl_column">Created Date  </td>
									<td>{$created_date}</td>
								</tr>	
								</tbody>
							</table>
							</div>
                 </div>
                   <div class="row-fluid">
						<div class="span12">
							<div class="mbox">
							
							
								
										<div>
											<!--div class="box-title mb5">
												<h4><i class="icon-list"></i> Interview Details </h4>
											</div-->											
											<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_inbox">
												<thead>
													<tr>
													<th class="">Interview Date</th>
													<th class="">Stage</th>
													<th class="">Status</th>	
													<th class="">Remarks</th>
													</tr>
												</thead>
												{foreach from=$data item=item key=key}											
												<tr>
													<td class="">{$item.interview_date}</td>
													<td class="">{$item.stage}</td>
													<td class="">{$item.status}</td>
													<td class="">{$item.remarks}</td>	
												</tr>
												{/foreach} 
											</table>	
											</div>
						<div class="form-actions">
								<a href="interview.php" class="jsRedirect"><button class="btn">Back</button></a>
						</div>
               </div>
					
          </div>
       </div>
      </div>
	</div>
</div>
</div>		
{include file='include/footer.tpl'}