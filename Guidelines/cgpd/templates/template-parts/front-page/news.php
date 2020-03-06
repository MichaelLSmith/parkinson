<?php namespace Fp\Fabric; ?>
<section class="news news--home my-5 py-5">
	<div class="container">
		<div class="row align-items-end mb-5">
			<div class="col-lg-7">
				<h2><?php _e('News &amp; Events','parkinson')?></h2>
			</div>
		</div>
		<div class="row equal">
			<div class="col-md-6 d-flex">
				<a class="card mb-3 w-100" href="<?php echo site_url('/news-events/education-opportunities/'); ?>">
					<img class="card-img-top" src="<?php echo fabric()->asset_uri('img/education-seminar.jpg'); ?>" alt="" />
					<div class="card-body">
						<p class="card-text"><?php _e('Education Opportunities','parkinson')?></p>
					</div>
				</a>
			</div>
			<div class="col-md-6 d-flex">
				<a class="card mb-3 w-100" href="<?php echo site_url('/news-events/news/'); ?>">
					<img class="card-img-top" src="<?php echo fabric()->asset_uri('img/experts-conference.jpg'); ?>" alt="" />
					<div class="card-body">
						<p class="card-text"><?php _e('News','parkinson')?></p>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
