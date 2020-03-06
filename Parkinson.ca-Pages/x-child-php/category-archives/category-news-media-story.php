<?php

/*
Archive Template to display media news stories
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">

    <?php if(ICL_LANGUAGE_CODE=='fr'): ?>
        <p>Disponible seulement en Anglais</p>
    <?php endif; ?>
	
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>">
  			  <h5><a class="park-red-text" href="<?php echo(types_render_field( 'news-url', array( ) ) ); ?>" target="blank" rel="noopener"><?php  the_title() ?></a></h5>
          <strong class="park-close-para-margin"><?php echo (types_render_field( 'news-date-of-release', array( 'format'=> 'F j, Y' ) ) ); ?> || <?php echo(types_render_field( 'news-media-outlet', array( ) ) ); ?></strong>
          <div>
            <?php the_content() ?>        
          </div>
  					
        </article>
			
				<?php endwhile; ?>

    </div>
      <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
