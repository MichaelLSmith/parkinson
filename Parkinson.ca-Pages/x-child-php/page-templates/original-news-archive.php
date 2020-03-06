<?php

/*
Template Name: Manitoba Newsletter Archive
Template for Template for Manitoba Newsletter Archive page with wp-query for item-archive (CPT) - Newsletter - Manitoba category
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">
			
			<?php while ( have_posts() ) : the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content content">
					<section class="grid">

				<?php
				// WP_Query arguments
				$args = array(
					'post_type'              => array( 'item-archive' ),
					'tax_query'              => array(
						array(
							'taxonomy'         => 'category',
							'terms'            => 'newsletter-manitoba',
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

						<article id="post-<?php the_ID(); ?>" class="grid__item">
							<a href="<?php echo(types_render_field( 'pdf-of-issue', array( "output" => 'raw' ) ) ); ?>">
								<span><?php echo(types_render_field( 'month-of-issue', array( ) ) ); ?></span>
								<span><?php echo(types_render_field( 'year-of-issue', array( ) ) ); ?></span>
							</a>
						</article>
					<?php
						}
					} else {
						?>
							<div>
								There are no newsletter archives at this time. Please check again later.
							</div> 
						
						<?php
					}

					// Restore original Post Data
					wp_reset_postdata();
					
					?>
					</div>
        </article>

			<?php endwhile; ?>
			</section>

    </div>
      <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
