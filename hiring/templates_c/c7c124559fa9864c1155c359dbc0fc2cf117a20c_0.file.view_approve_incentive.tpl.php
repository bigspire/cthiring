<?php
/* Smarty version 3.1.29, created on 2018-05-31 15:54:52
  from "C:\xampp\htdocs\2017\ctsvn2\cthiring\hiring\templates\view_approve_incentive.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5b0fcd74a24f87_53984486',
  'file_dependency' => 
  array (
    'c7c124559fa9864c1155c359dbc0fc2cf117a20c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn2\\cthiring\\hiring\\templates\\view_approve_incentive.tpl',
      1 => 1527762291,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5b0fcd74a24f87_53984486 ($_smarty_tpl) {
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
                                   <?php echo $_smarty_tpl->tpl_vars['incentive_data']->value['employee'];?>

                                </li>
							</ul>
                        </div>
                    </nav>
						
						<div class="srch_buttons">
							<a href="view_incentive.php?id=<?php echo $_GET['id'];?>
&emp_id=<?php echo $_GET['emp_id'];?>
&action=export">
							<button type="button" val="view_incentive.php?id=<?php echo $_GET['id'];?>
&emp_id=<?php echo $_GET['emp_id'];?>
&action=export" name="export" class="jsRedirect btn btn-warning" >Export</button></a></a>							
						</div>
						<?php if ($_smarty_tpl->tpl_vars['incentive_data']->value['incentive_type'] == 'I') {?>	
						<div class="row-fluid">
							<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
									<tr>
										<td width="180" class="tbl_column">Employee</td>
										<td><?php echo $_smarty_tpl->tpl_vars['incentive_data']->value['employee'];?>
</td>
									</tr>
									
									<tr>
										<td width="" class="tbl_column">Incentive Type </td>
										<td><?php echo $_smarty_tpl->tpl_vars['incentive_type']->value;?>
</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Period </td>
										<td><?php echo $_smarty_tpl->tpl_vars['period']->value;?>
</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Productivity % </td>
										<td><?php echo $_smarty_tpl->tpl_vars['incentive_data']->value['productivity'];?>
%</td>
									</tr>	

											<tr>
									<td width="" class="tbl_column">Incentive Amount (In Rs.)</td>
									<td>₹<?php echo $_smarty_tpl->tpl_vars['incentive_data']->value['eligible_incentive_amt'];?>
</td>
								</tr>									
										
								</tbody>
							</table>
							</div>
							
							<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
								<tr>
										<td width="180" class="tbl_column">No. of Candidates Interviewed </td>
										<td><?php echo $_smarty_tpl->tpl_vars['incentive_data']->value['interview_candidate'];?>
</td>
									</tr>
							<tr>
										<td width="" class="tbl_column">Individual Contribution - YTD <br>(In Rs.) </td>
										<td>-</td>
									</tr>
								<tr>
									<td width=""  class="tbl_column">Created Date</td>
									<td><?php echo $_smarty_tpl->tpl_vars['created_date']->value;?>
</td>
								</tr>	
									
								<tr>
									<td width=""  class="tbl_column">Modified Date </td>
									<td><?php echo $_smarty_tpl->tpl_vars['modified_date']->value;?>
</td>
								</tr>	
								</tbody>
							</table>
							</div>
						
                 </div>
				 <?php }?>
				 
				 <?php if ($_smarty_tpl->tpl_vars['incentive_data']->value['incentive_type'] == 'J') {?>	
						<div class="row-fluid">
							<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
									<tr>
										<td width="180" class="tbl_column">Employee</td>
										<td><?php echo ucwords($_smarty_tpl->tpl_vars['incentive_data']->value['employee']);?>
</td>
									</tr>
									
									<tr>
										<td width="" class="tbl_column">Incentive Type </td>
										<td><?php echo $_smarty_tpl->tpl_vars['incentive_type']->value;?>
</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Period </td>
										<td><?php echo $_smarty_tpl->tpl_vars['period']->value;?>
</td>
									</tr>	
									
							
									<tr>
									<td width=""  class="tbl_column">Min. Performance Target (In Rs.)</td>
									<td>₹<?php echo $_smarty_tpl->tpl_vars['incentive_data']->value['incentive_target_amt'];?>
</td>
								</tr>
								<tr>
									<td  width=""  class="tbl_column">Actual Individual Contribution (In Rs.)</td>
									<td>₹<?php echo $_smarty_tpl->tpl_vars['incentive_data']->value['achievement_amt'];?>
</td>
								</tr>	
										
									
										<tr>
									<td  width="" class="tbl_column">Incentive Amount (In Rs.) </td>
									<td>₹<?php echo $_smarty_tpl->tpl_vars['incentive_data']->value['eligible_incentive_amt'];?>
</td>
								</tr>
									
									
								</tbody>
							</table>
							</div>
							
							<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
								
								
									<tr>
									<td width=""  class="tbl_column">No. of Candidates Billed </td>
									<td><?php echo $_smarty_tpl->tpl_vars['incentive_data']->value['candidate_billed'];?>
</td>
								</tr>
								

									<tr>
										<td width="180" class="tbl_column">Individual Contribution - YTD <br>(In Rs.) </td>
										<td>-</td>
									</tr>	
								
						<tr>
									<td width=""  class="tbl_column">Created Date</td>
									<td><?php echo $_smarty_tpl->tpl_vars['created_date']->value;?>
</td>
								</tr>
									
								<tr>
									<td width=""  class="tbl_column">Modified Date </td>
									<td><?php echo $_smarty_tpl->tpl_vars['modified_date']->value;?>
</td>
								</tr>
								</tbody>
							</table>
							</div>
						
                 </div>
				 <?php }?>
				 
                 <br>
                 <br>
                 
               	<div class="tab-content"  style="overflow:auto;max-height:300px;">
										<div class="tab-pane active" id="mbox_inbox">
																						
											<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_inbox">
												<thead>
													<tr>
													<th class="allCol position">Position</th>
													<th class="allCol position">Client</th>
													<th class="allCol position">Candidate Name</th>
													<?php if ($_smarty_tpl->tpl_vars['incentive_data']->value['incentive_type'] == 'I') {?>
													<th class="allCol position">Position CTC</th>
													<th class="allCol position">Interview Level</th>
													<th class="allCol position">Interview Date</th>
													<th class="allCol position">Interview Status</th>
													<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['incentive_data']->value['incentive_type'] == 'J') {?>
													<th class="allCol position">Position CTC</th>
													<th class="allCol position">Billing Amount</th>
													<th class="allCol position">Offer CTC</th>
													<th class="allCol position">Billing Date</th>
													<th class="allCol position">Account Type</th>
													<th class="allCol position">Individual Contribution (In Rs.)</th>													
													<?php }?>
													</tr>
												</thead>
												<tbody>
												
												<?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$__foreach_item_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>		
												<tr class="allRow position">
												<td class="allCol position"><?php echo $_smarty_tpl->tpl_vars['item']->value['position'];?>
</td>
												<td class="allCol position"><?php echo $_smarty_tpl->tpl_vars['item']->value['client_name'];?>
</td>
												<td class="allCol position"><?php echo $_smarty_tpl->tpl_vars['item']->value['candidate_name'];?>
</td>
												<?php if ($_smarty_tpl->tpl_vars['incentive_data']->value['incentive_type'] == 'I') {?>
												<td class="allCol position"><?php if ($_smarty_tpl->tpl_vars['item']->value['ctc']) {
echo $_smarty_tpl->tpl_vars['item']->value['ctc'];?>
 Lacs<?php }?></td>	
												<td class="allCol position"><?php echo $_smarty_tpl->tpl_vars['item']->value['stage_title'];?>
</td>
												<td class="allCol position"><?php echo $_smarty_tpl->tpl_vars['item']->value['int_date'];?>
</td>
												<td class="allCol position"><?php echo $_smarty_tpl->tpl_vars['item']->value['status_title'];?>
</td>
												<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['incentive_data']->value['incentive_type'] == 'J') {?>
												<td class="allCol position"><?php if ($_smarty_tpl->tpl_vars['item']->value['ctc']) {
echo $_smarty_tpl->tpl_vars['item']->value['ctc'];?>
 Lacs<?php }?></td>	
												<td class="allCol position"><?php echo $_smarty_tpl->tpl_vars['item']->value['ctc_offer'];?>
</td>																 													
												<td class="allCol position"><?php echo $_smarty_tpl->tpl_vars['item']->value['billing_amount'];?>
</td>																 										
												<td class="allCol position"><?php echo $_smarty_tpl->tpl_vars['item']->value['billing_date'];?>
</td>	
												<td class="allCol position"><?php echo $_smarty_tpl->tpl_vars['item']->value['user_type'];?>
</td>																 										
												<td class="allCol position"><?php echo $_smarty_tpl->tpl_vars['item']->value['amount'];?>
</td>
												
												<?php }?>												
												</tr>
												<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
if ($__foreach_item_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_item_0_saved_key;
}
?> 
												</tbody>
											</table>	
											</div>
									</div>
           
						<div class="form-actions">
								<?php if ($_smarty_tpl->tpl_vars['approve_status']->value == 'W') {?>
<a class="iframeBox unreadLink" rel="tooltip" title="Approve Incentive" href="inc_remarks.php?action=approve" val="30_40"><input type="button" value="Approve" class="btn btn btn-success"/></a>
<a class="iframeBox unreadLink" rel="tooltip" title="Reject Incentive" href="inc_remarks.php?action=reject" val="30_40"><input type="button" value="Reject" class="btn btn btn-danger"/></a>
<a href="approve_incentive.php" rel="tooltip" title="Cancel and Back to Incentive"  class="jsRedirect"><button class="btn">Cancel</button></a>
						<?php } else { ?>
<a href="approve_incentive.php" rel="tooltip" title="Back to Incentive"  class="jsRedirect"><button class="btn">Back</button></a>
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
