<?php
/**
 * Blog Desc
 * @package by Theme Record
 * @auther: MattMao
*/
add_shortcode('blog_desc', 'theme_blog_desc_list');

function theme_blog_desc_list( $atts, $content = null)
{
	extract(shortcode_atts(
        array(
			'title' => 'Recent News',
			'cat' => '',
			'posts_per_page' => '3',
			'show_title' => true,
			'show_meta' => true
    ), $atts));

	$output = '<div class="blog-desc-list post-desc-list">'."\n";
	$output .= '<div class="clearfix">'."\n";
	$output .= '<div class="desc col-4-1 col-first">'."\n";
	$output .= '<h3 class="title">'.$title.'</h3>'."\n";
	if($content) { $output .= '<p>'.theme_shortcode_text(stripslashes($content)).'</p>'."\n"; }
	$output .= '</div>'."\n";
	$output .= theme_blog_desc_loop($title, $cat, $posts_per_page, $show_title, $show_meta);
	$output .= '</div>'."\n";
	$output .= '</div>'."\n";

	return $output;
}


function theme_blog_desc_loop($title, $cat, $posts_per_page, $show_title, $show_meta) 
{
	global $post;

	if($cat)
	{
		$args = array( 
			'cat' => $cat,
			'post_status' => 'publish',
			'posts_per_page' => $posts_per_page
		);
	}
	else{
		$args = array( 
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => $posts_per_page
		);
	}
	
	$query = new WP_Query( $args );

	$loop_count = 0;

	$output = '<ul class="clearfix">'."\n";

	while ($query->have_posts()) 
	{ 
		$query->the_post();
		$title = get_the_title();
		$loop_count++; 

		#
		#Get column
		#
		if (($loop_count -1) % 3 == 0)
		{
			$col = 'col-4-1 col-first'; 
		}
		else
		{
			$col = 'col-4-1'; 
		}

		#
		#Get item class
		#
		$item_class = 'class="item '.$col.'"';

		if(has_post_thumbnail())
		{
			$output .= '<li '.$item_class.'>'."\n";
			$output .= '<div class="post-thumb post-thumb-hover post-thumb-preload">';
			$output .= '<a href="'.get_permalink().'" title="'.$title.'" class="loader-icon">';
			$output .= get_featured_image($post_id=NULL, 'column-4', 'wp-preload-image', $title);
			$output .= '</a>';
			$output .= '</div>'."\n";
			if($show_title == 'true')
			{
				$output .= '<h1 class="item-title"><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h1>'."\n";
			}

			if($show_meta == 'true')
			{
				$output .= '<div class="cats meta">';
				ob_start(); the_time( get_option('date_format') ); $output .= ob_get_clean();
				$output .= '<span></span>';
				ob_start(); comments_popup_link(0, 1, '%'); $output .= ob_get_clean();
				$output .= ' ';
				$output .= __('Comments', 'TR');
				$output .= '</div>';
			}

			$output .= '</li>'."\n";
		}

	}
	wp_reset_postdata();

	$output .= '</ul>'."\n";

	return $output;
}

?>