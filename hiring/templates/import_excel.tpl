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
			 		
<form action="import_excel.php?action={$smarty.get.action}" class="formID" id="formID" method="post" enctype="multipart/form-data" accept-charset="utf-8">
<div class="box">
	<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" align="centre">
				<tbody> 					
				<tr class="tbl_row" >
						<td width="120" class="tbl_column">Upload Excel <span class="f_req">*</span></td>
						<td>
						<input type="file" tabindex="3" name="event_excel" class="upload" id="event_excel"/>
						<label class="error">{$event_excelErr}{$attachmentuploadErr} </label>
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
<script src="bootstrap/js/bootstrap.min.js"></script>			
<script src="lib_cthiring/jquery-ui/jquery-ui-1.8.20.custom.min.js"></script>
<script src="js/gebo_common.js"></script>		
<script src="js/application.js"></script> 
		 
{if $form_sent == '1'}
{literal}
<script type="text/javascript">
/* redirect to list page successfully */
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
<!-- datatable (inbox,outbox) -->
<script src="lib_cthiring/datatables/jquery.dataTables.min.js"></script>                                                                                                                                                                             
{/literal}
</body>
</html>