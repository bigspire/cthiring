$(document).ready(function() {
		
    $(".tag_name").click(function(){
        $("p").append($(this).attr('rel'));
    });

	/* function to redirect according to drop down */   
	$("#mailer").change(function(s){
		location.href = 'mailer_template.php?id='+$(this).val();
	});
	
	// multiple value selection in jquery	
	if(jQuery('.multi_select').length > 0){
		$(".multi_select").multiselect({
			buttonWidth: '400px',
			height:220}); 
	}
		
	/* for multi select options */
	if($(".chosen-select").length > 0){
		$(".chosen-select").chosen({
			no_results_text: "Oops, nothing found!"			
			}); 
	}
	
	/* function to show the alert message for single record delete */   
	$(".Confirm").click( function() {
		id = this.id;	
		jConfirm('Are you sure you want to delete?', 'Confirmation!', function(r) {
			if(r){	
				webroot = $("#web_root").attr('value');
				document.searchFrm.action = webroot+'?id='+id;
				document.searchFrm.submit();				
			}
		});
	});
	
	/* function to show the alert message for cancel */   
	$(".Cancel").click( function(s) {
		s.preventDefault();
		jConfirm('Are you sure you want to Cancel?', 'Confirmation!', function(e) {
			if(e){	
				webroot = $("#web_root").attr('value');
				location.href = webroot;				
			}else{
				return false;
			}
		});
	});
	
	
			
			
	
	/* for search open/close */
	$('.toggleSearch').click(function(){ 
		$('.dataTables_filter').slideToggle();
	});
	
	/* editor */
	if($('.wysiwyg').length > 0){
		$(function(){
			tinymce.init({
			  selector: 'textarea.wysiwyg',
			  menubar: false,
			  plugins: [
				'advlist autolink lists link image charmap print preview anchor',
				'searchreplace visualblocks code fullscreen' ,
				'insertdatetime media table contextmenu paste code'
			  ],
			  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
			});
		});
	}
	
	 
	/* when the form submitted */
	$('.formID').submit(function(){ 		
		// Disable the 'Next' button to prevent multiple clicks		
		$('input[type=submit]', this).attr('value', 'Processing...');		
		$('input[type=submit]', this).attr('disabled', 'disabled');
		// hide cancel button
		$('button[type=button]', this).hide();
		$('.cancelBtn').hide();
		
	});
	
	/* function to switch the tabs */
	$('.tabChange').click(function(){	
		show_div = $(this).attr('rel');
		switch(show_div){
			case 'all':
			$('.allRow').show();
			// hide duplicate rows
			$('.duplicate').hide();
			break;	
			case 'Interview':
			$('.allRow').hide();
			$('.Interview').show();
			$('.duplicateInt').hide();
			// hide duplicate rows
			break;	
			case 'Offer':
			$('.allRow').hide();
			$('.Offer').show();
			$('.duplicateOffer').hide();
			// hide duplicate rows
			break;
			case 'Billing':
			$('.allRow').hide();
			$('.Billing').show();
			$('.duplicateBill').hide();
			break;			
			default:
			$('.allRow').hide();
			$('.'+show_div).show();
			break;			
		}		
		//alert(show_div);
		// display reason for reject
		if(show_div == 'OfferReject' || show_div == 'NoShow' || show_div == 'cv_reject'  || show_div == 'InterviewReject'){
			$('.reasonCol').show();
			$('.noticePeriod').hide();
			$('.joinCol').hide();
			$('.offerCol').hide();
		}else if(show_div == 'Joined'){
			$('.joinCol').show();
			$('.noticePeriod').hide();
			$('.reasonCol').hide();
			$('.offerCol').hide();
		}else if(show_div == 'Offer'){
			$('.joinCol').hide();
			$('.noticePeriod').hide();
			$('.reasonCol').hide();
			$('.offerCol').show();
		}else{
			$('.reasonCol').hide();
			$('.joinCol').hide();
			$('.noticePeriod').show();
			$('.offerCol').hide();
			
		}

		// for no records
		tab_count = $(this).attr('val');
		if(tab_count == ''){	
			$('.no_record').show();
			$('.cvTable').hide();
		}else{
			$('.no_record').hide();
			$('.cvTable').show();
		}
		
		
	});
	
	
	
	/* load when the view position started */
	if($('.tabChange').length > 0){
		$('.allRow').show();
		// hide duplicate rows
		$('.duplicate').hide();
	}
	

	// for auto complete	search
	/*
	if(jQuery('#SearchKeywords').length > 0){ 
		$('#SearchKeywords').ready(function () {
			page = $("#page").attr('value'); 
			jQuery('#SearchText').autocomplete('autocomplete_search.php?page='+page, {
				width: 180,
				selectFirst: false,			
			});	
		});
	}*/
	
	/* function for autocomplete search */
	if(jQuery('#SearchKeywords').length > 0){ 
		$('#SearchKeywords').ready(function () {
			webroot = $("#webroot").attr('value');
			jQuery('#SearchText').autocomplete(webroot+'search/', {
			width: 227,
			selectFirst: true			
			});	
		});
	}
	
	
	
	 // for auto complete search 
	 if($('#keyword').length > 0){
		var json;
		$("#keyword")
		  .bind("keydown", function( event ){
			var data; 
			// for asset type search			
			if ( event.keyCode === $.ui.keyCode.TAB &&
				$( this ).autocomplete( "instance" ).menu.active ){
				event.preventDefault();
			}
		  })
		  .autocomplete({

		  source: 			
			function( request, response ) { 
				$.getJSON( "autocomplete_search.php", { 
				term: extractLast( request.term ),page:$('#page').val()
			  }, response ).done(function(data) {
					// console.log( data);			
					$('#keyword').removeClass('ac_loading');		 		
				});			
			},
			
			search: function() { 
			  // custom minLength
			  var term = extractLast( this.value );
			  if ( term.length < 1 ) {
				return false;
			  }
			  // Displaying the loader. 			  
			  $(this).addClass('ac_loading');
			},
			focus: function() {
			  // prevent value inserted on focus
			  return false;
			},
			
			select: function( event, ui ){
				var res_id;
				if(ui.item.value != 'No Results!'){
				  var terms = split( this.value );				  
				  // remove the current input
				  terms.pop();				 
				  // add the selected item
				  res_id = ui.item.value.split(',');
				  terms.push( ui.item.value );
				  // add placeholder to get the comma-and-space at the end
				  terms.push( "" );
				  this.value = terms.join( " " );
				  // data
				  if($('#keyword').length > 0 && $('#page').val() == 'add_billing_candidate_search'){
				  		var billing_details = $(this).val();
				 		// alert(billing_details);						 	
		 		  		$.ajax({
						  url : "autocomplete_search.php",
					     method : "GET",
					     dataType: "json",
					     data : {state : 'get_billing_info', resume_id : res_id[1].trim() },
				  		})
				  		.done(function (data){
							// alert(data);
							//$('#location').html(div_data);
							$("#resume_id").val(data[0]);
							$("#requirements_id").val(data[1]);
							$("#client_id").val(data[4]);
							$("#position").val(data[3]); 
							$("#lbl_position").html(data[3]);
							$("#client").val(data[5]); 
							$("#lbl_client").html(data[5]); 
							$("#ctc_offered").val(data[6]); 
							$("#lbl_ctc_offered").html(data[6]); 
							$("#billing_amount").val(data[7]); 
							$("#lbl_billing_amount").html(data[7]); 
							$("#billing_date").val(data[8]); 
							$("#lbl_billing_date").html(data[8]); 
							$("#joined_date").val(data[9]);
							$("#lbl_joined_date").html(data[9]);  
			 			})
				  		return false;
			  		}else{
						return false;
			  		}			  
				}
			}
		});
	}
	
	function extractLast( term ) {
		 return split( term ).pop();
	}
	
	function split( val ){
		 return val.split( /,\s*/ );
	}
	
	/* multiple option for add client contacts */
	$(document).ready(function(){
	    var sheepAdd = {};
		if($('#sheepItFormContact').length > 0){
		var sheepAdd = $('#sheepItFormContact').sheepIt({
			   separator: '',
			   allowRemoveLast: true,
			   allowRemoveCurrent: true,
			   allowRemoveAll: true,
			   allowAdd: true,
			   allowAddN: true,
			   maxFormsCount: 10,
			   minFormsCount: 1,
			   iniFormsCount: $('#contact_count').val() ? $('#contact_count').val() : '1',
			   removeLastConfirmation: true,
			   removeCurrentConfirmation: true,
			   removeLastConfirmationMsg: 'Are you sure?',
			   removeCurrentConfirmationMsg: 'Are you sure?',
			   continuousIndex: true,
			   afterRemoveCurrent: function(source){		
				  $('#contact_count').attr('value',source.getFormsCount());
			   },
			   afterAdd: function(source, newForm) {
				  $('#contact_count').attr('value',source.getFormsCount());			  		
			   }
		   });	
			
			for(i = 0; i < $('#contact_count').val(); i++){
				if($('#titleName_'+i).length > 0){
					$('#title_'+i).val($('#titleName_'+i).val());
				}
				if($('#firstName_'+i).length > 0){
					$('#first_name_'+i).val($('#firstName_'+i).val());
				}
				if($('#lastName_'+i).length > 0){
					$('#last_name_'+i).val($('#lastName_'+i).val());
				}
				if($('#emailId_'+i).length > 0){
					$('#email_'+i).val($('#emailId_'+i).val());
				}				
				if($('#desigName_'+i).length > 0){
					$('#designation_'+i).val($('#desigName_'+i).val());
				}
				if($('#mobileNo_'+i).length > 0){
					$('#mobile_'+i).val($('#mobileNo_'+i).val());
				}
				if($('#landlineNo_'+i).length > 0){
					$('#phone_'+i).val($('#landlineNo_'+i).val());
				}
				if($('#branchName_'+i).length > 0){
					$('#branch_'+i).val($('#branchName_'+i).val());
				}
				if($('#statusName_'+i).length > 0){
					$('#status_'+i).val($('#statusName_'+i).val());
				}
				// for error messages
				if($('#firstNameErr_'+i).length > 0){
					$('#firstErrData_'+i).html($('#firstNameErr_'+i).val());
				}
				if($('#emailErr_'+i).length > 0){
					$('#emailErrData_'+i).html($('#emailErr_'+i).val());
				}
				if($('#mobileErr_'+i).length > 0){
					$('#mobileErrData_'+i).html($('#mobileErr_'+i).val());
				}
				if($('#titleErr_'+i).length > 0){
					$('#titleErrData_'+i).html($('#titleErr_'+i).val());
				}
				if($('#desigErr_'+i).length > 0){
					$('#desigErrData_'+i).html($('#desigErr_'+i).val());
				}				
				
			}
		}
	});
	
	
	/* multiple option for add client contacts */
	$(document).ready(function(){
	    var sheepAdd = {}; 
		if($('#sheepItFormPosition').length > 0){
		var sheepAdd = $('#sheepItFormPosition').sheepIt({
			   separator: '',
			   allowRemoveLast: true,
			   allowRemoveCurrent: true,
			   allowRemoveAll: true,
			   allowAdd: true,
			   allowAddN: true,
			   maxFormsCount: 10,
			   minFormsCount: 1,
			   iniFormsCount: ($('#position_count').val() ? $('#position_count').val() : ($('#position_edit_count').val() ? $('#position_edit_count').val() : '1')),
			   removeLastConfirmation: true,
			   removeCurrentConfirmation: true,
			   removeLastConfirmationMsg: 'Are you sure?',
			   removeCurrentConfirmationMsg: 'Are you sure?',
			   continuousIndex: true,
			   afterRemoveCurrent: function(source){		
				  $('#position_count').attr('value',source.getFormsCount());
			   },
			   afterAdd: function(source, newForm) {
				  $('#position_count').attr('value',source.getFormsCount());			  		
			   }
		   });	
			
			for(i = 0; i < $('#position_count').val(); i++){
				if($('#employeeName_'+i).length > 0){
					$('#employee_'+i).val($('#employeeName_'+i).val());
				}
				if($('#coordName_'+i).length > 0){
					$('#coordination_'+i).val($('#coordName_'+i).val());
				}
				if($('#percentName_'+i).length > 0){
					$('#percent_'+i).val($('#percentName_'+i).val());
				}			
				// for error messages
				if($('#empNameErr_'+i).length > 0){
					$('#empNameErrData_'+i).html($('#empNameErr_'+i).val());
				}
				if($('#perErr_'+i).length > 0){
					$('#perErrData_'+i).html($('#perErr_'+i).val());
				}
				if($('#coordErr_'+i).length > 0){
					$('#coordErrData_'+i).html($('#coordErr_'+i).val());
				}
			}
		}
	});
	
	/* get districts of state */
	$('.load_state').change(function(){			
		id = $(this).val();			
		$('.load_dist').empty();
		$('.load_dist').append('<option>Loading...</option>');
		$.ajax({
			 url: $('#webroot').val()+'get_district/?id='+id	
		}).done(function( html ) {	
			$('.load_dist').empty();
			$('.load_dist').append(html);
			// $(".bdDist").trigger("chosen:updated");
		});	
	});
	
	/* get spoc. of client */
	$('.load_client').change(function(){			
		id = $(this).val();			
		$('.load_contact').empty();
		$('.load_contact').append('<option>Loading...</option>');
		$.ajax({
			 url: $('#webroot').val()+'get_contact/?id='+id	
		}).done(function( html ) {	
			$('.load_contact').empty();
			$('.load_contact').append(html);
			// $(".bdDist").trigger("chosen:updated");
		});	
	});
	
	/* retain the client contact tab */
	if($('#add_client').length > 0){
		if($('#add_client').val() == 'client' || $('#add_client').val() == ''){ 
			$('.cli_tab').addClass('active');
			$('#mbox_client').addClass('active');
			$('.con_tab').removeClass('active');
			$('#mbox_client_contact').removeClass('active');
		}else if($('#add_client').val() == 'contact'){ 
			$('.con_tab').addClass('active');
			$('#mbox_client_contact').addClass('active');
			$('.cli_tab').removeClass('active');
			$('#mbox_client').removeClass('active');			
		}
	}
	
	/* function to call when the client contact tab change */
	$('.clitabChange').click(function(){
		$('#add_client').val($(this).attr('rel'));
	});
	
	/* function to call when the position tab change */
	$('.postabChange').click(function(){
		$('#add_position').val($(this).attr('rel'));
	});
	
	/* retain the client contact tab */
	if($('#add_position').length > 0){
		if($('#add_position').val() == 'basic' || $('#add_position').val() == ''){ 
			$('.basic').addClass('active');
			$('#basic').addClass('active');
			$('.job_desc').removeClass('active');
			$('#job_desc').removeClass('active');
			$('.coordination').removeClass('active');
			$('#coordination').removeClass('active');
		}else if($('#add_position').val() == 'job_desc'){ 
			$('.job_desc').addClass('active');
			$('#job_desc').addClass('active');
			$('.basic').removeClass('active');
			$('#basic').removeClass('active');
			$('.coordination').removeClass('active');
			$('#coordination').removeClass('active');			
		}else if($('#add_position').val() == 'coordination'){ 
			$('.coordination').addClass('active');
			$('#coordination').addClass('active');
			$('.basic').removeClass('active');
			$('#basic').removeClass('active');
			$('.job_desc').removeClass('active');
			$('#job_desc').removeClass('active');				
		}
	}
	
	/* function to call when the resume tab change */
	$('.resaddtabChange').click(function(){
		$('#add_resume').val($(this).attr('rel'));
	});
	
		/* retain the resume add / edit tab */
	if($('#add_resume').length > 0){
		if($('#add_resume').val() == 'personal' || $('#add_resume').val() == ''){ 
			$('.personal').addClass('active');
			$('#mbox_Personal').addClass('active');
			$('.education').removeClass('active');
			$('#mbox_Education').removeClass('active');
			$('.exp').removeClass('active');
			$('#mbox_Experience').removeClass('active');
			$('.assess').removeClass('active');
			$('#mbox_Consultant').removeClass('active');
		}else if($('#add_resume').val() == 'education'){ 
			$('.personal').removeClass('active');
			$('#mbox_Personal').removeClass('active');
			$('.education').addClass('active');
			$('#mbox_Education').addClass('active');
			$('.exp').removeClass('active');
			$('#mbox_Experience').removeClass('active');
			$('.assess').removeClass('active');
			$('#mbox_Consultant').removeClass('active');			
		}else if($('#add_resume').val() == 'exp'){ 
			$('.personal').removeClass('active');
			$('#mbox_Personal').removeClass('active');
			$('.education').removeClass('active');
			$('#mbox_Education').removeClass('active');
			$('.exp').addClass('active');
			$('#mbox_Experience').addClass('active');
			$('.assess').removeClass('active');
			$('#mbox_Consultant').removeClass('active');				
		}else if($('#add_resume').val() == 'assess'){ 
			$('.personal').removeClass('active');
			$('#mbox_Personal').removeClass('active');
			$('.education').removeClass('active');
			$('#mbox_Education').removeClass('active');
			$('.exp').removeClass('active');
			$('#mbox_Experience').removeClass('active');
			$('.assess').addClass('active');
			$('#mbox_Consultant').addClass('active');				
		}
	}
	
	// open the error tab in add / edit resume page
	if($('#tab_open').length > 0){ 
		if($('#tab_open').val() != ''){
			open_tab = $('#tab_open').val();
			switch(open_tab){
				case 'tab1':
				$('.personal').addClass('active');
				$('#mbox_Personal').addClass('active');
				$('.education').removeClass('active');
				$('#box_edu').removeClass('active');
				$('.exp').removeClass('active');
				$('#box_exp').removeClass('active');
				$('.assess').removeClass('active');
				$('#mbox_Consultant').removeClass('active');
				break;
				case 'tab2':
				$('.personal').removeClass('active');
				$('#mbox_Personal').removeClass('active');
				$('.education').addClass('active');
				$('#mbox_Education').addClass('active');
				$('.exp').removeClass('active');
				$('#mbox_Experience').removeClass('active');
				$('.assess').removeClass('active');
				$('#mbox_Consultant').removeClass('active');
				break;
				case 'tab3':
				$('.personal').removeClass('active');
				$('#mbox_Personal').removeClass('active');
				$('.education').removeClass('active');
				$('#mbox_Education').removeClass('active');
				$('.exp').addClass('active');
				$('#mbox_Experience').addClass('active');
				$('.assess').removeClass('active');
				$('#mbox_Consultant').removeClass('active');
				break;
				case 'tab4':
				$('.personal').removeClass('active');
				$('#mbox_Personal').removeClass('active');
				$('.education').removeClass('active');
				$('#mbox_Education').removeClass('active');
				$('.exp').removeClass('active');
				$('#mbox_Experience').removeClass('active');
				$('.assess').addClass('active');
				$('#mbox_Consultant').addClass('active');
				break;
				
			}
		}
	}
	
	/* function to call when the formatted resume tab change */
	$('.restabChange').click(function(){
		$('#add_formatted_resume').val($(this).attr('rel'));
	});
	
		/* retain the formatted resume add / edit tab */
	if($('#add_formatted_resume').length > 0){
		if($('#add_formatted_resume').val() == 'personal' || $('#add_formatted_resume').val() == ''){
			$('.personal').addClass('active');
			$('#box_Personal').addClass('active');
			$('.education').removeClass('active');
			$('#box_edu').removeClass('active');
			$('.exp').removeClass('active');
			$('#box_exp').removeClass('active');
			$('.training').removeClass('active');
			$('#box_train').removeClass('active');
			$('.assess').removeClass('active');
			$('#box_Consultant').removeClass('active');
		}else if($('#add_formatted_resume').val() == 'education'){ 
			$('.personal').removeClass('active');
			$('#box_Personal').removeClass('active');
			$('.education').addClass('active');
			$('#box_edu').addClass('active');
			$('.exp').removeClass('active');
			$('#box_exp').removeClass('active');
			$('.training').removeClass('active');
			$('#box_train').removeClass('active');
			$('.assess').removeClass('active');
			$('#box_Consultant').removeClass('active');			
		}else if($('#add_formatted_resume').val() == 'exp'){ 
			$('.personal').removeClass('active');
			$('#box_Personal').removeClass('active');
			$('.education').removeClass('active');
			$('#box_edu').removeClass('active');
			$('.exp').addClass('active');
			$('#box_exp').addClass('active');
			$('.training').removeClass('active');
			$('#box_train').removeClass('active');
			$('.assess').removeClass('active');
			$('#box_Consultant').removeClass('active');				
		}else if($('#add_formatted_resume').val() == 'assess'){ 
			$('.personal').removeClass('active');
			$('#box_Personal').removeClass('active');
			$('.education').removeClass('active');
			$('#box_edu').removeClass('active');
			$('.exp').removeClass('active');
			$('#box_exp').removeClass('active');
			$('.training').removeClass('active');
			$('#box_train').removeClass('active');
			$('.assess').addClass('active');
			$('#box_Consultant').addClass('active');				
		}else if($('#add_formatted_resume').val() == 'training'){ 
			$('.personal').removeClass('active');
			$('#box_Personal').removeClass('active');
			$('.education').removeClass('active');
			$('#box_edu').removeClass('active');
			$('.exp').removeClass('active');
			$('#box_exp').removeClass('active');
			$('.training').addClass('active');
			$('#box_train').addClass('active');
			$('.assess').removeClass('active');
			$('#box_Consultant').removeClass('active');				
		}
	}
	
	// open the error tab in add / edit formatted resume page
	if($('#tab_open_resume').length > 0){ 
		if($('#tab_open_resume').val() != ''){
			open_tab_full = $('#tab_open_resume').val();
			switch(open_tab_full){
				case 'tab1':
				$('.personal').addClass('active');
				$('#box_personal').addClass('active');
				$('.education').removeClass('active');
				$('#box_edu').removeClass('active');
				$('.exp').removeClass('active');
				$('#box_exp').removeClass('active');
				$('.training').removeClass('active');
				$('#box_train').removeClass('active');
				$('.assess').removeClass('active');
				$('#box_Consultant').removeClass('active');
				break;
				case 'tab2':
				$('.personal').removeClass('active');
				$('#box_personal').removeClass('active');
				$('.education').addClass('active');
				$('#box_edu').addClass('active');
				$('.exp').removeClass('active');
				$('#box_exp').removeClass('active');
				$('.training').removeClass('active');
				$('#box_train').removeClass('active');
				$('.assess').removeClass('active');
				$('#box_Consultant').removeClass('active');
				break;
				case 'tab3':
				$('.personal').removeClass('active');
				$('#box_personal').removeClass('active');
				$('.education').removeClass('active');
				$('#box_edu').removeClass('active');
				$('.exp').addClass('active');
				$('#box_exp').addClass('active');
				$('.training').removeClass('active');
				$('#box_train').removeClass('active');
				$('.assess').removeClass('active');
				$('#box_Consultant').removeClass('active');
				break;
				case 'tab4':
				$('.personal').removeClass('active');
				$('#box_personal').removeClass('active');
				$('.education').removeClass('active');
				$('#box_edu').removeClass('active');
				$('.exp').removeClass('active');
				$('#box_exp').removeClass('active');
				$('.training').addClass('active');
				$('#box_train').addClass('active');
				$('.assess').removeClass('active');
				$('#box_Consultant').removeClass('active');
				break;
				case 'tab5':
				$('.personal').removeClass('active');
				$('#box_personal').removeClass('active');
				$('.education').removeClass('active');
				$('#box_edu').removeClass('active');
				$('.exp').removeClass('active');
				$('#box_exp').removeClass('active');
				$('.training').removeClass('active');
				$('#box_train').removeClass('active');
				$('.assess').addClass('active');
				$('#box_Consultant').addClass('active');
				break;
				
			}
		}
	}
	
	// for fetch Degree
	/*
	$(".qualification_id").change(function (){ 
		var qualification_name = $(this).val();
		 var qual_id = $(this).attr('id').split('_');	
		
		 $.ajax({
			url : "get_degree.php",
			method : "GET",
			dataType: "json",
			data : {qualification : qualification_name},
			encode  : false
		})
			.done(function (data){
				var div_data = '<option value="">Select</option>';
				$.each(data,function (a,y){ 
					div_data +=  "<option value="+a+">"+y+"</option>";
				});
            $('#degree_'+qual_id[1]).empty();
            $('#specialization_'+qual_id[1]).empty();
            $('#degree_'+qual_id[1]).html(div_data); 
		});
	});	
		
	// for fetch Specialization
	$(".degree_id").change(function (){
		var degree_name = $(this).val();
		var degree_id = $(this).attr('id').split('_');	
		$.ajax({
			url : "get_specialization.php",
			method : "GET",
			dataType: "json",
			data : {degree : degree_name},
			encode  : false
		})
			.done(function (data){
				var div_data = '<option value="">Select</option>';
				$.each(data,function (a,y){ 
					div_data +=  "<option value="+a+">"+y+"</option>";
				});
          
            $('#specialization_'+degree_id[1]).empty();
            $('#specialization_'+degree_id[1]).html(div_data);  
			 
		});
	});
	*/
	/* function for sticky header */
	if($('.stickyTable').length > 0){
		$('.stickyTable').stickyTableHeaders();
	}
	
	/* for changing the dashboard view */
	$('.dash_view').click(function(){
		location.href = $(this).attr('rel');
	});
	
	/* for status alert options */
	$('.confirm_status').on('click',function(e){
				e.preventDefault();
				smoke.confirm("Are you sure you want to change status?",function(e){
					if (e){
						// smoke.alert('Ok, Deleted...', false, {ok: "Thanks"});
					}else{
						// smoke.alert('Please...me so sorry. You look good in dress, you look better on my floor.', false, {ok: "Uhh...bye?"});
					}
				}, {
					reverseButtons: true,
					ok: "Yes",
					cancel: "No"
				});
	});
		
	
	// datepicker
	if($('.datepick').length > 0){	
		$('.datepick').datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			format: 'dd/mm/yyyy',
			prevText: "",
			nextText: "",
			autoclose:true,
			startDate:$('#start_date').val(),
			endDate:$('#end_date').val(),
			todayHighlight: false
		});
	
	}

   /* function to update max drop down */
	$('.minDrop').unbind().change(function(){
		cur_obj = $(this).attr('id');		
		option_id = $(this).attr('rel');
		val = parseFloat($(this).val());
		$('#'+option_id).append('<option>Loading...</option>');
		html = "<option value=''>Max</option>";
		$('#'+cur_obj+' option').each(function(){
			// allow only values equals or greater than
			if(val < $(this).val()){
				html += '<option value='+$(this).val()+'>'+$(this).text()+'</option>';
			}
		});
		$('#'+option_id).empty();
		$('#'+option_id).append(html);

	});
	
	/* function to switch the view resume tabs */
	if($('.restabChange').length > 0){
		$('.restabChange').click(function(){ 
			if($(this).attr('val') == '1'){
				show_div = $(this).attr('rel');
				if(show_div == 'interview'){
					$('.allCol').hide();
					$('.'+show_div).show();
				}else{
					$('.allRow').hide();
					$('.'+show_div+'Row').show();
					$('.allCol').hide();
					$('.'+show_div).show();
				}
			}
		});
	}
	
	/* function to close the tip 
	$('#piechart').on('click',function(){
		$('.popover2').hide();
		$('.piechart1').val(0);
	});
	*/
	
	$(document).on('click',function(){
		$('.popover2').hide();
		$('.piechart1').val(0);
	});
	
	/* $(document).click(function(){ 
		if($('.piechart1').val() == '1'){
			$('.popover2').hide();
			$('.piechart1').val(0);
		}
	 });*/
	 
	 /* notification for downloading */
	 $(".notify").click(function(){
		var $el = $(this);
		var title = $el.attr('data-notify-title'),
		message = $el.attr('data-notify-message'),
		time = $el.attr('data-notify-time'),
		sticky = $el.attr('data-notify-sticky'),
		overlay = $el.attr('data-notify-overlay');

		$.gritter.add({
			title: 	(typeof title !== 'undefined') ? title : 'Message - Head',
			text: 	(typeof message !== 'undefined') ? message : 'Body',
			image: 	(typeof image !== 'undefined') ? image : null,
			sticky: (typeof sticky !== 'undefined') ? sticky : false,
			time: 	(typeof time !== 'undefined') ? time : 3000
		});
		
		
	});
	
	// datatable
	if($('#myDataTable').length > 0){
		$('#myDataTable').DataTable({
			"paging":   false,
			"ordering": true,
			"info":     true,
			'searching' : false
		});
	}
	
	/* toggle home page search in bd */
	$('.homeSrch').click(function(){
		if ($('.homeSrchBox').is(":hidden")){
			$('.homeSrchBox').show();
			$('#srchSubmit').val(1);
		}else{
			$('.homeSrchBox').hide();
			$('#srchSubmit').val(0);
		}
	});
	
	if($('.homeSrch').length > 0){
		if ($('#srchSubmit').val() == '1'){
			$('.homeSrchBox').show();
		}else{
			$('.homeSrchBox').hide();
		}
	}
	
	// show tooltip for icons	
	$('[rel=tooltip]').tooltip({html:true});
	
	$("[rel=preview]").popover({html:true});
	
	/* to redirect */
	$(".jsRedirect").each(function() {
		$(this).click(function() {
			location.href=jQuery(this).attr("href");
		});
	});
	
	$('.goback').click(function(){		
		 window.history.go(-1);
		 location.href = $(this).attr('val');
	});
	
	// load the color box
	$('.iframeBox').click(function(){
			load_colorBox(this, $(this).attr('val'));	
	});	
	
	// when the enter key is pressed in reply
		$('#replyMsg').on('click', function(e){ 
			reply = $('#reply_msg').val();
			new_value = reply.replace(/\n/g, "<br>");
			valid = validate_tsk('Reply');
			// if validation success				
			if(valid){
				$('.Reply').removeClass('sh_error');				
				$('.messages').hide();
				// load the preloader
				$('.typing').show();					
				// update the table					
				update_reply($.trim(new_value), $('#webroot').val()+'save_reply/?id='+$('#bd_id').val());
			}else{
				$('.Reply').addClass('sh_error');				
				return false;
			}				
			
		});
		
		/* when unread btn is clicked */
		$('.unreadLink').click(function(){
			$('.unreadCount').hide();
		});
		
		// Can also be used with $(document).ready()
		
		/*
		if($('.flexslider2').length > 0){
			jQuery('.flexslider2').flexslider({
				animation: "slide",
				animationLoop: false,
				itemWidth: 140,
				itemMargin: 15,
				maxItems: 7,
				controlNav: true,
				directionNav:true
			});
		}
		*/
		
		/* function to call the mutiple select */
		if($('.multiSelectOpt').length > 0){
			$('.multiSelectOpt').multiSelect({ selectableOptgroup: true });
		}
	
	
});

/* function to update bd reply */
function update_reply(data,url){		
	$.ajax({
		url: url,
		type: "POST",
		data: {reply : data}
	}).done(function(html){		
		$('.typing').hide();
		$('.messages').show();
		$('.replyMsg').html(html);
		$('.Reply').val('');
	});		
}

/* function to load the color box */
function load_colorBox(obj, size){ 
		// email to friends	
		if($(obj).attr('val') != '' && $(obj).attr('val') != undefined) {		
			dim = $(obj).attr('val').split('_');
			width = dim[0];
			height = dim[1];
		
			if($('#overlayclose').length > 0){
				over_close = false;
				esc = false;
				$('#cboxClose').show();	
				if($('#overlayclose').val() > 0){
					$('#cboxClose').hide();
				}			
			}else{
				over_close = true;
				esc = true;
			}
			
			$(obj).colorbox({iframe:true, rel: 'nofollow',  width:width+'%', height:height+'%',opacity:   '.8', 	  scrolling: true, fixed:true,overlayClose:over_close, escKey: esc,
			onClosed:function(){					
			
				}
			
			});
		}
}
/* function to validate task form */
	function validate_tsk(id){
		if($.trim($('.'+id).val()) !=''){
			return true;
		}else{
			return false;
		}
	}