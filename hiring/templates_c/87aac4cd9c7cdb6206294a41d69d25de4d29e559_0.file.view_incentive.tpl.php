<?php
/* Smarty version 3.1.29, created on 2017-10-30 14:40:01
  from "C:\xampp\htdocs\ctsvn\cthiring\hiring\templates\view_incentive.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59f6ec69a06f90_64835356',
  'file_dependency' => 
  array (
    '87aac4cd9c7cdb6206294a41d69d25de4d29e559' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\templates\\view_incentive.tpl',
      1 => 1488271090,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_59f6ec69a06f90_64835356 ($_smarty_tpl) {
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
							
						<div class="row-fluid">
							<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
									<tr>
										<td width="120" class="tbl_column">Employee</td>
										<td><?php echo $_smarty_tpl->tpl_vars['incentive_data']->value['employee'];?>
</td>
									</tr>
									
									<tr>
										<td width="" class="tbl_column">Achievement in Amount </td>
										<td><?php echo $_smarty_tpl->tpl_vars['incentive_data']->value['achievement_amt'];?>
</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Eligible Incentive % </td>
										<td><?php echo $_smarty_tpl->tpl_vars['incentive_data']->value['eligible_incentive_percent'];?>
%</td>
									</tr>	
									
									<tr>
										<td width="" class="tbl_column">Quarter</td>
										<td><?php echo $_smarty_tpl->tpl_vars['quarter']->value;?>
</td>
									</tr>
								</tbody>
							</table>
							</div>
							
							<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
								<tr>
									<td class="tbl_column">Target Amount</td>
									<td><?php echo $_smarty_tpl->tpl_vars['incentive_data']->value['target_amt'];?>
</td>
								</tr>	
									
								<tr>
									<td class="tbl_column">Achievement in % </td>
									<td><?php echo $_smarty_tpl->tpl_vars['incentive_data']->value['achievement_percent'];?>
%</td>
								</tr>	
									
								<tr>
									<td  class="tbl_column"width="120">Eligible Incentive Amt.</td>
									<td><?php echo $_smarty_tpl->tpl_vars['incentive_data']->value['eligible_incentive_amt'];?>
</td>
								</tr>
								</tbody>
							</table>
							</div>
						
                 </div>
                 <br>
                 <br>
                 
               	<div class="tab-content"  style="overflow:auto;max-height:300px;">
										<div class="tab-pane active" id="mbox_inbox">
																						
											<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_inbox">
												<thead>
													<tr>
													<th class="allCol position">Position</th>
													<th class="allCol position">Client</th>
													<th class="allCol position">Billing Amount</th>
													<th class="allCol position">Offer CTC</th>
													<th class="allCol position">Billing Date</th>	
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
												<td class="allCol position"><?php echo $_smarty_tpl->tpl_vars['item']->value['ctc_offer'];?>
</td>																 													
												<td class="allCol position"><?php echo $_smarty_tpl->tpl_vars['item']->value['billing_amount'];?>
</td>																 										
												<td class="allCol position"><?php echo $_smarty_tpl->tpl_vars['item']->value['billing_date'];?>
</td>																 										
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
								<a href="incentive.php" class="jsRedirect"><button class="btn">Back</button></a>
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
