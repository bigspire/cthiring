<?php
/* Smarty version 3.1.29, created on 2017-02-01 17:43:29
  from "/var/www/html/cthiring/templates/edit_sharing_criteria.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5891d0e9a5fc96_40344985',
  'file_dependency' => 
  array (
    'aecbf29b2e90c697407e1ffe83216d241a822d3d' => 
    array (
      0 => '/var/www/html/cthiring/templates/edit_sharing_criteria.tpl',
      1 => 1485785876,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5891d0e9a5fc96_40344985 ($_smarty_tpl) {
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
                                    <a href="sharing_criteria.php">Sharing Criteria</a>
                                </li>
                            
                                <li>
                                   Edit Sharing Criteria
                                </li>
                            </ul>
                        </div>
                    </nav>
					
				<?php if ($_smarty_tpl->tpl_vars['EXIST_MSG']->value) {?>
				 <div id="flashMessage" class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><?php echo $_smarty_tpl->tpl_vars['EXIST_MSG']->value;?>
</div>					
				<?php }?>
				
<form action="" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="box-title mb5">
			<h4><i class="icon-list"></i> Sharing Criteria Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Type  <span class="f_req">*</span></td>
							<td>										
								<select name="inc_sharing_id" tabindex="1" class="span8" id="type">
								<option value="">Select</option>	
									<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['type_name']->value,'selected'=>$_smarty_tpl->tpl_vars['inc_sharing_id']->value),$_smarty_tpl);?>
								
								</select>
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['typeErr']->value;?>
</label>									
							</td>	
						</tr>
						<tr>
							<td width="120" class="tbl_column">% of Share <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="3" name="percent" value="<?php echo $_smarty_tpl->tpl_vars['percent']->value;?>
" class="span8">
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['shareErr']->value;?>
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
						<td width="120" class="tbl_column">Status <span class="f_req">*</span></td>
						<td>	
							<select name="status" class="span8"  tabindex="2" id="PositionEmpId">
								<?php echo smarty_function_html_options(array('id'=>"grade_status",'options'=>$_smarty_tpl->tpl_vars['grade_status']->value,'selected'=>$_smarty_tpl->tpl_vars['status']->value),$_smarty_tpl);?>
	
							</select> 
							<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['statusErr']->value;?>
</label>											
						</td>	
				  </tr>						
				</tbody>
			</table>
		</div>
		</div>	
	<div>
</div>
</div>
<div class="form-actions">
				<button class="btn btn-gebo" type="submit">Submit</button>
				<input type="button" value="Cancel" class="btn" onclick="window.location='sharing_criteria.php'">

</div>
                    </div>
				</form>
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
