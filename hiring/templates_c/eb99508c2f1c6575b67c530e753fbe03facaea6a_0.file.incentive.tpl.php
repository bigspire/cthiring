<?php
/* Smarty version 3.1.29, created on 2017-11-28 10:16:17
  from "C:\xampp\htdocs\2017\ctsvn\cthiring\hiring\templates\incentive.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a1cea1913d625_04184470',
  'file_dependency' => 
  array (
    'eb99508c2f1c6575b67c530e753fbe03facaea6a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\templates\\incentive.tpl',
      1 => 1511844374,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5a1cea1913d625_04184470 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\vendor\\smarty-3.1.29\\libs\\plugins\\function.html_options.php';
?>


			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                
							
					<div class="row-fluid footer_div">
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
                                   Search Incentive
                                </li>
                            </ul>
                        </div>
                    </nav>

								<div class="srch_buttons">
								<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>
							<?php if (!$_smarty_tpl->tpl_vars['ALERT_MSG']->value) {?>
							<a href="incentive.php?action=export&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
">
							<button type="button" val="incentive.php?action=export&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
" name="export" class="jsRedirect btn btn-warning" >Export</button></a></a>							
							<?php }?>	
							 
							<?php if ($_smarty_tpl->tpl_vars['module']->value['create_incentive'] == '1') {?>
							<a class="jsRedirect" data-notify-time = '3000'   href="add_incentive.php">
							<input type="button" value="Create Incentive" class="btn btn-info"/></a>
							<?php }?>
							</div>

				 	<?php if ($_smarty_tpl->tpl_vars['ALERT_MSG']->value) {?>
							<div class="alert alert-info">
								<a class="close" data-dismiss="alert">×</a>
								<?php echo $_smarty_tpl->tpl_vars['ALERT_MSG']->value;?>

							</div>
						<?php }?>
						
						<?php if ($_smarty_tpl->tpl_vars['SUCCESS_MSG']->value) {?>
							<div class="alert alert-success">
								<a class="close" data-dismiss="alert">×</a>
								<?php echo $_smarty_tpl->tpl_vars['SUCCESS_MSG']->value;?>

							</div>
						<?php }?>
						
						<?php if ($_smarty_tpl->tpl_vars['employee']->value || $_smarty_tpl->tpl_vars['f_date']->value || $_smarty_tpl->tpl_vars['t_date']->value) {?>
						  <?php $_smarty_tpl->tpl_vars['hide'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'hide', 0);?>
						<?php } else { ?>
							<?php $_smarty_tpl->tpl_vars['hide'] = new Smarty_Variable('dn', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'hide', 0);?>
						<?php }?>
					
					<form action="" id="formID" name="searchFrm" class="formID" method="post" accept-charset="utf-8">
						<div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
						<div class="<?php echo $_smarty_tpl->tpl_vars['hide']->value;?>
 dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							
							<span id="sandbox-container">
							<span class="input-daterange" id="datepicker">	
							<label>From Date: <input type="text" placeholder="dd/mm/yyyy" class="input-small datepick" name="f_date" value="<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
" aria-controls="dt_gal"></label>
							<label>To Date: <input type="text" placeholder="dd/mm/yyyy" name="t_date" value="<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
" class="input-small datepick" aria-controls="dt_gal"></label>				
							</span></span>
							
							<label>Employee: 
						<select name="employee" class="input-medium" placeholder="" style="clear:left" id="IncentiveEmpId">
						<option value="">Select</option>
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['emp_name']->value,'selected'=>$_smarty_tpl->tpl_vars['employee']->value),$_smarty_tpl);?>

						</option>
						</select> </label>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
					<label style="margin-top:18px;"><a class="jsRedirect" href="incentive.php"><input value="Reset" type="button" class="btn"/></a></label>																		
					</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="incentive/" id="webroot">
						</form>
						

				
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="180"><a href="incentive.php?field=employee&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_employee']->value;?>
">Employee</a></th>										
										<th width="180"><a href="incentive.php?field=incentive_type&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_incentive_type']->value;?>
">Incentive Type </a></th>
										<th width="100"><a href="incentive.php?field=period&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_period']->value;?>
">Period</a></th>
										<th width="180"><a href="incentive.php?field=eligible_incentive_amt&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_eligible_incentive_amt']->value;?>
">Incentive Amt. </a></th>
										<th width="120"><a href="incentive.php?field=created_date&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_created_date']->value;?>
">Created</a></th>
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
										<td width=""><a href="view_incentive.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&emp_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['emp_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['employee'];?>
</a></td>
										<td width="" ><?php echo $_smarty_tpl->tpl_vars['item']->value['incentive_type'];?>
</td>	
										<td width=""><?php echo $_smarty_tpl->tpl_vars['item']->value['period'];?>
</td>										
										<td width=""><?php echo $_smarty_tpl->tpl_vars['item']->value['eligible_incentive_amt'];?>
</td>
										<td width=""><?php echo $_smarty_tpl->tpl_vars['item']->value['created_date'];?>
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
              </div>
            </div>
     </div>
		</div>
		</div>	
	</div>	
		
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
