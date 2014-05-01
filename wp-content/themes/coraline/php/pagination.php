<?php
/**
 * Pagination
 * @package by Theme Record
 * @auther: MattMao
*/

#
#Theme pagination
#
if ( !function_exists( 'theme_pagination' ) )
{
	function theme_pagination() 
	{
		global $tr_config;

		if($tr_config['pagination'] == 'style')
		{
			theme_style_pagination();
		}
		elseif($tr_config['pagination'] == 'default')
		{
			theme_normal_pagination();
		}
	}
}


#
#Normal Pagination
#
if ( !function_exists( 'theme_normal_pagination' ) )
{
	function theme_normal_pagination() 
	{
	 ?>
	<div class="normal-pagination clearfix">
	<?php if( get_next_posts_link() ): ?>
	<div class="next">
		<?php next_posts_link(__('&larr; Older Entries', 'TR')); ?>
	</div>
	<?php endif; ?>
	<?php if( get_previous_posts_link() ): ?>
	<div class="prev">
		<?php previous_posts_link(__('Newer Entries &rarr;', 'TR')) ?>
	</div>
	<?php endif; ?>
	</div>
	 <?php
	}
}

?>