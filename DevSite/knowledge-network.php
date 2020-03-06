<?php

/*
Template Name: Knowledge Network
Template for Knowledge Network featuring podcast and webinar highlight at top.
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">   

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<div class="entry-wrap">
					<div class="entry-content">
						<div style="margin-bottom:1em">
							<?php the_field('kn_intro_paragraph'); ?>
						</div>
						
		
						<div class="grid bottom-margin-equal-paras">
							<div class="grid__item">
								<h5 class="park-text-center">Latest Webinar</h5>
								<?php 
									// vars
									//$webinar = get_field('kn_latest_webinar');
								?>

								<a class="blue-background-knowledge a-no-underline" href="<?php the_field('kn_view_or_register_link_2'); ?>" target="blank" rel="noopener">
									<div class="para-margin-reset">
										<p><?php the_field('kn_webinar_name_2'); ?></p>
										<p><?php the_field('kn_webinar_date_2'); ?></p>
										<?php if( get_field('kn_webinar_presenter_3') ): ?>
											<p>Presented by: <br>
												<?php the_field('kn_webinar_presenter_3'); ?>

											</p>
										<?php endif; ?>
										
									<?php if( get_field('kn_view_or_register_question_2') == 'Register' ) : ?>
										<p><strong style="text-decoration: underline;">Register here</strong></p>
									<?php else: ?>
										<p><strong style="text-decoration: underline;">View on Youtube</strong></p>
									<?php endif; ?>
									</div>
								</a>
							</div>
							<div class="grid__item">
								<h5 class="park-text-center">Latest Podcast</h5>
									<?php //$podcast = get_field('kn_latest_podcast');
									?>
										<a class="red-background-knowledge a-no-underline" href="<?php the_field('kn_podcast_link_2');?>" target="blank" rel="noopener">
											<div class="para-margin-reset">
											<p><?php the_field('kn_podcast_name_2'); ?></p>
											<p><?php the_field('kn_podcast_date_2'); ?></p>
											<p>
												Presenter:<br>
												<?php the_field('kn_podcast_presenter_2'); ?>
											</p>
												<p><strong style="text-decoration: underline;">Listen here</strong></p>
											</div>
										</a>	
							</div>
						</div><!-- Grid -->
						<div id="knowledge-network-body">
							<?php the_field('kn_rest_of_page'); ?>
						</div>
					</div><!-- Entry Content -->
				</div><!-- Entry Wrap -->

      </article>

    </div>
      <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
