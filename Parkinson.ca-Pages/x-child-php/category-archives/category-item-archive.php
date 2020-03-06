<?php

/*

Archive Template to display all profile CPTs
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">
      <section class="grid">
        <?php while ( have_posts() ) : the_post(); ?>
  
          <article id="post-<?php the_ID(); ?>" class="grid__item">
            <a href="<?php echo(types_render_field( 'pdf-of-issue', array( "output" => 'raw' ) ) ); ?>">
              <span><?php echo(types_render_field( 'month-of-issue', array( ) ) ); ?></span>
              <span><?php echo(types_render_field( 'year-of-issue', array( ) ) ); ?></span>
            </a>
          </article>
        <?php endwhile;?>
      </section>

    </div>
      <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
