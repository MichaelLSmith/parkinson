<?php

/*
Template for single profile CPT
Contains code for:
  1. Researcher Profiles - testing changing from bootstrap column to flexing img
  2. Hope on Display Profiles
  3. General profiles -- with a simple image floated to the right of a text block.
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">
      <div class="profile-container">
        <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php
              $category = get_the_category();
              $parent_slug = $category[1]->slug;
                
              if($parent_slug == 'profile-research' || $parent_slug == 'profile-expert-fr' ) : ?>
                <div class="research-container">
                  <h3><?php the_title(); ?></h3>
                  <div class="researcher-profile">
                    <div class="font-size-reset">
                      <div>
                        <?php echo(types_render_field( 'name-of-researcher', array( ) ) ); ?>
                      </div>
                      <div>
                        <?php echo(types_render_field( 'researcher-position', array( ) ) ); ?>
                      </div>
                      <div>
                        <?php echo(types_render_field( 'organization-name', array( ) ) ); ?>
                      </div>
                      <div>
                        <?php echo(types_render_field( 'research-award-type', array( ) ) ); ?>
                      </div>
                      <div>
                        <?php echo(types_render_field( 'research-grant-name', array( ) ) ); ?>
                      </div>
                      <div>
                        <?php echo(types_render_field( 'research-grant-amount', array( ) ) ); ?>
                      </div>
                    </div>
                    <div class="profile-image">
                      <?php echo(types_render_field( 'researcher-image', array( 'class' => 'thin-border' ) ) ); ?>
                    </div>
                  </div>
                    <div class="font-size-reset">
                      <h6><?php echo(types_render_field( 'research-scientific-title', array( ) ) ); ?></h6>
                      <?php the_content(); ?>
                    </div>
                </div><!-- container-fluid -->
            <?php 
              elseif( $category[1]->slug = 'hope-on-display	' ): 
                get_template_part( 'template-parts/hope-on-display' );
            ?>

            <?php else: ?>
            <!-- basic profile output -->
            <div class="alignright">
              <?php echo(types_render_field( 'profile-image', array( 'class' => 'thin-border' ) ) ); ?>
            </div>
              <div class="font-size-reset"><?php the_content(); ?></div>
          <?php endif; ?>
      </article>
        <?php endwhile; ?>
      </div>
    </div>
        <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
