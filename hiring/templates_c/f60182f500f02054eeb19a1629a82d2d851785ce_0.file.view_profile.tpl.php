<?php
/* Smarty version 3.1.29, created on 2017-10-25 09:46:41
  from "C:\xampp\htdocs\2017\ctsvn\cthiring\hiring\templates\view_profile.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59f01029492b86_45863472',
  'file_dependency' => 
  array (
    'f60182f500f02054eeb19a1629a82d2d851785ce' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\templates\\view_profile.tpl',
      1 => 1508904999,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_59f01029492b86_45863472 ($_smarty_tpl) {
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
													<input type="text" id="u_fname" class="input-xlarge" value="<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['full_name'];?>
" disabled/>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_email" class="control-label">Email</label>
												<div class="controls">
													<input type="text" id="u_email" class="input-xlarge" value="<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['email_id'];?>
" disabled/>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_password" class="control-label">Mobile</label>
												<div class="controls">
													<div class="sepH_b">
														<input type="text" class="input-xlarge" value="<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['mobile'];?>
" disabled/>
													</div>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_password" class="control-label">Location</label>
												<div class="controls">
													<div class="sepH_b">
														<input type="text"  class="input-xlarge" value="<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['location'];?>
" disabled/>
													</div>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_password" class="control-label">Role</label>
												<div class="controls">
													<div class="sepH_b">
														<input type="text"  class="input-xlarge" value="<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['role_name'];?>
" disabled/>
													</div>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_password" class="control-label">Designation</label>
												<div class="controls">
													<div class="sepH_b">
														<input type="text"  class="input-xlarge" value="<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['position'];?>
" disabled/>
													</div>
												</div>
											</div>
											
											<div class="control-group formSep">
												<label for="u_password" class="control-label">Signature</label>
												<div class="controls">
													<div class="sepH_b">
														<textarea  class="input-xlarge" disabled/><?php echo $_smarty_tpl->tpl_vars['profile_data']->value['signature'];?>
</textarea>
													</div>
												</div>
											</div>
											
											<div class="control-group formSep">
												<label for="u_password" class="control-label">L1</label>
												<div class="controls">
													<div class="sepH_b">
														<input type="text"  class="input-xlarge" value="<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['level1'];?>
" disabled/>
													</div>
												</div>
											</div>
											
											<div class="control-group formSep">
												<label for="u_password" class="control-label">L2</label>
												<div class="controls">
													<div class="sepH_b">
														<input type="text"  class="input-xlarge" value="<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['level2'];?>
" disabled/>
													</div>
												</div>
											</div>
										
											
											<div class="control-group">
												<div class="controls">						
												<a href="<?php echo @constant('webroot');?>
home" class="jsRedirect"><button type="button" class="btn">Back</button></a>
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
