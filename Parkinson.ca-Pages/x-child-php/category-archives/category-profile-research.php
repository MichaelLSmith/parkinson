<?php

/*
Archive template to display research profiles. Each year uses this template.
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">

      <?php if(ICL_LANGUAGE_CODE=='fr'): ?>
				<p>Téléchargez un PDF des <a href="/wp-content/uploads/bourses-pour-le-cycle-2019-2021.pdf" target="_blank" rel="noopener">Prix du Programme de recherche de Parkinson Canada</a> pour le cycle en cours.</p>
				<div style="margin-top:1.5em;"><a class="park-red-btn" href="/fr/research-fr/archives-de-projets-de-recherche/">Cycles de recherche passés</a></div>

      <?php else: ?>
      	Download a PDF of <a href="/wp-content/uploads/ResearchProgram_Awards_2019-2021_EN.pdf" target="_blank" rel="noopener">Parkinson Canada Research Program Awards</a> for the current cycle.
				<div style="margin-top:1.5em;"><a class="park-red-btn" href="/research/research-archives/">Other research cycles</a></div>
			<?php endif; ?>
			

      <div class="research-container">
        <hr>
        <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="font-size-reset">
							<h5 class="custom-field-name">
								<?php $translation = __('Research Area', 'types-field-labels'); ?>
								<strong><?php echo $translation ?>: </strong>
								<span class="reg-weight"><?php echo (types_render_field( 'research-area', array( ) ) ); ?></span>
							</h5>
						<div class="researcher-profile">
							<div class="font-size-reset">
								<a href="<?php the_permalink(); ?>"
									title="<?php echo esc_attr( sprintf( __( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?>
								</a>
									<div>
										<?php echo(types_render_field( 'name-of-researcher', array( ) ) ); ?>
									</div>
									<?php if(types_render_field('researcher-position')): ?>
									<div>
										<?php echo(types_render_field( 'researcher-position', array( ) ) ); ?>
									</div>
									<?php endif ?>
									<div>
										<?php echo(types_render_field( 'organization-name', array( ) ) ); ?>
									</div>
									<div>
										<?php echo(types_render_field( 'research-grant-name', array( ) ) ); ?>
									</div>
									<div>
										<?php echo(types_render_field( 'research-award-type', array( ) ) ); ?>
									</div>
									<div>
										<?php echo(types_render_field( 'research-grant-amount', array( ) ) ); ?>
									</div>
                  </div>
										<div class="profile-image">
											<a href="<?php the_permalink(); ?>"><?php echo(types_render_field( 'researcher-image', array( ) ) ); ?></a>
										</div>
                </div>
            <div class="font-size-reset">
              <?php echo(types_render_field( 'research-short-description', array( ) ) ); ?>
            </div>
          </div>
          </article>
            <hr class="hr-visible" />
        <?php endwhile; ?>
      </div>
    </div>
      <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
