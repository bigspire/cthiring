<?php
/* Smarty version 3.1.29, created on 2018-03-08 13:32:45
  from "C:\xampp\htdocs\2017\ctsvn2\cthiring\hiring\templates\view_resume_api.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5aa0ee25b4bb84_26968438',
  'file_dependency' => 
  array (
    '43309d1fa220d1c678f011fb33450ea92142151b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn2\\cthiring\\hiring\\templates\\view_resume_api.tpl',
      1 => 1520496131,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5aa0ee25b4bb84_26968438 ($_smarty_tpl) {
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
                                    <a href="view_resume_api.php">Resume API</a>
                                </li>
                            
                                <li>
                                   View Resume API
                                </li>
                            </ul>
                        </div>
                    </nav>
				<?php if ($_smarty_tpl->tpl_vars['success_msg']->value) {?>
				 <div id="flashMessage" class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><?php echo $_smarty_tpl->tpl_vars['success_msg']->value;?>
</div>					
				<?php }?>
				
<div class="row-fluid">
						<div class="span12">
						
							<div class="row-fluid">
								<div class="span8">
									<form class="form-horizontal">
										<fieldset>
																					
											<div class="control-group formSep">
												<label for="api_key" class="control-label viewLabelHead">HTML2PDF Rocket API Key</label>
												<div class="controls view_label">
													<?php echo $_smarty_tpl->tpl_vars['api_data']->value['api_key'];?>

												</div>
											</div>
											<div class="control-group formSep">
												<label for="pub_key" class="control-label viewLabelHead">ILOVEPDF Public Key</label>
												<div class="controls view_label">
													<?php echo $_smarty_tpl->tpl_vars['api_data']->value['public_key'];?>

												</div>
											</div>
											<div class="control-group formSep">
												<label for="sec_key" class="control-label viewLabelHead">ILOVEPDF Secret Key</label>
												<div class="controls">
													<div class="sepH_b view_label">
														<?php echo $_smarty_tpl->tpl_vars['api_data']->value['secret_key'];?>

													</div>
												</div>
											</div>
											
											<div class="control-group formSep">
												<label for="sec_key" class="control-label viewLabelHead">Created Date</label>
												<div class="controls">
													<div class="sepH_b view_label">
														<?php echo $_smarty_tpl->tpl_vars['created_date']->value;?>

													</div>
												</div>
											</div>
																		
											<div class="control-group">
												<div class="controls">						
												<!--a href="<?php echo @constant('webroot');?>
home" class="jsRedirect"><button type="button" class="btn">Edit</button></a-->
												<a href="edit_resume_api.php?id=<?php echo $_smarty_tpl->tpl_vars['api_data']->value['id'];?>
" rel="tooltip" class="btn btn-info" title="Edit">Edit</a>
												<!-- a href="<?php echo @constant('webroot');?>
home" class="jsRedirect"><button type="button" class="btn">Cancel</button></a-->
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
