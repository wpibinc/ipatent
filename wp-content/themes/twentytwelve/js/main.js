$(document).ready(function(){

	$('.open-mobile-menu').on('click', function (e) {

		e.stopPropagation();
		e.preventDefault();

		var menu = $('.main-navigation ul.nav-menu');
		if (menu.hasClass('active')) {
			menu.slideUp();
			menu.removeClass('active');
		} else {
			menu.slideDown();
			menu.addClass('active');
		}

	});

	$('body *').on('click',  function (e) {

		e.stopPropagation();

		if(!$(e.target).hasClass('open-mobile-menu') && !$(e.target).parent().hasClass('menu-item')){
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

		if (subMenu2.hasClass('active')) {
			subMenu2.slideUp();
			subMenu2.removeClass('active');
		} else {
			subMenu2.slideDown();
			subMenu2.addClass('active');
		}

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