<?php namespace Fp\Fabric; ?>
<section class="hero hero--home">
<div class="ie-announcement">
	<p>Welcome to the Canadian Guideline for Parkinson Disease website. This site is filled with best practice information to guide you to diagnose, treat and manage Parkinson's.</p>

	<p>This site is designed and optimized to be viewed on modern web browsers. For the best viewing experience please use either <a href="https://www.mozilla.org/en-CA/firefox/new/">Mozilla Firefox</a> or <a href="https://www.google.com/chrome/">Google Chrome</a>.</p>

	<p>View the <a href="/guideline">Guideline here</a>.</p>

	</div>
	<div class="hero__mask"></div>
	<div class="hero__image d-none d-md-block" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>);"></div>
	<div class="hero__caption">
		<div class="container">
			<div class="row justify-content-end mt-3">
				<div class="col-md-6">
					<?php echo get_bloginfo('description'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="hero__cards">
		<div class="container">
			<div class="row equal">
				<div class="col-md-3 col-6 d-flex">
					<a class="card mb-3 w-100" href="<?php echo site_url('/guideline/'); ?>">
						<img class="card-img-top" src="<?php echo fabric()->asset_uri('img/guidelines.jpg'); ?>" alt="" />
						<div class="card-body">
							<p class="card-text"><?php _e( 'Guideline', 'parkinson' ) ?></p>
						</div>
					</a>
				</div>
				<div class="col-md-3 col-6 d-flex">
					<a class="card mb-3 w-100" href="<?php echo site_url('/parkinsons-disease/'); ?>">
						<img class="card-img-top" src="<?php echo fabric()->asset_uri('img/parkinsons-disease.jpg'); ?>" alt="" />
						<div class="card-body">
							<p class="card-text"><?php _e( "Parkinson's Disease", 'parkinson' ) ?></p>
						</div>
					</a>
				</div>
				<div class="col-md-3 col-6 d-flex">
					<a class="card mb-3 w-100" href="<?php echo site_url('/resources/'); ?>">
						<img class="card-img-top" src="<?php echo fabric()->asset_uri('img/funder-partner-information.jpg'); ?>" alt="" />
						<div class="card-body">
							<p class="card-text"><?php _e( 'Tools &amp; Resources', 'parkinson' ) ?></p>
						</div>
					</a>
				</div>
				<div class="col-md-3 col-6 d-flex">
					<a class="card mb-3 w-100" href="<?php echo site_url('/about-us/'); ?>">
						<img class="card-img-top" src="<?php echo fabric()->asset_uri('img/about-us.jpg'); ?>" alt="" />
						<div class="card-body">
							<p class="card-text"><?php _e( 'About Us', 'parkinson' ) ?></p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
