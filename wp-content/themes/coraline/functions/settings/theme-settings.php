<?php 
/**
 *  @package by Theme Record
*/

$options = array(

	array('type' => 'tabs_head'),

	//Tab Title
	array('type' => 'tab_title_head'),
	array('name' => __('General', 'TR'), 'slug' => 'general', 'class' => 'active', 'type' => 'tab'),
	array('name' => __('Header', 'TR'), 'slug' => 'header', 'type' => 'tab'),
	array('name' => __('FrontPage', 'TR'), 'slug' => 'homepage', 'type' => 'tab'),
	array('name' => __('Portfolio', 'TR'), 'slug' => 'portfolio', 'type' => 'tab'),
	array('name' => __('Blog', 'TR'), 'slug' => 'blog', 'type' => 'tab'),
	array('name' => __('Styles', 'TR'), 'slug' => 'styles', 'type' => 'tab'),
	array('name' => __('Footer', 'TR'), 'slug' => 'footer', 'type' => 'tab'),
	array('name' => __('Twitter OAuth', 'TR'), 'slug' => 'twitter-oauth', 'type' => 'tab'),
	array('type' => 'tab_title_foot'),


	//General
	array('slug' => 'general', 'type' => 'tab_content_head'),
	array(
			'name' => __('Favicon', 'TR'),
			'desc' => __('To upload an image click on "Upload favicon" button. Once the image is as custom favicon.', 'TR'),
			'id' => 'TR_favicon',
			'std' => '',
			'title' => 'Enter a URL or upload an image for your favicon:',
			'size' => '60',
			'button' => __('Upload Favicon', 'TR'),
			'type' => 'upload'
	),
	array(
			'name' => __('Contact Email', 'TR'),
			'desc' => __('Enter your email for the contact form.', 'TR'),
			'id' => 'contact_email',
			'std' => get_option('admin_email'),
			'size' => '60',
			'type' => 'text',
	),
	array(
			'name' => __('Recaptcha',  'TR'),
			'desc' => __('Enable the recaptcha for the contact page.',  'TR'),
			'id' => 'enable_recaptcha',
			'std' => 1,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Recaptcha Publickey', 'TR'),
			'desc' => __('Your reCAPTCHA public key, from the <a href="https://www.google.com/recaptcha/admin/create?app=php" target="_blank">API Signup Page</a>.', 'TR'),
			'id' => 'recaptcha_publickey',
			'std' => '',
			'size' => '60',
			'type' => 'text',
	),
	array(
			'name' => __('Recaptcha Privatekey', 'TR'),
			'desc' => __('Your reCAPTCHA private key, from the <a href="https://www.google.com/recaptcha/admin/create?app=php" target="_blank">API Signup Page</a>.', 'TR'),
			'id' => 'recaptcha_privatekey',
			'std' => '',
			'class' => 'no',
			'size' => '60',
			'type' => 'text',
	),
	array(
			'name' => __('Enable Responsive', 'TR'),
			'desc' => __("If you check yes, you'll globally display the site by responsive.", 'TR'),
			'id' => 'enable_responsive',
			'std' => 'yes',
			'options' => array(
				'yes' => __('Yes', 'TR'),
				'no' => __('No', 'TR')
			),
			'type' => 'radio',
	),
	array(
			'name' => __('Pagination',  'TR'),
			'id' => 'pagination',
			'std' => 'style',
			'options' => array(
				'style' => 'Style pagination',
				'default' => 'Default pagination'
			),
			'type' => 'radio'
	),
	array(
			'name' => __('Page Header',  'TR'),
			'desc' => __('Display the page header, it will display with title and breadcrumb.',  'TR'),
			'id' => 'enable_page_header',
			'std' => 1,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Google Analytics', 'TR'),
			'desc' => __('Paste your <a href="http://www.google.com/analytics/" target="_blank">analytics code</a> here, it will get applied to each page.', 'TR'),
			'id' => 'analytics',
			'std' => '',
			'rows' => '5',
			'class' => 'no',
			'type' => 'textarea'
	),
	array('type' => 'tab_content_foot'),




	//Header
	array('slug' => 'header', 'class' => 'hide', 'type' => 'tab_content_head'),
	array('name' => 'Logo', 'class' => 'no', 'type' => 'tab_sub_title'),
	array(
			'name' => __('Logo Image', 'TR'),
			'desc' => __('To upload an image click on "Upload Image" button. Once the image is uploaded it will give you various options.', 'TR'),
			'id' => 'TR_logo',
			'std' => ASSETS_URI.'/images/logo.png',
			'title' => 'Enter a URL or upload an image for your logo:',
			'size' => '60',
			'button' => __('Upload Logo', 'TR'),
			'type' => 'upload'
	),
	array(
			'name' => __('Enable Text Logo', 'TR'),
			'desc' => __("If you checked this, you'll globally display the logo with text.", 'TR'),
			'id' => 'enable_site_name',
			'std' => 0,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Enable Description', 'TR'),
			'desc' => __("If you checked this, you'll globally enable the site description.", 'TR'),
			'id' => 'enable_site_desc',
			'std' => 1,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Description', 'TR'),
			'desc' => __('Enter the description for your site, if you leave it blank, we will get it from the <a href="'.home_url( '/' ).'wp-admin/options-general.php">general settings</a>.', 'TR'),
			'id' => 'site_desc',
			'std' => get_bloginfo( 'description' ),
			'rows' => '3',
			'class' => 'no',
			'type' => 'textarea'
	),

	array('name' => 'Menu', 'type' => 'tab_sub_title'),
	array(
			'name' => __('Depth', 'TR'),
			'desc' => __('Set it to "0", the menu level will be unlimited.', 'TR'),
			'id' => 'menu_depth',
			'std' => '3',
			'size' => '5',
			'unit' => 'level',
			'type' => 'text'
	),
	array(
			'name' => __('Sub Menu Width', 'TR'),
			'id' => 'sub_menu_width',
			'std' => '160',
			'size' => '5',
			'unit' => 'pixel',
			'class' => 'no',
			'type' => 'text'
	),

	array('name' => 'Social Media', 'type' => 'tab_sub_title'),
	array(
			'name' => __('Twitter', 'TR'),
			'desc' => __('Enter your twitter account.', 'TR'),
			'id' => 'twitter',
			'std' => '',
			'size' => '30',
			'type' => 'text'
	),
	array(
			'name' => __('Facebook', 'TR'),
			'desc' => __('Enter your facebook account.', 'TR'),
			'id' => 'facebook',
			'std' => '',
			'size' => '30',
			'type' => 'text'
	),
	array(
			'name' => __('Dribbble', 'TR'),
			'desc' => __('Enter your dribbble account.', 'TR'),
			'id' => 'dribbble',
			'std' => '',
			'size' => '30',
			'type' => 'text'
	),
	array(
			'name' => __('Vimeo', 'TR'),
			'desc' => __('Enter your vimeo account.', 'TR'),
			'id' => 'vimeo',
			'std' => '',
			'size' => '30',
			'type' => 'text'
	),
	array(
			'name' => __('Flickr', 'TR'),
			'desc' => __('Enter your flickr id, <a href="http://idgettr.com/" target="_blank">Get your flickr id.</a>', 'TR'),
			'id' => 'flickr',
			'std' => '',
			'size' => '30',
			'type' => 'text'
	),
	array(
			'name' => __('Feedburner', 'TR'),
			'desc' => __('Enter your feedburner url, if you do not want to display this, just leave it blank.', 'TR'),
			'id' => 'feed',
			'std' => get_bloginfo('rss2_url'),
			'size' => '60',
			'type' => 'text'
	),
	array(
			'name' => __('LinkedIn', 'TR'),
			'desc' => __('Enter your linkedin username.', 'TR'),
			'id' => 'linkedin',
			'std' => '',
			'size' => '60',
			'class' => 'no',
			'type' => 'text'
	),
	array(
			'name' => __('Email', 'TR'),
			'desc' => __('Enter your email address.', 'TR'),
			'id' => 'email',
			'std' => get_option('admin_email'),
			'size' => '60',
			'class' => 'no',
			'type' => 'text'
	),
	array('type' => 'tab_content_foot'),




	//Homepage
	array('slug' => 'homepage', 'class' => 'hide', 'type' => 'tab_content_head'),
	
	array('name' => 'Slogan', 'class' => 'no', 'type' => 'tab_sub_title'),
	array(
			'name' => __('Enable Slogan', 'TR'),
			'desc' => __("If you check yes, you'll globally display slogan in homepage.", 'TR'),
			'id' => 'enable_homepage_slogan',
			'std' => 'yes',
			'options' => array(
				'yes' => __('Yes', 'TR'),
				'no' => __('No', 'TR')
			),
			'type' => 'radio',
	),
	array(
			'name' => __('Slogan Text', 'TR'),
			'desc' => __('Enter the slogan text, you can use html tags.', 'TR'),
			'id' => 'homepage_slogan',
			'std' => 'Hello! My name is Matt Mao and I am a freelance website designer based in <a href="'.home_url( '/' ).'">Canada</a>, lives in Japan.',
			'rows' => '4',
			'class' => 'no',
			'type' => 'textarea'
	),


	array('name' => 'Slideshow', 'type' => 'tab_sub_title'),
	array(
			'name' => __('Enable Slideshow', 'TR'),
			'desc' => __("If you check yes, you'll globally display slideshow in homepage.", 'TR'),
			'id' => 'enable_homepage_slideshow',
			'std' => 'yes',
			'options' => array(
				'yes' => __('Yes', 'TR'),
				'no' => __('No', 'TR')
			),
			'type' => 'radio',
	),
	array(
			'name' => __('Slideshow ID','TR'),
			'desc' => __('Choose a slideshow for your homepage.', 'TR'),
			'id' => 'homepage_slideshow_id',
			'std' => '',
			'prompt' => __('Choose slideshow..','TR'),
			'target' => 'slideshow',
			'class' => 'no',
			'type' => 'select',
	),


	array('name' => 'Ajax Portfolo / Portfolio', 'type' => 'tab_sub_title'),
	array(
			'name' => __('Enable Portfolio', 'TR'),
			'desc' => __("If you check yes, you'll globally display ajax portfolo in homepage.", 'TR'),
			'id' => 'enable_homepage_portfolio',
			'std' => 'yes',
			'options' => array(
				'yes' => __('Yes', 'TR'),
				'no' => __('No', 'TR')
			),
			'type' => 'radio',
	),
	array(
			'name' => __('Columns', 'TR'),
			'desc' => __('Choose a column for your ajax portfolo / portfolio.', 'TR'),
			'id' => 'homepage_portfolio_column',
			'std' => '3',
			'options' => array(
				'2' => FUNCTIONS_URI.'/assets/images/layout/col-2-1.png',
				'3' => FUNCTIONS_URI.'/assets/images/layout/col-3-1.png',
				'4' => FUNCTIONS_URI.'/assets/images/layout/col-4-1.png'
			),
			'type' => 'img_select'
	),
	array(
			'name' => __('Posts Per Page', 'TR'),
			'desc' => __('Set how many items do you want to display in home page.', 'TR'),
			'id' => 'homepage_portfolio_posts_per_page',
			'std' => '12',
			'size' => '5',
			'unit' => 'items',
			'type' => 'text'
	),
	array(
			'name' => __('Enable Ajax', 'TR'),
			'desc' => __("If you checked this, you'll globally display the portfolio by ajax.", 'TR'),
			'id' => 'enable_homepage_portfolio_ajax',
			'std' => 1,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Show title', 'TR'),
			'desc' => __("If you checked this, you'll globally display title.", 'TR'),
			'id' => 'enable_homepage_portfolio_title',
			'std' => 1,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Show skills', 'TR'),
			'desc' => __("If you checked this, you'll globally display skills.", 'TR'),
			'id' => 'enable_homepage_portfolio_skills',
			'std' => 1,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Portfolio Cat IDs', 'TR'),
			'desc' => __('Enter the cat ids that you want to display in homepage, separated by commas.', 'TR'),
			'id' => 'homepage_portfolio_cat_ids',
			'std' => '',
			'rows' => '2',
			'class' => 'no',
			'type' => 'textarea'
	),


	array('name' => 'Portfolo Slide / Desc', 'type' => 'tab_sub_title'),
	array(
			'name' => __('Enable Portfolio', 'TR'),
			'desc' => __("If you check yes, you'll globally display portfolo slide / desc in homepage.", 'TR'),
			'id' => 'enable_homepage_portfolio_sd',
			'std' => 'yes',
			'options' => array(
				'yes' => __('Yes', 'TR'),
				'no' => __('No', 'TR')
			),
			'type' => 'radio',
	),
	array(
			'name' => __('Portfolio Type', 'TR'),
			'desc' => __('Choose the portfolio type for the homepage.', 'TR'),
			'id' => 'homepage_portfolio_sd_type',
			'std' => 'slide',
			'options' => array(
				'slide' => __('Slide (Show the portfolio with slide.)', 'TR'),
				'desc' => __('Desc (Show the portfolio with category description.)', 'TR')
			),
			'type' => 'radio',
	),
	array(
			'name' => __('Title', 'TR'),
			'desc' => __('Enter the title for the portfolios.', 'TR'),
			'id' => 'homepage_portfolio_sd_title',
			'std' => 'Related Works',
			'size' => '30',
			'type' => 'text'
	),
	array(
			'name' => __('Description', 'TR'),
			'desc' => __('Enter the description for the portfolios, you can add the text with html tags.', 'TR'),
			'id' => 'homepage_portfolio_sd_desc',
			'std' => '<p>This is the description text for the portfolio desc.</p> <a href="http://demo.themerecord.com/coraline/">See more works</a>',
			'rows' => '2',
			'class' => 'no',
			'type' => 'textarea'
	),
	array(
			'name' => __('Posts Per Page', 'TR'),
			'desc' => __('Set how many items do you want to display in home page.', 'TR'),
			'id' => 'homepage_portfolio_sd_posts_per_page',
			'std' => '8',
			'size' => '5',
			'unit' => 'items',
			'type' => 'text'
	),
	array(
			'name' => __('Show title', 'TR'),
			'desc' => __("If you checked this, you'll globally display title.", 'TR'),
			'id' => 'enable_homepage_portfolio_sd_title',
			'std' => 1,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Show skills', 'TR'),
			'desc' => __("If you checked this, you'll globally display skills.", 'TR'),
			'id' => 'enable_homepage_portfolio_sd_skills',
			'std' => 1,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Portfolio Cat IDs', 'TR'),
			'desc' => __('Enter the cat ids that you want to display in homepage, separated by commas.', 'TR'),
			'id' => 'homepage_portfolio_sd_cat_ids',
			'std' => '',
			'rows' => '2',
			'class' => 'no',
			'type' => 'textarea'
	),


	array('name' => 'Blog Slide / Desc', 'type' => 'tab_sub_title'),
	array(
			'name' => __('Enable Blog', 'TR'),
			'desc' => __("If you check yes, you'll globally display blog slide / desc in homepage.", 'TR'),
			'id' => 'enable_homepage_blog_sd',
			'std' => 'yes',
			'options' => array(
				'yes' => __('Yes', 'TR'),
				'no' => __('No', 'TR')
			),
			'type' => 'radio',
	),
	array(
			'name' => __('Blog Type', 'TR'),
			'desc' => __('Choose the blog type for the homepage.', 'TR'),
			'id' => 'homepage_blog_sd_type',
			'std' => 'slide',
			'options' => array(
				'slide' => __('Slide (Show the blog with slide.)', 'TR'),
				'desc' => __('Desc (Show the blog with category description.)', 'TR')
			),
			'type' => 'radio',
	),
	array(
			'name' => __('Title', 'TR'),
			'desc' => __('Enter the title for the blog.', 'TR'),
			'id' => 'homepage_blog_sd_title',
			'std' => 'Related News',
			'size' => '30',
			'type' => 'text'
	),
	array(
			'name' => __('Description', 'TR'),
			'desc' => __('Enter the description for the blog, you can add the text with html tags.', 'TR'),
			'id' => 'homepage_blog_sd_desc',
			'std' => '<p>This is the description text for the blog desc.</p> <a href="http://demo.themerecord.com/coraline/">See more news</a>',
			'rows' => '2',
			'class' => 'no',
			'type' => 'textarea'
	),
	array(
			'name' => __('Posts Per Page', 'TR'),
			'desc' => __('Set how many items do you want to display in home page.', 'TR'),
			'id' => 'homepage_blog_sd_posts_per_page',
			'std' => '8',
			'size' => '5',
			'unit' => 'items',
			'type' => 'text'
	),
	array(
			'name' => __('Show title', 'TR'),
			'desc' => __("If you checked this, you'll globally display title.", 'TR'),
			'id' => 'enable_homepage_blog_sd_title',
			'std' => 1,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Show meta', 'TR'),
			'desc' => __("If you checked this, you'll globally display meta.", 'TR'),
			'id' => 'enable_homepage_blog_sd_meta',
			'std' => 1,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Blog Cat IDs', 'TR'),
			'desc' => __('Enter the cat ids that you want to display in homepage, separated by commas.', 'TR'),
			'id' => 'homepage_blog_sd_cat_ids',
			'std' => '',
			'rows' => '2',
			'class' => 'no',
			'type' => 'textarea'
	),


	array('type' => 'tab_content_foot'),



	//Portfolio
	array('slug' => 'portfolio', 'class' => 'hide', 'type' => 'tab_content_head'),
	array(
			'name' => __('Display Mode',  'TR'),
			'desc' => __('Set the display mode for your portfolio.',  'TR'),
			'id' => 'portfolio_display_mode',
			'std' => '1',
			'options' => array(
				'1' => '[ Classic sortable ]',
				'2' => '[ Classic sortable ] + [ Filter ]',
				'3' => '[ jQuery sortable ] + [ Filter ]'
			),
			'type' => 'radio'
	),
	array(
			'name' => __('Columns', 'TR'),
			'desc' => __('Choose a column for your portfolio list.', 'TR'),
			'id' => 'portfolio_column',
			'std' => '3',
			'options' => array(
				'2' => FUNCTIONS_URI.'/assets/images/layout/col-2-1.png',
				'3' => FUNCTIONS_URI.'/assets/images/layout/col-3-1.png',
				'4' => FUNCTIONS_URI.'/assets/images/layout/col-4-1.png'
			),
			'type' => 'img_select'
	),
	array(
			'name' => __('Posts Per Page', 'TR'),
			'desc' => __('Set how many items do you want to display in portfolio page.', 'TR'),
			'id' => 'portfolio_posts_per_page',
			'std' => '16',
			'size' => '5',
			'unit' => 'items',
			'type' => 'text'
	),
	array(
			'name' => __('Show title', 'TR'),
			'desc' => __("If you checked this, you'll globally display title.", 'TR'),
			'id' => 'enable_portfolio_title',
			'std' => 1,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Show skills', 'TR'),
			'desc' => __("If you checked this, you'll globally display skills.", 'TR'),
			'id' => 'enable_portfolio_skills',
			'std' => 1,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Enable Comments', 'TR'),
			'desc' => __("If you checked this, you'll globally enable the Comments.", 'TR'),
			'id' => 'enable_portfolio_comments',
			'std' => 0,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Enable Related Posts', 'TR'),
			'desc' => __("If you checked this, you'll globally enable the Related Posts.", 'TR'),
			'id' => 'enable_portfolio_related_posts',
			'std' => 1,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Posts Per Page','TR'),
			'desc' => __('Set how many items do you want to display in related posts.','TR'),
			'id' => 'portfolio_related_posts_per_page',
			'std' => '8',
			'size' => '5',
			'unit' => 'items',
			'class' => 'no',
			'type' => 'text'
	),
	array('type' => 'tab_content_foot'),




	//Blog
	array('slug' => 'blog', 'class' => 'hide', 'type' => 'tab_content_head'),
	array(
			'name' => __('Posts Per Page', 'TR'),
			'desc' => __('Set how many items do you want to display in blog page.', 'TR'),
			'id' => 'blog_posts_per_page',
			'std' => '10',
			'size' => '5',
			'unit' => 'items',
			'type' => 'text'
	),
	array(
			'name' => __('Enable Date', 'TR'),
			'desc' => __("If you checked this, you'll globally enable the date.", 'TR'),
			'id' => 'enable_blog_date',
			'std' => 1,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Enable Categories', 'TR'),
			'desc' => __("If you checked this, you'll globally enable the categories.", 'TR'),
			'id' => 'enable_blog_categories',
			'std' => 1,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Enable Author', 'TR'),
			'desc' => __("If you checked this, you'll globally enable the author.", 'TR'),
			'id' => 'enable_blog_author',
			'std' => 1,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Enable Comments', 'TR'),
			'desc' => __("If you checked this, you'll globally enable the comments.", 'TR'),
			'id' => 'enable_blog_comments',
			'std' => 1,
			'class' => 'no',
			'type' => 'checkbox'
	),
	array('type' => 'tab_content_foot'),




	//Styles
	array('slug' => 'styles', 'class' => 'hide', 'type' => 'tab_content_head'),
	array(
			'name' => __('Layout',  'TR'),
			'desc' => __('Set the display mode for your portfolio.',  'TR'),
			'id' => 'style_layout',
			'std' => 'liquid',
			'options' => array(
				'fixed' => 'Fixed',
				'liquid' => 'Liquid'
			),
			'type' => 'radio'
	),
	array(
			'name' => __('Pattern', 'TR'),
			'desc' => __('Choose a pattern for your site.', 'TR'),
			'id' => 'style_pattern',
			'std' => '0',
			'options' => array(
				'0' => 'Disabled',
				'1' => 'Pattern 1',
				'2' => 'Pattern 2',
				'3' => 'Pattern 3',
				'4' => 'Pattern 4',
				'5' => 'Pattern 5',
				'6' => 'Pattern 6',
				'7' => 'Pattern 7',
				'8' => 'Pattern 8',
				'9' => 'Pattern 9',
				'10' => 'Pattern 10',
				'11' => 'Pattern 11',
				'12' => 'Pattern 12'
			),
			'type' => 'select'
	),
	array(
			'name' => __('Skins', 'TR'),
			'desc' => __('Choose a skin for your site.', 'TR'),
			'id' => 'style_skin',
			'std' => 'light-green',
			'options' => array(
				'orange' => FUNCTIONS_URI.'/assets/images/skins/orange.png',
				'pink' => FUNCTIONS_URI.'/assets/images/skins/pink.png',
				'g-red' => FUNCTIONS_URI.'/assets/images/skins/g-red.png',
				'red' => FUNCTIONS_URI.'/assets/images/skins/red.png',
				'light-green' => FUNCTIONS_URI.'/assets/images/skins/light-green.png',
				'light-blue' => FUNCTIONS_URI.'/assets/images/skins/light-blue.png',
				'blue' => FUNCTIONS_URI.'/assets/images/skins/blue.png',
				'purple' => FUNCTIONS_URI.'/assets/images/skins/purple.png',
				'green' => FUNCTIONS_URI.'/assets/images/skins/green.png',
				'lime' => FUNCTIONS_URI.'/assets/images/skins/lime.png',
				'cyan' => FUNCTIONS_URI.'/assets/images/skins/cyan.png',
				'navy' => FUNCTIONS_URI.'/assets/images/skins/navy.png',
				'dark' => FUNCTIONS_URI.'/assets/images/skins/dark.png',
				'noisy-blue' => FUNCTIONS_URI.'/assets/images/skins/noisy-blue.png',
				'grunge' => FUNCTIONS_URI.'/assets/images/skins/grunge.png'
			),
			'type' => 'img_select'
	),
	array(
			'name' => __('Custom CSS', 'TR'),
			'desc' => __("Add only the css code without <span> &lt;style&gt;&lt;/style&gt; </span> style blocks. They are auto added. it's easy to customize your site.", 'TR'),
			'id' => 'custom_css',
			'std' => '',
			'rows' => '5',
			'type' => 'textarea'
	),
	array(
			'name' => __('Google Fonts Api', 'TR'),
			'desc' => __("Add your google fonts api here. e.g: <span>&lt;link href='http://fonts.googleapis.com/css?family=Noticia+Text' rel='stylesheet' type='text/css'&gt;</span>", 'TR'),
			'id' => 'google_fonts_api',
			'std' => '',
			'rows' => '5',
			'type' => 'textarea'
	),
	array(
			'name' => __('Body Font', 'TR'),
			'desc' => __('Enter your own font family here. e.g: <span>"Helvetica Neue", Helvetica, Arial, serif, sans-serif;</span>', 'TR'),
			'id' => 'body_font',
			'std' => '',
			'rows' => '2',
			'type' => 'textarea'
	),
	array(
			'name' => __('Menu Font', 'TR'),
			'desc' => __('Enter your own font family here. e.g: <span>"Helvetica Neue", Helvetica, Arial, serif, sans-serif;</span>', 'TR'),
			'id' => 'menu_font',
			'std' => '',
			'rows' => '2',
			'type' => 'textarea'
	),
	array(
			'name' => __('Hgroup Font', 'TR'),
			'desc' => __('Enter your own font family here. e.g: <span>"Helvetica Neue", Helvetica, Arial, serif, sans-serif;</span>', 'TR'),
			'id' => 'hgroup_font',
			'std' => '',
			'rows' => '2',
			'type' => 'textarea'
	),
	array(
			'name' => __('Slogan Font', 'TR'),
			'desc' => __('Enter your own font family here. e.g: <span>"Helvetica Neue", Helvetica, Arial, serif, sans-serif;</span>', 'TR'),
			'id' => 'slogan_font',
			'std' => '',
			'class' => 'no',
			'rows' => '2',
			'type' => 'textarea'
	),
	array('type' => 'tab_content_foot'),




	//Footer
	array('slug' => 'footer', 'class' => 'hide', 'type' => 'tab_content_head'),
	array(
			'name' => __('Enable Footer Twitter',  'TR'),
			'desc' => __('Display footer twitter in the bottom of site.',  'TR'),
			'id' => 'enable_footer_twitter',
			'std' => 1,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Footer Twitter', 'TR'),
			'desc' => __('Enter your twitter account.', 'TR'),
			'id' => 'footer_twitter',
			'std' => 'envato',
			'size' => '30',
			'type' => 'text'
	),
	array(
			'name' => __('Twitter Number', 'TR'),
			'desc' => __('Set how many items do you want to display.', 'TR'),
			'id' => 'footer_twitter_number',
			'std' => '3',
			'size' => '5',
			'unit' => 'items',
			'type' => 'text'
	),
	array(
			'name' => __('Footer Widgets',  'TR'),
			'desc' => __('Display footer widgets in the bottom of site.',  'TR'),
			'id' => 'enable_footer_widgets',
			'std' => 1,
			'type' => 'checkbox'
	),
	array(
			'name' => __('Widgets Columns', 'TR'),
			'desc' => __('Choose a column for your footer widgets area.', 'TR'),
			'id' => 'footer_widgets_column',
			'std' => '3',
			'options' => array(
				'1' => FUNCTIONS_URI.'/assets/images/layout/col-1-1.png',
				'2' => FUNCTIONS_URI.'/assets/images/layout/col-2-1.png',
				'3' => FUNCTIONS_URI.'/assets/images/layout/col-3-1.png',
				'4' => FUNCTIONS_URI.'/assets/images/layout/col-4-1.png'
			),
			'type' => 'img_select'
	),
	array(
			'name' => __('Copyright Text',  'TR'),
			'desc' => __('You can add your copyright message here.',  'TR'),
			'id' => 'copyright_message',
			'std' => 'Copyright &copy; 2012 <a href="'. home_url( '/' ) . '">' .esc_attr( get_bloginfo('name') ).'</a>, All rights reserved. Design by <a href="http://themeforest.net/user/MattMao/">MattMao</a>',
			'rows' => '5',
			'class' => 'no',
			'type' => 'textarea'
	),
	array('type' => 'tab_content_foot'),


	//Twitter OAuth
	array('slug' => 'twitter-oauth', 'class' => 'hide', 'type' => 'tab_content_head'),

	array(
			'name' => __('Consumer Key', 'TR'),
			'id' => 'twitter_consumer_key',
			'std' => '',
			'size' => '80',
			'type' => 'text'
	),

	array(
			'name' => __('Consumer Secret', 'TR'),
			'id' => 'twitter_consumer_secret',
			'std' => '',
			'size' => '80',
			'type' => 'text'
	),

	array(
			'name' => __('Access Token', 'TR'),
			'id' => 'twitter_access_token',
			'std' => '',
			'size' => '80',
			'type' => 'text'
	),

	array(
			'name' => __('Access Token Secret', 'TR'),
			'id' => 'twitter_access_token_secret',
			'std' => '',
			'size' => '80',
			'type' => 'text'
	),

	array('type' => 'tab_content_foot'),


	array('type' => 'tabs_foot')

);

return array('auto' => true, 'name' => 'settings', 'options' => $options );

?>