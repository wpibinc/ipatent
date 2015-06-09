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
    <div class="social-icon-container">
        <a href="https://www.linkedin.com/company/ehrlich-&-fenster-patent-attorneys" target="_blank" class="linkedin-social-icon"></a>
        <a href="https://www.facebook.com/EhrlichFenster" target="_blank" class="facebook-social-icon"></a>
        <a href="https://twitter.com/EhrlichFenster" target="_blank" class="twitter-social-icon"></a>
        <a href="<?php bloginfo('rss2_url') ?>" target="_blank" class="rss_link-social-icon"></a>
    </div>
	<div id="back-to-top-container">
		<a class="back-to-top" href="#">
			Back to Top
		</a>
	</div>
</div><!-- #page -->
</section><!-- #container -->
</div><!-- #wrap -->

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
		<span style="float: left;" ><?php if (ICL_LANGUAGE_CODE=='he') {?>כל הזכויות שמורות, ארליך ופנסטר |<?php } else {?>All Rights Reserved, EHRLICH & FENSTER | <?php }?><a href=<?php if (ICL_LANGUAGE_CODE=='he') {?>"http://www.ipatent.co.il/?page_id=1652"<?php } else {?>"http://www.ipatent.co.il/?page_id=1644"<?php }?>><?php if (ICL_LANGUAGE_CODE=='he') {?>תקנון ותנאים<?php } else {?>Disclaimer <?php }?></a></span>
		<span class="footer-rights-social">
			<a href="https://www.linkedin.com/company/ehrlich-&-fenster-patent-attorneys" target="_blank" class="linkedin social"></a>
			<a href="https://www.facebook.com/EhrlichFenster" target="_blank" class="facebook social"></a>
			<a href="https://twitter.com/EhrlichFenster" target="_blank" class="twitter social"></a>
            <a href="<?php bloginfo('rss2_url') ?>" target="_blank" class="rss_link"></a>
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

	   var offset = 250;
	    var duration = 300;
	    jQuery(window).scroll(function() {
	        if (jQuery(this).scrollTop() > offset) {
	            jQuery('.back-to-top').fadeIn(duration);
	        } else {
	            jQuery('.back-to-top').fadeOut(duration);
	        }
	    });

	    jQuery('.back-to-top').click(function(event) {
	        event.preventDefault();
	        jQuery('html, body').animate({scrollTop: 0}, duration);
	        return false;
	    });
	});
		</script>
<?php wp_footer(); ?>
</body>
</html>
