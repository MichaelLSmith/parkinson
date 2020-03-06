<?php namespace Fp\Fabric; ?>
<?php fabric()->get_header(); ?>

<main id="main">
	<?php
		if ( have_posts() ):
			if ( is_home() && ! is_front_page() ):
				fabric()->get_template_part( 'page-header' );
			endif;

			while ( have_posts() ):
				the_post();

				fabric()->get_template_part( 'content', get_post_format() );
			endwhile;

			fabric()->the_pagination();
		else:
			fabric()->get_template_part( 'content', 'none' );
		endif;
	?>
</main>

<?php fabric()->get_footer(); ?>
