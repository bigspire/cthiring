<?php
/* Smarty version 3.1.29, created on 2017-02-14 17:01:09
  from "/var/www/html/cthiring/hiring/templates/remarks.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58a2ea7d7ed950_12631579',
  'file_dependency' => 
  array (
    'cb38576699d83b601ad20b685eac143e271ace50' => 
    array (
      0 => '/var/www/html/cthiring/hiring/templates/remarks.tpl',
      1 => 1487071565,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58a2ea7d7ed950_12631579 ($_smarty_tpl) {
?>

   
   <!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	<title>
		Upload Resume - CT Hiring</title>
	
	   <!-- Bootstrap framework -->
         <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
         <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
      <!-- gebo blue theme-->
         <link rel="stylesheet" href="css/blue.css" id="link_theme" />            
      <!-- main styles -->
         <link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
		
			
</head>
<body  class="menu_hover">
	<div id="container">
		<div id="content">
			<div id="maincontainer" class="clearfix">
			
			<!-- main content -->
            <div id="contentwrapper">
               <div class="main_content" style="min-height:auto;">
            <div class="row-fluid">
				 <div class="span12">
				 		
<form action="remarks.php?action=<?php echo $_GET['action'];?>
" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
	<div class="box-title mb5">
			<h4><?php echo ucfirst($_GET['action']);?>
 Billing </h4>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['alert_msg']->value) {?>
				 <div id="flashMessage" class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><?php echo $_smarty_tpl->tpl_vars['alert_msg']->value;?>
</div>					
	<?php }?>
	<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" align="centre">
				<tbody> 
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Remarks 
					<?php if ($_GET['action'] == 'reject') {?>
					<span class="f_req">*</span>
					<?php }?>
					
					</td>
						<td>
							<textarea placeholder="" name="remarks" tabindex="8" id="remarks" cols="10" rows="3" class="span10"><?php if ($_POST['remarks']) {
echo $_POST['remarks'];
}?></textarea>
							<label for="reg_city" generated="true" class="error"><?php echo $_smarty_tpl->tpl_vars['remarksErr']->value;?>
</label>
						</td>	
				</tr>
				</tbody>
			</table>
			<div class="form-actions">
			<input name="submit" class="btn btn-gebo theForm" value="Save"  type="submit"/>
					<a class="jsRedirect toggleSearch"  href="javascript:window.close()">
					<input type="button" value="Cancel" id="cancel" class="btn cancel"/></a>
					<input type="hidden" id="success_page" value="approve_billing.php?st=success"/>
					<input type="hidden" id="action" value="<?php echo $_GET['action'];?>
"/>
			</div>
		</div>
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
	 <input type="hidden" value="view_approve_billing.php" class="redirect_url"/>		
	 <!-- main bootstrap js -->
	 <?php echo '<script'; ?>
 src="bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>			
	 <?php echo '<script'; ?>
 src="lib/jquery-ui/jquery-ui-1.8.20.custom.min.js"><?php echo '</script'; ?>
>
	 <?php echo '<script'; ?>
 src="js/gebo_common.js"><?php echo '</script'; ?>
>		
	  <?php echo '<script'; ?>
 src="js/application.js"><?php echo '</script'; ?>
>
	<!-- datatable -->
	<!-- jBreadcrumbs -->
	 <?php echo '<script'; ?>
 src="js/main.js"><?php echo '</script'; ?>
>	
	 
<?php echo '<script'; ?>
 type="text/javascript">
	$(".cancel").click(function(){
		 parent.$.colorbox.close();
	});
	$(document).ready(function(){
		$('.theForm').on('click', function() {
			$('.cancel').hide();
		});
	});
<?php echo '</script'; ?>
>
<?php if ($_smarty_tpl->tpl_vars['form_sent']->value == '1') {?>
	 
	<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function(){
		var status = $('#action').val() == 'approve' ? 'Approved' : 'Rejected';
		self.parent.location.href = jQuery('#success_page').val()+'&status='+status;
		parent.jQuery("#cboxClose").click();
		close_popup();
	});
	<?php echo '</script'; ?>
>
	
<?php }?>
</body>
</html><?php }
}
