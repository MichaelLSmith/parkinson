<?php namespace Fp\Fabric; ?>
<article>
	<?php fabric()->get_template_part( 'page', 'header' ); ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php
					fabric()->get_page_part( 'before' );

					the_content();

					fabric()->get_page_part( 'after' );

					fabric()->get_template_part( 'page', 'footer' );
				?>
			</div>
		</div>
	</div>

	<?php fabric()->get_template_part( 'page/news' ); ?>
	<?php fabric()->get_template_part( 'page/questions' ); ?>
</article>
