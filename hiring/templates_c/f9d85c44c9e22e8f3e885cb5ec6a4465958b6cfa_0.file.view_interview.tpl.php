<?php
/* Smarty version 3.1.29, created on 2018-04-05 18:55:18
  from "C:\xampp\htdocs\ctsvn\cthiring\hiring\templates\view_interview.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5ac623be122412_99970134',
  'file_dependency' => 
  array (
    'f9d85c44c9e22e8f3e885cb5ec6a4465958b6cfa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\templates\\view_interview.tpl',
      1 => 1512651320,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5ac623be122412_99970134 ($_smarty_tpl) {
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
                                    <a href="interview.php">Interviews</a>
                                </li>
                            
                                <li>
                                   <?php echo $_smarty_tpl->tpl_vars['interview_data']->value['candidate_name'];?>

                                </li>
                            </ul>
                        </div>
                    </nav>
							
						<div class="row-fluid">
							<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0">
								<tbody>
									<tr>
										<td width="120" class="tbl_column">Candidate Name</td>
										<td><?php echo $_smarty_tpl->tpl_vars['interview_data']->value['candidate_name'];?>
</td>
									</tr>
									
									<tr>
										<td width="" class="tbl_column">Position </td>
										<td><?php echo $_smarty_tpl->tpl_vars['interview_data']->value['position'];?>
</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Company </td>
										<td><?php echo $_smarty_tpl->tpl_vars['interview_data']->value['company'];?>
</td>
									</tr>	
									<tr>
									<td class="tbl_column">Interview Date </td>
									<td><?php echo $_smarty_tpl->tpl_vars['int_date']->value;?>
</td>
								</tr>	
								</tbody>
							</table>
							</div>
							
							<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="margin-bottom:0">
								<tbody>							
								<tr>
									<td class="tbl_column">Current Stage  </td>
									<td><?php echo $_smarty_tpl->tpl_vars['interview_data']->value['current_stage'];?>
</td>
								</tr>	
								<tr>
									<td class="tbl_column">Current Status  </td>
									<td><?php echo $_smarty_tpl->tpl_vars['interview_data']->value['current_status'];?>
</td>
								</tr>	
								<tr>
									<td class="tbl_column">Recruiter  </td>
									<td><?php echo $_smarty_tpl->tpl_vars['interview_data']->value['created_by'];?>
</td>
								</tr>	
								<tr>
									<td class="tbl_column">Created Date  </td>
									<td><?php echo $_smarty_tpl->tpl_vars['created_date']->value;?>
</td>
								</tr>	
								</tbody>
							</table>
							</div>
                 </div>
                   <div class="row-fluid">
						<div class="span12">
							<div class="mbox">
							
							
								
										<div>
											<!--div class="box-title mb5">
												<h4><i class="icon-list"></i> Interview Details </h4>
											</div-->											
											<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_inbox">
												<thead>
													<tr>
													<th class="">Interview Date</th>
													<th class="">Stage</th>
													<th class="">Status</th>	
													<th class="">Remarks</th>
													</tr>
												</thead>
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
												<tr>
													<td class=""><?php echo $_smarty_tpl->tpl_vars['item']->value['interview_date'];?>
</td>
													<td class=""><?php echo $_smarty_tpl->tpl_vars['item']->value['stage'];?>
</td>
													<td class=""><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
													<td class=""><?php echo $_smarty_tpl->tpl_vars['item']->value['remarks'];?>
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
											</table>	
											</div>
						<div class="form-actions">
								<a href="interview.php" class="jsRedirect"><button class="btn">Back</button></a>
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
