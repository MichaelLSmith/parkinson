<?php

/*
Template for single event CPT
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>   
        <div class="entry-content content">

					<h3 class="park-red-text"><?php the_title() ?></h3>
					
					<?php if( the_field('office_sub_title') ): ?>
						<h6><?php the_field('office_sub_title');?></h6>
					<?php endif; ?>
					<?php $translation = __('Contact Information', 'types-field-labels'); ?>
					<h4><?php echo $translation ?></h4>
					<!-- remember to add translation code -->
					<section class="simple-flex flex-justify-between">
						<div id="left-contact">
						<?php $translation = __('Mailing Address', 'types-field-labels'); ?>
							<h6><?php echo $translation ?></h6>
							<p class="narrow-line-height">
								<?php the_field('office_street_address')?><br>
								<?php the_field('office_city')?>, <?php the_field('office_province')?>, <?php the_field('office_postal_code')?>
							</p>
							<div class="red-field-labels bot-mar-1em">
								<!-- fix ":" must have space in French, no space in English -->
								<?php $translation = __('Toll Free:', 'types-field-labels'); ?>
								<strong><?php echo $translation ?></strong> <?php the_field('toll_free_number', 3565)?>
								<br>
								<?php $translation = __('Local:', 'types-field-labels'); ?>
								<strong><?php echo $translation ?></strong> <?php the_field('office_local_phone_number') ?>
								<br>
								<?php $translation = __('Email:', 'types-field-labels'); ?>
								<strong><?php echo $translation ?></strong> <?php the_field('general_inquiries_email', 3565) ?>
								<br>
								<?php $translation = __('Fax Number:', 'types-field-labels'); ?>
								<strong><?php echo $translation ?></strong> <?php the_field('toll_free_fax_number', 3565)?>
							</div>
							<p><?php the_field('office_hours') ?></p>
							<?php if(have_rows('office_staff_directory')): ?>
							<?php $translation = __('See our', 'types-field-labels'); ?>
								<?php $translation_sub = __('staff directory', 'types-field-labels'); ?>
								<p><?php echo $translation ?> <a href="#staff-directory"><?php echo $translation_sub ?></a></p>
							<?php endif; ?>
						</div>

							<?php echo do_shortcode("[gmw_single_location elements='map' map_height='400px' map_width='400px']"); ?>

					</section>
					<h5>We Offer You...</h5>
					<?php the_field('office_we_offer_you') ?>
					<?php if( have_rows('office_services_offered') || have_rows('office_staff_directory') ): ?>
					<?php $translation = __('Community Programs and News', 'types-field-labels'); ?>
						<h4><?php echo $translation ?></h4>
						<?php
							// check if the repeater field has rows of data
							if( have_rows('office_services_offered') ):
								// loop through the rows of data
						?>
								<ul>
						<?php
							while ( have_rows('office_services_offered') ) : the_row();
											// display a sub field value
						?>
									<?php 
										$link = get_sub_field('office_service_url');
										if ($link) :
									?>
											<li><a target="blank" rel="noopener" href="<?php the_sub_field('office_service_url')?>">
												<?php the_sub_field('office_service'); ?></a>
											</li>
									<?php else : ?>
										<li><?php the_sub_field('office_service'); ?></li>
									<?php endif;?>
						<?php
							endwhile;
						?>
								</ul>
						<?php
							else :
									//add link to all support groups in Canada
									// no rows found
							endif;
						?>
						<?php $translation = __('Staff Directory', 'types-field-labels'); ?>



						<!-- Staff Directory Start -->

						
						<h4 id="staff-directory"><?php echo $translation ?></h4>
						
						<?php

							// check if the repeater field has rows of data
							if( have_rows('office_staff_directory') ): 

								// loop through the rows of data
								?>
								<div class="staff-directory">
								<?php	while ( have_rows('office_staff_directory') ) : the_row();
								?>
								
									<?php 
										//ACF field returning image id
										$image = get_sub_field('office_staff_image');
										$size = 'thumbnail';

										if( $image ) :
									?>
											<!-- make the image conditional on if there is an image or not -->
											<div class="simple-flex profile-staff">
												<div class="profile-image-container"><?php echo wp_get_attachment_image( $image, $size ); ?></div>
												<div class="profile-text-container">
													<strong class="park-red-text"><?php the_sub_field('staff_name');?></strong>
												&mdash;<?php the_sub_field('staff_title');?>
												<br>
													<?php $translation = __('Ask me about', 'types-field-labels'); ?>
													<strong><?php echo $translation ?>...</strong>
													
													<?php the_sub_field('staff_ask_me_about');?><br>

													<?php $translation = __('Contact me at:', 'types-field-labels'); ?>
													<strong><?php echo $translation ?> </strong><br>
													<?php $translation = __('Toll Free:', 'types-field-labels'); ?>
													<?php echo $translation ?> <?php the_field('toll_free_number', 3565)?><br>
													<?php $translation = __('Extension:', 'types-field-labels'); ?>
													<?php echo $translation ?> <?php the_sub_field('office_phone_extension');?><br>
													<?php $translation = __('Local:', 'types-field-labels'); ?>
													<?php echo $translation ?> <?php the_field('office_local_phone_number')?><br>

													<!-- <a href="mailto:<?php //the_sub_field('office_staff_email');?>"><?php //the_sub_field('office_staff_email');?></a> -->
												</div>
											</div>
										<?php else: ?>
										<div class="profile-staff">
										<strong class="park-red-text"><?php the_sub_field('staff_name');?></strong>
										&mdash;<?php the_sub_field('staff_title');?>
												<br>
												<?php if(get_sub_field('ask_me_about')): ?>
													<?php $translation = __('Ask me about', 'types-field-labels'); ?>
													<strong><?php echo $translation ?>...</strong>
													<?php the_sub_field('ask_me_about');?>
												<?php endif; ?> 
												
												<?php $translation = __('Contact me at:', 'types-field-labels'); ?>
													<strong><?php echo $translation ?> </strong><br>
													<?php $translation = __('Toll Free:', 'types-field-labels'); ?>
													<?php echo $translation ?> <?php the_field('toll_free_number', 3565)?><br>
													<?php $translation = __('Extension:', 'types-field-labels'); ?>
													<?php echo $translation ?> <?php the_sub_field('office_phone_extension');?><br>
													<?php $translation = __('Local:', 'types-field-labels'); ?>
													<?php echo $translation ?> <?php the_field('office_local_phone_number')?><br>

													<a href="mailto:<?php the_sub_field('office_staff_email');?>"><?php the_sub_field('office_staff_email');?></a>
										</div>
										<?php endif; ?>		
								<?php endwhile; ?>
								</div>
						<?php
							else :
									// no rows found
							endif;
						?>
					<?php endif; ?>
 				</div><!-- entry content -->
      </article>
    </div>
        <?php get_sidebar(); ?>
  </div>
<?php get_footer(); ?>
