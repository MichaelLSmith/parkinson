<?php namespace Fp\Fabric; ?>
<article>
	<?php
		if(is_single()) {
            fabric()->get_template_part('page', 'header');
		}
	?>

	<div class="container">
		<?php

			if(!is_single()) {
				printf(
					'<a href="%s"><h2>%s</h2></a>',
					get_permalink(),
					get_the_title()
				);
			}

			printf( '<p class="small">%s</p>', get_the_date( 'F j, Y' ) );

			is_single() ? the_content() : the_excerpt();

			fabric()->get_template_part( 'page', 'footer' );
		?>
	</div>
</article>
