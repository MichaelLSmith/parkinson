<?php

/*

Archive Template to display all profile CPTs
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">
      <?php the_archive_title( '<h1 class="page-title">', '</h1>' );?>

      <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        </article>

      <?php endwhile; ?>

    </div>
      <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
