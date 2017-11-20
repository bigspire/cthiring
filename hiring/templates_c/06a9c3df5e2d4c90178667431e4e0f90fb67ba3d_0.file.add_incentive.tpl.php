<?php
/* Smarty version 3.1.29, created on 2017-11-18 17:47:51
  from "C:\xampp\htdocs\2017\ctsvn\cthiring\hiring\templates\add_incentive.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a1024ef46ffc8_28974559',
  'file_dependency' => 
  array (
    '06a9c3df5e2d4c90178667431e4e0f90fb67ba3d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\templates\\add_incentive.tpl',
      1 => 1511007462,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5a1024ef46ffc8_28974559 ($_smarty_tpl) {
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
							<td width="120" class="tbl_column inline">Incentive Type <span class="f_req">*</span></td>
							<td>																			
								<select name="type" class="span6 input-medium change_incentive_type" placeholder="" style="clear:left" id="month">
								<?php echo smarty_function_html_options(array('class'=>"change_incentive_type",'options'=>$_smarty_tpl->tpl_vars['types']->value,'selected'=>$_POST['month']),$_smarty_tpl);?>
							
								</select>			
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['typeErr']->value;?>
</label>									
							</td>	
						</tr>
						<tr class="tbl_row position_month">
							<td width="120" class="tbl_column inline">Incentive Date <span class="f_req">*</span></td>
							<td>																			
								<select name="position_month" class="span6 input-medium pos_Validity" placeholder="" style="clear:left" id="position_month">
								<?php echo smarty_function_html_options(array('class'=>"pos_Validity",'options'=>$_smarty_tpl->tpl_vars['position_months']->value,'selected'=>$_POST['position_month']),$_smarty_tpl);?>
							
								</select> 
								<select name="year" class="span6 input-medium pos_Validity" style="clear:left;display:inline" id="year">
								<option value="">Year</option>
								<?php echo smarty_function_html_options(array('class'=>"pos_Validity",'options'=>$_smarty_tpl->tpl_vars['years']->value,'selected'=>$_POST['year']),$_smarty_tpl);?>
							
								</select>																	
								
								<select name="ps_month" class="span6 input-medium short_Validity" style="clear:left" id="ps_month">
								<?php echo smarty_function_html_options(array('class'=>"short_Validity",'options'=>$_smarty_tpl->tpl_vars['ps_months']->value,'selected'=>$_POST['ps_month']),$_smarty_tpl);?>
							
								</select> 
								<select name="ps_year" class="span6 input-medium short_Validity" placeholder="" style="clear:left;display:inline" id="ps_year">
								<option value="">Year</option>
								<?php echo smarty_function_html_options(array('class'=>"short_Validity",'options'=>$_smarty_tpl->tpl_vars['years']->value,'selected'=>$_POST['ps_year']),$_smarty_tpl);?>
							
								</select>									
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['dateErr']->value;?>
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
?>



<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
// function to change the incentive type
	$('.change_incentive_type').change(function(){ 
		if($(this).val() == '1' || $(this).val() == ''){
			$('.pos_Validity').show();
			$('.short_Validity').hide();
		}else if($(this).val() == '2'){
			$('.pos_Validity').hide();
			$('.short_Validity').show();
		}
	});
if($('.change_incentive_type').length > 0){
		if($('.change_incentive_type:selected').val() == '1' || $('.change_incentive_type:selected').val() == ''){
			$('.pos_Validity').show();
			$('.short_Validity').hide();
		}else if($('.change_incentive_type:selected').val() == '2'){
			$('.pos_Validity').hide();
			$('.short_Validity').show();
		}
	}
});
<?php echo '</script'; ?>
>	
<?php }
}
