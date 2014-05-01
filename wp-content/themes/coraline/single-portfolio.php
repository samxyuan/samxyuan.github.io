<?php
/**
 * Single For Portfolio
 * @package by Theme Record
 * @auther: MattMao
 */
get_header(); 
?>
<div id="main" class="fullwidth">

<link href='http://fonts.googleapis.com/css?family=Permanent+Marker' rel='stylesheet' type='text/css'>

<!--Begin Content-->
<article id="content">
	<?php if (have_posts()) : the_post(); ?>

	<nav class="single-post-pagenation">
		<ul class="clearfix">
		<?php if( get_previous_post() ) : ?>
		<li class="previous-link">
		<?php previous_post_link('%link') ?>
		</li>
		<?php endif; ?>
		<?php if( get_next_post() ) : ?>
		<li class="next-link"><?php next_post_link('%link') ?></li>
		<?php endif; ?>
		</ul>
	</nav>

	<div class="pageloader-inner">
	<div class="post post-portfolio-single clearfix" id="post-<?php the_ID(); ?>">

	<div class="post-content">
		<?php
		$media_type = get_meta_option('portfolio_type');

		switch($media_type)
		{
			case 'image':
			theme_post_image('portfolio');
			break;

			case 'slideshow':
			theme_post_gallery('portfolio');
			break;

			case 'video':
			theme_post_video('portfolio');
			break;
		}
		?>
	</div>
	<!--End Post Content-->

	<div class="post-entry">
		<h1 class="title"><?php the_title(); ?></h1>
		<?php 
			$date = get_meta_option('portfolio_date');
			$client = get_meta_option('portfolio_client');
			$client_url = get_meta_option('portfolio_client_url');

			#
			#Get cats
			#
			$terms = get_the_terms( $post->ID, 'portfolio-category' );
			if ($terms && ! is_wp_error($terms)) 
			{
				$terms_array = array();
				foreach ( $terms as $term ) 
				{
					$terms_array[] = $term->name;
				}
				$skills = join( ', ', $terms_array );
			}
		?>
		<div class="post-meta clearfix">
			<?php if($skills): ?><p class="skills meta"><b><?php _e('Skills', 'TR'); ?>:</b><?php echo $skills; ?></p><?php endif; ?>
			<?php if($date): ?><p class="date meta"><b><?php _e('Date', 'TR'); ?>:</b><?php echo $date; ?></p><?php endif; ?>
			<?php if($client): ?><p class="client meta"><b><?php _e('Client', 'TR'); ?>:</b><?php echo $client; ?></p><?php endif; ?>
			<p class="post-format"><?php the_content(); ?></p>
			<?php if($client_url): ?><p class="client-url"><a href="<?php echo $client_url; ?>"><?php _e('Launch Project', 'TR'); ?></a></p><?php endif; ?>
		</div>
	</div>
	<!--End Post Entry-->

	</div>
	</div>
	<!--End Portfolio Single-->

	<?php
		global $tr_config;
		$enable_related_posts = $tr_config['enable_portfolio_related_posts'];
		$enable_comments = $tr_config['enable_portfolio_comments'];
		$posts_per_page = $tr_config['portfolio_related_posts_per_page'];
		if($enable_related_posts == true) { theme_related_post('portfolio', 'portfolio-category', true, false, $posts_per_page); }
		if(comments_open() && $enable_comments == true) { comments_template( '', true ); }
	?>

	<?php endif; ?>
</article>
<!--End Content-->

</div>
<!-- #main -->
<?php get_footer(); ?>