/*-----------------------------------------------------------------------------------*/
/*	Template JS By Theme Record
/*-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Functions
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function(){
	theme_external_link();
	theme_main_menu();
	theme_placeholder();
	theme_media_player();
	theme_top_media();
	theme_fancybox();
	theme_footer_twitter();
	theme_jcarousel();
	theme_gallery();
	theme_image_hover('body');
	theme_image_preload();
	theme_portfolio_quicksand();
	theme_load_portfolio_content();
	theme_tabs();
	theme_toggles();
	theme_accordions();
	theme_google_maps();
	theme_responsive_actions();
	jQuery('.drop-menu').mobileMenu();
});


/*-----------------------------------------------------------------------------------*/
/*	External links
/*-----------------------------------------------------------------------------------*/
function theme_external_link() {
	jQuery('a[rel*=external]').click( function() {
		window.open(this.href);
		return false;
	});
}



/*-----------------------------------------------------------------------------------*/
/*	Main menu
/*-----------------------------------------------------------------------------------*/
function theme_main_menu() {

	//Add LavaLamp for menu
	if ( jQuery().lavaLamp ) {
		 jQuery( '.sub-menu li, .children li' ).attr( 'class', 'noLava' ); 
	     jQuery( '.current-menu-item, .current_page_item, .current-page-ancestor, .current-menu-parent, .current_page_parent' ).addClass( 'selectedLava' );
	     jQuery( 'ul.drop-menu' ).lavaLamp({ fx: 'swing', speed: 500 });
	}
}



/*-----------------------------------------------------------------------------------*/
/*	Placeholder
/*-----------------------------------------------------------------------------------*/
function theme_placeholder() {
	jQuery('input, textarea').placeholder();
}


/*-----------------------------------------------------------------------------------*/
/*	Audio Player
/*-----------------------------------------------------------------------------------*/
function theme_media_player() {
	var $player = jQuery('.entry-audio audio, .post-entry-video video');

	if( $player.length ) {
		$player.mediaelementplayer({
			audioWidth  : '100%',
			audioHeight : '30px',
			videoWidth  : '100%',
			videoHeight : '100%'
		});
	}
}



/*-----------------------------------------------------------------------------------*/
/*	Quicksand
/*-----------------------------------------------------------------------------------*/
function theme_portfolio_quicksand() {
	var $data = jQuery(".portfolio-sortable-grid").clone();
	
	jQuery('.portfolio-sortable-menu li').click(function(e) {
		jQuery(".filter li").removeClass("active");	
		var filterClass=jQuery(this).attr('class').split(' ').slice(-1)[0];
		
		if (filterClass == 'all-items') {
			var $filteredData = $data.find('.item');
		} else {
			var $filteredData = $data.find('.item.' + filterClass );
		}
		jQuery(".portfolio-sortable-grid").quicksand($filteredData, {
			duration: 500,
			useScaling: false,
			easing: 'swing',
			adjustHeight: 'dynamic',
			enhancement: function() {
				theme_image_hover('body');
				theme_remove_image_preload();
				theme_load_portfolio_content();
			}		
		});
		jQuery(this).addClass("active");			
		return false;
		e.preventDefault();
	});
}



/*-----------------------------------------------------------------------------------*/
/*	Fancybox
/*-----------------------------------------------------------------------------------*/
function theme_fancybox() {
	jQuery('.fancybox').fancybox({
		'overlayShow'	: true,
		'overlayColor'		: '#000',
		'autoScale'		:	true,
		'titleShow'		: 	false
	});

	jQuery('.wp-caption a').fancybox({
		'overlayShow'	: true,
		'overlayColor'		: '#000',
		'autoScale'		:	true,
		'titleShow'		: 	false
	});
}



/*-----------------------------------------------------------------------------------*/
/*	Footer Twitter
/*-----------------------------------------------------------------------------------*/
function theme_footer_twitter() {
	if (jQuery().slides) {
		jQuery('#footer-twitter').slides({
			play: 5000,
			effect: 'fade',
			generatePagination: false,
			generateNextPrev: false,
			autoHeight: true
		});
	}
}



