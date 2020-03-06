<?php

// =============================================================================
// VIEWS/RENEW/WP-FOOTER.PHP
// -----------------------------------------------------------------------------
// Footer output for Renew.
// =============================================================================

?>

  <?php x_get_view( 'global', '_footer', 'widget-areas' ); ?>

  <?php if ( x_get_option( 'x_footer_bottom_display' ) == '1' ) : ?>

      <!-- LuminateExtend for Survey Submission -->
      <script src="//cdnjs.cloudflare.com/ajax/libs/luminateExtend/1.8.1/luminateExtend.min.js"></script>

      <div id="survey-footer" >
        <img src="/wp-content/uploads/survey-footer-image.jpg" alt="" class="survey-footer-mobile-img">
        <div class="survey-footer-container">

          <div class="x-container max width">
            <div class="survey-padding">
              <div class="col-xs-12 col-md-6">
                <div class="row">
                  <?php dynamic_sidebar('footer-signup-1');?>
                </div>
                <div class="row">
                  <div id="cd-survey-submit">
                    <div class="lb_container">
                      <div class="lb_form_master_container">
                        <div class="lb_form_container">
                          <form class="lb_form form-horizontal luminateApi survey-form" method="POST" action="http://rcf.convio.net/site/CRSurveyAPI" data-luminateApi='{"callback": "submitSurveyCallback", "requiresAuth": "true"}'>
                            <input type="hidden" name="method" value="submitSurvey">
                            <input type="hidden" name="survey_id" value="4002">
                            <div class="col-xs-12 col-md-2">
                              <div class="lb_form_group">
                                <label for="survey-cons-first-name" class="col-sm-3 col-md-2 control-label">First Name</label>
                                <input type="text" name="cons_first_name" class="form-control" id="survey-cons-first-name">
                              </div>
                            </div><!--
                            --><div class="col-xs-12 col-md-2">
                              <div class="lb_form_group">
                                <label for="survey-cons-last-name" class="col-sm-3 col-md-2 control-label">Last Name</label>
                                <input type="text" name="cons_last_name" class="form-control" id="survey-cons-last-name">
                              </div>
                            </div><!--
                            --><div class="col-xs-12 col-md-3">
                              <div class="lb_form_group">
                                <label for="survey-cons-email" class="col-sm-3 col-md-2 control-label">Email Address</label>
                                <input type="text" name="cons_email" class="form-control" id="survey-cons-email">
                              </div>
                            </div><!--
                            --><div class="col-xs-12 col-md-2">
                              <div class="lb_form_group">
                                <label for="survey-cons-zip-code" class="col-sm-3 col-md-2 control-label">Postal Code</label>
                                <input type="text" name="cons_zip_code" class="form-control" id="survey-cons-email">
                              </div>
                            </div><!--
                            --><input type="hidden" name="cons_email_opt_in" value="true"><!--
                            --><div class="col-xs-12 col-md-3">
                              <div class="lb_form_group">
                                <button type="submit" class="lb_button">Sign Up</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <?php if ( x_get_option( 'x_footer_social_display' ) == '1' ) : ?>
                    <?php x_social_global(); ?>
                  <?php endif; ?>
                </div>
              </div>

              <div class="col-xs-12 col-md-5 col-md-offset-1">
                <?php dynamic_sidebar('footer-signup-2');?>
                <!-- <h2>Committed to Canada</h2>
                <p>Since 1965, Parkinson Canada has worked to provide support services and education to people living with Parkinson’s disease, their families, and the health care professionals who treat them. We advocate on issues that affect the Parkinson’s community in Canada, and we aggressively fund  innovative research for better treatments and a cure.</p>
                <p>Parkinson Canada is a national registered charity accredited under the Imagine Canada Standards Program. We achieve our mission through the support of people like you.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Luminate API Examples - Using Survey Form -->
      <script>
      (function($) {
        /* define init variables for your organization */
        luminateExtend({
          apiKey: 'PSCAPI',
          path: {
            nonsecure: 'http://psc.convio.net/site/',
            secure: 'https://secure2.convio.net/psc/site/'
          }
        });

        $(function() {

          /* UI handlers for the Survey example */
          if($('.survey-form').length > 0) {
            $('.survey-form').submit(function() {
              // window.scrollTo(0, 0);
              $(this).hide();
              $(this).before('<div class="well survey-loading">' +
                               'Loading ...' +
                             '</div>');
            });
          }

          /* example: handle the Survey form submission */
          /* if the Survey is submitted succesfully, display a thank you message */
          /* if there is an error, display it inline */
          window.submitSurveyCallback = {
            error: function(data) {
              $('html body').animate({
                  scrollTop: $(".survey-padding").offset().top
              }, -1000);
              $('#survey-errors').remove();
              $('.survey-form .form-group .alert').remove();

              $('.survey-form').prepend('<div id="survey-errors">' +
                                            '<div class="alert alert-danger">' +
                                              data.errorResponse.message +
                                            '</div>' +
                                          '</div>');

              $('.survey-loading').remove();
              $('.survey-form').show();
            },
            success: function(data) {
              $('#survey-errors').remove();
              $('.survey-form .form-group .survey-alert-wrap').remove();

              if(data.submitSurveyResponse.success == 'false') {
                // $('body').animate({
                //     scrollTop: $(".survey-padding").offset().top
                // }, -1000);
                // console.log('scroll ran on error');
                $('.survey-form').prepend('<div id="survey-errors">' +
                                            '<div class="alert alert-danger">' +
                                              'There was an error with your submission. Please try again.' +
                                            '</div>' +
                                          '</div>');

                var surveyErrors = luminateExtend.utils.ensureArray(data.submitSurveyResponse.errors);
                $.each(surveyErrors, function() {
                  if(this.errorField) {
                    $('input[name="' + this.errorField + '"]').closest('.form-group')
                                                              .prepend('<div class="col-sm-12 survey-alert-wrap">' +
                                                                         '<div class="alert alert-danger">' +
                                                                           this.errorMessage +
                                                                         '</div>' +
                                                                       '</div>');
                  }
                });

                $('.survey-loading').remove();
                $('.survey-form').show();
              }
              else {
                $('.survey-loading').remove();
                $('.lb_img').hide();
                $('.lb_img.thanks').show();
                // $('.lb_form_master_container').remove();
                // jQuery('.fancybox-inner').attr('style', 'height: 325px !important;');
                $('.survey-form').before('<div class="alert alert-success">' +
                                             'Thanks! You are successfully subscribed' +
                                           '</div>');
                // $('html body').animate({
                //   scrollTop: $(".survey-padding").offset().top
                // }, -1000);
                // console.log('scroll ran on success');
                if (window.location.href.search('/fr/') > -1) {
                  window.location.href = "http://donate.parkinson.ca/site/Survey?ACTION_REQUIRED=URI_ACTION_USER_REQUESTS&SURVEY_ID=4003&s_locale=fr_CA";
                } else {
                  window.location.href = "http://donate.parkinson.ca/site/Survey?ACTION_REQUIRED=URI_ACTION_USER_REQUESTS&SURVEY_ID=4003";
                }

              }
            }
          };

          /* bind any forms with the "luminateApi" class */
          luminateExtend.api.bind();
        });
      })(jQuery);
    </script>

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