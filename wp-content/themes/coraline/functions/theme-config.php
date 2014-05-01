<?php
/**
 * @package by Theme Record
 * @auther: MattMao
*/

global $tr_config;

$page = 'settings';


//General
$tr_config['favicon'] = get_theme_option($page, 'TR_favicon');
$tr_config['contact_email'] = get_theme_option($page, 'contact_email');
$tr_config['enable_recaptcha'] = get_theme_option($page, 'enable_recaptcha');
$tr_config['recaptcha_publickey'] = get_theme_option($page, 'recaptcha_publickey');
$tr_config['recaptcha_privatekey'] = get_theme_option($page, 'recaptcha_privatekey');
$tr_config['enable_responsive'] = get_theme_option($page, 'enable_responsive');
$tr_config['pagination'] = get_theme_option($page, 'pagination');
$tr_config['enable_page_header'] = get_theme_option($page, 'enable_page_header');
$tr_config['analytics'] = get_theme_option($page, 'analytics');



//Header
$tr_config['depth'] = get_theme_option($page, 'menu_depth');
$tr_config['sub_menu_width'] = get_theme_option($page, 'sub_menu_width');
$tr_config['twitter'] = stripslashes(get_theme_option($page, 'twitter'));
$tr_config['facebook'] = stripslashes(get_theme_option($page, 'facebook'));
$tr_config['dribbble'] = stripslashes(get_theme_option($page, 'dribbble'));
$tr_config['vimeo'] = stripslashes(get_theme_option($page, 'vimeo'));
$tr_config['flickr'] = stripslashes(get_theme_option($page, 'flickr'));
$tr_config['feed'] = stripslashes(get_theme_option($page, 'feed'));
$tr_config['linkedin'] = stripslashes(get_theme_option($page, 'linkedin'));
$tr_config['email'] = stripslashes(get_theme_option($page, 'email'));
$tr_config['logo'] = get_theme_option($page, 'TR_logo');
$tr_config['site_desc'] = stripslashes(get_theme_option($page, 'site_desc'));
$tr_config['enable_site_name'] = get_theme_option($page, 'enable_site_name');
$tr_config['enable_site_desc'] = get_theme_option($page, 'enable_site_desc');



//Home
$tr_config['homepage_slogan'] = stripslashes(get_theme_option($page, 'homepage_slogan'));
$tr_config['enable_homepage_slogan'] = get_theme_option($page, 'enable_homepage_slogan');
$tr_config['enable_homepage_slideshow'] = get_theme_option($page, 'enable_homepage_slideshow');
$tr_config['homepage_slideshow_id'] = get_theme_option($page, 'homepage_slideshow_id');
$tr_config['enable_homepage_portfolio'] = get_theme_option($page, 'enable_homepage_portfolio');
$tr_config['homepage_portfolio_column'] = get_theme_option($page, 'homepage_portfolio_column');
$tr_config['homepage_portfolio_posts_per_page'] = get_theme_option($page, 'homepage_portfolio_posts_per_page');
$tr_config['enable_homepage_portfolio_ajax'] = get_theme_option($page, 'enable_homepage_portfolio_ajax');
$tr_config['enable_homepage_portfolio_title'] = get_theme_option($page, 'enable_homepage_portfolio_title');
$tr_config['enable_homepage_portfolio_skills'] = get_theme_option($page, 'enable_homepage_portfolio_skills');
$tr_config['homepage_portfolio_cat_ids'] = get_theme_option($page, 'homepage_portfolio_cat_ids');
$tr_config['enable_homepage_portfolio_sd'] = get_theme_option($page, 'enable_homepage_portfolio_sd');
$tr_config['homepage_portfolio_sd_type'] = get_theme_option($page, 'homepage_portfolio_sd_type');
$tr_config['homepage_portfolio_sd_title'] = get_theme_option($page, 'homepage_portfolio_sd_title');
$tr_config['homepage_portfolio_sd_desc'] = stripslashes(get_theme_option($page, 'homepage_portfolio_sd_desc'));
$tr_config['homepage_portfolio_sd_posts_per_page'] = get_theme_option($page, 'homepage_portfolio_sd_posts_per_page');
$tr_config['enable_homepage_portfolio_sd_title'] = get_theme_option($page, 'enable_homepage_portfolio_sd_title');
$tr_config['enable_homepage_portfolio_sd_skills'] = get_theme_option($page, 'enable_homepage_portfolio_sd_skills');
$tr_config['homepage_portfolio_sd_cat_ids'] = get_theme_option($page, 'homepage_portfolio_sd_cat_ids');
$tr_config['enable_homepage_blog_sd'] = get_theme_option($page, 'enable_homepage_blog_sd');
$tr_config['homepage_blog_sd_type'] = get_theme_option($page, 'homepage_blog_sd_type');
$tr_config['homepage_blog_sd_title'] = get_theme_option($page, 'homepage_blog_sd_title');
$tr_config['homepage_blog_sd_desc'] = stripslashes(get_theme_option($page, 'homepage_blog_sd_desc'));
$tr_config['homepage_blog_sd_posts_per_page'] = get_theme_option($page, 'homepage_blog_sd_posts_per_page');
$tr_config['enable_homepage_blog_sd_title'] = get_theme_option($page, 'enable_homepage_blog_sd_title');
$tr_config['enable_homepage_blog_sd_meta'] = get_theme_option($page, 'enable_homepage_blog_sd_meta');
$tr_config['homepage_blog_sd_cat_ids'] = get_theme_option($page, 'homepage_blog_sd_cat_ids');



