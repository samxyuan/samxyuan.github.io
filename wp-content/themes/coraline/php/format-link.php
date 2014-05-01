<?php 
/**
 * Link Content
 * @package by Theme Record
 * @auther: MattMao
 */

function theme_content_link() 
{
	#Get meta
	$url = get_meta_option('blog_type_url');
	$title = get_the_title();

	if($url)
	{
		echo '<div class="entry-link">'."\n";
		echo '<h2 class="entry-title">Link: <a href="'.$url .'">'.$title.'</a></h2>';
		echo '<span class="sub-title">&mdash; '.$url.'</span>'."\n";
		echo '</div>'."\n";
	}
}
?>