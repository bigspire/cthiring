<?php
/* Smarty version 3.1.29, created on 2017-07-01 14:49:52
  from "C:\xampp\htdocs\2017\ctsvn\cthiring\hiring\templates\add_billing.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_595769381dfee8_03676389',
  'file_dependency' => 
  array (
    '856b41824fe64a42b82e8f282557eeaec173a11d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\templates\\add_billing.tpl',
      1 => 1498897698,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_595769381dfee8_03676389 ($_smarty_tpl) {
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
                                    <a href="billing.php">Billing</a>
                                </li>
                            
                                <li>
                                   Add Billing
                                </li>
                            </ul>
                        </div>
                    </nav>
				<?php if ($_smarty_tpl->tpl_vars['EXIST_MSG']->value) {?>
				 <div id="flashMessage" class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><?php echo $_smarty_tpl->tpl_vars['EXIST_MSG']->value;?>
</div>					
				<?php }?>
<form action="add_billing.php" id="formID"  name="searchFrm" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="row-fluid">
		<div class="span12">
		<div class="mbox">
			<div class="tabbable">
							
			<div class="tab-content" style="overflow:visible">			
			<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Candidate Name <span class="f_req">*</span></td>
													
										<td>
	<input type="text" placeholder="Search Here..." name="keyword" id="keyword" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" class="span10" aria-controls="dt_gal">
	<input type="hidden" value="<?php echo $_POST['resume_id'];?>
" name="resume_id" id="resume_id">
	<input type="hidden" value="<?php echo $_POST['requirements_id'];?>
" name="requirements_id" id="requirements_id">
	<input type="hidden" value="<?php echo $_POST['client_id'];?>
" name="client_id" id="client_id">
	<input type="hidden" value="<?php echo $_POST['created_by'];?>
" name="created_by">
	<input type="hidden" id="page" value="add_billing_candidate_search">
	<input type="hidden" value="1" id="SearchKeywords">
	<input type="hidden"  id="retainBilling">
	<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['keywordErr']->value;?>
</label>
										</td>	
									</tr>
									
									
									<tr>
										<td width="120" class="tbl_column">Position <span class="f_req">*</span></td>
										<td>
										<input type="hidden" name="position" id="position"  value="<?php echo $_POST['position'];?>
">
									<label id="lbl_position"></label>		
													
									</td>
									</tr>	
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Client Name <span class="f_req">*</span></td>
										<td>
										<input type="hidden" name="client" id="client"  value="<?php echo $_POST['client'];?>
">
									<label id="lbl_client"></label>							
									</td>
									</tr>		
									<tr>
									
									<tr>
										<td width="120" class="tbl_column">CTC Offered <span class="f_req">*</span></td>
										<td> 
										<input type="hidden" name="ctc" id="ctc_offered"  value="<?php echo $_POST['ctc'];?>
">
										<label id="lbl_ctc_offered"></label>
										</td>
									</tr>										
								</tbody>
							</table>
						</div>
							
						<div class="span6">		
							<table class="table table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
							
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Billing Amount <span class="f_req">*</span></td>
										<td> 
										<input type="hidden" name="billing" id="billing_amount"  value="<?php echo $_POST['billing'];?>
">
										<label id="lbl_billing_amount"></label>
										</td>
									</tr>
									<tr>
										<td width="120" class="tbl_column">Billing Date <span class="f_req">*</span></td>
										<td> 
										<input type="hidden" name="billing_date" id="billing_date"  value="<?php echo $_POST['billing_date'];?>
">
										<label id="lbl_billing_date"></label>										
										</td>
									</tr>
													
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Joined Date <span class="f_req">*</span></td>
										<td> 
										<input type="hidden" name="joined_date" id="joined_date"  value="<?php echo $_POST['joined_date'];?>
">
										<label id="lbl_joined_date"></label>										
										</td>
									</tr>
								</tbody>
							</table>
						</div>
 
		</div>
		</div>
		</div>
		</div>
</div>
</div>
<input type="hidden" id="billing_count" name="billing_count" value="<?php echo $_smarty_tpl->tpl_vars['billingCount']->value;?>
">
					 <div class="form-actions">
					 			<input name="submit" class="btn btn-gebo submit" value="Submit" type="submit"/>
									<a href="billing.php">
									<button type="button" val="billing.php" class="btn Cancel">Cancel</button>
									</a>
					<input type="hidden" id="web_root" value="billing.php">
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
	/* retaining billing details*/
	if($('#retainBilling').length > 0){
		$('#lbl_position').html($('#position').val());
		$('#lbl_client').html($('#client').val());
		$('#lbl_ctc_offered').html($('#ctc_offered').val());
		$('#lbl_billing_amount').html($('#billing_amount').val());
		$('#lbl_billing_date').html($('#billing_date').val());
		$('#lbl_joined_date').html($('#joined_date').val());
		$('#client_id').html($('#client_id').val());
		$('#requirements_id').html($('#requirements_id').val());
		$('#resume_id').html($('#resume_id').val());
	}
 });
<?php echo '</script'; ?>
>
<?php }
}
