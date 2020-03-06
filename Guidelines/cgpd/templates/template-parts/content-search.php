<?php namespace Fp\Fabric; ?>
<article>
	<?php
		the_title( '<h2>', '</h2>' );

		if ( 'post' === get_post_type() ) :
			printf( '<p class="small">%s</p>', get_the_date( 'F j, Y' ) );
		endif;

		the_excerpt();

		get_template_part( 'template-parts/page-footer');
	?>
</article>
