<?php namespace Fp\Fabric; ?>
<div class="row equal my-5">
	<div class="col-md-6 d-flex">
		<a class="card mb-3 w-100" href="<?php echo site_url('/news-events/education-opportunities/'); ?>">
			<img class="card-img-top" src="<?php echo fabric()->asset_uri('img/education-seminar.jpg'); ?>" alt="" />
			<div class="card-body">
				<p class="card-text">
					<?php echo ICL_LANGUAGE_CODE === 'en' ? 'Education Opportunities' : 'Opportunités d\'éducation'; ?>
				</p>
			</div>
		</a>
	</div>
	<div class="col-md-6 d-flex">
		<a class="card mb-3 w-100" href="<?php echo site_url('/news-events/news/'); ?>">
			<img class="card-img-top" src="<?php echo fabric()->asset_uri('img/experts-conference.jpg'); ?>" alt="" />
			<div class="card-body">
				<p class="card-text">
					<?php echo ICL_LANGUAGE_CODE === 'en' ? 'News' : 'Nouvelles'; ?>
				</p>
			</div>
		</a>
	</div>
</div>
