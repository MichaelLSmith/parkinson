<?php

/*
Template Name: Quebec Newsletter Archive
Template for Template for Quebec Newsletter Archive page with wp-query for item-archive (CPT) - Newsletter - Quebec category
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">
		<?php
					if(ICL_LANGUAGE_CODE=='fr') {
						$catLang = 'nouvelles-quebec';
						$connect1 = 'Communiquer avec';
						$connect2 = 'Parkinson Canada au Québec';
						$connecturl = '/fr/local-offices/parkinson-canada-quebec-bureau/';
					}
					else {
						$catLang = 'newsletter-quebec';
						$connect1 = 'Connect with';
						$connect2 = 'Parkinson Canada in Quebec';
						$connecturl = '/local-offices/parkinson-canada-quebec-office/';
				}
				?>

		<p><?php echo($connect1);?> <a href="<?php echo($connecturl); ?>"><?php echo($connect2);?></a></p>
			<div class="entry-content content">
								
			<?php
							// WP_Query arguments
							$current_page = get_query_var('paged');
							$args = array(
								'post_type'              => array( 'item-archive' ),
								'paged'                 => $current_page,
								'posts_per_page' 				=> '5',
								'tax_query'              => array(
									'relation' => 'AND',
									array(
										'taxonomy'         => 'category',
										'terms'            => $catLang,
										'field'            => 'slug',
									),
								),
							);

							// The Query
							$query = new WP_Query( $args );

							// The Loop
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {
									$query->the_post();	?>		

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<section class="simple-grid sg-2col-15-75 grid-gap-half-em">
								<?php if( types_render_field( 'issue-image', array( ) ) ): ?>
										<div class="grid__item">
											<a href="<?php echo(types_render_field( 'pdf-of-issue', array( "output" => 'raw' ) ) ); ?>"><img style="border: lightgray solid 1px;" src="<?php echo(types_render_field( 'issue-image', array( 'output' => 'raw' ) ) ); ?>" alt="image of issue <?php echo(types_render_field( 'name-of-issue', array( ) ) ); ?>"></a>
										</div>
										<div class="grid__item font-size-reset">
											<a href="<?php echo(types_render_field( 'pdf-of-issue', array( "output" => 'raw' ) ) ); ?>">
												<span><?php echo(types_render_field( 'name-of-issue', array( ) ) ); ?></span>
											</a>
											<div><?php echo(types_render_field( 'summary-of-issue', array( ) ) ); ?></div>
										</div>	
								<?php else: ?>
										<div class="grid__item font-size-reset" style="grid-column: 1/span 2;">
											<a href="<?php echo(types_render_field( 'pdf-of-issue', array( "output" => 'raw' ) ) ); ?>">
													<span><?php echo(types_render_field( 'name-of-issue', array( ) ) ); ?></span>
												</a>
												<div><?php echo(types_render_field( 'summary-of-issue', array( ) ) ); ?></div>
											</div>
								<?php endif; ?>

							</article>
							<?php
													}
							} else {
								echo('There are no news updates at the moment. Please check again later.');
							}

			?>
		
		
	</section>
</div><!-- entry content -->
<div class="x-pagination">
				<?php 
					echo paginate_links( array( 
						'total' => $query->max_num_pages,
						'type'  => 'list'
					));
				?>
				<?php 
					// Restore original Post Data
					wp_reset_postdata();
					?>
			</div>
</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>