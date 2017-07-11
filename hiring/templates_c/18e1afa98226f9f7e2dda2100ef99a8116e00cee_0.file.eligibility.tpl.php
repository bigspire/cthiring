<?php
/* Smarty version 3.1.29, created on 2017-07-11 16:34:16
  from "C:\xampp\htdocs\2017\ctsvn\cthiring\hiring\templates\eligibility.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5964b0b0bd7e00_04111069',
  'file_dependency' => 
  array (
    '18e1afa98226f9f7e2dda2100ef99a8116e00cee' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\templates\\eligibility.tpl',
      1 => 1499771053,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5964b0b0bd7e00_04111069 ($_smarty_tpl) {
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
                                   Search Eligibility
                                </li>
                            </ul>
                        </div>
						</nav>

						<div class="srch_buttons">
								<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>
							<?php if (!$_smarty_tpl->tpl_vars['ALERT_MSG']->value) {?>
								<a href="eligibility.php?action=export&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&type=<?php echo $_POST['type'];?>
">
								<button type="button" val="eligibility.php?action=export&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&type=<?php echo $_POST['type'];?>
" name="export" class="jsRedirect btn btn-warning" >Export Excel</button></a>
							<?php }?>
							
							<a class="jsRedirect" data-notify-time = '3000'   href="add_eligibility.php">
							<input type="button" value="Create Eligibility" class="btn btn-info"/></a>						
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
						
						<?php if ($_POST['type']) {?>
						  <?php $_smarty_tpl->tpl_vars['hide'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'hide', 0);?>
						<?php } else { ?>
							<?php $_smarty_tpl->tpl_vars['hide'] = new Smarty_Variable('dn', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'hide', 0);?>
						<?php }?>
							<form action="" id="formID" name="searchFrm" class="formID" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
							
							<div class="<?php echo $_smarty_tpl->tpl_vars['hide']->value;?>
 dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							<!--label style="margin-left:0">Keyword: <input type="text" placeholder="Search Here..." name="keyword" id="keyword" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" class="input-large" aria-controls="dt_gal"></label-->
							<label style="margin-left:0">Type: 
							<select name="type" class="input-medium" style="clear:left" id="ClientStatus">
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['eligibility_type']->value,'selected'=>$_POST['type']),$_smarty_tpl);?>

							</select> 
							</label>
							<label>Status: 
							<select name="status" class="input-small" style="clear:left" id="ClientStatus">
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['status_type']->value,'selected'=>$_smarty_tpl->tpl_vars['status']->value),$_smarty_tpl);?>

							</select> 
							</label>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
							
							<label style="margin-top:18px;"><a href="eligibility.php" class="jsRedirect"><input value="Reset" type="button" class="btn"/></a></label>
							
						</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="eligibility.php" id="webroot">
						</form>
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="100"><a href="eligibility.php?field=ctc_from&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_ctc_from']->value;?>
">CTC</a></th>
										<th width="150"><a href="eligibility.php?field=type&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_type']->value;?>
">Type</a></th>
										<th width="100"><a href="eligibility.php?field=no_resumes&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_no_resumes']->value;?>
">No of Resume</a></th>
										<th width="100"><a href="eligibility.php?field=amount&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_amount']->value;?>
">Amount</a></th>
										<th width="100"><a href="eligibility.php?field=status&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_status']->value;?>
">Status</a></th>
										<th width="80"><a href="eligibility.php?field=created&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_created']->value;?>
">Created</a></th>
										<th width="80"><a href="eligibility.php?field=modified&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_modified']->value;?>
">Modified</a></th>
										<th width="50" style="text-align:center">Actions</th>
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
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['target_elig'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['no_resumes'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['amount'];?>
</td>
										<td><span class="label label-<?php echo $_smarty_tpl->tpl_vars['item']->value['status_cls'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</span></td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['created_date'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['modified_date'];?>
</td>
										<td class="actionItem" style="text-align:center">
										<a href="edit_eligibility.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="btn  btn-mini"  rel="tooltip" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
										<a id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" href="javascript:void(0)" rel="tooltip" class="btn Confirm btn-mini" value="#"  title="Delete"><i class="icon-trash"></i></a>
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
<input type="hidden" id="page" value="list_eligibility">
<input type="hidden" id="web_root" value="delete_eligibility.php">	
              </div>
            </div>
     </div>
		</div>
		</div>	
	</div>	
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
