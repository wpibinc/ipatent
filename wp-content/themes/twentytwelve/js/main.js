$(document).ready(function(){

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