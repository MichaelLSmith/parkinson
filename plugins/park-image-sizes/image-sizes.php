<?php
   /*
   Plugin Name: Parkinson Image Sizes
   Plugin URI: 
   description: Plugin creating custom image sizes for parkinson.ca
   Version: 1.0
   Author: Michael Smith
   Author URI: 
   License: GPL2
   */
//from https://wpshout.com/wordpress-custom-image-sizes/

// Add featured image sizes
add_image_size( 'featured-large', 640, 294, true ); // width, height, crop
add_image_size( 'featured-small', 320, 147, true );

// Add other useful image sizes for use through Add Media modal
add_image_size( 'medium-width', 480 );
add_image_size( 'medium-height', 9999, 480 );
add_image_size( 'medium-something', 480, 480 );

// Register the three useful image sizes for use in Add Media modal
add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );
function wpshout_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'medium-width' => __( 'Medium Width' ),
        'medium-height' => __( 'Medium Height' ),
        'medium-something' => __( 'Medium Something' ),
    ) );
}

//photo sizes list
// epp email - 200 width
// epp blog - 400 width

?>