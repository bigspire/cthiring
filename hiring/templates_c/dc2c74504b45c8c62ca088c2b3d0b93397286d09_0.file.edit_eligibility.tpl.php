<?php
/* Smarty version 3.1.29, created on 2017-12-11 17:20:48
  from "C:\xampp\htdocs\2017\ctsvn\cthiring\hiring\templates\edit_eligibility.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a2e711866d4c9_97321149',
  'file_dependency' => 
  array (
    'dc2c74504b45c8c62ca088c2b3d0b93397286d09' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\templates\\edit_eligibility.tpl',
      1 => 1512993046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5a2e711866d4c9_97321149 ($_smarty_tpl) {
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
							<td width="120" class="tbl_column change_amount_type">Period Type <span class="f_req">*</span></td>
							<td>										
							<select name="period"  tabindex="3" class="span8 change_amount_type">
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['period_type']->value,'selected'=>$_smarty_tpl->tpl_vars['period']->value),$_smarty_tpl);?>
			    			
							</select>
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['period_typeErr']->value;?>
</label>									
							</td>	
						</tr>
						<tr>
							<td width="120" class="tbl_column">CTC  <span class="f_req">*</span></td>
							<td>										
							<select name="ctc_from" tabindex="1" rel="maxDrop" class="span4 minDrop" id="minDrop">
							<option value="">Min.</option>	
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['target']->value,'selected'=>$_smarty_tpl->tpl_vars['ctc_from']->value),$_smarty_tpl);?>
			    			
							</select>	
						
							<select name="ctc_to"  tabindex="2" id="maxDrop" class="inline_text span4 maxDrop">
							<option value="">Select</option>	
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['target']->value,'selected'=>$_smarty_tpl->tpl_vars['ctc_to']->value),$_smarty_tpl);?>
			    			
							</select>
							<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['target_from_Err']->value;?>
 </label>									
							<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['target_to_Err']->value;?>
</label>									
							</td>	
						</tr>	
						<tr class="tbl_row">
							<td width="120" class="tbl_column">No of Resume  <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="4" name="no_resumes" value="<?php echo $_smarty_tpl->tpl_vars['no_resumes']->value;?>
" class="span8">
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['no_resumeErr']->value;?>
 </label>									
							</td>	
						</tr>
						
						<?php if ($_smarty_tpl->tpl_vars['amount']->value != '0' || $_POST['period'] == 'D' || $_POST['period'] == 'PS') {?>
						<tr>
							<td width="120" class="tbl_column amount_Validity">Amount (INR) <span class="f_req">*</span></td>
							<td class = "amount_Validity">										
								<input type="text" tabindex="4" name="amount" value="<?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
" class="span8 amount_Validity">
								<label for="reg_city" generated="true" class="error amount_Validity"><?php echo $_smarty_tpl->tpl_vars['amountErr']->value;?>
 </label>									
							</td>	
						</tr>	
						<?php }?>		

						
						<tr>
							<td width="120" class="tbl_column amount_Vali">Amount (INR) <span class="f_req">*</span></td>
							<td class = "amount_Vali">										
								<input type="text" tabindex="4" name="amount" value="<?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
" class="span8 amount_Vali">
								<label for="reg_city" generated="true" class="error amount_Vali"><?php echo $_smarty_tpl->tpl_vars['amountErr']->value;?>
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
							<td width="120" class="tbl_column">User Type <span class="f_req">*</span></td>
							<td>										
							<select name="user_type" tabindex="3" class="span8">
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['user']->value,'selected'=>$_smarty_tpl->tpl_vars['user_type']->value),$_smarty_tpl);?>
			    			
							</select>
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['user_typeErr']->value;?>
</label>									
							</td>	
						</tr>
					<tr>
							<td width="120" class="tbl_column">Type <span class="f_req">*</span></td>
							<td>										
							<select name="type" id="type" tabindex="3" class="span8 change_amount_type">
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['types']->value,'selected'=>$_smarty_tpl->tpl_vars['type']->value),$_smarty_tpl);?>
			    			
							</select>
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['typesErr']->value;?>
</label>									
							</td>	
						</tr>	
						 
				  <tr class="tbl_row">
						<td width="120" class="tbl_column">Status <span class="f_req">*</span></td>
						<td>	
						<select name=status id="status" tabindex="5" class="span8">
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['grade_status']->value,'selected'=>$_smarty_tpl->tpl_vars['status']->value),$_smarty_tpl);?>
		
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
				<input type="hidden" name="data[Client][webroot]" value="eligibility.php" id="webroot">

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
	// function to change the amount
	$('.change_amount_type').change(function(){ 
		if($(this).val() == 'PS'){
			$('.amount_Validity').hide();
		}else if($(this).val()  == 'M' && $(this).val() == 'PS'){
			$('.amount_Validity').hide();
		}else if($(this).val()  == 'H' && $(this).val() == 'PS'){
			$('.amount_Validity').hide();
		}else if($(this).val()  == 'M'){
			$('.amount_Validity').hide();
		}else if($(this).val()  == 'H'){
			$('.amount_Validity').hide();
		}else{
			$('.amount_Validity').show();
		}
	});
	
	if($('.change_amount_type').length > 0){
		if($('.change_amount_type:selected').val() == 'PS'){
			$('.amount_Validity').hide();
		}else if($('.change_amount_type:selected').val() == 'M'){
			$('.amount_Validity').hide();
		}else if($('.change_amount_type:selected').val() == 'H'){
			$('.amount_Validity').hide();
		}else if(($('.change_amount_type:selected').val() == 'M') && ($('.change_amount_type:selected').val() == 'PS')){
			$('.amount_Validity').hide();
		}else if(($('.change_amount_type:selected').val() == 'H') && ($('.change_amount_type:selected').val() == 'PS')){
			$('.amount_Validity').hide();
		}else{
			$('.amount_Validity').show();
		}
	}

	// function to change the amount
	$('.change_amount_type').change(function(){ 
		if($(this).val() == 'PS'){
			$('.amount_Vali').hide();
		}else if($(this).val()  == 'M' && $(this).val() == 'PS'){
			$('.amount_Vali').hide();
		}else if($(this).val()  == 'H' && $(this).val() == 'PS'){
			$('.amount_Vali').hide();
		}else if($(this).val()  == 'M'){
			$('.amount_Vali').hide();
		}else if($(this).val()  == 'H'){
			$('.amount_Vali').hide();
		}else{
			$('.amount_Vali').show();
		}
	});
	
	if($('.change_amount_type').length > 0){
		if($('.change_amount_type:selected').val() == 'PS'){
			$('.amount_Vali').hide();
		}else if($('.change_amount_type:selected').val() == 'M'){
			$('.amount_Vali').hide();
		}else if($('.change_amount_type:selected').val() == 'H'){
			$('.amount_Vali').hide();
		}else if(($('.change_amount_type:selected').val() == 'M') && ($('.change_amount_type:selected').val() == 'PS')){
			$('.amount_Vali').hide();
		}else if(($('.change_amount_type:selected').val() == 'H') && ($('.change_amount_type:selected').val() == 'PS')){
			$('.amount_Vali').hide();
		}else{
			$('.amount_Vali').show();
		}
	}
	
	/*
	// function to change the amount
	$('.change_periodType_amount_type').change(function(){ 
		if($(this).val() == 'M'){
			$('.amount_Validity').hide();
		}else if($(this).val() == 'H'){
			$('.amount_Validity').hide();
		}else{
			$('.amount_Validity').show();
		}
	});
	
	if($('.change_periodType_amount_type').length > 0){
		if($('.change_periodType_amount_type:selected').val() == 'M'){
			$('.amount_Validity').hide();
		}else if($('.change_periodType_amount_type:selected').val() == 'H'){
			$('.amount_Validity').hide();
		}else{
			$('.amount_Validity').show();
		}
	}
	*/
});

<?php echo '</script'; ?>
>	
<?php }
}
