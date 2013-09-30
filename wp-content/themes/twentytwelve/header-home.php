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
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.gif" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.gif" type="image/x-icon" />
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/facebookshare.jpg" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width" />
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
<script>
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				$(".group1").colorbox({rel:'group1'});
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
<!-- color-box ends -->

<!-- flex slider -->
<link href="<?php echo get_template_directory_uri(); ?>/flexslider.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider.js" type="text/javascript"></script>
<!-- Hook up the FlexSlider -->
		<script type="text/javascript">
			$(window).load(function() {
				$('.flexslider').flexslider();
			});
		</script>
<!-- flex slider ends -->


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<section class="container">
<header class="block">
<div id="nav-div">
		<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu') ); ?>

		</nav>
</div>
</header>
<?php 

?>
<div id="home-top-div">
	
		 
		<div class="flexslider" >
		    <ul class="slides">
		    	
		    	<?php 
		    	
		    		if ( have_posts() ) : while ( have_posts() ) : the_post();
	
					$args = array(
							'post_type' => 'attachment',
							'numberposts' => -1,
							'post_status' => null,
							'post_parent' => $post->ID
					);
	
					$attachments = get_posts( $args );
					if ( $attachments ) {
						foreach ( $attachments as $attachment ) {
							echo '<li>';
							echo wp_get_attachment_image( $attachment->ID, 'full' );
							echo '<p class="flex-caption">';
								
							echo '<span><img src="'; echo get_template_directory_uri(); echo '/images/Logo.png" style="width:auto;"></span>';
							//echo apply_filters( 'the_title', $attachment->post_title );
							echo '</p>';
							echo '</li>';
						}
					}
	
	 				endwhile; endif;
	 				
	 			?>
		    </ul>
		    	
		 </div>
		 <div class="main_total_top_holder">
		 <div class="header_container_div">
		 <div id="home-top-inner">	The Right Move on the IP Chessboard</div>
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