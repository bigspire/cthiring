<?php
/* Smarty version 3.1.29, created on 2017-06-22 13:58:37
  from "C:\xampp\htdocs\2017\ctsvn\cthiring\hiring\templates\interview.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_594b7fb5281779_38187554',
  'file_dependency' => 
  array (
    'f6a289244f814d0ad89821cb8c5c16d091402940' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\templates\\interview.tpl',
      1 => 1498120051,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_594b7fb5281779_38187554 ($_smarty_tpl) {
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
                                    <a href="interview.php">Interviews</a>
                                </li>
                            
                                <li>
                                   Search Interview
                                </li>
                            </ul>
                        </div>
                    </nav>

								<div class="srch_buttons">
								<a class="jsRedirect toggleSearch"  href="javascript:void(0)">
							<input type="button" value="Search" class="btn btn-success"/></a>
							<?php if (!$_smarty_tpl->tpl_vars['ALERT_MSG']->value) {?>
							<a href="interview.php?action=export&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>

								&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&branch=<?php echo $_smarty_tpl->tpl_vars['branch']->value;?>
&current_status=<?php echo $_smarty_tpl->tpl_vars['current_status']->value;?>
">
							<button type="button" val="interview.php?action=export&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>

								&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&branch=<?php echo $_smarty_tpl->tpl_vars['branch']->value;?>
&current_status=<?php echo $_smarty_tpl->tpl_vars['current_status']->value;?>
" name="export" class="jsRedirect btn btn-warning" >Export</button></a></a>							
							<?php }?>
							</div>

							<?php if ($_smarty_tpl->tpl_vars['ALERT_MSG']->value) {?>
							<div class="alert alert-success">
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
						
						<?php if ($_smarty_tpl->tpl_vars['keyword']->value || $_smarty_tpl->tpl_vars['employee']->value || $_smarty_tpl->tpl_vars['branch']->value || $_smarty_tpl->tpl_vars['current_status']->value || $_smarty_tpl->tpl_vars['f_date']->value || $_smarty_tpl->tpl_vars['t_date']->value) {?>
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
						
						<label style="margin-left:0;">Keyword: <input type="text" placeholder="Search Here..." name="keyword" id = "keyword" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" class="input-medium" aria-controls="dt_gal"></label>
						
						<span id="sandbox-container">
						<span  class="input-daterange" id="datepicker">	
						<label>From Date: <input type="text" class="input-small datepick" name="f_date" placeholder="dd/mm/yyyy" style="width:70px;"  value="<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
" aria-controls="dt_gal"></label>
						<label>To Date: <input type="text" name="t_date" placeholder="dd/mm/yyyy" value="<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
" style="width:70px;"  class="input-small datepick" aria-controls="dt_gal"></label>						
						</span></span>
						
						<label>Employee: 
						<select name="employee" class="input-medium" placeholder="" style="clear:left" id="InterviewEmpId">
						<option value="">Select</option>
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['emp_name']->value,'selected'=>$_smarty_tpl->tpl_vars['employee']->value),$_smarty_tpl);?>

						</option>
						</select> 
						</label>
						<label>Branch: 
							<select name="branch" class="input-medium" placeholder="" style="clear:left" id="ResumeLoc">
						<option value="">Select</option>
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['branch_name']->value,'selected'=>$_smarty_tpl->tpl_vars['branch']->value),$_smarty_tpl);?>

							</select> 
						</label>
						<label>Current Status: 
						<select name="current_status" class="input-medium" placeholder="" style="clear:left" id="InterviewStatus">
						<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['status_type']->value,'selected'=>$_smarty_tpl->tpl_vars['current_status']->value),$_smarty_tpl);?>

						</select> 
						</label>						
						<label style="margin-top:18px;">
							<a class="jsRedirect" href="interview.php"><input value="Reset" type="button" class="btn"/></a></label>
							<label style="margin-top:18px;">
							<input type="submit" value="Submit" class="btn btn-gebo" /></label>				
					</div>
<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="interview/" id="webroot">
						</form>
						
						<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="120"><a href="interview.php?field=candidate_name&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
&branch=<?php echo $_smarty_tpl->tpl_vars['branch']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_candidate_name']->value;?>
">Candidate Name</a></th>
										<th width="150"><a href="interview.php?field=position&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
&branch=<?php echo $_smarty_tpl->tpl_vars['branch']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_position']->value;?>
">Position</a></th>
										<th width="120"><a href="interview.php?field=company&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
&branch=<?php echo $_smarty_tpl->tpl_vars['branch']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_company']->value;?>
">Company</a></th>
										<th width="60"><a href="interview.php?field=interview_date&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
&branch=<?php echo $_smarty_tpl->tpl_vars['branch']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_interview_date']->value;?>
">Interview Date</a></th>
										<th width="50"><a href="interview.php?field=stage&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
&branch=<?php echo $_smarty_tpl->tpl_vars['branch']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_stage']->value;?>
">Stage</a></th>
										<th width="50"><a href="interview.php?field=current_status&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
&branch=<?php echo $_smarty_tpl->tpl_vars['branch']->value;?>
&current_status=<?php echo $_smarty_tpl->tpl_vars['current_status']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_current_status']->value;?>
">Status</a></th>
										<th width="90"><a href="interview.php?field=created_by&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
&branch=<?php echo $_smarty_tpl->tpl_vars['branch']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
" rel="tooltip" data-original-title="Sort by Ascending or Descending" class="<?php echo $_smarty_tpl->tpl_vars['sort_field_created_by']->value;?>
">Created By</a></th>
										<th width="50"><a href="interview.php?field=created_date&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
&employee=<?php echo $_smarty_tpl->tpl_vars['employee']->value;?>
&branch=<?php echo $_smarty_tpl->tpl_vars['branch']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
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
										<td><a href="view_interview.php?resume_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['resume_id'];?>
&req_res_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['req_resume_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['candidate_name'];?>
</a></td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['position'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['company'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['interview_date'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['stage'];?>
</td>
										<td><span class="label label-<?php echo $_smarty_tpl->tpl_vars['item']->value['status_cls'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</span></td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['created_by'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['item']->value['created_date'];?>
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
<input type="hidden" id="page" value="list_interview">
              </div>
            </div>
     </div>
		</div>
		</div>	
	</div>	
		
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
