<?php
/* Smarty version 3.1.29, created on 2017-12-26 17:41:14
  from "C:\xampp\htdocs\2017\ctsvn\cthiring\hiring\templates\view_mailbox.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a423c6228b273_52573718',
  'file_dependency' => 
  array (
    'a32dce6196d7cbc5b2b28bb8c7a10b804b0e6778' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\templates\\view_mailbox.tpl',
      1 => 1514290272,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5a423c6228b273_52573718 ($_smarty_tpl) {
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
					<?php if ($_smarty_tpl->tpl_vars['EXIST_MSG']->value) {?>
				 <div id="flashMessage" class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><?php echo $_smarty_tpl->tpl_vars['EXIST_MSG']->value;?>
</div>					
				<?php }?>
		<form action="view_mailbox.php?id=<?php echo $_GET['id'];?>
" name="formID" class="formID" id="formID" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					
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
echo $_smarty_tpl->tpl_vars['data']->value['client_con_name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
)<?php }?> </td>
									</tr>
									
									<tr>
										<td width="120" class="tbl_column">Client Name </td>
										<td><?php echo ucwords($_smarty_tpl->tpl_vars['data']->value['client_name']);?>
</td>
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
										<td width="" class="tbl_column">Sent Date </td>
										<td><?php echo $_smarty_tpl->tpl_vars['created_date']->value;?>
</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Sent By </td>
										<td><?php echo $_smarty_tpl->tpl_vars['data']->value['employee'];?>
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
								<input name="resend" id="resend" class="btn btn-gebo confirm_btn" value="Resend" type="submit"/>
								<a href="mailbox.php" class="jsRedirect cancelBtn"><input type="button" value="Back" class="btn">
						</div>

               </div>
			</form>		
          </div>
       </div>
      </div>
	</div>
</div>
</div>
			


<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
