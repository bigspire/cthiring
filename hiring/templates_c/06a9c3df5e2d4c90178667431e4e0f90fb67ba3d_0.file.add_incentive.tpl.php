<?php
/* Smarty version 3.1.29, created on 2017-11-18 11:10:05
  from "C:\xampp\htdocs\2017\ctsvn\cthiring\hiring\templates\add_incentive.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a0fc7b5916c60_26267774',
  'file_dependency' => 
  array (
    '06a9c3df5e2d4c90178667431e4e0f90fb67ba3d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\templates\\add_incentive.tpl',
      1 => 1509431069,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5a0fc7b5916c60_26267774 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\vendor\\smarty-3.1.29\\libs\\plugins\\function.html_options.php';
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
                                    <a href="incentive.php">Incentive</a>
                                </li>
                            
                                <li>
                                   Add Incentive
                                </li>
                            </ul>
                        </div>
                    </nav>

<form action="" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="box-title mb5">
			<h4><i class="icon-list"></i> Incentive Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column inline">Select Quarter <span class="f_req">*</span></td>
							<td>																			
								<select name="month" class="span6 input-medium" placeholder="" style="clear:left" id="month">
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['months']->value,'selected'=>$_POST['month']),$_smarty_tpl);?>
							
								</select> 
								<select name="year" class="span6 input-medium" placeholder="" style="clear:left;display:inline" id="year">
								<option value="">Year</option>
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['years']->value,'selected'=>$_POST['year']),$_smarty_tpl);?>
							
								</select>								

								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['quarterErr']->value;?>
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
					<input type="hidden" name="data[Client][webroot]" value="incentive.php" id="webroot">

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
