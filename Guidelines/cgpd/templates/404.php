<?php namespace Fp\Fabric; ?>
<?php fabric()->get_header(); ?>
<main id="main">
	<?php fabric()->get_template_part( 'page', 'header' ); ?>
	<div class="container">
		<p class="has-large-font-size"><?php _e( 'It looks like nothing was found at this location.', 'fp-fabric' ); ?></p>
	</div>
</main>

<?php fabric()->get_footer(); ?>
