	$(".cancel").click(function(){
		 parent.$.colorbox.close();
	});
	$(document).ready(function(){
		$('.theForm').on('click', function() {
			$('.cancel').hide();
		});
		// for multi candidate interview
		$('.firstLevel').change(function(){
			// alert('ravi');
		});
	});
		/* when the form submitted */
	$('.formID').submit(function(){ 		
		// Disable the 'Next' button to prevent multiple clicks		
		$('input[type=submit]', this).attr('value', 'Processing...');		
		$('input[type=submit]', this).attr('disabled', 'disabled');
		// hide cancel button
		$('button[type=button]', this).hide();
		$('.cancelBtn').hide();
		
	});
	
	/* when the form submitted */
	$('.formID').submit(function(){ 		
		// Disable the 'Next' button to prevent multiple clicks		
		$('input[type=submit]', this).attr('value', 'Processing...');		
		$('input[type=submit]', this).attr('disabled', 'disabled');
		// hide cancel button
		$('button[type=button]', this).hide();
		$('.cancelBtn').hide();
		
	});
	
	/* when account holder choose not applicable in interview */
	if($('.next_inter').length > 0){
		$('.next_inter').click(function(){
			if($(this).val() == 'N'){
				$('.offer-info').show();
			}else{
				$('.offer-info').hide();
			}
		});
	}
	
		/* editor */
	/* editor for position page*/ 
	if($('.wysiwyg').length > 0){
		$(function(){
			tinymce.init({
			  selector: 'textarea.wysiwyg',
			  body_class: 'wysiwygCls',
			  content_style: "@import url('https://fonts.googleapis.com/css?family=Open+Sans'); .wysiwygCls p {font-family:'Open Sans', sans-serif !important;font-size:12px !important;color:#555;line-height:18px;}",
			  theme: 'modern',
			  branding: false,
			  menubar: false,
			  statusbar: false,
			 // readonly: $('#tiny_readonly').val() == '' ? 0 : $('#tiny_readonly').val(),
			  plugins: [
				'advlist autolink lists link image charmap print preview anchor',
				'searchreplace visualblocks code fullscreen' ,
				'insertdatetime media table contextmenu paste code'
			  ],
			  toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
			});
		});
	}
	
		/* auto resize */
	if($('.wysiwyg1').length > 0){
		autosize(document.querySelectorAll('.wysiwyg1'));
	}
	
	/* for timepicker */
	if($('.timepicker').length > 0){
		$('.timepicker').timepicker();
	}
	
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
	
		// datepicker
	if($('.datetimepick').length > 0){
		
		/*
			$('.datetimepick').timepicker({
				defaultTime: 'current',
				minuteStep: 1,
				disableFocus: true,
				template: 'dropdown'
			});
		*/
		
		$('.datetimepick').datetimepicker({
			 format: "dd/mm/yyyy  hh:ii"
		});			
	}
	
	/* for print the graph */
	$(document).ready(function() {
		$("#printId").on('click', function(){ 
			$(".printArea").print({
					globalStyles: true,
					mediaPrint: false,
					stylesheet: null,
					noPrintSelector: ".no-print",
					iframe: true,
					append: null,
					prepend: null,
					manuallyCopyFormValues: true,
					deferred: $.Deferred(),
					timeout: 750,
					title: null,
					doctype: '<!doctype html>'
			});
		});		
	
    });
	
	/* validate multi candidate interview form */
	$(document).ready(function(){
		$('.intSubmit').click(function(){  
			var submit = true;
			// Loop over form input and select elements		
			$(".intForm input[type=text], select, input[type=checkbox], textarea").each(function(index,elem){			
				// If element has the class required check for a value		
				if($(this).val() == '' &&  $(this).hasClass('required') ) {
					$(this).addClass('missing');
					submit = false;				
				} else { 					
					// Remove class incase it had been set on previous try
					$(this).removeClass('missing'); 					
				}	
			}); 
			
			if(submit == true){
				// Disable the 'Next' button to prevent multiple clicks		
				$('.intSubmit').attr('value', 'Processing...');		
				$('.intSubmit').attr('disabled', 'disabled');
				// hide cancel button
				$('.intCancel', this).hide();
			}
			return submit;	
		});
	});
	
