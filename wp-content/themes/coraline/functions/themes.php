<?php
/**
 * @package by Theme Record
 * @auther: MattMao
 *
 * 1--Load functions
 * 2--Add admin menu
 * 3--Add scripts and styles
 * 4--Add theme support
 * 5--Add languages support
 * 6--Add menu support
 * 7--Remove Auto <p> For Shortcodes
 * 8--Widgets Functions
 * 9--Add Category ID to Column
 * 10-Fixed WP Title
 * 11--Add functionality to the image uploader on product pages to exlcude an image
*/

#
#Load functions
#
require_once(FUNCTIONS_DIR.'/settings/generator.php');
require_once(FUNCTIONS_DIR.'/settings/functions.php');
require_once(FUNCTIONS_DIR.'/theme-config.php');
require_once(FUNCTIONS_DIR.'/plugins/breadcrumb.php');
require_once(FUNCTIONS_DIR.'/plugins/flickr.php');
require_once(FUNCTIONS_DIR.'/plugins/pagination.php');
require_once(FUNCTIONS_DIR.'/plugins/sidebar.php');
require_once(FUNCTIONS_DIR.'/plugins/slideshow.php');
require_once(FUNCTIONS_DIR.'/plugins/tweets.php');
require_once(FUNCTIONS_DIR.'/plugins/footer-tweets.php');
require_once(FUNCTIONS_DIR.'/plugins/recaptchalib.php');
require_once(FUNCTIONS_DIR.'/shortcodes/shortcode-functions.php');
require_once(FUNCTIONS_DIR.'/shortcodes/tinymce/tinymce.class.php');
require_once(FUNCTIONS_DIR.'/widgets/widget-comments.php');
require_once(FUNCTIONS_DIR.'/widgets/widget-flickr.php');
require_once(FUNCTIONS_DIR.'/widgets/widget-portfolio.php');
require_once(FUNCTIONS_DIR.'/widgets/widget-post.php');
require_once(FUNCTIONS_DIR.'/widgets/widget-search.php');
require_once(FUNCTIONS_DIR.'/widgets/widget-social.php');
require_once(FUNCTIONS_DIR.'/widgets/widget-tweets.php');
require_once(FUNCTIONS_DIR.'/metaboxes/metabox-generator.php');
require_once(FUNCTIONS_DIR.'/metaboxes/metabox-portfolio.php');
require_once(FUNCTIONS_DIR.'/metaboxes/metabox-portfolio-image.php');
require_once(FUNCTIONS_DIR.'/metaboxes/metabox-portfolio-video.php');
require_once(FUNCTIONS_DIR.'/metaboxes/metabox-blog.php');
require_once(FUNCTIONS_DIR.'/metaboxes/metabox-blog-audio.php');
require_once(FUNCTIONS_DIR.'/metaboxes/metabox-blog-image.php');
require_once(FUNCTIONS_DIR.'/metaboxes/metabox-blog-video.php');
require_once(FUNCTIONS_DIR.'/metaboxes/metabox-blog-link.php');
require_once(FUNCTIONS_DIR.'/metaboxes/metabox-blog-quote.php');
require_once(FUNCTIONS_DIR.'/metaboxes/metabox-sidebar.php');
require_once(FUNCTIONS_DIR.'/metaboxes/metabox-custom-sidebar.php');
require_once(FUNCTIONS_DIR.'/metaboxes/metabox-slideshow.php');
require_once(FUNCTIONS_DIR.'/theme-helper.php');
require_once(FUNCTIONS_DIR.'/theme-taxonomy.php');
require_once(FUNCTIONS_DIR.'/theme-install.php');



#
# Add menu scripts and styles to backend
#
if( is_admin() ){
	add_action('admin_init', 'theme_backend_load_styles');
	add_action('admin_init', 'theme_backend_load_scripts');
	add_action('admin_menu', 'theme_admin_menu', 9);
}


#
# Add admin menu
#
function theme_admin_menu()
{
	$add_menu = 'add_menu_page';
	$add_submenu = 'add_submenu_page';
	$add_menu(THEME_NAME, THEME_NAME, 'administrator', 'theme-settings', 'load_theme_pages', FUNCTIONS_URI . '/assets/images/icon-options.png', 58);
	$add_submenu('theme-settings', 'Theme Settings', 'Settings', 'administrator', 'theme-settings', 'load_theme_pages');
}


