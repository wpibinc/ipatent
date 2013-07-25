<?php /* Template name:team-page */ ?>  
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

get_header(); 
					$category = end(get_the_category());
					$current_name = $category->cat_name;
?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<div class="right">
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); $title = the_title('', '', false);?></h1>
				</header>
				<div class="right-header"><span><?php echo(types_render_field( "excerpt")); ?></span></div>
				<div class="right-img">
					<?php 
						$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
					?>
					<a class="group1" href="<?php echo $imgsrc[0];?>" title="" >
					
						<?php 
						$attr = array(
								'class' => 'grayscale'
						);
						echo get_the_post_thumbnail($post->ID, 'large-thumb', $attr);?> 
					</a>
					<!-- details under the image -->
					<div class="right-details">
						<?php if (types_render_field( "phone")) {?><span>Tel: <?php echo(types_render_field( "phone")); ?></span><?php } ?>
						<?php if (types_render_field( "email")) {?><span><img src="/wp-content/themes/twentytwelve/images/email.gif" />&nbsp;&nbsp;&nbsp; <?php echo(types_render_field( "email")); ?></span><?php } ?>
						<?php if (types_render_field( "linkedln")) {?><a><span><img src="/wp-content/themes/twentytwelve/images/linkedin.gif" />&nbsp;&nbsp;&nbsp;<?php echo(types_render_field( "linkedln")); ?></span></a><?php } ?>
						<?php if (types_render_field( "practice-areas")) {?><div class="practice-area">
							<span class="ptitle">Practice areas</span>
							<?php echo(types_render_field( "practice-areas")); ?>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="right-text" style="float:left;width:375px;">
					<div class="right-text-header1">Experience & Background</div>
					<div style="margin:5px 0 0 20px;">
						<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'page' ); ?>
						<?php endwhile; // end of the loop. ?>
					</div>
					<div class="right-text-header1">Resume</div>
					<div style="margin:5px 0 0 20px;word-break:break-word;width:351px;" class="resume-text"><?php echo(types_render_field("resume_field")); ?></div>
				</div>				
			</div>
			<div class="left-div">
				<div class="right-div-entry-title"></div>
				<div class="left-header"><span><?php echo $current_name;?> Team</span></div>
					<div class="inner-left-div">
						<ul class="left-menu">
						<?php
								$category_query_args = array(
    							'category_name' => "team"
								);

								$category_query = new WP_Query( $category_query_args );
								
								if ( $category_query->have_posts() ) : 
									
									while ($category_query->have_posts()) : 
										$category_query->the_post();
										$temp_title = the_title('', '', false);
										if($temp_title==$title)
											$class="current";
										else
											$class="";
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
