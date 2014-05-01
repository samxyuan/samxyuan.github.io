<?php
/**
 * @package by Theme Record
 * @auther: MattMao
*/

if(!is_admin())
{
	add_action('wp_print_styles', 'theme_load_styles');
	add_action('wp_print_scripts', 'theme_load_scripts');
	add_action('wp_head', 'theme_load_fonts');
}


#
#Add classes for body
#
function body_layout_class($classes) 
{
	global $tr_config;

	if(is_home() || is_archive()) 
	{ 
		$classes[] = 'template-blog '.$tr_config['style_layout']; 
	}
	elseif(is_front_page())
	{
		$classes[] = 'template-front-page '.$tr_config['style_layout']; 
	}
	else
	{
		$classes[] = $tr_config['style_layout'];
	}

	return $classes;
}

add_filter('body_class','body_layout_class');



#
# Styles For The Front
#
function  theme_load_styles() 
{	
	global $tr_config;
	$skin = $tr_config['style_skin'];
	$enable_responsive = $tr_config['enable_responsive'];

	wp_register_style('style', THEME_URI.'/style.css', false, THEME_VERSION, 'screen');
	wp_register_style('shortcode', ASSETS_URI.'/css/shortcode.css', false, THEME_VERSION, 'screen');
	wp_register_style('widget', ASSETS_URI.'/css/widget.css', false, THEME_VERSION, 'screen');
	wp_register_style('slidesjs', ASSETS_URI.'/css/slidesjs.css', false, THEME_VERSION, 'screen');
	wp_register_style('flexslider', ASSETS_URI.'/css/flexslider.css', false, THEME_VERSION, 'screen');
	wp_register_style('fancybox', ASSETS_URI.'/css/fancybox.css', false, THEME_VERSION, 'screen');
	wp_register_style('mediaelementplayer', ASSETS_URI.'/css/mediaelementplayer.css', false, THEME_VERSION, 'screen');
	wp_register_style('responsive', ASSETS_URI.'/css/responsive.css', false, THEME_VERSION, 'screen');
	wp_register_style('skin', ASSETS_URI.'/skins/'.$skin.'.css', false, THEME_VERSION, 'screen');
	wp_enqueue_style('style');
	wp_enqueue_style('shortcode');
	wp_enqueue_style('widget');
	wp_enqueue_style('slidesjs');
	wp_enqueue_style('flexslider');
	wp_enqueue_style('fancybox');
	wp_enqueue_style('mediaelementplayer');
	if($enable_responsive == 'yes') 
	{ 
		wp_enqueue_style('responsive'); 
	}
	wp_enqueue_style('skin');
}


#
# Load google fonts
#
function  theme_load_fonts() 
{
?>

<!--Load google fonts-->
<link href='http://fonts.googleapis.com/css?family=Noticia+Text' rel='stylesheet' type='text/css'>
<?php
	global $tr_config;
	if($tr_config['google_fonts_api']) { echo $tr_config['google_fonts_api']."\n"; }
?>
<?php
}


#
# JavaSrcipts For The Front
#
function  theme_load_scripts() 
{	
	wp_register_script( 'jquery-html5', ASSETS_URI. '/js/jquery-html5-min.js', false, THEME_VERSION );
	wp_register_script( 'jquery-easing', ASSETS_URI. '/js/jquery-easing.js', false, THEME_VERSION );
	wp_register_script( 'jquery-ddsmoothmenu', ASSETS_URI. '/js/jquery-ddsmoothmenu.js', false, THEME_VERSION );
	wp_register_script( 'jquery-lavalamp', ASSETS_URI. '/js/jquery-lavalamp.js', false, THEME_VERSION );
	wp_register_script( 'jquery-quicksand', ASSETS_URI. '/js/jquery-quicksand.js', false, THEME_VERSION );
	wp_register_script( 'jquery-slidesjs', ASSETS_URI. '/js/jquery-slidesjs-min.js', false, THEME_VERSION );
	wp_register_script( 'jquery-flexslider', ASSETS_URI. '/js/jquery-flexslider-min.js', false, THEME_VERSION );
	wp_register_script( 'jquery-fancybox', ASSETS_URI. '/js/jquery-fancybox.js', false, THEME_VERSION );
	wp_register_script( 'jquery-jcarousel', ASSETS_URI. '/js/jquery-jcarousel-min.js', false, THEME_VERSION );
	wp_register_script( 'jquery-placeholder', ASSETS_URI. '/js/jquery-placeholder.js', false, THEME_VERSION );
	wp_register_script( 'jquery-player', ASSETS_URI. '/js/jquery-player-min.js', false, THEME_VERSION );
	wp_register_script( 'jquery-mobilemenu', ASSETS_URI. '/js/jquery-mobilemenu.js', false, THEME_VERSION );
	wp_register_script( 'template', ASSETS_URI. '/js/template.js', false, THEME_VERSION );
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-html5');
	wp_enqueue_script('jquery-easing');
	wp_enqueue_script('jquery-ddsmoothmenu');
	wp_enqueue_script('jquery-lavalamp');
	wp_enqueue_script('jquery-quicksand');
	wp_enqueue_script('jquery-slidesjs');
	wp_enqueue_script('jquery-flexslider');
	wp_enqueue_script('jquery-fancybox');
	wp_enqueue_script('jquery-jcarousel');
	wp_enqueue_script('jquery-placeholder');
	wp_enqueue_script('jquery-player');
	wp_enqueue_script('jquery-mobilemenu');
	wp_enqueue_script('template');
	if ( is_singular() && !is_front_page() && get_option( 'thread_comments' ) == true ) 
	{ 
		wp_enqueue_script( 'comment-reply' ); 
	}
}


