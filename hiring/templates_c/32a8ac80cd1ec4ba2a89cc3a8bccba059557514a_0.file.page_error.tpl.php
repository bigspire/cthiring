<?php
/* Smarty version 3.1.29, created on 2017-05-11 12:40:56
  from "/var/www/html/cthiring/hiring/templates/page_error.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59140e80975525_41792643',
  'file_dependency' => 
  array (
    '32a8ac80cd1ec4ba2a89cc3a8bccba059557514a' => 
    array (
      0 => '/var/www/html/cthiring/hiring/templates/page_error.tpl',
      1 => 1494486634,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_59140e80975525_41792643 ($_smarty_tpl) {
?>


<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	
<div class="box-title">
	<h3><i class="icon-list"></i>Error Page</h3>
</div>
<form action=" " name="" id="formID" class="" method="post">
<div>	<br><br><br>		
	<h1 align="center"><?php echo $_smarty_tpl->tpl_vars['ntfd']->value;?>
</h1> 
	<h3 align="center"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h3>
</div>
</form>				
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
