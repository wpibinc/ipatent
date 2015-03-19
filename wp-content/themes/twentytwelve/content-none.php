<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title"><?php if (ICL_LANGUAGE_CODE=='he') {?>'דבר לא נמצא'<?php } else {_e( 'Nothing Found', 'twentytwelve' );}?></h1>
		</header>

		<div class="entry-content">
			<p><?php if (ICL_LANGUAGE_CODE=='he') {?>'התנצלותנו, אבל לא נמצאו תוצאות. אולי חיפוש יעזור במציאת פוסט קשור'<?php } else {_e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'twentytwelve' );}?></p>
			<?php // get_search_form(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
