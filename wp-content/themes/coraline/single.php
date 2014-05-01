<?php
/**
 * Single
 * @package by Theme Record
 * @auther: MattMao
 */
get_header(); 
?>
<div id="main" class="right-side clearfix">

<article id="content">
	<?php 
	if (have_posts()) : the_post(); 

	#Get options
	global $tr_config;
	$enable_date = $tr_config['enable_blog_date'];
	$enable_category = $tr_config['enable_blog_categories'];
	$enable_author = $tr_config['enable_blog_author'];
	$enable_comments = $tr_config['enable_blog_comments'];

	#Get meta
	$post_format = get_meta_option('blog_type');
	?>
	<div class="post post-blog post-blog-single post-<?php echo $post_format; ?> clearfix" id="post-<?php the_ID(); ?>">
	
	<div class="post-meta meta">
		<div class="link"><a href="<?php the_permalink(); ?>" title="" rel="bookmark"><?php the_title(); ?></a></div>

		<?php if($enable_date == true) : ?><p><b><?php _e('Posted', 'TR'); ?>:</b><?php the_time( get_option('date_format') ); ?></p><?php endif; ?>
		<?php if($enable_category == true) : ?><p><b><?php _e('In', 'TR'); ?>:</b><?php the_category(', '); ?></p><?php endif; ?>
		<?php if($enable_author == true) : ?><p><b><?php _e('By', 'TR'); ?>:</b><?php the_author_posts_link(); ?></p><?php endif; ?>

		<?php if($enable_comments == true) : ?><p><b><?php _e('Comments', 'TR'); ?>:</b><?php comments_popup_link(0, 1, '%'); ?></p><?php endif; ?>
		<?php edit_post_link( __('Edit', 'TR'), '<p>', '</p>' ); ?>
	</div>
	<!--end meta-->

	<div class="post-entry clearfix">
	<?php 
	switch($post_format)
	{
		case 'standard':
		theme_content_standard();
		break;

		case 'image':
		theme_content_image();
		break;

		case 'slideshow':
		theme_content_gallery();
		break;

		case 'audio':
		theme_content_audio();
		break;

		case 'video':
		theme_content_video();
		break;

		case 'link':
		 theme_content_link();
		break;

		case 'quote':
		theme_content_quote();
		break;
	}
	?>
	<div class="post-format"><?php the_content(); ?></div>
	<?php echo get_the_term_list( get_the_ID(), 'post_tag', '<div class="post-tags"><b>'. __('Tags', 'TR') .':</b>', ' , ', '</div>' ); ?>
	</div>




	<!--end entry-->
	</div>



<!--End Blog Single-->

<!--Moving the date and category to the bottom of the post  	-->

<!--<div class="post-info">
	<?php if($enable_date == true) : ?><p><?php the_time( get_option('date_format') ); ?></p><?php endif; ?>
	<?php if($enable_category == true) : ?><p><?php the_category(', '); ?></p><?php endif; ?>
	<?php if($enable_author == true) : ?><p><b><?php _e('By', 'TR'); ?>:</b><?php the_author_posts_link(); ?></p><?php endif; ?>

</div>-->

<!--End of moving-->

	<?php if(comments_open()) { comments_template( '', true ); } ?>

	<?php endif; ?>

</article>
<!--End Content-->

<?php theme_sidebar('blog');?>

</div>
<!-- #main -->
<?php get_footer(); ?>