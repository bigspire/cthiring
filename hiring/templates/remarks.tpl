{* Purpose : To add remarls.
 Created : Nikitasa
   Date : 09-02-2017 *}
   
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
<body  class="menu_hover">
	<div id="container">
		<div id="content">
			<div id="maincontainer" class="clearfix">
			
			<!-- main content -->
            <div id="contentwrapper">
               <div class="main_content" style="min-height:auto;">
            <div class="row-fluid">
				 <div class="span12">
				 		
<form action="remarks.php?action={$smarty.get.action}" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
	<div class="box-title mb5">
			<h4>{$smarty.get.action|ucfirst} Billing </h4>
	</div>
	{if $alert_msg}
				 <div id="flashMessage" class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>{$alert_msg}</div>					
	{/if}
	<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" align="centre">
				<tbody> 
				<tr class="tbl_row" >
					<td width="120" class="tbl_column">Remarks 
					{if $smarty.get.action eq 'reject'}
					<span class="f_req">*</span>
					{/if}
					
					</td>
						<td>
							<textarea placeholder="" name="remarks" tabindex="8" id="remarks" cols="10" rows="3" class="span10">{if $smarty.post.remarks}{$smarty.post.remarks}{/if}</textarea>
							<label for="reg_city" generated="true" class="error">{$remarksErr}</label>
						</td>	
				</tr>
				</tbody>
			</table>
			<div class="form-actions">
			<input name="submit" class="btn btn-gebo theForm" value="Submit"  type="submit"/>
					<a class="jsRedirect toggleSearch"  href="javascript:window.close()">
					<input type="button" value="Cancel" id="cancel" class="btn cancel"/></a>
					<input type="hidden" id="success_page" value="approve_billing.php?st=success"/>
					<input type="hidden" id="action" value="{$smarty.get.action}"/>
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
	 <script src="js/main.js"></script>	
	 
<script type="text/javascript">
	$(".cancel").click(function(){
		 parent.$.colorbox.close();
	});
	$(document).ready(function(){
		$('.theForm').on('click', function() {
			$('.cancel').hide();
		});
	});
</script>
{if $form_sent == '1'}
{literal}
<script type="text/javascript">
/* redirect to view billing page once approved / rejected successfully */
self.parent.location.href = jQuery('.redirect_url').val();
parent.$.colorbox.close();
</script>
{/literal}
{/if}

</body>
</html>