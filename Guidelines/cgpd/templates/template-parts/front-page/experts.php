<section class="experts experts--home mb-5">
	<div class="experts__image"></div>
	<div class="experts__mask"></div>
	<div class="experts__content">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
				<?php if(ICL_LANGUAGE_CODE=='fr'): ?>
					<?php $expert = get_post(222); ?>
				<?php else: ?>
					<?php $expert = get_post(70); ?>
				<?php endif;?>
					<h2 class="text-white"><?php echo $expert->post_title; ?></h2>
					<p class="has-medium-font-size"><?php echo get_the_excerpt($expert); ?><p>
					<a class="btn btn-info" href="<?php echo get_permalink($expert); ?>"><?php _e('Learn More','parkinson')?><span class="sr-only"> asking a question</span></a>
				</div>
			</div>
		</div>
	<div>
</section>
