<?php
   /*
   Plugin Name: Parkinson Customisations
   Plugin URI: 
   description: Plugin for various customisations for parkinson.ca
   Version: 1.9
   Author: Michael Smith
   Author URI: 
   License: GPL2
   */

// Remove and replace Lato font
// =============================================================================

function x_remove_replace_lato_font(){
  wp_dequeue_style( 'x-font-standard' );
  wp_enqueue_style( 'lato-font', '//fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic', NULL, X_VERSION, 'all' );
}
add_action( 'wp_enqueue_scripts', 'x_remove_replace_lato_font', 100 );

// =============================================================================

//filter to exlude images from relevanssi search results
//from: https://www.relevanssi.com/knowledge-base/controlling-attachment-types-index/
	
	add_filter('relevanssi_do_not_index', 'rlv_no_image_attachments', 10, 2);
		function rlv_no_image_attachments($block, $post_id) {
			$mime = get_post_mime_type($post_id);
			if (substr($mime, 0, 5) == "image") $block = true;
			return $block;
}

//sub-category page use parent category arhive Template
//from http://werdswords.com/force-sub-categories-use-the-parent-category-template/
function new_subcategory_hierarchy() {
	$category = get_queried_object();

	$parent_id = $category->category_parent;

	$templates = array();

	if ( $parent_id == 0 ) {
			// Use default values from get_category_template()
			$templates[] = "category-{$category->slug}.php";
			$templates[] = "category-{$category->term_id}.php";
			$templates[] = 'category.php';
	} else {
			// Create replacement $templates array
			$parent = get_category( $parent_id );

			// Current first
			$templates[] = "category-{$category->slug}.php";
			$templates[] = "category-{$category->term_id}.php";

			// Parent second
			$templates[] = "category-{$parent->slug}.php";
			$templates[] = "category-{$parent->term_id}.php";
			$templates[] = 'category.php';
	}
	return locate_template( $templates );
}

add_filter( 'category_template', 'new_subcategory_hierarchy' );

// use category templates for French category name (by slug) http://digitalize.ca/2009/06/wordpress-tip-using-the-same-template-across-multiple-category-tag-and-author-pages/
// I believe *_template hooks exist for just about every type of template so it's easy to apply to other templates as well
function my_category_template( $template ) {
	if( is_category( 'listing-job-fr' ) ) // We can search for categories by ID
		$template = locate_template( array( 'category-listing-job.php', 'category.php' ) );
	elseif ( is_category( 'listing-volunteer-fr' ) ) {
		$template = locate_template( array( 'category-listing-volunteer.php', 'category.php' ) );
	}
	elseif ( is_category( 'profile-expert-fr' ) ) {
		$template = locate_template( array( 'category-profile-research.php', 'category.php' ) );
	}
	elseif ( is_category( 'recherche-2017-2019' ) ) {
		$template = locate_template( array( 'category-profile-research.php', 'category.php' ) );
	}
	elseif ( is_category( 'recherche-2018-2020' ) ) {
		$template = locate_template( array( 'category-profile-research.php', 'category.php' ) );
	}
	elseif ( is_category( 'recherche-2019-2021' ) ) {
		$template = locate_template( array( 'category-profile-research.php', 'category.php' ) );
	}
	return $template;
	}
add_filter( 'category_template', 'my_category_template' );

//Increase posts per page on listings category pages
function increasePostsOnCatArchive( $query ) {
  
  if(is_category('listing-volunteer') ||
    is_category('listing-job') ||
    is_category('listing-volunteer-fr') ||
    is_category('listing-job-fr') ||
    is_category('research-2017-2019') ||
		is_category('recherche-2017-2019') ||
    is_category('research-2018-2020') ||
		is_category('recherche-2018-2020') ||
		is_category('research-2019-2021') ||
		is_category('recherche-2019-2021')
    ) {
    $query->set('posts_per_page', 50);
    return;
  }
}
add_action( 'pre_get_posts', 'increasePostsOnCatArchive');
//Archive Page title
function xchild_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'xchild_archive_title' );

//ssl/https exceptions
function rsssl_exclude_http_url($html) {
  $html = str_replace("https://psc.convio.net/site/TR", "http://psc.convio.net/site/TR", $html);
  return $html;
}
add_filter("rsssl_fixer_output","rsssl_exclude_http_url");

?>