#
# Add styles to backend
#
function theme_backend_load_styles() {
	wp_enqueue_style('thickbox');
	wp_register_style('chosen', FUNCTIONS_URI.'/assets/css/chosen.css', false, THEME_VERSION, 'screen');
	wp_register_style('admin', FUNCTIONS_URI.'/assets/css/admin.css', false, THEME_VERSION, 'screen');
	wp_enqueue_style('chosen');
	wp_enqueue_style('admin');
}


#
# Add scripts to backend
#
function theme_backend_load_scripts() {
	wp_register_script('jquery-upload', FUNCTIONS_URI.'/assets/js/jquery-upload.js', array('jquery','media-upload','thickbox'), THEME_VERSION, false );
	wp_register_script('jquery-colorpicker', FUNCTIONS_URI.'/assets/js/jquery-colorpicker.js', array('jquery'), THEME_VERSION, false );
	wp_register_script('jquery-chosen', FUNCTIONS_URI.'/assets/js/jquery-chosen-min.js', array('jquery'), THEME_VERSION, false );
	wp_register_script('jquery-colors', FUNCTIONS_URI.'/assets/js/jquery-colors.js', array('jquery'), THEME_VERSION, false );
	wp_register_script('jquery-admin', FUNCTIONS_URI.'/assets/js/jquery-admin.js', array('jquery'), THEME_VERSION, false );
	wp_register_script('jquery-metabox', FUNCTIONS_URI.'/assets/js/jquery-metabox.js', array('jquery'), THEME_VERSION, false );
	wp_enqueue_script('thickbox');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('jquery-colorpicker');
	wp_enqueue_script('jquery-chosen');
	wp_enqueue_script('jquery-colors');
	wp_enqueue_script('jquery-admin');
	wp_enqueue_script('jquery-metabox');

	if ( isset($_GET['page']) ) $page = $_GET['page']; else $page = '';
	if ( is_admin() && ($page == 'theme-settings') ) 
	{
		wp_enqueue_script('jquery-upload');
	}
}


#
# Add theme support
#
if ( function_exists('add_theme_support') )
{
	#
	#Basic theme support
	#
	add_theme_support('menus');
	add_theme_support('post-thumbnails', array('post', 'portfolio', 'slideshow'));

	#
	#Creates wordpress image thumb sizes for the theme
	#
	function add_theme_thumbnail_size($thumb_size)
	{	
		foreach ($thumb_size['imgSize'] as $sizeName => $size)
		{
			if($sizeName == 'base')
			{
				set_post_thumbnail_size($thumb_size['imgSize'][$sizeName]['width'], $thumb_size[$sizeName]['height'], true);
			}
			else
			{	
				if(!isset($thumb_size['imgSize'][$sizeName]['crop'])) $thumb_size['imgSize'][$sizeName]['crop'] = true;

				add_image_size(	 
					$sizeName,
					$thumb_size['imgSize'][$sizeName]['width'], 
					$thumb_size['imgSize'][$sizeName]['height'], 
					$thumb_size['imgSize'][$sizeName]['crop']
				);
			}
		}
	}


	#
	# Set the thumbs size for the posts
	#
	$thumb_size['imgSize']['admin-thumbnail'] = array('width'=>45,  'height'=>45);
	$thumb_size['imgSize']['widget'] = array('width'=>45,  'height'=>45);
	$thumb_size['imgSize']['column-2'] = array('width'=>450,  'height'=>340);
	$thumb_size['imgSize']['column-3'] = array('width'=>290,  'height'=>220);
	$thumb_size['imgSize']['column-4'] = array('width'=>210,  'height'=>160);
	$thumb_size['imgSize']['portfolio'] = array('width'=>660,  'height'=>9999, 'crop'=>false);
	$thumb_size['imgSize']['blog'] = array('width'=>520,  'height'=>9999, 'crop'=>false);

	#
	# Slideshow
	#
	$slideshow_args = array( 
		'post_type' => 'slideshow',
		'post_status' => 'publish'
	);

	$slideshows = get_posts( $slideshow_args );

	if($slideshows)
	{
		foreach ($slideshows as $slideshow) 
		{
			global $post;
			$id = $slideshow->ID;
			$width = get_meta_option('slideshow_width', $id);
			$height = get_meta_option('slideshow_height', $id);
			
			$thumb_size['imgSize']['slideshow_'.$id.''] = array('width'=>$width,  'height'=>$height);
		}
	}

	add_theme_thumbnail_size($thumb_size);
}


