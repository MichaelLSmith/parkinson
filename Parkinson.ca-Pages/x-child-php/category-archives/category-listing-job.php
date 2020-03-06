<?php

/*

Archive Template to display all profile CPTs
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">

      <?php if(ICL_LANGUAGE_CODE=='fr'): ?>
          <p>Disponible seulement en Anglais</p>
      <?php endif; ?>

      <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>">
          <a href="<?php echo(types_render_field( 'pdf-document-of-job-posting', array( "output" => 'raw' ) ) ); ?>" target="blank"><?php  echo(types_render_field( 'listing-name', array( ) ) ); ?> </a> -
          <span>
            <?php echo(types_render_field( 'location-of-job', array( ) ) ); ?>
          </span>
          <?php if(types_render_field('listings-notes')):?>
          <ul>
            <li><?php echo(types_render_field( 'listings-notes', array( 'separator' => '</li><li>' ) ) );?>
          </ul>
        <?php endif?>
        </article>

      <?php endwhile; ?>

    </div>
      <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
