<?php
/* Smarty version 3.1.29, created on 2017-07-01 12:59:09
  from "C:\xampp\htdocs\2017\ctsvn\cthiring\hiring\templates\view_approve_billing.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59574f45a46720_27570198',
  'file_dependency' => 
  array (
    '03eb38f6bdaf65313ed8bda15690c0e713d45b36' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\templates\\view_approve_billing.tpl',
      1 => 1497270582,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_59574f45a46720_27570198 ($_smarty_tpl) {
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
                                  Basavaraj
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
										<li class="active"><a class="restabChange" rel="interview"  href="#mbox_billing" data-toggle="tab"><i class="splashy-mail_light_down"></i>   Billing Details </a></li>
										<li class=""><a class="restabChange" rel="interview"  href="#mbox_co-ordination" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Co-ordination </a></li>
									</ul>
								</div>
			<div class="tab-content" style="overflow:visible">			
			<div class="tab-pane active" id="mbox_billing">
				<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="">
								<tbody>
									<tr>
										<td width="120" class="tbl_column">Employee Name </td>
										<td><?php echo ucwords($_smarty_tpl->tpl_vars['employee_name']->value);?>
 </td>
									</tr>
									<tr>
										<td width="120" class="tbl_column">Candidate Name </td>
										<td><?php echo ucwords($_smarty_tpl->tpl_vars['candidate_name']->value);?>
 </td>
									</tr>
									
									<tr>
										<td width="" class="tbl_column">Position  </td>
										<td><?php echo ucwords($_smarty_tpl->tpl_vars['position']->value);?>
</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Client Name </td>
										<td><?php echo ucwords($_smarty_tpl->tpl_vars['client_name']->value);?>
</td>
									</tr>	
								</tbody>
							</table>
				</div>
							
				<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="">
								<tbody>
								<tr>
									<td width="" class="tbl_column">CTC Offered </td>
									<td><?php echo $_smarty_tpl->tpl_vars['ctc_offer']->value;?>
</td>
								</tr>	
								<tr>
									<td class="tbl_column">Billing Amount</td>
									<td><?php echo $_smarty_tpl->tpl_vars['billing_amount']->value;?>
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
                 <div class="tab-pane" id="mbox_co-ordination">	
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
              <div class="span12" style="margin-top:5px;margin-left:0px;"> 
					<div class="span6">      
							<table class="table table-striped table-bordered dataTable" style="">
							<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Employee <span class="f_req"></span></td>
										<td><?php echo ucwords($_smarty_tpl->tpl_vars['item']->value['employee']);?>
</td>	
									</tr>	
									
									<tr>
									<td width="120" class="tbl_column">Value (% of work)<span class="f_req"></span></td>
									<td> <?php echo $_smarty_tpl->tpl_vars['item']->value['percent'];?>
</td>	
									</tr>		
																	
								</tbody>
							</table>
					</div> 
					<div class="span6">      
							<table class="table table-striped table-bordered dataTable" style="">
							<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Co-ordination Type <span class="f_req"></span></td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</td>	
									</tr>									
								</tbody>
							</table>
					</div>
					</div>
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
