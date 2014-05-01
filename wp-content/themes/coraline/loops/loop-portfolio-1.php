<?php
/**
 * Portfolio Loop 1
 * @package by Theme Record
 * @auther: MattMao
 */

global $tr_config;

$show_filter = $tr_config['portfolio_display_mode'];
$column = $tr_config['portfolio_column'];
$show_title = $tr_config['enable_portfolio_title'];
$show_skills = $tr_config['enable_portfolio_skills'];


#
#Category Nav
#
$cat_args = array(
	'taxonomy' => 'portfolio-category',
	'orderby' => 'name',
	'show_count' => 0, // 1 for yes, 0 for no
	'hierarchical' => 1, // 1 for yes, 0 for no
	'hide_empty' => 0, // 1 for yes, 0 for no
	'title_li' => '',
	'depth' => 1
);
?>

<?php if($show_filter != '1' && !is_tax()) : ?>
<nav class="sortable-menu portfolio-classic-menu">
<ul class="clearfix">
<?php
	$portfolio_page_id = get_option( 'TR_theme_portfolio_page_id' );

	$current_class = '';

	if(get_the_ID() == $portfolio_page_id ) { $current_class = ' class="current-cat"'; }

	if($portfolio_page_id) { echo '<li'.$current_class.'><a href="'.get_page_link($portfolio_page_id).'">'.__('Show All', 'TR').'</a></li>'; }

	wp_list_categories( $cat_args ); 
?>
</ul>
</nav>
<?php endif; ?>

<div class="portfolio-list portfolio-classic-list">
<ul class="clearfix">
<?php
	switch($column)
	{
		case 2:  $size = 'column-2'; break;
		case 3:  $size = 'column-3'; break;
		case 4:  $size = 'column-4'; break;
	}

	$loop_count = 0;
	
	while (have_posts()) : the_post();
	$title = get_the_title();
	$loop_count ++;

	//Get icon
	$media_type = get_meta_option('portfolio_type');
	switch($media_type)
	{
		case 'image': $icon = 'item-image'; break;
		case 'slideshow': $icon = 'item-gallery'; break;
		case 'video': $icon = 'item-video'; break;
	}

	//Get column
	if (($loop_count -1) % $column == 0)
	{
		$col = 'post-item col-'.$column.'-1 col-first'; 
	}
	else
	{
		$col = 'post-item col-'.$column.'-1'; 
	}

	//Get item class
	$item_class = 'class="'.$icon.' '.$col.'"';
?>
	<li <?php echo $item_class; ?>>
	<?php if(has_post_thumbnail()) : ?>
	<div class="post-thumb post-thumb-hover post-thumb-preload">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="loader-icon">
	<?php echo get_featured_image($post_id=NULL, $size, 'wp-preload-image', $title); ?>
	</a>
	</div>
	<?php endif; ?>
	<?php if($show_title == true): ?><h1 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h1><?php endif; ?>
	<?php if($show_skills == true): ?><?php echo get_the_term_list( $post->ID, 'portfolio-category', '<div class="cats meta">', ', ', '</div>' ); ?><?php endif; ?>
	</li>
<?php endwhile; ?>
</ul>
</div>