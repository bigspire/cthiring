{* Purpose : To add billing.
 Created : Nikitasa
   Date : 31-01-2017 *}
   

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
                                    <a href="billing.php">Billing</a>
                                </li>
                            
                                <li>
                                   Add Billing
                                </li>
                            </ul>
                        </div>
                    </nav>
				{if $EXIST_MSG}
				 <div id="flashMessage" class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>{$EXIST_MSG}</div>					
				{/if}
<form action="add_billing.php" id="formID"  name="searchFrm" class="formID" method="post" accept-charset="utf-8">
	<div class="box">
		<div class="row-fluid">
		<div class="span12">
		<div class="mbox">
			<div class="tabbable">
								<div class="heading">
										<ul class="nav nav-tabs">									
										<li class="billTab active"><a class="restabChange" id="bill" rel="interview"  href="#mbox_billing" data-toggle="tab"><i class="splashy-mail_light_down"></i>   Billing Details </a></li>
										<li class="coordTab"><a class="restabChange" id="coordination" rel="interview"  href="#mbox_co-ordination" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Co-ordination </a></li>
									</ul>
								</div>
			<div class="tab-content" style="overflow:visible">			
			<div class="tab-pane active" id="mbox_billing">
			<div class="span6">
			<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Candidate Name <span class="f_req">*</span></td>
													
										<td>
	<input type="text" placeholder="Search Here..." name="keyword" id="keyword" value="{$keyword}" class="span10" aria-controls="dt_gal">
	<input type="hidden" value="{$smarty.post.resume_id}" name="resume_id" id="resume_id">
	<input type="hidden" value="{$smarty.post.requirements_id}" name="requirements_id" id="requirements_id">
	<input type="hidden" value="{$smarty.post.client_id}" name="client_id" id="client_id">
	<input type="hidden" value="{$smarty.post.created_by}" name="created_by">
	<input type="hidden" id="page" value="add_billing_candidate_search">
	<input type="hidden" value="1" id="SearchKeywords">
	<input type="hidden"  id="retainBilling">
	<label for="reg_city" generated="true" class="error">{$keywordErr}</label>
										</td>	
									</tr>
									
									
									<tr>
										<td width="120" class="tbl_column">Position <span class="f_req">*</span></td>
										<td>
										<input type="hidden" name="position" id="position"  value="{$smarty.post.position}">
									<label id="lbl_position"></label>		
													
									</td>
									</tr>	
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Client Name <span class="f_req">*</span></td>
										<td>
										<input type="hidden" name="client" id="client"  value="{$smarty.post.client}">
									<label id="lbl_client"></label>							
									</td>
									</tr>		
									<tr>
									
									<tr>
										<td width="120" class="tbl_column">CTC Offered <span class="f_req">*</span></td>
										<td> 
										<input type="hidden" name="ctc" id="ctc_offered"  value="{$smarty.post.ctc}">
										<label id="lbl_ctc_offered"></label>
										</td>
									</tr>										
								</tbody>
							</table>
						</div>
							
						<div class="span6">		
							<table class="table table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
							
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Billing Amount <span class="f_req">*</span></td>
										<td> 
										<input type="hidden" name="billing" id="billing_amount"  value="{$smarty.post.billing}">
										<label id="lbl_billing_amount"></label>
										</td>
									</tr>
									<tr>
										<td width="120" class="tbl_column">Billing Date <span class="f_req">*</span></td>
										<td> 
										<input type="hidden" name="billing_date" id="billing_date"  value="{$smarty.post.billing_date}">
										<label id="lbl_billing_date"></label>										
										</td>
									</tr>
													
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Joined Date <span class="f_req">*</span></td>
										<td> 
										<input type="hidden" name="joined_date" id="joined_date"  value="{$smarty.post.joined_date}">
										<label id="lbl_joined_date"></label>										
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						</div>
						
						<div class="tab-pane" id="mbox_co-ordination">	
					   <div id="sheepItForm">
 					 	<!-- Form template-->
  						<div id="sheepItForm_template" class="" style="clear:left;">
						<div class="span6">
						<table class="table table-bordered dataTable" style="margin-bottom:0;">
						<tbody>
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Employee <span class="f_req">*</span></td>
													
										<td>
										<select name="empname_#index#" tabindex="1" class="span8" id="empname_#index#">
										<option value="">Select</option>	
											{html_options options=$emp_name selected=$empname}			    			
										</select>
										
										<label for="reg_city" generated="true" class="error" id="empname_Err_#index#"></label>
										</td>	
									</tr>	
									
									<tr>
									<td width="120" class="tbl_column">Value (% of work)<span class="f_req">*</span></td>
									<td>										
										<input type="text" tabindex="7" name="percent_#index#" id="percent_#index#" value="{$percent}" class="span8" autocomplete="off">
										<label for="reg_city" generated="true" class="error" id="percent_Err_#index#"></label>					
									</td>	
									</tr>		
																	
								</tbody>
							</table>
						</div>
						<div class="span6">		
							<table class="table table-bordered dataTable" style="margin-bottom:0;">
								<tbody>
							
									<tr class="tbl_row">
										<td width="120" class="tbl_column">Co-ordination Type <span class="f_req">*</span></td>
										<td> 
										<select name="type_#index#" class="span8 coordType" tabindex="1" id="type_#index#">
										<option value="">Select</option>	
										{html_options options=$type_name selected=$smarty.post.type}								
										</select>	
										<label for="reg_city" generated="true" class="error" id="type_Err_#index#"></label>																	
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>
							
