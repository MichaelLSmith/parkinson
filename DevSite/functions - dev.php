<?php

// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Overwrite or add your own custom functions to X in this file.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Parent Stylesheet
//   02. Additional Functions
// =============================================================================

// Enqueue Parent Stylesheet
// =============================================================================

add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );


// Additional Functions
// =============================================================================


// Custom Search Navigation
// =============================================================================
function x_navbar_search_navigation_item( $items, $args ) {

  if ( x_get_option( 'x_header_search_enable' ) == '1' ) {
    if ( $args->theme_location == 'ubermenu' ) {

      if ( ! class_exists( 'UberMenu' ) ) {

        $items .= '<li class="menu-item x-menu-item x-menu-item-search">'
                  . '<a href="#" class="x-btn-navbar-search">'
                    . __( 'Search', '__x__' ) . '</span></span>' . '<span><i class="x-icon-search" data-x-icon="" aria-hidden="true"></i><span> '
                  . '</a>'
                . '</li>';
      } else {
        $items .= '<li class="ubermenu-item ubermenu-item-level-0 x-menu-item x-menu-item-search">'
                  . '<a href="#" class="x-btn-navbar-search">'
                    . __( 'Search', '__x__' ) . '</span></span>' . '<span><i class="x-icon-search" data-x-icon="" aria-hidden="true"></i><span> '
                  . '</a>'
                . '</li>';
      }
    }
  }

  return $items;

}
add_filter( 'wp_nav_menu_items', 'x_navbar_search_navigation_item', 9998, 2 );
// =============================================================================
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

// use category templates for French category name  (by slug) http://digitalize.ca/2009/06/wordpress-tip-using-the-same-template-across-multiple-category-tag-and-author-pages/
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
	return $template;
}
add_filter( 'category_template', 'my_category_template' );

// Add Menus
// ============================================================

// function register_header_menu() {
//   register_nav_menu('topbar-menu',__( 'Topbar Menu' ));
//   // register_nav_menu( 'uber-menu' ,__( 'Uber Menu' ));
//   register_nav_menu( 'topbar-menu-mobile' ,__( 'Topbar Mobile Menu' ));
// }
// add_action( 'init', 'register_header_menu' );

