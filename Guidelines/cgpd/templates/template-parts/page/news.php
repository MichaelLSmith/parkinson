<?php
	$newsQuery = new WP_Query([
		'post_type' => 'post',
		'posts_per_page' => 2,
		'meta_query' => [
			[
				'key' => 'related_to',
				'value' => '"' . get_the_ID() . '"',
				'compare' => 'LIKE'
			]
		],
	]);
?>

<?php if($newsQuery->have_posts()): ?>
	<section class="news bg-primary text-white py-5 my-5">
		<div class="container">
			<h2 class="text-white">Related News</h2>
			<div class="row">
				<?php while($newsQuery->have_posts()): ?>
					<?php $newsQuery->the_post(); ?>
					<div class="col-md-6 d-flex">
						<a class="card mb-3 w-100" href="#">
							<img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="" />
							<div class="card-body">
								<p class="card-text"><?php the_title(); ?></p>
							</div>
						</a>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
<?php endif; ?>
