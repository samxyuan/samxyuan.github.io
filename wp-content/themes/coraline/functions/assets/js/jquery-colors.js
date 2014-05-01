jQuery(document).ready(function() {
   
	//EX text_color = id
	jQuery("#colorSelector_text_color").children("div").css("backgroundColor", "#008080");
    jQuery("#colorSelector_text_color").ColorPicker({
       color: "text_color",
       onShow: function (colpkr) {
			  jQuery(colpkr).fadeIn(500);
			  return false;
		   },
		   onHide: function (colpkr) {
				jQuery(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				jQuery("#colorSelector_text_color").children("div").css("backgroundColor", "#" + hex);
				jQuery("#colorSelector_text_color").next("input").attr("value", hex);
			}
	});


});