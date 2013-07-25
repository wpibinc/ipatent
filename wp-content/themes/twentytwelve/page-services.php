<?php /* Template name:services-page */ ?>  
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
					<h1 class="entry-title"><?php the_title(); $title = the_title('', '', false);?></h1>
				</header>
				<div class="right-header"><span><?php echo(types_render_field( "excerpt")); ?></span></div>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
			<div class="left-div">
				<div class="right-div-entry-title"></div>
				<div class="left-header"><span>Patent Fields</span></div>
					<div class="inner-left-div">
						<ul class="left-menu">
						<?php
								$category_query_args = array(
    							'category_name' => "services"
								);

								$category_query = new WP_Query( $category_query_args );
								
								if ( $category_query->have_posts() ) : 
									
									while ($category_query->have_posts()) : 
										$category_query->the_post();
										$temp_title = the_title('', '', false);
										$class = "";
										if($temp_title==$title)
											$class="current";
										echo "<li class='$class'><a href=". get_permalink($post->ID)." class='a-services'>$temp_title ></a></li>";
									endwhile;
								
								endif;
								
						?>
						</ul>
					</div>	
			</div>	
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>

