<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	<title>
		Send Message - CT Hiring</title>
	
	    <!-- Bootstrap framework -->
         <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
         <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
      <!-- gebo blue theme-->
         <link rel="stylesheet" href="css/blue.css" id="link_theme" />            
      <!-- main styles -->
         <link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
			<link rel="stylesheet" media="screen" href="css/datepicker/datepicker.css">	
			<link type="text/css" media="screen" href="css/jquery.autocomplete.css" rel="stylesheet" />
			<link rel="stylesheet" href="css/gritter/jquery.gritter.css">
		<!-- colorbox -->
			<link rel="stylesheet" href="css/colorbox/colorbox.css">
			<link rel="stylesheet" href="lib/chosen/chosen.css" type="text/css">
		<!-- breadcrumbs-->
            <link rel="stylesheet" href="lib/jBreadcrumbs/css/BreadCrumb.css" />
		
			
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
	
<form action="message_popup.php" id="formID" class="formID" method="post" accept-charset="utf-8">

	<div class="box">
	<div class="box-title mb5">
			<h4>Send CV to client </h4>
</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" align="centre">
						<tbody> 
									<tr class="tbl_row" >
										<td width="110" class="tbl_column">Candidate Name</td>
										<td>Ravichandran</td>
									</td>	
									</tr>
									<tr>
										<td width="90" class="tbl_column">Message <span class="f_req">*</span></td>
											<td>
											<textarea name="job_desc"  placeholder="" tabindex="8" id="" cols="6" style="height:100px" class="span10 wysiwyg">Dear Ravi,
<br><br>Please confirm the interview details.</textarea>
										  </td>	
									</tr>
							</tbody>
							</table>
							
							<div class="form-actions">
									<button class="btn btn-gebo theForm" type="submit">Save</button>
									<input type="button" value="Cancel" class="btn cancel"/></a>
							</div>
						</div>
					</div>
</div>

</form>
                    </div>
<input type="hidden" value="view_position.php" class="redirect_url"/>						
					
                </div>
            </div> 
		</div>
		</div>
		</div>
		</div>
			
<?php // include('inc/footer.php');?>
	 
	 <script src="js/jquery.min.js"></script>		
	 	
	 <!-- main bootstrap js -->
	 <script src="bootstrap/js/bootstrap.min.js"></script>			
	 <script src="lib/jquery-ui/jquery-ui-1.8.20.custom.min.js"></script>
	 <script src="js/gebo_common.js"></script>		
	 <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
	 <script type="text/javascript" src="js/jquery.stickytableheaders.min.js"></script>
	 <script src="js/datepicker/bootstrap-datepicker.js"></script>
	 <script src="js/jquery.slimscroll.min.js"></script>
	  <script src="js/application.js"></script>
	  <script src="js/gritter/jquery.gritter.min.js"></script>	
	  <script src="js/colorbox/jquery.colorbox-min.js"></script>
	<!-- datatable -->
		 
	<script type="text/javascript" src="lib/chosen/chosen.jquery.min.js"></script>
<!-- TinyMce WYSIWG editor -->
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	
		<style type="text/css">
		.chzn-container .chzn-results {max-height:150px !important}
		
		</style>	
	  <script src="js/main.js"></script>	
<script type="text/javascript">
	$(".theForm").click(function(){
		self.parent.location.href = jQuery('.redirect_url').val();
		parent.jQuery(".modalCloseImg").click();
		close_popup();
	});
	$(".cancel").click(function(){
		 parent.$.colorbox.close();
	});	
</script>

</body>
</html>