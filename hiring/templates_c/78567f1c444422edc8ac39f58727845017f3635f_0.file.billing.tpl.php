<?php
/* Smarty version 3.1.29, created on 2017-01-31 19:27:10
  from "/var/www/html/cthiring/templates/billing.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_589097b6c74d87_21308699',
  'file_dependency' => 
  array (
    '78567f1c444422edc8ac39f58727845017f3635f' => 
    array (
      0 => '/var/www/html/cthiring/templates/billing.tpl',
      1 => 1485870447,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_589097b6c74d87_21308699 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once '/var/www/html/cthiring/vendor/smarty-3.1.29/libs/plugins/function.html_options.php';
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
                                    <a href="recruiter_dashboard.php"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="billing.php">Billings</a>
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
							<a class="notify" data-notify-time = '3000' data-notify-title="In Progress!" data-notify-message="Downloading Excel... Please wait..."  href="#">
							<input type="button" value="Export Excel" class="btn btn-warning"/></a>
							<a class="jsRedirect" data-notify-time = '3000'   href="add_billing.php">
							<input type="button" value="Create Billing" class="btn btn-info"/></a>	
						</div>
						
							<div class="alert alert-success">
								<a class="close" data-dismiss="alert">×</a>
								<strong>Success</strong> Billing created successfully!
							</div>
					<form action="#" id="formID" class="formID" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>	
							<div class="dn dataTables_filter srchBox" style="float:left;" id="dt_gal_filter">
							<label style="margin-top:18px;"><a href="billing.php" class="jsRedirect"><input value="Reset" type="button" class="btn"/></a></label>
							<label style="margin-top:18px;"><input type="submit" value="Submit" class="btn btn-gebo" /></label>
							
						
						
						<label>Employee: 
						<select name="empname" tabindex="1" class="span8" id="empname">
							<option value="">Select</option>	
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['emp_name']->value,'selected'=>$_POST['empname']),$_smarty_tpl);?>
			    			
						</select>
						</label>	
							
							
						<label>Joined Till: <input type="text" name="t_date" value="<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
" placeholder="dd/mm/yyyy" class="input-small datepick" aria-controls="dt_gal"></label>

							<label>Joined From: <input type="text" class="input-small datepick" name="f_date" placeholder="dd/mm/yyyy" value="<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
" aria-controls="dt_gal"></label>
								<label style="margin-left:0">Keyword: <input type="text" placeholder="Candidate Name or Client Name" name="data[Billing][keyword]" id = "SearchText" value="" class="input-large" aria-controls="dt_gal"></label>

														</div>

						<input type="hidden" value="1" id="SearchKeywords">
						<input type="hidden" value="#" id="webroot">
						</form>

							
							
							<table class="table table-striped table-bordered dataTable stickyTable">
								<thead>
									<tr>
										<th width="120"><a href="#sort:Position.job_title/direction:desc">Job Title</a></th>
										<th width="120"><a href="#sort:Client.client_name/direction:desc">Client Name</a></th>
										<!--th width="80"><a href="#sort:Designation.designation/direction:desc">Designation</a></th-->
										<!--th width="80"><a href="#sort:ctc_offer/direction:desc">CTC Offered</a></th-->
										<th width="100"><a href="#sort:bill_ctc/direction:desc">Billing Amount</a></th>
										<th width="80"><a href="#sort:Owner.created_date/direction:desc">Billing Date</a></th>
										<th width="120"><a href="#sort:Resume.first_name/direction:desc">Candidate Name</a></th>
										<th width="120"><a href="#sort:Resume.first_name/direction:desc">Created Date</a></th>
										<th width="80"><a href="#sort:Owner.first_name/direction:desc">Status</a></th>
										<th width="70"><a href="#sort:Owner.first_name/direction:desc">Pending</a></th>
										<!--th width="70"><a href="#sort:joined_on/direction:asc" class="desc">Joined Date</a></th-->
										<!--th width="50" style="text-align:center">Actions</th-->

									</tr>
								</thead>
								<tbody>	
									<tr>
										<td><a  href="view_billing.php">Senior Engineer / Assistant Manager - Testing</a></td>
										<td>Salcomp Manufacturing India Pvt Ltd</td>
										<td>56644.00</td>
										<td>12-June-2016</td>
										<td>R Saravanan</td>
										<td>12-June-2016</td>
										<td><span class="label label-success" rel="tooltip" title="Ranjeet (22nd, Dec, 04:15 pm, Approved)">L1 - A</span>
										<span class="label" rel="tooltip" title="Karthikeyan (Pending)">L2 - P</span>
										</td>
										<td>24 hours</td>				
									</tr>						
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
