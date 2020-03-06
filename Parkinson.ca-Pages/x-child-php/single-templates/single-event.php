<?php

/*
Template for single event CPT
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- <div class="entry-wrap">
              <?php //x_get_view( 'renew', '_content', 'post-header' ); ?>
            </div> -->
            <?php if  ( has_term( 'no-title','post-template' ) ) : ?>
            <?php else : ?>
              <h1 class="event-title"><?php the_title() ?></h1>
            <?php endif;?>
            <?php do_action( 'x_after_the_content_begin' ); ?>
        <div class="entry-content content"><?php the_content(); ?>
          <?php
            //if any field is filled out it will render the Events Details heading
            if(types_render_field( 'event-date', array( ) ) || types_render_field( 'event-end-date', array( ) ) || types_render_field( 'time-of-event', array( ) ) || types_render_field( 'event-location', array( ) ) || types_render_field( 'event-contact-name', array( ) ) || types_render_field( 'event-phone-number', array( ) ) || types_render_field( 'event-contact-email', array( ) ) ) :
          ?>
            <section id="event-details" class="event-fields">
              <?php $translation = __('Event Details', 'types-field-labels'); ?>
              <h5><?php echo $translation ?></h5>
              <?php if( types_render_field( 'event-date', array( ) ) ) :?>
                <div>
                  <?php $translation = __('Date', 'types-field-labels'); ?>
                  <strong><?php echo $translation ?> : </strong>
                  <span class="reg-weight"><?php echo (types_render_field( 'event-date', array( 'format'=> 'F d, Y' ) ) ); ?></span>
                </div>
              <? endif ?>
              <?php if( types_render_field( 'time-of-event', array( ) ) ) :?>
                <div>
                  <?php $translation = __('Time', 'types-field-labels'); ?>
                  <strong><?php echo $translation ?> : </strong>
                  <span><?php echo(types_render_field( 'time-of-event', array( ) ) ); ?></span>
                </div>
              <? endif ?>
              <?php if( types_render_field( 'event-registration', array( ) ) ) :?>
                <div>
                  <?php $translation = __('Registration Details', 'types-field-labels'); ?>
                  <strong><?php echo $translation ?> : </strong>
                  <span><?php echo(types_render_field( 'event-registration', array( ) ) ); ?></span>
                </div>
              <? endif ?>
              <?php if( types_render_field( 'event-registration-url', array( ) ) ) :?>
                <div id="registration">
                  <?php $translation = __('Registration Link', 'types-field-labels'); ?>
                  <strong><?php echo $translation ?> : </strong>
                  <span><a href="<?php echo(types_render_field( 'event-registration-url', array( ) ) ); ?>" target="blank" rel="noopener">Register Here</a></span>
                </div>
              <? endif ?>
            <?php if( types_render_field( 'event-contact-name', array( ) ) ) :?>
              <div>
                <?php $translation = __('Contact Name', 'types-field-labels'); ?>
                <strong><?php echo $translation ?> : </strong>
                <span><?php echo(types_render_field( 'event-contact-name', array( ) ) ); ?></span>
              </div>
            <? endif ?>
            <?php if( types_render_field( 'event-phone-number', array( ) ) ) :?>
              <div>
                <?php $translation = __('Contact Telephone', 'types-field-labels'); ?>
                <strong><?php echo $translation ?> : </strong>
                <span><?php echo(types_render_field( 'event-phone-number', array( ) ) ); ?></span>
              </div>
            <? endif ?>
            <?php if( types_render_field( 'event-contact-email', array( ) ) ) :?>
              <div>
                <?php $translation = __('Contact Email', 'types-field-labels'); ?>
                <strong><?php echo $translation ?> : </strong>
                <span><?php echo(types_render_field( 'event-contact-email', array( ) ) ); ?></span>
              </div>
            <? endif ?>
            <?php if( types_render_field( 'event-location', array( ) ) ) :?>
              <div class="event-detail-indent">
                <?php $translation = __('Location', 'types-field-labels'); ?>
                <strong><?php echo $translation ?> : </strong>
                <?php echo(types_render_field( 'event-location', array( ) ) ); ?>
              </div>
            <? endif ?>
            </section>
          <? endif ?>
            </div><!-- entry content -->
          </article>
        <?php endwhile; ?>
    </div>
        <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
