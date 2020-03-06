<?php

/*
Template Name: Knowledge Network
Template for custom contact us page including local offices post type
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">   

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<div class="entry-wrap">
					<div class="entry-content">
						<div style="margin-bottom:1em">
							<?php echo(types_render_field( 'knt-intro-paragraph', array( ) ) ); ?>
						</div>
				
							<div style="width:50%;margin: 0 auto 1.5em auto;">
								<h5 class="park-text-center">Latest Webinar</h5>
								<?php// echo(types_render_field( 'knt-view-or-register', array( 'output'=> 'raw' ) ) ); ?>
								<?php if ( types_render_field( 'knt-view-or-register', array('output' => 'raw') ) == 'Register Month' ) : ?>

									<div class="blue-background-knowledge">
										<div class="para-margin-reset">
												<p>
													<?php echo(types_render_field( 'knt-webinar-name', array( 'output'=> 'raw' ) ) ); ?><br/>				
												</p>
													<p>
														<?php echo(types_render_field( 'knt-webinar-date', array( 'output'=> 'raw' ) ) ); ?>
													</p>

												<p>
													<?php if(types_render_field('knt-webinar-presenter', array( ) ) ): ?>
														Presented by: <br>
															<?php echo(types_render_field( 'knt-webinar-presenter', array( 'output'=> 'raw' ) ) ); ?>
													<?php endif; ?>
												</p>
												
											<p><strong>Registration available one month <br /> before the webinar</strong></p>
											</div>
									</div>

								<?php else : ?>

									<a class="blue-background-knowledge a-no-underline" style="--color:white;" href="<?php echo(types_render_field( 'knt-view-or-register-link', array( ) ) ); ?>" target="blank" rel="noopener">
										<div class="para-margin-reset">
											<p>
												<?php echo(types_render_field( 'knt-webinar-name', array( 'output'=> 'raw' ) ) ); ?><br/>				
												<?php echo(types_render_field( 'knt-webinar-date', array( 'output'=> 'raw' ) ) ); ?>
											</p>
											<p>
												<?php if(types_render_field('knt-webinar-presenter', array( ) ) ): ?>
													Presented by: <br>
														<?php echo(types_render_field( 'knt-webinar-presenter', array( 'output'=> 'raw' ) ) ); ?>
												<?php endif; ?>
											</p>
										<p>
											<?php if( types_render_field( 'knt-view-or-register', array( "output" => 'raw' ) ) == 'Register Now' ) : ?>
												<strong style="text-decoration: underline;">Register here</strong>
											<?php else: ?>
												<strong style="text-decoration: underline;">View on Youtube</strong>
											<?php endif; ?>
										</p>
										</div>
									</a>

								<?php endif; ?>

						</div><!-- Grid -->

						<div id="knowledge-network-body">
							<section class="simple-grid sg-2col-15-75 narrow-line-height bottom-margin-1">
								<div class="grid__item-span-2col-mobile black-border-no-bottom">
								<h6 style="font-size: 1.4em; text-align: center;margin:0;"><?php echo(types_render_field( 'knt-event-table-title', array( ) ) ); ?></h6>
									
								</div>
						<?php 
								$child_posts = toolset_get_related_posts( get_the_ID(),
								 'knt-webinar-table',
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
									<div class="grid__item park-text-center black-border-no-bottom padding-half-em vert-align-center">
										<strong class="park-red-text"><?php echo(types_render_field( 'knt-event-date', array('output'=> 'raw', "id"=> "$child_post->ID"  ) ) );?></strong>
										<?php if ( types_render_field( 'event-sponsor', array( "id"=> "$child_post->ID" ) ) ): ?>
											<div style="font-size: small; max-width: 85%;margin:auto">
												<?php echo (types_render_field( 'event-sponsor', array('output'=> 'raw', "id"=> "$child_post->ID" ) ) );?>
											</div>
											<a href="<?php echo (types_render_field( 'knt-sponsor-url', array( "id"=> "$child_post->ID" ) ) );?>" target="_blank" rel="noopener">
												<img src="<?php echo (types_render_field( 'knt-sponsor-logo', array( "id"=> "$child_post->ID","output" => 'raw' ) ) );?>" style="max-width: 150px" alt="company logo">
											</a>
										<?php endif; ?>
									</div>
									<div class="grid__item black-border-no-bottom black-border-no-left padding-half-em vert-align-center">
										<span class="park-red-text test-class"><?php echo (types_render_field( 'knt-event-title', array( 'output'=> 'raw', "id"=> "$child_post->ID" ) ) );?></span><br>
										<span id="details"><?php echo (types_render_field( 'knt-event-details', array( 'output'=> 'raw', "id"=> "$child_post->ID" ) ) );?></span>
									<?php if (types_render_field( 'knt-event-link' , array( "id"=> "$child_post->ID") ) ): ?>
										<div id="registration-link">
											<a href="<?php echo (types_render_field( 'knt-event-link', array( 'output'=> 'raw', "id"=> "$child_post->ID" ) ) );?>" target="_blank" rel="noopener">	<?php echo (types_render_field( 'knt-event-link-description', array( 'output'=> 'raw', "id"=> "$child_post->ID" ) ) );?></a>
										</div>
										<?php else: ?>
										<div>
											<?php echo (types_render_field( 'knt-event-link-description', array( 'output'=> 'raw', "id"=> "$child_post->ID" ) ) );?>
										</div>
										
										<?php endif; ?>
									</div>
								
								<?php } ?>
								</section><!--2-col-even-->

								<?php echo(types_render_field( 'knt-rest-of-page', array( 'output'=> 'raw' ) ) ); ?>
						</div>
					</div><!-- Entry Content -->
				</div><!-- Entry Wrap -->

      </article>

    </div>
      <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
