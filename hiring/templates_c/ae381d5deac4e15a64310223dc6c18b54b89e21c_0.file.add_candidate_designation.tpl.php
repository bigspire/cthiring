<?php
/* Smarty version 3.1.29, created on 2018-06-04 11:46:28
  from "C:\xampp\htdocs\ctsvn\cthiring\hiring\templates\add_candidate_designation.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5b14d93c482850_48486046',
  'file_dependency' => 
  array (
    'ae381d5deac4e15a64310223dc6c18b54b89e21c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\templates\\add_candidate_designation.tpl',
      1 => 1527938863,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5b14d93c482850_48486046 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\vendor\\smarty-3.1.29\\libs\\plugins\\function.html_options.php';
?>

   
   <?php if ($_GET['action'] != 'dropdown') {?>
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
                                    <a href="candidate_designation.php">Candidate Designation</a>
                                </li>
                            
                                <li>
                                   Add Candidate Designation
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
			<h4><i class="icon-list"></i>Candidate Designation Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Candidate Designation <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="1" name="designation" value="<?php echo $_smarty_tpl->tpl_vars['designation']->value;?>
" class="span8 ui-autocomplete-input" autocomplete="off">
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['designationErr']->value;?>
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
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['designation_status']->value,'selected'=>$_smarty_tpl->tpl_vars['status']->value),$_smarty_tpl);?>
	
							<?php } else { ?>
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['designation_status']->value,'selected'=>'1'),$_smarty_tpl);?>
	
							<?php }?>	
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
				<input name="submit" class="btn btn-gebo" value="Submit" type="submit"/>
				<input type="hidden" name="data[Client][webroot]" value="candidate_designation.php" id="webroot">

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

	<?php }?>
	
	
	
	<?php if ($_GET['action'] == 'dropdown') {?>
		<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	<title>
		Manage Hiring</title>
	   <!-- Bootstrap framework -->
         <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
         <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
       <!-- gebo blue theme-->
         <link rel="stylesheet" href="css/blue.css" id="link_theme" />            
         <!-- main styles -->
         <link rel="stylesheet" href="css/style.css" />
        
	
</head>
<body  class="menu_hover " >
	<div id="container">
		<div id="content">
			<div id="maincontainer" class="clearfix">
			
			<!-- main content -->
            <div id="contentwrapper">
               <div class="main_content" style="min-height:auto;">
            <div class="row-fluid">
				 <div class="span12">
				 
				 
			 		
				<?php if ($_smarty_tpl->tpl_vars['EXIST_MSG']->value) {?>
					<div id="flashMessage" class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><?php echo $_smarty_tpl->tpl_vars['EXIST_MSG']->value;?>
</div>		
			      </div>
			   <?php }?>  
			   <?php if ($_smarty_tpl->tpl_vars['SUCCESS_MSG']->value) {?>
					<div id="flashMessage" class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><?php echo $_smarty_tpl->tpl_vars['SUCCESS_MSG']->value;?>
</div>		
			      </div>
			   <?php }?> 
			 
<form action="" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="box-title mb5">
			<h4><i class="icon-list"></i> Add Candidate Designation </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Candidate Designation <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="1" name="designation" value="<?php echo $_smarty_tpl->tpl_vars['designation']->value;?>
" class="span8 ui-autocomplete-input" autocomplete="off">
								<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['designationErr']->value;?>
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
				<input name="submit" class="btn btn-gebo theForm" value="Submit" type="submit"/>

	<a href="javascript:void(0)" class="jsRedirect cancel">
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
	 
<?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>
		
<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['redirect_url']->value;?>
" class="redirect_url"/>			
<!-- main bootstrap js -->
		 
<?php if ($_smarty_tpl->tpl_vars['form_sent']->value == '1') {?>
	 
	<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function(){
		window.parent.$('#fr_desig').val('success');
	});
	<?php echo '</script'; ?>
>
	
<?php }?>


<?php echo '<script'; ?>
 type="text/javascript">
$(".cancel").click(function(){
	parent.$.colorbox.close();
});

$(document).ready(function(){
		/* when the form submitted */
	$('.formID').submit(function(){ 		
		// Disable the 'Next' button to prevent multiple clicks		
		$('input[type=submit]', this).attr('value', 'Processing...');		
		$('input[type=submit]', this).attr('disabled', 'disabled');
		// hide cancel button
		$('button[type=button]', this).hide();
		$('.cancelBtn').hide();
		
	});
});
<?php echo '</script'; ?>
>	

</body>
</html>
<?php }
}
}
