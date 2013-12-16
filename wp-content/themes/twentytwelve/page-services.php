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
				<div class="right-header"></div>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php //comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
			
			<div class="left-div">
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
					<div class="left-header"><span><?php echo $title; ?> <?php _e('','twentytwelve');?></span></div>
						<ul class="left-menu">
							<?php echo $children; ?>
						</ul>
				<?php } ?>
						
						<ul class="left-menu">
						
						
						
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
								echo '<div class="left-text-header"><span>' . __('More Services','twentytwelve') . '</span></div>';
								echo $children;
							}
							$categories = get_the_category();
						foreach ($categories as $category) {
								$parent = get_category($category->parent);

								if ($parent->slug=="team") $cat = $category->term_id;
						}
						?>
			
						
						<?php $my_query = new WP_Query(array( 'meta_key' => '_wp_page_template', 'meta_value' => 'page-team.php','cat' => $cat, 'orderby' => 'menu_order title', 'order' => 'ASC')); ?>

						<?php if($my_query->have_posts()) {?>
						<br /><br />		
						<div class="left-header"><span><?php echo get_the_category_by_ID($cat)."&nbsp;";_e('Team','twentytwelve');?> </span></div>
								
									
                					<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    				<?php 
                    					$temp_title = the_title('', '', false);
                    					echo "<li class='$class'><a href=". get_permalink($post->ID)." class='a-services'>".$temp_title ."</a></li>"; 
                    				?>	
                					<?php endwhile; ?>
                					<?php } ?>			
						
						</ul>
			</div>	
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>