#
# Add languages support
#
load_theme_textdomain( 'TR', LANG_DIR );


#
# Add menu support
#
register_nav_menus( array( 
	'top menu' => __( 'Top Navigation', 'TR' )
)); 


#
# Remove Auto <p> For Shortcodes
#
function theme_shortcode_text($content) 
{ 
	$content = do_shortcode( shortcode_unautop( $content ) ); 
	$content = preg_replace('#^<\/p>|^<br\s?\/?>|<p>$|<p>\s*(&nbsp;)?\s*<\/p>#', '', $content);
	return $content;
}


#
#Widgets Functions
#
function theme_remove_wp_widgets()
{
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_RSS');
}

add_action('widgets_init', 'theme_remove_wp_widgets');
add_filter('widget_text', 'do_shortcode');



#
# Add widgets support
#
if ( function_exists('register_sidebar') )
{
	$sidebars = array('page', 'blog', 'archive', 'contact', 'search');	
	foreach ($sidebars as $sidebar)
	{	
		register_sidebar( array (
			'name' => $sidebar.' sidebar',
			'id' => $sidebar.'-widget-area',
			'before_widget' => '<div class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="title">',
			'after_title' => '</h3>'
		));
	}

	#
	#Add footer sidebars
	#
	global $tr_config;
	$footer_columns = $tr_config['widgets_column'];
	for ($i = 1; $i <= $footer_columns; $i++)
	{
		register_sidebar(array(
			'name' => 'footer widget '.$i,
			'id' => 'footer-widget-area-'.$i,
			'before_widget' => '<div class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="title">',
			'after_title' => '</h3>',
		));
	}


	#
	#Add custom sidebarss
	#
	$sidebar_args = array( 
		'post_type' => 'sidebar',
		'posts_per_page' => -1,
		'order' => 'ASC',
		'orderby' => 'menu_order',
		'post_status' => 'publish'
	);

	$sidebars = get_posts( $sidebar_args );

	if($sidebars)
	{
		foreach ($sidebars as $sidebar) 
		{
			global $post;
			$id = $sidebar->ID;
			$name = get_meta_option('sidebar_name', $id);

			register_sidebar( array (
				'name' => $name,
				'id' => 'custom-widget-area-'.$id,
				'before_widget' => '<div class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="title">',
				'after_title' => '</h3>'
			));
		}
	}
}



#
#Add Category ID to Column
#
add_filter( 'manage_edit-category_columns', 'theme_taxonomy_columns_header' );
add_filter( 'manage_edit-portfolio-category_columns', 'theme_taxonomy_columns_header' );
add_filter( 'manage_category_custom_column', 'theme_taxonomy_columns_row', 10, 3 );
add_filter( 'manage_portfolio-category_custom_column', 'theme_taxonomy_columns_row', 10, 3 );

function theme_taxonomy_columns_header($columns) {
    $columns['catID'] = __('ID');
    return $columns;
}


function theme_taxonomy_columns_row($columnTitle, $argument, $categoryID){
    return $categoryID;
}



