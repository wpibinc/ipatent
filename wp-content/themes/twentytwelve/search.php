<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content search-page">
		<div id="content" role="main">

		<?php
		
		 if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php if (ICL_LANGUAGE_CODE=='he') { printf( __( 'תוצאות חיפוש עבור: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); } else { printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' );}?></h1>
			</header>

			<?php twentytwelve_content_nav( 'nav-above' ); ?>

			<?php /* Start the Loop */ ?>
			<?php 

			while ( have_posts() ){
				the_post(); 
/* 				print  basename(get_page_template());
				echo("<br>"); */
				if (basename(get_page_template()) == "page-team.php" && stristr( get_the_title(), get_search_query())) {
					get_template_part( 'content', get_post_format() );		
				}
			}
			
			rewind_posts();
			
			while ( have_posts() ){
				the_post();
				if (get_page_template() != "page-team.php" && !stristr( get_the_title(), get_search_query()) ) {
					get_template_part( 'content', get_post_format() );
				}
			} 
				

			twentytwelve_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php if (ICL_LANGUAGE_CODE=='he') {?>דבר לא נמצא<?php } else {_e( 'Nothing Found', 'twentytwelve' );}?></h1>
				</header>

				<div class="entry-content">
					<p><?php if (ICL_LANGUAGE_CODE=='he') {?>מצטערים, אבל דבר לא התאים לקריטריון החיפוש שלך. אנא נסה שוב עם מילות מפתח אחרות.<?php } else { _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); }?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>