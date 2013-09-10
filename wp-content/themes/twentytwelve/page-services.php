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
				<div class="left-header"><span><?php the_title(); ?> <?php _e('Fields','twentytwelve');?></span></div>
					<div class="inner-left-div">
						
						
						<ul class="left-menu">
						
						<?php
							$id=$post->ID;
							$children =wp_list_pages("depth=1&child_of=".$id ."&title_li=");
						?>
						<?php
							echo $children;
						?>
						
						<div class="left-text-header"><span><?php _e('More Services','twentytwelve');?> </span></div>
						<?php 
						if ( 0 == $post->post_parent ) {
    						$id=get_page_by_title(the_title("","",false));
							} else {
							    $parents = get_post_ancestors( $post->ID );
							    $id= end ($parents ) ;
							}
							$children =wp_list_pages("depth=1&child_of=".$id ."&title_li=");
							echo $children;
						?>
						
						<div class="left-text-header"><span><?php _e('Team Services','twentytwelve');?> </span></div>
									
									<?php $my_query = new WP_Query(array( 'meta_key' => '_wp_page_template', 'meta_value' => 'page-team.php','category_name' => the_title("","",false))); ?>
                					<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    				<?php 
                    					$temp_title = the_title('', '', false);
                    					echo "<li class='$class'><a href=". get_permalink($post->ID)." class='a-services'>".$temp_title ." ></a></li>"; 
                    				?>	
                					<?php endwhile; ?>			
						
						</ul>
					</div>	
			</div>	
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>

