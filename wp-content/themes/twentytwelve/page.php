<?php /* Template name:about-page */ ?>  
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
					<div class="right-header"><?php the_title(); $title = the_title('', '', false);?></div>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php //comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
			<div class="left-div" style="margin-top: 66px;">
					<?php if(the_title("","",false)!="About" && the_title("","",false)!="Sitemap" ):?>
					
						<div class="inner-left-div">

						
						<ul class="left-menu">
						<?php
						
						$id=$post->post_parent;
						wp_list_pages("depth=1&child_of=".$id ."&title_li=");
						
																
						?>
						</ul>
						
						<ul class="left-menu">
						<?php
								$category_query_args = array(
    							'category_name' => the_title("","",false)
								);

								$category_query = new WP_Query( $category_query_args );
								
								if ( $category_query->have_posts() ) : 
									
									while ($category_query->have_posts()) : 
										$category_query->the_post();
										$temp_title = the_title('', '', false);
										$class = "";
										if($temp_title==$title)
											$class="current";
										echo "<li class='$class'><a href=". get_permalink($post->ID)." class='a-services'>$temp_title </a></li>";
									endwhile;
								
								endif;
								
						?>
						</ul>
					</div>	
					
					
					
					
					<?php else:  
						$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
					?>
					<a class="group1" href="<?php echo $imgsrc[0];?>" title="" >
					
						<?php echo get_the_post_thumbnail();
						endif;
						?> 
					</a>				
				</div>
			</div>	
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>