<?php namespace Fp\Fabric; ?>
<section class="hero hero--home">
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
							<p class="card-text">Guideline</p>
						</div>
					</a>
				</div>
				<div class="col-md-3 col-6 d-flex">
					<a class="card mb-3 w-100" href="<?php echo site_url('/parkinsons-disease/'); ?>">
						<img class="card-img-top" src="<?php echo fabric()->asset_uri('img/parkinsons-disease.jpg'); ?>" alt="" />
						<div class="card-body">
							<p class="card-text">Parkinson's Disease</p>
						</div>
					</a>
				</div>
				<div class="col-md-3 col-6 d-flex">
					<a class="card mb-3 w-100" href="<?php echo site_url('/resources/'); ?>">
						<img class="card-img-top" src="<?php echo fabric()->asset_uri('img/funder-partner-information.jpg'); ?>" alt="" />
						<div class="card-body">
							<p class="card-text">Tools &amp; Resources</p>
						</div>
					</a>
				</div>
				<div class="col-md-3 col-6 d-flex">
					<a class="card mb-3 w-100" href="<?php echo site_url('/about-us/'); ?>">
						<img class="card-img-top" src="<?php echo fabric()->asset_uri('img/about-us.jpg'); ?>" alt="" />
						<div class="card-body">
							<p class="card-text">About Us</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
