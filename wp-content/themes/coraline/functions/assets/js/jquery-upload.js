jQuery(document).ready(function() {
   
	//Favicon Image Upload favicon = id
	jQuery('#TR_favicon_button').click(function() {
			 formfield = jQuery('#TR_favicon').attr('name');
			 tb_show('', 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true');
			 destination = 'add_favicon';			 
			 return false;
	});

	//Logo Image Upload 
	jQuery('#TR_logo_button').click(function() {
			 formfield = jQuery('#TR_logo').attr('name');
			 tb_show('', 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true');
			 destination = 'add_logo';			 
			 return false;
	});

	window.send_to_editor = function(html) {
		switch(destination)
		{ 
			case 'add_favicon':
				imgurl2 = jQuery('img',html).attr('src');
				jQuery('#TR_favicon').val(imgurl2);
			break;

			case 'add_logo':
				imgurl2 = jQuery('img',html).attr('src');
				jQuery('#TR_logo').val(imgurl2);
			break;
		}
		tb_remove();
	}

});