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
</script>
{/literal}
</body>
</html>