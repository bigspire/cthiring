<?php
/* Smarty version 3.1.29, created on 2017-06-15 11:31:22
  from "F:\xampp\htdocs\ctsvn\cthiring\hiring\templates\mailbox.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_594222b24b2a66_52252326',
  'file_dependency' => 
  array (
    '14963ac291e4dfc5003c8fb64595c8fcd9032e28' => 
    array (
      0 => 'F:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\templates\\mailbox.tpl',
      1 => 1488805780,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_594222b24b2a66_52252326 ($_smarty_tpl) {
?>

   
			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	

			 <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
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
					
					
					
                    
                    <div class="row-fluid">
						<div class="span12">
							<div class="mbox">
								<div class="tabbable">
									<div class="heading">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#mbox_sent" data-toggle="tab"><i class="splashy-mail_light_up"></i> Sent</a></li>
											<li><a href="#mbox_trash" data-toggle="tab"><i class="icon-adt_trash"></i> Trash</a></li>
										</ul>
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="mbox_sent">
											<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_outbox">
												<thead>
													<tr>
														<th class="table_checkbox"><input type="checkbox" data-tableid="dt_outbox" class="select_msgs" name="select_msgs"></th>
														<th><i class="splashy-star_empty"></i></th>
														<th><i class="splashy-mail_light"></i></th>
														<th>To</th>
														<th>Subject</th>
														<th>Message</th>
														<th>Date</th>
														<th><i class="icon-adt_atach"></i></th>
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
														<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
														<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
														<td><i class="splashy-mail_light_right"></i></td>
														<td><span><?php echo $_smarty_tpl->tpl_vars['item']->value['email_id'];?>
</span></td>
														<td><?php echo $_smarty_tpl->tpl_vars['item']->value['subject'];?>
</td>
														<td><a href="#msg_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['message'];?>
</a></td>
														<td><?php echo $_smarty_tpl->tpl_vars['item']->value['created_date'];?>
</td>
														<?php if ($_smarty_tpl->tpl_vars['item']->value['attachment']) {?>
														<td><i class="icon-adt_atach"></i></td>
														<?php } else { ?>
														<td></td>
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
										
										<div id="msg_view" class="tab-pane">
											<div class="doc_view">
												<div class="doc_view_header">
													<dl class="dl-horizontal">
														<dt>Subject</dt>
															<dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</dd>
														<dt>Sender</dt>
															<dd><span>email1@example.com</span></dd>
														<dt>Recipient</dt>
															<dd><span>johnsmith@example.com</span></dd>
														<dt>Date</dt>
															<dd>20 June 2012 12:32:25</dd>
														<dt><i class="icon-adt_atach"></i></dt>
															<dd><a href="javascript:void(0)">image01.jpg</a>, <a href="javascript:void(0)">image02.jpg</a>, <a href="javascript:void(0)">document.pdf</a></dd>
													</dl>
												</div>
												<div class="doc_view_content">
													Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse iaculis consectetur feugiat. Cras lacinia ullamcorper mauris, a tincidunt lacus malesuada non. Mauris ut mi ut augue vehicula suscipit. Suspendisse lobortis tempor urna, ut feugiat mauris pretium sed. Aliquam eget dolor eget dolor euismod feugiat eu et augue. Sed metus metus, condimentum quis vulputate et, pretium eu tortor. Maecenas felis felis, dignissim at pretium sit amet, condimentum a libero. Nam laoreet semper tortor sed fermentum. Duis eleifend tortor sed justo venenatis aliquam.
													Curabitur augue elit, mattis eu ornare eget, varius sed metus. Cras fringilla fermentum malesuada. Nulla consectetur sollicitudin nibh, iaculis sagittis diam placerat ac. Aenean molestie vestibulum mattis. Suspendisse elementum, tellus quis mattis adipiscing, dui mauris pulvinar mauris, et rhoncus nisi turpis sit amet turpis. Duis nunc nisl, ullamcorper quis ultricies quis, suscipit non dui. Etiam id urna massa, at pharetra velit. Ut tortor mi, vestibulum id imperdiet a, consectetur vel lorem.
													Maecenas eget velit pharetra tellus placerat condimentum at vel sapien. Suspendisse ac urna turpis, eget lobortis purus. Ut id arcu et nulla accumsan semper. In lacinia vestibulum nulla ac pellentesque. Nullam mattis ante ornare est tincidunt placerat. Donec non feugiat felis. Sed felis lacus, molestie in luctus vel, tempor a dui. Aliquam erat volutpat. Morbi laoreet gravida sagittis. Nulla tempor ipsum vitae tortor suscipit facilisis et at ligula. Ut lobortis, mauris vel faucibus condimentum, metus nulla varius odio, sed accumsan lorem elit sed mi. Nunc venenatis orci vel erat tincidunt quis tincidunt erat tempus. Cras vel sapien sed enim viverra egestas nec id orci. Nulla nec ornare ante. Donec tristique iaculis nunc in fringilla.
												</div>
												<div class="doc_view_footer clearfix">
													<div class="btn-group pull-left">
														<a class="btn" href="javascript:void(0)"><i class="icon-pencil"></i> Answer</a>
														<a class="btn" href="javascript:void(0)"><i class="icon-share-alt"></i> Forward</a>
														<a class="btn" href="#"><i class="icon-trash"></i> Delete</a>
													</div>
													<div class="pull-right">
														Size: 240 KB
													</div>
												</div>
											</div>
											<ul class="pager">
												<li class="previous">
													<a href="#"><i class="icon-chevron-left"></i> Previous</a>
												</li>
												<li class="next">
													<a href="#">Next <i class="icon-chevron-right"></i></a>
												</li>
											</ul>
										</div>
										
										<div class="tab-pane" id="mbox_trash">
											<table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_trash2">
												<thead>
													<tr>
														<th class="table_checkbox">
														<input type="checkbox" class="select_msgs" name="select_msgs"></th>
														<th>To</th>
														<th>Subject</th>
														<th>Message</th>
														<th>Date</th>
													</tr>
												</thead>
												<!--tbody>
													<?php
$_from = $_smarty_tpl->tpl_vars['data1']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_1_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$__foreach_item_1_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_1_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>	
													<tr>
														<td class="nohref"><input type="checkbox" class="select_msg" name="msg_sel"></td>
														<td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
														<td><i class="splashy-mail_light_right"></i></td>
														<td><span><?php echo $_smarty_tpl->tpl_vars['item']->value['email_id'];?>
</span></td>
														<td><?php echo $_smarty_tpl->tpl_vars['item']->value['subject'];?>
</td>
														<td><a href="#msg_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['message'];?>
</a></td>
														<td><?php echo $_smarty_tpl->tpl_vars['item']->value['deleted_date'];?>
</td>
														<?php if ($_smarty_tpl->tpl_vars['item']->value['attachment']) {?>
														<td><i class="icon-adt_atach"></i></td>
														<?php } else { ?>
														<td></td>
														<?php }?>
													</tr>
													<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_1_saved_local_item;
}
if ($__foreach_item_1_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_1_saved_item;
}
if ($__foreach_item_1_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_item_1_saved_key;
}
?>
												</tbody-->
											</table>
											
					
	
	
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
					<!-- hide elements -->
					<div class="hide">
						<!-- actions for inbox -->
						<div class="dt_inbox_actions">
							<div class="btn-group">
								<a href="javascript:void(0)" class="btn" title="Answer"><i class="icon-pencil"></i></a>
								<a href="javascript:void(0)" class="btn" title="Forward"><i class="icon-share-alt"></i></a>
								<a href="#" class="delete_msg btn" title="Delete" data-tableid="dt_inbox"><i class="icon-trash"></i></a>
							</div>
						</div>
						<!-- actions for outbox -->
						<div class="dt_outbox_actions">
							<div class="btn-group">
								<!--<a href="javascript:void(0)" class="btn" title="Resend"><i class="icon-share-alt"></i></a>-->
								<a href="#" class="delete_msg btn" title="Delete" data-tableid="dt_outbox"><i class="icon-trash"></i></a>
							</div>
						</div>
			
						<!-- confirmation box -->
						<div id="confirm_dialog" class="cbox_content">
							<div class="sepH_c tac"><strong>Are you sure you want to delete this message(s)?</strong></div>
							<div class="tac">
								<a href="#" class="btn btn-gebo confirm_yes">Yes</a>
								<a href="#" class="btn confirm_no">No</a>
							</div>
						</div>
					</div>
                        
                </div>
            </div> 
		</div>
		</div>	
	</div>	
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
<?php echo '<script'; ?>
 type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" language="javascript" src="js/jquery.dataTables.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript" language="javascript">
$(document).ready(function(){
	$('#dt_trash2').DataTable({
		"processing": true,
        "serverSide": true,
		"ajax": "server_mail_box.php"
	} );
});
<?php echo '</script'; ?>
>
<?php }
}
