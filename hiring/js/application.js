$(document).ready(function (){ 

	
if($(".scrollable").length > 0){
    $('.scrollable').each(function () {
        var $el = $(this);
        var height = parseInt($el.attr('data-height')),
        vis = ($el.attr("data-visible") == "true") ? true : false,
        start = ($el.attr("data-start") == "bottom") ? "bottom" : "top";
		
        var opt = {
            height: height,
            color: "#666",
            start: start,
            allowPageScroll:true
        };
        if (vis) {
            opt.alwaysVisible = true;
            opt.disabledFadeOut = true;
        }
        $el.slimScroll(opt);
    });
}
});

$(window).resize(function(e){
   // checkLeftNav();
   // getSidebarScrollHeight();
   // resizeContent();
   // resizeHandlerHeight();
});

$(document).ready(function() {

// Hide the toTop button when the page loads.
 $("#toTop").css("display", "none");
 
 // This function runs every time the user scrolls the page.
 $(window).scroll(function(){
 
// Check weather the user has scrolled down (if "scrollTop()"" is more than 0)
 if($(window).scrollTop() > 0){
 
// If it's more than or equal to 0, show the toTop button.
// console.log("is more");
 $("#toTop").fadeIn("slow");
 }
 else {
 // If it's less than 0 (at the top), hide the toTop button.
 //console.log("is less");
 $("#toTop").fadeOut("slow");
 
}
 });
 
// When the user clicks the toTop button, we want the page to scroll to the top.
 $("#toTop").click(function(e){ 
// Disable the default behaviour when a user clicks an empty anchor link.
 // (The page jumps to the top instead of // animating)
 e.preventDefault();
 
// Animate the scrolling motion.
 $("html, body").animate({
 scrollTop:0
 },"slow");
 
});

});

/* [ ---- Gebo Admin Panel - datatables ---- ] */

	$(document).ready(function() {
		//* basic
		gebo_datatbles.dt_a();
		gebo_datatbles.dt_z();
		// horizontal scroll
		//gebo_datatbles.dt_b();
		//* large table
		//gebo_datatbles.dt_c();
		//* hideable columns
		//gebo_datatbles.dt_d();
		//* server side proccessing with hiden row
		//gebo_datatbles.dt_e();
	});
	
	//* calendar
	gebo_datatbles = {
		dt_a: function() {
			$('#dt_a').dataTable({
              
			   "sDom": "<'row'<'span6'<'dt_actions'>1><'span12'f>r>t<'row'<'span6'><'span6'p>>",
				"order": [[ 3, "desc" ]],
				// "info":     false,
                "sPaginationType": "bootstrap_alt",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page"
                }
			});				
		},
		dt_z: function() {
			$('#dt_z').dataTable({
                "sDom": "<'row'<'span6'<'dt_actions'>1><'span12'f>r>t<'row'<'span6'><'span6'p>>",
				"order": [[ 3, "desc" ]],
				// "info":     false,
                "sPaginationType": "bootstrap_alt",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page"
                }
            });
		},
        dt_b: function() {
			$('#dt_b').dataTable({
				"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
                "sScrollX": "100%",
                "sScrollXInner": '110%',
                "sPaginationType": "bootstrap",
                "bScrollCollapse": true 
            });
		},
		dt_c: function() {
            var aaData = [];
            for ( var i=1, len=1000 ; i<=len ; i++ ) {
                aaData.push( [ i, i, i, i, i ] );
            }
            
            $('#dt_c').dataTable({
				"sDom": "<'row'<'span6'><'span6'f>r>t<'row'<'span6'i><'span6'>S>",
                "sScrollY": "200px",
                "aaData": aaData,
                "bDeferRender": true
			});
            
            $('#fill_table').click(function(){
                var aaData = [];
                for ( var i=1, len=50000; i <= len; i++){
                    aaData.push( [ i, i, i, i, i ] );
                }
               
                $('#dt_c').dataTable({
                    "sDom": "<'row'<'span6'><'span6'f>r>t<'row'<'span6'i><'span6'>S>",
                    "sScrollY": "200px",
                    "aaData": aaData,
                    "bDestroy": true,
                    "bDeferRender": true
                });
                $(this).remove();
                $('#entries').html('50 000');
                $('.dataTables_scrollHeadInner').css({'height':'34px','top':'0'});
            });
		},
		dt_d: function() {
			function fnShowHide( iCol ) {
				/* Get the DataTables object again - this is not a recreation, just a get of the object */
				var oTable = $('#dt_d').dataTable();
				 
				var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
				oTable.fnSetColumnVis( iCol, bVis ? false : true );
			}
			
			var oTable = $('#dt_d').dataTable({
				"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
				"sPaginationType": "bootstrap"
			});
			
			$('#dt_d_nav').on('click','li input',function(){
				fnShowHide( $(this).val() );
			});
		},
		dt_e: function(){
			if($('#dt_e').length) {
				
				var oTable;
 
				/* Formating function for row details */
				function fnFormatDetails ( nTr )
				{
					var aData = oTable.fnGetData( nTr );
					var sOut = '<table cellpadding="5" cellspacing="0" border="0" class="table table-bordered" >';
					sOut += '<tr><td>Rendering engine:</td><td>'+aData[2]+' '+aData[5]+'</td></tr>';
					sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
					sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
					sOut += '</table>';
					 
					return sOut;
				}
				
				oTable = $('#dt_e').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
                    "sPaginationType": "bootstrap",
                    "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
					"sAjaxSource": "lib/datatables/server_side.php",
					"aoColumns": [
						{ "sClass": "center", "bSortable": false },
						null,
						null,
						null,
						{ "sClass": "center" },
						{ "sClass": "center" }
					],
					"aaSorting": [[1, 'asc']]
				} );
				
                 
				$('#dt_e').on('click','tbody td img', function () {
					var nTr = $(this).parents('tr')[0];
					if ( oTable.fnIsOpen(nTr) )
					{
						/* This row is already open - close it */
						this.src = "img/details_open.png";
						oTable.fnClose( nTr );
					} else {
						/* Open this row */
						this.src = "img/details_close.png";
						oTable.fnOpen( nTr, fnFormatDetails(nTr), 'details' );
					}
				} );

			}
		}
	};