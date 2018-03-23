<?php
/* Smarty version 3.1.29, created on 2018-03-23 11:58:40
  from "C:\xampp\htdocs\2017\ctsvn2\cthiring\hiring\templates\add_incentive.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5ab49e98984e51_22360045',
  'file_dependency' => 
  array (
    '2ae265ddaabbe966fcb8ff9646a265feba67900c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn2\\cthiring\\hiring\\templates\\add_incentive.tpl',
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
function content_5ab49e98984e51_22360045 ($_smarty_tpl) {
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
                                    <a href="incentive.php">Incentive</a>
                                </li>
                            
                                <li>
                                   Add Incentive
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
			<h4><i class="icon-list"></i> Add Incentive </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
				<tr class="tbl_row">
							<td width="120" class="tbl_column inline">Incentive Type <span class="f_req">*</span></td>
							<td>																			
								<select name="type" class="span6 input-medium change_incentive_type" placeholder="" style="clear:left" id="month">
								<?php echo smarty_function_html_options(array('class'=>"change_incentive_type",'options'=>$_smarty_tpl->tpl_vars['types']->value,'selected'=>$_POST['type']),$_smarty_tpl);?>
							
								</select>			
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['typeErr']->value;?>
</label>									
							</td>	
						</tr>
						<tr class="tbl_row pos_Validity">
							<td width="120" class="tbl_column inline">Incentive Date <span class="f_req">*</span></td>
							<td>																			
								<select name="position_month" class="span3 pos_Validity" style="clear:left" id="position_month">
								<?php echo smarty_function_html_options(array('class'=>"pos_Validity",'options'=>$_smarty_tpl->tpl_vars['position_months']->value,'selected'=>$_POST['position_month']),$_smarty_tpl);?>
							
								</select> 
								<select name="year" class="span3  pos_Validity" style="clear:left;display:inline" id="year">
								<option value="">Year</option>
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['years']->value,'selected'=>$_POST['year']),$_smarty_tpl);?>
							
								</select>	
								<label for="reg_city" generated="true" class="error pos_Validity"><?php echo $_smarty_tpl->tpl_vars['position_monthErr']->value;?>
</label>
								<label for="reg_city" generated="true" class="error pos_Validity"><?php echo $_smarty_tpl->tpl_vars['yearErr']->value;?>
</label>								
								</td>
								</tr>	
								<tr class="tbl_row short_Validity">
							<td width="120" class="tbl_column inline">Incentive Date <span class="f_req">*</span></td>
								<td>
								<select name="ps_month" class="span3 short_Validity" style="clear:left" id="ps_month">
								<?php echo smarty_function_html_options(array('class'=>"short_Validity",'options'=>$_smarty_tpl->tpl_vars['ps_months']->value,'selected'=>$_POST['ps_month']),$_smarty_tpl);?>
							
								</select> 
								<select name="ps_year" class="span3 short_Validity" placeholder="" style="clear:left;display:inline" id="year">
								<option value="">Year</option>
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['years']->value,'selected'=>$_POST['ps_year']),$_smarty_tpl);?>
							
								</select>									
								<label for="reg_city" generated="true" class="error short_Validity"><?php echo $_smarty_tpl->tpl_vars['ps_monthErr']->value;?>
</label>	
								<label for="reg_city" generated="true" class="error short_Validity"><?php echo $_smarty_tpl->tpl_vars['ps_yearErr']->value;?>
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
		if($(this).val() == 'J'){
			$('.pos_Validity').show();
			$('.short_Validity').hide();
		}else if($(this).val() == 'I'  || $(this).val() == ''){
			$('.pos_Validity').hide();
			$('.short_Validity').show();
		}
	});
if($('.change_incentive_type').length > 0){
		if($('.change_incentive_type:selected').val() == 'J'){
			$('.pos_Validity').show();
			$('.short_Validity').hide();
		}else if($('.change_incentive_type:selected').val() == 'I'  || $('.change_incentive_type:selected').val() == ''){
			$('.pos_Validity').hide();
			$('.short_Validity').show();
		}
	}
});
<?php echo '</script'; ?>
>	
<?php }
}
