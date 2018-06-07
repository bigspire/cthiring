<?php
/* Smarty version 3.1.29, created on 2018-06-07 14:50:45
  from "C:\xampp\htdocs\2017\ctsvn2\cthiring\hiring\templates\edit_user.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5b18f8ed239ca9_44697292',
  'file_dependency' => 
  array (
    '29ef8e98508fa4f9433bf46abeffe2223a7afc84' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn2\\cthiring\\hiring\\templates\\edit_user.tpl',
      1 => 1528363242,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5b18f8ed239ca9_44697292 ($_smarty_tpl) {
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
                                <li>
                                    <a href="users.php">Users</a>
                                </li>
                            
                                <li>
                                   Edit User
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
								<input type="text" tabindex="7" name="first_name" placeholder="First Name" value="<?php echo $_smarty_tpl->tpl_vars['first_name']->value;?>
" class="span4" autocomplete="off">
								<input type="text" tabindex="7" name="last_name" placeholder="Last Name" value="<?php echo $_smarty_tpl->tpl_vars['last_name']->value;?>
" class="inline_text span4" autocomplete="off">
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['first_nameErr']->value;?>
</label>		
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['last_nameErr']->value;?>
</label>	</td>	
						</tr>			
						
						<tr>
							<td width="120" class="tbl_column">Email Address <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="7" name="email_id" id="" value="<?php echo $_smarty_tpl->tpl_vars['email_id']->value;?>
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
							<select name="location_id" class="span8"  id="PositionEmpId">
								<option value="">Select</option>
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['locations']->value,'selected'=>$_smarty_tpl->tpl_vars['location_id']->value),$_smarty_tpl);?>
	
							</select> 
							<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['locationErr']->value;?>
</label>											
						</td>	
				  </tr>	

 
				  
				  <tr class="tbl_row">
						<td width="120" class="tbl_column">Designation <span class="f_req"></span></td>
						<td>	
							<input type="text" tabindex="7" name="position" value="<?php if ($_smarty_tpl->tpl_vars['position']->value) {
echo $_smarty_tpl->tpl_vars['position']->value;
} else {
echo $_POST['designation'];
}?>" class="span8" autocomplete="off">									
						</td>	
				  </tr>
				  <tr>
						<td width="120" class="tbl_column">Role <span class="f_req">*</span></td>
						<td>	
							<select name="roles_id" class="span8">
								<option value="">Select</option>
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['roles']->value,'selected'=>$_smarty_tpl->tpl_vars['roles_id']->value),$_smarty_tpl);?>
	
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
						<td width="120" class="tbl_column">L1 </td>
						<td>	
							<select name="level1" class="span8"  id="PositionEmpId">
							<option  value="">Select</option>
						<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['users']->value,'selected'=>$_smarty_tpl->tpl_vars['level1']->value),$_smarty_tpl);?>
	

							</select> 
						</td>	
				  </tr>


				   <tr>
						<td width="120" class="tbl_column">L2 </td>
						<td>	
							<select name="level2" class="span8"  id="PositionEmpId">
							<option  value="">Select</option>
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['users']->value,'selected'=>$_smarty_tpl->tpl_vars['level2']->value),$_smarty_tpl);?>
	
							</select> 
						</td>	
				  </tr>	
				   <tr class="tbl_row">
						<td width="120" class="tbl_column">Email Signature <span class="f_req">*</span></td>
						<td>
						<textarea name="signature" class="span8 wysiwyg"><?php echo $_smarty_tpl->tpl_vars['signature']->value;?>
</textarea>	
						<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['signatureErr']->value;?>
</label>
						</td>
				  </tr>
				  
				  
				   
				  </tr class="tbl_row">
							 <tr>
						<td width="120" class="tbl_column">Status <span class="f_req">*</span></td>
						<td>	
							<select name="status" class="span8"  id="PositionEmpId">
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['user_status']->value,'selected'=>$_smarty_tpl->tpl_vars['status']->value),$_smarty_tpl);?>

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
				<input class="btn btn-gebo" type="submit" value="Submit">
				<input type="hidden" name="data[Client][webroot]" value="users.php" id="webroot">

	<a href="javascript:void(0)" class="jsRedirect cancelBtn cancel_event">
	<input type="button" value="Cancel" class="btn">
	</a></div>
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
