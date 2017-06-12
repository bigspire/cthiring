<?php
/* Smarty version 3.1.29, created on 2017-02-28 15:46:20
  from "/var/www/html/cthiring/hiring/templates/send_cv.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58b54df4023579_72224878',
  'file_dependency' => 
  array (
    '337f70c0a553fa4b4f87b60a667d58d5ba0f800b' => 
    array (
      0 => '/var/www/html/cthiring/hiring/templates/send_cv.tpl',
      1 => 1488276935,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_58b54df4023579_72224878 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once '/var/www/html/cthiring/hiring/vendor/smarty-3.1.29/libs/plugins/function.html_options.php';
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
                                    <a href="">Mailer Templates</a>
                                </li>
                                 <li>
                                  <?php echo $_smarty_tpl->tpl_vars['template']->value;?>

                                </li>
                            </ul>
                        </div>
                    </nav>

						<?php if ($_smarty_tpl->tpl_vars['SUCCESS_MSG']->value) {?>
							<div class="alert alert-success">
								<a class="close" data-dismiss="alert">×</a>
								<?php echo $_smarty_tpl->tpl_vars['SUCCESS_MSG']->value;?>

							</div>
						<?php }?>
<form action="" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="row-fluid">
		<div class="span12">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Template <span class="f_req">*</span></td>
										<td>
										<select name="template_id" id="mailer" class="span8 input-xlarge" placeholder="" style="clear:left" id="PositionEmpId">
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['template_type']->value,'selected'=>$_smarty_tpl->tpl_vars['template_id']->value),$_smarty_tpl);?>
 						
										</select> 
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['templateErr']->value;?>
</label>
										</td>	
									</tr>
									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Subject <span class="f_req">*</span></td>
										<td>										
										<input type="text" tabindex="7" name="subject" value="<?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
" class="span8" autocomplete="off">
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['subjectErr']->value;?>
 </label>									
										</td>	
									</tr>	
									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Message <span class="f_req">*</span></td>										
										<td><textarea name="message"  tabindex="8" id="" cols="10" rows="12" class="span10 wysiwyg"><?php if ($_smarty_tpl->tpl_vars['smart']->value['post']['message']) {
echo $_smarty_tpl->tpl_vars['smart']->value['post']['message'];
} else {
echo $_smarty_tpl->tpl_vars['message']->value;
}?></textarea>
										<br>
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['messageErr']->value;?>
</label>
										<a href="javascript:void(0)" id = 'email' rel="tooltip"  class="btn btn-mini btn-info" title="Email">Email</a>
										<a href="#" rel="tooltip"  class="btn btn-mini btn-info" title="Full Name">Full Name</a>
										<a href="#" rel="tooltip"  class="btn btn-mini btn-info" title="Age">Age</a>
										<a href="#" rel="tooltip"  class="btn btn-mini btn-info" title="Address">Address</a>
										<a href="#" rel="tooltip"  class="btn btn-mini btn-info" title="Location">Location</a>
										</td>		
										<td>
										
										</td>	
									</tr>
									
								</tbody>
							</table>
						</div>
<input type="hidden" id="send_cv" value="1">	
<input type="hidden" id="interview_confirmation" value="2">	
<input type="hidden" id="schedule_interview" value="3">	
					</div>
	<div>
		</div>
</div>
<div class="form-actions">
									<button class="btn btn-gebo" type="submit">Submit</button>
									
								<input type="button" value="Cancel" class="btn" onclick="window.location='<?php echo @constant('webroot');?>
home'">
							</div>

                    </div>
					
					</form>
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