#
# Add favicon icon
#
function theme_load_favicon_icon() 
{
	global $tr_config;

	if($tr_config['favicon']) { echo '<link rel="shortcut icon" href="'.$tr_config['favicon'].'" />',"\n"; }
}

add_action('wp_head', 'theme_load_favicon_icon');


#
#Top Menu
#
function theme_top_wp_nav() 
{
	global $tr_config;

	$args = array( 
		'container' => 'nav',
		'container_id' => 'top-menu', 
		'container_class' =>'ddsmoothmenu', 
		'menu_class' => 'drop-menu',
		'fallback_cb' => 'theme_top_wp_page', 
		'theme_location' => 'top menu',
		'depth' => $tr_config['depth']
	);
	wp_nav_menu($args); 
}


#
#Top Page Menu
#
function theme_top_wp_page() 
{
	global $tr_config;

	$args = array(
		'title_li' => '0',
		'sort_column' => 'menu_order',
		'depth' => $tr_config['depth']
	);

	echo '<nav id="top-menu" class="ddsmoothmenu">'."\n";
	echo '<ul class="drop-menu">'."\n";
	wp_list_pages($args); 
	echo '</ul>'."\n";
	echo '</nav>'."\n";
}


#
#Social Networking
#
function theme_social_networking() 
{
	global $tr_config;

	?>
	<div id="social-networking">
	<ul class="clearfix">
	<?php if($tr_config['twitter']): ?><li><a href="http://twitter.com/<?php echo $tr_config['twitter']; ?>" id="twitter-link" rel="external">twitter</a></li><?php endif; ?>
	<?php if($tr_config['facebook']): ?><li><a href="http://www.facebook.com/<?php echo $tr_config['facebook']; ?>" id="facebook-link" rel="external">facebook</a></li><?php endif; ?>
	<?php if($tr_config['dribbble']): ?><li><a href="http://dribbble.com/<?php echo $tr_config['dribbble']; ?>" id="dribbble-link" rel="external">dribbble</a></li><?php endif; ?>
	<?php if($tr_config['vimeo']): ?><li><a href="http://vimeo.com/<?php echo $tr_config['vimeo']; ?>" id="vimeo-link" rel="external">vimeo</a></li><?php endif; ?>
	<?php if($tr_config['flickr']): ?><li><a href="http://www.flickr.com/photos/<?php echo $tr_config['flickr']; ?>" id="flickr-link" rel="external">flickr</a></li><?php endif; ?>
	<?php if($tr_config['feed']): ?><li><a href="<?php echo $tr_config['feed']; ?>" id="feed-link" rel="external">feed</a></li><?php endif; ?>
	<?php if($tr_config['linkedin']): ?><li><a href="http://www.linkedin.com/in/<?php echo $tr_config['linkedin']; ?>" id="linkedin-link" rel="external">linkedin</a></li><?php endif; ?>
	<?php if($tr_config['email']): ?><li><a href="mailto:<?php echo $tr_config['email']; ?>" id="email-link" rel="external">email</a></li><?php endif; ?>
	</ul>
	</div>
	<?php
}


#
#Site Logo & Name
#
function theme_site_name() 
{
	global $tr_config;
	?>
	<?php if($tr_config['enable_site_name'] == true): ?>
	<div class="site-name">
	<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	<?php elseif($tr_config['logo']): ?>
	<div class="site-logo">
	<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php echo $tr_config['logo']; ?>" /></a>
	<?php endif; ?>

	<?php if($tr_config['enable_site_desc'] == true): ?>
	<p>
	<?php 
		if($tr_config['site_desc'])
		{ 
			echo $tr_config['site_desc']; 
		}
		else
		{
			bloginfo( 'description' ); 
		}	
	?>
	</p>
	<?php endif; ?>

	</div>
	<?php
}
?>
