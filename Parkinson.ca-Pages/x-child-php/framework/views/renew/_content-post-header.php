<?php

// =============================================================================
// VIEWS/RENEW/_CONTENT-POST-HEADER.PHP
// -----------------------------------------------------------------------------
// Standard <header> output for various posts.
// =============================================================================

?>

<header class="entry-header">
  <?php if  ( is_single() and has_term( 'No Title' ) ) : ?>

  <?php if ( is_single() ) : ?>
  <h1 class="entry-title"><?php the_title(); ?></h1>

  <?php else : ?>
  <h2 class="entry-title">
    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to: "%s"', '__x__' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a>
  </h2>
  <?php endif; ?>
  <?php x_renew_entry_meta(); ?>
</header>