<div style="float: left;    clear: left;    margin-top: 5px;    margin-bottom: 5px;">										
<button type="button" id="sheepItForm_remove_current" >
<a><span>Remove</span></a></button>
</div>
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
		</div>
		</div>
		</div>
		</div>
</div>
</div>
<input type="hidden" id="billing_count" name="billing_count" value="{$billingCount}">
					 <div class="form-actions">
					 			<input name="submit" class="btn btn-gebo submit" value="Submit" type="submit"/>
									<a href="billing.php">
									<button type="button" val="billing.php" class="btn Cancel">Cancel</button>
									</a>
					<input type="hidden" id="web_root" value="billing.php">
				 </div>
		</form>
               

			   </div>
            </div> 
		</div>
		</div>
		</div>
		</div>
	</div>
		
{for $i=0; $i < $smarty.post.billing_count; $i++}
		<input type="hidden" id="empnameData_{$i}" name="empnameData_{$i}" value="{$empnameData[$i]}">
		<input type="hidden" id="percentData_{$i}" name="percentData_{$i}" value="{$percentData[$i]}">
		<input type="hidden" id="typeData_{$i}" name="typeData_{$i}" value="{$typeData[$i]}">		
		<input type="hidden" id="empname_Err_Data_{$i}"  value="{$billingErr[$i]['empnameErr']}">
		<input type="hidden" id="percent_Err_Data_{$i}"  value="{$billingErr[$i]['percentErr']}">
		<input type="hidden" id="type_Err_Data_{$i}"  value="{$billingErr[$i]['typeErr']}">
{/for}		

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
		   iniFormsCount: $('#billing_count').val() ? $('#billing_count').val() : '1',
		   removeLastConfirmation: true,
		   removeCurrentConfirmation: true,
		   removeLastConfirmationMsg: 'Are you sure?',
		   removeCurrentConfirmationMsg: 'Are you sure?',
		   continuousIndex: true,
		   afterAdd: function(source, newForm) {
			  $('#billing_count').attr('value',source.getFormsCount());
			  		/* function to place the value in the percent box */ 
					$('.coordType').change(function(){ 
						var elem_pos = $(this).attr('id').split('_');
						// alert(elem_pos);
						var elem_val = $(this).val().split('-');
						$('#percent_'+elem_pos[1]).val(elem_val[1]);
					});
			},
		   afterRemoveCurrent: function(source) {		
			  $('#billing_count').attr('value',source.getFormsCount());
		   }
	   });	   
	}
	
	/* retain the tab */
	if($('#position').val() != ''){
		if($('#keyword').val() != ''){
			$('.coordTab').addClass('active');
			$('#mbox_co-ordination').addClass('active');
			$('.billTab').removeClass('active');
			$('#mbox_billing').removeClass('active');
		}else{
			$('.coordTab').removeClass('active');
			$('#mbox_co-ordination').removeClass('active');			
			$('.billTab').addClass('active');			
			$('#mbox_billing').addClass('active');
		}
	}
	
	/* retaining billing details*/
	if($('#retainBilling').length > 0){
		$('#lbl_position').html($('#position').val());
		$('#lbl_client').html($('#client').val());
		$('#lbl_ctc_offered').html($('#ctc_offered').val());
		$('#lbl_billing_amount').html($('#billing_amount').val());
		$('#lbl_billing_date').html($('#billing_date').val());
		$('#lbl_joined_date').html($('#joined_date').val());
		$('#client_id').html($('#client_id').val());
		$('#requirements_id').html($('#requirements_id').val());
		$('#resume_id').html($('#resume_id').val());
	}
	
	/* function to place the value in the percent box */ 
	$('.coordType').change(function(){ 
		var elem_pos = $(this).attr('id').split('_');
		var elem_val = $(this).val().split('-');
		$('#percent_'+elem_pos[1]).val(elem_val[1]);
	});
	
	
	/* function to load coordination php value into form */
	if($('#sheepItForm').length > 0){
		for(i = 0; i < $('#billing_count').val(); i++){
				if($('#empnameData_'+i).length > 0){ 
					$('#empname_'+i).val($('#empnameData_'+i).val());
				}
				if($('#percentData_'+i).length > 0){
					$('#percent_'+i).val($('#percentData_'+i).val()); 
				}
				if($('#typeData_'+i).length > 0){
					$('#type_'+i).val($('#typeData_'+i).val()); 
				}
				// for error messages
				if($('#empname_Err_Data_'+i).length > 0){ 
					$('#empname_Err_'+i).html($('#empname_Err_Data_'+i).val());
				}
				if($('#percent_Err_Data_'+i).length > 0){ 
					$('#percent_Err_'+i).html($('#percent_Err_Data_'+i).val());
				}
				if($('#type_Err_Data_'+i).length > 0){ 
					$('#type_Err_'+i).html($('#type_Err_Data_'+i).val());
				}					
			}
		}
	
});


</script>
{/literal}