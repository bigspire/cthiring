<?php
/* Smarty version 3.1.29, created on 2018-01-22 12:13:55
  from "C:\xampp\htdocs\2017\ctsvn\cthiring\hiring\templates\edit_resume_api.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a65882b0766c8_60665735',
  'file_dependency' => 
  array (
    '235914c5d64d42f93c11858856b54ab2e88755ef' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\templates\\edit_resume_api.tpl',
      1 => 1516603432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5a65882b0766c8_60665735 ($_smarty_tpl) {
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
                                    <a href="view_resume_api.php">Resume API</a>
                                </li>
                            
                                <li>
                                   Edit Resume API
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
			<h4><i class="icon-list"></i> API Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="165" class="tbl_column">HTML2PDF Rocket API Key <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="1" name="api_key" value="<?php echo $_smarty_tpl->tpl_vars['api_key']->value;?>
" class="span8 ui-autocomplete-input" autocomplete="off">
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['api_keyErr']->value;?>
</label>									
							</td>	
						</tr>			

							<tr class="tbl_row">
							<td width="165" class="tbl_column">ILOVEPDF Secret Key <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="1" name="secret_key" value="<?php echo $_smarty_tpl->tpl_vars['secret_key']->value;?>
" class="span8 ui-autocomplete-input" autocomplete="off">
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['secret_keyErr']->value;?>
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
						<td width="155" class="tbl_column">ILOVEPDF Public Key <span class="f_req">*</span></td>
						<td>	
							<input type="text" tabindex="1" name="public_key" value="<?php echo $_smarty_tpl->tpl_vars['public_key']->value;?>
" class="span8 ui-autocomplete-input" autocomplete="off">
							<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['public_keyErr']->value;?>
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
				<input name="submit" class="btn btn-gebo" value="Submit" type="submit"/>
				<input type="hidden" name="data[Client][webroot]" value="view_resume_api.php" id="webroot">

	<a href="javascript:void(0)" class="jsRedirect cancelBtn cancel_event">
	<input type="button" value="Cancel" class="btn">
	</a></div>
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
