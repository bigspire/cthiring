<?php
/* Smarty version 3.1.29, created on 2018-03-22 15:52:26
  from "C:\xampp\htdocs\2017\ctsvn2\cthiring\hiring\templates\view_profile.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5ab383e2e86a39_16480177',
  'file_dependency' => 
  array (
    'dc8b889c2e7ec401cf599bad9fd6a7a510a0f7d8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn2\\cthiring\\hiring\\templates\\view_profile.tpl',
      1 => 1518689731,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5ab383e2e86a39_16480177 ($_smarty_tpl) {
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
												<label for="u_fname" class="control-label viewLabelHead">Full name</label>
												<div class="controls view_label">
													<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['full_name'];?>

												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_email" class="control-label viewLabelHead">Email</label>
												<div class="controls view_label">
													<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['email_id'];?>

												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_password" class="control-label viewLabelHead">Mobile</label>
												<div class="controls">
													<div class="sepH_b view_label">
														<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['mobile'];?>

													</div>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_password" class="control-label viewLabelHead">Location</label>
												<div class="controls">
													<div class="sepH_b view_label">
														<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['location'];?>

													</div>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_password" class="control-label viewLabelHead">Role</label>
												<div class="controls">
													<div class="sepH_b view_label">
													<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['role_name'];?>

													</div>
												</div>
											</div>
											<div class="control-group formSep">
												<label for="u_password" class="control-label viewLabelHead">Designation</label>
												<div class="controls">
													<div class="sepH_b view_label">
														<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['position'];?>

													</div>
												</div>
											</div>
											
											<div class="control-group formSep">
												<label for="u_password" class="control-label viewLabelHead">Signature</label>
												<div class="controls">
													<div class="sepH_b view_label">
														<?php echo nl2br($_smarty_tpl->tpl_vars['profile_data']->value['signature']);?>

													</div>
												</div>
											</div>
											
											<div class="control-group formSep">
												<label for="u_password" class="control-label viewLabelHead">L1</label>
												<div class="controls">
													<div class="sepH_b view_label">
														<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['level1'];?>

													</div>
												</div>
											</div>
											
											<div class="control-group formSep">
												<label for="u_password" class="control-label viewLabelHead">L2</label>
												<div class="controls">
													<div class="sepH_b view_label">
														<?php echo $_smarty_tpl->tpl_vars['profile_data']->value['level2'];?>

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
