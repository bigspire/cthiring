<?php
/* Smarty version 3.1.29, created on 2017-11-22 15:13:25
  from "C:\xampp\htdocs\2017\ctsvn\cthiring\hiring\templates\holidays.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a1546bd55bf98_22642797',
  'file_dependency' => 
  array (
    'b319136d500d7b9f4ad9f047a8b55d5279cda750' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\templates\\holidays.tpl',
      1 => 1510652553,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5a1546bd55bf98_22642797 ($_smarty_tpl) {
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
                                    <a href="holidays.php">Holidays</a>
                                </li>
                            
                                <li>
                                   Search Holidays
                                </li>
                            </ul>
                        </div>
                    </nav>
								
						<div class="srch_buttons">
								<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>
							<?php if (!$_smarty_tpl->tpl_vars['ALERT_MSG']->value) {?>
								<a href="holidays.php?action=export&keyword=<?php echo $_POST['keyword'];?>
&event_from_date=<?php echo $_smarty_tpl->tpl_vars['event_from_date']->value;?>
&event_to_date=<?php echo $_smarty_tpl->tpl_vars['event_to_date']->value;?>
" class="jsRedirect">
								<button type="button" val="holidays.php?action=export&keyword=<?php echo $_POST['keyword'];?>
&event_from_date=<?php echo $_smarty_tpl->tpl_vars['event_from_date']->value;?>
&event_to_date=<?php echo $_smarty_tpl->tpl_vars['event_to_date']->value;?>
" name="export" class="btn btn-warning" >Export Excel</button></a>
							<?php }?>	
<a href="add_holiday.php" class="iframeBox unreadLink" val="40_45"><input type="button" value="Import Holidays" class="btn btn-info"/></a>							
						</div>
							
						<?php if ($_smarty_tpl->tpl_vars['SUCCESS_MSG']->value) {?>
							<div class="alert alert-success">
								<a class="close" data-dismiss="alert">×</a>
								<?php echo $_smarty_tpl->tpl_vars['SUCCESS_MSG']->value;?>

							</div>
						<?php }?>
						
						<?php if ($_smarty_tpl->tpl_vars['ALERT_MSG']->value) {?>
							<div class="alert alert-info">
								<a class="close" data-dismiss="alert">×</a>
								<?php echo $_smarty_tpl->tpl_vars['ALERT_MSG']->value;?>

							</div>
						<?php }?>
						
						<?php if ($_smarty_tpl->tpl_vars['keyword']->value || $_smarty_tpl->tpl_vars['event_from_date']->value || $_smarty_tpl->tpl_vars['event_to_date']->value) {?>
						  <?php $_smarty_tpl->tpl_vars['hide'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'hide', 0);?>
						<?php } else { ?>
							<?php $_smarty_tpl->tpl_vars['hide'] = new Smarty_Variable('dn', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'hide', 0);?>
						<?php }?>
							<form action="" id="formID" name="searchFrm" class="formID" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
							
							<div class="<?php echo $_smarty_tpl->tpl_vars['hide']->value;?>
 dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							<label style="margin-left:0">Keyword: <input type="text" placeholder="Search Here..." name="keyword" id="keyword" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" class="input-large" aria-controls="dt_gal"></label>
							<label>Holidays From: 
							<input type="text" class="input-small datepick" name="event_from_date" placeholder="dd/mm/yyyy" style="width:70px;"  value="<?php echo $_smarty_tpl->tpl_vars['event_from_date']->value;?>
" aria-controls="dt_gal"></label>
							<label>Holidays To: <input type="text" class="input-small datepick" name="event_to_date" placeholder="dd/mm/yyyy" style="width:70px;"  value="<?php echo $_smarty_tpl->tpl_vars['event_to_date']->value;?>
" aria-controls="dt_gal"></label>
							
							<label>Branch: 
							<select name="branch" class="input-medium" placeholder="" style="clear:left" id="ResumeLoc">
						<option value="">Select</option>
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['branch_name']->value,'selected'=>$_smarty_tpl->tpl_vars['branch']->value),$_smarty_tpl);?>

							</select> 
						</label>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
							<label style="margin-top:18px;"><a href="holidays.php" class="jsRedirect"><input value="Reset" type="button" class="btn"/></a></label>
							</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="holidays.php" id="webroot">
						</form>
							
							
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="200"><a href="holidays.php?field=event&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&event_from_date=<?php echo $_smarty_tpl->tpl_vars['event_from_date']->value;?>
&event_to_date=<?php echo $_smarty_tpl->tpl_vars['event_to_date']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_event']->value;?>
">Event Title</a></th>
										<th width="200"><a href="holidays.php?field=event_date&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&event_from_date=<?php echo $_smarty_tpl->tpl_vars['event_from_date']->value;?>
&event_to_date=<?php echo $_smarty_tpl->tpl_vars['event_to_date']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_event_date']->value;?>
">Event Date</a></th>
										<th width="200"><a href="holidays.php?field=branch&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&event_from_date=<?php echo $_smarty_tpl->tpl_vars['event_from_date']->value;?>
&event_to_date=<?php echo $_smarty_tpl->tpl_vars['event_to_date']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_branch']->value;?>
">Branch</a></th>
										<th width="75"><a href="holidays.php?field=created&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&event_from_date=<?php echo $_smarty_tpl->tpl_vars['event_from_date']->value;?>
&event_to_date=<?php echo $_smarty_tpl->tpl_vars['event_to_date']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_created']->value;?>
">Created</a></th>
										<!-- th width="50" style="text-align:center">Actions</th-->
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
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['event'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['event_date'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['branch'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['created_date'];?>
</td>
										<!-- td class="actionItem" style="text-align:center">
										<a href="edit_holidays.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="btn  btn-mini"  rel="tooltip" class="sepV_a" title="Edit"><i class="icon-pencil"></i></a>
										<a id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" href="javascript:void(0)" rel="tooltip" class="btn Confirm btn-mini" value="#"  title="Delete"><i class="icon-trash"></i></a>
										</td-->
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
<input type="hidden" id="page" value="list_holidays">
<input type="hidden" id="web_root" value="delete_holidays.php">	
              </div>
            </div>
     </div>
		</div>
		</div>	
	</div>	
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
