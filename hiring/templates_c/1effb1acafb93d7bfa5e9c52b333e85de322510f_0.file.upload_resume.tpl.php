<?php
/* Smarty version 3.1.29, created on 2017-06-12 19:36:32
  from "C:\xampp\htdocs\2017\ctsvn\cthiring\hiring\templates\upload_resume.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_593e9fe88a1de7_82332289',
  'file_dependency' => 
  array (
    '1effb1acafb93d7bfa5e9c52b333e85de322510f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\templates\\upload_resume.tpl',
      1 => 1497270582,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593e9fe88a1de7_82332289 ($_smarty_tpl) {
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
<body  class="menu_hover " >
	<div id="container">
		<div id="content">
			<div id="maincontainer" class="clearfix">
			
			<!-- main content -->
            <div id="contentwrapper">
               <div class="main_content" style="min-height:auto;">
            <div class="row-fluid">
				 <div class="span12">


				 		
<form action="upload_resume.php" id="formID" method="post" enctype="multipart/form-data" accept-charset="utf-8">
<div class="box">
	<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" align="centre">
				<tbody> 
					<tr class="tbl_row" >
						<td width="120" class="tbl_column">Resume <span class="f_req">*</span></td>
						<td>
						<input type="file" name="resume" class="upload" id="resume"/>
						<label class="error"><?php echo $_smarty_tpl->tpl_vars['resumeErr']->value;
echo $_smarty_tpl->tpl_vars['attachmentuploadErr']->value;?>
 </label>
						</td>	
					</tr>
				</tbody>
		   </table>
							
			<div class="form-actions">
				<input name="submit" class="btn btn-gebo theForm" value="Save" type="submit"/>
				<!--<button class="btn btn-gebo theForm" type="submit">Save</button>-->
				<input type="button" value="Cancel" class="btn cancel">
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
	 <input type="hidden" value="add_resume.php" class="redirect_url"/>		
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
		
		<!-- jBreadcrumbs -->
	 <?php echo '<script'; ?>
 src="js/main.js"><?php echo '</script'; ?>
>	
 
<?php if ($_smarty_tpl->tpl_vars['form_sent']->value == '1') {?>

<?php echo '<script'; ?>
 type="text/javascript">
/* redirect to add resume page once resume uploaded successfully */
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

</body>
</html><?php }
}
