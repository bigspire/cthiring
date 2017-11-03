<?php
/* Smarty version 3.1.29, created on 2017-11-02 15:33:05
  from "/var/www/html/mh/hiring/templates/approve_billing.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59faed59e36909_30256893',
  'file_dependency' => 
  array (
    'ef3c08a865b3b845222fe1323d6d7fdf4268c3b2' => 
    array (
      0 => '/var/www/html/mh/hiring/templates/approve_billing.tpl',
      1 => 1509463418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_59faed59e36909_30256893 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once '/var/www/html/mh/hiring/vendor/smarty-3.1.29/libs/plugins/function.html_options.php';
?>

   

			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <!-- main content -->
            <div id="contentwrapper">
			
			
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
                                    <a href="approve_billing.php">Approve Billings</a>
                                </li>
                            
                                <li>
                                   Search Billing
                                </li>
                            </ul>
                        </div>
                    </nav>

						<div class="srch_buttons">
								<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>
							<?php if (!$_smarty_tpl->tpl_vars['ALERT_MSG']->value) {?>
								<a href="approve_billing.php?action=export&keyword=<?php echo $_POST['keyword'];?>

								&employee=<?php echo $_POST['employee'];?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
" class="jsRedirect">
								<button type="button" val="approve_billing.php?action=export&keyword=<?php echo $_POST['keyword'];?>
&employee=<?php echo $_POST['employee'];?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
" name="export" class="btn btn-warning" >Export Excel</button></a>
							<?php }?>
						</div>
						
						<?php if ($_smarty_tpl->tpl_vars['SUCCESS_MSG']->value) {?>
							<div class="alert alert-success">
								<a class="close" data-dismiss="alert">×</a>
								<?php echo $_smarty_tpl->tpl_vars['SUCCESS_MSG']->value;?>

							</div>
						<?php }?>
						
						<?php if ($_smarty_tpl->tpl_vars['ALERT_MSG']->value) {?>
							<div class="alert alert-success">
								<a class="close" data-dismiss="alert">×</a>
								<?php echo $_smarty_tpl->tpl_vars['ALERT_MSG']->value;?>

							</div>
						<?php }?>

						<?php if ($_smarty_tpl->tpl_vars['keyword']->value || $_smarty_tpl->tpl_vars['f_date']->value || $_smarty_tpl->tpl_vars['t_date']->value || $_smarty_tpl->tpl_vars['employee']->value || $_smarty_tpl->tpl_vars['valid_reset']->value == 'yes') {?>
						  <?php $_smarty_tpl->tpl_vars['hide'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'hide', 0);?>
						<?php } else { ?>
							<?php $_smarty_tpl->tpl_vars['hide'] = new Smarty_Variable('dn', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'hide', 0);?>
						<?php }?>
						<form action="" id="formID" name="searchFrm" class="formID" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
						<div class="<?php echo $_smarty_tpl->tpl_vars['hide']->value;?>
 dataTables_filter srchBox reset_show" style="float:left;" id="dt_gal_filter">
						<label style="margin-left:0;">Keyword: <input type="text" placeholder="Candidate Name or Client Name" name="keyword" id ="keyword" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" class="input-large" aria-controls="dt_gal"></label>	
						
						<span id="sandbox-container">
						<span  class="input-daterange" id="datepicker">	
						<label>Billing From: <input type="text" class="input-small datepick" name="f_date" placeholder="dd/mm/yyyy" style="width:70px;"  value="<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
" aria-controls="dt_gal"></label>
						<label>Billing Till: <input type="text" name="t_date" placeholder="dd/mm/yyyy" value="<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
" style="width:70px;"  class="input-small datepick" aria-controls="dt_gal"></label>						
						</span></span>
						
						<label>Employee: 
						<select name="employee" class="input-medium" placeholder="" style="clear:left" id="BillingEmpId">
						<option value="">Select</option>
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['emp_name']->value,'selected'=>$_smarty_tpl->tpl_vars['employee']->value),$_smarty_tpl);?>

						</option>
						</select> 
						</label>
						<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
						<label style="margin-top:18px;"><a href="approve_billing.php" class="jsRedirect">
							<input value="Reset" id="reset" type="button" class="btn"/></a>
						</label>	
						</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="#" id="webroot">
						</form>

							
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="120"><a href="approve_billing.php?field=employee&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_employee']->value;?>
">Employee</a></th>
										<th width="120"><a href="approve_billing.php?field=job_title&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_job_title']->value;?>
">Position</a></th>
										<th width="120"><a href="approve_billing.php?field=client&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_client']->value;?>
">Client Name</a></th>
										<th width="100"><a href="approve_billing.php?field=billing_amount&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_billing_amonut']->value;?>
">Billing Amount</a></th>
										<th width="80"><a href="approve_billing.php?field=billing_date&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_billing_date']->value;?>
">Billing Date</a></th>
										<th width="120"><a href="approve_billing.php?field=candidate&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_candidate']->value;?>
">Candidate Name</a></th>
										<th width="120"><a href="approve_billing.php?field=created&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_created']->value;?>
">Created Date</a></th>
										<th width="80">Status</th>
										<th width="70">Pending</th>
										<th width="70" style="text-align:center">Actions</th>

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
									
									<tr>
										<td><?php echo ucwords($_smarty_tpl->tpl_vars['item']->value['employee']);?>
</td>
										<td><?php echo ucwords($_smarty_tpl->tpl_vars['item']->value['job_title']);?>
</td>
										<td><?php echo ucwords($_smarty_tpl->tpl_vars['item']->value['client_name']);?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['billing_amount'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['billing_date'];?>
</td>
										<td><?php echo ucwords($_smarty_tpl->tpl_vars['item']->value['candidate_name']);?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['created_date'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
										<?php if ($_smarty_tpl->tpl_vars['item']->value['is_approved'] == 'N') {?>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['pending'];?>
</td>
										<?php } else { ?>
										<td></td>
										<?php }?>
										<?php if ($_smarty_tpl->tpl_vars['show_status']->value[$_smarty_tpl->tpl_vars['key']->value] == 'pass') {?>
										<td class="actionItem" style="text-align:center">
											<a href="view_approve_billing.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&emp_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['employee_id'];?>
&status_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['status_id'];?>
" rel="tooltip" class="btn  btn-mini" title="Verify Billing"><i class="icon-edit"></i></a>
										</td>
										<?php } else { ?>
										<td class="actionItem" style="text-align:center">
											<a href="view_approve_billing.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&emp_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['employee_id'];?>
&status_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['status_id'];?>
" rel="tooltip" class="btn  btn-mini" title="Verified"><i class="icon-check"></i></a>
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
<div class="row" style="margin-left:0px;">
<div class="span4">					   
<div class="" id="dt_gal_info">
<?php echo $_smarty_tpl->tpl_vars['page_info']->value;?>

</div> 
</div>

<div class="span8">
<div class="dataTables_paginate paging_bootstrap pagination">
<ul>
<?php echo $_smarty_tpl->tpl_vars['page_links']->value;?>

</ul>
</div>
</div>
</div>
</div>
<input type="hidden" id="page" value="list_billing">
              </div>
            </div>
     </div>
		</div>
		</div>	
	</div>	
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
