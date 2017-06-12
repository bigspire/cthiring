<?php
/* Smarty version 3.1.29, created on 2017-02-15 12:00:42
  from "/var/www/html/cthiring/hiring/templates/add_bonus_sharing.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58a3f592038ac8_79222167',
  'file_dependency' => 
  array (
    '2f2b447bac8169708fde0526658766c6f2e55366' => 
    array (
      0 => '/var/www/html/cthiring/hiring/templates/add_bonus_sharing.tpl',
      1 => 1487071527,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_58a3f592038ac8_79222167 ($_smarty_tpl) {
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
                                    <a href="bonus_share.php">Bonus Share</a>
                                </li>
                            
                                <li>
                                   Add Bonus Share
                                </li>
                            </ul>
                        </div>
                    </nav>
				<?php if ($_smarty_tpl->tpl_vars['EXIST_MSG']->value) {?>
				 <div id="flashMessage" class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><?php echo $_smarty_tpl->tpl_vars['EXIST_MSG']->value;?>
</div>					
				<?php }?>
<form action="add_bonus_share.php" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="box-title mb5">
			<h4><i class="icon-list"></i> Bonus Share Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Type<span class="f_req">*</span></td>
							<td>	
							<select name=type id="type" class="span8" tabindex="1">									
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['grade_type']->value,'selected'=>$_smarty_tpl->tpl_vars['type']->value),$_smarty_tpl);?>
	
							</select>
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['typeErr']->value;?>
</label>									
							</td>	
						</tr>	
						
						<tr>
							<td width="120" class="tbl_column">No. of times <span class="f_req">*</span></td>
							<td>										
								<select name="no_of_times" class="span8" tabindex="3" id="no_of_times">
								<option value="">Select</option>	
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['no_of_times']->value,'selected'=>$_POST['no_of_times']),$_smarty_tpl);?>
										
								</select>
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['no_of_timesErr']->value;?>
</label>									
							</td>	
				  </tr>				  																																	
				</tbody>
			</table>
		</div>
							
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>	
					
				  <tr>
					 <td width="120" class="tbl_column">Bonus %  <span class="f_req">*</span></td>
					 <td>										
						<input type="text" tabindex="2" name="bonus" value="<?php echo $_smarty_tpl->tpl_vars['bonus']->value;?>
" class="span8">
						<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['bonusErr']->value;?>
</label>									
					</td>	
				  </tr>
				  
					<tr> 
						<td width="120" class="tbl_column">Status <span class="f_req">*</span></td>
						<td>	
						<select name="status" tabindex="4" class="span8"  id="PositionEmpId">
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
				<input type="button" value="Cancel" class="btn" onclick="window.location='bonus_share.php'">
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
