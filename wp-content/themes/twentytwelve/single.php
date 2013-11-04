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

$category = end(get_the_category());
$current_name = $category->cat_name;
if($current_name=="footer_logos")
	header("Location:index.php");
get_header(); ?>
<?php 
					
?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
				
			<div class="right" style="">
				<header class="entry-header" <?php $style=($current_name=="Links")? 'margin-top:33px;' : "";  ?> style="<?php echo $style;?>">
					<h1 class="entry-title"><?php the_title(); $title = the_title('', '', false);?></h1>
				</header>
				<div class="right-header" <?php $style=($current_name=="Links")? 'display:none;' : "";  ?> style="<?php echo $style;?>"><span><?php $pfx_date = get_the_date( 'd.m.Y' ); echo $pfx_date;?></span></div>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
			
			<div class="left-div">

				<h1 class="entry-title-hide"><?php the_title(); $title = the_title('', '', false);?></h1>
				<div class="left-header"><span>More <?php echo $current_name;?>:</span></div>
					<div class="inner-left-div">
						<ul class="left-menu">
						<?php
								
								$category_query_args = array(
    							'category_name' => "$current_name",
								'orderby' => 'date', 
								'order' => 'DESC',
								'posts_per_page' => -1
								);

								$category_query = new WP_Query( $category_query_args );
								
								if ( $category_query->have_posts() ) : 
									
									while ($category_query->have_posts()) : 
										$category_query->the_post();
										$temp_title = the_title('', '', false);
										$class="";
										if($temp_title==$title)
											$class="current";
										else
											$class="";
										//$temp_title = (strlen($temp_title) > 33) ? substr($temp_title, 0, 33) . '...' : $temp_title;
										echo "<li class='$class'><a href=". get_permalink($post->ID)." class='a-news'>  $temp_title</a></li>";
										//echo "<br/>";
									endwhile;
								
								endif;
								
						?>
						</ul>
					</div>	
			</div>	
			
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>