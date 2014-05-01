<?php
/**
 * Slideshow
 * @package by Theme Record
 * @auther: MattMao
*/
add_shortcode('slideshow', 'theme_slideshow');

function theme_slideshow($atts, $content = null) 
{
	extract(shortcode_atts(
       array(
			'id' => ''
    ), $atts));

	$effect = get_meta_option('slideshow_effect', $id);
	$speed = get_meta_option('slideshow_speed', $id);

	$args = array(
		'post_parent' => $id,
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'post_status' => null,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => -1,
		'meta_query' => array(
			array(
				'key' => '_post_theme_exclude_image',
				'value' => '1',
				'compare' => 'NOT LIKE'
			)
		)
	);

	$attachments = get_posts( $args );

	if ($attachments) 
	{
		if(is_front_page()) { $class = 'slides-js-style shortcode-slideshow-front-page'; } else { $class = 'slides-js-style'; }

		$height = get_meta_option('slideshow_height', $id);

		$output = '<div id="shortcode-slideshow-'.$id.'" class="'.$class.'">'."\n";
		$output .= '<div class="slides_container">'."\n";

		foreach ($attachments as $attachment) 
		{
			$width = get_meta_option('slideshow_width', $id);
			$height = get_meta_option('slideshow_height', $id);
			$size = 'slideshow_'.$id;

			$title = trim(strip_tags(apply_filters( 'the_title', $attachment->post_title )));
			$caption = trim(strip_tags(apply_filters( 'the_excerpt', $attachment->post_excerpt )));
			$desc = trim(strip_tags(apply_filters( 'the_content', $attachment->post_content )));
			$alt = trim(strip_tags(get_post_meta($attachment->ID, '_wp_attachment_image_alt', true)));
			$link = trim(strip_tags(get_post_meta($attachment->ID, '_wp_attachment_custom_link', true)));

			$output .= '<div class="slide" style="width: '.$width.'px; height: '.$height.'px;">';

			if($link)
			{
				$output .= '<a href="'.$link.'" title="'.$title.'">'.get_featured_image($attachment->ID, $size, $class=NULL, $alt).'</a>';
			}
			else
			{
				$output .= get_featured_image($attachment->ID, $size, $class=NULL, $alt);
			}

			if($caption || $desc)
			{
				$output .= '<div class="slideshow-caption">'."\n";
				if($caption) { $output .= '<h3 class="title">'.$caption.'</h3>'."\n"; }
				if($desc) { $output .= '<p class="desc">'.$desc.'</p>'."\n"; }
				$output .= '</div>'."\n";
			}

			$output .= '</div>'."\n";
		}
		wp_reset_postdata();

		$output .= '</div>'."\n";
		$output .= '</div>'."\n";

		$output .= '<script type="text/javascript">'."\n";
		$output .= '//<![CDATA['."\n";
		$output .= 'jQuery(document).ready(function(){'."\n";
		$output .= 'if( jQuery().slides) {'."\n";
		$output .= '	var slider = jQuery("#shortcode-slideshow-'.$id.'");'."\n";
		$output .= '	    slider.slides({'."\n";
		$output .= '	    preload: true,'."\n";
		$output .= '	    preloadImage: "'.ASSETS_URI. '/images/big-loader.gif",'."\n";
		$output .= '		generatePagination: true,'."\n";
		$output .= '		generateNextPrev: true,'."\n";
		$output .= '		paginationClass: "slideshow-pagination",'."\n";
		$output .= '		next: "slideshow-next",'."\n";
		$output .= '		prev: "slideshow-prev",'."\n";
		$output .= '		effect: "'.$effect.'",'."\n";
		$output .= '		play: '.$speed.','."\n";
		$output .= '		pause: 2500,'."\n";
		$output .= '		hoverPause: true,'."\n";
		$output .= '		crossfade: true,'."\n";
		$output .= '		autoHeight: true,'."\n";
		$output .= '		bigTarget: false'."\n";
		$output .= '	});'."\n";
		$output .= '}'."\n";
		$output .= '});'."\n";
		$output .= '//]]>'."\n";
		$output .= '</script>'."\n";
	}

	return $output;
}

?>