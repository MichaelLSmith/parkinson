<?php namespace Fp\Fabric; ?>
<section class="impact impact--home py-5">
	<div class="container">
		<h2><?php _e('Did You Know?', 'parkinson')?></h2>
		<?php if(have_rows('infographics')): ?>
			<div class="row py-5">
				<?php while(have_rows('infographics')): ?>
					<?php the_row(); ?>
					<div class="col-md-3">
						<div class="infographic">
							<img class="infographic__image" src="<?php echo fabric()->asset_uri('img/svgs/' . get_sub_field('icon') . '.svg'); ?>" alt="" />
							<p class="infographic__label">
								<?php the_sub_field('content'); ?>
							</p>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
