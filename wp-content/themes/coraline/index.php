<?php
/**
 * @package by Theme Record
 * @auther: MattMao
*/

?>
<?php get_header(); ?>

<div id="main" class="right-side clearfix">

<article id="content">

<?php 
#
#Get Paged
#
if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
} elseif ( get_query_var('page') ) { 
	$paged = get_query_var('page');
} else {
	$paged = 1;
}

#
#Args
#
global $tr_config;

$args = array( 
	'post_type' => 'post',
	'posts_per_page' => $tr_config['blog_posts_per_page'],
	'paged' => $paged 
);

if(is_home())
{
	query_posts($args);
}
else
{
	global $wp_query;
	$query_args = array_merge( $wp_query->query, $args );
	query_posts($query_args);
}
?>

<?php if (have_posts()): ?>

<?php
	get_template_part('loops/loop', 'blog');
	theme_pagination();
?>

<?php else : ?>

<!--Begin No Post-->
<div class="no-post">
	<h2><?php _e('Not Found', 'TR'); ?></h2>
	<p><?php _e('Sorry, but you are looking for something that is not here.', 'TR'); ?></p>
</div>
<!--End No Post-->

<?php endif; ?>

</article>
<!--End Content-->

<?php theme_sidebar('blog'); ?>

</div>
<!-- #main -->

<?php get_footer(); ?>