<?php
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

if ((preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) ||
	(!defined('PBS_PLUGIN')))
{
	exit;
}

// Plugin ID ////////////////////////////////////////////////////////////////////

/**
 * An ID string for identifying stylesheets / scripts included by the plugin
 */
define('PBS_PLUGIN_ID', dirname(plugin_basename(__FILE__)));

// Plugin Files & File Paths ////////////////////////////////////////////////////

/**
 * The full path to the location of WordPress (corrected for Windows servers)
 */
define('PBS_ABSPATH', str_replace("\\", '/', ABSPATH));

/**
 * The name of the plugin directory within the WordPress Plugin directory
 */
define('PBS_PLUGIN_DIR_NAME', dirname(plugin_basename(__FILE__)));

/**
 * The full path of the plugin directory within the WordPress Plugin directory
 */
define('PBS_PLUGIN_PATH', WP_PLUGIN_DIR . '/' . PBS_PLUGIN_DIR_NAME);

/**
 * The filename of the debug log
 */
define('PBS_DEBUG_LOG_FILE', 'debug.log');

/**
 * The full path and filename of the debug log
 */
define('PBS_DEBUG_LOG', PBS_PLUGIN_PATH . '/' . PBS_DEBUG_LOG_FILE);

/**
 * The full path to the plugin 'classes' directory
 */
define('PBS_CLASSES_DIR', PBS_PLUGIN_PATH . '/classes');

/**
 * The full path and name of the WordPress core upgrade code that is required.
 * This information is different for different versions of WordPress.
 */
global $wp_version;
if (version_compare($wp_version, '2.5', '<'))
{
	define('PBS_WP_UPGRADE_FUNCTIONS', PBS_ABSPATH .
									   'wp-admin/upgrade-functions.php');
}
else
{
	define('PBS_WP_UPGRADE_FUNCTIONS', PBS_ABSPATH .
									   'wp-admin/includes/upgrade.php');
}

// URLs /////////////////////////////////////////////////////////////////////////

/**
 * The base URL to the Page Blocks plugin's directory
 */
define('PBS_PLUGIN_URL', WP_PLUGIN_URL . '/' . PBS_PLUGIN_DIR_NAME);

/**
 * The URL for the plugin's stylesheets directory
 */
define('PBS_STYLESHEET_URL', PBS_PLUGIN_URL . '/css');

/**
 * The URL for the plugin's javascript code directory
 */
define('PBS_SCRIPTS_URL', PBS_PLUGIN_URL . '/js');

/**
 * The URL for the plugin's images directory
 */
define('PBS_IMAGES_URL', PBS_PLUGIN_URL . '/images');

/**
 * The URL for the plugin's debug log
 */
define('PBS_DEBUG_LOG_URL', PBS_PLUGIN_URL . '/page_blocks_debug_log.php');

// Admin Message Types //////////////////////////////////////////////////////////

define('PBS_MSG_GENERAL', '<img align="middle" src="' . PBS_IMAGES_URL .
						  '/msg.png" alt="Info" />&nbsp;');
define('PBS_MSG_SUCCESS', '<img align="middle" src="' . PBS_IMAGES_URL .
						  '/success.png" alt="Success" />&nbsp;');
define('PBS_MSG_WARNING', '<img align="middle" src="' . PBS_IMAGES_URL .
						  '/warning.png" alt="Warning" />&nbsp;');
define('PBS_MSG_ERROR',   '<img align="middle" src="' . PBS_IMAGES_URL .
						  '/error.png" alt="ERROR" />&nbsp;');

// Option & Setting Names ///////////////////////////////////////////////////////

define('PBS_OPTION_SETTINGS', 'page_blocks_settings');
define('PBS_OPTION_DEBUG_LEVEL', 'page_blocks_debug_level');
define('PBS_OPTION_ADMIN_MSG', 'page_blocks_admin_msg');
define('PBS_OPTION_ADMIN_PREV_MSG', 'page_blocks_admin_prev_msg');

define('PBS_SETTING_SELECTED_PAGE', 'selected_page_id');
define('PBS_SETTING_DB_VERSION', 'db_schema_version');

?>