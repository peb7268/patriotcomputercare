<?php
if ( has_post_thumbnail() ) {
	$size = (isset($post->tau_size)) ? $post->tau_size : 'medium';
	the_post_thumbnail($size);
} else { 
	echo "<img src='http://www.patriotcomputercare.com/wp-content/themes/patriotcomputercare.com/img/logo-full.jpg'>";	
}