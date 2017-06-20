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


				 		
<form action="upload_resume.php" id="formID" method="post" enctype="multipart/form-data" accept-charset="utf-8">
<div class="box">
	<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" align="centre">
				<tbody> 
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
	 
	 <script src="js/jquery.min.js"></script>		
	 <input type="hidden" value="add_resume.php" class="redirect_url"/>		
	 <input type="hidden" value="resume.php" class="redirect_url_value"/>	
	 <!-- main bootstrap js -->
	 <script src="bootstrap/js/bootstrap.min.js"></script>			
	 <script src="lib_cthiring/jquery-ui/jquery-ui-1.8.20.custom.min.js"></script>
	 <script src="js/gebo_common.js"></script>		
	  <script src="js/application.js"></script> 
		
		<!-- jBreadcrumbs -->
	 <script src="js/main.js"></script>	
 
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
<script src="js/jquery.min.js"></script>		
<!-- main bootstrap js -->
<script src="bootstrap/js/bootstrap.min.js"></script>			
<script src="lib_cthiring/jquery-ui/jquery-ui-1.8.20.custom.min.js"></script>
<!-- touch events for jquery ui-->
<script src="js/forms/jquery.ui.touch-punch.min.js"></script>
<!-- smart resize event -->
<script src="js/jquery.debouncedresize.min.js"></script>
<!-- hidden elements width/height -->
<script src="js/jquery.actual.min.js"></script>
<!-- js cookie plugin -->
<!-- tooltips -->
<script src="lib_cthiring/qtip2/jquery.qtip.min.js"></script>
<!-- fix for ios orientation change -->
<script src="js/ios-orientationchange-fix.js"></script>
<!-- scroll -->
<script src="lib_cthiring/antiscroll/antiscroll.js"></script>
<script src="lib_cthiring/antiscroll/jquery-mousewheel.js"></script>
<script src="js/gebo_common.js"></script>		
<script type="text/javascript" src="js/jquery.stickytableheaders.min.js"></script>
<script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
<script src="js/datepicker/bootstrap-datepicker.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="js/jquery.alerts.js"></script>
<script src="js/application.js"></script>
<script src="js/gritter/jquery.gritter.min.js"></script>	
<script src="js/colorbox/jquery.colorbox-min.js"></script>
<!-- datatable (inbox,outbox) -->
<script src="lib_cthiring/datatables/jquery.dataTables.min.js"></script>
<!-- additional sorting for datatables -->
<script src="lib_cthiring/datatables/jquery.dataTables.sorting.js"></script>

<!-- mailbox functions -->
<script src="js/gebo_mailbox.js"></script>
<!-- autosize textareas (new message) -->
<script src="js/forms/jquery.autosize.min.js"></script>
<!-- plupload and all it's runtimes and the jQuery queue widget (attachments) -->
<script type="text/javascript" src="lib_cthiring/plupload/js/plupload.full.js"></script>
<script type="text/javascript" src="lib_cthiring/plupload/js/jquery.plupload.queue/jquery.plupload.queue.full.js"></script>
<!-- tag handler (recipients) -->
<script src="lib_cthiring/tag_handler/jquery.taghandler.min.js"></script>

<script src="lib_cthiring/multisel/jquery.multi-select.js"></script>	

<!-- datatable -->		 
	<script type="text/javascript" src="lib_cthiring/chosen/chosen.jquery.min.js"></script>
	 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<!-- smoke_js -->
<script src="js/smoke.min.js"></script>
<!-- jBreadcrumbs -->
<script src="lib_cthiring/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
<!-- datatable -->                                                                                                                                                                                         
<script src="js/main.js"></script>	
<script type="text/javascript" src="js/sheepit-jquery.sheepItPlugin-v1.1.1/jquery.sheepItPlugin.js"></script>
{/literal}
</body>
</html>