#
# Fixed WP Title
#
function theme_filter_wp_title( $title, $separator ) 
{
	if ( is_feed() )
		return $title;

	global $paged, $page;

	if ( is_search() ) {
		$title = sprintf( __( 'Search results for %s',  'TR' ), '"' . get_search_query() . '"' );
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s',  'TR' ), $paged );
			$title .= " $separator " . get_bloginfo( 'name', 'display' );
		return $title;
	}

	$title .= get_bloginfo( 'name', 'display' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s',  'TR' ), max( $paged, $page ) );

	return $title;
}

add_filter( 'wp_title', 'theme_filter_wp_title', 10, 2 );



#
#Add custom link to gallery options
#
add_filter('attachment_fields_to_edit', 'theme_add_custom_link_to_page_field', 1, 2);
add_filter('attachment_fields_to_save', 'theme_add_custom_link_to_page_field_save', 1, 2);

function theme_add_custom_link_to_page_field( $fields, $object ) {
	
	if (!$object->post_parent) return $fields;
	
	$parent = get_post( $object->post_parent );
	
	$custom_link = stripslashes(get_post_meta($object->ID, '_wp_attachment_custom_link', true));
	
	$label = __('Link Url',  'TR');

	$html = '<textarea name="attachments['.$object->ID.'][wp_attachment_custom_link]" id="attachments['.$object->ID.'][wp_attachment_custom_link]" >'.$custom_link.'</textarea>';
	
	$fields['wp_attachment_custom_link'] = array(
			'label' => $label,
			'input' => 'textarea',
			'html' =>  $html,
			'value' => $custom_link,
			'helps' => __('Enter the link url for your image.',  'TR')
	);
	
	return $fields;
}


function theme_add_custom_link_to_page_field_save( $post, $attachment ) {

	$custom_link = stripslashes($_REQUEST['attachments'][$post['ID']]['wp_attachment_custom_link']);

	if (isset($_REQUEST['attachments'][$post['ID']]['wp_attachment_custom_link'])) :
		update_post_meta( $post['ID'], '_wp_attachment_custom_link', $custom_link );
	else :
		delete_post_meta( $post['ID'], '_wp_attachment_custom_link', $custom_link );
	endif;
		
	return $post;				
}



#
#Add functionality to the image uploader on product pages to exlcude an image
#
add_filter('attachment_fields_to_edit', 'theme_exclude_image_from_page_field', 1, 2);
add_filter('attachment_fields_to_save', 'theme_exclude_image_from_page_field_save', 1, 2);

function theme_exclude_image_from_page_field( $fields, $object ) {
	
	if (!$object->post_parent) return $fields;
	
	$parent = get_post( $object->post_parent );
	
	$exclude_image = (int) get_post_meta($object->ID, '_post_theme_exclude_image', true);
	
	$label = __('Exclude image',  'TR');
	
	$html = '<input type="checkbox" '.checked($exclude_image, 1, false).' name="attachments['.$object->ID.'][post_theme_exclude_image]" id="attachments['.$object->ID.'][post_theme_exclude_image]" />';
	
	$fields['post_theme_exclude_image'] = array(
			'label' => $label,
			'input' => 'html',
			'html' =>  $html,
			'value' => '',
			'helps' => __('Enabling this option will hide it from the page image gallery or slidershow.',  'TR')
	);
	
	return $fields;
}

function theme_exclude_image_from_page_field_save( $post, $attachment ) {

	if (isset($_REQUEST['attachments'][$post['ID']]['post_theme_exclude_image'])) :
		delete_post_meta( (int) $post['ID'], '_post_theme_exclude_image' );
		update_post_meta( (int) $post['ID'], '_post_theme_exclude_image', 1);
	else :
		delete_post_meta( (int) $post['ID'], '_post_theme_exclude_image' );
		update_post_meta( (int) $post['ID'], '_post_theme_exclude_image', 0);
	endif;
		
	return $post;				
}



#
# Allow plugins/themes to override the default caption template.
#
function theme_img_caption_shortcode($attr, $content = null) {
	// New-style shortcode with the caption inside the shortcode with the link and image tags.
	if ( ! isset( $attr['caption'] ) ) {
		if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
			$content = $matches[1];
			$attr['caption'] = trim( $matches[2] );
		}
	}

	// Allow plugins/themes to override the default caption template.
	$output = apply_filters('img_caption_shortcode', '', $attr, $content);
	if ( $output != '' )
		return $output;

	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr));

	if ( 1 > (int) $width || empty($caption) )
		return $content;

	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

	return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '">'. do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}

add_shortcode('wp_caption', 'theme_img_caption_shortcode');
add_shortcode('caption', 'theme_img_caption_shortcode');



#
#Remove the gallery
#

if( !function_exists( 'remove_gallery_setting_div' ) ) {
    function remove_gallery_setting_div() {
        echo '
            <style type="text/css">
                #gallery-settings *{
                display:none;
                }
            </style>';
    }
}

add_action( 'admin_head_media_upload_gallery_form', 'remove_gallery_setting_div' );

?>