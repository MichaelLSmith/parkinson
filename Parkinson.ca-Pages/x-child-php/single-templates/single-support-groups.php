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

            <h3><?php the_title(); ?></h3>

            <div class="font-size-reset">
              <?php if( types_render_field( 'sg-emergency-announcement', array( ) ) ) :?>
                <h4><?php echo (types_render_field( 'sg-emergency-announcement', array( ) ) ); ?></h4>
              <?php endif; ?>

              <?php if( types_render_field( 'address', array( ) ) ) :?>
              <p>
                <?php $translation = __('Address', 'types-field-labels'); ?>
                <dl>
                  <dt><strong><?php echo $translation ?> : </strong></dt>
                  <dd class="reg-weight"><?php echo (types_render_field( 'address', array( ) ) ); ?></dd>
                </dl>
              </p>
              <?php endif ?>
              <?php if( types_render_field( 'date', array( ) ) ) :?>
              <p>
                <?php $translation = __('Date(s)', 'types-field-labels'); ?>
                <dl>
                  <dt><strong><?php echo $translation ?> : </strong></dt>
                  <dd class="reg-weight">
                    
                  <ul><li><?php echo (types_render_field( 'date', array( 'separator' => '</li><li>' , 'format'=> 'F d, Y' ) ) ); ?></li></ul></dd> 
                  <!--  -->
                </dl>
              </p>
              <?php endif ?>
              <?php if( types_render_field( 'start-time', array( ) ) ) :?>
              <p>
                <?php $translation = __('Start Time', 'types-field-labels'); ?>
                <strong><?php echo $translation ?> : </strong>
                  <span class="reg-weight"><?php echo (types_render_field( 'start-time', array( ) ) ); ?></span>
              </p>
              <?php endif ?>
              <?php if( types_render_field( 'end-time', array( ) ) ) :?>
              <p>
                <?php $translation = __('End Time', 'types-field-labels'); ?>
                <strong><?php echo $translation ?> : </strong>
                  <span class="reg-weight"><?php echo (types_render_field( 'end-time', array( ) ) ); ?></span>
              </p>
              <?php endif ?>
              <?php if( types_render_field( 'contact-name', array( ) ) ) :?>
              <p>
                <?php $translation = __('Contact Name', 'types-field-labels'); ?>
                <strong><?php echo $translation ?> : </strong>
                  <span class="reg-weight"><?php echo (types_render_field( 'contact-name', array( ) ) ); ?></span>
              </p>
              <?php endif ?>
              <?php if( types_render_field( 'contact-telephone', array( ) ) ) :?>
              <p>
                <?php $translation = __('Contact Telephone', 'types-field-labels'); ?>
                  <strong><?php echo $translation ?> : </strong>
                  <span class="reg-weight"><?php echo (types_render_field( 'contact-telephone', array( ) ) ); ?></span>
              </p>
              <?php endif ?>
              <?php if( types_render_field( 'contact-email', array( ) ) ) :?>
              <p>
                <?php $translation = __('Contact Email', 'types-field-labels'); ?>
                <strong><?php echo $translation ?> : </strong>
                  <span class="reg-weight"><?php echo (types_render_field( 'contact-email', array( ) ) ); ?></span>
              </p>
              <?php endif ?>
              <?php if( types_render_field( 'notes', array( ) ) ) :?>
              <p>
                <?php $translation = __('Notes', 'types-field-labels'); ?>
                <dl>
                  <dt><strong><?php echo $translation ?> : </strong></dt>
                  <dd class="reg-weight"><?php echo (types_render_field( 'notes', array( ) ) ); ?></dd>
                </dl>
              </p>
              <?php endif ?>
            </div>
          </article>
        </div>
      <?php endwhile; ?>
    </div>
      <?php get_sidebar(); ?>
  </div>
<?php get_footer(); ?>
