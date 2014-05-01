<?php
/*
 * @package by Theme Record
 * @auther: MattMao
*/

if ( !function_exists('theme_footer_tweet_posts') )
{	
	function theme_footer_tweet_posts($username, $tweet_count, $cache_time = 12) 
	{
		global $tr_config;
		$twitter_ck = $tr_config['consumer_key'];
		$twitter_cs = $tr_config['consumer_secret'];
		$twitter_at = $tr_config['access_token'];
		$twitter_ats = $tr_config['access_token_secret'];
		$key = THEME_SLUG.'_tweet_slide_cache';
		$cache_time_key = THEME_SLUG.'_tweet_slide_cache_time';

		//check settings and die if not set
		if(empty($twitter_ck) || empty($twitter_cs) || empty($twitter_at) || empty($twitter_ats) || empty($username) || empty($cache_time)){
			$output = '<div class="slide">'.__('Oops, our Twitter feed is unavailable at the moment', 'mm_lang').'- <a href="http://twitter.com/'.$username.'/">'.__('Follow us on Twitter!','TR').'</a></div>';
			return $output;
		}


		//check if cache needs update
		$last_cache_time = get_option($cache_time_key);
		$diff = time() - $last_cache_time;
		$crt = $cache_time * 3600;


		//	yes, it needs update			
		if($diff >= $crt || empty($last_cache_time)){
			require_once(FUNCTIONS_DIR.'/plugins/twitteroauth.php');
			$connection = new TwitterOAuth($twitter_ck, $twitter_cs, $twitter_at, $twitter_ats);
			$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$username."&count=".$tweet_count."") or die('Couldn\'t retrieve tweets! Wrong username?');

			if(!empty($tweets->errors)){
				if($tweets->errors[0]->message == 'Invalid or expired token'){
					$output = '<div class="slide"><strong>'.$tweets->errors[0]->message.'!</strong><br />You\'ll need to regenerate it <a href="https://dev.twitter.com/apps" target="_blank">here</a>!</div>';
				}else{
					$output = '<div class="slide"><strong>'.$tweets->errors[0]->message.'</strong></div>';
				}
				return $output;
			}

			for($i = 0;$i <= count($tweets); $i++){
				if(!empty($tweets[$i])){
					$tweets_array[$i]['created_at'] = $tweets[$i]->created_at;
					$tweets_array[$i]['text'] = $tweets[$i]->text;			
					$tweets_array[$i]['status_id'] = $tweets[$i]->id_str;			
				}	
			}
			
			//save tweets to wp option 		
			update_option($key, serialize($tweets_array));							
			update_option($cache_time_key, time());
		}

		$tweetData = maybe_unserialize(get_option($key));
		if(!empty($tweetData)){
			$i=0;

			$output = '';

			foreach($tweetData as $tweet)
			{
				$output .= '<div class="slide">';
				$output .= twitter_convert_links($tweet['text']);
				$output .= '<span class="date meta"><a class="twitter_time" target="_blank" href="http://twitter.com/'.$username.'/statuses/'.$tweet['status_id'].'">'.twitter_relative_time($tweet['created_at']).'</a></span>';
				$output .= '</div>';

				$i++;
				if ( $i >= $tweet_count ) break;
			}

			return $output;
		}
	}//end funcation
}

?>