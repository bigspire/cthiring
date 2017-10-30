<?php
/* Smarty version 3.1.29, created on 2017-10-30 14:25:45
  from "C:\xampp\htdocs\ctsvn\cthiring\hiring\templates\view_mailbox.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59f6e911419a85_44243822',
  'file_dependency' => 
  array (
    '89e93366c77324f0e05871be8fbc472c5dba3aaf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\templates\\view_mailbox.tpl',
      1 => 1509353743,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_59f6e911419a85_44243822 ($_smarty_tpl) {
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
                                    <a href="mailbox.php">Mail Box</a>
                                </li>                          
                                <li>
                                    View Sent Items
                                </li>
                            </ul>
                        </div>
                    </nav>
							
		<div class="box">
		<div class="row-fluid">
		<div class="span12">
		<div class="mbox">
			<div class="tabbable">
								
			<div class="tab-content" style="overflow:visible">			
			
			<div class="span12">
							<table class="table table-striped table-bordered dataTable" style="">
								<tbody>
									<tr>
										<td width="120" class="tbl_column">To </td>
										<td><?php if ($_smarty_tpl->tpl_vars['data']->value['mail_type'] == 'R') {
echo ucwords($_smarty_tpl->tpl_vars['data']->value['candidate_name']);?>
 (<?php echo $_smarty_tpl->tpl_vars['data']->value['email_id'];?>
)<?php } else {
echo $_smarty_tpl->tpl_vars['data']->value['client_name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
)<?php }?> </td>
									</tr>
									
									<tr>
										<td width="" class="tbl_column">Subject  </td>
										<td><?php echo $_smarty_tpl->tpl_vars['data']->value['subject'];?>
</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Message </td>
										<td><?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>
</td>
									</tr>	
										
									<tr>
										<td width="" class="tbl_column">Created Date </td>
										<td><?php echo $_smarty_tpl->tpl_vars['created_date']->value;?>
</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Created By </td>
										<td><?php echo $_smarty_tpl->tpl_vars['data']->value['employee'];?>
</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Attachment </td>
										<td><?php echo $_smarty_tpl->tpl_vars['data']->value['attachment'];?>
</td>
									</tr>
								</tbody>
							</table>
				</div>
                        	
              
					</div>
					</div>  
					</div>
					</div>
					</div>
					</div>
						<div class="form-actions">
								<a href="mailbox.php" class="jsRedirect"><button class="btn">Back</button></a>
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
