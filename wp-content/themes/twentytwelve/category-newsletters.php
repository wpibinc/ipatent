<?php
/**
 * The template for displaying Category pages.
 *
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
/* Go to first post in category */
// while ( have_posts() ) : the_post();
// 	header("location:".get_permalink());
// 	exit;
/* Start the Loop */
	/* Include the post format-specific template for the content. If you want to
	 * this in a child theme then include a file called called content-___.php
	 * (where ___ is the post format) and that will be used instead.
	 */
	// get_template_part( 'content', get_post_format() );

// endwhile;
get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'twentytwelve' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				// get_template_part( 'content', get_post_format() );
				?>
				<h2><?php the_title(); ?></h2>
				<small><?php the_time('F jS, Y'); ?></small>
				<br />
				<br />
				<div class="newsletter-row">
					<div class="newsletter-thumb">
						<?php if( has_post_thumbnail() ):
							the_post_thumbnail();
						endif; ?>
					</div>
					<div class="newsletter-excerpt">
						<?php
						$excerpt = get_the_excerpt();
						$excerpt = substr($excerpt, 0, -11);
						echo $excerpt;
						?>
						<a href="<?php echo post_permalink();?>">Read more...</a>
					</div>
				</div>
				<br />
				<br />
				<br />
			<?php endwhile;

			twentytwelve_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>