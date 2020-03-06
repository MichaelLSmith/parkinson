<?php namespace Fp\Fabric; ?>
<?php fabric()->get_header(); ?>

<main id="main">
	<?php
		if ( have_posts() ):
			fabric()->get_template_part( 'page', 'header' );

			while ( have_posts() ):
				the_post();

				fabric()->get_template_part( 'content', 'search' );
			endwhile;

			fabric()->the_pagination();
		else:
			fabric()->get_template_part( 'content', 'none' );
		endif;
	?>
</main>

<?php fabric()->get_footer(); ?>
