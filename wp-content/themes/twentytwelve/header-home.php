<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> class="home-page">
<!--<![endif]-->
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.gif" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.gif" type="image/x-icon" />
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/facebookshare.jpg" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->
<!--[if lt IE 8]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-9.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js" type="text/javascript"></script>

<link href="<?php echo get_template_directory_uri(); ?>/font/Alef/Alef-Webfont/stylesheet.css" rel="stylesheet" type="text/css"/>

<!-- color-box -->
<link href="<?php echo get_template_directory_uri(); ?>/colorbox.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.colorbox.js" type="text/javascript"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.js" type="text/javascript"></script>

<style>


<?php
 $args = array(
			 'post_type' => 'attachment',
			 'numberposts' => 1,
			 'post_status' => null,
			 'post_parent' => $post->ID
		 );
		 $i=1;
		 $attachment = get_posts( $args );
		 $attachment = $attachment[0];
		  $img = wp_get_attachment_image_src( $attachment->ID, 'full' );
?>
.slide{
   background-image: url("<?php echo $img[0]; ?>");
    background-repeat: no-repeat;
	background-position: center;
}

</style>
<script>
	function resizeHomeTopImage(){

		var windowVar = $(window),
			topImageCont = $('#home-top-div');

		if (windowVar.width() < 960) {

			topImageCont.css('height', windowVar.height() / 2);

		}else{

			topImageCont.removeAttr('style')

		}
	}
			$(document).ready(function(){

//		        i = 1;
//		        setInterval(function(){
//		            if(i <= <?php //echo $i; ?>//){
//
//		                $('#slide-'+i).fadeOut(1300, function() {
//    			                i++;
//    			                if(i >= <?php //echo $i; ?>//){
//        			                i = 1;
//        			            }
//    		                    $(this).attr("id","slide-"+i);
//		                    }).fadeIn( 1300 );
//		                }
//		                else{
//		                	i=1;
//		                }
//		        }, 4000);



				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});

				$(window).on('resize', function () {
					resizeHomeTopImage();
				});
				resizeHomeTopImage()
			});
		</script>
<!-- color-box ends -->

<!-- flex slider -->
<link href="<?php echo get_template_directory_uri(); ?>/flexslider.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider.js" type="text/javascript"></script>
<!-- Hook up the FlexSlider -->
		<script type="text/javascript">
			$(document).ready(function() {
				$("#my-arrow").on("click", function () {
					$("#my-form").trigger("submit");
				});
				$("#my-form").on("submit", function(e) {
					$.ajax({
						type: "POST",
						url: "https://my.ipatent.co.il/handlers/login.php",
						cache: false,
						async: false,
						data: {
							cmd: "login",
							uname: jQuery("input[name='uname']").val(),
							upass:  jQuery("input[name='upass']").val()
						}
					}).done(function(data) {
						if((data != null) && (data.length > 0)) {
							var resp = eval ("(" + data + ")");
							if(resp.status == "OK") {
								return;
							} else {
								$('#my-errors').text('Authentication failure');
								e.preventDefault();
							}
						} else {
							$('#my-errors').text("Bad response from Server");
							e.preventDefault();
						}
					});
				});
			});
		</script>
<!-- flex slider ends -->


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MSL7X3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MSL7X3');</script>
<!-- End Google Tag Manager -->
<div id="wrap">
<section class="container">
<header class="block">
<div id="nav-div">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="mobile-block">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="mobile-logo" src=" <?php echo get_template_directory_uri() . '/images/Logo.png'; ?>"></a>
				<div class="open-mobile-menu"><img class="open-mobile-menu-ico" src="<?php echo get_template_directory_uri() . '/images/open-mobile-ico.png' ?>"></div>
				<div class="clearfix"></div>
			</div>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu') ); ?>

		</nav>
</div>
</header>
<?php

?>
<div id="home-top-div">


		<div class="flexslider" >
		   <div class="slide">
		   </div>

		 </div>
		 <div class="main_total_top_holder">
		 <?php
		 echo '<p class="flex-caption">';

		 echo '<span><img src="'; echo get_template_directory_uri(); echo '/images/Logo.png" style="width:265px;"></span>';
		 //echo apply_filters( 'the_title', $attachment->post_title );
		 echo '</p>';
		 ?>
			 <div class="header_container_div">
			 	<!-- <div id="home-top-inner">	The Right Move on the IP Chessboard</div> -->
			 				 <div class="clearfix"></div>
			 <div  class="port-ip" >
				 <p>My IP Portfolio</p>
				 <form action="https://my.ipatent.co.il/handlers/login.php"  method="POST"  target="_blank" id="my-form">
				 <div class="inpts">
				 	<label for="uname"><?php if (ICL_LANGUAGE_CODE=='he') {?>שם משתמש<?php } else {?>User Name<?php }?></label>
				 	<input type="hidden" name="cmd" value="login" />
				 	<input type="hidden" name="redirect" value="http://my.ipatent.co.il/" />
				 	<input class=""  type="text" name="uname" />
				 	<label for="pass"><?php if (ICL_LANGUAGE_CODE=='he') {?>סיסמה<?php } else {?>Password<?php }?></label>
				 	<input class=""  type="password" name="upass" />
				 					 	 <div class="clearfix"></div>
				 	</div>
				 	<div class="inpts">
					<span id="my-errors"  style="
						font-family: sans-serif;
						color: red;
						float: left;
						margin-top: 3px;
						margin-left: 5px;
					"></span>
<span style="
    font-family: sans-serif;
    color: red;
    float: right;
    margin-top: 3px;
    margin-left: 5px;
" id="my-arrow">►</span>
				 	<input type="submit"  name="sub"  value=<?php if (ICL_LANGUAGE_CODE=='he') {?>"התחברות"<?php } else {?>"Log In"<?php }?>></input>
				 	 <div class="clearfix"></div>
				 	</div>
				 </form>
			 </div>
			 </div>

		 </div>
</div>

<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<!--<hgroup>
			 <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			 <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>-->


		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
	</header><!-- #masthead -->

	<div id="main" class="wrapper">
		<?php if(!(is_page_template('page-home.php'))):?>
		<div class="breadcrumbs">
		    <?php if(function_exists('bcn_display'))
		    {
		        bcn_display();
		    }?>
		</div>
		<?php endif;?>
