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
					if (isset($_GET['dep'])) $category = get_category_by_slug($_GET['dep']);
					else $category = get_category_by_slug(get_post_meta(get_the_ID(),"wpcf-main-team",true));
					$current_name = $category->cat_name;
?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<div class="right">
				<div class="right-header"><?php the_title(); $title = the_title('', '', false);?></div>
				<span><?php echo(types_render_field("degrees")); ?></span>
				<div class="right-img">
					<?php 
						$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "fullsize");
					?>
					<a class="group1" href="<?php echo $imgsrc[0];?>" title="" >
					
						<?php 
						$attr = array(
								'class' => 'grayscale'
						);
						echo get_the_post_thumbnail($post->ID, array(215,318), $attr);?> 
					</a>
					<!-- details under the image -->
					<div class="right-details">
						<div class="lbl">Tel:<span style="padding-left: 11px;">073-7919199</span></div>
						<div class="lbl">Fax:<span>073-7919100</span></div>
                        <?php if (types_render_field( "email")) {?><div class="lbl">Mail:<a href="<?php echo "mailto:"; echo(get_post_meta($post->ID, "wpcf-email",true)); echo "@ipatent.co.il"; ?>" target="_blank"><?php echo(get_post_meta($post->ID, "wpcf-email",true)); echo "@ipatent.co.il"; ?></a></div><?php } ?>
						<?php if (types_render_field( "linkedln")) {?><a><span><img src="/wp-content/themes/twentytwelve/images/linkedin.gif" />&nbsp;&nbsp;&nbsp;<?php echo(types_render_field( "linkedln")); ?></span></a><?php } ?>
						<?php if (types_render_field( "practice-areas")) {?><div class="practice-area">
							<p class="ptitle">Practice areas</p>
							<?php echo(types_render_field( "practice-areas")); ?>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="right-text" style="float:left;width:400px;">
					<div style="margin:0px 0 0 15px;word-break:break-word;padding: 0px 5px 0px 0px" class="resume-text">
					<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php endwhile; // end of the loop. ?>
					</div>
					
					<?php if(types_render_field("experience_field")!=""){?>
					<div class="right-text-header1">Experience & Background</div>
					<div style="margin:0px 0 0 20px;word-break:break-word;padding: 0px 5px 0px 0px" class="resume-text">
						<?php echo(types_render_field("experience_field")); ?>
					</div>
					<?php }?>
					
					<div class="right-text-header1">Resume</div>
					<div style="margin:0px 0 0 20px;word-break:break-word;padding: 0px 5px 0px 0px " class="resume-text"><?php echo(types_render_field("resume_field")); ?></div>
					
					<?php if(types_render_field("education_field")!=""){?>
					<div class="right-text-header1">Education</div>
					<div style="margin:0px 0 0 20px;word-break:break-word;padding: 0px 5px 0px 0px " class="resume-text"><?php echo(types_render_field("education_field")); ?></div>
					<?php }?>
					
					<?php if(types_render_field("academic_awards")!=""){?>
					<div class="right-text-header1">Academic Awards</div>
					<div style="margin:0px 0 0 20px;word-break:break-word;padding: 0px 5px 0px 0px " class="resume-text"><?php echo(types_render_field("academic_awards")); ?></div>
					<?php }?>
					
					<?php if(types_render_field("rankings_recognitions")!=""){?>
					<div class="right-text-header1">Rankings & Recognitions</div>
					<div style="margin:0px 0 0 20px;word-break:break-word;padding: 0px 5px 0px 0px " class="resume-text"><?php echo(types_render_field("rankings_recognitions")); ?></div>
					<?php }?>
					
					<?php if(types_render_field("voluntary_activities")!=""){?>		
					<div class="right-text-header1">Voluntary Activities</div>
					<div style="margin:0px 0 0 20px;word-break:break-word;padding: 0px 5px 0px 0px " class="resume-text"><?php echo(types_render_field("voluntary_activities")); ?></div>
					<?php }?>
					
					<?php if(types_render_field("admissions")!=""){?>	
					<div class="right-text-header1">Admissions</div>
					<div style="margin:0px 0 0 20px;word-break:break-word;padding: 0px 5px 0px 0px " class="resume-text"><?php echo(types_render_field("admissions")); ?></div>
					<?php }?>
				</div>				
			</div>
			<div class="left-div">
				<div class="right-div-entry-title"></div>
				<?php if ($category) {?>
				<div class="left-header"><span><?php echo $current_name;?> Team</span></div>
					<div class="inner-left-div">
					
						<ul class="left-menu">
						<?php
						
								$category_query_args = array(
    								'cat' => $category->term_id,
									'meta_key' => '_wp_page_template', 
									'meta_value' => 'page-team.php',
									'orderby' => 'menu_order', 
									'order' => 'DESC'
								);

								$category_query = new WP_Query( $category_query_args );
								
								if ( $category_query->have_posts() ) : 
									
									while ($category_query->have_posts()) : 
										$category_query->the_post();
										$temp_title = the_title('', '', false);
										if($temp_title==$title)
											$class="itm current";
										
										else
											$class="itm";
										echo "<li class='$class'><a href=". add_query_arg('dep',$category->slug,get_permalink($post->ID)) ." class='a-services'>$temp_title </a></li>";
									endwhile;
								
								endif;
								
						?>
						</ul>
					
					</div>
			<?php } ?>	
			</div>	
			
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>