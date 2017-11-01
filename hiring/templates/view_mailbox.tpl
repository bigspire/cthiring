{* Purpose : To view mailbox.
 Created : Nikitasa
   Date : 13-07-2017 *}
   

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
                                    <a href="mailbox.php">Mail Box</a>
                                </li>                          
                                <li>
                                    View Sent Items
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
			
			<div class="span12">
							<table class="table table-striped table-bordered dataTable" style="">
								<tbody>
									<tr>
										<td width="120" class="tbl_column">To </td>
										<td>{if $data.mail_type == 'R'}{ucwords($data.candidate_name)} ({$data.email_id}){else}{$data.client_name} ({$data.email}){/if} </td>
									</tr>
									
									<tr>
										<td width="" class="tbl_column">Subject  </td>
										<td>{$data.subject}</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Message </td>
										<td>{$data.message}</td>
									</tr>	
										
									<tr>
										<td width="" class="tbl_column">Created Date </td>
										<td>{$created_date}</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Created By </td>
										<td>{$data.employee}</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Attachment </td>
										<td>{$data.attachment}</td>
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
								<a href="mailbox.php" class="jsRedirect"><button class="btn">Back</button></a>
						</div>
               </div>
					
          </div>
       </div>
      </div>
	</div>
</div>
</div>
			
{include file='include/footer.tpl'}