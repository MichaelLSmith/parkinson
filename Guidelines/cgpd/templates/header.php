<?php namespace Fp\Fabric; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="sr-only" href="#main">Skip to content</a>


	<div class="nav-toggles">
		<?php foreach( icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str') as $lang ): ?>
			<?php if( ! $lang['active'] ): ?>
				<a class="btn btn-secondary" href="<?php echo $lang['url']; ?>">
					<?php echo strtoupper( $lang['code'] ); ?>
				</a>
			<?php endif; ?>
		<?php endforeach; ?>
		<button
			type="button" id="menu-toggle"
			class="btn btn-primary">
			<span>Menu</span><i class="fas fa-chevron-down ml-2"></i>
		</button>
	</div>

	<?php fabric()->the_menu(); ?>

	<div class="main-wrapper">

		<div class="logo-container bg-white pt-3 d-none d-md-block">
			<div class="container">
				<a href="https://www.parkinson.ca/<?php echo ICL_LANGUAGE_CODE === 'fr' ?'fr' : ''; ?>">
					<img src="<?php echo fabric()->asset_uri('img/logo/logo.svg'); ?>" alt="Parkinson Canada" />
				</a>
			</div>
		</div>

		<div class="title-container bg-white text-primary sticky-top py-3">
			<div class="container">
				<a href="https://www.parkinson.ca/<?php echo ICL_LANGUAGE_CODE === 'fr' ? 'fr' : ''; ?>">
					<img  class="mr-2 mb-2 d-inline d-md-none" src="<?php echo fabric()->asset_uri('img/logo/logo.svg'); ?>" alt="Parkinson Canada" />
				</a>
				<a href="<?php echo site_url(); ?>">
					<?php echo get_bloginfo('name'); ?>
				</a>
			</div>
		</div>
