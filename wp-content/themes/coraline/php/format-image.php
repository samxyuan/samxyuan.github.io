<?php 
/**
 * Image Content
 * @package by Theme Record
 * @auther: MattMao
 */

function theme_content_image() 
{
	#Get meta
	$size = 'blog';
	$title = get_the_title();
	$url_file = get_image_url();

	if(has_post_thumbnail())
	{
		echo '<div class="entry-image">'."\n";
		echo '<div class="post-thumb post-thumb-hover post-thumb-preload">'."\n";
		echo '<a href="'.$url_file.'" title="'.$title.'" class="loader-icon fancybox">';
		echo get_featured_image($post_id=NULL, $size, 'wp-preload-image', $title);
		echo '</a>';
		echo '</div>'."\n";
		?>
		<?php if(is_single()) : ?>
		<h2 class="entry-title"><?php the_title(); ?></h2>
		<?php else : ?>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php endif; ?>
		<?php
		echo '</div>'."\n";
	}
}
?>