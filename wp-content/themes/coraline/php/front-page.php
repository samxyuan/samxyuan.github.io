<?php 
/**
 * Front Page
 * @package by Theme Record
 * @auther: MattMao
*/


#
# Front Page Slogan
#
function front_page_slogan() 
{
	global $tr_config;

	$enable_slideshow = $tr_config['enable_homepage_slideshow'];
	$enable_slogan = $tr_config['enable_homepage_slogan'];
	$slogan_text = $tr_config['homepage_slogan'];

	if($enable_slideshow == 'yes') { $dotted_line = 'no'; } else { $dotted_line = 'yes'; }

	if($enable_slogan == 'yes') { 
		echo do_shortcode('[slogan dotted_line="'.$dotted_line.'"]'.$slogan_text.'[/slogan]'); 
	}
}



#
# Front Page Slideshow
#
function front_page_slideshow() 
{
	global $tr_config;

	$enable_slideshow = $tr_config['enable_homepage_slideshow'];
	$id = $tr_config['homepage_slideshow_id'];

	if($enable_slideshow == 'yes' && $id != '') 
	{
		echo do_shortcode('[slideshow id="'.$id.'"]'); 
	}
}



#
# Front Page Ajax Portfolio
#
function front_page_portfolio() 
{
	global $tr_config;

	$enable_portfolio = $tr_config['enable_homepage_portfolio'];
	$column = $tr_config['homepage_portfolio_column'];
	$cat = $tr_config['homepage_portfolio_cat_ids'];
	$posts_per_page = $tr_config['homepage_portfolio_posts_per_page'];
	$show_ajax = $tr_config['enable_homepage_portfolio_ajax'];
	$show_title = $tr_config['enable_homepage_portfolio_title'];
	$show_skills = $tr_config['enable_homepage_portfolio_skills'];

	if($show_ajax == true) { $type = 'ajax_portfolio'; } else { $type = 'portfolio'; } 

	if($enable_portfolio == 'yes') {
		echo do_shortcode('['.$type.' column="'.$column.'" cat="'.$cat .'" posts_per_page="'.$posts_per_page.'" show_title="'.$show_title.'" show_skills="'.$show_skills.'"]');
	}

}



#
# Front Page Portfolio Slide & Desc
#
function front_page_portfolio_sd() 
{
	global $tr_config;

	$enable_portfolio = $tr_config['enable_homepage_portfolio_sd'];
	$type = $tr_config['homepage_portfolio_sd_type'];
	$title = $tr_config['homepage_portfolio_sd_title'];
	$desc = $tr_config['homepage_portfolio_sd_desc'];
	$cat = $tr_config['homepage_portfolio_sd_cat_ids'];
	$posts_per_page = $tr_config['homepage_portfolio_sd_posts_per_page'];
	$show_title = $tr_config['enable_homepage_portfolio_sd_title'];
	$show_skills = $tr_config['enable_homepage_portfolio_sd_skills'];

	if($enable_portfolio == 'yes') 
	{
		if($type == 'desc')
		{
			echo do_shortcode('[portfolio_desc title="'.$title.'" cat="'.$cat.'" posts_per_page="'.$posts_per_page.'" show_title="'.$show_title.'" show_skills="'.$show_skills.'"]'.$desc.'[/portfolio_desc]');
		}
		else			
		{
			echo do_shortcode('[portfolio_slide title="'.$title.'" cat="'.$cat.'" posts_per_page="'.$posts_per_page.'" show_title="'.$show_title.'" show_skills="'.$show_skills.'"]');
		}
	}
}


#
# Front Page Blog Slide & Desc
#
function front_page_blog_sd() 
{
	global $tr_config;

	$enable_blog = $tr_config['enable_homepage_blog_sd'];
	$type = $tr_config['homepage_blog_sd_type'];
	$title = $tr_config['homepage_blog_sd_title'];
	$desc = $tr_config['homepage_blog_sd_desc'];
	$cat = $tr_config['homepage_blog_sd_cat_ids'];
	$posts_per_page = $tr_config['homepage_blog_sd_posts_per_page'];
	$show_title = $tr_config['enable_homepage_blog_sd_title'];
	$show_meta = $tr_config['enable_homepage_blog_sd_meta'];

	if($enable_blog == 'yes') 
	{
		if($type == 'desc')
		{
			echo do_shortcode('[blog_desc title="'.$title.'" cat="'.$cat.'" posts_per_page="'.$posts_per_page.'" show_title="'.$show_title.'" show_meta="'.$show_meta.'"]'.$desc.'[/blog_desc]');
		}
		else			
		{
			echo do_shortcode('[blog_slide title="'.$title.'" cat="'.$cat.'" posts_per_page="'.$posts_per_page.'" show_title="'.$show_title.'" show_meta="'.$show_meta.'"]');
		}
	}
}


?>