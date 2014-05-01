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

function set_value(dest_id, src_id)
{
	var src_obj = jQuery('#' + src_id);
	var dest_obj = jQuery('#' + dest_id);

	if ((!src_obj) || (!dest_obj))
	{
		return;
	}

	dest_obj.val(src_obj.attr('checked') ? 1 : 0);
}

function validate_page_selection(event)
{
	var page = jQuery('#page-blocks-selected-page-id');
	if (page.val() == '')
	{
		alert('You need to select an existing page.');
		event.preventDefault();
	}
}

function init_admin()
{
	jQuery('#pbs_widgets_page_select').submit(validate_page_selection);
}

jQuery(document).ready(init_admin);