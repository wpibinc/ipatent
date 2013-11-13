<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
		<?php if(!(is_page_template('page-home.php'))){?> 
		<div class="breadcrumbs">
		    <?php if(function_exists('bcn_display'))
		    {
		    	global  $bcn;
		    	echo $bcn;
		    }?>
		</div>
		<?php }?>

	</div><!-- #main .wrapper -->
	
</div><!-- #page -->
<div class="block push"></div>
<footer id="colophon" role="contentinfo" class="block">

	<div class="footer-icons">
		<?php 
		
			$category_query_args = array(
					'category_name' => "footer_logos",
					'orderby' => 'date',
					'order' => 'ASC',
					'posts_per_page' => -1
			);
			
			$category_query = new WP_Query( $category_query_args );
			
			if ( $category_query->have_posts() ) :
					while ($category_query->have_posts()) :
					$category_query->the_post();
					$temp_title = the_title('', '', false);
					$category = end(get_the_category());
					$current_name = $category->cat_name;
					$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "Full");
					$image_height=$imgsrc[2]/2;
					?>
					<a href="<?php echo(the_excerpt_rss()); ?>" target="_blank"><div class="footer-logo-div" style="background-image:url(<?php echo $imgsrc[0];?>);width:<?php echo $imgsrc[1]."px";?>;height:<?php echo $image_height."px";?>;"></div></a>
					<?php 
					endwhile;
			endif;
		
		
			
		?>
		
	</div>
	<div style="clear:both;"></div>
	<div class="footer-rights">
		
		<span>All Rights Reserved, EHRLICH & FENSTER | <a href="#">Terms and Conditions</a></span>
		<span class="footer-rights-social">
			<a href="http://linkedin.com" class="linkedin social"></a>
			<a href="http://facebook.com" class="facebook social"></a>
			<a href="http://twitter.com" class="twitter social"></a>
		</span>
		
	</div>
</footer><!-- #colophon -->
		
<?php wp_footer(); ?>
  
</body>
</html>