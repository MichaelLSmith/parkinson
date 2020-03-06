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
					<div class="entry-content content">
						<?php the_content() ?>
						<hr class="darkHR">
						<?php $translation = __('General Contact Form', 'types-field-labels'); ?>
						<h4><?php echo $translation ?></h4>
						<?php $translation = __('If your request relates to a matter not specified in the list above, please complete and submit this general Contact Form.', 'types-field-labels'); ?>
						<p><?php echo $translation ?></p>
						<?php echo FrmFormsController::show_form(6, $key = '', $title=false, $description=false); ?>

						<hr class="darkHR">
						<?php $translation = __('Parkinson Canada Near Me', 'types-field-labels'); ?>
						<h4 id="local-offices"><?php echo $translation ?></h4>

						<?php 
							// WP_Query arguments
								$args = array(
									'post_type'             => array( 'local-offices' ),
									'posts_per_page'        => '50',
									'order'									=> 'ASC'
								);

								// The Query
								$query = new WP_Query( $args );
								// The Loop
								if ( $query->have_posts() ) {
									while ( $query->have_posts() ) {
										$query->the_post();
										?>
										<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											<div class="entry-content content">
												<?php 
													the_title( '<h6 class="park-red-text"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h6>' );
												?>
												<?php $translation_Office = __('Local Office', 'types-field-labels'); ?>
												<a class="park-btn" style="padding:0.2em;" href="<?php echo( esc_url( get_permalink() )) ?>"><?php echo $translation_Office?></a>
												<p>
													<?php echo (types_render_field('street-address') ); ?><br />
													<?php echo (types_render_field('office-city') ); ?>, <?php echo (types_render_field('office_province') ); ?><br>


													<?php echo (types_render_field('office_postal-code') ); ?><br>
													<?php global $post; $post_slug=$post->post_name; ?>
													<i class="fas fa-book-open park-red-text"></i> 
													<a href="/local-offices/<?php echo $post_slug;?>#staff-directory">
													<?php $translation = __('Staff Directory', 'types-field-labels'); ?>
													<?php echo $translation ?></a>
												</p>
											</div>
											<hr>
										</article>
								<?php	
								}
							} else {
								// no posts found
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
