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
 $("#toTop").click(function(){ 
// Disable the default behaviour when a user clicks an empty anchor link.
 // (The page jumps to the top instead of // animating)
 event.preventDefault();
 
// Animate the scrolling motion.
 $("html, body").animate({
 scrollTop:0
 },"slow");
 
});

});