<?php

/*
Template Name: Contact Us
Template for custom contact us page including local offices post type
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">
 
      <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				

        </article>

      <?php endwhile; ?>

    </div>
      <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
