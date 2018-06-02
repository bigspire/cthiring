<?php
/* Smarty version 3.1.29, created on 2018-05-31 16:11:56
  from "C:\xampp\htdocs\ctsvn\cthiring\hiring\templates\include\sidebar.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5b0fd1749ee936_82223452',
  'file_dependency' => 
  array (
    '0efa3a79f2611cbccf18098a269a971b9bb43a1e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\templates\\include\\sidebar.tpl',
      1 => 1527594947,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b0fd1749ee936_82223452 ($_smarty_tpl) {
?>

<style>
.main_content {
    padding: 64px 30px 30px;
    background: #fff;
    border-left: 1px solid transparent;
    margin-left: 240px;
}
.antiscroll-inner {
     overflow-y: hidden; 
}
.sidebar {
    top: 32px;
   
}
.sidebar .accordion-heading{
background:#f2f2f2
}
.main_content {
    padding: 50px 30px 30px;
}
#ctc_wise{cursor: grab}
</style>


	<!-- sidebar -->
            <div class="sidebar">
				
				
				
				<div class="antiScroll">
					<div class="antiscroll-inner">
						<div class="antiscroll-content">
					
							<div class="sidebar_inner">
								
								<div id="side_accordion" class="accordion">
									
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-th"></i> Openings Handled
											</a>
										</div>
										<div class="accordion-body collapse in" id="collapseOne">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li  class="<?php echo $_smarty_tpl->tpl_vars['1a']->value;?>
"><a href="openings_handled_1a.php">Monthly Openings (CTC)</a></li>
													<li class="<?php echo $_smarty_tpl->tpl_vars['1b']->value;?>
"><a href="openings_handled_1b.php">Client Openings (CTC)</a></li>
													<li class="<?php echo $_smarty_tpl->tpl_vars['1c']->value;?>
"><a href="openings_handled_1c.php">Client Openings (Month)</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-file"></i> CV Status
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseTwo">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="javascript:void(0)">CTC Wise CV Status</a></li>
													<li><a href="javascript:void(0)">Client Wise CV Status</a></li>
													<li><a href="javascript:void(0)">Month Wise CV Status</a></li>
													
												</ul>
											</div>
										</div>
									</div>
									
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-time"></i> TAKT Time
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseThree">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="javascript:void(0)">CTC Wise Average TAKT Time</a></li>
													
												</ul>
												
											</div>
										</div>
									</div>
									
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapse4" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-thumbs-up"></i> Productivity
											</a>
										</div>
										<div class="accordion-body collapse" id="collapse4">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="javascript:void(0)">Employee Productivity</a></li>
													
												</ul>
											</div>
										</div>
									</div>
									
										<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapse5" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-share"></i> Business Conversion
											</a>
										</div>
										<div class="accordion-body collapse" id="collapse5">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="javascript:void(0)">Employee Business Conversion</a></li>
													<li><a href="javascript:void(0)">Client Business Conversion</a></li>
													
												</ul>
												
											</div>
										</div>
									</div>
									
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapse6" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												
												<i class="icon-barcode"></i>								
												
												Billing & Contribution	
												
											</a>
										</div>
										<div class="accordion-body collapse" id="collapse6">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="javascript:void(0)">Client Wise Billing</a></li>
													<li><a href="javascript:void(0)">Recruiter Wise Billing</a></li>
													<li><a href="javascript:void(0)">Individual Contribution</a></li>
												</ul>
												
											</div>
										</div>
									</div>
									
									
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapse7" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-gift"></i> Incentive	
											</a>
										</div>
										<div class="accordion-body collapse" id="collapse7">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="javascript:void(0)">Recruiter Incentive Earning</a></li>
													<li><a href="javascript:void(0)">CRM Incentive Earning</a></li>
												</ul>
												
											</div>
										</div>
									</div>
									
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapse8" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-user"></i> Client Retention	
											</a>
										</div>
										<div class="accordion-body collapse" id="collapse8">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="javascript:void(0)">Location Wise Active Clients</a></li>
													<li><a href="javascript:void(0)">Business Continuity</a></li>
													<li><a href="javascript:void(0)">Client Retention</a></li>
												</ul>
												
											</div>
										</div>
									</div>
									
									
										<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapse9" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-search"></i> Root Cause Analysis
											</a>
										</div>
										<div class="accordion-body collapse" id="collapse9">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="javascript:void(0)">CV Rejection Analysis</a></li>
													<li><a href="javascript:void(0)">Position Rejection Analysis</a></li>
												</ul>
												
											</div>
										</div>
									</div>
									
									
										<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapse10" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-tags"></i> Cash Flow Management
											</a>
										</div>
										<div class="accordion-body collapse" id="collapse10">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="javascript:void(0)">Collection Days</a></li>
												</ul>
												
											</div>
										</div>
									</div>
									
										<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapse11" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-remove"></i> Bad Debts
											</a>
										</div>
										<div class="accordion-body collapse" id="collapse11">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="javascript:void(0)">Recuiter Wise</a></li>
													<li><a href="javascript:void(0)">Client Wise</a></li>
												</ul>
												
											</div>
										</div>
									</div>
									
									
								</div>
								
								<div class="push"></div>
							</div>
							   
						
						</div>
					</div>
				</div>
			
			</div>
            <?php }
}
