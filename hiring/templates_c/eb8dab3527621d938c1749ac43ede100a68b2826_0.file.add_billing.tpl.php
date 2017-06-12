<?php
/* Smarty version 3.1.29, created on 2017-02-02 14:06:42
  from "/var/www/html/cthiring/templates/add_billing.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5892ef9a501c94_76258053',
  'file_dependency' => 
  array (
    'eb8dab3527621d938c1749ac43ede100a68b2826' => 
    array (
      0 => '/var/www/html/cthiring/templates/add_billing.tpl',
      1 => 1486024575,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5892ef9a501c94_76258053 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once '/var/www/html/cthiring/vendor/smarty-3.1.29/libs/plugins/function.html_options.php';
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
                                    <a href="billing.php">Billing</a>
                                </li>
                            
                                <li>
                                   Add Billing
                                </li>
                            </ul>
                        </div>
                    </nav>
				
<form action="add_billing.php" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<!--<div class="box-title mb5">
			<h4><i class="icon-list"></i> Billing Details </h4>
		</div>-->
		<div class="row-fluid">
		<div class="span12">
		<div class="mbox">
			<div class="tabbable">
								<div class="heading">
										<ul class="nav nav-tabs">									
										<li class="active"><a class="restabChange" id="bill" rel="interview"  href="#mbox_billing" data-toggle="tab"><i class="splashy-mail_light_down"></i>   Billing Details </a></li>
										<li class=""><a class="restabChange" id="coordination" rel="interview"  href="#mbox_co-ordination" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Co-ordination </a></li>
									</ul>
								</div>
			<div class="tab-content" style="overflow:visible">			
			<div class="tab-pane active" id="mbox_billing">
			<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Candidate Name <span class="f_req">*</span></td>
													
										<td>
										<input type="text" placeholder="Search Here..." name="keyword" id = "SearchText" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" class="span10 candidate_name" aria-controls="dt_gal">
										<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['resume_id']->value;?>
" name="resume_id">
										<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['created_by']->value;?>
" name="created_by">
										<input type="hidden" id="page" value="add_billing_candidate_search">
										<input type="hidden" value="1" id="SearchKeywords">
										<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['keywordErr']->value;?>
</label>
										</td>	
									</tr>
									
									
									<tr>
										<td width="120" class="tbl_column">Position <span class="f_req">*</span></td>
										<td>
									<label><?php echo $_smarty_tpl->tpl_vars['position']->value;?>
</label>							
									</td>
									</tr>	
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Client Name <span class="f_req">*</span></td>
										<td>
									<label><?php echo $_smarty_tpl->tpl_vars['client']->value;?>
</label>							
									</td>
									</tr>		
									<tr>
									
									<tr>
										<td width="120" class="tbl_column">CTC Offered <span class="f_req">*</span></td>
										<td> 
										<label><?php echo $_smarty_tpl->tpl_vars['ctc_offer']->value;?>
</label>
										</td>
									</tr>										
								</tbody>
							</table>
						</div>
							
						<div class="span6">		
							<table class="table table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
							
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Billing Amount <span class="f_req">*</span></td>
										<td> 
										<label><?php echo $_smarty_tpl->tpl_vars['billing_amount']->value;?>
</label>
										</td>
									</tr>
									<tr>
										<td width="120" class="tbl_column">Billing Date <span class="f_req">*</span></td>
										<td> 
										<label><?php echo $_smarty_tpl->tpl_vars['billing_date']->value;?>
</label>										
										</td>
									</tr>
													
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Joined Date <span class="f_req">*</span></td>
										<td> 
										<label><?php echo $_smarty_tpl->tpl_vars['joined_date']->value;?>
</label>										
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						</div>
						
						<div class="tab-pane" id="mbox_co-ordination">	
					   <div id="sheepItForm">
 					 	<!-- Form template-->
  						<div id="sheepItForm_template" class="" style="clear:left;">
						<div class="span6">
						<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Employee <span class="f_req">*</span></td>
													
										<td>
										<select name="empname_#index#" tabindex="1" class="span8" id="empname_#index#">
										<option value="">Select</option>	
											<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['emp_name']->value,'selected'=>$_smarty_tpl->tpl_vars['empname']->value),$_smarty_tpl);?>
			    			
										</select>

										<label for="reg_city" generated="true" class="error" id="empname_Err_#index#"></label>
										</td>	
									</tr>	
									
									<tr>
									<td width="120" class="tbl_column">Value (% of work)<span class="f_req">*</span></td>
									<td>										
										<input type="text" tabindex="7" name="percent_#index#" id="percent_#index#" value="<?php echo $_smarty_tpl->tpl_vars['percent']->value;?>
" class="span8" autocomplete="off">
										<label for="reg_city" generated="true" class="error" id="percent_Err_#index#"></label>					
									</td>	
									</tr>		
																	
								</tbody>
							</table>
						</div>
						<div class="span6">		
							<table class="table table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
							
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Co-ordination Type <span class="f_req">*</span></td>
										<td> 
										<select name="type_#index#" class="span8" tabindex="1" id="type_#index#">
										<option value="">Select</option>	
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['type_name']->value,'selected'=>$_POST['type']),$_smarty_tpl);?>
								
										</select>	
										<label for="reg_city" generated="true" class="error" id="type_Err_#index#"></label>																	
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>
							
<div style="float: left;    clear: left;    margin-top: 5px;    margin-bottom: 5px;">										
<button type="button" id="sheepItForm_remove_current" >
<a><span>Remove</span></a></button>
</div>
</div>
 <!-- /Form template-->
   
<!-- No forms template -->
<div id="sheepItForm_noforms_template">No data</div>
<!-- /No forms template-->

<!-- Controls -->
<div id="sheepItForm_controls">
   <span id="sheepItForm_add" style="float:right;margin-top:5px;">
   	<button type="button"><a><span>Add Another</span></a></button>
   </span>
</div>
  <!-- /Controls -->
</div>
		</div>
		</div>
		</div>
		</div>
</div>
</div>
<input type="hidden" id="billing_count" name="billing_count" value="<?php echo $_smarty_tpl->tpl_vars['billingCount']->value;?>
">
					 <div class="form-actions">
									<button class="btn btn-gebo" type="submit">Submit</button>
									<input type="button" value="Cancel" class="btn" onclick="window.location='billing.php'">
					 </div>
					</form>
               

			   </div>
            </div> 
		</div>
		</div>
		</div>
		</div>
	</div>
	
<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < $_POST['billing_count']) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < $_POST['billing_count']; $_smarty_tpl->tpl_vars['i']->value++) {
?>
		<input type="hidden" id="empnameData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="empnameData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['empnameData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="percentData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="percentData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['percentData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		<input type="hidden" id="typeData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="typeData_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['typeData']->value[$_smarty_tpl->tpl_vars['i']->value];?>
">
		
		<input type="hidden" id="empname_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['billingErr']->value[$_smarty_tpl->tpl_vars['i']->value]['empnameErr'];?>
">
		<input type="hidden" id="percent_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['billingErr']->value[$_smarty_tpl->tpl_vars['i']->value]['percentErr'];?>
">
		<input type="hidden" id="type_Err_Data_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"  value="<?php echo $_smarty_tpl->tpl_vars['billingErr']->value[$_smarty_tpl->tpl_vars['i']->value]['typeErr'];?>
">

<?php }
}
?>
		
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
 type="text/javascript">	
$(document).ready(function(){
   var sheepAdd = {};
	if($('#sheepItForm').length > 0){ 
	var sheepAdd = $('#sheepItForm').sheepIt({
		   separator: '',
		   allowRemoveLast: true,
		   allowRemoveCurrent: true,
		   allowRemoveAll: true,
		   allowAdd: true,
		   allowAddN: true,
		   maxFormsCount: 10,
		   minFormsCount: 1,
		   iniFormsCount: $('#billing_count').val() ? $('#billing_count').val() : '1',
		   removeLastConfirmation: true,
		   removeCurrentConfirmation: true,
		   removeLastConfirmationMsg: 'Are you sure?',
		   removeCurrentConfirmationMsg: 'Are you sure?',
		   continuousIndex: true,
		   afterAdd: function(source, newForm) {
			  $('#billing_count').attr('value',source.getFormsCount());
			},
		   afterRemoveCurrent: function(source) {		
			  $('#billing_count').attr('value',source.getFormsCount());
		   }
	   });	   
	}
	
	/* function to load coordination php value into form */
	if($('#sheepItForm').length > 0){
		for(i = 0; i < $('#billing_count').val(); i++){
				if($('#empnameData_'+i).length > 0){ 
					$('#empname_'+i).val($('#empnameData_'+i).val());
				}
				if($('#percentData_'+i).length > 0){
					$('#percent_'+i).val($('#percentData_'+i).val()); 
				}
				if($('#typeData_'+i).length > 0){
					$('#type_'+i).val($('#typeData_'+i).val()); 
				}
				// for error messages
				if($('#empname_Err_Data_'+i).length > 0){ 
					$('#empname_Err_'+i).html($('#empname_Err_Data_'+i).val());
				}
				if($('#percent_Err_Data_'+i).length > 0){ 
					$('#percent_Err_'+i).html($('#percent_Err_Data_'+i).val());
				}
				if($('#type_Err_Data_'+i).length > 0){ 
					$('#type_Err_'+i).html($('#type_Err_Data_'+i).val());
				}					
			}
		} 
});
<?php echo '</script'; ?>
>
<?php }
}
