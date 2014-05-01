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

function pbs_admin_add_user_msg($text = '', $type = PBS_MSG_GENERAL)
{
	// First remove white space surrounding the message text to be added
	$text = trim($text);

	if (empty($text))
	{
		return false;
	}

	// We have a valid message text to add so process it
	switch ($type)
	{
		case PBS_MSG_ERROR:
		case PBS_MSG_WARNING:
		case PBS_MSG_SUCCESS:
		case PBS_MSG_GENERAL:
			$message_text = $type . $text;
			break;

		default:
			$message_text = PBS_MSG_GENERAL . $text;
			break;
	}

	$current = get_option(PBS_OPT_ADMIN_MSG);
	if ((is_array($current)) && (!empty($current)))
	{
		// Other message texts have already been added previously
		$current[] = $message_text;
	}
	else
	{
		$current = array();
		$current[] = $message_text;
	}

	update_option(PBS_OPT_ADMIN_MSG, $current);

	return true;
}

function pbs_admin_show_message($message = null)
{
	if (is_null($message))
	{
		// If this is being called because something has gone wrong during activation / deactivation then pull the message from
		// the PBS_OPT_ADMIN_MSG option in the wp_options table.
		$message = get_option(PBS_OPT_ADMIN_MSG);
	}

	if (is_array($message))
	{
		$message = join('<br />', $message);
	}

	echo '<div id="pbs_message" class="error fade"><p>' . $message . '</p></div>';

	update_option(PBS_OPT_ADMIN_MSG, array());
	update_option(PBS_OPT_ADMIN_PREV_MSG, $message);
}
?>