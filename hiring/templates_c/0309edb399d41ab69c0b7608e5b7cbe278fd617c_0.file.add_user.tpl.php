<?php
/* Smarty version 3.1.29, created on 2017-06-21 18:44:13
  from "F:\xampp\htdocs\ctsvn\cthiring\hiring\templates\add_user.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_594a71256c99c2_80327766',
  'file_dependency' => 
  array (
    '0309edb399d41ab69c0b7608e5b7cbe278fd617c' => 
    array (
      0 => 'F:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\templates\\add_user.tpl',
      1 => 1497959907,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_594a71256c99c2_80327766 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'F:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\vendor\\smarty-3.1.29\\libs\\plugins\\function.html_options.php';
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
                                    <a href="users.php">Users</a>
                                </li>
                            
                                <li>
                                   Add User
                                </li>
                            </ul>
                        </div>
                    </nav>
				<?php if ($_smarty_tpl->tpl_vars['EXIST_MSG']->value) {?>
				 <div id="flashMessage" class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><?php echo $_smarty_tpl->tpl_vars['EXIST_MSG']->value;?>
</div>					
				<?php }?>
<form action="" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="box-title mb5">
			<h4><i class="icon-list"></i> Users Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Full Name <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="7" name="first_name" placeholder="First Name" id="" value="<?php echo $_smarty_tpl->tpl_vars['first_name']->value;?>
" class="span4 " autocomplete="off">
								<input type="text" tabindex="7" name="last_name" placeholder="Last Name" id="" value="<?php echo $_smarty_tpl->tpl_vars['last_name']->value;?>
" class="inline_text span4" autocomplete="off">
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['first_nameErr']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['last_nameErr']->value;?>
</label>									
							</td>	
						</tr>			
						
						<tr>
							<td width="120" class="tbl_column">Email Address <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="7" name="email" id="" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" class="span8" autocomplete="off">
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['emailErr']->value;?>
</label>									
							</td>	
						</tr>			
						
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Mobile <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="7" name="mobile" id="" value="<?php echo $_smarty_tpl->tpl_vars['mobile']->value;?>
" class="span8" autocomplete="off">
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['mobileErr']->value;?>
</label>									
							</td>	
						</tr>
						
				  <tr>
						<td width="120" class="tbl_column">Location <span class="f_req">*</span></td>
						<td>	
							<select name="location" class="span8"  id="PositionEmpId">
								<option value="">Select</option>
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['locations']->value,'selected'=>$_POST['location']),$_smarty_tpl);?>
	
							</select> 
							<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['roleErr']->value;?>
</label>											
						</td>	
				  </tr>																							
				</tbody>
			</table>
		</div>
							
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>	
				 <tr class="tbl_row">
						<td width="120" class="tbl_column">Role <span class="f_req">*</span></td>
						<td>	
							<select name="role" class="span8"  id="PositionEmpId">
								<option value="">Select</option>
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['roles']->value,'selected'=>$_POST['role']),$_smarty_tpl);?>
	
							</select> 
							<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['roleErr']->value;?>
</label>											
						</td>	
				  </tr>
				  
				   <tr>
						<td width="120" class="tbl_column">Designation <span class="f_req"></span></td>
						<td>	
							<input type="text" tabindex="7" name="designation" value="<?php echo $_POST['designation'];?>
" class="span8" autocomplete="off">									
						</td>	
				  </tr>
				    
				  <tr class="tbl_row">
						<td width="120" class="tbl_column">Status <span class="f_req">*</span></td>
						<td>	
							<select name="status" class="span8"  id="PositionEmpId">
							<?php if (isset($_smarty_tpl->tpl_vars['status']->value)) {?>
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['user_status']->value,'selected'=>$_smarty_tpl->tpl_vars['status']->value),$_smarty_tpl);?>
	
							<?php } else { ?>
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['user_status']->value,'selected'=>'0'),$_smarty_tpl);?>
	
							<?php }?>
							</select> 
							<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['statusErr']->value;?>
</label>											
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
				<input name="submit" class="btn btn-gebo" value="Submit" type="submit"/>
				<input type="button" value="Cancel" class="btn" onclick="window.location='users.php'">
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
