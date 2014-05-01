<?php 
/**
 * Video Content
 * @package by Theme Record
 * @auther: MattMao
 */

function theme_content_video() 
{
	?>
	<div class="entry-video">
	<?php theme_post_video('blog'); ?>
	<?php if(is_single()) : ?>
	<h2 class="entry-title"><?php the_title(); ?></h2>
	<?php else : ?>
	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	<?php endif; ?>
	</div>
	<?php
}
?>