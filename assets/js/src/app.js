$(document).ready(function() {
    $('.categories button').click(function(){
		$(this).toggleClass('active');
		$('.categories nav').toggleClass('open');
	});
    
    $('.filter_button').click(function(){
       $('.filters').toggleClass('open_filter'); 
    });
    
});
// Event on window resize
var resizeTimer;

$(window).on('resize', function(e) {
	clearTimeout(resizeTimer);
	// code to execute when window is resized
});