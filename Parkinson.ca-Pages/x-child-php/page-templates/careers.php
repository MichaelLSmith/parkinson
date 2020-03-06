<?php

/*
Template Name: Careers
Template for Template for careers page with wp-query for listings-job category
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">
			
			<?php while ( have_posts() ) : the_post(); ?>
			
			<?php if(ICL_LANGUAGE_CODE=='fr'): ?>
			<p>Disponible seulement en Anglais.</p>
			<?php endif; ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content content">

				<?php
				// WP_Query arguments
				$args = array(
					'post_type'              => array( 'listing' ),
					'tax_query'              => array(
						array(
							'taxonomy'         => 'category',
							'terms'            => 'listing-job',
							'field'            => 'slug',
						),
					),
				);

				// The Query
				$query = new WP_Query( $args );

				// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
				?>

						<article id="post-<?php the_ID(); ?>" class="bot-mar-1em">
							<a href="<?php echo(types_render_field( 'pdf-document-of-job-posting', array( "output" => 'raw' ) ) ); ?>" target="blank"><?php echo(types_render_field( 'listing-name', array( ) ) ); ?> </a> -
							<span>
								<?php echo(types_render_field( 'location-of-job', array( ) ) ); ?>
							</span>
							<?php if(types_render_field('listings-notes')):?>
							<ul>
								<li><?php echo(types_render_field( 'listings-notes', array( 'separator' => '</li><li>' ) ) );?>
							</ul>
							<?php endif?>
						</article>

					<?php
						}
					} else {
						?>
							<div>
								<p>
									There are no job opportunities at this time. Check again soon, as new opportunities come up often. View our <a href="/getinvolved/volunteer-opportunities/">volunteer positions</a> for other ways of getting involved with Parkinson Canada.
								</p>
								
							</div> 
						
						<?php
					}

					// Restore original Post Data
					wp_reset_postdata();
					
					?>
					</div>
        </article>

      <?php endwhile; ?>

    </div>
      <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