/*-----------------------------------------------------------------------------------*/
/*	Jcarousel
/*-----------------------------------------------------------------------------------*/
function theme_jcarousel() {

	var $carousel = jQuery('.post-carousel ul');
	var $easingType= 'easeOutCubic';

	if( $carousel.length ) {

		var scrollCount;

		if( jQuery(window).width() < 480 ) {
			scrollCount = 1;
		} else if( jQuery(window).width() < 768 ) {
			scrollCount = 2;
		} else if( jQuery(window).width() < 960 ) {
			scrollCount = 3;
		} else {
			scrollCount = 4;
		}

		$carousel.jcarousel({
			animation : 1000,
			easing    : $easingType,
			scroll    : scrollCount
		});
	}
}



/*-----------------------------------------------------------------------------------*/
/*	Gallery
/*-----------------------------------------------------------------------------------*/
function theme_gallery() {
	var hoverSpeed = 500;	

	jQuery('.flexslider').flexslider({
		animation: 'fade',
		slideshow: false,                
		slideshowSpeed: 5000,           
		animationDuration: 1000,         
		directionNav: true,             
		controlNav: true,              
		pausePlay: false,                               
		pauseOnAction: false,            
		pauseOnHover: true,    
		controlsContainer: '.flex-container-gallery'    
	});

	jQuery('.flex-direction-nav li a').css('opacity','0');

	jQuery('.flex-container-gallery').hover(function(e){
		jQuery(this).find('.flex-direction-nav li a').animate({ opacity: 1 }, hoverSpeed);
	}, function(e){
		jQuery(this).find('.flex-direction-nav li a').animate({ opacity: 0 }, hoverSpeed);
		e.preventDefault();
	});
}


/*-----------------------------------------------------------------------------------*/
/*	Top Media
/*-----------------------------------------------------------------------------------*/
function theme_top_media() {

	jQuery('#social-networking li a').each(function(){
		if(jQuery(this).find('.overlay').length == 0) { 
			jQuery(this).append('<div class="overlay"></div>');
			jQuery(this).find('.overlay').css({ opacity: 0 });
		}
	});

	jQuery('#social-networking li').hover(function(e){
		jQuery(this).find('.overlay').animate({ opacity: 1 }, 300);
	}, function(e){
		jQuery(this).find('.overlay').animate({ opacity: 0 }, 500);
	    e.preventDefault();
	});

}


/*-----------------------------------------------------------------------------------*/
/*	Image Hover
/*-----------------------------------------------------------------------------------*/
function theme_image_hover(content) {

	var hoverSpeed_Before = 500;
	var hoverSpeed_After = 500;

	//Fade
	jQuery('.post-thumb-hover a').each(function(index){
		if(jQuery(this).find('.overlay').length == 0) { 
			jQuery(this).append('<div class="overlay"></div>');
			jQuery(this).find('.overlay').css({ opacity: 0 });
		} 										
	});

	jQuery(content+' .post-thumb-hover').hover(function(e){
		jQuery(this).find('.overlay').animate({ opacity: 0.5 }, hoverSpeed_Before);
	}, function(e){
		jQuery(this).find('.overlay').animate({ opacity: 0 }, hoverSpeed_After);
		e.preventDefault();
	});

	//Icon
	jQuery('.post-thumb-hover a').each(function(index){
		if(jQuery(this).find('.overlay-icon').length == 0) { 
			jQuery(this).append('<div class="overlay-icon"></div>');
			jQuery(this).find('.overlay-icon').css({ opacity: 0 });
		} 										
	});

	jQuery(content+' .post-thumb-hover').hover(function(e){
		jQuery(this).find('.overlay-icon').animate({ opacity: 1 }, hoverSpeed_Before);
	}, function(e){
		jQuery(this).find('.overlay-icon').animate({ opacity: 0 }, hoverSpeed_After);
		e.preventDefault();
	});
}


