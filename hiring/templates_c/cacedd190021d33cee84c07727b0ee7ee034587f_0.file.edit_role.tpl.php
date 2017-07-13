<?php
/* Smarty version 3.1.29, created on 2017-07-13 13:29:38
  from "F:\xampp\htdocs\ctsvn\cthiring\hiring\templates\edit_role.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5967286a9911e7_43878451',
  'file_dependency' => 
  array (
    'cacedd190021d33cee84c07727b0ee7ee034587f' => 
    array (
      0 => 'F:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\templates\\edit_role.tpl',
      1 => 1499258373,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5967286a9911e7_43878451 ($_smarty_tpl) {
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
                                    <a href="roles.php">Roles</a>
                                </li>
                            
                                <li>
                                   Edit Role
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
			<h4><i class="icon-list"></i> Roles Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Role <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="7" name="role_name" value="<?php echo $_smarty_tpl->tpl_vars['role_name']->value;?>
" class="span8" autocomplete="off">
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['roleErr']->value;?>
 </label>									
							</td>	
						</tr>			
						
						<tr>
							<td width="120" class="tbl_column">Permissions <span class="f_req">*</span></td>
							<td>										
							<select name="modules_id[]" multiple="multiple" class="multiSelectOpt"> 
							   <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['permissionList']->value,'selected'=>$_smarty_tpl->tpl_vars['modules_id']->value),$_smarty_tpl);?>
 
							</select>
							<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['permissionsErr']->value;?>
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
						<td width="120" class="tbl_column">Status <span class="f_req">*</span></td>
						<td>	
							<select name="status" class="span8"  id="PositionEmpId">
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['status_type']->value,'selected'=>$_smarty_tpl->tpl_vars['status']->value),$_smarty_tpl);?>
	
							</select> 
							<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['statusErr']->value;?>
</label>											
						</td>	
				  </tr>
				  <tr>
						<td width="120" class="tbl_column">Description <span class="f_req"></span></td>
						<td> 
							<textarea name="description" tabindex="8" id="description" cols="10" rows="3" class="span8"><?php if ($_POST['description']) {
echo $_POST['description'];
} else {
echo $_smarty_tpl->tpl_vars['role_desc']->value;
}?></textarea>										
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
<<<<<<< HEAD
<input class="btn btn-gebo" type="submit" value="Submit">
				<a href="roles.php" class="cancelBtn"><input type="button" value="Cancel" class="btn"></a>
=======
				<button class="btn btn-gebo" type="submit">Submit</button>
				<input type="button" value="Cancel" class="btn cancel_event " onclick="window.location='roles.php'">
>>>>>>> b2cfd8db470872ff260f012d203ae614995be585
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