//Portfolio
$tr_config['portfolio_display_mode'] = get_theme_option($page, 'portfolio_display_mode');
$tr_config['portfolio_column'] = get_theme_option($page, 'portfolio_column');
$tr_config['portfolio_posts_per_page'] = get_theme_option($page, 'portfolio_posts_per_page');
$tr_config['enable_portfolio_title'] = get_theme_option($page, 'enable_portfolio_title');
$tr_config['enable_portfolio_skills'] = get_theme_option($page, 'enable_portfolio_skills');
$tr_config['enable_portfolio_comments'] = get_theme_option($page, 'enable_portfolio_comments');
$tr_config['enable_portfolio_related_posts'] = get_theme_option($page, 'enable_portfolio_related_posts');
$tr_config['portfolio_related_posts_per_page'] = get_theme_option($page, 'portfolio_related_posts_per_page');



//Blog
$tr_config['blog_posts_per_page'] = get_theme_option($page, 'blog_posts_per_page');
$tr_config['enable_blog_date'] = get_theme_option($page, 'enable_blog_date');
$tr_config['enable_blog_categories'] = get_theme_option($page, 'enable_blog_categories');
$tr_config['enable_blog_author'] = get_theme_option($page, 'enable_blog_author');
$tr_config['enable_blog_comments'] = get_theme_option($page, 'enable_blog_comments');



//Styles
$tr_config['style_layout'] = get_theme_option($page, 'style_layout');
$tr_config['style_skin'] = get_theme_option($page, 'style_skin');
$tr_config['style_pattern'] = get_theme_option($page, 'style_pattern');
$tr_config['custom_css'] = stripslashes(get_theme_option($page, 'custom_css'));
$tr_config['google_fonts_api'] = stripslashes(get_theme_option($page, 'google_fonts_api'));
$tr_config['body_font'] = stripslashes(get_theme_option($page, 'body_font'));
$tr_config['menu_font'] = stripslashes(get_theme_option($page, 'menu_font'));
$tr_config['hgroup_font'] = stripslashes(get_theme_option($page, 'hgroup_font'));
$tr_config['slogan_font'] = stripslashes(get_theme_option($page, 'slogan_font'));



//Footer
$tr_config['copyright'] = stripslashes(get_theme_option($page, 'copyright_message'));
$tr_config['widgets_column'] = get_theme_option($page, 'footer_widgets_column');
$tr_config['enable_widgets'] = get_theme_option($page, 'enable_footer_widgets');
$tr_config['enable_twitter'] = get_theme_option($page, 'enable_footer_twitter');
$tr_config['footer_twitter'] = get_theme_option($page, 'footer_twitter');
$tr_config['twitter_number'] = get_theme_option($page, 'footer_twitter_number');



//Twitter OAuth
$tr_config['consumer_key'] = get_theme_option($page, 'twitter_consumer_key');
$tr_config['consumer_secret'] = get_theme_option($page, 'twitter_consumer_secret');
$tr_config['access_token'] = get_theme_option($page, 'twitter_access_token');
$tr_config['access_token_secret'] = get_theme_option($page, 'twitter_access_token_secret');

?>