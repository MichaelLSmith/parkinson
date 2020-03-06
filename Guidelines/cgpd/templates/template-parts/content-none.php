<?php namespace Fp\Fabric; ?>
<section>
	<div class="container">
		<header class="my-5">
			<h1><?php _e( 'Nothing Found', 'fp-fabric' ); ?></h1>
		</header>

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'fp-fabric' ), [ 'a' => [ 'href' => []]] ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		<?php elseif ( is_search() ) : ?>
			<p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fp-fabric'); ?></p>
		<?php else : ?>
			<p><?php _e('It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'fp-fabric'); ?></p>
		<?php endif; ?>

		<?php get_search_form(); ?>
	</div>

</section>
