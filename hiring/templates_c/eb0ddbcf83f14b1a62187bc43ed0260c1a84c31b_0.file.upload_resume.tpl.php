<?php
/* Smarty version 3.1.29, created on 2017-11-15 16:41:36
  from "C:\xampp\htdocs\ctsvn\cthiring\hiring\templates\upload_resume.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a0c20e863ba10_96262340',
  'file_dependency' => 
  array (
    'eb0ddbcf83f14b1a62187bc43ed0260c1a84c31b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\templates\\upload_resume.tpl',
      1 => 1510740410,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0c20e863ba10_96262340 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\ctsvn\\cthiring\\hiring\\vendor\\smarty-3.1.29\\libs\\plugins\\function.html_options.php';
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
										<input type="text" name="client_name" disabled id="client" value="<?php echo $_smarty_tpl->tpl_vars['client']->value;?>
" class="input-large" aria-controls="dt_gal"></label>																					
										<input type="hidden" name="client"  id="client" value="<?php echo $_SESSION['client_id'];?>
"></label>																					
										</td>
					</tr>
					
					<tr class="">
										<td width="120" class="tbl_column">Position For <span class="f_req">*</span></td>
										<td> 
										<input type="text" name="position_for_name" disabled id="position_for" value="<?php echo $_smarty_tpl->tpl_vars['position_for']->value;?>
" class="input-large" aria-controls="dt_gal"></label>																																									
										<input type="hidden" name="position_for"  id="position_for" value="<?php echo $_SESSION['req_id'];?>
"></label>																																									
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
		/* when the form submitted */
	$('.formID').submit(function(){ 		
		// Disable the 'Next' button to prevent multiple clicks		
		$('input[type=submit]', this).attr('value', 'Processing...');		
		$('input[type=submit]', this).attr('disabled', 'disabled');
		// hide cancel button
		$('button[type=button]', this).hide();
		$('.cancelBtn').hide();
		
	});
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

</body>
</html><?php }
}
