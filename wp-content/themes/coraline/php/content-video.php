<?php
/**
 * Video
 * @package by Theme Record
 * @auther: MattMao
*/
if ( !function_exists( 'theme_post_video' ) )
{
	function theme_post_video($type) 
	{
		$embed_player = get_meta_option('embed_player');
		$video_id = get_meta_option('video_embed_id');
		$video_ogv = get_meta_option('video_ogv');
		$video_mp4 = get_meta_option('video_mp4');
		$video_webm = get_meta_option('video_webm');
		$video_poster_image = get_meta_option('video_poster_image');
		$video_height = get_meta_option('video_height');
		

		//Type
		if($type == 'portfolio')
		{
			$video_width = 660;
		}
		elseif($type == 'blog')
		{
			$video_width = 520;
		}

		if($video_height == '') { $video_height = $video_width * 9/16; }

		echo '<div class="post-entry-video">'."\n";
		if($embed_player == 'youtube')
		{
			if($video_id) { echo '<iframe class="video" width="'.$video_width.'" height="'.$video_height.'" src="http://www.youtube.com/embed/'.$video_id.'" frameborder="0" allowfullscreen></iframe>'."\n"; }
		}
		elseif($embed_player == 'vimeo')
		{
			if($video_id) { echo '<iframe class="video" src="http://player.vimeo.com/video/'.$video_id.'" width="'.$video_width.'" height="'.$video_height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'."\n"; }
		}
		elseif($embed_player == 'self-hosted')
		{
			if($video_ogv || $video_mp4 || $video_webm)
			{
				echo '<video class="mediaelement" style="width: 100%; height: 100%;" controls="controls" preload="none" poster="'.$video_poster_image.'">'."\n";
				if($video_mp4) { echo '	<source src="'.$video_mp4.'" type="video/mp4" />'."\n"; }
				if($video_ogv) { echo '	<source src="'.$video_ogv.'" type="video/ogg" />'."\n"; }
				if($video_webm) { echo '	<source src="'.$video_webm.'" type="video/webm" />'."\n"; }
				echo '   <object style="width: 100%; height: 100%;" data="'.ASSETS_URI.'/flash/player.swf" type="application/x-shockwave-flash">'."\n";
				echo '   <param name="movie" value="'.ASSETS_URI.'/flash/player.swf">'."\n";
				if($video_mp4) { echo '	<param name="flashvars" value="controls=true&amp;poster='.$video_poster_image.'&amp;file='.$video_mp4.'" />'."\n"; }
				if($video_poster_image) { echo '	<img src="'.$video_poster_image.'" alt="'.get_the_title().'" title="'.get_the_title().'" />'."\n"; }
				echo '	</object>'."\n"; 	
				echo '</video>'."\n";		
			}
		}
		echo '</div>'."\n";		
	}
}

?>