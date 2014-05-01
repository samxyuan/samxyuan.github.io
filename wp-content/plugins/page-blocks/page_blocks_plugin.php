<?php
/*
Plugin Name: Page Blocks
Plugin URI: http://wordpress.softwud.com
Description: This plugin extends WordPress pages by allowing the placement of widgets above and below page content reducing the need to code custom page templates.
Author: SoftWUD
Version: 1.1.0
Author URI: http://www.softwud.com
*/

/*
Copyright (c) 2008 Paolo Ermani (SoftWUD) (email: softwud@softwud.com)

This file is part of the Page Blocks WordPress plugin.

The Page Blocks plugin is free software: you can redistribute it and / or modify
it under the terms of the GNU General Public License as published by the Free
Software Foundation, either version 3 of the License, or (at your option) any
later version.

This program is distributed in the hope that it will be useful, but	WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE. See the	GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with
this program. If not, see <http://www.gnu.org/licenses/>.
*/

/*
	Plugin Version History:

	Date		Author			Version		Change Description
	---------	------------	-------		------------------------------------
	12/3/2008	Paolo Ermani	0.1			Initial release version
	24/4/2008	Paolo Ermani	0.1.1		Further additions to make the plugin
											more robust ready for final release
											  * Updates for WP v2.5
											  * Tracking of plugin usage
											    (internal)
											  * Addition of plugin API for
											    creating page blocks (internal)
	19/12/2008	Paolo Ermani	0.2			Implementation of clearfix CSS hack
											and code / comments clean up
	31/1/2009	Paolo Ermani	1.0			WordPress version testing and final
											release	on the WordPress Plugins
											site
	25/2/2009	Paolo Ermani	1.0.1		Patch to fix unexpected problem with
											the way wordpress.org creates zip
											files for plugins
	3/5/2009	Paolo Ermani	1.0.2		Patch to make plugin PHP v4.x
											compatible
	14/7/2009	Paolo Ermani	1.0.3		Patch to make plugin compatible with
											changes made in WordPress v2.8
	31/12/2009	Paolo Ermani	1.1.0		Code re-write to fix problems with
											WP 2.8.x, problems with database,
											problems with themes that have
											multiple loops, and general tidyup
*/

if (preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF']))
{
	exit;
}

define('PBS_PLUGIN', '');

// Load in the constants for the plugin
require_once('page_blocks_constants.php');

// Load in class definition
require_once(PBS_CLASSES_DIR . '/page_blocks.php');

// Need to create the Page Blocks class instance in a global scope
// (change required for WordPress version 2.5)
global $page_blocks;

// Instantiate the plugin
if (class_exists("PageBlocks"))
{
	$page_blocks = new PageBlocks();
}

// Set up the Actions and Filters for the plugin's operation
if (isset($page_blocks))
{
	// Activation / Deactivation actions
	register_activation_hook(
		__FILE__,
		array(&$page_blocks, 'admin_install_page_blocks'));
	register_deactivation_hook(
		__FILE__,
		array(&$page_blocks, 'admin_uninstall_page_blocks'));

	// Actions required for admin backend pages
	add_action('admin_init',
			   array(&$page_blocks, 'admin_process_widget_page_change'), 0);
	add_action('admin_init',
			   array(&$page_blocks, 'admin_enqueue_styles_and_scripts'));
	add_action('admin_init',
			   array(&$page_blocks, 'admin_register_page_blocks'));
	add_action('admin_init',
			   array(&$page_blocks, 'admin_register_page_blocks_widget_panel'));
	add_action('admin_init',
			   array(&$page_blocks, 'admin_register_page_blocks_settings'));
	add_action('admin_menu',
			   array(&$page_blocks, 'admin_register_settings_menu'));

	add_action('delete_post',
			   array(&$page_blocks, 'admin_delete_page_blocks_config'));

	add_filter('pre_update_option_top_left',
			   array(&$page_blocks, 'update_option_top_left'), 10, 2);
	add_filter('pre_update_option_top_left_style',
			   array(&$page_blocks, 'update_option_top_left_style'), 10, 2);
	add_filter('pre_update_option_top_right',
			   array(&$page_blocks, 'update_option_top_right'), 10, 2);
	add_filter('pre_update_option_top_right_style',
			   array(&$page_blocks, 'update_option_top_right_style'), 10, 2);

	add_filter('pre_update_option_bottom_left',
			   array(&$page_blocks, 'update_option_bottom_left'), 10, 2);
	add_filter('pre_update_option_bottom_left_style',
			   array(&$page_blocks, 'update_option_bottom_left_style'), 10, 2);
	add_filter('pre_update_option_bottom_right',
			   array(&$page_blocks, 'update_option_bottom_right'), 10, 2);
	add_filter('pre_update_option_bottom_right_style',
			   array(&$page_blocks, 'update_option_bottom_right_style'), 10, 2);

	// Action required for both admin backend and frontend pages
	add_action('update_option_sidebars_widgets',
			   array(&$page_blocks, 'update_option_sidebars_widgets'), 10, 2);

	// Actions required only for the frontend pages
	if ($page_blocks->is_wordpress_version('2.7', '<'))
	{
		add_action('wp_head', array(&$page_blocks, 'output_page_blocks_header'));
	}
	else
	{
		add_action('init', array(&$page_blocks, 'enqueue_styles_and_scripts'));
	}

	add_action('loop_start', array(&$page_blocks, 'insert_page_blocks_top'));
	add_action('loop_end', array(&$page_blocks, 'insert_page_blocks_bottom'));

	// Filters required for both admin backend and frontend pages
	add_filter('option_sidebars_widgets',
			   array(&$page_blocks, 'get_option_sidebars_widgets'));

	// Show any messages that have to be displayed to the user on the WordPress
	// Plugins admin page e.g. on plugin activation or deactivation
	add_action('admin_notices',
			   array(&$page_blocks, 'admin_show_messages'), 10, 0);

	if (!function_exists('wp_clone'))
	{
		// Borrowed the wp_clone function from WordPress code since it wasn't
		// introduced into WordPress until version 2.7
		function wp_clone($object)
		{
			static $can_clone;
			if (!isset($can_clone))
			{
				$can_clone = version_compare(phpversion(), '5.0', '>=');
			}

			return $can_clone ? clone( $object ) : $object;
		}
	}
}
?>