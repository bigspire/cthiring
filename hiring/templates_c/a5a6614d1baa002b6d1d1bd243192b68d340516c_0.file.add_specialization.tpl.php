<?php
/* Smarty version 3.1.29, created on 2018-03-08 12:25:59
  from "C:\xampp\htdocs\2017\ctsvn2\cthiring\hiring\templates\add_specialization.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5aa0de7f5639c8_23994304',
  'file_dependency' => 
  array (
    'a5a6614d1baa002b6d1d1bd243192b68d340516c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn2\\cthiring\\hiring\\templates\\add_specialization.tpl',
      1 => 1520492157,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5aa0de7f5639c8_23994304 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\2017\\ctsvn2\\cthiring\\hiring\\vendor\\smarty-3.1.29\\libs\\plugins\\function.html_options.php';
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
                                    <a href="specialization.php">Specialization</a>
                                </li>
                            
                                <li>
                                   Add Specialization
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
			<h4><i class="icon-list"></i>Specialization Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Degree <span class="f_req">*</span></td>
							<td>					
								<select name="degree_id" tabindex="2" class="span8"  id="PositionEmpId">
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['degree_id']->value,'selected'=>$_smarty_tpl->tpl_vars['status']->value),$_smarty_tpl);?>

								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['degree_idErr']->value;?>
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
							<select name="status" tabindex="2" class="span8"  id="PositionEmpId">
							<?php if (isset($_smarty_tpl->tpl_vars['status']->value)) {?>
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['specialization_status']->value,'selected'=>$_smarty_tpl->tpl_vars['status']->value),$_smarty_tpl);?>
	
							<?php } else { ?>
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['specialization_status']->value,'selected'=>'1'),$_smarty_tpl);?>
	
							<?php }?>	
							<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['statusErr']->value;?>
</label>											
						</td>	
				  </tr>						
				</tbody>
			</table>
		</div>
		</div>	
		
		<div class="row-fluid">
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>	  
				<tr class="tbl_row">
				 <div id="sheepItForm">
						<!-- Form template-->
						<div id="sheepItForm_template" class="" style="clear:left;">
						
							<td width="120" class="tbl_column">Specialization <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="1" id="specialization_#index#" name="specialization_#index#"  class="span8 ui-autocomplete-input" autocomplete="off">
								<label for="reg_city" generated="true" id="specialization_Err_#index#" class="error"></label>									
							</td>	
						
						<!--div style="float: left;    clear: left;    margin-top: 5px;    margin-bottom: 5px;">										
						<button type="button" id="sheepItForm_remove_current" >
						<a><span>Remove</span></a></button>
						</div-->
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
					</tr>					
				</tbody>
			</table>
		</div>
			</div>	
	<div>
</div>
</div>
<div class="form-actions">
				<input name="submit" class="btn btn-gebo" value="Submit" type="submit"/>
				<input type="hidden" name="data[Client][webroot]" value="specialization.php" id="webroot">
<input type="hidden" id="edu_count" name="edu_count" value="<?php echo $_smarty_tpl->tpl_vars['eduCount']->value;?>
">
	<a href="javascript:void(0)" class="jsRedirect cancelBtn cancel_event">
	<input type="button" value="Cancel" class="btn">
	</a>

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
		   iniFormsCount: $('#edu_count').val() ? $('#edu_count').val() : '1',
		   removeLastConfirmation: true,
		   removeCurrentConfirmation: true,
		   removeLastConfirmationMsg: 'Are you sure?',
		   removeCurrentConfirmationMsg: 'Are you sure?',
		   continuousIndex: true,
		   afterAdd: function(source, newForm) {
			 $('#edu_count').attr('value',source.getFormsCount());
		   },
		   afterRemoveCurrent: function(source) {		
			 $('#edu_count').attr('value',source.getFormsCount());
		  }
	   });	   
	}
});	
<?php echo '</script'; ?>
>	
<?php }
}
