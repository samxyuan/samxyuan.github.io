<?php
/**
 * Gallery
 * @package by Theme Record
 * @auther: MattMao
*/
if ( !function_exists( 'theme_post_gallery' ) )
{

	function theme_post_gallery($type) 
	{
		global $post;
		$post_id = $post->ID;
		$exclude_featured_image = get_meta_option('exclude_featured_image');
		if($exclude_featured_image == true) { $exclude_thumb_id = get_post_thumbnail_id(); } else { $exclude_thumb_id = ''; }

		$args = array(
			'post_parent' => $post_id,
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'post_status' => null,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'posts_per_page' => -1,
			'exclude' => $exclude_thumb_id,
			'meta_query' => array(
				array(
					'key' => '_post_theme_exclude_image',
					'value' => '1',
					'compare' => 'NOT LIKE'
				)
			)
		);
		
		$attachments = get_posts( $args );

		$size = 'portfolio';

		if ($attachments) 
		{
			echo '<div class="flex-container-gallery">'."\n";
			echo '<div class="flexslider">'."\n";
			echo '<ul class="slides">'."\n";
			foreach ($attachments as $attachment) 
			{
				$title = trim(strip_tags(apply_filters( 'the_title', $attachment->post_title )));
				$caption = trim(strip_tags(apply_filters( 'the_excerpt', $attachment->post_excerpt )));
				$desc = trim(strip_tags(apply_filters( 'the_content', $attachment->post_content )));
				$alt = trim(strip_tags(get_post_meta($attachment->ID, '_wp_attachment_image_alt', true)));
				echo '<li>';
				echo '<a href="'.get_image_url($attachment->ID).'" class="fancybox" rel="gallery" title="'.$title.'">';
				echo get_featured_image($attachment->ID, $size, 'wp-'.$type.'-gallery', $alt);
				echo '</a>';
				echo '</li>'."\n";
			}
			echo '</ul>'."\n";
			echo '</div>'."\n";
			echo '</div>'."\n";
		}//end attachments
	}

}
?>