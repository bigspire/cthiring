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
												<label for="u_fname" class="control-label">Full name</label>
												<div class="controls">
													<input type="text" id="u_fname" class="input-xlarge" value="{$profile_data['full_name']}" disabled/>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_email" class="control-label">Email</label>
												<div class="controls">
													<input type="text" id="u_email" class="input-xlarge" value="{$profile_data['email_id']}" disabled/>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_password" class="control-label">Mobile</label>
												<div class="controls">
													<div class="sepH_b">
														<input type="text" class="input-xlarge" value="{$profile_data['mobile']}" disabled/>
													</div>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_password" class="control-label">Location</label>
												<div class="controls">
													<div class="sepH_b">
														<input type="text"  class="input-xlarge" value="{$profile_data['location']}" disabled/>
													</div>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_password" class="control-label">Role</label>
												<div class="controls">
													<div class="sepH_b">
														<input type="text"  class="input-xlarge" value="{$profile_data['role_name']}" disabled/>
													</div>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_password" class="control-label">Designation</label>
												<div class="controls">
													<div class="sepH_b">
														<input type="text"  class="input-xlarge" value="{$profile_data['position']}" disabled/>
													</div>
												</div>
											</div>
										
											
											<div class="control-group">
												<div class="controls">
												<a href="{$smarty.const.webroot}home"><button type="button" class="btn">Back</button></a>
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