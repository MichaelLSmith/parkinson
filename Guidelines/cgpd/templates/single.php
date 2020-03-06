<?php namespace Fp\Fabric; ?>
<?php fabric()->get_header(); ?>

<main id="main">
	<?php while ( have_posts() ): ?>
		<?php the_post(); ?>

		<?php fabric()->get_template_part( 'content', get_post_format() ); ?>
	<?php endwhile; ?>
</main>

<?php fabric()->get_footer(); ?>
