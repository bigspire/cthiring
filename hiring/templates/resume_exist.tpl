{* Purpose : view interview.
   Created : Nikitasa
   Date : 17-02-2017 *}


			{include file='include/header_popup.tpl'}
			<!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                <div class="row-fluid">
						<div class="span12">
							<nav>
                     <h3><div id="flashMessage" class="alert alert-error">Oops! The resume is already uploaded by some one</div>
					 
					 </h3>
                    </nav>
					
					
					<form action="" class="formID" id="formID" method="post">
							
						<div class="row-fluid">
							<div class="span12">
							
							
							{foreach from=$resume_data item=item key=key}	
							
							{if $item.company != ''}
							<table class="table  table-bordered dataTable" style="margin-bottom:0">
								<tbody>
									<tr>
										<td width="120" class="tbl_column"><b>Client Name</b></td>
										<td>{$item.company}</td>
										
										<td width="80" class="tbl_column"><b>Position</b> </td>
										<td>{$item.position}</</td>
										
										<td width="120" class="tbl_column"><b>Rec. Name</b> </td>
										<td>{$item.created_by}</</td>
										
										<td width="120"  class="tbl_column"><b>Rec. Location</b> </td>
										<td>{$item.location}</td>
										
									</tr>
									
								<tr>
										
										<td width="" class="tbl_column"><b>Rec. Contact No</b></td>
										<td>{$item.mobile]}</td>
										
										<td width="" class="tbl_column"><b>Sent Date</b> </td>
										<td>{$item.cv_sent}</</td>
										
										<td width="" class="tbl_column"><b>Current Status </b> </td>
										<td colspan="3">{$item.current_stage} {$item.current_status}</</td>
									
										
									</tr>
									
								</tr>	
								</tbody>
							</table>
							
							<br>
							
							{/if}
						{/foreach}
							
							
							</div>
							
					
							
							
						<div class="span12">
							<div class="mbox">
							
						<div class="form-actions">
						
						<input name="submit"  class="btn btn-gebo submit" value="Ignore and Proceed.." type="submit"/>
						
						<a href="upload_resume.php" class="jsRedirect"><button type="button" class="btn btn-success">Let me choose another resume</button></a>
						
						<a href="javascript:window.history.back();" class="jsRedirect"><button type="button" class="btn">Cancel and Go Back</button></a>
						
						</div>
               </div>
					
			</div>	
                 </div>
				 
				 </form>
              
			
      </div>
	</div>
</div>
</div>	

<script src="js/jquery.min.js"></script>	
{if $form_sent == '1'}
{literal}
<script type="text/javascript">
self.parent.location.reload();
parent.$.colorbox.close();
</script>
{/literal}
{/if}

	
   </body>
</html>
