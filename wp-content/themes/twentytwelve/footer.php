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

	</div><!-- #main .wrapper -->
	
</div><!-- #page -->
</section><!-- #container -->
</div><!-- #wrap -->
<div class="mobile-searchform">
	<div class="mobile-searchform-wrapper">
		<?php get_search_form(); ?>
	</div>
</div>
<footer id="colophon" role="contentinfo" class="block">
<div class="wrapper">
	<div class="footer-icons right">
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
	</div>
	<div style="clear:both;"></div>
	<div class="footer-rights">
	<div style="margin: 0 auto; width: 940px; height: 25px; font-size: 11px;" >
		<div class="right">
		<span style="float: left;" >All Rights Reserved, EHRLICH & FENSTER | <a href="#">Terms and Conditions</a></span>
		<span class="footer-rights-social">
			<a href="https://www.linkedin.com/company/ehrlich-&-fenster-patent-attorneys" target="_blank" class="linkedin social"></a>
			<a href="https://www.facebook.com/EhrlichFenster" target="_blank" class="facebook social"></a>
			<a href="https://twitter.com/EhrlichFenster" target="_blank" class="twitter social"></a>
		</span>
		</div>
	</div>
	</div>
</footer><!-- #colophon -->
<script>
$(function() {
	   $('li.menu-item').click(function() {
	      window.location.href = $('a', this).attr('href');
	      return false;
	   });
	});
		</script>
<?php wp_footer(); ?>
</body>
</html>
