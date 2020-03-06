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
				
					<section><?php echo (types_render_field('office-introduction') ); ?></section>
				
					<section class="simple-flex flex-justify-between">
						<div id="left-contact">
							<p class="narrow-line-height">				
								<?php echo (types_render_field('street-address') ); ?>
							<br />
								<?php echo (types_render_field('office-city') ); ?>, 
								<?php echo (types_render_field('office_province') );?>,
								<?php echo (types_render_field('office_postal-code') );?>
							</p>
							<div class="red-field-labels bot-mar-1em">
								<?php $translation = __('Toll Free:', 'types-field-labels'); ?>
								<strong><?php echo $translation ?></strong> <?php echo (types_render_field('toll-free-number') );?>
								<br>
								<?php $translation = __('Local:', 'types-field-labels'); ?>
								<strong><?php echo $translation ?></strong> <?php echo (types_render_field('local-phone') );?>
								<br>
								<?php $translation = __('Email:', 'types-field-labels'); ?>
								<strong><?php echo $translation ?></strong> <a href="mailto:<?php echo (types_render_field('general-inquires-email') );?>"><?php echo (types_render_field('general-inquires-email') );?></a>
								<br>
								<?php $translation = __('Fax:', 'types-field-labels'); ?>
								<strong><?php echo $translation ?></strong> <?php echo (types_render_field('toll-free-fax-number') );?>
							</div>
							<p><?php echo (types_render_field('office-hours') );?></p>
						
							<?php $translation = __('See our', 'types-field-labels'); ?>
								<?php $translation_sub = __('staff directory', 'types-field-labels'); ?>
								<p><?php echo $translation ?> <a href="#staff-directory"><?php echo $translation_sub ?></a></p>
						</div><!-- end left contact -->

							<?php echo do_shortcode("[gmw_single_location elements='map' map_height='400px' map_width='400px']"); ?>

					</section>
					<!-- Translate - We offer you -->
					<?php $translation = __('We Offer You...', 'types-field-labels'); ?>
					<h4><?php echo $translation ?></h4>
					<p>
						<?php echo (types_render_field('we-offer-you') );?>
					</p>

					<!-- start Services and Events field group -->
					<?php $translation = __('Community Programs and News', 'types-field-labels'); ?>
						<h5><?php echo $translation ?></h5>
						<ul>
							<?php 
								$child_posts = toolset_get_related_posts( get_the_ID(),
								 'community-programs',
								  array( 
										'query_by_role' => 'parent',
										'args' => array(
											'meta_key' => 'toolset-post-sortorder',
											'meta_compare' => 'EXISTS'
										),
										'orderby' => 'meta_value_num',
										'order' => 'ASC',
										'return' => 'post_object' ) );
								foreach ($child_posts as $child_post) { ?>
								<li>
									<a target="blank" rel="noopener" href="<?php echo (types_render_field( 'program-news-url', array( "id"=> "$child_post->ID" ) ) );?>">
										<?php echo (types_render_field('program-or-news' , array( "id"=> "$child_post->ID" ) ) ); ?></a>
								</li>
								<?php } ?>
						</ul>
						<hr>

						<?php 
								$child_posts = toolset_get_related_posts( get_the_ID(),
								 'partner-recognition',
								  array( 
										'query_by_role' => 'parent',
										'args' => array(
											'meta_key' => 'toolset-post-sortorder',
											'meta_compare' => 'EXISTS'
										),
										'orderby' => 'meta_value_num',
										'order' => 'ASC',
										'return' => 'post_object' ) );
								foreach ($child_posts as $child_post) { ?>
							<section class="simple-grid sg-2col-75-15 bottom-margin-1 grid-gap-half-em">
								<div class="grid__item bottom-margin-0-child">
									<?php echo (types_render_field( 'partner-text-description', array( "id"=> "$child_post->ID" ) ) );?>
								</div>
								<div class="grid__item-align-rt">
									<a href="<?php echo (types_render_field( 'partner-website-url', array( "id"=> "$child_post->ID" ) ));?>" target="_blank" rel="noopener"><?php echo(types_render_field( 'partner-logo', array( "id"=> "$child_post->ID" ) )); ?></a>
								</div>
							</section>
							<?php } ?>
						<!-- start Staff Directory -->
						<?php $translation = __('Staff Directory', 'types-field-labels'); ?>
						<h4 id="staff-directory"><?php echo $translation ?></h4>
					<section class="staff-directory">
						<?php
							$child_posts = toolset_get_related_posts( get_the_ID(),
							 'staff-directory',
							  array( 
									'query_by_role' => 'parent',
									'args' => array(
										'meta_key' => 'toolset-post-sortorder',
										'meta_compare' => 'EXISTS'
									),
										'orderby' => 'meta_value_num',
										'order' => 'ASC',
									 	'return' => 'post_object' 
									 ) );
							foreach ($child_posts as $child_post) { ?>
							<!-- create if statement based on if image exists. It repeats the entire structure minus the image. -->
								<!-- <div class="simple-flex profile-staff"> -->
									<!-- <div class="profile-image-container"> -->
										<?php //types_render_field( "staff-image", array( "id"=> "$child_post->ID", "size" => "thumbnail" )); ?>
										<!-- </div> -->
							<div class="profile-staff"><!-- in the image conditional section, this class is replaced by profile-text-container -->
								<strong class="park-red-text"><?php  echo (types_render_field('staff_name' , array( "id"=> "$child_post->ID" ) ) ); ?></strong>&mdash;<?php  echo (types_render_field('staff-title', array( "id"=> "$child_post->ID" ) ) ); ?>
								<br>
								<?php if( types_render_field('ask-me-about', array( "id"=> "$child_post->ID" ) ) ): ?>
								<?php $translation = __('Ask me about...', 'types-field-labels'); ?>
										<strong><?php echo $translation ?></strong>
									<?php echo (types_render_field('ask-me-about', array( "id"=> "$child_post->ID" ) ) ); ?>
								<?php endif;?>
								<?php $translation = __('Contact me at:', 'types-field-labels'); ?>
								<strong><?php echo $translation ?> </strong><br>
								<?php $translation = __('Toll Free:', 'types-field-labels'); ?>
								<?php echo $translation ?> <?php echo (types_render_field('toll-free-number') );?><br>
								<?php $translation = __('Extension:', 'types-field-labels'); ?>
								<?php echo $translation ?> <?php echo (types_render_field('staff-extension', array( "id"=> "$child_post->ID" ) ) );?><br />
								<?php $translation = __('Local:', 'types-field-labels'); ?><?php echo $translation ?> <?php echo (types_render_field('local-phone') );?>
							<!-- </div> --><!-- simple-flex profile-staff---goes with conditional image structure -->
						</div><!-- profile-staff -->
						<?php } ?>
					</section><!-- staff directory -->
					
 				</div><!-- entry content -->
      </article>
  	</div><!-- x-main left -->
    <?php get_sidebar(); ?>
	</div><!-- x-container max width offset -->
<?php get_footer(); ?>
