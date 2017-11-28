	$(".cancel").click(function(){
		 parent.$.colorbox.close();
	});
	$(document).ready(function(){
		$('.theForm').on('click', function() {
			$('.cancel').hide();
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
			  readonly: $('#tiny_readonly').val() == '' ? 0 : $('#tiny_readonly').val(),
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
		$('.datetimepick').timepicker({
				defaultTime: 'current',
				minuteStep: 1,
				disableFocus: true,
				template: 'dropdown'
			});	
	}
	
	/* for print the graph */
	$(document).ready(function() {
		$("#printId").on('click', function(){ alert('ravi');
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
	
	
