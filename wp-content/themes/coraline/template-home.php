<?php
/**
 * Template Name: Home Page
 * @package by Theme Record
 * @auther: MattMao
*/
?>
<?php get_header(); ?>

<div id="main" class="fullwidth clearfix">

<article id="content">

<?php 
	if (have_posts()) : the_post();  
	$content = get_the_content(); 
?>

<?php if($content) : ?>

<div class="post post-single post-fullwidth-single" id="post-<?php the_ID(); ?>">
<div class="post-format"><?php the_content(); ?></div>
</div>

<?php else : ?>

<?php
	front_page_slogan();
	front_page_slideshow(); 
	front_page_portfolio();
	front_page_portfolio_sd();
	front_page_blog_sd();
?>

<?php endif; ?>
<?php endif; ?>


</article>
<!--End Content-->

</div>
<!-- #main -->

<?php get_footer(); ?>