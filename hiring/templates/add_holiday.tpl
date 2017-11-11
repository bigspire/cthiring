{* Purpose : To upload resume.
 Created : Nikitasa
   Date : 07-03-2017 *}

<!DOCTYPE html>
<html>
<head>
	
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
				 
				 
				 
		{if $form_sent eq '1'}						
		<div  class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert-success">×</button>Excel Imported Successfully</div>
		Redirecting now...
		{/if}	
		
		
{if $form_sent neq '1'}		 		
<form action="add_holiday.php" class="formID" id="formID" method="post" enctype="multipart/form-data" accept-charset="utf-8">
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
{/if}
  </div>
  </div>
 </div> 
</div>
</div>
</div>
</div>


	 
<script src="js/jquery.min.js"></script>		
<!-- main bootstrap js -->
<script src="bootstrap/js/bootstrap.min.js"></script>			
<script src="lib_cthiring/jquery-ui/jquery-ui-1.8.20.custom.min.js"></script>
<input type="hidden" value="{$page_redirect}" class="redirect_url"/>		
<!-- main bootstrap js -->
		 
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
{/literal}
</body>
</html>