<?php
/* Smarty version 3.1.29, created on 2018-04-24 12:25:52
  from "C:\xampp\htdocs\2017\ctsvn2\cthiring\hiring\templates\resume_exist.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5aded4f8c8bfd5_23856142',
  'file_dependency' => 
  array (
    '40b3eef38626a1c2eb4f6cf520e5d164e550f54b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn2\\cthiring\\hiring\\templates\\resume_exist.tpl',
      1 => 1524481129,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header_popup.tpl' => 1,
  ),
),false)) {
function content_5aded4f8c8bfd5_23856142 ($_smarty_tpl) {
?>



			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header_popup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                <div class="row-fluid">
						<div class="span12">
							<nav>
                     <h3><div id="flashMessage" class="alert alert-error">Oops! The resume is already uploaded by some one</div>
					 
					 </h3>
                    </nav>
					
					
					<form action="" class="formID" id="formID" method="post">
							
						<div class="row-fluid">
							<div class="span12">
							
							<h3 class="heading">Resume Status <small>Overview</small>						</h3>
									
									
							
							<?php
$_from = $_smarty_tpl->tpl_vars['resume_data']->value;
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
							
							
							
							<?php if ($_smarty_tpl->tpl_vars['item']->value['company'] != '') {?>
							<table class="table  table-bordered dataTable" style="margin-bottom:0">
								<tbody>
									<tr>
										<td width="10%" class="tbl_column"><b>Client Name</b></td>
										<td width="20%"><?php echo $_smarty_tpl->tpl_vars['item']->value['company'];?>
</td>
										
										<td width="10%" class="tbl_column"><b>Position</b> </td>
										<td width="20%"><?php echo $_smarty_tpl->tpl_vars['item']->value['position'];?>
</td>
										
										<td width="10%" class="tbl_column"><b>Rec. Name</b> </td>
										<td width="12%"><?php echo $_smarty_tpl->tpl_vars['item']->value['created_by'];?>
</td>
										
										<td width="10%"  class="tbl_column"><b>Rec. Location</b> </td>
										<td width="12%"><?php echo $_smarty_tpl->tpl_vars['item']->value['location'];?>
</td>
										
									</tr>
									
								<tr>
										

										
										<td width="" class="tbl_column"><b>Rec. Contact No</b></td>
										<td width=""><?php echo $_smarty_tpl->tpl_vars['item']->value['mobile'];?>
</td>
										
										<td width="" class="tbl_column"><b>Sent Date</b> </td>
										<td width=""><?php if ($_smarty_tpl->tpl_vars['item']->value['cv_sent'] == '') {?>
													 --
													 <?php } else { ?>
													<?php echo $_smarty_tpl->tpl_vars['item']->value['cv_sent'];?>
 
													<?php }?>
													</td>
										
										
										<td width="" class="tbl_column"><b>Current Status </b> </td>
										<td width="" colspan="3"><?php echo $_smarty_tpl->tpl_vars['item']->value['current_stage'];?>
 - <?php echo $_smarty_tpl->tpl_vars['item']->value['current_status'];?>
</td>
									
									
										
										
								
									
								</tr>	
								</tbody>
							</table>
							
							<br>
							
							<?php }?>
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
							
					
							
							
						<div class="span12">
							<div class="mbox">
							
						<div class="form-actions">
						
						<input name="submit"  class="btn btn-gebo submit" value="Ignore and Proceed.." type="submit"/>
						
						<a href="upload_resume.php" class="jsRedirect"><button type="button" class="btn btn-success">Let me choose another resume</button></a>
						
						<a href="javascript:window.history.back();" class="jsRedirect"><button type="button" class="btn">Cancel and Go Back</button></a>
						
						</div>
               </div>
					
			</div>	
                 </div>
				 
				 </form>
              
			
      </div>
	</div>
</div>
</div>	

<?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>	
<?php if ($_smarty_tpl->tpl_vars['form_sent']->value == '1') {?>

<?php echo '<script'; ?>
 type="text/javascript">
self.parent.location.reload();
parent.$.colorbox.close();
<?php echo '</script'; ?>
>

<?php }?>

	
   </body>
</html>
<?php }
}
