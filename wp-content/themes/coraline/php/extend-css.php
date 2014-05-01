<?php
/**
 * Extend CSS
 * @package by Theme Record
 * @auther: MattMao
*/

if ( !function_exists( 'theme_extend_styles' ) )
{

	function theme_extend_styles() 
	{
		global $tr_config;

		//Echo Css
		$output = '';
		$output .= '.ddsmoothmenu ul li ul li a { width: '.$tr_config['sub_menu_width'].'px; }'."\n";

		if($tr_config['style_pattern'] != '0') {
			$output .= 'body { background: url('.ASSETS_URI.'/images/backgrounds/pattern-'.$tr_config['style_pattern'].'.png); }'."\n";
		}

		if($tr_config['body_font']) {
			$output .= 'body { font-family: '.$tr_config['body_font'].'; }'."\n";
		}

		if($tr_config['menu_font']) {
			$output .= 'nav { font-family: '.$tr_config['menu_font'].'; }'."\n";
		}

		if($tr_config['hgroup_font']) {
			$output .= 'h1, h2, h3, h4, h5, h6 { font-family: '.$tr_config['hgroup_font'].'; }'."\n";
		}

		if($tr_config['slogan_font']) {
			$output .= '.site-slogan p { font-family: '.$tr_config['slogan_font'].'; }'."\n";
		}

		if($tr_config['custom_css']) {
			$output .= $tr_config['custom_css']."\n";
		}

		echo "\n";
		echo '<!--Extend CSS-->'."\n";
		echo '<style type="text/css">'."\n";
		echo $output;
		echo '</style>'."\n";
		echo "\n";
		echo '<!--Custom CSS-->'."\n";
		echo '<link type="text/css" rel="stylesheet" href="'.ASSETS_URI.'/css/custom.css?ver='.THEME_VERSION.'" media="screen" />'."\n";
	}

	add_action('wp_head', 'theme_extend_styles');

}

?>