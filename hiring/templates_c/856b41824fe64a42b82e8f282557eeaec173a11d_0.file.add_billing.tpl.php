<?php
/* Smarty version 3.1.29, created on 2017-07-01 17:16:09
  from "C:\xampp\htdocs\2017\ctsvn\cthiring\hiring\templates\add_billing.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59578b81718020_41231497',
  'file_dependency' => 
  array (
    '856b41824fe64a42b82e8f282557eeaec173a11d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\templates\\add_billing.tpl',
      1 => 1498909565,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_59578b81718020_41231497 ($_smarty_tpl) {
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
<form action="add_billing.php?res_id=<?php echo $_GET['res_id'];?>
&req_res_id=<?php echo $_GET['req_res_id'];?>
" id="formID"  name="searchFrm" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="row-fluid">
		<div class="span12">
		<div class="mbox">
			<div class="tabbable">
							
			<div class="tab-content" style="overflow:visible">			
			<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
						<input type="hidden" value="<?php if ($_smarty_tpl->tpl_vars['resume_id']->value) {
echo $_smarty_tpl->tpl_vars['resume_id']->value;
} else {
echo $_POST['resume_id'];
}?>" name="resume_id">
	<input type="hidden" value="<?php if ($_smarty_tpl->tpl_vars['requirement_id']->value) {
echo $_smarty_tpl->tpl_vars['requirement_id']->value;
} else {
echo $_POST['requirement_id'];
}?>" name="requirement_id">
	<input type="hidden" value="<?php if ($_smarty_tpl->tpl_vars['client_id']->value) {
echo $_smarty_tpl->tpl_vars['client_id']->value;
} else {
echo $_POST['client_id'];
}?>" name="client_id">
	
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Candidate Name <span class="f_req">*</span></td>
													
										<td>
											<input type="text" name="candidate_name" disabled value="<?php if ($_smarty_tpl->tpl_vars['candidate_name']->value) {
echo $_smarty_tpl->tpl_vars['candidate_name']->value;
} else {
echo $_POST['candidate_name'];
}?>" class="span10" aria-controls="dt_gal">
										</td>	
									</tr>
									
									
									<tr>
										<td width="120" class="tbl_column">Position <span class="f_req">*</span></td>
										<td>
										<input type="text" name="position" disabled value="<?php if ($_smarty_tpl->tpl_vars['position']->value) {
echo $_smarty_tpl->tpl_vars['position']->value;
} else {
echo $_POST['position'];
}?>">															
									</td>
									</tr>	
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Client Name <span class="f_req">*</span></td>
										<td>
										<input type="text" name="client_name" disabled value="<?php if ($_smarty_tpl->tpl_vars['client_name']->value) {
echo $_smarty_tpl->tpl_vars['client_name']->value;
} else {
echo $_POST['client_name'];
}?>">						
									</td>
									</tr>		
									<tr>
									
									<tr>
										<td width="120" class="tbl_column">CTC Offered <span class="f_req">*</span></td>
										<td> 
										<input type="text" name="ctc_offer" disabled value="<?php if ($_smarty_tpl->tpl_vars['ctc_offer']->value) {
echo $_smarty_tpl->tpl_vars['ctc_offer']->value;
} else {
echo $_POST['ctc_offer'];
}?>">
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
										<input type="text" name="billing" disabled value="<?php if ($_smarty_tpl->tpl_vars['billing_amount']->value) {
echo $_smarty_tpl->tpl_vars['billing_amount']->value;
} else {
echo $_POST['billing_amount'];
}?>">
										</td>
									</tr>
									<tr>
										<td width="120" class="tbl_column">Billing Date <span class="f_req">*</span></td>
										<td> 
										<input type="text" name="billing_date"  disabled value="<?php if ($_smarty_tpl->tpl_vars['billing_date']->value) {
echo $_smarty_tpl->tpl_vars['billing_date']->value;
} else {
echo $_POST['billing_date'];
}?>">									
										</td>
									</tr>
													
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Joined Date <span class="f_req">*</span></td>
										<td> 
										<input type="text" name="joined_date" disabled value="<?php if ($_smarty_tpl->tpl_vars['joined_date']->value) {
echo $_smarty_tpl->tpl_vars['joined_date']->value;
} else {
echo $_POST['joined_date'];
}?>">										
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
