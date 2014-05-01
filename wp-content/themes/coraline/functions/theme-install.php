<?php
/**
 * Theme install
 * @package by Theme Record
 * @auther: MattMao
 *
*/


add_action( 'after_setup_theme', 'the_theme_setup' );

function the_theme_setup()
{
	// First we check the status
	$the_theme_status = get_option( 'theme_setup_status' );

	if ( $the_theme_status !== '1' ) {

		theme_create_pages();

		//Page ids
		$front_page_id = get_option( 'TR_theme_home_page_id' );
		$post_page_id = get_option( 'TR_theme_blog_page_id' );
		$portfolio_page_id = get_option( 'TR_theme_portfolio_page_id' );
		$contact_page_id = get_option( 'TR_theme_contact_page_id' );

		// Setup Default WordPress settings
		$core_settings = array(
			'show_on_front' => 'page',
			'page_on_front'	=> $front_page_id,
			'page_for_posts' => $post_page_id,			
			'posts_per_page' => -1
		);

		foreach ( $core_settings as $k => $v ) {
			update_option( $k, $v );
		}

		//Setup meta of page templates
		update_post_meta($front_page_id, '_wp_page_template', 'template-home.php');
		update_post_meta($portfolio_page_id, '_wp_page_template', 'template-portfolio.php');
		update_post_meta($contact_page_id, '_wp_page_template', 'template-contact.php'); 

		// Delete dummy post, page and comment.
		wp_delete_post( 1, true );
		wp_delete_post( 2, true );
		wp_delete_comment( 1 );
		// Once done, we register our setting to make sure we don't duplicate everytime we activate.
		update_option( 'theme_setup_status', '1' );

		// Lets let the admin know whats going on.
		$msg = '<div class="error">';
		$msg .= '<p>The ' . get_option( 'current_theme' ) . ' theme has been ready for you!</p>';
		$msg .= '</div>';
		add_action( 'admin_notices', $c = create_function( '', 'echo "' . addcslashes( $msg, '"' ) . '";' ) );
	}
	elseif ( $the_theme_status === '1' and isset( $_GET['activated'] ) ) {

		//if we are re-activing the theme
		$msg = '<div class="error">';
		$msg .= '<p>The ' . get_option( 'current_theme' ) . ' theme was successfully re-activated.</p>';
		$msg .= '</div>';
		add_action( 'admin_notices', $c = create_function( '', 'echo "' . addcslashes( $msg, '"' ) . '";' ) );
	}
}



#
# Create pages
#
function theme_create_pages() 
{
	// home page
    theme_create_page( esc_sql( _x('home', 'page_slug', 'TR') ), 'TR_theme_home_page_id', __('Home', 'TR'), '' );

	// blog page
    theme_create_page( esc_sql( _x('blog', 'page_slug', 'TR') ), 'TR_theme_blog_page_id', __('Blog', 'TR'), '' );

	// portfolio page
    theme_create_page( esc_sql( _x('portfolio', 'page_slug', 'TR') ), 'TR_theme_portfolio_page_id', __('Portfolio', 'TR'), '' );

	// contact page
    theme_create_page( esc_sql( _x('contact', 'page_slug', 'TR') ), 'TR_theme_contact_page_id', __('Contact', 'TR'), '' );
}




#
# Create a page
#
function theme_create_page( $slug, $option, $page_title = '', $page_content = '', $post_parent = 0 ) 
{
	global $wpdb;
	 
	$option_value = get_option($option); 
	 
	if ($option_value>0) :
		if (get_post( $option_value )) :
			// Page exists
			return;
		endif;
	endif;
	
	$page_found = $wpdb->get_var("SELECT ID FROM " . $wpdb->posts . " WHERE post_name = '$slug' LIMIT 1;");
	if ($page_found) :
		// Page exists
		if (!$option_value)  update_option($option, $page_found);
		return;
	endif;
	
	$page_data = array(
        'post_status' => 'publish',
        'post_type' => 'page',
        'post_author' => 1,
        'post_name' => $slug,
        'post_title' => $page_title,
        'post_content' => $page_content,
        'post_parent' => $post_parent,
        'comment_status' => 'closed'
    );
    $page_id = wp_insert_post($page_data);
    
    update_option($option, $page_id);
}

?>