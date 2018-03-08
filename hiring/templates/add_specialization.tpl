{* Purpose : To add contact branch.
 Created : Nikitasa
   Date : 27-10-2017 *}
      

			{include file='include/header.tpl'}

			<!-- main content -->
            <div id="contentwrapper">
               <div class="main_content">
            <div class="row-fluid">
				 <div class="span12">
				 <nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="{$smarty.const.webroot}home"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="specialization.php">Specialization</a>
                                </li>
                            
                                <li>
                                   Add Specialization
                                </li>
                            </ul>
                        </div>
                    </nav>
				{if $EXIST_MSG}
				 <div id="flashMessage" class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>{$EXIST_MSG}</div>					
				{/if}
<form action="" id="formID" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="box-title mb5">
			<h4><i class="icon-list"></i>Specialization Details </h4>
		</div>
		<div class="row-fluid">
		<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>
						<tr class="tbl_row">
							<td width="120" class="tbl_column">Degree <span class="f_req">*</span></td>
							<td>					
								<select name="degree_id" tabindex="2" class="span8"  id="PositionEmpId">
								{html_options options=$degree_id selected=$status}
								<label for="reg_city" generated="true" class="error">{$degree_idErr} </label>									
							</td>	
						</tr>																											
						
									
						
				</tbody>
			</table>
		</div>
							
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>	  
				  <tr class="tbl_row">
						<td width="120" class="tbl_column">Status <span class="f_req">*</span></td>
						<td>	
							<select name="status" tabindex="2" class="span8"  id="PositionEmpId">
							{if isset($status)}
								{html_options options=$specialization_status selected=$status}	
							{else}
								{html_options options=$specialization_status selected='1'}	
							{/if}	
							<label for="reg_city" generated="true" class="error">{$statusErr}</label>											
						</td>	
				  </tr>						
				</tbody>
			</table>
		</div>
		</div>	
		
		<div class="row-fluid">
		<div class="span6">		
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
				<tbody>	  
				<tr class="tbl_row">
				 <div id="sheepItForm">
						<!-- Form template-->
						<div id="sheepItForm_template" class="" style="clear:left;">
						
							<td width="120" class="tbl_column">Specialization <span class="f_req">*</span></td>
							<td>										
								<input type="text" tabindex="1" id="specialization_#index#" name="specialization_#index#"  class="span8 ui-autocomplete-input" autocomplete="off">
								<label for="reg_city" generated="true" id="specialization_Err_#index#" class="error"></label>									
							</td>	
						
						<!--div style="float: left;    clear: left;    margin-top: 5px;    margin-bottom: 5px;">										
						<button type="button" id="sheepItForm_remove_current" >
						<a><span>Remove</span></a></button>
						</div-->
						</div>
						  <!-- /Form template-->
						   
						  <!-- No forms template -->
						  <div id="sheepItForm_noforms_template">No data</div>
						  <!-- /No forms template-->
						   
						  <!-- Controls -->
						  <div id="sheepItForm_controls">
							<span id="sheepItForm_add" style="float:right;margin-top:5px;">
								<button type="button"><a><span>Add Another</span></a></button>
							</span>
						  </div>
						  <!-- /Controls -->
						</div>
					</tr>					
				</tbody>
			</table>
		</div>
			</div>	
	<div>
</div>
</div>
<div class="form-actions">
				<input name="submit" class="btn btn-gebo" value="Submit" type="submit"/>
				<input type="hidden" name="data[Client][webroot]" value="specialization.php" id="webroot">
<input type="hidden" id="edu_count" name="edu_count" value="{$eduCount}">
	<a href="javascript:void(0)" class="jsRedirect cancelBtn cancel_event">
	<input type="button" value="Cancel" class="btn">
	</a>

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
{include file='include/footer.tpl'}
{literal}	 
<script type="text/javascript">	
$(document).ready(function(){
   var sheepAdd = {};
	if($('#sheepItForm').length > 0){ 
	var sheepAdd = $('#sheepItForm').sheepIt({
		   separator: '',
		   allowRemoveLast: true,
		   allowRemoveCurrent: true,
		   allowRemoveAll: true,
		   allowAdd: true,
		   allowAddN: true,
		   maxFormsCount: 10,
		   minFormsCount: 1,
		   iniFormsCount: $('#edu_count').val() ? $('#edu_count').val() : '1',
		   removeLastConfirmation: true,
		   removeCurrentConfirmation: true,
		   removeLastConfirmationMsg: 'Are you sure?',
		   removeCurrentConfirmationMsg: 'Are you sure?',
		   continuousIndex: true,
		   afterAdd: function(source, newForm) {
			 $('#edu_count').attr('value',source.getFormsCount());
		   },
		   afterRemoveCurrent: function(source) {		
			 $('#edu_count').attr('value',source.getFormsCount());
		  }
	   });	   
	}
});	
</script>	
{/literal}