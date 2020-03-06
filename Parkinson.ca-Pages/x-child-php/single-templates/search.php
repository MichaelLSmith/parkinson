<?php

/*

Template for search results
*/

get_header(); ?>

<?php

  // global $query_string;

  // $search_query = wp_parse_str( $query_string );
  // $search = new WP_Query( $search_query );

?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">
      <?php //the_archive_title( '<h1 class="page-title">', '</h1>' );?>

      <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
          
          the_excerpt();
          ?>
        </article>

      <?php endwhile; ?>
      <?php the_posts_pagination( array( 'mid_size'  => 2 ) ); ?>


    </div>
      <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
