<?php

/*
Template for single event CPT
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>   
        <div class="entry-content content">
					<h4 class="park-red-text"><?php the_title() ?></h4>
					<h5>Contact Information</h5>
						<!-- remember to add translation code -->
						<h6>Mailing Address</h6>
						<p class="narrow-line-height">
							<?php the_field('office_street_address')?><br>
							<?php the_field('office_city')?>, <?php the_field('office_province')?><br>
							<?php the_field('office_postal_code')?>
						</p>
						<!-- Main office Contact in a paragraph -->
						<?php get_template_part( 'template-parts/office-main-contact' ) ?>

							<p>* For other enquiries, see the <a href="#staff-directory">Staff Directory</a> below.</p>
						
						<h5>Directions and Hours</h5>

							<section class="simple-flex flex-justify-between">
								<div>
									<h6>Office Hours</h6>
									<div class="bot-mar-1em">
									<?php
										// check if the repeater field has rows of data
										if( have_rows('office_hours') ):
			
											// loop through the rows of data
									
											while ( have_rows('office_hours') ) : the_row();
			
												// display a sub field value
											?>
													<div><?php the_sub_field('weekday'); ?>:&nbsp;<?php the_sub_field('weekday_hour'); ?></div>
													<?php
											endwhile;
												
										else :
			
											// no rows found
			
										endif;
			
										?>
								</div><!-- office Hours(bot-mar-1em) -->
							</div><!-- side margin spacing -->
							<?php echo do_shortcode("[gmw_single_location elements='map' map_height='400px' map_width='400px']"); ?>
					</section><!-- endflex -->

					<h5>Office Details</h5>

					<?php $translation = __('Languages', 'types-field-labels'); ?>
            <h6><?php echo $translation ?></h6>
					<div>
	
						<?php
	
							// vars	
							$languages = get_field('office_languages');
	
							// check
							if( $languages ): ?>
							<ul class="simple-flex horizontal-list">
								<?php foreach( $languages as $language ): ?>
									<li><?php echo $language; ?></li>
								<?php endforeach; ?>
							</ul>
							<?php endif; ?>
					</div>

					<h6>Services Offered</h6>
					<?php

						// check if the repeater field has rows of data
						if( have_rows('office_services_offered') ):

							// loop through the rows of data
					?>
							<ul class="simple-flex horizontal-list">
					<?php
						while ( have_rows('office_services_offered') ) : the_row();
										// display a sub field value
					?>
								<?php 
									$link = get_sub_field('office_service_url');
									if ($link) :
								?>
										<li><a href="<?php the_sub_field('office_service_url')?>">
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

								// no rows found

						endif;

					?>

					<h6>Regions Served</h6>
					<?php

						// check if the repeater field has rows of data
						if( have_rows('office_regions_served') ):

							// loop through the rows of data
						?>
							<ul class="simple-flex horizontal-list">
						<?php
						while ( have_rows('office_regions_served') ) : the_row();
										// display a sub field value
						?>
								<?php 
									$link = get_sub_field('office_region_url');
									if ($link) :
								?>
										<li><a href="<?php the_sub_field('office_region_url')?>">
											<?php the_sub_field('office_region'); ?></a>
										</li>
								<?php else : ?>
									<li><?php the_sub_field('office_region'); ?></li>
								<?php endif;?>
						<?php
						endwhile;
						?>
							</ul>
						<?php

						else :

								// no rows found

						endif;

						?>	

					<h5 id="staff-directory">Staff Directory</h5>
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
												<?php $translation = __('Name', 'types-field-labels'); ?>
                				<strong><?php echo $translation ?> : </strong>
												<?php the_sub_field('staff_name');?><br>

												<?php $translation = __('Title', 'types-field-labels'); ?>
                				<strong><?php echo $translation ?> : </strong>
												<?php the_sub_field('staff_title');?><br>

												<?php $translation = __('Role Description', 'types-field-labels'); ?>
                				<strong><?php echo $translation ?> : </strong>
												<?php the_sub_field('staff_description_of_role');?><br>

												<?php $translation = __('Phone Extension', 'types-field-labels'); ?>
                				<strong><?php echo $translation ?> : </strong>
												<?php the_sub_field('office_phone_extension');?><br>

												<?php $translation = __('Email', 'types-field-labels'); ?>
                				<strong><?php echo $translation ?> : </strong>
												<a href="mailto:<?php the_sub_field('office_staff_email');?>"><?php the_sub_field('office_staff_email');?></a>
											</div>
										</div>
									<?php else: ?>
									<div class="profile-staff">
										<?php $translation = __('Name', 'types-field-labels'); ?>
                		<strong><?php echo $translation ?> : </strong>
										<?php the_sub_field('staff_name');?><br>

										<?php $translation = __('Title', 'types-field-labels'); ?>
                		<strong><?php echo $translation ?> : </strong>
										<?php the_sub_field('staff_title');?><br>

										<?php $translation = __('Role Description', 'types-field-labels'); ?>
                		<strong><?php echo $translation ?> : </strong>
										<?php the_sub_field('staff_description_of_role');?><br>


										<?php $translation = __('Phone Extension', 'types-field-labels'); ?>
                		<strong><?php echo $translation ?> : </strong>
										<?php the_sub_field('office_phone_extension');?><br>

										<?php $translation = __('Email', 'types-field-labels'); ?>
                		<strong><?php echo $translation ?> : </strong>
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











 				</div><!-- entry content -->
      </article>
    </div>
        <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
