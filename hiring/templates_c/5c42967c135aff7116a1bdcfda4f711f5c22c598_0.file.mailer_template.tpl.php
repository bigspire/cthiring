<?php
/* Smarty version 3.1.29, created on 2018-06-21 10:29:04
  from "C:\xampp\htdocs\2017\ctsvn2\cthiring\hiring\templates\mailer_template.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5b2b30988998a6_23056349',
  'file_dependency' => 
  array (
    '5c42967c135aff7116a1bdcfda4f711f5c22c598' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn2\\cthiring\\hiring\\templates\\mailer_template.tpl',
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
function content_5b2b30988998a6_23056349 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\2017\\ctsvn2\\cthiring\\hiring\\vendor\\smarty-3.1.29\\libs\\plugins\\function.html_options.php';
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
                                <!-- li>
                                    <a href="mailer_template.php">Mailer Templates</a>
                                </li-->
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
									<?php if ($_smarty_tpl->tpl_vars['getid']->value <= '3') {?>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Template <span class="f_req">*</span></td>
										<td>
										<select name="template_id" id="mailer" class="span8 input-xlarge" placeholder="" style="clear:left">
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['template_type']->value,'selected'=>$_smarty_tpl->tpl_vars['template_id']->value),$_smarty_tpl);?>
 						
										</select> 
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['templateErr']->value;?>
</label>
										</td>	
									</tr>
									<?php }?>
									
									<?php if ($_smarty_tpl->tpl_vars['getid']->value > '3' || $_smarty_tpl->tpl_vars['getid']->value == 'new') {?>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Template <span class="f_req">*</span></td>
										<td>
										<input type="text" tabindex="7" name="template" value="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
" class="span8" autocomplete="off">
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['templateErr']->value;?>
</label>
										</td>	
									</tr>
									
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Template Type <span class="f_req">*</span></td>
										<td>
										<span style="margin-right: 5px">
										<input type="radio" id="" class=""  name="parent_id"  value="1" <?php if ($_smarty_tpl->tpl_vars['parent_id']->value == '1') {?>checked="checked"<?php }?>> Send CV to Client
										</span>
										<span style="margin-right: 5px">
										<input type="radio" id="" class=""  name="parent_id"  value="2" <?php if ($_smarty_tpl->tpl_vars['parent_id']->value == '2') {?>checked="checked"<?php }?>> Interview Confirmation to Client									
										</span>
										<span>
										<input type="radio" id="" class=""  name="parent_id"  value="3" <?php if ($_smarty_tpl->tpl_vars['parent_id']->value == '3') {?>checked="checked"<?php }?>> Schedule Interview to Candidates
										</span>
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['template_typeErr']->value;?>
</label>
										</td>	
									</tr>
									<?php }?>
									
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
										<td><textarea name="message"  tabindex="8" id="message" cols="10" rows="12" class="span10 wysiwyg"><?php if ($_smarty_tpl->tpl_vars['smart']->value['post']['message']) {
echo nl2br($_smarty_tpl->tpl_vars['smart']->value['post']['message']);
} else {
echo nl2br($_smarty_tpl->tpl_vars['message']->value);
}?></textarea>
										<br>
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['messageErr']->value;?>
</label>
										<div style="width:95%">
										<h3>Tags</h3>
										
										<?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$__foreach_item_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
										<div style="float:left;width:160px;text-align:left;">
										<a href="javascript:void(0)"  data-trigger="click" data-toggle="popover"  title="Copied!" data-placement="bottom" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['item']->value['tag'];?>
"   style="margin-top:8px" class="btn tag_name btn-mini btn-info copy_btn" data-content="<?php echo $_smarty_tpl->tpl_vars['item']->value['tag_desc'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['tag_name'];?>
</a>
										</div>
										<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
if ($__foreach_item_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_item_0_saved_key;
}
?>
										</div>
										</td>		
										<td>
										
										</td>	
									</tr>
									
								</tbody>
							</table>
						</div>
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
