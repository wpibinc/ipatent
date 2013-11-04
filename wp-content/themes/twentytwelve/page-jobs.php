<?php /* Template name:jobs-page */ ?>  
<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<div class="right">
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				<div class="right-header"><span>You can also contact us via the form below:</span></div>
				<div class="right-header"><span></span></div>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
			<div class="left-div">
				<h1 class="entry-title-hide"><?php the_title(); $title = the_title('', '', false);?></h1>
				<div class="left-header"><span>Our Offices:</span></div>
					<div class="inner-left-div">
						<?php dynamic_sidebar("jobs"); ?>
					</div>	
			</div>	
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>