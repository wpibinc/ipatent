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
			<div class="left-div services-left">
				<div class="right-header left-mobile-header"><?php the_title(); $title = the_title('', '', false);?></div>
				<div class="right-div-entry-title"></div>
				<?php
				$id=$post->ID;
				$children =wp_list_pages("depth=1&child_of=".$id ."&title_li="."&echo=0&sort_column=menu_order");

				if(get_current_page_depth()==2)
				{
					$id=$post->post_parent;
					$children =wp_list_pages("depth=1&child_of=".$id ."&title_li="."&echo=0&sort_column=menu_order");
				}
				$title=get_the_title($id);
				?>
				<?php
				$titlenamer = get_the_title($id);
				if($title==$titlenamer){
					$children = str_replace('<li>','<li class="current">', $children);
				}
				?>
				<?php if ($children) { ?>
					<div class="mobile-accordion">
						<div class="left-text-header">
							<?php echo $title; ?> <?php _e('','twentytwelve');?>
						</div>
						<ul class="left-menu">
							<?php echo $children; ?>
						</ul>
					</div>
				<?php } ?>


					<?php
					if ( 0 == $post->post_parent ) {
						$id=0;
					}
					else {
						$parents = get_post_ancestors( $post->ID );
						$id= end($parents);

					}

					$children = wp_list_pages("depth=1&child_of=" . $id ."&title_li="."&sort_column=menu_order&echo=0");
					$titlenamer = get_the_title($id);

					if($title==$titlenamer){
						$children = str_replace('<li>','<li class="current">', $children);
					}

					if ($children && $id) {
						echo '<div class="mobile-accordion">';
							echo '<div class="left-text-header">' . __('More Services','twentytwelve') . '</div>';
							echo '<ul class="left-menu">';
								echo $children;
							echo '</ul>';
						echo '</div>';
					}

					?>
				<?php
				$categories = get_the_category();
				foreach ($categories as $category) {
					$parent = get_category($category->parent);

					if ($parent->slug=="team") $cat = $category->term_id;
				}
				$my_query = new WP_Query(array( 'meta_key' => '_wp_page_template', 'meta_value' => 'page-team.php','cat' => $cat, 'orderby' => 'menu_order title', 'order' => 'ASC'));
				if($my_query->have_posts()):?>
					<div class="mobile-accordion">
						<div class="left-text-header" style="margin-top: 50px;">
							<?php echo get_the_category_by_ID($cat) . "&nbsp;";
								_e('Team', 'twentytwelve'); ?>
						</div>

						<ul class="left-menu">
							<?php
							while ($my_query->have_posts()) :

								$my_query->the_post();
								$temp_title = the_title('', '', false);
								echo "<li class='itm $class' style='padding-left:5px;'><a href=" . get_permalink($post->ID) . " class='a-services'>" . $temp_title . "</a></li>";

							endwhile;
							?>
						</ul>
					</div>
				<?php endif; ?>

			</div>
			<div class="right services-right">
				<div class="right-header"><?php the_title(); $title = the_title('', '', false);?></div>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php //comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>