<?php 
/**
 * Audio Content
 * @package by Theme Record
 * @auther: MattMao
 */

function theme_content_audio() 
{
	#Get meta
	$ogg = get_meta_option('audio_ogg');
	$mp3 = get_meta_option('audio_mp3');

	if($ogg || $mp3)
	{
		echo '<div class="entry-audio">'."\n";
		echo '<audio controls="controls">'."\n";

		if($mp3) { echo '<source type="audio/mp3" src="'.$mp3.'"></source>'; }
		if($ogg) { echo '<source type="audio/ogg" src="'.$ogg.'"></source>'; }

		echo '<object data="'.ASSETS_URI.'/flash/player.swf" type="application/x-shockwave-flash">';
		echo '<param value="'.ASSETS_URI.'/flash/player.swf" name="movie">';

		if($mp3) { echo '<param value="controls=true&amp;file='.$mp3.'" name="flashvars">'; }
		if($ogg) { echo '<param value="controls=true&amp;file='.$ogg.'" name="flashvars">'; }

		echo '</object>';
		echo '</audio>'."\n";
		echo '</div>'."\n";
	}
}
?>