<?php

// =============================================================================
// VIEWS/RENEW/WP-FOOTER.PHP
// -----------------------------------------------------------------------------
// Footer output for Renew.
// =============================================================================

?>

  <?php x_get_view( 'global', '_footer', 'widget-areas' ); ?>

  <?php if ( x_get_option( 'x_footer_bottom_display' ) == '1' ) : ?>

      <div id="survey-footer">
        <div class="survey-footer-container">
          <div class="x-container max width">
            <div class="survey-padding">
              <?php dynamic_sidebar('footer-signup-1');?>
                <!-- Survey Start -->
                <?php echo do_shortcode('[wplosurvey_insert_post ids=20675]'); ?>
                <!-- Survey End -->
            </div>
          </div>
        </div>
      </div>
      
    <footer class="x-colophon bottom" role="contentinfo">
      <div class="x-container max width">

        <div class="row">
          <div class="footer-logo col-xs-12 col-md-5">
            <img src="/wp-content/uploads/parkinson-cananda-logo-footer.png" alt="">
          </div>
          <div class="col-xs-12 col-md-7">
            <?php if ( x_get_option( 'x_footer_menu_display' ) == '1' ) : ?>
              <?php x_get_view( 'global', '_nav', 'footer' ); ?>
            <?php endif; ?>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-md-7 col-md-push-5">
            <div class="footer-block-1 col-xs-12 col-md-3">
              <div class="row">
              
                <!-- WIDGET AREA 1 -->
                <?php dynamic_sidebar('footer-block-1');?>
              </div>
            </div>
            <div class="col-xs-12 col-md-3 col-md-offset-1">
              <div class="row">
                <!-- WIDGET AREA 2 -->
                <?php dynamic_sidebar('footer-block-2');?>
              </div>
            </div>
            <div class="col-xs-12 col-md-4 col-md-offset-1">
              <div class="row">
                <!-- ACCREDITATION -->
                <?php if(ICL_LANGUAGE_CODE=='fr'): ?>
                  <img src="/wp-content/uploads/Imagine_Canada-FR-White-240.png" alt="">
                <?php else: ?>
                  <img src="/wp-content/uploads/imagine-canada-footer-300x300.png" alt="">
                <?php endif;?>
              </div>
            </div>
          </div>
          <div class="boilerplate col-xs-12 col-md-5 col-md-pull-7">
            <!-- <div class="row"> -->
              <?php if ( x_get_option( 'x_footer_social_display' ) == '1' ) : ?>
                <?php x_social_global(); ?>
              <?php endif; ?>
                <!-- </div> -->
            <?php if ( x_get_option( 'x_footer_content_display' ) == '1' ) : ?>
              <div class="x-colophon-content">
                <?php echo do_shortcode( x_get_option( 'x_footer_content' ) ); ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </footer>

  <?php endif; ?>

<?php x_get_view( 'global', '_footer' ); ?>