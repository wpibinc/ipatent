
function accordion(selector){

	selector.toggleClass('active');

	if (selector.hasClass('active')) {
		selector.slideDown();
	} else {
		selector.slideUp();
	}

}

$(window).on('resize', function(){
	if($(this).width() > 950){
		if(!$('.mobile-accordion').hasClass('desktop-accordion')){

			$('.mobile-accordion .left-menu').removeAttr('style');
		}
	}
});

$(document).ready(function(){

	$('.mobile-accordion .left-text-header').on('click', function () {
		if ($(window).width() <= 960 || $(this).closest('.mobile-accordion').hasClass('desktop-accordion')) {

			$(this).toggleClass('active');

			if ($(this).hasClass('active')) {
				$(this).siblings('.left-menu').slideDown();
			} else {
				$(this).siblings('.left-menu').slideUp();
			}
		}

	});

	$('.open-mobile-menu-ico').on('click', function (e) {
		e.stopPropagation();
		e.preventDefault();

		accordion($('.main-navigation ul.nav-menu'))

	});

	$('body *').on('click',  function (e) {

		e.stopPropagation();

		if(!$(e.target).hasClass('open-mobile-menu-ico') && !$(e.target).parent().hasClass('menu-item')){
			$('.main-navigation .active').each(function () {
				$(this).slideUp();
				$(this).removeClass('active');
			});
		}
	});

	$('.main-navigation .nav-menu .sub-menu .menu-item a').on('click', function (e) {

		var subMenu2 = $(this).siblings('.sub-menu');

		if (subMenu2.length) {
			e.stopPropagation();
			e.preventDefault();
		}

		accordion(subMenu2);

	});

	$(".footer-logo-div").hover(function(){
		
			$(this).removeClass("grayscale");
			},
			function(){
				$(this).addClass("grayscale");
	
	});
		
	$(".grayscale").hover(function(){
		
		$(this).removeClass("grayscale");
		},
		function(){
			$(this).addClass("grayscale");

});
	
		
});