function register_my_menus() {
  register_nav_menus(
    array(
      'topbar-menu' => __( 'Topbar Menu' ),
      'topbar-menu-mobile' => __( 'Topbar Mobile Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// Add Donate Button Widget
// =========================

register_sidebar( array(
    'id'          => 'header-donate',
    'name'        => __( 'Header - Donate','x'),
    'description' => 'This is the donate button in the header.',
    'before_widget' => '<div id="cd-donate-button">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>'
) );

// Add Footer Signup Widgets
// =========================

register_sidebar( array(
    'id'          => 'footer-signup-1',
    'name'        => __( 'Footer Signup 1','x'),
    'description' => 'This is an editable block above the signup in the footer.',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
) );

register_sidebar( array(
    'id'          => 'footer-signup-2',
    'name'        => __( 'Footer Signup 2','x'),
    'description' => 'This is an editable block next to the signup in the footer.',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
) );

// Add Footer Widgets
// =========================

register_sidebar( array(
    'id'          => 'footer-block-1',
    'name'        => __( 'Footer Block 1','x'),
    'description' => 'This is an editable block in the footer.',
    'before_widget' => '<div class="cd-footer-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>'
) );

register_sidebar( array(
    'id'          => 'footer-block-2',
    'name'        => __( 'Footer Block 2','x'),
    'description' => 'This is an editable block in the footer.',
    'before_widget' => '<div class="cd-footer-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>'
) );

//Increase posts per page on listings category pages
function increasePostsOnCatArchive( $query ) {
  $category = get_the_category();
  $category_parent_id = $category[0]->category_parent;

  if(is_category('listing-volunteer') ||
    is_category('listing-job') ||
    is_category('listing-volunteer-fr') ||
    is_category('listing-job-fr') ||
    $category_parent_id = 88 ||
    $category_parent_id = 103
    // is_category('research-2017-2019') ||
    // is_category('recherche-2017-2019')
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

// Custom Post Types Breadcrumbs
// =================================

function x_breadcrumbs() {

    if ( x_get_option( 'x_breadcrumb_display' ) ) {

      GLOBAL $post;

      $is_ltr         = ! is_rtl();
      $stack          = x_get_stack();
      $delimiter      = x_get_breadcrumb_delimiter();
      $home_text      = x_get_breadcrumb_home_text();
      $home_link      = home_url();
      $current_before = x_get_breadcrumb_current_before();
      $current_after  = x_get_breadcrumb_current_after();
      $page_title     = get_the_title();
      $blog_title     = get_the_title( get_option( 'page_for_posts', true ) );

      if ( ! is_404() ) {
        $post_parent = $post->post_parent;
      } else {
        $post_parent = '';
      }

      if ( X_WOOCOMMERCE_IS_ACTIVE ) {
        $shop_url   = x_get_shop_link();
        $shop_title = x_get_option( 'x_' . $stack . '_shop_title' );
        $shop_link  = '<a href="'. $shop_url .'">' . $shop_title . '</a>';
      }

      echo '<div class="x-breadcrumbs"><a href="' . $home_link . '">' . $home_text . '</a>' . $delimiter;

        if ( is_home() ) {

          echo $current_before . $blog_title . $current_after;

        } elseif ( is_category() ) {

          $the_cat = get_category( get_query_var( 'cat' ), false );
          if ( $the_cat->parent != 0 ) echo get_category_parents( $the_cat->parent, TRUE, $delimiter );
          echo $current_before . single_cat_title( '', false ) . $current_after;

        } elseif ( x_is_product_category() ) {

          if ( $is_ltr ) {
            echo $shop_link . $delimiter . $current_before . single_cat_title( '', false ) . $current_after;
          } else {
            echo $current_before . single_cat_title( '', false ) . $current_after . $delimiter . $shop_link;
          }

        } elseif ( x_is_product_tag() ) {

          if ( $is_ltr ) {
            echo $shop_link . $delimiter . $current_before . single_tag_title( '', false ) . $current_after;
          } else {
            echo $current_before . single_tag_title( '', false ) . $current_after . $delimiter . $shop_link;
          }

        } elseif ( is_search() ) {

          echo $current_before . __( 'Search Results for ', '__x__' ) . '“' . get_search_query() . '”' . $current_after;

        } elseif ( is_singular( 'post' ) ) {

          if ( get_option( 'page_for_posts' ) == is_front_page() ) {
            echo $current_before . $page_title . $current_after;
          } else {
            if ( $is_ltr ) {
              echo '<a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">' . $blog_title . '</a>' . $delimiter . $current_before . $page_title . $current_after;
            } else {
              echo $current_before . $page_title . $current_after . $delimiter . '<a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">' . $blog_title . '</a>';
            }
          }

        // custom post types
        } elseif ( is_singular( 'bio-profile' ) ) {

            if ( $is_ltr ) {
              echo '<a href="' . get_post_type_archive_link( 'bio-profile' ) . '">' . __( 'Bio / Profile' ) . '</a>' . $delimiter . $current_before . $page_title . $current_after;
            } else {
              echo $current_before . $page_title . $current_after . $delimiter . '<a href="' . get_post_type_archive_link( 'bio-profile' ) . '">' . __( 'Your post type' ) . '</a>';
            }
        // custom post types
        } elseif ( is_singular( 'listing' ) ) {

            if ( $is_ltr ) {
              echo '<a href="' . get_post_type_archive_link( 'listing' ) . '">' . __( 'Listing' ) . '</a>' . $delimiter . $current_before . $page_title . $current_after;
            } else {
              echo $current_before . $page_title . $current_after . $delimiter . '<a href="' . get_post_type_archive_link( 'listing' ) . '">' . __( 'Your post type' ) . '</a>';
            }
        // custom post types
        } elseif ( is_singular( 'event' ) ) {

            if ( $is_ltr ) {
              echo '<a href="' . get_post_type_archive_link( 'event' ) . '">' . __( 'Event' ) . '</a>' . $delimiter . $current_before . $page_title . $current_after;
            } else {
              echo $current_before . $page_title . $current_after . $delimiter . '<a href="' . get_post_type_archive_link( 'event' ) . '">' . __( 'Your post type' ) . '</a>';
            }
        // custom post types
        } elseif ( is_singular( 'resource' ) ) {

            if ( $is_ltr ) {
              echo '<a href="' . get_post_type_archive_link( 'resource' ) . '">' . __( 'Resource' ) . '</a>' . $delimiter . $current_before . $page_title . $current_after;
            } else {
              echo $current_before . $page_title . $current_after . $delimiter . '<a href="' . get_post_type_archive_link( 'resource' ) . '">' . __( 'Your post type' ) . '</a>';
            }
        // custom post types
        } elseif ( is_singular( 'support-groups' ) ) {

            if ( $is_ltr ) {
              echo '<a href="' . get_post_type_archive_link( 'support-groups' ) . '">' . __( 'Support Group' ) . '</a>' . $delimiter . $current_before . $page_title . $current_after;
            } else {
              echo $current_before . $page_title . $current_after . $delimiter . '<a href="' . get_post_type_archive_link( 'support-groups' ) . '">' . __( 'Your post type' ) . '</a>';
            }
        // custom post types
        } elseif ( is_singular( 'webinar' ) ) {

            if ( $is_ltr ) {
              echo '<a href="' . get_post_type_archive_link( 'webinar' ) . '">' . __( 'Webinar' ) . '</a>' . $delimiter . $current_before . $page_title . $current_after;
            } else {
              echo $current_before . $page_title . $current_after . $delimiter . '<a href="' . get_post_type_archive_link( 'webinar' ) . '">' . __( 'Your post type' ) . '</a>';
            }

        } elseif ( x_is_portfolio() ) {

          echo $current_before . get_the_title() . $current_after;

        } elseif ( x_is_portfolio_item() ) {

          $link  = x_get_parent_portfolio_link();
          $title = x_get_parent_portfolio_title();

          if ( $is_ltr ) {
            echo '<a href="' . $link . '">' . $title . '</a>' . $delimiter . $current_before . $page_title . $current_after;
          } else {
            echo $current_before . $page_title . $current_after . $delimiter . '<a href="' . $link . '">' . $title . '</a>';
          }

        } elseif ( x_is_product() ) {

          if ( $is_ltr ) {
            echo $shop_link . $delimiter . $current_before . $page_title . $current_after;
          } else {
            echo $current_before . $page_title . $current_after . $delimiter . $shop_link;
          }

        } elseif ( x_is_buddypress() ) {

          if ( bp_is_group() ) {
            echo '<a href="' . bp_get_groups_directory_permalink() . '">' . x_get_option( 'x_buddypress_groups_title' ) . '</a>' . $delimiter . $current_before . x_buddypress_get_the_title() . $current_after;
          } elseif ( bp_is_user() ) {
            echo '<a href="' . bp_get_members_directory_permalink() . '">' . x_get_option( 'x_buddypress_members_title' ) . '</a>' . $delimiter . $current_before . x_buddypress_get_the_title() . $current_after;
          } else {
            echo $current_before . x_buddypress_get_the_title() . $current_after;
          }

        } elseif ( x_is_bbpress() ) {

          remove_filter( 'bbp_no_breadcrumb', '__return_true' );

          if ( bbp_is_forum_archive() ) {
            echo $current_before . bbp_get_forum_archive_title() . $current_after;
          } else {
            echo bbp_get_breadcrumb();
          }

          add_filter( 'bbp_no_breadcrumb', '__return_true' );

        } elseif ( is_page() && ! $post_parent ) {

          echo $current_before . $page_title . $current_after;

        } elseif ( is_page() && $post_parent ) {

          $parent_id   = $post_parent;
          $breadcrumbs = array();

          if ( is_rtl() ) {
            echo $current_before . $page_title . $current_after . $delimiter;
          }

          while ( $parent_id ) {
            $page          = get_page( $parent_id );
            $breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
            $parent_id     = $page->post_parent;
          }

          if ( $is_ltr ) {
            $breadcrumbs = array_reverse( $breadcrumbs );
          }

          for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
            echo $breadcrumbs[$i];
            if ( $i != count( $breadcrumbs ) -1 ) echo $delimiter;
          }

          if ( $is_ltr ) {
            echo $delimiter . $current_before . $page_title . $current_after;
          }

        } elseif ( is_tag() ) {

          echo $current_before . single_tag_title( '', false ) . $current_after;

        } elseif ( is_author() ) {

          GLOBAL $author;
          $userdata = get_userdata( $author );
          echo $current_before . __( 'Posts by ', '__x__' ) . '“' . $userdata->display_name . $current_after . '”';

        } elseif ( is_404() ) {

          echo $current_before . __( '404 (Page Not Found)', '__x__' ) . $current_after;

        } elseif ( is_archive() ) {

          if ( x_is_shop() ) {
            echo $current_before . $shop_title . $current_after;
          } else {
            echo $current_before . __( 'Archives ', '__x__' ) . $current_after;
          }

        }

      echo '</div>';

    }

  }

  add_action('admin_head', 'hide_lang_menu_dropdown');

  function hide_lang_menu_dropdown() {
    echo '<style>
    /*ADD TO ADMIN STYLESHEET*/
    #nav-menu-header .menu-name-label.howto,
    #nav-menu-header .howto.icl_nav_menu_text {
      display:none !important;
    }

    #nav-menu-header .nav-menus-php .major-publishing-actions .publishing-action {
      float:left;
    }
    </style>';
  }

  // Update CSS within in Admin
  function admin_style() {
    wp_enqueue_style('admin-styles', get_stylesheet_directory_uri().'/admin.css');
  }
  add_action('admin_enqueue_scripts', 'admin_style');

// Fixing mobile menu appearance
remove_filter( 'wp_nav_menu_args' , 'ubermenu_automatic_integration_filter' , 1000 );

// Change Geo My WP default search form text
function gmw_modify_search_site_text( $labels, $gmw ) {

  $labels['search_form']['search_site'] = __('Support groups, events and offices (click to select)', '__x__');

  return $labels;
}
add_filter( 'gmw_set_labels', 'gmw_modify_search_site_text', 50, 2 );
