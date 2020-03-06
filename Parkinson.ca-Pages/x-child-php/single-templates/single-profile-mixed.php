<?php

/*
Template for single profile CPT
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">
      <div class="research-container">
        <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <h3><?php the_title(); ?></h3>
                </div>
              </div>
              <?php
                $category = get_queried_object();

                $parent_id = $category->category_parent;

                if($parent_id = 'profile-research'):
              ?>
              <div class="row researcher-profile">
                <div class="col-sm-8 font-size-reset">
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
                    <?php echo(types_render_field( 'research-grant-amount', array( ) ) ); ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="profile-image">
                    <?php echo(types_render_field( 'researcher-image', array( 'class' => 'thin-border' ) ) ); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 font-size-reset">
                  <h6><?php echo(types_render_field( 'research-scientific-title', array( ) ) ); ?></h6>
                  <?php the_content(); ?>
                </div>
              </div>
            <?php else: ?>
            <!-- basic profile output -->
            <div class="alignright">
              <?php echo(types_render_field( 'profile-image', array( 'class' => 'thin-border' ) ) ); ?>
            </div>
              <?php the_content(); ?>
          <?php endif; ?>
        </div>
      </article>
        <?php endwhile; ?>
      </div>
    </div>
        <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
