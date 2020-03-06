<?php

/*
Template for single walk location

*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">
      <div class="profile-container">
        <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1 class="park-red-text"><?php the_title(); ?></h1>
            <div class="bot-mar-1em">
            <?php
              $locationCat = get_the_terms( get_the_ID(), 'category' );
              $catSlug = $locationCat[0]->slug;
            ?>
          <?php if($catSlug == 'british-columbia'): ?>
                <p class="font-size-reset">
                  Parkinson SuperWalk in British Columbia is operated by Parkinson Society British Columbia under license from Parkinson Canada. Click here to register and visit the <a href="http://events.parkinson.bc.ca/site/TR?pg=entry&fr_id=1090" target="_blank" rel="noopener">British Columbia website</a>.
                </p>
            </div>    
          <?php else: ?>
              <a class="x-btn" href="<?php echo(types_render_field( 'sw-link-to-listing', array( ) ) ); ?>">Register on <span style="text-decoration:underline;">www.superwalk.ca</span></a>
            </div>
          <?php endif; ?>
						<?php
              $location = get_the_terms( get_the_ID(), 'sw-locations' );
              $slug = $location[0]->name; 
            ?>
              

						<div class="font-size-reset">
              <?php if($slug == 'Volunteers Needed' ) : ?>
                <h6 class="bot-mar-1em">
									Volunteers needed for SuperWalk in <?php the_title(); ?>. Get Involved <a href="http://donate.parkinson.ca/site/PageNavigator/SuperWalk/Contact.html#Volunteer">here</a>.  
								</h6>
							<?php endif; ?>   
							<h6>When</h6>
							<?php echo(types_render_field( 'sw-when', array( ) ) ); ?>
							<h6>Where</h6>	
							<?php echo(types_render_field( 'sw-where', array( ) ) ); ?>
							<?php echo do_shortcode("[gmw_single_location elements='map' map_height='250px' map_width='300px']"); ?>


							<h6>Schedule</h6>
							<?php echo(types_render_field( 'sw-schedule', array( ) ) ); ?>
              <h6>Contact</h6>
							<?php echo(types_render_field( 'sw-contact', array( ) ) ); ?>
						</div>
      </article>
        <?php endwhile; ?>
      </div>
    </div>
        <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
