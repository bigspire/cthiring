<?php
/* Smarty version 3.1.29, created on 2018-04-18 14:39:59
  from "C:\xampp\htdocs\2017\ctsvn2\cthiring\hiring\templates\add_sharing_criteria.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5ad70b6728b6b9_19974196',
  'file_dependency' => 
  array (
    'b0c4fb1423534f274b952b4a430353e540486a94' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn2\\cthiring\\hiring\\templates\\add_sharing_criteria.tpl',
      1 => 1518689730,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5ad70b6728b6b9_19974196 ($_smarty_tpl) {
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
                                    <a href="sharing_criteria.php">Sharing Criteria</a>
                                </li>
                            
                                <li>
                                   Add Sharing Criteria
                                </li>
                            </ul>
                        </div>
                    </nav>
				<?php if ($_smarty_tpl->tpl_vars['EXIST_MSG']->value) {?>
				 <div id="flashMessage" class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><?php echo $_smarty_tpl->tpl_vars['EXIST_MSG']->value;?>
</div>					
				<?php }?>
<form action="add_sharing_criteria.php" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="box-title mb5">
			<h4><i class="icon-list"></i> Sharing Criteria Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Type  <span class="f_req">*</span></td>
							<td>										
								<select name="type" class="span8" tabindex="1" id="type">
								<option value="">Select</option>	
									<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['type_name']->value,'selected'=>$_POST['type']),$_smarty_tpl);?>
								
								</select>
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['typeErr']->value;?>
</label>									
							</td>	
						</tr>
						<tr>
							<td width="120" class="tbl_column">% of Share <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="3" name="share" value="<?php echo $_smarty_tpl->tpl_vars['share']->value;?>
" class="span8">
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['shareErr']->value;?>
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
						<select name=status tabindex="2" class="span8"  id="status" >
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
				<input type="hidden" name="data[Client][webroot]" value="sharing_criteria.php" id="webroot">

				<a href="javascript:void(0)" class="jsRedirect cancelBtn cancel_event">
	<input type="button" value="Cancel" class="btn">
	</a>
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
