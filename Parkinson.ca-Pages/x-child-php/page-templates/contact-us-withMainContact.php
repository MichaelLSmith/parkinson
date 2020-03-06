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
						<h4 id="local-offices" style="margin-bottom:-45px;"><?php echo $translation ?></h4>

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
													the_title( '<h5 class="park-red-text"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
												 
												?>
												<?php $translation = __('Mailing Address', 'types-field-labels'); ?>
												<h5><?php echo $translation ?></h5>
												
												<p>
													<?php the_field('office_street_address')?><br>
													<?php the_field('office_city')?>, <?php the_field('office_province')?><br>
													<?php the_field('office_postal_code')?>
												</p>
												<?php $translation = __('Main Contact', 'types-field-labels'); ?>									
												<h6><?php echo $translation ?></h6>
												
												<?php if(get_field('office_main_contact_name')): ?>
													<div>
														<strong class="park-red-text"><?php the_field('office_main_contact_name')?></strong>&mdash;<?php the_field('office_main_contact_title')?>
													</div>
												<?php endif;?>
												<div class="indent-content">
												<?php $translation = __('Local Phone:', 'types-field-labels'); ?>
													<strong><?php echo $translation ?></strong> <?php the_field('office_local_phone_number')?>
													<br>
													<?php $translation = __('Toll Free:', 'types-field-labels'); ?>
													<strong><?php echo $translation ?></strong> <?php the_field('toll_free_number', 3565)?>
													<?php if( get_field('office_phone_extension') ): ?>
														ext: <?php the_field('office_phone_extension')?>
													<? endif ?>
													<br>
													<?php $translation = __('Email:', 'types-field-labels'); ?>
													<?php if(get_field('office_contact_email')): ?>
														<strong><?php echo $translation ?></strong> <a href="mailto:<?php the_field('office_contact_email')?>"><?php the_field('office_contact_email')?></a><br>
													<?php else: ?>
														<strong><?php echo $translation ?></strong> <a href="mailto:<?php the_field('general_inquiries_email', 3565)?>"><?php the_field('general_inquiries_email', 3565)?></a><br>
													<?php endif;?>
													<?php $translation = __('Fax Number:', 'types-field-labels'); ?>
													<strong><?php echo $translation ?></strong> <?php the_field('toll_free_fax_number', 3565)?>
												</div>
											</div>
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
