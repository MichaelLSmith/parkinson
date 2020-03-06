<?php

/*
Archive template to display bio profiles.
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">

      <?php
      if(is_category( 'mind-over-matter-keynote' )): ?>

      <div class="park-red-background">
        <img class="aligncenter size-full wp-image-8522" src="http://www.parkinson.ca/wp-content/uploads/MoM-header.jpg" alt="header image" width="702" height="168" />
      </div>
      <div class="flex-container mind-menu"><a class="x-btn verticle-align-text" href="http://www.parkinson.ca/event/mind-over-matter-2018/">Home</a>
        <a class="x-btn" href="http://www.parkinson.ca/category/profile-research/mind-over-matter-keynote/">Key Note
          Speakers</a>
        <a class="x-btn" href="http://www.parkinson.ca/mind-over-matter-subject-matter-experts/">Subject Matter Experts</a>
      </div>

      <?php endif ?>

      <div class="research-container">
        <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="alignright">
              <?php echo(types_render_field( 'profile-image', array( 'class' => 'thin-border' ) ) ); ?>
            </div>
            <?php the_content(); ?>
          </article>
            <hr class="hr-visible" />
        <?php endwhile; ?>
      </div>
    </div>
      <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
