<?php
/**
 * Ajax Portfolios
 * @package by Theme Record
 * @auther: MattMao
*/
add_shortcode('ajax_portfolio', 'theme_ajax_portfolio_list');

function theme_ajax_portfolio_list( $atts, $content = null)
{
	extract(shortcode_atts(
        array(
			'column' => '3',
			'cat' => '',
			'posts_per_page' => '9',
			'show_title' => true,
			'show_skills' => true
    ), $atts));

	$cat_array = explode(',', $cat);

	if(empty($cat_array[0]))
	{
		$cat_args = array(	
			'taxonomy'	=> 'portfolio-category',
			'hide_empty'=> 0
		);

	}
	else
	{
		$cat_args = array(	
			'taxonomy'	=> 'portfolio-category',
			'include' => $cat_array,
			'hide_empty'=> 0
		);
	}
	
	$output = '<div class="ajax-portfolio">'."\n";
	$output .= '<nav class="sortable-menu portfolio-sortable-menu">'."\n";
	$output .= '<ul class="filter clearfix">'."\n";
	$output .= '<li class="active all-items"><a href="">'.__('Show All', 'TR').'</a></li>'."\n";
	$terms = get_categories($cat_args); 
	foreach ($terms as $term) {
		$output .= '<li class="'.$term->slug.'"><a href="'.get_term_link($term->slug, 'portfolio-category').'" data-value="'.$term->slug.'">'.$term->name.'</a></li>'."\n";
	}
	$output .= '</ul>'."\n";
	$output .= '</nav>'."\n";
	$output .= theme_ajax_portfolio_loop($column, $cat_array, $posts_per_page, $show_title, $show_skills);
	$output .= '</div>'."\n";

	return $output;
}



function theme_ajax_portfolio_loop($column, $cat_array, $posts_per_page, $show_title, $show_skills) 
{
	if(empty($cat_array[0]))
	{
		$args = array( 
			'post_type' => 'portfolio',
			'posts_per_page' => $posts_per_page,
			'order' => 'ASC',
			'orderby' => 'menu_order',
			'post_status' => 'publish'
		);
	}
	else
	{
		$args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => $posts_per_page,
			'order' => 'ASC',
			'orderby' => 'menu_order',
			'post_status' => 'publish',
			'tax_query' => array( 
				array( 
					'taxonomy' => 'portfolio-category', 
					'field' => 'id', 
					'terms' => $cat_array, 
					'operator' => 'IN'
				)
			)
		);
	}

	
	$query = new WP_Query( $args );

	switch($column)
	{
		case 2: $col = 'col-2-1'; $size = 'column-2'; break;
		case 3: $col = 'col-3-1'; $size = 'column-3'; break;
		case 4: $col = 'col-4-1'; $size = 'column-4'; break;
	}

	$loop_count = 0;

	$output = '<div class="ajax-portfolio-list">'."\n";
	$output .= '<ul class="portfolio-sortable-grid clearfix">'."\n";

	while ($query->have_posts()) 
	{ 
		$query->the_post();
		$ajax_title = str_replace(' ', '-', strtolower(get_the_title()));
		$title = get_the_title();
		$loop_count++; 

		#
		#Get cats
		#
		global $post;

		$terms = get_the_terms( $post->ID, 'portfolio-category' );
		if ($terms && ! is_wp_error($terms)) 
		{
			$terms_array = array();
			foreach ( $terms as $term ) 
			{
				$terms_array[] = $term->slug;
			}
			$sort_classes = join( ' ', $terms_array );
		}


		#
		#Get icon
		#
		$media_type = get_meta_option('portfolio_type');

		switch($media_type)
		{
			case 'image': $icon = 'item-image'; break;
			case 'slideshow': $icon = 'item-gallery'; break;
			case 'video': $icon = 'item-video'; break;
		}


		#
		#Get item class
		#
		$item_class = 'class="item post-item '.$icon.' '.$col.' '.$sort_classes.'"';

		if(has_post_thumbnail())
		{
			$output .= '<li '.$item_class.' data-id="post-'.$loop_count.'">'."\n";
			$output .= '<div class="post-thumb post-thumb-hover post-thumb-preload">';
			$output .= '<a href="'.get_permalink().'" title="'.$title.'" class="load-ajax-content loader-icon" rel="'.$ajax_title.'">';
			$output .= get_featured_image($post_id=NULL, $size, 'wp-preload-image', $title);
			$output .= '</a>';
			$output .= '</div>'."\n";
			if($show_title == 'true')
			{
				$output .= '<h1 class="title"><a href="'.get_permalink().'" title="'.get_the_title().'" class="load-ajax-content" rel="'.$ajax_title.'">'.get_the_title().'</a></h1>'."\n";
			}
			if($show_skills == 'true')
			{
				$output .= get_the_term_list( $post->ID, 'portfolio-category', '<div class="cats meta">', ', ', '</div>' );
			}
			$output .= '</li>'."\n";
		}

	}
	wp_reset_postdata();

	$output .= '</ul>'."\n";
	$output .= '</div>'."\n";

	return $output;
}

?>