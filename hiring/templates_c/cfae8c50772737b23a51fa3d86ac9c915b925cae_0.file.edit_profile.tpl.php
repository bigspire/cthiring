<?php
/* Smarty version 3.1.29, created on 2017-06-22 14:42:22
  from "C:\xampp\htdocs\2017\ctsvn\cthiring\hiring\templates\edit_profile.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_594b89f67facd4_58851637',
  'file_dependency' => 
  array (
    'cfae8c50772737b23a51fa3d86ac9c915b925cae' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\templates\\edit_profile.tpl',
      1 => 1498122737,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_594b89f67facd4_58851637 ($_smarty_tpl) {
?>

   
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			
			<!-- main content -->
            <div id="contentwrapper">
               <div class="main_content">
            <div class="row-fluid">
				 <div class="span12">
				  <nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="<?php echo @constant('webroot');?>
home"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="edit_profile.php">Profile</a>
                                </li>
                            
                                <li>
                                   Edit Profile
                                </li>
                            </ul>
                        </div>
                    </nav>
				 <!--<div class="heading clearfix">
					<h3 class="pull-left">Client <small>Add</small></h3>
				</div>-->
				
<div class="row-fluid">
						<div class="span12">
						
							<div class="row-fluid">
								<div class="span8">
									<form class="form-horizontal">
										<fieldset>
											<div class="control-group formSep">
												<label class="control-label">Username</label>
												<div class="controls text_line">
													<strong>suganya</strong>
												</div>
											</div>
										
											<div class="control-group formSep">
												<label for="u_fname" class="control-label">Full name</label>
												<div class="controls">
													<input type="text" id="u_fname" class="input-xlarge" value="Suganya" />
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_email" class="control-label">Email</label>
												<div class="controls">
													<input type="text" id="u_email" class="input-xlarge" value="suganya@career-tree.in" />
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_password" class="control-label">Password</label>
												<div class="controls">
													<div class="sepH_b">
														<input type="password" id="u_password" class="input-xlarge" value="my_password" />
														<span class="help-block">Enter your password</span>
													</div>
													<input type="password" id="s_password_re" class="input-xlarge" />
													<span class="help-block">Repeat password</span>
												</div>
											</div>
										
										
											<!--<div class="control-group formSep">
												<label class="control-label">Gender</label>
												<div class="controls">
													<label class="radio inline">
														<input type="radio" value="male" id="s_male" name="f_gender"/>
														Male
													</label>
													<label class="radio inline">
														<input type="radio" value="female" id="s_female"  checked="checked"  name="f_gender" />
														Female
													</label>
												</div>
											</div>-->
											<div class="control-group formSep">
												<label for="u_signature" class="control-label">Signature</label>
												<div class="controls">
													<textarea rows="4" id="u_signature" class="input-xlarge">Regards,&hellip;
													Suganya</textarea>
													<span class="help-block">Automatic resize</span>
												</div>
											</div>
											<div class="control-group">
												<div class="controls">
													<button class="btn btn-gebo" type="submit">Save changes</button>
												<a href="<?php echo @constant('webroot');?>
home"><button type="button" class="btn">Cancel</button></a>
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
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
