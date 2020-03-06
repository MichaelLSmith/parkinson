<?php namespace Fp\Fabric; ?>
		<footer id="footer" class="footer py-5">
			<div class="container">
				<div class="row mb-5">
					<div class="col-lg-8 mb-5">
						<h2><?php _e('Locate an Office','parkinson'); ?></h2>
						<p><?php _e('Parkinson Canada serves you coast to coast, toll-free and online:','parkinson'); ?></p>
						<p><strong><?php _e('Telephone','parkinson'); ?></strong><a href="tel:18005653000" class="btn btn-info ml-2">1 (800) 565-3000</a></p>
						<p><strong><?php _e('Email','parkinson'); ?></strong><a href="mailto:education@parkinson.ca" class="btn btn-info ml-2">education@parkinson.ca</a></p>
						<p class="h3 text-dark mt-5 mb-4"><?php _e('Connect in your province or territory','parkinson'); ?></p>
						<div class="row">
							<div class="col-md-6 mb-3">
								<a class="h4 text-danger" href="https://www.parkinson.ca/local-offices/parkinson-canada-alberta-office/">
									<img class="mr-2" src="<?php echo fabric()->asset_uri('img/svgs/alberta.svg'); ?>" alt="" />
									Alberta
								</a>
							</div>
							<div class="col-md-6 mb-3">
								<a class="h4 text-danger" href="https://www.parkinson.ca/about-us/contact-us/central-office/">
									<img class="mr-2" src="<?php echo fabric()->asset_uri('img/svgs/british-columbia.svg'); ?>" alt="" />
									<?php _e('British Columbia','parkinson'); ?>
								</a>
							</div>
							<div class="col-md-6 mb-3">
								<a class="h4 text-danger" href="https://www.parkinson.ca/local-offices/parkinson-canada-manitoba-office/">
									<img class="mr-2" src="<?php echo fabric()->asset_uri('img/svgs/manitoba.svg'); ?>" alt="" />
									Manitoba
								</a>
							</div>
							<div class="col-md-6 mb-3">
								<a class="h4 text-danger" href="https://www.parkinson.ca/local-offices/parkinson-canada-atlantic-office/">
									<img class="mr-2" src="<?php echo fabric()->asset_uri('img/svgs/new-brunswick.svg'); ?>" alt="" />
									<?php _e('New Brunswick','parkinson'); ?>
								</a>
							</div>
							<div class="col-md-6 mb-3">
								<a class="h4 text-danger" href="https://www.parkinson.ca/local-offices/parkinson-canada-atlantic-office/">
									<img class="mr-2" src="<?php echo fabric()->asset_uri('img/svgs/newfoundland-labrador.svg'); ?>" alt="" />
									<?php _e('Newfoundland and Labrador','parkinson'); ?>
								</a>
							</div>
							<div class="col-md-6 mb-3">
								<a class="h4 text-danger" href="https://www.parkinson.ca/local-offices/parkinson-canada-atlantic-office/">
									<img class="mr-2" src="<?php echo fabric()->asset_uri('img/svgs/nova-scotia.svg'); ?>" alt="" />
									<?php _e('Nova Scotia','parkinson'); ?>
								</a>
							</div>
							<div class="col-md-6 mb-3">
								<a class="h4 text-danger" href="https://www.parkinson.ca/local-offices/parkinson-canada-ottawa-office/">
									<img class="mr-2" src="<?php echo fabric()->asset_uri('img/svgs/ontario.svg'); ?>" alt="" />
									<?php _e('Ontario North and East','parkinson'); ?>
								</a>
							</div>
							<div class="col-md-6 mb-3">
								<a class="h4 text-danger" href="https://www.parkinson.ca/local-offices/parkinson-canada-toronto-office/">
									<img class="mr-2" src="<?php echo fabric()->asset_uri('img/svgs/ontario.svg'); ?>" alt="" />
									<?php _e('Ontario South and West','parkinson'); ?>
								</a>
							</div>
							<div class="col-md-6 mb-3">
								<a class="h4 text-danger" href="https://www.parkinson.ca/local-offices/parkinson-canada-atlantic-office/">
									<img class="mr-2" src="<?php echo fabric()->asset_uri('img/svgs/prince-edward-island.svg'); ?>" alt="" />
									<?php _e('Prince Edward Island','parkinson'); ?>
								</a>
							</div>
							<div class="col-md-6 mb-3">
								<a class="h4 text-danger" href="https://www.parkinson.ca/local-offices/parkinson-canada-quebec-office/">
									<img class="mr-2" src="<?php echo fabric()->asset_uri('img/svgs/quebec.svg'); ?>" alt="" />
									<?php _e('Quebec','parkinson'); ?>
								</a>
							</div>
							<div class="col-md-6 mb-3">
								<a class="h4 text-danger" href="https://www.parkinson.ca/local-offices/parkinson-canada-saskatchewan-office/">
									<img class="mr-2" src="<?php echo fabric()->asset_uri('img/svgs/saskatchewan.svg'); ?>" alt="" />
									Saskatchewan
								</a>
							</div>
							<div class="col-md-6 mb-3">
								<a class="h4 text-danger" href="https://www.parkinson.ca/about-us/contact-us/central-office/">
									<img class="mr-2" src="<?php echo fabric()->asset_uri('img/svgs/north-west-territories.svg'); ?>" alt="" />
									<?php _e('North West Territories','parkinson'); ?>
								</a>
							</div>
							<div class="col-md-6 mb-3">
								<a class="h4 text-danger" href="https://www.parkinson.ca/about-us/contact-us/central-office/">
									<img class="mr-2" src="<?php echo fabric()->asset_uri('img/svgs/nunavut.svg'); ?>" alt="" />
									Nunavut
								</a>
							</div>
							<div class="col-md-6 mb-3">
								<a class="h4 text-danger" href="https://www.parkinson.ca/about-us/contact-us/central-office/">
									<img class="mr-2" src="<?php echo fabric()->asset_uri('img/svgs/yukon.svg'); ?>" alt="" />
									Yukon
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card mb-3 w-100 bg-danger">
							<img class="card-img-top" src="<?php echo fabric()->asset_uri('img/physio.jpg'); ?>" alt="" />
							<div class="card-body">
								<p class="has-medium-font-size card-text font-weight-bold"><?php _e('Thanks to your generous donations, we provide programs and services for your patients.','parkinson'); ?></p>
								<p class="card-text"><?php _e('We also provide professional education opportunities for you to help your patients live well.','parkinson'); ?></p>
								<?php if( ICL_LANGUAGE_CODE == 'fr' ) : ?>
								<a href="https://donate.parkinson.ca/site/Donation2?df_id=4900&mfc_pref=T&4900.donation=form1" class="btn btn-outline-white btn-block"><?php _e('Donate Now to Improve Care','parkinson'); ?></a>
								<?php else: ?>
									<a href="https://donate.parkinson.ca/site/Donation2?df_id=4900&mfc_pref=T&4900.donation=form1&s_locale=fr_CA" class="btn btn-outline-white btn-block"><?php _e('Donate Now to Improve Care','parkinson'); ?></a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="text-center">
					<p class="small text-info font-weight-bold"><?php _e('Charitable Registration Number','parkinson'); ?> 10809 1786 RR0001</p>
					<p>
						<a class="mx-2 facebook" href="<?php echo fabric()->config('social.facebook'); ?>">
							<i class="fab fa-facebook fa-2x"></i>
							<span class="sr-only">Facebook</span>
						</a>
						<a class="mx-2 twitter" href="<?php echo fabric()->config('social.twitter'); ?>">
							<i class="fab fa-twitter fa-2x"></i>
							<span class="sr-only">Twitter</span>
						</a>
						<a class="mx-2 youtube" href="<?php echo fabric()->config('social.youtube'); ?>">
							<i class="fab fa-youtube fa-2x"></i>
							<span class="sr-only">YouTube</span>
						</a>
						<a class="mx-2 soundcloud" href="<?php echo fabric()->config('social.soundcloud'); ?>">
							<i class="fab fa-soundcloud fa-2x"></i>
							<span class="sr-only">Soundcloud</span>
						</a>
					</p>
					<p class="small">
						<a href="https://www.parkinson.ca/privacy-policy/" target="_blank" rel="noopener noreferrer"><?php _e('Privacy Policy','parkinson'); ?></a>&nbsp;|&nbsp;
						<a href="<?php echo site_url('/contact/'); ?>"><?php _e('Contact','parkinson'); ?></a>
					</p>
					<p class="small"><?php _e('If you experience any issues, please','parkinson'); ?> <a href="mailto:communications@parkinson.ca" class="font-weight-bold text-dark"><?php _e('report them to our webmaster','parkinson'); ?></a>.</p>

				<?php if( ICL_LANGUAGE_CODE == 'fr' ) : ?>
					<img src="/wp-content/uploads/francais_version-couleur_fix_519x519.png" alt="imagine canada logo" style="margin: 1rem auto; height: 150px;">
				<?php else : ?>
					<img src="/wp-content/uploads/imagine-canada.png" alt="Imagine Canada" style="margin: 1rem auto; height: 150px;" />
				<?php endif; ?>
					<p class="small text-muted"><?php _e('Parkinson Canada is accredited by Imagine Canada’s Standards program, recognizing a quality of excellence in five fundamental areas: board governance, financial accountability and transparency, fundraising, staff management, and volunteer involvement.', 'parkinson'); ?></p>
					<?php
						printf(
							'<p class="small">
								&copy; %s, %s.
								<span class="text-nowrap">Website by <a class="font-weight-bold text-dark" href="https://floating-point.com">floating-point</a>.</span>
							</p>',
							date( 'Y' ),
							get_bloginfo( 'name' )
						);
					?>
				</div>
			</div>

		</footer>
	</div><!-- .main-wrapper -->

	<?php wp_footer(); ?>
</body>
</html>
