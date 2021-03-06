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


?>
<!DOCTYPE html>

<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!-- [if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
<![endif]-->

<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />



<meta name="keywords" content="<?php
		if ( is_home() )
			echo ', Patent, Trademark, Patent Firm';
		else
			wp_title( '|', true, 'right' ); echo ', Patent, Trademark, Patent Firm'; ?>"  />
<meta name="description" content="<?php
		if ( is_home() )
			echo 'Ehrlich & Fenster is a leading Israel based Patent Attorneys Firm. The Firm specializes in all matters concerning protection and prose- cution of Intellectual Property';
		else
			wp_title( '|', true, 'right' ); echo 'Ehrlich & Fenster is a leading Israel based Patent Attorneys Firm. The Firm specializes in all matters concerning protection and prose- cution of Intellectual Property'; ?>" />

<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.gif" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.gif" type="image/x-icon" />
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/facebookshare.jpg" />
<meta http-equiv="X-UA-Compatible" content="IE=9">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' );?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-9.js" type="text/javascript"></script>

<link href="<?php echo get_template_directory_uri(); ?>/font/Alef/Alef-Webfont/stylesheet.css" rel="stylesheet" type="text/css"/>

<!-- color-box -->
<link href="<?php echo get_template_directory_uri(); ?>/colorbox.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.colorbox.js" type="text/javascript"></script>

<link href="<?php echo get_template_directory_uri(); ?>/flexslider.css" rel="stylesheet" type="text/css"/>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.js" type="text/javascript"></script>

<script>
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				$(".group1").colorbox({rel:'group1', onComplete: function(){
	                var title = $('.cboxIframe')[0].contentWindow.document.title;
	                $('#cboxTitle').text(title);
	            }});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
				$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});

				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>




<?php wp_head();
global  $bcn;
$bcn =  bcn_display(true);

?>
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
	<header class="block">
		<div id="nav-div">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="mobile-block">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="mobile-logo" src=" <?php echo get_template_directory_uri() . '/images/Logo.png'; ?>"></a>
					<div class="open-mobile-menu"><img class="open-mobile-menu-ico" src="<?php echo get_template_directory_uri() . '/images/open-mobile-ico.png' ?>"></div>
					<div class="clearfix"></div>
				</div>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</nav>
		</div>
	</header>
	<?php

	?>
	<div class="top-div img-<?php echo rand(1, 7); ?>">
	   <div class="main_total_top_holder" style="top:108px;">
		 <p class="flex-caption erlich-fenster-logo"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="לדף הביח"><img src="http://www.ipatent.co.il/wp-content/themes/twentytwelve/images/Logo.png" style="width:280px;"></a> </span></p>
		<p class="flex-caption ipatent-logo"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="לדף הביח"><img src="<?php echo get_template_directory_uri()."/images/iPatent_orange_logo.png";?>" style="width:210px;"></a> </span></p>
		 </div>
	</div>
<section class="container">



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
