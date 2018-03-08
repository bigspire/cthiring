<?php
/* Smarty version 3.1.29, created on 2018-03-08 14:20:24
  from "C:\xampp\htdocs\2017\ctsvn2\cthiring\hiring\templates\mailbox.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5aa0f950596190_12240142',
  'file_dependency' => 
  array (
    '44835e4c23781b0517fa0fd1e1097ce5205f95ff' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn2\\cthiring\\hiring\\templates\\mailbox.tpl',
      1 => 1518689731,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5aa0f950596190_12240142 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\2017\\ctsvn2\\cthiring\\hiring\\vendor\\smarty-3.1.29\\libs\\plugins\\function.html_options.php';
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
                                    <a href="mailbox.php">Mail Box</a>
                                </li>                          
                                <li>
                                    Sent Items
                                </li>
                            </ul>
                        </div>
                    </nav>

						<div class="srch_buttons">
								<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>
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
						
						<?php if ($_smarty_tpl->tpl_vars['keyword']->value || $_smarty_tpl->tpl_vars['f_date']->value || $_smarty_tpl->tpl_vars['t_date']->value || $_smarty_tpl->tpl_vars['type']->value) {?>
						  <?php $_smarty_tpl->tpl_vars['hide'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'hide', 0);?>
						<?php } else { ?>
							<?php $_smarty_tpl->tpl_vars['hide'] = new Smarty_Variable('dn', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'hide', 0);?>
						<?php }?>
							<form action="" id="formID" name="searchFrm" class="formID" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
							<div class="<?php echo $_smarty_tpl->tpl_vars['hide']->value;?>
 dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							
								<label style="margin-left:0;">Keyword: <input type="text" placeholder="Candidate Name or Client Name" name="keyword" id="keyword" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" class="input-large" aria-controls="dt_gal"></label>
								
								<span id="sandbox-container">
						<span  class="input-daterange" id="datepicker">	
						<label>From: <input type="text" class="input-small datepick" name="f_date" placeholder="dd/mm/yyyy" style="width:70px;"  value="<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
" aria-controls="dt_gal"></label>
						<label>Till: <input type="text" name="t_date" placeholder="dd/mm/yyyy" value="<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
" style="width:70px;"  class="input-small datepick" aria-controls="dt_gal"></label>						
						</span></span>
						<label>Type: 
						<select name="type" class="input-xlarge" placeholder="" style="clear:left" id="InterviewEmpId">
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['mail_type']->value,'selected'=>$_smarty_tpl->tpl_vars['type']->value),$_smarty_tpl);?>

						</option>
						</select> 
						</label>
								<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>					
							<label style="margin-top:18px;"><a href="mailbox.php" class="jsRedirect"><input value="Reset" type="button" class="btn"/></a></label>
							
							</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="#" id="webroot">
						</form>

							
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="100"><a href="mailbox.php?field=to&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_to']->value;?>
">To</a></th>
										<th width="150"><a href="mailbox.php?field=subject&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_subject']->value;?>
">Subject</a></th>
										<th width="300"><a href="mailbox.php?field=message&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_message']->value;?>
">Message</a></th>
										<th width="300"><a href="mailbox.php?field=type&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_type']->value;?>
">Type</a></th>
										<th width="90"><a href="mailbox.php?field=date&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_date']->value;?>
">Sent Date</a></th>
										<th width="100"><a href="mailbox.php?field=created_by&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_created_by']->value;?>
">Sent by</a></th>
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
										<td><?php if ($_smarty_tpl->tpl_vars['item']->value['mail_type'] == 'C') {
echo $_smarty_tpl->tpl_vars['item']->value['company_name'];?>
, (<?php echo $_smarty_tpl->tpl_vars['item']->value['client_name'];?>
), (<?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
)<?php } else {
echo $_smarty_tpl->tpl_vars['item']->value['candidate_name'];?>
, (<?php echo $_smarty_tpl->tpl_vars['item']->value['email_id'];?>
)<?php }?></td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['subject'];?>
</td>
										<td><a href="view_mailbox.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['message'];?>
</a></td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['template'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['created_date'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['employee'];?>
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
<input type="hidden" id="page" value="mail_box">
              </div>
            </div>
     </div>
		</div>
		</div>	
	</div>	
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
