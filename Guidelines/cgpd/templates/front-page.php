<?php namespace Fp\Fabric; ?>
<?php fabric()->get_header(); ?>

<main id="main">
	<?php while ( have_posts() ): ?>
		<?php the_post(); ?>

		<h1 class="sr-only"><?php echo get_bloginfo('name'); ?></h1>

		<?php fabric()->get_template_part( 'front-page/hero' ); ?>
		<?php fabric()->get_template_part( 'front-page/impact' ); ?>
		<?php fabric()->get_template_part( 'front-page/experts' ); ?>
		<?php fabric()->get_template_part( 'front-page/news' ); ?>
	<?php endwhile; ?>
</main>

<?php fabric()->get_footer(); ?>
