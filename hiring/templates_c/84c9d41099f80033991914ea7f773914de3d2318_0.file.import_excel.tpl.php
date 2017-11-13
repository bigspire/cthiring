<?php
/* Smarty version 3.1.29, created on 2017-11-11 16:29:59
  from "C:\xampp\htdocs\2017\ctsvn\cthiring\hiring\templates\import_excel.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a06d82f49f4c3_58167761',
  'file_dependency' => 
  array (
    '84c9d41099f80033991914ea7f773914de3d2318' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\templates\\import_excel.tpl',
      1 => 1510397978,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a06d82f49f4c3_58167761 ($_smarty_tpl) {
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
		 
	   <!-- Bootstrap framework -->
         <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
         <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
       <!-- gebo blue theme-->
         <link rel="stylesheet" href="css/blue.css" id="link_theme" />            
         <!-- main styles -->
            <link rel="stylesheet" href="css/style.css" />
         <!-- tooltips-->
            <link rel="stylesheet" href="lib_cthiring/qtip2/jquery.qtip.min.css" />
		 <!-- tag handler -->
            <link rel="stylesheet" href="lib_cthiring/tag_handler/css/jquery.taghandler.css" />            
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
			<link rel="stylesheet" media="screen" href="css/datepicker/datepicker.css">	

			<link type="text/css" media="screen" href="css/jquery.autocomplete.css" rel="stylesheet" />
			<link rel="stylesheet" href="css/gritter/jquery.gritter.css">
			<!-- smoke_js -->
            <link rel="stylesheet" href="css/smoke.css" />
	   <!-- colorbox -->
			<link rel="stylesheet" href="css/colorbox/colorbox.css">
			<link rel="stylesheet" href="lib_cthiring/chosen/chosen.css" type="text/css">
			<link rel="stylesheet" href="lib_cthiring/multisel/multi-select.css" type="text/css">
	  <!-- breadcrumbs-->
            <link rel="stylesheet" href="lib_cthiring/jBreadcrumbs/css/BreadCrumb.css" />
	
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
			 		
<form action="import_excel.php?action=<?php echo $_GET['action'];?>
" class="formID" id="formID" method="post" enctype="multipart/form-data" accept-charset="utf-8">
<div class="box">
	<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" align="centre">
				<tbody> 					
				<tr class="tbl_row" >
						<td width="120" class="tbl_column">Upload Excel <span class="f_req">*</span></td>
						<td>
						<input type="file" tabindex="3" name="event_excel" class="upload" id="event_excel"/>
						<label class="error"><?php echo $_smarty_tpl->tpl_vars['event_excelErr']->value;
echo $_smarty_tpl->tpl_vars['attachmentuploadErr']->value;?>
 </label>
						</td>	
					</tr>
				</tbody>
		   </table>
							
			<div class="form-actions">
				<input name="submit" class="btn btn-gebo theForm" value="Save" type="submit"/>
				<input type="button" value="Cancel" class="cancelBtn btn cancel">
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
<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['redirect_url']->value;?>
" class="redirect_url"/>		
<input type="hidden" value="resume.php" class="redirect_url_value"/>	
<!-- main bootstrap js -->
<?php echo '<script'; ?>
 src="bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>			
<?php echo '<script'; ?>
 src="lib_cthiring/jquery-ui/jquery-ui-1.8.20.custom.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/gebo_common.js"><?php echo '</script'; ?>
>		
<?php echo '<script'; ?>
 src="js/application.js"><?php echo '</script'; ?>
> 
		 
<?php if ($_smarty_tpl->tpl_vars['form_sent']->value == '1') {?>

<?php echo '<script'; ?>
 type="text/javascript">
/* redirect to list page successfully */
self.parent.location.href = jQuery('.redirect_url').val();
parent.jQuery(".modalCloseImg").click();
parent.$.colorbox.close();
<?php echo '</script'; ?>
>

<?php }?>

<?php echo '<script'; ?>
 type="text/javascript">
$(".cancel").click(function(){
	parent.$.colorbox.close();
});
<?php echo '</script'; ?>
>	
<!-- datatable (inbox,outbox) -->
<?php echo '<script'; ?>
 src="lib_cthiring/datatables/jquery.dataTables.min.js"><?php echo '</script'; ?>
>                                                                                                                                                                             

</body>
</html><?php }
}
