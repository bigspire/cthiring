<?php
/* Smarty version 3.1.29, created on 2017-01-31 16:37:01
  from "/var/www/html/cthiring/templates/view_billing.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58906fd5479459_40547369',
  'file_dependency' => 
  array (
    '26f0d1e914b5c7cd31e8d29f75c55cb3ec85cd65' => 
    array (
      0 => '/var/www/html/cthiring/templates/view_billing.tpl',
      1 => 1485860410,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_58906fd5479459_40547369 ($_smarty_tpl) {
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
                                    <a href="recruiter_dashboard.php"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="billing.php"> Billing</a>
                                </li>
                            
                                <li>
                                  Basavaraj
                                </li>
                            </ul>
                        </div>
                    </nav>
							
		<div class="box">
		<div class="row-fluid">
		<div class="span12">
		<div class="mbox">
			<div class="tabbable">
								<div class="heading">
										<ul class="nav nav-tabs">
										<li class="active"><a class="restabChange" rel="interview"  href="#mbox_billing" data-toggle="tab"><i class="splashy-mail_light_down"></i> Billing Details </a></li>
										<li class=""><a class="restabChange" rel="interview"  href="#mbox_co-ordination" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Co-ordination </a></li>
									</ul>
								</div>
			<div class="tab-content" style="overflow:visible">			
			<div class="tab-pane active" id="mbox_billing">
			<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="">
								<tbody>
									<tr>
										<td width="120" class="tbl_column">Candidate Name </td>
										<td>Basavaraj </td>
									</tr>
									
									<tr>
										<td width="" class="tbl_column">Position  </td>
										<td>Electrical Engineer(Group Leader)</td>
									</tr>
									<tr>
										<td width="" class="tbl_column">Client Name </td>
										<td>BSH Household Appliances Manufacturing Pvt. Ltd</td>
									</tr>	
									<!-- <tr>
										<td width="" class="tbl_column">Designation </td>
										<td>Team Leader</td>
									</tr>	 -->
									<tr>
										<td width="" class="tbl_column">CTC Offered </td>
										<td>680000.00</td>
									</tr>	
								</tbody>
							</table>
				</div>
							
				<div class="span6">
							<table class="table table-striped table-bordered dataTable" style="">
								<tbody>
								<tr>
									<td class="tbl_column">Billing Amount</td>
									<td>291550.00</td>
								</tr>	
									
								<tr>
									<td class="tbl_column">Billing Date </td>
									<td>08-Sep-2016</td>
								</tr>	
									
								<!-- <tr>
									<td  class="tbl_column" width="120">Created By </td>
									<td>Bhargavi</td>
								</tr> -->
								<tr>
										<td width="120" class="tbl_column">Joined Date </td>
										<td>08-Sep-2016</td>
									</tr>
								</tbody>
							</table>
					</div>
              </div> 
              <div class="tab-pane" id="mbox_co-ordination">	
					<div class="span12">      
							<table class="table table-striped table-bordered dataTable" style="">
								<tbody>
								<tr>
									<td class="tbl_column">Profile Sourcing </td>
									<td>Bhargavi</td>
								</tr>	
									
								<tr>
									<td class="tbl_column">Client Coordination </td>
									<td>Bhargavi</td>
								</tr>	
									
								<tr>
									<td  class="tbl_column" width="120">Candidate Coordination  </td>
									<td>Lavanya Venkateshappa</td>
								</tr>
								</tbody>
							</table>
					</div>  
					</div>
					</div>
					</div>  
					</div>
					</div>
					</div>
					</div>
						<div class="form-actions">
								<a href="billing.php" class="jsRedirect"><button class="btn">Back</button></a>
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
