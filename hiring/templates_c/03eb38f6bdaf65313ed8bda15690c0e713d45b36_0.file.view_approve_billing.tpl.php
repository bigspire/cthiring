<?php
/* Smarty version 3.1.29, created on 2017-12-22 13:14:37
  from "C:\xampp\htdocs\2017\ctsvn\cthiring\hiring\templates\view_approve_billing.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a3cb7e5075d75_80505871',
  'file_dependency' => 
  array (
    '03eb38f6bdaf65313ed8bda15690c0e713d45b36' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\templates\\view_approve_billing.tpl',
      1 => 1513928513,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5a3cb7e5075d75_80505871 ($_smarty_tpl) {
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
                                    <a href="approve_billing.php">Approve Billing</a>
                                </li>
                            
                                <li>
                                  <?php echo ucwords($_smarty_tpl->tpl_vars['employee_name']->value);?>

                                </li>
                            </ul>
                        </div>
                    </nav>
                    
							
						<div class="row-fluid">
							<div class="span12">
		<div class="mbox">
						<div class="tabbable">
			<div class="tab-content" style="overflow:visible">			
			
				<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="">
								<tbody>
									<tr>
										<td width="" class="tbl_column">Client Name </td>
										<td><?php echo ucwords($_smarty_tpl->tpl_vars['client_name']->value);?>
</td>
									</tr>	
									
									
									<tr>
										<td width="" class="tbl_column">Position  </td>
										<td><?php echo ucwords($_smarty_tpl->tpl_vars['position']->value);?>
</td>
									</tr>
									<tr>
										<td width="120" class="tbl_column">Recruiter(s) </td>
										<td><?php echo $_smarty_tpl->tpl_vars['recruiter']->value;?>
</td>
									</tr>
									<tr>
										<td width="120" class="tbl_column">Account Holder </td>
										<td><?php echo ucwords($_smarty_tpl->tpl_vars['employee_name']->value);?>
 </td>
									</tr>
									<tr>
									<td class="tbl_column">Billing Amount</td>
									<td><?php echo $_smarty_tpl->tpl_vars['billing_amount']->value;?>
</td>
								</tr>	
								<tr>
									<td class="tbl_column">Proof of Offer</td>
									<td>
									<a href = "view_approve_billing.php?id=<?php echo $_GET['id'];?>
&emp_id=<?php echo $_GET['emp_id'];?>
&status_id=<?php echo $_GET['status_id'];?>
&action=download&file=<?php echo $_smarty_tpl->tpl_vars['proof_attach']->value;?>
">
									<?php echo $_smarty_tpl->tpl_vars['proof_attach']->value;?>

									</a>
									</td>
								</tr>
									
								
								</tbody>
							</table>
				</div>
							
				<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="">
								<tbody>
									
								<tr>
										<td width="120" class="tbl_column">Candidate Name </td>
										<td><?php echo ucwords($_smarty_tpl->tpl_vars['candidate_name']->value);?>
 </td>
									</tr>
									<tr>
										<td width="120" class="tbl_column">Billing % </td>
										<td><?php if ($_smarty_tpl->tpl_vars['bill_percent']->value > '0') {
echo $_smarty_tpl->tpl_vars['bill_percent']->value;
}?></td>
									</tr>
									<tr>
									<td width="" class="tbl_column">CTC Offered </td>
									<td><?php echo $_smarty_tpl->tpl_vars['ctc_offer']->value;?>
</td>
								</tr>
								<tr>
									<td class="tbl_column">Billing Date </td>
									<td><?php echo $_smarty_tpl->tpl_vars['billing_date']->value;?>
</td>
								</tr>	
									
								<tr>
										<td width="120" class="tbl_column">Joined Date </td>
										<td><?php echo $_smarty_tpl->tpl_vars['joined_date']->value;?>
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
						<div class="form-actions">
						<?php if ($_smarty_tpl->tpl_vars['approve_status']->value == 'W') {?>
<a class="iframeBox unreadLink" rel="tooltip" title="Approve Billing" href="remarks.php?action=approve" val="40_50"><input type="button" value="Approve" class="btn btn btn-success"/></a>
<a class="iframeBox unreadLink" rel="tooltip" title="Reject Billing" href="remarks.php?action=reject" val="40_50"><input type="button" value="Reject" class="btn btn btn-danger"/></a>
<a href="approve_billing.php" rel="tooltip" title="Cancel and Back to Billing"  class="jsRedirect"><button class="btn">Cancel</button></a>
						<?php } else { ?>
<a href="approve_billing.php" rel="tooltip" title="Back to Billing"  class="jsRedirect"><button class="btn">Back</button></a>
						<?php }?>
						</div>
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
