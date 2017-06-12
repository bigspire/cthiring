<?php
/* Smarty version 3.1.29, created on 2017-02-15 12:12:20
  from "/var/www/html/cthiring/hiring/templates/edit_eligibility.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58a3f84ce39d24_40432127',
  'file_dependency' => 
  array (
    '90f513dcb91e2566be404326533ad3f848ff7cca' => 
    array (
      0 => '/var/www/html/cthiring/hiring/templates/edit_eligibility.tpl',
      1 => 1487071463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_58a3f84ce39d24_40432127 ($_smarty_tpl) {
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
                                    <a href="eligibility.php">Eligibility</a>
                                </li>
                            
                                <li>
                                   Edit Eligibility
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
			<h4><i class="icon-list"></i> Eligibility Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Target Actualization(%)  <span class="f_req">*</span></td>
							<td>										
							<select name="target_from" id="target_from" tabindex="1" class="span4">
							<option value="">Select</option>	
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['target']->value,'selected'=>$_smarty_tpl->tpl_vars['target_from']->value),$_smarty_tpl);?>
			    			
							</select>	
							
							<select name="target_to" id="target_to" tabindex="2" class="inline_text span4">
							<option value="">Select</option>	
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['target']->value,'selected'=>$_smarty_tpl->tpl_vars['target_to']->value),$_smarty_tpl);?>
			    			
							</select>
							<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['target_from_Err']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['target_to_Err']->value;?>
 </label>									
							</td>	
						</tr>	
						<tr>
							<td width="120" class="tbl_column">Eligibility Incentive(%)  <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="4" name="eligible" value="<?php echo $_smarty_tpl->tpl_vars['eligible']->value;?>
" class="span8">
								<label for="reg_city" generated="true" class="error"></label>							
							</td>	
						</tr>																											
				</tbody>
			</table>
		</div>
							
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>	 
					<tr class="tbl_row">
							<td width="120" class="tbl_column">Grade <span class="f_req">*</span></td>
							<td>										
								<select name="grade" tabindex="3"  class="span8" id="grade">
								<option value="">Select</option>	
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['g_name']->value,'selected'=>$_smarty_tpl->tpl_vars['grade_id']->value),$_smarty_tpl);?>
			    			
								</select>
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['gradenameErr']->value;?>
<label>									
							</td>	
						</tr>	
						 
				  <tr>
						<td width="120" class="tbl_column">Status <span class="f_req">*</span></td>
						<td>	
						<select name=status id="status" tabindex="5" class="span8" id="status" >
							<?php if (isset($_smarty_tpl->tpl_vars['status']->value)) {?>
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['grade_status']->value,'selected'=>$_smarty_tpl->tpl_vars['status']->value),$_smarty_tpl);?>
	
							<?php } else { ?>
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['grade_status']->value,'selected'=>'1'),$_smarty_tpl);?>
	
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
				<input type="button" value="Cancel" class="btn" onclick="window.location='eligibility.php'">
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