/*-----------------------------------------------------------------------------------*/
/*	Image Preload
/*-----------------------------------------------------------------------------------*/
function theme_image_preload() {

	jQuery(window).bind('load', function(e) {
		 var i = 1;
		 var imgs = jQuery('.post-thumb-preload .wp-preload-image').length;
		 var int = setInterval(function(e) {

		 if(i >= imgs) clearInterval(int);
		 jQuery('.post-thumb-preload .wp-preload-image:not(.image-loaded)').eq(0).animate({ top: "0", opacity: "1"}, 300,"easeInQuart").addClass('image-loaded');
		 i++;
		 
		 }, 300);
		 e.preventDefault();
	});

}


/*-----------------------------------------------------------------------------------*/
/*	Remove Image Preload
/*-----------------------------------------------------------------------------------*/
function theme_remove_image_preload() {
	  	jQuery('.post-thumb-preload a').removeClass('image-loaded');
	  	jQuery('.wp-preload-image').css('opacity','1');
};



/*-----------------------------------------------------------------------------------*/
/*	Ajax Loader
/*-----------------------------------------------------------------------------------*/
function theme_load_portfolio_content() {

	 // Settings
	var slideToSpeed = 500;
	var slideUpSpeed = 500;
	var $easingType= 'easeOutQuart';
	var $close_button = jQuery('#close');	
	var $load_items = jQuery('a.load-ajax-content');	
	
	// Hash
	var hash = window.location.hash.substr(1);
	jQuery('a').each(function(){
		var $this = jQuery(this);							 
		var rel = $this.attr('rel');
		var href = $this.attr('href');
		if(hash==rel){
			jQuery('html,body').animate({scrollTop: jQuery("#site-head").prop("scrollHeight")}, slideToSpeed, $easingType, function() {
				loadContent(href);
			});
		}											
	});
		
	
	$load_items.click(function() {
		$load_items.removeClass('active');
		jQuery(this).addClass('active');					   					   
			
		var $this = jQuery(this);	
		var rel = $this.attr('rel');
		var href = $this.attr('href');
		
		if(window.location.hash.substr(1) == rel) { 
			jQuery('html,body').animate({scrollTop: jQuery("#site-head").prop("scrollHeight")}, slideToSpeed, $easingType);
		} else {
			window.location.hash = rel;	
			jQuery('html,body').animate({scrollTop: jQuery("#site-head").prop("scrollHeight")}, slideToSpeed, $easingType, function() {
				$close_button.fadeOut(100);
				jQuery('#page-ajax-content').slideUp(slideUpSpeed, function() {
					loadContent(href);
				});													
			});
		}
		return false;
	});
	
	
	$close_button.click(function() {
		$load_items.removeClass('active');
		$close_button.fadeOut(500);
		jQuery('#page-ajax-content').slideUp(slideUpSpeed, $easingType);
		window.location.hash = '#';
		return false;
	});


	function loadContent(href) {		
		jQuery('#loader').fadeIn(100);		
		var LoadContentWrapper = href+' .pageloader-inner';		
		jQuery('#pageloader').delay(500).queue(function() {
			jQuery(this).load(LoadContentWrapper, function() {
				jQuery('#loader').fadeOut(100);
				jQuery('#page-ajax-content').slideDown(slideUpSpeed, $easingType, function() {
					$close_button.fadeIn(500);
				});	
				theme_gallery();
				theme_remove_image_preload();
				theme_image_hover('#page-ajax-content');
				theme_fancybox();
				theme_media_player();
			});
			jQuery(this).dequeue();
		});
	}
};



/*-----------------------------------------------------------------------------------*/
/*	Accordion
/*-----------------------------------------------------------------------------------*/
function theme_accordions(){
	jQuery("ul.accordions li").each(function(){
		jQuery(this).children(".accordion-content").css('height', function(){ 
			return jQuery(this).height(); 
		});
		
		if(jQuery(this).index() > 0){
			jQuery(this).children(".accordion-content").css('display','none');
		}else{
			jQuery(this).find(".accordion-head-icon").addClass('active');
		}
		
		jQuery(this).children(".accordion-head").bind("click", function(){
			jQuery(this).children().addClass(function(){
				if(jQuery(this).hasClass("active")) return "";
				return "active";
			});
			jQuery(this).siblings(".accordion-content").slideDown();
			jQuery(this).parent().siblings("li").children(".accordion-content").slideUp();
			jQuery(this).parent().siblings("li").find(".active").removeClass("active");
		});
	});
}



