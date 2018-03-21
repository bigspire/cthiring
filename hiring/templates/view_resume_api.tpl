{* Purpose : To view resume api.
Created : Nikitasa
Date : 22-01-2018 *}
   
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
                                    <a href="view_resume_api.php">Resume API</a>
                                </li>
                            
                                <li>
                                   View Resume API
                                </li>
                            </ul>
                        </div>
                    </nav>
				{if $success_msg}
				 <div id="flashMessage" class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>{$success_msg}</div>					
				{/if}
				
<div class="row-fluid">
						<div class="span12">
						
							<div class="row-fluid">
								<div class="span8">
									<form class="form-horizontal">
										<fieldset>
																					
											<div class="control-group formSep">
												<label for="api_key" class="control-label viewLabelHead">HTML2PDF Rocket API Key</label>
												<div class="controls view_label">
													{$api_data['api_key']}
												</div>
											</div>
											<div class="control-group formSep">
												<label for="pub_key" class="control-label viewLabelHead">ILOVEPDF Public Key</label>
												<div class="controls view_label">
													{$api_data['public_key']}
												</div>
											</div>
											<div class="control-group formSep">
												<label for="sec_key" class="control-label viewLabelHead">ILOVEPDF Secret Key</label>
												<div class="controls">
													<div class="sepH_b view_label">
														{$api_data['secret_key']}
													</div>
												</div>
											</div>
											
											<div class="control-group formSep">
												<label for="sec_key" class="control-label viewLabelHead">Created Date</label>
												<div class="controls">
													<div class="sepH_b view_label">
														{$created_date}
													</div>
												</div>
											</div>
																		
											<div class="control-group">
												<div class="controls">						
												<!--a href="{$smarty.const.webroot}home" class="jsRedirect"><button type="button" class="btn">Edit</button></a-->
												<a href="edit_resume_api.php?id={$api_data.id}" rel="tooltip" class="btn btn-info" title="Edit">Edit</a>
												<!-- a href="{$smarty.const.webroot}home" class="jsRedirect"><button type="button" class="btn">Cancel</button></a-->
												</div>
											</div>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</div>
                      
         </div>
       </div> 
	</div>
</div>
</div>
 </div>
</div>		
{include file='include/footer.tpl'}