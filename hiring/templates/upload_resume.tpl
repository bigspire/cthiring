{* Purpose : To upload resume.
 Created : Nikitasa
   Date : 07-03-2017 *}

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
				 
				 {if $ALERT_MSG}
							<div class="alert alert-info">
								<a class="close" data-dismiss="alert">×</a>
								{$ALERT_MSG}
							</div>
						{/if}
			 		
<form action="upload_resume.php?client_id={$client_id}&req_id={$req_id}" class="formID" id="formID" method="post" enctype="multipart/form-data" accept-charset="utf-8">
<div class="box">
	<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" align="centre">
				<tbody> 
				{if $client_id and $req_id}
					<tr class="tbl_row">
										<td width="120" class="tbl_column">Client <span class="f_req">*</span></td>
										<td> 
										<input type="text" name="client_name" disabled id="client" value="{$client}" class="input-large" aria-controls="dt_gal"></label>																					
										<input type="hidden" name="client"  id="client" value="{$smarty.session.client_id}"></label>																					
										</td>
					</tr>
					
					<tr class="">
										<td width="120" class="tbl_column">Position For <span class="f_req">*</span></td>
										<td> 
										<input type="text" name="position_for_name" disabled id="position_for" value="{$position_for}" class="input-large" aria-controls="dt_gal"></label>																																									
										<input type="hidden" name="position_for"  id="position_for" value="{$smarty.session.req_id}"></label>																																									
										</td>
					</tr>
				
				{else}
					
					<tr class="tbl_row">
										<td width="120" class="tbl_column">Client <span class="f_req">*</span></td>
										<td> 
										<select tabindex="1" name="client" class="span8 client_id"  id="client">
										<option value="">Select</option>
										{html_options options=$clients selected=$smarty.post.client}	
										</select>
										<label class="error">{$clientErr}</label>																					
										</td>
					</tr>
					
					<tr class="">
										<td width="120" class="tbl_column">Position For <span class="f_req">*</span></td>
										<td> 
										<select tabindex="2" name="position_for" class="span8"  id="position">
										<option value="">Select</option>
										{html_options options=$position selected=$smarty.post.position_for}
										</select>
										<label class="error">{$position_forErr}</label>																					
										</td>
					</tr>
					
				{/if}
				<tr class="tbl_row" >
						<td width="120" class="tbl_column">Resume <span class="f_req">*</span></td>
						<td>
						<input type="file" tabindex="3" name="resume" class="upload" id="resume"/>
						<label class="error">{$resumeErr}{$attachmentuploadErr} </label>
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
	 
<script src="js/jquery.min.js"></script>
		
<input type="hidden" value="{$redirect_url}" class="redirect_url"/>		
<input type="hidden" value="resume.php" class="redirect_url_value"/>	
<!-- main bootstrap js -->
		 
{if $form_sent == '1'}
{literal}
<script type="text/javascript">
/* redirect to add resume page once resume uploaded successfully */
self.parent.location.href = jQuery('.redirect_url').val();
parent.jQuery(".modalCloseImg").click();
parent.$.colorbox.close();
</script>
{/literal}
{/if}


{literal}
<script type="text/javascript">
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
</script>	
{/literal}
</body>
</html>