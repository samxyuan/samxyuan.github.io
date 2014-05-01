<?php

/*-----------------------------------------------------------------------------------*/
/*	Accordions
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['accordions'] = array(
	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[accordions] {{child_shortcode}}  [/accordions]',
	'popup_title' => __('Insert Accordions Shortcode', 'TR'),

	'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Accordion Title',
                'type' => 'text',
                'label' => __('Title', 'TR'),
                'desc' => __('Title of the accordion.', 'TR')
            ),
			'active' => array(
				'type' => 'select',
				'label' => __('Active', 'TR'),
				'desc' => __('Select the status of the accordion.', 'TR'),
				'options' => array(
					'yes' => 'Yes',
					'no' => 'No'
				)
			),
            'content' => array(
                'std' => 'Accordion Content',
                'type' => 'textarea',
                'label' => __('Accordion Content', 'TR'),
                'desc' => __('Add the accordions content', 'TR')
            )
        ),
        'shortcode' => '[accordion title="{{title}}" active="{{active}}"] {{content}} [/accordion]',
        'clone_button' => __('Add Accordion', 'TR')
    )
);


/*-----------------------------------------------------------------------------------*/
/*	Blog Desc
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['blog_desc'] = array(
	'no_preview' => true,
	'params' => array(
		 'title' => array(
			'std' => 'Recent News',
			'type' => 'text',
			'label' => __('Title', 'TR'),
			'desc' => __('Title of the blog desc.', 'TR')
		 ),
		 'posts_per_page' => array(
			'std' => '3',
			'type' => 'text',
			'label' => __('Posts per page', 'TR'),
			'desc' => __('Set how many items do you want to display.', 'TR')
		 ),
		  'cat' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Cat', 'TR'),
			'desc' => __('Enter the cat ids that you want to display, separated by commas, leave it as blank to display all.', 'TR')
		 ),
		 'show_title' => array(
			'type' => 'select',
			'label' => __('Show title', 'TR'),
			'desc' => __('Select true to display the title.', 'TR'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		 ),
		 'show_meta' => array(
			'type' => 'select',
			'label' => __('Show meta', 'TR'),
			'desc' => __('Select true to display the meta.', 'TR'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		 ),
		 'content' => array(
			'std' => 'This is the description text for the blog desc.',
			'type' => 'textarea',
			'label' => __('Description', 'TR'),
			'desc' => __('Enter the description for the news, you can add the text with html tags.', 'TR')
		 )
	),
	'shortcode' => '[blog_desc title="{{title}}" posts_per_page="{{posts_per_page}}" cat="{{cat}}" show_title="{{show_title}}" show_meta="{{show_meta}}"]{{content}}[/blog_desc]',
	'popup_title' => __('Insert Blog Desc Shortcode', 'TR')
);


/*-----------------------------------------------------------------------------------*/
/*	Blog Slide
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['blog_slide'] = array(
	'no_preview' => true,
	'params' => array(
		 'title' => array(
			'std' => 'Recent News',
			'type' => 'text',
			'label' => __('Title', 'TR'),
			'desc' => __('Title of the blog desc.', 'TR')
		 ),
		 'posts_per_page' => array(
			'std' => '8',
			'type' => 'text',
			'label' => __('Posts per page', 'TR'),
			'desc' => __('Set how many items do you want to display.', 'TR')
		 ),
		  'cat' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Cat', 'TR'),
			'desc' => __('Enter the cat ids that you want to display, separated by commas, leave it as blank to display all.', 'TR')
		 ),
		 'show_title' => array(
			'type' => 'select',
			'label' => __('Show title', 'TR'),
			'desc' => __('Select true to display the title.', 'TR'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		 ),
		 'show_meta' => array(
			'type' => 'select',
			'label' => __('Show meta', 'TR'),
			'desc' => __('Select true to display the meta.', 'TR'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		 )
	),
	'shortcode' => '[blog_slide title="{{title}}" posts_per_page="{{posts_per_page}}" cat="{{cat}}" show_title="{{show_title}}" show_meta="{{show_meta}}"]',
	'popup_title' => __('Insert Blog Slide Shortcode', 'TR')
);


/*-----------------------------------------------------------------------------------*/
/*	Box
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['box'] = array(
	'no_preview' => true,
	'params' => array(
		 'style' => array(
			'type' => 'select',
			'label' => __('Style', 'TR'),
			'desc' => __('Select the style for the box.', 'TR'),
			'options' => array(
				'alert' => 'Alert',
				'error' => 'Error',
				'success' => 'Success'
			)
		 ),
		 'content' => array(
			'std' => 'This is the description text for the box.',
			'type' => 'textarea',
			'label' => __('Description', 'TR'),
			'desc' => __('Enter the description for box, you can add the text with html tags.', 'TR')
		 )
	),
	'shortcode' => '[box style="{{style}}"]{{content}}[/box]',
	'popup_title' => __('Insert Box Shortcode', 'TR')
);


/*-----------------------------------------------------------------------------------*/
/*	Button
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['button'] = array(
	'no_preview' => true,
	'params' => array(
		 'color' => array(
			'type' => 'select',
			'label' => __('Color', 'TR'),
			'desc' => __('Select the color for the button.', 'TR'),
			'options' => array(
				'black' => 'Black',
				'blue' => 'Blue',
				'gray' => 'Gray',
				'green' => 'Green',
				'orange' => 'Orange',
				'pink' => 'Pink',
				'purple' => 'Purple',
				'yellow' => 'Yellow'
			)
		 ),
		 'text' => array(
			'std' => 'Button Text',
			'type' => 'text',
			'label' => __('Button Text', 'TR'),
			'desc' => __('Text of the button.', 'TR')
		 ),
		  'link' => array(
			'std' => 'http://google.com',
			'type' => 'text',
			'label' => __('Link Url', 'TR'),
			'desc' => __('The url of link.', 'TR')
		 ),
		 'target' => array(
			'type' => 'select',
			'label' => __('Button Target', 'TR'),
			'desc' => __('self = open in same window. blank = open in new window', 'TR'),
			'options' => array(
				'_self' => 'Self',
				'_blank' => 'Blank'
			)
		)
	),
	'shortcode' => '[button color="{{color}}" text="{{text}}" link={{link}} target="{{target}}"]',
	'popup_title' => __('Insert Button Shortcode', 'TR')
);



/*-----------------------------------------------------------------------------------*/
/*	Br
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['br'] = array(
	'no_preview' => true,
	'params' => array(
		 'top' => array(
			'std' => '0',
			'type' => 'text',
			'label' => __('Margin Top', 'TR'),
			'desc' => __('Set the number for margin top.', 'TR')
		 )
	),
	'shortcode' => '[br top="{{top}}"]',
	'popup_title' => __('Insert Br Shortcode', 'TR')
);



/*-----------------------------------------------------------------------------------*/
/*	Column
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['column'] = array(
	'params' => array(),
    'no_preview' => true,
    'shortcode' => '{{child_shortcode}}',
    'popup_title' => __('Insert Column Shortcode', 'TR'),

	'child_shortcode' => array(
        'params' => array(
            'col' => array(
                'type' => 'select',
				'label' => __('Column Type', 'textdomain'),
				'desc' => __('Select the type, ie width of the column.', 'textdomain'),
				'options' => array(
					'1/2' => 'One Half',
					'1/3' => 'One Third',
					'2/3' => 'Two Thirds',
					'1/4' => 'One Fourth',
					'3/4' => 'Three Fourth',
				)
            ),
			'last' => array(
                'type' => 'select',
				'label' => __('Last', 'TR'),
				'desc' => __('if this the last column, please select yes.', 'TR'),
				'options' => array(
					'no' => 'No',
					'yes' => 'Yes'
				)
            ),
            'content' => array(
                'std' => '',
                'type' => 'textarea',
				'label' => __('Column Content', 'TR'),
				'desc' => __('Add the column content.', 'TR'),
            )
        ),
        'shortcode' => '[column col="{{col}}" last="{{last}}"] {{content}} [/column]',
        'clone_button' => __('Add Column', 'TR')
    )
);



/*-----------------------------------------------------------------------------------*/
/*	Gallery
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['gallery'] = array(
	'no_preview' => true,
	'params' => array(
		 'columns' => array(
			'std' => '4',
			'type' => 'text',
			'label' => __('Columns', 'TR'),
			'desc' => __('Set the number for columns.', 'TR')
		 )
	),
	'shortcode' => '[gallery columns="{{columns}}"]',
	'popup_title' => __('Insert Gallery Shortcode', 'TR')
);



/*-----------------------------------------------------------------------------------*/
/*	Hr
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['hr'] = array(
	'no_preview' => true,
	'params' => array(
		 'top' => array(
			'std' => '0',
			'type' => 'text',
			'label' => __('Margin Top', 'TR'),
			'desc' => __('Set the number for margin top.', 'TR')
		 ),
		 'bottom' => array(
			'std' => '0',
			'type' => 'text',
			'label' => __('Margin Bottom', 'TR'),
			'desc' => __('Set the number for margin bottom.', 'TR')
		 )
	),
	'shortcode' => '[hr top="{{top}}" bottom="{{bottom}}"]',
	'popup_title' => __('Insert Hr Shortcode', 'TR')
);


/*-----------------------------------------------------------------------------------*/
/*	Icon box
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['icon_box'] = array(
	'no_preview' => true,
	'params' => array(
		 'title' => array(
			'std' => 'The Icon Title',
			'type' => 'text',
			'label' => __('Title', 'TR'),
			'desc' => __('Title of the icon box.', 'TR')
		 ),
		 'icon' => array(
			'type' => 'select',
			'label' => __('Icon', 'TR'),
			'desc' => __('Select the icon for the box.', 'TR'),
			'options' => array(
				'icon-1.png' => 'Icon 1',
				'icon-2.png' => 'Icon 2',
				'icon-3.png' => 'Icon 3',
				'icon-4.png' => 'Icon 4',
				'icon-5.png' => 'Icon 5',
				'icon-6.png' => 'Icon 6',
				'icon-7.png' => 'Icon 7',
				'icon-8.png' => 'Icon 8',
				'icon-9.png' => 'Icon 9',
				'icon-10.png' => 'Icon 10',
				'icon-11.png' => 'Icon 11',
				'icon-12.png' => 'Icon 12'
			)
		 ),
		 'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Column Content', 'TR'),
			'desc' => __('Add the column content.', 'TR'),
		)
	),
	'shortcode' => '[icon_box title="{{title}}" icon="{{icon}}"] {{content}} [/icon_box]',
	'popup_title' => __('Insert Icon Box Shortcode', 'TR')
);



/*-----------------------------------------------------------------------------------*/
/*	Map
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['map'] = array(
	'no_preview' => true,
	'params' => array(
		 'width' => array(
			'std' => '930',
			'type' => 'text',
			'label' => __('Width', 'TR'),
			'desc' => __('Width for the map.', 'TR')
		 ),
		 'height' => array(
			'std' => '300',
			'type' => 'text',
			'label' => __('Height', 'TR'),
			'desc' => __('Height for the map.', 'TR')
		 ),
		 'zoom' => array(
			'std' => '8',
			'type' => 'text',
			'label' => __('Zoom', 'TR'),
			'desc' => __('Zoom for the map.', 'TR')
		 ),
		 'lat' => array(
			'std' => '0',
			'type' => 'text',
			'label' => __('Lat', 'TR'),
			'desc' => __('Lat for the map.', 'TR')
		 ),
		 'Ing' => array(
			'std' => '0',
			'type' => 'text',
			'label' => __('Lng', 'TR'),
			'desc' => __('Lng for the map.', 'TR')
		 ),
		 'address' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('address', 'TR'),
			'desc' => __('Address for the map.', 'TR')
		 )
	),
	'shortcode' => '[map width="{{width}}" height="{{height}}" zoom="{{zoom}}" lat="{{lat}}" Ing="{{Ing}}" address="{{address}}"]',
	'popup_title' => __('Insert Map Shortcode', 'TR')
);



/*-----------------------------------------------------------------------------------*/
/*	Ajax Portfolio
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['ajax_portfolio'] = array(
	'no_preview' => true,
	'params' => array(
		 'column' => array(
			'type' => 'select',
			'label' => __('Column', 'TR'),
			'desc' => __('Select the column for the ajax portfolio.', 'TR'),
			'options' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4'
			)
		 ),
		 'posts_per_page' => array(
			'std' => '8',
			'type' => 'text',
			'label' => __('Posts per page', 'TR'),
			'desc' => __('Set how many items do you want to display.', 'TR')
		 ),
		  'cat' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Cat', 'TR'),
			'desc' => __('Enter the cat ids that you want to display, separated by commas, leave it as blank to display all.', 'TR')
		 ),
		 'show_title' => array(
			'type' => 'select',
			'label' => __('Show title', 'TR'),
			'desc' => __('Select true to display the title.', 'TR'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		 ),
		 'show_skills' => array(
			'type' => 'select',
			'label' => __('Show skills', 'TR'),
			'desc' => __('Select true to display the skills.', 'TR'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		 )
	),
	'shortcode' => '[ajax_portfolio column="{{column}}" posts_per_page="{{posts_per_page}}" cat="{{cat}}" show_title="{{show_title}}" show_skills="{{show_skills}}"]',
	'popup_title' => __('Insert Ajax Portfolio Shortcode', 'TR')
);


/*-----------------------------------------------------------------------------------*/
/*	Portfolio
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['portfolio'] = array(
	'no_preview' => true,
	'params' => array(
		 'column' => array(
			'type' => 'select',
			'label' => __('Column', 'TR'),
			'desc' => __('Select the column for the ajax portfolio.', 'TR'),
			'options' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4'
			)
		 ),
		 'posts_per_page' => array(
			'std' => '8',
			'type' => 'text',
			'label' => __('Posts per page', 'TR'),
			'desc' => __('Set how many items do you want to display.', 'TR')
		 ),
		  'cat' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Cat', 'TR'),
			'desc' => __('Enter the cat ids that you want to display, separated by commas, leave it as blank to display all.', 'TR')
		 ),
		 'show_title' => array(
			'type' => 'select',
			'label' => __('Show title', 'TR'),
			'desc' => __('Select true to display the title.', 'TR'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		 ),
		 'show_skills' => array(
			'type' => 'select',
			'label' => __('Show skills', 'TR'),
			'desc' => __('Select true to display the skills.', 'TR'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		 )
	),
	'shortcode' => '[portfolio column="{{column}}" posts_per_page="{{posts_per_page}}" cat="{{cat}}" show_title="{{show_title}}" show_skills="{{show_skills}}"]',
	'popup_title' => __('Insert Portfolio Shortcode', 'TR')
);



/*-----------------------------------------------------------------------------------*/
/*	Portfolio Desc
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['portfolio_desc'] = array(
	'no_preview' => true,
	'params' => array(
		 'title' => array(
			'std' => 'Recent Works',
			'type' => 'text',
			'label' => __('Title', 'TR'),
			'desc' => __('Title of the portfolio desc.', 'TR')
		 ),
		 'posts_per_page' => array(
			'std' => '3',
			'type' => 'text',
			'label' => __('Posts per page', 'TR'),
			'desc' => __('Set how many items do you want to display.', 'TR')
		 ),
		  'cat' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Cat', 'TR'),
			'desc' => __('Enter the cat ids that you want to display, separated by commas, leave it as blank to display all.', 'TR')
		 ),
		 'show_title' => array(
			'type' => 'select',
			'label' => __('Show title', 'TR'),
			'desc' => __('Select true to display the title.', 'TR'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		 ),
		 'show_skills' => array(
			'type' => 'select',
			'label' => __('Show skills', 'TR'),
			'desc' => __('Select true to display the skills.', 'TR'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		 ),
		 'content' => array(
			'std' => 'This is the description text for the portfolio desc.',
			'type' => 'textarea',
			'label' => __('Description', 'TR'),
			'desc' => __('Enter the description for the works, you can add the text with html tags.', 'TR')
		 )
	),
	'shortcode' => '[portfolio_desc title="{{title}}" posts_per_page="{{posts_per_page}}" cat="{{cat}}" show_title="{{show_title}}" show_skills="{{show_skills}}"]{{content}}[/portfolio_desc]',
	'popup_title' => __('Insert Portfolio Desc Shortcode', 'TR')
);


/*-----------------------------------------------------------------------------------*/
/*	Blog Slide
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['portfolio_slide'] = array(
	'no_preview' => true,
	'params' => array(
		 'title' => array(
			'std' => 'Recent News',
			'type' => 'text',
			'label' => __('Title', 'TR'),
			'desc' => __('Title of the portfolio desc.', 'TR')
		 ),
		 'posts_per_page' => array(
			'std' => '8',
			'type' => 'text',
			'label' => __('Posts per page', 'TR'),
			'desc' => __('Set how many items do you want to display.', 'TR')
		 ),
		  'cat' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Cat', 'TR'),
			'desc' => __('Enter the cat ids that you want to display, separated by commas, leave it as blank to display all.', 'TR')
		 ),
		 'show_title' => array(
			'type' => 'select',
			'label' => __('Show title', 'TR'),
			'desc' => __('Select true to display the title.', 'TR'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		 ),
		 'show_skills' => array(
			'type' => 'select',
			'label' => __('Show skills', 'TR'),
			'desc' => __('Select true to display the skills.', 'TR'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		 )
	),
	'shortcode' => '[portfolio_slide title="{{title}}" posts_per_page="{{posts_per_page}}" cat="{{cat}}" show_title="{{show_title}}" show_skills="{{show_skills}}"]',
	'popup_title' => __('Insert Portfolio Slide Shortcode', 'TR')
);



/*-----------------------------------------------------------------------------------*/
/*	Slogan
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['slogan'] = array(
	'no_preview' => true,
	'params' => array(
		 'dotted_line' => array(
			'type' => 'select',
			'label' => __('Dotted Line', 'TR'),
			'desc' => __('Select the dotted line for the slogan.', 'TR'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		 ),
		 'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Slogan Content', 'TR'),
			'desc' => __('Add the slogan content.', 'TR'),
		)
	),
	'shortcode' => '[slogan dotted_line="{{dotted_line}}"] {{content}} [/slogan]',
	'popup_title' => __('Insert Slogan Shortcode', 'TR')
);



/*-----------------------------------------------------------------------------------*/
/*	Tabs
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['tabs'] = array(
	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[tabs] {{child_shortcode}}  [/tabs]',
	'popup_title' => __('Insert Tabs Shortcode', 'TR'),

	'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Tab Title',
                'type' => 'text',
                'label' => __('Title', 'TR'),
                'desc' => __('Title of the tab.', 'TR')
            ),
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'TR'),
                'desc' => __('Add the Tab content', 'TR')
            )
        ),
        'shortcode' => '[tab title="{{title}}"] {{content}} [/tab]',
        'clone_button' => __('Add Tab', 'TR')
    )
);



/*-----------------------------------------------------------------------------------*/
/*	Toggles
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['toggles'] = array(
	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[toggles] {{child_shortcode}}  [/toggles]',
	'popup_title' => __('Insert Toggles Shortcode', 'TR'),

	'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Toggle Title',
                'type' => 'text',
                'label' => __('Title', 'TR'),
                'desc' => __('Title of the toggle.', 'TR')
            ),
			'active' => array(
				'type' => 'select',
				'label' => __('Active', 'TR'),
				'desc' => __('Select the status of the toggle.', 'TR'),
				'options' => array(
					'yes' => 'Yes',
					'no' => 'No'
				)
			),
            'content' => array(
                'std' => 'Toggle Content',
                'type' => 'textarea',
                'label' => __('Toggle Content', 'TR'),
                'desc' => __('Add the Toggle content', 'TR')
            )
        ),
        'shortcode' => '[toggle title="{{title}}" active="{{active}}"] {{content}} [/toggle]',
        'clone_button' => __('Add Tab', 'TR')
    )
);
?>