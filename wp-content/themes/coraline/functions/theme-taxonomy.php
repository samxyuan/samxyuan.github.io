<?php
/**
 * @package by Theme Record
 * @auther: MattMao
 *
 *1--Create post type for portfolio
 *2--Prod edit columns for portfolio
 *3--Prod custom columns for portfolio
 *4--Reorder the portfolio items
 *5--Save portfolio order
 *6--Add the scripts for portfolio
 *7--Add the styles for portfolio
*/

add_action('init', 'theme_create_post_type_portfolio');
add_filter('manage_edit-portfolio_columns', 'prod_edit_columns_portfolio');
add_action('manage_posts_custom_column',  'prod_custom_columns_portfolio');


#
#Create post type for portfolio
#
function theme_create_post_type_portfolio() 
{
	$labels = array(
		'name' => __( 'Portfolios', 'TR'),
		'singular_name' => __( 'Portfolio', 'TR' ),
		'add_new' => __('Add New', 'TR'),
		'add_new_item' => __('Add New Portfolio', 'TR'),
		'edit_item' => __('Edit Portfolio', 'TR'),
		'new_item' => __('New Portfolio', 'TR'),
		'view_item' => __('View Portfolio', 'TR'),
		'search_items' => __('Search Portfolio', 'TR'),
		'not_found' => __('No portfolio found', 'TR'),
		'not_found_in_trash' => __('No portfolio found in Trash', 'TR'), 
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array('slug'=>'portfolio-item','with_front'=>true),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 57,
		'menu_icon' => FUNCTIONS_URI . '/assets/images/icon-portfolio.png',
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments')
	); 

	register_post_type( 'portfolio' , $args );
	
	register_taxonomy('portfolio-category','portfolio',array(
		'hierarchical' => true, 
		'label' => 'Categories', 
		'singular_label' => 'Category', 
		'rewrite' => true,
		'query_var' => true
	));
}


#
#Prod edit columns for portfolio
#
function prod_edit_columns_portfolio($columns)
{
	$newcolumns = array(
		'cb' => '<input type=\"checkbox\" />',
		'portfolio_thumbnail' => __('Thumbnail',  'TR'),
		'title' => __('Title',  'TR'),
		'type' => __('Type',  'TR'),
		'client' => __('Client',  'TR'),
		'portfolio_categories' => __('Categories',  'TR')
	);
	
	$columns= array_merge($newcolumns, $columns);
	
	return $columns;
}


#
#Prod custom columns for portfolio
#
function prod_custom_columns_portfolio($column)
{
	
	global $post;
	$type = get_meta_option('portfolio_type');
	$client = get_meta_option('portfolio_client');

	switch ($column)
	{
		case 'portfolio_categories':
		$terms = get_the_terms($post->ID, 'portfolio-category');				
		if (! empty($terms)) {
			foreach($terms as $t)
				$output[] = '<a href="edit.php?post_type=portfolio&portfolio-category='.$t->slug.'">'. esc_html(sanitize_term_field('name', $t->name, $t->term_id, 'portfolio-category', 'display')) . '</a>';
			$output = implode(', ', $output);
		} else {
			$t = get_taxonomy('portfolio-category');
			$output = 'No '.$t->label;
		}
		echo $output;
		break;

		case 'type':
		echo $type;
		break;	

		case 'client':
		echo $client;
		break;	

		case 'portfolio_thumbnail':
		if ( has_post_thumbnail() ) { the_post_thumbnail('admin-thumbnail'); } else { echo __('No featured image',  'TR'); }
		break;	
	}
	
}


#
#Reorder the portfolio items
#
function theme_create_portfolio_reorder_page() {
    $add_reorder_page = add_submenu_page('edit.php?post_type=portfolio', 'Reorder', __('Reorder',  'TR'), 'edit_posts', basename(__FILE__), 'theme_portfolio_reorder');
    
    add_action('admin_print_styles-' . $add_reorder_page, 'theme_print_portfolio_reorder_styles');
    add_action('admin_print_scripts-' . $add_reorder_page, 'theme_print_portfolio_reorder_scripts');
}

add_action('admin_menu', 'theme_create_portfolio_reorder_page');


#
#Add the reorder functions
#
function theme_portfolio_reorder() {
    $portfolios = new WP_Query('post_type=portfolio&posts_per_page=-1&orderby=menu_order&order=ASC');
?>
    <div class="wrap">
        <div id="icon-tools" class="icon32"><br /></div>
        <h2><?php _e('Reorder Portfolios',  'TR'); ?></h2>
        <p><?php _e('Drag the items to reorder the portfolios.',  'TR'); ?></p>
        <ul id="portfolio-lists">
		<?php while( $portfolios->have_posts() ) : $portfolios->the_post(); ?>
		<?php if( get_post_status() == 'publish' ) { ?>
			<li id="<?php the_id(); ?>" class="menu-item">
				<dl class="menu-item-bar">
				<dt class="menu-item-handle">
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail('admin-thumbnail'); } else { echo __('No featured image',  'TR'); } ?>
				<span class="menu-item-title"><?php the_title(); ?></span>
				</dt>
				</dl>
				<ul class="menu-item-transport"></ul>
			</li>
		<?php } ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
        </ul>
    </div>
<?php
}


#
#Save portfolio order
#
function theme_save_portfolio_order() {
    global $wpdb;
    
    $order = explode(',', $_POST['order']);
    $counter = 0;
    
    foreach($order as $portfolio_id) {
        $wpdb->update($wpdb->posts, array('menu_order' => $counter), array('ID' => $portfolio_id));
        $counter++;
    }
    die(1);
}

add_action('wp_ajax_portfolio_reorder', 'theme_save_portfolio_order');


#
#Add the scripts for portfolio
#
function theme_print_portfolio_reorder_scripts() {
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('theme_portfolio_reorder', FUNCTIONS_URI.'/assets/js/jquery-reorder.js');
}


#
#Add the styles for portfolio
#
function theme_print_portfolio_reorder_styles() {
    wp_enqueue_style('nav-menu');
}

?>