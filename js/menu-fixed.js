$(document).ready(function(){
	var altura = $('.menu').offset().top;
	
	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > altura ){
			$('.men').addClass('menu-fixed');
		} else {
			$('.men').removeClass('menu-fixed');
		}
	});
 
});