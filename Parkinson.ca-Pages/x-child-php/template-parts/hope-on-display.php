<h2>Hope on Display - Artist Profile</h2>

<p><?php the_field('hod_artist_name'); ?> </p>

<p><?php the_field('hod_artist_bio'); ?> after bio </p>

<p>
	
	<?php 
		$image = get_field('hod_artist_image');

		
		echo '<pre>';
		var_dump( $image );
	echo '</pre>';





















?>
	


</p>


