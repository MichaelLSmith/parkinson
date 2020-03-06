<?php namespace Fp\Fabric; ?>
<header class="hero">
	<div class="hero__mask"></div>
	<div class="hero__image" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>);"></div>
	<div class="hero__title">
		<div class="container">
			<h1>
				<?php
					if ( is_front_page() ):
						echo get_the_title( get_option('page_on_front') );
					elseif ( is_home() ):
						echo get_the_title( get_option('page_for_posts') );
					elseif ( is_archive() ):
						the_archive_title();
					elseif ( is_search() ):
						printf( 'Search Results for: %s', get_search_query() );
					elseif ( is_404() ):
						echo 'Oops! That page can&rsquo;t be found.';
					else:
						the_title();
					endif;
				?>
			</h1>
		</div>
	</div>
</header>
