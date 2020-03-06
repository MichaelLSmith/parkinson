<?php

/*
Template Name: DonaldCalne
Template Post Type: bio-profile
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main full" role="main">
      Test

      <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php x_get_view( 'global', '_content', 'the-content' ); ?>
        </article>

      <?php endwhile; ?>

    </div>
  </div>

<?php get_footer(); ?>
