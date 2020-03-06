<?php

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
                  . '<a href="#" class="x-btn-navbar-search ubermenu-target">'
                    . __( 'Search', '__x__' ) . '</span></span>' . '<span><i class="x-icon-search" data-x-icon="" aria-hidden="true"></i><span> '
                  . '</a>'
                . '</li>';
      }
    }
  }

  return $items;

}
add_filter( 'wp_nav_menu_items', 'x_navbar_search_navigation_item', 9998, 2 );

?>