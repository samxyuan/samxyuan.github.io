<?php
/**
 * Page Header
 * @package by Theme Record
 * @auther: MattMao
 *
 * get_post_type( $post ) == 'portfolio' );
*/

function theme_page_header() 
{
	global $wp_query, $wp_rewrite, $post, $page, $paged, $tr_config;

	$post_page_id = get_option( 'TR_theme_blog_page_id' );
	$portfolio_page_id = get_option( 'TR_theme_portfolio_page_id' );

	if(!is_front_page() && $tr_config['enable_page_header'] == true) 
	{
		echo '<div class="site-page-header col-width clearfix">',"\n";

		echo '<h3>';

		if ( is_category() ) 
		{ 		
			single_term_title();
		} 
		elseif (is_day()) 
		{
			echo get_the_time('F jS, Y');
		} 
		elseif (is_month())
		{ 
			echo get_the_time('F, Y'); 
		} 
		elseif (is_year()) 
		{ 
			echo get_the_time('Y'); 
		} 
		elseif (is_search()) 
		{
			echo __('Search results', 'TR'); 
		} 
		elseif (is_author()) 
		{ 
			echo __('Author', 'TR');

		} 
		elseif (is_tag()) 
		{
			echo __('Tags', 'TR'); 
		} 
		elseif(is_tax())
		{
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			echo $term->name;
		}
		elseif(is_home())
		{
			echo get_page_name($post_page_id);
		}
		elseif(is_page())
		{
			echo get_the_title();
		}
		elseif( is_single()) 
		{
			if(get_post_type( $post ) == 'post' )
			{
				echo get_the_title($post_page_id);
			}
			elseif(get_post_type( $post ) == 'portfolio' )
			{
				echo get_the_title($portfolio_page_id);
			}
		}
		elseif(is_404())
		{
			echo __('404', 'TR');
		}
		else
		{
			echo __('Archives', 'TR');
		}

		echo '</h3>',"\n";
		new theme_breadcrumbs();

		echo '</div>',"\n";
	}
}
?>