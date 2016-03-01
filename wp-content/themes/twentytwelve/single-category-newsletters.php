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
get_header();
if ($category->slug=="articles-and-publications") $menu = "194";
if ($category->slug=="links") $menu = "379";

$categories = get_the_category();
$come_from_cat = $categories[0]->cat_ID;

$query_posts = get_posts( 'cat=' . $come_from_cat);
$paginate_links = array();
$url_sufix = '?cat_id=' . $come_from_cat;
$find_next_link = false;
foreach($query_posts as $query_post){

	if($query_post->ID === $post->ID){

		$find_next_link = true;

	}elseif($query_post->ID !== $post->ID && !$find_next_link){

		$paginate_links['prev']= array(
			'href' => get_permalink($query_post->ID) . $url_sufix,
			'title' => $query_post->post_title
		);

	}elseif($find_next_link){

		$paginate_links['next']= array(
			'href' => get_permalink($query_post->ID) . $url_sufix,
			'title' => $query_post->post_title
		);
		break;

	}
}
?>

<script>
   $(document).ready(function() {
		$(".menu-item-<?php echo $menu;?>").addClass("current-menu-parent");
	});
</script>
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<div style="">
				<h1 class="right-header" title="<?php the_title(); $title = the_title('', '', false);?>"><?php the_title(); $title = the_title('', '', false);?></h1>
				<span <?php $style=($current_name=="Links")? 'display:none;' : "";  ?> style="<?php echo $style;?>"><?php $pfx_date = get_the_date( 'd.m.Y' ); echo $pfx_date;?></span>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php //comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->
	<div class="clear"></div>
	<div id="nav">
		<?php
        echo ($paginate_links['prev']) ? '<a href="' . $paginate_links['prev']['href'] . '" class="green-submit-btn">< ' . $paginate_links['prev']['title'] .'</a>' : '';
        echo ($paginate_links['next'] && $paginate_links['prev']) ? ' <br /><br /> ' : '';
        echo ($paginate_links['next']) ? '<a href="' . $paginate_links['next']['href'] . '" class="green-submit-btn alignright">' . $paginate_links['next']['title'] .' ></a>' : '';
        ?>
	</div>
<?php get_footer(); ?>