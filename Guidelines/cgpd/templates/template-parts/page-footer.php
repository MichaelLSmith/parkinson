<?php namespace Fp\Fabric; ?>
<?php if ( $edit_link = get_edit_post_link() ) : ?>
	<p>
		<a href="<?php echo $edit_link; ?>" class="btn btn-light">
			<i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit<span class="sr-only"> <?php the_title(); ?></span>
		</a>
	</p>
<?php endif; ?>
