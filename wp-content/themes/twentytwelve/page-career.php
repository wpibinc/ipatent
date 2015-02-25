<?php /* Template name:career-page */ ?>  
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

	<div id="primary" class="site-content jobs-page">
		<div id="content" role="main">
			<div class="right">
				<header class="entry-header">
					<h1 class="entry-title"></h1>
				</header>
				<div class="right-header left-mobile-header">
					<?php echo $post->post_name;?>
				</div>
				<div class="right-header desctop-header"><?php the_title(); ?></div>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php //comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
			<div class="left-div">
				<?php $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");?>
				<a class="group1" href="<?php echo $imgsrc[0];?>" title="" ><?php echo get_the_post_thumbnail();?> </a>			
			</div>	
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>