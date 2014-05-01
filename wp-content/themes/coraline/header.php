<?php
/**
 * Header
 * @package by Theme Record
 * @auther: MattMao
 */
global $tr_config;
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<!--Begin head-->
<head>

<!--Meta Tags-->
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<?php if($tr_config['enable_responsive'] == 'yes'): ?>
<!-- scaling not possible (for iphone, ipad, etc.) -->
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<?php endif; ?>

<!--Title-->
<title><?php wp_title('|', true, 'right'); ?></title>

<!--Pingbacks-->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php if($tr_config['feed']) { echo $tr_config['feed']; } else { bloginfo('rss2_url'); } ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>

<!--Styles And JavaSrcipts-->
<?php wp_head(); ?>

<!--End head-->
</head>

<!--Begin Body-->
<body <?php body_class(); ?>>

<div id="page" class="hfeed">

<!--Begin Header-->
<header id="site-head">

<section class="topbar">
	<div class="col-width clearfix">
	<?php theme_top_wp_nav(); ?>
	<?php theme_social_networking(); ?>
	</div>
</section>


<div id="header-image">
	<div  class="col-width">
	<h1>Samantha Yuan</h1>
	<span>Not just another storyteller</span>
	</div>
</div>


<?php theme_page_header(); ?>
<!--End Header-->
</header>

<?php 
if(is_front_page() || is_page())
{
	echo '<div id="ajax-wrap">';
	echo '<div id="loader" class="col-width"><img src="'.ASSETS_URI.'/images/big-loader.gif" alt="loader" title="Ajax loader"></div>'."\n";
	echo '<div id="close" class="col-width"><a href="#">close</a></div>'."\n";
	echo '<article id="page-ajax-content">'."\n";
	echo '<div id="pageloader"></div>';
	echo '</article>'."\n";
	echo '</div>';
}
?>