{* Purpose : To edit profile.
   Created : Nikitasa
   Date : 22-06-2017 *}
   
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
                                    <a href="view_profile.php">Profile</a>
                                </li>
                            
                                <li>
                                   View Profile
                                </li>
                            </ul>
                        </div>
                    </nav>
				
<div class="row-fluid">
						<div class="span12">
						
							<div class="row-fluid">
								<div class="span8">
									<form class="form-horizontal">
										<fieldset>
																					
											<div class="control-group formSep">
												<label for="u_fname" class="control-label viewLabelHead">Full name</label>
												<div class="controls view_label">
													{$profile_data['full_name']}
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_email" class="control-label viewLabelHead">Email</label>
												<div class="controls view_label">
													{$profile_data['email_id']}
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_password" class="control-label viewLabelHead">Mobile</label>
												<div class="controls">
													<div class="sepH_b view_label">
														{$profile_data['mobile']}
													</div>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_password" class="control-label viewLabelHead">Location</label>
												<div class="controls">
													<div class="sepH_b view_label">
														{$profile_data['location']}
													</div>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_password" class="control-label viewLabelHead">Role</label>
												<div class="controls">
													<div class="sepH_b view_label">
													{$profile_data['role_name']}
													</div>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_password" class="control-label viewLabelHead">Designation</label>
												<div class="controls">
													<div class="sepH_b view_label">
														{$profile_data['position']}
													</div>
												</div>
											</div>
											
											<div class="control-group formSep">
												<label for="u_password" class="control-label viewLabelHead">Signature</label>
												<div class="controls">
													<div class="sepH_b view_label">
														{$profile_data['signature']|nl2br}
													</div>
												</div>
											</div>
											
											<div class="control-group formSep">
												<label for="u_password" class="control-label viewLabelHead">L1</label>
												<div class="controls">
													<div class="sepH_b view_label">
														{$profile_data['level1']}
													</div>
												</div>
											</div>
											
											<div class="control-group formSep">
												<label for="u_password" class="control-label viewLabelHead">L2</label>
												<div class="controls">
													<div class="sepH_b view_label">
														{$profile_data['level2']}
													</div>
												</div>
											</div>
										
											
											<div class="control-group">
												<div class="controls">						
												<a href="{$smarty.const.webroot}home" class="jsRedirect"><button type="button" class="btn">Back</button></a>
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