/*-----------------------------------------------------------------------------------*/
/*	Toggle
/*-----------------------------------------------------------------------------------*/
function theme_toggles(){
	jQuery("ul.toggles li").each(function(){
		jQuery(this).children(".toggle-content").css('height', function(){ 
			return jQuery(this).height(); 
		});
		jQuery(this).children(".toggle-content").not(".active").css('display','none');
		
		jQuery(this).children(".toggle-head").bind("click", function(){
			jQuery(this).children().addClass(function(){
				if(jQuery(this).hasClass("active")){
					jQuery(this).removeClass("active");
					return "";
				}
				return "active";
			});
			jQuery(this).siblings(".toggle-content").slideToggle();
		});
	});
}



/*-----------------------------------------------------------------------------------*/
/*	Tabbed
/*-----------------------------------------------------------------------------------*/
function theme_tabs(){
	var tabs = jQuery('ul.tabs');

	tabs.each(function(i) {

		var tab = jQuery(this).find('> li > a');
		tab.click(function(e) {

			var contentLocation = jQuery(this).attr('href');

			if(contentLocation.charAt(0)=="#") {

				e.preventDefault();

				tab.removeClass('active');
				jQuery(this).addClass('active');

				jQuery(contentLocation).show().addClass('active').siblings().hide().removeClass('active');
			}
		});
	});
}



/*-----------------------------------------------------------------------------------*/
/*	Google Maps
/*-----------------------------------------------------------------------------------*/
function theme_google_maps(){
	//Google Maps
	if( typeof google != 'undefined' && 
		typeof google.maps != 'undefined' &&
		typeof google.maps.LatLng !== 'undefined' ){
		jQuery('.map-canvas').each(function(){
			
			var $canvas = jQuery(this);
			var dataZoom = $canvas.attr('data-zoom') ? parseInt($canvas.attr('data-zoom')) : 8;
			
			var latlng = $canvas.attr('data-lat') ? 
							new google.maps.LatLng($canvas.attr('data-lat'), $canvas.attr('data-lng')) :
							new google.maps.LatLng(40.7143528, -74.0059731);
					
			var myOptions = {
				zoom: dataZoom,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				center: latlng
			};
					
			var map = new google.maps.Map(this, myOptions);
			
			if($canvas.attr('data-address')){
				var geocoder = new google.maps.Geocoder();
				geocoder.geocode({ 
						'address' : $canvas.attr('data-address') 
					},
					function(results, status) {					
						if (status == google.maps.GeocoderStatus.OK) {
							map.setCenter(results[0].geometry.location);
							var marker = new google.maps.Marker({
								map: map,
								position: results[0].geometry.location,
								title: $canvas.attr('data-mapTitle')
							});
						}
				});
			}
		});
	}
}




/*-----------------------------------------------------------------------------------*/
/*	Responsive 
/*-----------------------------------------------------------------------------------*/
function theme_responsive_actions(){

	if( jQuery(window).width() < 960 ) {

		var $allVideos = jQuery("iframe[src^='http://player.vimeo.com'], iframe[src^='http://www.youtube.com'], object, embed"),
		$fluidEl = jQuery(".video");

		$allVideos.each(function() {
		  jQuery(this)
			.attr('data-aspectRatio', this.height / this.width)
			.removeAttr('height')
			.removeAttr('width');
		});

		jQuery(window).resize(function() {
		  var newWidth = $fluidEl.width();
		  $allVideos.each(function() {
		  
			var $el = jQuery(this);
			$el
				.width(newWidth)
				.height(newWidth * $el.attr('data-aspectRatio'));
		  
		  });
		}).resize();

	}
}