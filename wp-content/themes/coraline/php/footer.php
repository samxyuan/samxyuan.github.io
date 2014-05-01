<?php
/**
 * Footer
 * @package by Theme Record
 * @auther: MattMao
*/


#
#Theme load google analytics
#
function  theme_load_google_analytics() 
{	
	global $tr_config;

	if($tr_config['analytics']) { echo stripslashes($tr_config['analytics']) ."\n"; }
}

add_action('wp_footer', 'theme_load_google_analytics');


#
#Copyright
#
if ( !function_exists( 'theme_site_copyright' ) )
{

	function theme_site_copyright() 
	{
	global $tr_config;
	?>
	<?php if($tr_config['copyright']) : ?>
	<div class="footer-message">
		<p class="col-width"><?php echo $tr_config['copyright']; ?></p>
	</div>
	<?php endif; ?>
	<?php
	}

}



#
#Footer Widgets
#
if ( !function_exists( 'theme_footer_widgets' ) )
{

	function theme_footer_widgets() 
	{
		global $tr_config;

		$enable_footer_widgets = $tr_config['enable_widgets'];
		$columns = $tr_config['widgets_column'];
		$first_col = ' col-first';
		switch($columns)
		{
			case 1: $class = 'col-1-1'; break;
			case 2: $class = 'col-2-1'; break;
			case 3: $class = 'col-3-1'; break;
			case 4: $class = 'col-4-1'; break;
		}

		if($columns == '1')
		{
			if ( ! is_active_sidebar( 'footer-widget-area-1' ))
			return;
		}
		elseif($columns == '2')
		{
			if ( ! is_active_sidebar( 'footer-widget-area-1' )
				&& ! is_active_sidebar( 'footer-widget-area-2' )
			)
			return;
		}
		elseif($columns == '3')
		{
			if ( ! is_active_sidebar( 'footer-widget-area-1' )
				&& ! is_active_sidebar( 'footer-widget-area-2' )
				&& ! is_active_sidebar( 'footer-widget-area-3' )
			)
			return;
		}
		elseif($columns == '4')
		{
			if ( ! is_active_sidebar( 'footer-widget-area-1' )
				&& ! is_active_sidebar( 'footer-widget-area-2' )
				&& ! is_active_sidebar( 'footer-widget-area-3' )
				&& ! is_active_sidebar( 'footer-widget-area-4' )
			)
			return;
		}

		if($enable_footer_widgets == true)
		{
			echo '<div class="footer-widgets-area">'."\n";
			echo '<div class="col-width clearfix">'."\n";
			for ($i = 1; $i <= $columns; $i++)
			{
				echo '<div class="'.$class.$first_col.'">'."\n";
				dynamic_sidebar('footer-widget-area-'.$i);
				echo '</div>'."\n";
				$first_col = '';
			}
			echo '</div>'."\n";
			echo '</div><!--end-->'."\n";
		}
	}

}



#
#Footer twitter function
#
if ( !function_exists('theme_footer_twitter') )
{
	function theme_footer_twitter() 
	{
	global $tr_config;

	$username = $tr_config['footer_twitter'];
	$tweet_count_limit = $tr_config['twitter_number'];
	?>
	<?php if($tr_config['enable_twitter'] == true): ?>
	<div class="footer-twitter-wrap">
	<div id="footer-twitter" class="col-width slides-js-style">
		<div class="slides_container">
		<?php echo theme_footer_tweet_posts($username, $tweet_count_limit, $cache_time = 12); ?>
		</div>
	</div>
	</div>
	<?php endif; ?>
	<?php
	}
}




#
#Theme load drop menu js
#
if ( !function_exists('theme_load_footer_js') )
{
	function  theme_load_footer_js() 
	{	
		echo '<script type="text/javascript">'."\n";
		echo '//<![CDATA['."\n";
		echo 'ddsmoothmenu.init({'."\n";
		echo 'mainmenuid: "top-menu", '."\n";
		echo 'orientation: "h", '."\n";
		echo 'classname: "ddsmoothmenu", '."\n";
		echo 'contentsource: "markup" '."\n";
		echo '});'."\n";
		echo '//]]>'."\n";
		echo '</script>'."\n";

		echo '<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&#038;"></script>'."\n";
	}

	add_action('wp_footer', 'theme_load_footer_js');
}

?>