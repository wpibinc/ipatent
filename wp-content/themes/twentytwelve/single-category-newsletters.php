
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

<script>


   $(document).ready(	function()
						{
							   $(".date-clicked").click( function(event) 
									   									{	
								   											event.preventDefault();													
								   											id=$(this).attr("id");
																			//alert(id);
																			
																			if ($("."+id+'-post').is(":hidden")) 
																				$("."+id+'-post').slideDown("slow");
																			else 
																				$("."+id+'-post').hide();
										   								}
									      				);
			   							
						}
			    );
</script>


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
				<div class="right-div-entry-title"></div>
				<div class="left-header"><span>More <?php echo $current_name;?>:</span></div>
					<div class="inner-left-div">
						<ul class="left-menu">
						<?php
								$flag_take_date=1;
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
										$post_date=get_the_date("F");
										$post_date_year=get_the_date("Y");
										$class="";
										if($temp_title==$title)
											$class="current";
										else
											$class="";
										
										if($temp_date!=$post_date)
											$flag_take_date=1;
										
										if($flag_take_date)
										{	
											$temp_date=$post_date . '-' . $post_date_year;
											$flag_take_date=0;
											echo "<a href='' class='date-clicked' id='$temp_date'>$post_date $post_date_year</a><br/>";
										}
										
										
										echo "<li class='$class $temp_date-post' style='display:none;'><a href=". get_permalink($post->ID)." class='a-news'> $temp_title</a></li>";
										
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