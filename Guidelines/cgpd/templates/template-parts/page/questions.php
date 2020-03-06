<?php if(have_rows('questions')): ?>
	<section class="questions my-5 py-5">
		<div class="container">
			<!-- <h2>Questions You Might Have</h2> -->
			<h2>
				<?php _e('Questions You Might Have', 'parkinson');?>
			</h2>
			<div class="accordion" id="questionAccordion">
				<?php while(have_rows('questions')): ?>
					<?php
						the_row();
						$slug = sanitize_title(get_sub_field('question'));
					?>
					<div class="accordion__panel">
						<button
							class="accordion__button"
							type="button"
							data-toggle="collapse"
							data-target="#<?php echo $slug; ?>"
							aria-expanded="false"
							aria-controls="<?php echo $slug; ?>">
							<h3 id="heading-<?php echo $slug; ?>">
								<i class="fas fa-plus"></i>
								<i class="fas fa-minus"></i>
								<?php the_sub_field('question'); ?>
							</h3>
						</button>
						<div
							id="<?php echo $slug; ?>"
							class="collapse accordion__content"
							aria-labelledby="heading-<?php echo $slug; ?>"
							data-parent="#questionAccordion">
							<?php the_sub_field('answer'); ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
