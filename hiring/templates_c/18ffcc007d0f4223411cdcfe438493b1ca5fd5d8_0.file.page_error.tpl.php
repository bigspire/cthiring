<?php
/* Smarty version 3.1.29, created on 2017-11-02 16:58:26
  from "/var/www/html/mh/hiring/templates/page_error.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59fb015a8fb585_26116228',
  'file_dependency' => 
  array (
    '18ffcc007d0f4223411cdcfe438493b1ca5fd5d8' => 
    array (
      0 => '/var/www/html/mh/hiring/templates/page_error.tpl',
      1 => 1507896053,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_59fb015a8fb585_26116228 ($_smarty_tpl) {
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
