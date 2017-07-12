<?php
/* Smarty version 3.1.29, created on 2017-07-12 16:29:07
  from "C:\xampp\htdocs\2017\ctsvn\cthiring\hiring\templates\upload_resume.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_596600fbb6a579_76904658',
  'file_dependency' => 
  array (
    '1effb1acafb93d7bfa5e9c52b333e85de322510f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\templates\\upload_resume.tpl',
      1 => 1499857141,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_596600fbb6a579_76904658 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\2017\\ctsvn\\cthiring\\hiring\\vendor\\smarty-3.1.29\\libs\\plugins\\function.html_options.php';
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


				 		
<form action="upload_resume.php?client_id=<?php echo $_smarty_tpl->tpl_vars['client_id']->value;?>
&req_id=<?php echo $_smarty_tpl->tpl_vars['req_id']->value;?>
" class="formID" id="formID" method="post" enctype="multipart/form-data" accept-charset="utf-8">
<div class="box">
	<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" align="centre">
				<tbody> 
				<?php if ($_smarty_tpl->tpl_vars['client_id']->value && $_smarty_tpl->tpl_vars['req_id']->value) {?>
					<tr class="tbl_row">
										<td width="120" class="tbl_column">Client <span class="f_req">*</span></td>
										<td> 
										<input type="text" name="client" disabled id="client" value="<?php echo $_smarty_tpl->tpl_vars['client']->value;?>
" class="input-large" aria-controls="dt_gal"></label>																					
										</td>
					</tr>
					
					<tr class="">
										<td width="120" class="tbl_column">Position For <span class="f_req">*</span></td>
										<td> 
										<input type="text" name="position_for" disabled id="position_for" value="<?php echo $_smarty_tpl->tpl_vars['position_for']->value;?>
" class="input-large" aria-controls="dt_gal"></label>																																									
										</td>
					</tr>
					
				<?php } else { ?>
				
					<tr class="tbl_row">
										<td width="120" class="tbl_column">Client <span class="f_req">*</span></td>
										<td> 
										<select tabindex="1" name="client" class="span8 client_id"  id="client">
										<option value="">Select</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['clients']->value,'selected'=>$_POST['client']),$_smarty_tpl);?>
	
										</select>
										<label class="error"><?php echo $_smarty_tpl->tpl_vars['clientErr']->value;?>
</label>																					
										</td>
					</tr>
					
					<tr class="">
										<td width="120" class="tbl_column">Position For <span class="f_req">*</span></td>
										<td> 
										<select tabindex="2" name="position_for" class="span8"  id="position">
										<option value="">Select</option>
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['position']->value,'selected'=>$_POST['position_for']),$_smarty_tpl);?>

										</select>
										<label class="error"><?php echo $_smarty_tpl->tpl_vars['position_forErr']->value;?>
</label>																					
										</td>
					</tr>
					
				<?php }?>
				<tr class="tbl_row" >
						<td width="120" class="tbl_column">Resume <span class="f_req">*</span></td>
						<td>
						<input type="file" tabindex="3" name="resume" class="upload" id="resume"/>
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

$(document).ready(function(){
	// fetch the degree
	$(".client_id").change(function(){ 
		var client_name = $(this).val();
		// var clien_id = $(this).attr('id').split('_');	
		$.ajax({
			url : "get_position.php",
			method : "GET",
			dataType: "json",
			data : {client : client_name},
			encode  : false
		})
		.done(function (data){
			var div_data = '<option value="">Select</option>';
			$.each(data,function (a,y){ 
				div_data +=  "<option value="+a+">"+y+"</option>";
			});
			// $('#position').empty();
			
			$('#position').html(div_data); 
		});
	});	
});
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>		
<!-- main bootstrap js -->
<?php echo '<script'; ?>
 src="bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>			
<?php echo '<script'; ?>
 src="lib_cthiring/jquery-ui/jquery-ui-1.8.20.custom.min.js"><?php echo '</script'; ?>
>
<!-- touch events for jquery ui-->
<?php echo '<script'; ?>
 src="js/forms/jquery.ui.touch-punch.min.js"><?php echo '</script'; ?>
>
<!-- smart resize event -->
<?php echo '<script'; ?>
 src="js/jquery.debouncedresize.min.js"><?php echo '</script'; ?>
>
<!-- hidden elements width/height -->
<?php echo '<script'; ?>
 src="js/jquery.actual.min.js"><?php echo '</script'; ?>
>
<!-- js cookie plugin -->
<!-- tooltips -->
<?php echo '<script'; ?>
 src="lib_cthiring/qtip2/jquery.qtip.min.js"><?php echo '</script'; ?>
>
<!-- fix for ios orientation change -->
<?php echo '<script'; ?>
 src="js/ios-orientationchange-fix.js"><?php echo '</script'; ?>
>
<!-- scroll -->
<?php echo '<script'; ?>
 src="lib_cthiring/antiscroll/antiscroll.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="lib_cthiring/antiscroll/jquery-mousewheel.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/gebo_common.js"><?php echo '</script'; ?>
>		
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.stickytableheaders.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.autocomplete.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/datepicker/bootstrap-datepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/jquery.slimscroll.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.alerts.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/application.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/gritter/jquery.gritter.min.js"><?php echo '</script'; ?>
>	
<?php echo '<script'; ?>
 src="js/colorbox/jquery.colorbox-min.js"><?php echo '</script'; ?>
>
<!-- datatable (inbox,outbox) -->
<?php echo '<script'; ?>
 src="lib_cthiring/datatables/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
<!-- additional sorting for datatables -->
<?php echo '<script'; ?>
 src="lib_cthiring/datatables/jquery.dataTables.sorting.js"><?php echo '</script'; ?>
>

<!-- mailbox functions -->
<?php echo '<script'; ?>
 src="js/gebo_mailbox.js"><?php echo '</script'; ?>
>
<!-- autosize textareas (new message) -->
<?php echo '<script'; ?>
 src="js/forms/jquery.autosize.min.js"><?php echo '</script'; ?>
>
<!-- plupload and all it's runtimes and the jQuery queue widget (attachments) -->
<?php echo '<script'; ?>
 type="text/javascript" src="lib_cthiring/plupload/js/plupload.full.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="lib_cthiring/plupload/js/jquery.plupload.queue/jquery.plupload.queue.full.js"><?php echo '</script'; ?>
>
<!-- tag handler (recipients) -->
<?php echo '<script'; ?>
 src="lib_cthiring/tag_handler/jquery.taghandler.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="lib_cthiring/multisel/jquery.multi-select.js"><?php echo '</script'; ?>
>	

<!-- datatable -->		 
	<?php echo '<script'; ?>
 type="text/javascript" src="lib_cthiring/chosen/chosen.jquery.min.js"><?php echo '</script'; ?>
>
	 <?php echo '<script'; ?>
 src="//cdn.tinymce.com/4/tinymce.min.js"><?php echo '</script'; ?>
>
<!-- smoke_js -->
<?php echo '<script'; ?>
 src="js/smoke.min.js"><?php echo '</script'; ?>
>
<!-- jBreadcrumbs -->
<?php echo '<script'; ?>
 src="lib_cthiring/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"><?php echo '</script'; ?>
>
<!-- datatable -->                                                                                                                                                                                         
<?php echo '<script'; ?>
 src="js/main.js"><?php echo '</script'; ?>
>	
<?php echo '<script'; ?>
 type="text/javascript" src="js/sheepit-jquery.sheepItPlugin-v1.1.1/jquery.sheepItPlugin.js"><?php echo '</script'; ?>
>

</body>
</html><?php }
}
