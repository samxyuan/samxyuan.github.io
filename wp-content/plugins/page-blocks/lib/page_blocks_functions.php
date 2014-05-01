<?php
/*
	Copyright (c) 2008 Paolo Ermani (SoftWUD) (email: softwud@softwud.com)

	This file is part of the Page Block plugin.

	The Page Block plugin is free software: you can redistribute it and / or modify
	it under the terms of the GNU General Public License as published by the Free
	Software Foundation, either version 3 of the License, or (at your option) any
	later version.

	This program is distributed in the hope that it will be useful, but	WITHOUT ANY
	WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
	PARTICULAR PURPOSE. See the	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License along with
	this program. If not, see <http://www.gnu.org/licenses/>.
*/

if ((preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) || (!defined('PBS_PLUGIN')))
{
	$file_handle = @fopen('../security_warnings.txt', "at");
	@fwrite($file_handle, date("Y-m-d H:i:s  ") . 'Unauthorised attempt to use ' . basename(__FILE__) . "\n");
	@fclose($file_handle);
	return;
}

// This function takes ONLY either a string or an array of strings for the $data parameter
function pbs_write_to_log($filename, $data, $add_timestamp = true, $create_new = false)
{
	if ((!is_array($data)) && (!is_string($data)))
	{
		return false;
	}

	// Add a timestamp and calculate the length of $data in order to be able to determine if
	// an error occurred while writing to $filename
	$timestamp = date("Y-m-d H:i:s  ");
	$glue = "\n" . (($add_timestamp) ? $timestamp : '');

	if (is_array($data))
	{
		$data = $glue . implode($glue, $data);
	}
	else
	{
		$data = $glue . $data;
	}

	$data_len = strlen($data);

	// Now attempt to write $data to $filename
	$bytes = 0;
	$result = false;

	if (!$create_new)
	{
		$file_handle = @fopen($filename, "at");
	}
	else
	{
		$file_handle = @fopen($filename, "wt");
	}

	$bytes = @fwrite($file_handle, $data);
	@fclose($file_handle);

	if ($bytes === false)
	{
		$result = false;
	}
	else if ($bytes == $data_len)
	{
		$result = true;
	}
	else
	{
		$result = false;
	}

	return $result;
}

// $of == NULL returns an array of all the version information
function pbs_get_version($of = null)
{
	global $page_blocks;

	$version = '';

	if (is_null($of))
	{
		$version = array();
		$version[PBS_VERSION_INFO_WP] = PBS_WORDPRESS_VERSION;
		$version[PBS_VERSION_INFO_PLUGIN] = PBS_PLUGIN_VERSION;
		$version[PBS_VERSION_INFO_CLASS] = ((isset($page_blocks)) ? $page_blocks->pbs_class_version : 'Unable to determine version');
		$version[PBS_VERSION_INFO_CLASS_DB] = ((isset($page_blocks)) ? $page_blocks->pbs_db_version : 'Unable to determine version');
		$version[PBS_VERSION_INFO_API] = ((defined('PBS_API_VERSION')) ? PBS_API_VERSION : '');
	}
	else
	{
		switch ($of)
		{
			case PBS_VERSION_INFO_WP:
				$version = PBS_WORDPRESS_VERSION;
				break;

			case PBS_VERSION_INFO_PLUGIN:
				$version = PBS_PLUGIN_VERSION;
				break;

			case PBS_VERSION_INFO_CLASS:
				$version = ((isset($page_blocks)) ? $page_blocks->pbs_class_version : 'Unable to determine version');
				break;

			case PBS_VERSION_INFO_CLASS_DB:
				$version = ((isset($page_blocks)) ? $page_blocks->pbs_db_version : 'Unable to determine version');
				break;

			case PBS_VERSION_INFO_API:
				$version = ((defined('PBS_API_VERSION')) ? PBS_API_VERSION : '');
				break;

			default:
				break;
		}
	}

	return $version;
}

function pbs_in_debug_mode()
{
	return ((defined('PBS_DEBUG_MODE')) ? PBS_DEBUG_MODE : false);
}

function pbs_debug_start_fn($fn /*, param1, param2, ... */)
{
	if ((!defined('PBS_DEBUG_MODE')) || (!PBS_DEBUG_MODE))
	{
		return;
	}

	pbs_write_to_log(PBS_DEBUG_LOG, "Starting function $fn");

	$numargs = func_num_args();
	if ($numargs > 1)
	{
		$arg_list = func_get_args();
		for ($i = 1 ; $i < $numargs ; $i++)
		{
			$line = "Argument $i = " . var_export($arg_list[$i], true);
			pbs_write_to_log(PBS_DEBUG_LOG, $line);
		}
	}
}

function pbs_debug_end_fn($fn, $return_val = null)
{
	if ((!defined('PBS_DEBUG_MODE')) || (!PBS_DEBUG_MODE))
	{
		return;
	}

	$msg = "Ending function $fn returning value = " . var_export($return_val, true);

	pbs_write_to_log(PBS_DEBUG_LOG, $msg);
}

function pbs_debug_abort_fn($fn, $reason)
{
	if ((!defined('PBS_DEBUG_MODE')) || (!PBS_DEBUG_MODE))
	{
		return;
	}

	$msg = "Aborting function $fn because $reason";
	pbs_write_to_log(PBS_DEBUG_LOG, $msg);
}

function pbs_debug_msg($msg, $variable = null)
{
	if ((!defined('PBS_DEBUG_MODE')) || (!PBS_DEBUG_MODE))
	{
		return;
	}

	$numargs = func_num_args();
	if ($numargs == 2)
	{
		$msg .= var_export(func_get_arg(1), true);
	}

	pbs_write_to_log(PBS_DEBUG_LOG, $msg);
}

function pbs_sec_msg($msg, $variable = null)
{
	$numargs = func_num_args();
	if ($numargs == 2)
	{
		$msg .= var_export(func_get_arg(1), true);
	}

	pbs_write_to_log(PBS_SECURITY_LOG, $msg);
}

// $caps = "single capability" OR array(wordpress user capabilities)
function pbs_verify_capabilities($caps)
{
	$verified = false;

	if ((!is_array($caps)) && (!is_string($caps)))
	{
		pbs_debug_msg('Warning: Attempting to verify capabilities with invalid capabilities');

		return false;
	}

	if (is_string($caps))
	{
		// Expecting user has just a single capability
		if (current_user_can($caps))
		{
			$verified = true;
		}		
	}
	else if (is_array($caps))
	{
		// Expecting user has ALL capabilities
		$combination = true;
		foreach ($caps as $capability)
		{
			$combination = ($combination && (current_user_can($capability)));
		}
		$verified = combination;
	}

	if (!$verified)
	{
		global $userdata;

		$required = ((is_string($caps)) ? $caps : join(':', $caps));

		get_currentuserinfo();
		$level = ((is_user_logged_in()) ? $userdata->user_level : '');
		$login = ((is_user_logged_in()) ? $userdata->user_login : 'Not a logged in user') . ((!empty($level)) ? ' with user level = ' . $level : '');

		pbs_sec_msg('An operation is being attempted without the required permission');
		pbs_sec_msg('Required permission(s): ', $required);
		pbs_sec_msg('Attempt by user: ', $login);
	}

	return $verified;
}
?>