=== Page Blocks ===

Contributors: softwud
Donate link: http://wordpress.softwud.com/
Tags: pages, templates, cms, widgets, sidebars
Requires at least: 2.3.3
Tested up to: 2.9.1
Stable tag: trunk

This plugin extends WordPress pages by allowing widgets to be placed above and below the page content reducing the need to code custom page templates.

== Description ==

The Page Blocks plugin *extends* your WordPress pages by combining the dynamic content of widgets with the static content of pages. Up to four "blocks" can be added to each page (two above and two below the page's content), and widgets can be added to each block in the same way they are added to sidebars.

Content can be edited simply through the admin backend, removing the need for custom page templates for all but the most complex of blog designs. Two examples of what can be done with the plugin are shown in the Screenshots section:

* A home page with a welcome message in the page content above a widget displaying News posts on the left and a widget displaying the most recently created post on the right.

* A page showing a dynamically generated "Thank You" message for a customer returning from PayPal in a single page block at the top of the page using a standard text widget and the Exec-PHP plugin (before and after images).

More detailed information is available on the [Page Blocks Plugin Website][page_blocks_website_link], as well as support and contact information. You can also contact SoftWUD through this site if you'd like a custom theme, plugin, or widget developed.

[page_blocks_website_link]:	http://wordpress.softwud.com	(Page Blocks Plugin Website)

#### Features
* **No file editing needed**

	Blocks are configured through the Page Write / Manage and Widgets admin pages. There is no need to edit PHP code or modify your theme in any way.

* **Blocks *will* work even if the theme is changed**

	As long as the theme you use employs the WordPress "Loop" mechanism (and pretty much all themes do) then there won't be any problems. Even if the "Loop" has been modified.

* **Each page can be configured with a different set of page blocks**

	There are four blocks that can be enabled for each page - ***Top Left***, ***Top Right***, ***Bottom Left***, and ***Bottom Right***. For example you may have a Top Left on one page, a Bottom Left and Bottom Right on another, and all others may have none at all.

* **Each block can have it's own CSS styling rules**

	The plugin provides default CSS styling for the blocks assuming that all four blocks are enabled on a page. However CSS styling rules can be applied through the Page Write / Manage admin page to override these, or even your own theme's styling rules.

* **The plugin *supports* password protected pages**

	If you protect your page content with a password, the page blocks will also be hidden until the user enters a valid password.

== Installation ==

#### Installing the Plugin

Note: More detailed instructions are available on the [Page Blocks Plugin Website][page_blocks_website_link] website.

1. Download the Page Blocks plugin to your machine and extract the files.

2. Create a directory called *page-blocks* in your WordPress plugins directory (by default this will be /wp-content/plugins).

3. Upload the files to the *page-blocks* directory.

4. Ensure that the *page-blocks* directory is readable and writeable by your webserver.

5. Activate the plugin through the WordPress Plugins admin page.

6. Once the WordPress Plugins admin page refreshes various messages will be displayed above the list of available plugins. You should see that the plugin has been activated successfully.

If you see any messages with a red cross icon next to it then the activation has failed. Visit the [Page Blocks Plugin Website][page_blocks_website_link] for further help.

#### Using the Plugin

Note: More detailed instructions are available on the [Page Blocks Plugin Website][page_blocks_website_link] website.

**Update**: The plugin now has its own page under Settings, and hence these instructions have changed for v1.1.0.

1. Create your WordPress pages as usual.

2. Go to the Page Blocks page under Settings where you will find all WordPress pages listed along with their corresponding page blocks configurations. Simply check the appropriate checkboxes for each page to show those blocks, and add any required CSS styling rules in the corresponding textboxes.

	***Note***: If you want only one of either the Top or Bottom blocks, add the following CSS styling rule in the corresponding block's style textbox:

	`width: 100%;`

	This will ensure that the block occupies the full width of the page (dependent on how your theme is set up). This can also be combined with other CSS styling rules e.g.

	`width: 100%; background-color: red;`

	to give the block a red background as well.

3. Save your page configurations.

	***Note***: Just saving your changes at this point is not enough to make the page blocks visible. In order to make them appear it is necessary to add *at least* one widget to each block.

4. Select each page in turn for which you configured page blocks in step 2 using the Page Blocks Widgets dropdown at the bottom of the WordPress Widgets admin page, select the Page Block you wish to edit, and add / configure widgets.

5. Users of WordPress versions prior to v2.8 will need to modify their theme's page template file (usually 'page.php') if the theme uses multiple WordPress loops. Just add a call to the page_blocks_loop() template tag function immediately before the main WordPress loop and all other loops will be ignored by the plugin. Here is an example:

	`<?php
page_blocks_loop();  // <--- Place it here
if (have_posts())
{
	while (have_posts())
	{
		...
	}
}
?>`

6. You are now done. Simply view each of your pages to make sure everything appears as expected.

[page_blocks_website_link]:	http://wordpress.softwud.com	(Page Blocks Plugin Website)

== Frequently Asked Questions ==

Note: More information is available on the [Page Blocks Plugin Website][page_blocks_website_link] website.

= How do I make the page blocks show on the WordPress "Front Page" ? =

The WordPress "Front Page" (by default the page that shows blog posts) is a special type of WordPress "page" and isn't handled in the same way as other WordPress "pages". The plugin doesn't yet have the ability to display blocks on the "Front Page", however this feature will be added to the next major release of the plugin.

= How do I change the widths of the top and bottom page blocks ? =

Add one of the following styling rule into the textbox for the corresponding page block on the WordPress Write / Manage Page admin page:

`width: [value] [units];`

where:

[units] is one of the following - %, px, em, or any other CSS unit
[value] is a value between 0 and 100 for a percentage, or a value appropriate for the [units] specified

= I can't get the page block to show on my website ? =

Unless there is at least one widget added to the page block you want to show via the Widgets admin page (under Appearance -> Widgets), no HTML will be generated for that page block. The way the Widgets page works has undergone a number of changes in recent releases of WordPress and some users have been confused by the simple fact that they thought they had set up a widget and WordPress hadn't saved their changes. So the first thing to check is that the widget is still there when you reload the Widgets page.

If you are sure that there is at least one widget saved on the corresponding page block (sidebar) and you still don't see the page block appear, you can check that the page block is displayed by looking through the HTML page source for a div tag with the *pbs_clearfix* class. If you don't see this then perhaps the widget isn't generating any content.

Alternatively you could add a WP standard text widget to the block and add the CSS:

`background-color: red;`

to the corresponding style textbox on the WordPress Write / Manage Page admin page. This will make the page block appear with a red background and will make it clear to see if the page block is being generated.

If you still can't get it to work then contact SoftWUD via the [Page Blocks Plugin Website][page_blocks_website_link] website.

= Your CSS seems to override the text appearance of a widget from how it normally appears on the sidebar ?! =

The default CSS provided by the Page Blocks plugin does not alter any color settings for text or any other HTML elements. However depending on how your theme's stylesheet applies the styling for widgets (for example if the style rules' selectors include the name of the sidebar container i.e. #sidebar-1), the styling rules may not be applied to the widgets and hence they may appear differently in the page blocks than when they are added to your theme's sidebar.

If your problem is a simple one e.g. the widget's text appears red and your page's background is also red, you can simply override the widget's styling by including styling from your theme's stylesheet e.g.:

`color: #ffffff;`

into the corresponding style textbox on the WordPress Write / Manage Page admin page. This example will make the text's colour white in the page block.

Alternatively if your theme uses complex styling or you can't work out what to do, you can contact SoftWUD via the [Page Blocks Plugin Website][page_blocks_website_link] website and for a small fee the problem can be fixed for you.

[page_blocks_website_link]:	http://wordpress.softwud.com	(Page Blocks Plugin Website)

== Screenshots ==

1. Example showing two columns below the home page contents
2. Example showing a page without the dynamically created message
3. Example showing the same page with the dynamically created message

[page_blocks_website_link]:	http://wordpress.softwud.com	(Page Blocks Plugin Website)

== Changelog ==

= 1.1.0 =

* Re-wrote a large portion of the plugin code to fix problems with WordPress v2.8, problems with the creation of the plugin database table, problems with themes that have multiple loops, and general tidyup of the source code
* Moved configuration of each page's page blocks to a new Settings admin page
* Added page_blocks_loop() template function for allowing the plugin to work with themes that use multiple WordPress loops (only required if using with WordPress versions prior to v2.8)

= 1.0.3 =

* Patch to version 1.0 to make the plugin compatible with the security changes introduced into WordPress v2.8
* Updated plugin readme to add changelog section and update FAQ

= 1.0.2 =

* Patch to version 1.0 to make plugin compatible with PHP v4.x. The plugin was also tested to ensure that it still works with WordPress v2.7.1.

= 1.0.1 =

* Patch to version 1.0 to fix an unexpected problem with the way the WordPress Plugins Directory generates plugin zip files from the SVN repository, as well as some improvements to the plugins readme file.

= 1.0 =

* Initial release of the Page Blocks plugin.

== Upgrade Notice ==

= 1.1.0 =

Upgrading of the Page Blocks plugin to version 1.1.0 is required in order to use it with WordPress versions 2.8+