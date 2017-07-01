$(document).ready(function() {
	
	/* when the form submitted */
	$('.formID').submit(function(){ 		
		// Disable the 'Next' button to prevent multiple clicks		
		$('input[type=submit]', this).attr('value', 'Processing...');		
		$('input[type=submit]', this).attr('disabled', 'disabled');
		// hide cancel button
		$('button[type=button]', this).hide();
		
	});
	
	/* function to switch the tabs */
	$('.tabChange').click(function(){	alert('ravi');
		show_div = $(this).attr('rel');
		alert(show_div);
		switch(show_div){
			case 'all':
			$('.cv_row').show();
			$('.status_row').hide();
			break;	
			case 'other_cv':
			$('.cv_row').hide();
			$('.status_row').show();
			break;			
		}			
		
	});
	
	
	
	/* load when the view position started */
	if($('.tabChange').length > 0){
		$('.allRow').show();
		// hide duplicate rows
		$('.duplicate').hide();
	}
	
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
	
	
	/* function for sticky header */
	$('.stickyTable').stickyTableHeaders();
	
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
	if($('.monthpick').length > 0){	
		$('.monthpick').datepicker({
			format: "mm-yyyy",
			startView: "months", 
			minViewMode: "months",
			autoclose:true,
		});
	
	}
	
	// function to hide the graph
	$('.hide_graph').unbind().on('click', function(){
		$('.graph').toggle();		
	});
	


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
	$('.restabChange').click(function(){ 
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
	});
	
	
	
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